const { test, expect } = require( '@wordpress/e2e-test-utils-playwright' );

/**
 * soli/post-search + the query_loop_block_query_vars bridge in functions.php.
 *
 * The block itself holds no query logic: it writes ?q= (and ?q_type= when
 * scoped) into the URL, and the PHP filter injects that into a non-inheriting
 * Query Loop. These tests drive the real form on a real page rather than
 * hitting URLs directly, so a break in either half fails the suite.
 *
 * The loop is restricted to a category created per run. beforeAll runs once per
 * worker under fullyParallel, and the loop would otherwise draw from the shared
 * post pool — so without that restriction the seeds of parallel workers (and the
 * demo content from bin/setup.sh) would leak into the counts.
 */
test.describe( 'Query Loop search', () => {
	const created = { posts: [], pages: [], categories: [] };
	let pageUrl;

	test.beforeAll( async ( { requestUtils } ) => {
		// Random suffix, not just a timestamp: parallel workers start within the
		// same millisecond, and a duplicate name resolves to the *existing* term,
		// which would silently pool every worker's posts into one category.
		const unique = `${ Date.now() }-${ Math.random()
			.toString( 36 )
			.slice( 2, 8 ) }`;

		const category = await requestUtils.rest( {
			path: '/wp/v2/categories',
			method: 'POST',
			data: { name: `E2E Zoeken ${ unique }` },
		} );
		created.categories.push( category.id );

		// Dates are chosen so date-order and relevance-order DISAGREE: the
		// content-only match is the newest, so it would come first under the
		// default orderby=date. Without that opposition the ranking test passes
		// even when relevance ordering is removed. All are back-dated so the
		// seeded news pages stay undisturbed.
		const seed = [
			// Title match for "trompetsolo" — oldest, so only relevance lifts it.
			{
				title: 'E2E Trompetsolo van de maand',
				content: 'Een bericht.',
				date: '2017-04-01T10:00:00',
			},
			// Content-only match — newest, so date-order would put it first.
			{
				title: 'E2E Fanfare uit Driehuis',
				content: 'Met een trompetsolo halverwege.',
				date: '2017-04-03T10:00:00',
			},
			// Matches neither, so it proves the loop is actually narrowed.
			{
				title: 'E2E Blokfluitklas start',
				content: 'Nieuwe lichting.',
				date: '2017-04-02T10:00:00',
			},
		];

		for ( const item of seed ) {
			const post = await requestUtils.rest( {
				path: '/wp/v2/posts',
				method: 'POST',
				data: {
					title: item.title,
					content: item.content,
					status: 'publish',
					categories: [ category.id ],
					date: item.date,
				},
			} );
			created.posts.push( post.id );
		}

		// Search block scoped to posts, plus a Query Loop that does NOT inherit
		// (inherited loops render from the main query and never reach the filter).
		const content =
			`<!-- wp:soli/post-search {"postType":"post"} /-->\n\n` +
			`<!-- wp:query {"queryId":901,"query":{"perPage":20,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false,"taxQuery":{"category":[${ category.id }]}}} -->\n` +
			`<div class="wp-block-query"><!-- wp:post-template -->\n` +
			`<!-- wp:post-title {"level":3} /-->\n` +
			`<!-- /wp:post-template -->\n` +
			`<!-- wp:query-no-results -->\n` +
			`<!-- wp:paragraph --><p>E2E-GEEN-RESULTATEN</p><!-- /wp:paragraph -->\n` +
			`<!-- /wp:query-no-results --></div>\n` +
			`<!-- /wp:query -->`;

		const testPage = await requestUtils.rest( {
			path: '/wp/v2/pages',
			method: 'POST',
			data: {
				title: 'E2E Zoektest',
				status: 'publish',
				content,
			},
		} );
		created.pages.push( testPage.id );
		pageUrl = new URL( testPage.link ).pathname;
	} );

	test.afterAll( async ( { requestUtils } ) => {
		for ( const id of created.posts ) {
			await requestUtils.rest( {
				path: `/wp/v2/posts/${ id }`,
				method: 'DELETE',
				params: { force: true },
			} );
		}
		for ( const id of created.pages ) {
			await requestUtils.rest( {
				path: `/wp/v2/pages/${ id }`,
				method: 'DELETE',
				params: { force: true },
			} );
		}
		for ( const id of created.categories ) {
			await requestUtils.rest( {
				path: `/wp/v2/categories/${ id }`,
				method: 'DELETE',
				params: { force: true },
			} );
		}
	} );

	// The page template renders the page's own title as .wp-block-post-title,
	// so result assertions must stay inside the loop.
	const results = ( page ) =>
		page.locator( '.wp-block-query .wp-block-post-title' );

	test( 'renders the form and leaves the loop unfiltered without a term', async ( {
		page,
	} ) => {
		await page.goto( pageUrl );

		const form = page.locator( '.wp-block-soli-post-search' );
		await expect( form.locator( '.soli-post-search__input' ) ).toBeVisible();
		await expect(
			form.locator( '.soli-post-search__button' )
		).toBeVisible();
		// The post-type scope travels in the URL, so it must be in the markup.
		await expect( form.locator( 'input[name="q_type"]' ) ).toHaveAttribute(
			'value',
			'post'
		);
		// No active search, so no reset affordance.
		await expect( form.locator( '.soli-post-search__reset' ) ).toHaveCount(
			0
		);

		await expect( results( page ) ).toHaveCount( 3 );
	} );

	test( 'submitting the form narrows the loop and prefills the term', async ( {
		page,
	} ) => {
		await page.goto( pageUrl );

		await page.locator( '.soli-post-search__input' ).fill( 'blokfluitklas' );
		await page.locator( '.soli-post-search__button' ).click();

		await page.waitForURL( /q=blokfluitklas/ );

		await expect( results( page ) ).toHaveCount( 1 );
		await expect( results( page ) ).toContainText( 'E2E Blokfluitklas' );

		// The field keeps the term so the user can refine it.
		await expect( page.locator( '.soli-post-search__input' ) ).toHaveValue(
			'blokfluitklas'
		);

		// The reset link clears the search and restores the full loop.
		await page.locator( '.soli-post-search__reset' ).click();
		await expect( results( page ) ).toHaveCount( 3 );
	} );

	test( 'ranks title matches above content-only matches', async ( {
		page,
	} ) => {
		// Guards the orderby => relevance line: build_query_vars_from_query_block()
		// always writes an explicit orderby (default date), so without it these two
		// would come back in publish order instead of by relevance.
		await page.goto( `${ pageUrl }?q=trompetsolo&q_type=post` );

		await expect( results( page ) ).toHaveCount( 2 );
		await expect( results( page ).first() ).toContainText(
			'E2E Trompetsolo'
		);
		await expect( results( page ).nth( 1 ) ).toContainText( 'E2E Fanfare' );
	} );

	test( 'ignores a term scoped to a different post type', async ( {
		page,
	} ) => {
		// Scope mismatch: the loop queries posts, so the term must not apply.
		await page.goto( `${ pageUrl }?q=blokfluitklas&q_type=page` );

		await expect( results( page ) ).toHaveCount( 3 );
	} );

	test( 'falls through to the no-results block when nothing matches', async ( {
		page,
	} ) => {
		await page.goto( `${ pageUrl }?q=zzzqqqgeenmatch&q_type=post` );

		await expect( results( page ) ).toHaveCount( 0 );
		await expect( page.getByText( 'E2E-GEEN-RESULTATEN' ) ).toBeVisible();
	} );

	test( 'escapes the search term it echoes back', async ( { page } ) => {
		const payload = '"><script>window.__xss = true;</script>';
		await page.goto(
			`${ pageUrl }?q=${ encodeURIComponent( payload ) }&q_type=post`
		);

		// The term is echoed into a value attribute; it must not break out of it.
		expect( await page.evaluate( () => window.__xss ) ).toBeUndefined();
		await expect( page.locator( '.soli-post-search__input' ) ).toBeVisible();
	} );
} );

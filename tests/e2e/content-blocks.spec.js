const { test, expect } = require( './fixtures' );

/**
 * Data-driven content blocks that render purely from attributes:
 * soli/concert-details, soli/flyer-callout, soli/program-list — plus the
 * adjacency-driven soli/post-nav on the single template.
 *
 * Each test publishes its own holder page through the `content` fixture, which
 * cleans up per test and assigns explicit slugs (see tests/e2e/fixtures.js).
 */
test.describe( 'Soli content blocks', () => {
	const publishPage = async ( content, title, markup ) => {
		const holder = await content.page( { title, content: markup } );

		return new URL( holder.link ).pathname;
	};

	test( 'concert-details renders a facts table and drops empty rows', async ( {
		page,
		content,
	} ) => {
		const markup =
			`<!-- wp:soli/concert-details {"rows":[` +
			`{"label":"Datum","value":"Zaterdag 11 april"},` +
			`{"label":"Locatie","value":"Soli Muziekcentrum"},` +
			`{"label":"","value":""}]} /-->`;
		const path = await publishPage(
			content,
			'Concert details E2E',
			markup
		);
		await page.goto( path );

		const table = page.locator( '.soli-concert-details-table' );
		await expect( table ).toBeVisible();
		// Third row had no label/value → filtered out server-side.
		await expect( table.locator( 'tbody tr' ) ).toHaveCount( 2 );
		await expect( table.locator( 'th' ).first() ).toHaveText( 'Datum' );
		await expect( table.locator( 'td' ).first() ).toContainText(
			'Zaterdag 11 april'
		);
	} );

	test( 'flyer-callout renders a link card that opens in a new tab', async ( {
		page,
		content,
	} ) => {
		const markup =
			`<!-- wp:soli/flyer-callout {"eyebrow":"Flyer","title":"Najaarsconcert",` +
			`"cta":"Bekijk de flyer","url":"https://example.com/flyer","opensInNewTab":true} /-->`;
		const path = await publishPage( content, 'Flyer callout E2E', markup );
		await page.goto( path );

		const link = page.locator( '.soli-flyer-callout__link' );
		await expect( link ).toHaveAttribute(
			'href',
			'https://example.com/flyer'
		);
		await expect( link ).toHaveAttribute( 'target', '_blank' );
		await expect( link ).toHaveAttribute( 'rel', /noopener/ );
		await expect(
			link.locator( '.soli-flyer-callout__eyebrow' )
		).toHaveText( 'Flyer' );
		await expect( link.locator( '.soli-flyer-callout__title' ) ).toHaveText(
			'Najaarsconcert'
		);
		await expect( link.locator( '.soli-flyer-callout__cta' ) ).toHaveText(
			'Bekijk de flyer'
		);
	} );

	test( 'program-list renders pill items and drops empty entries', async ( {
		page,
		content,
	} ) => {
		const markup =
			`<!-- wp:soli/program-list {"items":["Ouverture 1812","In the Hall of the Mountain King","","Bolero"]} /-->`;
		const path = await publishPage( content, 'Program list E2E', markup );
		await page.goto( path );

		const list = page.locator( '.soli-program-list' );
		await expect( list ).toBeVisible();
		// Empty middle item filtered out → 3 items.
		await expect( list.locator( '.soli-program-list__item' ) ).toHaveCount(
			3
		);
		await expect(
			list.locator( '.soli-program-list__text' ).first()
		).toHaveText( 'Ouverture 1812' );
		await expect(
			list.locator( '.soli-program-list__dot' ).first()
		).toBeAttached();
	} );

	test( 'post-nav shows previous/next adjacent posts on a single post', async ( {
		page,
		content,
	} ) => {
		// Adjacency is date-ordered over every post on the site and cannot be
		// scoped to a category, so the three posts must be consecutive in time
		// with nothing between them — hence a publish window reserved for this
		// test (see uniqueWindow in tests/e2e/fixtures.js).
		const label = content.uniqueSlug( 'postnav' );
		const window = content.uniqueWindow();
		const older = await content.post( {
			title: `${ label } Ouder`,
			date: window.at( 0 ),
		} );
		const middle = await content.post( {
			title: `${ label } Midden`,
			date: window.at( 60 ),
		} );
		const newer = await content.post( {
			title: `${ label } Nieuwer`,
			date: window.at( 120 ),
		} );

		await page.goto( new URL( middle.link ).pathname );

		const nav = page.locator( '.soli-post-nav' );
		await expect( nav ).toBeVisible();

		const prev = nav.locator( '.soli-post-nav__card--prev' );
		const next = nav.locator( '.soli-post-nav__card--next' );

		await expect( prev ).toHaveAttribute(
			'href',
			new RegExp( new URL( older.link ).pathname )
		);
		await expect( prev ).toContainText( `${ label } Ouder` );
		await expect( prev ).toContainText( 'Ouder bericht' );

		await expect( next ).toHaveAttribute(
			'href',
			new RegExp( new URL( newer.link ).pathname )
		);
		await expect( next ).toContainText( `${ label } Nieuwer` );
		await expect( next ).toContainText( 'Nieuwer bericht' );
	} );
} );

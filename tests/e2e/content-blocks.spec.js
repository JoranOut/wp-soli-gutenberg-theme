const { test, expect } = require( '@wordpress/e2e-test-utils-playwright' );

/**
 * Data-driven content blocks that render purely from attributes:
 * soli/concert-details, soli/flyer-callout, soli/program-list — plus the
 * adjacency-driven soli/post-nav on the single template.
 */
test.describe( 'Soli content blocks', () => {
	const pages = [];
	const posts = [];

	test.afterAll( async ( { requestUtils } ) => {
		for ( const id of pages ) {
			await requestUtils.rest( {
				path: `/wp/v2/pages/${ id }`,
				method: 'DELETE',
				params: { force: true },
			} );
		}
		for ( const id of posts ) {
			await requestUtils.rest( {
				path: `/wp/v2/posts/${ id }`,
				method: 'DELETE',
				params: { force: true },
			} );
		}
	} );

	async function publishPage( requestUtils, title, content ) {
		const p = await requestUtils.rest( {
			path: '/wp/v2/pages',
			method: 'POST',
			data: { title, status: 'publish', content },
		} );
		pages.push( p.id );
		return new URL( p.link ).pathname;
	}

	test( 'concert-details renders a facts table and drops empty rows', async ( {
		page,
		requestUtils,
	} ) => {
		const content =
			`<!-- wp:soli/concert-details {"rows":[` +
			`{"label":"Datum","value":"Zaterdag 11 april"},` +
			`{"label":"Locatie","value":"Soli Muziekcentrum"},` +
			`{"label":"","value":""}]} /-->`;
		const path = await publishPage(
			requestUtils,
			'Concert details E2E',
			content
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
		requestUtils,
	} ) => {
		const content =
			`<!-- wp:soli/flyer-callout {"eyebrow":"Flyer","title":"Najaarsconcert",` +
			`"cta":"Bekijk de flyer","url":"https://example.com/flyer","opensInNewTab":true} /-->`;
		const path = await publishPage(
			requestUtils,
			'Flyer callout E2E',
			content
		);
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
		requestUtils,
	} ) => {
		const content =
			`<!-- wp:soli/program-list {"items":["Ouverture 1812","In the Hall of the Mountain King","","Bolero"]} /-->`;
		const path = await publishPage(
			requestUtils,
			'Program list E2E',
			content
		);
		await page.goto( path );

		const list = page.locator( '.soli-program-list' );
		await expect( list ).toBeVisible();
		// Empty middle item filtered out → 3 items.
		await expect( list.locator( '.soli-program-list__item' ) ).toHaveCount(
			3
		);
		await expect( list.locator( '.soli-program-list__text' ).first() ).toHaveText(
			'Ouverture 1812'
		);
		await expect(
			list.locator( '.soli-program-list__dot' ).first()
		).toBeAttached();
	} );

	test( 'post-nav shows previous/next adjacent posts on a single post', async ( {
		page,
		requestUtils,
	} ) => {
		const make = async ( title, date ) => {
			const p = await requestUtils.rest( {
				path: '/wp/v2/posts',
				method: 'POST',
				data: { title, status: 'publish', date },
			} );
			posts.push( p.id );
			return p;
		};
		// Older → middle → newer by date; adjacency is date-ordered.
		const older = await make( 'Postnav Ouder', '2019-01-01T10:00:00' );
		const middle = await make( 'Postnav Midden', '2019-01-02T10:00:00' );
		const newer = await make( 'Postnav Nieuwer', '2019-01-03T10:00:00' );

		await page.goto( new URL( middle.link ).pathname );

		const nav = page.locator( '.soli-post-nav' );
		await expect( nav ).toBeVisible();

		const prev = nav.locator( '.soli-post-nav__card--prev' );
		const next = nav.locator( '.soli-post-nav__card--next' );

		await expect( prev ).toHaveAttribute(
			'href',
			new RegExp( new URL( older.link ).pathname )
		);
		await expect( prev ).toContainText( 'Postnav Ouder' );
		await expect( prev ).toContainText( 'Ouder bericht' );

		await expect( next ).toHaveAttribute(
			'href',
			new RegExp( new URL( newer.link ).pathname )
		);
		await expect( next ).toContainText( 'Postnav Nieuwer' );
		await expect( next ).toContainText( 'Nieuwer bericht' );
	} );
} );

const { test, expect } = require( '@wordpress/e2e-test-utils-playwright' );

/**
 * soli/masonry on the news index: column packing (Interactivity API) plus the
 * "Meer nieuws" append-style load-more, which also exercises the query-offset
 * pagination fix.
 *
 * The assertions rely only on the seeded content that ships with every
 * environment (no extra posts are created here — that made the totals depend on
 * run order). Titles are read with a single atomic $$eval so the masonry's
 * re-pack (it rebuilds the grid when images load) can't be caught mid-flight.
 */
test.describe( 'News masonry + load-more', () => {
	const cardsSel = '.wp-block-soli-masonry__grid .is-style-soli-card';
	const titleSel = '.wp-block-soli-masonry__grid .wp-block-post-title';

	const titles = ( page ) =>
		page.$$eval( titleSel, ( els ) =>
			els.map( ( e ) => e.textContent.trim() )
		);

	test( 'packs the query into columns and enhances', async ( { page } ) => {
		await page.goto( '/nieuws/' );

		const masonry = page.locator( '.wp-block-soli-masonry' );
		await expect( masonry ).toHaveClass( /is-enhanced/ );
		await expect(
			masonry.locator( '.wp-block-soli-masonry__grid' )
		).toBeVisible();
		// Desktop → 3 columns; perPage 3 → 3 cards initially.
		await expect(
			masonry.locator( '.wp-block-soli-masonry__column' )
		).toHaveCount( 3 );
		await expect( page.locator( cardsSel ) ).toHaveCount( 3 );

		// The feature post (separate query) sits above and is not in the grid.
		await expect( page.locator( '.soli-news-feature' ) ).toHaveCount( 1 );
	} );

	test( 'load-more appends a fresh batch (no overlap) and retires when done', async ( {
		page,
	} ) => {
		await page.goto( '/nieuws/' );

		const cards = page.locator( cardsSel );
		const button = page.locator( '.soli-more-button' );

		// perPage 3 → first page shows exactly three cards.
		await expect( cards ).toHaveCount( 3 );
		await expect( button ).toBeVisible();
		const pageOne = await titles( page );
		expect( pageOne ).toHaveLength( 3 );

		// One click appends the next batch in the same document (append, not a
		// full-page replace).
		await button.click();
		await expect.poll( () => cards.count() ).toBeGreaterThan( 3 );
		await page.waitForLoadState( 'networkidle' );

		const afterOne = await titles( page );
		// Batch is capped at perPage (3) and adds at least one new card.
		expect( afterOne.length ).toBeGreaterThan( 3 );
		expect( afterOne.length ).toBeLessThanOrEqual( 6 );
		// Page one is still present, and page two brought only fresh titles →
		// the offset pagination fix holds (no page-1/page-2 overlap).
		for ( const t of pageOne ) {
			expect( afterOne ).toContain( t );
		}
		expect( new Set( afterOne ).size ).toBe( afterOne.length );

		// Keep loading until the last page: the button retires when there is
		// no next page. toPass re-clicks each attempt, so this is robust to the
		// exact (env-dependent, possibly shifting) number of pages.
		await expect( async () => {
			if ( ( await button.count() ) === 0 ) {
				return;
			}
			await button.click();
			await page.waitForLoadState( 'networkidle' );
			await expect( button ).toHaveCount( 0 );
		} ).toPass( { timeout: 30000 } );
	} );
} );

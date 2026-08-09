const { test, expect } = require( './fixtures' );

/**
 * soli/masonry: shortest-column packing (Interactivity API) plus the
 * "Meer nieuws" append-style load-more over an offset query.
 *
 * The paging tests build the same block structure home.html uses, but on a page
 * of their own over a category of their own. That is what makes the numbers
 * exact: home.html's news grid queries every published post, so its page count
 * moved whenever another spec added or removed one, and the assertions had to
 * be written loosely enough to tolerate it. With a private category the archive
 * is a known size, so "three per batch, three batches, then the button retires"
 * can be asserted literally.
 *
 * The first test still reads the real /nieuws/ route, and seeds the posts it
 * needs rather than assuming bin/setup.sh already put an archive there.
 */

// 8 posts, newest first. home.html's grid skips the newest (offset 1, it is the
// feature card), leaving 7 for the grid: batches of 3, 3, 1 → exactly 3 pages.
const ARCHIVE_SIZE = 8;
const PER_PAGE = 3;

/**
 * Serialized copy of home.html's news grid, restricted to one category.
 *
 * @param {number} categoryId Category to draw from.
 * @return {string} Block markup.
 */
function newsGrid( categoryId ) {
	return (
		`<!-- wp:soli/masonry {"columns":3,"columnsTablet":2,"columnsMobile":1,"gap":32} -->\n` +
		`<!-- wp:query {"queryId":902,"query":{"perPage":${ PER_PAGE },"offset":1,"pages":0,"postType":"post","order":"desc","orderBy":"date","inherit":false,"taxQuery":{"category":[${ categoryId }]}}} -->\n` +
		`<div class="wp-block-query"><!-- wp:post-template -->\n` +
		`<!-- wp:group {"className":"is-style-soli-card"} -->\n` +
		`<div class="wp-block-group is-style-soli-card">\n` +
		`<!-- wp:post-title {"level":3} /-->\n` +
		`</div>\n` +
		`<!-- /wp:group -->\n` +
		`<!-- /wp:post-template -->\n` +
		`<!-- wp:query-pagination {"paginationArrow":"none"} -->\n` +
		`<!-- wp:query-pagination-next {"label":"Meer nieuws","className":"soli-more-button"} /-->\n` +
		`<!-- /wp:query-pagination -->\n` +
		`</div>\n` +
		`<!-- /wp:query -->\n` +
		`<!-- /wp:soli/masonry -->`
	);
}

/**
 * Publish `ARCHIVE_SIZE` posts in a fresh category, newest first.
 *
 * Back-dated well before the demo archive so the seeded news pages, which every
 * other spec reads, keep the ordering they expect.
 *
 * @param {Object} content The content fixture.
 * @return {Promise<{categoryId: number, titles: string[]}>} Category and titles
 *                                                           in date order.
 */
async function seedArchive( content ) {
	const category = await content.category();
	const label = content.uniqueSlug( 'masonry' );
	const titles = [];

	for ( let i = 0; i < ARCHIVE_SIZE; i++ ) {
		const title = `${ label } bericht ${ String( i + 1 ).padStart( 2, '0' ) }`;
		titles.push( title );

		await content.post( {
			title,
			content:
				'<!-- wp:paragraph --><p>Inhoud van een masonry-kaart.</p><!-- /wp:paragraph -->',
			categories: [ category.id ],
			// Descending: index 0 is the newest, so it is the one offset 1 skips.
			date: `2016-01-${ String( ARCHIVE_SIZE - i ).padStart(
				2,
				'0'
			) }T10:00:00`,
		} );
	}

	return { categoryId: category.id, titles };
}

test.describe( 'News masonry + load-more', () => {
	const cardsSel = '.wp-block-soli-masonry__grid .is-style-soli-card';
	const titleSel = '.wp-block-soli-masonry__grid .wp-block-post-title';

	// One atomic $$eval: the masonry re-packs whenever an image finishes
	// loading, so reading the titles one locator at a time can catch the grid
	// mid-rebuild.
	const titles = ( page ) =>
		page.$$eval( titleSel, ( els ) =>
			els.map( ( e ) => e.textContent.trim() )
		);

	test( 'the news index packs its query into columns and enhances', async ( {
		page,
		content,
	} ) => {
		// home.html shows the newest post as the feature card and the next three
		// in the grid, so the route needs at least four posts to fill it. Seed
		// them instead of trusting the demo archive to be there.
		const category = await content.category();
		for ( let i = 0; i < 5; i++ ) {
			await content.post( {
				title: `${ content.uniqueSlug( 'index' ) } bericht`,
				categories: [ category.id ],
				date: `2016-02-0${ i + 1 }T10:00:00`,
			} );
		}

		await page.goto( '/nieuws/' );

		const masonry = page.locator( '.wp-block-soli-masonry' );
		await expect( masonry ).toHaveClass( /is-enhanced/ );
		await expect(
			masonry.locator( '.wp-block-soli-masonry__grid' )
		).toBeVisible();
		// Desktop → 3 columns; perPage 3 → 3 cards in the first batch.
		await expect(
			masonry.locator( '.wp-block-soli-masonry__column' )
		).toHaveCount( 3 );
		await expect( page.locator( cardsSel ) ).toHaveCount( PER_PAGE );

		// The feature post (a separate perPage-1 query) sits above the grid and
		// is not one of its cards.
		await expect( page.locator( '.soli-news-feature' ) ).toHaveCount( 1 );
	} );

	test( 'load-more appends each batch without overlap and retires when done', async ( {
		page,
		content,
	} ) => {
		const { categoryId, titles: seeded } = await seedArchive( content );
		const holder = await content.page( {
			title: 'Masonry load-more',
			content: newsGrid( categoryId ),
		} );

		await page.goto( new URL( holder.link ).pathname );

		const cards = page.locator( cardsSel );
		const button = page.locator( '.soli-more-button' );

		// offset 1 skips the newest post, so the grid covers seeded[1..7].
		const expected = seeded.slice( 1 );
		expect( expected ).toHaveLength( 7 );

		// Batch 1.
		await expect( cards ).toHaveCount( 3 );
		await expect( button ).toBeVisible();
		expect( new Set( await titles( page ) ) ).toEqual(
			new Set( expected.slice( 0, 3 ) )
		);

		// Batch 2 — appended into the same document, not a full-page replace.
		await button.click();
		await expect( cards ).toHaveCount( 6 );
		expect( new Set( await titles( page ) ) ).toEqual(
			new Set( expected.slice( 0, 6 ) )
		);

		// Batch 3 is the remainder, so the pagination row retires with it.
		await button.click();
		await expect( cards ).toHaveCount( 7 );
		await expect( button ).toHaveCount( 0 );

		const final = await titles( page );
		// Every seeded post beyond the feature, exactly once each: pages 2 and 3
		// brought only fresh posts, so the offset arithmetic behind an offset
		// query never re-served a card. (Note: WordPress 7.0 computes that offset
		// the same way soli_gutenberg_theme_fix_query_offset() does, so the theme
		// filter is currently redundant — this asserts the resulting behaviour,
		// not the filter.)
		expect( final ).toHaveLength( expected.length );
		expect( new Set( final ) ).toEqual( new Set( expected ) );
	} );

	test( 'the column count follows the viewport', async ( {
		page,
		content,
	} ) => {
		const { categoryId } = await seedArchive( content );
		const holder = await content.page( {
			title: 'Masonry responsive',
			content: newsGrid( categoryId ),
		} );
		const path = new URL( holder.link ).pathname;

		const columns = page.locator( '.wp-block-soli-masonry__column' );

		// columnsMobile 1 (≤600px), columnsTablet 2 (≤900px), columns 3 above.
		await page.setViewportSize( { width: 480, height: 900 } );
		await page.goto( path );
		await expect( columns ).toHaveCount( 1 );

		await page.setViewportSize( { width: 800, height: 900 } );
		await page.goto( path );
		await expect( columns ).toHaveCount( 2 );

		await page.setViewportSize( { width: 1280, height: 900 } );
		await page.goto( path );
		await expect( columns ).toHaveCount( 3 );
	} );
} );

const { test, expect } = require( './fixtures' );

/**
 * Template-level queries: the home feature post, category archives and search
 * results. (home.html's news grid + offset pagination live in masonry.spec.js;
 * index.html is WordPress's bare fallback — with archive.html/search.html/
 * home.html present it is not reachable in normal browsing, and its inherited
 * loop is exercised by the archive and search cases below.)
 *
 * Every test publishes the posts it reads through the per-test `content`
 * fixture, so nothing here depends on bin/setup.sh having seeded an archive or
 * on what other specs are creating in parallel.
 */
test.describe( 'Template queries', () => {
	test( 'home feature query renders one linked feature post', async ( {
		page,
		content,
	} ) => {
		await content.post( {
			title: `${ content.uniqueSlug( 'feature' ) } bericht`,
			date: '2016-03-01T10:00:00',
		} );

		await page.goto( '/nieuws/' );

		const feature = page.locator( '.soli-news-feature' );
		await expect( feature ).toHaveCount( 1 );
		// A linked post title inside the feature card.
		await expect( feature.locator( '.wp-block-post-title a' ) ).toBeVisible();
	} );

	test( 'category archive renders the masonry query', async ( {
		page,
		content,
	} ) => {
		const name = content.uniqueSlug( 'E2E Rubriek' );
		const category = await content.category( name );

		const title = `${ content.uniqueSlug( 'archief' ) } testbericht`;
		await content.post( {
			title,
			categories: [ category.id ],
			// Back-dated so it does not disturb the newest news pages.
			date: '2017-03-01T10:00:00',
		} );

		// ?cat= always resolves to the category archive regardless of permalinks.
		await page.goto( `/?cat=${ category.id }` );

		await expect( page.locator( '.wp-block-query-title' ) ).toContainText(
			name
		);

		const masonry = page.locator( '.wp-block-soli-masonry' );
		await expect( masonry ).toBeVisible();
		await expect(
			masonry.locator( '.wp-block-post-title', { hasText: title } )
		).toBeVisible();
	} );

	test( 'search results render matching posts', async ( {
		page,
		content,
	} ) => {
		const term = content.uniqueSlug( 'zoekterm' );
		await content.post( {
			title: `${ term } in de titel`,
			date: '2017-03-02T10:00:00',
		} );

		await page.goto( `/?s=${ encodeURIComponent( term ) }` );

		// Search template query-title echoes the term.
		await expect( page.locator( '.wp-block-query-title' ) ).toContainText(
			term
		);
		// The seeded post comes back as a result card.
		await expect(
			page.locator( '.wp-block-post-title', { hasText: term } )
		).toBeVisible();
	} );
} );

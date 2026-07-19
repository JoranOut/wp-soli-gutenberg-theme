const { test, expect } = require( '@wordpress/e2e-test-utils-playwright' );

/**
 * Template-level queries: the home feature post, category archives and search
 * results. (home.html's news grid + offset pagination live in masonry.spec.js;
 * index.html is WordPress's bare fallback — with archive.html/search.html/
 * home.html present it is not reachable in normal browsing, and its inherited
 * loop is exercised by the archive and search cases below.)
 */
test.describe( 'Template queries', () => {
	const created = { posts: [], categories: [] };

	test.afterAll( async ( { requestUtils } ) => {
		for ( const id of created.posts ) {
			await requestUtils.rest( {
				path: `/wp/v2/posts/${ id }`,
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

	test( 'home feature query renders one linked feature post', async ( {
		page,
	} ) => {
		await page.goto( '/nieuws/' );

		const feature = page.locator( '.soli-news-feature' );
		await expect( feature ).toHaveCount( 1 );
		// A linked post title inside the feature card.
		await expect(
			feature.locator( '.wp-block-post-title a' )
		).toBeVisible();
	} );

	test( 'category archive renders the masonry query', async ( {
		page,
		requestUtils,
	} ) => {
		const cat = await requestUtils.rest( {
			path: '/wp/v2/categories',
			method: 'POST',
			data: { name: 'E2E Rubriek' },
		} );
		created.categories.push( cat.id );

		const post = await requestUtils.rest( {
			path: '/wp/v2/posts',
			method: 'POST',
			data: {
				title: 'Archief testbericht',
				status: 'publish',
				categories: [ cat.id ],
				// Back-dated so it does not disturb the newest news pages.
				date: '2017-03-01T10:00:00',
			},
		} );
		created.posts.push( post.id );

		// ?cat= always resolves to the category archive regardless of permalinks.
		await page.goto( `/?cat=${ cat.id }` );

		await expect( page.locator( '.wp-block-query-title' ) ).toContainText(
			'E2E Rubriek'
		);

		const masonry = page.locator( '.wp-block-soli-masonry' );
		await expect( masonry ).toBeVisible();
		await expect(
			masonry.locator( '.wp-block-post-title', {
				hasText: 'Archief testbericht',
			} )
		).toBeVisible();
	} );

	test( 'search results render matching posts', async ( { page } ) => {
		await page.goto( '/?s=Soli' );

		// Search template query-title echoes the term.
		await expect( page.locator( '.wp-block-query-title' ) ).toContainText(
			'Soli'
		);
		// At least one result card.
		await expect(
			page.locator( '.wp-block-post-title' ).first()
		).toBeVisible();
	} );
} );

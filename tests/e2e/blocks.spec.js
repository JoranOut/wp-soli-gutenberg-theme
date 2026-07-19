const { test, expect } = require( '@wordpress/e2e-test-utils-playwright' );

// Narrow viewport → 1 tile per view → 2 pages for a 2-tile slider.
test.use( { viewport: { width: 480, height: 900 } } );

test.describe( 'Soli blocks', () => {
	const created = [];
	let sliderPagePath;

	test.beforeAll( async ( { requestUtils } ) => {
		const groupA = await requestUtils.rest( {
			path: '/wp/v2/pages',
			method: 'POST',
			data: { title: 'Testgroep A', status: 'publish' },
		} );
		const groupB = await requestUtils.rest( {
			path: '/wp/v2/pages',
			method: 'POST',
			data: { title: 'Testgroep B', status: 'publish' },
		} );
		created.push( groupA.id, groupB.id );

		const content =
			`<!-- wp:soli/group-slider {"autoplay":0} -->` +
			`<!-- wp:soli/group-card {"pageId":${ groupA.id },"rehearsal":"ma · 20:00"} /-->` +
			`<!-- wp:soli/group-card {"pageId":${ groupB.id },"rehearsal":"di · 20:00"} /-->` +
			`<!-- /wp:soli/group-slider -->` +
			`<!-- wp:soli/group-card {"pageId":${ groupA.id },"rehearsal":"ma · 20:00"} /-->`;

		const holder = await requestUtils.rest( {
			path: '/wp/v2/pages',
			method: 'POST',
			data: { title: 'Blocks E2E', status: 'publish', content },
		} );
		created.push( holder.id );
		sliderPagePath = new URL( holder.link ).pathname;
	} );

	test.afterAll( async ( { requestUtils } ) => {
		for ( const id of created ) {
			await requestUtils.rest( {
				path: `/wp/v2/pages/${ id }`,
				method: 'DELETE',
				params: { force: true },
			} );
		}
	} );

	test( 'group card renders title, pill and link', async ( { page } ) => {
		await page.goto( sliderPagePath );

		const card = page.locator( '.wp-block-soli-group-card.soli-og-card' );
		await expect( card ).toHaveCount( 1 );
		await expect( card.locator( '.soli-og-card-name' ) ).toHaveText(
			'Testgroep A'
		);
		await expect( card.locator( '.soli-og-card-meta' ) ).toContainText(
			'ma · 20:00'
		);
		await expect( card ).toHaveAttribute( 'href', /testgroep-a/ );
	} );

	test( 'group slider renders tiles and chips and advances on next', async ( {
		page,
	} ) => {
		await page.goto( sliderPagePath );

		const slider = page.locator( '.wp-block-soli-group-slider' );
		await expect( slider.locator( '.soli-tile' ) ).toHaveCount( 2 );
		await expect( slider.locator( '.soli-slider-chip' ) ).toHaveCount( 2 );

		// 1 tile per view at 480px → 2 pages.
		await expect( slider.locator( '.soli-slider-total' ) ).toHaveText( '2' );
		await expect( slider.locator( '.soli-slider-current' ) ).toHaveText( '1' );

		await slider.locator( '.soli-slider-btn.next' ).click();

		// Shutter closes, track shifts under cover, counter updates.
		await expect( slider.locator( '.soli-slider-current' ) ).toHaveText( '2' );
		await expect( slider.locator( '.soli-slider-chip' ).nth( 1 ) ).toHaveClass(
			/is-active/
		);
	} );

	test( 'group card is insertable in the editor', async ( {
		admin,
		editor,
		page,
	} ) => {
		await admin.createNewPost( { postType: 'page' } );
		await editor.insertBlock( { name: 'soli/group-card' } );

		const block = editor.canvas.locator( '[data-type="soli/group-card"]' );
		await expect( block ).toBeVisible();
		// Placeholder with page picker (label is locale-dependent).
		await expect(
			block.locator( '.components-placeholder input[role="combobox"]' )
		).toBeVisible();
	} );
} );

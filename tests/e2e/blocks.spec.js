const { test, expect } = require( './fixtures' );

// Narrow viewport → 1 tile per view → 2 pages for a 2-tile slider.
test.use( { viewport: { width: 480, height: 900 } } );

test.describe( 'Soli blocks', () => {
	/**
	 * A slider page over two group pages, all created per test by the `content`
	 * fixture — which also gives them explicit slugs, so two parallel workers
	 * cannot be handed the same URL (see tests/e2e/fixtures.js).
	 *
	 * @param {Object} content The content fixture.
	 * @return {Promise<{path: string, nameA: string, slugA: string}>} Page path
	 *         plus the first group's title and slug, for the card assertions.
	 */
	async function sliderPage( content ) {
		const nameA = `${ content.uniqueSlug( 'testgroep' ) } A`;
		const groupA = await content.page( { title: nameA } );
		const groupB = await content.page( {
			title: `${ content.uniqueSlug( 'testgroep' ) } B`,
		} );

		const markup =
			`<!-- wp:soli/group-slider {"autoplay":0} -->` +
			`<!-- wp:soli/group-card {"pageId":${ groupA.id },"rehearsal":"ma · 20:00"} /-->` +
			`<!-- wp:soli/group-card {"pageId":${ groupB.id },"rehearsal":"di · 20:00"} /-->` +
			`<!-- /wp:soli/group-slider -->` +
			`<!-- wp:soli/group-card {"pageId":${ groupA.id },"rehearsal":"ma · 20:00"} /-->`;

		const holder = await content.page( {
			title: 'Blocks E2E',
			content: markup,
		} );

		return {
			path: new URL( holder.link ).pathname,
			nameA,
			slugA: groupA.slug,
		};
	}

	test( 'group card renders title, pill and link', async ( {
		page,
		content,
	} ) => {
		const { path, nameA, slugA } = await sliderPage( content );
		await page.goto( path );

		const card = page.locator( '.wp-block-soli-group-card.soli-og-card' );
		await expect( card ).toHaveCount( 1 );
		await expect( card.locator( '.soli-og-card-name' ) ).toHaveText( nameA );
		await expect( card.locator( '.soli-og-card-meta' ) ).toContainText(
			'ma · 20:00'
		);
		await expect( card ).toHaveAttribute( 'href', new RegExp( slugA ) );
	} );

	test( 'group slider renders tiles and chips and advances on next', async ( {
		page,
		content,
	} ) => {
		const { path } = await sliderPage( content );
		await page.goto( path );

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

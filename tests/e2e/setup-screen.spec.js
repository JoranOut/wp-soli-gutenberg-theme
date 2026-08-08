const { test, expect } = require( '@wordpress/e2e-test-utils-playwright' );

/**
 * Weergave → Soli setup: the wp-admin entry point to Site_Initializer.
 *
 * The seeded site already has every page from the manifest, so running the
 * initializer here doubles as the idempotency check — it must report zero
 * created and never duplicate a page.
 */
test.describe( 'Soli setup screen', () => {
	const visit = ( admin ) =>
		admin.visitAdminPage( 'themes.php', 'page=soli-setup' );

	test( 'renders under Appearance with both actions', async ( {
		admin,
		page,
	} ) => {
		await visit( admin );

		await expect(
			page.getByRole( 'heading', { name: 'Soli setup' } )
		).toBeVisible();
		await expect(
			page.getByRole( 'button', { name: 'Paginastructuur aanmaken' } )
		).toBeVisible();
		await expect(
			page.getByRole( 'button', { name: 'Demo-inhoud toevoegen' } )
		).toBeVisible();
	} );

	test( 'reports the seeded site as complete', async ( { admin, page } ) => {
		await visit( admin );

		// 21 manifest pages + 17 groups + home.
		await expect(
			page.getByText( '39 van de 39' )
		).toBeVisible();
	} );

	test( 'running it again creates nothing and duplicates nothing', async ( {
		admin,
		page,
		requestUtils,
	} ) => {
		const before = await requestUtils.rest( {
			path: '/wp/v2/pages',
			params: { per_page: 100, status: 'publish', _fields: 'id' },
		} );

		await visit( admin );
		await page
			.getByRole( 'button', { name: 'Paginastructuur aanmaken' } )
			.click();

		await expect( page.locator( '.notice-success' ) ).toContainText(
			'0 aangemaakt'
		);

		const after = await requestUtils.rest( {
			path: '/wp/v2/pages',
			params: { per_page: 100, status: 'publish', _fields: 'id' },
		} );
		expect( after.length ).toBe( before.length );
	} );

	test( 'rejects a submission without a valid nonce', async ( {
		admin,
		page,
	} ) => {
		await visit( admin );

		// Strip the nonce the way a cross-site POST would arrive without one.
		await page.evaluate( () => {
			document
				.querySelectorAll( 'input[name="_wpnonce"]' )
				.forEach( ( input ) => input.remove() );
		} );

		await page
			.getByRole( 'button', { name: 'Paginastructuur aanmaken' } )
			.click();

		// check_admin_referer() halts with WordPress's standard failure screen.
		await expect( page.locator( 'body' ) ).toContainText( /link.*verlopen|link you followed has expired/i );
	} );
} );

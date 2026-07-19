const { test, expect } = require( '@playwright/test' );

test.describe( 'Theme smoke test', () => {
	test( 'front page loads with the theme active', async ( { page } ) => {
		const response = await page.goto( '/' );
		expect( response.status() ).toBe( 200 );

		// Block themes render the theme slug as a body class.
		await expect( page.locator( 'body' ) ).toHaveClass(
			/wp-theme-wp-soli-gutenberg-theme/
		);
	} );

	test( 'design tokens are exposed as preset custom properties', async ( { page } ) => {
		await page.goto( '/' );

		const maroon = await page.evaluate( () =>
			getComputedStyle( document.body )
				.getPropertyValue( '--wp--preset--color--maroon' )
				.trim()
		);
		expect( maroon ).toBe( '#7a1f2b' );

		const cardRadius = await page.evaluate( () =>
			getComputedStyle( document.body )
				.getPropertyValue( '--wp--custom--card-radius' )
				.trim()
		);
		expect( cardRadius ).toBe( '10px 10px 3px 10px' );
	} );

	test( 'header and footer render', async ( { page } ) => {
		await page.goto( '/' );

		await expect( page.locator( 'header .wp-block-site-title' ) ).toContainText(
			'Muziekvereniging Soli'
		);
		await expect( page.locator( 'footer' ) ).toContainText( 'Driehuis' );
	} );
} );

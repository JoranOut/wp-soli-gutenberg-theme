const { test, expect } = require( '@wordpress/e2e-test-utils-playwright' );

test.describe( 'Soli patterns', () => {
	test( 'front page renders the home patterns', async ( { page } ) => {
		await page.goto( '/' );

		// Hero.
		await expect(
			page.locator( 'h1', { hasText: 'De IJmuider' } )
		).toBeVisible();

		// Welcome section.
		await expect(
			page.locator( 'h2', { hasText: 'Welkom bij Soli.' } )
		).toBeVisible();

		// Agenda teaser placeholder rows (event plugin comes later).
		await expect( page.locator( '.soli-agenda-list' ).first() ).toBeVisible();
		await expect(
			page.locator( '.soli-placeholder-note' ).first()
		).toBeVisible();

		// Group slider with the seeded groups. The seed fills it with every
		// orchestra/ensemble, so assert a working carousel with several tiles
		// rather than an exact count that changes when the group list does.
		const slider = page.locator( '.wp-block-soli-group-slider' );
		await expect( slider.locator( '.soli-tile' ).first() ).toBeVisible();
		expect(
			await slider.locator( '.soli-tile' ).count()
		).toBeGreaterThanOrEqual( 4 );

		// News section with seeded posts.
		await expect(
			page.locator( 'h2', { hasText: 'Vers van de repetitie' } )
		).toBeVisible();
	} );

	test( 'orkesten overview and group detail pages render', async ( { page } ) => {
		await page.goto( '/orkesten-en-groepen/' );
		await expect(
			page.locator( 'h1', { hasText: 'Orkesten en groepen' } )
		).toBeVisible();

		// The pattern resolves the seeded group pages by slug, so the overview
		// must show real linked cards — an empty catalogue is a regression.
		await expect( page.locator( 'a.soli-og-card' ).first() ).toBeVisible();
		expect(
			await page.locator( 'a.soli-og-card' ).count()
		).toBeGreaterThanOrEqual( 10 );

		await page.goto( '/orkesten-en-groepen/funband/' );
		await expect( page.locator( 'h1', { hasText: 'Funband' } ) ).toBeVisible();
		await expect(
			page.locator( 'h2', { hasText: 'Praktisch' } )
		).toBeVisible();
	} );

	test( 'lid-worden section offers a concrete action', async ( { page } ) => {
		await page.goto( '/vereniging/' );
		const section = page.locator( '#lid-worden' );
		await expect(
			section.locator( 'a', { hasText: 'Meld je aan via e-mail' } )
		).toBeVisible();
		await expect(
			section.locator( 'a[href^="mailto:"]' ).first()
		).toBeVisible();
	} );

	test( 'theme patterns are registered', async ( { requestUtils } ) => {
		const patterns = await requestUtils.rest( {
			path: '/wp/v2/block-patterns/patterns',
		} );
		const names = patterns.map( ( p ) => p.name );

		for ( const slug of [
			'soli-gutenberg-theme/hero-concert',
			'soli-gutenberg-theme/home-welcome',
			'soli-gutenberg-theme/home-news',
			'soli-gutenberg-theme/group-section',
			'soli-gutenberg-theme/page-home',
			'soli-gutenberg-theme/page-orkesten',
		] ) {
			expect( names ).toContain( slug );
		}
	} );
} );

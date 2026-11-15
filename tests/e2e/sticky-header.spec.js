const { test, expect } = require( './fixtures' );

/**
 * The header starts below the admin bar, which scrolls away with the page,
 * and then sticks flush to the top of the window.
 */

const measure = ( page ) =>
	page.evaluate( () => {
		const header = document.querySelector( '.soli-header' );
		const bar = document.getElementById( 'wpadminbar' );
		return {
			header: Math.round( header.getBoundingClientRect().top ),
			barBottom: bar
				? Math.round( bar.getBoundingClientRect().bottom )
				: null,
		};
	} );

const scrollDown = async ( page ) => {
	await page.evaluate( () => window.scrollTo( 0, 600 ) );
	await expect
		.poll( () => page.evaluate( () => window.scrollY ) )
		.toBeGreaterThan( 0 );
};

test.describe( 'Sticky header, logged in', () => {
	for ( const [ width, barHeight ] of [
		[ 1280, 32 ],
		[ 700, 46 ],
		[ 390, 46 ],
	] ) {
		test( `starts below the admin bar and sticks at the top at ${ width }px wide`, async ( {
			page,
		} ) => {
			await page.setViewportSize( { width, height: 800 } );
			await page.goto( '/' );

			const top = await measure( page );
			expect( top.header ).toBe( barHeight );
			expect( top.barBottom ).toBe( barHeight );

			await scrollDown( page );

			const scrolled = await measure( page );
			expect( scrolled.header ).toBe( 0 );
			expect( scrolled.barBottom ).toBeLessThanOrEqual( 0 );
		} );
	}
} );

test.describe( 'Sticky header, logged out', () => {
	test.use( { storageState: { cookies: [], origins: [] } } );

	test( 'sticks flush at the top', async ( { page } ) => {
		await page.setViewportSize( { width: 1280, height: 800 } );
		await page.goto( '/' );
		await scrollDown( page );

		const { header, barBottom } = await measure( page );
		expect( barBottom ).toBeNull();
		expect( header ).toBe( 0 );
	} );
} );

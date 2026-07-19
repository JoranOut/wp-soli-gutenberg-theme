const { test, expect } = require( '@playwright/test' );

// The click-burst bails out under reduced motion, so opt out of it here.
test.use( { reducedMotion: 'no-preference' } );

/**
 * enqueue_styles ships assets/js/soli-notes.js: clicking anywhere bursts 4–6
 * floating musical notes (.soli-note) that self-remove after the animation.
 */
test.describe( 'Click-burst interaction', () => {
	test( 'clicking the page emits musical-note elements', async ( { page } ) => {
		await page.goto( '/' );

		// Dispatch on document (where the listener lives) to avoid navigating
		// via a real click on a link.
		await page.evaluate( () => {
			document.dispatchEvent(
				new MouseEvent( 'click', {
					clientX: 200,
					clientY: 200,
					bubbles: true,
				} )
			);
		} );

		const notes = page.locator( '.soli-note' );
		await expect( notes.first() ).toBeVisible( { timeout: 1500 } );
		expect( await notes.count() ).toBeGreaterThanOrEqual( 4 );

		// They self-remove after the float animation (safety net at 1600ms).
		await expect( notes ).toHaveCount( 0, { timeout: 3000 } );
	} );
} );

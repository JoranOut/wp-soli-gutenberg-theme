const { test, expect } = require( '@wordpress/e2e-test-utils-playwright' );

const PAPER = 'rgb(245, 239, 230)'; // #f5efe6

/**
 * Editor-only business logic in functions.php:
 * - post_editor_style: paper writing canvas, scoped to the post editor.
 * - editor_content_width: 736px writing column, scoped to the post editor.
 * - register_block_styles: the six Soli block style variations.
 */
test.describe( 'Editor business logic', () => {
	test( 'post editor canvas is paper', async ( { admin, editor } ) => {
		await admin.createNewPost( { postType: 'post' } );
		const bg = await editor.canvas
			.locator( 'body' )
			.evaluate( ( el ) => getComputedStyle( el ).backgroundColor );
		expect( bg ).toBe( PAPER );
	} );

	test( 'page editor canvas is NOT paper (scope check)', async ( {
		admin,
		editor,
	} ) => {
		await admin.createNewPost( { postType: 'page' } );
		const bg = await editor.canvas
			.locator( 'body' )
			.evaluate( ( el ) => getComputedStyle( el ).backgroundColor );
		expect( bg ).not.toBe( PAPER );
	} );

	test( 'post editor caps the writing column to 736px', async ( {
		admin,
		editor,
	} ) => {
		await admin.createNewPost( { postType: 'post' } );
		const size = await editor.canvas
			.locator( '.is-root-container' )
			.evaluate( ( el ) =>
				getComputedStyle( el )
					.getPropertyValue( '--wp--style--global--content-size' )
					.trim()
			);
		expect( size ).toBe( '736px' );
	} );

	test( 'page editor keeps the wider content size (scope check)', async ( {
		admin,
		editor,
	} ) => {
		await admin.createNewPost( { postType: 'page' } );
		const size = await editor.canvas
			.locator( '.is-root-container' )
			.evaluate( ( el ) =>
				getComputedStyle( el )
					.getPropertyValue( '--wp--style--global--content-size' )
					.trim()
			);
		expect( size ).not.toBe( '736px' );
	} );

	test( 'Soli block style variations are registered', async ( {
		admin,
		page,
	} ) => {
		await admin.createNewPost( { postType: 'post' } );

		const styles = await page.evaluate( () => {
			const names = ( block ) =>
				wp.data
					.select( 'core/blocks' )
					.getBlockStyles( block )
					.map( ( s ) => s.name );
			return {
				button: names( 'core/button' ),
				group: names( 'core/group' ),
				quote: names( 'core/quote' ),
			};
		} );

		expect( styles.button ).toEqual(
			expect.arrayContaining( [ 'outline-maroon', 'gold-cta' ] )
		);
		expect( styles.group ).toEqual(
			expect.arrayContaining( [
				'soli-card',
				'soli-panel',
				'soli-placeholder',
			] )
		);
		expect( styles.quote ).toEqual(
			expect.arrayContaining( [ 'soli-quote' ] )
		);
	} );
} );

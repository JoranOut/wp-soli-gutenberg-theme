const { test, expect } = require( './fixtures' );

/**
 * Phone-width behaviour: the collapsed navigation overlay, the "Word lid" CTA
 * swap in the header, the stacked hero and pages that fit the screen width.
 */

const PHONE = { width: 390, height: 844 };
const DESKTOP = { width: 1280, height: 900 };

const openButton = '.soli-header .wp-block-navigation__responsive-container-open';
const overlay = '.soli-header .wp-block-navigation__responsive-container';
const closeButton =
	'.soli-header .wp-block-navigation__responsive-container-close';

/**
 * Tap on touch projects (mobile-safari), click elsewhere: `tap()` throws
 * in a context without touch support.
 *
 * @param {import('@playwright/test').Locator} locator  Target.
 * @param {boolean}                            hasTouch Context has touch.
 */
const press = ( locator, hasTouch ) =>
	hasTouch ? locator.tap() : locator.click();

test.describe( 'Mobile header', () => {
	test.use( { viewport: PHONE } );

	test( 'collapses the navigation behind a menu button', async ( {
		page,
	} ) => {
		await page.goto( '/' );

		await expect( page.locator( openButton ) ).toBeVisible();
		await expect( page.locator( overlay ) ).not.toHaveClass(
			/is-menu-open/
		);
		await expect(
			page.locator( `${ overlay } .wp-block-pages-list__item` ).first()
		).toBeHidden();

		// The standalone button gives way to the nav-link inside the overlay.
		await expect( page.locator( '.soli-header-cta' ) ).toBeHidden();
	} );

	test( 'the overlay opens with the pages and Word lid, and closes again', async ( {
		page,
		hasTouch,
	} ) => {
		await page.goto( '/' );
		await press( page.locator( openButton ), hasTouch );

		const menu = page.locator( overlay );
		await expect( menu ).toHaveClass( /is-menu-open/ );
		await expect(
			menu.locator( '.wp-block-pages-list__item a' ).first()
		).toBeVisible();

		const cta = menu.locator( '.soli-mobile-cta a' );
		await expect( cta ).toBeVisible();
		await expect( cta ).toHaveAttribute( 'href', /\/vereniging\/#lid-worden$/ );

		await press( page.locator( closeButton ), hasTouch );
		await expect( menu ).not.toHaveClass( /is-menu-open/ );

		// Keyboard only: core listens for Escape inside the overlay, and a tap
		// in WebKit does not move focus there.
		if ( hasTouch ) {
			return;
		}
		await press( page.locator( openButton ), hasTouch );
		await expect( menu ).toHaveClass( /is-menu-open/ );
		await page.keyboard.press( 'Escape' );
		await expect( menu ).not.toHaveClass( /is-menu-open/ );
	} );
} );

test.describe( 'Desktop header', () => {
	test.use( { viewport: DESKTOP } );
	test.skip( ( { isMobile } ) => isMobile, 'desktop-only check' );

	test( 'shows the navigation inline and the standalone Word lid button', async ( {
		page,
	} ) => {
		await page.goto( '/' );

		await expect( page.locator( openButton ) ).toBeHidden();
		await expect(
			page.locator( `${ overlay } .wp-block-pages-list__item a` ).first()
		).toBeVisible();
		await expect(
			page.locator( '.soli-header-cta .wp-block-button__link' )
		).toBeVisible();
		await expect( page.locator( '.soli-mobile-cta' ) ).toBeHidden();
	} );
} );

test.describe( 'Mobile layout', () => {
	test.use( { viewport: PHONE } );

	test( 'the front-page hero stacks its columns', async ( { page } ) => {
		await page.goto( '/' );

		const columns = page.locator(
			'.soli-hero .wp-block-cover__inner-container > .wp-block-columns > .wp-block-column'
		);
		await expect( columns ).toHaveCount( 2 );

		const first = await columns.nth( 0 ).boundingBox();
		const second = await columns.nth( 1 ).boundingBox();
		expect( second.y ).toBeGreaterThanOrEqual( first.y + first.height - 1 );
	} );

	const routes = [
		{ name: 'front page', path: '/' },
		{ name: 'posts page', path: '/nieuws/' },
		{ name: 'single post', path: null },
		{ name: 'search results', path: '/?s=Soli' },
		{ name: '404', path: '/deze-pagina-bestaat-niet-e2e/' },
	];

	for ( const route of routes ) {
		test( `${ route.name } fits the screen width`, async ( {
			page,
			content,
		} ) => {
			let target = route.path;

			if ( null === target ) {
				const post = await content.post( {
					title: 'Mobiel testbericht met een vrij lange titel die moet afbreken',
					content:
						'<!-- wp:paragraph --><p>Inhoud voor de single template op een smal scherm.</p><!-- /wp:paragraph -->',
					// Back-dated so it does not disturb the newest news pages.
					date: '2017-03-01T10:00:00',
				} );
				target = new URL( post.link ).pathname;
			}

			await page.goto( target );
			await page.waitForLoadState( 'load' );

			const overflow = await page.evaluate( () => {
				const width = document.documentElement.clientWidth;
				// The admin bar (storage state is logged in) is not theme markup.
				const wide = [
					...document.querySelectorAll( 'body *:not(#wpadminbar *)' ),
				]
					.filter( ( el ) => {
						const rect = el.getBoundingClientRect();
						return rect.width > 0 && rect.right > width + 1;
					} )
					.slice( 0, 5 )
					.map(
						( el ) =>
							`${ el.tagName.toLowerCase() }.${ [
								...el.classList,
							].join( '.' ) }`
					);

				return {
					scrollWidth: document.documentElement.scrollWidth,
					width,
					wide,
				};
			} );

			expect(
				overflow.scrollWidth,
				`horizontal scroll on ${ route.name }; widest offenders: ${ overflow.wide.join(
					', '
				) }`
			).toBeLessThanOrEqual( overflow.width );
		} );
	}
} );

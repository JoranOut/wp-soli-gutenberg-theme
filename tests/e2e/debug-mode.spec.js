const { test, expect } = require( './fixtures' );

/**
 * Guards the environment `php-errors.spec.js` depends on.
 *
 * Every "renders without PHP diagnostics" assertion in this suite works by
 * reading PHP diagnostics out of the rendered document. That only happens when
 * both `WP_DEBUG` and `WP_DEBUG_DISPLAY` are enabled: `wp_debug_mode()` leaves
 * `display_errors` untouched when `WP_DEBUG` is false, and then no PHP
 * diagnostic of any severity — not even a fatal — reaches the page, so those
 * assertions pass unconditionally.
 *
 * wp-env's own `DEFAULT_CONFIG` sets `env.tests.config.WP_DEBUG = false`, and
 * environment-specific defaults beat the root-level `config`, so a root-level
 * `WP_DEBUG: true` does not reach the tests environment. `.wp-env.json`
 * therefore declares the debug constants a second time under `env.tests.config`.
 * This spec fails loudly if that ever regresses, instead of letting the
 * diagnostics assertions go quietly vacuous.
 */

/**
 * Site Health's "Enabled", in the locales this site is ever installed in.
 *
 * `bin/setup.sh` activates `nl_NL`, so the value cell reads "Ingeschakeld"
 * rather than "Enabled". Both are accepted so the guard survives a language
 * change instead of failing for the wrong reason. The alternation is anchored:
 * the Dutch negative, "Uitgeschakeld", contains "geschakeld" as a substring and
 * must never satisfy this.
 */
const ENABLED = /^(Enabled|Ingeschakeld)$/;

/**
 * Reads a constant's reported state from the Site Health "Info" tab.
 *
 * The constants live in a collapsed accordion panel, so the value is read from
 * `textContent` (which Playwright's `toHaveText` uses) rather than from
 * `innerText`, which is empty for hidden elements.
 *
 * @param {import('@playwright/test').Page} page     Page on the Info tab.
 * @param {string}                          constant Constant name.
 * @return {import('@playwright/test').Locator} The value cell.
 */
function constantValue( page, constant ) {
	return page
		.locator( '#health-check-accordion-block-wp-constants tr', {
			has: page.locator( 'th', {
				hasText: new RegExp( `^${ constant }$` ),
			} ),
		} )
		.locator( 'td' );
}

test.describe( 'PHP diagnostics are visible in the test environment', () => {
	test( 'WP_DEBUG and WP_DEBUG_DISPLAY are enabled', async ( { page } ) => {
		// Site Health's Info tab reports the constants as they were actually
		// defined in wp-config.php, which is the value that matters. The suite
		// is already authenticated as admin through the shared storage state
		// created by @wordpress/scripts' Playwright global setup, so no login
		// step is needed here.
		await page.goto( '/wp-admin/site-health.php?tab=debug' );

		await expect( constantValue( page, 'WP_DEBUG' ) ).toHaveText( ENABLED );
		await expect( constantValue( page, 'WP_DEBUG_DISPLAY' ) ).toHaveText(
			ENABLED
		);
	} );
} );

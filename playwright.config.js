const path = require( 'path' );
const { defineConfig, devices } = require( '@playwright/test' );

// Same default as @wordpress/e2e-test-utils-playwright uses internally.
const STORAGE_STATE =
	process.env.STORAGE_STATE_PATH ||
	path.join( process.cwd(), 'artifacts/storage-states/admin.json' );

/**
 * Playwright configuration for Soli Gutenberg Theme e2e tests.
 *
 * @see https://playwright.dev/docs/test-configuration
 */
module.exports = defineConfig( {
	testDir: './tests/e2e',
	fullyParallel: true,
	forbidOnly: !! process.env.CI,
	retries: process.env.CI ? 2 : 0,
	workers: process.env.CI ? 1 : undefined,
	reporter: 'html',
	globalSetup: require.resolve(
		'@wordpress/scripts/config/playwright/global-setup.js'
	),
	use: {
		baseURL: process.env.WP_BASE_URL || 'http://localhost:8889',
		storageState: STORAGE_STATE,
		trace: 'on-first-retry',
		screenshot: 'only-on-failure',
	},
	projects: [
		{
			name: 'chromium',
			use: { ...devices[ 'Desktop Chrome' ] },
		},
	],
	webServer: {
		command: 'npm run env:start',
		// Wait for the tests site itself, honoring WP_BASE_URL so local
		// .wp-env.override.json port overrides work too.
		url: process.env.WP_BASE_URL || 'http://localhost:8889',
		reuseExistingServer: true,
		timeout: 120000,
	},
} );

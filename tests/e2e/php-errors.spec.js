const { test, expect } = require( '@wordpress/e2e-test-utils-playwright' );

/**
 * Every front-end route must render through its template without PHP
 * diagnostics.
 *
 * This spec is only meaningful when `WP_DEBUG` is true *in the tests
 * environment*. wp-env does not carry the top-level `config` block of
 * `.wp-env.json` into the tests environment — it forces `WP_DEBUG` to false
 * there — so `.wp-env.json` declares the debug constants a second time under
 * `env.tests.config`. Without that block WordPress lowers `error_reporting`
 * below E_WARNING and these assertions silently pass over real warnings.
 */

/**
 * PHP's display_errors output, both the html_errors=On form
 * ("<b>Warning</b>:  … in <b>/path.php</b> on line <b>12</b>") and the plain
 * form ("Warning: … in /path.php on line 12"). WordPress's own
 * `_doing_it_wrong()` / `_deprecated_*()` notices use the same labels, so
 * misuse of core APIs is caught as well.
 */
const PHP_DIAGNOSTIC =
	/(?:<b>)?(Warning|Notice|Deprecated|Fatal error|Parse error|Recoverable fatal error|Uncaught \w*Error)(?:<\/b>)?:/;

/**
 * Asserts the served markup carries no PHP diagnostic, quoting the offending
 * excerpt so a failure names the warning instead of just the route.
 *
 * @param {import('@playwright/test').Page} page  Page holding the response.
 * @param {string}                          route Route, for the message.
 */
async function expectNoPhpDiagnostics( page, route ) {
	const html = await page.content();
	const match = html.match( PHP_DIAGNOSTIC );

	if ( match ) {
		const excerpt = html
			.slice(
				Math.max( 0, match.index - 100 ),
				match.index + 400
			)
			.replace( /\s+/g, ' ' );
		throw new Error(
			`PHP diagnostic while rendering ${ route }:\n${ excerpt }`
		);
	}
}

test.describe( 'Front-end renders without PHP diagnostics', () => {
	const created = { posts: [] };
	let postLink;

	test.beforeAll( async ( { requestUtils } ) => {
		const post = await requestUtils.rest( {
			path: '/wp/v2/posts',
			method: 'POST',
			data: {
				title: 'PHP diagnose testbericht',
				content:
					'<!-- wp:paragraph --><p>Inhoud voor de single template.</p><!-- /wp:paragraph -->',
				status: 'publish',
				// Back-dated so it does not disturb the newest news pages.
				date: '2017-02-01T10:00:00',
			},
		} );
		created.posts.push( post.id );
		postLink = post.link;
	} );

	test.afterAll( async ( { requestUtils } ) => {
		for ( const id of created.posts ) {
			await requestUtils.rest( {
				path: `/wp/v2/posts/${ id }`,
				method: 'DELETE',
				params: { force: true },
			} );
		}
	} );

	/**
	 * Each route also names a selector that only resolves when the intended
	 * template — and the header/footer template parts it pulls in — actually
	 * loaded, so a missing or renamed template fails here rather than passing
	 * as "no errors on a blank page".
	 */
	const routes = [
		{
			name: 'front page (front-page.html)',
			path: '/',
			marker: 'main .wp-block-soli-group-slider',
		},
		{
			name: 'posts page (home.html)',
			path: '/nieuws/',
			marker: 'main .soli-news-feature',
		},
		{
			name: 'single post (single.html)',
			path: null, // resolved from the seeded post
			marker: 'main .soli-post-title',
		},
		{
			name: 'search results (search.html)',
			path: '/?s=Soli',
			marker: 'main .wp-block-query-title',
		},
		{
			name: '404 (404.html)',
			path: '/deze-pagina-bestaat-niet-e2e/',
			marker: 'main',
		},
	];

	for ( const route of routes ) {
		test( `${ route.name }`, async ( { page } ) => {
			const target = route.path ?? postLink;
			const response = await page.goto( target );

			// The 404 route must genuinely 404; the rest must be 200.
			expect( response.status() ).toBe(
				route.path === '/deze-pagina-bestaat-niet-e2e/' ? 404 : 200
			);

			// Template parts resolved.
			await expect(
				page.locator( 'header .wp-block-site-title' )
			).toBeVisible();
			await expect( page.locator( 'footer' ) ).toBeVisible();

			// The route's own template resolved.
			await expect( page.locator( route.marker ).first() ).toBeVisible();

			await expectNoPhpDiagnostics( page, route.name );
		} );
	}

	test( 'WP_DEBUG is enabled, so the assertions above are not vacuous', async ( {
		page,
	} ) => {
		// A guard on the guard: WordPress only reports E_WARNING and below
		// when WP_DEBUG is true. `wp-env` silently drops the top-level
		// `config` block for the tests environment, so if `env.tests.config`
		// ever loses WP_DEBUG this test fails loudly instead of every check
		// above turning into a no-op.
		//
		// Site Health's debug tab reports the constants as they were actually
		// defined in wp-config.php, which is the value that matters.
		await page.goto( '/wp-admin/site-health.php?tab=debug' );
		await expect(
			page.locator( '.health-check-body' ).first()
		).toBeVisible();

		const debugInfo = await page.content();
		expect( debugInfo ).toMatch( /^WP_DEBUG:\s*true$/m );
	} );
} );

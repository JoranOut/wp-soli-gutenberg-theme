const base = require( '@wordpress/e2e-test-utils-playwright' );

/**
 * A per-test content fixture.
 *
 * Two things about this suite made specs interfere with each other when
 * Playwright ran them across several workers (`fullyParallel: true`), and both
 * are fixed here rather than in each spec:
 *
 * 1. Fixtures lived in `test.beforeAll` with the created IDs in module scope.
 *    Under `fullyParallel` every test is its own group, so a worker that picks
 *    up a second test from the same file runs `beforeAll` again — while the
 *    module-level array still holds the previous group's (already deleted) IDs.
 *    `afterAll` then DELETEd a stale ID, got `rest_post_invalid_id`, threw, and
 *    abandoned the rest of the cleanup. Leaked content accumulated from run to
 *    run. This fixture is test-scoped, so there is nothing to share and nothing
 *    to re-run: each test gets its own content and its own teardown.
 *
 * 2. Every spec posted a fixed title and let WordPress derive the slug.
 *    `wp_unique_post_slug()` is not race-safe: concurrent inserts of the same
 *    title all read the same "highest suffix in use" and can be handed the same
 *    slug. Two workers then resolved the same URL and each saw the other's
 *    content — which is what made the counts wobble. Every helper here sends an
 *    explicit process-unique slug, so WordPress never has to deduplicate.
 *
 * Teardown deletes in reverse creation order and tolerates an already-removed
 * ID, so one missing object can never abandon the remaining cleanup.
 */

let sequence = 0;

/**
 * A slug that cannot collide with another worker, another run, or itself.
 *
 * @param {string} prefix Readable prefix, so leftovers are identifiable.
 * @return {string} Unique slug.
 */
function uniqueSlug( prefix ) {
	sequence += 1;
	const worker = process.env.TEST_WORKER_INDEX ?? '0';

	return `${ prefix }-w${ worker }-${ process.pid }-${ sequence }`;
}

/**
 * A one-hour publish-date window no other worker or run will write into.
 *
 * Adjacency (`get_previous_post()`/`get_next_post()`, behind soli/post-nav) is
 * computed over every post on the site and cannot be narrowed by category, so it
 * is only deterministic if nothing else sits between the posts under test.
 * Each call hands out a distinct hour of 2011 — a year no spec publishes into —
 * derived from the pid, the worker index and the call sequence, so two parallel
 * workers can never be handed the same one.
 *
 * @return {{at: (offsetSeconds: number) => string}} Date builder for the window.
 */
function uniqueWindow() {
	sequence += 1;
	const worker = Number( process.env.TEST_WORKER_INDEX ?? 0 );
	// 8760 hours in 2011.
	const hour = ( process.pid * 977 + worker * 61 + sequence ) % 8760;
	const start = Date.UTC( 2011, 0, 1 ) + hour * 3600 * 1000;

	return {
		at: ( offsetSeconds ) =>
			new Date( start + offsetSeconds * 1000 )
				.toISOString()
				.slice( 0, 19 ),
	};
}

/**
 * REST error codes that mean "already gone", which is fine during teardown.
 */
const GONE = [ 'rest_post_invalid_id', 'rest_term_invalid', 'rest_no_route' ];

const test = base.test.extend( {
	content: async ( { requestUtils }, use ) => {
		/** @type {string[]} REST paths to delete, newest first. */
		const trash = [];

		const create = async ( type, data ) => {
			const record = await requestUtils.rest( {
				path: `/wp/v2/${ type }`,
				method: 'POST',
				data: {
					status: 'publish',
					slug: uniqueSlug( `soli-e2e-${ type }` ),
					...data,
				},
			} );
			trash.unshift( `/wp/v2/${ type }/${ record.id }` );

			return record;
		};

		await use( {
			uniqueSlug,
			uniqueWindow,

			/**
			 * @param {Object} data REST payload; `slug` and `status` default.
			 * @return {Promise<Object>} The created post.
			 */
			post: ( data ) => create( 'posts', data ),

			/**
			 * @param {Object} data REST payload; `slug` and `status` default.
			 * @return {Promise<Object>} The created page.
			 */
			page: ( data ) => create( 'pages', data ),

			/**
			 * A category nothing else can land in, so a Query Loop restricted to
			 * it holds exactly the posts this test put there.
			 *
			 * @param {string} [name] Display name; defaults to the slug.
			 * @return {Promise<Object>} The created term.
			 */
			category: async ( name ) => {
				const slug = uniqueSlug( 'soli-e2e-cat' );
				const term = await requestUtils.rest( {
					path: '/wp/v2/categories',
					method: 'POST',
					data: { name: name ?? slug, slug },
				} );
				trash.unshift( `/wp/v2/categories/${ term.id }` );

				return term;
			},
		} );

		for ( const path of trash ) {
			try {
				await requestUtils.rest( {
					path,
					method: 'DELETE',
					params: { force: true },
				} );
			} catch ( error ) {
				if ( ! GONE.includes( error?.code ) ) {
					throw error;
				}
			}
		}
	},
} );

module.exports = { test, expect: base.expect };

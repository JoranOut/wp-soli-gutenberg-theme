# E2E Coverage Tracker

Inventory for the task "list all business logic, blocks and special queries; ensure an e2e test for every one of them", mapping each testable unit to the spec that covers it.

Run locally against the tests env: `WP_BASE_URL=http://localhost:8903 npm run test:e2e`

`.wp-env.json` pins this repo to ports **8902** (dev) and **8903** (tests) so it cannot
collide with the other Soli repos running a wp-env concurrently. `playwright.config.js`
still defaults its `baseURL` to 8889, so `WP_BASE_URL` must be set when running by hand
(or in a local, gitignored `.wp-env.override.json`).

Legend: ✅ covered · ⛔ not e2e-suitable

## Blocks (`src/blocks/*`)

| Block | Rendering | Covered by | Status |
|-------|-----------|------------|--------|
| `soli/group-card` | dynamic (overview card + slider tile) | `blocks.spec.js` | ✅ |
| `soli/group-slider` | dynamic + Interactivity (chips, next, static fallback) | `blocks.spec.js`, `patterns.spec.js` | ✅ |
| `soli/masonry` | dynamic + Interactivity (column packing, load-more) | `masonry.spec.js` | ✅ |
| `soli/post-nav` | dynamic (prev/next adjacent post cards) | `content-blocks.spec.js` | ✅ |
| `soli/concert-details` | dynamic (facts table, filters empty rows) | `content-blocks.spec.js` | ✅ |
| `soli/flyer-callout` | dynamic (link card, new-tab rel) | `content-blocks.spec.js` | ✅ |
| `soli/program-list` | dynamic (pill list, filters empty items) | `content-blocks.spec.js` | ✅ |

## Business logic (`functions.php`)

| Unit | Behavior | Covered by | Status |
|------|----------|------------|--------|
| `setup` | textdomain + `add_editor_style(soli.css)` | `theme-active.spec.js` | ✅ |
| `post_editor_style` | paper canvas in the **post** editor only (+ page scope check) | `editor.spec.js` | ✅ |
| `fix_query_offset` | recomputes the SQL offset for offset queries | behaviour covered by `masonry.spec.js`; the filter itself is redundant on WP 7.0 (core `build_query_vars_from_query_block()` already computes the same value), so no test can distinguish it | ⛔ |
| `enqueue_styles` | front CSS + `soli-notes.js` click burst | `interactions.spec.js` | ✅ |
| `editor_content_width` | 736px writing column in the post editor only (+ page scope check) | `editor.spec.js` | ✅ |
| `register_blocks` | blocks registered from manifest | all block specs render dynamic output | ✅ |
| `register_block_styles` | outline-maroon, gold-cta, soli-card, soli-panel, soli-placeholder, soli-quote | `editor.spec.js` | ✅ |
| `register_pattern_category` | `soli` category (patterns registered under it) | `patterns.spec.js` | ✅ |
| `github_updater` | admin-only external update check | external HTTP to GitHub — not e2e-suitable | ⛔ |

## Special queries

| Query | Where | Covered by | Status |
|-------|-------|------------|--------|
| Feature post (perPage 1) | `home.html` | `queries.spec.js`, `masonry.spec.js` | ✅ |
| News grid + load-more (perPage 3, offset 1) | `home.html` + masonry | `masonry.spec.js` | ✅ |
| Category / archive loop (perPage 12, masonry) | `archive.html` | `queries.spec.js` | ✅ |
| Search results | `search.html` | `queries.spec.js` | ✅ |
| Adjacent posts (`get_previous/next_post`) | `post-nav` render | `content-blocks.spec.js` | ✅ |
| Blog fallback loop (perPage 10, inherit) | `index.html` | core inherited loop, unreachable with archive/search/home present; exercised equivalently by archive + search | ⛔ |

## Spec files

- `theme-active.spec.js` — smoke, design tokens, header/footer (pre-existing)
- `blocks.spec.js` — group-card, group-slider (pre-existing)
- `patterns.spec.js` — front page, orkesten, pattern + category registration (pre-existing)
- `content-blocks.spec.js` — concert-details, flyer-callout, program-list, post-nav (NEW)
- `masonry.spec.js` — masonry packing, responsive column counts, load-more batching (NEW)
- `queries.spec.js` — feature, category archive, search (NEW)
- `editor.spec.js` — paper canvas, 736px width (both post-scoped), block styles (NEW)
- `interactions.spec.js` — soli-notes click burst (NEW)
- `php-errors.spec.js` — every front-end route (front page, posts page, single, search, 404) resolves its template + header/footer parts and renders with no PHP warning/notice/deprecation, plus a guard asserting `WP_DEBUG` is really on in the tests env (NEW)
- `debug-mode.spec.js` — reads `WP_DEBUG` and `WP_DEBUG_DISPLAY` off the Site Health
  Info tab and fails unless both report enabled, so the diagnostics assertions above
  cannot go vacuous when wp-env's tests-env defaults win over the root-level config (NEW)

## Notes / decisions

- The debug constants live in `.wp-env.json` **twice** (top-level `config` and
  `env.tests.config`). wp-env forces `WP_DEBUG`/`SCRIPT_DEBUG` to false in the
  tests environment and ignores the top-level block there, so without the
  duplicate the PHP-diagnostic assertions pass over real warnings. See CLAUDE.md.

- Tests target the **tests** env on port 8903 (pinned in `.wp-env.json`); 8889 hosts a
  different project locally, so `WP_BASE_URL` must be set when running by hand.
- Every spec that needs content uses the per-test `content` fixture in
  `tests/e2e/fixtures.js` rather than `test.beforeAll` with module-level state.
  Two things made the suite unreliable under `fullyParallel` before that:

  1. Under `fullyParallel` each test is its own group, so a worker picking up a
     second test from the same file re-runs `beforeAll` while the module-level
     ID array still holds the previous group's deleted IDs. `afterAll` then
     DELETEd a stale ID, hit `rest_post_invalid_id`, threw, and abandoned the
     rest of the cleanup — leaking content from run to run.
  2. Specs posted fixed titles and let WordPress derive the slug.
     `wp_unique_post_slug()` is not race-safe, so concurrent inserts of the same
     title can be handed the *same* slug; two workers then resolved one URL and
     read each other's content. Every helper now sends an explicit
     process-unique slug.

  Teardown is per test, deletes in reverse creation order and tolerates an
  already-removed ID.

- `masonry.spec.js` builds home.html's news grid on a page of its own over a
  category of its own, so the batch sizes and page count are exact instead of
  moving with the shared post pool. Titles are read via one atomic `$$eval` so
  the Interactivity re-pack can't be caught mid-rebuild.
- Specs that publish into the shared archive back-date their posts so they never
  disturb the newest news pages. `soli/post-nav` adjacency cannot be scoped to a
  category, so that test reserves its own publish window (`content.uniqueWindow`).
- The suite is verified green both serially (as CI runs it, `workers: 1`) and with
  8 parallel workers, with no net content left behind.

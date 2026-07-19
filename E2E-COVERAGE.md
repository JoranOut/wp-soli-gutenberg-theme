# E2E Coverage Tracker

Inventory for the task "list all business logic, blocks and special queries; ensure an e2e test for every one of them", mapping each testable unit to the spec that covers it.

Run locally against the tests env: `WP_BASE_URL=http://localhost:8891 npm run test:e2e`
(In CI this project's env owns the default ports, so `npm run test:e2e` is enough.)

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
| `fix_query_offset` | correct offset pagination (no page-1/page-2 overlap) | `masonry.spec.js` | ✅ |
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
- `masonry.spec.js` — masonry packing + load-more + offset fix (NEW)
- `queries.spec.js` — feature, category archive, search (NEW)
- `editor.spec.js` — paper canvas, 736px width (both post-scoped), block styles (NEW)
- `interactions.spec.js` — soli-notes click burst (NEW)

## Notes / decisions

- Tests target the **tests** env on port 8891 (this project's `.wp-env.override.json`);
  8889 hosts a different project locally, so `WP_BASE_URL` must be set when running by hand.
- `masonry.spec.js` deliberately creates **no** extra posts: totals then depend on run
  order/other specs. It asserts invariants stable on any seed — 3 initial cards (perPage),
  an appended non-overlapping batch (offset fix), and button retirement — reading titles
  via one atomic `$$eval` so the Interactivity re-pack can't be caught mid-rebuild.
- Post-creating specs back-date their posts so they never disturb the newest news pages.

# wp-soli-gutenberg-theme

Block theme (Full Site Editing) for soli.nl. Built from the static mockup in `/git/soli/soli_mockup` (see that repo's `build.mjs` for the original content/data).

## Purpose & responsibilities

- Design system for soli.nl via `theme.json` v3 (palette, self-hosted fonts, fluid type, layout).
- Templates and template parts (header/footer) rendering the site chrome.
- Patterns (category **Soli**) as the building blocks for pages; full-page starter patterns are offered when creating a new page.
- Two theme-bundled blocks (`src/blocks/` → `build/`).

Out of scope (placeholders only): events/agenda (`wp-soli-event-plugin`), mededelingen on Mijn Soli, mega-menu (`wp-soli-menu-blocks-plugin`). The header uses `core/navigation` until the mega-menu is wired in.

## Architecture

```
theme.json          design tokens + templateParts + customTemplates
templates/          index, front-page, home (news index), single, archive,
                    search, 404, page, page-canvas (no title), page-group (hero)
parts/              header.html / footer.html → thin wrappers around
                    patterns/hidden-header.php / hidden-footer.php (PHP = i18n + dynamic URLs)
patterns/           section patterns + page starter patterns (Post Types: page)
src/blocks/         group-card, group-slider (build: npm run build:blocks)
assets/             fonts (woff2), css/soli.css (signature CSS), images (logos + demo)
includes/           content manifest + site initializer + wp-admin setup screen + WP-CLI
bin/setup.sh        wp-env afterStart: activates theme, then calls wp soli init-pages/seed-demo
```

### Site initialization

The whole site structure is declared once in `includes/class-content-manifest.php`
(21 pages + 17 group pages + home, plus the demo news archive). `Site_Initializer`
applies it, and three entry points share that one path so they cannot drift:

- **wp-admin** — *Weergave → Soli setup*. Two actions: **Paginastructuur** (pages,
  hierarchy, templates, front/posts page — safe on real sites) and **Demo-inhoud**
  (mockup news + demo photos, deletes *Hallo wereld!* — local only).
- **WP-CLI** — `wp soli init-pages`, `wp soli seed-demo`. Works over SSH on Antagonist.
- **bin/setup.sh** — wp-env afterStart, now just a thin wrapper around those commands.

Everything is idempotent, matched by slug: re-running fills gaps and never
overwrites edited content. Ordering is load-bearing — a parent page must be
created before its children, and every group page before `home`, because the
home slider bakes literal `pageId` values into `soli/group-card`.

### Custom blocks

- **`soli/group-card`** — dynamic (`render.php`). Attributes `pageId`, `rehearsal`, `showArrow`. Renders the selected page's featured image, title, excerpt and a rehearsal pill. Two faces: overview card, or slider tile when inside the slider (context `soli/displayMode = tile`).
- **`soli/group-slider`** — dynamic parent (InnerBlocks restricted to `soli/group-card`, provides `soli/displayMode = tile`). Interactivity API `view.js` (autoplay, swipe, chips, shutter transition). Fewer than 2 valid cards → renders a static row.
- **`soli/post-search`** — dynamic (`render.php`), a plain GET form that filters a **core Query Loop** on the same page. It holds no query logic: it writes `?q=term` (plus `?q_type=post_type` when scoped) and `soli_gutenberg_theme_query_loop_search()` in `functions.php` injects that into the loop via `query_loop_block_query_vars`. Requires the loop to be set to *not* inherit; inherited loops render from the main query and never reach the filter. See the gotcha below.

Blocks are registered in `functions.php` via `wp_register_block_types_from_metadata_collection( build/blocks, build/blocks-manifest.php )`. Build with `npm run build:blocks` (uses `--blocks-manifest --experimental-modules`; the modules flag is required for `viewScriptModule`).

### Content model

- News = core posts (`home.html` renders the posts page, permalinks `/blog/%year%/%monthnum%/%day%/%postname%/`).
- Orchestras/groups = page hierarchy under */orkesten-en-groepen/*; group pages use the **Groepspagina** template; the overview is a page repeating `soli/group-card` blocks.
- Pages whose starter pattern includes its own hero use the **Paginacanvas** template (no rendered title).

## Development

```bash
npm install && npm run build:blocks
npm run env:start     # http://localhost:8888 (admin/password); seeds demo content
npm run start         # block watch mode
npm run test:e2e      # Playwright against the tests env (:8889)
```

- `.wp-env.json` sets `WP_DEVELOPMENT_MODE=theme` — without it WordPress caches the theme's pattern-file list in a transient and new pattern files don't show up.
- `playwright.config.js` uses the wp-scripts global setup + storage state so `@wordpress/e2e-test-utils-playwright` admin/editor fixtures work.
- **The debug constants in `.wp-env.json` are deliberately declared twice** — once in the top-level `config` and again under `env.tests.config`. wp-env does not carry the top-level block into the *tests* environment; it forces `WP_DEBUG` and `SCRIPT_DEBUG` to false there. Since Playwright runs against the tests env, dropping `env.tests.config` lowers `error_reporting` below `E_WARNING` and every "no PHP errors" assertion in `php-errors.spec.js` silently passes over real warnings. Verify with `wp-env run tests-cli wp config get WP_DEBUG` (must print `1`); the last test in `php-errors.spec.js` guards it from inside the suite.

## Gotchas

- The blocks manifest keys are relative to `build/blocks`, so registration passes `build/blocks` (not `build`) as the collection path.
- Pattern PHP escapes everything; block markup in patterns must keep serialized HTML in sync with the block comment attributes.
- `soli/group-card` inside a pattern with `pageId: 0` renders nothing on the front end (editor shows a page picker placeholder) — starter patterns rely on the editor choosing pages.
- Group pages are children of *orkesten-en-groepen*, so `get_page_by_path( 'bigband' )` returns null — it matches the full hierarchical path. Look pages up by slug (`get_posts` with `name`) instead; `Site_Initializer::find_by_slug()` exists for this.
- Query Loop search scoping has to travel in the URL: `core/query` declares `namespace` as an attribute but does **not** list it in `providesContext` (checked against WP 7.0), so PHP filters cannot tell two loops apart by anything except `queryId` or `postType`. Hence the `q_type` param on `soli/post-search`.
- `build_query_vars_from_query_block()` always writes an explicit `orderby` (default `date`), so a search term alone does not give relevance ranking — the filter sets `orderby => relevance` too. WP's relevance is a crude title/content `LIKE` score; real ranking needs `posts_search`/`posts_orderby` or a plugin.

## Versioning

Version synced in 4 places: `style.css` header, `SOLI_GUTENBERG_THEME__VERSION` in `functions.php`, `README.md` (`~Current Version:x.x.x~`), `package.json`. Release/nightly/test/auto-merge workflows in `.github/workflows/` follow the org-wide flow in `/git/soli/CLAUDE.md`. `npm run publish` builds blocks and zips (exclusions in `.zipignore`; `build/` is gitignored but must be in the zip — CI builds before publishing).

## Translations

Locales `nl_NL` + `en_US` in `/languages` (source strings are Dutch; en_US carries the translations). `npm run i18n:build` = make-pot + make-mo + make-json (requires running wp-env).

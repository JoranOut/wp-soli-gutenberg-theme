[![version](https://img.shields.io/github/package-json/v/JoranOut/wp-soli-gutenberg-theme?label=version&color=3858e9)](https://github.com/JoranOut/wp-soli-gutenberg-theme/releases)
[![nightly](https://img.shields.io/github/v/release/JoranOut/wp-soli-gutenberg-theme?include_prereleases&label=nightly&color=fb8817)](https://github.com/JoranOut/wp-soli-gutenberg-theme/releases)
[![tested up to](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fapi.wordpress.org%2Fcore%2Fversion-check%2F1.7%2F&query=%24.offers%5B0%5D.current&label=tested%20up%20to&prefix=WP%20&color=40a8af)](https://wordpress.org/download/releases/)
[![requires](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2FJoranOut%2Fwp-soli-gutenberg-theme%2Fmain%2Fpackage.json&query=%24.wordpress.requiresAtLeast&label=requires&prefix=WP%20&color=40a8af)](https://wordpress.org/download/releases/)
[![wp-env](https://img.shields.io/github/package-json/dependency-version/JoranOut/wp-soli-gutenberg-theme/dev/@wordpress/env?label=wp-env&color=40a8af)](https://www.npmjs.com/package/@wordpress/env)
[![node](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2FJoranOut%2Fwp-soli-gutenberg-theme%2Fmain%2Fpackage.json&query=%24.engines.node&label=node&color=43853d)](https://nodejs.org)
[![license](https://img.shields.io/github/license/JoranOut/wp-soli-gutenberg-theme?color=blue)](LICENSE)

# Soli Gutenberg Theme

<!-- Machine-readable markers. publish.js reads the theme name to name the zip,
     and the nightly workflow rewrites the version here when packaging a build.
     Kept in a comment because a single tilde renders as strikethrough on GitHub;
     the badges above are the human-readable version. Do not reformat.
~Plugin Name: wp-soli-gutenberg-theme~
~Current Version: 0.1.0~
-->

Block theme (Full Site Editing) for [soli.nl](https://soli.nl) — Muziekvereniging Soli, Driehuis, sinds 1909.

## What this theme provides

- **Design system** via `theme.json` v3: Soli palette (maroon / gold / cream), self-hosted fonts (Playfair Display, Source Serif 4, Inter), fluid typography, 1180px content width.
- **Templates**: front page, news index (`home`), single post, archive, generic page, and a custom **Groepspagina** template for orchestra/group detail pages.
- **Patterns** (category *Soli*): full-page starter patterns for Home, Orkesten en groepen, group detail, Vereniging, Agenda and Mijn Soli, plus section patterns (hero, news, CTA, group cards).
- **Custom blocks** (bundled, built from `src/blocks/` to `build/`):
  - `soli/group-card` — card bound to a selected page (featured image, title, excerpt, rehearsal-time pill).
  - `soli/group-slider` — animated group carousel (Interactivity API).

## Out of scope (placeholders)

These are provided by separate Soli plugins; the theme ships placeholder patterns where they go:

- Agenda/events → `wp-soli-event-plugin` (`soli/event-view-calendar`, `soli/event-view-list`)
- Mededelingen on Mijn Soli → admin/passport plugins
- Mega-menu → `wp-soli-menu-blocks-plugin` (`soli/mega-panel`); the header uses `core/navigation` until wired.

## Development

```bash
npm install
npm run build          # build custom blocks (required before starting)
npm run env:start      # wp-env at http://localhost:8902 (admin/password)
npm run start          # watch mode for block development
npm run test:e2e       # Playwright e2e tests (uses the tests env at :8903)
```

`bin/setup.sh` runs automatically after `wp-env start` and seeds demo pages
(Home, Nieuws, Agenda, Vereniging, Orkesten en groepen + example groups,
Mijn Soli), sets the static front page / posts page and the
`/blog/%year%/%monthnum%/%day%/%postname%/` permalink structure.

## Production setup

1. Install and activate the theme (zip from GitHub releases; updates via the built-in GitHub updater).
2. Create the pages and pick the matching starter pattern when prompted (Home, Agenda, Vereniging, Orkesten en groepen, Mijn Soli). Group pages are children of *Orkesten en groepen* and use the **Groepspagina** template.
3. Settings → Reading: static front page = Home, posts page = Nieuws.
4. Settings → Permalinks: `/blog/%year%/%monthnum%/%day%/%postname%/`.

## Translations

Locales `nl_NL` and `en_US`, files in `/languages`. Build via `npm run i18n:build` (requires running wp-env).

## Release

Semantic versioning; version synced in `style.css`, `functions.php` (`SOLI_GUTENBERG_THEME__VERSION`), the `Current Version` marker at the top of this README, and `package.json`. The nightly workflow rewrites all four in the working tree before packaging, so a nightly zip reports its own version rather than the stable one. The supported WordPress range (`Requires at least` / `Tested up to` in `style.css`, and the updater config in `functions.php`) is stamped by both release workflows from the versions the e2e matrix actually ran. `npm run publish` builds blocks and creates the distribution zip.

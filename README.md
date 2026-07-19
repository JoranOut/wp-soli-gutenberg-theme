# Soli Gutenberg Theme

~Plugin Name: wp-soli-gutenberg-theme~

~Current Version:0.1.0~

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
npm run env:start      # wp-env at http://localhost:8888 (admin/password)
npm run start          # watch mode for block development
npm run test:e2e       # Playwright e2e tests (uses the tests env at :8889)
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

Semantic versioning; version synced in `style.css`, `functions.php` (`SOLI_GUTENBERG_THEME__VERSION`), this README (`~Current Version:x.x.x~`) and `package.json`. `npm run publish` builds blocks and creates the distribution zip.

---
name: Soli Gutenberg Theme
description: Concert-programme design system for soli.nl — maroon and gold heritage club identity on warm paper, tokenized in theme.json v3.
colors:
  maroon: "#7a1f2b"
  maroon-dark: "#5a1620"
  gold: "#c9a24a"
  ink: "#1a1a2e"
  muted: "#5a5a5e"
  cream: "#faf6ee"
  paper: "#f5efe6"
  sand: "#e8dcc6"
  line: "#e6e2da"
  white: "#ffffff"
typography:
  display:
    fontFamily: "\"Playfair Display\", Georgia, serif"
    fontSize: "clamp(56px, 8vw, 120px)"
    fontWeight: 700
    lineHeight: 0.95
    letterSpacing: "-0.025em"
  display-post:
    fontFamily: "\"Playfair Display\", Georgia, serif"
    fontSize: "clamp(36px, 4.4vw, 64px)"
    fontWeight: 700
    lineHeight: 1.02
  display-poster:
    fontFamily: "\"Playfair Display\", Georgia, serif"
    fontSize: "clamp(44px, 7vw, 92px)"
    fontWeight: 700
    lineHeight: 0.98
  headline:
    fontFamily: "\"Playfair Display\", Georgia, serif"
    fontSize: "clamp(30px, 3.6vw, 46px)"
    fontWeight: 700
    lineHeight: 1.08
    letterSpacing: "-0.01em"
  quote:
    fontFamily: "\"Playfair Display\", Georgia, serif"
    fontSize: "clamp(23px, 2.4vw, 30px)"
    fontWeight: 400
    lineHeight: 1.2
    fontStyle: italic
  title:
    fontFamily: "\"Playfair Display\", Georgia, serif"
    fontSize: "26px"
    fontWeight: 700
    lineHeight: 1.15
    letterSpacing: "-0.01em"
  title-panel:
    fontFamily: "\"Playfair Display\", Georgia, serif"
    fontSize: "22px"
    fontWeight: 400
    lineHeight: 1.2
  title-small:
    fontFamily: "\"Playfair Display\", Georgia, serif"
    fontSize: "20px"
    fontWeight: 400
    lineHeight: 1.25
  lead:
    fontFamily: "\"Source Serif 4\", Georgia, serif"
    fontSize: "18px"
    fontWeight: 400
    lineHeight: 1.625
  page-lede:
    fontFamily: "\"Source Serif 4\", Georgia, serif"
    fontSize: "18px"
    fontWeight: 500
    lineHeight: 1.6
  body:
    fontFamily: "\"Source Serif 4\", Georgia, serif"
    fontSize: "16px"
    fontWeight: 400
    lineHeight: 1.55
  meta:
    fontFamily: "\"Source Serif 4\", Georgia, serif"
    fontSize: "15px"
    fontWeight: 400
    lineHeight: 1.45
  small:
    fontFamily: "\"Inter\", system-ui, -apple-system, sans-serif"
    fontSize: "14px"
    fontWeight: 400
    lineHeight: 1.5
  compact:
    fontFamily: "\"Inter\", system-ui, -apple-system, sans-serif"
    fontSize: "13px"
    fontWeight: 600
    lineHeight: 1.4
  label:
    fontFamily: "\"Inter\", system-ui, -apple-system, sans-serif"
    fontSize: "12px"
    fontWeight: 600
    lineHeight: 1.5
    letterSpacing: "0.16em"
rounded:
  card: "10px 10px 3px 10px"
  soft: "8px"
  pill: "999px"
spacing:
  "20": "0.5rem"
  "30": "1rem"
  "40": "1.5rem"
  "50": "2.5rem"
  "60": "4rem"
  "70": "6rem"
components:
  button-primary:
    backgroundColor: "{colors.maroon}"
    textColor: "{colors.cream}"
    rounded: "{rounded.pill}"
    padding: "12px 22px"
  button-primary-hover:
    backgroundColor: "{colors.maroon-dark}"
    textColor: "{colors.cream}"
  button-outline:
    backgroundColor: "transparent"
    textColor: "{colors.maroon}"
    rounded: "{rounded.pill}"
    padding: "12px 22px"
  button-outline-hover:
    backgroundColor: "{colors.maroon}"
    textColor: "{colors.cream}"
  pill:
    backgroundColor: "{colors.paper}"
    textColor: "{colors.maroon}"
    rounded: "{rounded.pill}"
    padding: "0.25rem 0.75rem"
  panel-header:
    backgroundColor: "{colors.maroon}"
    textColor: "{colors.white}"
    padding: "0.9rem 1.5rem"
  card:
    backgroundColor: "{colors.white}"
    textColor: "{colors.ink}"
    rounded: "{rounded.card}"
---

# Design System: Soli Gutenberg Theme

## Overview

**Creative North Star: "Het Gedrukte Programmaboekje" (The Printed Concert Programme)**

The site reads like the printed programme handed out at a Soli concert: warm paper surfaces, a Didone display face for the works on the bill, small uppercase sans labels for the practical facts (Dag / Aanvang / Locatie / Dirigent), and one deep uniform-maroon ink throughout. The palette is derived from the association's uniforms in the photography — maroon and gold on cream — and every surface behaves like print: sections sit flush against each other separated by 1px hairlines, not gaps or shadows. Depth is reserved for interaction (cards lift on hover) and for a handful of physically grounded objects (the ticket strip, the framed featured image).

The system is tokenized in `theme.json` v3 first; `assets/css/soli.css` carries only the signatures theme.json cannot express (panel header bars, fact rows, index lists, icon masks, the themed table). Responsiveness is container-query based: `.wp-site-blocks` is the `soli` inline-size container and all width rules query it, never the viewport. Motion is modest and always honors `prefers-reduced-motion`.

Copy voice is a durable decision: Dutch, warm first-person-plural club voice ("we helpen je graag verder"), concrete facts — names, rehearsal times, prices, IBANs — over marketing abstraction; en dashes and full sentences; no exclamation-mark inflation.

**Key Characteristics:**
- One ink: maroon does headings-on-bars, links, buttons, kickers; gold is a thin accent, never a text color on light ground.
- Print rhythm: flush sections, hairline dividers, paper/sand tonal bands instead of shadows.
- Signature asymmetric corner (10px 10px 3px 10px) on cards and imagery.
- Uppercase Inter micro-labels with wide tracking carry all metadata; Playfair Display carries all headings; Source Serif 4 carries all prose.
- Maroon/ink-tinted photography: photos never sit raw on the page.

## Colors

A two-hue heritage palette — uniform maroon and brass gold — on a warm paper neutral ramp, with a near-black blue-tinted ink for text.

### Primary
- **Uniform Maroon** (#7a1f2b): the working ink of the whole system. Panel header bars, buttons, links, uppercase kickers and dates, table header text, page titles on light sections, cover-hero backgrounds.
- **Maroon Dark** (#5a1620): hover/pressed state of everything maroon; the deep end of the `maroon-fade` gradient (135deg, maroon → maroon-dark) used on maroon hero bands.

### Secondary
- **Brass Gold** (#c9a24a): accent only. Short rules (the 44×3px dash under `.soli-page-title`, the 36×2px byline dash), glyph accents (the oversized quotation mark opening pull-quotes, the music-note glyph in reason rows and before the setlist label), the italic second line of hero titles, and the gold eyebrow on dark heroes.

### Neutral
- **Ink** (#1a1a2e): all headings and body text; the base under tinted hero photography; dark placeholder embeds; the footer and the mid-page ink callout card (`.soli-card-ink`) that closes info pages — a tinted club photo under an ink scrim (the Mijn Soli spotlight treatment), cream text, gold eyebrow, gold action button. Also the `ink-overlay` gradient (rgba scrim 0.15 → 0.65) over cover photos.
- **Muted** (#5a5a5e): fact labels, captions, breadcrumbs, secondary metadata.
- **Cream** (#faf6ee): the site canvas on the front page and the header; button text on maroon.
- **Paper** (#f5efe6): callout cards, table header rows, pill backgrounds, program notes — the "one shade warmer" surface.
- **Sand** (#e8dcc6): the deepest tonal band (aankondiging poster head), pill borders, dashed ticket dividers.
- **Line** (#e6e2da): every hairline — section seams, list-row dividers, card borders, table rules, the 1px ring on framed images.
- **White** (#ffffff): the reading canvas of all content pages (`body:not(.home)`), card and panel surfaces.

### Named Rules
**The One Ink Rule.** Maroon is the only color that speaks; it carries every interactive and every emphatic element. Nothing else in the palette is allowed to become a second voice.

**The Gold-Is-Not-Text Rule.** On light surfaces (white/cream/paper/sand) gold appears only as drawn objects — rules, dashes, glyphs, borders — never as running text or links (gold on cream measures 2.23:1). Gold text is legal only on ink or maroon grounds (the dark-hero eyebrow, the hero title's italic line, `.soli-program-link` on the ink hero card).

**The Tinted Photograph Rule.** Photography never sits raw: heroes composite the photo at 0.7 opacity over an ink base with a gradient scrim on top; group-page heroes use a maroon cover; the spotlight card dims to 0.4 over ink. The maroon/gold identity must survive on top of any photo.

## Typography

**Display Font:** Playfair Display, variable 400–900 + italic (with Georgia, serif) — self-hosted woff2
**Body Font:** Source Serif 4, variable 200–900 + italic (with Georgia, serif) — self-hosted woff2
**Label Font:** Inter, variable 100–900 (with system-ui, sans-serif) — self-hosted woff2

**Character:** A concert-poster pairing: high-contrast Didone display for the bill, a readable text serif for the story, and a quiet grotesque strictly for uppercase micro-labels and buttons. Italic Playfair is the expressive register (hero second lines, pull-quotes, setlists).

### Hierarchy
Fluid sizes come from the theme.json preset scale (`x-small` 12px, `small` 14px, `medium` 16px, `large` 18px, `x-large` 26px, `xx-large` clamp(30px, 3.6vw, 46px), `huge` clamp(56px, 8vw, 120px)).

- **Display / h1** (700, clamp(56px, 8vw, 120px), lh 0.95, ls −0.025em): heroes and page titles. Post titles use a narrower clamp(36px, 4.4vw, 64px); poster announcements clamp(44px, 7vw, 92px) capped at 16ch. An `<em>` inside a display title renders italic gold (hero) or italic maroon on its own line (poster).
- **Headline / h2** (700, clamp(30px, 3.6vw, 46px), lh 1.08): section headings. Inside panels, headings drop to ~22px and weight 400.
- **Title / h3** (700, 26px, lh 1.15): card and subsection titles; aside-card titles run 20px.
- **Body** (400, 16px Source Serif 4, lh 1.55): all prose. Leads (`.soli-lead`) run 18px/1.625; page-opening ledes (`.soli-page-lede`) run 18px/500 in maroon-dark at max 60ch in soft ink (#3a3a3e) at max 44ch; article prose caps at 60ch; heroes' ledes at 52ch.
- **Label** (600, 12–13px Inter, uppercase): three tracked registers from theme.json custom tokens — eyebrow 0.28em, label 0.16em, button 0.08em. Eyebrows are maroon on light, gold (weight 400) on dark. Fact labels drop to 500/12px.

### Named Rules
**The Eyebrow Rhythm Rule.** Sections open eyebrow → heading → lead with a tight 12px gap eyebrow-to-heading and a roomier 20px heading-to-lead. The eyebrow is part of this world's native grammar (inherited from the mockup), always uppercase Inter in maroon or gold — never a chip, never a box.

**The Three Registers Rule.** Playfair only for headings and expressive italics; Source Serif 4 only for prose; Inter only for uppercase labels, navigation, and buttons. Inter never sets running text.

**The Drop Cap Rule.** Long-form photo-report prose opens with a maroon Playfair drop cap (3.6em) on the first paragraph only.

## Layout

- **Container:** content and wide are both 1100px; root padding clamp(20px, 3.5vw, 40px) via root-padding-aware alignments. Full-bleed bands (`alignfull`) carry their own background color.
- **Container queries, not media queries:** `.wp-site-blocks` declares `container: soli / inline-size`; observed query points are 600px (header CTA / mobile nav swap, matching core/navigation), 768px (gallery two-up, ticket-strip columns), 782px (sticky post sidebar).
- **Flush print rhythm:** `.wp-site-blocks > *` and first `alignfull` children zero their block-start margin — sections meet at hairlines or background changes, never gaps. The page is a full-height flex column so the dark footer always sits at the bottom edge.
- **Spacing scale:** presets 20–70 (0.5 / 1 / 1.5 / 2.5 / 4 / 6 rem); default block gap 1.5rem. Column pages pair a main column (measure-capped, e.g. 550px on group pages) with a 330px aside of stacked panels, gapped at spacing-60.
- **Sticky chrome:** the cream header is sticky (z-index 100); post sidebars stick at top 4rem above 782px.
- **Information architecture:** the recurring page formula is tinted hero → prose main column → aside panels ("Praktisch" fact rows, "Boeken & contact" with an email-cta) → one paper callout card ("Meespelen?" vacancy / CTA) per page.

## Elevation & Depth

Flat at rest. Depth is conveyed tonally (white cards on cream, paper bands on white, sand for the deepest band) and with hairlines; box-shadows exist only as hover responses or to ground a few "physical objects" (ticket, framed photo, quick-links bar). No borders-plus-heavy-shadow stacking; shadows are always ink-tinted rgba(26, 26, 46, …), never gray or black.

### Shadow Vocabulary
- **Card lift** (`box-shadow: 0 16px 34px rgba(26,26,46,0.13)` — token `--wp--custom--shadow--card`): appears on `.is-style-soli-card:hover` together with translateY(−2px); also the resting shadow of the ticket strip and the hover state of the cross-link card.
- **News hover** (`0 8px 20px rgba(26,26,46,0.1)`): lighter lift for news-grid and masonry cards, which rest shadowless.
- **Framed image** (`0 0 0 1px var(line), 0 30px 60px -30px rgba(26,26,46,0.25)`): hairline ring plus grounded shadow on the single-post featured image.
- **Floating bar** (`0 6px 18px rgba(26,26,46,0.18)`): the white quick-links bar floating on the maroon Mijn Soli hero.
- **Embed placeholder** (`0 18px 40px rgba(26,26,46,0.16)`): the dark 16:9 video card.

### Named Rules
**The Flat-At-Rest Rule.** Surfaces rest flat with a 1px line border; shadow is a response (hover) or a statement of physicality (ticket, framed photo), never ambient decoration.

## Shapes

- **The signature asymmetric corner** (10px 10px 3px 10px — token `--wp--custom--cardRadius`): every card, panel, agenda list, embed, and card image clips one bottom-right corner tighter, like a lifted page corner. This is the single most identifying shape in the system.
- **Full pills** (999px): all buttons, rehearsal/date pills, stat pills, poster date pills.
- **Soft radius** (8px): interior utility surfaces only — program notes; the setlist card and the quick-links bar use the signature card corner.
- **Hairline borders** (1px `line`) on every resting card; the lone accent border is the 2px dashed sand separator between ticket facts. Emphasis elsewhere comes from gold glyphs and dashes, never from thick card edges.
- **Icons are masked SVGs** (`assets/images/icons/`: calendar, document, link, music) rendered as CSS masks in currentColor at ~1.05em — never icon fonts, never emoji glyphs.

## Components

### Buttons
- **Shape:** full pill (999px), uppercase Inter 13px/600, tracked 0.08em, padding 12px 22px.
- **Primary:** maroon fill, cream text; hover maroon-dark. All button color changes transition 0.18s ease.
- **Outline (`is-style-outline-maroon`):** transparent with maroon text/border at rest; hover and focus-visible fill maroon with cream text.
- **Load-more (`.soli-more-button`):** primary pill plus a border-drawn chevron that nudges on hover and bounces while loading (suppressed under reduced motion).
- **Email CTA (`soli/email-cta`):** the standard contact/booking action — a button that opens a dialog with a prefilled mail (to/subject/body), used in "Boeken & contact" panels instead of bare mailto links.

### Chips / Pills
- **`.soli-pill`:** paper background, 1px sand border, maroon uppercase 12px label, tracked 0.16em — rehearsal times and dates on cards.
- **On dark:** stat pills and poster pills use translucent white fills (rgba(255,255,255,0.12)) with translucent or maroon borders.

### Cards / Containers
- **`is-style-soli-card`:** white (or paper, for callouts) surface, 1px line border, asymmetric corner, flat at rest, lifts on hover (see Elevation). Card images inherit the asymmetric radius; flush-image feature cards zero it and clip via the card.
- **The paper callout:** one per page — paper background card carrying an eyebrow + short concrete CTA copy ("Meespelen?", vacancies by instrument).
- **Panel (`is-style-soli-panel`):** the aside workhorse. Its first child becomes a full-bleed maroon header bar (0.9rem 1.5rem, white Playfair 400 ~22px); the body pads 1.5rem. Contains fact lists or link lists.

### Fact rows (`.soli-fact-label` / `.soli-fact-value`)
Stacked metadata: uppercase muted Inter 12px/500 label tracked 0.16em above a 15px ink serif value. Links inside values are ink, maroon on hover. The ticket strip promotes values to 22px Playfair.

### Index lists (`.soli-index-list`)
Link rows inside panels: 18px serif ink label left, maroon arrow right, 1px line dividers, no bullets; hover turns the label maroon and nudges the arrow 4px right (0.22s cubic-bezier(0.22, 0.61, 0.36, 1)).

### Tables (`.wp-block-table`)
Print-style data tables: collapsed 1px line borders throughout, paper header row with maroon uppercase Inter 12.5px headers tracked 0.08em, left-aligned cells at 0.65rem 0.9rem, tabular numerals in body cells.

### Inputs / Disclosure
- **`.soli-details`:** white card with line border and the asymmetric corner; summary is 14px Inter 600 ink at 1rem 1.5rem.

### Navigation
- Cream sticky header; site title in Playfair 600/20px maroon; nav links Inter 14px/500. The "Word lid" primary button rides the header on desktop and swaps to a nav link inside the overlay under 600px. Breadcrumbs are muted uppercase 12.5px tracked 0.18em with line-colored separators.

### Signature: the hero concert-programme card
The front-page hero pairs the watermark display title (ink watermark + gold italic line over tinted photography) with a white programme card listing the next concert as a printed programme: maroon uppercase programme eyebrow, 92px-min uppercase muted labels (Dag/Aanvang/Locatie/Dirigent), and a gold underlined uppercase link — legal there because the card border sits on the ink hero. Group heroes reuse the grammar: maroon cover, gold uppercase back-breadcrumb, white title, measure-capped lede.

## Do's and Don'ts

### Do:
- **Do** open sections with the eyebrow rhythm: uppercase tracked eyebrow, 12px gap, Playfair heading, 20px gap, 18px/44ch lead.
- **Do** separate sections with hairlines (1px #e6e2da) and tonal bands (white → cream → paper → sand); reach for the spacing presets (20–70), not ad-hoc margins.
- **Do** give every card the asymmetric corner (10px 10px 3px 10px) and a 1px line border, resting flat.
- **Do** tint every hero photograph (0.7 opacity over ink + scrim, or a maroon cover) before setting type on it.
- **Do** end every page with one paper callout card and use `soli/email-cta` for any contact or booking action.
- **Do** write copy in the club's voice: Dutch, first-person plural, concrete facts (names, times, prices, IBANs), en dashes, no exclamation marks.
- **Do** use the masked-SVG icon set in currentColor for glyphs; the gold music note marks "reason" rows.
- **Do** honor `prefers-reduced-motion` for every animation and keep transitions in the 0.15–0.22s ease band.

### Don't:
- **Don't** set gold text or links on light surfaces (white/cream/paper/sand) — 2.23:1. Gold on light is only ever a drawn rule, border, or glyph; use maroon for text.
- **Don't** introduce colors outside the ten-token palette; all shadows tint from ink rgba(26,26,46,…). (The `#2a2a2e` hardcoded in two block stylesheets is a defect, not a token.)
- **Don't** use viewport media queries for layout — query the `soli` container.
- **Don't** put resting drop shadows on cards or stack heavy shadows on hairline borders; shadow is hover or physicality only.
- **Don't** let Inter set running text or let Playfair set body copy; the three registers don't trade jobs.
- **Don't** use symmetric large radii on cards, icon fonts, emoji, or system display faces; the world's shapes are the asymmetric corner and the full pill.

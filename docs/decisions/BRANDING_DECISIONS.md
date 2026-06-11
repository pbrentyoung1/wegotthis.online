# Branding Decisions

## Purpose

Capture brand, voice, naming, visual identity, and UI presentation decisions.

## Current Decisions

- **Product name:** ForWorship Creative.
- **App URL (target):** `app.forworship.org`.
- **Working codename / current domain:** `wegotthis.online` — retained as the working domain until the production infrastructure at `app.forworship.org` is ready.
- **Product promise / tagline:** "We got this." — this phrase is the emotional core of the product and should be preserved in brand, onboarding, and copy even as the URL changes.
- **Ecosystem architecture:** ForWorship is the umbrella brand for a family of connected ministry tools. Public-facing subdomains (`comms.forworship.org`, `creative.forworship.org`, `planning.forworship.org`, `tech.forworship.org`, `media.forworship.org`) serve as landing pages, education hubs, and module-specific entry points — not separate applications.
- **Application model:** One unified app at `app.forworship.org` with named modules inside. Modeled after the Planning Center approach: coherent user experience, shared auth, shared data, module-based navigation. Do not fragment the UX across subdomains.
- **Brand inheritance model:** ForWorship Creative fully inherits the ForWorship ecosystem brand. There is no separate module-level visual identity. Future modules (Planning, Tech, Media, etc.) follow the same brand. Module names are labels, not visual identities.
- **Future ecosystem products** (Tech, Planning, Media, etc.) are not yet scoped. Do not build separate software brands before the core product exists.
- Project codename: wegotthis.
- Figma will be used for design work.
- Core brand idea: the product should feel like the phrase "we got this" in product form.
- The brand should feel calm, capable, warm, supportive, conversational, and steady.
- The visual system direction is a calm editorial workspace.
- The interface should communicate morning-light calm, quiet readiness, and capable support.
- **Mark:** The ForWorship speech bubble + play button icon. Assets in `resources/`:
  - `fw_logo_horiz_dark.svg` — full horizontal wordmark (primary app asset)
  - `fw_logo_vert_dark.svg` — full vertical wordmark (alternate)
  - `forworship logo.svg` — mark only (original reference)
  - All assets use dark ink `#1c1c1c`. Implemented as inline SVG with `fill="currentColor"` in Blade templates — no separate light/dark image files needed.
  - Collapsed sidebar mark isolated via `viewBox="0 0 155 159"` on the horizontal SVG paths.
- **Color palette:** Slate `#6b7280`, Terracotta `#b65e3c`, Olive `#848e6c`, Gold `#BFA052`, Mauve `#7a5c63`, Light Gray `#d6d2c8`, Warm Canvas `#f7f4ee`, Surface `#ffffff`, Primary Text `#1c1c1e`, Secondary Text `#6b7280`, Dark Canvas `#2a2a2d`, and Near Black `#1c1c1e`.
- Accent colors should be used with restraint and paired with text or context to convey meaning.
- Success should favor Olive, warning should favor Gold, information should favor Slate, and error should favor Muted Brick `#a05252`.
- **Headline / editorial font:** Fraunces. Used for headlines, section titles, onboarding headers, campaign titles, storytelling, empty states, and small warmth moments.
- **Operational UI font:** IBM Plex Sans. Used for navigation, body copy, buttons, labels, forms, tables, menus, dashboards, and dense information areas.
- Layout should use a 4px spacing system with a primary rhythm of 8, 12, 16, 24, 32, 48, and 64.
- Component geometry should stay soft and consistent across buttons, inputs, cards, modals, and floating panels.
- Motion should stay subtle, calm, and ease-out by default.
- The product should feel personal and conversational rather than corporate or clinical.

## North Star

ForWorship Creative is a conversational ministry workspace that helps church teams feel calm, clear, supported, and ready for what is next. The product promise is: "We got this."

## Open Questions

- What exact type scale and usage rules should govern Fraunces and IBM Plex Sans in product UI?
- What visual treatments best express warmth and steadiness without losing operational clarity?

## Notes

- Keep final brand decisions separate from exploration notes.
- The interface should feel like collaboration, not compliance.
- Avoid dense enterprise dashboards, harsh admin UI, productivity-bro styling, and gimmicky AI visuals.

Last updated: 2026-06-10

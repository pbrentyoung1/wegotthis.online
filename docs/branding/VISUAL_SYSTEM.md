# Visual System

## Purpose

Document the current visual system direction for ForWorship Creative so design, product, and implementation work share the same foundation.

## Current Decisions

- ForWorship Creative inherits the ForWorship ecosystem brand fully. There is no separate module-level visual identity.
- The visual direction is a calm editorial workspace.
- The interface should express calm, support, clarity, warmth, confidence, and collaboration.
- The interface should feel like a thoughtfully designed creative workspace before the team arrives: morning light, calm order, quiet readiness, and the sense that someone capable is already helping.
- The product should avoid dense enterprise dashboards, harsh admin UI, church clipart energy, productivity-bro aesthetics, overhyped startup styling, and gimmicky AI visuals.

## Layout Philosophy

- The interface should feel spacious but not luxurious.
- Layout should create room to breathe and think without wasting space.
- Use a 4px spacing system.
- Primary spacing rhythm: 8, 12, 16, 24, 32, 48, 64.
- Marketing pages should generally use a max width between 1280px and 1440px.
- Application workspaces should stay focused, readable, and avoid edge-to-edge chaos.

## Radius System

- Buttons: 10px
- Inputs: 12px
- Cards: 16px
- Modals: 20px
- Floating panels: 24px

## Shadow Philosophy

- Shadows should feel soft, diffused, layered, and natural.
- Depth should feel like paper on a desk near a window rather than floating-card spectacle.
- Approved shadow tokens:
  - `shadow-1`: `0 1px 2px rgba(15, 23, 42, 0.04)`
  - `shadow-2`: `0 4px 12px rgba(15, 23, 42, 0.06)`
  - `shadow-3`: `0 12px 32px rgba(15, 23, 42, 0.10)`

## Color Tokens

These are the ForWorship brand colors. All color tokens trace back to this palette.

- **Slate:** `#6b7280` for structural elements, interactive states, calm emphasis, and secondary text.
- **Terracotta:** `#b65e3c` for warmth, conversational energy, creative accents, and editorial highlights.
- **Olive:** `#848e6c` for collaboration, growth, steady support, and ministry depth.
- **Gold:** `#BFA052` for encouragement, highlights, celebratory moments, and warm callouts.
- **Mauve:** `#7a5c63` for reflective moments, emotional depth, storytelling, and occasional editorial accents.
- **Warm Canvas:** `#f7f4ee` for the primary page background and workspace atmosphere.
- **Surface:** `#FFFFFF` for cards, panels, and readable focus surfaces.
- **Light Gray:** `#d6d2c8` for dividers, borders, subtle panels, and quiet structural separation.
- **Primary Text:** `#1c1c1e` for strong readable text and the ForWorship mark color.
- **Secondary Text:** `#6b7280` for supporting copy and metadata.
- **Dark Canvas:** `#2a2a2d` for the dark mode page background.
- **Muted Brick:** `#a05252` for true error or destructive moments only (derived semantic token, not a ForWorship brand color).

## Color Restraint

- Most interfaces should remain neutral.
- Use color purposefully to direct attention, clarify status, or add emotional warmth.
- Avoid rainbow dashboards and decorative accent sprawl.
- No color should scream.
- Never use color alone to communicate meaning; pair it with text, iconography, or context.

## Semantic Color Guidance

- Success should prefer Olive so progress feels grounded rather than neon.
- Warning should prefer Gold so attention feels mature and hopeful rather than alarm-heavy.
- Error should prefer Muted Brick and appear only when true destructive or failure states require clarity.
- Information should prefer Slate so guidance feels calm and structural.
- Neutral structure should rely on Warm Canvas, Surface, Light Gray, Primary Text, and Secondary Text.

## Logo and Mark

- The ForWorship mark is a speech bubble combined with a play button icon: a circle outline with a message bubble tail, containing a centered play triangle.
- The mark represents ForWorship as a platform of communication and ministry production support.
- **Logo assets (in `resources/`):**
  - `fw_logo_horiz_dark.svg` — full horizontal wordmark (mark + "ForWorship" text), dark ink `#1c1c1c`, for light backgrounds. **Primary asset for app use.**
  - `fw_logo_vert_dark.svg` — full vertical wordmark (mark above "ForWorship" text), dark ink, for light backgrounds. Available for alternate use.
  - `forworship logo.svg` — mark only, original reference SVG.
- The SVG ink color is `#1c1c1c`, visually identical to Primary Text `#1c1c1e`.
- **Application implementation pattern:** Inline SVG with `fill="currentColor"`. Do not use `<img>` tags for the logo. Inline SVG allows the logo to adapt to light and dark sidebar/topbar themes via CSS color without separate file variants.
  - Light backgrounds: `text-[#1c1c1e]` on the containing span
  - Dark backgrounds: `text-[#f7f4ee]` on the containing span
- **Collapsed sidebar (logo-sm):** The mark is isolated by using `viewBox="0 0 155 159"` on the same horizontal SVG paths — all wordmark paths start at x > 155 and fall outside the viewport automatically.
- **Inspinia logo variants:** `logo-dark` (shown on light backgrounds by default) and `logo-light` (shown on dark backgrounds) both use the same inline SVG approach with different color classes.

## Typography System

- Fraunces is the primary brand typography direction for ForWorship Creative.
- IBM Plex Sans is the primary operational UI font and should support dense UI, labels, metadata, tables, navigation, forms, dashboards, notifications, and task interfaces.
- Fraunces should be used for marketing headlines, page headlines, major section titles, onboarding headers, campaign or project titles, storytelling, important empty states, and small emotional warmth moments.
- Typography should feel intelligent, thoughtful, human, calm, personal, and readable.
- Typography emotional system:
  - Fraunces says: "We understand. You're not alone."
  - IBM Plex Sans says: "We can handle this."

## Motion Philosophy

- Motion should feel like listening.
- Use subtle opacity and movement.
- Most transitions should land in the 150ms to 250ms range.
- Prefer ease-out timing.
- Elements should settle gently, expand naturally, and reveal context progressively.
- Avoid bouncing, flashy onboarding, parallax overload, and hyperactive animation.

## Iconography

- Use thin-lined editorial iconography.
- Lucide and Phosphor are acceptable reference directions.
- Avoid cartoon icons, enterprise cliches, and obvious church symbols.

## Component Personality

- Buttons should feel calm, confident, and tactile rather than loud or salesy.
- Forms should feel guided, conversational, and lightweight rather than like walls of fields.
- Cards should feel modular, layered, movable, and collaborative.
- Notifications should feel supportive, informative, and emotionally steady unless urgency is truly required.
- Empty states should feel hopeful, invitational, and collaborative.
- Dashboards should answer what matters right now instead of exposing every available metric.
- AI visual language should stay subtle, contextual, and calm rather than sci-fi or chatbot-heavy.

## Dark Mode

- Dark mode should feel warm and usable.
- Base surface: `#2a2a2d`. Page background: `#1c1c1e`.
- Avoid pure black, cyberpunk contrast, and neon accents.
- The target mood is a late-night creative workspace, not a futuristic control room.

## Open Questions

- What exact type scale and usage rules should govern Fraunces and IBM Plex Sans in dense workspace screens?
- What dark mode surface values best preserve warmth and readability at every layer?
- What exact placement and frequency rules should govern Fraunces warmth moments in the app UI?

## Notes

- Treat these decisions as the current visual system baseline for both design and implementation.
- Future UI tokens, Figma libraries, and code-level design tokens should trace back to this document.
- The palette should feel like materials in a thoughtfully designed creative studio: warm paper, soft stone, worn brass, clay, olive, and quiet depth.

Last updated: 2026-06-10

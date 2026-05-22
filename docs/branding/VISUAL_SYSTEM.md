# Visual System

## Purpose

Document the current visual system direction for wegotthis.online so design, product, and implementation work share the same foundation.

## Current Decisions

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

- Steady Blue: `#4F6B7A` for intelligent, trustworthy, grounded, calm emphasis.
- Terracotta: `#D9865B` for human warmth, conversation, and creativity.
- Sage: `#7D9B87` for collaboration, stability, and ministry softness.
- Main Canvas: `#F7F6F3` for the primary background.
- Surface: `#FFFFFF` for cards, panels, and focus surfaces.
- Soft Contrast: `#ECE9E2` for dividers, subtle panels, and quiet separation.
- Primary Text: `#2F3437` for strong readable text.
- Secondary Text: `#66707A` for supporting copy and metadata.

## Typography System

- IBM Plex Serif is the primary brand typography direction.
- Newsreader should be used selectively for warmth, prompts, onboarding, quotes, AI moments, and reflective interactions.
- IBM Plex Sans or Inter should support dense UI, labels, metadata, tables, navigation, and operational text.
- Typography should feel intelligent, thoughtful, human, calm, personal, and readable.

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
- Avoid pure black, cyberpunk contrast, and neon accents.
- The target mood is a late-night creative workspace, not a futuristic control room.

## Open Questions

- What semantic success, warning, and error colors best fit this system without breaking the calm tone?
- When should IBM Plex Serif and Newsreader appear in product UI versus marketing surfaces?
- How much editorial typography can dense workspace screens carry before readability drops?
- What dark mode surface values best preserve warmth and contrast?

## Notes

- Treat these decisions as the current visual system baseline for both design and implementation.
- Future UI tokens, Figma libraries, and code-level design tokens should trace back to this document.

Last updated: 2026-05-21

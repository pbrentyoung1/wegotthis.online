# Visual System

## Purpose

Document the current visual system direction for ForWorship Creative so design, product, and implementation work share the same foundation.

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
- Dusty Gold: `#C6A56B` for hopeful highlights, encouragement, and warm callouts.
- Soft Clay: `#C98D7A` for soft onboarding warmth, relational emphasis, and gentle warning-adjacent moments.
- Muted Sky: `#8AA6B3` for information, planning, collaboration, and calm AI guidance.
- Deep Forest: `#556B61` for success, progress, editorial grounding, and calm navigation depth.
- Warm Plum: `#7A5C68` for reflective moments, storytelling, emotional depth, and occasional editorial accents.
- Warm Canvas: `#F7F6F3` for the primary background.
- Surface: `#FFFFFF` for cards, panels, and focus surfaces.
- Soft Contrast: `#ECE9E2` for dividers, subtle panels, and quiet separation.
- Soft Fog: `#C3C1BB` for panel separation, hover states, structural framing, table structure, and disabled states.
- Primary Text: `#2F3437` for strong readable text.
- Secondary Text: `#66707A` for supporting copy and metadata.
- Muted Brick: `#B46A6A` for true error or destructive moments only.

## Color Restraint

- Most interfaces should remain neutral.
- Use color purposefully to direct attention, clarify status, or add emotional warmth.
- Avoid rainbow dashboards and decorative accent sprawl.
- No color should scream.
- Never use color alone to communicate meaning; pair it with text, iconography, or context.

## Semantic Color Guidance

- Success should prefer Deep Forest and Sage so progress feels grounded, not neon.
- Warning should prefer Dusty Gold and Soft Clay so attention feels thoughtful rather than alarm-heavy.
- Error should prefer Muted Brick and appear only when true destructive or failure states require clarity.
- Information should prefer Muted Sky and Steady Blue so guidance feels clear and calm.
- Neutral structure should rely on Warm Canvas, Soft Contrast, Soft Fog, Surface, Primary Text, and Secondary Text.

## Typography System

- IBM Plex Serif is the primary brand typography direction.
- IBM Plex Sans is the primary operational UI font and should support dense UI, labels, metadata, tables, navigation, forms, dashboards, notifications, and task interfaces.
- Caveat is the human accent layer and should only appear in small, sparing moments of reassurance or warmth.
- IBM Plex Serif should be used for marketing headlines, page headlines, major section titles, onboarding headers, campaign or project titles, storytelling, and important empty states.
- Caveat should be reserved for margin-note encouragement, onboarding reassurance, empty-state emotional notes, celebratory confirmations, subtle annotations, AI reassurance moments, and small "we got this" notes.
- Caveat should not appear in body copy, navigation, buttons, labels, tables, forms, menus, dashboards, alerts, large paragraphs, or operational workflows.
- Caveat should use regular weight only, usually between 14px and 24px, with tighter tracking around `-0.02em`.
- Typography should feel intelligent, thoughtful, human, calm, personal, and readable.
- Typography emotional system:
  - IBM Plex Serif says: "We understand."
  - IBM Plex Sans says: "We can handle this."
  - Caveat says: "You're not alone."

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
- What exact placement and frequency rules should govern Caveat so it stays rare and believable?
- How much editorial typography can dense workspace screens carry before readability drops?
- What dark mode surface values best preserve warmth and contrast?

## Notes

- Treat these decisions as the current visual system baseline for both design and implementation.
- Future UI tokens, Figma libraries, and code-level design tokens should trace back to this document.
- The complete typography system should feel like thoughtful software with editorial warmth and human reassurance.
- The palette should feel like materials in a thoughtfully designed creative studio: warm paper, soft stone, worn brass, clay, sage, muted sky, and quiet depth.

Last updated: 2026-05-24

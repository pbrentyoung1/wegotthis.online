# Color Palette

## Purpose

Record approved color choices and design-token direction.

## Current Decisions

- The current visual system should use a warm neutral canvas rather than a cold SaaS background.
- Primary brand color: Steady Blue `#4F6B7A`.
- Warm accent: Terracotta `#D9865B`.
- Support accent: Sage `#7D9B87`.
- Warm Canvas: `#F7F6F3`.
- Surface: `#FFFFFF`.
- Soft Contrast: `#ECE9E2`.
- Soft Fog: `#C3C1BB`.
- Primary Text: `#2F3437`.
- Secondary Text: `#66707A`.
- Supporting accent colors:
  - Dusty Gold `#C6A56B` for hopeful highlights, encouragement, and warm callouts.
  - Soft Clay `#C98D7A` for onboarding warmth, relational moments, and gentle warning-adjacent states.
  - Muted Sky `#8AA6B3` for information, collaboration, AI suggestions, and planning flows.
  - Deep Forest `#556B61` for grounded success, progress, and calm navigation depth.
  - Warm Plum `#7A5C68` for reflection, storytelling, emotional depth, and occasional editorial accents.
- Error accent: Muted Brick `#B46A6A` for true destructive or error states only.
- Most interfaces should remain neutral, with accents used deliberately rather than decoratively.

## Semantic Guidance

- Success should prefer Deep Forest and Sage so progress feels grounded, not neon.
- Warning should prefer Dusty Gold and Soft Clay so attention feels thoughtful, not alarmed.
- Error should prefer Muted Brick and only appear when true risk, failure, or destruction needs clarity.
- Information should prefer Muted Sky and Steady Blue so guidance feels calm and readable.
- Structural neutral layers should rely on Warm Canvas, Soft Contrast, Soft Fog, Surface, Primary Text, and Secondary Text.

## Open Questions

- How much should Inspinia defaults be overridden when implementation begins?
- How should accessibility contrast be verified?
- What dark mode equivalents should pair with these light-mode tokens?

## Notes

- These colors should support calm readability before visual excitement.
- Token names and code variables should stay descriptive and implementation-friendly.
- Avoid rainbow dashboards and decorative overuse of accent colors.
- Never rely on color alone to communicate meaning; pair color with text, iconography, or context.

Last updated: 2026-05-24

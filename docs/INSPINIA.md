# INSPINIA Guidance

## Purpose

Document how ForWorship Creative uses INSPINIA as a structural foundation and pattern library without inheriting its default brand personality.

## Core Decision

**INSPINIA is infrastructure, not branding.**

Borrow the structure. Translate the soul.

## Primary References

- Primary application base: `resources/Laravel/starterkit`
- Reference implementation: `resources/Laravel/inspinia`
- Design reference: INSPINIA Figma assets

The Laravel starterkit is the product foundation.

The full Laravel INSPINIA implementation is a pattern and component reference library.

Before building custom UI, review both the starterkit and the full INSPINIA implementation.

Use the INSPINIA Figma assets as a screen layout and UX pattern reference when designing ForWorship Creative screens.

## How We Use INSPINIA

We use INSPINIA for:

- layout structure
- responsive systems
- utility patterns
- dashboard architecture
- existing interaction models
- foundational component behavior
- proven admin and product UI patterns

We do not use INSPINIA for:

- final brand personality
- default visual styling without adaptation
- default color system
- default typography
- generic admin or dashboard tone
- unnecessary widget density

## Base vs Reference Implementation

- `resources/Laravel/starterkit` is the implementation base.
- `resources/Laravel/inspinia` is the deeper reference implementation for patterns, flows, and component behavior.
- The starterkit should usually answer how the app is structured.
- The full INSPINIA implementation should usually answer how a common admin or product pattern behaves.
- Prefer adapting an existing INSPINIA pattern over reinventing standard dashboard, calendar, messaging, alert, table, card, modal, dropdown, notification, or profile patterns.

## Approved INSPINIA Patterns to Adapt

- dashboards
- messaging interfaces
- alert boxes
- calendars
- notification patterns
- tables
- cards
- widgets
- profile and account pages
- activity feeds
- modals
- dropdowns
- timeline elements
- search patterns
- file management UI
- charts when truly needed
- forms and settings pages

## Do-Not-Reinvent Guidance

Avoid rebuilding from scratch:

- calendar engines
- modal systems
- dropdown infrastructure
- responsive grid systems
- scrollbar systems
- notification frameworks
- chart foundations
- basic form controls
- dashboard card systems
- messaging layouts
- alert patterns

Only build custom when the existing pattern cannot reasonably support the product need.

## Component Development Priority

1. Reuse an existing starterkit component.
2. Adapt a full INSPINIA Laravel pattern.
3. Adapt an INSPINIA Figma pattern.
4. Extend an existing ForWorship Creative component.
5. Build custom only when necessary.

## Figma Workflow

1. Start from an existing INSPINIA structural pattern whenever practical.
2. Strip back unnecessary widgets, visual noise, dense dashboards, excessive charts, aggressive color, hard borders, and generic admin copy.
3. Apply the ForWorship Creative visual language:
   - IBM Plex Serif
   - IBM Plex Sans
   - Caveat used very sparingly
   - warm, restrained color palette
   - soft geometry
   - generous spacing
   - calm hierarchy
   - subtle shadows
4. Add ForWorship Creative conversational UX:
   - ask helpful questions
   - use calm guidance
   - reduce emotional weight
   - make users feel supported rather than managed
5. Preserve structural consistency so the design can scale into reusable components.

## Emotional Translation Rule

**Borrow the structure. Translate the soul.**

When adapting INSPINIA:

- reduce visual noise
- simplify dashboards
- reduce unnecessary widgets
- soften hierarchy
- replace admin language with conversational language
- avoid panic-heavy alert styling
- convert rigid workflows into guided experiences
- favor clarity and calm over density
- preserve proven responsive and component behavior

## Technical Guardrails

Do not:

- introduce new JavaScript frameworks without an architecture decision
- bypass existing Bootstrap, Bootstrap Vue Next, Inspinia SCSS, or token systems
- create duplicate layout systems
- create duplicate modal, notification, calendar, dropdown, or chart systems
- hardcode colors outside design tokens
- add new chart libraries unnecessarily
- create isolated styling conventions
- ignore existing INSPINIA structure when solving common UI needs

## Pattern Decision Logging

As Figma screens and product components are created, document pattern decisions:

- what the pattern is
- where it came from in INSPINIA
- how it was adapted for ForWorship Creative
- what emotional role it plays
- when to use it
- when not to use it
- any implementation notes

The goal is to turn Figma work into scalable product language rather than isolated mockups.

## Contributor Instruction

Before creating or heavily modifying UI, read `docs/INSPINIA.md` and check the INSPINIA starterkit, full Laravel implementation, and Figma assets for existing patterns that can be adapted.

## Related Documents

- `README.md`
- `CLAUDE.md`
- `docs/ai/AGENTS.md`
- `docs/ai/CODEX_RULES.md`
- `docs/ai/CLAUDE_CODE_RULES.md`
- `docs/branding/VISUAL_SYSTEM.md`
- `docs/resources/INSPINIA_NOTES.md`
- `docs/resources/FIGMA_NOTES.md`

Last Updated: 2026-05-24

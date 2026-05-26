# Inspinia Notes

## Purpose

Collect research and implementation notes about Inspinia.

## Current Decisions

- Inspinia is the intended UI/admin foundation.
- `resources/Laravel/starterkit` is the Laravel 13, Vue 3, Inertia, and Inspinia application base.
- `resources/Laravel/inspinia` is the reference implementation for common patterns.
- The selected starter uses Bootstrap, Bootstrap Vue Next, and Inspinia SCSS. Do not add Tailwind unless a future decision requires it.
- `docs/INSPINIA.md` is the canonical implementation guidance document for how `wegotthis` uses INSPINIA.

## Open Questions

- What licensing or asset handling requirements apply as Inspinia assets move from scaffold/reference into production UI?

## Notes

- Filename now matches the intended structure.
- `resources/Laravel/Docs/index.html`, `resources/Vue/Docs/index.html`, and `resources/Vue + Inertia/Docs/index.html` are local vendor documentation references.
- Use this file for raw notes and research. Use `docs/INSPINIA.md` for actual contributor guidance and working decisions.

Last Updated: 2026-05-21

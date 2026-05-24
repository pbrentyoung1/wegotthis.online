# Codex Rules

## Purpose

Provide project-specific guidance for Codex sessions.

## Current Decisions

- Preserve documented decisions.
- Do not build application code until instructed.
- Do not add unnecessary dependencies.
- Prefer clear, maintainable changes aligned with the documented stack.
- When work is ready to preserve in the repository, use Git intentionally with review, commit, and push steps.
- Preserve the brand direction that the product should feel calm, capable, warm, and supportive.
- Docs-site diagrams must visualize canonical source docs. They must not introduce independent role names, lifecycle states, or workflow decisions unless explicitly labeled Exploratory.
- Exploratory diagrams must be labeled `Exploratory`, must not be used as implementation guidance, and must note that source docs remain canonical.
- Before creating or heavily modifying UI, read `docs/INSPINIA.md` and check the INSPINIA starterkit, full Laravel implementation, and Figma assets for patterns to adapt.
- Before creating a new map, ask whether it unblocks implementation. If not, add the concept to the canonical docs or `docs/BUILD_READINESS_CHECKLIST.md` instead.

## Open Questions

- What branch naming and commit message rules should Codex follow?
- What tests should Codex run after future implementation work?

## Notes

- Codex should update relevant documentation when decisions change.
- When a docs-site diagram changes roles, lifecycles, or workflows, Codex should update the canonical source docs first or in the same change.
- Standard repository flow is `git status`, `git add`, `git commit`, then `git push`.
- UX, copy, and workflow suggestions should be evaluated by whether they make users feel supported or managed.
- Do not introduce new task statuses without updating the canonical task docs and build-readiness checklist in the same change.

Last Updated: 2026-05-21

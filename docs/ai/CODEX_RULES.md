# Codex Rules

## Purpose

Provide project-specific guidance for Codex sessions.

## Current Decisions

- Preserve documented decisions.
- Do not build application code beyond the current scaffold until instructed.
- Do not add unnecessary dependencies.
- Prefer clear, maintainable changes aligned with the documented stack.
- When work is ready to preserve in the repository, use Git intentionally with review, commit, and push steps.
- Preserve the brand direction that the product should feel calm, capable, warm, and supportive.
- Docs-site diagrams must visualize canonical source docs. They must not introduce independent role names, lifecycle states, or workflow decisions unless explicitly labeled Exploratory.
- Exploratory diagrams must be labeled `Exploratory`, must not be used as implementation guidance, and must note that source docs remain canonical.
- Before creating or heavily modifying UI, read `docs/INSPINIA.md` and check the INSPINIA starterkit, full Laravel implementation, and Figma assets for patterns to adapt.
- Before creating a new map, ask whether it unblocks implementation. If not, add the concept to the canonical docs or `docs/BUILD_READINESS_CHECKLIST.md` instead.
- Keep a disconnect-safe trail while working: document meaningful actions, decisions, verification results, and unfinished work in the relevant doc, checklist, or final handoff.

## Open Questions

- What branch naming and commit message rules should Codex follow?
- What tests should Codex run after future implementation work?

## Notes

- Codex should update relevant documentation when decisions change.
- When a docs-site diagram changes roles, lifecycles, or workflows, Codex should update the canonical source docs first or in the same change.
- Standard repository flow is `git status`, `git add`, `git commit`, then `git push`.
- UX, copy, and workflow suggestions should be evaluated by whether they make users feel supported or managed.
- Do not introduce new task statuses without updating the canonical task docs and build-readiness checklist in the same change.
- Treat hosting.com/cPanel as early staging/proof infrastructure only. Do not introduce implementation choices that depend on cPanel-specific behavior, old PostgreSQL behavior, or current-host paths.
- Keep database usage conservative while early staging may use older PostgreSQL; prefer portability toward PostgreSQL 15/16+ production.
- Do not assume long-running queue workers are available on cPanel/reseller hosting.
- Keep file storage abstracted; local server storage is acceptable for early proof/staging, while S3-compatible storage remains the future production direction.

Last Updated: 2026-05-27

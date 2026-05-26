# Claude Code Rules

## Purpose

Provide project-specific guidance for Claude Code sessions.

## Current Decisions

- Claude Code will assist development.
- Claude Code should preserve documented decisions and avoid unrequested application code beyond the current scaffold.
- GitHub remains the source of truth.
- When work is ready to preserve in the repository, use Git intentionally with review, commit, and push steps.
- Claude Code should preserve the warm, conversational, human-centered product philosophy in copy, UX, and workflow guidance.
- Docs-site diagrams must visualize canonical source docs. They must not introduce independent role names, lifecycle states, or workflow decisions unless explicitly labeled Exploratory.
- Exploratory diagrams must be labeled `Exploratory`, must not be used as implementation guidance, and must note that source docs remain canonical.
- Before creating or heavily modifying UI, read `docs/INSPINIA.md` and check the INSPINIA starterkit, full Laravel implementation, and Figma assets for patterns to adapt.
- Before creating a new map, ask whether it unblocks implementation. If not, add the concept to the canonical docs or `docs/BUILD_READINESS_CHECKLIST.md` instead.
- Do not introduce new task statuses without updating the canonical task docs and build-readiness checklist in the same change.
- Treat hosting.com/cPanel as early staging/proof infrastructure only. Do not introduce implementation choices that depend on cPanel-specific behavior, old PostgreSQL behavior, or current-host paths.
- Keep database usage conservative while early staging may use older PostgreSQL; prefer portability toward PostgreSQL 15/16+ production.
- Do not assume long-running queue workers are available on cPanel/reseller hosting.
- Keep file storage abstracted; local server storage is acceptable for early proof/staging, while S3-compatible storage remains the future production direction.

## Open Questions

- What coding standards should be included once the app exists?
- What review prompts should Claude Code use?

## Notes

- Keep Claude Code prompts in `/prompts/claude-code`.
- When a docs-site diagram changes roles, lifecycles, or workflows, Claude Code should update the canonical source docs first or in the same change.
- Standard repository flow is `git status`, `git add`, `git commit`, then `git push`.
- Suggested interactions should feel collaborative and supportive rather than managerial or clinical.

Last Updated: 2026-05-24

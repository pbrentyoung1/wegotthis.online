# Agents

## Purpose

Define how AI agents should understand and participate in this project.

## Current Decisions

- Codex and Claude Code will assist development.
- AI agents should read project documentation before making implementation changes.
- AI agents should not add application code or dependencies beyond the current scaffold unless explicitly instructed.
- AI agents should preserve the calm, supportive, human-centered product philosophy in documentation, copy, UX recommendations, and implementation guidance.
- Docs-site diagrams must visualize canonical source docs. They must not introduce independent role names, lifecycle states, or workflow decisions unless explicitly labeled Exploratory.
- Exploratory diagrams must be labeled `Exploratory`, must not be used as implementation guidance, and must note that source docs remain canonical.
- Before creating or heavily modifying UI, read `docs/INSPINIA.md` and check the INSPINIA starterkit, full Laravel implementation, and Figma assets for existing patterns to adapt.
- Before creating a new map, ask whether it unblocks implementation. If it does not, add the concept to the canonical docs or `docs/BUILD_READINESS_CHECKLIST.md` instead.
- Do not introduce new task statuses without updating the canonical task docs and build-readiness checklist in the same change.

## Open Questions

- Which agent handles architecture reviews?
- Which agent handles implementation?
- How should agent outputs be reviewed and merged?

## Notes

- Keep AI instructions practical and project-specific.
- If a map and a source doc conflict, the source doc remains canonical until both are reconciled in the same change.
- AI suggestions should make the product feel more like a capable teammate and less like a managerial system.

Last Updated: 2026-05-21

# AI Development Workflow

## Purpose

Define how Codex, Claude Code, ChatGPT, and other AI assistants should support the project.

## Current Decisions

- Codex and Claude Code will assist development.
- AI assistants should preserve documented decisions and avoid scaffolding the application until instructed.
- GitHub docs are canonical for architecture, decisions, and durable documentation.
- Notion tracks active execution, backlog movement, phases, sprints, and working coordination.
- Changes intended to be preserved should be committed to Git with a clear commit message and pushed to GitHub.
- AI agents should update documentation when major decisions change.
- AI agents should avoid bypassing the documented roadmap and phase structure.
- AI agents should preserve the product direction that the platform feels calm, capable, warm, supportive, and conversational.
- AI should be ambient, observant, and quietly useful rather than performative.

## Open Questions

- Which tasks should be assigned to Codex versus Claude Code?
- What review process should be used for AI-generated code?
- What prompts should be standardized?

## Notes

- AI-generated changes should be reviewed against `/docs/ai/DO_NOT_BREAK.md`.
- Standard Git flow for contributors is `git status`, `git add`, `git commit`, then `git push`.
- Active execution should align with the roadmap, category structure, and current phase readiness.
- AI suggestions for UX and copy should ask whether the user would feel supported or managed.

Last updated: 2026-05-21

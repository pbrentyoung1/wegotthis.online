# Claude Code Rules

## Purpose

Provide project-specific guidance for Claude Code sessions.

## Current Decisions

- Claude Code will assist development.
- Claude Code should preserve documented decisions and avoid unrequested scaffolding.
- GitHub remains the source of truth.
- When work is ready to preserve in the repository, use Git intentionally with review, commit, and push steps.

## Open Questions

- What coding standards should be included once the app exists?
- What review prompts should Claude Code use?

## Notes

- Keep Claude Code prompts in `/prompts/claude-code`.
- Standard repository flow is `git status`, `git add`, `git commit`, then `git push`.

Last updated: 2026-05-20

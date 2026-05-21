# Do Not Break

## Purpose

List project constraints that AI assistants and contributors must preserve.

## Current Decisions

- Do not scaffold Laravel until explicitly instructed.
- Do not add application code during documentation setup.
- Do not switch away from PostgreSQL without a documented decision.
- Do not ignore multi-tenancy considerations.
- Do not treat placeholders as final decisions.
- Do not add unnecessary dependencies.
- Do not let implementation choices override documented product decisions silently.

## Open Questions

- What architectural invariants should be added once the app exists?
- What brand or UX constraints should be protected?

## Notes

- Update this file whenever a decision becomes important enough to protect.

Last updated: 2026-05-20

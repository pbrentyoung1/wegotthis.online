# Project Task Module

## Purpose

Define the product boundary between projects, deliverables, and tasks.

This module exists to support operational execution, not to replace strategic planning. Strategic context should shape project and deliverable briefs, while tasks remain the practical work units that move production forward.

## Current Decisions

- Operational Work is Projects -> Deliverables -> Tasks.
- Projects are the primary operational container.
- Projects require title, owner, objective, start date, and stop date.
- Deliverables must belong to a project and do not stand alone.
- Tasks belong to a project and may optionally belong to a deliverable.
- Project-level tasks are for coordination.
- Deliverable-level tasks are for production.
- Campaigns, initiatives, programs/content streams, sermon series, seasons, ministry areas, topics, and tags provide strategic context rather than task ownership.
- MVP task implementation should use existing Inspinia tables, cards, filters, notification patterns, and activity feed patterns before custom planning interfaces.

## Module Boundaries

- Project Brief: defines the operational purpose, owner, timing, audience, scope, strategic context, and expected deliverables.
- Deliverable Brief: defines the channel, content, production requirements, approval path, files, specs, and tasks for a specific output.
- Task: defines the assigned action, status, due date, owner, comments, and optional deliverable context.

## Open Questions

- Should tasks support reusable checklists in MVP?
- Which task filters are required for the first usable project workspace?
- Should Programs / Content Streams create default project and task templates in MVP?

## Notes

- Project details are documented in `/docs/product/PROJECT_MANAGEMENT.md`.
- Deliverable details are documented in `/docs/product/DELIVERABLES.md`.
- Task details are documented in `/docs/product/TASKS.md`.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.

Last Updated: 2026-05-29

# Project Management

## Purpose

Define how projects work as the primary container object.

## Current Decisions

- Projects should relate to media assets, tasks, approvals, messages, files, vendors, deliverables, and timelines.
- Working hierarchy: Campaigns -> Projects -> Deliverables -> Tasks.
- Campaigns are optional parent containers.
- Projects are the primary operational container.
- Deliverables are the specific outputs being produced.
- Most production tasks should attach to deliverables.
- General coordination tasks may attach directly to projects.
- Project fields under consideration include title, description, department, stakeholders, audience, desired feeling, desired action, destination/media, third-party assets/links, location, cost, due date, estimated time, actual time, proofread/signoff, status, timeline, and messages/activity.

## Open Questions

- Which project fields are required at request intake?
- What statuses should projects use?
- Can a project have multiple deliverables and due dates?
- How should project status summarize multiple deliverables?

## Notes

- Projects should support church communications work from request through completion.
- Deliverables are documented in `/docs/product/DELIVERABLES.md`.
- Campaigns are documented in `/docs/product/CAMPAIGNS.md`.
- Tasks are documented in `/docs/product/TASKS.md`.

Last Updated: 2026-05-20

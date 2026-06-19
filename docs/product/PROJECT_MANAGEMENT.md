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
- Each Project should behave like one workspace with coordinated Overview, Board, and Calendar views rather than separate modules.
- The Board should preserve context on mobile and desktop by favoring in-place detail work over navigation away from the current view.
- Project fields under consideration include title, description, department, stakeholders, audience, desired feeling, desired action, destination/media, third-party assets/links, location, cost, due date, estimated time, actual time, proofread/signoff, status, timeline, and messages/activity.
- Project creation and setup should feel guided and human, not like filling out a cold database record.
- Canonical project lifecycle:
  - Intake
  - Discovery
  - Approved
  - Planned
  - Active
  - In Review
  - Revision
  - Scheduled
  - Published
  - Closeout
  - Archived
- Canonical permission roles are documented in `/docs/technical/AUTH_AND_PERMISSIONS.md`.
- Stakeholder and Department Leader remain useful real-world identities, but they are not base permission roles by themselves.
- Canonical MVP task statuses are documented in `/docs/product/TASKS.md` and should remain consistent across project and deliverable work.
- Waiting for Approval is reserved for deliverables and reviewable elements; it is not a project status.

## Open Questions

- Which project fields are required at request intake?
- Is the canonical project lifecycle sufficient for MVP?
- Can a project have multiple deliverables and due dates?
- How should project status summarize multiple deliverables?

## Notes

- Projects should support church communications work from request through completion.
- Projects should support church communications work from intake through closeout and archive, not stop at publication.
- Where possible, project setup should ask good questions that help people think through the work.
- Deliverables are documented in `/docs/product/DELIVERABLES.md`.
- Campaigns are documented in `/docs/product/CAMPAIGNS.md`.
- Tasks are documented in `/docs/product/TASKS.md`.

Last Updated: 2026-05-24

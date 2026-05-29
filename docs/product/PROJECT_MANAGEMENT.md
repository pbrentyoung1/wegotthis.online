# Project Management

## Purpose

Define how projects work as the primary container object.

## Current Decisions

- Projects should relate to media assets, tasks, approvals, messages, files, vendors, deliverables, and timelines.
- Strategic Context is distinct from Operational Work.
- Operational Work is Projects -> Deliverables -> Tasks.
- Campaigns and initiatives are optional strategic context, not required operational parents.
- Programs / Content Streams are recurring operational rhythms, distinct from campaigns.
- Projects are the primary operational container.
- Projects require a title, owner, objective, start date, and stop date.
- Deliverables are the specific outputs being produced.
- Deliverables must belong to a project and do not stand alone.
- Most production tasks should attach to deliverables.
- General coordination tasks may attach directly to projects.
- Project fields under consideration include title, owner, objective, start date, stop date, description, department, stakeholders, audience, desired feeling, desired action, destination/media, third-party assets/links, location, cost, due date, estimated time, actual time, proofread/signoff, status, timeline, and messages/activity.
- Project creation and setup should feel guided and human, not like filling out a cold database record.
- Project briefs should translate strategic context into operational scope, audience, timing, success definition, deliverables, and tasks.
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
- Which strategic context associations are needed in MVP?
- Should Programs / Content Streams be modeled as records or template/category context first?

## Notes

- Projects should support church communications work from request through completion.
- Projects should support church communications work from intake through closeout and archive, not stop at publication.
- Where possible, project setup should ask good questions that help people think through the work.
- Projects are the operational home even when they support multiple strategic contexts.
- The MVP should preserve one primary operational home and avoid forcing every project into a campaign.
- Deliverables are documented in `/docs/product/DELIVERABLES.md`.
- Campaigns are documented in `/docs/product/CAMPAIGNS.md`.
- Tasks are documented in `/docs/product/TASKS.md`.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.

Last Updated: 2026-05-29

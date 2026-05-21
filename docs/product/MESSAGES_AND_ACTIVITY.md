# Messages and Activity

## Purpose

Define how collaboration, comments, activity history, and project communication should work.

## Current Decisions

- Messaging and activity tracking is a core product area.
- Messages/activity should eventually relate to projects.
- Messages/activity is a project field under consideration.
- Working decision: project communication history is part of the MVP direction.
- Working decision: project communication should be captured in context rather than scattered across email, text messages, and meetings.
- Comments, activity logs, audit logs, and notifications should be related but conceptually distinct.
- Working decision: audit/activity logging must be designed in early.
- Activity history should track meaningful actions such as request submitted, request accepted/deferred/rejected, project created, status changed, deliverable created/updated, task assigned/completed, file uploaded, approval granted/rejected, comment added, budget changed, time logged, project entered closeout, project archived, and stakeholder/vendor link used.

## Conceptual Distinctions

- Notifications are alerts sent to people.
- Messages/comments are human conversation.
- Activity logs are visible project history.
- Audit logs are protected records of meaningful changes.

## Project Feed

- The project feed may include comments, status changes, approval events, change requests, file events, task events, budget events, and system reminders.
- The feed should preserve who said what, when it happened, and what changed afterward.
- Stakeholder feedback, approval notes, requested changes, internal discussion, decision history, file uploads, task updates, and budget changes should remain attached to project context where appropriate.

## Open Questions

- Which events should be logged automatically?
- Can vendors participate in messages?
- Which activity entries should be visible to stakeholders through magic links?
- Which digest emails are required for MVP?
- Should users be able to reply to notification emails and have replies captured in the project feed?
- Should project comments support internal-only and stakeholder-visible visibility?
- Should communication history be exportable during project closeout?
- What notification preferences should users control?

## Notes

- Activity history should support accountability without creating noise.
- Audit/activity logs support institutional memory, troubleshooting, and reporting.
- Communications system details are documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.
- Project communication workflow is documented in `/docs/workflows/PROJECT_COMMUNICATION_WORKFLOW.md`.

Last Updated: 2026-05-20

# Notification Trigger Map

## Purpose

Document which events should trigger notifications and which events should remain visible only in project history.

## Core Rules

- Notifications should support action rather than generate noise.
- Keep notifications distinct from comments, activity history, and audit logs.
- Prefer relevance and restraint over completeness.
- Align triggers with documented lifecycle and approval rules.

## Relationships

- Notification triggers should connect to requests, projects, deliverables, approvals, tasks, and comments where appropriate.
- Trigger behavior should respect role, visibility, and external access scope.
- Notification events should link back to the relevant work context.
- Preferences and digest behavior should modify delivery without changing source events.

## Open Questions

- Which notifications are required for MVP?
- Which events should be immediate versus digest-based?
- What preferences should users and external reviewers control?

## Related Diagrams

- `project-lifecycle-map.md`
- `deliverable-lifecycle-map.md`
- `approval-flow-map.md`

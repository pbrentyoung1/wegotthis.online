# MVP Scope

## Purpose

Define what belongs in the first useful release and what should wait.

## Current Decisions

- MVP planning should center on projects as the primary container.
- Early modules under consideration include projects, tasks/to-dos, dashboard, calendar, messages/activity, media library, user taxonomy, and permissions.
- PostgreSQL and multi-tenancy awareness should be present from the beginning.
- Working decision: use a single PostgreSQL database with `organization_id` on organization-owned MVP records.
- Working decision: requests are their own object before becoming projects.
- Working decision: use Projects -> Deliverables -> Tasks as the MVP operational spine.
- Working decision: accepted requests may convert to a Project, Campaign, or Initiative. Campaigns and Initiatives begin as lightweight parent/context containers; their full planning modules remain deferred.
- Working decision: deliverables are the primary approval units.
- Working decision: External Reviewer approvals use secure, time-bound magic links in MVP.
- Working decision: use transactional email plus in-app notifications.
- Working decision: project communication history is part of the MVP direction.
- Working decision: notifications, messages/comments, activity logs, and audit logs are related but conceptually distinct.
- Working decision: use PostgreSQL full-text search for MVP.
- Working decision: abstract file storage from day one.
- Working decision: audit/activity logging must be designed in early.
- Working decision: MVP should be organized and prioritized by phase rather than treated as a flat feature pool.
- Working decision: workflow and permissions decisions must precede serious schema work.
- Working MVP priorities:
  - structured communications request intake
  - request lifecycle
  - project workspace
  - deliverables
  - tasks and approvals
  - review visibility
  - communication timeline tracking
  - basic budget/cost tracking
  - department utilization tracking
  - media library connected to projects
  - project closeout workflow
  - basic Brand Center
  - basic templates
  - magic link approvals
  - transactional email
  - in-app notifications
  - project communication/activity feed
  - comments and External Reviewer feedback in context
  - PostgreSQL search
  - file storage abstraction
  - basic rights/release metadata
  - audit/activity logging

## Open Questions

- Which fields are required for a project request at launch?
- Are vendors included in MVP or deferred?
- Are social workflows included in MVP or planned as a second wave?
- Which closeout checks are required before a project can be archived?
- How detailed should department utilization tracking be in MVP?
- What belongs in a basic Brand Center versus post-MVP brand governance?
- Is recurrence MVP or early post-MVP?
- Which pilot church templates are required first?
- How detailed should file processing be in MVP?
- Which digest emails are required for MVP?
- Should users be able to reply to notification emails and have replies captured in the project feed?
- Should project comments support internal-only and review-visible visibility?
- Should communication history be exportable during project closeout?
- What notification preferences should users control?

## Notes

- Avoid expanding MVP until workflows and personas are documented.
- Avoid feature gravity and uncontrolled expansion during MVP planning.
- Track deferred features explicitly so they are not forgotten.
- Use phase planning to keep MVP sequencing understandable.
- Advanced features should be treated as post-MVP unless explicitly re-scoped:
  - social publishing APIs
  - Planning Center integration
  - Adobe, Figma, and Canva integrations
  - AI tagging
  - semantic search
  - advanced analytics
  - SMS
  - advanced notification preference automation
  - email reply ingestion unless explicitly required for pilot
  - full vendor accounts
  - custom workflow builder
  - custom domains/subdomains
  - complex recurrence unless needed by pilot
  - advanced automated archive packaging
  - deep creative platform file inspection

Last Updated: 2026-06-10

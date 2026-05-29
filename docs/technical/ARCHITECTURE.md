# Architecture

## Purpose

Capture the intended system architecture and major structural choices.

## Current Decisions

- Build with multi-tenancy in mind from the beginning.
- Projects should be the primary container object.
- Strategic Context is distinct from Operational Work.
- Strategic Context includes initiatives, campaigns, programs/content streams, sermon series, seasons, ministry areas, topics, and tags.
- Operational Work is Projects -> Deliverables -> Tasks.
- Campaigns and initiatives are optional strategic context, not required project parents.
- Programs / Content Streams are recurring operational rhythms, distinct from campaigns.
- Projects remain the primary operational container.
- Projects require title, owner, objective, start date, and stop date.
- Deliverables are production and approval units.
- Deliverables must belong to projects.
- Tasks are execution units.
- Requests are separate objects before becoming projects.
- PostgreSQL should be used from day one.
- Prioritize maintainability, clarity, and documentation over trendy complexity.
- Future external integrations should be modular, isolated, and optional.
- Projects remain the central container object.
- Media assets, brand assets, tasks, approvals, budgets, timelines, and closeout packages should relate back to projects where appropriate.
- Brand Center may be its own module but should connect to Media Library and Request Intake.
- Closeout workflow should prepare projects for long-term search, reuse, reporting, and institutional memory.
- Working decision: the product should create calm and reduce overhead, not add a system that requires more management than the work it replaces.
- Working decision: audit/activity logging must be designed in early for accountability, institutional memory, troubleshooting, and reporting.
- Working decision: reviewer, External Reviewer, intake, vendor-scoped, and status flows should be designed mobile-first even though Inspinia is the admin foundation.
- Working decision: the communications system includes outbound notifications and project communication history.
- Working decision: comments, activity logs, audit logs, and notifications are related but conceptually distinct.
- Working decision: project communication should be captured in context rather than scattered across email, text messages, and meetings.
- Hosting stack assumptions must be validated before Laravel scaffolding; `host-diagnostics/` provides a temporary PHP diagnostic dashboard for checking hosting.com/cPanel support for PHP, PostgreSQL, filesystem writes, cron, HTTPS, Composer, Node/npm, and related server limits.

## Product Structure

```text
Strategic Context
  -> Project Brief
    -> Deliverable Brief
      -> Tasks
```

- Strategic Context may include initiatives, campaigns, programs/content streams, sermon series, seasons, ministry areas, topics, and tags.
- Simple work can start directly as a project.
- Projects may associate with strategic context but do not have to.
- Projects should preserve one primary operational home in MVP.
- Projects may have many deliverables.
- Deliverables must belong to one project in MVP.
- Deliverables may have their own due dates, statuses, approvals, files/assets, and tasks.
- Most production tasks should attach to deliverables.
- General coordination tasks may attach directly to projects.
- Tasks belong to projects and may optionally belong to deliverables.

## Calm Software Principle

- Create calm, not complexity.
- Guide instead of obstruct.
- Reduce decisions and interruptions.
- Make invisible work visible.
- Preserve institutional memory.
- Favor clarity over customization.
- Use opinionated defaults with flexible overrides.
- Keep workflows understandable.
- Help and get out of the way.

## External Integrations

- Use service abstraction for external systems such as Planning Center.
- Keep webhook handling isolated from core business logic.
- Use queue processing for sync work, retries, and slow external API operations.
- Manage API credentials per church or tenant where integrations are enabled.
- Store external IDs separately from internal IDs.
- Design integration boundaries so the platform remains fully functional without any external connector.
- Treat each integration as an isolated module or service layer, not as a foundation for core architecture.

## Activity and Audit Logging

- Track meaningful actions such as request submitted, request accepted/deferred/rejected, project created, status changed, deliverable created/updated, task assigned/completed, file uploaded, approval granted/rejected, comment added, budget changed, time logged, project entered closeout, project archived, and External Reviewer link used.
- Activity history should be useful without becoming noisy.
- Audit logging should respect tenant scope and external magic-link scope.

## Communications System

- Outbound communication should use transactional email and in-app notifications.
- Project communication history should preserve comments, External Reviewer feedback, approval notes, requested changes, internal discussion, decision history, status updates, system-generated events, file uploads, task updates, and budget changes.
- Notifications are alerts sent to people.
- Messages/comments are human conversation.
- Activity logs are visible project history.
- Audit logs are protected records of meaningful changes.
- Notification design should avoid noise and link users back to the relevant project or deliverable context.

## Open Questions

- What tenant boundary model should be used?
- Should tenancy be implemented at the application layer, database schema layer, or another approach?
- What domain model should be implemented first?
- What shared integration interface should be defined later, if any?
- Should Brand Center be modeled independently, as part of Media Library, or both?
- How should archive packages relate to physical file storage and searchable metadata?
- Which strategic context entities must be first-class records in the first Laravel scaffold?
- Should inbound email replies become project comments?
- Which feed events should be review-visible to External Reviewers?

## Notes

- Architecture should be validated before application scaffolding and schema design.
- The host diagnostic site only creates the validation tool. It does not complete hosting validation until deployed results are reviewed.
- Planning Center integration is future optional planning only and is documented in `/docs/technical/PLANNING_CENTER_INTEGRATION.md`.
- Project lifecycle, closeout, and brand management should be considered before database schema design.
- Calm software principles are documented in `/docs/product/CALM_SOFTWARE_PRINCIPLES.md`.
- Strategic context and goal alignment are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.
- Communications system details are documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.

Last Updated: 2026-05-29

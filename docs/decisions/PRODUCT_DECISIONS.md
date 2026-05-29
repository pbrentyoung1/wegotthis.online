# Product Decisions

## Purpose

Capture product direction and scope decisions.

## Current Decisions

- The platform is for church communications operations.
- The platform is centered on communications operations, not generic project management.
- The platform exists to connect ministry goals to communication strategy and production execution.
- Strategic Context is distinct from Operational Work.
- Strategic Context includes initiatives, campaigns, programs/content streams, sermon series, seasons, ministry areas, topics, and tags.
- Operational Work is Projects -> Deliverables -> Tasks.
- Projects should function as the primary container object.
- Projects are the central container object.
- Projects require a title, owner, objective, start date, and stop date.
- Campaigns are optional strategic context.
- Initiatives are optional strategic context.
- Programs / Content Streams are recurring operational rhythms, distinct from campaigns.
- Weekly Podcast and Weekly Sermon Clips are Programs / Content Streams, not campaigns by default.
- Projects are the primary operational container.
- Deliverables are production and approval units.
- Deliverables must belong to a project and do not stand alone.
- Tasks belong to a project and may optionally belong to a deliverable.
- A project or deliverable may support multiple strategic contexts, but MVP should preserve one primary operational home.
- The MVP should not force every project into a campaign.
- Context should flow downward through Initiative, Campaign, Program / Content Stream, Project, and Deliverable briefs while becoming more specific.
- Media assets, tasks, approvals, messages, files, vendors, deliverables, and timelines should eventually relate back to projects.
- Canonical MVP roles are Platform Owner / Super Admin, Organization Admin, Communications Lead, Project Owner, Contributor, Reviewer, External Reviewer, and Viewer.
- Department Leader, stakeholder, and vendor describe real-world identities or workflow contexts, not base permission roles by themselves.
- Review responsibilities such as Budget, Resources, Design, Brand, Content, Ministry, and Final are contextual assignments, not separate base roles.
- A project, deliverable, or reviewable element may have multiple review assignments.
- Required review assignments must be approved or explicitly waived before the reviewed item clears approval.
- Guided intake is critical to request quality.
- Project closeout is part of the lifecycle.
- Brand management is a major product concern.
- Media assets need usage tracking and reusable context.
- Department utilization reporting is part of the product value.
- Requests are separate objects before becoming projects.
- Media assets should include rights, release, and usage metadata from the beginning.
- The product should create calm and reduce overhead.
- Project communication history is part of the MVP direction.
- Project communication should be captured in context rather than scattered across email, text messages, and meetings.
- Comments, activity logs, audit logs, and notifications should be related but conceptually distinct.
- The system should avoid notification noise.
- Working decision: phases organize execution order.
- Working decision: categories organize work type.
- Working decision: Notion is the active PM layer for backlog, sprints, tasks, and working coordination.
- Working decision: GitHub is the canonical architecture and durable documentation layer.
- Working decision: roadmap planning should stay simple, calm, and understandable.
- Working decision: the product should feel like "we got this" in software form.
- Working decision: every major UX decision should be evaluated by whether it makes users feel supported or managed.
- Working decision: conversational guidance should be used where it helps people think more clearly without slowing down work.
- Working decision: canonical MVP task statuses are Not Started, In Progress, Blocked, Ready for Review, Done, Deferred, and Canceled.
- Working decision: the MVP permissions matrix is role-based, with contextual review assignments layered on top.
- Working decision: early rollout may use hosting.com/cPanel for staging and proof-of-stack only; serious production rollout should wait for newer production infrastructure or a managed environment.

## Open Questions

- What is the first user journey?
- Which product modules are required for MVP?
- Which strategic context entities should be first-class records in MVP?
- Is Brand Center MVP or early post-MVP?
- What level of closeout enforcement is appropriate for MVP?
- What utilization reports are needed first?
- Which pilot templates are required first?
- Which digest emails are required for MVP?
- Should communication history be exportable during project closeout?
- What infrastructure readiness threshold is required before inviting serious production users?

## Notes

- Product decisions should reference user roles and workflows where possible.
- These are working decisions and should be refined through product planning before implementation.
- Calm software principles are documented in `/docs/product/CALM_SOFTWARE_PRINCIPLES.md`.
- Strategic context and goal alignment are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.
- Communications system details are documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.
- Roadmap and execution structure are documented in `/docs/ROADMAP.md`.
- Brand and voice guidance are documented in `/docs/branding`.

Last Updated: 2026-05-29

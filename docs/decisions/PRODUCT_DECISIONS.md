# Product Decisions

## Purpose

Capture product direction and scope decisions.

## Current Decisions

- The platform is for church communications operations.
- The platform is centered on communications operations, not generic project management.
- Projects should function as the primary container object.
- Projects are the central container object.
- Working decision: use the hierarchy Campaigns -> Projects -> Deliverables -> Tasks.
- Campaigns are optional.
- Projects are the primary operational container.
- Deliverables are production and approval units.
- Tasks can attach to projects or deliverables.
- Media assets, tasks, approvals, messages, files, vendors, deliverables, and timelines should eventually relate back to projects.
- Known user roles include Admin, Manager, User, and Vendor.
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

## Open Questions

- What is the first user journey?
- Which product modules are required for MVP?
- What statuses should projects, assets, and approvals support?
- Is Brand Center MVP or early post-MVP?
- What level of closeout enforcement is appropriate for MVP?
- What utilization reports are needed first?
- Which pilot templates are required first?
- Which digest emails are required for MVP?
- Should communication history be exportable during project closeout?

## Notes

- Product decisions should reference user roles and workflows where possible.
- These are working decisions and should be refined through product planning before implementation.
- Calm software principles are documented in `/docs/product/CALM_SOFTWARE_PRINCIPLES.md`.
- Communications system details are documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.
- Roadmap and execution structure are documented in `/docs/ROADMAP.md`.
- Brand and voice guidance are documented in `/docs/branding`.

Last Updated: 2026-05-21

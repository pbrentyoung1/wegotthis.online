# Product Decisions

## Purpose

Capture product direction and scope decisions.

## Current Decisions

- The platform is for church communications operations.
- The platform is centered on communications operations, not generic project management.
- Projects should function as the primary container object.
- Projects are the central container object.
- Working decision: use Projects -> Deliverables -> Tasks as the MVP operational spine.
- Campaigns are an optional future parent and remain deferred until explicitly promoted.
- Projects are the primary operational container.
- Deliverables are production and approval units.
- Tasks can attach to projects or deliverables.
- Media assets, tasks, approvals, messages, files, vendors, deliverables, and timelines should eventually relate back to projects.
- Canonical Phase 1 system roles are Organization Admin, Communications Manager, Department Leader, Contributor, and Viewer.
- Older references to Communications Lead map to Communications Manager.
- Project Owner, Reviewer, Approver, stakeholder, admin delegate, and vendor participation are contextual assignments rather than additional Phase 1 system roles.
- External Reviewer is a person/contact type and future scoped access context. Platform Owner / Super Admin remains a future platform-level concern.
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
- Communications system details are documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.
- Roadmap and execution structure are documented in `/docs/ROADMAP.md`.
- Brand and voice guidance are documented in `/docs/branding`.

Last Updated: 2026-05-24

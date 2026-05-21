# Open Questions

## Purpose

Maintain a central list of unresolved questions that affect product, design, architecture, or operations.

## Current Decisions

- Open questions should be captured instead of answered prematurely.
- Decisions should move from this file into the relevant decision log when resolved.

## Open Questions

- Which Inspinia starter should be used?
- What permissions are required for Admin, Manager, User, and Vendor roles?
- What hosting.com plan and deployment path should be used first?
- What Figma artifacts are required before development begins?
- Which closeout items are required before archiving?
- Who is allowed to close a project?
- Should departments see budget and time usage?
- How detailed should source-file archive rules be in MVP?
- Should Brand Center be MVP or early post-MVP?
- What reporting is needed for annual planning?
- How will file storage work on hosting.com/cPanel initially?
- How will storage scale later?
- Which brand review steps are required in MVP?
- Which product surfaces should feel most conversational, and which should stay more compact for speed?
- What exact type scale and usage rules should govern IBM Plex Serif and Newsreader in the product?
- How should department utilization reporting avoid becoming advanced analytics too early?
- Exact backup tooling.
- Final production storage provider.
- Exact email provider if cost or hosting constraints change the Postmark preference.
- Whether recurrence is MVP or early post-MVP.
- Which phase should recurrence enter?
- Which pilot church workflow templates are required first.
- Exact permissions matrix.
- What is the minimum viable permissions matrix?
- How detailed file processing should be in MVP.
- Whether custom tenant subdomains are required later.
- Which search fields are required for first release.
- Which digest emails are required for MVP?
- What notification preferences are required for MVP?
- Should users be able to reply to notification emails and have replies captured in the project feed?
- Should project comments support internal-only and stakeholder-visible visibility?
- Should communication history be exportable during project closeout?
- What notification preferences should users control?
- Which integrations belong before pilot?
- Which diagrams must exist before Laravel scaffolding?
- Which workflows are required before pilot launch?

## Resolved or Working Decisions

- Tenancy model: single PostgreSQL database with tenant-scoped records using `tenant_id`.
- Product hierarchy: Campaigns -> Projects -> Deliverables -> Tasks.
- Campaign/parent container concept: Campaign is optional above projects.
- Deliverable vs project boundary: Projects are operational containers; deliverables are production and approval units.
- Approval target: MVP approvals primarily attach to deliverables.
- External stakeholder access: secure, time-bound magic links.
- Vendor access model: limited project or deliverable access through secure links.
- Communication channel: transactional email plus in-app notifications, with Postmark preferred early.
- Request lifecycle: requests are separate objects and may be draft, submitted, needs clarification, accepted, deferred, rejected, converted to project, or archived.
- Search MVP approach: PostgreSQL full-text search with intentional metadata indexing.
- Backups and retention: core product requirement before production.
- Audit log: meaningful activity and audit logging must be designed in early.
- Mobile/responsive priority: Inspinia is admin foundation, but stakeholder, approval, intake, and status flows should be mobile-first.
- Photo/copyright/release metadata: rights, release, and usage metadata should exist from the beginning.
- Communications system: project communication history is part of the MVP direction.
- Communication concepts: notifications, messages/comments, activity logs, and audit logs are related but distinct.

## Notes

- Add date and context when a question is significant.
- Link to resolved decisions when possible.
- Resolved items may still need implementation detail before coding.

Last Updated: 2026-05-21

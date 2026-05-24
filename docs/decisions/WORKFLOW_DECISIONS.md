# Workflow Decisions

## Purpose

Record decisions about operational workflows supported by the platform.

## Current Decisions

- Communications request intake should connect to project management.
- Requests are separate from projects.
- Requests can be deferred, rejected, or converted.
- Approval tracking is a core product area.
- Approvals primarily target deliverables.
- Magic links are the MVP external review model.
- Social, print, signage, vendor, and production workflows are expected future areas.
- Projects should not move directly from Published to Archived.
- Projects should enter Closeout first.
- Canonical project lifecycle is Intake -> Discovery -> Approved -> Planned -> Active -> In Review -> Revision -> Scheduled -> Published -> Closeout -> Archived.
- Canonical deliverable lifecycle is Planned -> In Progress -> In Review -> Waiting for Approval -> Changes Requested -> Approved -> Scheduled -> Published -> Archived.
- Waiting for Approval is reserved for deliverables and reviewable elements, not the project itself.
- Closeout should include asset verification, metadata, archive structure, and reusable asset tagging.
- Brand checks should occur during intake, review, and closeout.
- Deliverables may have separate statuses and approvals.
- Templates should provide defaults without creating rigid workflows.
- Vendor participation should use vendor-scoped External Reviewer links in MVP.
- Magic links should remain tenant-bound, scope-bound, action-bound, time-bound, and revocable.
- Project communication history should preserve comments, reviewer feedback, approval notes, requested changes, decision history, status updates, and meaningful system events.
- Notifications should alert people to action, while project feeds preserve context.
- Digest emails should be considered MVP or early post-MVP.
- Canonical MVP task statuses are Not Started, In Progress, Blocked, Ready for Review, Done, Deferred, and Canceled.
- Canonical MVP approval/review states for deliverables or reviewable elements are Planned, In Progress, In Review, Waiting for Approval, Changes Requested, Approved, Canceled, Expired, and Superseded.
- Review assignments may cover Budget, Resources, Design, Brand, Content, Ministry, and Final approval.
- Required review assignments block approval until approved or explicitly waived.

## Open Questions

- Which workflows need vendor access?
- Which closeout steps are required versus optional?
- Who can approve closeout exceptions?
- Which projects require formal brand review?
- Which recurring workflows are required for the pilot?
- Should users be able to reply to notification emails and have replies captured in the project feed?
- Should project comments support internal-only and review-visible visibility?
- What notification preferences should users control?

## Notes

- Workflow decisions should remain readable by non-technical stakeholders.
- Project lifecycle details are documented in `/docs/product/PROJECT_LIFECYCLE.md`.
- Closeout workflow details are documented in `/docs/workflows/PROJECT_CLOSEOUT_WORKFLOW.md`.
- Brand review workflow details are documented in `/docs/workflows/BRAND_REVIEW_WORKFLOW.md`.
- Request lifecycle details are documented in `/docs/product/REQUEST_LIFECYCLE.md`.
- Deliverable details are documented in `/docs/product/DELIVERABLES.md`.
- Project communication workflow details are documented in `/docs/workflows/PROJECT_COMMUNICATION_WORKFLOW.md`.
- External access scope details are documented in `/docs/architecture/maps/security/external-access-scope-map.md`.

Last Updated: 2026-05-24

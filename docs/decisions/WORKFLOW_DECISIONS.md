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
- Closeout should include asset verification, metadata, archive structure, and reusable asset tagging.
- Brand checks should occur during intake, review, and closeout.
- Deliverables may have separate statuses and approvals.
- Templates should provide defaults without creating rigid workflows.
- Vendor access should use limited project or deliverable links in MVP.
- Project communication history should preserve comments, stakeholder feedback, approval notes, requested changes, decision history, status updates, and meaningful system events.
- Notifications should alert people to action, while project feeds preserve context.
- Digest emails should be considered MVP or early post-MVP.

## Open Questions

- What are the first required approval steps?
- Who can request work, approve work, and mark work complete?
- Which workflows need vendor access?
- Which closeout steps are required versus optional?
- Who can approve closeout exceptions?
- Which projects require formal brand review?
- Which recurring workflows are required for the pilot?
- Should users be able to reply to notification emails and have replies captured in the project feed?
- Should project comments support internal-only and stakeholder-visible visibility?
- What notification preferences should users control?

## Notes

- Workflow decisions should remain readable by non-technical stakeholders.
- Project lifecycle details are documented in `/docs/product/PROJECT_LIFECYCLE.md`.
- Closeout workflow details are documented in `/docs/workflows/PROJECT_CLOSEOUT_WORKFLOW.md`.
- Brand review workflow details are documented in `/docs/workflows/BRAND_REVIEW_WORKFLOW.md`.
- Request lifecycle details are documented in `/docs/product/REQUEST_LIFECYCLE.md`.
- Deliverable details are documented in `/docs/product/DELIVERABLES.md`.
- Project communication workflow details are documented in `/docs/workflows/PROJECT_COMMUNICATION_WORKFLOW.md`.

Last Updated: 2026-05-20

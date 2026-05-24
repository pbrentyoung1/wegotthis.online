# Project Communication Workflow

## Purpose

Document how project conversations, activity, notifications, and audit records should work together.

## Current Decisions

- Working decision: project communication should be captured in context.
- Working decision: comments, activity logs, audit logs, and notifications are related but distinct.
- Working decision: the project feed should help users understand what happened, who was involved, and what changed afterward.
- Working decision: External Reviewer communication should remain narrow and scoped through magic links rather than full accounts where possible.

## Step 1: Capture Human Conversation

- Comments should stay attached to the relevant project or deliverable.
- External Reviewer feedback should be preserved with timestamp and author context.
- Approval notes and requested changes should remain visible in the appropriate review context.
- Internal discussion may need visibility controls.

## Step 2: Record Visible Activity

- Status changes should appear in project history.
- File uploads should appear in project history.
- Task updates should appear in project history when meaningful.
- Budget changes should appear in project history where the viewer has permission.
- System reminders may appear when they explain project movement or delay.

## Step 3: Preserve Protected Audit Records

- Audit logs should record meaningful changes for accountability and troubleshooting.
- Audit records may include more protected detail than visible project history.
- Audit visibility should be limited by role and tenant scope.

## Step 4: Send Notifications

- Notifications alert the right people that something needs attention.
- Notifications should link back to the relevant project, deliverable, request, task, or approval.
- Notifications should avoid creating noise when the project feed already provides enough context.

## Step 5: Support Closeout

- Communication history should be available during closeout.
- Important decisions, approval notes, External Reviewer feedback, and requested changes should be preserved.
- Exporting communication history during closeout is an open question.

## Open Questions

- Which digest emails are required for MVP?
- Should users be able to reply to notification emails and have replies captured in the project feed?
- Should project comments support internal-only and review-visible visibility?
- Should communication history be exportable during project closeout?
- What notification preferences should users control?

## Notes

- Product details are documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.
- Notification channel details are documented in `/docs/technical/NOTIFICATIONS.md`.
- External access boundaries are documented in `/docs/architecture/maps/security/external-access-scope-map.md`.

Last Updated: 2026-05-21

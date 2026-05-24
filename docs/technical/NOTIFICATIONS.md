# Notifications

## Purpose

Document outbound notification channels, notification types, and early provider direction.

## Current Decisions

- Working decision: use transactional email plus in-app notifications.
- Email is mandatory for approvals, request updates, external review links, and status changes.
- In-app notifications are needed for logged-in users.
- Postmark is the preferred early transactional email provider unless cost or hosting constraints change the decision.
- Working decision: notifications are alerts sent to people, not the full communication system.
- Working decision: digest emails should be considered MVP or early post-MVP.
- The system should avoid notification noise.

## Communication Model

- Notifications are outbound alerts.
- Messages/comments are human conversation.
- Activity logs are visible project history.
- Audit logs are protected records of meaningful changes.
- Notifications should link back to the relevant project, deliverable, request, task, approval, or comment context.

## Notification Types

- Request submitted
- Clarification needed
- Request accepted, deferred, or rejected
- Project update
- Project status update
- Overdue task
- Assignment notification
- Deliverable ready for review
- Approval requested
- Approval completed
- Comment or mention
- Deadline reminder
- Daily or weekly digest
- External review link
- Closeout required
- Closeout reminder

## Future Channels

- SMS
- Slack
- Microsoft Teams
- Planning Center-related notifications
- Other ministry or church operations tools

## Open Questions

- Is Postmark final, or could cost/hosting constraints change the provider?
- Which notifications are required for MVP?
- Which digest emails are required for MVP?
- Which notifications should be configurable per user?
- How should notification preferences work for external magic-link reviewers?
- Should users be able to reply to notification emails and have replies captured in the project feed?

## Notes

- Future channels are post-MVP unless a pilot church requires them.
- Product-level notification principles and tone guidance are documented in `/docs/product/NOTIFICATION_STRATEGY.md`. That document is the source of truth for *what* to notify and *why*. This file covers the technical implementation layer.
- Product-level communications system details are documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.
- Per-persona notification rules (who gets notified about what, and when not to notify) are documented in `/docs/product/PERSONA_BEHAVIOR_MAPS.md`.

Last Updated: 2026-05-24

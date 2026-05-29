# Communications System

## Purpose

Document the product direction for outbound communication and project communication history.

## Current Decisions

- Working decision: project communication history is part of the MVP direction.
- Working decision: transactional email is required for MVP.
- Working decision: in-app notifications are required for logged-in users.
- Digest emails should be considered MVP or early post-MVP.
- The system should avoid notification noise.
- Project communication should be captured in context rather than scattered across email, text messages, and meetings.
- Comments, activity logs, audit logs, and notifications should be related but conceptually distinct.
- Communication should feel supportive, conversational, and human rather than clinical.
- External Reviewer communication should use narrow, time-bound magic links instead of creating unnecessary full accounts.
- Project communication should preserve both operational context and strategic context when helpful.
- Goal alignment should be visible enough that people understand why work matters, not only what task is next.

## Conceptual Distinctions

- Notifications are alerts sent to people.
- Messages/comments are human conversation.
- Activity logs are visible project history.
- Audit logs are protected records of meaningful changes.

## Outbound Communication

System-generated emails and in-app notifications may include:

- Project status updates
- Overdue tasks
- Approval requests
- Clarification requests
- Request accepted, deferred, or rejected notices
- Assignment notifications
- Mention/comment notifications
- Deadline reminders
- Daily or weekly digests
- External Reviewer review links
- Closeout reminders

Outbound communication should:

- sound calm and personal
- explain why the message matters
- make the next step obvious
- avoid guilt, panic, or robotic system language unless truly necessary

## Project Communication History

Each project should preserve a unified communication/activity feed documenting:

- Strategic context associations when they shape the work
- Project brief updates
- Deliverable brief updates
- Comments
- External Reviewer feedback
- Approval notes
- Requested changes
- Internal discussion
- Decision history
- Status updates
- System-generated events
- File uploads
- Task updates
- Budget changes
- Who said what and when
- What changed afterward

## Project Feed Event Types

- Comments
- Status changes
- Approval events
- Change requests
- File events
- Task events
- Budget events
- System reminders
- Strategic context updates

## Open Questions

- Which digest emails are required for MVP?
- Should users be able to reply to notification emails and have replies captured in the project feed?
- Should project comments support internal-only and review-visible visibility?
- Should communication history be exportable during project closeout?
- What notification preferences should users control?

## Notes

- The communications system should reduce interruptions by making project context easy to find.
- Notification design should favor relevance, batching, and user control where appropriate.
- Conversational UX should help people think and respond more clearly without turning the product into a chat gimmick.
- Communications should connect ministry goals to communication strategy and execution without becoming noisy or managerial.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.
- External access scope is mapped in `/docs/architecture/maps/security/external-access-scope-map.md` and visualized in the docs site at `/architecture/magic-link-scope`.

Last Updated: 2026-05-29

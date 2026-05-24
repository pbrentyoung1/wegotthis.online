# NOTIFICATION_STRATEGY.md

# Notification Strategy

## Purpose

Notifications in ForWorship Creative exist to reduce coordination friction, not create more noise.

Church communications teams already experience:

* interruption fatigue
* fragmented communication
* scattered updates
* unclear ownership
* constant follow-up requests

The notification system should:

* increase clarity
* reduce unnecessary interruptions
* surface actionable information
* preserve operational calm
* feel calm, human, and quietly supportive

Notifications should support the workflow, not dominate it.

---

# Core Notification Principles

## Notify for Action, Not Activity

Users generally do not need notifications for passive system activity.

Prefer notifications when:

* action is required
* approval is needed
* clarification is requested
* deadlines are approaching
* work is blocked
* someone is directly mentioned

Avoid notifications for:

* low-value state changes
* minor metadata edits
* non-actionable updates
* excessive “FYI” messages

---

## Reduce Interruption Fatigue

Too many notifications destroy trust in the platform.

Users should never feel:

* overwhelmed
* spammed
* punished for participation

The system should:

* consolidate updates where possible
* support digest-based communication
* allow granular notification preferences
* prioritize urgent or blocking issues

---

## Notifications Must Be Contextual

Every notification should clearly answer:

* What changed?
* Why does it matter?
* What action is needed?
* Where should I go?

Avoid vague alerts.

Good:

* “The Easter Invite Postcard is ready for your approval.”

Bad:

* “Deliverable status updated.”

---

# Notification Types

## Immediate Notifications

These should generally send immediately because they require action.

### Request-related

* request submitted
* request needs clarification
* request accepted
* request deferred
* request rejected

### Assignment-related

* task assigned
* task reassigned
* deadline changed significantly

### Approval-related

* deliverable ready for review
* approval requested
* approval approved
* approval rejected
* revision requested

### Communication-related

* direct mention
* direct reply
* External Reviewer response

### Blocking Issues

* overdue deliverable
* overdue approval
* blocked task
* failed upload or processing issue

---

## Digest Notifications

Digest notifications reduce interruption noise.

### Daily Digest

Potential content:

* tasks due today
* overdue tasks
* pending approvals
* blocked projects
* upcoming deadlines

### Weekly Digest

Potential content:

* completed projects
* active campaigns
* department workload summary
* overdue items
* upcoming major milestones

Digest emails may be:

* MVP
* or early post-MVP depending on implementation complexity

---

# Notification Channels

## Transactional Email (Required for MVP)

Primary channel for:

* approvals
* magic links
* status changes requiring action
* External Reviewer communication
* assignment notifications

Preferred early provider:

* Postmark

Future options:

* SES
* Mailgun
* Resend

---

## In-App Notifications (Required for MVP)

Logged-in users should receive:

* actionable updates
* mentions
* assignment changes
* approval requests
* reminders

In-app notifications should:

* be grouped logically
* remain readable
* avoid clutter

---

## Future Notification Channels (Post-MVP)

Potential future channels:

* SMS
* Slack
* Microsoft Teams
* Planning Center integrations
* push notifications

These should only be added if they reduce friction rather than create duplicate communication streams.

---

# Notification Preferences

Users should eventually control:

* immediate vs digest notifications
* email vs in-app delivery
* quiet hours
* project subscriptions
* comment notifications
* approval reminders
* overdue reminders

Default preferences should favor:

* low noise
* action-only communication

---

# Subscriptions and Watchers

Not every user needs every update.

Users may:

* follow projects
* follow deliverables
* watch campaigns
* mute low-priority work

Examples:

* Designers care about assigned tasks.
* Department leaders care about approvals and status.
* Executives care about summaries.
* Vendors care about specific deliverables only.

The system should avoid broadcasting updates unnecessarily.

---

# Magic Link Communication

External reviewers should receive:

* clean approval emails
* contextual project information
* direct review links
* simple approve/request changes actions
* only the scoped context permitted by the link

The experience should:

* work perfectly on mobile
* require no account
* minimize friction

Magic-link notifications are a critical product surface and should feel polished and trustworthy.

---

# Communication History vs Notifications

These concepts are related but distinct.

## Notifications

Alerts sent to users.

## Comments/Messages

Human communication inside projects and deliverables.

## Activity Feed

Visible project history and timeline.

## Audit Log

Protected operational record of meaningful changes.

The notification system should reinforce contextual communication rather than replace it.

---

# Overdue Strategy

Overdue notifications should:

* escalate gradually
* avoid shame-based language
* remain actionable

Good:

* “The Summer Camp postcard is still waiting for approval.”

Bad:

* “WARNING: TASK FAILURE.”

Escalation examples:

* gentle reminder
* digest inclusion
* direct notification
* Communications Lead escalation if necessary

---

# Notification Tone

Notifications should feel:

* human
* calm
* concise
* helpful

Avoid:

* technical jargon
* robotic language
* excessive urgency
* enterprise-style warning systems

The platform should feel supportive, not stressful.

Notifications should feel like a capable teammate helping at the right moment, not a warning system trying to manage behavior.

---

# Open Questions

* Which digest types are required for MVP?
* Should users be able to reply to emails and have replies captured in the project feed?
* Should notifications support threaded replies later?
* Which notification events should be suppressible?
* How should quiet hours work for church staff with weekend-heavy schedules?
* Should executive users receive summarized rollups automatically?
* How should mobile push notifications differ from email?

---

# Guiding Principle

The best notification is often the one that never needed to be sent because the system already provided enough visibility.

---

# Related Documents

- `/docs/product/SYSTEM_PHILOSOPHY.md` - Core product philosophy; "Notifications Are a Liability" principle
- `/docs/product/PERSONA_BEHAVIOR_MAPS.md` - Per-persona notification rules: who gets notified about what, and equally important, what not to notify them about
- `/docs/technical/NOTIFICATIONS.md` - Technical implementation layer: channels, providers, types
- `/docs/product/COMMUNICATIONS_SYSTEM.md` - Communication model: how notifications, comments, activity logs, and audit logs differ
- `/docs/architecture/maps/security/external-access-scope-map.md` - Canonical external access and magic-link scope boundaries

Last Updated: 2026-05-24

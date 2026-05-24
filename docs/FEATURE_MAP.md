# Feature Map

## Purpose

Create a structured map of known and planned product capabilities.

## Current Decisions

- Core product areas include project management, media asset management, social media workflow, communications request intake, task and approval tracking, vendor and production management, calendar and dashboard views, messaging/activity tracking, project closeout, department reporting, and brand management.
- Future integrations should be treated as optional connectors, not core MVP requirements.

## Communications Work Management

- Manage 20+ active communications projects across many departments.
- Centralize project traffic, status, follow-up, notes, files, approvals, and timelines.
- Reduce administrative coordination work for Communications.

## Campaigns

- Optional parent containers for large initiatives such as Easter, Christmas, sermon arcs, capital campaigns, or church-wide efforts.
- Campaigns can contain multiple projects.
- Simple projects do not require a campaign.

## Request Lifecycle

- Requests exist before projects.
- Request statuses include Draft, Submitted, Needs Clarification, Accepted, Deferred, Rejected, Converted to Project, and Archived.
- Deferred and rejected requests should remain searchable.

## Deliverables

- Deliverables are the specific outputs being produced.
- Deliverables may have due dates, statuses, approvals, files/assets, tasks, specs, and scheduled dates.
- Most approvals should attach to deliverables in MVP.

## Tasks

- Project-level tasks support coordination.
- Deliverable-level tasks support production.
- Tasks should include assigned user, due date, status, comments, and relation to project or deliverable.

## Guided Request Intake

- Help departments submit clear requests with purpose, audience, CTA, timing, budget, stakeholders, assets, and approval needs.
- Improve ministry preparedness before work enters the communications queue.
- Support request review and triage before project approval.

## Review Visibility

- Provide self-service project status views for reviewers, External Reviewers, and departments where scope allows.
- Show upcoming deadlines, review needs, approvals, and current blockers.
- Reduce repeated status update requests to Communications.

## Magic Link Reviews

- External Reviewers should use secure, time-bound magic links for MVP review and approval.
- Magic links should expose only relevant project or deliverable context.
- Magic links should support view, comment, approve, or request changes where allowed.
- Vendor participation should use vendor-scoped External Reviewer links, limited to the specific project, deliverable, file, or action context.

## Timeline Management

- Track communication timelines, production deadlines, publication dates, review windows, and scheduled deliverables.
- Make timeline changes visible to the right people.
- Support project statuses from intake through archive.

## Budget and Utilization Tracking

- Track basic project cost, budget, estimated time, actual time, and department usage.
- Support future reporting for yearly budget, staffing, and planning conversations.
- Keep open whether departments can see all budget and time usage details.

## Media Asset Management

- Organize photos, graphics, video, design files, project files, brand assets, and reusable assets.
- Track what is final, draft, source, export, vendor-ready, and reusable.
- Track where assets were used and how they relate to projects.

## Release/Rights Tracking

- Track source/photographer, copyright/license notes, usage permission status, contains minors, public use approval, approved channels, expiration/restriction notes, people tagged, and department/ministry context.
- Rights and release metadata should be included from the beginning because churches handle photos of minors, congregants, events, and external media.

## Project Closeout and Archiving

- Move projects through a structured closeout workflow before archive.
- Verify final deliverables, source files, exports, vendor files, approvals, budget details, timeline, and reusable assets.
- Preserve institutional creative memory for search, reuse, future campaigns, and audits.

## Brand Center

- Store approved logos, colors, typography, copy blocks, CTA language, photography standards, social standards, video standards, templates, and ministry sub-brand guidance.
- Connect approved brand assets to the Media Library.
- Support request intake and project work with brand guidance.

## Brand Governance

- Add brand checks during intake, review, approval, final sign-off, and closeout.
- Help churches protect consistency without forcing every decision into manual review.
- Keep final governance rules as a working direction until real workflows are documented.

## Department Reporting

- Track volume, type, time, budget, and asset usage by department.
- Support annual planning, staffing, budget review, and ministry communication strategy.
- Define MVP reporting separately from advanced analytics.

## Templates

- Simple request/project templates should provide default fields, suggested deliverables, timelines, tasks, closeout requirements, and brand prompts.
- Complex workflow builders are post-MVP.

## Notification System

- Use transactional email plus in-app notifications.
- Email is mandatory for approvals, request updates, external review links, and status changes.
- Outbound notifications should include project status updates, overdue tasks, approval requests, clarification requests, request accepted/deferred/rejected notices, assignments, mentions/comments, deadline reminders, digests, external review links, and closeout reminders.
- Notifications are alerts sent to people and should not be confused with project communication history.
- The system should avoid notification noise.
- Future channels such as SMS, Slack, Teams, and Planning Center-related notifications are post-MVP.

## Project Communication History

- Each project should preserve a unified communication/activity feed.
- The feed may include comments, reviewer feedback, External Reviewer feedback, approval notes, requested changes, internal discussion, decision history, status updates, system-generated events, file uploads, task updates, budget changes, and system reminders.
- The feed should show who said what, when it happened, and what changed afterward.
- Messages/comments, activity logs, audit logs, and notifications should be related but distinct.

## Search

- Use PostgreSQL full-text search for MVP.
- Index project names, campaign names, deliverable names, asset names, tags, departments, people in image where tracked, status, usage history, brand asset names, request content, and comments/activity where appropriate.

## Backups and Retention

- Backups are a core product requirement.
- Database backups, file/archive backups, restore process, and archive retention policies must be planned before production.

## Audit/Activity Log

- Track meaningful actions such as request submitted, status changed, file uploaded, approval completed, budget changed, time logged, project entered closeout, project archived, and External Reviewer link used.
- Activity history supports accountability, institutional memory, troubleshooting, and reporting.

## Calm Software Principles

- Create calm, not complexity.
- Guide instead of obstruct.
- Reduce interruptions and administrative overhead.
- Use opinionated defaults with flexible overrides.
- Help and get out of the way.

## Future Integrations

- Planning Center
- Google Workspace
- Google Docs
- Dropbox
- OneDrive
- Adobe
- Canva
- Social publishing APIs

## Open Questions

- Which features are MVP, post-MVP, and long-term?
- Which modules require external integrations?
- Which features need approval workflows?
- Which future integrations should support two-way sync versus read-only import?
- Which search fields are required for first release?
- Which templates are required for the pilot church?
- Which digest emails are required for MVP?
- Should communication history be exportable during project closeout?
- What notification preferences should users control?

## Notes

- Keep this map high level. Detailed behavior belongs in `/docs/product`.
- Planning Center integration planning lives in `/docs/technical/PLANNING_CENTER_INTEGRATION.md`.
- Detailed pain points live in `/docs/product/PAIN_POINTS.md`.
- Project closeout details live in `/docs/product/PROJECT_CLOSEOUT.md`.
- Brand management details live in `/docs/product/BRAND_MANAGEMENT.md`.
- Calm software principles live in `/docs/product/CALM_SOFTWARE_PRINCIPLES.md`.
- Search strategy lives in `/docs/technical/SEARCH_STRATEGY.md`.
- Notifications planning lives in `/docs/technical/NOTIFICATIONS.md`.
- Backups and retention planning lives in `/docs/technical/BACKUPS_AND_RETENTION.md`.
- Communications system details live in `/docs/product/COMMUNICATIONS_SYSTEM.md`.

Last Updated: 2026-05-24

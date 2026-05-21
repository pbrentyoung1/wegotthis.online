# Persona Behavior Maps

## Purpose

Translate personas into system-level behavior: what each person actually does inside the platform, how often, what triggers it, and on what device. This layer drives navigation architecture, notification rules, default homepage logic, permission boundaries, and mobile optimization strategy.

Personas without behavior maps produce bloated dashboards. Every feature built without a behavior map attached to it risks solving a problem no one actually has.

## How to Use This Document

- Use the **action tables** to validate that a proposed feature has a real trigger and a real user
- Use the **design derivations** at the bottom to make navigation, notification, and homepage decisions
- When a UX debate arises, check this document first — "who does this, how often, and from what device?" settles most arguments

---

## Behavior Maps by Persona

### Persona 1 — Dana M., Communications Director

| Action | Frequency | Trigger | Device | Notes |
|--------|-----------|---------|--------|-------|
| Review dashboard (active projects, status, blockers) | Daily | Start of workday | Desktop | Must be the default landing page |
| Triage incoming request queue | Daily | Queue count in nav or notification | Desktop | Accept / defer / reject / request clarification |
| Send clarification request on intake | Daily | Triage queue | Desktop | Ties back to original request; Marcus gets notified |
| Accept a request and convert to project | Several/week | Triage queue | Desktop | Should pre-populate project from request data |
| Assign project or task to team member | Several/week | Project acceptance or replanning | Desktop | Needs workload context alongside the assignment UI |
| Review team workload | Daily | Before making assignments | Desktop | Who has what; how full is each person's queue |
| Review / approve a deliverable | Several/week | Notification (deliverable ready for review) | Desktop | May also approve from mobile when traveling |
| Override project status | Occasionally | Escalation, correction | Desktop | Rare; needs to be audited |
| Create or adjust a project timeline | Weekly | Project scoping or replanning | Desktop | |
| Run a department utilization report | Monthly | Leadership meeting prep | Desktop | Output must be shareable / exportable |
| Initiate project closeout | Weekly | Project reaches Published state | Desktop | Triggers checklist; assigns to team member |
| Verify closeout checklist completion | Weekly | Checklist submitted for sign-off | Desktop | |
| Manage approved brand assets | Occasionally | Brand review need or new asset added | Desktop | |

**Dana's primary trigger is the queue.** If she lands anywhere other than a view that shows her request queue count and active project status, she will navigate away immediately. Her dashboard is her triage surface, not a reporting screen.

---

### Persona 2 — Alex R., Graphic Designer / Producer

| Action | Frequency | Trigger | Device | Notes |
|--------|-----------|---------|--------|-------|
| Review assigned task list | Daily | Start of workday | Desktop | Must be the default landing page |
| Read project brief / request details | Per project | Task assignment | Desktop | Should be accessible without leaving the project |
| Search media library for brand assets | Daily | Starting any new creative task | Desktop | Most common friction point if search is poor |
| Download approved asset from media library | Daily | Creative work in progress | Desktop | |
| Upload deliverable (first version) | Several/week | Task completion | Desktop | Should auto-version and mark as "ready for review" |
| Upload revision | Daily | Revision request received | Desktop | Must clearly supersede previous version |
| Mark task complete | Daily | Task finished | Desktop | Simple status action; should not require confirmation modal |
| Review feedback / revision notes on deliverable | Daily | After review notification | Desktop | Feedback must appear in context on the deliverable |
| Advance deliverable status | Daily | Work completion or review pass | Desktop | e.g., mark as "ready for review," "revision uploaded" |
| Comment on a project or deliverable | Several/week | Clarification needed or responding to feedback | Desktop | |
| View project timeline | Weekly | Planning upcoming work | Desktop | |
| Search past projects for reference | Occasionally | Starting similar work | Desktop | "I made something like this last Easter" |
| Prepare production-ready file for vendor | Per job | Deliverable approved, going to print | Desktop | |

**Alex's primary trigger is his task list.** He should land on it every time he logs in. Everything else — the brief, the assets, the deliverable, the feedback — should be reachable from inside the task or project without requiring separate navigation.

---

### Persona 3 — Marcus T., Ministry / Department Leader

| Action | Frequency | Trigger | Device | Notes |
|--------|-----------|---------|--------|-------|
| Submit a new communications request | Every 2–4 weeks | Ministry planning or upcoming event | Mobile or Desktop | Guided intake; guided = he answers questions, not fills a form |
| Save a request as draft | Occasionally | Started intake but not ready to submit | Mobile | Must auto-save |
| Check status of an active request or project | Weekly | Wondering where things stand | Mobile | Must be readable in under 5 seconds |
| Respond to a clarification request | Weekly | Email or push notification | Mobile | Should deep-link back to the specific request field needing clarification |
| Approve a deliverable (magic link) | Weekly | Email or push notification | Mobile | No login required for this action |
| Request changes on a deliverable (magic link) | Weekly | Email or push notification | Mobile | Comment field opens; must be thumb-friendly |
| View a deliverable in review | Weekly | Magic link | Mobile | Preview must render on mobile without downloading |
| View past project history for his ministry | Occasionally | Planning a new similar project | Desktop | "What did we do for Fall Retreat last year?" |
| View a deliverable that was approved and published | Occasionally | Curiosity or team use | Mobile | |

**Marcus's primary trigger is a notification.** He rarely opens the platform unprompted. Design for him assumes he enters through a link — either a notification deep-link or a magic link — not through a homepage. When he does log in directly, his landing page should show only his ministry's active requests and projects, not the full workspace.

---

### Persona 4 — Pastor Kim W., Senior Pastor / Executive

| Action | Frequency | Trigger | Device | Notes |
|--------|-----------|---------|--------|-------|
| Review executive summary / dashboard | Monthly | Board meeting prep or weekly leadership rhythm | Mobile | 3–5 data points max; no project-level detail by default |
| Approve a strategic deliverable (magic link) | Occasionally | Email or push notification | Mobile | Same magic link flow as Marcus and Jennifer |
| View a campaign overview | Quarterly | Strategic planning cycle | Desktop or Mobile | What projects are under a campaign, timeline, status |
| Review a leadership / utilization report | Quarterly | Annual planning or budget conversations | Desktop | Needs to be printable or shareable with elders |
| Drill into a specific project | Rarely | Curiosity or concern about a specific initiative | Mobile | Read-only; should not be able to accidentally change anything |

**Pastor Kim's primary trigger is a meeting on her calendar.** She opens the platform to prepare for a conversation, not to manage anything. Her access should be read-heavy and entirely non-destructive by default. Magic link approval is the only action she regularly takes that changes system state.

---

### Persona 5 — Jennifer P., External Stakeholder / Reviewer

| Action | Frequency | Trigger | Device | Notes |
|--------|-----------|---------|--------|-------|
| Open magic link | Per review cycle | Email or text message | Mobile | Link must open directly to deliverable — no login screen |
| Read review context (what is this, what round, what's being asked) | Per review | Opening magic link | Mobile | Must be above the fold on a phone |
| Preview deliverable | Per review | Magic link | Mobile | PDF, image, or video must render without downloading |
| Approve deliverable | Per review | Review complete | Mobile | One tap; should require a brief confirmation, not a modal wall |
| Request changes | Per review | Something needs to change | Mobile | Opens simple comment field; no formatting tools needed |
| Return to check if feedback was addressed | Occasionally | Follow-up curiosity | Mobile | Same magic link must remain accessible if not expired |
| Receive follow-up notification | Occasionally | Revision uploaded for her review | Email/text | Re-sends a new or updated magic link |

**Jennifer's entire interaction is the magic link.** She has no homepage, no navigation, no session to maintain. Every design decision for her experience starts with: "What does this person see in the first 3 seconds after tapping a link from her email?" If that screen is not immediately legible and actionable, the flow is broken.

---

### Persona 6 — Carlos M., External Vendor

| Action | Frequency | Trigger | Device | Notes |
|--------|-----------|---------|--------|-------|
| Receive and open scoped vendor link | Per job | Email from Communications | Desktop | Link scoped to specific deliverable(s) only |
| Review production specs (size, bleed, color mode, format) | Per job | Vendor link | Desktop | Specs must be co-located with the file, not in a separate document |
| Download production-ready approved file | Per job | Vendor link | Desktop | Must be clearly labeled "Approved for Production" |
| Upload proof or completed file | Per job | Production complete | Desktop | Simple upload with confirmation; no complex UI |
| Comment on a deliverable for clarification | Per job | Spec question or issue | Desktop or Mobile | Should notify the assigned internal contact |
| Check delivery or publication timeline | Per job | Production planning | Desktop | When does the church need this by? |

**Carlos's primary trigger is the job handoff.** He enters through a scoped link, gets what he needs, does his work, and delivers back through the same surface. The vendor experience should feel like a clean, professional file portal — not an internal project tool with permissions stripped out.

---

### Persona 7 — Tanya B., Volunteer Contributor

| Action | Frequency | Trigger | Device | Notes |
|--------|-----------|---------|--------|-------|
| Open direct task link | Per event or task | Text message, email, or WhatsApp from a pastor or leader | Mobile | Must land on the task immediately — no navigation |
| Upload photo batch | Per event | Direct link or reminder after shooting | Mobile | Batch upload; progress indicator; must feel reassuring |
| Drop a single file (sermon notes, lyric sheet) | Per task | Direct link | Mobile or Desktop | |
| Review / confirm a lyric or document | Per task | Direct link | Mobile | Simple approve or flag; no complex annotation |
| Receive upload confirmation | Per event | Upload complete | Mobile | Warm, clear confirmation: "Your photos were added to Easter Weekend." |
| Log in after a long gap and reorient | Every few weeks | Reminder or new task assigned | Mobile | Landing state must show only her assigned tasks — nothing else |
| Reset password | Nearly every login | Returning after a gap | Mobile | Fast, mobile-friendly recovery is non-negotiable for this persona |

**Tanya's primary trigger is a personal message from someone she trusts.** The platform never earns her attention on its own — a pastor or ministry leader sends her a link and she follows it. This means the direct task URL is the real front door for this persona. The account and login exist to handle cases where she needs to see past contributions or access something not covered by a direct link, but they should be as invisible as possible.

---

## Design Derivations

### Default Homepage by Persona

These are not suggestions — they are requirements derived directly from the trigger column above. A one-size-fits-all homepage produces a platform that feels wrong to everyone.

| Persona | Default Landing Page | Rationale |
|---------|---------------------|-----------|
| Dana | Dashboard (queue + active projects + team load) | Her primary trigger is the queue count — she needs it immediately |
| Alex | My Tasks (sorted by due date, then project) | His day starts with "what do I work on first?" |
| Marcus | My Requests & Projects (ministry-scoped status) | He logs in to check status; show only his ministry's work |
| Pastor Kim | Executive Summary | Read-only, 3–5 data points, nothing that requires action |
| Jennifer | No homepage — magic link only | Her session is a single task; a homepage adds only friction |
| Carlos | No homepage — scoped vendor link only | Same as Jennifer; a portal view scoped to his job |
| Tanya | Focused Task View ("Here's what you've been asked to do") | She cannot be expected to navigate; her work must be surfaced immediately |

### Notification Rules by Persona

Notifications should do exactly one thing: get the right person to take the right action at the right time. Every notification that does not lead to an action is noise that erodes trust.

| Persona | Notify When | Do Not Notify When |
|---------|------------|-------------------|
| Dana | New request submitted; deliverable ready for her review; project blocked; overdue item; closeout checklist submitted | Routine task completions; every comment on every project |
| Alex | Task assigned to him; deliverable sent back for revision; someone comments directly on his deliverable | Requests being triaged; project status changes he isn't responsible for |
| Marcus | Clarification needed on his request; deliverable ready for his approval; project milestone (published) | Internal team task updates; deliverable revision cycles he isn't part of |
| Pastor Kim | High-stakes deliverable assigned to her for approval | Most things; default to silent unless specifically assigned |
| Jennifer | Deliverable ready for her review; follow-up if no response after X days | Nothing else — she has no account footprint |
| Carlos | Vendor link sent with file ready; comment reply from internal team | Internal project activity; approval status changes |
| Tanya | Task assigned to her (via text or email preferred); confirmation that upload was received | Anything not directly related to her contribution |

### Permission Boundaries by Persona

Derived from what each persona needs to *do*, not what they might want to *see*.

| Persona | Can Create | Can Edit | Can Approve | Can View | Cannot |
|---------|-----------|----------|-------------|----------|--------|
| Dana | Requests, Projects, Deliverables, Tasks, Brand Assets | Everything in her tenant | Deliverables, Requests, Closeout | All tenant content | Cross-tenant data |
| Alex | Deliverables, Tasks (on assigned projects) | His assigned tasks and deliverable uploads | Mark his own work ready for review | Projects he's assigned to; media library | Triage queue; reports; user management |
| Marcus | Requests (for his ministry) | His draft requests; clarification responses | Deliverables assigned to him | His ministry's active and past projects | Other ministries' projects; team workload; reports |
| Pastor Kim | Nothing | Nothing | Deliverables specifically assigned to her | All active projects (read-only); campaigns; reports | Create or edit projects; manage users; triage queue |
| Jennifer | Nothing | Nothing | Deliverable assigned to her via magic link | Only the scoped deliverable context | Everything else |
| Carlos | Nothing | Nothing | Nothing (can upload proofs, not approve) | Only scoped deliverable and production specs | Internal project workspace; approvals; reports |
| Tanya | Uploads only (photos, files to assigned tasks) | Nothing | Confirmation/acknowledgment only | Only her assigned tasks and past contributions | Full project workspace; any other ministry's content |

### Mobile Optimization Priority

Derived from the device column. Mobile optimization is not a single effort — it is a prioritized list of surfaces that must work perfectly on a phone.

| Priority | Surface | Primary Persona(s) | Rationale |
|----------|---------|-------------------|-----------|
| P1 | Magic link deliverable review and approval | Jennifer, Marcus, Pastor Kim | Three personas, primary device mobile, no fallback to desktop expected |
| P1 | Request intake form (submit) | Marcus | His default device is mobile; a form that works poorly on phone means fewer and worse requests |
| P2 | Project status view (ministry-scoped) | Marcus | Weekly check-in; must be readable in under 5 seconds on a phone |
| P2 | Direct task and upload view | Tanya | Her entire experience is mobile; upload from phone must be reliable |
| P3 | Executive summary | Pastor Kim | Monthly or quarterly; desktop acceptable but mobile should work cleanly |
| P3 | My Tasks view | Alex | Desktop primary; mobile needed for occasional checks |
| P4 | Dashboard | Dana | Desktop primary; mobile for urgent checks only |
| Defer | Reports and analytics | Dana, Pastor Kim | Content-heavy; acceptable to optimize for desktop first |

### Navigation Architecture Implications

The behavior maps make several navigation decisions straightforward:

**Role-aware landing pages are required.** A single homepage for all roles is not viable. The system must detect role on login and route accordingly. This is not a nice-to-have — it is the difference between the platform feeling right and feeling wrong for the four most important personas.

**Deep linking is a first-class requirement.** Marcus, Jennifer, Carlos, and Tanya all enter through links, not through the homepage. Every notification, magic link, and direct task URL must resolve to a specific, useful context — not a dashboard that requires further navigation.

**Navigation depth should match role.** Dana and Alex need full navigation. Marcus needs a simplified nav showing only his ministry's work. Pastor Kim needs read-only nav with reporting. Jennifer, Carlos, and Tanya need no nav at all — just the task surface and an exit.

**The request intake form is a standalone surface.** Given that Marcus uses it from mobile, occasionally drafts and returns to it, and it is the primary quality gate for all incoming work, the intake form should be treated as its own designed flow — not a modal or panel inside a larger screen.

---

## Open Questions

- What is the re-notification window for Jennifer if she does not respond to a review request? (24 hours? 48? Configurable per deliverable?)
- Should Marcus's landing page show all ministry projects or only ones requiring his action? — The behavior data suggests "action required" should be highlighted, but full history should be accessible one tap deeper
- Should Tanya's direct task link require authentication, or should task-specific uploads be available without a login (similar to a magic link)?
- How does the system handle a user who has multiple roles? (e.g., a worship pastor who is both a Marcus-type requester and a Tanya-type lyric reviewer)
- Which notifications should also send an email versus in-app only? (Jennifer and Carlos may not have in-app notification presence between visits)
- Should the permission model support role combinations, or are roles mutually exclusive per user?

---

## Notes

- This document should be updated as user research and pilot feedback surfaces behaviors not captured here
- The behavior maps feed directly into Figma wireframe priorities — start with the highest-frequency, mobile-primary actions
- Cross-reference with `/docs/technical/AUTH_AND_PERMISSIONS.md` for technical permission implementation
- Cross-reference with `/docs/technical/NOTIFICATIONS.md` for notification delivery architecture
- Cross-reference with `/docs/product/USER_PERSONAS.md` for full persona context

Last Updated: 2026-05-21

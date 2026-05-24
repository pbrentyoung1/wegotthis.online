# User Personas

## Purpose

Define the people ForWorship Creative is built for. These personas are grounded in the real operational conditions of church communications teams. They drive UI/UX prioritization, feature sequencing, and design decisions. Every screen, workflow, and interaction should be evaluated against at least one of these people.

## How to Use This Document

Each persona includes a development priority tier:

- **P1 — MVP Core:** The platform is not useful without solving this person's primary workflow.
- **P2 — MVP or Early Post-MVP:** Important for organization-wide adoption; can ship slightly after core.
- **P3 — Post-MVP:** Real users, but the platform functions without them in v1.

UI/UX design should begin with P1 personas and validate every decision against their day-to-day reality before moving to P2 and P3.

Persona labels in this document describe real people and operating contexts. Base permission roles are defined separately in `/docs/technical/AUTH_AND_PERMISSIONS.md`.

---

## Persona Index

| # | Name | Role | Priority | Access Type |
|---|------|------|----------|-------------|
| 1 | Dana M. | Communications Director | P1 | Full account (typically Communications Lead or Organization Admin) |
| 2 | Alex R. | Graphic Designer / Producer | P1 | Full account (typically Contributor) |
| 3 | Marcus T. | Ministry / Department Leader | P1 | Full account (typically Project Owner, Reviewer, or Viewer depending context) |
| 4 | Pastor Kim W. | Senior Pastor / Executive | P2 | Full account (typically Viewer or Reviewer depending assignment) |
| 5 | Jennifer P. | External Stakeholder / Reviewer | P1 | External Reviewer via magic link |
| 6 | Carlos M. | External Vendor | P3 | Vendor-scoped External Reviewer link |
| 7 | Tanya B. | Volunteer Contributor | P3 | Full account (typically Contributor with limited scope) |

---

## Persona 1 — Dana M., Communications Director

**"I need to see everything at a glance and trust that nothing is falling through the cracks."**

### Profile

- **Role:** Director of Communications (or Communications Manager at smaller churches)
- **Age range:** 35–50
- **Church context:** Mid-size to large church (500–2,500 congregation), leads a 2–6 person comms team
- **Tech comfort:** High. Uses project tools, design tools, and email daily.
- **Device split:** ~75% desktop, 25% mobile (for quick checks and approvals)

### A Day in Her World

Dana arrives Monday morning to a dashboard that needs to tell her three things immediately: what shipped last week, what's due this week, and what's blocked. Before she can focus on creative work, she has already fielded a text from the Women's Ministry leader asking when their retreat flyer will be ready, a Slack message from her designer asking which project to prioritize, and an email from the senior pastor about the Easter campaign.

She manages a team that handles everything from Sunday bulletin graphics to large campaign video series. Each ministry believes its project is the top priority. Dana's job is to absorb that pressure, communicate clearly about capacity, and make sure nothing gets missed at the cost of something else.

She is the gatekeeper of the request queue — the person who decides which requests get accepted, which get deferred, and which need more information before anyone touches them. She is also the one who signs off on brand consistency, runs reports for annual planning, and ensures that every project is properly closed out so the work doesn't disappear.

### Goals

- See all active projects, their statuses, and blockers without asking her team
- Triage incoming requests fairly and quickly — accept, defer, reject, or request clarification
- Know each team member's workload before making assignments
- Reduce the number of interruptions from ministry leaders asking "where is my project?"
- Produce reports for annual planning and budget conversations with leadership
- Maintain brand consistency across all ministries and deliverables
- Ensure every project closes out properly — source files, approvals, and learnings preserved

### Pain Points

- Requests arrive via email, text, and verbal conversation — all informal, most incomplete
- Has no single view of what her team is working on and what is overdue
- Ministry leaders assume silence means their project is being worked on
- Brand is inconsistently applied because approved assets aren't easy to find
- Annual reporting requires manually pulling data from emails, spreadsheets, and memory
- Projects are "finished" when the thing gets published, not when the work is truly archived
- Capacity conversations with church leadership are hard without data to back them up

### How She Uses ForWorship Creative

- **Daily:** Reviews the dashboard — active projects, status, deadlines, blockers
- **Daily:** Processes the intake queue — reviews submitted requests, accepts or asks for clarification
- **Weekly:** Checks team workload and adjusts assignments
- **Per project:** Reviews and approves deliverables before they go to stakeholders
- **Monthly/quarterly:** Runs department utilization and project volume reports
- **At project close:** Triggers and verifies the closeout checklist

### Key Features She Needs (Priority Order)

1. **Dashboard** — Active project status, team workload, upcoming deadlines, blockers at a glance
2. **Request intake queue** — Triage view for submitted requests; accept, defer, reject, or flag for clarification
3. **Department utilization reporting** — Work volume by ministry/department; hours, project count, type
4. **Notification controls** — She gets notified about what matters; not everything
5. **Brand Center** — Approved assets, templates, and guidance in one place
6. **Project closeout workflow** — Checklist-driven process to archive source files, approvals, and learnings
7. **Team workload view** — Who has what; how full each person's plate is

### UX Design Notes

- Her dashboard must be **information-dense but not chaotic** — she needs to triage without drilling into every project
- Request triage must allow her to act in **under 30 seconds per item** — one-click accept, defer, or "needs info"
- Reports should be readable by **non-technical leadership** — exportable, clean, printable
- She will be the primary person onboarding the rest of her team — the tool must feel trustworthy and complete to her before she will evangelize it

### Development Priority

**P1 — MVP Core.** Dana is both the economic buyer and the daily power user. If the platform does not solve her coordination problem, nothing else matters. The dashboard, intake triage, and basic reporting must be present and functional at launch.

---

## Persona 2 — Alex R., Graphic Designer / Producer

**"Just tell me what to make, give me the assets I need, and get out of my way."**

### Profile

- **Role:** Graphic Designer, Video Producer, or Communications Specialist (often the same person at smaller churches)
- **Age range:** 22–35
- **Church context:** Staff or part-time, works across 5–15 concurrent projects in different stages
- **Tech comfort:** High. Comfortable with design tools, file systems, and platforms.
- **Device split:** ~90% desktop, 10% mobile (rarely working from phone)

### A Day in His World

Alex sits down and needs to know what to work on first. He has a bulletin due by Wednesday, a social post set for Thursday, a sermon series graphic in round two of revisions, a print piece that needs to go to the vendor by Friday, and a video bumper that's been in "review" for two weeks with no feedback.

His biggest daily friction is information scatter. The request brief was in an email. The revision notes are in a text message from the ministry leader. The approved logo is somewhere in a shared Google Drive folder from three years ago. The "final" version of last year's retreat flyer is named "flyer_FINALFINAL_v3_USE_THIS_ONE.indd."

Alex doesn't want project management complexity. He wants to know what's assigned to him, what's blocking him, where to find the assets he needs, and where to put the work when he's done.

### Goals

- Know exactly what tasks are assigned to him today and this week — no ambiguity
- Have access to a complete, approved brief before starting any project
- Find brand-approved assets (logos, photos, fonts, templates) without a scavenger hunt
- Upload deliverables to the right project with clear version tracking
- Capture revision feedback in one place, in context — not in email chains
- Advance project status when his work is done without chasing a manager
- Not lose hours recreating something that already exists in a past project

### Pain Points

- Unclear requests — missing deadlines, audience details, CTA, or reference assets
- Revision feedback is fragmented across texts, emails, and sticky notes
- Version confusion — "which file is the approved final?" is a daily question
- Can't easily find existing work to reuse or reference from previous projects
- Has to interrupt Dana or a ministry leader to ask basic questions the intake form should have answered
- Wastes time on projects that were never going to be approved or were already deferred
- Creative energy is spent on project management instead of production

### How He Uses ForWorship Creative

- **Daily:** Checks his task list — what is assigned, what's due, what's blocking him
- **Per project:** Reads the project brief and request details before starting
- **Per deliverable:** Uploads files, marks deliverables ready for review
- **Per revision cycle:** Reviews annotated feedback, uploads revised work
- **As needed:** Searches the media library for approved brand assets and past project files

### Key Features He Needs (Priority Order)

1. **Task list / my work view** — A clear, prioritized view of everything assigned to him
2. **Deliverable management** — Upload files, mark versions, track review status, know what's approved
3. **Media library** — Searchable, organized repository of approved brand assets and past project files
4. **Project brief / request detail view** — Full intake info accessible from the project without hunting
5. **Activity and comment feed** — Revision notes, feedback, and decisions in one place per project
6. **Notification settings** — Get notified when a deliverable gets reviewed or a task is reassigned; not every minor update
7. **Status advancement** — Mark his tasks done, advance deliverable status without needing Communications Lead or Project Owner intervention for routine steps

### UX Design Notes

- His work view should feel like **a simple task list, not a project management dashboard** — he doesn't need org-wide visibility, just his work
- Deliverable upload should be **drag-and-drop with automatic versioning** — replacing a file should not create confusion about which is current
- Feedback/revision notes should be **in context on the deliverable**, not buried in a project comment thread
- The media library search needs to work from inside a project — **he should never have to leave the project to find an asset**
- File naming conventions and asset organization should be **enforced by the system**, not dependent on individual discipline

### Development Priority

**P1 — MVP Core.** Alex is the person inside the tool most hours of every day. If the task view, deliverable workflow, and media library are not solid, he will find workarounds and the platform will be abandoned by the people it most needs to retain.

---

## Persona 3 — Marcus T., Ministry / Department Leader

**"I just need to know what's happening with my project and be able to say yes or no from my phone."**

### Profile

- **Role:** Student Ministry Director, Worship Pastor, Women's Ministry Coordinator, or any ministry department leader who requests communications work
- **Age range:** 28–48
- **Church context:** Leads a ministry department, submits 8–25 communications requests per year
- **Tech comfort:** Medium. Comfortable with smartphones and basic web tools; reluctant to learn complex platforms
- **Device split:** ~65% mobile, 35% desktop

### A Day in His World

Marcus is not a communications professional. He runs a ministry. But he needs flyers, social posts, registration pages, videos, and weekly graphics like everyone else on staff. He submits requests mostly by text or email — or stops Dana in the hall — and then waits.

He doesn't always know what information Communications needs. He thinks a "simple flyer" is a 30-minute job. He submits things late because he underestimates timelines. He follows up repeatedly because he has no visibility into status. When something comes back for his approval, he gets a PDF in his email and either replies with "looks good" or forgets to respond entirely.

Marcus is not trying to be difficult. He's busy. He wants the work to happen cleanly and for someone to tell him when he needs to do something. He wants to be a good requester — he just doesn't know how.

### Goals

- Submit a request that actually gives Communications what they need — without overthinking it
- Know where his project stands without calling or texting Dana
- Approve or request changes on deliverables from his phone in under two minutes
- Get notified only when he needs to take action — not every status update
- Understand why a request was deferred or what clarification is needed
- Feel respected, not managed, by the intake process

### Pain Points

- Requests feel like filling out a complicated form with no guidance
- No feedback after submission — silence reads as either "in progress" or "ignored"
- Approval requests arrive as email attachments with no context
- Doesn't always know who is responsible for what on the comms team
- Finds out a deadline can't be met when it's already too late to adjust
- Past project assets (photos, logos, copy) that his ministry owns are locked in someone else's system

### How He Uses ForWorship Creative

- **Every few weeks:** Submits a communications request using guided intake
- **Periodically:** Checks status of his active requests and projects
- **As needed:** Approves or comments on deliverables via magic link (no login required for this flow)
- **Occasionally:** Views his department's project history for reuse or reference

### Key Features He Needs (Priority Order)

1. **Guided request intake form** — Step-by-step, contextual prompts that help him think through the brief; feels like a helpful conversation, not a form
2. **Status visibility without friction** — He should be able to see "where is my project?" in one tap; no searching, no login required for a status check via link
3. **Mobile-optimized magic link approval** — View deliverable, add a comment, approve or request changes — all from a phone, without an account
4. **Action-only notifications** — Notify him only when something requires his response; not passive updates
5. **Request history** — See his past requests, their status, and what became of them
6. **Intake transparency** — When a request is deferred or needs clarification, tell him why and what to do next

### UX Design Notes

- The request intake form is **the most important UX surface for this persona** — it must feel guided, not clinical; like a smart assistant asking the right questions, not a compliance checklist
- **Every required field needs a "why does this matter?" micro-explanation** — Marcus won't fill in what he doesn't understand
- The magic link approval view must work **perfectly on a phone with no account and no app download** — this is a hard UX requirement
- Status visibility should be readable in **under five seconds** — one screen, plain language, no jargon
- Notifications should use plain language: "Your Summer Camp flyer is ready for your review" — not "Deliverable #447 status change"

### Development Priority

**P1 — MVP Core.** Marcus represents every ministry department leader at every church. If he doesn't trust the intake process and can't approve work from his phone easily, the platform never escapes the communications office. His experience is what makes ForWorship Creative valuable to the whole organization — not just to the comms team.

---

## Persona 4 — Pastor Kim W., Senior Pastor / Executive Leader

**"I don't need to manage communications. I need to trust that it's being managed well."**

### Profile

- **Role:** Senior Pastor, Executive Pastor, or Director of Operations
- **Age range:** 40–62
- **Church context:** Highest-level church leadership; ultimate decision-maker for staffing, budget, and major ministry direction
- **Tech comfort:** Low to medium. Uses smartphone heavily; resistant to learning new platforms unless the value is immediate
- **Device split:** ~80% mobile, 20% desktop

### A Day in Her World

Pastor Kim doesn't want to log into a project management tool. She has a full schedule of meetings, pastoral care, sermon prep, and leadership responsibilities. What she does want is to never be surprised — not by what shows up on the screen Sunday morning, not by a campaign that went out with the wrong message, not by a conversation with an elder about whether the communications team is making good use of their budget.

She occasionally needs to approve something high-stakes — a major campaign direction, a strategic announcement, a sensitive piece of communications. She also needs, a few times a year, to present data to church leadership about how the communications team is being utilized and what it's producing. She can't do that if the data lives in Dana's head.

### Goals

- Periodic visibility into what communications is working on — no micromanagement required
- Ability to approve high-stakes deliverables quickly, from her phone, without confusion
- Data to support leadership conversations about staffing, budget, and ministry impact
- Confidence that brand and message standards are being maintained
- No learning curve — if it takes more than 30 seconds to understand what she's looking at, she won't use it

### Pain Points

- Has no view into communications workload or production volume without asking Dana
- Gets surprised by communications output that doesn't match ministry direction
- Budget and staffing decisions for the comms team happen on instinct, not data
- Approval requests arrive via email with PDF attachments and unclear context
- Can't easily explain to elders or church board what the communications team actually does all year

### How She Uses ForWorship Creative

- **Monthly or quarterly:** Glances at an executive dashboard summary — volume, active campaigns, department utilization
- **Occasionally:** Approves a strategic deliverable via magic link
- **Seasonally:** Reviews a report to prepare for leadership or budget meetings
- **Rarely:** Looks at a specific project or campaign for context

### Key Features She Needs (Priority Order)

1. **Executive dashboard / summary view** — High-level: what's active, what shipped this month, what's coming up; no project-level detail unless she drills in
2. **Magic link approval** — Same seamless mobile flow as Marcus, but for high-stakes organizational pieces
3. **Campaign visibility** — Ability to see a campaign's full scope — what projects it contains, timeline, and status — in one clean view
4. **Exportable leadership report** — Work volume, department utilization, project type breakdown; ready to share with elders or board without reformatting

### UX Design Notes

- Her view should be **read-only by default** — she should never accidentally change a project status or assignment
- The executive summary should use **language that means something to a pastor**: "17 projects completed this quarter across 8 ministries" not "47 deliverables at status: Archived"
- **She should not need to create an account to approve something** — magic link must work for her exactly as it does for Marcus
- If a dashboard summary is built, it should be **glaringly simple**: 3–5 data points, no charts that require a legend, no abbreviations

### Development Priority

**P2 — MVP or Early Post-MVP.** Pastor Kim's buy-in determines organization-wide adoption and renewal decisions. The magic link approval is P1 (shared with Marcus). The executive dashboard and leadership reporting can be early post-MVP but should be designed for from the start so the data model supports them.

---

## Persona 5 — Jennifer P., External Stakeholder / Reviewer

**"Just send me what you need me to look at. I'll look at it right now."**

### Profile

- **Role:** Ministry event coordinator, key volunteer, department spouse liaison, or any external person assigned to review and approve communications work
- **Age range:** 28–58
- **Church context:** Not a staff member with a platform account; involved in one or a few specific projects in a limited review capacity
- **Tech comfort:** Medium. Comfortable with smartphones; reads email; unlikely to download an app or create an account for a one-time review
- **Device split:** ~85% mobile, 15% desktop

### A Day in Her World

Jennifer coordinated the women's retreat and now needs to approve the printed program before it goes to the vendor. She receives an email with a link. She has about four minutes before her next meeting.

She taps the link and needs to immediately understand what she's looking at, what version it is, what she's being asked to do, and how to respond. If the experience is confusing, she will close it and reply to the email with "looks good" without actually reviewing it — or she'll simply not respond until Dana follows up.

Jennifer is not lazy. She's busy and unfamiliar with the platform. The magic link experience is the only interaction she has with ForWorship Creative, and it represents the platform's external credibility to everyone outside the comms team.

### Goals

- See the thing she needs to review, clearly and immediately
- Understand what version she's looking at and what has changed
- Give feedback or approve in as few taps as possible
- Know that her feedback was received and will be acted on
- Not need to create an account, download an app, or learn anything

### Pain Points

- Receiving a PDF attachment with no context — which version is it? What changed? Who else needs to approve?
- Forgetting to respond because the approval request arrived at a bad time and there is no easy way to come back to it
- Not knowing if her feedback was read or addressed in the next version
- Having to explain her feedback in a reply email where it gets disconnected from the specific element she was commenting on
- Finding out her approval was the final step and the project shipped before she had a chance to review a late change

### How She Uses ForWorship Creative

- **Per review:** Receives a magic link via email or text
- **On mobile:** Opens the deliverable, reads context (what it is, what round of review), approves or leaves a comment
- **Optionally:** Returns to the same link to see if her comment was addressed in a revision

### Key Features She Needs (Priority Order)

1. **Clean, mobile-first magic link view** — The deliverable, its context (project name, what it's for, what's being asked), and the action buttons visible above the fold on a phone
2. **Approve / Request Changes flow** — Two clear options; requesting changes opens a simple comment field; no complex tools
3. **No-account required** — The entire experience must be available without login, registration, or app download
4. **Confirmation feedback** — After approving or commenting, she sees a clear confirmation: "Your response has been received"
5. **Contextual version indicator** — "This is version 2 of 2 for review" — she knows what she's looking at
6. **Optional return link** — The magic link should stay accessible so she can check back if she wants to

### UX Design Notes

- This is a **public-facing surface that represents the platform to everyone outside the comms team** — it must be polished, fast, and zero-confusion
- **The deliverable preview must render reliably on mobile** — PDF, image, video — across device types
- The action UI should be **thumb-friendly**: large tap targets, clear labels, no accidental approvals
- **Expiration and revocation must be invisible to her** — she should see a graceful "this link is no longer active" message if a link expires, not a broken page
- This screen is often a reviewer's **first impression of the church communications team** — design it accordingly

### Development Priority

**P1 — MVP Core.** The magic link approval flow is explicitly in scope for MVP and is a key differentiator. Without a clean, reliable, mobile-first external review experience, the approval workflow falls back to email attachments and the platform loses one of its clearest value propositions. This should be among the first flows designed and tested.

---

## Persona 6 — Carlos M., External Vendor

**"Just get me the right file, tell me the specs, and let me send you a proof."**

### Profile

- **Role:** Print shop representative, photographer, videographer, sign installer, or other external production vendor
- **Age range:** 30–55
- **Church context:** Provides goods or services to the church on a per-project basis; may work with multiple staff contacts
- **Tech comfort:** Medium. Comfortable with file transfers, email, and vendor portals.
- **Device split:** ~70% desktop, 30% mobile

### A Day in His World

Carlos's print company handles the church's bulletin, event programs, and large-format signage. For each job, he needs print-ready files with bleed and crop marks, clear specs, and a defined approval contact. What he usually gets instead is a series of emails from different staff members, files named "final v2 REVISED USE THIS," a spec sheet that's three months old, and a question about whether the file he received is the one that was actually approved.

Carlos wants a clean handoff: the right file, from the right person, with the right specs, and a way to upload his proof without sending it to the wrong email address.

### Goals

- Download the correct, approved, production-ready file for each job without ambiguity
- Understand the specs (size, bleed, color mode, file format) from a single source of truth
- Upload proofs or completed files to the right job without email chaos
- Communicate with the right person at the church about a specific deliverable
- Not be surprised by scope changes after production has started

### Pain Points

- Receives files from multiple contacts; never certain which is approved for production
- Spec information is inconsistent or missing entirely
- Has no way to upload his proof back to the right place — ends up emailing it to whoever last contacted him
- Gets revision requests after production has started due to approval process failures upstream
- Has to maintain his own notes on church contacts because the church has no central point of contact for vendor communications

### How He Uses ForWorship Creative

- **Per job:** Receives a scoped vendor link with access to specific deliverable files and specs
- **Per job:** Downloads production-ready assets approved for vendor use
- **Per job:** Uploads proofs or completed files to the deliverable
- **As needed:** Comments on a deliverable for clarification (file format, color mode, timeline)
- **Optionally:** Views the delivery or publication timeline for planning purposes

### Key Features He Needs (Priority Order)

1. **Scoped vendor link** — Access to only the deliverable(s) and files relevant to his job; nothing else
2. **Production file download** — Clearly labeled, approved-for-production files with specs attached
3. **Proof / delivery upload** — Simple file upload back to the deliverable; no email required
4. **Deliverable-level comments** — A way to ask a clarifying question in context without a full account
5. **Timeline visibility** — When is the piece needed? When is the event? What's the hard deadline?

### UX Design Notes

- **Vendor links should feel clean and professional**, not like an internal tool with permissions stripped out
- File listings should prominently show **approval status** — "Approved for Production" is a label Carlos needs to see before he starts any job
- Upload UI must be **simple and unambiguous** — "Upload your proof here" with a clear confirmation
- The vendor experience can share underlying infrastructure with the stakeholder magic link but should have **distinct UI framing** — it's a different relationship than an approver
- Carlos does not need or want visibility into the rest of the church's communications operations

### Development Priority

**P3 — Post-MVP.** Vendors are real users with real needs, but their workflow can be approximated in MVP with email and a file-sharing link. The vendor-scoped link can be built after the core internal platform and the stakeholder magic link are solid. Design the data model and permissions architecture to support vendors from the beginning even if the UI ships later.

---

## Persona 7 — Tanya B., Volunteer Contributor

**"Pastor Dave asked me to help with this. Just tell me what I need to do."**

### Profile

- **Role:** Photo volunteer, sermon notes uploader, social media helper, worship lyric reviewer, campus admin assistant — or any church volunteer with a specific, recurring contribution to communications
- **Age range:** 19–65 (wider than any other persona)
- **Church context:** Not a staff member; contributes one specific thing on an irregular basis; was recruited personally by a pastor or ministry leader they trust
- **Tech comfort:** Low to medium. Comfortable with a phone; may struggle with multi-step web workflows; rarely reads instructions.
- **Device split:** ~75% mobile, 25% desktop (varies widely by sub-type)

### Sub-Types

These all share the same UX constraint but arrive with different tasks:

- **Photo volunteer** — Shoots events with a DSLR or phone; needs to upload a batch of photos to the right project in the media library
- **Sermon notes uploader** — Drops a Word doc or PDF into the right place before or after Sunday; probably does this weekly for the pastor
- **Social helper** — Queues or reviews draft social posts; may add captions or flag content that feels off-brand
- **Worship lyric reviewer** — Checks song lyrics for theological accuracy or copyright status before Sunday; one specific task, done weekly or seasonally
- **Campus admin assistant** — At a multi-campus church, handles intake coordination, status updates, or file collection for a specific location

### A Day in Her World

Tanya photographs events for the church a few times a month. She loves it. She is not a professional — she uses a nice phone and occasionally borrows a DSLR from the worship pastor. After every event she uploads photos to Google Drive and texts the link to whoever asked her to shoot. Nobody ever told her where the files actually end up.

Her involvement with ForWorship Creative will begin because someone she trusts — her community group leader, a pastor, or the communications director — personally asked her to use it. She will log in for the first time, do the thing, and then not return for three to six weeks. When she comes back, she will not remember how it works. She will not read help documentation. She will either figure it out in thirty seconds or she will call the person who asked her to help.

She is not a problem user. She is the most common kind of church volunteer: high-relational, high-commitment to her specific contribution, low-investment in platform mechanics. The platform must meet her where she is.

### Goals

- Complete her specific contribution — upload photos, drop a file, review a lyric sheet — without friction
- Not have to remember how the platform works between sessions
- Know that her contribution landed in the right place
- Feel like she is helping, not doing IT work
- Not be overwhelmed by features or screens that have nothing to do with her task

### Pain Points

- Logging in after a long gap and having no idea where to start
- Being shown a full dashboard or navigation when she only needs to do one thing
- Uploading photos to the wrong project or folder because the structure isn't clear
- Not knowing if her upload was successful or went to the right person
- Getting email notifications about projects she has nothing to do with
- Password reset friction — she will hit "forgot password" almost every time

### How She Uses ForWorship Creative

- **Per event or task:** Logs in (or follows a direct link), completes her one contribution, logs out
- **Rarely:** Reviews past uploads to see what was used
- **Never:** Navigates the broader project workspace, reviews dashboards, or manages anything

### Key Features She Needs (Priority Order)

1. **Direct-link task entry** — She should be able to receive a link that drops her directly into the specific upload slot, lyric review, or file drop she needs — no navigation required
2. **Forgiving upload UI** — Drag-and-drop or large tap-target file selection; photo batch upload; clear confirmation that files arrived
3. **Zero-ambiguity confirmation** — After uploading or submitting, a clear, warm confirmation: "Your photos were added to the Easter Weekend project. Thank you."
4. **Minimal notification footprint** — Notify her only when someone specifically needs her to do something; never about project activity she isn't part of
5. **Graceful re-entry** — When she logs back in after a long gap, her home state should show only what she's assigned or contributed to — not a full workspace
6. **Simple password recovery** — Fast, mobile-friendly; this will be used often

### UX Design Notes

- The volunteer's home screen should be **a single focused view**: "Here is what you've been asked to do" — nothing else unless she goes looking
- **Direct task links sent via text or email are the primary onboarding path** — the platform should never require her to navigate to find her job; the job should come to her
- Upload confirmation should feel **warm and personal**, not transactional — this person is contributing their time as an act of service
- **Notification design is especially critical here** — over-notifying a volunteer contributor is one of the fastest ways to lose them; they opted in to help, not to manage a project
- Accessibility and font size considerations are higher priority here than for any other persona, given the wider age range
- The volunteer experience should be **designed independently from the staff experience** — same underlying system, but a fundamentally different surface

### The Core UX Problem

Every other persona has some degree of learned platform behavior — they log in frequently enough to develop habits. Tanya does not. She will experience the platform as a **first-time user on nearly every visit**. That means:

- No reliance on remembered navigation
- No multi-step flows without progress indicators
- No unlabeled icons
- No "you'll figure it out" UX decisions

This is a distinct design constraint that should be documented as a requirement before the volunteer-facing surface is built.

### Development Priority

**P3 — Post-MVP.** Churches run on volunteers, and this persona represents a large surface area of contribution types. But the platform is functional without a polished volunteer experience in v1 — staff users can act as proxies (uploading photos on Tanya's behalf, for example). Design the permission model and task assignment architecture to support this persona from the beginning so her experience can be built cleanly when the time comes.

---

## Priority Matrix — Feature Development by Persona

| Feature | Dana (P1) | Alex (P1) | Marcus (P1) | Kim (P2) | Jennifer (P1) | Carlos (P3) | Tanya (P3) |
|---------|-----------|-----------|-------------|----------|---------------|-------------|------------|
| Dashboard / project overview | Primary | Secondary | — | Primary | — | — | — |
| Request intake (submit) | Receives/Manages | — | Primary | — | — | — | — |
| Request intake (triage) | Primary | — | — | — | — | — | — |
| Task list / my work view | — | Primary | — | — | — | — | Narrow view |
| Deliverable management | Reviews | Primary | Views | — | Reviews | Downloads | — |
| Magic link approval | — | — | Primary | Secondary | Primary | — | — |
| Media library | Manages | Primary | — | — | — | — | Uploads |
| Activity / comment feed | Reviews | Primary | Views | — | — | — | — |
| Department utilization report | Primary | — | — | Secondary | — | — | — |
| Project closeout | Primary | Contributes | — | — | — | — | — |
| Brand Center | Primary | Uses | References | — | — | — | — |
| Campaign overview | Manages | — | — | Primary | — | — | — |
| Vendor scoped access | Manages | — | — | — | — | Primary | — |
| Executive summary | — | — | — | Primary | — | — | — |
| Direct task / upload link | — | — | — | — | — | — | Primary |
| Volunteer home view | — | — | — | — | — | — | Primary |

---

## Open Questions for Design

- Should Marcus (Department Leader identity) have a simplified account dashboard, or should his primary interaction always be via notifications and magic links?
- What is the minimum viable request intake form — how many fields before it becomes a barrier rather than a help?
- Should Jennifer (external reviewer) have the option to create an account and see her review history, or is magic-link-only sufficient for MVP?
- Should Pastor Kim's executive view be a separate permission profile, or is it a filtered view of a Viewer or Reviewer experience?
- How should the magic link experience differ between an External Reviewer acting as a stakeholder reviewer (Jennifer) and an External Reviewer acting as a vendor (Carlos)?
- Should Carlos be able to initiate contact through the platform, or is vendor communication always initiated by an internal user?
- Which personas need email digest summaries versus only in-app notifications?
- Should Tanya (Volunteer Contributor) receive task assignments through a direct link only, or does she need a minimal account home screen?
- How many volunteer sub-types need distinct UI surfaces, or can one "focused task view" serve all of them?
- Should volunteers be able to see what happened to their contribution (e.g., which of their photos were used in a project)?

---

## Notes

- These personas should be treated as living documents. Update them as pilot church feedback is gathered.
- Every UX/UI decision should be traceable to at least one persona's workflow or pain point.
- The magic link experience serves three personas (Marcus, Jennifer, Pastor Kim) and should be designed as a shared, polished surface — not three separate afterthoughts.
- External Reviewers, including vendor-scoped and stakeholder-scoped reviewers, should never have visibility into other tenants or full workspace context.
- Department Leader and stakeholder language in this document describes real-world identity, not a separate base permission role.
- See `/docs/product/PERSONA_BEHAVIOR_MAPS.md` for the action-level behavior layer — what each persona actually does, how often, what triggers it, and on what device. That document drives navigation architecture, notification rules, homepage logic, and mobile optimization priority.
- See `/docs/technical/AUTH_AND_PERMISSIONS.md` for role and permission definitions that correspond to these personas.
- See `/docs/product/PAIN_POINTS.md` for the operational pain points these personas are designed to solve.
- See `/docs/product/REQUEST_LIFECYCLE.md` and `/docs/product/PROJECT_LIFECYCLE.md` for lifecycle context relevant to each persona's workflow.

Last Updated: 2026-05-24

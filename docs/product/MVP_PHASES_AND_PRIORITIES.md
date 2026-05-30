# MVP Phases and Priorities

## Purpose

Define the MVP, development phases, priorities, milestones, checkpoints, review gates, and online integration strategy for wegotthis.online.

This document exists to keep the product focused, prevent scope creep, and make sure the codebase is tested online in manageable increments rather than becoming too large to troubleshoot during deployment.

## Product Definition

wegotthis.online is a communications operations system for churches.

It helps ministry leaders request work clearly, helps communications teams plan and produce it calmly, and keeps the conversation, files, approvals, and status in one place.

It is not a generic project management tool.

It is not a general chat platform.

It is not a Google Drive replacement.

## MVP Promise

The MVP should prove one complete loop:

```text
Department Leader submits a request
  -> Communications Manager clarifies and approves intake
    -> Project is created
      -> Deliverables are defined
        -> Tasks are assigned
          -> Work is discussed in context
            -> Files/Drive links are attached
              -> Deliverable goes through review
                -> Changes are requested or approved
                  -> Deliverable is published/delivered
                    -> Project is closed and archived
```

If MVP proves this loop well, the product is real.

## Guiding Priority

Keep MVP centered on the request-to-approved-deliverable loop.

Everything in MVP should either directly support that loop or wait.

Avoid building the Minimum Viable Swamp.

## Core Product Pillars

Priority order:

| Priority | Area | Why |
|---:|---|---|
| 1 | Intake | This is where clarity is created or lost. |
| 2 | Project/Deliverable Structure | This is the spine of the system. |
| 3 | Conversations | This preserves project memory. |
| 4 | Reviews/Approvals | This prevents chaos and rework. |
| 5 | File/Drive Links | This connects work to assets. |
| 6 | Calendar | This gives time visibility. |
| 7 | Dashboard | This makes the system usable and calm. |
| 8 | Asset Library | Starts simple, matures over time. |
| 9 | Capacity/Skills | Important, but should start light. |
| 10 | Integrations/Analytics | Powerful, but later. |

## Development Philosophy

Build in small, testable checkpoints.

At each checkpoint:

1. Complete a thin vertical slice.
2. Review locally.
3. Commit to Git.
4. Push to the online/staging server.
5. Test in the real hosted environment.
6. Fix deployment issues before adding more layers.

Do not wait until the application is large before integrating online.

The online server should be used as an early integration environment, not a final surprise party where everything breaks and nobody brought snacks.

## Checkpoint Definition

A checkpoint is complete when:

- Code is committed to Git.
- Database migrations run cleanly locally.
- Basic seed/demo data works.
- Primary screens load locally.
- No obvious console/server errors exist.
- The checkpoint is deployed to the online server.
- Online smoke test passes.
- Any deployment notes are documented.

## Online Integration Strategy

Use the online/staging server throughout development.

Recommended cadence:

- Push to online server at the end of each milestone/checkpoint.
- Keep checkpoint payloads small.
- Test environment-specific issues early.
- Document server-specific configuration.
- Avoid large untested feature batches.

Online testing should verify:

- Routing works.
- Authentication works.
- Migrations run.
- Asset building works.
- Permissions/roles behave as expected.
- Forms submit correctly.
- Email/notification placeholders do not fail.
- Google Drive/external link placeholders do not break screens.
- FullCalendar renders when introduced.

## Review Gates

Each major phase should have a review gate before moving forward.

A review gate should answer:

- Does this work match the documented product decision?
- Is the UI calm and simple?
- Does this reduce burden on the user?
- Does it preserve project memory where needed?
- Is this MVP or are we sneaking in later-phase complexity?
- Does it work locally?
- Does it work online?
- Is the code small enough to understand and troubleshoot?
- Are docs updated?

## Phase 0: Product Foundation and Build Readiness

### Purpose

Make sure the team is building the same product.

### Includes

- Final MVP scope.
- Final entity hierarchy.
- Core workflow maps.
- MVP roles.
- MVP permissions philosophy.
- MVP schema map.
- Technical stack confirmation.
- Inspinia implementation guidance.
- Figma/visual direction.
- Laravel starterkit/Inspinia base decision.
- Hosting/staging plan.
- Git/Codex/Claude workflow.
- Seed data/personas for demo.

### Milestones

#### Milestone 0.1: MVP Scope Locked

Deliverables:

- MVP included/excluded list.
- Deferred roadmap.
- Priority ranking.
- Phase plan.

Checkpoint:

- Docs committed.
- Product direction reviewed.

#### Milestone 0.2: Schema Map Ready

Deliverables:

- MVP schema/entity relationship map.
- Table groups and relationships.
- Key lifecycle/status fields.

Checkpoint:

- Schema reviewed before migrations are written.

#### Milestone 0.3: Build Plan Ready

Deliverables:

- Phase 1 implementation prompt.
- Seed/demo data plan.
- Online staging deployment checklist.

Checkpoint:

- Ready for application shell work.

## Phase 1: Core Application Shell

### Purpose

Create the usable foundation.

### MVP Features

- Laravel/Inspinia app shell.
- Authentication.
- Organization model.
- User/profile model.
- Departments.
- Basic system roles:
  - Organization Admin.
  - Communications Manager.
  - Department Leader.
  - Contributor.
  - Viewer.
- Basic dashboard shell.
- Friendly top section placeholder.
- Topbar notification bell placeholder.
- Navigation structure.
- Basic settings.

### Not Included

- Custom role builder.
- Advanced permissions UI.
- Analytics widgets.
- External integrations beyond basic config placeholders.

### Milestones

#### Milestone 1.1: App Boots Locally

Deliverables:

- Laravel/Inspinia shell running locally.
- Auth routes working.
- Base layout/navigation in place.

Checkpoint:

- Local smoke test.
- Commit.
- Deploy to online server.
- Online smoke test: login page, dashboard shell, navigation.

#### Milestone 1.2: Organizations, Users, Departments

Deliverables:

- Organizations.
- Profiles/users.
- Departments.
- Seed users/personas.

Checkpoint:

- Local + online migration test.
- Basic create/view/edit flows.
- Online smoke test with seed data.

#### Milestone 1.3: System Roles and Dashboard Shell

Deliverables:

- Five MVP system roles.
- Role-aware dashboard placeholders.
- Friendly top section placeholder.
- Topbar bell placeholder.

Checkpoint:

- Verify each seeded role sees appropriate placeholder dashboard.
- Deploy online.
- Confirm role routing works in hosted environment.

## Phase 2: Intake and Project Creation

### Purpose

Prove the most important moment: getting a good request.

### MVP Features

- Request/intake form.
- Guided intake questions.
- Department Leader request flow.
- Communications Manager intake queue.
- Request statuses:
  - Proposed.
  - Needs Clarification.
  - Approved for Planning.
  - Declined/Deferred.
- Project creation from approved request.
- Basic project brief.
- Required data by stage.
- Rush/timing questions.
- Light TAT/SLA awareness.
- Comments/questions on request.

### Priority Request/Deliverable Types

Start with:

1. Social Post.
2. Graphic/Design Asset.
3. Email/Newsletter Blurb.
4. Slide/Announcement.
5. Generic Other.

Video, print, podcast, and signage should come after the full loop is proven.

### Milestones

#### Milestone 2.1: Request Submission

Deliverables:

- Department Leader can submit request.
- Basic guided fields.
- Request appears in intake queue.

Checkpoint:

- Local + online submit test.
- Confirm request persists.
- Confirm role visibility.

#### Milestone 2.2: Intake Review and Clarification

Deliverables:

- Communications Manager can review request.
- Mark needs clarification.
- Add question/comment.
- Department Leader can respond.

Checkpoint:

- Test conversation loop locally and online.
- Confirm messages stay attached to request.

#### Milestone 2.3: Approve Into Project

Deliverables:

- Approved request creates Project draft/planning record.
- Project brief populated from request.

Checkpoint:

- End-to-end test: submit -> clarify -> approve -> project created.
- Deploy online.
- Test with seeded Department Leader and Communications Manager.

## Phase 3: Projects, Deliverables, and Tasks

### Purpose

Turn approved requests into manageable communications work.

### MVP Features

- Campaigns.
- Projects.
- Deliverables.
- Tasks.
- Project lifecycle.
- Deliverable lifecycle.
- Task statuses:
  - Not Started.
  - In Progress.
  - Blocked.
  - Ready for Review.
  - Done.
  - Deferred.
  - Canceled.
- Deliverable types.
- Basic project/deliverable briefs.
- Assign owners/contributors.
- Due dates.
- Start/stop dates.
- Basic blockers:
  - Waiting on Department.
  - Waiting on Approval.
  - Over Capacity.
  - Vendor Needed.
  - Missing Information.
- Project detail page using Inspinia project detail reference.
- Kanban-style status board using Inspinia kanban reference.

### Not Included

- Deep dependency engine.
- Full resource scheduling.
- Advanced skill matching.
- Automated project templates beyond simple defaults.

### Milestones

#### Milestone 3.1: Project Detail and Lifecycle

Deliverables:

- Project detail page.
- Project lifecycle statuses.
- Start/stop dates.
- Basic project owner/stakeholder assignments.

Checkpoint:

- Local + online project lifecycle test.
- Confirm project can move through early stages.

#### Milestone 3.2: Deliverables

Deliverables:

- Deliverable records.
- Deliverable types.
- Deliverable brief fields.
- Deliverable lifecycle.

Checkpoint:

- Create project with multiple deliverables.
- Deploy online.
- Confirm deliverables render correctly.

#### Milestone 3.3: Tasks and Blockers

Deliverables:

- Tasks belong to Deliverables.
- Task statuses.
- Task assignment.
- Basic blocker states.

Checkpoint:

- Assign tasks to contributor.
- Contributor updates task.
- Blocked task appears as needs help.
- Deploy online.

#### Milestone 3.4: Kanban/Board Views

Deliverables:

- Basic board view for projects/deliverables/tasks.
- Inspinia kanban structure adapted.

Checkpoint:

- Board works locally and online.
- Confirm no heavy custom UI beyond MVP.

## Phase 4: Conversations, Inbox, and Notifications

### Purpose

Keep communication in the system of record.

### MVP Features

- Project discussions.
- Deliverable discussions.
- Review comments.
- Change request comments.
- Basic direct messages, if feasible.
- Inbox: things needing action.
- Notification bell: things that happened.
- Activity feed: history.
- Core rule:
  - Bell = alert.
  - Inbox = action.
  - Activity = history.
- Email notifications that link back into the system.
- Simple notification preferences:
  - Messages.
  - Reviews and Approvals.
  - Tasks.
  - Things Waiting on Me.
  - General Updates.

### Not Included

- Slack integration.
- Discord integration.
- SMS.
- Teams integration.
- External reply sync.
- Full threaded chat.
- Reactions/emoji chat behavior.

### Milestones

#### Milestone 4.1: Project and Deliverable Discussions

Deliverables:

- Messages attached to Projects.
- Messages attached to Deliverables.
- Conversation rollup to Project memory.

Checkpoint:

- Test comment/discussion creation locally and online.
- Confirm discussion stays attached to the correct work object.

#### Milestone 4.2: Activity Feed

Deliverables:

- Major system events recorded.
- Activity visible on project/detail pages.

Checkpoint:

- Trigger lifecycle, task, file, and assignment events.
- Confirm activity feed online.

#### Milestone 4.3: Inbox and Bell

Deliverables:

- Notification bell for alerts.
- Inbox for actionable items.
- Basic unread/action states.

Checkpoint:

- Test Bell = alert, Inbox = action.
- Deploy online.
- Confirm each role sees relevant items.

#### Milestone 4.4: Email Notification Links

Deliverables:

- Email notifications for key events.
- Links return to correct Project/Deliverable/Review/Task.

Checkpoint:

- Test email in staging-safe mode.
- Confirm response happens inside app.

## Phase 5: Review, Approval, and Change Requests

### Purpose

Make approvals trustworthy and easy.

### MVP Features

- Send deliverable for internal review.
- Communications Manager preliminary review.
- Stakeholder review.
- Approve.
- Request changes.
- Change request record:
  - Who requested it.
  - When.
  - What changed.
  - Status.
- Simple review rounds.
- Approval history.
- Magic link review, if feasible.
- Approved state.
- Ready to publish/deliver state.

### Milestones

#### Milestone 5.1: Internal Review

Deliverables:

- Deliverable can be submitted for internal review.
- Communications Manager can approve or request changes.

Checkpoint:

- Local + online review flow.
- Confirm review comments attach to Deliverable.

#### Milestone 5.2: Stakeholder Review

Deliverables:

- Assigned reviewer can approve/request changes.
- Change request records created.

Checkpoint:

- Test with Department Leader reviewer.
- Confirm change request appears in Inbox and Deliverable history.

#### Milestone 5.3: Approval History

Deliverables:

- Review rounds visible.
- Approval/change history visible.

Checkpoint:

- Test multiple review rounds online.

#### Milestone 5.4: Magic Link Review, Optional MVP

Deliverables:

- Scoped external review link.
- View/comment/approve/request changes according to grant.

Checkpoint:

- Deploy and test anonymous/scoped review carefully online.
- Defer if it risks MVP stability.

## Phase 6: Assets and Google Drive Linking

### Purpose

Attach files without becoming Google Drive.

### MVP Features

- External link attachments.
- Google Drive file/folder links.
- Selected metadata:
  - File name.
  - Extension.
  - MIME type.
  - Size.
  - Modified date.
  - Owner/linked by, where available.
- Attach files to:
  - Project.
  - Deliverable.
  - Review.
  - Message/comment.
  - Closeout.
- Basic Asset Library records.
- Search/filter linked assets by:
  - Type.
  - People.
  - Modified.
  - Project.
  - Deliverable.
  - Department.
  - Tags.
- Closeout final/source file links.

### Important Boundary

MVP does not:

- Reindex all of Google Drive.
- Clone Google Drive.
- Sync entire Shared Drives.
- Manage Drive permissions deeply.
- Store terabytes of files.

This is Trello-style linking plus ForWorship context.

### Milestones

#### Milestone 6.1: External Links

Deliverables:

- Add external link to Project/Deliverable.
- Display link cards.

Checkpoint:

- Online test with real external URLs.

#### Milestone 6.2: Google Drive Links

Deliverables:

- Paste/select Drive file/folder link.
- Store provider fields and selected metadata.

Checkpoint:

- Online test with Drive links.
- Confirm no full Drive indexing assumptions.

#### Milestone 6.3: Asset Records and Filters

Deliverables:

- Basic asset record creation from linked files.
- Type, People, Modified filters.

Checkpoint:

- Online search/filter test with seed/sample assets.

#### Milestone 6.4: Closeout Assets

Deliverables:

- Final/source links captured at deliverable/project closeout.

Checkpoint:

- End-to-end closeout test online.

## Phase 7: Calendar and Scheduling

### Purpose

Show the work in time.

### MVP Features

- FullCalendar-compatible API.
- Project start/stop dates.
- Deliverable due dates.
- Review due dates.
- Publish/send/install dates.
- This Week dashboard widget.
- Basic calendar views:
  - Project.
  - Production.
  - Publishing.
  - Review.
- Date-range bounded queries.

### Not Included

- Google Calendar integration.
- Outlook integration.
- Resource calendars.
- Drag/drop dependency recalculation.
- Recurring event engine.
- Full church event management.

### Milestones

#### Milestone 7.1: Calendar API

Deliverables:

- FullCalendar-compatible JSON endpoint.
- Bounded date-range queries.

Checkpoint:

- Test API locally and online.
- Confirm response only returns visible range.

#### Milestone 7.2: Calendar UI

Deliverables:

- FullCalendar view in app.
- Filters by Project/Production/Publishing/Review.

Checkpoint:

- Online UI smoke test.

#### Milestone 7.3: This Week Widget

Deliverables:

- Compact dashboard calendar widget.

Checkpoint:

- Confirm role-aware items appear correctly online.

## Phase 8: Dashboard Polish and Role-Aware Experience

### Purpose

Make the system feel like a partner.

### MVP Features

- Role-aware dashboards.
- Friendly inspirational top section placeholder.
- Quick cards:
  - My Tasks.
  - Messages.
  - Approvals.
  - Needs Help Moving Forward.
  - Due Soon.
  - My Projects.
  - This Week.
  - Recent Assets, if feasible.
- Latest project updates.
- Discussions.
- Blocked work.
- Light widget ordering preferences.

### Not Included

- Analytics widgets.
- Planning Center widgets.
- Social media analytics.
- Website analytics.
- YouTube analytics.
- Service stats.
- Complex dashboard builder.

### Milestones

#### Milestone 8.1: Role-Aware Dashboard Content

Deliverables:

- Dashboard cards populated from app data.
- Role-aware filtering.

Checkpoint:

- Test all seeded roles online.

#### Milestone 8.2: Friendly Top Section

Deliverables:

- Inspirational/communal top section placeholder.
- Non-stressful greeting/design.

Checkpoint:

- Review tone and visual hierarchy.

#### Milestone 8.3: Widget Ordering, Optional MVP

Deliverables:

- User can rearrange or personalize widget order if feasible.

Checkpoint:

- Defer if it risks stability.

## MVP Included

The MVP includes:

- Users, profiles, departments, roles.
- Intake requests.
- Campaigns, Projects, Deliverables, Tasks.
- Project and Deliverable lifecycle.
- Task status.
- Conversations attached to work.
- Activity feed.
- Inbox and notification bell basics.
- Review, approval, and change requests.
- External links and Google Drive links.
- Basic asset records.
- FullCalendar-compatible scheduling basics.
- Role-aware dashboard basics.

## MVP Excluded

The MVP excludes:

- Planning Center integration.
- Google Calendar integration.
- Outlook integration.
- Slack/Discord/Teams integration.
- SMS notifications.
- Social media publishing.
- Social media analytics.
- Website analytics.
- YouTube analytics.
- Service stats.
- Full DAM features.
- Full Drive indexing.
- AI tagging.
- AI summaries.
- Advanced capacity forecasting.
- Full skill/resource scheduling.
- Custom role builder.
- Custom fields.
- Complex dependency automation.
- Recurring content engine.
- Full vendor portal.
- Public parent upload portal.

## Build Gates

Do not move to the next phase until:

- Current phase milestone passes locally.
- Current phase milestone passes online.
- Git is clean and pushed.
- Documentation is updated.
- Known blockers are logged.
- MVP scope is rechecked for creep.

## Order of Operations

Recommended order:

1. Phase 0 cleanup.
2. Schema map.
3. App shell.
4. Intake.
5. Project/deliverable/task structure.
6. Conversations/activity.
7. Reviews/approvals/change requests.
8. Google Drive/external links.
9. Calendar.
10. Dashboard polish.

## Related Docs

- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/DELIVERABLE_LIFECYCLE.md`
- `docs/product/TASKS.md`
- `docs/product/ROLES_AND_PERMISSIONS_MODEL.md`
- `docs/product/CONVERSATIONS_MESSAGES_ACTIVITY.md`
- `docs/product/DASHBOARD_WIDGETS.md`
- `docs/product/CALENDARS_AND_SCHEDULING.md`
- `docs/product/ASSET_LIBRARY.md`
- `docs/technical/GOOGLE_DRIVE_INTEGRATION.md`
- `docs/technical/TECH_STACK.md`
- `docs/INSPINIA.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-30

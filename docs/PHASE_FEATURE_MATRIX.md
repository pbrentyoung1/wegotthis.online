# Phase Feature Matrix

## Purpose

Capture feature scope by phase so important product decisions do not fall through the cracks during design, scaffolding, MVP development, and post-MVP expansion.

This matrix is a durable planning reference. It should be updated whenever a feature is intentionally included, deferred, simplified for MVP, or promoted into a fuller module.

## Guiding Principle

Build the lightest useful version of each capability at the right phase, without losing the future path.

ForWorship Creative should remain calm, simple, and supportive. The system may track complexity underneath, but the MVP should not force users or developers into heavy workflow machinery before the core operating model is proven.

## Phase Definitions

| Phase | Name | Purpose |
|---|---|---|
| Phase 0 | Foundation & Planning | Define product, workflow, architecture, decisions, and build readiness. |
| Phase 1 | Scaffold & Technical Foundation | Create Laravel, Vue, Inertia, PostgreSQL, auth, tenancy, storage, and deployment foundations. |
| Phase 2 | Core Operational MVP | Build the smallest useful operational core for intake, projects, deliverables, tasks, and visibility. |
| Phase 3 | Approvals, Notifications & External Review | Add deliverable-centered approvals, restrained notifications, and scoped external review. |
| Phase 4 | Media Library & Closeout | Support asset preservation, reuse, searchability, and project closeout. |
| Phase 5 | Brand Center & Reporting | Add brand governance, planning reports, utilization views, and decision support. |
| Phase 6 | Pilot, Polish & Launch Readiness | Harden real workflows, reduce friction, improve onboarding, and prepare for launch. |
| Post-MVP | Expansion | Add advanced capabilities only after core workflows are stable and trusted. |

## Scope Legend

| Scope | Meaning |
|---|---|
| Core | Must exist for the phase to succeed. |
| Light | Minimal representation only; future expansion expected. |
| Deferred | Intentionally not built yet. |
| Future | Post-MVP or later module. |
| Research | Needs more product/technical definition before build. |

## Feature Matrix

| Feature Area | Phase 0 | Phase 1 | Phase 2 | Phase 3 | Phase 4 | Phase 5 | Phase 6 | Post-MVP | Notes |
|---|---|---|---|---|---|---|---|---|---|
| Strategic Context model | Core docs | Data shape awareness | Light associations | Light associations | Connect to archive context | Reporting context | Pilot validation | Expanded relationships | Strategic Context includes Initiatives, Campaigns, Programs / Content Streams, Sermon Series, Seasons, Ministry Areas, Topics, and Tags. |
| Initiatives | Light docs | Deferred schema unless needed | Light tags/association only | Light association only | Archive/report context | Light reporting | Validate need | Full module | Initiatives are measurable strategic goals. Do not build full initiative tracking in MVP. |
| Campaigns | Core docs | Optional schema if needed | Light strategic context | Association in approvals/review context | Archive grouping | Reporting context | Pilot validation | Campaign planning dashboard | Campaigns are focused communication pushes, not the only parent for projects. |
| Programs / Content Streams | Core docs | Future-proof naming | Light category/tag/template approach | Light association only | Archive/report context | Reporting context | Validate recurring needs | Full module with cadence and recurring project generation | Weekly Podcast and Weekly Sermon Clips are Programs / Content Streams, not Campaigns. Light MVP is the current decision. |
| Sermon Series / Seasons / Topics | Light docs | Tags/categories | Tags/categories | Tags/categories | Media/archive tags | Reporting filters | Pilot validation | Richer relationship model | Use tags or simple associations before building first-class modules. |
| Request intake | Core docs | Schema and routes | Core | Clarification integration | Asset links | Reporting context | UX polish | Smart intake assistance | Intake is need-first and does not require requesters to know deliverables. |
| Ministry Brief | Core docs | Schema awareness | Core | Clarification history | Archive context | Reporting context | UX polish | AI-assisted refinement | Request output for Communications triage. |
| Communications Triage Workspace | Core docs | Layout/scaffold awareness | Core | Clarification and review links | Archive context | Reporting context | Pilot polish | Strategy recommendations | Use Inspinia cards, tables, tabs, chat/conversation, messaging, activity, and file patterns. |
| Creative Plan / Triage Plan | Core docs | Structured data planning | Light structured triage data | Approval hooks if needed | Archive context | Reporting context | Validate object needs | Full object if proven | Do not overbuild as a standalone module in MVP. |
| Projects | Core docs | Core schema | Core | Approval integration | Closeout integration | Reporting | Pilot polish | Advanced project planning | Projects are the primary operational container and require start and stop dates. |
| Project start/stop dates | Core decision | Core schema | Core validation | Used for notifications | Used for closeout | Used for reporting | Validate friction | Advanced scheduling | Required for every Project. Stop date is not necessarily publish, event, or closeout date. |
| Project Brief | Core docs | Schema awareness | Core | Review context | Archive context | Reporting context | Pilot polish | Advanced templates | Translates strategic context into operational creative direction. |
| Deliverables | Core docs | Core schema | Core | Approval center | File/archive integration | Reporting | Pilot polish | Advanced versioning | Deliverables must belong to Projects and should not stand alone. |
| Deliverable Brief | Core docs | Schema awareness | Core | Approval context | Final archive context | Reporting context | Pilot polish | Template-driven briefs | Production-specific direction for concrete outputs. |
| Tasks | Core docs | Core schema | Core | Review/notification hooks | Closeout tasks | Workload reporting | Pilot polish | Dependencies, recurrence, automation | Tasks belong to Projects and may belong to Deliverables. |
| Task statuses | Core decision | Core schema | Core | Notification hooks | Closeout visibility | Reporting | Pilot polish | Advanced workflow rules | Not Started, In Progress, Blocked, Ready for Review, Done, Deferred, Canceled. |
| Project-level tasks | Core docs | Core schema | Core | Notification hooks | Closeout tasks | Reporting | Pilot polish | Advanced coordination | Used for coordination and project-wide work. |
| Deliverable-level tasks | Core docs | Core schema | Core | Review hooks | Archive context | Reporting | Pilot polish | Advanced production templates | Used for production steps tied to a specific output. |
| Comments / conversations | Core docs | Messaging data awareness | Core contextual conversation | Review conversation | Archive conversation history | Reporting context | UX polish | Advanced collaboration | Use Inspinia chat/conversation/comment assets where possible. |
| Messaging / inbox | Core docs | Deferred or light scaffold | Light queues if needed | Core for review/clarification | Archive awareness | Reporting context | UX polish | Full messaging center | Do not build a separate custom messaging platform in MVP. |
| Activity feed | Core docs | Schema awareness | Core | Core | Core archive history | Reporting context | Pilot polish | Advanced filtering | Operational history, not conversation and not audit log. |
| Audit log | Core docs | Technical foundation | Light internal logging | Core for external review/security | Core for archive-sensitive events | Admin reporting | Validation | Advanced audit controls | Protected system record. Not requester-facing. |
| Notifications | Core docs | Technical foundation | Light internal notifications | Core restrained notification triggers | Closeout reminders | Reporting context | Pilot polish | Digest and preference expansion | Notifications are a liability; notify only when action is needed. |
| Approvals | Core docs | Schema awareness | Deferred/light placeholders | Core | Archive approval history | Reporting | Pilot polish | Advanced approval routing | Deliverable-centered approvals. Waiting for Approval is not a project status. |
| External Review / magic links | Core docs | Technical/security foundation | Deferred or placeholder | Core | File/archive awareness | Reporting | Pilot polish | Advanced external portals | Scoped, time-bound, revocable, auditable. |
| Vendors | Core docs | Role/security awareness | Light contact/context | External reviewer scoped access | Vendor files/archive | Reporting context | Pilot validation | Vendor module | Vendor is a workflow identity, not a base permission role. |
| Files / attachments | Core docs | Storage foundation | Basic project/deliverable files | Review files | Core media/closeout | Brand/reporting connections | Pilot polish | Advanced DAM features | Storage should remain abstracted. |
| Media Library | Core docs | Storage awareness | Basic attachments only | Review file context | Core | Brand/reporting integration | Pilot polish | Advanced media management | Full media library is Phase 4, not Phase 2. |
| Closeout | Core docs | Schema awareness | Light checklist awareness | Approval history feeds closeout | Core | Reporting context | Pilot polish | Advanced archive workflows | Closeout is part of lifecycle, not an afterthought. |
| Brand Center | Branding docs | UI/asset awareness | Deferred | Deferred | Asset connections | Core | Pilot polish | Advanced governance | Phase 5 feature; do not overbuild in MVP. |
| Reporting | Core planning | Data model awareness | Minimal status visibility | Approval/notification visibility | Archive/media reporting | Core initial reports | Pilot validation | Advanced analytics | Reporting should support planning, not surveillance. |
| Department utilization | Planning docs | Data shape awareness | Deferred | Deferred | Data collection | Light reporting | Pilot validation | Advanced utilization | Avoid creating a surveillance feel. |
| Templates | Core docs | Schema awareness | Light/manual duplication | Approval templates light | Closeout templates | Brand/project templates | Pilot validation | Advanced automation | Useful but should not overtake MVP. |
| Recurring projects | Document future path | Deferred | Manual duplication only | Deferred | Deferred | Reporting need validation | Pilot validation | Full recurrence engine | Do not build recurring engine in MVP. |
| Dependency management | Docs only | Data awareness | Light missing-info/blocker fields | Review dependencies | Closeout dependencies | Reporting context | Pilot validation | Advanced dependency graph | Avoid heavy Gantt/dependency UI in MVP. |
| Calendar views | Planning docs | Deferred | Light date fields | Review deadlines | Closeout dates | Reporting/calendar views | Pilot validation | Advanced calendar planning | Date data first, calendar UX later. |
| Inspinia UI foundation | Core docs | Core | Core | Core | Core | Core | Polish | Ongoing | Use Inspinia assets before custom UI. |
| Custom UI components | Restrained | Avoid unless needed | Avoid unless needed | Avoid unless needed | Avoid unless needed | Avoid unless needed | Polish selectively | As needed | Custom UI increases risk and should be justified. |
| Figma design | Brand docs | Structural mockups | MVP workflow mockups | Review/external mockups | Media/closeout mockups | Brand/reporting mockups | Pilot polish | Expansion design | Start from Inspinia structure, then apply ForWorship brand. |
| AI assistance | Prompting docs | Dev workflow | Deferred or light internal helper | Review summaries maybe later | Archive summaries maybe later | Reporting summaries maybe later | Pilot validation | Expanded assistant features | Do not make AI required for core workflow. |

## Current Scope Decisions

### Programs / Content Streams

Decision: Light MVP.

Programs / Content Streams should not be built as a full first-class module in MVP.

MVP treatment:

- Project category or type.
- Tags or simple associations.
- Manual duplication.
- Template awareness where useful.

Future treatment:

- First-class Program / Content Stream object.
- Cadence.
- Default deliverables.
- Default task templates.
- Recurring project generation.
- Stream owner.
- Stream reporting.

### Campaigns

Decision: Optional strategic context.

Campaigns are focused communication pushes and should not be forced as the required parent for every Project.

Campaigns may contain or relate to Projects, but a Project may also belong primarily to a Program / Content Stream, ministry workstream, sermon series, or standalone operational context.

### Initiatives

Decision: Optional strategic context.

Initiatives are broader measurable goals. They should be documented and supported as future strategic context, but not required for MVP project creation.

### Deliverables

Decision: Required Project parent.

Deliverables should not stand alone. Every Deliverable must belong to one Project as its primary operational home.

Deliverables may later support multiple strategic contexts through tags or relationship links.

### Projects

Decision: Core MVP.

Projects are the primary operational container and require start and stop dates.

A Project may relate to strategic context, but its core MVP requirement is operational clarity: objective, owner, department/ministry, start date, stop date, status, deliverables, and tasks.

### Creative Plan / Triage Plan

Decision: Light structured MVP.

The Creative Plan should be structured triage data in MVP, not a standalone top-level module.

The system should store enough triage data to support review, conversion, history, and project creation without overbuilding a separate strategy module too early.

## Deferred by Design

The following are intentionally deferred unless later decisions promote them:

- Full Initiative module.
- Full Program / Content Stream module.
- Recurring project generation.
- Advanced dependency graph.
- Full Gantt/calendar planning.
- Advanced utilization reports.
- Custom strategy canvas.
- Custom workflow builder.
- Advanced AI planning assistant.
- Full digital asset management beyond Phase 4 media library.

## Maintenance Rules

- Update this matrix whenever a scope decision changes.
- Do not move a Future or Deferred feature into MVP without updating this document and the relevant product docs.
- If implementation reveals a missing feature category, add it here rather than leaving it as tribal knowledge.
- If a feature is intentionally kept light, document both the MVP treatment and future path.
- Cross-check this matrix before writing Codex or Claude prompts for implementation.

## Related Docs

- `docs/ROADMAP.md`
- `docs/BUILD_READINESS_CHECKLIST.md`
- `docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`
- `docs/product/PROJECT_TASK_MODULE.md`
- `docs/product/COMMUNICATIONS_TRIAGE_WORKSPACE.md`
- `docs/product/PROJECT_MANAGEMENT.md`
- `docs/product/DELIVERABLES.md`
- `docs/product/TASKS.md`
- `docs/INSPINIA.md`

Last Updated: 2026-05-29

# Roadmap

## Purpose

Define the phased execution model for ForWorship Creative so planning can move from broad concept work into a calm, structured build path.

## Current Decisions

- Work should be organized by phase before implementation begins.
- The planning structure is:

```text
Phase
  -> Category
      -> Feature / Deliverable
          -> Task
              -> Dependency
```

- GitHub remains the canonical source of truth for architecture, decisions, and durable documentation.
- Notion is the active project management layer for backlog, tasks, phases, sprints, open questions, and working coordination.
- Phase planning should reduce cognitive overload, not create a heavy process system.
- Each phase should have clear goals, visible outcomes, and explicit exit criteria.
- Product and roadmap decisions should be filtered through two questions: "Does this make the user feel supported or managed?" and "Does this still feel like 'we got this'?"
- Core architecture maps should include product hierarchy, notification triggers, permission matrix, and the External Access / Magic Link Scope Map before implementation begins.
- No new maps should be created unless they directly unblock database/schema design, permissions/auth implementation, core workflow implementation, notification/event implementation, or external access/security.
- The Phase 0 readiness checklist is the final gate before scaffolding; task status modeling is now complete and reflected there.

## North Star

ForWorship Creative is a conversational ministry workspace that helps church teams feel calm, clear, supported, and ready for what is next. The product promise is: "We got this."

## Planning Rule

Every feature or task should eventually answer:

- What phase does this belong to?
- What category of work is it?
- Is it ready to work on?
- What depends on it?
- What docs define it?
- Who does it primarily serve?

## Work Categories

- Product & Scope
- Workflow Architecture
- UI/UX Design
- Branding & Marketing
- Technical Architecture
- Data & Permissions
- Communications System
- Media Management
- AI Development Workflow
- DevOps & QA
- Pilot & Launch

## Phases

## Phase 0 - Foundation & Planning

- Goal: establish the product shape, planning system, decision history, and execution structure before scaffolding.
- Key outcomes:
  - durable product, workflow, architecture, and philosophy docs
  - roadmap, category structure, and phase definitions
  - initial MVP boundary, hierarchy model, and planning controls
  - active coordination structure in Notion
- Exit criteria:
  - roadmap is documented and accepted
  - MVP planning has a first-pass boundary
  - core workflow, permissions, notification, task status, and Phase 0 build-readiness planning artifacts exist
  - the project is ready to begin technical scaffolding without conceptual drift
  - `docs/BUILD_READINESS_CHECKLIST.md` is current enough to gate scaffolding

## Phase 1 - Scaffold & Technical Foundation

- Goal: create the initial Laravel, Vue, Inertia, and PostgreSQL foundation without jumping ahead into uncontrolled feature work.
- Key outcomes:
  - hosting.com technical stack is validated with the lightweight `host-diagnostics/` site before Laravel scaffolding assumptions are finalized
  - application scaffold exists
  - tenancy, auth, storage, notification, and deployment foundations are intentionally framed
  - technical constraints from hosting and deployment are confirmed
  - architecture decisions are translated into implementation-ready structure
- Exit criteria:
  - scaffolding is complete and stable
  - foundational technical decisions are reflected in the codebase structure
  - development environment and deployment assumptions are documented
  - the project is ready for focused MVP feature implementation

## Phase 2 - Core Operational MVP

- Goal: deliver the smallest useful operational core for requests, projects, deliverables, tasks, statuses, and visibility.
- Key outcomes:
  - request lifecycle and project workspace exist
  - project hierarchy is usable
  - deliverables and task coordination are functional
  - primary status and transition logic is stable
- Exit criteria:
  - a complete core workflow can be demonstrated end to end
  - internal users can intake, manage, and move work forward
  - state transitions are documented and reliable
  - the MVP core is usable without advanced modules

## Phase 3 - Approvals, Notifications & External Review

- Goal: add calm, intentional communication and external review without turning the platform into a noisy workflow engine.
- Key outcomes:
  - deliverable-centered approvals exist
  - magic-link review flows work for External Reviewers and vendor-scoped External Reviewers
  - notification triggers are mapped and implemented intentionally
  - communication history remains in context
- Exit criteria:
  - core approval flows are functional
  - external review can happen without full accounts
  - notification behavior is useful and restrained
  - communication, activity, and audit concepts remain clearly separated

## Phase 4 - Media Library & Closeout

- Goal: support asset preservation, searchability, reuse, and closeout as part of normal operations.
- Key outcomes:
  - media library is connected to projects and deliverables
  - rights, release, usage, and status metadata are supported
  - closeout workflow prepares projects for archive and reuse
  - reusable institutional memory begins to accumulate
- Exit criteria:
  - teams can find and relate media to work context
  - closeout has minimum required checks
  - archive expectations are documented and practical
  - project history and asset preservation support future reuse

## Phase 5 - Brand Center & Reporting

- Goal: strengthen consistency, governance, and decision support without slipping into enterprise complexity.
- Key outcomes:
  - basic Brand Center exists
  - approved assets and brand guidance are easier to find and use
  - initial reporting for department utilization and workload exists
  - governance is documented in a human-usable way
- Exit criteria:
  - brand guidance is connected to real workflows
  - reporting supports planning conversations without overbuilt analytics
  - teams can find approved brand resources quickly
  - governance improves consistency without blocking work unnecessarily

## Phase 6 - Pilot, Polish & Launch Readiness

- Goal: harden the product around real pilot use, sharpen UX, and prepare for responsible launch.
- Key outcomes:
  - pilot workflows are tested against real usage
  - rough edges, ambiguity, and process friction are reduced
  - QA, readiness, and launch constraints are documented
  - onboarding, feedback, and support expectations are clearer
- Exit criteria:
  - pilot-critical workflows are stable
  - major usability issues are resolved or intentionally deferred
  - launch blockers are known and addressed
  - the product is operationally credible for first real users

## Post-MVP Expansion

- Goal: extend the system only after core workflows are stable, useful, and trusted.
- Key outcomes:
  - deferred integrations and advanced capabilities are reassessed from real usage
  - expansion work is mapped to demonstrated needs
  - new modules are added without diluting the core operating model
- Exit criteria:
  - each expansion item has a clear operational reason
  - core workflows remain understandable
  - new work does not create feature gravity or planning sprawl

## First Working Sprint

1. Clean up Notion phases and categories.
2. Create MVP scope checklist.
3. Create product hierarchy map.
4. Create permissions matrix.
5. Create status and state transition matrix.
6. Create notification trigger map.
7. Validate hosting.com technical stack by deploying `host-diagnostics/` to a staging/diagnostics subdomain and reviewing the red/yellow/green checks.
8. Start branding moodboard.
9. Start Figma structure.
10. Create Laravel scaffolding prompt.

## Source-of-Truth Philosophy

- GitHub stores durable architecture, product decisions, philosophy, and documentation that should remain stable over time.
- Notion manages active execution, backlog movement, sprint coordination, working questions, and task-level progress.
- GitHub and Notion should complement each other rather than duplicate each other.
- If a planning artifact becomes structurally important, its durable version belongs in GitHub.
- Docs-site maps are architectural reference diagrams. They must match the canonical source docs. If a diagram is exploratory, it must be labeled Exploratory and must not be used as implementation guidance.
- Maps should only be created when they unblock implementation; otherwise the concept belongs in the canonical doc set or `docs/BUILD_READINESS_CHECKLIST.md`.
- The planning system itself should feel calm, understandable, and human-centered rather than bureaucratic.

## Notes

- The roadmap should stay understandable to both technical and non-technical collaborators.
- Categories should help sort work, not create administrative clutter.
- Phases should create execution clarity, not false certainty.
- Do not bypass phase planning by treating every idea as immediately build-ready.

Last Updated: 2026-05-24

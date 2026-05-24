# Phase 0 Build Readiness Checklist

## Purpose

Define the minimum set of documented decisions and reference artifacts that must be true before Laravel scaffolding begins.

## Gate Principle

- No new maps should be created unless they directly unblock one of:
  - database/schema design
  - permissions/auth implementation
  - core workflow implementation
  - notification/event implementation
  - external access/security
- Maps are architectural tools, not deliverables by default.
- Maps should visualize canonical docs, not create independent decisions.
- Exploratory maps must be clearly labeled `Exploratory`.
- If a table communicates the decision clearly, use a table instead of a diagram.
- Do not create new maps simply because a concept exists.

## Phase 0 Checklist

| Item | Status | Why it matters | Blocks | Source docs | Notes |
|---|---|---|---|---|---|
| Canonical roles finalized | Ready | Permissions, personas, and map labels need one stable role vocabulary before implementation starts. | Permission rules, auth flows, reviewer access, docs-site map consistency | `docs/technical/AUTH_AND_PERMISSIONS.md`; `docs/product/USER_PERSONAS.md`; `docs/product/PERSONA_BEHAVIOR_MAPS.md`; `docs/decisions/PRODUCT_DECISIONS.md` | Canonical permission roles are documented and mapped from older labels. |
| Request lifecycle finalized | Ready | Requests are the intake boundary and must be stable before project scaffolding. | Intake flow, request conversion, status logic | `docs/product/REQUEST_LIFECYCLE.md`; `docs/product/PROJECT_MANAGEMENT.md` | Request lifecycle is already defined separately from projects. |
| Project lifecycle finalized | Ready | Project phases drive all downstream work states and scheduling behavior. | Project workflow, closeout flow, status model | `docs/product/PROJECT_LIFECYCLE.md`; `docs/workflows/PROJECT_CLOSEOUT_WORKFLOW.md`; `docs/decisions/WORKFLOW_DECISIONS.md` | Canonical lifecycle includes Planned and In Review; excludes `Draft`, `Waiting for Approval`, and `Completed`. |
| Deliverable lifecycle finalized | Ready | Deliverables are the main production and approval unit. | Approval implementation, publication flow, revision handling | `docs/product/DELIVERABLES.md`; `docs/product/TASKS.md`; `docs/decisions/WORKFLOW_DECISIONS.md` | Deliverable approvals stay separate from project status. |
| Task status model finalized | Ready | Tasks need clear status transitions before the app can track work reliably. | Task schema, task UI, task workflow logic | `docs/product/TASKS.md`; `docs/product/PROJECT_MANAGEMENT.md` | Finalized with Deferred and Canceled as distinct statuses. |
| Approval state model finalized | Ready | Approval logic depends on versioned, explicit approval states. | Deliverable review workflow, external review handling | `docs/product/DELIVERABLES.md`; `docs/product/COMMUNICATIONS_SYSTEM.md`; `docs/decisions/WORKFLOW_DECISIONS.md` | Approval/review states are deliverable-centered; Waiting for Approval is not a project status. |
| MVP permissions matrix finalized | Ready | Permissions determine what can be built safely and who can do it. | Auth implementation, role gates, external access scope | `docs/technical/AUTH_AND_PERMISSIONS.md`; `docs/product/PROJECT_MANAGEMENT.md`; `docs/decisions/PRODUCT_DECISIONS.md` | Base role matrix is documented; review responsibilities are contextual assignments layered on top. |
| External access / magic link scope verified | Ready | External review must stay narrow, revocable, and auditable. | External reviewer implementation, approval flows, security model | `docs/technical/AUTH_AND_PERMISSIONS.md`; `docs/product/COMMUNICATIONS_SYSTEM.md`; `docs/product/NOTIFICATION_STRATEGY.md`; `docs-site/src/components/maps/ExternalAccessMagicLinkScopeMap.tsx` | Scope boundaries and canonical flow are documented. |
| Notification trigger table drafted | Ready | Notifications should be derived from events, not improvised during build. | Notification implementation, event logic, delivery rules | `docs/product/NOTIFICATION_STRATEGY.md`; `docs/technical/NOTIFICATIONS.md`; `docs-site/src/components/maps/NotificationTriggerMap.tsx` | Trigger patterns already exist in docs and maps. |
| Activity/audit/communication model drafted | Ready | Activity, audit, and communication history must remain distinct. | Logging model, history feeds, review history | `docs/product/MESSAGES_AND_ACTIVITY.md`; `docs/product/COMMUNICATIONS_SYSTEM.md`; `docs/technical/ARCHITECTURE.md`; `docs-site/src/components/maps/ActivityAuditRelationshipDiagram.tsx` | The conceptual separation is documented. |
| Conceptual ERD drafted | Ready | A conceptual entity map prevents schema drift before scaffolding. | Database shape, tenancy structure, relationships | `docs/architecture/maps/data/entity-relationship-diagram.md`; `docs/technical/DATABASE.md`; `docs-site/src/components/maps/EntityRelationshipDiagram.tsx` | Conceptual, not final schema. |
| MVP scope checklist completed | Ready | Keeps Phase 0 from expanding into uncontrolled feature planning. | MVP boundary, Phase 0 exit criteria | `docs/MVP_SCOPE.md`; `docs/ROADMAP.md`; `docs/product/PROJECT_MANAGEMENT.md` | Scope discipline is already documented. |
| Hosting.com PostgreSQL and deployment constraints confirmed | Ready | The scaffold needs real deployment assumptions before the stack is written down. | Database setup, deployment path, environment config | `docs/technical/DEPLOYMENT.md`; `docs/resources/HOSTING_NOTES.md`; `docs/ROADMAP.md`; `host-diagnostics/README.md` | Ready for early staging/proof. Not final production infrastructure. PostgreSQL 13 acceptable for now; PostgreSQL 15/16+ preferred for future production. Deployed diagnostics confirm PHP 8.4.21, required extensions, PostgreSQL PDO connection, filesystem writes, public script path, HTTPS, environment access, and scheduled cPanel HTTP cron. |
| Local development environment confirmed | Ready | Laravel scaffolding needs PHP, Composer, PostgreSQL, Node/npm, and PHP PostgreSQL extensions available locally or through a documented container workflow. | Scaffold generation, local database setup, test execution | `docs/technical/LOCAL_DEVELOPMENT.md`; `package.json`; `scripts/local-dev-check.sh` | `npm run check:local` passes with PHP 8.5.6, Composer 2.9.8, Node.js 22.18.0, npm 11.12.1, PostgreSQL 16.14, `pdo_pgsql`, `pgsql`, and Git 2.50.1. Watch PHP 8.5 vs host PHP 8.4 parity during scaffolding. |
| File storage direction confirmed for dev and production | Ready | Storage affects uploads, approvals, media handling, and closeout. | File storage implementation, asset handling, production readiness | `docs/technical/FILE_STORAGE.md`; `docs/product/CREATIVE_FILE_HANDLING.md`; `docs/product/MEDIA_LIBRARY.md` | Initial single-tenant build uses local server storage; S3-compatible storage is deferred to the multi-tenant transition. |
| Backup and restore requirements drafted | Blocked | Backups are a production prerequisite, not a later optimization. | Recovery tooling, retention policy, deployment readiness | `docs/technical/BACKUPS_AND_RETENTION.md`; `docs/OPEN_QUESTIONS.md` | Exact tooling and restore assumptions still need to be finalized. |
| Figma brand direction started | Ready | The visual system must be framed before UI scaffolding begins. | UI direction, component styling, workflow mockups | `docs/branding/VISUAL_SYSTEM.md`; `docs-site/src/pages/brand/visual-system.astro`; `docs/branding/TYPOGRAPHY.md`; `docs/branding/COLOR_PALETTE.md` | Brand direction exists and can continue to expand in parallel. |
| Laravel scaffolding prompt created | Ready | AI-assisted scaffolding should be guided by a stable prompt, not improvisation. | Scaffold generation, contributor workflow | `prompts/claude-code/INITIAL_SETUP.md`; `prompts/codex/INITIAL_SETUP.md`; `docs/ai/PROMPTING_GUIDE.md` | Prompt material already exists in the repo. |
| AI development workflow confirmed | Ready | Agents need a shared operating model before they touch implementation. | AI-assisted docs, change review, build process | `docs/workflows/AI_DEVELOPMENT_WORKFLOW.md`; `docs/ai/AGENTS.md`; `docs/ai/CODEX_RULES.md`; `docs/ai/CLAUDE_CODE_RULES.md` | The AI workflow is documented and tied to canonical docs. |

## Map Discipline

- Maps are architectural tools, not deliverables by default.
- Maps should visualize canonical docs, not create independent decisions.
- Exploratory maps must be clearly labeled `Exploratory`.
- If a table communicates the decision clearly, use a table instead of a diagram.
- Do not create new maps simply because a concept exists.

## Readiness Rule

Laravel scaffolding should begin only when the checklist items that block implementation are either `Ready` or explicitly deferred in a decision log with a reason.

Last Updated: 2026-05-24

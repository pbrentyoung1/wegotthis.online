# CLAUDE.md

This file provides guidance to Claude Code (`claude.ai/code`) when working with code in this repository.

## Project Status

**This repository now includes the initial application scaffold.** The Laravel app base lives in `resources/Laravel/starterkit`; documentation and decision capture remain canonical in `/docs`.

## Product Identity

- **Product name:** ForWorship Creative
- **App URL (target):** `app.forworship.org`
- **Working codename / current domain:** `wegotthis.online` — retained as the working domain until `app.forworship.org` infrastructure is ready
- **Product promise:** "We got this."
- **Ecosystem:** ForWorship — a family of connected ministry tools under `forworship.org`
- **Public marketing pathways** (landing/education pages, not separate apps): `comms.forworship.org`, `creative.forworship.org`, `planning.forworship.org`, `tech.forworship.org`, `media.forworship.org`
- **Architecture model:** One unified application at `app.forworship.org` with named modules inside (Requests, Projects, Deliverables, Tasks, Approvals, Media Library, Brand Center, Reports) — not separate per-subdomain apps
- References in this repo to `wegotthis.online` reflect the working codename and should be interpreted as pointing to the same product. Update to `app.forworship.org` / ForWorship Creative when the domain transitions.

## Core Constraints

- **Do not add application code beyond the current scaffold** unless explicitly instructed
- **PostgreSQL is required** from day one (not MySQL)
- **Multi-tenancy must be considered** in all architectural decisions
- Use **single-database `tenant_id` tenancy** for MVP (not schema-per-tenant or database-per-tenant)
- **GitHub is the source of truth** for the repository
- Preserve documented decisions and do not override them silently during implementation
- Preserve the brand direction that the product should feel like "we got this" in software form: calm, capable, warm, personal, and steady
- Before creating or heavily modifying UI, read `docs/INSPINIA.md` and review the INSPINIA starterkit, full Laravel implementation, and Figma assets for patterns that can be adapted

## Technology Stack

- Laravel 13
- Vue 3
- Inertia.js
- PostgreSQL (single database with tenant-scoped records)
- Inspinia (admin UI foundation)
- `resources/Laravel/starterkit` as the Laravel application base
- `resources/Laravel/inspinia` as the planned reference implementation for common patterns
- PostgreSQL full-text search for MVP
- Transactional email with Postmark (preferred)
- S3-compatible file storage (Cloudflare R2 likely)
- hosting.com reseller account for initial hosting

## Architecture Overview

### Product Structure

```
Strategic Context
  -> Project Brief
    -> Deliverable Brief
      -> Tasks
```

- **Strategic Context**: Optional initiatives, campaigns, programs/content streams, sermon series, seasons, ministry areas, topics, and tags
- **Projects**: Primary operational container (the core object)
- **Deliverables**: Production and approval units with their own due dates, statuses, files, and tasks
- **Tasks**: Individual execution units that belong to projects and may optionally belong to deliverables
- **Requests**: Separate objects that convert into projects after intake approval

Campaigns and initiatives are strategic context, not required project parents. Programs / Content Streams are recurring operational rhythms, distinct from campaigns.

### Calm Software Principle

The product should create calm and reduce overhead, not add complexity:

- Guide instead of obstruct
- Reduce decisions and interruptions
- Make invisible work visible
- Preserve institutional memory
- Favor clarity over customization
- Use opinionated defaults with flexible overrides

### North Star

ForWorship Creative is a conversational ministry workspace that helps church teams feel calm, clear, supported, and ready for what is next. The product promise is simple: "We got this."

### Product Personality

- The platform should feel like a calm, capable teammate
- It should feel supportive, not managerial
- It should guide rather than command
- It should treat users like humans, not database operators
- It should feel personal and conversational, not corporate or clinical
- It should feel like collaboration, not compliance
- Conversational interaction should stay lightweight, contextual, and helpful
- AI behavior should feel ambient, observant, and quietly useful rather than performative

### Multi-Tenancy

- Use single PostgreSQL database with `tenant_id` column on tenant-scoped tables
- All queries, permissions, files, notifications, search, and audit logs must respect tenant scope
- Tenant scoping is a core architectural concern from day one
- Future integrations (like Planning Center) should be configurable per tenant

## MVP Scope

Core MVP priorities include:

- Structured communications request intake and request lifecycle
- Project workspace with deliverables, tasks, and approvals
- Review visibility and magic link approvals
- Communication timeline tracking (comments, activity feed, project history)
- Basic budget/cost tracking and department utilization tracking
- Media library connected to projects
- Project closeout workflow
- Basic Brand Center
- Basic templates
- Transactional email and in-app notifications
- PostgreSQL search
- File storage abstraction with basic rights/release metadata
- Activity and audit logging

**Deferred to post-MVP**: social publishing APIs, Planning Center integration, Adobe/Figma/Canva integrations, AI tagging, semantic search, SMS, advanced analytics, email reply ingestion, full vendor accounts, custom workflow builder, custom domains, complex recurrence, advanced archive packaging.

## Documentation Structure

- `/docs/decisions` - Product, technical, workflow, and branding decisions
- `/docs/product` - Module definitions, personas, and product behavior
- `/docs/technical` - Architecture, stack, deployment, and engineering direction
- `/docs/branding` - Brand and UI guidance
- `/docs/workflows` - Operational and development workflows
- `/docs/ai` - Project context for AI assistants (Codex, Claude Code, ChatGPT)
- `/prompts` - Reusable prompt material for development assistants

### Key Reference Files

- `/docs/ai/DO_NOT_BREAK.md` - Project constraints that must be preserved
- `/docs/technical/ARCHITECTURE.md` - System architecture and major structural choices
- `/docs/technical/MULTI_TENANCY.md` - Tenant strategy
- `/docs/technical/DATABASE.md` - Database direction and conceptual entities
- `/docs/MVP_SCOPE.md` - What belongs in first release
- `/docs/CURRENT_STATE.md` - Actual state of the project
- `/docs/product/CALM_SOFTWARE_PRINCIPLES.md` - Core product philosophy
- `/docs/product/SYSTEM_PHILOSOPHY.md` - Expanded system philosophy; guiding question for every feature decision; also governs AI-assisted development and architecture choices
- `/docs/product/NOTIFICATION_STRATEGY.md` - Notification principles, types, tone, and per-persona rules
- `/docs/branding/VOICE_AND_TONE.md` - Personal, warm, conversational product voice and example phrasing
- `/docs/branding/TYPOGRAPHY.md` - IBM Plex Serif, IBM Plex Sans, and Caveat direction
- `/docs/INSPINIA.md` - How to use the INSPINIA starterkit, full Laravel implementation, and Figma assets as structural references
- `/docs/product/USER_PERSONAS.md` - The seven user personas; drives UI/UX prioritization
- `/docs/product/PERSONA_BEHAVIOR_MAPS.md` - Action-level behavior layer; drives navigation architecture, homepage logic, notification rules, and mobile optimization priority
- `/docs/product/CORE_MODULES.md` - Major modules expected in the product

## Activity and Audit Logging

Design activity and audit logging early as a core architectural concern:

- Track meaningful actions: request submitted/accepted/deferred/rejected, project created, status changed, deliverable created/updated, task assigned/completed, file uploaded, approval granted/rejected, comment added, budget changed, time logged, project entered closeout, project archived, External Reviewer link used
- **Notifications** are alerts sent to people
- **Messages/comments** are human conversation
- **Activity logs** are visible project history
- **Audit logs** are protected records of meaningful changes
- All must respect tenant scope and external magic-link scope

## Communications System

- Outbound: transactional email + in-app notifications
- Project communication history: comments, reviewer feedback, External Reviewer feedback, approval notes, requested changes, internal discussion, decision history, status updates, system-generated events
- Notification design should avoid noise and link users back to relevant context
- Copy and communication should make people feel supported rather than managed

## External Integrations (Future)

- Use service abstraction for external systems (e.g., Planning Center)
- Keep webhook handling isolated from core business logic
- Use queue processing for sync work, retries, and slow external API operations
- Store external IDs separately from internal IDs
- Design integration boundaries so the platform remains fully functional without any external connector
- Treat each integration as an isolated module, not as a foundation for core architecture

## Development Workflow

All commands run from `resources/Laravel/starterkit`.

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev          # Vite dev server
php artisan serve    # Laravel dev server → http://127.0.0.1:8000
composer test        # Run test suite (41 tests)
npm run build        # Production asset build
```

- **Inertia SSR is disabled** — do not enable without confirming cPanel staging compatibility first
- **Vite asset path:** `resources/js/views` (not `resources/js/pages`)
- **Auth:** Fortify, wired to Inspinia Vue view paths
- See `resources/Laravel/starterkit/README.md` for full local setup instructions

## Open Questions

- What backup tooling and restore process should be standardized before production?
- Which production infrastructure should replace hosting.com/cPanel staging?
- What exact MVP boundary and required fields for project requests?
- Which closeout checks are required before project archive?
- Which pilot church templates are required first?
- What exact permissions model and notification preferences should users control?

# ForWorship Creative

## Purpose

ForWorship Creative is a communications operations platform for churches. It is intended to help church teams manage communications requests, projects, media assets, approvals, social content, print production, signage, vendors, calendars, and team collaboration.

## Current Decisions

- GitHub is the source of truth for the repository.
- Product name: ForWorship Creative.
- Target app URL: `app.forworship.org`.
- Working codename/current domain: `wegotthis.online` until infrastructure transitions.
- ForWorship is the umbrella ecosystem; public subdomains such as `comms.forworship.org` and `creative.forworship.org` are marketing and education entry points, not separate apps.
- Figma will be used for product and interface design.
- The checked-in application base uses Laravel 13, PostgreSQL, and Inspinia.
- The checked-in Inspinia Blade, Tailwind 4, Preline, and JavaScript implementation is the approved MVP frontend.
- npm is the canonical JavaScript package manager; commit `package-lock.json` and do not create a Yarn lockfile.
- `resources/Laravel/starterkit` is the planned Laravel application base.
- `resources/Laravel/inspinia` is the planned reference implementation for common UI patterns.
- PostgreSQL should be used from day one.
- The system should be designed with multi-tenancy in mind, even if the first version serves one church.
- Projects should function as the primary container object.
- Documentation and decision history live in `/docs`.
- Future optional integrations may include Planning Center and other church operations tools.
- The repository now documents expanded product pain points, project lifecycle, closeout workflow, creative file handling, brand management, and department utilization reporting.
- Major modeling questions now have working decisions: `organization_id` tenancy for MVP, Projects -> Deliverables -> Tasks as the implemented operational spine, optional future Campaigns, deliverable-centered approvals, magic link external reviews, request lifecycle, and calm software principles.
- The product promise is "We got this."; the experience should feel calm, capable, warm, and steady.
- The platform should feel like a conversational ministry workspace that supports people rather than managing them.
- The visual system direction is a calm editorial workspace with warm neutrals, soft geometry, restrained accents, and thoughtful typography.

## North Star

ForWorship Creative is a conversational ministry workspace that helps church teams feel calm, clear, supported, and ready for what is next. The product promise is simple: "We got this."

## Open Questions

- Should the first hosted environment be shared hosting, VPS, or another hosting.com option?
- What is the exact MVP boundary for the first usable release?
- What Figma design system decisions should be reflected in code conventions?
- Which future integrations should be prioritized after the core product is stable?
- Which closeout, Brand Center, and department utilization features belong in MVP?
- Which pilot templates, exact permissions, backup tooling, and production storage provider should be selected before scaffolding?

## Notes

This repository has completed the Phase 1 identity foundation and now implements the core request-to-archived-project MVP loop under `resources/Laravel/starterkit`. Authentication, profile editing, People, request intake/triage, stakeholder conversations, Tagged Requests, Request-to-Project conversion, Project Type deliverable templates, Deliverables, Tasks, approvals, alerts, scheduling, rich text, and guarded Project closeout are working.

Current operational handoff:

- `/docs/RESTART_HANDOFF.md`
- `/docs/CURRENT_STATE.md`

Standard Git procedure for this repository:

- check changes with `git status`
- stage intended files with `git add .` or targeted `git add <path>`
- create a clear commit with `git commit -m "message"`
- upload the commit with `git push`

Key documentation areas:

- `/docs/decisions` records product, technical, workflow, and branding decisions.
- `/docs/product` defines modules, personas, and product behavior.
- `/docs/technical` captures architecture, stack, deployment, and engineering direction.
- `/docs/technical/PLANNING_CENTER_INTEGRATION.md` documents future optional Planning Center integration planning.
- `/docs/branding` preserves brand and UI guidance.
- `/docs/branding/VISUAL_SYSTEM.md` documents the current layout, color, typography, motion, and component system direction.
- `/docs/INSPINIA.md` documents how INSPINIA is used as structural foundation and pattern reference without defining final brand personality.
- `/docs/workflows` describes operational and development workflows.
- `/docs/ai` gives Codex, Claude Code, and other AI assistants durable project context.
- `/prompts` stores reusable prompt material for development assistants.
- `/docs/product/PAIN_POINTS.md` captures expanded communications operations pain points.
- `/docs/product/PROJECT_LIFECYCLE.md` and `/docs/product/PROJECT_CLOSEOUT.md` document lifecycle and closeout planning.
- `/docs/product/BRAND_MANAGEMENT.md` documents Brand Center and brand governance direction.
- `/docs/product/CALM_SOFTWARE_PRINCIPLES.md` documents the principle that the software should reduce overhead and help users get work done.
- `/docs/branding/VOICE_AND_TONE.md`, `/docs/branding/TYPOGRAPHY.md`, and `/docs/branding/UI_PRINCIPLES.md` define the warm, conversational, human-centered product experience.
- `/docs/technical/SEARCH_STRATEGY.md`, `/docs/technical/NOTIFICATIONS.md`, and `/docs/technical/BACKUPS_AND_RETENTION.md` document core platform planning concerns.

Last Updated: 2026-06-12

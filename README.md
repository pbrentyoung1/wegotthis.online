# wegotthis.online

## Purpose

wegotthis.online is a communications operations platform for churches. It is intended to help church teams manage communications requests, projects, media assets, approvals, social content, print production, signage, vendors, calendars, and team collaboration.

## Current Decisions

- GitHub is the source of truth for the repository.
- Figma will be used for product and interface design.
- The application is expected to be built later with Laravel 12, Vue 3, Inertia.js, PostgreSQL, and Inspinia.
- PostgreSQL should be used from day one.
- The system should be designed with multi-tenancy in mind, even if the first version serves one church.
- Projects should function as the primary container object.
- Documentation and decision history live in `/docs`.
- Future optional integrations may include Planning Center and other church operations tools.
- The repository now documents expanded product pain points, project lifecycle, closeout workflow, creative file handling, brand management, and department utilization reporting.
- Major modeling questions now have working decisions: `tenant_id` tenancy, Campaigns -> Projects -> Deliverables -> Tasks hierarchy, deliverable-centered approvals, magic link external reviews, request lifecycle, and calm software principles.

## Open Questions

- Which Inspinia seed should be used when application scaffolding begins?
- Should the first hosted environment be shared hosting, VPS, or another hosting.com option?
- What is the exact MVP boundary for the first usable release?
- What Figma design system decisions should be reflected in code conventions?
- Which future integrations should be prioritized after the core product is stable?
- Which closeout, Brand Center, and department utilization features belong in MVP?
- Which pilot templates, exact permissions, backup tooling, and production storage provider should be selected before scaffolding?

## Notes

This repository is currently a planning and documentation foundation only. Laravel has not been scaffolded yet, and no application code has been added.

Key documentation areas:

- `/docs/decisions` records product, technical, workflow, and branding decisions.
- `/docs/product` defines modules, personas, and product behavior.
- `/docs/technical` captures architecture, stack, deployment, and engineering direction.
- `/docs/technical/PLANNING_CENTER_INTEGRATION.md` documents future optional Planning Center integration planning.
- `/docs/branding` preserves brand and UI guidance.
- `/docs/workflows` describes operational and development workflows.
- `/docs/ai` gives Codex, Claude Code, and other AI assistants durable project context.
- `/prompts` stores reusable prompt material for development assistants.
- `/docs/product/PAIN_POINTS.md` captures expanded communications operations pain points.
- `/docs/product/PROJECT_LIFECYCLE.md` and `/docs/product/PROJECT_CLOSEOUT.md` document lifecycle and closeout planning.
- `/docs/product/BRAND_MANAGEMENT.md` documents Brand Center and brand governance direction.
- `/docs/product/CALM_SOFTWARE_PRINCIPLES.md` documents the principle that the software should reduce overhead and help users get work done.
- `/docs/technical/SEARCH_STRATEGY.md`, `/docs/technical/NOTIFICATIONS.md`, and `/docs/technical/BACKUPS_AND_RETENTION.md` document core platform planning concerns.

Last Updated: 2026-05-20

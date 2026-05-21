# Core Modules

## Purpose

Define the major modules expected in the product.

## Current Decisions

- MVP core or likely core modules include Requests, Projects, Deliverables, Tasks, Templates, Calendar, Dashboard, Messages/Activity, Media Library, Notifications, Search, Activity/Audit Log, permissions, and basic Brand Center.
- Campaigns are optional parent containers and may be MVP or early post-MVP depending on pilot needs.
- Deliverables are production and approval units.
- Tasks may attach to projects or deliverables.
- Basic templates should provide defaults without becoming a complex workflow builder.
- Search should use PostgreSQL full-text search for MVP.
- Backups and retention are core product requirements even if not a user-facing module.
- Working direction: Brand Center should be treated as a core or near-core module because brand management is part of church communications operations.
- Working direction: Project Closeout should be treated as a core or near-core module because archiving and institutional memory are part of the project lifecycle.
- Brand Center should connect to Request Intake, Media Library, project review, and closeout.
- Project Closeout should connect projects, media assets, approvals, budgets, timelines, reusable assets, and archive packages.
- Future or post-MVP modules include full vendor accounts, advanced integrations, custom workflow builder, AI tagging, semantic search, SMS, and complex recurrence unless required by a pilot.

## Open Questions

- Which modules are administrative versus everyday workspace features?
- Which modules depend on projects?
- Is Brand Center MVP or early post-MVP?
- Which closeout requirements are mandatory before archive?
- Should Project Closeout be a separate module or a project workflow phase?
- Is Campaigns MVP or early post-MVP?
- Which pilot templates are required first?

## Notes

- Use this as the module index and link to detailed module docs as they mature.
- Detailed module expansion:
  - `/docs/product/CAMPAIGNS.md`
  - `/docs/product/DELIVERABLES.md`
  - `/docs/product/TASKS.md`
  - `/docs/product/TEMPLATES.md`
  - `/docs/product/PROJECT_CLOSEOUT.md`
  - `/docs/product/CREATIVE_FILE_HANDLING.md`
  - `/docs/product/BRAND_MANAGEMENT.md`
  - `/docs/product/CALM_SOFTWARE_PRINCIPLES.md`

Last Updated: 2026-05-20

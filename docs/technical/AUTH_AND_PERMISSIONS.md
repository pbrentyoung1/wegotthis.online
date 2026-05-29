# Auth and Permissions

## Purpose

Define authentication and authorization direction.

## Current Decisions

- Canonical MVP role set:
  - Platform Owner / Super Admin
  - Organization Admin
  - Communications Lead
  - Project Owner
  - Contributor
  - Reviewer
  - External Reviewer
  - Viewer
- Department Leader, stakeholder, and vendor describe real-world identities or contexts, not base permission roles by themselves.
- Older labels should map forward as follows:
  - Admin -> Organization Admin
  - Manager -> Communications Lead or Project Owner depending context
  - User -> Contributor or Viewer depending context
  - Vendor -> External Reviewer with vendor-scoped access
  - Stakeholder -> Reviewer or External Reviewer depending account or access model
  - Department Leader -> organizational or persona identity that may be assigned Project Owner, Reviewer, Viewer, or External Reviewer in context
- Internal users should have accounts.
- External reviewers should use secure, time-bound magic links for review and approval in MVP.
- Vendor participation in MVP should be handled as External Reviewer access with vendor-scoped permissions.
- Base permission roles define general system authority.
- Review responsibilities are contextual assignments on a project, deliverable, or reviewable element, not separate base roles.
- A single project or deliverable may have multiple reviewers for budget, resources, design, brand, content, ministry, and final approval.
- Strategic context association should not grant access by itself in MVP.
- Project, deliverable, task, tenant, role, assignment, and magic-link scope remain the authorization boundaries.

## External Access Model

- Magic links should expose only the relevant tenant, project, deliverable, asset version, and permitted action scope.
- Magic links should allow scoped actions such as view, comment, approve, or request changes.
- Selected file upload or replacement should only be possible when a link explicitly grants that action for vendor-scoped participation.
- Magic links should be revocable and expire.
- External reviewer links should never grant broad tenant visibility.
- External reviewer access should be scoped, time-bound, revocable, and logged.

## Permission Considerations

- Platform Owner / Super Admin:
  - manage platform-wide settings, tenants, support operations, and cross-tenant administration
- Organization Admin:
  - manage organization settings, users, roles, departments, templates, tenant configuration, and restricted archive access
- Communications Lead:
  - triage requests, manage projects, assign work, oversee approvals, manage communications workflow, and view utilization where authorized
- Project Owner:
  - manage assigned project details, deliverables, tasks, stakeholders, comments, status, and closeout within project scope
- Contributor:
  - work on assigned projects, upload assets, complete tasks, comment, and update assigned deliverables or tasks
- Reviewer:
  - review assigned deliverables, comment, approve, or request changes where authorized
- External Reviewer:
  - view and act only on explicitly shared deliverable or asset scope through a magic link
- Viewer:
  - view permitted projects, statuses, and relevant history without materially changing work

## MVP Permission Matrix

| Action | Platform Owner / Super Admin | Organization Admin | Communications Lead | Project Owner | Contributor | Reviewer | External Reviewer | Viewer |
|---|---|---|---|---|---|---|---|---|
| Manage platform / tenants | Full | None | None | None | None | None | None | None |
| Manage organization settings, users, departments, templates | Full | Full | Limited | None | None | None | None | None |
| Create and triage requests | Full | Full | Full | Limited | Limited | None | None | None |
| Create projects | Full | Full | Full | Limited | None | None | None | None |
| Edit assigned project details | Full | Full | Full | Full | Limited | None | None | View only |
| Change project status | Full | Full | Full | Full within assigned scope | None | None | None | None |
| Create and edit deliverables | Full | Full | Full | Full within assigned scope | Limited when assigned | None | None | View only |
| Move deliverables through production statuses | Full | Full | Full | Full within assigned scope | Limited when assigned | None | None | None |
| Request review or approval | Full | Full | Full | Full within assigned scope | Limited when assigned | None | None | None |
| Approve or request changes | Full | Full | When assigned or overseeing | When assigned | None | When assigned | Through scoped link only | None |
| Create External Reviewer links | Full | Full | Full | Limited within assigned scope | None | None | None | None |
| Upload files | Full | Full | Full | Full within assigned scope | When assigned | Limited review attachments | If scoped link allows | None |
| View internal-only comments | Full | Full | Full | Full within assigned scope | When assigned | When assigned | None | Limited if permitted |
| View review-visible comments | Full | Full | Full | Full within assigned scope | When assigned | When assigned | Through scoped link only | If permitted |
| View budget, time, utilization | Full | Full | If authorized | Limited if authorized | None | None | None | None |
| Manage brand assets | Full | Full | Limited | None | None | None | None | View only if permitted |
| Close out and archive projects | Full | Full | Full | Full within assigned scope | None | None | None | None |
| Manage strategic context records and associations | Full | Full | Full | Limited within assigned scope | None | None | None | View only if permitted |

## Review Assignments

- Review assignment types for MVP are Budget, Resources, Design, Brand, Content, Ministry, and Final.
- Review assignments may attach to a project, deliverable, or reviewable element.
- Review assignments define responsibility in context; they do not create new global roles such as Budget Reviewer or Design Reviewer.
- A reviewer may be an internal user or an External Reviewer reached through a scoped magic link.
- Each assignment can be required or optional.
- Each assignment carries its own status, decision, due date, completion date, and notes.
- A deliverable or element can move out of Waiting for Approval only when all required review assignments are approved or explicitly waived by an authorized internal role.
- Optional review assignments may inform the project history without blocking approval.

## Communication Visibility

- Internal users may need project comments and internal discussion.
- Reviewer and External Reviewer experiences may need access only to review-visible comments, review notes, and approval context.
- Vendor-scoped external review may need limited access to vendor-relevant comments, file events, and deliverable context.
- Activity logs are visible project history and should be filtered by role and scope.
- Audit logs are protected records and should be limited to authorized internal roles.
- Notification recipients should not gain access beyond their underlying role, tenant membership, or magic-link scope.
- Campaign, initiative, program/content stream, topic, tag, or sermon series associations should not expand access unless a later permissions decision explicitly allows it.

## Open Questions

- Are roles tenant-specific?
- Will churches need custom roles later?
- Should departments see budget and time usage?
- Should project comments support internal-only and review-visible visibility?
- Which activity entries should be visible to vendor-scoped external reviewers?
- Who can create or edit strategic context records such as campaigns, programs/content streams, topics, and tags?

## Notes

- Permissions should be documented before sensitive project or asset visibility is implemented.
- Permission design must cover viewing project status, approving work, uploading assets, accessing archived source files, managing brand assets, closing projects, and viewing reports.
- External reviewer access should be intentionally limited because it does not require full workspace visibility.
- Approval permissions should primarily target deliverables for MVP.
- Comments, asset access, and project visibility must respect both tenant scope and magic-link scope.
- Communication history visibility should be designed before external reviewer and vendor-scoped links are implemented.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.
- See `/docs/architecture/maps/security/external-access-scope-map.md` and `/docs-site/src/pages/architecture/magic-link-scope.astro` for the canonical external access map.

Last Updated: 2026-05-29

# Auth and Permissions

## Purpose

Define authentication and authorization direction.

## Current Decisions

- Canonical Phase 1 system role set:
  - Organization Admin
  - Communications Manager
  - Department Leader
  - Contributor
  - Viewer
- Project Owner, Reviewer, Approver, stakeholder, admin delegate, and vendor participation are contextual work assignments, not additional Phase 1 system roles.
- External Reviewer is a person/contact type and future scoped access context, not a Phase 1 login role.
- Platform Owner / Super Admin is a future platform-level concern and is not represented by the Phase 1 organization role tables.
- Older labels should map forward as follows:
  - Admin -> Organization Admin
  - Communications Lead -> Communications Manager
  - Manager -> Communications Manager or Project Owner depending context
  - User -> Contributor or Viewer depending context
  - Vendor -> External Reviewer with vendor-scoped access
  - Stakeholder -> Reviewer or External Reviewer depending account or access model
  - Department Leader -> organization role used for ministry request, department-facing visibility, and contextual review participation
- Internal users should have accounts.
- External reviewers should use secure, time-bound magic links for review and approval in MVP.
- Vendor participation in MVP should be handled as External Reviewer access with vendor-scoped permissions.
- Base permission roles define general system authority.
- Review responsibilities are contextual assignments on a project, deliverable, or reviewable element, not separate base roles.
- A single project or deliverable may have multiple reviewers for budget, resources, design, brand, content, ministry, and final approval.

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
- Communications Manager:
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

| Action | Organization Admin | Communications Manager | Department Leader | Contributor | Viewer |
|---|---|---|---|---|---|
| Manage organization settings, users, departments, roles | Full | Limited | None | None | None |
| Submit requests | Full | Full | Full | None | None |
| Triage requests | Full | Full | None | None | None |
| Create projects | Full | Full | None | None | None |
| View projects and deliverables | Full | Full | Department-visible/contextual | Assigned/contextual | Permitted read-only |
| Manage projects and deliverables | Full | Full | Contextual future assignment | Contextual future assignment | None |
| Complete tasks | Full | Full | None | Assigned tasks | None |
| Decide assigned reviews | Full | Full | When assigned | None | None |

This base matrix reflects Phase 1 seeded permissions. Future scoped assignments will refine project, deliverable, task, and review authority without expanding the system role set by default.

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

## Open Questions

- Are roles tenant-specific?
- Will churches need custom roles later?
- Should departments see budget and time usage?
- Should project comments support internal-only and review-visible visibility?
- Which activity entries should be visible to vendor-scoped external reviewers?

## Notes

- Permissions should be documented before sensitive project or asset visibility is implemented.
- Permission design must cover viewing project status, approving work, uploading assets, accessing archived source files, managing brand assets, closing projects, and viewing reports.
- External reviewer access should be intentionally limited because it does not require full workspace visibility.
- Approval permissions should primarily target deliverables for MVP.
- Comments, asset access, and project visibility must respect both tenant scope and magic-link scope.
- Communication history visibility should be designed before external reviewer and vendor-scoped links are implemented.
- See `/docs/architecture/maps/security/external-access-scope-map.md` and `/docs-site/src/pages/architecture/magic-link-scope.astro` for the canonical external access map.

Last Updated: 2026-06-10

# Auth and Permissions

## Purpose

Define authentication and authorization direction.

## Current Decisions

- Known roles include Admin, Manager, User, and Vendor.
- Additional working roles under consideration include Stakeholder and Department Leader.
- Vendor access should be considered separately because it may require limited visibility.
- Working decision: internal users should have accounts; external stakeholders should use secure, time-bound magic links for review and approval in MVP.
- Working decision: vendors should use limited project or deliverable access through secure links in MVP.
- Full stakeholder accounts and full vendor accounts may be considered later.

## External Access Model

- Magic links should expose only the relevant project or deliverable context.
- Magic links should allow scoped actions such as view, comment, approve, or request changes.
- Magic links should be revocable and expire.
- Vendor links should not grant full tenant visibility.
- Vendor access should be scoped, time-bound, and revocable.
- Stakeholder and vendor link usage should be logged.

## Permission Considerations

- Admin:
  - manage users, roles, departments, settings, brand assets, archived source files, reports, and integrations
  - close or reopen projects where policy allows
- Manager:
  - manage projects, intake, assignments, approvals, timelines, budgets, closeout, and media metadata
  - view department utilization reports where authorized
- User:
  - work on assigned projects, upload assets, complete tasks, participate in review, and view relevant project status
- Vendor:
  - access only approved project-level files, tasks, messages, and vendor-ready deliverables
  - upload vendor files where allowed
- Stakeholder:
  - view project status, timelines, pending approvals, decisions, and final deliverables for relevant projects
  - approve work where assigned
- Department Leader:
  - submit or sponsor requests, view department project status, approve department work, and potentially view department utilization
- Magic-link reviewer:
  - view only scoped project or deliverable context
  - comment, approve, or request changes only where allowed
- Magic-link vendor:
  - view or upload only scoped files and deliverable context where allowed

## Communication Visibility

- Internal users may need project comments and internal discussion.
- Stakeholders may need access only to stakeholder-visible comments, review notes, and approval context.
- Vendors may need limited access to vendor-relevant comments, file events, and deliverable context.
- Activity logs are visible project history and should be filtered by role and scope.
- Audit logs are protected records and should be limited to authorized internal roles.
- Notification recipients should not gain access beyond their underlying role, tenant membership, or magic-link scope.

## Open Questions

- What permissions belong to each role?
- Are roles tenant-specific?
- Will churches need custom roles later?
- Who can approve work?
- Who can upload assets?
- Who can access archived source files?
- Who can manage brand assets?
- Who can close projects?
- Who can view budget, time, and department utilization reports?
- Should departments see budget and time usage?
- What is the exact permissions matrix for MVP?
- Should project comments support internal-only and stakeholder-visible visibility?
- Which activity entries should be visible to vendors and magic-link stakeholders?

## Notes

- Permissions should be documented before sensitive project or asset visibility is implemented.
- Permission design must cover viewing project status, approving work, uploading assets, accessing archived source files, managing brand assets, closing projects, and viewing reports.
- Vendor and stakeholder access should be intentionally limited because they may not need full workspace visibility.
- Approval permissions should primarily target deliverables for MVP.
- Comments, asset access, and project visibility must respect both tenant scope and magic-link scope.
- Communication history visibility should be designed before stakeholder and vendor links are implemented.

Last Updated: 2026-05-20

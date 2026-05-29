# Departments and Teams

## Purpose

Define how ForWorship Creative should model Departments, Teams, ministry ownership, reporting, permissions, requests, and capacity planning.

Departments and Teams help the system understand who is requesting work, who owns ministry goals, who reviews deliverables, and how Communications can report on time, cost, capacity, and project volume.

## Core Principle

Departments represent ministry or organizational ownership.

Teams represent working groups, production groups, or ministry subgroups.

A Department answers:

> Which ministry or organizational area owns or benefits from this work?

A Team answers:

> Which group of people is doing, reviewing, or coordinating the work?

## Recommended MVP Decision

Departments should be first-class lightweight objects in MVP.

Teams should be documented and future-proofed, but may remain light in MVP unless needed for permissions or assignment.

This keeps reporting and request ownership clear without overbuilding organizational structure too early.

## Departments

Departments are ministry or organizational areas.

Examples:

- Communications.
- Children’s Ministry.
- Students.
- Worship.
- Production.
- Outreach.
- Missions.
- Discipleship.
- Executive Team.
- Operations.
- Facilities.

Departments may:

- Submit requests.
- Own projects.
- Own budgets.
- Have department leaders.
- Have stakeholders/reviewers.
- Receive capacity guidance.
- Receive project status visibility.
- Be used for annual planning and reporting.

## Department Fields

Recommended fields:

```text
departments
- id
- organization_id
- name
- description
- department_lead_profile_id, nullable
- default_requester_profile_id, nullable
- default_reviewer_profile_id, nullable
- budget_notes
- status
- sort_order
```

MVP can keep this simple:

- Name.
- Description.
- Department lead.
- Status.

## Teams

Teams are working groups or subgroups.

Examples:

- Video Production Team.
- Social Media Team.
- Design Team.
- Podcast Team.
- VBS Volunteers.
- Sunday Band.
- Livestream Team.
- Photography Team.
- Communications Review Team.

Teams may be internal production groups, volunteer teams, ministry teams, or project-specific groups.

## Team Fields

Recommended future fields:

```text
teams
- id
- organization_id
- department_id, nullable
- name
- description
- team_lead_profile_id, nullable
- team_type
- status
- sort_order
```

Team types may include:

- Production.
- Ministry.
- Volunteer.
- Review.
- Vendor/Contractor.
- Project-specific.

## Department vs Team

| Concept | Meaning | Example |
|---|---|---|
| Department | Ministry or organizational owner | Children’s Ministry |
| Team | Working or serving group | VBS Volunteer Team |
| Department | Budget/reporting owner | Worship |
| Team | Production or execution group | Sunday Band |
| Department | Requesting area | Outreach |
| Team | Assigned contributors | Photography Team |

## Relationship to Users / Profiles

People may belong to a Department, Team, or both.

Examples:

```text
Person: Jordan
Department: Communications
Team: Video Production
Role: Contributor
Skills: Video Editing, Color Correction
```

```text
Person: Maria
Department: Children’s Ministry
Person Type: Lay Minister
Role: Department Leader / Reviewer
Team: VBS Leadership Team
```

```text
Person: Sam
Person Type: Volunteer
Team: Photography Team
Skills: Photography, Lightroom Editing
```

## Relationship to Requests

Requests should usually include a requesting Department.

This helps Communications understand:

- Who owns the ministry need.
- Who should clarify details.
- Who may need to approve.
- Which department budget or capacity report should include the work.
- Which department dashboard should show status.

## Relationship to Projects

Projects should include a primary Department.

A Project may also involve multiple Departments if needed.

Examples:

- Primary Department: Children’s Ministry.
- Supporting Department: Worship.
- Communications Department: production owner.

MVP can start with one primary Department plus notes/tags for supporting departments.

Future versions may support many-to-many department relationships.

## Relationship to Deliverables

Deliverables inherit Department context from their Project by default.

A Deliverable may override or add department context later if needed, but MVP should avoid overcomplicating this.

## Relationship to Budget and Capacity

Departments are important for planning and reporting.

Department-level views may eventually show:

- Projects requested.
- Projects completed.
- Estimated budget.
- Actual budget.
- Estimated internal hours.
- Vendor/outsource usage.
- Requests by status.
- Upcoming work.
- General Communications capacity guidance.

This should support planning and stewardship, not surveillance.

## Department Head Dashboard

Future department-facing dashboards may show:

- My active requests.
- My active projects.
- Upcoming deadlines.
- Deliverables waiting on my review.
- Deliverables waiting on my department.
- General capacity forecast.
- Suggested better scheduling windows.

Capacity guidance should be general and respectful.

Example:

> The next two weeks are heavily committed. If your timing is flexible, weeks 5-6 may give the team a better window to do this well.

The dashboard should not expose sensitive internal staff details or unrelated project information.

## Permissions and Visibility

Department-level permissions may eventually support:

- Department leaders viewing requests/projects for their Department.
- Department reviewers approving assigned deliverables.
- Department members seeing scoped project status.
- Communications Manager seeing all departments.
- Organization Admin managing departments.

MVP should keep this light:

- Communications Manager can see all.
- Organization Admin can manage all.
- Department Leaders can see their own requests/projects where permitted.
- Reviewers see assigned reviews.
- Contributors see assigned deliverables/tasks.

## MVP Recommendation

For MVP, include:

- Departments as lightweight first-class objects.
- Department name, description, lead, status.
- User/profile department affiliation.
- Request primary department.
- Project primary department.
- Department filtering for dashboards/lists.
- Department reporting foundation.

Keep Teams light:

- Document Team concept.
- Add team_id on profiles if easy.
- Defer full Team management UI unless needed.

## Deferred

Defer:

- Complex department hierarchy.
- Many-to-many department ownership.
- Full Team management module.
- Team capacity dashboards.
- Department budget enforcement.
- Department chargebacks.
- Complex department-level permissions.

## Future Expansion

Future versions may add:

- Team management.
- Department/team capacity forecasting.
- Department-level annual planning reports.
- Multi-department projects.
- Department budget planning.
- Department usage analytics.
- Team assignment recommendations.
- Team-based notification routing.

## Related Docs

- `docs/product/USER_MODEL_AND_PROFILES.md`
- `docs/product/BUDGET_AND_CAPACITY.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/COMMUNICATIONS_TRIAGE_WORKSPACE.md`
- `docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`
- `docs/technical/AUTH_AND_PERMISSIONS.md`
- `docs/technical/DATABASE.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-29

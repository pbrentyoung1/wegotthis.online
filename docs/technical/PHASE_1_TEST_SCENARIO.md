# Phase 1 Test Scenario

## Purpose

Define a realistic church scenario to verify that the Phase 1 foundation tables work together before Phase 2 tables are built.

This scenario should test:

- organization creation
- department creation
- login-backed profiles
- contact-only profiles
- vendor contacts
- external reviewers
- role assignments
- profiles as the organization-context identity record
- Department Leader as a role, not a `person_type`
- future ownership/stakeholder/Admin/capacity readiness

## Scenario Church

Name:
Grace Community Church

Slug:
`grace-community-church`

Timezone:
`America/Chicago`

Status:
Active

## Departments

Create these departments:

1. Communications
   - slug: `communications`
   - purpose: communications planning, campaigns, content, approvals, and production coordination
2. Kids Ministry
   - slug: `kids-ministry`
   - purpose: children's ministry events and parent communication
3. Worship
   - slug: `worship`
   - purpose: service planning and worship communication needs
4. Production
   - slug: `production`
   - purpose: audio, video, livestream, and technical support
5. Administration
   - slug: `administration`
   - purpose: operational and scheduling support

## Profiles

Define these profiles:

All login-backed scenario profiles are email-verified demo accounts with the local-only password `password`.

When this opt-in scenario runs, the foundation `demo@user.com` Organization Admin profile is moved into Grace Community Church so the default demo login can see and administer the complete scenario.

### Jordan Lee

- display_name: Jordan Lee
- user/login: yes
- email: `jordan@example.test`
- person_type: Staff
- title: Communications Manager
- department: Communications
- role assignment: Communications Manager
- future use:
  - Campaign owner
  - Project owner
  - Communications triage
  - Review coordinator

### Rachel Kim

- display_name: Rachel Kim
- user/login: yes
- email: `rachel@example.test`
- person_type: Staff
- title: Kids Pastor
- department: Kids Ministry
- role assignment: Department Leader
- future use:
  - requester
  - stakeholder
  - reviewer/approver for Kids Ministry work

Important:
Rachel is a Department Leader by role assignment, not by `person_type`.

### Marcus Bell

- display_name: Marcus Bell
- user/login: yes
- email: `marcus@example.test`
- person_type: Staff
- title: Production Lead
- department: Production
- role assignment: Contributor
- future use:
  - Production Project owner
  - task assignee
  - production contributor

### Elena Torres

- display_name: Elena Torres
- user/login: yes
- email: `elena@example.test`
- person_type: Staff
- title: Communications Admin
- department: Administration
- role assignment: Contributor
- future use:
  - delegated Admin participant
  - calendar/Kanban visibility support
  - updates on behalf of Communications Manager or Director

### Chris Morgan

- display_name: Chris Morgan
- user/login: no
- email/contact: `chris@example.test`
- person_type: Vendor Contact
- title: Print Vendor Contact
- department: none
- role assignment: none
- future use:
  - vendor contact for banners, signage, and print projects

### Avery Brooks

- display_name: Avery Brooks
- user/login: no
- email/contact: `avery@example.test`
- person_type: External Reviewer
- title: Parent Volunteer Reviewer
- department: Kids Ministry
- role assignment: none
- future use:
  - external reviewer/contact without login
  - future stakeholder/reviewer flow

## Role Expectations

System roles should already exist:

- Organization Admin
- Communications Manager
- Department Leader
- Contributor
- Viewer

Expected assignments in this scenario:

| Profile | Role |
|---|---|
| Jordan Lee | Communications Manager |
| Rachel Kim | Department Leader |
| Marcus Bell | Contributor |
| Elena Torres | Contributor |
| Chris Morgan | none |
| Avery Brooks | none |

## Relationship Expectations

The scenario should verify:

1. Grace Community Church can have multiple departments.
2. Departments belong to Grace Community Church.
3. Staff profiles can be connected to login users.
4. Vendor Contact and External Reviewer profiles can exist without login users.
5. Multiple contact-only profiles with `user_id` null are allowed.
6. Rachel Kim can be a Department Leader through role assignment while `person_type` remains Staff.
7. Chris Morgan can exist as a vendor contact without system access.
8. Avery Brooks can exist as an external reviewer/contact without system access.
9. Jordan Lee is ready to act as a future Communications Manager/owner/triage profile.
10. Elena Torres is ready to act as a future delegated Admin profile.

## Manual Test Questions

After this scenario is seeded in a future step, verify:

- Can we query all profiles for Grace Community Church?
- Can we query all profiles in Communications?
- Can we query all profiles with login users?
- Can we query all contact-only profiles?
- Can we query all Department Leaders by role assignment?
- Can we query all Contributors by role assignment?
- Can we identify vendor contacts without login?
- Can we identify external reviewers without login?
- Can we assign a department lead using a profile?
- Can we remove a department lead profile and preserve department record by setting `lead_profile_id` to null?
- Can we prevent duplicate active role assignments?
- Can we preserve profile records if a login user is deleted?

## Future VBS Test Hook

This Phase 1 scenario should later support a VBS Phase 2 scenario:

Campaign:
VBS

Campaign Owner:
Jordan Lee

Campaign Admin:
Elena Torres

Stakeholders:
Rachel Kim
Avery Brooks if needed

Projects:

- Production Project, owner: Marcus Bell
- Promotion Project, owner: Jordan Lee
- Recruitment Project, owner: Rachel Kim or another future profile
- Administration Project, owner: Elena Torres

This is not built in Phase 1. It is included only to show why the Phase 1 identity foundation matters.

## Not Included Yet

Do not create or test these yet:

- requests
- request_answers
- campaigns
- projects
- deliverables
- tasks
- work_participants
- conversations
- messages
- assets
- asset_links
- reviews
- calendar items
- Kanban views
- Admin delegation records
- stakeholder visibility rules
- capacity calculations

## Acceptance Criteria

This scenario is ready for future seeding when:

- it uses only Phase 1 tables
- every login-backed person maps to a user and profile
- contact-only people use profiles with `user_id` null
- Department Leader is represented as a role assignment
- future ownership/stakeholder/Admin/capacity examples are documented but not implemented
- no Phase 2 tables are required

# User Model and Profiles

## Purpose

Define the canonical user, profile, contact, membership, role, skill, capacity, volunteer, vendor, and external reviewer model for ForWorship Creative.

The User model must support communications production, assignment, approval, vendor coordination, volunteer coordination, skill matching, capacity planning, and project memory.

## Core Principle

A person record should answer:

> Who is this person, how do we contact them, what are they allowed to do, what work can they do, when are they available, and how are they connected to our organization?

Roles define what a person may do.

Skills define what a person can do.

Capacity defines whether they have room to do it.

Assignments define what they are responsible for now.

Contact information defines how the team can coordinate with them.

A person’s time may be paid, contracted, or donated. Volunteer and lay leader time is still real capacity and should be planned respectfully.

## User vs Person / Contact

Not every person involved in the work should be treated the same way.

The system may need to represent:

- Internal staff.
- Volunteers.
- Lay leaders.
- Contractors.
- Outside vendors.
- Freelancers.
- External reviewers.
- Department leaders.
- Ministry stakeholders.
- View-only users.

Some people will log in as full users.

Some people may only exist as contacts.

Some people may receive scoped external review links.

Some people may be vendors who perform work but do not need full workspace access.

Some people may be volunteers or lay leaders donating their time and should receive appropriate boundaries, limited access, and clear assignment expectations.

## Person Type

Recommended person/contact types:

| Type | Meaning |
|---|---|
| Staff | Internal staff member. |
| Volunteer | Volunteer contributor or reviewer donating time. |
| Lay Leader | Non-staff ministry leader or trusted volunteer with leadership responsibility. |
| Contractor | Individual contractor or freelancer. |
| Vendor Contact | Person associated with an outside vendor/company. |
| Department Leader | Ministry or department stakeholder/requester. |
| External Reviewer | Scoped reviewer using magic link or limited access. |
| General Contact | Useful contact that does not fit another category. |

A person may have more than one relationship over time.

Example:

- A lay leader may submit requests, review deliverables, and volunteer as a photographer.
- A volunteer may have design skills and help create social graphics.
- A contracted sound engineer may be a Contractor and also a Vendor Contact.
- A graphic artist may be a Contractor with design skills and limited project access.
- A print shop representative may be a Vendor Contact but not a login user.

## Volunteer and Lay Leader Considerations

Volunteers and lay leaders should be first-class participants where appropriate, but the system should not treat donated time as unlimited or automatically available.

Volunteer/lay leader records may need:

- Contact information.
- Ministry affiliation.
- Skills.
- Preferred work types.
- Availability notes.
- Weekly/monthly capacity estimate, optional.
- Serving boundaries.
- Background check or ministry clearance status, optional/future.
- Access limitations.
- Supervisor or ministry contact.
- Notes about preferred communication method.

Examples:

```text
Volunteer: Sam Taylor
Skills:
- Photography
- Lightroom editing

Availability:
- Sunday afternoons
- One evening per week

Serving boundaries:
- Can photograph events
- Does not edit video
```

```text
Lay Leader: Maria Gonzalez
Roles:
- Department Leader
- Reviewer

Can:
- Submit requests
- Review ministry accuracy
- Approve assigned deliverables

Should not:
- Access internal Communications notes
- Manage user skills
- See unrelated projects
```

## Core User Identity

The User is the login identity.

Recommended fields:

```text
users
- id
- name
- email
- password / auth provider fields
- avatar
- timezone
- locale
- status
- last_login_at
```

Recommended statuses:

- Active.
- Invited.
- Suspended.
- Archived.

## Profile and Contact Information

Profiles should include enough contact information to support internal collaboration, volunteer coordination, vendor coordination, and project communication.

Recommended profile/contact fields:

```text
profiles / contacts
- id
- user_id, nullable
- organization_id
- first_name
- last_name
- display_name
- preferred_name
- title / job_title
- company / vendor_name
- department_id, nullable
- team_id, nullable
- ministry_affiliation, nullable
- person_type
- primary_email
- secondary_email
- phone_mobile
- phone_work
- preferred_contact_method
- mailing_address
- city
- state / region
- postal_code
- country
- website_url
- portfolio_url
- notes
- status
```

Preferred contact method options may include:

- Email.
- Phone.
- Text.
- In-app.
- Vendor portal.
- Other.

MVP can keep many of these optional.

## Organization Membership

Because the platform may support multiple churches/organizations, organization-specific identity should live in a membership record.

Recommended fields:

```text
organization_memberships
- id
- organization_id
- user_id
- profile_id / contact_id
- display_name
- job_title
- department_id
- team_id
- membership_type
- primary_role
- status
- joined_at
```

Membership types may include:

- Staff.
- Volunteer.
- Lay Leader.
- Contractor.
- Vendor.
- Stakeholder.
- External Reviewer.

## Vendors and Contractors

Outside vendors and contractors need richer contact and relationship information.

Examples:

- Contracted sound engineer.
- Freelance graphic artist.
- Video editor.
- Print shop contact.
- Signage installer.
- Photographer.
- Audio mixing contractor.
- Web contractor.

Recommended vendor/contact fields:

```text
vendor_contacts
- id
- organization_id
- profile_id / contact_id
- vendor_company_id, nullable
- contact_name
- role/title
- primary_email
- phone
- preferred_contact_method
- services_provided
- skills
- rates_notes
- availability_notes
- contract_status
- insurance / compliance notes, optional/future
- payment_terms_notes
- tax/vendor paperwork status, optional/future
- notes
- status
```

Vendor company fields may include:

```text
vendor_companies
- id
- organization_id
- name
- primary_contact_id
- website_url
- phone
- email
- address
- services_provided
- notes
- status
```

MVP does not need to become vendor management software, but it should not lose the distinction between an internal user, volunteer, contractor, and outside vendor.

## Roles and Permissions

Roles define what a person may do.

Skills define what a person can do.

Recommended MVP roles:

| Role | Purpose |
|---|---|
| Organization Admin | Manages organization settings, users, roles, permissions. |
| Communications Manager | Owns communications workflow, triage, scheduling, skills, approvals, capacity. |
| Project Owner | Owns assigned projects and deliverables. |
| Contributor | Completes assigned deliverables/tasks. |
| Volunteer Contributor | Volunteer or lay leader who completes assigned work with scoped access. |
| Requester / Department Leader | Submits requests and participates in clarification/review. |
| Reviewer | Reviews/approves assigned deliverables. |
| Viewer | Can view scoped work/status. |
| External Reviewer | Scoped review access through magic link, not full account access. |
| Vendor / Contractor | Scoped production or review access for outside contributors. |

## Skills

Skills should be assigned to people by an authorized role.

Recommended permission:

> Manage User Skills

Default MVP roles that may manage skills:

- Organization Admin.
- Communications Manager.

Skill details are documented in `docs/product/SKILLS_AND_RESOURCES.md`.

## Capacity and Availability

User profiles should support lightweight capacity and availability information.

Recommended fields:

```text
user_capacity_profiles
- user_id or profile_id
- organization_id
- weekly_capacity_hours
- capacity_notes
- active
```

Unavailable windows may include:

```text
user_unavailable_windows
- user_id or profile_id
- organization_id
- start_at
- end_at
- reason
- visibility
```

Visibility matters. Department leaders should see capacity guidance, not private details.

Example requester-facing message:

> Design capacity is limited next week.

Not:

> Jordan is out for a medical appointment.

## Volunteer Capacity

Volunteer capacity should be treated with extra care.

Volunteer availability is often limited, informal, and subject to personal life, work, family, and ministry commitments.

The system should support light planning without pressuring volunteers as if they are staff.

Recommended fields or notes:

- Typical availability.
- Maximum weekly/monthly hours, optional.
- Preferred serving windows.
- Skills.
- Serving boundaries.
- Preferred contact method.
- Supervisor/ministry contact.

Requester-facing and manager-facing language should recognize that volunteer time is donated and should be stewarded carefully.

## Vendor Availability

Vendor and contractor availability can begin as notes in MVP.

Future versions may add:

- Contractor capacity.
- Vendor availability windows.
- Resource calendars.
- Studio or equipment booking.
- Vendor rate cards.
- Vendor capacity forecasting.

## Assignment Fit

Assignment fit should eventually consider:

- Role/permission.
- Skills.
- Capacity.
- Availability.
- Volunteer boundaries.
- Resource access.
- Vendor or contractor status.
- Current workload.

MVP should use this to guide assignment, not automate it.

Example:

```text
People who match this deliverable:
- Ashley: social graphics, copywriting, 8 hrs available
- Jordan: design, video editing, 2 hrs available
- Morgan: audio editing, unavailable this week
- Sam: volunteer photographer, available Sunday afternoon
- BrightLine Audio: contractor, podcast mixing, availability unknown
```

## External Reviewers

External Reviewers should usually not be full workspace users.

They should receive scoped, time-bound, revocable access through magic links.

External Reviewer data should include:

```text
external_reviewers
- id
- organization_id
- name
- email
- company/vendor
- phone, optional
- notes
```

Review links should include:

```text
review_links
- id
- deliverable_id
- external_reviewer_id
- token
- expires_at
- revoked_at
- scope
```

## Notification Preferences

Users should eventually have notification preferences.

MVP may use defaults.

Future profile fields may include:

- Email notifications enabled.
- In-app notifications enabled.
- Digest frequency.
- Assignment notifications.
- Mention notifications.
- Review request notifications.
- Change request notifications.
- Due-soon notifications.

## Privacy and Visibility

The system should avoid exposing sensitive contact, capacity, or availability details unnecessarily.

Examples:

- Department leaders may see general capacity guidance but not private out-of-office reasons.
- Vendors may see only scoped deliverables or review links.
- Volunteers may see only assigned work and appropriate context.
- Lay leaders may see ministry-related work but not unrelated internal Communications notes.
- External reviewers may see only the work they are asked to review.
- Internal notes should remain internal.

## MVP Recommendation

For MVP schema planning, include:

- Users.
- Profiles or contacts.
- Organization memberships.
- Person/contact type.
- Staff, Volunteer, Lay Leader, Contractor, Vendor Contact, Department Leader, External Reviewer types.
- Roles and permissions.
- Volunteer contributor support.
- Vendor/contractor contact support.
- Primary and secondary email.
- Phone numbers.
- Company/vendor name.
- Ministry affiliation.
- Preferred contact method.
- Notes.
- Skills.
- User/profile skills.
- Manage User Skills permission.
- Basic weekly capacity.
- Capacity notes.
- Volunteer availability/boundary notes.
- Optional unavailable windows.
- External reviewer records.
- Scoped review links.

Keep the MVP UI light:

- Basic profile/contact page.
- Skills multi-select managed by Organization Admin or Communications Manager.
- Person/contact type selector.
- Volunteer/lay leader flag or contact type.
- Vendor/contractor flag or contact type.
- Capacity notes.
- Availability notes.
- Manual assignment by Communications Manager.

## Deferred

Defer:

- Full CRM.
- Full volunteer management system.
- Full vendor management system.
- Tax/payment workflow.
- Contract management.
- Background check/ministry clearance workflow.
- Skill proficiency scoring.
- Vendor rate cards.
- Automated assignment optimization.
- Full availability calendar.
- Equipment booking.
- Advanced notification preference UI.
- HR-style profile management.

## Future Expansion

Future versions may add:

- Rich volunteer profiles.
- Serving preferences.
- Ministry clearance/background check tracking.
- Rich vendor profiles.
- Vendor company records.
- Rate cards.
- Contractor onboarding checklist.
- Contract expiration tracking.
- Insurance/compliance notes.
- Vendor capacity.
- Resource calendars.
- Skill proficiency levels.
- Availability calendars.
- Department-facing capacity forecast by skill area.
- Assignment recommendations.

## Related Docs

- `docs/product/SKILLS_AND_RESOURCES.md`
- `docs/product/BUDGET_AND_CAPACITY.md`
- `docs/product/APPROVALS_AND_REVIEW_WORKFLOW.md`
- `docs/product/DEPENDENCIES_AND_READINESS.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/technical/AUTH_AND_PERMISSIONS.md`
- `docs/technical/DATABASE.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-29

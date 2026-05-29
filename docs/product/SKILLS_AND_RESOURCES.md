# Skills and Resources

## Purpose

Define how ForWorship Creative should model user skills, assignment fit, resource needs, and availability for communications and production work.

This document supports the Deliverable Type, Budget and Capacity, and Project Scheduling models.

## Core Principle

Deliverable Types should help determine not only what work is needed, but who is qualified and available to do it, and what resources are required to complete it well.

The system should help Communications answer:

> Who can do this work, who is available, and what equipment, spaces, tools, or access are needed?

## Why This Matters

Different deliverables require different skills.

Examples:

- Audio editing.
- Podcast mixing.
- Video editing.
- Color correction.
- Motion graphics.
- Social graphic design.
- Print layout.
- Copywriting.
- Proofreading.
- Website updates.
- Camera operation.
- Lighting setup.
- Vendor coordination.

A person may be available but not have the right skill.

A person may have the right skill but not have capacity.

A team may have the person but not the required resource, such as a studio, camera, microphone, editing software, vendor, or platform access.

## Skill Model

Users may have one or more skills.

Skills should be assignable by an authorized admin role.

### Skill Examples

| Skill Area | Example Skills |
|---|---|
| Audio | Audio editing, podcast mixing, noise reduction, mastering. |
| Video | Video editing, color correction, motion graphics, captions, exporting. |
| Design | Social graphics, print layout, signage, slide design, brand systems. |
| Writing | Copywriting, proofreading, sermon notes, email copy, captions. |
| Web | Landing pages, page updates, SEO, forms, CMS publishing. |
| Production | Camera operation, lighting, studio setup, livestream, directing. |
| Admin / Coordination | Scheduling, vendor coordination, file archiving, stakeholder follow-up. |
| Social | Platform scheduling, community management, ad setup, hashtag strategy. |
| Print / Vendor | Print specs, vendor handoff, proof review, pickup/install coordination. |

## Skill Assignment

An authorized admin role should be able to assign skills to users.

Future Codex/schema work should add support for:

- User skill profiles.
- Skill categories.
- Skill proficiency or confidence level, optional/future.
- Skill active/inactive status.
- Skill assignment by an authorized admin role.
- Skill assignment audit history, if practical.

## Admin Role for Skill Assignment

The system should include or support an admin-level permission for assigning skills to people.

Possible role/permission language:

- Skills Admin.
- Organization Admin.
- Communications Manager.
- Manage User Skills permission.

Recommended MVP permission decision:

> Organization Admin and Communications Manager may assign, edit, or remove user skills.

Future versions may support more granular permissions.

## User Profile Needs

User profiles should eventually include:

- Skills.
- Role/team.
- Weekly capacity, optional.
- Availability notes.
- Out-of-office/unavailable windows, optional/manual.
- Assignable work types.
- Preferred work types, optional.
- Resource/tool access, optional.

MVP can keep this lightweight.

## Deliverable Type Relationship

Deliverable Types may define required skills, preferred skills, and required resources.

Example:

```text
Deliverable Type: Podcast Audio

Required Skills:
- Audio editing
- Podcast mixing

Preferred Skills:
- Noise reduction
- Uploading to podcast host

Required Resources:
- Audio editing software
- Podcast source files
- Podcast host access
```

Example:

```text
Deliverable Type: Video

Required Skills:
- Video editing

May Require:
- Camera operation
- Lighting
- Audio capture
- Color correction
- Motion graphics
- Captions

Required Resources:
- Camera
- Microphones
- Lighting kit
- Editing software
- Studio or filming location
```

## Assignment Helper

MVP should not attempt full automated scheduling or skill-based optimization.

However, the system should eventually help Communications see assignment fit.

Example:

```text
People who match this deliverable:
- Ashley: social graphics, copywriting, 8 hrs available
- Jordan: design, video editing, 2 hrs available
- Morgan: audio editing, unavailable this week
```

This should guide assignment, not automatically assign work.

## Resource Model

Deliverable Types may require resources.

Resources may include:

- Studio.
- Filming location.
- Microphones.
- Cameras.
- Lighting kit.
- Editing station/software.
- Printer or vendor.
- Social platform access.
- Podcast host access.
- Website CMS access.
- ProPresenter access.
- Canva/Figma/Adobe access.
- Vehicle or pickup support for print/signage.

## Resource Availability

For MVP, resource needs can be captured lightly as notes or tags.

Future versions may add:

- Resource calendars.
- Equipment booking.
- Studio scheduling.
- Location holds.
- Conflict checking.
- Vendor availability.
- Resource maintenance notes.

## Assignment Inputs

There are three core inputs for assignment decisions:

```text
Skill fit
Availability / capacity
Resource availability
```

A scheduling or assignment issue may come from any of these.

Examples:

- The designer has the skill but not the time.
- The editor is available, but the studio is booked.
- The budget is approved, but the vendor turnaround is too long.
- The camera operator is available, but the required camera is unavailable.

## Blockers

Skill and resource issues should feed the blocker and readiness model.

Examples:

- Blocked: Over Capacity.
- Blocked: Missing Resource.
- Blocked: Scheduling.
- Blocked: Waiting on Vendor.
- Blocked: Skill Gap.

If a required skill is not available internally, the system may suggest vendor or outsourced support.

## Relationship to Capacity

Skills and resources are part of capacity.

Capacity is not just available hours.

Capacity includes:

- People.
- Skills.
- Equipment.
- Spaces.
- Vendor availability.
- Platform access.
- Time windows.
- Existing commitments.

See `docs/product/BUDGET_AND_CAPACITY.md` for the broader budget and capacity model.

## MVP Recommendation

For MVP, include documentation and future-proof schema planning for:

- User skills.
- Skill categories.
- Skill assignment by Organization Admin or Communications Manager.
- Deliverable Type required/preferred skills.
- Deliverable Type required resources.
- Resource needs as light notes or tags.
- Assignment guidance, not automatic assignment.

If implementation scope is tight, MVP may start with:

- Skills documented in user profile notes or simple multi-select.
- Required skills documented on Deliverable Types.
- Resource needs captured as text/tags.
- Manual assignment decisions by Communications Manager.

## Deferred

Defer:

- Full skill proficiency scoring.
- Automated assignment optimization.
- Full equipment booking.
- Studio/location calendars.
- Resource conflict engine.
- Vendor capacity tracking.
- Detailed labor forecasting by skill.
- Timesheet-style skill utilization reporting.

## Future Expansion

Future versions may add:

- Skill proficiency levels.
- Skill endorsements or verification.
- Skill expiration/training dates.
- User availability calendars.
- Resource calendars.
- Equipment reservations.
- Studio/location booking.
- Vendor skill/resource pools.
- Capacity forecasting by skill.
- Assignment recommendations.
- Department-facing capacity forecast by skill area.

## Related Docs

- `docs/product/BUDGET_AND_CAPACITY.md`
- `docs/product/TURNAROUND_TIME_AND_CAPACITY.md`
- `docs/product/DEPENDENCIES_AND_READINESS.md`
- `docs/product/DELIVERABLES.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/PROJECT_TASK_MODULE.md`
- `docs/technical/AUTH_AND_PERMISSIONS.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-29

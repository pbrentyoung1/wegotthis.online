# INSPINIA Guidance

## Purpose

Document how ForWorship Creative uses INSPINIA as a structural foundation and pattern library without inheriting its default brand personality.

## Core Decision

**INSPINIA is infrastructure, not branding.**

Borrow the structure. Translate the soul.

## Primary References

- Primary application base: `resources/Laravel/starterkit`
- Reference implementation: `resources/Laravel/inspinia`
- Design reference: INSPINIA Figma assets

The Laravel starterkit is the product foundation.

The full Laravel INSPINIA implementation is a pattern and component reference library.

Before building custom UI, review both the starterkit and the full INSPINIA implementation.

Use the INSPINIA Figma assets as a screen layout and UX pattern reference when designing ForWorship Creative screens.

## Approved Web UI References

Use these INSPINIA Bootstrap pages as approved structural references for MVP screens and interaction patterns:

| INSPINIA Page | Reference URL | Use For |
|---|---|---|
| Chat App | `https://webapplayers.com/inspinia/bootstrap/apps-chat.html` | Direct messages, work-context conversations, project/deliverable discussion layout, message list/detail structure. |
| Project Details | `https://webapplayers.com/inspinia/bootstrap/apps-projects-details.html` | Project detail page, project summary, team/activity/sidebar patterns, related deliverables/assets/messages. |
| Projects Kanban | `https://webapplayers.com/inspinia/bootstrap/apps-projects-kanban.html` | Project/deliverable board views, lifecycle columns, status overview, light work planning. |
| Projects Team Board | `https://webapplayers.com/inspinia/bootstrap/apps-projects-team-board.html` | Team workload, contributor cards, assignment visibility, people/capacity-friendly views. |
| Dashboard / Widgets | Existing INSPINIA dashboard and widget patterns | Status summaries, work queues, review queues, due-soon items, capacity snapshots, and lightweight reporting. |
| Calendar / FullCalendar | Existing INSPINIA calendar implementation | Scheduling views and calendar-compatible data. Use the free FullCalendar version through the INSPINIA calendar implementation unless a future architecture decision changes this. |
| Topbar Activity Bell | Existing INSPINIA topbar notification pattern | Persistent notifications, recent activity, review/change request alerts, due-soon notices. |
| Alerts / SweetAlert Pattern | SweetAlert/SweetAlert2-style modal feedback | Immediate success, warning, confirmation, and destructive-action prompts. |

These references should guide structure, spacing, layout, and interaction flow, but ForWorship Creative should still apply its own brand language, typography, tone, and calm visual system.

## MVP UI Discipline

Use existing INSPINIA assets as much as possible for MVP.

MVP screens should favor proven INSPINIA structures over custom UI/UX work:

- dashboard cards and widgets for status summaries
- project detail pages for project workspaces
- kanban and team boards for light status and assignment views
- chat, conversation, messaging, and activity layouts for contextual communication
- topbar activity notifications for persistent alerts
- SweetAlert-style prompts for immediate confirmations and warnings
- FullCalendar-compatible structures for scheduling views
- tables, cards, tabs, forms, modals, drawers, and file lists for routine operational surfaces

Avoid over-customizing MVP UI. The first implementation should validate workflow and structure before investing in custom visual systems, custom planning canvases, or bespoke interaction models.

## Notification UI Layers

ForWorship Creative should use three separate notification layers:

1. SweetAlert-style modals for immediate feedback, warnings, confirmations, and destructive-action prompts.
2. The INSPINIA topbar activity bell for persistent alerts and recent activity requiring attention.
3. Dashboard/inbox views for deeper task, review, message, and project follow-up.

Sweet Alerts should not replace the activity bell.

The activity bell should not replace the dashboard.

The dashboard should not become a chat app.

## How We Use INSPINIA

We use INSPINIA for:

- layout structure
- responsive systems
- utility patterns
- dashboard architecture
- existing interaction models
- foundational component behavior
- proven admin and product UI patterns

We do not use INSPINIA for:

- final brand personality
- default visual styling without adaptation
- default color system
- default typography
- generic admin or dashboard tone
- unnecessary widget density

## Base vs Reference Implementation

- `resources/Laravel/starterkit` is the implementation base.
- `resources/Laravel/inspinia` is the deeper reference implementation for patterns, flows, and component behavior.
- The starterkit should usually answer how the app is structured.
- The full INSPINIA implementation should usually answer how a common admin or product pattern behaves.
- Prefer adapting an existing INSPINIA pattern over reinventing standard dashboard, calendar, messaging, alert, table, card, modal, dropdown, notification, or profile patterns.

## Approved INSPINIA Patterns to Adapt

- dashboards
- messaging interfaces
- chat/direct message interfaces
- project detail layouts
- kanban boards
- team board layouts
- topbar activity bell / notification dropdowns
- SweetAlert-style modal alerts
- alert boxes
- calendars
- notification patterns
- tables
- cards
- widgets
- profile and account pages
- activity feeds
- modals
- dropdowns
- timeline elements
- search patterns
- file management UI
- charts when truly needed
- forms and settings pages
- project brief and deliverable brief screens built from existing forms, cards, tabs, tables, and activity feeds

## Do-Not-Reinvent Guidance

Avoid rebuilding from scratch:

- calendar engines
- modal systems
- SweetAlert-style confirmation flows
- dropdown infrastructure
- responsive grid systems
- scrollbar systems
- notification frameworks
- topbar activity bell behavior
- chart foundations
- basic form controls
- dashboard card systems
- messaging layouts
- chat layouts
- alert patterns
- custom workflow canvases
- custom strategy boards
- custom drag-and-drop planning interfaces
- kanban board structure
- project detail page structure
- team board layout structure

Only build custom when the existing pattern cannot reasonably support the product need.

## Component Development Priority

1. Reuse an existing starterkit component.
2. Adapt a full INSPINIA Laravel pattern.
3. Adapt an INSPINIA Figma pattern.
4. Extend an existing ForWorship Creative component.
5. Build custom only when necessary.

## Figma Workflow

1. Start from an existing INSPINIA structural pattern whenever practical.
2. Strip back unnecessary widgets, visual noise, dense dashboards, excessive charts, aggressive color, hard borders, and generic admin copy.
3. Apply the ForWorship Creative visual language:
   - IBM Plex Serif
   - IBM Plex Sans
   - Caveat used very sparingly
   - warm, restrained color palette
   - soft geometry
   - generous spacing
   - calm hierarchy
   - subtle shadows
4. Add ForWorship Creative conversational UX:
   - ask helpful questions
   - use calm guidance
   - reduce emotional weight
   - make users feel supported rather than managed
5. Preserve structural consistency so the design can scale into reusable components.

## Emotional Translation Rule

**Borrow the structure. Translate the soul.**

When adapting INSPINIA:

- reduce visual noise
- simplify dashboards
- reduce unnecessary widgets
- soften hierarchy
- replace admin language with conversational language
- avoid panic-heavy alert styling
- convert rigid workflows into guided experiences
- favor clarity and calm over density
- preserve proven responsive and component behavior
- express strategic context through existing dashboards, cards, tables, tabs, activity feeds, messaging assets, notifications, and file lists before inventing new planning surfaces
- adapt INSPINIA structure carefully while applying ForWorship Creative product voice and brand

## Technical Guardrails

Do not:

- introduce new JavaScript frameworks without an architecture decision
- bypass existing Bootstrap, Bootstrap Vue Next, Inspinia SCSS, or token systems
- add Tailwind unless a future documented decision changes the stack
- create duplicate layout systems
- create duplicate modal, notification, calendar, dropdown, or chart systems
- hardcode colors outside design tokens
- add new chart libraries unnecessarily
- create isolated styling conventions
- ignore existing INSPINIA structure when solving common UI needs
- build bespoke strategic planning interfaces when an existing INSPINIA structure can carry the workflow

## Pattern Decision Logging

As Figma screens and product components are created, document pattern decisions:

- what the pattern is
- where it came from in INSPINIA
- how it was adapted for ForWorship Creative
- what emotional role it plays
- when to use it
- when not to use it
- any implementation notes

The goal is to turn Figma work into scalable product language rather than isolated mockups.

## Contributor Instruction

Before creating or heavily modifying UI, read `docs/INSPINIA.md` and check the INSPINIA starterkit, full Laravel implementation, web UI references, and Figma assets for existing patterns that can be adapted.

## Related Documents

- `README.md`
- `CLAUDE.md`
- `docs/ai/AGENTS.md`
- `docs/ai/CODEX_RULES.md`
- `docs/ai/CLAUDE_CODE_RULES.md`
- `docs/branding/VISUAL_SYSTEM.md`
- `docs/resources/INSPINIA_NOTES.md`
- `docs/resources/FIGMA_NOTES.md`
- `docs/product/CONVERSATIONS_MESSAGES_ACTIVITY.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/DELIVERABLE_LIFECYCLE.md`

Last Updated: 2026-05-29

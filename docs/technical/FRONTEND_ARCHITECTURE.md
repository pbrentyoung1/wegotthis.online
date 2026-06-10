# Frontend Architecture

## Purpose

Define the approved MVP frontend approach for ForWorship Creative.

## Decision

Use:

- Laravel Blade for layouts, reusable view components, and server-rendered pages
- Livewire 4 for reactive product workflows
- Tailwind CSS 4 for styling
- Preline for existing interactive UI primitives
- the checked-in Inspinia Blade implementation as the structural UI foundation and pattern library
- Alpine only for small client-only interactions where Livewire is unnecessary
- existing focused JavaScript libraries for specialized interfaces such as calendars, charts, editors, and sortable boards

Do not use Vue, Inertia, Bootstrap, Flux UI, React, Svelte, or a separate SPA frontend for MVP.

Do not re-scaffold the Laravel application with an official starter kit. Add the approved packages and capabilities to the existing application base in reviewed implementation slices.

## Why

The checked-in application already contains:

- reusable Blade layouts and partials
- a large Inspinia Blade pattern library
- Tailwind CSS 4
- Preline
- working Vite asset bundling
- specialized JavaScript libraries suitable for MVP dashboards and workflows

Blade and Livewire preserve that investment while providing the reactive behavior needed for:

- request submission and triage
- filtered queues and tables
- guided forms
- inline status changes
- modal and drawer workflows
- review and approval actions
- task and deliverable coordination
- dashboard widgets
- scoped comments and activity updates

Moving to Vue and Inertia now would require translating or replacing much of the strongest existing UI foundation before validating the core workflow.

## Rendering And Navigation

- Laravel routes remain the primary navigation boundary.
- Blade renders the application shell and non-reactive content.
- Livewire page and workflow components handle reactive product surfaces.
- Prefer class-based Livewire components with separate Blade views for maintainability.
- Use normal links and server navigation by default.
- Livewire navigation enhancements may be used only after compatibility with Inspinia and Preline behavior is verified.
- The MVP is not an API-first SPA, PWA, or offline-first application.

## State And Business Logic

- Domain rules remain in Laravel services, actions, policies, and models.
- Livewire components coordinate UI state and call domain boundaries.
- Do not place authorization, lifecycle rules, organization scoping, or core workflow decisions only in JavaScript or Livewire component methods.
- Alpine and browser JavaScript may manage ephemeral interface state such as open panels, local tabs, focus, and presentation behavior.
- Server state remains authoritative.

## Styling And Components

- Tailwind CSS 4 is the sole MVP styling framework.
- Preline and the current Inspinia Tailwind implementation provide the base interactive component patterns.
- Do not add Bootstrap.
- Do not add Flux UI because it would create a second component and token system beside Inspinia.
- Adapt existing Inspinia patterns before building custom components.
- Apply ForWorship Creative tokens, typography, spacing, and voice rather than retaining Inspinia's default brand styling.
- Extract repeated Blade and Livewire UI into reusable components as real duplication appears.

## JavaScript Boundaries

- Use Livewire for server-backed reactive workflows.
- Use Alpine for small client-only interactions.
- Use focused existing libraries where they solve specialized problems well.
- Keep third-party JavaScript integrations isolated behind small initialization modules.
- Verify plugin behavior after Livewire renders or replaces DOM sections.
- Do not introduce a general client-side state store for MVP.
- TypeScript is not required for MVP application code.

## Forms And Validation

- Laravel validation is authoritative.
- Livewire forms should provide immediate feedback while using the same server-side validation rules.
- Preserve submitted request answers and lifecycle decisions through domain services rather than direct uncontrolled model writes.
- Multi-step or guided forms should save drafts intentionally and recover gracefully from validation failures.

## Authentication Direction

- Use Laravel Fortify as the authentication backend when authentication implementation begins.
- Build custom Blade and Livewire authentication views using the existing Inspinia structure and ForWorship Creative visual language.
- Public self-registration should remain disabled unless explicitly approved.
- Do not replace the application with a starter kit to gain authentication screens.

## Testing Direction

- Continue PHPUnit feature and unit tests for domain and HTTP behavior.
- Add Livewire component tests for reactive workflow behavior.
- Add browser tests only for critical end-to-end flows after the first usable request intake workflow exists.
- Keep accessibility, keyboard navigation, responsive behavior, and progressive failure states in review criteria.

## Reconsideration Triggers

Reconsider Vue/Inertia or another dedicated client framework only if real product needs demonstrate that Blade and Livewire are inadequate for one or more of:

- extensive offline-first behavior
- a highly stateful client-side editing environment
- complex real-time collaborative canvases
- a native/mobile client requiring a shared frontend architecture
- sustained performance problems that cannot be resolved within the approved stack

The existence of interactive forms, dashboards, kanban boards, comments, notifications, or calendars is not by itself a reason to change frontend frameworks.

## Implementation Sequence

1. Fix the current Vite manifest/full-test failure.
2. Add Livewire 4 to the existing starter kit in a focused foundation change.
3. Establish the authenticated application shell and organization context.
4. Create a small set of ForWorship Creative Blade/Livewire component conventions.
5. Build the end-to-end request submission and triage workflow.
6. Evaluate the stack after the first usable vertical slice before expanding UI scope.

## Sources

- `docs/INSPINIA.md`
- `docs/branding/UI_PRINCIPLES.md`
- `docs/branding/VISUAL_SYSTEM.md`
- `docs/product/CALM_SOFTWARE_PRINCIPLES.md`
- Laravel 13 starter kit documentation
- Livewire 4 documentation

Last Updated: 2026-06-10

# Frontend Architecture

## Purpose

Define the simplest approved MVP frontend approach for ForWorship Creative.

## Decision

Use the checked-in Inspinia Laravel starter kit directly.

The MVP frontend consists of:

- existing Blade layouts, partials, and pages
- existing Tailwind CSS 4 styles and design tokens
- existing Preline interactions
- existing Inspinia JavaScript and specialized libraries
- standard Laravel routes, controllers, form requests, policies, validation, sessions, and redirects

Do not add Livewire, Vue, Inertia, React, Svelte, Bootstrap, Flux UI, a separate SPA frontend, or another general frontend framework for MVP.

Do not re-scaffold or translate the checked-in Inspinia implementation.

## Core Rule

Adapt before building.

For each MVP screen:

1. Find the closest existing Inspinia page or pattern.
2. Copy or adapt its Blade structure.
3. Replace demo content with ForWorship Creative data and language.
4. Apply existing ForWorship Creative visual tokens and calm product voice.
5. Add only the minimum Laravel and JavaScript behavior required for the workflow.

## Why

The primary MVP goal is to validate church communications workflows quickly.

The checked-in application already provides:

- a responsive application shell
- authentication page layouts
- forms and validation presentation
- tables, cards, tabs, dropdowns, modals, and drawers
- dashboards, kanban boards, calendars, file lists, and messaging patterns
- Tailwind CSS 4 and Preline
- existing focused JavaScript libraries

Adding another frontend framework would introduce dependency, integration, rendering, testing, and maintenance work before the current template has been proven insufficient.

## Rendering And Navigation

- Laravel routes are the navigation boundary.
- Controllers load data and return Blade views.
- Form requests validate submitted input.
- Policies and domain services enforce authorization and workflow rules.
- Use normal form submissions, redirects, flash messages, and pagination by default.
- Use query parameters for filters, search, sorting, and queue views.
- Use partial Blade components only when they remove demonstrated duplication.
- The MVP is not an API-first SPA, PWA, or offline-first application.

## JavaScript Boundaries

- Reuse existing Inspinia and Preline behavior first.
- Add small page-specific JavaScript modules only when needed.
- Use existing specialized libraries for calendars, charts, editors, sortable boards, alerts, and similar interfaces.
- Keep server-side state authoritative.
- Do not introduce a general client-side state store.
- Do not introduce a frontend framework to avoid normal Laravel requests or page loads.

## Styling And Components

- Tailwind CSS 4 is the sole MVP styling framework.
- Preline and Inspinia provide the base interactive and structural patterns.
- Do not add Bootstrap or Flux UI.
- Do not build a new component library before real screens demonstrate repeated patterns.
- Apply ForWorship Creative typography, color, spacing, copy, and visual restraint while preserving Inspinia structure.

## Forms And Validation

- Laravel validation is authoritative.
- Use standard form submissions and redirect-back validation behavior.
- Preserve drafts only where the product workflow explicitly requires them.
- Use existing Inspinia form patterns and controls before creating custom inputs.
- Use progressive enhancement only where it materially improves the workflow.

## Authentication Direction

- Use Laravel's existing authentication capabilities and checked-in Inspinia auth page structures.
- Do not add an authentication package or replace the application with a starter kit unless a separate reviewed implementation plan proves it necessary.
- Public self-registration remains disabled unless explicitly approved.

## Testing Direction

- Continue PHPUnit feature and unit tests for domain and HTTP behavior.
- Add HTTP feature tests for routes, controllers, policies, validation, and redirects.
- Add browser tests only for critical end-to-end flows after the first usable request intake workflow exists.

## Dependency Rule

A new frontend or authentication dependency requires:

- a concrete MVP workflow that cannot reasonably be delivered with the existing Inspinia/Laravel stack
- a written explanation of the gap
- documented implementation and maintenance cost
- explicit approval before installation

Convenience alone is not sufficient.

## Reconsideration Triggers

Reconsider a reactive or dedicated client framework only if real usage demonstrates a requirement such as:

- extensive offline-first behavior
- a highly stateful client-side editing environment
- complex real-time collaborative canvases
- sustained usability or performance problems that cannot be resolved with the existing stack

Interactive forms, dashboards, kanban boards, comments, notifications, and calendars do not by themselves justify a new framework because existing Inspinia patterns already cover them.

## Implementation Sequence

1. Fix the current Vite manifest/full-test failure.
2. Establish the authenticated application shell and organization context using existing Laravel and Inspinia patterns.
3. Build request submission with standard Laravel forms and Blade views.
4. Build the Communications request queue and triage screens by adapting existing Inspinia tables, detail pages, forms, and status patterns.
5. Evaluate the existing stack after the first usable request-to-triage vertical slice.

## Sources

- `docs/INSPINIA.md`
- `docs/branding/UI_PRINCIPLES.md`
- `docs/branding/VISUAL_SYSTEM.md`
- `docs/product/CALM_SOFTWARE_PRINCIPLES.md`

Last Updated: 2026-06-10

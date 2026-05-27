# Repository Guidelines

## Project Structure & Module Organization

This repository contains the planning foundation and initial Laravel scaffold for ForWorship Creative, a church communications operations platform. The target app URL is `app.forworship.org`; `wegotthis.online` remains the working codename/current domain until infrastructure transitions. Canonical product, architecture, branding, and workflow decisions live in `docs/`. AI guidance lives in `docs/ai/`, and reusable prompts live in `prompts/`.

The Astro documentation site is in `docs-site/`; routes are in `src/pages`, layouts in `src/components/layout`, maps in `src/components/maps`, and styles in `src/styles/global.css`. The Laravel application base is `resources/Laravel/starterkit/`, with standard Laravel directories such as `app/`, `routes/`, `database/`, `resources/`, and `tests/`. Root folders such as `src/`, `assets/`, `database/`, `deployment/`, and `design/` are placeholders for future work.

## Build, Test, and Development Commands

- `cd docs-site && npm install`: install docs-site dependencies. Requires Node `>=22.12.0`.
- `cd docs-site && npm run dev`: run the Astro docs site locally.
- `cd docs-site && npm run build`: build the static documentation site.
- `cd docs-site && npm run preview`: preview the built site.
- `cd resources/Laravel/starterkit && composer install`: install Laravel dependencies.
- `cd resources/Laravel/starterkit && composer test`: run Laravel tests via Artisan/PHPUnit.
- `cd resources/Laravel/starterkit && npm run dev`: run Vite for the starter kit frontend.
- `cd resources/Laravel/starterkit && npm run build`: build starter kit frontend assets.

## Coding Style & Naming Conventions

Keep Markdown direct, current, and tied to canonical docs. Use uppercase snake case for major planning docs, for example `docs/product/PROJECT_LIFECYCLE.md`. Astro pages use kebab-case filenames; React map components use PascalCase, for example `ProjectLifecycleMap.tsx`. Follow existing two-space indentation in TypeScript, Astro, CSS, and JSON files. Laravel code should follow PSR-12 and use Laravel Pint when application work begins.

## Testing Guidelines

There is no root test runner. For docs-site changes, run `npm run build` in `docs-site/` and verify pages render. For Laravel work, add focused tests under `resources/Laravel/starterkit/tests/Feature` or `tests/Unit` and run `composer test`. Use test names that state the expected behavior.

## Commit & Pull Request Guidelines

Recent commits use short Conventional Commit-style prefixes such as `docs:` and `chore:`. Keep messages imperative and scoped, for example `docs: update project lifecycle guidance`. Pull requests should summarize the change, list verification commands run, link relevant issues or decisions, and include screenshots for visual docs-site or UI changes.

## Agent-Specific Instructions

Read `README.md` and relevant files in `docs/ai/` before implementation changes. Do not add application code beyond the current scaffold, add dependencies, or introduce new workflow statuses unless explicitly requested and reflected in canonical documentation.

For continuity, document meaningful actions, decisions, verification results, and unfinished work as you go. If a session disconnects, the repository should contain enough context for the next agent to resume without guessing.

# docs-site

Internal documentation website for `wegotthis.online`.

## Stack

- Astro
- Tailwind CSS
- React components for visual maps
- `.astro` pages for the current documentation layer
- a visual brand system page for design guidance

## Install dependencies

From the repository root:

```bash
cd docs-site
npm install
```

Use Node `20.20.2` for host parity, or any Node `>=20.20.0` runtime that remains compatible with the documented server path.

## Run locally

```bash
cd docs-site
npm run dev
```

Astro will start the local docs site and print the local URL in the terminal.

## Build for preview

```bash
cd docs-site
npm run build
npm run preview
```

## Add a new map

1. Create or update the visual React component in `src/components/maps/` if the map needs a custom diagram.
2. Add the page route in `src/pages/architecture/` using kebab-case for the filename and URL path.
3. Use `DocsLayout.astro` for the overall shell and `MapPage.astro` for the standard documentation structure.
4. Add the new route to the navigation in `src/components/layout/Sidebar.astro`.
5. Link the new page from related maps or the architecture index as needed.
6. If the page belongs to another docs section, add it to `src/components/layout/Sidebar.astro`.

## Where things live

- Map components: `src/components/maps/`
- Layout components: `src/components/layout/`
- Architecture pages: `src/pages/architecture/`
- Brand pages: `src/pages/brand/`
- Shared styles: `src/styles/global.css`

## Current map components

- `ProductHierarchyMap.tsx`
- `ProjectLifecycleMap.tsx`
- `DeliverableLifecycleMap.tsx`
- `ApprovalFlowMap.tsx`
- `MagicLinkScopeMap.tsx`
- `NotificationTriggerMap.tsx`
- `PermissionMatrixMap.tsx`
- `EntityRelationshipDiagram.tsx`
- `ActivityAuditRelationshipDiagram.tsx`

## Current architecture pages

- `src/pages/architecture/product-hierarchy.astro`
- `src/pages/architecture/project-lifecycle.astro`
- `src/pages/architecture/deliverable-lifecycle.astro`
- `src/pages/architecture/approval-flow.astro`
- `src/pages/architecture/magic-link-scope.astro`
- `src/pages/architecture/notification-trigger.astro`
- `src/pages/architecture/permission-matrix.astro`
- `src/pages/architecture/entity-relationship-diagram.astro`
- `src/pages/architecture/activity-audit-relationship-diagram.astro`

## Current brand pages

- `src/pages/brand/visual-system.astro`

## Notes

- Keep the docs site lightweight.
- Do not add routing complexity, authentication, or search until there is a real need.
- Keep map visuals calm, readable, and consistent with the existing architecture style.
- Keep brand pages practical enough to guide future implementation decisions.

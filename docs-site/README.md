# docs-site

Internal architecture documentation website for `wegotthis.online`.

## Stack

- Astro
- Tailwind CSS
- React components for visual maps
- `.astro` pages for the current documentation layer

## Install dependencies

From the repository root:

```bash
cd docs-site
npm install
```

Astro `6.3.7` requires Node `22.12.0` or newer.

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

## Where things live

- Map components: `src/components/maps/`
- Layout components: `src/components/layout/`
- Architecture pages: `src/pages/architecture/`
- Shared styles: `src/styles/global.css`

## Current map components

- `ProductHierarchyMap.tsx`
- `ProjectLifecycleMap.tsx`
- `DeliverableLifecycleMap.tsx`

## Notes

- Keep the docs site lightweight.
- Do not add routing complexity, authentication, or search until there is a real need.
- Keep map visuals calm, readable, and consistent with the existing architecture style.

# Creative File Handling

## Purpose

Document closeout and archiving considerations for different creative tools and media types.

## Current Decisions

- Working direction: tool-specific archive requirements should be identified before automated integrations are built.
- Working direction: MVP may use checklists and metadata before deep Adobe, Figma, Canva, or video integrations.

## InDesign

- Source file needs: packaged `.indd` files and related project files.
- Export needs: press-ready PDF, proof PDF, and any web-safe outputs.
- Linked assets: all linked images, graphics, and placed files should be included.
- Fonts: package or document font requirements according to licensing rules.
- Ownership/access: confirm editable files are owned by the church or authorized team.
- Versioning: identify final packaged version and previous drafts if retained.
- Archive notes: InDesign projects are high risk if links or fonts are missing.
- Future integration possibilities: Adobe file metadata, package verification, and storage automation.

## Illustrator

- Source file needs: editable `.ai` files.
- Export needs: PDF, SVG, PNG, EPS, or print-ready exports depending on use.
- Linked assets: include placed images or linked art.
- Fonts: outline text when appropriate and preserve editable font notes when needed.
- Ownership/access: confirm logo, artwork, and template rights.
- Versioning: distinguish master artwork from one-off project variations.
- Archive notes: Record where artwork was used.
- Future integration possibilities: Adobe metadata extraction and export validation.

## Photoshop

- Source file needs: layered `.psd` or `.psb` files where available.
- Export needs: JPG, PNG, TIFF, web, print, or social sizes.
- Linked assets: include smart objects and linked files.
- Fonts: document fonts used in editable text layers.
- Ownership/access: confirm photo and artwork usage rights.
- Versioning: mark flattened exports separately from editable source files.
- Archive notes: Preserve final retouched version and approved exports.
- Future integration possibilities: Adobe metadata extraction and automated rendition generation.

## Figma

- Source file needs: canonical Figma file or frame links.
- Export needs: PNG, SVG, PDF, and design handoff exports as needed.
- Linked assets: document embedded images, components, and libraries used.
- Fonts: document design fonts and licensing assumptions.
- Ownership/access: confirm church-owned team or project access.
- Versioning: record final frame, page, or version link.
- Archive notes: Links alone may be insufficient if access changes.
- Future integration possibilities: Figma API, file export, component mapping, and design token sync.

## Canva

- Source file needs: editable Canva design links or exported source-equivalent files where possible.
- Export needs: PDF print, PNG, JPG, MP4, or presentation exports depending on use.
- Linked assets: document uploaded images, brand kit assets, and template dependencies.
- Fonts: note Canva fonts and any uploaded brand fonts.
- Ownership/access: confirm account ownership and share permissions.
- Versioning: duplicate final templates where needed before further edits.
- Archive notes: Canva access can be account-dependent, so exports are important.
- Future integration possibilities: Canva API or manual brand/template sync.

## Video Projects

- Source file needs: project files from the editing tool, timelines, captions, graphics, and audio.
- Export needs: master export, web/social versions, caption files, thumbnails, and archive-quality output.
- Linked assets: include footage, audio, music licenses, graphics, and project media.
- Fonts: document title and motion graphic fonts.
- Ownership/access: confirm rights for footage, music, voiceover, and templates.
- Versioning: distinguish final master, platform-specific cuts, and drafts.
- Archive notes: video archives can be large and may require separate storage strategy.
- Future integration possibilities: cloud storage lifecycle rules and metadata extraction.

## Photography

- Source file needs: original RAW or high-resolution files where appropriate.
- Export needs: edited finals, web-ready images, print-ready images, and thumbnails.
- Linked assets: document albums, galleries, and source locations.
- Fonts: usually not applicable unless graphics are added.
- Ownership/access: confirm photographer rights, releases, and usage permissions.
- Versioning: separate originals, selects, edited finals, and cropped derivatives.
- Archive notes: tag people, event, department, ministry, location, and usage context.
- Future integration possibilities: AI tagging, face/people metadata, and gallery imports.

## Web/Social Exports

- Source file needs: source design or content file that produced the export.
- Export needs: platform-specific image, video, copy, caption, link, and thumbnail files.
- Linked assets: document reused media, campaign assets, and short links.
- Fonts: document fonts when text is embedded in graphics.
- Ownership/access: confirm platform and account ownership where relevant.
- Versioning: retain final platform-specific versions.
- Archive notes: record where and when each export was used.
- Future integration possibilities: social publishing APIs and platform usage tracking.

## Open Questions

- Which tool-specific checklists are required in MVP?
- Should the system enforce archive completeness by file type?
- How should missing fonts or inaccessible cloud design files be handled?

## Notes

- This document supports Project Closeout and future integration planning.

Last Updated: 2026-05-20

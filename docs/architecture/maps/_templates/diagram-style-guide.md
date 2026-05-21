# Diagram Style Guide

## Purpose

Define a consistent style for architecture maps and diagrams so planning artifacts remain readable and maintainable.

## Naming Conventions

- Use the documented product vocabulary.
- Prefer singular object names when labeling entities.
- Use concise relationship names that describe meaning, not implementation.
- Keep titles aligned with the file name and diagram purpose.

## Arrow Conventions

- Use a single-direction arrow when the relationship is primarily read one way.
- Use a double-direction arrow only when bidirectional interpretation is important to the diagram.
- Use dashed arrows for indirect, derived, or reference relationships.
- Use solid arrows for primary structural or workflow relationships.

## Cardinality Notation

- Use plain language cardinality labels such as `one`, `many`, `optional`, and `required`.
- Use the same cardinality style throughout a given diagram.
- Do not mix multiple notation systems in the same artifact.

## Color Usage

- Use color sparingly to improve comprehension rather than decoration.
- Reserve consistent colors for category-level meaning such as workflow, data, security, and communication.
- Ensure diagrams remain understandable if viewed in grayscale.
- Do not rely on color alone to communicate critical meaning.

## Relationship Labeling

- Label relationships with readable verbs or short phrases.
- Prefer labels such as `contains`, `creates`, `approves`, `references`, or `notifies`.
- Avoid vague labels such as `links to` when a more precise relationship exists.

## Diagram Export Standards

- Export diagrams in a format that is easy to review and preserve.
- Keep source-editable files whenever possible.
- Export review-ready versions at legible resolution.
- Include the last updated date or version context in the surrounding documentation when needed.

## File Naming Standards

- Use lowercase kebab-case for all diagram filenames.
- Name files by artifact purpose rather than by tool.
- Keep file names stable unless the artifact meaning changes.
- Match exported asset names to their corresponding markdown reference where possible.

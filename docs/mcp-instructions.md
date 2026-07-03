# MCP Instructions

## Project

Convert the approved Figma design into a production-ready WordPress website using the **Divi Theme**.

---

## Assets

All project images have been exported from the approved Figma design and are located in:

wp-content/themes/Divi/assets/

When implementing the design:

- Use only these exported images.
- Do not generate placeholder images.
- Do not substitute images with stock photos or AI-generated images.
- If an image is missing, stop and request the correct asset.

## Development Workflow

For every page and section:

1. Read `design-system.md`.
2. Read `project-rules.md`.
3. Open the corresponding frame in Figma.
4. Analyze the layout before implementing.
5. Build **one section at a time** using Divi.
6. Compare the completed section against the Figma design.
7. Fix any visual differences before proceeding.
8. Mark the section as complete in `progress.md`.

---

## Divi Rules

* Use native Divi modules whenever possible.
* Create reusable Global Sections and Global Modules.
* Use Divi Global Colors and Global Fonts.
* Use Divi Theme Builder for global layouts.
* Minimize custom CSS and JavaScript.
* Do not install unnecessary plugins.
* Use semantic HTML and accessible markup.
* Optimize images for performance.
* Keep the site responsive on desktop, tablet, and mobile.

---

## Design Accuracy

The implementation should match the approved Figma design as closely as possible.

Verify:

* Layout
* Typography
* Colors
* Spacing
* Alignment
* Shadows
* Border radius
* Icons
* Images
* Hover states
* Buttons
* Responsive behavior

Do not proceed until the current section visually matches the Figma design.

---

## Figma Rules

### Approved Design

**Frame Name:** `V2-Approved`

This frame is the official source of truth.

Always inspect the **V2-Approved** frame before building any page or section.

Ignore all draft, archived, experimental, or previous versions unless explicitly instructed.

Use only the assets, spacing, typography, colors, and component styles defined in the **V2-Approved** frame.

If multiple versions of a page exist, always choose the one inside **V2-Approved**.

Never make design decisions based on older frames.

If a design detail is unclear or missing, stop and request clarification instead of making assumptions.

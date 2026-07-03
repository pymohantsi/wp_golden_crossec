# Golden Cross Equestrian Centre

## Project Overview

This project converts the provided Figma design into a production-ready WordPress website using the **Divi Theme**.

The goal is to create a **pixel-perfect**, **responsive**, and **high-performance** website that matches the Figma design while following WordPress and Divi best practices.

---

# Tech Stack

* WordPress
* Divi Theme
* Divi Theme Builder
* Codex
* MCP (Model Context Protocol)

---

# Project Structure

```
docs/
├── README.md
├── design-system.md
├── project-rules.md
├── page-structure.md
├── divi-guidelines.md
├── wordpress-guidelines.md
├── reusable-components.md
├── responsiveness.md
├── custom-css.md
├── qa-checklist.md
├── progress.md
└── mcp-instructions.md
```

---

# Assets

The project assets consist of images exported directly from the approved Figma design.

Location:

wp-content/themes/Divi/assets/

Rules:

- Use only the images available in this directory.
- Match each image to its corresponding element in the `V2-Approved` Figma frame.
- Do not replace, edit, or regenerate images unless explicitly instructed.
- Maintain the original aspect ratio and image quality.

# Development Workflow

Before implementing any page or section, always read the documentation in this order:

1. README.md
2. design-system.md
3. project-rules.md
4. page-structure.md
5. divi-guidelines.md
6. reusable-components.md
7. responsiveness.md

Do not skip any document.

---


# Figma Source

## Approved Design

**Frame Name:** `V2-Approved`

This frame is the official and approved design for development.

### Development Rules

* Always use the **`V2-Approved`** frame as the source of truth.
* Ignore drafts, experiments, archived screens, and older versions unless explicitly instructed.
* If multiple frames contain the same page, use only the version found under **`V2-Approved`**.
* Match the layout, spacing, typography, colors, shadows, icons, images, and interactions exactly.
* If any design element is unclear, inspect the `V2-Approved` frame before making assumptions.
* Do not modify the approved design without confirmation.


---

# Page Build Process

For every page:

1. Review the corresponding Figma frame.
2. Break the page into logical sections.
3. Build one section at a time.
4. Verify the design against Figma before moving to the next section.
5. Test responsiveness on desktop, tablet, and mobile.
6. Update `progress.md` after completing the section.

---

# Quality Checklist

Before marking any page complete, verify:

* Pixel-perfect match with Figma
* Correct typography
* Correct colors
* Correct spacing
* Responsive layout
* Accessible markup
* Optimized images
* Minimal custom CSS
* Cross-browser compatibility

---

# Definition of Done

A section is considered complete only when:

* It visually matches the Figma design.
* It is responsive.
* It uses reusable Divi components where appropriate.
* Performance is optimized.
* QA checks pass.
* Progress has been updated in `progress.md`.

---

# Notes

* Treat `design-system.md` as the single source of truth for design specifications.
* Do not modify the design without approval.
* Ask for clarification if any Figma element is ambiguous.
* Prefer maintainability and reuse over one-off implementations.

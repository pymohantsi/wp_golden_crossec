# design-system.md — Golden Cross Equestrian Centre

---

## 1. Project Overview

| Field | Detail |
|---|---|
| Site Name | Golden Cross Equestrian Centre |
| Domain | www.goldencrossec.com |
| Industry | Equestrian sports venue / competition centre |
| Purpose | Showcase facilities, promote events (BS/BD affiliated competitions, clinics, arena hire), and drive entries via My Riding Life / Equo |
| Target Audience | Amateur and competitive equestrians in East Sussex / South-East England; horse owners seeking arena hire; riders looking for BS/BD affiliated competition |
| Tone | Premium, confident, community-led; dark navy base with gold accents signals prestige |

---

## 2. Color Palette

| Role | Name | HEX | RGB | Usage |
|---|---|---|---|---|
| Primary Dark | Deep Navy | `#12153A` | rgb(18, 21, 58) | Hero bg, nav bg, footer bg, stats bar, facilities section bg |
| Secondary Dark | Mid Navy | `#292C63` | rgb(41, 44, 99) | Welcome split panel bg, CTA card gradient base |
| Tertiary Dark | Dark Indigo | `#1A1D3E` | rgb(26, 29, 62) | Welcome image panel bg overlay |
| Accent / Gold | Brand Gold | `#D6BD14` | rgb(214, 189, 20) | All CTAs, overline labels, divider bars, scroll arrow, carousel active dot, hero event card border, footer top border, "BD & BS" text |
| Accent Muted | Gold 20% | `rgba(214,189,20,0.2)` | — | Stats bar top/bottom border |
| Facebook Blue | FB Blue | `#1877F2` | rgb(24, 119, 242) | "Follow on Facebook" button bg, FB feed URL text |
| Light Background | Warm Cream | `#F4F4F0` | rgb(244, 244, 240) | Page wrapper bg, social feed fallback header, affiliation section bg |
| White Surface | White | `#FFFFFF` | rgb(255, 255, 255) | Social feed card bg, affiliation card bg |
| Body Text | Dark Text | `#1A1A1A` | rgb(26, 26, 26) | Social feed post body text |
| Heading (light bg) | Navy Heading | `#12153A` | rgb(18, 21, 58) | Headings on light/white backgrounds |
| Body (light bg) | Muted Grey | `#6B6B6B` | rgb(107, 107, 107) | Body paragraphs on light backgrounds |
| Muted / Timestamp | Light Grey | `#9B9B9B` | rgb(155, 155, 155) | Social feed timestamps, footer links muted |
| White on Dark | White Full | `#FFFFFF` / `rgba(255,255,255,0.82)` | — | Body text on dark panels; list items slightly dimmed |
| White Muted | White 70% | `rgba(255,255,255,0.70)` | — | Paragraph text on welcome panel |
| White Faint | White 48% | `rgba(255,255,255,0.48)` | — | Footer nav links |
| White Ghost | White 25% | `rgba(255,255,255,0.25)` | — | Footer copyright / legal links |
| Border Light | Navy 18% | `rgba(18,21,58,0.18)` | — | Social feed card dashed border |
| Card Border | Navy 10% | `rgba(18,21,58,0.10)` | — | Social feed internal divider |
| Social Border | White 15% | `rgba(255,255,255,0.15)` | — | Footer social icon buttons border |

---

## 3. Typography

### Font Families

| Role | Font Family | Source | Weights Used |
|---|---|---|---|
| Display / Hero Heading | Bebas Neue | Google Fonts | 400 (Regular only) |
| Heading (H2–H3) | Playfair Display | Google Fonts | 600 (SemiBold), 700 (Bold) |
| Body / UI / Labels | Inter | Google Fonts | 400 (Regular), 500 (Medium), 600 (SemiBold), 700 (Bold) |

### Type Scale

| Tag / Role | Font | Size | Line Height | Letter Spacing | Weight |
|---|---|---|---|---|---|
| H1 Hero | Bebas Neue | 80px | 80px (1.0) | 1.6px | 400 |
| H2 Section | Playfair Display | 40–42px | 48–63px | 0 | 600–700 |
| H2 Split | Playfair Display | 36px | 45px | 0 | 600 |
| H2 CTA Card | Playfair Display | 32px | 35.2px | 0 | 700 |
| H3 Facility | Playfair Display | 20px | 24px | 0 | 600 |
| Overline Label | Inter | 10px | 15px | 2.0–2.2px | 600 |
| Body Large | Inter | 15px | 25.5–26.25px | 0 | 400 |
| Body Small | Inter | 13px | 19.5–21.45px | 0 | 400 |
| Body XS | Inter | 12px | 19.8px | 0 | 400 |
| Caption | Inter | 11px | 16.5px | 0 | 400 |
| Button / Link CTA | Inter | 12–13px | 18–19.5px | 1.44–1.8px | 600 |
| Nav Menu Item | Inter | ~18–20px | 24px | 0 | 400–600 |
| Footer Logo Name | Playfair Display | 13px | 17.55px | 0 | 700 |
| "BD & BS" badge | Bebas Neue | 28px | 42px | 1.68px | 400 |
| Event Date | Inter | 16px | 16px | 0 | 700 |
| Event Name | Playfair Display | 32px | 32px | 0 | 600 |

### Google Fonts Embed URL

```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
```

---

## 4. Spacing & Layout

| Property | Value |
|---|---|
| Base spacing unit | 8px |
| Section padding top/bottom | 80px |
| Container side padding | 40px (sections), 50px (nav), 56px (welcome split), 100–150px (footer) |
| Container max-width | 1499px (content area within 1579px full-width canvas) |
| Column gutter | ~3px (facilities grid), standard: 20–60px flex gap |
| Card internal padding | 36px (CTA card labels), 28px (affiliation card), 22px top/bottom + 30px left + 50px right (event card) |
| Border-radius sm | 4px (outline buttons, carousel dots) |
| Border-radius md | 6px (hero event button, nav logo, footer logo) |
| Border-radius lg | 10px (social feed card) |
| Border-radius xl | 12px (hero event card, affiliation cards) |
| Border-radius pill | Not used |
| Left border accent | 4px solid `#D6BD14` (hero event card left border) |
| Gold divider bar | 48px × 3px `#D6BD14` (section punctuation under H2) |

---

## 5. Shadows & Effects

| Element | Value |
|---|---|
| Hero event card | `drop-shadow: 0px 16px 24px rgba(0,0,0,0.55)` |
| Affiliation cards | `drop-shadow: 0px 4px 10px rgba(18,21,58,0.08)` |
| Hero overlay gradient | `linear-gradient(115.23deg, rgba(18,21,58,0.92) 7.7%, rgba(18,21,58,0.72) 50%, rgba(18,21,58,0.35) 92.3%)` |
| Hero bottom vignette | `linear-gradient(to top, rgba(18,21,58,0.75), rgba(0,0,0,0))` 180px tall |
| CTA card overlay | `linear-gradient(to top, #292C63 0%, rgba(41,44,99,0.5) 60%, rgba(0,0,0,0) 100%)` |
| Facilities card overlay | `linear-gradient(to top, rgba(0,0,0,0.75), rgba(0,0,0,0.2) 50%, rgba(0,0,0,0))` |
| Modal / dropdown shadow | Not shown; recommend `0px 8px 24px rgba(18,21,58,0.18)` |
| Overlay opacity | Hero main: 92% → 35%; CTA card: 75% at base |

---

## 6. Iconography

| Property | Detail |
|---|---|
| Icon library | Custom SVG icons (not a named icon set — all rendered as `<img>` from Figma assets) |
| Icon sizes | 12px (footer contact), 13px (social feed actions), 16px (list items, nav, CTA links, Facebook button), 17px (mobile nav social), 18px (top nav contact) |
| Icon colours | White (on dark), `#D6BD14` gold (scroll indicator), `#1877F2` (Facebook icon) |
| Checkmark / bullet icon | 16×16px tick SVG, white on dark — used in Welcome Split list |

---

## 7. Component Inventory

| Component | Background | Text Color | Border | Border Radius | Hover State |
|---|---|---|---|---|---|
| **Top Navigation** | `rgba(18,21,58,0.85)` | White | None | None | — |
| **Hamburger menu button** | Transparent | White bars | None | None | Opacity reduce |
| **Slide-out Nav Menu** | `#12153A` | White nav items | None | None | Nav item bg highlight |
| **Hero Section** | `#12153A` + photo bg | White headlines | None | None | — |
| **Hero Event Card** | `#12153A` | White title, `#D6BD14` labels | 4px left `#D6BD14`, outline `#D6BD14` | 12px | — |
| **"Enter Now" Button** | Transparent | `#D6BD14` | 1px solid `#D6BD14` | 6px | bg fill `#D6BD14`, text `#12153A` |
| **Stats Bar / Plan Your Visit** | `#12153A` | White heading, `#D6BD14` overline | Top/bottom `rgba(214,189,20,0.2)` | None | — |
| **CTA Cards (3-up)** | Photo + gradient overlay | White heading, `#D6BD14` labels | Bottom 3px `#D6BD14` (active card) | None | Scale/lighten overlay |
| **Welcome Split — Image** | `#1A1D3E` | — | None | None | — |
| **Welcome Split — Text** | `#292C63` | White, `rgba(255,255,255,0.70)` body | None | None | — |
| **"About Us" Ghost Button** | Transparent | White | 1px solid `rgba(255,255,255,0.55)` | 4px | bg `rgba(255,255,255,0.1)` |
| **Social Feed Section** | `#FFFFFF` | `#12153A` heading, `#6B6B6B` body | None | None | — |
| **Facebook Feed Card** | `#F4F4F0` header, `#FFFFFF` posts | `#12153A`, `#9B9B9B` timestamps | 1px dashed `rgba(18,21,58,0.18)` | 10px | — |
| **"Follow on Facebook" Button** | `#1877F2` | White | None | 4px | Darken bg |
| **Facilities Grid** | `#12153A` | White heading, `#D6BD14` overline | None | None | — |
| **Facility Image Cards** | Photo + gradient overlay | White on image | None | None | Scale on hover |
| **Affiliations Section** | `#F4F4F0` | `#12153A` heading, `#6B6B6B` body | None | None | — |
| **Affiliation Cards (3-up)** | `#FFFFFF` | `#12153A` | None | 12px, shadow | Lift shadow on hover |
| **Affiliation Banner** | `#12153A` | `#D6BD14` (BD/BS), white muted | Top 2px `#D6BD14` | None | — |
| **Footer** | `#12153A` | White columns, `#D6BD14` col headings | Top 2px `#D6BD14` | None | Link opacity increase |
| **Footer Social Buttons** | Transparent | `rgba(255,255,255,0.5)` | 1px solid `rgba(255,255,255,0.15)` | 4px | bg `rgba(255,255,255,0.1)` |
| **Footer Bottom Bar** | Transparent | `rgba(255,255,255,0.25)` | Top `rgba(255,255,255,0.07)` | None | Link opacity increase |

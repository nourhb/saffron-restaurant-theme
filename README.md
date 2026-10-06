# Saffron — Restaurant Block Theme

**Saffron** is an elegant WordPress block theme built for restaurants, bistros and fine-dining rooms. Deep charcoal and saffron tones, refined Playfair Display serif typography, seasonal menu patterns with dotted price leaders, chef stories, dish galleries and reservation-focused calls to action — everything a restaurant needs to look irresistible online.

- **Author:** Nour El Houda Bouajila
- **Portfolio:** https://nour-el-houda-bouajila.rf.gd/
- **GitHub:** https://github.com/Nourhb
- **LinkedIn:** https://www.linkedin.com/in/nour-el-houda-bouajila
- **Version:** 1.0.0 · **License:** GPL-2.0-or-later · **Requires:** WordPress 6.4+, PHP 7.4+

## Features

- **Full Site Editing** — edit headers, footers, templates and every pixel with the block editor
- **Complete theme.json design system** — charcoal/espresso/saffron/cream palette, Playfair Display + Jost type pairing, fluid type scale, spacing scale, soft shadows
- **10 hand-built block patterns** — hero, chef story, three menu sections (starters, mains, desserts) with dotted price leaders, dish gallery, diner testimonials, reservation CTA, opening hours, private dining
- **"Brunch" style variation** — one-click bright morning look with honeyed cream backgrounds
- **Photo-rich by default** — real restaurant and food photography wired into hero, chef, gallery, hours and CTA patterns
- **Motion with manners** — scroll reveals, image zoom hovers, button sheen; all disabled under `prefers-reduced-motion`
- **Accessibility** — skip link, visible focus states, semantic landmarks, keyboard-friendly navigation
- **Translation-ready** — `saffron` text domain, `/languages` directory

## Installation

1. Download or clone this repository.
2. Copy the `saffron-restaurant-theme` folder into `wp-content/themes/` (rename the folder to `saffron` if you like).
3. In WordPress, go to **Appearance → Themes** and activate **Saffron**.
4. Open **Appearance → Editor** to customize templates, or insert any **Saffron** pattern from the block inserter.

No plugins required. Google Fonts (Playfair Display + Jost) load automatically; the theme works offline with system fallbacks.

## Pattern catalog

| Pattern | Slug | What it is |
|---|---|---|
| Hero Restaurant | `saffron/hero-restaurant` | Full-screen cover hero, headline, dual CTAs |
| About the Chef | `saffron/about-chef` | Chef photo, bio and pull quote |
| Menu — Starters | `saffron/menu-starters` | Price list with dotted leaders |
| Menu — Mains | `saffron/menu-mains` | Dark price list section |
| Menu — Desserts | `saffron/menu-desserts` | Photo + price list |
| Gallery of Dishes | `saffron/gallery-dishes` | 6-photo gallery with zoom hover |
| Testimonials | `saffron/testimonials-diners` | 3 diner review cards |
| Reservation CTA | `saffron/reservation-cta` | Cover banner with booking CTA |
| Opening Hours | `saffron/opening-hours` | Hours table + address + photo |
| Private Dining | `saffron/private-dining` | Event room pitch with details |

## Customization

- **Colors & fonts:** everything flows from `theme.json` — tweak the palette, type scale or spacing there.
- **Style variation:** switch to the **Brunch** bright style from the Site Editor's Styles panel.
- **Custom page template:** `page-wide.html` (1200px canvas) is registered as a page template.
- **Block styles:** Saffron Sheen (button), Saffron Card (group), Framed (image), Eyebrow (heading), Pull Quote (quote).
- **Front-end script:** `assets/js/theme.js` handles the back-to-top button and scroll reveals — vanilla JS, no dependencies.

## Changelog

### 1.0.0
- Initial release: 8 templates, 2 template parts, 10 block patterns, Brunch style variation, theme.js interactions, full a11y pass.

## License

GNU General Public License v2 or later — see `LICENSE`.

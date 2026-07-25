# CSS architecture & naming convention

All styles compile from this folder into a single, minified `app.css` via
Vite (`resources/sass/app.scss` is the entry point). There is no inline CSS
anywhere in the Blade views — every rule lives here.

## Folder structure

- `abstracts/` — Sass variables and mixins only. Nothing here outputs CSS
  directly.
- `base/` — reset, global typography, and a small set of layout-only utility
  classes (`u-*`).
- `layout/` — sitewide structural chrome: header, footer, nav. Prefixed `l-`.
- `components/` — reusable, sitewide UI pieces (buttons, form controls,
  cards). Prefixed `c-`. These are intentionally shared across every page —
  a button should look the same on every page.
- `pages/` — one partial per page (or page type). This is where the "no
  class collisions between pages" rule is enforced.

## The page-scoping rule

Every page template renders its content inside a single, unique root class,
e.g.:

```blade
<main class="page-home"> ... </main>
<main class="page-about"> ... </main>
<main class="page-services"> ... </main>
```

The matching Sass partial nests **all** of that page's section rules inside
the root class:

```scss
// pages/_home.scss
.page-home {
    .hero { ... }
}

// pages/_about.scss
.page-about {
    .hero { ... }
}
```

Both pages can use a short, readable class like `.hero` internally, but they
compile to `.page-home .hero` and `.page-about .hero` — completely separate
selectors. Editing one page's `.hero` styles can never affect the other
page's `.hero`, and there is no need to invent awkward unique names like
`.home-hero-section` / `.about-hero-section-2`.

When a new page is added:

1. Create `pages/_<page-name>.scss`, wrap its rules in `.page-<page-name>`.
2. Add `@use 'pages/<page-name>';` to `app.scss`.
3. Wrap the page's Blade content in `<... class="page-<page-name>">`.

## What is allowed to be shared

Only three things are intentionally shared sitewide, and are namespaced to
make that obvious:

- `l-*` — header/footer/nav layout chrome.
- `c-*` — reusable components (buttons, form fields, cards).
- `u-*` — tiny layout utilities (container width, visually-hidden).

Everything else is page-scoped and never reused across pages, even if two
pages happen to want visually similar sections — copy the few lines rather
than sharing a class, so future edits stay isolated.

// Primary nav toggle. Progressive enhancement — the nav links work without
// JS; this adds the open/close behaviour for both the desktop horizontal
// bar and the mobile off-canvas drawer, driven by a single `data-nav-state`
// attribute on the header (Tailwind's `group-data-[nav-state=open]:*`
// variants react to it in the CSS, so the JS only has one thing to toggle).

document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('header[data-nav-state]');
    const toggle = document.querySelector('[data-nav-toggle]');
    const closeBtn = document.querySelector('[data-nav-close]');
    const overlay = document.querySelector('[data-nav-overlay]');

    if (!header || !toggle) {
        return;
    }

    const isOpen = () => header.dataset.navState === 'open';

    const setOpen = (open) => {
        header.dataset.navState = open ? 'open' : 'closed';
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    };

    toggle.addEventListener('click', () => setOpen(!isOpen()));
    closeBtn?.addEventListener('click', () => setOpen(false));
    overlay?.addEventListener('click', () => setOpen(false));

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            setOpen(false);
        }
    });

    header.querySelectorAll('nav a').forEach((link) => {
        link.addEventListener('click', () => setOpen(false));
    });
});

// Mobile nav toggle. Progressive enhancement — the nav is a plain link list
// and works without JS; this just adds the off-canvas open/close behaviour.

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('[data-nav-toggle]');
    const nav = document.querySelector('[data-nav]');
    const overlay = document.querySelector('[data-nav-overlay]');
    const closeBtn = document.querySelector('[data-nav-close]');

    if (!toggle || !nav || !overlay) {
        return;
    }

    const closeNav = () => {
        nav.classList.add('translate-x-full');
        nav.classList.remove('translate-x-0');
        overlay.classList.add('opacity-0', 'pointer-events-none');
        overlay.classList.remove('opacity-100', 'pointer-events-auto');
        toggle.setAttribute('aria-expanded', 'false');
    };

    const openNav = () => {
        nav.classList.remove('translate-x-full');
        nav.classList.add('translate-x-0');
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.add('opacity-100', 'pointer-events-auto');
        toggle.setAttribute('aria-expanded', 'true');
    };

    toggle.addEventListener('click', () => {
        const isOpen = nav.classList.contains('translate-x-0');
        isOpen ? closeNav() : openNav();
    });

    overlay.addEventListener('click', closeNav);
    closeBtn?.addEventListener('click', closeNav);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeNav();
        }
    });

    nav.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeNav);
    });
});

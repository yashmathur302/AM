// "Four practices" pinned scroll-stack: each practice panel takes the full
// viewport and the next one visually covers the previous as you scroll
// through a tall wrapper — the same CSS structure as the reference
// template's "Things We Offer" section (items absolutely stacked inside a
// pinned/sticky viewport). The source template's own pin/stack script
// wasn't available to copy directly, so this reimplements the same visual
// behavior in vanilla JS: a CSS `position: sticky` wrapper pins the stage
// (no GSAP ScrollTrigger needed for the pin itself), and a persistent rAF
// loop tracks scroll position to swap which panel is visible, playing a
// scale-in on the heading and a fade/slide-up on the body each time.
//
// Below lg, panels just stack in normal document flow — a full-viewport
// pinned carousel doesn't translate well to small screens. isDesktop() is
// re-checked every frame (matching hero-reveal.js's approach) so resizing
// across the breakpoint live just switches modes, no reload needed.

document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.querySelector('[data-stack-wrapper]');
    const items = document.querySelectorAll('[data-stack-item]');

    if (!wrapper || !items.length) {
        return;
    }

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isDesktop = () => window.matchMedia('(min-width: 1024px)').matches;

    const clearInlineStyles = (el, props) => {
        props.forEach((prop) => el.style.removeProperty(prop));
    };

    const showAllStatic = () => {
        wrapper.style.removeProperty('height');
        items.forEach((item) => {
            clearInlineStyles(item, ['opacity', 'z-index', 'pointer-events']);
            const heading = item.querySelector('[data-stack-heading]');
            const body = item.querySelector('[data-stack-body]');
            if (heading) clearInlineStyles(heading, ['transition', 'opacity', 'transform']);
            if (body) clearInlineStyles(body, ['transition', 'opacity', 'transform']);
        });
    };

    if (prefersReducedMotion) {
        showAllStatic();
        return;
    }

    let activeIndex = -1;
    let wasDesktop = null;

    const applyEntrance = (item) => {
        const heading = item.querySelector('[data-stack-heading]');
        const body = item.querySelector('[data-stack-body]');

        if (heading) {
            heading.style.transition = 'none';
            heading.style.opacity = '0';
            heading.style.transform = 'scale(0.94)';
            // Force a style flush so the "from" state above actually paints
            // before the transition below is requested, otherwise the
            // browser can coalesce both into one frame and skip the animation.
            void heading.offsetWidth;
            heading.style.transition = 'opacity 600ms ease-out, transform 600ms ease-out';
            heading.style.opacity = '1';
            heading.style.transform = 'scale(1)';
        }

        if (body) {
            body.style.transition = 'none';
            body.style.opacity = '0';
            body.style.transform = 'translateY(16px)';
            void body.offsetWidth;
            body.style.transition = 'opacity 600ms ease-out 120ms, transform 600ms ease-out 120ms';
            body.style.opacity = '1';
            body.style.transform = 'translateY(0)';
        }
    };

    const loop = () => {
        const desktop = isDesktop();

        if (desktop !== wasDesktop) {
            wasDesktop = desktop;
            activeIndex = -1;

            if (desktop) {
                wrapper.style.height = `${items.length * 100}vh`;
            } else {
                showAllStatic();
            }
        }

        if (desktop) {
            const rect = wrapper.getBoundingClientRect();
            const vh = window.innerHeight;
            const progress = Math.min(items.length - 1, Math.max(0, -rect.top / vh));
            const newActive = Math.min(items.length - 1, Math.floor(progress + 0.0001));

            items.forEach((item, i) => {
                item.style.opacity = i === newActive ? '1' : '0';
                item.style.zIndex = i === newActive ? '2' : '1';
                item.style.pointerEvents = i === newActive ? 'auto' : 'none';
            });

            if (newActive !== activeIndex) {
                activeIndex = newActive;
                applyEntrance(items[activeIndex]);
            }
        }

        requestAnimationFrame(loop);
    };

    requestAnimationFrame(loop);
});

// Stat counters on the homepage: each number counts up from 0 to its target
// once the card scrolls into view, formatted with Indian digit grouping
// (matching the site's India-focused positioning) plus its own prefix/suffix.

document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('[data-stat-counter]');

    if (!counters.length) {
        return;
    }

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const DURATION = 1600;

    // power3.out
    const ease = (t) => 1 - Math.pow(1 - t, 3);

    const format = (el, value) => {
        const prefix = el.dataset.prefix || '';
        const suffix = el.dataset.suffix || '';
        return `${prefix}${Math.round(value).toLocaleString('en-IN')}${suffix}`;
    };

    const animateCounter = (el) => {
        const target = parseFloat(el.dataset.value);

        if (prefersReducedMotion) {
            el.textContent = format(el, target);
            return;
        }

        const start = performance.now();

        const step = (now) => {
            const t = Math.min(1, (now - start) / DURATION);
            el.textContent = format(el, target * ease(t));

            if (t < 1) {
                requestAnimationFrame(step);
            }
        };

        requestAnimationFrame(step);
    };

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            animateCounter(entry.target);
            obs.unobserve(entry.target);
        });
    }, { threshold: 0.4 });

    counters.forEach((el) => observer.observe(el));
});

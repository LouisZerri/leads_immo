export function initCounters() {
    const counters = document.querySelectorAll('.counter');
    if (!counters.length) return;

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = +el.dataset.target;
                let current = 0;
                const inc = target / 60;
                const timer = setInterval(() => {
                    current += inc;
                    if (current >= target) {
                        el.textContent = target.toLocaleString('fr');
                        clearInterval(timer);
                    } else {
                        el.textContent = Math.floor(current).toLocaleString('fr');
                    }
                }, 30);
                observer.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(c => observer.observe(c));
}

/**
 * Scroll reveal logic
 */
const initScrollReveal = () => {
    const revealElements = document.querySelectorAll('.reveal');

    if (!revealElements.length) {
        return;
    }

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1, // Trigger when 10% of the element is visible
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // Unobserve after it has revealed to prevent re-triggering (optional)
                // observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    revealElements.forEach((el) => {
        observer.observe(el);
    });
};

export default initScrollReveal;

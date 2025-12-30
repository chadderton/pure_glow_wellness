document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    const navLinks = document.querySelectorAll('.main-nav a');

    // Toggle Mobile Menu
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', () => {
            mainNav.classList.toggle('active');

            // Animate hamburger to X (optional simple transform)
            // You could add class to toggle for animation if desired in CSS
            mobileMenuToggle.classList.toggle('open');
        });
    }

    // Close menu when a link is clicked
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (mainNav.classList.contains('active')) {
                mainNav.classList.remove('active');
                mobileMenuToggle.classList.remove('open');
            }
        });
    });

    // Smooth scroll with header offset (optional enhancement if CSS scroll-behavior isn't enough)
    // The CSS scroll-behavior: smooth handles the animation, but sometimes sticky headers cover the target.
    // Let's add a small offset handler.

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const headerOffset = 80; // Approx height of sticky header
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
            }
        });
    });

    // Logo Visibility on Scroll
    const headerLogo = document.querySelector('.header-logo-link');
    const heroSection = document.querySelector('.hero-section');

    if (headerLogo && heroSection) {
        // Use IntersectionObserver to toggle logo visibility without forced reflows
        const headerObserverOptions = {
            root: null,
            threshold: 0,
            // Trigger when the bottom of the hero passes the top of the viewport (offset by approx header height)
            rootMargin: "-80px 0px 0px 0px"
        };

        const headerObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                // If hero is NOT intersecting (i.e., has scrolled past our top offset), show the logo
                if (!entry.isIntersecting) {
                    headerLogo.classList.add('visible');
                } else {
                    headerLogo.classList.remove('visible');
                }
            });
        }, headerObserverOptions);

        headerObserver.observe(heroSection);
    }

    // Fade-in Animation Observer
    const fadeElements = document.querySelectorAll('.fade-in-section');

    if (fadeElements.length > 0) {
        const fadeObserverOptions = {
            threshold: 0.1,
            rootMargin: "0px 0px -50px 0px"
        };

        const fadeObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target); // Only animate once
                }
            });
        }, fadeObserverOptions);

        fadeElements.forEach(element => {
            fadeObserver.observe(element);
        });
    }
});

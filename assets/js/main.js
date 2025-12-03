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
        const observerOptions = {
            root: null,
            threshold: 0, // Trigger as soon as any part is visible
            rootMargin: "-100px 0px 0px 0px" // Offset to trigger slightly before/after
        };

        // Use scroll event for simpler control over "past hero" logic if intersection is tricky with sticky headers
        // But IntersectionObserver is better for performance.
        // Let's try a simple scroll listener for robustness with the sticky header.
        
        const handleScroll = () => {
            const heroBottom = heroSection.getBoundingClientRect().bottom;
            const headerHeight = document.querySelector('.site-header').offsetHeight;
            
            if (heroBottom < headerHeight) {
                headerLogo.classList.add('visible');
            } else {
                headerLogo.classList.remove('visible');
            }
        };

        window.addEventListener('scroll', handleScroll);
        handleScroll(); // Check on load
    }

    // Fade-in Animation Observer
    const fadeElements = document.querySelectorAll('.fade-in-section');
    
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
});

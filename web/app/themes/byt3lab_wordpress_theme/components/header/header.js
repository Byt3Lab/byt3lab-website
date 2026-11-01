/**
 * BYT3LAB Component Header JavaScript
 * Synchronizes floating header scroll, mobile backdrop overlay, and sidebar drawer reset.
 */
(function () {
    function initHeaderComponent() {
        const navbar = document.querySelector('.c-navbar');
        const componentHeader = document.querySelector('.component-header');
        const burgerBtn = document.getElementById('c-navbar-burger') || document.querySelector('.c-navbar__burger');
        const menu = document.getElementById('c-navbar-menu') || document.querySelector('.c-navbar__menu');
        const overlay = document.getElementById('c-navbar-overlay') || document.querySelector('.c-navbar__overlay');

        if (!navbar) return;

        // 1. Header scroll handler (elevated glass floating state)
        function handleHeaderScroll() {
            if (window.scrollY > 20) {
                navbar.classList.add('c-navbar--scrolled', 'is-scrolled');
                if (componentHeader) componentHeader.classList.add('is-scrolled');
            } else {
                navbar.classList.remove('c-navbar--scrolled', 'is-scrolled');
                if (componentHeader) componentHeader.classList.remove('is-scrolled');
            }
        }

        window.addEventListener('scroll', handleHeaderScroll, { passive: true });
        handleHeaderScroll();

        // Helper to close mobile sidebar menu completely
        function closeMobileSidebar() {
            if (menu) menu.classList.remove('is-active');
            if (burgerBtn) burgerBtn.classList.remove('is-active');
            if (overlay) overlay.classList.remove('is-active');
            document.body.classList.remove('menu-open');

            const openIcon = burgerBtn ? burgerBtn.querySelector('.burger-icon--open') : null;
            const closeIcon = burgerBtn ? burgerBtn.querySelector('.burger-icon--close') : null;
            if (openIcon && closeIcon) {
                openIcon.classList.remove('d-none');
                closeIcon.classList.add('d-none');
            }
        }

        // Sync burger icon and backdrop overlay on burger click
        if (burgerBtn) {
            burgerBtn.addEventListener('click', function () {
                setTimeout(function () {
                    const isActive = menu && menu.classList.contains('is-active');
                    if (overlay) {
                        overlay.classList.toggle('is-active', isActive);
                    }
                    if (isActive) {
                        document.body.classList.add('menu-open');
                    } else {
                        document.body.classList.remove('menu-open');
                    }

                    const openIcon = burgerBtn.querySelector('.burger-icon--open');
                    const closeIcon = burgerBtn.querySelector('.burger-icon--close');
                    if (openIcon && closeIcon) {
                        if (isActive) {
                            openIcon.classList.add('d-none');
                            closeIcon.classList.remove('d-none');
                        } else {
                            openIcon.classList.remove('d-none');
                            closeIcon.classList.add('d-none');
                        }
                    }
                }, 10);
            });
        }

        // Close sidebar on overlay click
        if (overlay) {
            overlay.addEventListener('click', function () {
                closeMobileSidebar();
            });
        }

        // Close sidebar on Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menu && menu.classList.contains('is-active')) {
                closeMobileSidebar();
            }
        });

        // Close sidebar when clicking final destination links inside menu
        if (menu) {
            const destinationLinks = menu.querySelectorAll('a:not(.c-navbar__dropdown-trigger)');
            destinationLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    if (window.innerWidth <= 991.98) {
                        closeMobileSidebar();
                    }
                });
            });
        }

        // Reset mobile drawer state on resize to desktop viewport
        window.addEventListener('resize', function () {
            if (window.innerWidth > 991.98) {
                closeMobileSidebar();
                const dropdownItems = document.querySelectorAll('.c-navbar__item--has-dropdown');
                dropdownItems.forEach(function (item) {
                    item.classList.remove('is-open', 'is-mobile-open');
                });
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeaderComponent);
    } else {
        initHeaderComponent();
    }
})();

/**
 * BYT3LAB Premium Tooltips Initializer
 * Initialise et configure les tooltips Bootstrap avec options premium.
 */
(function () {
    'use strict';

    function initPremiumTooltips() {
        if (typeof window.bootstrap === 'undefined' && typeof window.jo === 'undefined') {
            return;
        }

        // Initialize Bootstrap 5 tooltips (excluding header to keep navbar clean)
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]:not(.component-header *):not(.c-navbar *):not(header *)'));
        tooltipTriggerList.forEach(function (el) {
            try {
                // If instance already exists, skip
                if (window.bootstrap && window.bootstrap.Tooltip) {
                    var inst = window.bootstrap.Tooltip.getInstance(el);
                    if (!inst) {
                        new window.bootstrap.Tooltip(el, {
                            container: 'body',
                            animation: true,
                            delay: { show: 150, hide: 100 }
                        });
                    }
                }
            } catch (e) {
                // Silently handle if tooltip constructor differs in bundled script
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initPremiumTooltips);
    } else {
        initPremiumTooltips();
    }

    // Re-init on dynamic DOM changes if needed
    window.addEventListener('load', initPremiumTooltips);
})();

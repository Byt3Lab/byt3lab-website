/**
 * BYT3LAB À Propos Component JavaScript
 */
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scroll for anchor links
        var teamLinks = document.querySelectorAll('a[href^="#equipe"]');
        teamLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                var target = document.getElementById('equipe');
                if (target) {
                    e.preventDefault();
                    var offset = 80; // height of sticky header
                    var targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
})();

// src/js/modules/counters.js
const Counters = {
    init() {
        const counterValues = document.querySelectorAll('.o-counter-section .a-counter-value');

        // Sécurité : Si aucun compteur n'est présent sur la page courante, on stoppe
        if (!counterValues.length) return;

        // Configuration de l'Intersection Observer pour déclencher au défilement
        const observerOptions = {
            root: null, // viewport
            threshold: 0.2 // Se déclenche quand 20% de la section est visible
        };

        const startCounting = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const targetElements = entry.target.querySelectorAll('.a-counter-value');
                    
                    targetElements.forEach(counter => {
                        this.animateNumber(counter);
                    });

                    // On stoppe l'observation de cette section pour ne pas relancer le compteur à chaque scroll
                    observer.unobserve(entry.target);
                }
            });
        };

        const observer = new IntersectionObserver(startCounting, observerOptions);
        
        // On cible l'organisme parent pour l'observation
        const counterSection = document.querySelector('.o-counter-section');
        if (counterSection) {
            observer.observe(counterSection);
        }
    },

    animateNumber(element) {
        const target = parseInt(element.getAttribute('data-target'), 10);
        const duration = 2000; // Durée totale de l'animation en millisecondes (2s)
        const frameRate = 1000 / 60; // ~60 frames par seconde
        const totalFrames = Math.round(duration / frameRate);
        
        let currentFrame = 0;

        const count = () => {
            currentFrame++;
            
            // Utilisation d'une fonction d'easing (Cubic Ease-Out) pour ralentir la fin de course
            const progress = currentFrame / totalFrames;
            const easeOutProgress = 1 - Math.pow(1 - progress, 3);
            
            const currentValue = Math.floor(easeOutProgress * target);

            if (currentFrame < totalFrames) {
                element.textContent = currentValue;
                requestAnimationFrame(count);
            } else {
                element.textContent = target; // S'assure que la valeur finale exacte est affichée
            }
        };

        requestAnimationFrame(count);
    }
};

export default Counters;
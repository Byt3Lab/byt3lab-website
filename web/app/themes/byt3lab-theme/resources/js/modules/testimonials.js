// src/js/modules/testimonials.js
const Testimonials = {
    init() {
        const dots = document.querySelectorAll('.m-carousel-nav__dot');
        const slides = document.querySelectorAll('.m-testimonial-slide');

        // Sécurité : Si les éléments n'existent pas sur la page courante, on stoppe l'exécution
        if (!dots.length || !slides.length) return;

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                
                // 1. Éviter de relancer l'animation si l'utilisateur clique sur le dot déjà actif
                if (dot.classList.contains('is-active')) return;

                const targetIndex = parseInt(dot.getAttribute('data-slide'), 10);
                const currentSlide = document.querySelector('.m-testimonial-slide.is-active');

                // 2. Transition de sortie (Fade Out) sur le slide actuellement visible
                if (currentSlide) {
                    currentSlide.style.opacity = '0';
                    currentSlide.style.transform = 'translateY(5px)';
                    currentSlide.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
                }

                // 3. Gestion des classes actives sur les indicateurs (dots)
                dots.forEach(btn => btn.classList.remove('is-active'));
                dot.classList.add('is-active');

                // 4. Mise à jour et transition d'entrée (Fade In) après le fondu
                setTimeout(() => {
                    // Masquage physique de tous les slides et affichage du slide ciblé
                    slides.forEach(slide => {
                        slide.classList.remove('is-active');
                        slide.style.display = 'none';
                    });

                    const targetSlide = slides[targetIndex];
                    if (targetSlide) {
                        targetSlide.style.display = 'flex';
                        
                        // Force le navigateur à calculer le layout (reflow) pour appliquer la transition d'entrée
                        void targetSlide.offsetWidth; 
                        
                        targetSlide.classList.add('is-active');
                        targetSlide.style.opacity = '1';
                        targetSlide.style.transform = 'translateY(0)';
                        targetSlide.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
                    }
                }, 250); // Doit correspondre au temps de la transition de sortie
            });
        });
    }
};

export default Testimonials;
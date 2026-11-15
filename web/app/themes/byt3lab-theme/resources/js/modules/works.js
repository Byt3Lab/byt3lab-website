// src/js/modules/works.js
const Works = {
    init() {
        const filterButtons = document.querySelectorAll('.c-works .a-button--filter');
        const portfolioItems = document.querySelectorAll('.c-works .mix-portfolio');

        // Sécurité : Si les éléments n'existent pas sur la page courante, on stoppe l'exécution
        if (!filterButtons.length || !portfolioItems.length) return;

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                
                // 1. Éviter de relancer l'animation si l'utilisateur clique sur le filtre déjà actif
                if (this.classList.contains('active')) return;

                const selectedFilter = this.getAttribute('data-filter');

                // 2. Transition de sortie (Fade Out & Scale) sur l'ensemble des cartes actives
                portfolioItems.forEach(item => {
                    // On prépare une transition propre pour la disparition des éléments filtrés
                    item.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.85)';
                });

                // 3. Gestion de la classe active sur les indicateurs de filtres
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                // 4. Mise à jour et transition d'entrée (Fade In & Scale) après le fondu
                setTimeout(() => {
                    portfolioItems.forEach(item => {
                        const itemCategory = item.getAttribute('data-category');

                        // Filtrage logique : Correspondance ou mode "All"
                        if (selectedFilter === 'all' || itemCategory === selectedFilter) {
                            // On retire le masquage physique pour la catégorie retenue
                            item.classList.remove('is-hidden');
                            item.classList.add('is-visible');

                            // Force le navigateur à recalculer le layout (reflow) pour amorcer l'animation d'entrée
                            void item.offsetWidth;

                            // Lancement de l'animation d'entrée fluide conforme à l'idéologie byt3lab
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        } else {
                            // Masquage physique complet des éléments exclus
                            item.classList.remove('is-visible');
                            item.classList.add('is-hidden');
                        }
                    });
                }, 250); // Doit correspondre exactement au temps de la transition de sortie
            });
        });
    }
};

export default Works;
// src/js/modules/BlogCatalog.js
const BlogCatalog = {
    init() {
        const catalogSection = document.querySelector('.o-blog-catalog');
        if (!catalogSection) return;

        this.filterButtons = catalogSection.querySelectorAll('.a-button--filter');
        this.blogItems = catalogSection.querySelectorAll('.mix-blog-item');
        this.loadMoreBtn = catalogSection.querySelector('#blog-load-more');

        if (!this.blogItems.length) return;

        // Configuration pour l'intégration statique
        this.itemsPerPage = 6; 
        this.currentVisibleCount = this.itemsPerPage;
        this.activeFilter = 'all';

        this.bindEvents();
        this.applyDisplayState();
    },

    bindEvents() {
        // Clic sur les filtres de catégories
        this.filterButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                const btn = e.currentTarget;
                if (btn.classList.contains('active')) return;

                this.filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                this.activeFilter = btn.getAttribute('data-filter');
                this.currentVisibleCount = this.itemsPerPage; // Reset la pagination
                
                this.applyDisplayState(true); // Relance l'animation d'entrée
            });
        });

        // Clic sur le bouton "Voir Plus"
        if (this.loadMoreBtn) {
            this.loadMoreBtn.addEventListener('click', () => {
                this.currentVisibleCount += this.itemsPerPage;
                this.applyDisplayState(false);
            });
        }
    },

    applyDisplayState(animateAll = false) {
        let matchCount = 0;

        this.blogItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            const isCategoryMatch = (this.activeFilter === 'all' || itemCategory === this.activeFilter);

            if (isCategoryMatch) {
                matchCount++;
                
                if (matchCount <= this.currentVisibleCount) {
                    item.classList.remove('is-hidden');
                    if (animateAll) {
                        item.classList.add('is-visible');
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 50);
                    } else {
                        item.classList.add('is-visible');
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }
                } else {
                    item.classList.remove('is-visible');
                    item.classList.add('is-hidden');
                }
            } else {
                item.classList.remove('is-visible');
                item.classList.add('is-hidden');
            }
        });

        // Masque automatiquement le bouton si tous les articles de la catégorie sont visibles
        if (this.loadMoreBtn) {
            const totalMatchingItems = this.activeFilter === 'all' 
                ? this.blogItems.length 
                : Array.from(this.blogItems).filter(item => item.getAttribute('data-category') === this.activeFilter).length;

            if (this.currentVisibleCount >= totalMatchingItems) {
                this.loadMoreBtn.style.display = 'none';
            } else {
                this.loadMoreBtn.style.display = 'inline-block';
            }
        }
    }
};

export default BlogCatalog;
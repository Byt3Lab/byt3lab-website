// src/js/modules/lightbox.js
import * as bootstrap from 'bootstrap';

const Lightbox = {
    init() {
        const galleryContainer = document.getElementById('projectLightboxGallery');
        const lightboxModalEl = document.getElementById('lightboxModal');
        const carouselInner = document.getElementById('lightboxCarouselInner');
        
        // Sécurité : on quitte si les éléments ne sont pas sur la page actuelle
        if (!galleryContainer || !lightboxModalEl || !carouselInner) return;

        // 1. Initialisation des instances Bootstrap
        const bootstrapModal = new bootstrap.Modal(lightboxModalEl);
        const bootstrapCarousel = new bootstrap.Carousel(document.getElementById('lightboxCarousel'), {
            interval: false // Désactive le défilement automatique pour la lecture des interfaces
        });

        // 2. Sélection des molécules de la galerie
        const galleryItems = galleryContainer.querySelectorAll('.m-project-card--gallery');

        // 3. Génération dynamique des slides pour le CMS
        let carouselHTML = '';
        galleryItems.forEach((item, index) => {
            const imgEl = item.querySelector('.m-project-card__img');
            const tagEl = item.querySelector('.m-project-card__tag');
            
            const imgSrc = imgEl ? imgEl.getAttribute('src') : '';
            const imgAlt = imgEl ? imgEl.getAttribute('alt') : '';
            const imgTitle = tagEl ? tagEl.textContent.trim() : '';

            carouselHTML += `
                <div class="carousel-item ${index === 0 ? 'active' : ''}">
                    <div class="c-gallery-lightbox__img-wrapper">
                        <img src="${imgSrc}" class="c-gallery-lightbox__img" alt="${imgAlt}">
                    </div>
                    <div class="carousel-caption d-block">
                        <h5 class="c-gallery-lightbox__title">${imgTitle}</h5>
                    </div>
                </div>
            `;
        });
        carouselInner.innerHTML = carouselHTML;

        // 4. Écoute du clic pour intercepter l'index et ouvrir le slider
        galleryItems.forEach((item) => {
            item.addEventListener('click', () => {
                const targetIndex = parseInt(item.getAttribute('data-gallery-index'), 10);
                
                // Déplacement immédiat vers l'image cliquée
                bootstrapCarousel.to(targetIndex);
                
                // Affichage de la lightbox
                bootstrapModal.show();
            });
        });
    }
};

export default Lightbox;
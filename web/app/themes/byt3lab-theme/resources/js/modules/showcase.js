// src/js/modules/showcase.js
const Showcase = {
    init() {
        const tabs = document.querySelectorAll('.c-showcase__tab-btn');
        const titleElement = document.querySelector('.c-showcase__title');
        const textElement = document.querySelector('.c-showcase__text');
        const imgElement = document.querySelector('.c-showcase__img');

        if (!tabs.length || !titleElement || !textElement || !imgElement) return;

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                
                // 1. Gestion des classes actives sur les onglets
                tabs.forEach(btn => btn.classList.remove('is-active'));
                tab.classList.add('is-active');

                // 2. Extraction des données de l'onglet cliqué
                const newTitle = tab.getAttribute('data-title');
                const newText = tab.getAttribute('data-text');
                const newImg = tab.getAttribute('data-img');

                // 3. Effet de transition fluide visuelle (opacité)
                const contentElements = [titleElement, textElement, imgElement];
                
                contentElements.forEach(el => {
                    el.style.opacity = '0';
                    el.style.transform = el.tagName === 'IMG' ? 'rotateY(-10deg) rotateX(5deg) scale(0.98)' : 'translateY(5px)';
                    el.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
                });

                // 4. Mise à jour des contenus après le fondu au noir
                setTimeout(() => {
                    titleElement.textContent = newTitle;
                    textElement.textContent = newText;
                    imgElement.src = newImg;

                    // On réaffiche les éléments proprement
                    contentElements.forEach(el => {
                        el.style.opacity = '1';
                        el.style.transform = el.tagName === 'IMG' ? 'rotateY(-10deg) rotateX(5deg) scale(1)' : 'translateY(0)';
                    });
                }, 250); // Doit correspondre au temps de la transition out
            });
        });
    }
}

export default Showcase;
// byt3lab-ui-system/src/js/modules/hero.js
const HeroSlider = {
  init() {
    const slider = document.querySelector('.c-hero');
    if (!slider) return;

    const slides = slider.querySelectorAll('.c-hero__slide');
    const prevBtn = slider.querySelector('.c-hero__nav-btn--prev');
    const nextBtn = slider.querySelector('.c-hero__nav-btn--next');
    const dotsContainer = slider.querySelector('.c-hero__dots');

    let currentIndex = 0;
    let slideInterval;
    const intervalTime = 6000; // 6 secondes par diapositive

    if (slides.length === 0) return;

    // 1. Génération dynamique des dots
    slides.forEach((_, index) => {
      const dot = document.createElement('button');
      dot.classList.add('c-hero__dot');
      if (index === 0) dot.classList.add('is-active');
      dot.setAttribute('aria-label', `Aller à la diapositive ${index + 1}`);
      dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.querySelectorAll('.c-hero__dot');

    // 2. Fonction de changement de slide
    const goToSlide = (index) => {
      // Retrait des états actifs courants
      slides[currentIndex].classList.remove('is-active');
      dots[currentIndex].classList.remove('is-active');

      // Mise à jour de l'index
      currentIndex = (index + slides.length) % slides.length;

      // Ajout des états actifs sur la nouvelle slide
      slides[currentIndex].classList.add('is-active');
      dots[currentIndex].classList.add('is-active');
    };

    // 3. Gestionnaires d'événements (Suivant / Précédent)
    const nextSlide = () => goToSlide(currentIndex + 1);
    const prevSlide = () => goToSlide(currentIndex - 1);

    if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetAutoplay(); });
    if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetAutoplay(); });

    // 4. Événements sur les dots
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        goToSlide(index);
        resetAutoplay();
      });
    });

    // 5. Autoplay de sécurité
    const startAutoplay = () => {
      slideInterval = setInterval(nextSlide, intervalTime);
    };

    const resetAutoplay = () => {
      clearInterval(slideInterval);
      startAutoplay();
    };

    // Lancement automatique
    startAutoplay();
  }
};

export default HeroSlider;
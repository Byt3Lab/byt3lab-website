// byt3lab-ui-system/src/js/modules/navbar.js
const Navbar = {
  init() {
    const navbar = document.querySelector(".c-navbar");
    const burger = document.querySelector(".c-navbar__burger");
    const menu = document.querySelector(".c-navbar__menu");
    const actions = document.querySelector(".c-navbar__actions"); // Ciblage du bouton contact
    const dropdownToggles = document.querySelectorAll(
      ".c-navbar__item--has-dropdown > .c-navbar__link, .c-navbar__dropdown-item--has-dropdown > .c-navbar__dropdown-link"
    );

    if (!navbar || !burger || !menu) return;

    // Gestion de l'ouverture/fermeture simultanée du menu et du bouton d'action
    burger.addEventListener("click", () => {
      menu.classList.toggle("is-active");
      burger.classList.toggle("is-active");
      if (actions) {
        actions.classList.toggle("is-active"); // Ouvre/Ferme le bouton de contact de manière fluide
      }
    });

    // Gestion de l'effet de scroll sur la navbar
    const handleScroll = () => {
      if (window.scrollY > 50) {
        navbar.classList.add("c-navbar--scrolled");
      } else {
        // Sur mobile, on garde la structure opaque cohérente si le menu est fermé
        if (window.innerWidth >= 992) {
          navbar.classList.remove("c-navbar--scrolled");
        }
      }
    };

    window.addEventListener("scroll", handleScroll);
    handleScroll();

    // Gestion de l'ouverture/fermeture des dropdowns sur mobile
    dropdownToggles.forEach(toggle => {
      toggle.addEventListener("click", (e) => {
        if (window.innerWidth < 992) { 
          e.preventDefault(); 
          const parentItem = toggle.parentElement;
          parentItem.classList.toggle("is-open");

          // Ferme les autres dropdowns du même niveau pour éviter les chevauchements
          Array.from(parentItem.parentNode.children).forEach(sibling => {
            if (sibling !== parentItem && sibling.classList.contains("is-open")) {
              sibling.classList.remove("is-open");
            }
          });
        }
      });
    });
  }
};

export default Navbar;
// ═══ Bootstrap core ═══
import { initBootstrap } from './core/app.js';

// ═══ Modules ═══
import Navbar from './modules/navbar.js';
import Modal from './modules/modal.js';
import Slider from './modules/slider.js';
import FormValidation from './modules/form-validation.js';
import HeroSlider from './modules/hero.js';
import Showcase from './modules/showcase.js';
import Testimonials from './modules/testimonials.js';
import Works from './modules/works.js';
import Counters from './modules/counters.js';
import BlogCatalog from './modules/blog-catalog.js';
import Lightbox from './modules/lightbox.js';

document.addEventListener('DOMContentLoaded', () => {
    initBootstrap();
    Navbar.init();
    HeroSlider.init();
    Showcase.init();
    Modal.init();
    Works.init();
    Slider.init();
    Counters.init();
    FormValidation.init();
    Testimonials.init();
    BlogCatalog.init();
    Lightbox.init();
});

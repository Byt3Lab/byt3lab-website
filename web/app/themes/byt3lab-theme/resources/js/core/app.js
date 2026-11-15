
// src/js/core/app.js
import * as bootstrap from 'bootstrap';

export const initBootstrap = () => {
    // Initialisation automatique des tooltips par exemple
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    [...tooltipTriggerList].map(tooltipTriggerEl => new Tooltip(tooltipTriggerEl));
}

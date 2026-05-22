import './bootstrap';

import Alpine from 'alpinejs';
import './export-report';
import Lightbox from './lightbox';

window.Alpine = Alpine;

Alpine.start();

// Initialize lightbox when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    window.lightbox = new Lightbox();
});

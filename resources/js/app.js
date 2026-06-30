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
let deferredInstallPrompt = null;

window.addEventListener('beforeinstallprompt', (event) => {
    event.preventDefault();
    deferredInstallPrompt = event;
    window.dispatchEvent(new CustomEvent('pwa-installable'));
});

window.addEventListener('appinstalled', () => {
    deferredInstallPrompt = null;
    window.dispatchEvent(new CustomEvent('pwa-installed'));
});

window.laravelPwaInstall = {
    canInstall() {
        return Boolean(deferredInstallPrompt);
    },
    isStandalone() {
        return window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true;
    },
    async showPrompt() {
        if (!deferredInstallPrompt) {
            return 'unavailable';
        }

        deferredInstallPrompt.prompt();
        const choiceResult = await deferredInstallPrompt.userChoice;
        deferredInstallPrompt = null;
        return choiceResult.outcome;
    },
};

if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js').catch(() => {});
    });
}


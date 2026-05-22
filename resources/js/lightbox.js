/**
 * Custom Lightbox with Pan & Zoom, Carousel, Backdrop Close
 */

class Lightbox {
    constructor() {
        this.overlay = null;
        this.currentIndex = 0;
        this.items = [];
        this.currentGroup = '';
        this.scale = 1;
        this.isPanning = false;
        this.startX = 0;
        this.startY = 0;
        this.translateX = 0;
        this.translateY = 0;
        this.lastTapTime = 0;

        this.init();
    }

    init() {
        // Create overlay element
        this.overlay = document.createElement('div');
        this.overlay.className = 'lightbox-overlay';
        this.overlay.innerHTML = `
            <button class="lightbox-close" aria-label="Close">&times;</button>
            <button class="lightbox-prev" aria-label="Previous">&lsaquo;</button>
            <button class="lightbox-next" aria-label="Next">&rsaquo;</button>
            <div class="lightbox-counter"></div>
            <div class="lightbox-content">
                <img class="lightbox-image" src="" alt="">
            </div>
        `;

        document.body.appendChild(this.overlay);

        // Bind events
        this.overlay.querySelector('.lightbox-close').addEventListener('click', (e) => {
            e.stopPropagation();
            this.close();
        });

        this.overlay.querySelector('.lightbox-prev').addEventListener('click', (e) => {
            e.stopPropagation();
            this.prev();
        });

        this.overlay.querySelector('.lightbox-next').addEventListener('click', (e) => {
            e.stopPropagation();
            this.next();
        });

        // Backdrop close (click on overlay background)
        this.overlay.addEventListener('click', (e) => {
            if (e.target === this.overlay) {
                this.close();
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!this.overlay.classList.contains('active')) return;
            if (e.key === 'Escape') this.close();
            if (e.key === 'ArrowLeft') this.prev();
            if (e.key === 'ArrowRight') this.next();
        });

        // Image zoom / pan events
        const img = this.overlay.querySelector('.lightbox-image');
        const content = this.overlay.querySelector('.lightbox-content');

        // Mouse wheel zoom
        content.addEventListener('wheel', (e) => {
            e.preventDefault();
            if (e.deltaY < 0) {
                this.zoomIn(e);
            } else {
                this.zoomOut(e);
            }
        }, { passive: false });

        // Mouse pan
        content.addEventListener('mousedown', (e) => {
            if (this.scale > 1) {
                this.isPanning = true;
                this.startX = e.clientX - this.translateX;
                this.startY = e.clientY - this.translateY;
                content.style.cursor = 'grabbing';
            }
        });

        document.addEventListener('mousemove', (e) => {
            if (this.isPanning) {
                this.translateX = e.clientX - this.startX;
                this.translateY = e.clientY - this.startY;
                this.applyTransform();
            }
        });

        document.addEventListener('mouseup', () => {
            this.isPanning = false;
            content.style.cursor = '';
        });

        // Touch events for mobile pinch zoom and pan
        let lastTouchDist = 0;
        let lastTouchX = 0;
        let lastTouchY = 0;

        content.addEventListener('touchstart', (e) => {
            if (e.touches.length === 2) {
                const dx = e.touches[0].clientX - e.touches[1].clientX;
                const dy = e.touches[0].clientY - e.touches[1].clientY;
                lastTouchDist = Math.sqrt(dx * dx + dy * dy);
            } else if (e.touches.length === 1) {
                if (this.scale > 1) {
                    lastTouchX = e.touches[0].clientX - this.translateX;
                    lastTouchY = e.touches[0].clientY - this.translateY;
                    this.isPanning = true;
                }
            }
        }, { passive: true });

        content.addEventListener('touchmove', (e) => {
            if (e.touches.length === 2) {
                e.preventDefault();
                const dx = e.touches[0].clientX - e.touches[1].clientX;
                const dy = e.touches[0].clientY - e.touches[1].clientY;
                const dist = Math.sqrt(dx * dx + dy * dy);
                const delta = dist - lastTouchDist;
                const zoomFactor = 1 + delta * 0.01;
                const newScale = Math.min(5, Math.max(1, this.scale * zoomFactor));
                // Zoom toward center of pinch
                const rect = content.getBoundingClientRect();
                const cx = (e.touches[0].clientX + e.touches[1].clientX) / 2;
                const cy = (e.touches[0].clientY + e.touches[1].clientY) / 2;
                const offsetX = (cx - rect.left - rect.width / 2);
                const offsetY = (cy - rect.top - rect.height / 2);
                this.scale = newScale;
                // Adjust translate to keep pinch center
                this.translateX = offsetX * (1 - this.scale / (this.scale / zoomFactor));
                this.translateY = offsetY * (1 - this.scale / (this.scale / zoomFactor));
                this.applyTransform();
                lastTouchDist = dist;
            } else if (e.touches.length === 1 && this.isPanning) {
                this.translateX = e.touches[0].clientX - lastTouchX;
                this.translateY = e.touches[0].clientY - lastTouchY;
                this.applyTransform();
            }
        }, { passive: true });

        content.addEventListener('touchend', (e) => {
            if (e.changedTouches.length === 1 && this.scale > 1) {
                // Double tap to zoom reset
                const currentTime = new Date().getTime();
                const tapLength = currentTime - this.lastTapTime;
                if (tapLength < 300 && tapLength > 0) {
                    this.resetZoom();
                }
                this.lastTapTime = currentTime;
            }
            this.isPanning = false;
            if (e.touches.length < 2) {
                lastTouchDist = 0;
            }
        }, { passive: true });

        // Hook into all images with data-lightbox
        this.bindImages();
    }

    bindImages() {
        document.addEventListener('click', (e) => {
            const img = e.target.closest('[data-lightbox]');
            if (!img) return;
            if (img.tagName !== 'IMG') return;
            e.preventDefault();

            const group = img.getAttribute('data-lightbox');
            const selector = `[data-lightbox="${group}"]`;

            this.items = Array.from(document.querySelectorAll(selector));
            this.currentGroup = group;
            this.currentIndex = this.items.indexOf(img);

            if (this.currentIndex === -1) return;

            this.open(this.currentIndex);
        });
    }

    open(index) {
        if (index < 0 || index >= this.items.length) return;
        this.currentIndex = index;
        this.resetZoom();

        const imgEl = this.items[index];
        const src = imgEl.getAttribute('src');
        const alt = imgEl.getAttribute('alt') || '';

        const img = this.overlay.querySelector('.lightbox-image');
        img.src = src;
        img.alt = alt;

        // Update counter
        const counter = this.overlay.querySelector('.lightbox-counter');
        counter.textContent = `${index + 1} / ${this.items.length}`;

        // Show/hide prev/next buttons
        const prevBtn = this.overlay.querySelector('.lightbox-prev');
        const nextBtn = this.overlay.querySelector('.lightbox-next');
        prevBtn.style.display = this.items.length > 1 ? '' : 'none';
        nextBtn.style.display = this.items.length > 1 ? '' : 'none';

        this.overlay.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Set image loaded state
        img.onload = () => {
            img.classList.add('loaded');
        };
        if (img.complete) {
            img.classList.add('loaded');
        }
    }

    close() {
        this.overlay.classList.remove('active');
        document.body.style.overflow = '';
        this.resetZoom();
    }

    prev() {
        if (this.items.length <= 1) return;
        this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
        this.open(this.currentIndex);
    }

    next() {
        if (this.items.length <= 1) return;
        this.currentIndex = (this.currentIndex + 1) % this.items.length;
        this.open(this.currentIndex);
    }

    zoomIn(e) {
        const newScale = Math.min(5, this.scale * 1.15);
        this.zoomTo(e, newScale);
    }

    zoomOut(e) {
        const newScale = Math.max(1, this.scale / 1.15);
        if (newScale <= 1 && this.scale <= 1) return;
        this.zoomTo(e, newScale);
    }

    zoomTo(e, newScale) {
        const content = this.overlay.querySelector('.lightbox-content');
        const rect = content.getBoundingClientRect();

        if (e) {
            const clientX = e.clientX || e.touches?.[0]?.clientX || rect.left + rect.width / 2;
            const clientY = e.clientY || e.touches?.[0]?.clientY || rect.top + rect.height / 2;

            const offsetX = (clientX - rect.left - rect.width / 2);
            const offsetY = (clientY - rect.top - rect.height / 2);

            const ratio = newScale / this.scale;
            this.translateX = offsetX - (offsetX - this.translateX) * ratio;
            this.translateY = offsetY - (offsetY - this.translateY) * ratio;
        } else {
            this.translateX = 0;
            this.translateY = 0;
        }

        this.scale = newScale;
        this.applyTransform();
    }

    resetZoom() {
        this.scale = 1;
        this.translateX = 0;
        this.translateY = 0;
        this.applyTransform();
    }

    applyTransform() {
        const img = this.overlay.querySelector('.lightbox-image');
        img.style.transform = `translate(${this.translateX}px, ${this.translateY}px) scale(${this.scale})`;
    }
}

// Export
export default Lightbox;
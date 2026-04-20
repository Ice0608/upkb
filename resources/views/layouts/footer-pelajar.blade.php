@once
    <style>
        .footer-ocean {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 12% 18%, rgba(251, 146, 60, 0.18), transparent 22%),
                radial-gradient(circle at 88% 14%, rgba(245, 158, 11, 0.18), transparent 24%),
                radial-gradient(circle at 50% -10%, rgba(255, 237, 213, 0.08), transparent 30%),
                linear-gradient(180deg, #130d0a 0%, #1d130e 36%, #120c09 100%);
        }

        .footer-ocean::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            background:
                linear-gradient(180deg, rgba(255, 247, 237, 0.04), rgba(28, 25, 23, 0.22)),
                repeating-linear-gradient(90deg, rgba(251, 191, 36, 0.035) 0 1px, transparent 1px 28px),
                repeating-linear-gradient(180deg, rgba(251, 191, 36, 0.02) 0 1px, transparent 1px 28px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.55), transparent 90%);
            pointer-events: none;
        }

        .footer-ocean::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(circle at 20% 26%, rgba(251, 191, 36, 0.12), transparent 18%),
                radial-gradient(circle at 78% 22%, rgba(249, 115, 22, 0.12), transparent 20%),
                radial-gradient(circle at 50% 8%, rgba(255, 247, 237, 0.08), transparent 22%);
            mix-blend-mode: screen;
            pointer-events: none;
        }

        .footer-particle-canvas {
            position: absolute;
            inset: 0;
            z-index: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            opacity: 0.9;
            mix-blend-mode: screen;
        }

        .footer-glow-orb {
            position: absolute;
            z-index: 0;
            border-radius: 999px;
            pointer-events: none;
            mix-blend-mode: screen;
            opacity: 0.45;
            will-change: transform, opacity;
        }

        .footer-glow-orb--left {
            top: 2.5rem;
            left: -3rem;
            width: 15rem;
            height: 15rem;
            background: radial-gradient(circle, rgba(251, 146, 60, 0.28), rgba(251, 146, 60, 0));
            animation: footerOrbFloat 16s ease-in-out infinite;
        }

        .footer-glow-orb--right {
            top: 1rem;
            right: -2rem;
            width: 13rem;
            height: 13rem;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.25), rgba(245, 158, 11, 0));
            animation: footerOrbFloatReverse 18s ease-in-out infinite;
        }

        .footer-content {
            position: relative;
            z-index: 1;
        }

        .footer-brand-link {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }

        .footer-brand-logo,
        .footer-brand-title,
        .footer-brand-subtitle {
            transition: transform 0.35s ease, color 0.35s ease, text-shadow 0.35s ease, filter 0.35s ease;
        }

        .footer-brand-logo {
            transform-origin: center;
        }

        .footer-brand-link:hover .footer-brand-logo,
        .footer-brand-link:focus-visible .footer-brand-logo {
            transform: translateY(-4px) rotate(-6deg) scale(1.08);
            filter: drop-shadow(0 10px 16px rgba(251, 146, 60, 0.28));
        }

        .footer-brand-link:hover .footer-brand-title,
        .footer-brand-link:focus-visible .footer-brand-title {
            transform: translateX(4px);
            color: #fdba74;
            text-shadow: 0 0 18px rgba(251, 146, 60, 0.18);
        }

        .footer-brand-link:hover .footer-brand-subtitle,
        .footer-brand-link:focus-visible .footer-brand-subtitle {
            transform: translateX(6px);
            color: #e5e7eb;
        }

        .footer-brand-link:focus-visible {
            outline: 2px solid rgba(251, 146, 60, 0.75);
            outline-offset: 6px;
            border-radius: 0.75rem;
        }

        @keyframes footerOrbFloat {
            0%, 100% { transform: translate3d(0, 0, 0) scale(1); opacity: 0.34; }
            50% { transform: translate3d(2rem, 1rem, 0) scale(1.08); opacity: 0.56; }
        }

        @keyframes footerOrbFloatReverse {
            0%, 100% { transform: translate3d(0, 0, 0) scale(1); opacity: 0.26; }
            50% { transform: translate3d(-1.5rem, 1.25rem, 0) scale(1.12); opacity: 0.48; }
        }

        @media (prefers-reduced-motion: reduce) {
            .footer-glow-orb,
            .footer-brand-logo,
            .footer-brand-title,
            .footer-brand-subtitle {
                transition: none;
                animation: none;
            }
        }
    </style>
@endonce

<footer class="footer-ocean mt-16 text-gray-300">
    <canvas class="footer-particle-canvas" data-footer-particles aria-hidden="true"></canvas>
    <div class="footer-glow-orb footer-glow-orb--left" aria-hidden="true"></div>
    <div class="footer-glow-orb footer-glow-orb--right" aria-hidden="true"></div>

    <div class="footer-content max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-10">
        <div>
            <a href="{{ url('/') }}" class="footer-brand-link mb-4">
                <img src="{{ asset('images/icon/logo.jpeg') }}" class="footer-brand-logo h-12" alt="logo">
                <div>
                    <h2 class="footer-brand-title text-lg font-bold text-white">UPKB</h2>
                    <p class="footer-brand-subtitle text-sm text-gray-400">Pusat maklumat program & pengambilan</p>
                </div>
            </a>
            <p class="text-sm text-gray-400 leading-relaxed">Bantu pelajar dan ibu bapa melihat pilihan pusat, program, kuota semasa dan maklumat penting dengan lebih jelas dalam satu tempat.</p>
        </div>
        <div>
            <h3 class="font-semibold text-white mb-4">Pautan Pantas</h3>
            <div class="grid grid-cols-2 gap-2 text-sm">
                <a href="{{ route('program') }}" class="hover:text-orange-400">Program</a>
                <a href="{{ route('faq') }}" class="hover:text-orange-400">Soalan Lazim</a>
                <a href="{{ route('hubungi') }}" class="hover:text-orange-400">Hubungi Kami</a>
            </div>
        </div>
        <div>
            <h3 class="font-semibold text-white mb-4">Hubungi Kami</h3>
            <ul class="space-y-3 text-sm text-gray-400">
                <li><p>+6017 921 5543</p></li>
                <li><p>info@upkb.my</p></li>
                <li><p>34 Jalan MPK 4 Taman Bukit Kepayang, Seremban</p></li>
            </ul>
        </div>
    </div>
    <div class="footer-content border-t border-white/10"></div>
    <div class="footer-content max-w-7xl mx-auto px-6 py-4 flex justify-between items-center text-sm">
        <p class="text-gray-400">© {{ date('Y') }} Unit Pembangunan Kemahiran Belia.</p>
    </div>
</footer>

@once
    <script>
        (() => {
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
            let footerParticlesInitialized = false;

            const initFooterParticles = () => {
                if (footerParticlesInitialized) return;

                const canvas = document.querySelector('[data-footer-particles]');
                if (!canvas) return;

                const footer = canvas.closest('.footer-ocean');
                if (!footer) return;

                const ctx = canvas.getContext('2d');
                if (!ctx) return;

                let particles = [];
                let animationId = null;
                let width = 0;
                let height = 0;
                let dpr = Math.min(window.devicePixelRatio || 1, 2);
                let shimmerOffset = 0;
                let resizeFrame = null;

                footerParticlesInitialized = true;

                const makeParticle = () => ({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    vx: (Math.random() - 0.5) * 0.42,
                    vy: (Math.random() - 0.5) * 0.28,
                    radius: Math.random() * 1.8 + 1,
                    pulse: Math.random() * Math.PI * 2,
                    layer: Math.random() * 0.6 + 0.7,
                });

                const buildParticles = () => {
                    const count = Math.max(28, Math.min(64, Math.floor(width / 26)));
                    particles = Array.from({ length: count }, makeParticle);
                };

                const resize = () => {
                    const rect = footer.getBoundingClientRect();
                    width = Math.max(1, Math.floor(rect.width));
                    height = Math.max(1, Math.floor(rect.height));
                    dpr = Math.min(window.devicePixelRatio || 1, 2);

                    canvas.width = Math.floor(width * dpr);
                    canvas.height = Math.floor(height * dpr);
                    canvas.style.width = `${width}px`;
                    canvas.style.height = `${height}px`;

                    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
                    buildParticles();
                };

                const queueResize = () => {
                    if (resizeFrame) {
                        window.cancelAnimationFrame(resizeFrame);
                    }

                    resizeFrame = window.requestAnimationFrame(() => {
                        resize();
                        resizeFrame = null;
                    });
                };

                const draw = () => {
                    ctx.clearRect(0, 0, width, height);
                    shimmerOffset += 0.008;

                    const meshGradient = ctx.createLinearGradient(0, 0, width, height);
                    meshGradient.addColorStop(0, 'rgba(251, 191, 36, 0.08)');
                    meshGradient.addColorStop(0.5, 'rgba(249, 115, 22, 0.025)');
                    meshGradient.addColorStop(1, 'rgba(234, 88, 12, 0.06)');
                    ctx.fillStyle = meshGradient;
                    ctx.fillRect(0, 0, width, height);

                    for (let i = 0; i < particles.length; i += 1) {
                        const p = particles[i];
                        p.pulse += 0.018 * p.layer;
                        p.x += p.vx * p.layer;
                        p.y += p.vy * p.layer;

                        if (p.x < -30 || p.x > width + 30) p.vx *= -1;
                        if (p.y < -30 || p.y > height + 30) p.vy *= -1;

                        const pulseStrength = (Math.sin(p.pulse) + 1) / 2;
                        const nodeRadius = p.radius + pulseStrength * 0.9;

                        for (let j = i + 1; j < particles.length; j += 1) {
                            const q = particles[j];
                            const dx = p.x - q.x;
                            const dy = p.y - q.y;
                            const distance = Math.hypot(dx, dy);

                            if (distance < 154) {
                                const alpha = (1 - distance / 154) * 0.34;
                                const midX = (p.x + q.x) / 2;
                                const midY = (p.y + q.y) / 2;
                                const edgeGradient = ctx.createLinearGradient(p.x, p.y, q.x, q.y);
                                edgeGradient.addColorStop(0, `rgba(255, 247, 237, ${alpha * 0.95})`);
                                edgeGradient.addColorStop(0.5, `rgba(251, 191, 36, ${alpha * (0.5 + pulseStrength * 0.35)})`);
                                edgeGradient.addColorStop(1, `rgba(249, 115, 22, ${alpha * 0.82})`);

                                ctx.strokeStyle = edgeGradient;
                                ctx.lineWidth = distance < 72 ? 1.2 : 0.85;
                                ctx.beginPath();
                                ctx.moveTo(p.x, p.y);
                                ctx.quadraticCurveTo(
                                    midX + Math.sin(shimmerOffset + i) * 8,
                                    midY + Math.cos(shimmerOffset + j) * 8,
                                    q.x,
                                    q.y
                                );
                                ctx.stroke();
                            }
                        }

                        const haloGradient = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, nodeRadius * 10);
                        haloGradient.addColorStop(0, `rgba(255, 255, 255, ${0.2 + pulseStrength * 0.14})`);
                        haloGradient.addColorStop(0.3, `rgba(251, 191, 36, ${0.24 + pulseStrength * 0.14})`);
                        haloGradient.addColorStop(1, 'rgba(251, 191, 36, 0)');

                        ctx.fillStyle = haloGradient;
                        ctx.beginPath();
                        ctx.arc(p.x, p.y, nodeRadius * 10, 0, Math.PI * 2);
                        ctx.fill();

                        ctx.fillStyle = `rgba(255, 237, 213, ${0.72 + pulseStrength * 0.22})`;
                        ctx.beginPath();
                        ctx.arc(p.x, p.y, nodeRadius, 0, Math.PI * 2);
                        ctx.fill();

                        ctx.fillStyle = `rgba(255, 255, 255, ${0.55 + pulseStrength * 0.35})`;
                        ctx.beginPath();
                        ctx.arc(p.x, p.y, Math.max(0.7, nodeRadius * 0.4), 0, Math.PI * 2);
                        ctx.fill();
                    }

                    animationId = window.requestAnimationFrame(draw);
                };

                const stop = () => {
                    if (animationId) {
                        window.cancelAnimationFrame(animationId);
                        animationId = null;
                    }

                    if (resizeFrame) {
                        window.cancelAnimationFrame(resizeFrame);
                        resizeFrame = null;
                    }

                    ctx.clearRect(0, 0, width, height);
                };

                const start = () => {
                    stop();
                    resize();
                    if (!prefersReducedMotion.matches) {
                        draw();
                    }
                };

                start();
                window.addEventListener('resize', queueResize, { passive: true });

                if (typeof ResizeObserver !== 'undefined') {
                    const observer = new ResizeObserver(queueResize);
                    observer.observe(footer);
                }

                if (typeof prefersReducedMotion.addEventListener === 'function') {
                    prefersReducedMotion.addEventListener('change', start);
                } else if (typeof prefersReducedMotion.addListener === 'function') {
                    prefersReducedMotion.addListener(start);
                }
            };

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initFooterParticles, { once: true });
            } else {
                initFooterParticles();
            }

            window.addEventListener('load', initFooterParticles, { once: true });
        })();
    </script>
@endonce
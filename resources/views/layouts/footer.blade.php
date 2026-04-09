@once
    <style>
        .footer-ocean {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 12% 18%, rgba(34, 211, 238, 0.18), transparent 22%),
                radial-gradient(circle at 88% 14%, rgba(59, 130, 246, 0.18), transparent 24%),
                radial-gradient(circle at 50% -10%, rgba(255, 255, 255, 0.08), transparent 30%),
                linear-gradient(180deg, #081120 0%, #0d1728 36%, #0a1220 100%);
        }

        .footer-ocean::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.03), rgba(15, 23, 42, 0.2)),
                repeating-linear-gradient(90deg, rgba(148, 163, 184, 0.04) 0 1px, transparent 1px 28px),
                repeating-linear-gradient(180deg, rgba(148, 163, 184, 0.025) 0 1px, transparent 1px 28px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.55), transparent 90%);
            pointer-events: none;
        }

        .footer-ocean::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(circle at 20% 26%, rgba(125, 211, 252, 0.12), transparent 18%),
                radial-gradient(circle at 78% 22%, rgba(56, 189, 248, 0.12), transparent 20%),
                radial-gradient(circle at 50% 8%, rgba(255, 255, 255, 0.06), transparent 22%);
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
            background: radial-gradient(circle, rgba(34, 211, 238, 0.28), rgba(34, 211, 238, 0));
            animation: footerOrbFloat 16s ease-in-out infinite;
        }

        .footer-glow-orb--right {
            top: 1rem;
            right: -2rem;
            width: 13rem;
            height: 13rem;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.25), rgba(59, 130, 246, 0));
            animation: footerOrbFloatReverse 18s ease-in-out infinite;
        }

        .footer-wave-layer {
            position: absolute;
            left: -10%;
            z-index: 0;
            width: 120%;
            min-width: 960px;
            pointer-events: none;
            will-change: transform;
        }

        .footer-wave-layer svg {
            display: block;
            width: 100%;
            height: auto;
        }

        .footer-wave-back {
            bottom: 90px;
            opacity: 0.24;
            animation: footerWaveDrift 12s linear infinite;
        }

        .footer-wave-mid {
            bottom: 40px;
            opacity: 0.18;
            animation: footerWaveDriftReverse 16s linear infinite;
        }

        .footer-wave-front {
            bottom: -10px;
            opacity: 0.14;
            animation: footerWaveDrift 9s linear infinite;
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

        @keyframes footerWaveDrift {
            0% { transform: translateX(0); }
            50% { transform: translateX(-5%); }
            100% { transform: translateX(0); }
        }

        @keyframes footerWaveDriftReverse {
            0% { transform: translateX(-3%); }
            50% { transform: translateX(3%); }
            100% { transform: translateX(-3%); }
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
            .footer-wave-layer,
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

    <div class="footer-wave-layer footer-wave-back" aria-hidden="true">
        <svg viewBox="0 0 1440 220" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 118L60 111.7C120 105.3 240 92.7 360 100.5C480 108.3 600 136.7 720 140.2C840 143.7 960 122.3 1080 105.3C1200 88.3 1320 75.7 1380 69.3L1440 63V220H1380C1320 220 1200 220 1080 220C960 220 840 220 720 220C600 220 480 220 360 220C240 220 120 220 60 220H0V118Z" fill="url(#footerWaveBack)" />
            <defs>
                <linearGradient id="footerWaveBack" x1="720" y1="63" x2="720" y2="220" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#67E8F9" />
                    <stop offset="1" stop-color="#0EA5E9" stop-opacity="0.16" />
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="footer-wave-layer footer-wave-mid" aria-hidden="true">
        <svg viewBox="0 0 1440 220" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 121L80 128.3C160 135.7 320 150.3 480 144.3C640 138.3 800 111.7 960 103.8C1120 96 1280 106.8 1360 112.2L1440 117.7V220H1360C1280 220 1120 220 960 220C800 220 640 220 480 220C320 220 160 220 80 220H0V121Z" fill="url(#footerWaveMid)" />
            <defs>
                <linearGradient id="footerWaveMid" x1="720" y1="96" x2="720" y2="220" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#A5F3FC" />
                    <stop offset="1" stop-color="#38BDF8" stop-opacity="0.12" />
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="footer-wave-layer footer-wave-front" aria-hidden="true">
        <svg viewBox="0 0 1440 220" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 144L48 137.8C96 131.7 192 119.3 288 111.8C384 104.3 480 101.7 576 109.8C672 118 768 137 864 138.7C960 140.3 1056 124.7 1152 117.2C1248 109.7 1344 110.3 1392 110.7L1440 111V220H1392C1344 220 1248 220 1152 220C1056 220 960 220 864 220C768 220 672 220 576 220C480 220 384 220 288 220C192 220 96 220 48 220H0V144Z" fill="url(#footerWaveFront)" />
            <defs>
                <linearGradient id="footerWaveFront" x1="720" y1="101" x2="720" y2="220" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#E0F2FE" />
                    <stop offset="1" stop-color="#67E8F9" stop-opacity="0.08" />
                </linearGradient>
            </defs>
        </svg>
    </div>

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
                <li>+6017 921 5543</li>
                <li>info@upkb.my</li>
                <li>34 Jalan MPK 4 Taman Bukit Kepayang, Seremban</li>
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
                    meshGradient.addColorStop(0, 'rgba(125, 211, 252, 0.08)');
                    meshGradient.addColorStop(0.5, 'rgba(56, 189, 248, 0.025)');
                    meshGradient.addColorStop(1, 'rgba(59, 130, 246, 0.06)');
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
                                edgeGradient.addColorStop(0, `rgba(224, 242, 254, ${alpha * 0.95})`);
                                edgeGradient.addColorStop(0.5, `rgba(125, 211, 252, ${alpha * (0.5 + pulseStrength * 0.35)})`);
                                edgeGradient.addColorStop(1, `rgba(56, 189, 248, ${alpha * 0.82})`);

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
                        haloGradient.addColorStop(0.3, `rgba(103, 232, 249, ${0.24 + pulseStrength * 0.14})`);
                        haloGradient.addColorStop(1, 'rgba(103, 232, 249, 0)');

                        ctx.fillStyle = haloGradient;
                        ctx.beginPath();
                        ctx.arc(p.x, p.y, nodeRadius * 10, 0, Math.PI * 2);
                        ctx.fill();

                        ctx.fillStyle = `rgba(224, 242, 254, ${0.72 + pulseStrength * 0.22})`;
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


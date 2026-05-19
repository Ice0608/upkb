@once
    <style>
        .footer-ocean {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 12% 18%, rgba(0, 188, 212, 0.18), transparent 22%),
                radial-gradient(circle at 88% 14%, rgba(0, 230, 118, 0.18), transparent 24%),
                radial-gradient(circle at 50% -10%, rgba(0, 229, 255, 0.08), transparent 30%),
                linear-gradient(180deg, #130d0a 0%, #1d130e 36%, #120c09 100%);
        }

        .footer-ocean--tvet {
            background:
                radial-gradient(circle at 12% 18%, rgba(0, 188, 212, 0.18), transparent 22%),
                radial-gradient(circle at 88% 14%, rgba(0, 230, 118, 0.18), transparent 24%),
                radial-gradient(circle at 50% -10%, rgba(0, 229, 255, 0.08), transparent 30%),
                linear-gradient(180deg, #130d0a 0%, #1d130e 36%, #120c09 100%);
        }

        .footer-ocean--diploma {
            background:
                radial-gradient(circle at 12% 18%, rgba(192, 132, 252, 0.2), transparent 22%),
                radial-gradient(circle at 88% 14%, rgba(141, 43, 226, 0.22), transparent 24%),
                radial-gradient(circle at 50% -10%, rgba(245, 243, 255, 0.08), transparent 30%),
                linear-gradient(180deg, #170a22 0%, #231136 36%, #12091d 100%);
        }

        .footer-ocean--sains-kesihatan {
            background:
                radial-gradient(circle at 12% 18%, rgba(96, 165, 250, 0.2), transparent 22%),
                radial-gradient(circle at 88% 14%, rgba(33, 150, 243, 0.22), transparent 24%),
                radial-gradient(circle at 50% -10%, rgba(219, 234, 254, 0.08), transparent 30%),
                linear-gradient(180deg, #081a2d 0%, #0d2238 36%, #071426 100%);
        }

        .footer-ocean::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            background:
                linear-gradient(180deg, rgba(0, 229, 255, 0.04), rgba(15, 23, 42, 0.22)),
                repeating-linear-gradient(90deg, rgba(0, 188, 212, 0.035) 0 1px, transparent 1px 28px),
                repeating-linear-gradient(180deg, rgba(0, 230, 118, 0.02) 0 1px, transparent 1px 28px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.55), transparent 90%);
            pointer-events: none;
        }

        .footer-ocean::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(circle at 20% 26%, rgba(0, 230, 118, 0.12), transparent 18%),
                radial-gradient(circle at 78% 22%, rgba(0, 188, 212, 0.12), transparent 20%),
                radial-gradient(circle at 50% 8%, rgba(0, 229, 255, 0.08), transparent 22%);
            mix-blend-mode: screen;
            pointer-events: none;
        }

        .footer-ocean--tvet::before {
            background:
                linear-gradient(180deg, rgba(0, 229, 255, 0.04), rgba(15, 23, 42, 0.22)),
                repeating-linear-gradient(90deg, rgba(0, 188, 212, 0.035) 0 1px, transparent 1px 28px),
                repeating-linear-gradient(180deg, rgba(0, 230, 118, 0.02) 0 1px, transparent 1px 28px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.55), transparent 90%);
            pointer-events: none;
        }

        .footer-ocean--tvet::after {
            background:
                radial-gradient(circle at 20% 26%, rgba(0, 230, 118, 0.12), transparent 18%),
                radial-gradient(circle at 78% 22%, rgba(0, 188, 212, 0.12), transparent 20%),
                radial-gradient(circle at 50% 8%, rgba(0, 229, 255, 0.08), transparent 22%);
            mix-blend-mode: screen;
            pointer-events: none;
        }

        .footer-ocean--diploma::before {
            background:
                linear-gradient(180deg, rgba(245, 243, 255, 0.04), rgba(23, 10, 34, 0.22)),
                repeating-linear-gradient(90deg, rgba(192, 132, 252, 0.035) 0 1px, transparent 1px 28px),
                repeating-linear-gradient(180deg, rgba(192, 132, 252, 0.02) 0 1px, transparent 1px 28px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.55), transparent 90%);
            pointer-events: none;
        }

        .footer-ocean--diploma::after {
            background:
                radial-gradient(circle at 20% 26%, rgba(141, 43, 226, 0.14), transparent 18%),
                radial-gradient(circle at 78% 22%, rgba(192, 132, 252, 0.12), transparent 20%),
                radial-gradient(circle at 50% 8%, rgba(245, 243, 255, 0.08), transparent 22%);
            mix-blend-mode: screen;
            pointer-events: none;
        }

        .footer-ocean--sains-kesihatan::before {
            background:
                linear-gradient(180deg, rgba(219, 234, 254, 0.04), rgba(8, 26, 45, 0.22)),
                repeating-linear-gradient(90deg, rgba(96, 165, 250, 0.035) 0 1px, transparent 1px 28px),
                repeating-linear-gradient(180deg, rgba(96, 165, 250, 0.02) 0 1px, transparent 1px 28px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.55), transparent 90%);
            pointer-events: none;
        }

        .footer-ocean--sains-kesihatan::after {
            background:
                radial-gradient(circle at 20% 26%, rgba(33, 150, 243, 0.14), transparent 18%),
                radial-gradient(circle at 78% 22%, rgba(96, 165, 250, 0.12), transparent 20%),
                radial-gradient(circle at 50% 8%, rgba(219, 234, 254, 0.08), transparent 22%);
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
            background: radial-gradient(circle, rgba(0, 188, 212, 0.28), rgba(0, 188, 212, 0));
            animation: footerOrbFloat 16s ease-in-out infinite;
        }

        .footer-glow-orb--right {
            top: 1rem;
            right: -2rem;
            width: 13rem;
            height: 13rem;
            background: radial-gradient(circle, rgba(0, 230, 118, 0.25), rgba(0, 230, 118, 0));
            animation: footerOrbFloatReverse 18s ease-in-out infinite;
        }

        .footer-ocean--tvet .footer-glow-orb--left {
            background: radial-gradient(circle, rgba(0, 188, 212, 0.28), rgba(0, 188, 212, 0));
        }

        .footer-ocean--tvet .footer-glow-orb--right {
            background: radial-gradient(circle, rgba(0, 230, 118, 0.25), rgba(0, 230, 118, 0));
        }

        .footer-ocean--diploma .footer-glow-orb--left {
            background: radial-gradient(circle, rgba(141, 43, 226, 0.28), rgba(141, 43, 226, 0));
        }

        .footer-ocean--diploma .footer-glow-orb--right {
            background: radial-gradient(circle, rgba(192, 132, 252, 0.25), rgba(192, 132, 252, 0));
        }

        .footer-ocean--sains-kesihatan .footer-glow-orb--left {
            background: radial-gradient(circle, rgba(33, 150, 243, 0.28), rgba(33, 150, 243, 0));
        }

        .footer-ocean--sains-kesihatan .footer-glow-orb--right {
            background: radial-gradient(circle, rgba(96, 165, 250, 0.25), rgba(96, 165, 250, 0));
        }

        .footer-ocean--tvet a:hover { color: #00e5ff; }
        .footer-ocean--diploma a:hover { color: #c084fc; }
        .footer-ocean--sains-kesihatan a:hover { color: #60a5fa; }

        .footer-nav-link {
            transition: color 0.2s ease;
        }
        .footer-ocean .footer-nav-link:hover { color: #00e5ff; }
        .footer-ocean--tvet .footer-nav-link:hover { color: #00e5ff; }
        .footer-ocean--diploma .footer-nav-link:hover { color: #c084fc; }
        .footer-ocean--sains-kesihatan .footer-nav-link:hover { color: #60a5fa; }

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
            filter: drop-shadow(0 10px 16px rgba(0, 188, 212, 0.28));
        }

        .footer-brand-link:hover .footer-brand-title,
        .footer-brand-link:focus-visible .footer-brand-title {
            transform: translateX(4px);
            color: #00e5ff;
            text-shadow: 0 0 18px rgba(0, 188, 212, 0.18);
        }

        .footer-brand-link:hover .footer-brand-subtitle,
        .footer-brand-link:focus-visible .footer-brand-subtitle {
            transform: translateX(6px);
            color: #e5e7eb;
        }

        .footer-brand-link:focus-visible {
            outline: 2px solid rgba(0, 188, 212, 0.75);
            outline-offset: 6px;
            border-radius: 0.75rem;
        }

        .footer-ocean--tvet .footer-brand-link:hover .footer-brand-logo,
        .footer-ocean--tvet .footer-brand-link:focus-visible .footer-brand-logo {
            filter: drop-shadow(0 10px 16px rgba(0, 188, 212, 0.28));
        }

        .footer-ocean--tvet .footer-brand-link:hover .footer-brand-title,
        .footer-ocean--tvet .footer-brand-link:focus-visible .footer-brand-title {
            color: #00e5ff;
            text-shadow: 0 0 18px rgba(0, 188, 212, 0.18);
        }

        .footer-ocean--tvet .footer-brand-link:focus-visible {
            outline: 2px solid rgba(0, 188, 212, 0.75);
        }

        .footer-ocean--diploma .footer-brand-link:hover .footer-brand-logo,
        .footer-ocean--diploma .footer-brand-link:focus-visible .footer-brand-logo {
            filter: drop-shadow(0 10px 16px rgba(141, 43, 226, 0.28));
        }

        .footer-ocean--diploma .footer-brand-link:hover .footer-brand-title,
        .footer-ocean--diploma .footer-brand-link:focus-visible .footer-brand-title {
            color: #c084fc;
            text-shadow: 0 0 18px rgba(141, 43, 226, 0.18);
        }

        .footer-ocean--diploma .footer-brand-link:focus-visible {
            outline: 2px solid rgba(141, 43, 226, 0.75);
        }

        .footer-ocean--sains-kesihatan .footer-brand-link:hover .footer-brand-logo,
        .footer-ocean--sains-kesihatan .footer-brand-link:focus-visible .footer-brand-logo {
            filter: drop-shadow(0 10px 16px rgba(33, 150, 243, 0.28));
        }

        .footer-ocean--sains-kesihatan .footer-brand-link:hover .footer-brand-title,
        .footer-ocean--sains-kesihatan .footer-brand-link:focus-visible .footer-brand-title {
            color: #60a5fa;
            text-shadow: 0 0 18px rgba(33, 150, 243, 0.18);
        }

        .footer-ocean--sains-kesihatan .footer-brand-link:focus-visible {
            outline: 2px solid rgba(33, 150, 243, 0.75);
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

@php
    $footerProgramType = strtolower((string) (
        request('jenis')
        ?? request()->route('nama')
        ?? ($heroProgramType ?? null)
        ?? ($detailProgramType ?? null)
        ?? ($institusiProgramType ?? null)
        ?? ($institusiInfoType ?? null)
        ?? optional($selectedProgram ?? null)->jenis_program
        ?? optional($institusi ?? null)->jenis_institusi
        ?? optional(optional($kursus ?? null)->institusi)->jenis_institusi
    ));

    $footerThemeClass = '';

    if ($footerProgramType === 'tvet') {
        $footerThemeClass = 'footer-ocean--tvet';
    } elseif ($footerProgramType === 'diploma') {
        $footerThemeClass = 'footer-ocean--diploma';
    } elseif ($footerProgramType === 'sains kesihatan') {
        $footerThemeClass = 'footer-ocean--sains-kesihatan';
    }

    // Keep FAQ/Hubungi/Program/Home/Institusi pages on the default footer theme even without program params.
    if ($footerThemeClass === '' && (
        request()->routeIs('faq', 'hubungi', 'program', 'home', 'institusi', 'institusi.show')
        || request()->is('/')
    )) {
        $footerThemeClass = 'footer-ocean--tvet';
    }
@endphp

<footer class="footer-ocean {{ $footerThemeClass }} mt-16 text-gray-300">
    <canvas class="footer-particle-canvas" data-footer-particles aria-hidden="true"></canvas>
    <div class="footer-glow-orb footer-glow-orb--left" aria-hidden="true"></div>
    <div class="footer-glow-orb footer-glow-orb--right" aria-hidden="true"></div>

    <div class="footer-content max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-10">
        <div>
            <a href="{{ url('/') }}" class="footer-brand-link mb-4">
                <img src="{{ asset('images/icon/seslogo.png') }}" class="footer-brand-logo h-12" alt="logo">
                <div>
                    <h2 class="footer-brand-title text-lg font-bold text-white">SES</h2>
                </div>
            </a>
            <p class="text-sm text-gray-400 leading-relaxed">SES bertindak sebagai "ONE STOP CENTRE" menyediakan bimbingan yang lengkap untuk pendidikan, pemilihan program sehingga perancangan kerjaya untuk masa hadapan.</p>
        </div>
        <div>
            <h3 class="font-semibold text-white mb-4">Pautan Pantas</h3>
            <div class="grid grid-cols-2 gap-2 text-sm">
                <a href="{{ route('program') }}" class="footer-nav-link">Program</a>
                <a href="{{ route('faq') }}" class="footer-nav-link">Soalan Lazim</a>
                <a href="{{ route('hubungi') }}" class="footer-nav-link">Hubungi Kami</a>
            </div>
        </div>
        <div>
            <h3 class="font-semibold text-white mb-4">Hubungi Kami</h3>
            <ul class="space-y-3 text-sm text-gray-400">
                <li><p>+6011 2672 5795</p></li>
                <li><p>sesoclegacy@gmail.com</p></li>
                <li><p>sesoc.com.my</p></li>
                <li><p>No 34, Jalan MPK 4, Taman Bukit Kepayang, 70300 Seremban, Negeri Sembilan</p></li>
            </ul>
        </div>
    </div>
    <div class="footer-content border-t border-white/10"></div>
    <div class="footer-content max-w-7xl mx-auto px-6 py-4 flex justify-between items-center text-sm">
        <p class="text-gray-400">© {{ date('Y') }} SMART Education Society</p>
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

                    const isTvetTheme = footer.classList.contains('footer-ocean--tvet');
                    const footerPalette = isTvetTheme
                        ? {
                            meshStart: 'rgba(0, 230, 118, 0.1)',
                            meshMid: 'rgba(0, 188, 212, 0.04)',
                            meshEnd: 'rgba(21, 101, 192, 0.08)',
                            edgeMid: '0, 230, 118',
                            edgeEnd: '0, 188, 212',
                            halo: '0, 188, 212',
                            node: '0, 229, 255',
                        }
                        : {
                            meshStart: 'rgba(0, 230, 118, 0.08)',
                            meshMid: 'rgba(0, 188, 212, 0.025)',
                            meshEnd: 'rgba(21, 101, 192, 0.06)',
                            edgeMid: '0, 230, 118',
                            edgeEnd: '0, 188, 212',
                            halo: '0, 188, 212',
                            node: '0, 229, 255',
                        };

                    const meshGradient = ctx.createLinearGradient(0, 0, width, height);
                    meshGradient.addColorStop(0, footerPalette.meshStart);
                    meshGradient.addColorStop(0.5, footerPalette.meshMid);
                    meshGradient.addColorStop(1, footerPalette.meshEnd);
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
                                edgeGradient.addColorStop(0.5, `rgba(${footerPalette.edgeMid}, ${alpha * (0.5 + pulseStrength * 0.35)})`);
                                edgeGradient.addColorStop(1, `rgba(${footerPalette.edgeEnd}, ${alpha * 0.82})`);

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
                        haloGradient.addColorStop(0.3, `rgba(${footerPalette.halo}, ${0.24 + pulseStrength * 0.14})`);
                        haloGradient.addColorStop(1, `rgba(${footerPalette.halo}, 0)`);

                        ctx.fillStyle = haloGradient;
                        ctx.beginPath();
                        ctx.arc(p.x, p.y, nodeRadius * 10, 0, Math.PI * 2);
                        ctx.fill();

                        ctx.fillStyle = `rgba(${footerPalette.node}, ${0.72 + pulseStrength * 0.22})`;
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

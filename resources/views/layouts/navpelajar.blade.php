@once
    <style>

        .site-nav {
            position: sticky;
            top: 0;
            z-index: 50;
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: saturate(180%) blur(16px);
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        }

        .site-nav::after {
            content: "";
            position: absolute;
            inset: auto 0 0;
            height: 2px;
            background: linear-gradient(90deg, rgba(0, 230, 118, 0.14), rgba(0, 188, 212, 0.95), rgba(30, 136, 229, 0.14));
        }

        .site-nav-brand,
        .site-nav-link,
        .site-nav-login,
        .site-nav-program-panel,
        .site-nav-mobile-panel,
        .site-nav-menu-icon {
            transition: transform 0.25s ease, color 0.25s ease, background-color 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease, opacity 0.25s ease;
        }

        .site-nav-brand:hover {
            transform: translateY(-1px);
        }

        .site-nav-brand {
            position: relative;
            overflow: hidden;
            padding: 0.7rem 0.95rem 0.7rem 0.7rem;
            border: 1px solid rgba(0, 188, 212, 0.16);
            background: linear-gradient(135deg, rgba(236, 253, 245, 0.82), rgba(255, 255, 255, 0.97) 52%, rgba(240, 249, 255, 0.9));
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            backdrop-filter: blur(10px);
        }

        .site-nav-brand:hover {
            border-color: rgba(0, 188, 212, 0.28);
            box-shadow: 0 16px 34px rgba(0, 188, 212, 0.12);
        }

        .site-nav-brand::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(0, 230, 118, 0.2), transparent 34%),
                radial-gradient(circle at bottom right, rgba(0, 188, 212, 0.14), transparent 32%);
            pointer-events: none;
        }

        .site-nav-brand::after {
            content: "";
            position: absolute;
            left: 4.4rem;
            right: 1rem;
            bottom: 0.58rem;
            height: 1px;
            background: linear-gradient(90deg, rgba(0, 188, 212, 0.32), rgba(0, 188, 212, 0));
            pointer-events: none;
        }

        .site-nav-brand-badge {
            position: relative;
            overflow: hidden;
            box-shadow: 0 14px 34px rgba(0, 188, 212, 0.16);
        }

        .site-nav-brand-badge::before {
            content: "";
            position: absolute;
            inset: 1px;
            border-radius: 1rem;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.94), rgba(236, 253, 245, 0.88));
        }

        .site-nav-brand-badge::after {
            content: "";
            position: absolute;
            inset: -35% auto auto -20%;
            width: 70%;
            height: 70%;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(0, 230, 118, 0.3), rgba(0, 230, 118, 0));
            pointer-events: none;
        }

        .site-nav-brand-mark,
        .site-nav-brand-copy {
            position: relative;
            z-index: 1;
        }

        .site-nav-brand-kicker,
        .site-nav-brand-title {
            transition: transform 0.25s ease, letter-spacing 0.25s ease, color 0.25s ease;
        }

        .site-nav-brand:hover .site-nav-brand-kicker {
            letter-spacing: 0.28em;
            color: #00bcd4;
        }

        .site-nav-brand:hover .site-nav-brand-title {
            transform: translateX(2px);
            color: #0f172a;
        }

        .site-nav-link {
            font-family: 'Montserrat', sans-serif !important;
            position: relative;
            isolation: isolate;
            overflow: hidden;
            border: 1px solid transparent;
            border-radius: 999px;
            background-clip: padding-box;
            backdrop-filter: blur(10px);
        }

        .theme-switch {
            position: relative;
            display: inline-flex;
            align-items: center;
            width: 5.25rem;
            height: 2.85rem;
            padding: 0.28rem;
            border-radius: 999px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            background: linear-gradient(135deg, rgba(255,255,255,0.98), rgba(240,249,255,0.92));
            box-shadow: 0 10px 28px rgba(15, 23, 42, 0.10);
            transition: transform 0.22s ease, border-color 0.22s ease, box-shadow 0.22s ease, background 0.22s ease;
        }

        .theme-switch:hover {
            transform: translateY(-1px);
            border-color: rgba(34, 211, 238, 0.48);
            box-shadow: 0 16px 34px rgba(6, 182, 212, 0.16);
        }

        .theme-switch-track {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 0.55rem;
            color: #64748b;
            font-size: 0.9rem;
        }

        .theme-switch-thumb {
            position: absolute;
            top: 0.26rem;
            left: 0.26rem;
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            background: linear-gradient(135deg, #06b6d4, #0ea5e9);
            box-shadow: 0 12px 24px rgba(6, 182, 212, 0.24);
            transition: transform 0.26s ease, background 0.26s ease, box-shadow 0.26s ease;
        }

        .theme-switch[data-theme-mode="dark"] .theme-switch-thumb {
            transform: translateX(2.36rem);
            background: linear-gradient(135deg, #0f172a, #334155);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.28);
        }

        .theme-switch[data-theme-mode="dark"] .theme-switch-track {
            color: #94a3b8;
        }

        @media (max-width: 640px) {
            .site-nav {
                flex-wrap: wrap;
                gap: 0.6rem;
            }

            .theme-switch {
                width: 4rem;
                height: 2.25rem;
                padding: 0.2rem;
                flex-shrink: 0;
            }

            .theme-switch-track {
                padding: 0 0.4rem;
                font-size: 0.78rem;
                justify-content: space-between;
            }

            .theme-switch-thumb {
                width: 1.8rem;
                height: 1.8rem;
                top: 0.18rem;
                left: 0.18rem;
            }

            .theme-switch[data-theme-mode="dark"] .theme-switch-thumb {
                transform: translateX(1.75rem);
            }

            .site-nav-menu-icon {
                flex-shrink: 0;
                margin-left: 0.25rem;
            }
        }

        .site-nav-link::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background:
                linear-gradient(135deg, #00e676, #00bcd4 56%, #1e88e5 100%);
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.25s ease, transform 0.25s ease;
            z-index: -1;
        }

        .site-nav-link::after {
            content: none;
        }

        .site-nav-link:hover,
        .site-nav-link:focus-visible,
        .site-nav-link.is-active {
            transform: translateY(-2px);
            border-color: rgba(0, 188, 212, 0.48);
            background: #00bcd4;
            color: #ffffff;
            box-shadow:
                0 14px 30px rgba(15, 23, 42, 0.08),
                0 0 24px rgba(0, 188, 212, 0.24),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
        }

        .site-nav-link:hover::before,
        .site-nav-link:focus-visible::before,
        .site-nav-link.is-active::before {
            opacity: 1;
            transform: scale(1);
        }

        .site-nav-program-panel {
            opacity: 0;
            visibility: hidden;
            transform: translate(-50%, 14px) scale(0.96);
            perspective: 1100px;
        }

        .site-nav-program:hover .site-nav-program-panel,
        .site-nav-program:focus-within .site-nav-program-panel {
            opacity: 1;
            visibility: visible;
            transform: translate(-50%, 0) scale(1);
        }

        .site-nav-program-shell {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(15, 23, 42, 0.1);
            background:
                radial-gradient(circle at 18% 12%, rgba(0, 188, 212, 0.12), transparent 28%),
                radial-gradient(circle at 86% 16%, rgba(168, 85, 247, 0.1), transparent 30%),
                linear-gradient(145deg, rgba(255, 255, 255, 0.96), rgba(248, 250, 252, 0.84) 52%, rgba(255, 255, 255, 0.92));
            box-shadow:
                0 32px 76px rgba(15, 23, 42, 0.16),
                0 0 48px rgba(0, 188, 212, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.86),
                inset 0 0 0 1px rgba(255, 255, 255, 0.42),
                inset 0 -24px 48px rgba(15, 23, 42, 0.035);
            backdrop-filter: blur(26px) saturate(190%);
        }

        .site-nav-program-shell::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.5), transparent 34%),
                repeating-linear-gradient(90deg, rgba(15, 23, 42, 0.035) 0 1px, transparent 1px 48px),
                repeating-linear-gradient(180deg, rgba(15, 23, 42, 0.026) 0 1px, transparent 1px 48px);
            pointer-events: none;
        }

        .site-nav-program-shell::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.18),
                inset 0 0 0 1px rgba(255, 255, 255, 0.05);
            pointer-events: none;
        }

        .site-nav-program-shell > div:first-child p {
            color: rgba(51, 65, 85, 0.68);
            text-shadow: 0 1px 14px rgba(255, 255, 255, 0.45);
        }

        .site-nav-mobile summary {
            list-style: none;
        }

        .site-nav-mobile summary::-webkit-details-marker {
            display: none;
        }

        .site-nav-mobile[open] .site-nav-menu-icon {
            border-color: rgba(0, 188, 212, 0.38);
            background: rgba(0, 188, 212, 0.12);
            color: #00bcd4;
        }

        .site-nav-login:hover,
        .site-nav-menu-icon:hover {
            transform: translateY(-2px) scale(1.03);
            border-color: rgba(0, 188, 212, 0.3);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.94), rgba(236, 253, 245, 0.82));
            color: #00bcd4;
            box-shadow:
                0 16px 30px rgba(15, 23, 42, 0.12),
                0 0 22px rgba(0, 188, 212, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.78);
        }

        .site-nav-mobile-panel {
            opacity: 0;
            transform: translateY(-6px);
             max-height: 80vh; 
            overflow-y: auto; 
        }

        .site-nav-mobile[open] .site-nav-mobile-panel {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── Card base ── */
        .site-nav-program-card {
            position: relative;
            overflow: hidden;
            border-radius: 1.9rem;
            clip-path: inset(0 round 1.9rem);
            min-height: 13.5rem;
            border: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            isolation: isolate;
            box-shadow:
                0 24px 48px rgba(2, 6, 23, 0.28),
                0 14px 34px rgba(var(--card-accent), 0.26),
                inset 0 -18px 40px rgba(2, 6, 23, 0.16);
            transition:
                transform 0.55s cubic-bezier(0.22, 1, 0.3, 1),
                box-shadow 0.55s cubic-bezier(0.22, 1, 0.3, 1),
                filter 0.4s ease,
                background-position 0.65s cubic-bezier(0.22, 1, 0.3, 1);
            will-change: transform, box-shadow, filter, background-position;
        }

        /* shimmer sweep layer */
        .site-nav-program-card::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 2;
            background: linear-gradient(
                115deg,
                rgba(255,255,255,0) 30%,
                rgba(255,255,255,0.46) 50%,
                rgba(255,255,255,0) 70%
            );
            transform: translateX(-130%) skewX(-12deg);
            opacity: 0.75;
            transition: transform 0.6s cubic-bezier(0.22, 1, 0.3, 1), opacity 0.35s ease;
            pointer-events: none;
        }

        /* bottom gradient overlay — darkens at rest, lifts on hover */
        .site-nav-program-card::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
            background: linear-gradient(
                180deg,
                rgba(var(--card-accent-alt), 0.18) 0%,
                rgba(var(--card-accent), 0.08) 24%,
                rgba(0,0,0,0.26) 58%,
                rgba(0,0,0,0.66) 100%
            );
            opacity: 0.9;
            transform: translateY(8px);
            transition: opacity 0.45s ease, transform 0.5s cubic-bezier(0.22, 1, 0.3, 1);
            pointer-events: none;
        }

        .site-nav-program-card::marker {
            content: none;
        }

        /* ── Per-card accent colour tokens ── */
        .site-nav-program-card-tvet    { --card-accent: 255, 106, 24; --card-accent-alt: 255, 186, 96; --card-badge-accent: 255,81,0,0.7; }
        .site-nav-program-card-diploma { --card-accent: 162, 28, 175; --card-accent-alt: 217, 70, 239; --card-badge-accent: 162, 28, 175; }
        .site-nav-program-card-health  { --card-accent: 2, 132, 199;  --card-accent-alt: 103, 232, 249; --card-badge-accent: 2, 132, 199; }

        /* ── Background images ── */
        .site-nav-program-card-tvet {
            background-color: #9a3412;
            background-image:
                linear-gradient(180deg, rgba(154, 52, 18, 0.78), rgba(234, 88, 12, 0.76) 58%, rgba(67, 20, 7, 0.9)),
                url('{{ asset('images/tvet-vg2.jpeg') }}');
        }
        .site-nav-program-card-diploma {
            background-color: #7e22ce;
            background-image:
                linear-gradient(145deg, rgba(88, 28, 135, 0.86), rgba(147, 51, 234, 0.78), rgba(107, 33, 168, 0.72)),
                url('{{ asset('images/postgraduate-differences_sim-article.jpg') }}');
        }
        .site-nav-program-card-health {
            background-color: #0369a1;
            background-image:
                linear-gradient(145deg, rgba(3, 105, 161, 0.88), rgba(2, 132, 199, 0.78), rgba(14, 116, 144, 0.72)),
                url('{{ asset('images/sains.jpg') }}');
        }

        /* ── HOVER state ── */
        .site-nav-program-card:hover,
        .site-nav-program-card:focus-visible {
            transform: translateY(-13px) scale(1.045);
            outline: none;
            background-size: cover;
            background-position: center 24%;
            filter: saturate(1.24) brightness(1.09) contrast(1.03);
            box-shadow:
                0 28px 56px rgba(var(--card-accent), 0.34),
                0 46px 88px rgba(2, 6, 23, 0.42),
                0 0 54px rgba(var(--card-accent-alt), 0.38),
                inset 0 -22px 46px rgba(2, 6, 23, 0.14);
        }

        .site-nav-program-card-tvet:hover,
        .site-nav-program-card-tvet:focus-visible {
            transform: translate(-2px, -14px) scale(1.05) rotate(-0.45deg);
        }

        .site-nav-program-card-diploma:hover,
        .site-nav-program-card-diploma:focus-visible {
            transform: translateY(-15px) scale(1.055);
        }

        .site-nav-program-card-health:hover,
        .site-nav-program-card-health:focus-visible {
            transform: translate(2px, -14px) scale(1.05) rotate(0.45deg);
        }

        /* fire shimmer sweep on hover */
        .site-nav-program-card:hover::before,
        .site-nav-program-card:focus-visible::before {
            transform: translateX(130%) skewX(-12deg);
            opacity: 1;
        }

        /* lift bottom overlay */
        .site-nav-program-card:hover::after {
            opacity: 0.82;
            transform: translateY(0);
        }

        .site-nav-program-card:active {
            transform: translateY(-4px) scale(0.985);
            transition-duration: 0.15s;
            box-shadow:
                0 10px 22px rgba(var(--card-accent), 0.28),
                inset 0 2px 8px rgba(0,0,0,0.14);
        }

        /* ── Child element z-index ── */
        .site-nav-program-card-badge,
        .site-nav-program-card-title,
        .site-nav-program-card-copy,
        .site-nav-program-card-arrow {
            position: relative;
            z-index: 3;
        }

        /* ── Badge ── */
        .site-nav-program-card-badge {
            border: 1px solid rgba(255, 255, 255, 0.26);
            background: rgba(255, 255, 255, 0.14) !important;
            backdrop-filter: blur(14px) saturate(1.4);
            box-shadow:
                0 8px 18px rgba(2, 6, 23, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.26);
            transition: background 0.35s ease, box-shadow 0.35s ease, transform 0.35s ease, border-color 0.35s ease;
        }
        .site-nav-program-card:hover .site-nav-program-card-badge {
            border-color: rgba(255, 255, 255, 0.38);
            background: rgba(var(--card-badge-accent), 0.72) !important;
            box-shadow:
                0 0 18px rgba(var(--card-badge-accent), 0.5),
                0 10px 22px rgba(2, 6, 23, 0.14),
                inset 0 1px 0 rgba(255,255,255,0.32);
            transform: translateY(-2px) scale(1.04);
        }

        /* ── Title ── */
        .site-nav-program-card-title {
            text-shadow: 0 8px 20px rgba(2, 6, 23, 0.34);
            transition: transform 0.45s cubic-bezier(0.22, 1, 0.3, 1), text-shadow 0.45s ease;
        }
        .site-nav-program-card:hover .site-nav-program-card-title {
            transform: translateY(-6px) scale(1.06);
            text-shadow:
                0 0 32px rgba(var(--card-accent-alt), 0.7),
                0 10px 24px rgba(15, 23, 42, 0.32);
        }

        /* ── Description copy ── */
        .site-nav-program-card-copy {
            max-width: 11ch;
            line-height: 1.6;
            text-wrap: balance;
            text-shadow: 0 4px 14px rgba(2, 6, 23, 0.36);
            transition: transform 0.45s cubic-bezier(0.22, 1, 0.3, 1), opacity 0.35s ease;
        }
        .site-nav-program-card:hover .site-nav-program-card-copy {
            transform: translateY(-5px);
            opacity: 1;
        }

        /* ── Glow blob ── */
        .site-nav-program-card-glow {
            position: absolute;
            inset: auto auto -1.5rem -1.25rem;
            width: 8rem;
            height: 8rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(var(--card-accent-alt), 0.55), transparent 72%);
            filter: blur(24px);
            opacity: 0.6;
            pointer-events: none;
            z-index: 0;
            transition: transform 0.55s cubic-bezier(0.22, 1, 0.3, 1), opacity 0.55s ease, filter 0.55s ease;
        }
        .site-nav-program-card:hover .site-nav-program-card-glow,
        .site-nav-program-card:focus-visible .site-nav-program-card-glow {
            transform: scale(2.45) translate3d(0.9rem, -0.6rem, 0);
            opacity: 1;
            filter: blur(34px);
        }

        /* ── Floating idle animation ── */
        .site-nav-program-card-floating {
            animation: siteNavCardFloat 5.5s ease-in-out infinite;
        }
        .site-nav-program-card:hover {
            animation-play-state: paused;
        }

        .site-nav-mobile-program-card {
            position: relative;
            overflow: hidden;
            min-height: 7rem;
            border: 0;
            background-size: cover;
            background-position: center;
            box-shadow:
                0 16px 30px rgba(15, 23, 42, 0.14),
                0 10px 24px rgba(var(--card-accent), 0.24);
        }

        .site-nav-mobile-program-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(var(--card-accent-alt), 0.2), rgba(var(--card-accent), 0.06));
            pointer-events: none;
        }

        .site-nav-mobile-program-card p,
        .site-nav-mobile-program-card span {
            position: relative;
            z-index: 1;
        }

        @keyframes siteNavCardFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }

        @media (prefers-reduced-motion: reduce) {
            .site-nav-brand,
            .site-nav-link,
            .site-nav-login,
            .site-nav-program-panel,
            .site-nav-mobile-panel,
            .site-nav-menu-icon,
            .site-nav-link::after,
            .site-nav-program-card,
            .site-nav-program-card::after,
            .site-nav-program-card-arrow,
            .site-nav-program-card-floating {
                transition: none;
                animation: none;
            }
        }
        
        /* ── DARK MODE OVERRIDES ── */
        html.dark .site-nav {
            background: rgba(15, 23, 42, 0.94);
            border-bottom-color: rgba(51, 65, 85, 0.8);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        html.dark .site-nav-brand {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.82), rgba(15, 23, 42, 0.97) 52%, rgba(30, 41, 59, 0.9));
            border-color: rgba(0, 188, 212, 0.24);
        }
        html.dark .site-nav-brand-badge {
            background: linear-gradient(145deg, #1e293b, #0f172a);
            border-color: rgba(0, 188, 212, 0.24);
        }
        html.dark .site-nav-brand-badge::before {
            background: linear-gradient(145deg, rgba(30, 41, 59, 0.94), rgba(15, 23, 42, 0.88));
        }
        html.dark .site-nav-brand-title {
            color: #e2e8f0;
        }
        html.dark .site-nav-brand:hover .site-nav-brand-title {
            color: #f8fafc;
        }
        html.dark .site-nav-login, html.dark .site-nav-menu-icon {
            background: #1e293b;
            border-color: #334155;
            color: #cbd5e1;
        }
        html.dark .site-nav-login:hover, html.dark .site-nav-menu-icon:hover, html.dark .site-nav-mobile[open] .site-nav-menu-icon {
            background: #0f172a;
            border-color: rgba(0, 188, 212, 0.42);
            color: #00bcd4;
        }
        html.dark .site-nav-program-shell {
            border-color: rgba(148, 163, 184, 0.26);
            background:
                radial-gradient(circle at 18% 12%, rgba(0, 229, 255, 0.2), transparent 28%),
                radial-gradient(circle at 86% 16%, rgba(168, 85, 247, 0.18), transparent 30%),
                linear-gradient(145deg, rgba(15, 23, 42, 0.96), rgba(15, 23, 42, 0.78) 52%, rgba(8, 13, 24, 0.94));
            box-shadow:
                0 38px 92px rgba(2, 6, 23, 0.46),
                0 0 54px rgba(0, 188, 212, 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.22),
                inset 0 0 0 1px rgba(255, 255, 255, 0.04),
                inset 0 -24px 48px rgba(255, 255, 255, 0.035);
        }
        html.dark .site-nav-program-shell::before {
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.14), transparent 34%),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.04) 0 1px, transparent 1px 48px),
                repeating-linear-gradient(180deg, rgba(255, 255, 255, 0.032) 0 1px, transparent 1px 48px);
        }
        html.dark .site-nav-program-shell > div:first-child p {
            color: rgba(203, 213, 225, 0.72);
            text-shadow: 0 1px 14px rgba(2, 6, 23, 0.32);
        }
        html.dark .site-nav-mobile-panel {
            background: #1e293b;
            border-color: #334155;
        }
        html.dark .site-nav-link {
            color: #cbd5e1;
        }
        html.dark .site-nav-link:hover, html.dark .site-nav-link.is-active {
            color: #ffffff;
        }
        html.dark .site-nav-link:not(.is-active) {
            background: transparent;
        }
        html.dark .site-nav-mobile-panel a, html.dark .site-nav-mobile-panel button {
            color: #cbd5e1;
        }
        html.dark .site-nav-mobile-panel a:hover, html.dark .site-nav-mobile-panel button:hover, html.dark .site-nav-mobile-panel a.bg-cyan-50 {
            background: #0f172a;
            color: #00bcd4;
        }
        html.dark .site-nav-mobile-panel .bg-slate-50\/90 {
            background: #0f172a;
        }
    </style>
@endonce

<nav class="site-nav">
    <div class="mx-auto flex max-w-7xl items-center gap-3 px-4 py-3 sm:px-6 lg:px-8">
        <a href="{{ route('pelajar.welcome', $pelajar) }}" class="site-nav-brand flex min-w-0 items-center gap-3 rounded-[1.6rem]">
            <span class="site-nav-brand-badge flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-cyan-100/90 bg-[linear-gradient(145deg,#ecfdf5,#ffffff)] sm:h-14 sm:w-14">
                <img src="{{ asset('images/icon/seslogo.png') }}" alt="SES logo" class="site-nav-brand-mark h-9 w-9 object-contain sm:h-10 sm:w-10">
            </span>
            <div class="site-nav-brand-copy min-w-0 leading-tight">
                <p class="site-nav-brand-kicker truncate text-[11px] uppercase tracking-[0.05em] text-cyan-500 sm:text-xs">SES</p>
                <h1 class="site-nav-brand-title text-sm tracking-[-0.02em] text-slate-900 sm:text-[1.02rem]">SMART Education</h1>
                <h1 class="site-nav-brand-title text-sm tracking-[-0.02em] text-slate-900 sm:text-[1.02rem]">Society</h1>
            </div>
        </a>

        <div class="ml-auto hidden items-center gap-2 lg:flex">
            @if($pelajar)
            <a href="{{ route('pelajar.program', $pelajar) }}" class="site-nav-link {{ request()->routeIs('pelajar.program*') ? 'is-active bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                Program
            </a>

            <div class="site-nav-program relative">
                <a href="{{ route('pelajar.institusi', $pelajar) }}" class="site-nav-link {{ request()->routeIs('pelajar.institusi*') || request()->routeIs('pelajar.infoinstitusi*') || request()->routeIs('pelajar.infokursus*') ? 'is-active bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                    Institusi
                </a>

                <div class="site-nav-program-panel absolute left-1/2 top-full z-20 w-[min(92vw,32rem)] pt-4">
                    <div class="site-nav-program-shell rounded-[2rem] p-3 sm:p-4">
                        <div class="mb-4 px-2 sm:mb-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-slate-400">Cari Institusi Mengikut Program</p>
                        </div>
                        <div class="grid gap-3 md:grid-cols-3">
                            <a href="{{ route('pelajar.institusi', ['pelajar' => $pelajar, 'jenis' => 'TVET']) }}" class="site-nav-program-card site-nav-program-card-tvet site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0s]">
                                <span class="site-nav-program-card-glow"></span>
                                <span class="site-nav-program-card-badge inline-flex rounded-full bg-white/18 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/90">Program</span>
                                <div class="mt-6 flex min-h-[7.25rem] items-end justify-between gap-4">
                                    <div>
                                        <p class="site-nav-program-card-title text-[1.75rem] font-semibold tracking-[-0.04em]">TVET</p>
                                        <p class="site-nav-program-card-copy mt-2 text-sm text-white/82">Cari institusi TVET dengan kuota tersedia.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('pelajar.institusi', ['pelajar' => $pelajar, 'jenis' => 'Diploma']) }}" class="site-nav-program-card site-nav-program-card-diploma site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0.4s]">
                                <span class="site-nav-program-card-glow"></span>
                                <span class="site-nav-program-card-badge inline-flex rounded-full bg-white/18 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/90">Program</span>
                                <div class="mt-6 flex min-h-[7.25rem] items-end justify-between gap-4">
                                    <div>
                                        <p class="site-nav-program-card-title text-[1.75rem] font-semibold tracking-[-0.04em]">Diploma</p>
                                        <p class="site-nav-program-card-copy mt-2 text-sm text-white/82">Cari institusi diploma yang sesuai untuk anda.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('pelajar.institusi', ['pelajar' => $pelajar, 'jenis' => 'Sains Kesihatan']) }}" class="site-nav-program-card site-nav-program-card-health site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0.8s]">
                                <span class="site-nav-program-card-glow"></span>
                                <span class="site-nav-program-card-badge inline-flex rounded-full bg-white/18 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/90">Program</span>
                                <div class="mt-6 flex min-h-[7.25rem] items-end justify-between gap-4">
                                    <div>
                                        <p class="site-nav-program-card-title text-[1.75rem] font-semibold tracking-[-0.04em]">Sains Kesihatan</p>
                                        <p class="site-nav-program-card-copy mt-2 text-sm text-white/82">Cari institusi kesihatan dan latihan klinikal.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('pelajar.dashboard', $pelajar) }}" class="site-nav-link {{ request()->routeIs('pelajar.dashboard') ? 'is-active bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                Dashboard
            </a>
            <form method="POST" action="{{ route('pelajar.logout') }}">
                @csrf
                <button type="submit" class="site-nav-link inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-cyan-500">
                    Logout
                </button>
            </form>
            @endif
        </div>

        <button id="theme-toggle" class="theme-switch site-nav-login ml-auto inline-flex lg:ml-2" aria-label="Toggle Dark Mode" aria-pressed="false" data-theme-mode="light">
            <span class="theme-switch-track" aria-hidden="true">
                <i class="fas fa-sun"></i>
                <i class="fas fa-moon"></i>
            </span>
            <span class="theme-switch-thumb" aria-hidden="true">
                <i class="fas fa-sun"></i>
            </span>
        </button>

        <details class="site-nav-mobile lg:hidden">
            <summary class="cursor-pointer">
                <span class="site-nav-menu-icon flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M4 7H20"></path>
                        <path d="M4 12H20"></path>
                        <path d="M4 17H20"></path>
                    </svg>
                </span>
            </summary>

            <div class="site-nav-mobile-panel absolute inset-x-4 top-full mt-3 rounded-3xl border border-slate-200 bg-white p-4 shadow-[0_24px_60px_rgba(15,23,42,0.14)] sm:inset-x-6">
                <div class="space-y-2">
                    @if($pelajar)
                    <a href="{{ route('pelajar.program', $pelajar) }}" class="{{ request()->routeIs('pelajar.program*') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} block rounded-2xl px-4 py-3 text-sm font-semibold">
                        Program
                    </a>
                    <a href="{{ route('pelajar.institusi', $pelajar) }}" class="{{ request()->routeIs('pelajar.institusi*') || request()->routeIs('pelajar.infoinstitusi*') || request()->routeIs('pelajar.infokursus*') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} block rounded-2xl px-4 py-3 text-sm font-semibold">
                        Institusi
                    </a>
                    @endif
                    <div class="grid gap-3 rounded-[1.6rem] bg-slate-50/90 p-3 sm:grid-cols-3">
                        <a href="{{ $pelajar ? route('pelajar.institusi', ['pelajar' => $pelajar, 'jenis' => 'TVET']) : '#' }}" class="site-nav-mobile-program-card site-nav-program-card-tvet rounded-[1.5rem] px-4 py-4 text-white">
                            <span class="inline-flex rounded-full bg-white/18 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/85">Program</span>
                            <p class="mt-4 text-lg font-semibold tracking-[-0.03em]">TVET</p>
                            <p class="mt-1 text-xs leading-6 text-white/80">Cari institusi TVET dengan kuota tersedia.</p>
                        </a>
                        <a href="{{ $pelajar ? route('pelajar.institusi', ['pelajar' => $pelajar, 'jenis' => 'Diploma']) : '#' }}" class="site-nav-mobile-program-card site-nav-program-card-diploma rounded-[1.5rem] px-4 py-4 text-white">
                            <span class="inline-flex rounded-full bg-white/18 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/85">Program</span>
                            <p class="mt-4 text-lg font-semibold tracking-[-0.03em]">Diploma</p>
                            <p class="mt-1 text-xs leading-6 text-white/80">Cari institusi diploma yang sesuai untuk anda.</p>
                        </a>
                        <a href="{{ $pelajar ? route('pelajar.institusi', ['pelajar' => $pelajar, 'jenis' => 'Sains Kesihatan']) : '#' }}" class="site-nav-mobile-program-card site-nav-program-card-health rounded-[1.5rem] px-4 py-4 text-white">
                            <span class="inline-flex rounded-full bg-white/18 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/85">Program</span>
                            <p class="mt-4 text-lg font-semibold tracking-[-0.03em]">Sains Kesihatan</p>
                            <p class="mt-1 text-xs leading-6 text-white/80">Cari institusi kesihatan dan latihan klinikal.</p>
                        </a>
                    </div>
                    @if($pelajar)
                    <a href="{{ route('pelajar.welcome', $pelajar) }}" class="{{ request()->routeIs('pelajar.welcome') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} block rounded-2xl px-4 py-3 text-sm font-semibold">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('pelajar.logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left {{ request()->routeIs('pelajar.logout') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} rounded-2xl px-4 py-3 text-sm font-semibold">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </details>
    </div>
</nav>

<script>
    // Theme toggle script - runs ONCE on DOMContentLoaded only
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggleBtn = document.getElementById('theme-toggle');

        function syncIcons() {
            const isDark = document.documentElement.classList.contains('dark');
            [themeToggleBtn].forEach((button) => {
                if (!button) return;
                button.dataset.themeMode = isDark ? 'dark' : 'light';
                button.setAttribute('aria-pressed', isDark ? 'true' : 'false');
                const thumbIcon = button.querySelector('.theme-switch-thumb i');
                if (thumbIcon) {
                    thumbIcon.className = isDark ? 'fas fa-moon' : 'fas fa-sun';
                }
            });
        }

        syncIcons();

        function toggleTheme() {
            const isDark = document.documentElement.classList.contains('dark');
            if (isDark) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
            syncIcons();
        }

        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', toggleTheme);
        }
    });
</script>

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
            background: linear-gradient(90deg, rgba(45, 212, 191, 0.12), rgba(20, 184, 166, 0.96), rgba(45, 212, 191, 0.12));
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
            border: 1px solid rgba(20, 184, 166, 0.14);
            background: linear-gradient(135deg, rgba(236, 253, 245, 0.92), rgba(255, 255, 255, 0.98) 52%, rgba(240, 253, 250, 0.92));
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            backdrop-filter: blur(10px);
        }

        .site-nav-brand:hover {
            border-color: rgba(20, 184, 166, 0.24);
            box-shadow: 0 16px 34px rgba(20, 184, 166, 0.12);
        }

        .site-nav-brand::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(94, 234, 212, 0.26), transparent 34%),
                radial-gradient(circle at bottom right, rgba(20, 184, 166, 0.12), transparent 32%);
            pointer-events: none;
        }

        .site-nav-brand::after {
            content: "";
            position: absolute;
            left: 4.4rem;
            right: 1rem;
            bottom: 0.58rem;
            height: 1px;
            background: linear-gradient(90deg, rgba(45, 212, 191, 0.3), rgba(45, 212, 191, 0));
            pointer-events: none;
        }

        .site-nav-brand-badge {
            position: relative;
            overflow: hidden;
            box-shadow: 0 14px 34px rgba(20, 184, 166, 0.16);
        }

        .site-nav-brand-badge::before {
            content: "";
            position: absolute;
            inset: 1px;
            border-radius: 1rem;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.94), rgba(236, 253, 245, 0.9));
        }

        .site-nav-brand-badge::after {
            content: "";
            position: absolute;
            inset: -35% auto auto -20%;
            width: 70%;
            height: 70%;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(94, 234, 212, 0.34), rgba(94, 234, 212, 0));
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
            color: #0f766e;
        }

        .site-nav-brand:hover .site-nav-brand-title {
            transform: translateX(2px);
            color: #0f172a;
        }

        .site-nav-link {
            position: relative;
        }

        .theme-switch {
            position: relative;
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

        .site-nav-link::after {
            content: "";
            position: absolute;
            left: 0.875rem;
            right: 0.875rem;
            bottom: 0.45rem;
            height: 2px;
            border-radius: 999px;
            background: linear-gradient(90deg, #2dd4bf, #14b8a6);
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.25s ease;
        }

        .site-nav-link:hover::after,
        .site-nav-link:focus-visible::after,
        .site-nav-link.is-active::after {
            transform: scaleX(1);
        }

        .site-nav-program-panel {
            opacity: 0;
            visibility: hidden;
            transform: translate(-50%, 14px) scale(0.96);
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
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.9), rgba(248, 250, 252, 0.88)),
                linear-gradient(135deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.04));
            box-shadow:
                0 28px 70px rgba(15, 23, 42, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.8),
                inset 0 -1px 0 rgba(255, 255, 255, 0.35);
                inset 0 -1px 0 rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(22px);
        }

        .site-nav-program-shell::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(45, 212, 191, 0.12), transparent 26%),
                radial-gradient(circle at bottom right, rgba(14, 165, 233, 0.1), transparent 30%);
            pointer-events: none;
        }

        .site-nav-program-shell::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.72);
            pointer-events: none;
        }

        .site-nav-mobile summary {
            list-style: none;
        }

        .site-nav-mobile summary::-webkit-details-marker {
            display: none;
        }

        .site-nav-mobile[open] .site-nav-menu-icon {
            border-color: rgba(20, 184, 166, 0.35);
            background: rgba(20, 184, 166, 0.12);
            color: #0f766e;
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

        .site-nav-program-card {
            position: relative;
            overflow: hidden;
            min-height: 13.5rem;
            border: 1px solid rgba(255, 255, 255, 0.24);
            background-size: cover;
            background-position: center;
            box-shadow:
                0 22px 36px rgba(15, 23, 42, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.3),
                inset 0 -8px 18px rgba(255, 255, 255, 0.08);
            transform-style: preserve-3d;
            transition:
                transform 0.4s cubic-bezier(0.22, 1, 0.36, 1),
                box-shadow 0.4s ease,
                border-color 0.4s ease,
                filter 0.4s ease;
        }

        .site-nav-program-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.34), rgba(255, 255, 255, 0.04) 42%, rgba(255, 255, 255, 0.02)),
                linear-gradient(180deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0));
                linear-gradient(115deg, rgba(255, 255, 255, 0) 36%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 64%);
            transform: translateX(-16%);            
            transition: transform 0.45s ease, opacity 0.45s ease;
            pointer-events: none;
        }

        .site-nav-program-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.28), transparent 28%),
                radial-gradient(circle at bottom left, rgba(255, 255, 255, 0.2), transparent 24%);
            pointer-events: none;
            transition: opacity 0.35s ease, transform 0.35s ease;
        }

        .site-nav-program-card:hover,
        .site-nav-program-card:focus-visible {
            transform: translateY(-10px) scale(1.04) rotateX(4deg) rotateY(-3deg);
            border-color: rgba(255, 255, 255, 0.44);
            box-shadow:
                0 34px 60px rgba(15, 23, 42, 0.24),
                0 0 40px rgba(255, 255, 255, 0.12),
                0 0 60px rgba(20, 184, 166, 0.12),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.34);
            filter: saturate(1.1) brightness(1.02);
        }

        .site-nav-program-card:active {
            transform: translateY(-1px) scale(0.975);
            box-shadow:
                0 16px 26px rgba(15, 23, 42, 0.18),
                inset 0 8px 18px rgba(15, 23, 42, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
        }

        .site-nav-program-card:hover::after {
            opacity: 0.9;
            transform: scale(1.06);
        }

        .site-nav-program-card:hover::before,
        .site-nav-program-card:focus-visible::before {
            transform: translateX(16%);
        }

        .site-nav-program-card-badge,
        .site-nav-program-card-title,
        .site-nav-program-card-copy,
        .site-nav-program-card-arrow {
            position: relative;
            z-index: 1;
        }

        .site-nav-program-card-badge {
            backdrop-filter: blur(10px);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.18);
        }

        .site-nav-program-card-title {
            text-shadow: 0 8px 20px rgba(15, 23, 42, 0.18);
        }

        .site-nav-program-card-copy {
            max-width: 11ch;
            line-height: 1.6;
            text-wrap: balance;
            text-shadow: 0 6px 18px rgba(15, 23, 42, 0.22);
        }

        .site-nav-program-card-tvet {
            background-image:
                linear-gradient(145deg, rgba(168, 116, 8, 0.88), rgba(212, 175, 55, 0.74), rgba(241, 207, 99, 0.56)),
                url('{{ asset('images/tvet-vg2.jpeg') }}');
        }

        .site-nav-program-card-diploma {
            background-image:
                linear-gradient(145deg, rgba(162, 28, 175, 0.82), rgba(217, 70, 239, 0.68), rgba(192, 132, 252, 0.48)),
                url('{{ asset('images/postgraduate-differences_sim-article.jpg') }}');
        }

        .site-nav-program-card-health {
            background-image:
                linear-gradient(145deg, rgba(2, 132, 199, 0.82), rgba(14, 165, 233, 0.68), rgba(103, 232, 249, 0.48)),
                url('{{ asset('images/sains.jpg') }}');
        }

        .site-nav-program-card-arrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.28);
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(10px);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);
            transition: transform 0.25s ease, opacity 0.25s ease, background-color 0.25s ease, box-shadow 0.25s ease;
        }

        .site-nav-program-card:hover .site-nav-program-card-arrow {
            opacity: 1;
            transform: translate3d(6px, -3px, 0) scale(1.05);
            background: rgba(255, 255, 255, 0.18);
            box-shadow:
                0 14px 28px rgba(15, 23, 42, 0.16),
                0 0 20px rgba(255, 255, 255, 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.26);
        }

        .site-nav-program-card-glow {
            position: absolute;
            inset: auto auto -2rem -1.75rem;
            width: 7rem;
            height: 7rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.18);
            filter: blur(22px);
            opacity: 0.8;
            pointer-events: none;
            transition: transform 0.4s ease, opacity 0.4s ease, filter 0.4s ease;
        }

        .site-nav-program-card:hover .site-nav-program-card-glow,
        .site-nav-program-card:focus-visible .site-nav-program-card-glow {
            transform: scale(1.18) translate3d(0.6rem, -0.35rem, 0);
            opacity: 1;
            filter: blur(28px);
        }

        .site-nav-program-card-floating {
            animation: siteNavCardFloat 5.5s ease-in-out infinite;
        }
        
        .site-nav-mobile-program-card {
            position: relative;
            overflow: hidden;
            min-height: 7rem;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow:
                0 16px 30px rgba(15, 23, 42, 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.28);
        }

        .site-nav-mobile-program-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.28), rgba(255, 255, 255, 0.02));
            pointer-events: none;
        }

        .site-nav-mobile-links {
            display: flex;
            flex-wrap: wrap;
            gap: 0.35rem;
        }

        .site-nav-mobile-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 0.55rem 0.85rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #334155;
            line-height: 1;
            transition: color 0.2s ease, background-color 0.2s ease;
        }

        .site-nav-mobile-link:hover,
        .site-nav-mobile-link:focus-visible {
            color: #0f766e;
            background: #f8fafc;
        }

        .site-nav-mobile-link.is-active {
            color: #0f766e;
            background: #ecfeff;
            box-shadow: inset 0 -2px 0 rgba(20, 184, 166, 0.7);
        }

        body.admin-dark {
            background: #071a34;
            color: #e2e8f0;
        }

        body.admin-dark main,
        body.admin-dark section,
        body.admin-dark article,
        body.admin-dark aside {
            color: #e2e8f0;
        }

        body.admin-dark .site-nav {
            border-bottom-color: rgba(148, 163, 184, 0.14);
            background: rgba(6, 16, 38, 0.96);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.32);
        }

        body.admin-dark .site-nav-brand {
            border-color: rgba(45, 212, 191, 0.24);
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.82), rgba(15, 23, 42, 0.97) 52%, rgba(30, 41, 59, 0.9));
            box-shadow: 0 16px 34px rgba(0, 0, 0, 0.28);
        }

        body.admin-dark .site-nav-brand::after {
            background: linear-gradient(90deg, rgba(45, 212, 191, 0.38), rgba(45, 212, 191, 0));
        }

        body.admin-dark .site-nav-brand-badge {
            border-color: rgba(45, 212, 191, 0.3);
            background: linear-gradient(145deg, #1e293b, #0f172a);
            box-shadow: 0 14px 34px rgba(0, 0, 0, 0.26);
        }

        body.admin-dark .site-nav-brand-badge::before {
            background: linear-gradient(145deg, rgba(30, 41, 59, 0.94), rgba(15, 23, 42, 0.88));
        }

        body.admin-dark .site-nav-brand-title,
        body.admin-dark .site-nav-brand-kicker,
        body.admin-dark .site-nav-brand-copy {
            color: #f8fafc;
        }

        body.admin-dark .site-nav-link {
            color: #cbd5e1;
        }

        body.admin-dark .site-nav-login,
        body.admin-dark .site-nav-menu-icon {
            border-color: rgba(148, 163, 184, 0.18);
            background: rgba(15, 23, 42, 0.82);
            color: #e2e8f0;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.2);
        }

        body.admin-dark .site-nav-login:hover,
        body.admin-dark .site-nav-menu-icon:hover,
        body.admin-dark .site-nav-mobile[open] .site-nav-menu-icon {
            border-color: rgba(45, 212, 191, 0.45);
            background: rgba(15, 23, 42, 0.92);
            color: #5eead4;
        }

        body.admin-dark .site-nav-link:not(.is-active):hover,
        body.admin-dark .site-nav-link:not(.is-active):focus-visible {
            background: rgba(148, 163, 184, 0.08);
            color: #5eead4;
        }

        body.admin-dark .site-nav-link.is-active {
            background: rgba(20, 184, 166, 0.14);
            color: #5eead4;
        }

        body.admin-dark .site-nav-program-shell,
        body.admin-dark .site-nav-program-card,
        body.admin-dark .site-nav-mobile-program-card {
            background: rgba(8, 24, 49, 0.95);
            border-color: rgba(148, 163, 184, 0.12);
        }

        body.admin-dark .site-nav-program-card-badge {
            background: rgba(255, 255, 255, 0.08);
            color: #f8fafc;
        }

        body.admin-dark .site-nav-program-card-title,
        body.admin-dark .site-nav-program-card-copy,
        body.admin-dark .site-nav-program-card-arrow {
            color: #e2e8f0;
        }

        body.admin-dark .site-nav-program-card-arrow {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.12);
        }

        body.admin-dark .bg-white,
        body.admin-dark .bg-gray-100,
        body.admin-dark .bg-slate-50,
        body.admin-dark .bg-slate-100,
        body.admin-dark .bg-slate-200,
        body.admin-dark .bg-gray-50,
        body.admin-dark .bg-\[\#FBFCFE\],
        body.admin-dark .bg-white\/20,
        body.admin-dark .bg-white\/18,
        body.admin-dark .bg-white\/12,
        body.admin-dark .bg-orange-50,
        body.admin-dark .bg-orange-100,
        body.admin-dark .bg-blue-50,
        body.admin-dark .bg-blue-100,
        body.admin-dark .bg-sky-50,
        body.admin-dark .bg-green-50,
        body.admin-dark .bg-green-100,
        body.admin-dark .bg-emerald-50,
        body.admin-dark .bg-purple-50,
        body.admin-dark .bg-purple-100,
        body.admin-dark .bg-yellow-50,
        body.admin-dark .bg-amber-50,
        body.admin-dark .bg-red-50 {
            background-color: #0f2550 !important;
            color: #e2e8f0 !important;
        }

        body.admin-dark .border-gray-200,
        body.admin-dark .border-gray-300,
        body.admin-dark .border-gray-100,
        body.admin-dark .border-slate-100,
        body.admin-dark .border-slate-200,
        body.admin-dark .border-slate-50,
        body.admin-dark .border-blue-100,
        body.admin-dark .border-orange-100,
        body.admin-dark .border-green-100,
        body.admin-dark .border-purple-100,
        body.admin-dark .border-red-50,
        body.admin-dark .border-white\/10,
        body.admin-dark .border-white\/45 {
            border-color: rgba(148, 163, 184, 0.2) !important;
        }

        body.admin-dark .text-gray-900,
        body.admin-dark .text-gray-800,
        body.admin-dark .text-slate-800,
        body.admin-dark .text-slate-900,
        body.admin-dark .text-slate-700,
        body.admin-dark .text-slate-600,
        body.admin-dark .text-slate-500,
        body.admin-dark .text-gray-700,
        body.admin-dark .text-gray-600,
        body.admin-dark .text-gray-500,
        body.admin-dark .text-slate-400 {
            color: #cbd5e1 !important;
        }

        body.admin-dark .text-gray-600,
        body.admin-dark .text-gray-500,
        body.admin-dark .text-slate-600,
        body.admin-dark .text-slate-500,
        body.admin-dark .text-slate-400 {
            color: #94a3b8 !important;
        }

        body.admin-dark .text-green-700,
        body.admin-dark .text-green-600,
        body.admin-dark .text-emerald-700,
        body.admin-dark .text-emerald-600,
        body.admin-dark .text-blue-700,
        body.admin-dark .text-blue-600,
        body.admin-dark .text-purple-700,
        body.admin-dark .text-purple-600,
        body.admin-dark .text-red-700,
        body.admin-dark .text-red-600,
        body.admin-dark .text-yellow-700,
        body.admin-dark .text-amber-700 {
            color: #f8fafc !important;
        }

        body.admin-dark input,
        body.admin-dark select,
        body.admin-dark textarea {
            background-color: #08172f !important;
            color: #e2e8f0 !important;
            border-color: rgba(148, 163, 184, 0.2) !important;
        }

        body.admin-dark input::placeholder,
        body.admin-dark textarea::placeholder {
            color: #94a3b8 !important;
        }

        body.admin-dark .hover\:bg-slate-50:hover,
        body.admin-dark .hover\:bg-gray-100:hover,
        body.admin-dark .hover\:bg-slate-200:hover,
        body.admin-dark .hover\:bg-orange-50:hover {
            background-color: rgba(148, 163, 184, 0.14) !important;
        }

        body.admin-dark .bg-slate-900,
        body.admin-dark .bg-slate-800,
        body.admin-dark .bg-slate-700 {
            background-color: #08172f !important;
        }

        body.admin-dark .shadow-sm,
        body.admin-dark .shadow,
        body.admin-dark .shadow-lg {
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.22) !important;
        }

        body.admin-dark .ring-slate-200,
        body.admin-dark .ring-slate-50 {
            box-shadow: 0 0 0 1px rgba(148, 163, 184, 0.16) !important;
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
    </style>
@endonce

<nav class="site-nav">
    <div class="mx-auto flex max-w-7xl items-center gap-3 px-4 py-3 sm:px-6 lg:px-8">
        <a href="{{ url('/') }}" class="site-nav-brand flex min-w-0 items-center gap-3 rounded-[1.6rem]">
            <span class="site-nav-brand-badge flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-teal-100/90 bg-[linear-gradient(145deg,#ecfdf5,#ffffff)] sm:h-14 sm:w-14">
                <img src="{{ asset('images/icon/seslogo.png') }}" alt="SES logo" class="site-nav-brand-mark h-9 w-9 object-contain sm:h-10 sm:w-10">
            </span>
            <div class="site-nav-brand-copy min-w-0 leading-tight">
                <p class="site-nav-brand-kicker truncate text-[11px] uppercase tracking-[0.05em] text-teal-600 sm:text-xs">SES</p>
                <h1 class="site-nav-brand-title text-sm tracking-[-0.02em] text-slate-900 sm:text-[1.02rem]">SMART Education</h1>
                <h1 class="site-nav-brand-title text-sm tracking-[-0.02em] text-slate-900 sm:text-[1.02rem]">Society</h1>
            </div>
        </a>

        <div class="ml-auto hidden items-center gap-2 lg:flex">
            <a href="{{ route('dashboard') }}" class="site-nav-link {{ request()->routeIs('dashboard') ? 'is-active bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                    Dashboard
                </a>
            <div class="site-nav-program relative">
                <a href="{{ route('admin.programs') }}" class="site-nav-link {{ request()->routeIs('admin.programs') ? 'is-active bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                    Program
                </a>

                {{-- <div class="site-nav-program-panel absolute left-1/2 top-full z-20 w-[min(92vw,32rem)] pt-4">
                    <div class="site-nav-program-shell rounded-[2rem] p-3 sm:p-4">
                        <div class="mb-4 px-2 sm:mb-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-slate-400">Cari Institusi Mengikut Program</p>
                        </div>
                        <div class="grid gap-3 md:grid-cols-3">
                            <a href="{{ route('admin.institusis', ['jenis' => 'TVET']) }}" class="site-nav-program-card site-nav-program-card-tvet site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0s]">
                                <span class="site-nav-program-card-glow"></span>
                                <span class="site-nav-program-card-badge inline-flex rounded-full bg-white/18 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/90">Program</span>
                                <div class="mt-6 flex min-h-[7.25rem] items-end justify-between gap-4">
                                    <div>
                                        <p class="site-nav-program-card-title text-[1.75rem] font-semibold tracking-[-0.04em]">TVET</p>
                                        <p class="site-nav-program-card-copy mt-2 text-sm text-white/82">Cari institusi TVET dengan kuota tersedia.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('admin.institusis', ['jenis' => 'Diploma']) }}" class="site-nav-program-card site-nav-program-card-diploma site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0.4s]">
                                <span class="site-nav-program-card-glow"></span>
                                <span class="site-nav-program-card-badge inline-flex rounded-full bg-white/18 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/90">Program</span>
                                <div class="mt-6 flex min-h-[7.25rem] items-end justify-between gap-4">
                                    <div>
                                        <p class="site-nav-program-card-title text-[1.75rem] font-semibold tracking-[-0.04em]">Diploma</p>
                                        <p class="site-nav-program-card-copy mt-2 text-sm text-white/82">Cari institusi diploma yang sesuai untuk anda.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('admin.institusis', ['jenis' => 'Sains Kesihatan']) }}" class="site-nav-program-card site-nav-program-card-health site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0.8s]">
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
                </div> --}}
            </div>
            <a href="{{ route('admin.institusis') }}" class="site-nav-link {{ request()->routeIs('admin.institusis') ? 'is-active bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                Institusi
            </a>
            <a href="{{ route('admin.messages') }}" class="site-nav-link {{ request()->routeIs('admin.messages') ? 'is-active bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                Pertanyaan
            </a>
            <a href="{{ route('admin.users') }}" class="site-nav-link {{ request()->routeIs('admin.users') ? 'is-active bg-cyan-50 text-cyan-600' : 'text-slate-700 hover:bg-slate-50 hover:text-cyan-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
            Users
            </a>

            @if (!request()->routeIs('admin.event-report'))
                <button type="button" data-admin-theme-toggle class="theme-switch site-nav-login hidden lg:inline-flex" aria-label="Toggle Dark Mode" aria-pressed="false" data-theme-mode="light">
                    <span class="theme-switch-track" aria-hidden="true">
                        <i class="fas fa-sun"></i>
                        <i class="fas fa-moon"></i>
                    </span>
                    <span class="theme-switch-thumb" aria-hidden="true">
                        <i class="fas fa-sun"></i>
                    </span>
                </button>
            @endif
        </div>

        <div class="hidden lg:block">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="site-nav-link inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-cyan-500">Logout</button>
            </form>
        </div>

        @if (!request()->routeIs('admin.event-report'))
            <button type="button" data-admin-theme-toggle-mobile class="theme-switch site-nav-login ml-auto inline-flex lg:hidden" aria-label="Toggle Dark Mode" aria-pressed="false" data-theme-mode="light">
                <span class="theme-switch-track" aria-hidden="true">
                    <i class="fas fa-sun"></i>
                    <i class="fas fa-moon"></i>
                </span>
                <span class="theme-switch-thumb" aria-hidden="true">
                    <i class="fas fa-sun"></i>
                </span>
            </button>
        @endif

        <details class="site-nav-mobile ml-auto lg:hidden">
            <summary class="cursor-pointer">
                <span class="site-nav-menu-icon flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M4 7H20"></path>
                        <path d="M4 12H20"></path>
                        <path d="M4 17H20"></path>
                    </svg>
                </span>
            </summary>

            <div class="site-nav-mobile-panel absolute inset-x-4 top-full mt-3 rounded-3xl border border-slate-200 bg-white p-3 shadow-[0_24px_60px_rgba(15,23,42,0.14)] sm:inset-x-6">
                <div class="site-nav-mobile-links">
                    <a href="{{ route('dashboard') }}" class="site-nav-mobile-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.programs') }}" class="site-nav-mobile-link {{ request()->routeIs('admin.programs') ? 'is-active' : '' }}">Program</a>
                    <a href="{{ route('admin.institusis') }}" class="site-nav-mobile-link {{ request()->routeIs('admin.institusis') ? 'is-active' : '' }}">Institusi</a>
                    <a href="{{ route('admin.messages') }}" class="site-nav-mobile-link {{ request()->routeIs('admin.messages') ? 'is-active' : '' }}">Pertanyaan</a>
                    <a href="{{ route('admin.users') }}" class="site-nav-mobile-link {{ request()->routeIs('admin.users') ? 'is-active' : '' }}">Users</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline-flex">
                        @csrf
                        <button type="submit" class="site-nav-mobile-link">Logout</button>
                    </form>
                </div>
            </div>
        </details>
    </div>
</nav>

<script>
    (function() {
        const isEventReport = {{ request()->routeIs('admin.event-report') ? 'true' : 'false' }};
        const themeKey = 'adminThemeMode';
        const button = document.querySelector('[data-admin-theme-toggle]');
        const mobileButton = document.querySelector('[data-admin-theme-toggle-mobile]');

        const applyMode = (mode) => {
            if (mode === 'dark' && !isEventReport) {
                document.body.classList.add('admin-dark');
            } else {
                document.body.classList.remove('admin-dark');
            }

            [button, mobileButton].forEach((toggle) => {
                if (!toggle) return;
                const isDark = mode === 'dark';
                toggle.dataset.themeMode = isDark ? 'dark' : 'light';
                toggle.setAttribute('aria-pressed', isDark ? 'true' : 'false');
                const thumbIcon = toggle.querySelector('.theme-switch-thumb i');
                if (thumbIcon) {
                    thumbIcon.className = isDark ? 'fas fa-moon' : 'fas fa-sun';
                }
            });
        };

        const currentMode = localStorage.getItem(themeKey) || 'dark';
        applyMode(currentMode);

        const toggleTheme = () => {
            const nextMode = (localStorage.getItem(themeKey) || 'dark') === 'dark' ? 'light' : 'dark';
            localStorage.setItem(themeKey, nextMode);
            applyMode(nextMode);
        };

        button?.addEventListener('click', toggleTheme);
        mobileButton?.addEventListener('click', toggleTheme);
    })();
</script>

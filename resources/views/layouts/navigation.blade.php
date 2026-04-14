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
            background: linear-gradient(90deg, rgba(251, 146, 60, 0.14), rgba(249, 115, 22, 0.95), rgba(251, 146, 60, 0.14));
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
            border: 1px solid rgba(251, 146, 60, 0.12);
            background: linear-gradient(135deg, rgba(255, 247, 237, 0.82), rgba(255, 255, 255, 0.97) 52%, rgba(255, 250, 245, 0.9));
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            backdrop-filter: blur(10px);
        }

        .site-nav-brand:hover {
            border-color: rgba(249, 115, 22, 0.2);
            box-shadow: 0 16px 34px rgba(249, 115, 22, 0.1);
        }

        .site-nav-brand::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(251, 191, 36, 0.22), transparent 34%),
                radial-gradient(circle at bottom right, rgba(249, 115, 22, 0.12), transparent 32%);
            pointer-events: none;
        }

        .site-nav-brand::after {
            content: "";
            position: absolute;
            left: 4.4rem;
            right: 1rem;
            bottom: 0.58rem;
            height: 1px;
            background: linear-gradient(90deg, rgba(251, 146, 60, 0.25), rgba(251, 146, 60, 0));
            pointer-events: none;
        }

        .site-nav-brand-badge {
            position: relative;
            overflow: hidden;
            box-shadow: 0 14px 34px rgba(249, 115, 22, 0.14);
        }

        .site-nav-brand-badge::before {
            content: "";
            position: absolute;
            inset: 1px;
            border-radius: 1rem;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.94), rgba(255, 247, 237, 0.88));
        }

        .site-nav-brand-badge::after {
            content: "";
            position: absolute;
            inset: -35% auto auto -20%;
            width: 70%;
            height: 70%;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(251, 191, 36, 0.3), rgba(251, 191, 36, 0));
            pointer-events: none;
        }

        .site-nav-brand-mark,
        .site-nav-brand-copy {
            position: relative;
            z-index: 1;
        }

        .site-nav-brand-kicker,
        .site-nav-brand-title {
            font-family: 'Roboto Condensed', sans-serif !important;
            transition: transform 0.25s ease, letter-spacing 0.25s ease, color 0.25s ease;
        }

        .site-nav-brand:hover .site-nav-brand-kicker {
            letter-spacing: 0.28em;
            color: #ea580c;
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
            backdrop-filter: blur(10px);
        }

        .site-nav-link::before {
            content: "";
            position: absolute;
            inset: 1px;
            border-radius: inherit;
            background:
                linear-gradient(135deg, #ff8a1f, #f97316 56%, #ea580c 100%);
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
            border-color: rgba(249, 115, 22, 0.2);
            background: #f97316;
            color: #ffffff;
            box-shadow:
                0 14px 30px rgba(15, 23, 42, 0.08),
                0 0 24px rgba(249, 115, 22, 0.2),
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
                0 0 34px rgba(249, 115, 22, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.8),
                inset 0 -1px 0 rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(22px);
        }

        .site-nav-program-shell::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(251, 191, 36, 0.12), transparent 26%),
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
            border-color: rgba(249, 115, 22, 0.35);
            background: rgba(249, 115, 22, 0.12);
            color: #ea580c;
        }

        .site-nav-login:hover,
        .site-nav-menu-icon:hover {
            transform: translateY(-2px) scale(1.03);
            border-color: rgba(249, 115, 22, 0.28);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.94), rgba(255, 247, 237, 0.82));
            color: #ea580c;
            box-shadow:
                0 16px 30px rgba(15, 23, 42, 0.12),
                0 0 22px rgba(249, 115, 22, 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.78);
        }

        .site-nav-mobile-panel {
            opacity: 0;
            transform: translateY(-6px);
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
                linear-gradient(135deg, rgba(255, 255, 255, 0.36), rgba(255, 255, 255, 0.06) 40%, rgba(255, 255, 255, 0.02)),
                linear-gradient(180deg, rgba(255, 255, 255, 0.16), rgba(255, 255, 255, 0)),
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
                0 0 60px rgba(249, 115, 22, 0.12),
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
                linear-gradient(145deg, rgba(249, 115, 22, 0.84), rgba(251, 146, 60, 0.68), rgba(253, 186, 116, 0.48)),
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
            background-size: cover;
            background-position: center;
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
        
    </style>
@endonce

<nav class="site-nav">
    <div class="mx-auto flex max-w-7xl items-center gap-3 px-4 py-3 sm:px-6 lg:px-8">
        <a href="{{ url('/') }}" class="site-nav-brand flex min-w-0 items-center gap-3 rounded-[1.6rem]">
            <span class="site-nav-brand-badge flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-orange-100/90 bg-[linear-gradient(145deg,#fff7ed,#ffffff)] sm:h-14 sm:w-14">
                <img src="{{ asset('images/icon/noBgLogo.jpeg') }}" alt="logo" class="site-nav-brand-mark h-9 w-9 object-contain sm:h-10 sm:w-10">
            </span>
            <div class="site-nav-brand-copy min-w-0 leading-tight">
                <p class="site-nav-brand-kicker truncate text-[11px] uppercase tracking-[0.05em] text-orange-500 sm:text-xs">UPKB</p>
                <h1 class="site-nav-brand-title text-sm tracking-[-0.02em] text-slate-900 sm:text-[1.02rem]" style="font-family: 'Roboto Condensed', sans-serif;">Unit Pembangunan</h1>
                <h1 class="site-nav-brand-title text-sm tracking-[-0.02em] text-slate-900 sm:text-[1.02rem]" style="font-family: 'Roboto Condensed', sans-serif;">Kemahiran Belia</h1>
            </div>
        </a>

        <div class="ml-auto hidden items-center gap-2 lg:flex">
            <div class="site-nav-program relative">
                <a href="{{ route('program') }}" class="site-nav-link {{ request()->routeIs('program') ? 'is-active bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                    Program
                </a>

                <div class="site-nav-program-panel absolute left-1/2 top-full z-20 w-[min(92vw,32rem)] pt-4">
                    <div class="site-nav-program-shell rounded-[2rem] p-3 sm:p-4">
                        <div class="mb-4 px-2 sm:mb-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.1em] text-slate-400">Kategori Program</p>
                        </div>
                        <div class="grid gap-3 md:grid-cols-3">
                            <a href="{{ route('kursus.index', ['jenis' => 'TVET']) }}" class="site-nav-program-card site-nav-program-card-tvet site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0s]">
                                <span class="site-nav-program-card-glow"></span>
                                <span class="site-nav-program-card-badge inline-flex rounded-full bg-white/18 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/90">Kategori</span>
                                <div class="mt-6 flex min-h-[7.25rem] items-end justify-between gap-4">
                                    <div>
                                        <p class="site-nav-program-card-title text-[1.75rem] font-semibold tracking-[-0.04em]">TVET</p>
                                        <p class="site-nav-program-card-copy mt-2 text-sm text-white/82">Laluan kemahiran teknikal dan praktikal.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('kursus.index', ['jenis' => 'Diploma']) }}" class="site-nav-program-card site-nav-program-card-diploma site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0.4s]">
                                <span class="site-nav-program-card-glow"></span>
                                <span class="site-nav-program-card-badge inline-flex rounded-full bg-white/18 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/90">Kategori</span>
                                <div class="mt-6 flex min-h-[7.25rem] items-end justify-between gap-4">
                                    <div>
                                        <p class="site-nav-program-card-title text-[1.75rem] font-semibold tracking-[-0.04em]">Diploma</p>
                                        <p class="site-nav-program-card-copy mt-2 text-sm text-white/82">Program akademik untuk kemajuan kerjaya.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('kursus.index', ['jenis' => 'Sains Kesihatan']) }}" class="site-nav-program-card site-nav-program-card-health site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0.8s]">
                                <span class="site-nav-program-card-glow"></span>
                                <span class="site-nav-program-card-badge inline-flex rounded-full bg-white/18 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/90">Kategori</span>
                                <div class="mt-6 flex min-h-[7.25rem] items-end justify-between gap-4">
                                    <div>
                                        <p class="site-nav-program-card-title text-[1.75rem] font-semibold tracking-[-0.04em]">Sains Kesihatan</p>
                                        <p class="site-nav-program-card-copy mt-2 text-sm text-white/82">Fokus kepada latihan kesihatan dan klinikal.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-nav-program relative">
                <a href="{{ route('institusi') }}" class="site-nav-link {{ request()->routeIs('institusi') ? 'is-active bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                    Institusi
                </a>

                <div class="site-nav-program-panel absolute left-1/2 top-full z-20 w-[min(92vw,32rem)] pt-4">
                    <div class="site-nav-program-shell rounded-[2rem] p-3 sm:p-4">
                        <div class="mb-4 px-2 sm:mb-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-slate-400">Cari Institusi Mengikut Program</p>
                        </div>
                        <div class="grid gap-3 md:grid-cols-3">
                            <a href="{{ route('institusi', ['jenis' => 'TVET']) }}" class="site-nav-program-card site-nav-program-card-tvet site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0s]">
                                <span class="site-nav-program-card-glow"></span>
                                <span class="site-nav-program-card-badge inline-flex rounded-full bg-white/18 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/90">Program</span>
                                <div class="mt-6 flex min-h-[7.25rem] items-end justify-between gap-4">
                                    <div>
                                        <p class="site-nav-program-card-title text-[1.75rem] font-semibold tracking-[-0.04em]">TVET</p>
                                        <p class="site-nav-program-card-copy mt-2 text-sm text-white/82">Cari institusi TVET dengan kuota tersedia.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('institusi', ['jenis' => 'Diploma']) }}" class="site-nav-program-card site-nav-program-card-diploma site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0.4s]">
                                <span class="site-nav-program-card-glow"></span>
                                <span class="site-nav-program-card-badge inline-flex rounded-full bg-white/18 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/90">Program</span>
                                <div class="mt-6 flex min-h-[7.25rem] items-end justify-between gap-4">
                                    <div>
                                        <p class="site-nav-program-card-title text-[1.75rem] font-semibold tracking-[-0.04em]">Diploma</p>
                                        <p class="site-nav-program-card-copy mt-2 text-sm text-white/82">Cari institusi diploma yang sesuai untuk anda.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('institusi', ['jenis' => 'Sains Kesihatan']) }}" class="site-nav-program-card site-nav-program-card-health site-nav-program-card-floating rounded-[1.9rem] px-5 py-5 text-white [animation-delay:0.8s]">
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

            <a href="{{ route('faq') }}" class="site-nav-link {{ request()->routeIs('faq') ? 'is-active bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                FAQ
            </a>
            <a href="{{ route('hubungi') }}" class="site-nav-link {{ request()->routeIs('hubungi') ? 'is-active bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                Hubungi
            </a>
        </div>

        <a href="/login" class="site-nav-login hidden h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm hover:-translate-y-0.5 hover:border-orange-200 hover:text-orange-500 hover:shadow-md sm:flex lg:ml-2" aria-label="Login">
            <img src="{{ asset('images/icon/loginIcon.png') }}" alt="login" class="h-6 w-6 object-contain">
        </a>

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

            <div class="site-nav-mobile-panel absolute inset-x-4 top-full mt-3 rounded-3xl border border-slate-200 bg-white p-4 shadow-[0_24px_60px_rgba(15,23,42,0.14)] sm:inset-x-6">
                <div class="space-y-2">
                    <a href="{{ route('program') }}" class="{{ request()->routeIs('program') ? 'bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} block rounded-2xl px-4 py-3 text-sm font-semibold">
                        Program
                    </a>
                    <div class="grid gap-3 rounded-[1.6rem] bg-slate-50/90 p-3 sm:grid-cols-3">
                        <a href="{{ route('kursus.index', ['jenis' => 'TVET']) }}" class="site-nav-mobile-program-card site-nav-program-card-tvet rounded-[1.5rem] px-4 py-4 text-white">
                            <span class="inline-flex rounded-full bg-white/18 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/85">Kategori</span>
                            <p class="mt-4 text-lg font-semibold tracking-[-0.03em]">TVET</p>
                            <p class="mt-1 text-xs leading-6 text-white/80">Laluan kemahiran teknikal dan praktikal.</p>
                        </a>
                        <a href="{{ route('kursus.index', ['jenis' => 'Diploma']) }}" class="site-nav-mobile-program-card site-nav-program-card-diploma rounded-[1.5rem] px-4 py-4 text-white">
                            <span class="inline-flex rounded-full bg-white/18 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/85">Kategori</span>
                            <p class="mt-4 text-lg font-semibold tracking-[-0.03em]">Diploma</p>
                            <p class="mt-1 text-xs leading-6 text-white/80">Program akademik untuk kemajuan kerjaya.</p>
                        </a>
                        <a href="{{ route('kursus.index', ['jenis' => 'Sains Kesihatan']) }}" class="site-nav-mobile-program-card site-nav-program-card-health rounded-[1.5rem] px-4 py-4 text-white">
                            <span class="inline-flex rounded-full bg-white/18 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/85">Kategori</span>
                            <p class="mt-4 text-lg font-semibold tracking-[-0.03em]">Sains Kesihatan</p>
                            <p class="mt-1 text-xs leading-6 text-white/80">Fokus kepada latihan kesihatan dan klinikal.</p>
                        </a>
                    </div>
                    <a href="{{ route('institusi') }}" class="{{ request()->routeIs('institusi') ? 'bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} block rounded-2xl px-4 py-3 text-sm font-semibold">
                        Institusi
                    </a>
                    <div class="grid gap-3 rounded-[1.6rem] bg-slate-50/90 p-3 sm:grid-cols-3">
                        <a href="{{ route('institusi', ['jenis' => 'TVET']) }}" class="site-nav-mobile-program-card site-nav-program-card-tvet rounded-[1.5rem] px-4 py-4 text-white">
                            <span class="inline-flex rounded-full bg-white/18 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/85">Program</span>
                            <p class="mt-4 text-lg font-semibold tracking-[-0.03em]">TVET</p>
                            <p class="mt-1 text-xs leading-6 text-white/80">Cari institusi TVET.</p>
                        </a>
                        <a href="{{ route('institusi', ['jenis' => 'Diploma']) }}" class="site-nav-mobile-program-card site-nav-program-card-diploma rounded-[1.5rem] px-4 py-4 text-white">
                            <span class="inline-flex rounded-full bg-white/18 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/85">Program</span>
                            <p class="mt-4 text-lg font-semibold tracking-[-0.03em]">Diploma</p>
                            <p class="mt-1 text-xs leading-6 text-white/80">Cari institusi diploma.</p>
                        </a>
                        <a href="{{ route('institusi', ['jenis' => 'Sains Kesihatan']) }}" class="site-nav-mobile-program-card site-nav-program-card-health rounded-[1.5rem] px-4 py-4 text-white">
                            <span class="inline-flex rounded-full bg-white/18 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-white/85">Program</span>
                            <p class="mt-4 text-lg font-semibold tracking-[-0.03em]">Sains Kesihatan</p>
                            <p class="mt-1 text-xs leading-6 text-white/80">Cari institusi kesihatan.</p>
                        </a>
                    </div>
                    <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} block rounded-2xl px-4 py-3 text-sm font-semibold">
                        FAQ
                    </a>
                    <a href="{{ route('hubungi') }}" class="{{ request()->routeIs('hubungi') ? 'bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} block rounded-2xl px-4 py-3 text-sm font-semibold">
                        Hubungi
                    </a>
                    <a href="/login" class="mt-3 flex items-center justify-center gap-2 rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold text-slate-700 hover:border-orange-200 hover:text-orange-500">
                        <img src="{{ asset('images/icon/loginIcon.png') }}" alt="login" class="h-5 w-5 object-contain">
                        Log Masuk
                    </a>
                </div>
            </div>
        </details>
    </div>
</nav>

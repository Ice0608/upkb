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
            position: relative;
        }

        .site-nav-link::after {
            content: "";
            position: absolute;
            left: 0.875rem;
            right: 0.875rem;
            bottom: 0.45rem;
            height: 2px;
            border-radius: 999px;
            background: linear-gradient(90deg, #fb923c, #f97316);
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
            color: #f97316;
            background: #f8fafc;
        }

        .site-nav-mobile-link.is-active {
            color: #f97316;
            background: #fff7ed;
            box-shadow: inset 0 -2px 0 rgba(249, 115, 22, 0.7);
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
                <img src="{{ asset('images/icon/seslogoo.png') }}" alt="SES logo" class="site-nav-brand-mark h-9 w-9 object-contain sm:h-10 sm:w-10">
            </span>
            <div class="site-nav-brand-copy min-w-0 leading-tight">
                <p class="site-nav-brand-kicker truncate text-[11px] uppercase tracking-[0.05em] text-orange-500 sm:text-xs">SES</p>
                <h1 class="site-nav-brand-title text-sm tracking-[-0.02em] text-slate-900 sm:text-[1.02rem]">SMART Education</h1>
                <h1 class="site-nav-brand-title text-sm tracking-[-0.02em] text-slate-900 sm:text-[1.02rem]">Society</h1>
            </div>
        </a>

        <div class="ml-auto hidden items-center gap-2 lg:flex">
            <a href="{{ route('dashboard') }}" class="site-nav-link {{ request()->routeIs('dashboard') ? 'is-active bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                    Dashboard
                </a>
            <div class="site-nav-program relative">
                <a href="{{ route('admin.programs') }}" class="site-nav-link {{ request()->routeIs('admin.programs') ? 'is-active bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                    Program
                </a>

                <div class="site-nav-program-panel absolute left-1/2 top-full z-20 w-[min(92vw,32rem)] pt-4">
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
                </div>
            </div>
            <a href="{{ route('admin.institusis') }}" class="site-nav-link {{ request()->routeIs('admin.institusis') ? 'is-active bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                Institusi
            </a>
            <a href="{{ route('admin.messages') }}" class="site-nav-link {{ request()->routeIs('admin.messages') ? 'is-active bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
                Pertanyaan
            </a>
            <a href="{{ route('admin.users') }}" class="site-nav-link {{ request()->routeIs('admin.users') ? 'is-active bg-orange-50 text-orange-600' : 'text-slate-700 hover:bg-slate-50 hover:text-orange-500' }} inline-flex items-center rounded-full px-4 py-3 text-sm font-semibold">
            Users
            </a>
        </div>

        <div class="hidden lg:block">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-600 hover:text-orange-500">Logout</button>
            </form>
        </div>

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

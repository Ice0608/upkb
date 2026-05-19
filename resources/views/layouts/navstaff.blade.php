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

        .site-nav-brand {
            position: relative;
            overflow: hidden;
            padding: 0.7rem 0.95rem 0.7rem 0.7rem;
            border: 1px solid rgba(20, 184, 166, 0.14);
            background: linear-gradient(135deg, rgba(236, 253, 245, 0.92), rgba(255, 255, 255, 0.98) 52%, rgba(240, 253, 250, 0.92));
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            backdrop-filter: blur(10px);
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .site-nav-brand:hover {
            transform: translateY(-1px);
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

        .site-nav-action {
            transition: transform 0.22s ease, border-color 0.22s ease, background-color 0.22s ease, color 0.22s ease, box-shadow 0.22s ease;
        }

        .site-nav-action:hover {
            transform: translateY(-1px);
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
            background: linear-gradient(135deg, rgba(255,255,255,0.98), rgba(255,247,237,0.94));
            box-shadow: 0 10px 28px rgba(15, 23, 42, 0.10);
            transition: transform 0.22s ease, border-color 0.22s ease, box-shadow 0.22s ease, background 0.22s ease;
        }

        .theme-switch:hover {
            transform: translateY(-1px);
            border-color: rgba(251, 146, 60, 0.48);
            box-shadow: 0 16px 34px rgba(249, 115, 22, 0.16);
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
            background: linear-gradient(135deg, #f97316, #fb923c);
            box-shadow: 0 12px 24px rgba(249, 115, 22, 0.24);
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

        html.dark .site-nav {
            border-bottom-color: rgba(148, 163, 184, 0.18);
            background: rgba(15, 23, 42, 0.9);
            box-shadow: 0 14px 38px rgba(0, 0, 0, 0.28);
        }

        html.dark .site-nav-brand {
            border-color: rgba(45, 212, 191, 0.24);
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 0.96));
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.24);
        }

        html.dark .site-nav-brand-badge {
            border-color: rgba(45, 212, 191, 0.3);
            background: rgba(15, 23, 42, 0.7) !important;
        }

        html.dark .site-nav-brand-badge::before {
            background: linear-gradient(145deg, rgba(15, 23, 42, 0.86), rgba(30, 41, 59, 0.78));
        }

        html.dark .site-nav-brand-title {
            color: #f8fafc;
        }

        html.dark .site-nav-brand:hover .site-nav-brand-title {
            color: #ccfbf1;
        }

        html.dark .site-nav-action {
            border-color: rgba(148, 163, 184, 0.22);
            background: rgba(30, 41, 59, 0.86);
            color: #cbd5e1;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        html.dark .site-nav-action:hover {
            border-color: rgba(45, 212, 191, 0.45);
            color: #5eead4;
            background: rgba(15, 23, 42, 0.92);
        }
    </style>
@endonce

<nav class="site-nav">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
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

        <div class="flex items-center gap-3">
            <button id="theme-toggle" type="button" class="theme-switch site-nav-action" aria-label="Toggle Dark Mode" aria-pressed="false" data-theme-mode="light">
                <span class="theme-switch-track" aria-hidden="true">
                    <i class="fas fa-sun"></i>
                    <i class="fas fa-moon"></i>
                </span>
                <span class="theme-switch-thumb" aria-hidden="true">
                    <i class="fas fa-sun"></i>
                </span>
            </button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="site-nav-action inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-600 shadow-sm hover:border-teal-200 hover:text-teal-600">Logout</button>
            </form>
        </div>
    </div>
</nav>

@once
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const themeToggleBtn = document.getElementById('theme-toggle');

            function syncThemeIcon() {
                const isDark = document.documentElement.classList.contains('dark');
                if (themeToggleBtn) {
                    themeToggleBtn.dataset.themeMode = isDark ? 'dark' : 'light';
                    themeToggleBtn.setAttribute('aria-pressed', isDark ? 'true' : 'false');
                    const thumbIcon = themeToggleBtn.querySelector('.theme-switch-thumb i');
                    if (thumbIcon) {
                        thumbIcon.className = isDark ? 'fas fa-moon' : 'fas fa-sun';
                    }
                }
            }

            function toggleTheme() {
                const isDark = document.documentElement.classList.contains('dark');

                if (isDark) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }

                syncThemeIcon();
            }

            syncThemeIcon();

            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', toggleTheme);
            }
        });
    </script>
@endonce

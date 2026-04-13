<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Senarai Kursus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .kursus-page {
            position: relative;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(245, 158, 11, 0.22), transparent 20%),
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.14), transparent 26%),
                radial-gradient(circle at bottom center, rgba(249, 115, 22, 0.16), transparent 24%),
                linear-gradient(180deg, #fff1db 0%, #f8fafc 46%, #e8efff 100%);
        }

        .kursus-page::before,
        .kursus-page::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .kursus-page::before {
            background:
                linear-gradient(120deg, rgba(255, 255, 255, 0.52), rgba(255, 255, 255, 0) 40%),
                repeating-linear-gradient(90deg, rgba(148, 163, 184, 0.035) 0 1px, transparent 1px 120px),
                repeating-linear-gradient(180deg, rgba(148, 163, 184, 0.025) 0 1px, transparent 1px 120px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.18));
            opacity: 0.55;
        }

        .kursus-page::after {
            inset: auto auto 3rem 50%;
            width: min(76rem, calc(100vw - 2rem));
            height: 18rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 184, 28, 0.34), rgba(255, 184, 28, 0) 68%);
            filter: blur(36px);
            opacity: 0.94;
        }

        .kursus-page > * {
            position: relative;
            z-index: 1;
        }

        .kursus-shell {
            position: relative;
            isolation: isolate;
        }

        .kursus-shell::before,
        .kursus-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .kursus-shell::before {
            top: 1rem;
            left: -3rem;
            width: 16rem;
            height: 16rem;
            border-radius: 2rem;
            background:
                radial-gradient(circle at 30% 30%, rgba(255, 166, 0, 0.3), rgba(255, 166, 0, 0) 56%),
                linear-gradient(145deg, rgba(255, 255, 255, 0.36), rgba(255, 255, 255, 0));
            filter: blur(10px);
            opacity: 0.9;
        }

        .kursus-shell::after {
            right: -2rem;
            top: 10rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.18), rgba(37, 99, 235, 0) 70%);
            filter: blur(6px);
            opacity: 0.84;
        }

        .kursus-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background: linear-gradient(90deg, #ff7300 0%, #ffd43b 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(255, 166, 0, 0.3),
                0 0 130px rgba(255, 212, 59, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .kursus-hero::before,
        .kursus-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .kursus-hero::before {
            top: -3rem;
            right: 8%;
            width: 11rem;
            height: 11rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.16), rgba(255, 255, 255, 0) 72%);
            border: 1px solid rgba(255, 255, 255, 0.24);
            box-shadow:
                0 0 36px rgba(255, 235, 140, 0.34),
                0 0 0 18px rgba(255, 255, 255, 0.08),
                0 0 0 40px rgba(255, 255, 255, 0.04);
            animation: kursusGlowPulse 7s ease-in-out infinite;
        }

        .kursus-hero::after {
            left: 4%;
            bottom: -1.5rem;
            width: 8rem;
            height: 8rem;
            border-radius: 2rem;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0)),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 18px),
                repeating-linear-gradient(180deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 18px);
            transform: rotate(12deg);
            box-shadow: 0 0 42px rgba(255, 228, 92, 0.28);
            opacity: 0.68;
        }

        .kursus-hero-button {
            border: 1px solid rgba(255, 255, 255, 0.74);
            box-shadow:
                0 0 0 6px rgba(255, 255, 255, 0.14),
                0 0 34px rgba(255, 166, 0, 0.34),
                0 16px 36px rgba(15, 23, 42, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .kursus-hero-button:hover {
            transform: translateY(-3px) scale(1.04);
            box-shadow:
                0 0 0 8px rgba(255, 255, 255, 0.16),
                0 0 42px rgba(255, 187, 51, 0.44),
                0 22px 44px rgba(15, 23, 42, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.92);
        }

        .sidebar-scroll {
            max-height: calc(100vh - 250px);
            overflow-y: auto;
        }

        .kursus-sidebar {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.74)),
                linear-gradient(135deg, rgba(255, 166, 0, 0.1), rgba(37, 99, 235, 0.06));
            box-shadow:
                0 22px 56px rgba(15, 23, 42, 0.1),
                0 0 34px rgba(255, 184, 28, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(16px);
        }

        .kursus-sidebar::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.42), transparent 28%),
                radial-gradient(circle at bottom left, rgba(255, 184, 77, 0.08), transparent 24%);
            pointer-events: none;
        }

        .category-btn {
            transition: all 0.3s ease;
        }

        .kursus-select {
            border: 1px solid rgba(148, 163, 184, 0.28);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.84), rgba(255, 255, 255, 0.68)),
                linear-gradient(135deg, rgba(255, 166, 0, 0.08), rgba(37, 99, 235, 0.05));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.88);
        }

        .kursus-select:focus {
            border-color: rgba(249, 115, 22, 0.36);
            box-shadow:
                0 0 0 4px rgba(249, 115, 22, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .kursus-filter-button,
        .kursus-reset-link,
        .kursus-cta {
            transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
        }

        .kursus-filter-button {
            box-shadow:
                0 12px 28px rgba(249, 115, 22, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.36);
        }

        .kursus-filter-button:hover,
        .kursus-reset-link:hover,
        .kursus-cta:hover {
            transform: translateY(-2px);
        }

        .kursus-reset-link {
            box-shadow: 0 10px 24px rgba(249, 115, 22, 0.06);
        }

        .course-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(255, 255, 255, 0.82));
            box-shadow:
                0 18px 42px rgba(15, 23, 42, 0.08),
                0 0 26px rgba(255, 184, 28, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.88);
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }

        .course-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.44), transparent 28%),
                radial-gradient(circle at bottom left, rgba(255, 184, 77, 0.08), transparent 24%);
            pointer-events: none;
            z-index: 0;
        }

        .course-card > * {
            position: relative;
            z-index: 1;
        }

        .course-card:hover {
            transform: translateY(-6px);
            border-color: rgba(255, 232, 168, 0.9);
            box-shadow:
                0 28px 60px rgba(15, 23, 42, 0.12),
                0 0 42px rgba(255, 166, 0, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.94);
        }

        .kursus-tag,
        .kursus-pill {
            box-shadow:
                0 10px 20px rgba(15, 23, 42, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .kursus-cta {
            box-shadow:
                0 16px 34px rgba(249, 115, 22, 0.18),
                0 0 28px rgba(255, 166, 0, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.18);
        }

        .kursus-cta:hover {
            box-shadow:
                0 24px 42px rgba(249, 115, 22, 0.22),
                0 0 38px rgba(255, 166, 0, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
            filter: saturate(1.04);
        }

        .kursus-empty {
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.76));
            box-shadow:
                0 18px 42px rgba(15, 23, 42, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.88);
        }

        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        @keyframes kursusGlowPulse {
            0%, 100% {
                opacity: 0.72;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .course-card,
            .kursus-hero-button,
            .kursus-filter-button,
            .kursus-reset-link,
            .kursus-cta,
            .category-btn {
                transition: none;
            }

            .kursus-hero::before {
                animation: none;
            }
        }
    </style>
</head>
<body class="kursus-page text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="kursus-shell max-w-7xl mx-auto px-6 py-10">
        <div class="kursus-hero rounded-3xl p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        @if(request('jenis'))
                            Kursus {{ request('jenis') }}
                        @else
                            Senarai Kursus
                        @endif
                    </h1>
                    <p class="mt-3 text-lg text-orange-100">Cari dan jelajahi kursus yang sesuai dengan minat anda.</p>
                </div>
                <button class="kursus-hero-button w-14 h-14 rounded-full bg-white text-orange-600">
                    <i class="fas fa-graduation-cap"></i>
                </button>
            </div>
        </div>

        <!-- SIDEBAR + GRID LAYOUT -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            
            {{-- SIDEBAR (LEFT) --}}
            <aside class="lg:col-span-1">
                <div class="kursus-sidebar rounded-3xl p-6">
                    <!-- Filter Section -->
                    <h3 class="relative z-10 text-lg font-bold text-slate-900 mb-4">
                        <i class="fas fa-filter mr-2 text-orange-500"></i>Filter
                    </h3>
                    
                    <form method="GET" class="relative z-10 space-y-4 mb-6">
                        <!-- Negeri Select -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Negeri</label>
                            <select 
                                name="negeri" 
                                onchange="this.form.submit()" 
                                class="kursus-select w-full rounded-2xl px-4 py-2 text-sm shadow-sm focus:outline-none"
                            >
                                <option value="">Semua Negeri</option>
                                <option value="Johor" {{ request('negeri') == 'Johor' ? 'selected' : '' }}>Johor</option>
                                <option value="Kedah" {{ request('negeri') == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                                <option value="Kelantan" {{ request('negeri') == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                                <option value="Melaka" {{ request('negeri') == 'Melaka' ? 'selected' : '' }}>Melaka</option>
                                <option value="Negeri Sembilan" {{ request('negeri') == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
                                <option value="Pahang" {{ request('negeri') == 'Pahang' ? 'selected' : '' }}>Pahang</option>
                                <option value="Perak" {{ request('negeri') == 'Perak' ? 'selected' : '' }}>Perak</option>
                                <option value="Perlis" {{ request('negeri') == 'Perlis' ? 'selected' : '' }}>Perlis</option>
                                <option value="Pulau Pinang" {{ request('negeri') == 'Pulau Pinang' ? 'selected' : '' }}>Pulau Pinang</option>
                                <option value="Sabah" {{ request('negeri') == 'Sabah' ? 'selected' : '' }}>Sabah</option>
                                <option value="Sarawak" {{ request('negeri') == 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
                                <option value="Selangor" {{ request('negeri') == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                                <option value="Terengganu" {{ request('negeri') == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
                                <option value="Kuala Lumpur" {{ request('negeri') == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                                <option value="Labuan" {{ request('negeri') == 'Labuan' ? 'selected' : '' }}>Labuan</option>
                                <option value="Putrajaya" {{ request('negeri') == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
                            </select>
                        </div>

                        <!-- Kuota Filter -->
                        <div>
                            <button 
                                type="submit" 
                                name="kuota" 
                                value="{{ request('kuota') ? 0 : 1 }}" 
                                class="kursus-filter-button w-full inline-flex items-center justify-center rounded-2xl border px-4 py-2 text-sm font-semibold transition {{ request('kuota') ? 'bg-orange-500 border-orange-500 text-white hover:bg-orange-600' : 'bg-white border-orange-300 text-orange-600 hover:bg-orange-50' }}"
                            >
                                <i class="fas fa-users mr-2"></i>
                                Ada Kuota
                                @if(request('kuota'))
                                    <i class="fas fa-check ml-2"></i>
                                @endif
                            </button>
                        </div>

                        <!-- Clear Filter -->
                        @if(request('negeri') || request('kuota'))
                            <div>
                                <a 
                                    href="{{ route('kursus.index') }}"
                                    class="kursus-reset-link block text-center text-orange-600 hover:text-orange-700 font-semibold text-sm py-2 rounded-2xl border border-orange-300 hover:bg-orange-50 transition"
                                >
                                    <i class="fas fa-redo mr-2"></i>Reset Filter
                                </a>
                            </div>
                        @endif

                        @if(request('jenis'))
                            <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                        @endif
                    </form>

                    <!-- Senarai Kursus Filter -->
                    <div class="relative z-10 border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">
                            <i class="fas fa-list-ul mr-2 text-orange-500"></i>Kategori Kursus
                        </h3>
                        
                        <div class="flex flex-col space-y-1 sidebar-scroll">
                            <!-- Semua Kursus Button -->
                            <button 
                                onclick="filterCourses('')"
                                class="category-btn flex items-center px-4 py-3 rounded-xl text-sm font-medium transition-all bg-orange-100 text-orange-700 hover:bg-orange-200"
                                id="btn-all"
                            >
                                <span class="w-4 h-4 mr-3 rounded-full border-2 border-orange-500 flex items-center justify-center">
                                    <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                                </span>
                                Semua Kursus
                            </button>

                            {{-- Loop nama yang unik sahaja --}}
                            @foreach($kursusList->unique('nama_kursus') as $kursus)
                                <button 
                                    onclick="filterCourses('{{ addslashes($kursus->nama_kursus) }}')"
                                    class="category-btn flex items-center px-4 py-3 rounded-xl text-sm font-medium transition-all text-gray-600 hover:bg-gray-50 hover:text-orange-500"
                                    id="btn-{{ str_replace(' ', '-', strtolower($kursus->nama_kursus)) }}"
                                >
                                    <span class="w-4 h-4 mr-3 rounded-full border-2 border-gray-300 flex items-center justify-center transition-colors">
                                    </span>
                                    
                                    <span class="truncate">{{ $kursus->nama_kursus }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>

            {{-- MAIN GRID (RIGHT) - UNIQUE COURSES ONLY --}}
            <main class="lg:col-span-3">
                <div id="courses-container" class="grid md:grid-cols-3 gap-6">
                    @forelse($kursusList->unique('nama_kursus')->values() as $kursus)
                    <article class="group rounded-3xl bg-white shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition course-card cursor-pointer" 
                             data-course-name="{{ $kursus->nama_kursus }}"
                             onclick="window.location.href='{{ route('kursus.showByName', urlencode($kursus->nama_kursus)) }}'">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset($kursus->institusi->gambar_institusi ?? 'images/default-college.jpg') }}" alt="{{ $kursus->nama_kursus }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-x-0 top-4 px-4 flex items-start justify-between gap-3">
                                <span class="kursus-tag inline-flex items-center rounded-full bg-orange-600/95 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-white shadow-sm">{{ $kursus->institusi->jenis_institusi ?? 'Program' }}</span>
                                <div class="inline-flex items-center gap-2">
                                    <span class="kursus-pill inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-orange-600 shadow-sm">{{ $kursus->jenis_kursus }}</span>
                                    <span class="kursus-pill inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-orange-600 shadow-sm">Kuota {{ $kursus->kuota ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <h2 class="text-2xl font-bold text-slate-900 mb-2">{{ $kursus->nama_kursus }}</h2>
                            <p class="text-sm text-gray-500 mb-4">{{ $kursus->institusi->nama_institusi ?? 'Institusi tidak ditetapkan' }}</p>

                            <div class="grid gap-3 text-sm text-gray-600 mb-5">
                                <div class="inline-flex items-center gap-2 px-4 py-3 rounded-2xl bg-gray-50">
                                    <i class="fas fa-university text-orange-500"></i>
                                    <span>{{ $kursus->institusi->nama_institusi ?? 'N/A' }}</span>
                                </div>
                                <div class="inline-flex items-center gap-2 px-4 py-3 rounded-2xl bg-gray-50">
                                    <i class="fas fa-calendar-days text-orange-500"></i>
                                    <span>Tarikh daftar: {{ optional($kursus->tarikh_pendaftaran)->format('d M Y') ?? '-' }}</span>
                                </div>
                            </div>

                            <button class="kursus-cta inline-flex items-center justify-between w-full rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:bg-orange-600 transition">
                                <span>Lihat Pilihan Kursus</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </article>
                    @empty
                    <div class="kursus-empty col-span-3 rounded-3xl p-10 text-center text-gray-500 shadow-sm">
                        Tiada kursus ditemui.
                    </div>
                    @endforelse
                </div>
            </main>

        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

    <script>
        function filterCourses(courseName) {
            const container = document.getElementById('courses-container');
            const cards = document.querySelectorAll('.course-card');
            let visibleCount = 0;

            // Update button styles
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('bg-orange-100', 'text-orange-700', 'hover:bg-orange-200');
                btn.classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-orange-500');
                btn.querySelector('span').classList.remove('border-orange-500');
                btn.querySelector('span').classList.add('border-gray-300');
                btn.querySelector('span span')?.remove();
            });

            // Highlight active button
            if (courseName === '') {
                document.getElementById('btn-all').classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-orange-500');
                document.getElementById('btn-all').classList.add('bg-orange-100', 'text-orange-700', 'hover:bg-orange-200');
                document.getElementById('btn-all').querySelector('span').classList.remove('border-gray-300');
                document.getElementById('btn-all').querySelector('span').classList.add('border-orange-500');
                document.getElementById('btn-all').querySelector('span').innerHTML = '<span class="w-2 h-2 bg-orange-500 rounded-full"></span>';
            } else {
                const btnId = 'btn-' + courseName.replace(/ /g, '-').toLowerCase();
                const activeBtn = document.getElementById(btnId);
                if (activeBtn) {
                    activeBtn.classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-orange-500');
                    activeBtn.classList.add('bg-orange-50', 'text-orange-600', 'font-bold', 'hover:bg-orange-100');
                    activeBtn.querySelector('span').classList.remove('border-gray-300');
                    activeBtn.querySelector('span').classList.add('border-orange-500');
                    activeBtn.querySelector('span').innerHTML = '<span class="w-2 h-2 bg-orange-500 rounded-full"></span>';
                }
            }

            // Filter cards
            cards.forEach(card => {
                const cardCourseName = card.getAttribute('data-course-name');
                const matches = courseName === '' || cardCourseName === courseName;
                
                if (matches) {
                    card.style.display = '';
                    card.style.animation = 'fadeIn 0.3s ease-in';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide empty state
            if (visibleCount === 0) {
                container.innerHTML = '<div class="kursus-empty col-span-3 rounded-3xl p-10 text-center text-gray-500 shadow-sm">Tiada kursus ditemui.</div>';
            }
        }

        // Add fade-in animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        `;
        document.head.appendChild(style);
    </script>

</body>
</html>

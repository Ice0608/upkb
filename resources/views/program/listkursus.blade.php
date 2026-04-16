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
            overflow-x: hidden;
            background:
                radial-gradient(circle at 8% 12%, rgba(251, 146, 60, 0.2), transparent 22%),
                radial-gradient(circle at 88% 14%, rgba(59, 130, 246, 0.1), transparent 22%),
                radial-gradient(circle at 50% 100%, rgba(251, 191, 36, 0.16), transparent 26%),
                linear-gradient(180deg, #fff6e8 0%, #f8fafc 44%, #eef4ff 100%);
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
                linear-gradient(120deg, rgba(255, 255, 255, 0.46), rgba(255, 255, 255, 0) 38%),
                repeating-linear-gradient(90deg, rgba(148, 163, 184, 0.03) 0 1px, transparent 1px 120px),
                repeating-linear-gradient(180deg, rgba(148, 163, 184, 0.02) 0 1px, transparent 1px 120px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.92), rgba(0, 0, 0, 0.18));
            opacity: 0.55;
        }

        .kursus-page::after {
            inset: auto auto 2rem 50%;
            width: min(78rem, calc(100vw - 2rem));
            height: 18rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(251, 191, 36, 0.28), rgba(251, 191, 36, 0) 68%);
            filter: blur(36px);
            opacity: 0.9;
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
            top: 0.5rem;
            left: -2.5rem;
            width: 16rem;
            height: 16rem;
            border-radius: 2.25rem;
            background:
                radial-gradient(circle at 30% 30%, rgba(251, 146, 60, 0.24), rgba(251, 146, 60, 0) 58%),
                linear-gradient(145deg, rgba(255, 255, 255, 0.42), rgba(255, 255, 255, 0));
            filter: blur(10px);
            opacity: 0.92;
        }

        .kursus-shell::after {
            right: -2rem;
            top: 10rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.18), rgba(59, 130, 246, 0) 70%);
            filter: blur(8px);
            opacity: 0.82;
        }

        .kursus-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.84);
            background:
                linear-gradient(120deg, #ff8a1f 0%, #f97316 42%, #ffd43b 100%);
            box-shadow:
                0 28px 72px rgba(15, 23, 42, 0.14),
                0 0 72px rgba(255, 166, 0, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.26);
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
            width: 12rem;
            height: 12rem;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.24);
            background: radial-gradient(circle, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0) 72%);
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
            opacity: 0.68;
            box-shadow: 0 0 42px rgba(255, 228, 92, 0.28);
        }

        .kursus-hero-button {
            border: 1px solid rgba(255, 255, 255, 0.74);
            box-shadow:
                0 0 0 6px rgba(255, 255, 255, 0.14),
                0 0 34px rgba(255, 166, 0, 0.28),
                0 16px 36px rgba(15, 23, 42, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .kursus-results-layout {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: minmax(0, 1fr);
        }

        .kursus-sidebar {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(255, 251, 245, 0.92)),
                linear-gradient(135deg, rgba(255, 166, 0, 0.08), rgba(59, 130, 246, 0.04));
            box-shadow:
                0 24px 56px rgba(15, 23, 42, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.88);
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

        .kursus-sidebar-section-title {
            color: #0f172a;
        }

        .kursus-sidebar-search {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .kursus-sidebar-search-input,
        .kursus-select {
            border: 1px solid rgba(148, 163, 184, 0.24);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.96), rgba(255, 255, 255, 0.78)),
                linear-gradient(135deg, rgba(255, 166, 0, 0.06), rgba(59, 130, 246, 0.03));
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.88),
                0 8px 18px rgba(15, 23, 42, 0.04);
            transition: transform 0.28s ease, border-color 0.28s ease, box-shadow 0.28s ease;
        }

        .kursus-sidebar-search-input:hover,
        .kursus-sidebar-search-input:focus,
        .kursus-select:hover,
        .kursus-select:focus {
            transform: translateY(-1px);
            border-color: rgba(249, 115, 22, 0.34);
            box-shadow:
                0 0 0 4px rgba(249, 115, 22, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            outline: none;
        }

        .kursus-filter-button,
        .kursus-reset-link,
        .kursus-cta,
        .category-btn,
        .course-card {
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease, background-color 0.28s ease, color 0.28s ease;
        }

        .kursus-filter-button {
            border: 1px solid rgba(249, 115, 22, 0.3);
            box-shadow:
                0 14px 28px rgba(249, 115, 22, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.36);
        }

        .kursus-filter-button:hover,
        .kursus-reset-link:hover,
        .kursus-cta:hover,
        .category-btn:hover,
        .course-card:hover {
            transform: translateY(-2px);
        }

        .kursus-reset-link {
            box-shadow: 0 10px 24px rgba(249, 115, 22, 0.06);
        }

        .sidebar-scroll {
            max-height: min(32rem, calc(100vh - 18rem));
            overflow-y: auto;
            padding-right: 0.2rem;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            border-radius: 999px;
            background: rgba(249, 115, 22, 0.24);
        }

        .category-btn {
            justify-content: flex-start;
            width: 100%;
            border: 1px solid transparent;
            background: transparent;
            color: #475569;
        }

        .category-btn:hover {
            border-color: rgba(251, 146, 60, 0.16);
            background: rgba(255, 247, 237, 0.84);
            color: #ea580c;
        }

        .category-btn.is-active {
            border-color: rgba(251, 146, 60, 0.22);
            background: linear-gradient(135deg, rgba(255, 247, 237, 0.96), rgba(255, 237, 213, 0.86));
            color: #c2410c;
            box-shadow: 0 14px 28px rgba(249, 115, 22, 0.08);
        }

        .category-indicator {
            width: 1rem;
            height: 1rem;
            min-width: 1rem;
            min-height: 1rem;
            border-radius: 999px;
            border: 1.5px solid #cbd5e1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: border-color 0.28s ease, background-color 0.28s ease;
        }

        .category-btn.is-active .category-indicator {
            border-color: #f97316;
        }

        .category-indicator::after {
            content: "";
            width: 0.45rem;
            height: 0.45rem;
            border-radius: 999px;
            background: transparent;
            transition: background-color 0.28s ease;
        }

        .category-btn.is-active .category-indicator::after {
            background: #f97316;
        }

        .kursus-results-panel {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .kursus-results-summary {
            border: 1px solid rgba(255, 255, 255, 0.82);
            background: rgba(255, 255, 255, 0.86);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
            backdrop-filter: blur(12px);
        }

        .kursus-results-grid {
            display: grid;
            gap: 1.25rem;
            grid-template-columns: minmax(0, 1fr);
        }

        .course-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.88);
            border-radius: 2rem;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.98));
            box-shadow:
                0 20px 46px rgba(15, 23, 42, 0.08),
                0 0 24px rgba(251, 191, 36, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            cursor: pointer;
        }

        .course-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(140deg, rgba(255, 255, 255, 0.24), rgba(255, 255, 255, 0)),
                radial-gradient(circle at bottom left, rgba(251, 146, 60, 0.08), transparent 26%);
            opacity: 0;
            transition: opacity 0.28s ease;
            pointer-events: none;
        }

        .course-card:hover {
            border-color: rgba(251, 146, 60, 0.34);
            box-shadow:
                0 30px 68px rgba(15, 23, 42, 0.12),
                0 0 30px rgba(251, 146, 60, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.92);
        }

        .course-card:hover::before {
            opacity: 1;
        }

        .course-card-media {
            position: relative;
            height: 15rem;
            overflow: hidden;
        }

        .course-card-media::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg, rgba(15, 23, 42, 0.04), rgba(15, 23, 42, 0.74)),
                linear-gradient(130deg, rgba(249, 115, 22, 0.3), rgba(15, 23, 42, 0));
            pointer-events: none;
        }

        .course-card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease, filter 0.6s ease;
        }

        .course-card:hover .course-card-image {
            transform: scale(1.08);
            filter: saturate(1.06);
        }

        .kursus-tag,
        .kursus-pill {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            backdrop-filter: blur(10px);
            box-shadow:
                0 10px 20px rgba(15, 23, 42, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .kursus-tag {
            background: rgba(249, 115, 22, 0.94);
            color: #ffffff;
        }

        .kursus-pill {
            background: rgba(255, 255, 255, 0.92);
            color: #c2410c;
        }

        .course-card-headline {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 1rem;
        }

        .course-card-title {
            color: #0f172a;
            font-size: 1.5rem;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.03em;
            transition: color 0.28s ease;
        }

        .course-card:hover .course-card-title {
            color: #ea580c;
        }

        .course-card-arrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3rem;
            height: 3rem;
            min-width: 3rem;
            border-radius: 999px;
            background: #fff7ed;
            color: #ea580c;
            box-shadow:
                0 10px 24px rgba(15, 23, 42, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.64);
            transition: transform 0.28s ease, background-color 0.28s ease, color 0.28s ease;
        }

        .course-card:hover .course-card-arrow {
            transform: translateX(4px) translateY(-2px);
            background: #f97316;
            color: #ffffff;
        }

        .course-card-meta {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.85rem;
        }

        .course-card-meta-item {
            border: 1px solid rgba(251, 146, 60, 0.12);
            border-radius: 1.15rem;
            background: rgba(255, 247, 237, 0.8);
            padding: 0.9rem 1rem;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.72);
        }

        .course-card-meta-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #94a3b8;
        }

        .course-card-meta-value {
            margin-top: 0.4rem;
            color: #0f172a;
            font-weight: 500;
            line-height: 1.5;
        }

        .kursus-cta {
            box-shadow:
                0 16px 34px rgba(249, 115, 22, 0.18),
                0 0 28px rgba(255, 166, 0, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.18);
        }

        .kursus-empty {
            border: 1px solid rgba(255, 255, 255, 0.86);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.92), rgba(255, 255, 255, 0.78));
            box-shadow:
                0 20px 44px rgba(15, 23, 42, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .kursus-clamp-2 {
            display: -webkit-box;
            overflow: hidden;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
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

        @media (min-width: 1024px) {
            .kursus-results-layout {
                grid-template-columns: 20rem minmax(0, 1fr);
                align-items: start;
            }

            .kursus-sidebar-wrap {
                position: sticky;
                top: 6.5rem;
            }

            .kursus-results-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1440px) {
            .kursus-results-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 767px) {
            .kursus-shell {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .kursus-hero {
                padding: 1.5rem;
            }

            .course-card-media {
                height: 12.5rem;
            }

            .course-card-meta {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .course-card,
            .kursus-sidebar-search-input,
            .kursus-select,
            .kursus-filter-button,
            .kursus-reset-link,
            .kursus-cta,
            .category-btn,
            .course-card-image,
            .course-card-arrow {
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

    <section class="kursus-shell max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10">
        <div class="kursus-hero rounded-[2rem] p-6 sm:p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <p class="text-xs sm:text-sm uppercase tracking-[0.16em] text-white/75 font-semibold">Eksplorasi Kursus</p>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        @if(request('search'))
                            Hasil Carian Kursus
                        @elseif(request('jenis'))
                            Kursus {{ request('jenis') }}
                        @else
                            Senarai Kursus
                        @endif
                    </h1>
                    @if(request('search'))
                        <p class="mt-3 text-lg text-orange-100 max-w-3xl">Menunjukkan padanan untuk "{{ request('search') }}" merentasi semua kursus{{ request('jenis') ? ' dalam kategori ' . request('jenis') : '' }}.</p>
                    @elseif(isset($selectedProgram) && $selectedProgram)
                        <p class="mt-3 text-lg text-orange-100 max-w-3xl">{{ $selectedProgram->info_program }}</p>
                    @else
                        <p class="mt-3 text-lg text-orange-100">Cari dan jelajahi kursus yang sesuai dengan minat anda.</p>
                    @endif

                    <div class="mt-6 flex flex-wrap gap-3 text-sm">
                        <span class="inline-flex items-center rounded-full bg-white/16 px-4 py-2 font-semibold text-white/90 backdrop-blur">
                            <i class="fas fa-layer-group mr-2 text-xs"></i>{{ $kursusList->unique('nama_kursus')->count() }} kursus unik
                        </span>
                    </div>

                </div>
                <div aria-hidden="true" class="kursus-hero-button hidden md:flex w-14 h-14 rounded-full bg-white text-orange-600 items-center justify-center">
                    <i class="fas fa-graduation-cap"></i>
                </div>
            </div>
        </div>

        <div class="kursus-results-layout">
            
            <aside class="kursus-sidebar-wrap">
                <div class="kursus-sidebar rounded-3xl p-6">
                    <h3 class="kursus-sidebar-section-title relative z-10 text-xl font-bold mb-5">
                        <i class="fas fa-filter mr-2 text-orange-500"></i>Filter
                    </h3>
                    
                    <form method="GET" class="relative z-10 space-y-4 mb-6">
                        <div class="kursus-sidebar-search">
                            <label class="block text-sm font-semibold text-gray-700">Cari Kursus</label>
                            <input
                                type="search"
                                name="search"
                                value="{{ request('search') }}"
                                class="kursus-sidebar-search-input w-full rounded-2xl px-4 py-2.5 text-sm text-slate-700"
                                placeholder="Nama kursus, kod atau institusi"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Negeri</label>
                            <select 
                                name="negeri" 
                                onchange="this.form.submit()" 
                                class="kursus-select w-full rounded-2xl px-4 py-2 text-sm shadow-sm focus:outline-none">   
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

                        @if(request('search') || request('negeri') || request('kuota'))
                            <div>
                                <a 
                                    href="{{ route('kursus.index', array_filter(['jenis' => request('jenis'), 'search' => request('search')])) }}"
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

                    <div class="relative z-10 border-t border-gray-200 pt-6">
                        <h3 class="kursus-sidebar-section-title text-lg font-bold mb-4">
                            <i class="fas fa-list-ul mr-2 text-orange-500"></i>Kategori Kursus
                        </h3>
                        
                        <div class="flex flex-col space-y-1 sidebar-scroll">
                            <button 
                                type="button"
                                onclick="filterCourses('')"
                                class="category-btn is-active flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium"
                                id="btn-all"
                            >
                                <span class="category-indicator"></span>
                                Semua Kursus
                            </button>

                            @foreach($kursusList->unique('nama_kursus') as $kursus)
                                <button 
                                    type="button"
                                    onclick="filterCourses('{{ addslashes($kursus->nama_kursus) }}')"
                                    class="category-btn flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium"
                                    id="btn-{{ Illuminate\Support\Str::slug($kursus->nama_kursus, '-') }}"
                                >
                                    <span class="category-indicator"></span>
                                    <span class="truncate">{{ $kursus->nama_kursus }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>

            <main class="kursus-results-panel min-w-0">
                <div class="kursus-results-summary rounded-3xl px-5 py-4 sm:px-6 sm:py-5">
                    <div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-orange-500">Paparan Kursus</p>
                            <p class="mt-2 text-sm text-slate-500">{{ $kursusList->unique('nama_kursus')->count() }} kursus unik dipaparkan berdasarkan carian dan filter semasa.</p>
                        </div>
                    </div>
                </div>

                <div id="courses-container" class="kursus-results-grid">
                    @forelse($kursusList->unique('nama_kursus')->values() as $kursus)
                    @php $galleryImage = optional($kursus->galeris->first())->imej ?? 'images/default-college.jpg'; @endphp
                    <article class="course-card h-full" 
                             data-course-name="{{ $kursus->nama_kursus }}"
                             onclick="window.location.href='{{ route('kursus.showByName', urlencode($kursus->nama_kursus)) }}'">
                        <div class="course-card-media">
                            <img src="{{ asset($galleryImage) }}" alt="{{ $kursus->nama_kursus }}" class="course-card-image" onerror="this.onerror=null;this.src='{{ asset('images/default-college.jpg') }}';">
                            <div class="absolute inset-x-0 top-4 px-4 flex items-start justify-between gap-3 z-10">
                                <span class="kursus-tag px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.22em]">{{ $kursus->institusi->jenis_institusi ?? 'Program' }}</span>
                                <div class="flex flex-wrap items-center justify-end gap-2 max-w-[75%]">
                                    <span class="kursus-pill px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.18em]">{{ $kursus->jenis_kursus }}</span>
                                    <span class="kursus-pill px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.18em]">Kuota {{ $kursus->kuota ?? '-' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 sm:p-7 flex flex-col gap-5 h-full">
                            <div class="course-card-headline">
                                <div>
                                    <p class="text-[0.7rem] font-semibold uppercase tracking-[0.28em] text-orange-500">Kursus</p>
                                    <h2 class="course-card-title mt-2 kursus-clamp-2">{{ $kursus->nama_kursus }}</h2>
                                </div>
                                <span class="course-card-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>

                            <div class="course-card-meta">
                                <div class="course-card-meta-item">
                                    <p class="course-card-meta-label">Institusi</p>
                                    <p class="course-card-meta-value kursus-clamp-2">{{ $kursus->institusi->nama_institusi ?? 'Tidak tersedia' }}</p>
                                </div>
                                <div class="course-card-meta-item">
                                    <p class="course-card-meta-label">Tempoh</p>
                                    <p class="course-card-meta-value">{{ $kursus->tempoh ?? 'Tidak dinyatakan' }}</p>
                                </div>
                            </div>

                            <button class="kursus-cta inline-flex items-center justify-between w-full rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:bg-orange-600 mt-auto">
                                <span>Lihat Pilihan Kursus</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </article>
                    @empty
                    <div class="kursus-empty rounded-3xl p-10 text-center text-gray-500 shadow-sm">
                        <p>Tiada kursus ditemui.</p>
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
            let emptyState = document.getElementById('kursus-empty-state');
            let visibleCount = 0;

            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('is-active');
            });

            if (courseName === '') {
                document.getElementById('btn-all')?.classList.add('is-active');
            } else {
                const btnId = 'btn-' + courseName.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
                const activeBtn = document.getElementById(btnId);
                if (activeBtn) {
                    activeBtn.classList.add('is-active');
                }
            }

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

            if (!emptyState) {
                emptyState = document.createElement('div');
                emptyState.id = 'kursus-empty-state';
                emptyState.className = 'kursus-empty rounded-3xl p-10 text-center text-gray-500 shadow-sm';
                emptyState.textContent = 'Tiada kursus ditemui.';
                emptyState.style.display = 'none';
                container.appendChild(emptyState);
            }

            if (visibleCount === 0) {
                emptyState.style.display = 'block';
            } else {
                emptyState.style.display = 'none';
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

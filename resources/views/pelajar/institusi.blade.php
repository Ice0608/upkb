<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')

    <style>
        .institusi-page {
            overflow-x: hidden;
        }

        .institusi-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.8);
            background: linear-gradient(90deg, #ff7300 0%, #ffd43b 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(255, 166, 0, 0.3),
                0 0 130px rgba(255, 212, 59, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .institusi-hero::before,
        .institusi-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .institusi-hero::before {
            top: -3rem;
            right: 8%;
            width: 11rem;
            height: 11rem;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.24);
            background: radial-gradient(circle, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0) 72%);
            box-shadow:
                0 0 36px rgba(255, 235, 140, 0.34),
                0 0 0 18px rgba(255, 255, 255, 0.08),
                0 0 0 40px rgba(255, 255, 255, 0.04);
        }

        .institusi-hero::after {
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

        .institusi-hero-button {
            border: 1px solid rgba(255, 255, 255, 0.74);
            box-shadow:
                0 0 0 6px rgba(255, 255, 255, 0.14),
                0 0 34px rgba(255, 166, 0, 0.34),
                0 16px 36px rgba(15, 23, 42, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .institusi-hero-button:hover {
            transform: translateY(-3px) scale(1.04);
            box-shadow:
                0 0 0 8px rgba(255, 255, 255, 0.16),
                0 0 42px rgba(255, 187, 51, 0.44),
                0 22px 44px rgba(15, 23, 42, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.92);
        }

        .institusi-toolbar {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(255, 250, 245, 0.92)),
                linear-gradient(120deg, rgba(255, 115, 0, 0.06), rgba(255, 212, 59, 0.08));
            box-shadow:
                0 24px 50px rgba(15, 23, 42, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
        }

        .institusi-toolbar::after {
            content: "";
            position: absolute;
            inset: auto -10% -60% auto;
            width: 14rem;
            height: 14rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 166, 0, 0.18), rgba(255, 166, 0, 0));
            pointer-events: none;
        }

        .institusi-filter-select,
        .institusi-filter-button {
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease, background-color 0.25s ease, color 0.25s ease;
        }

        .institusi-filter-select {
            border: 1px solid rgba(148, 163, 184, 0.28);
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07);
        }

        .institusi-filter-select:hover,
        .institusi-filter-select:focus {
            transform: translateY(-1px);
            border-color: rgba(249, 115, 22, 0.4);
            box-shadow: 0 16px 32px rgba(249, 115, 22, 0.12);
        }

        .institusi-filter-button:hover,
        .institusi-filter-button:focus-visible {
            transform: translateY(-1px);
            box-shadow: 0 14px 28px rgba(249, 115, 22, 0.14);
        }

        .institusi-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.92);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.98));
            box-shadow: 0 22px 48px rgba(15, 23, 42, 0.08);
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }

        .institusi-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(140deg, rgba(255, 255, 255, 0.24), rgba(255, 255, 255, 0));
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .institusi-card:hover,
        .institusi-card:focus-within {
            transform: translateY(-8px);
            border-color: rgba(251, 146, 60, 0.38);
            box-shadow:
                0 30px 64px rgba(15, 23, 42, 0.14),
                0 0 32px rgba(251, 146, 60, 0.12);
        }

        .institusi-card:hover::before,
        .institusi-card:focus-within::before {
            opacity: 1;
        }

        .institusi-card-media {
            position: relative;
            height: 15rem;
            overflow: hidden;
        }

        .institusi-card-media::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg, rgba(15, 23, 42, 0.04), rgba(15, 23, 42, 0.72)),
                linear-gradient(130deg, rgba(249, 115, 22, 0.36), rgba(15, 23, 42, 0));
            pointer-events: none;
        }

        .institusi-card-image {
            transition: transform 0.6s ease, filter 0.6s ease;
        }

        .institusi-card:hover .institusi-card-image,
        .institusi-card:focus-within .institusi-card-image {
            transform: scale(1.08);
            filter: saturate(1.08);
        }

        .institusi-card-badge,
        .institusi-card-chip,
        .institusi-card-arrow,
        .institusi-card-link {
            transition: transform 0.28s ease, background-color 0.28s ease, color 0.28s ease, border-color 0.28s ease, box-shadow 0.28s ease;
        }

        .institusi-card-badge,
        .institusi-card-chip {
            backdrop-filter: blur(10px);
        }

        .institusi-card-chip {
            border: 1px solid rgba(251, 146, 60, 0.12);
            background: rgba(255, 247, 237, 0.82);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.72);
        }

        .institusi-card:hover .institusi-card-chip,
        .institusi-card:focus-within .institusi-card-chip {
            border-color: rgba(249, 115, 22, 0.22);
            background: rgba(255, 237, 213, 0.95);
        }

        .institusi-card-arrow {
            flex: 0 0 3rem;
            min-width: 3rem;
            min-height: 3rem;
            box-shadow:
                0 10px 24px rgba(15, 23, 42, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
        }

        .institusi-card:hover .institusi-card-arrow,
        .institusi-card:focus-within .institusi-card-arrow {
            transform: translateX(4px) translateY(-2px);
            background: #fff7ed;
            color: #ea580c;
        }

        .institusi-card-link {
            color: #f97316;
        }

        .institusi-card:hover .institusi-card-link,
        .institusi-card:focus-within .institusi-card-link {
            transform: translateX(4px);
            color: #c2410c;
        }

        .institusi-clamp-2,
        .institusi-clamp-3 {
            display: -webkit-box;
            overflow: hidden;
            -webkit-box-orient: vertical;
        }

        .institusi-clamp-2 {
            -webkit-line-clamp: 2;
        }

        .institusi-clamp-3 {
            -webkit-line-clamp: 3;
        }

        /* DARK MODE */
        html.dark .institusi-page {
            background:
                radial-gradient(circle at 12% 16%, rgba(251, 146, 60, 0.1), transparent 24%),
                radial-gradient(circle at 84% 18%, rgba(37, 99, 235, 0.08), transparent 28%),
                linear-gradient(135deg, #0f172a 0%, #1e293b 44%, #0f172a 100%);
        }

        html.dark .institusi-toolbar {
            border-color: rgba(255, 255, 255, 0.08);
            background:
                linear-gradient(180deg, rgba(30, 41, 59, 0.94), rgba(15, 23, 42, 0.94)),
                linear-gradient(120deg, rgba(249, 115, 22, 0.08), rgba(59, 130, 246, 0.08));
            box-shadow:
                0 24px 50px rgba(0, 0, 0, 0.28),
                inset 0 1px 0 rgba(255, 255, 255, 0.06);
        }

        html.dark .institusi-filter-select {
            background: #1e293b;
            border-color: rgba(148, 163, 184, 0.2);
            color: #e2e8f0;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.24);
        }

        html.dark .institusi-filter-select:hover,
        html.dark .institusi-filter-select:focus {
            border-color: rgba(249, 115, 22, 0.48);
            box-shadow: 0 16px 32px rgba(249, 115, 22, 0.18);
        }

        html.dark .institusi-card {
            border-color: rgba(51, 65, 85, 0.92);
            background: linear-gradient(180deg, rgba(30, 41, 59, 0.98), rgba(15, 23, 42, 0.98));
            box-shadow: 0 22px 48px rgba(0, 0, 0, 0.3);
        }

        html.dark .institusi-card:hover,
        html.dark .institusi-card:focus-within {
            border-color: rgba(249, 115, 22, 0.32);
            box-shadow:
                0 30px 64px rgba(0, 0, 0, 0.4),
                0 0 28px rgba(249, 115, 22, 0.14);
        }

        html.dark .institusi-card-chip {
            border-color: rgba(249, 115, 22, 0.2);
            background: rgba(30, 41, 59, 0.88);
            color: #cbd5e1;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
        }

        html.dark .institusi-card:hover .institusi-card-chip,
        html.dark .institusi-card:focus-within .institusi-card-chip {
            border-color: rgba(249, 115, 22, 0.3);
            background: rgba(51, 65, 85, 0.9);
        }

        html.dark .institusi-card:hover .institusi-card-arrow,
        html.dark .institusi-card:focus-within .institusi-card-arrow {
            background: #1e293b;
            color: #f97316;
        }

        html.dark .institusi-card-link {
            color: #fb923c;
        }

        html.dark .institusi-card:hover .institusi-card-link,
        html.dark .institusi-card:focus-within .institusi-card-link {
            color: #fdba74;
        }

        html.dark .text-slate-900,
        html.dark .text-slate-800,
        html.dark .text-gray-800 {
            color: #f1f5f9 !important;
        }

        html.dark .text-slate-700,
        html.dark .text-slate-600,
        html.dark .text-gray-500 {
            color: #cbd5e1 !important;
        }

        html.dark .border-slate-200\/80 {
            border-color: rgba(148, 163, 184, 0.2) !important;
        }

        html.dark .bg-white {
            background-color: #1e293b !important;
        }

        html.dark .bg-gray-100 {
            background-color: transparent !important;
        }
    </style>
</head>
<body class="institusi-page bg-gray-100 text-gray-800 transition-colors duration-300">
    
    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navpelajar')

    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10">
        <div class="institusi-hero rounded-3xl p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        @if($jenis)
                            Institusi {{ $jenis }}
                        @else
                            Semua Institusi
                        @endif
                    </h1>
                    <p class="mt-3 text-lg text-orange-100">Lihat semua institusi, lokasi mereka dan ringkasan fasiliti serta kursus yang ditawarkan.</p>
                </div>
                <div aria-hidden="true" class="institusi-hero-button flex items-center justify-center w-14 h-14 rounded-full bg-white text-orange-600">
                    <i class="fas fa-building"></i>
                </div>
            </div>
        </div>

        <div class="institusi-toolbar mb-8 rounded-3xl p-4 sm:p-5">
            <div class="relative z-10 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-orange-500">Paparan Institusi</p>
                    <h2 class="mt-2 text-2xl text-slate-900">{{ $institusis->count() }} institusi dipaparkan</h2>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-end">
                    <form method="GET" class="flex w-full max-w-[520px] flex-col gap-3 sm:flex-row sm:items-center">
                        <label class="block w-full sm:min-w-[280px] sm:flex-1">
                            <span class="sr-only">Pilih negeri</span>
                            <select name="negeri" onchange="this.form.submit()" class="institusi-filter-select w-full rounded-full bg-white px-4 py-3 text-sm text-slate-700 focus:border-orange-400 focus:outline-none">
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
                        </label>
                        @if(request('jenis'))
                            <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                        @endif
                        @if(request('kuota'))
                            <input type="hidden" name="kuota" value="{{ request('kuota') }}">
                        @endif
                    </form>
                    <form method="GET" class="inline-flex items-center">
                        @if(request('jenis'))
                            <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                        @endif
                        @if(request('negeri'))
                            <input type="hidden" name="negeri" value="{{ request('negeri') }}">
                        @endif
                        <button type="submit" name="kuota" value="{{ request('kuota') ? 0 : 1 }}" class="institusi-filter-button inline-flex items-center justify-center rounded-full border px-6 py-3 text-sm font-semibold transition {{ request('kuota') ? 'bg-orange-500 border-orange-500 text-white hover:bg-orange-600' : 'bg-white border-orange-300 text-orange-600 hover:bg-orange-50' }}">
                            {{ request('kuota') ? 'Kuota Aktif' : 'Tapis Kuota' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3 items-stretch">
            @forelse($institusis as $institusi)
            <article class="institusi-card rounded-3xl flex flex-col h-full">
                <a href="{{ route('institusi.show', $institusi->id) }}" class="group flex flex-col h-full text-current no-underline">
                    <div class="institusi-card-media">
                        <img src="{{ asset($institusi->gambar_institusi) }}" alt="{{ $institusi->nama_institusi }}" class="institusi-card-image w-full h-full object-cover">
                        <div class="absolute left-5 top-5 z-10 flex flex-wrap items-center gap-2 pr-5">
                            <span class="institusi-card-badge inline-flex items-center rounded-full border border-white/30 bg-white/15 px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.25em] text-white">{{ $institusi->jenis_institusi }}</span>
                            <span class="institusi-card-badge inline-flex items-center rounded-full border border-white/20 bg-slate-950/25 px-3 py-1 text-xs font-medium text-white/90">
                                <i class="fas fa-book-open mr-2 text-[0.7rem]"></i>{{ $institusi->kursuses_count }} kursus
                            </span>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 z-10 flex items-end justify-between gap-4 p-5 text-white">
                            <div>
                                <p class="text-[0.68rem] font-semibold uppercase tracking-[0.34em] text-orange-100/90">Institusi</p>
                                <h2 class="mt-2 text-2xl font-extrabold text-white">{{ $institusi->nama_institusi }}</h2>
                            </div>
                            <span class="institusi-card-arrow inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white/15 text-lg text-white">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </div>
                    </div>
                    <div class="p-6 sm:p-7 flex flex-col flex-1">
                        <div class="institusi-card-chip flex items-start gap-3 rounded-2xl px-4 py-3 text-sm text-slate-600">
                            <i class="fas fa-map-marker-alt mt-0.5 text-orange-500"></i>
                            <span class="institusi-clamp-2">{{ $institusi->alamat }}</span>
                        </div>
                        <p class="institusi-clamp-3 mt-5 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit($institusi->mengenai_institusi, 150) }}</p>
                        <div class="mt-auto flex items-center justify-between border-t border-slate-200/80 pt-5">
                            <span class="text-sm font-semibold text-slate-800">Lihat kursus & fasiliti</span>
                            <span class="institusi-card-link inline-flex items-center gap-2 text-sm font-semibold">
                                Teroka
                                <i class="fas fa-arrow-right text-xs"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </article>
            @empty
            <div class="col-span-3 bg-white rounded-2xl p-8 text-center text-gray-500">
                Tiada institusi ditemui.
            </div>
            @endforelse
        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer-pelajar')

</body>
</html>

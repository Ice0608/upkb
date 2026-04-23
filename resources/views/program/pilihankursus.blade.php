<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - {{ $namaKursus }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    
    <style>
        .pilihan-page,
        .pilihan-shell {
            --pilihan-accent-100: #fff7ed;
            --pilihan-accent-500: #f97316;
            --pilihan-accent-600: #ea580c;
            --pilihan-accent-700: #c2410c;
            --pilihan-accent-rgb: 249, 115, 22;
            --pilihan-accent-rgb-soft: 251, 146, 60;
            --pilihan-gradient-start: #fb923c;
            --pilihan-gradient-end: #f97316;
            --pilihan-surface-soft: rgba(255, 247, 237, 0.82);
            --pilihan-surface-strong: rgba(255, 237, 213, 0.92);
            --pilihan-chip-bg: rgba(249, 115, 22, 0.9);
            --pilihan-soft-label: rgba(255, 237, 213, 0.92);
            --pilihan-live-bg: rgba(255, 247, 237, 0.92);
            --pilihan-live-text: #ea580c;
        }

        .pilihan-page {
            min-height: 100vh;
            overflow-x: hidden;
            background:
                radial-gradient(circle at 12% 12%, rgba(var(--pilihan-accent-rgb-soft), 0.16), transparent 24%),
                radial-gradient(circle at 88% 18%, rgba(59, 130, 246, 0.1), transparent 24%),
                linear-gradient(180deg, #f8fafc 0%, #fffaf5 48%, #f8fafc 100%);
        }

        .pilihan-shell {
            position: relative;
        }

        .pilihan-page--tvet,
        .pilihan-shell--tvet {
            --pilihan-accent-100: #fffbea;
            --pilihan-accent-500: #d4af37;
            --pilihan-accent-600: #b88912;
            --pilihan-accent-700: #8a6a08;
            --pilihan-accent-rgb: 212, 175, 55;
            --pilihan-accent-rgb-soft: 241, 207, 99;
            --pilihan-gradient-start: #f1cf63;
            --pilihan-gradient-end: #d4af37;
            --pilihan-surface-soft: rgba(255, 251, 235, 0.84);
            --pilihan-surface-strong: rgba(254, 243, 199, 0.94);
            --pilihan-chip-bg: rgba(212, 175, 55, 0.92);
            --pilihan-soft-label: rgba(254, 243, 199, 0.95);
            --pilihan-live-bg: rgba(255, 251, 235, 0.94);
            --pilihan-live-text: #b88912;
        }

        .pilihan-page--diploma,
        .pilihan-shell--diploma {
            --pilihan-accent-100: #f5f3ff;
            --pilihan-accent-500: #8b5cf6;
            --pilihan-accent-600: #7c3aed;
            --pilihan-accent-700: #6d28d9;
            --pilihan-accent-rgb: 124, 58, 237;
            --pilihan-accent-rgb-soft: 192, 132, 252;
            --pilihan-gradient-start: #a855f7;
            --pilihan-gradient-end: #7c3aed;
            --pilihan-surface-soft: rgba(245, 243, 255, 0.84);
            --pilihan-surface-strong: rgba(233, 213, 255, 0.94);
            --pilihan-chip-bg: rgba(124, 58, 237, 0.9);
            --pilihan-soft-label: rgba(243, 232, 255, 0.95);
            --pilihan-live-bg: rgba(245, 243, 255, 0.94);
            --pilihan-live-text: #7c3aed;
        }

        .pilihan-page--sains-kesihatan,
        .pilihan-shell--sains-kesihatan {
            --pilihan-accent-100: #eff6ff;
            --pilihan-accent-500: #3b82f6;
            --pilihan-accent-600: #2563eb;
            --pilihan-accent-700: #1d4ed8;
            --pilihan-accent-rgb: 37, 99, 235;
            --pilihan-accent-rgb-soft: 96, 165, 250;
            --pilihan-gradient-start: #60a5fa;
            --pilihan-gradient-end: #2563eb;
            --pilihan-surface-soft: rgba(239, 246, 255, 0.84);
            --pilihan-surface-strong: rgba(219, 234, 254, 0.94);
            --pilihan-chip-bg: rgba(37, 99, 235, 0.9);
            --pilihan-soft-label: rgba(219, 234, 254, 0.95);
            --pilihan-live-bg: rgba(239, 246, 255, 0.94);
            --pilihan-live-text: #2563eb;
        }

        .pilihan-page--tvet {
            background:
                url('/images/TVET-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(241, 207, 99, 0.18), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .pilihan-page--diploma {
            background:
                url('/images/DIP-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(192, 132, 252, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(99, 102, 241, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .pilihan-page--sains-kesihatan {
            background:
                url('/images/SK-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(96, 165, 250, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(33, 150, 243, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .pilihan-shell::before,
        .pilihan-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: 0;
        }

        .pilihan-shell::before {
            top: 2rem;
            left: -3rem;
            width: 18rem;
            height: 18rem;
            border-radius: 3rem;
            background:
                radial-gradient(circle at 30% 30%, rgba(var(--pilihan-accent-rgb-soft), 0.18), rgba(var(--pilihan-accent-rgb-soft), 0) 58%),
                linear-gradient(145deg, rgba(255, 255, 255, 0.56), rgba(255, 255, 255, 0));
            filter: blur(8px);
            opacity: 0.9;
        }

        .pilihan-shell::after {
            right: -2rem;
            top: 16rem;
            width: 20rem;
            height: 20rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.72), rgba(255, 255, 255, 0));
            filter: blur(10px);
            opacity: 0.92;
        }

        .pilihan-shell > * {
            position: relative;
            z-index: 1;
        }

        .pilihan-back-btn,
        .pilihan-filter-card,
        .pilihan-select,
        .pilihan-mod-btn,
        .pilihan-reset-btn,
        .pilihan-results,
        .course-result-card,
        .course-result-arrow,
        .course-result-meta,
        .course-result-cta {
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease, background-color 0.28s ease, color 0.28s ease, opacity 0.28s ease;
        }

        .pilihan-back-btn {
            border: 1px solid rgba(226, 232, 240, 0.92);
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.06);
        }

        .pilihan-back-btn:hover {
            transform: translateY(-1px);
            color: var(--pilihan-accent-500);
            border-color: rgba(var(--pilihan-accent-rgb), 0.32);
            box-shadow: 0 18px 34px rgba(var(--pilihan-accent-rgb), 0.1);
        }

        .pilihan-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(255, 249, 243, 0.94)),
                linear-gradient(135deg, rgba(var(--pilihan-accent-rgb), 0.05), rgba(59, 130, 246, 0.04));
            box-shadow:
                0 28px 60px rgba(15, 23, 42, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(18px);
        }

        .pilihan-hero::before {
            content: "";
            position: absolute;
            inset: auto -2rem -4rem auto;
            width: 12rem;
            height: 12rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(var(--pilihan-accent-rgb-soft), 0.16), rgba(var(--pilihan-accent-rgb-soft), 0));
            pointer-events: none;
        }

        .pilihan-hero-media {
            position: relative;
            overflow: hidden;
            min-height: 26rem;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background: #ffffff;
            box-shadow: 0 28px 60px rgba(15, 23, 42, 0.1);
        }

        .pilihan-hero-media::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg, rgba(15, 23, 42, 0.06), rgba(15, 23, 42, 0.7)),
                linear-gradient(135deg, rgba(var(--pilihan-accent-rgb), 0.26), rgba(15, 23, 42, 0));
            pointer-events: none;
        }

        .pilihan-hero-image {
            transition: transform 0.65s ease, filter 0.65s ease;
        }

        .pilihan-hero-media:hover .pilihan-hero-image {
            transform: scale(1.05);
            filter: saturate(1.06);
        }

        .pilihan-kicker,
        .pilihan-status-badge,
        .pilihan-image-badge,
        .course-result-badge,
        .course-result-code {
            backdrop-filter: blur(10px);
        }

        .pilihan-kicker,
        .pilihan-status-badge {
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.72);
        }

        .pilihan-filter-card {
            border: 1px solid rgba(226, 232, 240, 0.84);
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 22px 48px rgba(15, 23, 42, 0.06);
        }

        .pilihan-select {
            border: 1px solid rgba(226, 232, 240, 0.92);
            background: rgba(248, 250, 252, 0.92);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.82);
        }

        .pilihan-select:hover,
        .pilihan-select:focus {
            transform: translateY(-1px);
            border-color: rgba(var(--pilihan-accent-rgb), 0.34);
            box-shadow: 0 14px 28px rgba(var(--pilihan-accent-rgb), 0.1);
        }

        .pilihan-mod-btn {
            border: 1px solid rgba(226, 232, 240, 0.92);
            background: rgba(255, 255, 255, 0.86);
        }

        .pilihan-mod-btn:hover,
        .pilihan-mod-btn:focus-visible {
            transform: translateY(-1px);
            border-color: rgba(var(--pilihan-accent-rgb), 0.34);
            color: var(--pilihan-accent-600);
            box-shadow: 0 12px 24px rgba(var(--pilihan-accent-rgb), 0.1);
        }

        .pilihan-mod-btn.is-active {
            border-color: var(--pilihan-accent-500);
            background: linear-gradient(135deg, var(--pilihan-gradient-start), var(--pilihan-gradient-end));
            color: #ffffff;
            box-shadow: 0 16px 30px rgba(var(--pilihan-accent-rgb), 0.22);
        }

        .pilihan-reset-btn:hover {
            color: var(--pilihan-accent-600);
            transform: translateY(-1px);
        }

        .pilihan-results-intro {
            border: 1px solid rgba(226, 232, 240, 0.82);
            background: rgba(255, 255, 255, 0.86);
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.05);
            backdrop-filter: blur(14px);
        }

        .pilihan-live-badge {
            border: 1px solid rgba(var(--pilihan-accent-rgb), 0.2);
            background: var(--pilihan-live-bg);
            color: var(--pilihan-live-text);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.78);
        }

        .pilihan-results[data-loading="true"] {
            opacity: 0.55;
            transform: translateY(6px);
            pointer-events: none;
        }

        .course-result-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.92);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.98));
            box-shadow: 0 22px 50px rgba(15, 23, 42, 0.08);
        }

        .course-result-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(140deg, rgba(255, 255, 255, 0.24), rgba(255, 255, 255, 0));
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .course-result-card:hover,
        .course-result-card:focus-within {
            transform: translateY(-8px);
            border-color: rgba(var(--pilihan-accent-rgb-soft), 0.32);
            box-shadow:
                0 30px 60px rgba(15, 23, 42, 0.12),
                0 0 24px rgba(var(--pilihan-accent-rgb-soft), 0.1);
        }

        .course-result-card:hover::before,
        .course-result-card:focus-within::before {
            opacity: 1;
        }

        .course-result-media {
            position: relative;
            height: 13rem;
            overflow: hidden;
        }

        .course-result-media::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg, rgba(15, 23, 42, 0.08), rgba(15, 23, 42, 0.72)),
                linear-gradient(135deg, rgba(var(--pilihan-accent-rgb), 0.26), rgba(15, 23, 42, 0));
            pointer-events: none;
        }

        .course-result-image {
            transition: transform 0.65s ease, filter 0.65s ease;
        }

        .course-result-card:hover .course-result-image,
        .course-result-card:focus-within .course-result-image {
            transform: scale(1.08);
            filter: saturate(1.08);
        }

        .course-result-badge {
            border: 1px solid rgba(255, 255, 255, 0.28);
            background: var(--pilihan-chip-bg);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.12);
        }

        .course-result-code {
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(15, 23, 42, 0.28);
            color: rgba(255, 255, 255, 0.92);
        }

        .course-result-arrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 3rem;
            width: 3rem;
            height: 3rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            color: #ffffff;
            box-shadow:
                0 10px 24px rgba(15, 23, 42, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
        }

        .course-result-card:hover .course-result-arrow,
        .course-result-card:focus-within .course-result-arrow {
            transform: translateX(4px) translateY(-2px);
            background: var(--pilihan-accent-100);
            color: var(--pilihan-accent-600);
        }

        .course-result-meta-grid {
            display: grid;
            gap: 0.85rem;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .course-result-meta {
            border: 1px solid rgba(var(--pilihan-accent-rgb-soft), 0.12);
            background: var(--pilihan-surface-soft);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.72);
        }

        .course-result-card:hover .course-result-meta,
        .course-result-card:focus-within .course-result-meta {
            border-color: rgba(var(--pilihan-accent-rgb), 0.2);
            background: var(--pilihan-surface-strong);
        }

        .course-result-cta {
            color: var(--pilihan-accent-500);
        }

        .course-result-card:hover .course-result-cta,
        .course-result-card:focus-within .course-result-cta {
            color: var(--pilihan-accent-700);
            transform: translateX(4px);
        }

        .pilihan-theme-accent {
            color: var(--pilihan-accent-500);
        }

        .pilihan-theme-accent-strong {
            color: var(--pilihan-accent-600);
        }

        .pilihan-theme-soft-label {
            color: var(--pilihan-soft-label);
        }

        .pilihan-hero-glow {
            background: linear-gradient(to right, var(--pilihan-gradient-start), var(--pilihan-gradient-end));
        }

        .pilihan-kicker {
            color: var(--pilihan-accent-600);
            background: var(--pilihan-accent-100);
        }

        .pilihan-description {
            border-left: 4px solid var(--pilihan-accent-500);
            padding-left: 1rem;
        }

        .pilihan-results-chip {
            background: var(--pilihan-accent-100);
            color: var(--pilihan-accent-600);
        }

        .pilihan-results-dot {
            background: var(--pilihan-accent-500);
        }

        .course-result-meta-icon {
            color: var(--pilihan-accent-500);
        }

        .course-result-empty {
            border: 1px solid rgba(226, 232, 240, 0.92);
            background: rgba(255, 255, 255, 0.88);
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.05);
        }

        .pilihan-clamp-2 {
            display: -webkit-box;
            overflow: hidden;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        @media (max-width: 640px) {
            .pilihan-hero-media {
                min-height: 20rem;
            }

            .course-result-meta-grid {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        html.dark .pilihan-page--tvet {
            background:
                url('/images/TVET-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .pilihan-page--diploma {
            background:
                url('/images/DIP-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .pilihan-page--sains-kesihatan {
            background:
                url('/images/SK-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
@php
    $pilihanCourseName = strtolower(trim((string) $namaKursus));
    $pilihanKnownTypes = $semuaKursus
        ->map(fn ($kursus) => strtolower((string) optional($kursus->institusi)->jenis_institusi))
        ->filter()
        ->unique()
        ->values();

    $pilihanProgramType = $pilihanKnownTypes->first(function ($type) {
        return in_array($type, ['tvet', 'diploma', 'sains kesihatan'], true);
    }) ?? '';

    $pilihanTvetCourseFallbacks = [
        'pengurusan & pentadbiran pejabat',
        'operasi sistem komputer',
    ];

    if ($pilihanProgramType === '' && (
        in_array($pilihanCourseName, $pilihanTvetCourseFallbacks, true)
        || str_contains($pilihanCourseName, 'kulinari')
    )) {
        $pilihanProgramType = 'tvet';
    }
@endphp
<body class="pilihan-page no-bg {{ $pilihanProgramType === 'tvet' ? 'pilihan-page--tvet' : '' }} {{ $pilihanProgramType === 'diploma' ? 'pilihan-page--diploma' : '' }} {{ $pilihanProgramType === 'sains kesihatan' ? 'pilihan-page--sains-kesihatan' : '' }} text-slate-900 min-h-screen flex flex-col">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <main class="flex-grow">
        <section class="pilihan-shell {{ $pilihanProgramType === 'tvet' ? 'pilihan-shell--tvet' : '' }} {{ $pilihanProgramType === 'diploma' ? 'pilihan-shell--diploma' : '' }} {{ $pilihanProgramType === 'sains kesihatan' ? 'pilihan-shell--sains-kesihatan' : '' }} max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12" id="pilihan-kursus-page" data-filter-url="{{ route('kursus.filterByName', ['nama' => $namaKursus]) }}">

            <div class="flex flex-wrap items-center gap-3 mb-4">
                <button type="button" onclick="window.history.back()"
                    class="pilihan-back-btn inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold text-slate-700">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </button>
            </div>
            
            <div class="grid gap-8 xl:grid-cols-[1.05fr_0.95fr] items-start mb-16 sm:mb-20">
                <div class="pilihan-hero-media rounded-[2rem] group">
                    <div class="absolute left-5 top-5 z-10">
                        <span class="pilihan-image-badge inline-flex rounded-full border border-white/30 bg-white/14 px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.26em] text-white">Kursus Pilihan</span>
                    </div>
                    <div class="absolute inset-x-0 bottom-0 z-10 p-6 sm:p-8 text-white">
                        <p class="pilihan-theme-soft-label text-xs font-semibold uppercase tracking-[0.32em]">Laluan Kursus</p>
                        <h1 class="mt-3 text-3xl sm:text-4xl font-extrabold leading-tight tracking-[-0.04em]">{{ $namaKursus }}</h1>
                    </div>
                    <div class="pilihan-hero-glow absolute -inset-1 rounded-[2rem] blur opacity-20 group-hover:opacity-40 transition duration-700"></div>
                    <div class="relative h-full rounded-[2rem] overflow-hidden">
                        <img src="{{ asset($heroImage) }}" 
                             alt="{{ $namaKursus }}"
                             class="pilihan-hero-image w-full h-full min-h-[20rem] sm:min-h-[26rem] object-cover">
                    </div>
                </div>

                <div class="pilihan-hero rounded-[2rem] p-6 sm:p-8 space-y-8">
                    <div>
                        <span class="pilihan-kicker inline-block px-4 py-1.5 mb-4 text-xs font-bold tracking-widest uppercase rounded-full">
                            Kursus Pilihan
                        </span>
                        <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight tracking-[-0.04em]">
                            Pilih institusi yang sesuai dengan laluan pengajian anda.
                        </h2>
                        <p class="pilihan-description mt-6 text-base sm:text-lg text-slate-600 leading-relaxed">
                            {{ $selectedDescription }}
                        </p>
                        <div class="mt-6 flex flex-wrap gap-3">
                            <span class="pilihan-status-badge inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-semibold text-slate-700">
                                <i class="fa-solid fa-filter pilihan-theme-accent"></i>
                                Penapisan ringkas
                            </span>
                            <span class="pilihan-status-badge inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-semibold text-slate-700">
                                <i class="fa-solid fa-school pilihan-theme-accent"></i>
                                Fokus pada institusi bertauliah
                            </span>
                        </div>
                    </div>

                    <div class="pilihan-filter-card rounded-3xl p-6 sm:p-8">
                        <div class="flex items-center gap-2 mb-6">
                            <i class="fa-solid fa-sliders pilihan-theme-accent"></i>
                            <h3 class="font-bold text-xl text-slate-800">Carian Pantas</h3>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Program</label>
                                <select id="jenis-kursus-filter" name="jenis_kursus"
                                    class="pilihan-select w-full rounded-2xl px-4 py-3">
                                    <option value="">Semua Jenis</option>
                                    @foreach($jenisKursusOptions as $jenis)
                                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Tempoh Pengajian</label>
                                <select id="tempoh-filter" name="tempoh"
                                    class="pilihan-select w-full rounded-2xl px-4 py-3">
                                    <option value="">Semua Tempoh</option>
                                    @foreach($tempohOptions as $tempoh)
                                        <option value="{{ $tempoh }}">{{ $tempoh }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Mod Pengajian</label>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach($modPengajianOptions as $mod)
                                        <button type="button"
                                            class="mod-btn pilihan-mod-btn px-5 py-2.5 rounded-full text-sm font-medium"
                                            data-value="{{ $mod }}">
                                            {{ $mod }}
                                        </button>
                                    @endforeach
                                </div>
                                <input type="hidden" id="mod-pengajian-filter" name="mod_pengajian">
                            </div>

                            <button id="reset-filter-btn"
                                class="pilihan-reset-btn w-full mt-4 flex items-center justify-center gap-2 text-slate-500 font-medium py-3 transition-colors">
                                <i class="fa-solid fa-rotate-left text-xs"></i>
                                Reset Semua Pilihan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-10 border-t border-slate-200/80 pt-10 sm:pt-12">
                <div class="pilihan-results-intro rounded-3xl p-5 sm:p-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div class="max-w-2xl">
                        <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Institusi Penawaran</h2>
                        <p class="mt-2 text-slate-500">Pilih institusi berdasarkan jenis program, tempoh dan mod pengajian tanpa memenuhkan paparan dengan maklumat yang tidak perlu.</p>
                    </div>
                    <div class="pilihan-live-badge inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-medium">
                        <span class="pilihan-results-dot inline-flex h-2.5 w-2.5 rounded-full"></span>
                        Penapisan langsung
                    </div>
                </div>
            </div>

            <div id="institusiResults" class="pilihan-results min-h-[400px]" data-loading="false">
                @include('program._pilihankursus_institusi')
            </div>
        </section>
    </main>

    @include('components.social-float')

    {{-- 🔹 FOOTER (FULL WIDTH) --}}
    <footer class="w-full mt-auto">
        @include('layouts.footer')
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const page = document.getElementById('pilihan-kursus-page');
            if (!page) return;

            const filterUrl = page.dataset.filterUrl;
            const resetBtn = document.getElementById('reset-filter-btn');
            const modInput = document.getElementById('mod-pengajian-filter');
            const selects = [
                document.getElementById('jenis-kursus-filter'),
                document.getElementById('tempoh-filter'),
                modInput
            ].filter(Boolean);
            
            const resultsContainer = document.getElementById('institusiResults');

            const updateResults = () => {
                resultsContainer.dataset.loading = 'true';
                
                const params = new URLSearchParams();
                selects.forEach(select => {
                    if (select.value) {
                        params.set(select.getAttribute('name'), select.value);
                    }
                });

                fetch(`${filterUrl}?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = data.html;
                    resultsContainer.dataset.loading = 'false';
                })
                .catch(error => {
                    console.error('Ajax filter error:', error);
                    resultsContainer.dataset.loading = 'false';
                });
            };

            // Event Listeners for Dropdowns
            page.querySelectorAll('select').forEach(el => {
                el.addEventListener('change', updateResults);
            });

            // Event Listeners for Mod Buttons
            document.querySelectorAll('.mod-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    document.querySelectorAll('.mod-btn').forEach(b => {
                        b.classList.remove('is-active');
                    });

                    if (modInput.value === this.dataset.value) {
                        modInput.value = '';
                    } else {
                        this.classList.add('is-active');
                        modInput.value = this.dataset.value;
                    }

                    updateResults();
                });
            });

            // Reset Logic
            if (resetBtn) {
                resetBtn.addEventListener('click', function() {
                    page.querySelectorAll('select').forEach(s => s.value = '');
                    modInput.value = '';
                    document.querySelectorAll('.mod-btn').forEach(b => {
                        b.classList.remove('is-active');
                    });
                    updateResults();
                });
            }
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Info Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    <style>
        .institusi-info-page--tvet {
            --institusi-info-50: #fff2ec;
            --institusi-info-100: #ffe0cc;
            --institusi-info-500: #FF5100;
            --institusi-info-600: #CC4100;
            --institusi-info-700: #993100;
            background:
                url('/images/TVET-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(255, 81, 0, 0.18), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .institusi-info-page--diploma {
            --institusi-info-50: #f7efff;
            --institusi-info-100: #ede0ff;
            --institusi-info-500: #8d2be2;
            --institusi-info-600: #7a1fd1;
            --institusi-info-700: #6216aa;
            background:
                url('/images/DIP-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(192, 132, 252, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(99, 102, 241, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .institusi-info-page--sains-kesihatan {
            --institusi-info-50: #edf7ff;
            --institusi-info-100: #dbeafe;
            --institusi-info-500: #2196f3;
            --institusi-info-600: #1d4ed8;
            --institusi-info-700: #1e40af;
            background:
                url('/images/SK-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(96, 165, 250, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(33, 150, 243, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .institusi-info-badge-tvet {
            background: var(--institusi-info-100);
            color: var(--institusi-info-600);
        }

        .institusi-info-highlight-tvet {
            background: rgba(255, 251, 235, 0.92);
            border-left: 4px solid var(--institusi-info-500);
        }

        .institusi-info-link-tvet {
            color: var(--institusi-info-600);
        }

        .institusi-info-link-tvet:hover {
            color: var(--institusi-info-700);
        }

        .institusi-info-count-tvet,
        .institusi-info-code-tvet {
            background: var(--institusi-info-100);
            color: var(--institusi-info-700);
        }

        .institusi-info-kuota-tvet,
        .institusi-info-accent-tvet {
            color: var(--institusi-info-500);
        }

        /* dark mode */

        html.dark .institusi-info-page--tvet {
            background:
                url('/images/TVET-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .institusi-info-page--diploma {
            background:
                url('/images/DIP-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .institusi-info-page--sains-kesihatan {
            background:
                url('/images/SK-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* ── Dark mode – non-themed body ── */
        html.dark body.bg-gray-100 { background-color: #0f172a !important; }

        /* ── Dark mode – cards ── */
        html.dark .ii-card {
            background: #1e293b;
            border-color: rgba(255,255,255,0.07);
            box-shadow: 0 4px 28px rgba(0,0,0,0.32);
        }
        html.dark .ii-card__icon-wrap { background: rgba(255,255,255,0.08); }
        html.dark .ii-section-title { color: #f1f5f9; }
        html.dark .ii-card .text-gray-700 { color: #94a3b8; }

        /* ── Dark mode – search ── */
        html.dark .ii-search-input {
            background: #0f172a; border-color: rgba(255,255,255,0.1); color: #f1f5f9;
        }
        html.dark .ii-search-input::placeholder { color: #475569; }
        html.dark .ii-search-input:focus { background: #1e293b; }
        html.dark .ii-search-icon { color: #475569; }

        /* ── Dark mode – kursus cards ── */
        html.dark .ii-kc {
            background: #1e293b;
            border-color: rgba(255,255,255,0.07);
        }
        html.dark .ii-kc:hover {
            background: #243048;
            border-color: var(--institusi-info-500, #f97316);
            box-shadow: 0 8px 32px rgba(0,0,0,0.38);
        }
        html.dark .ii-kc__name { color: #f1f5f9; }
        html.dark .ii-kc__chip {
            background: rgba(255,255,255,0.06);
            border-color: rgba(255,255,255,0.09);
            color: #94a3b8;
        }
        html.dark .ii-kc__chip--accent {
            background: rgba(255,255,255,0.08);
            color: var(--institusi-info-500, #d4af37);
        }
        html.dark .ii-kc__divider { background: rgba(255,255,255,0.07); }
        html.dark .ii-kc__toggle {
            border-color: rgba(255,255,255,0.12); color: #64748b;
        }
        html.dark .ii-kc__toggle:hover {
            background: rgba(255,255,255,0.06);
            border-color: var(--institusi-info-500, #d4af37);
            color: var(--institusi-info-500, #d4af37);
        }
        html.dark .ii-kc__body-inner { border-top-color: rgba(255,255,255,0.07); }
        html.dark .ii-kc__penerangan { color: #94a3b8; }
        html.dark .ii-kc__tarikh { color: #475569; }

        /* ── Dark mode – empty state ── */
        html.dark .ii-empty {
            background: rgba(255,255,255,0.04);
            border: 1px dashed rgba(255,255,255,0.1);
        }
        html.dark .ii-no-results { color: #475569; }

        /* ── Dark mode – badge ── */
        html.dark .ii-section-icon {
            background: rgba(255,255,255,0.08);
            color: var(--institusi-info-500, #d4af37);
        }

        /* ── Hero ── */
        .ii-hero { position: relative; height: 420px; overflow: hidden; }
        .ii-hero__img {
            position: absolute; inset: 0; width: 100%; height: 140%;
            object-fit: cover; object-position: center top;
            will-change: transform;
        }
        .ii-hero__overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.12) 0%, rgba(0,0,0,0.52) 55%, rgba(0,0,0,0.82) 100%);
        }
        .ii-hero__content {
            position: absolute; bottom: 0; left: 0; right: 0;
            padding: 2.5rem 2rem 2rem;
            max-width: 72rem; margin: 0 auto;
        }
        .ii-hero__badge {
            display: inline-flex; align-items: center;
            padding: 0.22rem 0.9rem; border-radius: 9999px;
            font-size: 0.68rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em;
            margin-bottom: 0.65rem;
        }
        .ii-hero__title {
            font-size: clamp(1.75rem, 4vw, 2.9rem);
            font-weight: 900; color: #fff; line-height: 1.15;
            margin-bottom: 0.45rem;
            text-shadow: 0 2px 14px rgba(0,0,0,0.55);
        }
        .ii-hero__addr {
            color: rgba(255,255,255,0.78); font-size: 0.9rem; margin-bottom: 1.2rem;
        }
        .ii-hero__stats { display: flex; align-items: center; gap: 1.5rem; }
        .ii-hero__stat { display: flex; flex-direction: column; }
        .ii-hero__stat-num { font-size: 1.55rem; font-weight: 800; color: #fff; line-height: 1; }
        .ii-hero__stat-label { font-size: 0.68rem; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.07em; margin-top: 1px; }
        .ii-hero__stat-div { width: 1px; height: 2.4rem; background: rgba(255,255,255,0.22); }
        .ii-back-btn {
            position: absolute; top: 1.25rem; left: 1.5rem;
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: rgba(0,0,0,0.32); backdrop-filter: blur(10px);
            color: #fff; font-size: 0.8rem; font-weight: 600;
            padding: 0.4rem 1.1rem; border-radius: 9999px;
            transition: background 0.2s; text-decoration: none;
            border: 1px solid rgba(255,255,255,0.18);
        }
        .ii-back-btn:hover { background: rgba(0,0,0,0.55); }

        /* ── Cards ── */
        .ii-card {
            background: #fff; border-radius: 1.75rem;
            padding: 2rem 2.25rem;
            box-shadow: 0 4px 28px rgba(0,0,0,0.06);
            border: 1px solid #f1f5f9;
            display: flex; gap: 1.5rem; align-items: flex-start;
        }
        .ii-card__icon-wrap {
            flex-shrink: 0; width: 3.5rem; height: 3.5rem;
            display: flex; align-items: center; justify-content: center;
            background: var(--institusi-info-100, #fff7e6);
            border-radius: 1rem; font-size: 1.4rem;
        }
        .ii-section-title { font-size: 1.3rem; font-weight: 800; color: #1e293b; }
        .ii-badge {
            font-size: 0.72rem; padding: 0.22rem 0.75rem;
            border-radius: 9999px; font-weight: 700; vertical-align: middle;
        }
        @media (max-width: 640px) {
            .ii-card--about {
                flex-direction: column;
                gap: 1rem;
            }
            .ii-card--about .ii-card__content {
                width: 100%;
            }
        }

        /* ── Search ── */
        .ii-search-input {
            border: 1.5px solid #e2e8f0; border-radius: 9999px;
            padding: 0.5rem 1.2rem; font-size: 0.875rem;
            outline: none; width: 220px; background: #f8fafc;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .ii-search-input:focus {
            border-color: var(--institusi-info-500, #f97316);
            box-shadow: 0 0 0 3px rgba(212,175,55,0.14);
            background: #fff;
        }

        /* ── Table ── */
        .ii-thead-row { background: #f8fafc; }
        .ii-th {
            padding: 0.9rem 1rem; font-size: 0.72rem; font-weight: 700;
            color: #64748b; text-transform: uppercase; letter-spacing: 0.055em;
            white-space: nowrap;
        }
        .ii-tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.15s, transform 0.18s;
        }
        .ii-tr:last-child { border-bottom: none; }
        .ii-tr:hover { background: #f8fafc; transform: translateX(4px); }
        .ii-td { padding: 0.9rem 1rem; font-size: 0.875rem; vertical-align: middle; }
        .ii-code { padding: 0.22rem 0.55rem; border-radius: 6px; font-size: 0.7rem; font-weight: 700; }
        .ii-detail-btn {
            display: inline-flex; align-items: center;
            padding: 0.35rem 1rem; border-radius: 9999px;
            font-size: 0.78rem; font-weight: 700;
            transition: opacity 0.15s, transform 0.15s;
            text-decoration: none; white-space: nowrap;
        }
        .ii-detail-btn:hover { opacity: 0.82; transform: translateX(3px); }

        /* ── Gallery ── */
        .ii-gallery-item {
            position: relative; border-radius: 1.25rem; overflow: hidden;
            aspect-ratio: 4/3; cursor: pointer;
            border: none; padding: 0; background: #e5e7eb;
            display: block; width: 100%;
            box-shadow: 0 2px 14px rgba(0,0,0,0.08);
            transition: box-shadow 0.28s, transform 0.28s;
        }
        .ii-gallery-item:hover { box-shadow: 0 10px 36px rgba(0,0,0,0.18); transform: translateY(-4px); }
        .ii-gallery-img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);
            display: block;
        }
        .ii-gallery-item:hover .ii-gallery-img { transform: scale(1.09); }
        .ii-gallery-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.75) 0%, rgba(0,0,0,0.1) 55%, transparent 100%);
            display: flex; flex-direction: column; align-items: center; justify-content: flex-end;
            padding: 1.1rem;
            opacity: 0; transition: opacity 0.3s;
        }
        .ii-gallery-item:hover .ii-gallery-overlay { opacity: 1; }

        /* ── Lightbox ── */
        .ii-lb {
            position: fixed; inset: 0; z-index: 9999;
            background: rgba(0,0,0,0.92);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none;
            transition: opacity 0.25s;
        }
        .ii-lb--open { opacity: 1; pointer-events: all; }
        .ii-lb__img {
            max-width: min(90vw, 920px); max-height: 78vh;
            object-fit: contain; border-radius: 0.75rem;
            box-shadow: 0 20px 70px rgba(0,0,0,0.55);
            transition: transform 0.3s;
        }
        .ii-lb__cap { color: rgba(255,255,255,0.7); font-size: 0.88rem; margin-top: 1rem; text-align: center; }
        .ii-lb__close {
            position: absolute; top: 1.25rem; right: 1.25rem;
            background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.18);
            color: #fff; width: 2.6rem; height: 2.6rem; border-radius: 50%;
            font-size: 1.1rem; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            transition: background 0.2s;
        }
        .ii-lb__close:hover { background: rgba(255,255,255,0.22); }

        /* ── Scroll reveal ── */
        .ii-reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .ii-reveal--in { opacity: 1; transform: translateY(0); }

        /* ── Empty ── */
        .ii-empty {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            padding: 3rem; background: #f8fafc; border-radius: 1.25rem;
            color: #94a3b8; text-align: center;
        }

        /* ── Kursus Cards ── */
        .ii-kc {
            border: 1.5px solid #f1f5f9;
            border-radius: 1.25rem;
            background: #fff;
            transition: box-shadow 0.28s, border-color 0.28s, transform 0.28s;
            overflow: hidden;
        }
        .ii-kc:hover {
            box-shadow: 0 8px 32px rgba(0,0,0,0.10);
            border-color: var(--institusi-info-500, #f97316);
            transform: translateY(-2px);
        }
        .ii-kc__header {
            display: flex; align-items: flex-start; gap: 1rem;
            padding: 1.15rem 1.35rem;
        }
        .ii-kc__actions {
            display: flex; align-items: center; gap: 0.6rem; margin-top: 0.7rem; flex-wrap: wrap;
        }
        .ii-kc__toggle {
            display: inline-flex; align-items: center; gap: 0.35rem;
            background: none; border: 1.5px solid #e2e8f0; border-radius: 9999px;
            padding: 0.3rem 0.85rem; font-size: 0.75rem; font-weight: 600; color: #64748b;
            cursor: pointer; transition: border-color 0.2s, color 0.2s, background 0.2s;
        }
        .ii-kc__toggle:hover {
            border-color: var(--institusi-info-500, #d4af37);
            color: var(--institusi-info-600, #b88912);
            background: var(--institusi-info-100, #fef3c7);
        }
        .ii-kc__toggle-label { pointer-events: none; }
        .ii-kc__icon {
            flex-shrink: 0;
            width: 2.75rem; height: 2.75rem;
            display: flex; align-items: center; justify-content: center;
            border-radius: 0.875rem;
            font-size: 1.1rem;
            background: var(--institusi-info-100, #fef3c7);
            color: var(--institusi-info-600, #b88912);
            transition: background 0.2s;
        }
        .ii-kc:hover .ii-kc__icon {
            background: var(--institusi-info-500, #d4af37);
            color: #fff;
        }
        .ii-kc__meta { flex: 1; min-width: 0; }
        .ii-kc__name {
            font-size: 1rem; font-weight: 700; color: #1e293b;
            line-height: 1.35; margin-bottom: 0.45rem;
        }
        .ii-kc__chips { display: flex; flex-wrap: wrap; gap: 0.5rem; }
        .ii-kc__chip {
            font-size: 0.8rem; font-weight: 600;
            padding: 0.35rem 0.85rem; border-radius: 9999px;
            background: #f1f5f9; color: #475569;
            display: inline-flex; align-items: center; gap: 0.4rem;
            white-space: nowrap;
        }
        .ii-kc__chip--accent {
            background: var(--institusi-info-100, #fef3c7);
            color: var(--institusi-info-700, #8a6a08);
            font-weight: 700;
        }
        .ii-kc__chevron {
            flex-shrink: 0; color: #94a3b8; font-size: 0.75rem;
            margin-top: 0.1rem;
            transition: transform 0.25s;
        }
        .ii-kc--open .ii-kc__chevron { transform: rotate(180deg); }
        .ii-kc__body {
            display: none;
            padding: 0 1.35rem 1.2rem;
            border-top: 1px solid #f1f5f9;
        }
        .ii-kc--open .ii-kc__body { display: block; }
        .ii-kc__penerangan {
            font-size: 0.85rem; color: #475569; line-height: 1.7;
            margin-bottom: 0.85rem; margin-top: 0.9rem;
        }
        .ii-kc__footer {
            display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.5rem;
        }
        .ii-kc__tarikh { font-size: 0.72rem; color: #94a3b8; }
        .ii-kc__cta {
            display: flex; align-items: center; justify-content: center; gap: 0.75rem;
            width: 100%;
            padding: 1rem 1.5rem; border-radius: 1rem;
            font-size: 1.05rem; font-weight: 800; letter-spacing: 0.02em;
            background: var(--institusi-info-500, #d4af37);
            color: #fff; text-decoration: none;
            transition: filter 0.2s, transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 20px rgba(0,0,0,0.18);
            margin-top: 0.85rem;
        }
        .ii-kc__cta:hover {
            filter: brightness(1.1);
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.22);
        }
        .ii-kc__cta i { font-size: 0.95rem; }
    </style>
</head>
@php
    $institusiInfoType = strtolower((string) $institusi->jenis_institusi);
    $isThemed = in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true);
@endphp
<body class="no-bg {{ $institusiInfoType === 'tvet' ? 'institusi-info-page--tvet' : '' }} {{ $institusiInfoType === 'diploma' ? 'institusi-info-page--diploma' : '' }} {{ $institusiInfoType === 'sains kesihatan' ? 'institusi-info-page--sains-kesihatan' : '' }} {{ !$isThemed ? 'bg-gray-100' : '' }} text-gray-800">

    @include('layouts.navigation')

    {{-- ══ HERO ══ --}}
    <div class="ii-hero">
        <img src="{{ asset($institusi->gambar_institusi) }}" alt="{{ $institusi->nama_institusi }}" class="ii-hero__img" id="ii-hero-img">
        <div class="ii-hero__overlay"></div>
        <div class="ii-hero__content">
            <span class="ii-hero__badge {{ $isThemed ? 'institusi-info-badge-tvet' : 'bg-white/20 text-white' }}">{{ $institusi->jenis_institusi }}</span>
            <h1 class="ii-hero__title">{{ $institusi->nama_institusi }}</h1>
            <p class="ii-hero__addr"><i class="fas fa-map-marker-alt mr-2"></i>{{ $institusi->alamat }}</p>
            <div class="ii-hero__stats">
                <div class="ii-hero__stat">
                    <span class="ii-hero__stat-num">{{ count($kursusList) }}</span>
                    <span class="ii-hero__stat-label">Kursus</span>
                </div>
                @if(count($galeriList) > 0)
                <div class="ii-hero__stat-div"></div>
                <div class="ii-hero__stat">
                    <span class="ii-hero__stat-num">{{ count($galeriList) }}</span>
                    <span class="ii-hero__stat-label">Galeri</span>
                </div>
                @endif
            </div>
        </div>
        <a href="{{ route('institusi') }}" class="ii-back-btn">
            <i class="fas fa-arrow-left"></i><span>Senarai Institusi</span>
        </a>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-12 space-y-8">

        {{-- ══ ABOUT ══ --}}
        <div class="ii-card ii-card--about ii-reveal">
            <div class="ii-card__icon-wrap {{ $isThemed ? 'institusi-info-accent-tvet' : 'text-orange-500' }}">
                <i class="fas fa-building-columns"></i>
            </div>
            <div class="ii-card__content flex-1 min-w-0">
                <h2 class="ii-section-title mb-2">Mengenai Institusi</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $institusi->mengenai_institusi }}</p>
            </div>
        </div>

        {{-- ══ KURSUS ══ --}}
        <div class="ii-card ii-reveal" style="transition-delay:0.1s">
            <div class="w-full min-w-0">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <h2 class="ii-section-title flex items-center gap-3 flex-wrap">
                        <i class="fas fa-graduation-cap {{ $isThemed ? 'institusi-info-accent-tvet' : 'text-orange-500' }}"></i>
                        Senarai Kursus Ditawarkan
                        <span class="ii-badge {{ $isThemed ? 'institusi-info-count-tvet' : 'bg-orange-100 text-orange-700' }}">{{ count($kursusList) }} kursus</span>
                    </h2>
                    @if(count($kursusList) > 0)
                    <input type="search" id="ii-kursus-search" placeholder="Cari kursus…" class="ii-search-input" autocomplete="off">
                    @endif
                </div>

                @if(count($kursusList) > 0)
                <div class="grid sm:grid-cols-2 gap-3" id="ii-kursus-grid">
                    @foreach($kursusList as $kursus)
                    @php
                        $modIcon = 'fa-clock';
                        if (str_contains(strtolower($kursus->mod_pengajian ?? ''), 'separuh')) $modIcon = 'fa-calendar-half';
                        if (str_contains(strtolower($kursus->jenis_kursus ?? ''), 'kemahiran') || str_contains(strtolower($kursus->nama_kursus), 'kemahiran')) $modIcon = 'fa-wrench';
                        if (str_contains(strtolower($kursus->nama_kursus), 'kesihatan') || str_contains(strtolower($kursus->nama_kursus), 'perubatan')) $modIcon = 'fa-heart-pulse';
                        if (str_contains(strtolower($kursus->nama_kursus), 'teknologi') || str_contains(strtolower($kursus->nama_kursus), 'digital') || str_contains(strtolower($kursus->nama_kursus), 'komputer')) $modIcon = 'fa-laptop-code';
                        if (str_contains(strtolower($kursus->nama_kursus), 'perniagaan') || str_contains(strtolower($kursus->nama_kursus), 'pemasaran') || str_contains(strtolower($kursus->nama_kursus), 'pengurusan')) $modIcon = 'fa-briefcase';
                        if (str_contains(strtolower($kursus->nama_kursus), 'seni') || str_contains(strtolower($kursus->nama_kursus), 'rekabentuk') || str_contains(strtolower($kursus->nama_kursus), 'grafik')) $modIcon = 'fa-palette';
                        if (str_contains(strtolower($kursus->nama_kursus), 'kecantikan') || str_contains(strtolower($kursus->nama_kursus), 'penjagaan')) $modIcon = 'fa-spa';
                        if (str_contains(strtolower($kursus->nama_kursus), 'elektrik') || str_contains(strtolower($kursus->nama_kursus), 'elektronik')) $modIcon = 'fa-bolt';
                        if (str_contains(strtolower($kursus->nama_kursus), 'mekanikal') || str_contains(strtolower($kursus->nama_kursus), 'automotif') || str_contains(strtolower($kursus->nama_kursus), 'kejuruteraan')) $modIcon = 'fa-gears';
                        if (str_contains(strtolower($kursus->nama_kursus), 'masakan') || str_contains(strtolower($kursus->nama_kursus), 'katering') || str_contains(strtolower($kursus->nama_kursus), 'hospitaliti')) $modIcon = 'fa-utensils';
                    @endphp
                    <div class="ii-kc" id="ii-kc-{{ $kursus->id }}" data-name="{{ strtolower($kursus->nama_kursus) }} {{ strtolower($kursus->kod_kursus) }}">
                        <div class="ii-kc__header">
                            <div class="ii-kc__icon"><i class="fas {{ $modIcon }}"></i></div>
                            <div class="ii-kc__meta">
                                <div class="ii-kc__name">{{ $kursus->nama_kursus }}</div>
                                <div class="ii-kc__chips">
                                    <span class="ii-kc__chip ii-kc__chip--accent"><i class="fas fa-barcode"></i> {{ $kursus->kod_kursus }}</span>
                                    <span class="ii-kc__chip"><i class="fas fa-hourglass-half"></i> {{ $kursus->tempoh }}</span>
                                    <span class="ii-kc__chip"><i class="fas fa-users"></i> Kuota: {{ $kursus->kuota }}</span>
                                    <span class="ii-kc__chip"><i class="fas fa-book-open"></i> {{ $kursus->mod_pengajian }}</span>
                                </div>
                                <div class="ii-kc__actions">
                                    <button class="ii-kc__toggle" onclick="iiToggleKc(this)" aria-expanded="false">
                                        <span class="ii-kc__toggle-label">Maklumat lanjut</span>
                                        <i class="fas fa-chevron-down ii-kc__chevron"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="ii-kc__body">
                            @if($kursus->penerangan)
                            <p class="ii-kc__penerangan">{{ $kursus->penerangan }}</p>
                            @else
                            <p class="ii-kc__penerangan text-gray-400 italic">Tiada penerangan tambahan.</p>
                            @endif
                            @if($kursus->tarikh_pendaftaran)
                            <p class="ii-kc__tarikh mt-2"><i class="fas fa-calendar-check mr-1"></i>Pendaftaran: {{ $kursus->tarikh_pendaftaran->format('d M Y') }}</p>
                            @endif
                        </div>
                        <div class="px-1 pb-1.5">
                            <a href="{{ route('kursus.show', $kursus->id) }}" class="ii-kc__cta">
                                <i class="fas fa-graduation-cap"></i> Lihat Kursus <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <p class="ii-no-results hidden text-center text-gray-400 py-8 text-sm">Tiada kursus sepadan dengan carian.</p>
                @else
                <div class="ii-empty">
                    <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
                    <p>Tiada kursus ditawarkan pada institusi ini.</p>
                </div>
                @endif
            </div>
        </div>

        {{-- ══ GALERI ══ --}}
        @if(count($galeriList) > 0 || true)
        <div class="ii-card ii-reveal" style="transition-delay:0.2s">
            <div class="w-full min-w-0">
                <h2 class="ii-section-title flex items-center gap-3 mb-6">
                    <i class="fas fa-images {{ $isThemed ? 'institusi-info-accent-tvet' : 'text-orange-500' }}"></i>
                    Galeri Fasiliti
                </h2>

                @if(count($galeriList) > 0)
                <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
                    @foreach($galeriList as $foto)
                    <button class="ii-gallery-item" onclick="iiLightbox('{{ asset($foto->imej) }}', '{{ addslashes($foto->penerangan ?? 'Fasiliti institusi') }}')">
                        <img src="{{ asset($foto->imej) }}" alt="Fasiliti" class="ii-gallery-img" loading="lazy">
                        <div class="ii-gallery-overlay">
                            <i class="fas fa-expand text-white text-lg mb-2"></i>
                            <p class="text-white text-sm font-medium px-3 text-center">{{ $foto->penerangan ?? 'Fasiliti institusi' }}</p>
                        </div>
                    </button>
                    @endforeach
                </div>
                @else
                <div class="ii-empty">
                    <i class="fas fa-image text-4xl text-gray-300 mb-3"></i>
                    <p>Tiada gambar fasiliti dipaparkan.</p>
                </div>
                @endif
            </div>
        </div>
        @endif

    </div>

    {{-- ══ LIGHTBOX ══ --}}
    <div id="ii-lb" class="ii-lb" role="dialog" aria-modal="true" onclick="iiLightboxClose()">
        <button class="ii-lb__close" onclick="iiLightboxClose()" aria-label="Tutup"><i class="fas fa-times"></i></button>
        <img id="ii-lb-img" src="" alt="" class="ii-lb__img" onclick="event.stopPropagation()">
        <p id="ii-lb-cap" class="ii-lb__cap"></p>
    </div>

    @include('components.social-float')
    @include('layouts.footer')

    <script>
    /* ── Lightbox ── */
    function iiLightbox(src, cap) {
        document.getElementById('ii-lb-img').src = src;
        document.getElementById('ii-lb-cap').textContent = cap;
        document.getElementById('ii-lb').classList.add('ii-lb--open');
        document.body.style.overflow = 'hidden';
    }
    function iiLightboxClose() {
        document.getElementById('ii-lb').classList.remove('ii-lb--open');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') iiLightboxClose(); });

    /* ── Kursus card toggle ── */
    function iiToggleKc(btn) {
        var card = btn.closest('.ii-kc');
        var isOpen = card.classList.contains('ii-kc--open');
        document.querySelectorAll('.ii-kc--open').forEach(function(c) {
            c.classList.remove('ii-kc--open');
            c.querySelectorAll('[aria-expanded]').forEach(function(b){ b.setAttribute('aria-expanded','false'); });
            var lbl = c.querySelector('.ii-kc__toggle-label');
            if (lbl) lbl.textContent = 'Maklumat lanjut';
        });
        if (!isOpen) {
            card.classList.add('ii-kc--open');
            btn.setAttribute('aria-expanded', 'true');
            var lbl = btn.querySelector('.ii-kc__toggle-label');
            if (lbl) lbl.textContent = 'Sembunyikan';
        }
    }

    /* ── Live kursus search ── */
    var searchInput = document.getElementById('ii-kursus-search');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            var q = this.value.toLowerCase().trim();
            var cards = document.querySelectorAll('#ii-kursus-grid .ii-kc');
            var visible = 0;
            cards.forEach(function(card) {
                var match = card.dataset.name.includes(q);
                card.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            var noRes = document.querySelector('.ii-no-results');
            if (noRes) noRes.classList.toggle('hidden', visible > 0);
        });
    }

    /* ── Scroll reveal ── */
    if ('IntersectionObserver' in window) {
        var revealObs = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('ii-reveal--in');
                    revealObs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.ii-reveal').forEach(function(el) { revealObs.observe(el); });
    } else {
        document.querySelectorAll('.ii-reveal').forEach(function(el) { el.classList.add('ii-reveal--in'); });
    }

    /* ── Hero parallax ── */
    var heroImg = document.getElementById('ii-hero-img');
    if (heroImg) {
        window.addEventListener('scroll', function() {
            heroImg.style.transform = 'translateY(' + (window.scrollY * 0.28) + 'px)';
        }, { passive: true });
    }
    </script>

</body>
</html>

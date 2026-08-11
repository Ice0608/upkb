<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Info kursus</title>
    @vite(['resources/css/app.css', 'resources/css/lightbox.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    <style>
        .kursus-detail-page,
        .kursus-detail-shell {
            --detail-accent-50: #fff7ed;
            --detail-accent-100: #ffedd5;
            --detail-accent-500: #f97316;
            --detail-accent-600: #ea580c;
            --detail-accent-700: #c2410c;
            --detail-accent-rgb: 249, 115, 22;
            --detail-accent-rgb-soft: 251, 146, 60;
            --detail-gradient-start: #fb923c;
            --detail-gradient-end: #f97316;
            --detail-hero-soft-text: rgba(255, 237, 213, 0.92);
            --detail-tab-soft: rgba(255, 247, 237, 0.92);
            --detail-tab-active: linear-gradient(135deg, rgba(255, 247, 237, 0.96), rgba(255, 237, 213, 0.88));
            --detail-card-border: rgba(251, 146, 60, 0.14);
            --detail-card-bg: rgba(255, 247, 237, 0.72);
            --detail-card-strong-bg: rgba(255, 237, 213, 0.86);
            --detail-chip-bg: rgba(255, 255, 255, 0.18);
        }

        .kursus-detail-page {
            background:
                radial-gradient(circle at 10% 12%, rgba(var(--detail-accent-rgb-soft), 0.18), transparent 24%),
                radial-gradient(circle at 88% 14%, rgba(59, 130, 246, 0.08), transparent 24%),
                linear-gradient(180deg, #fffaf5 0%, #f8fafc 44%, #f6f8fc 100%);
        }

        .kursus-detail-page--tvet,
        .kursus-detail-shell--tvet {
            --detail-accent-50: #fff2ec;
            --detail-accent-100: #ffe0cc;
            --detail-accent-500: #FF5100;
            --detail-accent-600: #CC4100;
            --detail-accent-700: #993100;
            --detail-accent-rgb: 255, 81, 0;
            --detail-accent-rgb-soft: 255, 130, 60;
            --detail-gradient-start: #ff7a38;
            --detail-gradient-end: #FF5100;
            --detail-hero-soft-text: rgba(255, 220, 200, 0.92);
            --detail-tab-soft: rgba(255, 242, 236, 0.94);
            --detail-tab-active: linear-gradient(135deg, rgba(255, 242, 236, 0.98), rgba(255, 220, 200, 0.88));
            --detail-card-border: rgba(255, 81, 0, 0.16);
            --detail-card-bg: rgba(255, 242, 236, 0.8);
            --detail-card-strong-bg: rgba(255, 220, 200, 0.88);
        }

        .kursus-detail-page--diploma,
        .kursus-detail-shell--diploma {
            --detail-accent-50: #f5f3ff;
            --detail-accent-100: #ede9fe;
            --detail-accent-500: #8b5cf6;
            --detail-accent-600: #7c3aed;
            --detail-accent-700: #6d28d9;
            --detail-accent-rgb: 124, 58, 237;
            --detail-accent-rgb-soft: 192, 132, 252;
            --detail-gradient-start: #a855f7;
            --detail-gradient-end: #7c3aed;
            --detail-hero-soft-text: rgba(243, 232, 255, 0.92);
            --detail-tab-soft: rgba(245, 243, 255, 0.94);
            --detail-tab-active: linear-gradient(135deg, rgba(245, 243, 255, 0.98), rgba(233, 213, 255, 0.88));
            --detail-card-border: rgba(124, 58, 237, 0.16);
            --detail-card-bg: rgba(245, 243, 255, 0.8);
            --detail-card-strong-bg: rgba(233, 213, 255, 0.88);
        }

        .kursus-detail-page--sains-kesihatan,
        .kursus-detail-shell--sains-kesihatan {
            --detail-accent-50: #eff6ff;
            --detail-accent-100: #dbeafe;
            --detail-accent-500: #3b82f6;
            --detail-accent-600: #2563eb;
            --detail-accent-700: #1d4ed8;
            --detail-accent-rgb: 37, 99, 235;
            --detail-accent-rgb-soft: 96, 165, 250;
            --detail-gradient-start: #60a5fa;
            --detail-gradient-end: #2563eb;
            --detail-hero-soft-text: rgba(219, 234, 254, 0.92);
            --detail-tab-soft: rgba(239, 246, 255, 0.94);
            --detail-tab-active: linear-gradient(135deg, rgba(239, 246, 255, 0.98), rgba(219, 234, 254, 0.88));
            --detail-card-border: rgba(37, 99, 235, 0.16);
            --detail-card-bg: rgba(239, 246, 255, 0.8);
            --detail-card-strong-bg: rgba(219, 234, 254, 0.88);
        }

        .kursus-detail-page--tvet {
            background:
                url('/images/TVET-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(241, 207, 99, 0.18), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .kursus-detail-page--diploma {
            background:
                url('/images/DIP-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(192, 132, 252, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(99, 102, 241, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .kursus-detail-page--sains-kesihatan {
            background:
                url('/images/SK-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(96, 165, 250, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(33, 150, 243, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .kursus-detail-shell {
            position: relative;
            isolation: isolate;
        }

        .kursus-detail-shell::before,
        .kursus-detail-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .kursus-detail-shell::before {
            top: 1rem;
            left: -2rem;
            width: 16rem;
            height: 16rem;
            border-radius: 3rem;
            background: radial-gradient(circle at 30% 30%, rgba(var(--detail-accent-rgb-soft), 0.18), rgba(var(--detail-accent-rgb-soft), 0) 58%);
            filter: blur(10px);
            opacity: 0.9;
        }

        .kursus-detail-shell::after {
            right: -1.5rem;
            top: 12rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(var(--detail-accent-rgb), 0.12), rgba(var(--detail-accent-rgb), 0));
            filter: blur(12px);
            opacity: 0.92;
        }

        .kursus-detail-hero {
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.72);
            background: linear-gradient(120deg, var(--detail-gradient-start), var(--detail-gradient-end));
            box-shadow: 0 28px 62px rgba(15, 23, 42, 0.12), 0 0 40px rgba(var(--detail-accent-rgb), 0.16);
            overflow: hidden;
        }

        .kursus-detail-hero::before {
            content: "";
            position: absolute;
            inset: 0 0 0 34%;
            z-index: 0;
            background:
                linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.04) 34%, rgba(15, 23, 42, 0.12) 100%),
                var(--detail-hero-image) center / cover no-repeat;
            opacity: 0.78;
            filter: saturate(1.08) contrast(1.02);
            -webkit-mask-image: linear-gradient(90deg, transparent 0%, rgba(0, 0, 0, 0.08) 10%, rgba(0, 0, 0, 0.72) 32%, #000 100%);
            mask-image: linear-gradient(90deg, transparent 0%, rgba(0, 0, 0, 0.08) 10%, rgba(0, 0, 0, 0.72) 32%, #000 100%);
            pointer-events: none;
        }

        .kursus-detail-hero > .relative {
            position: relative;
            z-index: 1;
        }

        .kursus-detail-soft-text {
            color: var(--detail-hero-soft-text);
        }

        .kursus-detail-chip {
            background: var(--detail-chip-bg);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .kursus-detail-primary-btn {
            color: var(--detail-accent-600);
        }

        .kursus-detail-primary-btn:hover {
            color: var(--detail-accent-700);
        }

        .kursus-detail-print-btn {
            border: 1px solid rgba(var(--detail-accent-rgb), 0.24);
            background: rgba(255, 255, 255, 0.96);
            color: var(--detail-accent-700);
            box-shadow: 0 10px 22px rgba(var(--detail-accent-rgb), 0.12);
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease, background-color 0.28s ease, color 0.28s ease;
        }

        .kursus-detail-print-btn:hover {
            transform: translateY(-2px);
            border-color: rgba(var(--detail-accent-rgb), 0.38);
            background: var(--detail-accent-50);
            color: var(--detail-accent-700);
            box-shadow: 0 14px 26px rgba(var(--detail-accent-rgb), 0.16);
        }

        .pilihan-back-btn,
        .pilihan-filter-card,
        .pilihan-select,
        .pilihan-mod-btn,
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
            color: var(--detail-accent-600);
            border-color: rgba(var(--detail-accent-rgb), 0.32);
            box-shadow: 0 18px 34px rgba(var(--detail-accent-rgb), 0.1);
        }

        /* -- Daftar CTA -- */
        .kd-cta-daftar {
            position: relative; overflow: hidden;
            display: inline-flex; align-items: center; gap: 0.75rem;
            padding: 1.1rem 2.5rem;
            border-radius: 9999px;
            background: #3b0764;
            color: #fff;
            font-size: 1.15rem; font-weight: 800; letter-spacing: 0.01em;
            text-decoration: none;
            box-shadow: 0 0 0 3px rgba(91,33,182,0.35), 0 8px 28px rgba(59,7,100,0.38);
            transition: transform 0.22s, box-shadow 0.22s, background 0.22s;
            animation: kdPulse 2.4s ease-in-out infinite;
            border: none; cursor: pointer;
        }
        .kd-cta-daftar::before {
            content: '';
            position: absolute; top: 0; left: -75%;
            width: 50%; height: 100%;
            background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,0.18) 50%, transparent 100%);
            transform: skewX(-18deg);
            animation: kdShine 2.4s ease-in-out infinite;
        }
        .kd-cta-daftar:hover {
            transform: translateY(-3px) scale(1.04);
            box-shadow: 0 0 0 5px rgba(91,33,182,0.28), 0 16px 40px rgba(59,7,100,0.45);
            background: #2e0652;
            animation-play-state: paused;
        }
        .kd-cta-daftar .kd-cta-daftar__arrow {
            display: inline-flex; align-items: center; justify-content: center;
            width: 2.1rem; height: 2.1rem; border-radius: 50%;
            background: rgba(255,255,255,0.18);
            color: #fff; font-size: 0.85rem;
            flex-shrink: 0;
            transition: transform 0.22s;
        }
        .kd-cta-daftar:hover .kd-cta-daftar__arrow { transform: translateX(5px); }
        @keyframes kdPulse {
            0%, 100% { box-shadow: 0 0 0 3px rgba(91,33,182,0.35), 0 8px 28px rgba(59,7,100,0.38); }
            50% { box-shadow: 0 0 0 9px rgba(91,33,182,0.15), 0 12px 36px rgba(59,7,100,0.48); }
        }
        @keyframes kdShine {
            0% { left: -75%; }
            60%, 100% { left: 130%; }
        }

        /* -- TVET theme override for Daftar CTA -- */
        .kursus-detail-page--tvet .kd-cta-daftar {
            background: #7a2400;
            box-shadow: 0 0 0 3px rgba(255,81,0,0.38), 0 8px 28px rgba(122,36,0,0.42);
        }
        .kursus-detail-page--tvet .kd-cta-daftar:hover {
            background: #5c1a00;
            box-shadow: 0 0 0 5px rgba(255,81,0,0.25), 0 16px 40px rgba(122,36,0,0.52);
        }
        @keyframes kdPulseTvet {
            0%, 100% { box-shadow: 0 0 0 3px rgba(255,81,0,0.38), 0 8px 28px rgba(122,36,0,0.42); }
            50% { box-shadow: 0 0 0 9px rgba(255,81,0,0.15), 0 12px 36px rgba(122,36,0,0.52); }
        }
        .kursus-detail-page--tvet .kd-cta-daftar { animation-name: kdPulseTvet; }

        /* -- Sains Kesihatan theme override for Daftar CTA -- */
        .kursus-detail-page--sains-kesihatan .kd-cta-daftar {
            background: #1a3878;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.42), 0 8px 28px rgba(26,56,120,0.45);
        }
        .kursus-detail-page--sains-kesihatan .kd-cta-daftar:hover {
            background: #122660;
            box-shadow: 0 0 0 5px rgba(37,99,235,0.28), 0 16px 40px rgba(26,56,120,0.55);
        }
        @keyframes kdPulseSK {
            0%, 100% { box-shadow: 0 0 0 3px rgba(37,99,235,0.42), 0 8px 28px rgba(26,56,120,0.45); }
            50% { box-shadow: 0 0 0 9px rgba(37,99,235,0.18), 0 12px 36px rgba(26,56,120,0.55); }
        }
        .kursus-detail-page--sains-kesihatan .kd-cta-daftar { animation-name: kdPulseSK; }

        .kursus-detail-panel {
            border: 1px solid rgba(226, 232, 240, 0.84);
            background: rgba(255, 255, 255, 0.94);
            box-shadow: 0 20px 48px rgba(15, 23, 42, 0.08);
        }

        .kursus-detail-tabbar {
            background: rgba(248, 250, 252, 0.94);
        }

        .kursus-detail-tabs {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .kursus-detail-tabs .tab-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            text-align: center;
            white-space: normal;
        }

        .tab-link {
            color: #475569;
            transition: transform 0.28s ease, color 0.28s ease, background-color 0.28s ease, box-shadow 0.28s ease;
        }

        .tab-link:hover {
            background: var(--detail-tab-soft);
            color: var(--detail-accent-600);
        }

        .tab-link.is-active {
            background: var(--detail-tab-active);
            color: var(--detail-accent-700);
            box-shadow: 0 12px 24px rgba(var(--detail-accent-rgb), 0.12);
        }

        html.dark .kursus-detail-page--tvet {
            background:
                url('/images/TVET-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .kursus-detail-page--diploma {
            background:
                url('/images/DIP-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .kursus-detail-page--sains-kesihatan {
            background:
                url('/images/SK-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .kursus-detail-panel {
            border-color: rgba(51, 65, 85, 0.9);
            background: rgba(15, 23, 42, 0.92);
            box-shadow: 0 20px 48px rgba(0, 0, 0, 0.28);
        }

        html.dark .kursus-detail-tabbar {
            background: rgba(30, 41, 59, 0.9);
            border-bottom-color: rgba(51, 65, 85, 0.9) !important;
        }

        html.dark .tab-link {
            color: #cbd5e1;
        }

        html.dark .tab-link:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #f8fafc;
        }

        html.dark .tab-link.is-active {
            background: linear-gradient(135deg, rgba(var(--detail-accent-rgb), 0.35), rgba(var(--detail-accent-rgb), 0.18));
            color: #fff;
            box-shadow: 0 12px 24px rgba(var(--detail-accent-rgb), 0.20);
        }

        html.dark .pilihan-back-btn {
            border-color: rgba(255, 255, 255, 0.1);
            background: rgba(15, 23, 42, 0.88);
            color: #cbd5e1 !important;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.35);
        }

        html.dark .kursus-detail-print-btn {
            background: rgba(15, 23, 42, 0.88);
            color: var(--detail-accent-500);
            border-color: rgba(var(--detail-accent-rgb), 0.34);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.26);
        }

        html.dark .kursus-detail-print-btn:hover {
            background: rgba(var(--detail-accent-rgb), 0.16);
            color: #fff;
            border-color: rgba(var(--detail-accent-rgb), 0.5);
        }

        .kursus-tab-section {
            padding: 2rem;
        }

        .kursus-tab-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--detail-accent-600, #f97316);
            margin-bottom: 1rem;
        }

        .kursus-tab-card {
            border-radius: 1.5rem;
            border: 1px solid var(--detail-card-border);
            background: var(--detail-card-bg);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.72);
        }

        .kursus-tab-card-strong {
            background: var(--detail-card-strong-bg);
        }

        .kursus-tab-label {
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            font-size: 0.875rem;
        }

        .kursus-tab-accent {
            color: var(--detail-accent-500);
        }

        .kursus-tab-accent-strong {
            color: var(--detail-accent-700);
        }

        .kursus-tab-empty {
            border: 1px dashed var(--detail-card-border);
            background: var(--detail-card-bg);
        }

        html.dark .kursus-tab-title {
            color: var(--detail-accent-500, #f97316);
        }

        html.dark .kursus-tab-section {
            border-color: rgba(255, 255, 255, 0.07) !important;
        }

        html.dark .kursus-tab-card {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.08);
        }

        html.dark .kursus-tab-card-strong {
            background: rgba(255, 255, 255, 0.08);
        }

        html.dark .kursus-tab-empty {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(255, 255, 255, 0.08);
            color: #64748b;
        }

        html.dark .kursus-tab-label {
            color: #94a3b8;
        }

        html.dark #tab-content {
            color: #e2e8f0;
        }

        html.dark #tab-content .bg-white {
            background-color: rgba(15, 23, 42, 0.78) !important;
        }

        html.dark #tab-content .bg-gray-50 {
            background-color: rgba(30, 41, 59, 0.72) !important;
        }

        html.dark #tab-content .bg-emerald-50 {
            background-color: rgba(6, 78, 59, 0.32) !important;
        }

        html.dark #tab-content .bg-orange-50 {
            background-color: rgba(124, 45, 18, 0.28) !important;
        }

        html.dark #tab-content .border-gray-100,
        html.dark #tab-content .border-gray-200,
        html.dark #tab-content .border-gray-300,
        html.dark #tab-content .border-dashed {
            border-color: rgba(71, 85, 105, 0.72) !important;
        }

        html.dark #tab-content .border-orange-100,
        html.dark #tab-content .border-orange-200 {
            border-color: rgba(249, 115, 22, 0.42) !important;
        }

        html.dark #tab-content .text-slate-900,
        html.dark #tab-content .text-gray-900,
        html.dark #tab-content .text-gray-800,
        html.dark #tab-content .text-gray-700 {
            color: #f1f5f9 !important;
        }

        html.dark #tab-content .text-gray-600,
        html.dark #tab-content .text-gray-500 {
            color: #cbd5e1 !important;
        }

        html.dark #tab-content .text-orange-700,
        html.dark #tab-content .text-orange-900 {
            color: #fdba74 !important;
        }

        html.dark #tab-content .text-emerald-700,
        html.dark #tab-content .text-emerald-900 {
            color: #6ee7b7 !important;
        }

        @media (max-width: 768px) {
            .kursus-detail-shell {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
                padding-top: 1.5rem !important;
            }

            .kursus-detail-hero {
                border-radius: 1.5rem !important;
            }

            .kursus-detail-hero::before {
                inset: 0;
                background:
                    linear-gradient(180deg, rgba(49, 16, 89, 0.52) 0%, rgba(68, 20, 118, 0.36) 48%, rgba(36, 6, 68, 0.72) 100%),
                    var(--detail-hero-image) center / cover no-repeat;
                opacity: 0.56;
                -webkit-mask-image: none;
                mask-image: none;
            }

            .kursus-detail-hero .relative {
                padding: 1.25rem !important;
            }

            .kursus-detail-hero .relative > div:first-child {
                display: flex;
                flex-direction: column;
                gap: 0.85rem;
                padding-right: 0 !important;
            }

            .kursus-detail-hero .relative > div:first-child > .flex:first-child {
                flex-wrap: wrap;
                gap: 0.5rem !important;
                margin-bottom: 0 !important;
            }

            .kursus-detail-chip {
                padding: 0.38rem 0.72rem !important;
                font-size: 0.68rem !important;
                letter-spacing: 0.16em !important;
            }

            .kursus-detail-hero .relative > div:first-child > p.inline-flex {
                align-items: flex-start;
                margin-bottom: 0 !important;
                max-width: 100%;
                font-size: 0.82rem !important;
                line-height: 1.35;
            }

            .kursus-detail-hero h1 {
                display: block;
                margin-bottom: 0 !important;
                max-width: 100%;
                font-size: clamp(1.72rem, 8.2vw, 2.05rem) !important;
                line-height: 1.06 !important;
                letter-spacing: 0 !important;
                overflow-wrap: anywhere;
                word-break: break-word;
                hyphens: auto;
            }

            .kursus-detail-soft-text {
                display: grid !important;
                grid-template-columns: 1fr;
                gap: 0.55rem !important;
                font-size: 0.86rem !important;
            }

            .kursus-detail-soft-text > div {
                display: flex !important;
                align-items: center;
                gap: 0.55rem !important;
                min-width: 0;
                border: 1px solid rgba(255, 255, 255, 0.16);
                border-radius: 1rem;
                background: rgba(31, 15, 67, 0.22);
                padding: 0.6rem 0.72rem;
                line-height: 1.25;
                overflow-wrap: anywhere;
                backdrop-filter: blur(4px);
            }

            .kursus-detail-soft-text > div i {
                flex-shrink: 0;
            }

            .kursus-detail-hero .mt-8 {
                margin-top: 0.15rem !important;
            }

            .kursus-detail-primary-btn {
                max-width: 100%;
                justify-content: center;
                padding: 0.85rem 1.15rem !important;
                line-height: 1.2;
            }

            .kursus-detail-cta {
                position: static !important;
                align-items: stretch !important;
                margin-top: 0.3rem;
                border-top: 1px solid rgba(255, 255, 255, 0.18);
                padding-top: 1rem;
                padding-right: 2rem;
                width: 100%;
            }

            .kursus-detail-cta form {
                width: 100%;
            }

            .kd-cta-daftar {
                width: 100%;
                justify-content: space-between;
                min-height: 3.7rem;
                padding: 0.85rem 0.9rem 0.85rem 1rem;
                font-size: 1rem;
            }

            .kd-cta-daftar .kd-cta-daftar__arrow {
                width: 2.35rem;
                height: 2.35rem;
            }

            .kursus-detail-tabbar {
                padding: 1.25rem !important;
            }

            .kursus-detail-tabs {
                display: grid !important;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 0.65rem !important;
            }

            .kursus-detail-tabs .tab-link {
                display: flex;
                min-height: 3rem;
                align-items: center;
                justify-content: center;
                padding: 0.75rem 0.65rem !important;
                text-align: center;
                line-height: 1.25;
                white-space: normal;
            }
        }

        @media (min-width: 390px) and (max-width: 768px) {
            .kursus-detail-soft-text {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .kursus-detail-soft-text > div:first-child,
            .kursus-detail-soft-text > div:last-child {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 380px) {
            .kursus-detail-hero h1 {
                font-size: clamp(1.55rem, 7.6vw, 1.82rem) !important;
            }

            .kursus-detail-cta {
                padding-right: 2.5rem;
            }
        }
    </style>
</head>
@php
    $detailProgramType = strtolower((string) optional($kursus->institusi)->jenis_institusi);
    $detailInstitusi = $kursus->institusi;
    $detailCourseName = strtolower(trim((string) $kursus->nama_kursus));
    $detailTvetCourseFallbacks = [
        'pengurusan & pentadbiran pejabat',
        'pengurusan pejabat',
        'operasi sistem komputer',
        'rangkaian komputer',
    ];

    if ($detailProgramType === '' && (
        in_array($detailCourseName, $detailTvetCourseFallbacks, true)
        || str_contains($detailCourseName, 'kulinari')
    )) {
        $detailProgramType = 'tvet';
    }
    $detailEntityLabel = $detailProgramType === 'tvet' ? 'Pusat Bertauliah' : 'Institusi';
    $showCoursePrintButton = !in_array($detailProgramType, ['smart tahfiz', 'tahfiz'], true);
    $detailPrintTheme = [
        'accent600' => '#ea580c',
        'rgb' => '234,88,12',
    ];

    if ($detailProgramType === 'tvet') {
        $detailPrintTheme = ['accent600' => '#CC4100', 'rgb' => '255,81,0'];
    } elseif ($detailProgramType === 'diploma') {
        $detailPrintTheme = ['accent600' => '#7c3aed', 'rgb' => '124,58,237'];
    } elseif ($detailProgramType === 'sains kesihatan') {
        $detailPrintTheme = ['accent600' => '#2563eb', 'rgb' => '37,99,235'];
    }

    $heroImage = optional($kursus->galeris->first())->imej
        ?? optional($kursus->institusi)->gambar_institusi
        ?? 'images/default-course.jpg';
    $heroImageUrl = public_media_url($heroImage);
@endphp
<body class="kursus-detail-page no-bg {{ $detailProgramType === 'tvet' ? 'kursus-detail-page--tvet' : '' }} {{ $detailProgramType === 'diploma' ? 'kursus-detail-page--diploma' : '' }} {{ $detailProgramType === 'sains kesihatan' ? 'kursus-detail-page--sains-kesihatan' : '' }} text-gray-800">
@include('layouts.navpelajar')

    <section class="kursus-detail-shell {{ $detailProgramType === 'tvet' ? 'kursus-detail-shell--tvet' : '' }} {{ $detailProgramType === 'diploma' ? 'kursus-detail-shell--diploma' : '' }} {{ $detailProgramType === 'sains kesihatan' ? 'kursus-detail-shell--sains-kesihatan' : '' }} max-w-7xl mx-auto px-6 py-10">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <button type="button" onclick="window.history.back()"
                class="pilihan-back-btn inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold text-slate-700">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </button>

            @if($showCoursePrintButton)
                <button type="button" onclick="printCourseInfoSections()"
                    class="kursus-detail-print-btn inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold">
                    <i class="fa-solid fa-print"></i>
                    Cetak Info Kursus
                </button>
            @endif
        </div>
        <div class="kursus-detail-hero rounded-3xl shadow-lg overflow-hidden mb-10 text-white" style="--detail-hero-image: url('{{ $heroImageUrl }}');">
            <div class="relative p-8">
                <div class="pr-0 md:pr-56">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="kursus-detail-chip px-3 py-1 rounded-full uppercase text-xs tracking-[0.2em]">{{ $kursus->jenis_kursus }}</span>
                        <span class="kursus-detail-chip px-3 py-1 rounded-full uppercase text-xs tracking-[0.2em]">{{ $kursus->mod_pengajian }}</span>
                    </div>
                    @if($detailInstitusi)
                        <p class="text-sm text-white/80 mb-4 inline-flex items-center gap-2"><i class="fas fa-building"></i>{{ $detailInstitusi->nama_institusi ?? $detailInstitusi->kod_institusi }}</p>
                    @endif
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">{{ $kursus->nama_kursus }}</h1>
                    <div class="kursus-detail-soft-text flex flex-wrap items-center gap-4 text-sm">
                        <div class="inline-flex items-center gap-2"><i class="fas fa-hashtag"></i> {{ $kursus->kod_kursus }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-clock"></i> {{ $kursus->tempoh }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-users"></i> Kuota {{ $kursus->kuota }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-calendar-days"></i> Daftar {{ $kursus->tarikh_pendaftaran ? $kursus->tarikh_pendaftaran->format('d M Y') : 'Sila Rujuk Pegawai Kami' }}</div>
                    </div>

                    <div class="mt-8">
                        @if($detailInstitusi)
                            <a href="{{ route('pelajar.infoinstitusi', ['pelajar' => $pelajar->id, 'kod_institusi' => $detailInstitusi->kod_institusi]) }}" class="kursus-detail-primary-btn inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 font-semibold shadow-lg hover:bg-white/90 transition">
                                <i class="fas fa-arrow-left"></i> Kembali ke {{ $detailEntityLabel }}
                            </a>
                        @endif
                    </div>
                </div>

                {{-- Corner CTA --}}
                <div class="kursus-detail-cta absolute bottom-8 right-8 flex flex-col items-end gap-2">
                    <form action="{{ route('pelajar.apply-now', $pelajar->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="kod_institusi" value="{{ $kursus->kod_institusi }}">
                        <input type="hidden" name="kod_kursus" value="{{ $kursus->kod_kursus }}">
                        <button type="submit" class="kd-cta-daftar">
                            <i class="fas fa-user-plus"></i>
                            Daftar Sekarang
                            <span class="kd-cta-daftar__arrow"><i class="fas fa-arrow-right"></i></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="kursus-detail-panel rounded-3xl shadow-lg overflow-hidden mb-10">
            <div class="kursus-detail-tabbar border-b border-gray-200 px-6 py-4">
                <div class="kursus-detail-tabs flex flex-wrap gap-2 text-sm text-gray-600">
                    <a href="#" onclick="loadTab('maklumat')" class="tab-link px-4 py-2 rounded-full" data-tab="maklumat">Maklumat Am</a>
                    <a href="#" onclick="loadTab('syarat')" class="tab-link px-4 py-2 rounded-full" data-tab="syarat">Syarat Kelayakan</a>
                    <a href="#" onclick="loadTab('kerjaya')" class="tab-link px-4 py-2 rounded-full" data-tab="kerjaya">Laluan Kerjaya</a>
                    <a href="#" onclick="loadTab('yuran')" class="tab-link px-4 py-2 rounded-full" data-tab="yuran">Yuran & Pinjaman</a>
                    <a href="#" onclick="loadTab('galeri')" class="tab-link px-4 py-2 rounded-full" data-tab="galeri">Galeri</a>
                </div>
            </div>

            <div id="tab-content">
                <!-- Tab content will be loaded here via AJAX -->
            </div>
        </div>
    </section>

    @include('layouts.footer-pelajar')

    <script>
        let currentTab = 'maklumat';

        function runLoadedScripts(container) {
            container.querySelectorAll('script').forEach(script => {
                const executableScript = document.createElement('script');
                Array.from(script.attributes).forEach(attribute => {
                    executableScript.setAttribute(attribute.name, attribute.value);
                });
                executableScript.textContent = script.textContent;
                script.replaceWith(executableScript);
            });
        }

        function initializeLoadedYuran(container) {
            if (!window.updateGuestYuranTotal) return;
            container.querySelectorAll('[data-yuran-section]').forEach(section => {
                const card = section.querySelector('[data-yuran-card]');
                if (card) window.updateGuestYuranTotal(card, 'init');
            });
        }

        function printCourseInfoSections() {
            const tabUrls = {
                maklumat: "{{ route('pelajar.tab.maklumat', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}",
                syarat: "{{ route('pelajar.tab.syarat', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}",
                kerjaya: "{{ route('pelajar.tab.kerjaya', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}",
                yuran: "{{ route('pelajar.tab.yuran', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}",
                galeri: "{{ route('pelajar.tab.galeri', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}"
            };

            const tabs = [
                { key: 'maklumat', title: 'Maklumat Am', url: tabUrls.maklumat },
                { key: 'syarat', title: 'Syarat Kelayakan', url: tabUrls.syarat },
                { key: 'kerjaya', title: 'Laluan Kerjaya', url: tabUrls.kerjaya },
                { key: 'yuran', title: 'Yuran & Pinjaman', url: tabUrls.yuran },
                { key: 'galeri', title: 'Galeri', url: tabUrls.galeri },
            ];

            const printWindow = window.open('', '_blank', 'width=1200,height=1400');
            if (!printWindow) {
                alert('Popup disekat oleh browser. Sila benarkan popup untuk mencetak maklumat kursus.');
                return;
            }

            Promise.all(tabs.map(async (tab) => {
                const response = await fetch(tab.url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    }
                });
                const html = await response.text();
                const cleanedHtml = html
                    .replace(/<script[\s\S]*?<\/script>/gi, '')
                    .replace(/<h2\b[^>]*class="[^"]*(kursus-tab-title|kursus-tab-accent-strong)[^"]*"[^>]*>[\s\S]*?<\/h2>/gi, '');
                const preview = document.createElement('div');
                preview.innerHTML = cleanedHtml;
                const imageCount = preview.querySelectorAll('img').length;

                return {
                    title: tab.title,
                    html: cleanedHtml,
                    printClass: tab.key === 'kerjaya' && imageCount === 2 ? 'course-print-section--kerjaya-two-images' : '',
                };
            })).then((sections) => {
                const heroImage = @json($heroImageUrl);
                const courseCode = @json($kursus->kod_kursus ?? '');
                const courseName = @json($kursus->nama_kursus ?? '');
                const institutionName = @json(optional($kursus->institusi)->nama_institusi ?? '');
                const programType = @json($kursus->jenis_kursus ?? '');
                const modPengajian = @json($kursus->mod_pengajian ?? '');
                const tempoh = @json($kursus->tempoh ?? '');
                const kuota = @json($kursus->kuota ?? '');
                const tarikhPendaftaran = @json($kursus->tarikh_pendaftaran?->format('d M Y') ?? 'Sila Rujuk Pegawai Kami');
                const printTheme = @json($detailPrintTheme);

                const printHtml = `<!DOCTYPE html>
                    <html lang="ms">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Cetak Informasi Kursus</title>
                        <style>
                            @page {
                                size: auto;
                                margin: 8mm 8mm 8mm 8mm;
                                margin-header: 0mm;
                                margin-footer: 0mm;
                            }
                            * { box-sizing: border-box; }
                            html, body {
                                margin: 0;
                                padding: 0;
                                background: #ffffff;
                                color: #0f172a;
                                font-family: Arial, Helvetica, sans-serif;
                            }
                            body {
                                padding: 0;
                                margin: 0;
                            }
                            .course-print-page {
                                width: 100%;
                                max-width: 1000px;
                                margin: 0 auto;
                                padding: 0;
                            }
                            .course-print-hero {
                                margin: 0 0 12px;
                                border-radius: 22px;
                                overflow: hidden;
                                background: linear-gradient(135deg, #f59e0b 0%, #f97316 28%, #ea580c 100%);
                                box-shadow: 0 14px 28px rgba(249,115,22,0.16);
                            }
                            .course-print-hero__content {
                                position: relative;
                                display: flex;
                                min-height: 240px;
                            }
                            .course-print-hero__body {
                                flex: 1;
                                padding: 16px 18px 14px;
                                color: #fff;
                                z-index: 2;
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                            }
                            .course-print-hero__badge-row {
                                display: flex;
                                flex-wrap: wrap;
                                gap: 8px;
                                margin-bottom: 8px;
                            }
                            .course-print-hero__badge {
                                display: inline-flex;
                                align-items: center;
                                padding: 6px 10px;
                                border: 1px solid rgba(255,255,255,0.8);
                                border-radius: 999px;
                                font-size: 10px;
                                letter-spacing: 0.12em;
                                font-weight: 800;
                                text-transform: uppercase;
                                background: rgba(255,255,255,0.08);
                            }
                            .course-print-hero__institute {
                                margin: 0 0 8px;
                                font-size: 12px;
                                font-weight: 700;
                                letter-spacing: 0.04em;
                                opacity: 0.95;
                            }
                            .course-print-hero__title {
                                margin: 0 0 10px;
                                font-size: 40px;
                                line-height: 1;
                                font-weight: 900;
                                letter-spacing: -0.02em;
                                color: #fff;
                                max-width: 640px;
                            }
                            .course-print-hero__meta {
                                display: flex;
                                flex-wrap: wrap;
                                gap: 8px 14px;
                                font-size: 12px;
                                line-height: 1.5;
                                font-weight: 700;
                                opacity: 0.95;
                                margin-bottom: 0;
                            }
                            .course-print-hero__meta span {
                                display: inline-flex;
                                align-items: center;
                                gap: 6px;
                            }
                            .course-print-hero__cta {
                                display: inline-block;
                                background: rgba(255,255,255,0.96);
                                color: #c2410c;
                                border-radius: 999px;
                                padding: 12px 22px;
                                font-weight: 800;
                                font-size: 15px;
                                box-shadow: 0 10px 22px rgba(15,23,42,0.08);
                            }
                            .course-print-hero__visual {
                                position: relative;
                                width: 35%;
                                min-width: 230px;
                                background: rgba(15,23,42,0.10);
                            }
                            .course-print-hero__visual::before {
                                content: "";
                                position: absolute;
                                inset: 0;
                                background-image: url('${heroImage}');
                                background-size: cover;
                                background-position: center;
                                filter: saturate(1.05) contrast(1.04);
                                opacity: 0.9;
                            }
                            .course-print-section {
                                margin: 0 0 20px;
                                padding: 18px 18px 12px;
                                border: 1px solid #e5e7eb;
                                border-radius: 18px;
                                background: white;
                                box-shadow: 0 8px 18px rgba(15,23,42,0.04);
                                page-break-inside: avoid;
                                break-inside: avoid;
                                page-break-after: always;
                            }
                            .course-print-section:last-child { page-break-after: auto; }
                            .course-print-section > h2 {
                                margin: 0 0 18px;
                                padding-bottom: 10px;
                                border-bottom: 2px solid rgba(234,88,12,0.15);
                                color: #ea580c;
                                font-size: 24px;
                                font-weight: 800;
                                text-align: center;
                            }
                            .course-print-section .kursus-tab-title,
                            .course-print-section .kursus-tab-accent-strong { display: none !important; }
                            .course-print-section p,
                            .course-print-section li,
                            .course-print-section span,
                            .course-print-section strong,
                            .course-print-section em,
                            .course-print-section td,
                            .course-print-section th,
                            .course-print-section div {
                                color: #0f172a;
                                line-height: 1.6;
                                word-wrap: break-word;
                            }
                            .course-print-section .grid {
                                display: grid !important;
                                gap: 12px;
                                grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
                            }
                            .course-print-section .space-y-3,
                            .course-print-section .space-y-4,
                            .course-print-section .space-y-6 {
                                display: block !important;
                                gap: 6px;
                            }
                            .course-print-section .space-y-3 > div,
                            .course-print-section .space-y-4 > div,
                            .course-print-section .space-y-6 > div,
                            .course-print-section [data-pilihan-item],
                            .course-print-section [data-asrama-item],
                            .course-print-section .rounded-3xl,
                            .course-print-section .rounded-2xl {
                                display: block;
                                width: 100%;
                                border: 1px solid #e2e8f0;
                                border-radius: 12px;
                                background: #fff;
                                padding: 8px 10px;
                                margin: 0 0 6px;
                                box-shadow: none;
                            }
                            .course-print-section .rounded-3xl,
                            .course-print-section .rounded-2xl,
                            .course-print-section [data-yuran-section] {
                                page-break-inside: avoid;
                                break-inside: avoid;
                            }
                            .course-print-section [data-yuran-section] {
                                border: 1px solid #e2e8f0;
                                border-radius: 18px;
                                background: #fff;
                                overflow: hidden;
                            }
                            .course-print-section [data-yuran-section] > div:first-child,
                            .course-print-section [data-yuran-section] > .flex,
                            .course-print-section [data-yuran-section] > .grid {
                                display: flex !important;
                                justify-content: space-between;
                                align-items: center;
                                gap: 12px;
                                padding: 14px 16px;
                                background: #f8fafc;
                                border-bottom: 1px solid #e2e8f0;
                            }
                            .course-print-section [data-yuran-section] [data-total-yuran],
                            .course-print-section [data-total-yuran],
                            .course-print-section [data-pilihan-total-display],
                            .course-print-section [data-asrama-total-display] {
                                font-size: 18px;
                                font-weight: 800;
                                color: #111827;
                            }
                            .course-print-section .flex {
                                display: flex !important;
                                align-items: center;
                                justify-content: space-between;
                                gap: 10px;
                            }
                            .course-print-section .inline-flex {
                                display: inline-flex !important;
                                align-items: center;
                                justify-content: center;
                            }
                            .course-print-section img,
                            .course-print-section video {
                                max-width: 100%;
                                height: auto;
                                display: block;
                                border-radius: 12px;
                                margin: 10px auto 14px;
                                text-align: center;
                            }
                            .course-print-section figure,
                            .course-print-section .image-wrapper,
                            .course-print-section .gallery-item {
                                margin: 0 auto 12px;
                                text-align: center;
                            }
                            .course-print-section--kerjaya-two-images {
                                padding: 14px 14px 16px;
                            }
                            .course-print-section--kerjaya-two-images > h2 {
                                margin-bottom: 14px;
                            }
                            .course-print-section--kerjaya-two-images .kursus-tab-section {
                                padding: 0 !important;
                                border: 0 !important;
                            }
                            .course-print-section--kerjaya-two-images .grid {
                                display: grid !important;
                                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                                gap: 12px !important;
                                align-items: stretch;
                            }
                            .course-print-section--kerjaya-two-images .kursus-tab-card,
                            .course-print-section--kerjaya-two-images .rounded-3xl,
                            .course-print-section--kerjaya-two-images .rounded-2xl {
                                display: flex !important;
                                align-items: center;
                                justify-content: center;
                                width: 100%;
                                aspect-ratio: 2 / 1;
                                padding: 0 !important;
                                margin: 0 !important;
                                border-radius: 12px;
                                overflow: hidden;
                            }
                            .course-print-section--kerjaya-two-images img {
                                width: 100% !important;
                                max-width: none !important;
                                height: 100% !important;
                                margin: 0 !important;
                                border-radius: 10px !important;
                                object-fit: contain !important;
                            }
                            @media print {
                                body { background: #fff !important; }
                                .course-print-section { box-shadow: none !important; }
                            }
                        </style>
                    </head>
                    <body>
                        <div class="course-print-page">
                            <section class="course-print-hero">
                                <div class="course-print-hero__content">
                                    <div class="course-print-hero__body">
                                        <div class="course-print-hero__badge-row">
                                            <span class="course-print-hero__badge">${programType}</span>
                                            <span class="course-print-hero__badge">${modPengajian}</span>
                                        </div>
                                        <div class="course-print-hero__institute">${institutionName}</div>
                                        <h1 class="course-print-hero__title">${courseName}</h1>
                                        <div class="course-print-hero__meta">
                                            <span># ${courseCode}</span>
                                            <span>${tempoh}</span>
                                            <span>Kuota ${kuota}</span>
                                            <span>Daftar ${tarikhPendaftaran}</span>
                                        </div>
                                    </div>
                                    <div class="course-print-hero__visual" aria-hidden="true"></div>
                                </div>
                            </section>
                            ${sections.map(section => `
                                <section class="course-print-section ${section.printClass}">
                                    <h2>${section.title}</h2>
                                    ${section.html}
                                </section>
                            `).join('')}
                        </div>
                    </body>
                    </html>`;

                printWindow.document.open();
                printWindow.document.write(printHtml);
                printWindow.document.close();
                printWindow.focus();
                setTimeout(() => printWindow.print(), 600);
            }).catch((error) => {
                console.error('Print course error:', error);
                printWindow.document.write('<p>Error printing course details.</p>');
                printWindow.document.close();
                printWindow.focus();
            });
        }

        function loadTab(tab) {
            currentTab = tab;
            const tabContent = document.getElementById('tab-content');
            const tabLinks = document.querySelectorAll('.tab-link');

            tabLinks.forEach(link => {
                link.classList.remove('is-active');
                if (link.dataset.tab === tab) {
                    link.classList.add('is-active');
                }
            });

            const tabUrls = {
                maklumat: "{{ route('pelajar.tab.maklumat', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}",
                syarat: "{{ route('pelajar.tab.syarat', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}",
                kerjaya: "{{ route('pelajar.tab.kerjaya', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}",
                yuran: "{{ route('pelajar.tab.yuran', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}",
                galeri: "{{ route('pelajar.tab.galeri', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}"
            };

            fetch(tabUrls[tab], {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                }
            })
            .then(response => response.text())
            .then(html => {
                tabContent.innerHTML = html;
                runLoadedScripts(tabContent);
                initializeLoadedYuran(tabContent);
                // Re-bind lightbox for dynamically loaded content
                if (window.lightbox) {
                    window.lightbox.bindImages();
                }
            })
            .catch(error => {
                console.error('Error loading tab:', error);
                tabContent.innerHTML = '<p class="text-red-500 p-6">Error loading content.</p>';
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            loadTab('maklumat');
        });
    </script>

    @include('components.social-float')
</body>
</html>

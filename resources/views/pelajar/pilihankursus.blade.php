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
                radial-gradient(circle at 12% 14%, rgba(216, 180, 254, 0.28), transparent 26%),
                radial-gradient(circle at 84% 18%, rgba(125, 211, 252, 0.24), transparent 24%),
                radial-gradient(circle at 68% 72%, rgba(244, 114, 182, 0.16), transparent 22%),
                linear-gradient(135deg, #f7ecff 0%, #f7f2ff 22%, #eef5ff 54%, #fdf2ff 100%);
        }

        .pilihan-page::before,
        .pilihan-page::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .pilihan-page::before {
            background:
                radial-gradient(circle at 20% 28%, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0) 34%),
                radial-gradient(circle at 82% 36%, rgba(255, 255, 255, 0.42), rgba(255, 255, 255, 0) 28%),
                radial-gradient(circle at 38% 82%, rgba(var(--pilihan-accent-rgb-soft), 0.14), rgba(var(--pilihan-accent-rgb-soft), 0) 24%);
            filter: blur(10px);
            opacity: 0.95;
        }

        .pilihan-page::after {
            background:
                repeating-linear-gradient(120deg, rgba(139, 92, 246, 0.05) 0 1px, transparent 1px 90px),
                repeating-linear-gradient(30deg, rgba(59, 130, 246, 0.035) 0 1px, transparent 1px 120px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.42), rgba(0, 0, 0, 0.08));
        }

        .pilihan-shell {
            position: relative;
            isolation: isolate;
        }

        .pilihan-page--tvet,
        .pilihan-shell--tvet {
            --pilihan-accent-100: #fff2ec;
            --pilihan-accent-500: #FF5100;
            --pilihan-accent-600: #CC4100;
            --pilihan-accent-700: #993100;
            --pilihan-accent-rgb: 255, 81, 0;
            --pilihan-accent-rgb-soft: 255, 130, 60;
            --pilihan-gradient-start: #ff7a38;
            --pilihan-gradient-end: #FF5100;
            --pilihan-surface-soft: rgba(255, 242, 236, 0.84);
            --pilihan-surface-strong: rgba(255, 230, 210, 0.94);
            --pilihan-chip-bg: rgba(255, 81, 0, 0.92);
            --pilihan-soft-label: rgba(255, 230, 210, 0.95);
            --pilihan-live-bg: rgba(255, 242, 236, 0.94);
            --pilihan-live-text: #CC4100;
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
                radial-gradient(circle at 30% 30%, rgba(192, 132, 252, 0.22), rgba(192, 132, 252, 0) 58%),
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
            background: radial-gradient(circle, rgba(125, 211, 252, 0.42), rgba(255, 255, 255, 0));
            filter: blur(18px);
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

        .pilihan-hero-layout {
            position: relative;
            margin-bottom: 4rem;
        }

        .pilihan-hero-banner {
            position: relative;
            min-height: clamp(24rem, 48vw, 32rem);
            border-radius: 2rem;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.42);
            box-shadow: 0 40px 100px rgba(76, 29, 149, 0.18), 0 20px 52px rgba(15, 23, 42, 0.12);
            transform-style: preserve-3d;
        }

        .pilihan-hero-banner::before {
            content: "";
            position: absolute;
            inset: 1.15rem;
            border-radius: 1.35rem;
            border: 1px solid rgba(255, 255, 255, 0.18);
            z-index: 2;
            pointer-events: none;
        }

        .pilihan-hero-copy {
            position: relative;
            z-index: 4;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            max-width: min(34rem, 100%);
        }

        .pilihan-hero-copy h1 {
            font-size: clamp(2.5rem, 5vw, 4.75rem);
            line-height: 0.94;
            letter-spacing: -0.05em;
        }

        .pilihan-hero-subtitle {
            max-width: 36rem;
            color: rgba(255, 255, 255, 0.86);
            font-size: clamp(1rem, 2vw, 1.15rem);
            line-height: 1.8;
        }

        .pilihan-filter-floating {
            position: relative;
            z-index: 5;
            width: min(78rem, calc(100% - 2rem));
            margin: 1.5rem auto 0;
        }

        .pilihan-filter-card {
            border: 1px solid rgba(255, 255, 255, 0.58);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.76), rgba(255, 255, 255, 0.56));
            box-shadow: 0 28px 64px rgba(15, 23, 42, 0.12), inset 0 1px 0 rgba(255, 255, 255, 0.78);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(24px) saturate(1.15);
        }

        .pilihan-filter-grid {
            display: grid;
            gap: 1.25rem 1rem;
            align-items: end;
            grid-template-columns: minmax(16rem, 1.15fr) repeat(2, minmax(12rem, 1fr)) minmax(16rem, 1.1fr);
        }

        .pilihan-filter-intro {
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
            padding-right: 1rem;
            justify-content: center;
        }

        .pilihan-filter-field {
            display: flex;
            flex-direction: column;
            gap: 0.55rem;
            min-width: 0;
        }

        .pilihan-filter-field--mod {
            justify-content: center;
        }

        .pilihan-hero-media {
            position: relative;
            overflow: hidden;
            min-height: clamp(24rem, 48vw, 32rem);
            border: 0;
            background: #ffffff;
            box-shadow: none;
            transition: transform 0.35s ease, box-shadow 0.35s ease;
            transform: translate3d(var(--hero-shift-x, 0px), var(--hero-shift-y, 0px), 0);
            will-change: transform;
        }

        .pilihan-hero-media::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 0;
            border: 0;
            pointer-events: none;
            z-index: 1;
        }

        .pilihan-hero-media::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg, rgba(15, 23, 42, 0.06) 0%, rgba(15, 23, 42, 0.18) 34%, rgba(15, 23, 42, 0.72) 72%, rgba(15, 23, 42, 0.92) 100%),
                linear-gradient(135deg, rgba(124, 58, 237, 0.16), rgba(15, 23, 42, 0));
            pointer-events: none;
        }

        .pilihan-hero-image {
            transition: transform 0.65s ease, filter 0.65s ease;
            transform: scale(var(--hero-image-scale, 1)) translate3d(var(--hero-image-x, 0px), var(--hero-image-y, 0px), 0);
            will-change: transform;
        }

        .pilihan-hero-media:hover {
            transform: translate3d(var(--hero-shift-x, 0px), calc(var(--hero-shift-y, 0px) - 6px), 0);
            box-shadow: none;
        }

        .pilihan-hero-media:hover .pilihan-hero-image {
            transform: scale(var(--hero-image-scale, 1.08)) translate3d(var(--hero-image-x, 0px), var(--hero-image-y, 0px), 0);
            filter: saturate(1.06);
        }

        .pilihan-hero-card-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            pointer-events: none;
            background:
                radial-gradient(circle at var(--hero-glow-x, 75%) var(--hero-glow-y, 24%), rgba(255, 255, 255, 0.22), transparent 22%),
                linear-gradient(180deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0));
            opacity: 0.9;
        }

        .pilihan-hero-card-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
            padding: clamp(1.75rem, 3vw, 3rem);
            padding-bottom: clamp(4rem, 9vw, 6.5rem);
            justify-content: flex-end;
            min-height: 100%;
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

        .pilihan-filter-card::before {
            content: "";
            position: absolute;
            inset: auto -3rem -3rem auto;
            width: 10rem;
            height: 10rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(var(--pilihan-accent-rgb-soft), 0.16), rgba(var(--pilihan-accent-rgb-soft), 0));
            pointer-events: none;
        }

        .pilihan-filter-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 34px 72px rgba(15, 23, 42, 0.15);
        }

        .pilihan-select {
            border: 1px solid rgba(226, 232, 240, 0.92);
            background: rgba(248, 250, 252, 0.72);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.82);
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            min-height: 3.5rem;
        }

        .pilihan-select:hover,
        .pilihan-select:focus {
            transform: translateY(-1px);
            border-color: rgba(139, 92, 246, 0.34);
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.08), 0 14px 28px rgba(139, 92, 246, 0.12);
            outline: none;
            background: rgba(255, 255, 255, 0.94);
        }

        .pilihan-mod-btn {
            border: 1px solid rgba(226, 232, 240, 0.92);
            background: rgba(255, 255, 255, 0.82);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.74);
            min-height: 3rem;
            min-width: 10rem;
            justify-content: center;
        }

        .pilihan-mod-btn:hover,
        .pilihan-mod-btn:focus-visible {
            transform: translateY(-2px);
            border-color: rgba(139, 92, 246, 0.34);
            color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.08), 0 12px 24px rgba(139, 92, 246, 0.12);
        }

        .pilihan-mod-btn.is-active {
            border-color: var(--pilihan-accent-500);
            background: linear-gradient(135deg, var(--pilihan-gradient-start), var(--pilihan-gradient-end));
            color: #ffffff;
            box-shadow: 0 16px 30px rgba(var(--pilihan-accent-rgb), 0.22);
        }

        .pilihan-results-intro {
            border: 1px solid rgba(226, 232, 240, 0.82);
            background: rgba(255, 255, 255, 0.86);
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.05);
            backdrop-filter: blur(14px);
            animation: pilihanFadeUp 0.7s ease both;
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
            animation: pilihanFadeUp 0.7s ease both;
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
            transform: translateY(-10px) scale(1.015);
            border-color: rgba(var(--pilihan-accent-rgb-soft), 0.32);
            box-shadow:
                0 30px 60px rgba(15, 23, 42, 0.12),
                0 0 28px rgba(139, 92, 246, 0.16);
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
            max-width: 34rem;
        }

        .pilihan-hero-facts {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .pilihan-hero-fact {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            padding: 0.75rem 1rem;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.24);
            background: rgba(15, 23, 42, 0.26);
            color: #ffffff;
            backdrop-filter: blur(10px);
            box-shadow: 0 16px 32px rgba(15, 23, 42, 0.18);
        }

        .pilihan-hero-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.9rem 1.2rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.24);
            color: #ffffff;
            font-weight: 700;
            letter-spacing: 0.01em;
            backdrop-filter: blur(10px);
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.18);
            opacity: 0;
            transform: translateY(14px);
            transition: opacity 0.3s ease, transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .pilihan-hero-media:hover .pilihan-hero-cta,
        .pilihan-hero-media:focus-within .pilihan-hero-cta {
            opacity: 1;
            transform: translateY(0);
        }

        .pilihan-hero-cta:hover {
            background: rgba(255, 255, 255, 0.24);
            box-shadow: 0 22px 42px rgba(15, 23, 42, 0.24);
        }

        .pilihan-section-anchor {
            animation: pilihanFadeUp 0.8s ease both;
        }

        @keyframes pilihanFadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .pilihan-status-badge {
            transition: transform 0.28s ease, box-shadow 0.28s ease, color 0.28s ease, border-color 0.28s ease;
        }

        .pilihan-status-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(var(--pilihan-accent-rgb), 0.1);
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

        @media (max-width: 1279px) {
            .pilihan-hero-layout {
                margin-bottom: 4rem;
            }

            .pilihan-hero-banner,
            .pilihan-hero-media {
                min-height: clamp(32rem, 72vw, 42rem);
            }

            .pilihan-filter-floating {
                width: calc(100% - 2rem);
                margin-top: 1rem;
            }

            .pilihan-hero-card-content {
                padding-bottom: 2.5rem;
            }

            .pilihan-hero-facts,
            .pilihan-hero-cta {
                display: none;
            }

            .pilihan-filter-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .pilihan-filter-intro,
            .pilihan-filter-field--mod {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 640px) {
            .pilihan-hero-media {
                min-height: 26rem;
                transform: none !important;
            }

            .pilihan-hero-layout {
                margin-top: 1.25rem;
            }

            .pilihan-hero-image {
                transform: none !important;
            }

            .pilihan-hero-copy h1 {
                font-size: 2.2rem;
            }

            .pilihan-hero-card-content {
                padding: 1.5rem;
                padding-bottom: 7.5rem;
            }

            .pilihan-filter-floating {
                width: calc(100% - 1rem);
                margin-top: 1rem;
            }

            .pilihan-filter-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .pilihan-mod-btn {
                min-width: 0;
                width: 100%;
            }

            .pilihan-hero-facts {
                gap: 0.5rem;
            }

            .pilihan-hero-fact {
                width: 100%;
                justify-content: center;
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
    @include('layouts.navpelajar')

    <main class="flex-grow">
        <section class="pilihan-shell {{ $pilihanProgramType === 'tvet' ? 'pilihan-shell--tvet' : '' }} {{ $pilihanProgramType === 'diploma' ? 'pilihan-shell--diploma' : '' }} {{ $pilihanProgramType === 'sains kesihatan' ? 'pilihan-shell--sains-kesihatan' : '' }} max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12" id="pilihan-kursus-page" data-filter-url="{{ route('pelajar.filter', ['pelajar' => $pelajar->id, 'nama' => $namaKursus]) }}">

            <div class="flex flex-wrap items-center gap-3 mb-4">
                <button type="button" onclick="window.history.back()"
                    class="pilihan-back-btn inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold text-slate-700">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </button>
            </div>
            
            <div class="pilihan-hero-layout pilihan-section-anchor">
                <div class="pilihan-hero-media pilihan-hero-banner group" data-hero-card>
                    <div class="absolute left-5 top-5 z-10">
                        <span class="pilihan-image-badge inline-flex rounded-full border border-white/30 bg-white/14 px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.26em] text-white">Kursus Pilihan</span>
                    </div>
                    <div class="pilihan-hero-card-overlay"></div>
                    <div class="absolute inset-0 z-10 text-white">
                        <div class="pilihan-hero-card-content">
                            <span class="pilihan-kicker inline-block px-4 py-1.5 text-xs font-bold tracking-widest uppercase rounded-full">
                                Program Pendidikan
                            </span>
                            <div class="pilihan-hero-copy">
                                <h1 class="font-extrabold">{{ $namaKursus }}</h1>
                                <p class="pilihan-hero-subtitle">{{ $selectedDescription }}</p>
                            </div>
                            <div class="pilihan-hero-facts">
                                <span class="pilihan-hero-fact text-sm font-semibold">
                                    <i class="fa-solid fa-building-columns text-white/90"></i>
                                    {{ $semuaKursus->count() }} penawaran
                                </span>
                                <span class="pilihan-hero-fact text-sm font-semibold">
                                    <i class="fa-solid fa-layer-group text-white/90"></i>
                                    {{ $pilihanKnownTypes->count() ?: 1 }} kategori institusi
                                </span>
                                <span class="pilihan-hero-fact text-sm font-semibold">
                                    <i class="fa-solid fa-shield-check text-white/90"></i>
                                    Institusi bertauliah
                                </span>
                            </div>
                            <a href="#institusiResults" class="pilihan-hero-cta">
                                View Program
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pilihan-hero-glow absolute -inset-1 rounded-[2rem] blur opacity-20 group-hover:opacity-40 transition duration-700"></div>
                    <div class="relative h-full rounded-[2rem] overflow-hidden">
                        <img src="{{ asset($heroImage) }}"
                             alt="{{ $namaKursus }}"
                             class="pilihan-hero-image w-full h-full min-h-[20rem] sm:min-h-[26rem] object-cover">
                    </div>
                </div>

                <div class="pilihan-filter-floating">
                    <div class="pilihan-filter-card rounded-[1.75rem] p-5 sm:p-6 lg:p-7">
                        <div class="pilihan-filter-grid">
                            <div class="pilihan-filter-intro">
                                <p class="pilihan-theme-accent text-xs font-bold uppercase tracking-[0.28em]">Carian Pantas</p>
                                <h2 class="text-2xl font-bold text-slate-900">Tapis institusi dengan pantas</h2>
                                <p class="text-sm leading-7 text-slate-500">Bandingkan jenis program, tempoh pengajian dan mod yang paling sesuai dalam satu bar terapung.</p>
                            </div>

                            <div class="pilihan-filter-field">
                                <label class="block text-sm font-semibold text-slate-700">Jenis Program</label>
                                <select id="jenis-kursus-filter" name="jenis_kursus"
                                    class="pilihan-select w-full rounded-2xl px-4 py-3">
                                    <option value="">Semua Jenis</option>
                                    @foreach($jenisKursusOptions as $jenis)
                                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="pilihan-filter-field">
                                <label class="block text-sm font-semibold text-slate-700">Tempoh Pengajian</label>
                                <select id="tempoh-filter" name="tempoh"
                                    class="pilihan-select w-full rounded-2xl px-4 py-3">
                                    <option value="">Semua Tempoh</option>
                                    @foreach($tempohOptions as $tempoh)
                                        <option value="{{ $tempoh }}">{{ $tempoh }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="pilihan-filter-field pilihan-filter-field--mod">
                                <label class="block text-sm font-semibold text-slate-700">Mod Pengajian</label>
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
                @include('pelajar._pilihankursus_institusi')
            </div>
        </section>
    </main>

    @include('components.social-float')

    {{-- 🔹 FOOTER (FULL WIDTH) --}}
    <footer class="w-full mt-auto">
        @include('layouts.footer-pelajar')
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const page = document.getElementById('pilihan-kursus-page');
            if (!page) return;

            const filterUrl = page.dataset.filterUrl;
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

            const heroCard = page.querySelector('[data-hero-card]');
            const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

            if (heroCard && canHover) {
                heroCard.addEventListener('mousemove', function (event) {
                    const rect = heroCard.getBoundingClientRect();
                    const offsetX = event.clientX - rect.left;
                    const offsetY = event.clientY - rect.top;
                    const shiftX = ((offsetX / rect.width) - 0.5) * 10;
                    const shiftY = ((offsetY / rect.height) - 0.5) * 10;
                    const imageX = ((offsetX / rect.width) - 0.5) * -8;
                    const imageY = ((offsetY / rect.height) - 0.5) * -8;

                    heroCard.style.setProperty('--hero-shift-x', `${shiftX}px`);
                    heroCard.style.setProperty('--hero-shift-y', `${shiftY}px`);
                    heroCard.style.setProperty('--hero-image-x', `${imageX}px`);
                    heroCard.style.setProperty('--hero-image-y', `${imageY}px`);
                    heroCard.style.setProperty('--hero-image-scale', '1.08');
                    heroCard.style.setProperty('--hero-glow-x', `${(offsetX / rect.width) * 100}%`);
                    heroCard.style.setProperty('--hero-glow-y', `${(offsetY / rect.height) * 100}%`);
                });

                heroCard.addEventListener('mouseleave', function () {
                    heroCard.style.setProperty('--hero-shift-x', '0px');
                    heroCard.style.setProperty('--hero-shift-y', '0px');
                    heroCard.style.setProperty('--hero-image-x', '0px');
                    heroCard.style.setProperty('--hero-image-y', '0px');
                    heroCard.style.setProperty('--hero-image-scale', '1');
                    heroCard.style.setProperty('--hero-glow-x', '75%');
                    heroCard.style.setProperty('--hero-glow-y', '24%');
                });
            }
        });
    </script>
</body>
</html>


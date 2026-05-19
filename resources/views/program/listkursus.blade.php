<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Senarai Kursus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
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

        .kursus-page--tvet {
            background:
                url('/images/TVET-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(241, 207, 99, 0.18), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .kursus-page--diploma {
            background:
                url('/images/DIP-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(192, 132, 252, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(99, 102, 241, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .kursus-page--sains-kesihatan {
            background:
                url('/images/SK-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(96, 165, 250, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(33, 150, 243, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
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
            --kursus-hero-soft-text: rgba(255, 220, 200, 0.92);
            --kursus-hero-button-text: #CC4100;
            --kursus-hero-image: url('/images/tvet-vg2.jpeg');
            --kursus-hero-image-tint: rgba(255, 81, 0, 0.46);
            --kursus-hero-image-shade: rgba(139, 34, 0, 0.72);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.84);
            background:
                 linear-gradient(120deg, #8B2200 0%, #FF5100 42%, #ff7a38 100%);
            box-shadow:
                0 28px 72px rgba(15, 23, 42, 0.14),
                 0 0 72px rgba(255, 81, 0, 0.24),
                inset 0 1px 0 rgba(255, 255, 255, 0.26);
        }

        .kursus-hero--diploma {
            --kursus-hero-soft-text: rgba(243, 232, 255, 0.92);
            --kursus-hero-button-text: #7c3aed;
            --kursus-hero-image: url('/images/postgraduate-differences_sim-article.jpg');
            --kursus-hero-image-tint: rgba(124, 58, 237, 0.48);
            --kursus-hero-image-shade: rgba(91, 42, 134, 0.72);
            background:
                linear-gradient(120deg, #5b2a86 0%, #7c3aed 44%, #c084fc 100%);
            box-shadow:
                0 28px 72px rgba(15, 23, 42, 0.14),
                0 0 72px rgba(124, 58, 237, 0.28),
                inset 0 1px 0 rgba(255, 255, 255, 0.26);
        }

        .kursus-hero--sains-kesihatan {
            --kursus-hero-soft-text: rgba(219, 234, 254, 0.92);
            --kursus-hero-button-text: #2563eb;
            --kursus-hero-image: url('/images/sains.jpg');
            --kursus-hero-image-tint: rgba(37, 99, 235, 0.42);
            --kursus-hero-image-shade: rgba(15, 61, 145, 0.72);
            background:
                linear-gradient(120deg, #0f3d91 0%, #2563eb 44%, #60a5fa 100%);
            box-shadow:
                0 28px 72px rgba(15, 23, 42, 0.14),
                0 0 72px rgba(37, 99, 235, 0.28),
                inset 0 1px 0 rgba(255, 255, 255, 0.26);
        }

        .kursus-hero--diploma::before {
            box-shadow:
                0 0 36px rgba(216, 180, 254, 0.4),
                0 0 0 18px rgba(255, 255, 255, 0.08),
                0 0 0 40px rgba(255, 255, 255, 0.04);
        }

        .kursus-hero--sains-kesihatan::before {
            box-shadow:
                0 0 36px rgba(147, 197, 253, 0.4),
                0 0 0 18px rgba(255, 255, 255, 0.08),
                0 0 0 40px rgba(255, 255, 255, 0.04);
        }

        .kursus-hero--diploma::after {
            box-shadow: 0 0 42px rgba(192, 132, 252, 0.34);
        }

        .kursus-hero--sains-kesihatan::after {
            box-shadow: 0 0 42px rgba(96, 165, 250, 0.34);
        }

        .kursus-hero::before,
        .kursus-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: 1;
        }

        .kursus-hero > :not(.kursus-hero-image) {
            position: relative;
            z-index: 2;
        }

        .kursus-hero-image {
            position: absolute;
            inset: 0 0 0 34%;
            z-index: 0;
            background:
                linear-gradient(90deg, rgba(91, 42, 134, 0) 0%, var(--kursus-hero-image-tint) 34%, rgba(15, 23, 42, 0.12) 100%),
                var(--kursus-hero-image) center / cover no-repeat;
            opacity: 0.72;
            filter: saturate(1.08) contrast(1.02);
            -webkit-mask-image: linear-gradient(90deg, transparent 0%, rgba(0, 0, 0, 0.08) 10%, rgba(0, 0, 0, 0.72) 32%, #000 100%);
            mask-image: linear-gradient(90deg, transparent 0%, rgba(0, 0, 0, 0.08) 10%, rgba(0, 0, 0, 0.72) 32%, #000 100%);
            pointer-events: none;
        }

        .kursus-hero-image::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, var(--kursus-hero-image-shade) 0%, rgba(15, 23, 42, 0.2) 44%, rgba(15, 23, 42, 0.18) 100%),
                radial-gradient(circle at 70% 30%, rgba(255, 255, 255, 0.28), transparent 34%);
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
            color: var(--kursus-hero-button-text);
            border: 1px solid rgba(255, 255, 255, 0.74);
            box-shadow:
                0 0 0 6px rgba(255, 255, 255, 0.14),
                0 0 34px rgba(255, 166, 0, 0.28),
                0 16px 36px rgba(15, 23, 42, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .kursus-hero-soft-text {
            color: var(--kursus-hero-soft-text);
        }

        .kursus-results-layout {
            --kursus-accent-500: #f97316;
            --kursus-accent-600: #ea580c;
            --kursus-accent-700: #c2410c;
            --kursus-accent-border: rgba(251, 146, 60, 0.18);
            --kursus-accent-border-strong: rgba(251, 146, 60, 0.22);
            --kursus-accent-soft: rgba(255, 247, 237, 0.92);
            --kursus-accent-soft-strong: linear-gradient(135deg, rgba(255, 247, 237, 0.96), rgba(255, 237, 213, 0.86));
            --kursus-accent-shadow: rgba(249, 115, 22, 0.1);
            --kursus-card-chip-bg: rgba(249, 115, 22, 0.94);
            --kursus-card-chip-text: #ffffff;
            --kursus-card-pill-bg: rgba(255, 255, 255, 0.92);
            --kursus-card-pill-text: #c2410c;
            --kursus-card-overlay: rgba(249, 115, 22, 0.3);
            --kursus-card-hover-border: rgba(251, 146, 60, 0.34);
            --kursus-card-hover-glow: rgba(251, 146, 60, 0.12);
            --kursus-card-title-hover: #ea580c;
            --kursus-card-arrow-bg: #fff7ed;
            --kursus-card-arrow-text: #ea580c;
            --kursus-card-arrow-hover-bg: #f97316;
            --kursus-card-arrow-hover-text: #ffffff;
            --kursus-card-meta-border: rgba(251, 146, 60, 0.12);
            --kursus-card-meta-bg: rgba(255, 247, 237, 0.8);
            --kursus-card-cta-bg: #f97316;
            --kursus-card-cta-hover: #ea580c;
            --kursus-card-cta-shadow: rgba(249, 115, 22, 0.18);
            --kursus-card-cta-glow: rgba(255, 166, 0, 0.12);
            display: grid;
            gap: 1.5rem;
            grid-template-columns: minmax(0, 1fr);
        }

        .kursus-results-layout--diploma {
            --kursus-accent-500: #8b5cf6;
            --kursus-accent-600: #7c3aed;
            --kursus-accent-700: #6d28d9;
            --kursus-accent-border: rgba(124, 58, 237, 0.18);
            --kursus-accent-border-strong: rgba(124, 58, 237, 0.22);
            --kursus-accent-soft: rgba(245, 243, 255, 0.92);
            --kursus-accent-soft-strong: linear-gradient(135deg, rgba(245, 243, 255, 0.96), rgba(233, 213, 255, 0.86));
            --kursus-accent-shadow: rgba(124, 58, 237, 0.1);
            --kursus-card-chip-bg: rgba(124, 58, 237, 0.94);
            --kursus-card-pill-text: #6d28d9;
            --kursus-card-overlay: rgba(124, 58, 237, 0.28);
            --kursus-card-hover-border: rgba(124, 58, 237, 0.34);
            --kursus-card-hover-glow: rgba(124, 58, 237, 0.14);
            --kursus-card-title-hover: #7c3aed;
            --kursus-card-arrow-bg: #f5f3ff;
            --kursus-card-arrow-text: #7c3aed;
            --kursus-card-arrow-hover-bg: #8b5cf6;
            --kursus-card-meta-border: rgba(124, 58, 237, 0.14);
            --kursus-card-meta-bg: rgba(245, 243, 255, 0.82);
            --kursus-card-cta-bg: #8b5cf6;
            --kursus-card-cta-hover: #7c3aed;
            --kursus-card-cta-shadow: rgba(124, 58, 237, 0.2);
            --kursus-card-cta-glow: rgba(192, 132, 252, 0.14);
        }

        .kursus-results-layout--tvet {
            --kursus-accent-500: #FF5100;
            --kursus-accent-600: #CC4100;
            --kursus-accent-700: #993100;
            --kursus-accent-border: rgba(255, 81, 0, 0.2);
            --kursus-accent-border-strong: rgba(255, 81, 0, 0.26);
            --kursus-accent-soft: rgba(255, 242, 236, 0.94);
            --kursus-accent-soft-strong: linear-gradient(135deg, rgba(255, 242, 236, 0.98), rgba(255, 210, 185, 0.82));
            --kursus-accent-shadow: rgba(255, 81, 0, 0.14);
            --kursus-card-chip-bg: rgba(255, 81, 0, 0.96);
            --kursus-card-pill-text: #993100;
            --kursus-card-overlay: rgba(255, 81, 0, 0.28);
            --kursus-card-hover-border: rgba(255, 81, 0, 0.34);
            --kursus-card-hover-glow: rgba(255, 81, 0, 0.14);
            --kursus-card-title-hover: #CC4100;
            --kursus-card-arrow-bg: #fff2ec;
            --kursus-card-arrow-text: #CC4100;
            --kursus-card-arrow-hover-bg: #FF5100;
            --kursus-card-meta-border: rgba(255, 81, 0, 0.16);
            --kursus-card-meta-bg: rgba(255, 242, 236, 0.84);
            --kursus-card-cta-bg: #FF5100;
            --kursus-card-cta-hover: #CC4100;
            --kursus-card-cta-shadow: rgba(255, 81, 0, 0.2);
            --kursus-card-cta-glow: rgba(255, 130, 60, 0.16);
        }

        .kursus-results-layout--sains-kesihatan {
            --kursus-accent-500: #3b82f6;
            --kursus-accent-600: #2563eb;
            --kursus-accent-700: #1d4ed8;
            --kursus-accent-border: rgba(37, 99, 235, 0.18);
            --kursus-accent-border-strong: rgba(37, 99, 235, 0.22);
            --kursus-accent-soft: rgba(239, 246, 255, 0.92);
            --kursus-accent-soft-strong: linear-gradient(135deg, rgba(239, 246, 255, 0.96), rgba(219, 234, 254, 0.86));
            --kursus-accent-shadow: rgba(37, 99, 235, 0.1);
            --kursus-card-chip-bg: rgba(37, 99, 235, 0.94);
            --kursus-card-pill-text: #1d4ed8;
            --kursus-card-overlay: rgba(37, 99, 235, 0.28);
            --kursus-card-hover-border: rgba(37, 99, 235, 0.34);
            --kursus-card-hover-glow: rgba(37, 99, 235, 0.14);
            --kursus-card-title-hover: #2563eb;
            --kursus-card-arrow-bg: #eff6ff;
            --kursus-card-arrow-text: #2563eb;
            --kursus-card-arrow-hover-bg: #3b82f6;
            --kursus-card-meta-border: rgba(37, 99, 235, 0.14);
            --kursus-card-meta-bg: rgba(239, 246, 255, 0.84);
            --kursus-card-cta-bg: #3b82f6;
            --kursus-card-cta-hover: #2563eb;
            --kursus-card-cta-shadow: rgba(37, 99, 235, 0.2);
            --kursus-card-cta-glow: rgba(96, 165, 250, 0.16);
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
            align-items: flex-start;
            width: 100%;
            border: 1px solid transparent;
            background: transparent;
            color: #475569;
            line-height: 1.45;
            text-align: left;
        }

        .category-name {
            min-width: 0;
            white-space: normal;
            overflow-wrap: break-word;
            word-break: normal;
            line-height: 1.45;
        }

        .category-btn:hover {
            border-color: var(--kursus-accent-border);
            background: var(--kursus-accent-soft);
            color: var(--kursus-accent-600);
        }

        .category-btn.is-active {
            border-color: var(--kursus-accent-border-strong);
            background: var(--kursus-accent-soft-strong);
            color: var(--kursus-accent-700);
            box-shadow: 0 14px 28px var(--kursus-accent-shadow);
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
            border-color: var(--kursus-accent-500);
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
            background: var(--kursus-accent-500);
        }

        .kursus-section-accent {
            color: var(--kursus-accent-500);
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

        .kursus-course-slider {
            position: relative;
        }

        .kursus-slider-nav {
            position: absolute;
            left: 0;
            right: 0;
            bottom: -1.15rem;
            z-index: 20;
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            pointer-events: none;
        }

        .kursus-slider-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3.2rem;
            height: 3.2rem;
            border-radius: 999px;
            border: 1px solid var(--kursus-accent-border-strong);
            background: rgba(255, 255, 255, 0.96);
            color: var(--kursus-accent-600);
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.12);
            pointer-events: auto;
            transition: transform 0.28s ease, opacity 0.28s ease, background-color 0.28s ease;
        }

        .kursus-slider-button:hover {
            transform: translateY(-2px);
            background: #ffffff;
        }

        .kursus-slider-button:disabled {
            cursor: not-allowed;
            opacity: 0.38;
            transform: none;
        }

        .kursus-results-grid {
            overflow-x: auto;
            scroll-behavior: smooth;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
            -ms-overflow-style: none;
            padding: 0 7vw 2.8rem;
        }

        .kursus-results-grid::-webkit-scrollbar {
            display: none;
        }

        .kursus-results-track {
            display: flex;
            align-items: stretch;
            gap: 1rem;
            width: max-content;
        }

        .course-card {
            position: relative;
            display: flex;
            flex-direction: column;
            flex: 0 0 min(86vw, 22rem);
            width: min(86vw, 22rem);
            height: auto;
            min-height: 32rem;
            align-self: stretch;
            scroll-snap-align: center;
            scroll-snap-stop: always;
            overflow: hidden;
            isolation: isolate;
            border: 1px solid rgba(255, 255, 255, 0.88);
            border-radius: 2rem;
            background: #0f172a;
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
                radial-gradient(circle at bottom left, var(--kursus-accent-border), transparent 26%);
            opacity: 0;
            z-index: 1;
            transition: opacity 0.28s ease;
            pointer-events: none;
        }

        .course-card:hover {
            border-color: var(--kursus-card-hover-border);
            box-shadow:
                0 30px 68px rgba(15, 23, 42, 0.12),
                0 0 30px var(--kursus-card-hover-glow),
                inset 0 1px 0 rgba(255, 255, 255, 0.92);
        }

        .course-card:hover::before {
            opacity: 1;
        }

        @media (prefers-reduced-motion: no-preference) {
            [data-reveal] {
                opacity: 0 !important;
                transition:
                    opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 0.85s cubic-bezier(0.16, 1, 0.3, 1) !important;
                will-change: opacity, transform;
            }

            [data-reveal="up"] { transform: translateY(52px) scale(0.97) !important; }
            [data-reveal="left"] { transform: translateX(-64px) scale(0.97) !important; }
            [data-reveal="right"] { transform: translateX(64px) scale(0.97) !important; }
            [data-reveal="scale"] { transform: translateY(24px) scale(0.88) !important; }

            [data-reveal].revealed {
                opacity: 1 !important;
                transform: none !important;
            }

            [data-delay="1"] { transition-delay: 0.12s !important; }
            [data-delay="2"] { transition-delay: 0.24s !important; }
            [data-delay="3"] { transition-delay: 0.36s !important; }
            [data-delay="4"] { transition-delay: 0.48s !important; }
            [data-delay="5"] { transition-delay: 0.60s !important; }
            [data-delay="6"] { transition-delay: 0.72s !important; }

            .course-card[data-reveal].revealed:hover {
                transform: translateY(-2px) !important;
            }

            @media (min-width: 1024px) {
                [data-reveal="up"] { transform: translateY(28px) scale(0.985) !important; }
                [data-reveal="left"] { transform: translateX(-28px) scale(0.985) !important; }
                [data-reveal="right"] { transform: translateX(28px) scale(0.985) !important; }
                [data-reveal="scale"] { transform: translateY(14px) scale(0.95) !important; }

                [data-delay="1"] { transition-delay: 0.06s !important; }
                [data-delay="2"] { transition-delay: 0.12s !important; }
                [data-delay="3"] { transition-delay: 0.18s !important; }
                [data-delay="4"] { transition-delay: 0.24s !important; }
                [data-delay="5"] { transition-delay: 0.30s !important; }
                [data-delay="6"] { transition-delay: 0.36s !important; }
            }
        }

        .course-card-media {
            position: absolute;
            inset: 0 0 11% 0;
            z-index: 0;
            overflow: hidden;
        }

        .course-card-media::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
            background:
                linear-gradient(180deg, rgba(15, 23, 42, 0.03) 0%, rgba(15, 23, 42, 0.2) 28%, rgba(15, 23, 42, 0.78) 78%, rgba(15, 23, 42, 0.95) 100%),
                linear-gradient(130deg, var(--kursus-card-overlay), rgba(15, 23, 42, 0));
            pointer-events: none;
        }

        .course-card-image {
            position: absolute;
            inset: 0;
            z-index: 0;
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.05);
            transition: transform 0.6s ease, filter 0.6s ease;
        }

        .course-card-media > :not(.course-card-image) {
            z-index: 2;
        }

        .course-card:hover .course-card-image {
            transform: scale(1.08);
            filter: saturate(1.06);
        }

        .course-card-body {
            position: relative;
            z-index: 2;
            height: auto !important;
            min-height: 44%;
            margin-top: auto;
            justify-content: flex-end;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0) 0%, rgba(15, 23, 42, 0.86) 32%, rgba(15, 23, 42, 0.97) 100%);
            color: #fff;
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
            background: var(--kursus-card-chip-bg);
            color: var(--kursus-card-chip-text);
        }

        .kursus-pill {
            background: var(--kursus-card-pill-bg);
            color: var(--kursus-card-pill-text);
        }

        html.dark .kursus-pill--tahap {
            background: #0f172a;
            color: #e2e8f0;
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow:
                0 10px 20px rgba(2, 6, 23, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.08);
        }

        html.dark .kursus-pill--kuota {
            background: #0f172a;
            color: #e2e8f0;
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow:
                0 10px 20px rgba(2, 6, 23, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.08);
        }

        .course-card-headline {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            min-height: 3.25rem;
        }

        .course-card-title {
            color: #fff;
            font-size: clamp(1.28rem, 1.08rem + 0.45vw, 1.65rem);
            font-weight: 800;
            line-height: 1.16;
            letter-spacing: 0;
            max-width: 100%;
            overflow-wrap: break-word;
            word-break: normal;
            hyphens: none;
            text-shadow: 0 2px 18px rgba(0, 0, 0, 0.44);
            transition: color 0.28s ease;
        }

        .course-card:hover .course-card-title {
            color: #fff;
        }

        .course-card-action {
            display: inline-flex;
            align-items: flex-start;
            flex-shrink: 0;
        }

        .course-card-quota {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 4.5rem;
            min-height: 4.5rem;
            padding: 0.85rem 1rem;
            border-radius: 1.25rem;
            background: linear-gradient(135deg, rgba(255, 115, 29, 0.96), rgba(255, 81, 0, 0.88));
            color: #fff7ed;
            text-align: center;
            box-shadow:
                0 14px 28px rgba(255, 81, 0, 0.28),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        .course-card-quota-label {
            display: block;
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            opacity: 0.82;
        }

        .course-card-quota-value {
            display: block;
            margin-top: 0.22rem;
            font-size: 1.25rem;
            font-weight: 800;
            line-height: 1;
        }

        .course-card-meta {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 0.85rem;
            align-items: stretch;
        }

        .course-card-meta-item {
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 1.15rem;
            background: rgba(15, 23, 42, 0.72);
            padding: 0.95rem 1.05rem;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
            min-width: 0;
            backdrop-filter: blur(10px);
        }

        .course-card-meta-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(226, 232, 240, 0.72);
        }

        .course-card-meta-value {
            margin-top: 0.4rem;
            color: #fff;
            font-weight: 500;
            line-height: 1.42;
            overflow-wrap: break-word;
            word-break: normal;
            hyphens: none;
        }

        .kursus-cta {
            background: var(--kursus-card-cta-bg);
            box-shadow:
                0 16px 34px var(--kursus-card-cta-shadow),
                0 0 28px var(--kursus-card-cta-glow),
                inset 0 1px 0 rgba(255, 255, 255, 0.18);
        }

        .kursus-cta:hover {
            background: var(--kursus-card-cta-hover);
        }

        .kursus-empty {
            border: 1px solid rgba(255, 255, 255, 0.86);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.92), rgba(255, 255, 255, 0.78));
            box-shadow:
                0 20px 44px rgba(15, 23, 42, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .kursus-results-track > .kursus-empty {
            flex: 0 0 min(86vw, 22rem);
            width: min(86vw, 22rem);
        }

        .kursus-clamp-2 {
            display: block;
            overflow: visible;
            -webkit-line-clamp: unset;
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

        @media (min-width: 768px) {
            .kursus-results-grid {
                overflow: visible;
                padding: 0;
                scroll-snap-type: none;
            }

            .kursus-results-track {
                display: grid;
                width: 100%;
                gap: 1.5rem;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .course-card {
                width: 100%;
                min-width: 0;
                flex: 1 1 auto;
                height: 100%;
            }

            .kursus-slider-nav {
                display: none;
            }

            .kursus-results-track > .kursus-empty {
                width: 100%;
                grid-column: 1 / -1;
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

        }

        @media (max-width: 767px) {
            .kursus-shell {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .kursus-hero {
                padding: 1.5rem;
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
        /* ── DARK MODE ── */
        html.dark .kursus-page {
            background:
                radial-gradient(circle at 8% 12%, rgba(251,146,60,0.08), transparent 22%),
                radial-gradient(circle at 88% 14%, rgba(59,130,246,0.06), transparent 22%),
                linear-gradient(180deg, #0f172a 0%, #1e293b 44%, #0f172a 100%);
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
        }
        html.dark .kursus-page--tvet {
            background:
                url('/images/TVET-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        html.dark .kursus-page--diploma {
            background:
                url('/images/DIP-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        html.dark .kursus-page--sains-kesihatan {
            background:
                url('/images/SK-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        html.dark .kursus-sidebar {
            background: rgba(15,23,42,0.94);
            border-color: rgba(255,255,255,0.08);
        }
        html.dark .kursus-sidebar-section-title { color: #f1f5f9; }
        html.dark .kursus-sidebar-search-input,
        html.dark .kursus-select {
            background: #1e293b;
            color: #e2e8f0;
            border-color: rgba(255,255,255,0.1);
        }
        html.dark .category-btn { color: #94a3b8; }
        html.dark .course-card {
            background: linear-gradient(180deg, rgba(30,41,59,0.98), rgba(15,23,42,0.98));
            border-color: rgba(255,255,255,0.08);
        }
        html.dark .course-card-title { color: #f1f5f9; }
        html.dark .course-card-meta-item {
            background: rgba(15, 23, 42, 0.85);
            border-color: rgba(255, 255, 255, 0.08);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.04);
        }
        html.dark .course-card-meta-value { color: #e2e8f0; }
        html.dark .course-card-meta-label { color: #64748b; }
        html.dark .kursus-results-summary {
            background: rgba(15,23,42,0.9);
            border-color: rgba(255,255,255,0.08);
            color: #e2e8f0;
        }
        html.dark .text-slate-900, html.dark .text-gray-800 { color: #f1f5f9 !important; }
        html.dark .text-slate-700 { color: #cbd5e1 !important; }
        html.dark .text-slate-500 { color: #94a3b8 !important; }
    </style>
</head>
@php
    $heroProgramType = strtolower((string) (request('jenis') ?? ($selectedProgram->jenis_program ?? '')));
    $kursusIsTvet = $heroProgramType === 'tvet';
    $kursusIsDiploma = $heroProgramType === 'diploma';
    $kursusIsSainsKesihatan = $heroProgramType === 'sains kesihatan';
    $showCourseCardQuotaColumn = !($kursusIsDiploma || $kursusIsSainsKesihatan);
    $heroProgramInfo = $selectedProgram->info_program ?? null;
    $displayCourseName = static function ($kursus): string {
        $rawName = strtoupper(trim((string) ($kursus->nama_kursus ?? '')));
        $displayName = trim((string) ($kursus->nama_kursus_paparan ?? ''));

        if ($rawName !== '' && str_starts_with($rawName, 'DIPLOMA ') && !str_starts_with(strtoupper($displayName), 'DIPLOMA ')) {
            return $rawName;
        }

        return $displayName;
    };

    if ($kursusIsTvet) {
        $heroProgramInfo = 'TVET bermaksud Pendidikan dan Latihan Teknikal dan Vokasional. Ia adalah sistem pendidikan yang fokus kepada latihan praktikal dan kemahiran teknikal, bertujuan menyediakan tenaga kerja berkemahiran tinggi yang selari dengan permintaan industri.';
    }
@endphp
<body class="kursus-page no-bg {{ $kursusIsTvet ? 'kursus-page--tvet' : '' }} {{ $kursusIsDiploma ? 'kursus-page--diploma' : '' }} {{ $kursusIsSainsKesihatan ? 'kursus-page--sains-kesihatan' : '' }} text-gray-800 transition-colors duration-300">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="kursus-shell max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10">
        <div class="kursus-hero {{ $heroProgramType === 'diploma' ? 'kursus-hero--diploma' : '' }} {{ $heroProgramType === 'sains kesihatan' ? 'kursus-hero--sains-kesihatan' : '' }} rounded-[2rem] p-6 sm:p-8 text-white mb-8" data-reveal="up">
            <div class="kursus-hero-image" aria-hidden="true"></div>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <p class="text-xs sm:text-sm uppercase tracking-[0.16em] text-white/75 font-semibold">Terokai Program</p>
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
                        <p class="kursus-hero-soft-text mt-3 text-lg max-w-3xl">Menunjukkan padanan untuk "{{ request('search') }}" merentasi semua kursus{{ request('jenis') ? ' dalam kategori ' . request('jenis') : '' }}.</p>
                    @elseif(isset($selectedProgram) && $selectedProgram)
                        <p class="kursus-hero-soft-text mt-3 text-lg max-w-3xl">{{ $heroProgramInfo }}</p>
                    @else
                        <p class="kursus-hero-soft-text mt-3 text-lg">Cari dan jelajahi kursus yang sesuai dengan minat anda.</p>
                    @endif

                    <div class="mt-6 flex flex-wrap gap-3 text-sm">
                        <span class="inline-flex items-center rounded-full bg-white/16 px-4 py-2 font-semibold text-white/90 backdrop-blur">
                            <i class="fas fa-layer-group mr-2 text-xs"></i>{{ $kursusList->unique('kumpulan_kursus_key')->count() }} kursus 
                        </span>
                    </div>

                </div>
            </div>
        </div>

        <div class="kursus-results-layout {{ $heroProgramType === 'diploma' ? 'kursus-results-layout--diploma' : '' }} {{ $heroProgramType === 'tvet' ? 'kursus-results-layout--tvet' : '' }} {{ $heroProgramType === 'sains kesihatan' ? 'kursus-results-layout--sains-kesihatan' : '' }}">
            
            <aside class="kursus-sidebar-wrap" data-reveal="left" data-delay="1">
                <div class="kursus-sidebar rounded-3xl p-6">
                    <div class="relative z-10">
                        <h3 class="kursus-sidebar-section-title text-lg font-bold mb-4">
                            <i class="fas fa-list-ul mr-2 kursus-section-accent"></i>Pilihan Program
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

                            @foreach($kursusList->sortBy('nama_kursus_paparan')->unique('kumpulan_kursus_key') as $kursus)
                                @php $courseDisplayName = $displayCourseName($kursus); @endphp
                                <button 
                                    type="button"
                                    onclick="filterCourses('{{ addslashes($courseDisplayName) }}')"
                                    class="category-btn flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium"
                                    id="btn-{{ Illuminate\Support\Str::slug($courseDisplayName, '-') }}"
                                >
                                    <span class="category-indicator"></span>
                                    <span class="category-name">{{ $courseDisplayName }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>

            <main class="kursus-results-panel min-w-0" data-reveal="right" data-delay="2">

                <div class="kursus-course-slider" data-kursus-slider>
                    <div class="kursus-slider-nav" data-kursus-slider-nav>
                        <button type="button" class="kursus-slider-button" data-kursus-slider-action="prev" aria-label="Kursus sebelumnya">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <button type="button" class="kursus-slider-button" data-kursus-slider-action="next" aria-label="Kursus seterusnya">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                    <div id="courses-container" class="kursus-results-grid" data-kursus-slider-row>
                        <div class="kursus-results-track" data-kursus-slider-track>
                    @forelse($kursusList->sortBy('nama_kursus_paparan')->unique('kumpulan_kursus_key')->values() as $kursus)
                    @php
                        $galleryImage = optional($kursus->galeris->first())->imej ?? 'images/default-college.jpg';
                        $courseDisplayName = $displayCourseName($kursus);
                    @endphp
                    @php
                        $institusiTypeLabel = strtolower(trim((string) ($kursus->institusi->jenis_institusi ?? '')));
                        $jenisKursusLabel = strtolower(trim((string) ($kursus->jenis_kursus ?? '')));
                        $showJenisKursusPill = $jenisKursusLabel !== '' && $jenisKursusLabel !== $institusiTypeLabel;
                    @endphp
                    <article class="course-card h-full"
                             data-reveal="scale"
                             data-delay="{{ ($loop->index % 6) + 1 }}"
                             data-course-name="{{ $courseDisplayName }}"
                             onclick="window.location.href='{{ route('kursus.showByName', array_filter(['nama' => urlencode($courseDisplayName), 'jenis' => request('jenis')])) }}'">
                        <div class="course-card-media">
                            <img src="{{ asset($galleryImage) }}" alt="{{ $courseDisplayName }}" class="course-card-image" onerror="this.onerror=null;this.src='{{ asset('images/default-college.jpg') }}';">
                            <div class="absolute inset-x-0 top-4 px-4 flex items-start justify-between gap-3 z-10">
                                <span class="kursus-tag px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.22em]">{{ $kursus->institusi->jenis_institusi ?? 'Program' }}</span>
                                <div class="flex flex-wrap items-center justify-end gap-2 max-w-[75%]">
                                </div>
                            </div>
                        </div>

                        <div class="course-card-body p-6 sm:p-7 flex flex-col gap-5 h-full">
                            <div class="course-card-headline">
                                <div>
                                    <p class="kursus-section-accent text-[0.7rem] font-semibold uppercase tracking-[0.28em]">Kursus</p>
                                    <h2 class="course-card-title mt-2 kursus-clamp-2">{{ $courseDisplayName }}</h2>
                                </div>
                                @if($showCourseCardQuotaColumn)
                                    <div class="course-card-action">
                                        <span class="course-card-quota">
                                            <span>
                                                <span class="course-card-quota-label">Kuota</span>
                                                <span class="course-card-quota-value">{{ $kursus->kuota ?? '-' }}</span>
                                            </span>
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <div class="course-card-meta">
                                <div class="course-card-meta-item">
                                    <p class="course-card-meta-label">{{ $showCourseCardQuotaColumn ? 'Tahap' : 'Kuota' }}</p>
                                    <p class="course-card-meta-value">{{ $showCourseCardQuotaColumn ? ($showJenisKursusPill ? $kursus->jenis_kursus : 'Tidak dinyatakan') : ($kursus->kuota ?? '-') }}</p>
                                </div>
                            </div>

                            <button class="kursus-cta inline-flex items-center justify-center w-full rounded-full px-6 py-3 text-sm font-semibold text-white shadow-lg mt-auto text-center">
                                <span>Paparan {{ ($kursusIsDiploma || $kursusIsSainsKesihatan) ? 'Institusi' : 'Pusat Bertauliah' }}</span>
                            </button>
                        </div>
                    </article>
                    @empty
                    <div class="kursus-empty rounded-3xl p-10 text-center text-gray-500 shadow-sm">
                        <p>Tiada kursus ditemui.</p>
                    </div>
                    @endforelse
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

    <script>
        function filterCourses(courseName) {
            const container = document.querySelector('[data-kursus-slider-track]') || document.getElementById('courses-container');
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

            window.updateKursusSliders?.();
        }

        function initKursusSliders() {
            document.querySelectorAll('[data-kursus-slider-row]').forEach((sliderRow) => {
                const slider = sliderRow.closest('[data-kursus-slider]');
                const track = slider?.querySelector('[data-kursus-slider-track]');
                const nav = slider?.querySelector('[data-kursus-slider-nav]');
                const prevButton = slider?.querySelector('[data-kursus-slider-action="prev"]');
                const nextButton = slider?.querySelector('[data-kursus-slider-action="next"]');

                if (!slider || !track || !nav || !prevButton || !nextButton) {
                    return;
                }

                const getVisibleCards = () => Array.from(track.querySelectorAll('.course-card')).filter((card) => card.style.display !== 'none');

                const getStepSize = () => {
                    const firstCard = getVisibleCards()[0];
                    if (!firstCard) {
                        return sliderRow.clientWidth * 0.85;
                    }

                    const gap = parseFloat(window.getComputedStyle(track).gap || '0');
                    return firstCard.getBoundingClientRect().width + gap;
                };

                const updateState = () => {
                    const maxScroll = Math.max(0, sliderRow.scrollWidth - sliderRow.clientWidth);
                    const hasOverflow = maxScroll > 8 && getVisibleCards().length > 1;
                    nav.hidden = !hasOverflow || window.innerWidth >= 768;
                    prevButton.disabled = sliderRow.scrollLeft <= 4;
                    nextButton.disabled = sliderRow.scrollLeft >= maxScroll - 4;
                };

                const moveSlider = (direction) => {
                    sliderRow.scrollBy({
                        left: direction * getStepSize(),
                        behavior: 'smooth',
                    });
                };

                prevButton.addEventListener('click', () => moveSlider(-1));
                nextButton.addEventListener('click', () => moveSlider(1));
                sliderRow.addEventListener('scroll', updateState, { passive: true });
                window.addEventListener('resize', updateState);
                sliderRow._updateKursusSlider = updateState;
                updateState();
            });
        }

        window.updateKursusSliders = () => {
            document.querySelectorAll('[data-kursus-slider-row]').forEach((sliderRow) => {
                sliderRow.scrollLeft = 0;
                sliderRow._updateKursusSlider?.();
            });
        };

        document.addEventListener('DOMContentLoaded', initKursusSliders);

        function initKursusScrollReveal() {
            const revealEls = document.querySelectorAll('[data-reveal]');

            if (!revealEls.length) {
                return;
            }

            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) {
                revealEls.forEach((el) => el.classList.add('revealed'));
                return;
            }

            const isDesktop = window.matchMedia('(min-width: 1024px)').matches;
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    } else {
                        entry.target.classList.remove('revealed');
                    }
                });
            }, {
                threshold: isDesktop ? 0.01 : 0.12,
                rootMargin: isDesktop ? '0px 0px 35% 0px' : '0px 0px -56px 0px',
            });

            revealEls.forEach((el) => observer.observe(el));
        }

        document.addEventListener('DOMContentLoaded', initKursusScrollReveal);

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

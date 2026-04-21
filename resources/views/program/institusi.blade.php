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

        .institusi-page--tvet,
        .institusi-shell--tvet {
            --institusi-tvet-50: #fffbea;
            --institusi-tvet-100: #fef3c7;
            --institusi-tvet-500: #d4af37;
            --institusi-tvet-600: #b88912;
            --institusi-tvet-700: #8a6a08;
            --institusi-tvet-rgb: 212, 175, 55;
            --institusi-tvet-rgb-soft: 241, 207, 99;
            --institusi-tvet-soft-text: rgba(255, 248, 214, 0.92);
        }

        .institusi-page--diploma,
        .institusi-shell--diploma {
            --institusi-diploma-50: #f7efff;
            --institusi-diploma-100: #ede0ff;
            --institusi-diploma-500: #8d2be2;
            --institusi-diploma-600: #7a1fd1;
            --institusi-diploma-700: #6216aa;
            --institusi-diploma-rgb: 141, 43, 226;
            --institusi-diploma-rgb-soft: 192, 132, 252;
            --institusi-diploma-soft-text: rgba(245, 237, 255, 0.92);
        }

        .institusi-page--sains-kesihatan,
        .institusi-shell--sains-kesihatan {
            --institusi-sains-50: #edf7ff;
            --institusi-sains-100: #dbeafe;
            --institusi-sains-500: #2196f3;
            --institusi-sains-600: #1d4ed8;
            --institusi-sains-700: #1e40af;
            --institusi-sains-rgb: 33, 150, 243;
            --institusi-sains-rgb-soft: 96, 165, 250;
            --institusi-sains-soft-text: rgba(235, 245, 255, 0.94);
        }

        .institusi-page--tvet {
            background:
                radial-gradient(circle at 8% 12%, rgba(var(--institusi-tvet-rgb-soft), 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.08), transparent 24%),
                linear-gradient(180deg, #fffaf5 0%, #f8fafc 44%, #f6f8fc 100%);
        }

        .institusi-page--diploma {
            background:
                radial-gradient(circle at 8% 12%, rgba(var(--institusi-diploma-rgb-soft), 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(99, 102, 241, 0.08), transparent 24%),
                linear-gradient(180deg, #fcf8ff 0%, #f8fafc 44%, #f6f8fc 100%);
        }

        .institusi-page--sains-kesihatan {
            background:
                radial-gradient(circle at 8% 12%, rgba(var(--institusi-sains-rgb-soft), 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(14, 165, 233, 0.08), transparent 24%),
                linear-gradient(180deg, #f5fbff 0%, #f8fafc 44%, #f6f8fc 100%);
        }

        .institusi-page--tvet .institusi-hero {
            background: linear-gradient(90deg, #a87408 0%, #f1cf63 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(var(--institusi-tvet-rgb), 0.3),
                0 0 130px rgba(var(--institusi-tvet-rgb-soft), 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

            .institusi-page--diploma .institusi-hero {
                background: linear-gradient(90deg, #6d1fb7 0%, #b56cff 100%);
                box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(var(--institusi-diploma-rgb), 0.3),
                0 0 130px rgba(var(--institusi-diploma-rgb-soft), 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
            }

        .institusi-page--sains-kesihatan .institusi-hero {
            background: linear-gradient(90deg, #0f5fd7 0%, #5cc8ff 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(var(--institusi-sains-rgb), 0.3),
                0 0 130px rgba(var(--institusi-sains-rgb-soft), 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .institusi-page--tvet .institusi-hero-button {
            color: var(--institusi-tvet-600);
            box-shadow:
                0 0 0 6px rgba(255, 255, 255, 0.14),
                0 0 34px rgba(var(--institusi-tvet-rgb), 0.28),
                0 16px 36px rgba(15, 23, 42, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

            .institusi-page--diploma .institusi-hero-button {
                color: var(--institusi-diploma-600);
                box-shadow:
                0 0 0 6px rgba(255, 255, 255, 0.14),
                0 0 34px rgba(var(--institusi-diploma-rgb), 0.28),
                0 16px 36px rgba(15, 23, 42, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            }

        .institusi-page--sains-kesihatan .institusi-hero-button {
            color: var(--institusi-sains-600);
            box-shadow:
                0 0 0 6px rgba(255, 255, 255, 0.14),
                0 0 34px rgba(var(--institusi-sains-rgb), 0.28),
                0 16px 36px rgba(15, 23, 42, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .institusi-page--tvet .institusi-toolbar {
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(255, 250, 245, 0.92)),
                linear-gradient(120deg, rgba(var(--institusi-tvet-rgb), 0.06), rgba(var(--institusi-tvet-rgb-soft), 0.08));
        }

        .institusi-page--diploma .institusi-toolbar {
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(251, 247, 255, 0.92)),
                linear-gradient(120deg, rgba(var(--institusi-diploma-rgb), 0.06), rgba(var(--institusi-diploma-rgb-soft), 0.08));
        }

        .institusi-page--sains-kesihatan .institusi-toolbar {
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(245, 251, 255, 0.92)),
                linear-gradient(120deg, rgba(var(--institusi-sains-rgb), 0.06), rgba(var(--institusi-sains-rgb-soft), 0.08));
        }

        .institusi-page--tvet .institusi-toolbar::after {
            background: radial-gradient(circle, rgba(var(--institusi-tvet-rgb), 0.18), rgba(var(--institusi-tvet-rgb), 0));
        }

        .institusi-page--diploma .institusi-toolbar::after {
            background: radial-gradient(circle, rgba(var(--institusi-diploma-rgb), 0.18), rgba(var(--institusi-diploma-rgb), 0));
        }

        .institusi-page--sains-kesihatan .institusi-toolbar::after {
            background: radial-gradient(circle, rgba(var(--institusi-sains-rgb), 0.18), rgba(var(--institusi-sains-rgb), 0));
        }

        .institusi-page--tvet .institusi-filter-select:hover,
        .institusi-page--tvet .institusi-filter-select:focus {
            border-color: rgba(var(--institusi-tvet-rgb), 0.4);
            box-shadow: 0 16px 32px rgba(var(--institusi-tvet-rgb), 0.12);
        }

        .institusi-page--diploma .institusi-filter-select:hover,
        .institusi-page--diploma .institusi-filter-select:focus {
            border-color: rgba(var(--institusi-diploma-rgb), 0.4);
            box-shadow: 0 16px 32px rgba(var(--institusi-diploma-rgb), 0.12);
        }

        .institusi-page--sains-kesihatan .institusi-filter-select:hover,
        .institusi-page--sains-kesihatan .institusi-filter-select:focus {
            border-color: rgba(var(--institusi-sains-rgb), 0.4);
            box-shadow: 0 16px 32px rgba(var(--institusi-sains-rgb), 0.12);
        }

        .institusi-page--tvet .institusi-filter-button:hover,
        .institusi-page--tvet .institusi-filter-button:focus-visible {
            box-shadow: 0 14px 28px rgba(var(--institusi-tvet-rgb), 0.14);
        }

        .institusi-page--diploma .institusi-filter-button:hover,
        .institusi-page--diploma .institusi-filter-button:focus-visible {
            box-shadow: 0 14px 28px rgba(var(--institusi-diploma-rgb), 0.14);
        }

        .institusi-page--sains-kesihatan .institusi-filter-button:hover,
        .institusi-page--sains-kesihatan .institusi-filter-button:focus-visible {
            box-shadow: 0 14px 28px rgba(var(--institusi-sains-rgb), 0.14);
        }

        .institusi-filter-button--active-tvet {
            background: var(--institusi-tvet-500);
            border-color: var(--institusi-tvet-500);
            color: #ffffff;
        }

        .institusi-filter-button--active-diploma {
            background: var(--institusi-diploma-500);
            border-color: var(--institusi-diploma-500);
            color: #ffffff;
        }

        .institusi-filter-button--active-sains-kesihatan {
            background: var(--institusi-sains-500);
            border-color: var(--institusi-sains-500);
            color: #ffffff;
        }

        .institusi-filter-button--active-tvet:hover {
            background: var(--institusi-tvet-600);
            border-color: var(--institusi-tvet-600);
        }

        .institusi-filter-button--active-diploma:hover {
            background: var(--institusi-diploma-600);
            border-color: var(--institusi-diploma-600);
        }

        .institusi-filter-button--active-sains-kesihatan:hover {
            background: var(--institusi-sains-600);
            border-color: var(--institusi-sains-600);
        }

        .institusi-filter-button--idle-tvet {
            background: #ffffff;
            border-color: rgba(var(--institusi-tvet-rgb), 0.34);
            color: var(--institusi-tvet-600);
        }

        .institusi-filter-button--idle-diploma {
            background: #ffffff;
            border-color: rgba(var(--institusi-diploma-rgb), 0.34);
            color: var(--institusi-diploma-600);
        }

        .institusi-filter-button--idle-sains-kesihatan {
            background: #ffffff;
            border-color: rgba(var(--institusi-sains-rgb), 0.34);
            color: var(--institusi-sains-600);
        }

        .institusi-filter-button--idle-tvet:hover {
            background: var(--institusi-tvet-50);
        }

        .institusi-filter-button--idle-diploma:hover {
            background: var(--institusi-diploma-50);
        }

        .institusi-filter-button--idle-sains-kesihatan:hover {
            background: var(--institusi-sains-50);
        }

        .institusi-page--tvet .institusi-card:hover,
        .institusi-page--tvet .institusi-card:focus-within {
            border-color: rgba(var(--institusi-tvet-rgb-soft), 0.38);
            box-shadow:
                0 30px 64px rgba(15, 23, 42, 0.14),
                0 0 32px rgba(var(--institusi-tvet-rgb-soft), 0.12);
        }

        .institusi-page--diploma .institusi-card:hover,
        .institusi-page--diploma .institusi-card:focus-within {
            border-color: rgba(var(--institusi-diploma-rgb-soft), 0.38);
            box-shadow:
                0 30px 64px rgba(15, 23, 42, 0.14),
                0 0 32px rgba(var(--institusi-diploma-rgb-soft), 0.12);
        }

        .institusi-page--sains-kesihatan .institusi-card:hover,
        .institusi-page--sains-kesihatan .institusi-card:focus-within {
            border-color: rgba(var(--institusi-sains-rgb-soft), 0.38);
            box-shadow:
                0 30px 64px rgba(15, 23, 42, 0.14),
                0 0 32px rgba(var(--institusi-sains-rgb-soft), 0.12);
        }

        .institusi-page--tvet .institusi-card-media::after {
            background:
                linear-gradient(180deg, rgba(15, 23, 42, 0.04), rgba(15, 23, 42, 0.72)),
                linear-gradient(130deg, rgba(var(--institusi-tvet-rgb), 0.36), rgba(15, 23, 42, 0));
        }

        .institusi-page--diploma .institusi-card-media::after {
            background:
                linear-gradient(180deg, rgba(15, 23, 42, 0.04), rgba(15, 23, 42, 0.72)),
                linear-gradient(130deg, rgba(var(--institusi-diploma-rgb), 0.36), rgba(15, 23, 42, 0));
        }

        .institusi-page--sains-kesihatan .institusi-card-media::after {
            background:
                linear-gradient(180deg, rgba(15, 23, 42, 0.04), rgba(15, 23, 42, 0.72)),
                linear-gradient(130deg, rgba(var(--institusi-sains-rgb), 0.36), rgba(15, 23, 42, 0));
        }

        .institusi-page--tvet .institusi-card-chip {
            border-color: rgba(var(--institusi-tvet-rgb-soft), 0.12);
            background: rgba(255, 251, 235, 0.84);
        }

        .institusi-page--diploma .institusi-card-chip {
            border-color: rgba(var(--institusi-diploma-rgb-soft), 0.12);
            background: rgba(247, 239, 255, 0.84);
        }

        .institusi-page--sains-kesihatan .institusi-card-chip {
            border-color: rgba(var(--institusi-sains-rgb-soft), 0.12);
            background: rgba(237, 247, 255, 0.88);
        }

        .institusi-page--tvet .institusi-card:hover .institusi-card-chip,
        .institusi-page--tvet .institusi-card:focus-within .institusi-card-chip {
            border-color: rgba(var(--institusi-tvet-rgb), 0.22);
            background: rgba(254, 243, 199, 0.95);
        }

        .institusi-page--diploma .institusi-card:hover .institusi-card-chip,
        .institusi-page--diploma .institusi-card:focus-within .institusi-card-chip {
            border-color: rgba(var(--institusi-diploma-rgb), 0.22);
            background: rgba(237, 224, 255, 0.95);
        }

        .institusi-page--sains-kesihatan .institusi-card:hover .institusi-card-chip,
        .institusi-page--sains-kesihatan .institusi-card:focus-within .institusi-card-chip {
            border-color: rgba(var(--institusi-sains-rgb), 0.22);
            background: rgba(219, 234, 254, 0.95);
        }

        .institusi-page--tvet .institusi-card:hover .institusi-card-arrow,
        .institusi-page--tvet .institusi-card:focus-within .institusi-card-arrow {
            background: var(--institusi-tvet-50);
            color: var(--institusi-tvet-600);
        }

        .institusi-page--diploma .institusi-card:hover .institusi-card-arrow,
        .institusi-page--diploma .institusi-card:focus-within .institusi-card-arrow {
            background: var(--institusi-diploma-50);
            color: var(--institusi-diploma-600);
        }

        .institusi-page--sains-kesihatan .institusi-card:hover .institusi-card-arrow,
        .institusi-page--sains-kesihatan .institusi-card:focus-within .institusi-card-arrow {
            background: var(--institusi-sains-50);
            color: var(--institusi-sains-600);
        }

        .institusi-page--tvet .institusi-card-link {
            color: var(--institusi-tvet-500);
        }

        .institusi-page--diploma .institusi-card-link {
            color: var(--institusi-diploma-500);
        }

        .institusi-page--sains-kesihatan .institusi-card-link {
            color: var(--institusi-sains-500);
        }

        .institusi-page--tvet .institusi-card:hover .institusi-card-link,
        .institusi-page--tvet .institusi-card:focus-within .institusi-card-link {
            color: var(--institusi-tvet-700);
        }

        .institusi-page--diploma .institusi-card:hover .institusi-card-link,
        .institusi-page--diploma .institusi-card:focus-within .institusi-card-link {
            color: var(--institusi-diploma-700);
        }

        .institusi-page--sains-kesihatan .institusi-card:hover .institusi-card-link,
        .institusi-page--sains-kesihatan .institusi-card:focus-within .institusi-card-link {
            color: var(--institusi-sains-700);
        }

        .institusi-soft-text-tvet {
            color: var(--institusi-tvet-soft-text);
        }

        .institusi-soft-text-diploma {
            color: var(--institusi-diploma-soft-text);
        }

        .institusi-soft-text-sains-kesihatan {
            color: var(--institusi-sains-soft-text);
        }

        .institusi-accent-tvet {
            color: var(--institusi-tvet-500);
        }

        .institusi-accent-diploma {
            color: var(--institusi-diploma-500);
        }

        .institusi-accent-sains-kesihatan {
            color: var(--institusi-sains-500);
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

        .institusi-results-slider {
            position: relative;
        }

        .institusi-slider-nav {
            position: absolute;
            inset: 50% 0 auto;
            z-index: 20;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transform: translateY(-50%);
            pointer-events: none;
            padding: 0 0.35rem;
        }

        .institusi-slider-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3.85rem;
            height: 3.85rem;
            font-size: 1.15rem;
            border-radius: 999px;
            border: 1px solid rgba(249, 115, 22, 0.2);
            background: rgba(255, 255, 255, 0.96);
            color: #f97316;
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease, color 0.25s ease, opacity 0.25s ease;
            pointer-events: auto;
        }

        .institusi-slider-button:hover,
        .institusi-slider-button:focus-visible {
            transform: translateY(-1px);
            border-color: rgba(249, 115, 22, 0.34);
            box-shadow: 0 16px 30px rgba(249, 115, 22, 0.16);
            outline: none;
        }

        .institusi-slider-button:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            box-shadow: none;
            transform: none;
        }

        .institusi-shell--tvet .institusi-slider-button {
            border-color: rgba(var(--institusi-tvet-rgb), 0.22);
            color: var(--institusi-tvet-600);
        }

        .institusi-shell--tvet .institusi-slider-button:hover,
        .institusi-shell--tvet .institusi-slider-button:focus-visible {
            border-color: rgba(var(--institusi-tvet-rgb), 0.38);
            box-shadow: 0 16px 30px rgba(var(--institusi-tvet-rgb), 0.18);
        }

        .institusi-shell--diploma .institusi-slider-button {
            border-color: rgba(var(--institusi-diploma-rgb), 0.22);
            color: var(--institusi-diploma-600);
        }

        .institusi-shell--diploma .institusi-slider-button:hover,
        .institusi-shell--diploma .institusi-slider-button:focus-visible {
            border-color: rgba(var(--institusi-diploma-rgb), 0.38);
            box-shadow: 0 16px 30px rgba(var(--institusi-diploma-rgb), 0.18);
        }

        .institusi-shell--sains-kesihatan .institusi-slider-button {
            border-color: rgba(var(--institusi-sains-rgb), 0.22);
            color: var(--institusi-sains-600);
        }

        .institusi-shell--sains-kesihatan .institusi-slider-button:hover,
        .institusi-shell--sains-kesihatan .institusi-slider-button:focus-visible {
            border-color: rgba(var(--institusi-sains-rgb), 0.38);
            box-shadow: 0 16px 30px rgba(var(--institusi-sains-rgb), 0.18);
        }

        .institusi-slider-row {
            position: relative;
            overflow-x: auto;
            overflow-y: visible;
            padding: 0.35rem 4.7rem 1rem;
            scroll-behavior: smooth;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
            -ms-overflow-style: none;
            -webkit-mask-image: linear-gradient(90deg, transparent 0, #000 5%, #000 95%, transparent 100%);
            mask-image: linear-gradient(90deg, transparent 0, #000 5%, #000 95%, transparent 100%);
        }

        .institusi-slider-row.is-looping {
            scroll-snap-type: none;
        }

        .institusi-slider-row::-webkit-scrollbar {
            display: none;
        }

        .institusi-slider-track {
            display: flex;
            width: max-content;
            gap: 1.5rem;
        }

        .institusi-slider-card {
            flex: 0 0 clamp(18rem, 29vw, 20.75rem);
            width: clamp(18rem, 29vw, 20.75rem);
            scroll-snap-align: start;
            scroll-snap-stop: always;
        }

        .institusi-slider-card .institusi-card-media {
            height: clamp(12rem, 17vw, 14rem);
        }

        .institusi-slider-card .institusi-clamp-3 {
            -webkit-line-clamp: 2;
        }

        @keyframes institusiContinuousSlide {
            from {
                transform: translate3d(0, 0, 0);
            }

            to {
                transform: translate3d(-50%, 0, 0);
            }
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

        @media (prefers-reduced-motion: reduce) {
            .institusi-slider-row {
                scroll-behavior: auto;
                -webkit-mask-image: none;
                mask-image: none;
            }
        }

        @media (max-width: 640px) {
            .institusi-slider-row {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .institusi-slider-nav {
                inset: auto 0 0.1rem;
                transform: none;
                justify-content: center;
                gap: 0.75rem;
                padding: 0;
            }

            .institusi-slider-button {
                width: 3.2rem;
                height: 3.2rem;
                font-size: 1rem;
                background: rgba(255, 255, 255, 0.98);
            }
        }
        /* ── DARK MODE ── */
        html.dark .institusi-page--tvet,
        html.dark .institusi-page--diploma,
        html.dark .institusi-page--sains-kesihatan {
            background:
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, #0f172a 0%, #1e293b 44%, #0f172a 100%);
        }
        html.dark .institusi-card {
            background: linear-gradient(180deg, rgba(30,41,59,0.98), rgba(15,23,42,0.98));
            border-color: rgba(255,255,255,0.08);
        }
        html.dark .institusi-toolbar {
            background: rgba(15,23,42,0.94) !important;
            border-color: rgba(255,255,255,0.08);
        }
        html.dark .institusi-filter-button--idle-tvet,
        html.dark .institusi-filter-button--idle-diploma,
        html.dark .institusi-filter-button--idle-sains-kesihatan {
            background: #1e293b;
            color: #cbd5e1;
        }
        html.dark .institusi-slider-button {
            background: rgba(30,41,59,0.96);
        }
        html.dark .institusi-filter-select {
            background: #1e293b;
            color: #e2e8f0;
            border-color: rgba(255,255,255,0.1);
        }
        html.dark .text-slate-900 { color: #f1f5f9 !important; }
        html.dark .text-slate-700 { color: #cbd5e1 !important; }
        html.dark .text-slate-500 { color: #94a3b8 !important; }
    </style>
</head>
@php
    $institusiProgramType = strtolower((string) ($jenis ?? request('jenis', '')));
    $institusiIsTvet = $institusiProgramType === 'tvet';
    $institusiIsDiploma = $institusiProgramType === 'diploma';
    $institusiIsSainsKesihatan = $institusiProgramType === 'sains kesihatan';
@endphp
<body class="institusi-page {{ $institusiIsTvet ? 'institusi-page--tvet' : '' }} {{ $institusiIsDiploma ? 'institusi-page--diploma' : '' }} {{ $institusiIsSainsKesihatan ? 'institusi-page--sains-kesihatan' : '' }} {{ ! $institusiIsTvet && ! $institusiIsDiploma && ! $institusiIsSainsKesihatan ? 'bg-gray-100' : '' }} text-gray-800">
    
    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="institusi-shell {{ $institusiIsTvet ? 'institusi-shell--tvet' : '' }} {{ $institusiIsDiploma ? 'institusi-shell--diploma' : '' }} {{ $institusiIsSainsKesihatan ? 'institusi-shell--sains-kesihatan' : '' }} max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10">
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
                    <p class="{{ $institusiIsTvet ? 'institusi-soft-text-tvet' : ($institusiIsDiploma ? 'institusi-soft-text-diploma' : ($institusiIsSainsKesihatan ? 'institusi-soft-text-sains-kesihatan' : 'text-orange-100')) }} mt-3 text-lg">Lihat semua institusi, lokasi mereka dan ringkasan fasiliti serta kursus yang ditawarkan.</p>
                </div>
                <div aria-hidden="true" class="institusi-hero-button flex items-center justify-center w-14 h-14 rounded-full bg-white {{ $institusiIsTvet || $institusiIsDiploma || $institusiIsSainsKesihatan ? '' : 'text-orange-600' }}">
                    <i class="fas fa-building"></i>
                </div>
            </div>
        </div>

        <div class="institusi-toolbar mb-8 rounded-3xl p-4 sm:p-5">
            <div class="relative z-10 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] {{ $institusiIsTvet ? 'institusi-accent-tvet' : ($institusiIsDiploma ? 'institusi-accent-diploma' : ($institusiIsSainsKesihatan ? 'institusi-accent-sains-kesihatan' : 'text-orange-500')) }}">Paparan Institusi</p>
                    <h2 class="mt-2 text-2xl text-slate-900">{{ $institusis->count() }} institusi dipaparkan</h2>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-end">
                    <form method="GET" class="flex w-full max-w-[520px] flex-col gap-3 sm:flex-row sm:items-center">
                        <label class="block w-full sm:min-w-[280px] sm:flex-1">
                            <span class="sr-only">Pilih negeri</span>
                            <select name="negeri" onchange="this.form.submit()" class="institusi-filter-select w-full rounded-full bg-white px-4 py-3 text-sm text-slate-700 focus:outline-none">
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
                        <button type="submit" name="kuota" value="{{ request('kuota') ? 0 : 1 }}" class="institusi-filter-button inline-flex items-center justify-center rounded-full border px-6 py-3 text-sm font-semibold transition {{ $institusiIsTvet ? (request('kuota') ? 'institusi-filter-button--active-tvet' : 'institusi-filter-button--idle-tvet') : ($institusiIsDiploma ? (request('kuota') ? 'institusi-filter-button--active-diploma' : 'institusi-filter-button--idle-diploma') : ($institusiIsSainsKesihatan ? (request('kuota') ? 'institusi-filter-button--active-sains-kesihatan' : 'institusi-filter-button--idle-sains-kesihatan') : (request('kuota') ? 'bg-orange-500 border-orange-500 text-white hover:bg-orange-600' : 'bg-white border-orange-300 text-orange-600 hover:bg-orange-50'))) }}">
                            {{ request('kuota') ? 'Kuota Aktif' : 'Tapis Kuota' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if($institusis->isEmpty())
            <div class="col-span-3 bg-white rounded-2xl p-8 text-center text-gray-500">
                Tiada institusi ditemui.
            </div>
        @else
            <div class="institusi-results-slider">
                <div class="institusi-slider-nav" data-slider-nav>
                    <button type="button" class="institusi-slider-button" data-slider-action="prev" aria-label="Institusi sebelumnya">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button type="button" class="institusi-slider-button" data-slider-action="next" aria-label="Institusi seterusnya">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <div class="institusi-slider-row" data-institusi-slider>
                    <div class="institusi-slider-track">
                        @foreach($institusis as $institusi)
                            <article class="institusi-slider-card institusi-card rounded-3xl flex flex-col h-full">
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
                                                <p class="text-[0.68rem] font-semibold uppercase tracking-[0.34em] {{ $institusiIsTvet ? 'institusi-soft-text-tvet' : ($institusiIsDiploma ? 'institusi-soft-text-diploma' : ($institusiIsSainsKesihatan ? 'institusi-soft-text-sains-kesihatan' : 'text-orange-100/90')) }}">Institusi</p>
                                                <h2 class="mt-2 text-2xl font-extrabold text-white">{{ $institusi->nama_institusi }}</h2>
                                            </div>
                                            <span class="institusi-card-arrow inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white/15 text-lg text-white">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-6 sm:p-7 flex flex-col flex-1">
                                        <div class="institusi-card-chip flex items-start gap-3 rounded-2xl px-4 py-3 text-sm text-slate-600">
                                            <i class="fas fa-map-marker-alt mt-0.5 {{ $institusiIsTvet ? 'institusi-accent-tvet' : ($institusiIsDiploma ? 'institusi-accent-diploma' : ($institusiIsSainsKesihatan ? 'institusi-accent-sains-kesihatan' : 'text-orange-500')) }}"></i>
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
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-institusi-slider]').forEach((sliderRow) => {
                const slider = sliderRow.closest('.institusi-results-slider');
                const sliderTrack = sliderRow.querySelector('.institusi-slider-track');
                const nav = slider?.querySelector('[data-slider-nav]');
                const prevButton = slider?.querySelector('[data-slider-action="prev"]');
                const nextButton = slider?.querySelector('[data-slider-action="next"]');

                if (!slider || !sliderTrack || !nav || !prevButton || !nextButton) {
                    return;
                }

                const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
                const originalCards = Array.from(sliderTrack.querySelectorAll('.institusi-slider-card'));
                const canLoop = originalCards.length > 1;
                const autoScrollSpeed = 32;
                const autoScrollResumeDelay = 1800;
                let loopWidth = 0;
                let animationFrameId = null;
                let lastFrameTime = 0;
                let resumeTimerId = null;

                const pauseAutoScroll = () => {
                    if (resumeTimerId) {
                        window.clearTimeout(resumeTimerId);
                        resumeTimerId = null;
                    }

                    if (animationFrameId !== null) {
                        window.cancelAnimationFrame(animationFrameId);
                        animationFrameId = null;
                    }

                    lastFrameTime = 0;
                };

                const createLoopClone = (card) => {
                    const clone = card.cloneNode(true);

                    clone.dataset.sliderClone = 'true';
                    clone.setAttribute('aria-hidden', 'true');
                    clone.querySelectorAll('a, button, input, select, textarea, [tabindex]').forEach((focusable) => {
                        focusable.setAttribute('tabindex', '-1');
                    });

                    return clone;
                };

                if (canLoop) {
                    const prependFragment = document.createDocumentFragment();
                    const appendFragment = document.createDocumentFragment();

                    originalCards.forEach((card) => {
                        prependFragment.appendChild(createLoopClone(card));
                        appendFragment.appendChild(createLoopClone(card));
                    });

                    sliderTrack.prepend(prependFragment);
                    sliderTrack.append(appendFragment);
                    sliderRow.classList.add('is-looping');
                }

                const getStepSize = () => {
                    const firstCard = originalCards[0];

                    if (!firstCard) {
                        return sliderRow.clientWidth * 0.9;
                    }

                    const gapValue = parseFloat(window.getComputedStyle(sliderTrack).gap || '0');
                    return firstCard.getBoundingClientRect().width + gapValue;
                };

                const normalizeLoopPosition = () => {
                    if (!canLoop || loopWidth <= 0) {
                        return;
                    }

                    if (sliderRow.scrollLeft < loopWidth) {
                        sliderRow.scrollLeft += loopWidth;
                    } else if (sliderRow.scrollLeft >= loopWidth * 2) {
                        sliderRow.scrollLeft -= loopWidth;
                    }
                };

                const measureLoopWidth = () => {
                    if (!canLoop) {
                        return;
                    }

                    const firstOriginalCard = sliderTrack.children[originalCards.length];
                    const firstAppendedClone = sliderTrack.children[originalCards.length * 2];

                    if (!firstOriginalCard || !firstAppendedClone) {
                        return;
                    }

                    loopWidth = firstAppendedClone.offsetLeft - firstOriginalCard.offsetLeft;

                    if (loopWidth <= 0) {
                        return;
                    }

                    const preservedOffset = sliderRow.dataset.loopReady === 'true'
                        ? (((sliderRow.scrollLeft - loopWidth) % loopWidth) + loopWidth) % loopWidth
                        : 0;

                    sliderRow.scrollLeft = loopWidth + preservedOffset;
                    sliderRow.dataset.loopReady = 'true';
                };

                const runAutoScroll = (timestamp) => {
                    if (animationFrameId === null) {
                        return;
                    }

                    if (!lastFrameTime) {
                        lastFrameTime = timestamp;
                    }

                    const frameDelta = timestamp - lastFrameTime;

                    lastFrameTime = timestamp;
                    sliderRow.scrollLeft += (autoScrollSpeed * frameDelta) / 1000;
                    normalizeLoopPosition();
                    animationFrameId = window.requestAnimationFrame(runAutoScroll);
                };

                const resumeAutoScroll = () => {
                    if (prefersReducedMotion.matches || !canLoop || nav.hidden || animationFrameId !== null) {
                        return;
                    }

                    animationFrameId = window.requestAnimationFrame(runAutoScroll);
                };

                const scheduleAutoScrollResume = () => {
                    pauseAutoScroll();

                    if (prefersReducedMotion.matches || !canLoop || nav.hidden) {
                        return;
                    }

                    resumeTimerId = window.setTimeout(() => {
                        if (!slider.matches(':hover') && !slider.contains(document.activeElement)) {
                            resumeAutoScroll();
                        }
                    }, autoScrollResumeDelay);
                };

                const updateSliderState = () => {
                    const maxScroll = Math.max(0, sliderRow.scrollWidth - sliderRow.clientWidth);
                    const hasOverflow = maxScroll > 8;

                    nav.hidden = !hasOverflow;

                    if (!hasOverflow) {
                        pauseAutoScroll();
                        prevButton.disabled = true;
                        nextButton.disabled = true;
                        return;
                    }

                    if (canLoop) {
                        normalizeLoopPosition();
                        prevButton.disabled = false;
                        nextButton.disabled = false;
                        return;
                    }

                    prevButton.disabled = sliderRow.scrollLeft <= 4;
                    nextButton.disabled = sliderRow.scrollLeft >= maxScroll - 4;
                };

                const moveSlider = (direction) => {
                    pauseAutoScroll();

                    if (canLoop && loopWidth > 0) {
                        const stepSize = getStepSize();

                        if (direction < 0 && sliderRow.scrollLeft - stepSize < loopWidth) {
                            sliderRow.scrollLeft += loopWidth;
                        }

                        if (direction > 0 && sliderRow.scrollLeft + stepSize >= loopWidth * 2) {
                            sliderRow.scrollLeft -= loopWidth;
                        }
                    }

                    sliderRow.scrollBy({
                        left: direction * getStepSize(),
                        behavior: prefersReducedMotion.matches ? 'auto' : 'smooth',
                    });

                    scheduleAutoScrollResume();
                };

                const handleMotionPreferenceChange = () => {
                    pauseAutoScroll();
                    updateSliderState();

                    if (!prefersReducedMotion.matches) {
                        scheduleAutoScrollResume();
                    }
                };

                prevButton.addEventListener('click', () => moveSlider(-1));
                nextButton.addEventListener('click', () => moveSlider(1));
                sliderRow.addEventListener('scroll', updateSliderState, { passive: true });
                slider.addEventListener('mouseenter', pauseAutoScroll);
                slider.addEventListener('mouseleave', scheduleAutoScrollResume);
                slider.addEventListener('focusin', pauseAutoScroll);
                slider.addEventListener('focusout', () => {
                    window.requestAnimationFrame(() => {
                        if (!slider.contains(document.activeElement)) {
                            scheduleAutoScrollResume();
                        }
                    });
                });
                sliderRow.addEventListener('pointerdown', pauseAutoScroll);
                sliderRow.addEventListener('pointerup', scheduleAutoScrollResume);
                sliderRow.addEventListener('touchstart', pauseAutoScroll, { passive: true });
                sliderRow.addEventListener('touchend', scheduleAutoScrollResume, { passive: true });
                window.addEventListener('resize', () => {
                    measureLoopWidth();
                    updateSliderState();

                    if (!prefersReducedMotion.matches) {
                        scheduleAutoScrollResume();
                    }
                });

                if (typeof prefersReducedMotion.addEventListener === 'function') {
                    prefersReducedMotion.addEventListener('change', handleMotionPreferenceChange);
                } else if (typeof prefersReducedMotion.addListener === 'function') {
                    prefersReducedMotion.addListener(handleMotionPreferenceChange);
                }

                measureLoopWidth();
                updateSliderState();
                scheduleAutoScrollResume();
            });
        });
    </script>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

</body>
</html>

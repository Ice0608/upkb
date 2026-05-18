<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')

    <style>
        .institusi-page {
            --institusi-brand-50: #ecfeff;
            --institusi-brand-100: #cffafe;
            --institusi-brand-500: #00bcd4;
            --institusi-brand-600: #0891b2;
            --institusi-brand-700: #0e7490;
            --institusi-brand-rgb: 0, 188, 212;
            --institusi-brand-rgb-soft: 103, 232, 249;
            --institusi-brand-soft-text: rgba(224, 251, 255, 0.92);
            position: relative;
            min-height: 100vh;
            overflow-x: clip;
            background:
                radial-gradient(circle at 12% 16%, rgba(var(--institusi-brand-rgb-soft), 0.18), transparent 24%),
                radial-gradient(circle at 84% 18%, rgba(37, 99, 235, 0.14), transparent 28%),
                radial-gradient(circle at 50% 56%, rgba(255, 255, 255, 0.78), transparent 24%),
                linear-gradient(135deg, #ecfeff 0%, #edf4ff 44%, #dfe9ff 100%);
        }

        .institusi-page::after {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            opacity: 0.018;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140' viewBox='0 0 140 140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.72' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='140' height='140' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
            background-size: 150px 150px;
            mix-blend-mode: soft-light;
        }

        .institusi-page > * {
            position: relative;
            z-index: 1;
        }

        .institusi-page--tvet,
        .institusi-shell--tvet {
            --institusi-tvet-50: #fff2ec;
            --institusi-tvet-100: #ffe0cc;
            --institusi-tvet-500: #FF5100;
            --institusi-tvet-600: #CC4100;
            --institusi-tvet-700: #993100;
            --institusi-tvet-rgb: 255, 81, 0;
            --institusi-tvet-rgb-soft: 255, 130, 60;
            --institusi-tvet-soft-text: rgba(255, 220, 200, 0.92);
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
                url('/images/TVET-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(var(--institusi-tvet-rgb-soft), 0.18), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .institusi-page--diploma {
            background:
                url('/images/DIP-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(var(--institusi-diploma-rgb-soft), 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(99, 102, 241, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .institusi-page--sains-kesihatan{
            background:
                url('/images/SK-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(var(--institusi-sains-rgb-soft), 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(33, 150, 243, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .institusi-page--tvet .institusi-hero {
            background: linear-gradient(90deg, #8B2200 0%, #ff7a38 100%);
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
            border-color: rgba(var(--institusi-tvet-rgb), 0.2);
            box-shadow:
                0 8px 18px rgba(var(--institusi-tvet-rgb), 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
        }

        .institusi-page--diploma .institusi-card-link {
            color: var(--institusi-diploma-500);
            border-color: rgba(var(--institusi-diploma-rgb), 0.2);
            box-shadow:
                0 8px 18px rgba(var(--institusi-diploma-rgb), 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
        }

        .institusi-page--sains-kesihatan .institusi-card-link {
            color: var(--institusi-sains-500);
            border-color: rgba(var(--institusi-sains-rgb), 0.2);
            box-shadow:
                0 8px 18px rgba(var(--institusi-sains-rgb), 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
        }

        .institusi-page--tvet .institusi-card:hover .institusi-card-link,
        .institusi-page--tvet .institusi-card:focus-within .institusi-card-link {
            color: var(--institusi-tvet-700);
            box-shadow:
                0 10px 24px rgba(var(--institusi-tvet-rgb), 0.22),
                0 0 18px rgba(var(--institusi-tvet-rgb), 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.84);
        }

        .institusi-page--diploma .institusi-card:hover .institusi-card-link,
        .institusi-page--diploma .institusi-card:focus-within .institusi-card-link {
            color: var(--institusi-diploma-700);
            box-shadow:
                0 10px 24px rgba(var(--institusi-diploma-rgb), 0.22),
                0 0 18px rgba(var(--institusi-diploma-rgb), 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.84);
        }

        .institusi-page--sains-kesihatan .institusi-card:hover .institusi-card-link,
        .institusi-page--sains-kesihatan .institusi-card:focus-within .institusi-card-link {
            color: var(--institusi-sains-700);
            box-shadow:
                0 10px 24px rgba(var(--institusi-sains-rgb), 0.22),
                0 0 18px rgba(var(--institusi-sains-rgb), 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.84);
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

        .institusi-soft-text-default {
            color: var(--institusi-brand-soft-text);
        }

        .institusi-accent-default {
            color: var(--institusi-brand-500);
        }

        .institusi-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.8);
            background: linear-gradient(90deg, #006d77 0%, #00bcd4 54%, #1e88e5 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(var(--institusi-brand-rgb), 0.28),
                0 0 130px rgba(var(--institusi-brand-rgb-soft), 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .institusi-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
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
            box-shadow: 0 0 42px rgba(var(--institusi-brand-rgb-soft), 0.26);
        }

        .institusi-hero-button {
            border: 1px solid rgba(255, 255, 255, 0.74);
            box-shadow:
                0 0 0 6px rgba(255, 255, 255, 0.14),
                0 0 34px rgba(var(--institusi-brand-rgb), 0.3),
                0 16px 36px rgba(15, 23, 42, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .institusi-hero-button:hover {
            transform: translateY(-3px) scale(1.04);
            box-shadow:
                0 0 0 8px rgba(255, 255, 255, 0.16),
                0 0 42px rgba(var(--institusi-brand-rgb-soft), 0.38),
                0 22px 44px rgba(15, 23, 42, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.92);
        }

        /* ── Hero building decoration ── */
        .institusi-hero__bldg {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 72%;
            height: 100%;
            pointer-events: none;
            user-select: none;
        }
        @media (max-width: 767px) {
            .institusi-hero__bldg { display: none; }
        }

        .institusi-toolbar {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(245, 253, 255, 0.92)),
                linear-gradient(120deg, rgba(var(--institusi-brand-rgb), 0.07), rgba(var(--institusi-brand-rgb-soft), 0.08));
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
            background: radial-gradient(circle, rgba(var(--institusi-brand-rgb), 0.18), rgba(var(--institusi-brand-rgb), 0));
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
            border-color: rgba(var(--institusi-brand-rgb), 0.4);
            box-shadow: 0 16px 32px rgba(var(--institusi-brand-rgb), 0.12);
        }

        .institusi-filter-button:hover,
        .institusi-filter-button:focus-visible {
            transform: translateY(-1px);
            box-shadow: 0 14px 28px rgba(var(--institusi-brand-rgb), 0.14);
        }

        .institusi-filter-button--active-default {
            background: var(--institusi-brand-500);
            border-color: var(--institusi-brand-500);
            color: #ffffff;
        }

        .institusi-filter-button--active-default:hover {
            background: var(--institusi-brand-600);
            border-color: var(--institusi-brand-600);
        }

        .institusi-filter-button--idle-default {
            background: #ffffff;
            border-color: rgba(var(--institusi-brand-rgb), 0.34);
            color: var(--institusi-brand-600);
        }

        .institusi-filter-button--idle-default:hover {
            background: var(--institusi-brand-50);
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
            border: 1px solid rgba(var(--institusi-brand-rgb), 0.2);
            background: rgba(255, 255, 255, 0.96);
            color: var(--institusi-brand-600);
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease, color 0.25s ease, opacity 0.25s ease;
            pointer-events: auto;
        }

        .institusi-slider-button:hover,
        .institusi-slider-button:focus-visible {
            transform: translateY(-1px);
            border-color: rgba(var(--institusi-brand-rgb), 0.34);
            box-shadow: 0 16px 30px rgba(var(--institusi-brand-rgb), 0.16);
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

        @media (hover: hover) and (pointer: fine) {
            .institusi-slider-track:hover .institusi-slider-card {
                opacity: 0.7;
            }

            .institusi-slider-track:hover .institusi-slider-card:hover,
            .institusi-slider-track:hover .institusi-slider-card:focus-within {
                opacity: 1;
            }
        }

        .institusi-slider-card .institusi-card-media {
            height: clamp(23rem, 17vw, 100rem);
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
        }

        .institusi-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(140deg, rgba(255, 255, 255, 0.24), rgba(255, 255, 255, 0));
            opacity: 0;
            pointer-events: none;
        }

        .institusi-card:hover,
        .institusi-card:focus-within {
            transform: translateY(-6px) scale(1.02);
            border-color: rgba(var(--institusi-brand-rgb-soft), 0.38);
            box-shadow:
                0 30px 64px rgba(15, 23, 42, 0.14),
                0 0 32px rgba(var(--institusi-brand-rgb-soft), 0.12);
        }

        .institusi-slider-card.institusi-reveal-ready {
            opacity: 0;
            transform: translateY(20px);
        }

        .institusi-slider-card.institusi-reveal-ready.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes institusiTitleOpening {
            0% {
                opacity: 0.6;
                transform: scale(0.98);
                filter: blur(1.6px);
            }

            100% {
                opacity: 1;
                transform: scale(1);
                filter: blur(0);
            }
        }

        .institusi-card-title {
            transform-origin: 50% 100%;
        }

        .institusi-card-title.is-title-opening {
        }

        .institusi-card:hover::before,
        .institusi-card:focus-within::before {
            opacity: 1;
        }

        .institusi-card-media {
            position: relative;
            height: 10rem;
            overflow: hidden;
        }

        .institusi-card-media::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(0, 0, 0, 0.75),
                rgba(0, 0, 0, 0.2),
                transparent
            );
            pointer-events: none;
        }

        .institusi-card-media::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg, rgba(15, 23, 42, 0.02), rgba(15, 23, 42, 0.32)),
                linear-gradient(130deg, rgba(var(--institusi-brand-rgb), 0.34), rgba(15, 23, 42, 0));
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
            transition: transform 0.28s ease, background-color 0.28s ease, border-color 0.28s ease, box-shadow 0.28s ease;
        }

        .institusi-card-badge,
        .institusi-card-chip {
            backdrop-filter: blur(10px);
        }

        .institusi-card-chip {
            border: 1px solid rgba(var(--institusi-brand-rgb-soft), 0.14);
            background: rgba(236, 254, 255, 0.82);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.72);
        }

        .institusi-card:hover .institusi-card-chip,
        .institusi-card:focus-within .institusi-card-chip {
            border-color: rgba(var(--institusi-brand-rgb), 0.22);
            background: rgba(207, 250, 254, 0.95);
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
            background: var(--institusi-brand-50);
            color: var(--institusi-brand-600);
        }

        .institusi-card-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            border: 1px solid rgba(var(--institusi-brand-rgb), 0.2);
            padding: 0.32rem 0.78rem;
            background: rgba(255, 255, 255, 0.74);
            color: var(--institusi-brand-600);
            box-shadow:
                0 8px 18px rgba(var(--institusi-brand-rgb), 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
        }

        .institusi-card:hover .institusi-card-link,
        .institusi-card:focus-within .institusi-card-link {
            transform: translateX(4px);
            color: var(--institusi-brand-700);
            background: rgba(236, 254, 255, 0.95);
            box-shadow:
                0 10px 24px rgba(var(--institusi-brand-rgb), 0.22),
                0 0 18px rgba(var(--institusi-brand-rgb-soft), 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.84);
        }

            .institusi-card-body {
                border-top: 1px solid rgba(0, 0, 0, 0.05);
                background: linear-gradient(180deg, rgba(250, 250, 252, 0.6), rgba(255, 255, 255, 0.98));
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

            .institusi-slider-card.institusi-reveal-ready,
            .institusi-slider-card.institusi-reveal-ready.is-visible {
                opacity: 1;
                transform: none;
                transition: none;
            }

            .institusi-card-title.is-title-opening {
                animation: none;
            }
        }

        @media (max-width: 640px) {
            .institusi-shell {
                padding-top: 1.5rem;
            }

            .institusi-card {
                border-radius: 1.5rem;
            }

            .institusi-card-media {
                height: 14.5rem;
            }

            .institusi-single-grid {
                gap: 1rem;
            }

            .institusi-detail-card {
                padding: 1.25rem;
            }

            .institusi-detail-card h3 {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                text-align: left;
                font-size: 1.15rem;
            }

            .institusi-detail-card h3::before {
                content: "\f19c";
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 2.6rem;
                height: 2.6rem;
                flex: 0 0 2.6rem;
                border-radius: 1rem;
                background: rgba(var(--institusi-brand-rgb), 0.12);
                color: var(--institusi-brand-600);
                font-family: "Font Awesome 6 Free";
                font-weight: 900;
                font-size: 1rem;
            }

            .institusi-detail-card,
            .institusi-detail-copy,
            .institusi-detail-courses {
                text-align: left;
            }

            .institusi-detail-copy {
                display: -webkit-box;
                overflow: hidden;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 5;
                line-height: 1.65;
            }

            .institusi-detail-courses {
                margin-top: 1rem;
                padding-top: 1rem;
            }

            .institusi-detail-courses ul {
                display: flex;
                gap: 0.5rem;
                overflow-x: auto;
                padding-bottom: 0.25rem;
                scroll-snap-type: x mandatory;
            }

            .institusi-detail-courses li {
                min-width: 78%;
                scroll-snap-align: start;
            }

            .institusi-detail-card .institusi-card-link {
                width: 100%;
                padding-block: 0.7rem;
            }

            .institusi-slider-row {
                padding-left: 7vw;
                padding-right: 7vw;
            }

            .institusi-slider-card {
                flex-basis: min(86vw, 21rem);
                width: min(86vw, 21rem);
                scroll-snap-align: center;
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

        html.dark .institusi-page{
            background:
                radial-gradient(circle at 12% 16%, rgba(var(--institusi-brand-rgb-soft), 0.11), transparent 24%),
                radial-gradient(circle at 84% 18%, rgba(37, 99, 235, 0.08), transparent 28%),
                linear-gradient(135deg, #0f172a 0%, #1e293b 44%, #0f172a 100%);
        }

        html.dark .institusi-page--tvet {
            background:
                url('/images/TVET-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .institusi-page--diploma{
            background:
                url('/images/DIP-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        
        }

        html.dark .institusi-page--sains-kesihatan {
            background:
                url('/images/SK-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        
        }
        html.dark .institusi-card {
            background: linear-gradient(180deg, rgba(30,41,59,0.98), rgba(15,23,42,0.98));
            border-color: rgba(255,255,255,0.08);
        }
            html.dark .institusi-card-body {
                border-top-color: rgba(255, 255, 255, 0.06);
                background: linear-gradient(180deg, rgba(20, 30, 50, 0.6), rgba(15, 23, 42, 0.98));
            }
            html.dark .institusi-card-link {
                background: rgba(15, 23, 42, 0.78);
                border-color: rgba(255, 255, 255, 0.12);
                box-shadow:
                    0 10px 22px rgba(0, 0, 0, 0.34),
                    inset 0 1px 0 rgba(255, 255, 255, 0.1);
            }
        html.dark .institusi-toolbar {
            background: rgba(15,23,42,0.94) !important;
            border-color: rgba(255,255,255,0.08);
        }
        html.dark .institusi-filter-button--idle-tvet,
        html.dark .institusi-filter-button--idle-diploma,
        html.dark .institusi-filter-button--idle-sains-kesihatan,
        html.dark .institusi-filter-button--idle-default {
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
        html.dark .institusi-card-chip {
            background: rgba(30, 41, 59, 0.82) !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
            color: #cbd5e1;
        }

        html.dark .institusi-page--tvet .institusi-card-chip {
            background: rgba(255, 81, 0, 0.12) !important;
            border-color: rgba(var(--institusi-tvet-rgb), 0.22) !important;
        }

        html.dark .institusi-page--diploma .institusi-card-chip {
            background: rgba(141, 43, 226, 0.12) !important;
            border-color: rgba(var(--institusi-diploma-rgb), 0.22) !important;
        }

        html.dark .institusi-page--sains-kesihatan .institusi-card-chip {
            background: rgba(33, 150, 243, 0.12) !important;
            border-color: rgba(var(--institusi-sains-rgb), 0.22) !important;
        }

        html.dark .border-slate-200\/80,
        html.dark .border-slate-200 {
            border-color: rgba(255, 255, 255, 0.08) !important;
        }

        html.dark .institusi-kursus-pill {
            background: rgba(15, 23, 42, 0.78) !important;
            border-color: rgba(148, 163, 184, 0.28) !important;
            color: #dbe7f5 !important;
            box-shadow: none;
        }
        html.dark .text-slate-900 { color: #f1f5f9 !important; }
        html.dark .text-slate-800 { color: #e2e8f0 !important; }
        html.dark .text-slate-700 { color: #cbd5e1 !important; }
        html.dark .text-slate-600 { color: #b8c5d7 !important; }
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
    @include('layouts.navpelajar')

    <section class="institusi-shell {{ $institusiIsTvet ? 'institusi-shell--tvet' : '' }} {{ $institusiIsDiploma ? 'institusi-shell--diploma' : '' }} {{ $institusiIsSainsKesihatan ? 'institusi-shell--sains-kesihatan' : '' }} max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10">
        <div class="institusi-hero rounded-3xl p-8 text-white mb-8">
            {{-- ── Decorative: institution skyline silhouette ── --}}
            <svg aria-hidden="true" class="institusi-hero__bldg" viewBox="0 0 800 80" fill="none" preserveAspectRatio="xMaxYMax meet" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="ihFade" x1="0" y1="0" x2="320" y2="0" gradientUnits="userSpaceOnUse">
                        <stop offset="0%" stop-color="black"/>
                        <stop offset="100%" stop-color="white"/>
                    </linearGradient>
                    <mask id="ihMask"><rect width="800" height="80" fill="url(#ihFade)"/></mask>
                </defs>
                <g mask="url(#ihMask)" fill="white">
                    <!-- Ground -->
                    <rect x="0" y="76" width="800" height="4" fill-opacity="0.30"/>
                    <!-- B1: small office block -->
                    <rect x="186" y="48" width="44" height="28" fill-opacity="0.13"/>
                    <rect x="194" y="54" width="11" height="8" fill-opacity="0.26"/>
                    <rect x="211" y="54" width="11" height="8" fill-opacity="0.26"/>
                    <rect x="194" y="67" width="11" height="8" fill-opacity="0.26"/>
                    <rect x="211" y="67" width="11" height="8" fill-opacity="0.26"/>
                    <!-- B2: medium modern -->
                    <rect x="238" y="32" width="42" height="44" fill-opacity="0.13"/>
                    <rect x="246" y="39" width="11" height="8" fill-opacity="0.26"/>
                    <rect x="263" y="39" width="11" height="8" fill-opacity="0.26"/>
                    <rect x="246" y="53" width="11" height="8" fill-opacity="0.26"/>
                    <rect x="263" y="53" width="11" height="8" fill-opacity="0.26"/>
                    <rect x="246" y="67" width="11" height="8" fill-opacity="0.26"/>
                    <rect x="263" y="67" width="11" height="8" fill-opacity="0.26"/>
                    <!-- B3: short connector -->
                    <rect x="288" y="50" width="38" height="26" fill-opacity="0.11"/>
                    <rect x="296" y="56" width="10" height="8" fill-opacity="0.22"/>
                    <rect x="311" y="56" width="10" height="8" fill-opacity="0.22"/>
                    <!-- B4: tall slab before classical -->
                    <rect x="334" y="22" width="52" height="54" fill-opacity="0.14"/>
                    <rect x="343" y="29" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="362" y="29" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="343" y="45" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="362" y="45" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="343" y="61" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="362" y="61" width="13" height="10" fill-opacity="0.27"/>
                    <!-- ═══ CLASSICAL MAIN BUILDING ═══ -->
                    <rect x="394" y="16" width="186" height="60" fill-opacity="0.15"/>
                    <rect x="386" y="10" width="202" height="8" fill-opacity="0.24"/>
                    <polygon points="382,10 487,0 592,10" fill-opacity="0.18"/>
                    <rect x="382" y="9" width="210" height="2" fill-opacity="0.30"/>
                    <!-- Columns L -->
                    <rect x="398" y="18" width="5" height="58" fill-opacity="0.22"/>
                    <rect x="419" y="18" width="5" height="58" fill-opacity="0.22"/>
                    <rect x="440" y="18" width="5" height="58" fill-opacity="0.22"/>
                    <rect x="461" y="18" width="5" height="58" fill-opacity="0.22"/>
                    <!-- Columns R -->
                    <rect x="511" y="18" width="5" height="58" fill-opacity="0.22"/>
                    <rect x="532" y="18" width="5" height="58" fill-opacity="0.22"/>
                    <rect x="553" y="18" width="5" height="58" fill-opacity="0.22"/>
                    <rect x="574" y="18" width="5" height="58" fill-opacity="0.22"/>
                    <!-- Arched door -->
                    <path d="M466 76 L466 55 Q466 44 487 44 Q508 44 508 55 L508 76 Z" fill-opacity="0.26"/>
                    <!-- Windows L (2 rows x 3) -->
                    <rect x="404" y="25" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="425" y="25" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="446" y="25" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="404" y="42" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="425" y="42" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="446" y="42" width="13" height="10" fill-opacity="0.27"/>
                    <!-- Windows R (2 rows x 3) -->
                    <rect x="516" y="25" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="537" y="25" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="558" y="25" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="516" y="42" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="537" y="42" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="558" y="42" width="13" height="10" fill-opacity="0.27"/>
                    <!-- Steps -->
                    <rect x="388" y="74" width="198" height="2" fill-opacity="0.34"/>
                    <!-- B5: medium modern R -->
                    <rect x="596" y="30" width="46" height="46" fill-opacity="0.13"/>
                    <rect x="604" y="37" width="12" height="9" fill-opacity="0.26"/>
                    <rect x="622" y="37" width="12" height="9" fill-opacity="0.26"/>
                    <rect x="604" y="52" width="12" height="9" fill-opacity="0.26"/>
                    <rect x="622" y="52" width="12" height="9" fill-opacity="0.26"/>
                    <rect x="604" y="66" width="12" height="9" fill-opacity="0.26"/>
                    <rect x="622" y="66" width="12" height="9" fill-opacity="0.26"/>
                    <!-- B6: short connector R -->
                    <rect x="650" y="52" width="34" height="24" fill-opacity="0.11"/>
                    <rect x="657" y="58" width="9" height="8" fill-opacity="0.22"/>
                    <rect x="671" y="58" width="9" height="8" fill-opacity="0.22"/>
                    <!-- B7: tall right -->
                    <rect x="692" y="18" width="52" height="58" fill-opacity="0.14"/>
                    <rect x="701" y="25" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="721" y="25" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="701" y="41" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="721" y="41" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="701" y="57" width="13" height="10" fill-opacity="0.27"/>
                    <rect x="721" y="57" width="13" height="10" fill-opacity="0.27"/>
                    <!-- B8: rightmost -->
                    <rect x="752" y="28" width="48" height="48" fill-opacity="0.13"/>
                    <rect x="761" y="35" width="12" height="9" fill-opacity="0.26"/>
                    <rect x="779" y="35" width="12" height="9" fill-opacity="0.26"/>
                    <rect x="761" y="50" width="12" height="9" fill-opacity="0.26"/>
                    <rect x="779" y="50" width="12" height="9" fill-opacity="0.26"/>
                    <rect x="761" y="65" width="12" height="9" fill-opacity="0.26"/>
                    <rect x="779" y="65" width="12" height="9" fill-opacity="0.26"/>
                </g>
            </svg>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        @if($jenis)
                            Institusi {{ $jenis }}
                        @else
                            Semua Institusi
                        @endif
                    </h1>
                    <p class="{{ $institusiIsTvet ? 'institusi-soft-text-tvet' : ($institusiIsDiploma ? 'institusi-soft-text-diploma' : ($institusiIsSainsKesihatan ? 'institusi-soft-text-sains-kesihatan' : 'institusi-soft-text-default')) }} mt-3 text-lg">Lihat semua institusi, lokasi mereka dan ringkasan fasiliti serta kursus yang ditawarkan.</p>
                </div>
            </div>
        </div>

        @unless($institusiIsSainsKesihatan)
        <div class="institusi-toolbar mb-8 rounded-3xl p-4 sm:p-5">
            <div class="relative z-10 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] {{ $institusiIsTvet ? 'institusi-accent-tvet' : ($institusiIsDiploma ? 'institusi-accent-diploma' : ($institusiIsSainsKesihatan ? 'institusi-accent-sains-kesihatan' : 'institusi-accent-default')) }}">Paparan Institusi</p>
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
                        <button type="submit" name="kuota" value="{{ request('kuota') ? 0 : 1 }}" class="institusi-filter-button inline-flex items-center justify-center rounded-full border px-6 py-3 text-sm font-semibold transition {{ $institusiIsTvet ? (request('kuota') ? 'institusi-filter-button--active-tvet' : 'institusi-filter-button--idle-tvet') : ($institusiIsDiploma ? (request('kuota') ? 'institusi-filter-button--active-diploma' : 'institusi-filter-button--idle-diploma') : ($institusiIsSainsKesihatan ? (request('kuota') ? 'institusi-filter-button--active-sains-kesihatan' : 'institusi-filter-button--idle-sains-kesihatan') : (request('kuota') ? 'institusi-filter-button--active-default' : 'institusi-filter-button--idle-default'))) }}">
                            {{ request('kuota') ? 'Kuota Aktif' : 'Tapis Kuota' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endunless

        @if($institusis->isEmpty())
            <div class="col-span-3 bg-white rounded-2xl p-8 text-center text-gray-500">
                Tiada institusi ditemui.
            </div>
        @elseif($institusis->count() === 1)
            @php
                $institusi = $institusis->first();
                $kursusRingkas = $institusi->relationLoaded('kursuses') ? $institusi->kursuses->take(3) : collect();
            @endphp
            <div class="institusi-single-grid grid gap-6 lg:grid-cols-5 items-stretch">
                <article class="institusi-card rounded-3xl flex flex-col h-full lg:col-span-2">
                    <a href="{{ route('pelajar.infoinstitusi', ['pelajar' => $pelajar, 'kod_institusi' => $institusi->kod_institusi]) }}" class="group flex flex-col h-full text-current no-underline">
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
                                    <p class="text-[0.68rem] font-semibold uppercase tracking-[0.34em] {{ $institusiIsTvet ? 'institusi-soft-text-tvet' : ($institusiIsDiploma ? 'institusi-soft-text-diploma' : ($institusiIsSainsKesihatan ? 'institusi-soft-text-sains-kesihatan' : 'institusi-soft-text-default')) }}">Institusi</p>
                                    <h2 class="mt-2 text-2xl font-extrabold text-white">{{ $institusi->nama_institusi }}</h2>
                                </div>
                                <span class="institusi-card-arrow inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white/15 text-lg text-white">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                        <div class="p-6 sm:p-7 flex flex-col flex-1">
                            <div class="institusi-card-chip flex items-start gap-3 rounded-2xl px-4 py-3 text-sm text-slate-600">
                                <i class="fas fa-map-marker-alt mt-0.5 {{ $institusiIsTvet ? 'institusi-accent-tvet' : ($institusiIsDiploma ? 'institusi-accent-diploma' : ($institusiIsSainsKesihatan ? 'institusi-accent-sains-kesihatan' : 'institusi-accent-default')) }}"></i>
                                <span class="institusi-clamp-2">{{ $institusi->alamat }}</span>
                            </div>
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

                <aside class="institusi-detail-card institusi-card rounded-3xl p-6 sm:p-7 lg:col-span-3">
                    <h3 class="text-xl font-bold text-slate-900">Mengenai Institusi</h3>
                    <p class="institusi-detail-copy mt-3 text-sm leading-7 text-slate-600">{{ $institusi->mengenai_institusi ?: 'Maklumat lanjut mengenai institusi ini akan dikemaskini.' }}</p>

                    <div class="institusi-detail-courses mt-6 border-t border-slate-200/80 pt-6">
                        <h4 class="text-lg font-semibold text-slate-900">Beberapa Kursus Ditawarkan</h4>
                        @if($kursusRingkas->isNotEmpty())
                            <ul class="mt-3 space-y-3">
                                @foreach($kursusRingkas as $kursus)
                                    <li class="institusi-kursus-pill rounded-2xl bg-white px-4 py-3 text-sm text-slate-700 shadow-sm border border-slate-200/70">{{ $kursus->nama_kursus }}</li>
                                @endforeach
                            </ul>
                            @if($institusi->kursuses_count > 3)
                                <p class="mt-3 text-sm text-slate-600">+{{ $institusi->kursuses_count - 3 }} lagi kursus.</p>
                            @endif
                        @else
                            <p class="mt-3 text-sm text-slate-600">Jumlah kursus tersedia: {{ $institusi->kursuses_count }} kursus.</p>
                        @endif
                    </div>

                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('pelajar.infoinstitusi', ['pelajar' => $pelajar, 'kod_institusi' => $institusi->kod_institusi]) }}" class="institusi-card-link inline-flex items-center gap-2 text-sm font-semibold">
                            Terokai
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </aside>
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
                                <a href="{{ route('pelajar.infoinstitusi', ['pelajar' => $pelajar, 'kod_institusi' => $institusi->kod_institusi]) }}" class="group flex flex-col h-full text-current no-underline">
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
                                                <p class="text-[0.68rem] font-semibold uppercase tracking-[0.34em] {{ $institusiIsTvet ? 'institusi-soft-text-tvet' : ($institusiIsDiploma ? 'institusi-soft-text-diploma' : ($institusiIsSainsKesihatan ? 'institusi-soft-text-sains-kesihatan' : 'institusi-soft-text-default')) }}">Institusi</p>
                                                <h2 class="institusi-card-title mt-2 text-2xl font-extrabold text-white">{{ $institusi->nama_institusi }}</h2>
                                            </div>
                                            <span class="institusi-card-arrow inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white/15 text-lg text-white">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="institusi-card-body p-6 sm:p-7 flex flex-col flex-1">
                                        <div class="institusi-card-chip flex items-start gap-3 rounded-2xl px-4 py-3 text-sm text-slate-600">
                                            <i class="fas fa-map-marker-alt mt-0.5 {{ $institusiIsTvet ? 'institusi-accent-tvet' : ($institusiIsDiploma ? 'institusi-accent-diploma' : ($institusiIsSainsKesihatan ? 'institusi-accent-sains-kesihatan' : 'institusi-accent-default')) }}"></i>
                                            <span class="institusi-clamp-2">{{ $institusi->alamat }}</span>
                                        </div>
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
            const revealCardsOnScroll = () => {
                const cards = document.querySelectorAll('.institusi-slider-card');

                if (!cards.length || !('IntersectionObserver' in window)) {
                    return;
                }

                const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

                if (prefersReducedMotion.matches) {
                    return;
                }

                const observer = new IntersectionObserver((entries, cardObserver) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) {
                            return;
                        }

                        entry.target.classList.add('is-visible');
                        cardObserver.unobserve(entry.target);
                    });
                }, {
                    threshold: 0.18,
                    rootMargin: '0px 0px -8% 0px',
                });

                cards.forEach((card, index) => {
                    card.classList.add('institusi-reveal-ready');
                    card.style.transitionDelay = `${Math.min(index, 6) * 60}ms`;
                    observer.observe(card);
                });
            };

            const animateTitlesOnScroll = (scope = document) => {
                const titles = Array.from(scope.querySelectorAll('.institusi-card-title'));

                if (!titles.length || !('IntersectionObserver' in window)) {
                    return;
                }

                const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

                if (prefersReducedMotion.matches) {
                    return;
                }

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        const title = entry.target;

                        if (!entry.isIntersecting) {
                            title.classList.remove('is-title-opening');
                            return;
                        }

                        title.classList.remove('is-title-opening');
                        void title.offsetWidth;
                        title.classList.add('is-title-opening');
                    });
                }, {
                    threshold: 0.45,
                    rootMargin: '0px 0px -5% 0px',
                });

                titles.forEach((title) => observer.observe(title));
            };

            revealCardsOnScroll();

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

                animateTitlesOnScroll(sliderTrack);

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
                        sliderRow.style.scrollBehavior = 'auto';
                        sliderRow.scrollLeft += loopWidth;
                        sliderRow.style.scrollBehavior = '';
                    } else if (sliderRow.scrollLeft >= loopWidth * 2) {
                        sliderRow.style.scrollBehavior = 'auto';
                        sliderRow.scrollLeft -= loopWidth;
                        sliderRow.style.scrollBehavior = '';
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

                    sliderRow.style.scrollBehavior = 'auto';
                    sliderRow.scrollLeft = loopWidth + preservedOffset;
                    sliderRow.style.scrollBehavior = '';
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
    @include('layouts.footer-pelajar')

</body>
</html>

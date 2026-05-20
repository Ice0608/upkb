<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - FAQ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')

    <style>
        :root {
            --xmb-ease: cubic-bezier(0.22, 1, 0.36, 1);
            --xmb-ease-soft: cubic-bezier(0.16, 1, 0.3, 1);
            --xmb-primary: #14b8a6;
            --xmb-primary-soft: #2dd4bf;
            --xmb-primary-pale: #ccfbf1;
            --xmb-accent: #5eead4;
            --xmb-bg: #f0fdf9;
            --xmb-bg-warm: #f0fdfa;
            --xmb-surface: rgba(255, 255, 255, 0.74);
            --xmb-surface-strong: rgba(240, 253, 250, 0.96);
            --xmb-border: rgba(255, 255, 255, 0.76);
            --xmb-border-soft: rgba(28, 28, 30, 0.06);
            --xmb-text-main: #1c1c1e;
            --xmb-text-soft: rgba(28, 28, 30, 0.72);
            --xmb-text-faint: rgba(28, 28, 30, 0.5);
            --xmb-shadow: rgba(27, 29, 35, 0.08);
            --xmb-shadow-strong: rgba(27, 29, 35, 0.14);
            --xmb-glow: rgba(20, 184, 166, 0.28);
            --xmb-glow-strong: rgba(45, 212, 191, 0.38);
        }

        .faq-page {
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
            background: linear-gradient(180deg, var(--xmb-bg-warm) 0%, #f0f9f7 52%, #e0f8f5 100%);
        }

        .faq-page::before,
        .faq-page::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .faq-page::before {
            background:
                radial-gradient(circle at 12% 14%, rgba(20, 184, 166, 0.14), transparent 24%),
                radial-gradient(circle at 85% 16%, rgba(45, 212, 191, 0.16), transparent 20%),
                radial-gradient(circle at 50% 100%, rgba(94, 234, 212, 0.12), transparent 32%),
                repeating-radial-gradient(circle at 0 0, rgba(28, 28, 30, 0.025) 0 1px, transparent 1px 4px);
            opacity: 0.46;
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0.15));
        }

        .faq-page::after {
            inset: auto auto -6rem 50%;
            width: min(80rem, calc(100vw - 1.5rem));
            height: 28rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(45, 212, 191, 0.16), rgba(45, 212, 191, 0) 68%);
            opacity: 0.74;
        }

        .faq-page > * {
            position: relative;
            z-index: 1;
        }

        .faq-wave-layer {
            position: fixed;
            inset: auto -12% -6rem;
            height: 34rem;
            pointer-events: none;
            z-index: 0;
            border-radius: 50% 50% 0 0;
            opacity: 0.34;
            background:
                radial-gradient(circle at 12% 45%, rgba(255, 255, 255, 0.42), transparent 20%),
                linear-gradient(120deg, rgba(204, 251, 241, 0.1) 8%, rgba(94, 234, 212, 0.18) 34%, rgba(45, 212, 191, 0.16) 62%, rgba(255, 255, 255, 0.08) 100%);
            animation: none;
        }

        .faq-wave-layer::before,
        .faq-wave-layer::after {
            content: "";
            position: absolute;
            left: -8%;
            width: 116%;
            border-radius: 48% 52% 0 0;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.22), rgba(94, 234, 212, 0.12), rgba(45, 212, 191, 0.1), rgba(255, 255, 255, 0.04));
        }

        .faq-wave-layer::before {
            bottom: 8rem;
            height: 10rem;
            opacity: 0.26;
            animation: none;
        }

        .faq-wave-layer::after {
            bottom: 2rem;
            height: 13rem;
            opacity: 0.3;
            animation: none;
        }

        .faq-wave-layer-secondary {
            inset: auto -18% -10rem;
            height: 30rem;
            opacity: 0.18;
            transform: scaleX(1.08);
            animation-duration: 24s;
            animation-direction: alternate-reverse;
        }

        .faq-shell {
            padding-top: 2.75rem;
            padding-bottom: 5rem;
        }

        .faq-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(94, 234, 212, 0.48);
            background:
                linear-gradient(90deg, #14b8a6 0%, #2dd4bf 56%, #5eead4 100%);
            box-shadow:
                inset 0 1px 0 rgba(204, 251, 241, 0.44),
                0 24px 55px rgba(20, 184, 166, 0.22),
                0 0 46px rgba(45, 212, 191, 0.2);
            animation: none;
        }

        .faq-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 84% 30%, rgba(255, 249, 235, 0.3), transparent 18%),
                linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.18), transparent 72%),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 14px),
                repeating-linear-gradient(180deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 14px);
            background-size: auto, auto, 8rem 5.8rem, 8rem 5.8rem;
            background-position: center, center, 1.25rem calc(100% - 0.95rem), 1.25rem calc(100% - 0.95rem);
            background-repeat: no-repeat;
            opacity: 0.9;
            pointer-events: none;
        }

        .faq-hero::after {
            content: "";
            position: absolute;
            right: 6%;
            top: -2.25rem;
            width: 12rem;
            height: 12rem;
            border-radius: 50%;
            border: 1px solid rgba(204, 251, 241, 0.22);
            box-shadow:
                0 0 0 1rem rgba(204, 251, 241, 0.08),
                0 0 0 2rem rgba(204, 251, 241, 0.04);
            opacity: 0.92;
            pointer-events: none;
        }

        .faq-hero-eyebrow {
            color: rgba(204, 251, 241, 0.74);
        }

        .faq-hero-title {
            color: #ffffff;
            text-shadow: 0 10px 22px rgba(20, 184, 166, 0.24);
        }

        .faq-hero-copy {
            color: rgba(204, 251, 241, 0.92);
        }


        .faq-track-label {
            color: rgba(20, 184, 166, 0.8);
            letter-spacing: 0.38em;
            text-transform: uppercase;
        }

        .faq-category-title {
            color: #0f172a;
        }

        .faq-track {
            position: relative;
            display: grid;
            gap: 1.4rem;
            padding: 0.5rem 0 0.75rem;
        }

        .faq-track--slow .faq-card {
            transition: transform 320ms var(--xmb-ease-soft), opacity 260ms var(--xmb-ease-soft), box-shadow 320ms var(--xmb-ease-soft);
        }

        .faq-track--slow .faq-card:active {
            transition: transform 200ms var(--xmb-ease);
        }

        .faq-track--slow .faq-icon-chip {
            transition: transform 320ms var(--xmb-ease-soft), box-shadow 320ms var(--xmb-ease-soft), filter 320ms var(--xmb-ease-soft);
        }

        .faq-track--slow .faq-arrow {
            transition: transform 320ms var(--xmb-ease-soft), opacity 260ms var(--xmb-ease-soft), color 260ms var(--xmb-ease-soft);
        }

        .faq-track::before {
            content: "";
            position: absolute;
            left: 7%;
            right: 7%;
            top: calc(50% + 0.5rem);
            height: 1px;
            background: linear-gradient(90deg, rgba(20, 184, 166, 0.02), rgba(94, 234, 212, 0.22), rgba(45, 212, 191, 0.2), rgba(20, 184, 166, 0.02));
            transform: translateY(-50%);
            z-index: 0;
        }

        .faq-track::after {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            width: min(34rem, 72vw);
            height: 14rem;
            transform: translate(-50%, -28%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(45, 212, 191, 0.18), rgba(45, 212, 191, 0) 68%);
            filter: blur(6px);
            opacity: 0.8;
            pointer-events: none;
            animation: none;
            z-index: 0;
        }

        .faq-carousel-controls {
            display: flex;
            justify-content: center;
            gap: 0.65rem;
            z-index: 2;
        }

        .faq-carousel-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3.15rem;
            height: 3.15rem;
            border: 1px solid rgba(20, 184, 166, 0.34);
            border-radius: 999px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.72), rgba(240, 253, 250, 0.46));
            color: rgba(20, 184, 166, 0.92);
            box-shadow:
                0 8px 14px rgba(20, 184, 166, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.94);
            backdrop-filter: none;
            transition:
                transform 320ms var(--xmb-ease),
                box-shadow 320ms var(--xmb-ease),
                background 320ms var(--xmb-ease),
                color 320ms var(--xmb-ease);
        }

        .faq-carousel-button:hover,
        .faq-carousel-button:focus-visible {
            transform: translateY(-2px);
            color: #ffffff;
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.92), rgba(45, 212, 191, 0.88));
            box-shadow:
                0 18px 32px rgba(20, 184, 166, 0.2),
                0 0 28px rgba(45, 212, 191, 0.16);
            outline: none;
        }

        .faq-xmb-row {
            position: relative;
            min-height: 19.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
            perspective: none;
        }

        .faq-card {
            --faq-tilt-x: 0deg;
            --faq-tilt-y: 0deg;
            --faq-lift: 0px;
            --faq-shimmer-x: 50%;
            --faq-shimmer-y: 50%;
            position: relative;
            isolation: isolate;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            gap: 0;
            width: min(28.25rem, calc(100vw - 7rem));
            min-height: 15.6rem;
            padding: 1.2rem 1.1rem 1.1rem;
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 2rem;
            text-align: center;
            color: var(--xmb-text-main);
            background:
                linear-gradient(145deg, rgba(255, 255, 255, 0.18), rgba(255, 249, 243, 0.1)),
                linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.04));
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.34),
                0 18px 38px rgba(85, 53, 24, 0.14),
                0 8px 18px rgba(28, 28, 30, 0.08);
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
            transform-style: flat;
            backface-visibility: hidden;
            contain: paint;
            will-change: transform, opacity;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate3d(-50%, -50%, 0) scale(0.82);
            transform-origin: center;
            opacity: 0;
            pointer-events: none;
            transition:
                transform 320ms var(--xmb-ease-soft),
                opacity 260ms var(--xmb-ease-soft),
                box-shadow 320ms var(--xmb-ease-soft),
                border-color 260ms var(--xmb-ease-soft),
                background 320ms var(--xmb-ease-soft);
        }

        .faq-card::before {
            display: none;
        }

        .faq-card::after {
            display: none;
        }

        .faq-card.is-focused {
            transform: translate3d(-50%, -50%, 0) scale(1);
            opacity: 1;
            pointer-events: auto;
            z-index: 5;
            border-color: rgba(45, 212, 191, 0.56);
            box-shadow:
                inset 0 1px 0 rgba(204, 251, 241, 0.44),
                0 14px 30px rgba(20, 184, 166, 0.2);
            background:
                linear-gradient(145deg, rgba(45, 212, 191, 0.28), rgba(94, 234, 212, 0.14)),
                linear-gradient(145deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.08));
            outline: none;
        }

        .faq-card:hover,
        .faq-card:focus-visible {
            transform: translate3d(-50%, -50%, 0) scale(1.01);
            border-color: rgba(94, 234, 212, 0.42);
            background:
                linear-gradient(145deg, rgba(45, 212, 191, 0.22), rgba(94, 234, 212, 0.14)),
                linear-gradient(145deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.08));
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.38),
                0 12px 24px rgba(20, 184, 166, 0.16);
        }

        .faq-card.is-focused::after {
            opacity: 1;
        }

        .faq-card.is-focused::before {
            animation-duration: 2.6s;
            opacity: 0.92;
        }

        .faq-card.is-prev,
        .faq-card.is-next {
            opacity: 0.62;
            pointer-events: auto;
            z-index: 3;
            filter: none;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.28),
                0 20px 40px rgba(85, 53, 24, 0.1),
                0 8px 18px rgba(28, 28, 30, 0.05);
        }

        .faq-card.is-prev {
            transform: translate3d(-128%, -50%, 0) scale(0.92);
        }

        .faq-card.is-next {
            transform: translate3d(28%, -50%, 0) scale(0.92);
        }

        .faq-card.is-hidden {
            transform: translate3d(-50%, -50%, 0) scale(0.72);
            opacity: 0;
            z-index: 1;
            filter: none;
        }

        .faq-card[data-faq-type="tvet"] {
            border-color: rgba(240, 205, 112, 0.54);
            box-shadow:
                inset 0 1px 0 rgba(255, 248, 220, 0.5),
                inset 0 -10px 20px rgba(255, 255, 255, 0.08),
                0 18px 38px rgba(168, 116, 8, 0.16),
                0 0 28px rgba(212, 175, 55, 0.14);
            background:
                linear-gradient(90deg, rgba(168, 116, 8, 0.9), rgba(212, 175, 55, 0.9) 58%, rgba(241, 207, 99, 0.88));
            opacity: 0.96;
        }

        .faq-card[data-faq-type="tvet"]::after {
            background: radial-gradient(circle, rgba(212, 175, 55, 0.3), rgba(212, 175, 55, 0) 72%);
        }

        .faq-card[data-faq-type="skm"]::after {
            background: radial-gradient(circle, rgba(139, 92, 246, 0.3), rgba(139, 92, 246, 0) 72%);
        }

        .faq-card[data-faq-type="tvet"]:hover,
        .faq-card[data-faq-type="tvet"]:focus-visible,
        .faq-card[data-faq-type="tvet"].is-focused {
            border-color: rgba(240, 205, 112, 0.6);
            box-shadow:
                inset 0 1px 0 rgba(255, 248, 220, 0.52),
                0 24px 54px rgba(168, 116, 8, 0.24),
                0 0 34px rgba(212, 175, 55, 0.24),
                0 0 90px rgba(241, 207, 99, 0.22);
            background:
                linear-gradient(90deg, rgba(154, 106, 7, 0.96), rgba(212, 175, 55, 0.96) 58%, rgba(241, 207, 99, 0.94));
        }

        .faq-card[data-faq-type="skm"]:hover,
        .faq-card[data-faq-type="skm"]:focus-visible,
        .faq-card[data-faq-type="skm"].is-focused {
            border-color: rgba(167, 139, 250, 0.56);
            box-shadow:
                inset 0 1px 0 rgba(245, 243, 255, 0.52),
                0 24px 54px rgba(109, 40, 217, 0.24),
                0 0 34px rgba(139, 92, 246, 0.24),
                0 0 90px rgba(196, 181, 253, 0.2);
            background:
                linear-gradient(90deg, rgba(109, 40, 217, 0.94), rgba(139, 92, 246, 0.94) 58%, rgba(192, 132, 252, 0.94));
        }

        /* admission — orange (matches icon #ff9a3c → #ff7a00) */
        .faq-card[data-faq-type="admission"]::after {
            background: radial-gradient(circle, rgba(255, 122, 0, 0.3), rgba(255, 122, 0, 0) 72%);
        }

        .faq-card[data-faq-type="admission"]:hover,
        .faq-card[data-faq-type="admission"]:focus-visible,
        .faq-card[data-faq-type="admission"].is-focused {
            border-color: rgba(255, 208, 137, 0.56);
            box-shadow:
                inset 0 1px 0 rgba(255, 246, 228, 0.52),
                0 24px 54px rgba(226, 88, 0, 0.24),
                0 0 34px rgba(255, 122, 0, 0.24),
                0 0 90px rgba(255, 172, 80, 0.2);
            background:
                linear-gradient(90deg, rgba(200, 78, 0, 0.94), rgba(255, 122, 0, 0.94) 58%, rgba(255, 154, 60, 0.94));
        }

        /* program — sky blue (matches icon #38bdf8 → #0ea5e9) */
        .faq-card[data-faq-type="program"]::after {
            background: radial-gradient(circle, rgba(14, 165, 233, 0.3), rgba(14, 165, 233, 0) 72%);
        }

        .faq-card[data-faq-type="program"]:hover,
        .faq-card[data-faq-type="program"]:focus-visible,
        .faq-card[data-faq-type="program"].is-focused {
            border-color: rgba(125, 211, 252, 0.56);
            box-shadow:
                inset 0 1px 0 rgba(240, 249, 255, 0.52),
                0 24px 54px rgba(2, 132, 199, 0.24),
                0 0 34px rgba(14, 165, 233, 0.24),
                0 0 90px rgba(56, 189, 248, 0.2);
            background:
                linear-gradient(90deg, rgba(2, 132, 199, 0.94), rgba(14, 165, 233, 0.94) 58%, rgba(56, 189, 248, 0.94));
        }

        /* fees — emerald green (matches icon #34d399 → #059669) */
        .faq-card[data-faq-type="fees"]::after {
            background: radial-gradient(circle, rgba(5, 150, 105, 0.3), rgba(5, 150, 105, 0) 72%);
        }

        .faq-card[data-faq-type="fees"]:hover,
        .faq-card[data-faq-type="fees"]:focus-visible,
        .faq-card[data-faq-type="fees"].is-focused {
            border-color: rgba(110, 231, 183, 0.56);
            box-shadow:
                inset 0 1px 0 rgba(236, 253, 245, 0.52),
                0 24px 54px rgba(4, 120, 87, 0.24),
                0 0 34px rgba(5, 150, 105, 0.24),
                0 0 90px rgba(52, 211, 153, 0.2);
            background:
                linear-gradient(90deg, rgba(4, 120, 87, 0.94), rgba(5, 150, 105, 0.94) 58%, rgba(52, 211, 153, 0.94));
        }

        /* application — purple (matches icon #a855f7 → #7c3aed) */
        .faq-card[data-faq-type="application"]::after {
            background: radial-gradient(circle, rgba(109, 40, 217, 0.34), rgba(109, 40, 217, 0) 72%);
        }

        .faq-card[data-faq-type="application"]:hover,
        .faq-card[data-faq-type="application"]:focus-visible,
        .faq-card[data-faq-type="application"].is-focused {
            border-color: rgba(167, 139, 250, 0.52);
            box-shadow:
                inset 0 1px 0 rgba(245, 243, 255, 0.52),
                0 24px 54px rgba(76, 29, 149, 0.28),
                0 0 34px rgba(109, 40, 217, 0.24),
                0 0 90px rgba(167, 139, 250, 0.16);
            background:
                linear-gradient(90deg, rgba(76, 29, 149, 0.96), rgba(91, 33, 182, 0.96) 58%, rgba(109, 40, 217, 0.95));
        }

        .faq-track.has-focused-item .faq-card:not(.is-focused) {
            opacity: 0.62;
        }

        .faq-card:active {
            transform: translate3d(-50%, -50%, 0) scale(0.99);
        }

        .faq-icon-chip {
            position: relative;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            width: 4.15rem;
            height: 4.15rem;
            margin: 0 auto 0.7rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 999px;
            color: #ffffff;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.34),
                0 16px 28px rgba(28, 28, 30, 0.14),
                0 0 20px rgba(20, 184, 166, 0.16);
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
            transition: transform 320ms var(--xmb-ease-soft), box-shadow 320ms var(--xmb-ease-soft), filter 320ms var(--xmb-ease-soft);
            animation: none;
        }

        .faq-card > .flex-1 {
            width: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            transform: none;
        }

        .faq-card .faq-card-meta,
        .faq-card .faq-card-title,
        .faq-card .faq-card-copy {
            width: 100%;
            text-align: center;
        }

        .faq-card.is-focused .faq-icon-chip {
            transform: scale(1.08);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.42),
                0 20px 34px rgba(28, 28, 30, 0.14),
                0 0 34px rgba(20, 184, 166, 0.18);
            filter: brightness(1.06);
        }

            .faq-card[data-faq-type="skm"].is-focused .faq-icon-chip {
                box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.42),
                0 20px 34px rgba(28, 28, 30, 0.14),
                0 0 34px rgba(139, 92, 246, 0.24);
            }

        .faq-card[data-faq-type="program"].is-focused .faq-icon-chip {
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.42),
                0 20px 34px rgba(28, 28, 30, 0.14),
                0 0 34px rgba(14, 165, 233, 0.28);
        }

        .faq-card[data-faq-type="fees"].is-focused .faq-icon-chip {
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.42),
                0 20px 34px rgba(28, 28, 30, 0.14),
                0 0 34px rgba(52, 211, 153, 0.28);
        }

        .faq-card[data-faq-type="application"].is-focused .faq-icon-chip {
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.42),
                0 20px 34px rgba(28, 28, 30, 0.14),
                0 0 34px rgba(109, 40, 217, 0.28);
        }

            .faq-card[data-faq-type="tvet"] .faq-card-title,
            .faq-card[data-faq-type="tvet"] .faq-card-copy,
            .faq-card[data-faq-type="tvet"] .faq-card-meta {
                color: rgba(255, 255, 255, 0.96);
            }

            .faq-card[data-faq-type="tvet"] .faq-arrow {
                color: rgba(255, 255, 255, 0.88);
            }

            .faq-card[data-faq-type="tvet"].is-focused .faq-icon-chip {
                box-shadow:
                    inset 0 1px 0 rgba(255, 255, 255, 0.42),
                    0 20px 34px rgba(28, 28, 30, 0.14),
                    0 0 34px rgba(212, 175, 55, 0.24);
            }

        .faq-arrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: auto;
            padding-top: 0.7rem;
            color: rgba(28, 28, 30, 0.36);
            transition: transform 420ms var(--xmb-ease), opacity 420ms var(--xmb-ease), color 420ms var(--xmb-ease);
            transform: none;
        }

        .faq-card.is-focused .faq-arrow {
            color: rgba(255, 255, 255, 0.92);
            transform: translateX(6px);
            opacity: 1;
        }

        .faq-card-meta {
            color: var(--xmb-text-faint);
            font-size: 0.66rem;
            letter-spacing: 0.22em;
        }

        .faq-card-title {
            color: var(--xmb-text-main);
            text-shadow: 0 8px 20px rgba(255, 255, 255, 0.16);
            margin-top: 0.1rem;
            font-size: clamp(1rem, 1.3vw, 1.35rem);
            line-height: 1.24;
        }

        .faq-card-copy {
            color: var(--xmb-text-soft);
            margin-top: 0.5rem;
            font-size: clamp(0.82rem, 0.95vw, 0.95rem);
            line-height: 1.5;
            max-width: 24ch;
            margin-left: auto;
            margin-right: auto;
        }

        .faq-card.is-prev .faq-icon-chip,
        .faq-card.is-next .faq-icon-chip {
            filter: none;
        }

        .faq-card[data-faq-type]:hover,
        .faq-card[data-faq-type]:focus-visible,
        .faq-card[data-faq-type].is-focused {
            box-shadow: 0 14px 28px rgba(28, 28, 30, 0.18) !important;
        }

        .faq-card.is-focused .faq-card-title,
        .faq-card.is-focused .faq-card-copy,
        .faq-card.is-focused .faq-card-meta {
            color: rgba(255, 255, 255, 0.96);
        }

        .faq-track-hint {
            color: rgba(122, 81, 44, 0.74);
        }

        .faq-modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 60;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.25rem;
            background: rgba(28, 28, 30, 0.32);
            backdrop-filter: blur(10px);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition:
                opacity 240ms var(--xmb-ease-soft),
                visibility 0ms linear 240ms;
        }

        .faq-modal-backdrop.is-open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transition:
                opacity 240ms var(--xmb-ease-soft),
                visibility 0ms linear 0ms;
        }

        .faq-modal-shell {
            position: relative;
            overflow: hidden;
            width: min(100%, 36rem);
            max-height: min(86vh, 42rem);
            margin: 0 auto;
            border: 1px solid rgba(255, 255, 255, 0.74);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(240, 253, 250, 0.72)),
                linear-gradient(140deg, rgba(204, 251, 241, 0.22), rgba(94, 234, 212, 0.08));
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.94),
                inset 0 14px 28px rgba(255, 255, 255, 0.22),
                0 30px 80px rgba(28, 28, 30, 0.12),
                0 0 40px rgba(20, 184, 166, 0.14);
            color: var(--xmb-text-main);
            opacity: 0;
            transform: translateY(1rem) scale(0.96);
            transition:
                transform 300ms var(--xmb-ease),
                opacity 220ms var(--xmb-ease-soft);
        }

        .faq-modal-backdrop.is-open .faq-modal-shell {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .faq-modal-shell::before,
        .faq-modal-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .faq-modal-shell::before {
            inset: -18% auto auto -8%;
            width: 13rem;
            height: 13rem;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.42), rgba(255, 255, 255, 0) 70%);
            opacity: 0.58;
        }

        .faq-modal-shell::after {
            inset: auto -12% -16% auto;
            width: 14rem;
            height: 14rem;
            border-radius: 50%;
            opacity: 0.36;
            animation: faqModalGlowPulse 5.8s var(--xmb-ease-soft) infinite;
        }

        .faq-modal-shell[data-tone="skm"]::after {
            background: radial-gradient(circle, rgba(139, 92, 246, 0.46), rgba(139, 92, 246, 0) 72%);
        }

        .faq-modal-shell[data-tone="tvet"]::after {
            background: radial-gradient(circle, rgba(245, 180, 33, 0.42), rgba(245, 180, 33, 0) 72%);
        }

        .faq-modal-content {
            position: relative;
            z-index: 1;
            overflow-y: auto;
            max-height: min(72vh, 34rem);
            padding-right: 0.25rem;
        }

        .faq-modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.35rem;
            height: 2.35rem;
            border: 0;
            border-radius: 999px;
            color: rgba(28, 28, 30, 0.6);
            background: rgba(255, 255, 255, 0.7);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.84),
                0 10px 18px rgba(28, 28, 30, 0.08);
            transition:
                transform 180ms var(--xmb-ease),
                color 180ms var(--xmb-ease),
                background 180ms var(--xmb-ease);
            cursor: pointer;
        }

        .faq-modal-close:hover,
        .faq-modal-close:focus-visible {
            color: var(--xmb-text-main);
            background: rgba(255, 255, 255, 0.92);
            transform: translateY(-1px);
            outline: none;
        }

        .faq-modal-kicker {
            display: inline-flex;
            align-items: center;
            padding: 0.45rem 0.8rem;
            border-radius: 999px;
            margin-bottom: 1rem;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(28, 28, 30, 0.64);
            background: rgba(255, 255, 255, 0.58);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.78),
                0 10px 20px rgba(28, 28, 30, 0.06);
        }

        .faq-modal-title {
            font-size: 1.75rem;
            line-height: 1.15;
            letter-spacing: -0.03em;
            margin-bottom: 1rem;
        }

        .faq-modal-lead,
        .faq-modal-paragraph,
        .faq-modal-list {
            position: relative;
            padding: 0;
            border-radius: 0;
            background: transparent;
            box-shadow: none;
            backdrop-filter: none;
        }

        .faq-modal-lead {
            margin-bottom: 1rem;
        }

        .faq-modal-list {
            padding-left: 1.5rem;
        }

        .faq-modal-list li + li {
            margin-top: 0.7rem;
        }

        .faq-modal-paragraph + .faq-modal-paragraph {
            margin-top: 0.95rem;
        }

        .faq-modal-shell h2 {
            color: var(--xmb-text-main);
        }

        .faq-modal-shell p,
        .faq-modal-shell li {
            color: rgba(28, 28, 30, 0.78);
            line-height: 1.9;
            font-weight: 400;
        }

        .faq-modal-shell li::marker {
            color: rgba(255, 122, 0, 0.82);
        }

        @keyframes faqFloat {
            0%,
            100% {
                transform: translateY(0) scale(var(--float-scale, 1));
            }
            50% {
                transform: translateY(-10px) scale(var(--float-scale, 1));
            }
        }

        @keyframes faqWaveDrift {
            0% {
                transform: translate3d(-3%, 0, 0) scaleY(1);
            }
            50% {
                transform: translate3d(2%, -1.5%, 0) scaleY(1.03);
            }
            100% {
                transform: translate3d(6%, 0, 0) scaleY(0.98);
            }
        }

        @keyframes faqWaveSway {
            0% {
                transform: translateX(-1%) scaleY(1);
            }
            100% {
                transform: translateX(3%) scaleY(1.08);
            }
        }

        @keyframes faqModalFloat {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes faqModalGlowPulse {
            0%,
            100% {
                opacity: 0.28;
                transform: scale(0.94);
            }
            50% {
                opacity: 0.46;
                transform: scale(1.04);
            }
        }

        @keyframes faqShineSweep {
            0% {
                background-position: 0 0, 0 0, -180% 0;
            }
            100% {
                background-position: 0 0, 0 0, 180% 0;
            }
        }

        @keyframes faqCardAura {
            0%,
            100% {
                opacity: 0.32;
                transform: scale(0.98);
            }
            50% {
                opacity: 0.56;
                transform: scale(1.04);
            }
        }

        @keyframes faqGlassBreath {
            0%,
            100% {
                opacity: 0.74;
            }
            50% {
                opacity: 0.96;
            }
        }

        @keyframes faqIconDrift {
            0%,
            100% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-4px) scale(1.02);
            }
        }

        @keyframes faqCarouselGlow {
            0%,
            100% {
                opacity: 0.46;
                transform: translate(-50%, -28%) scale(0.96);
            }
            50% {
                opacity: 0.78;
                transform: translate(-50%, -28%) scale(1.04);
            }
        }

        @media (min-width: 768px) {
            .faq-shell {
                padding-top: 3.5rem;
            }

            .faq-xmb-row {
                min-height: 21rem;
            }

            .faq-card {
                min-height: 16.4rem;
                padding: 1.35rem 1.3rem 1.2rem;
            }
        }

        @media (max-width: 767px) {
            .faq-track {
                overflow: hidden;
                padding-bottom: 0.25rem;
            }

            .faq-track::before {
                left: 0.5rem;
                right: 0.5rem;
                top: auto;
                bottom: 0.35rem;
                transform: none;
            }

            .faq-carousel-controls {
                gap: 0.55rem;
            }

            .faq-carousel-button {
                width: 2.8rem;
                height: 2.8rem;
            }

            .faq-xmb-row {
                min-height: 15.5rem;
                display: flex;
                justify-content: flex-start;
                gap: 0.9rem;
                overflow-x: auto;
                overflow-y: hidden;
                padding: 0.25rem 1rem 1.1rem;
                margin: 0 -1rem;
                scroll-snap-type: x mandatory;
                scroll-padding-inline: 1rem;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
                perspective: none;
            }

            .faq-xmb-row::-webkit-scrollbar {
                display: none;
            }

            .faq-card,
            .faq-card.is-focused,
            .faq-card.is-prev,
            .faq-card.is-next,
            .faq-card.is-hidden {
                position: relative;
                left: auto;
                top: auto;
                width: min(20.5rem, calc(100vw - 3.5rem));
                flex: 0 0 min(20.5rem, calc(100vw - 3.5rem));
                min-height: 10rem;
                opacity: 1;
                pointer-events: auto;
                z-index: auto;
                filter: none;
                transform: none;
                border-radius: 1.7rem;
                scroll-snap-align: center;
            }

            .faq-card {
                min-height: 13.9rem;
                padding: 1.05rem 0.95rem 0.95rem;
            }

            .faq-icon-chip {
                width: 3.8rem;
                height: 3.8rem;
            }

            .faq-card.is-hidden {
                display: flex;
            }

            .faq-modal-shell {
                padding: 1.4rem;
                width: 100%;
            }

            .faq-modal-title {
                font-size: 1.4rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .faq-modal-backdrop,
            .faq-wave-layer,
            .faq-wave-layer::before,
            .faq-wave-layer::after,
            .faq-hero,
            .faq-card,
            .faq-card::before,
            .faq-arrow,
            .faq-modal-shell,
            .faq-carousel-button {
                animation: none;
                transition: none;
            }

            .faq-track.has-focused-item .faq-card:not(.is-focused) {
                filter: none;
            }
        }
        /* ── DARK MODE ── */
        html.dark .faq-page {
            background: linear-gradient(180deg, #0f172a 0%, #1a1a2e 52%, #0f172a 100%);
        }
        html.dark .faq-wave-layer { opacity: 0.12; }
        html.dark .faq-card {
            background:
                linear-gradient(135deg, rgba(30,41,59,0.9), rgba(15,23,42,0.95));
            border-color: rgba(255,255,255,0.08);
            color: #f1f5f9;
        }
        html.dark .faq-card-title { color: #f1f5f9; text-shadow: none; }
        html.dark .faq-card-copy { color: rgba(203,213,225,0.85); }
        html.dark .faq-card-meta { color: rgba(148,163,184,0.8); }
        html.dark .faq-track-label { color: rgba(251,146,60,0.8); }
        html.dark .faq-category-title { color: #f8fafc; }
        html.dark .faq-track-hint { color: rgba(148,163,184,0.7); }
        html.dark .faq-modal-shell {
            background: linear-gradient(135deg, rgba(30,41,59,0.98), rgba(15,23,42,0.98));
            border-color: rgba(255,255,255,0.1);
            color: #f1f5f9;
        }
        html.dark .faq-modal-shell h2 { color: #f1f5f9; }
        html.dark .faq-modal-shell p,
        html.dark .faq-modal-shell li { color: rgba(203,213,225,0.9); }
        html.dark .faq-modal-close {
            background: rgba(30,41,59,0.9);
            color: #cbd5e1;
        }
        html.dark .faq-modal-close:hover { background: rgba(51,65,85,0.9); }

        html.dark .faq-hero {
            background: linear-gradient(90deg, #14b8a6 0%, #2dd4bf 56%, #5eead4 100%);
            border-color: rgba(94, 234, 212, 0.48);
            box-shadow:
                inset 0 1px 0 rgba(204, 251, 241, 0.44),
                0 24px 55px rgba(20, 184, 166, 0.22),
                0 0 46px rgba(45, 212, 191, 0.2);
        }
        html.dark .faq-hero-eyebrow,
        html.dark .faq-hero-title,
        html.dark .faq-hero-copy {
            color: #f1f5f9;
        }
        html.dark .faq-hero::after {
            border-color: rgba(94,234,212,0.15);
            box-shadow:
                0 0 0 1rem rgba(94,234,212,0.06),
                0 0 0 2rem rgba(94,234,212,0.03);
        }

        .faq-hero-inner {
            position: relative;
            display: grid;
            gap: 2.25rem;
            align-items: center;
        }

        .faq-hero-content {
            position: relative;
            z-index: 2;
        }

        .faq-hero-visual {
            position: relative;
            min-height: 15rem;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            z-index: 1;
        }

        .faq-neon-stage {
            position: relative;
            width: min(24rem, 100%);
            height: 15rem;
            border-radius: 2rem;
            background: transparent;
        }

        .faq-neon-stage::before,
        .faq-neon-stage::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
        }

        .faq-neon-stage::before {
            background:
                radial-gradient(circle at 50% 42%, rgba(96, 165, 250, 0.28), transparent 20%),
                radial-gradient(circle at 40% 58%, rgba(56, 189, 248, 0.18), transparent 18%),
                radial-gradient(circle at 62% 58%, rgba(125, 211, 252, 0.16), transparent 17%);
            filter: blur(16px);
            opacity: 0.95;
        }

        .faq-neon-stage::after {
            background:
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.12), transparent 8%),
                radial-gradient(circle at 50% 50%, rgba(59, 130, 246, 0.22), transparent 38%);
            opacity: 0.72;
        }

        .faq-neon-mark {
            position: absolute;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #c8f1ff;
            font-weight: 700;
            line-height: 1;
            text-shadow:
                0 0 4px rgba(255, 255, 255, 0.92),
                0 0 10px rgba(147, 197, 253, 0.96),
                0 0 18px rgba(96, 165, 250, 0.94),
                0 0 32px rgba(59, 130, 246, 0.92),
                0 0 56px rgba(56, 189, 248, 0.72);
            animation: faqNeonFloat 5.6s ease-in-out infinite, faqNeonPulse 3.2s ease-in-out infinite;
            will-change: transform, opacity, filter;
        }

        .faq-neon-mark::before {
            content: "?";
            position: absolute;
            inset: 0;
            color: rgba(186, 230, 253, 0.42);
            filter: blur(8px);
            z-index: -1;
        }

        .faq-neon-mark--large {
            left: 12%;
            top: 14%;
            font-size: 8.5rem;
            animation-delay: 0s, 0s;
        }

        .faq-neon-mark--mid {
            left: 42%;
            top: 30%;
            font-size: 6.1rem;
            animation-delay: -1.2s, -0.8s;
        }

        .faq-neon-mark--small {
            right: 12%;
            top: 12%;
            font-size: 7.1rem;
            animation-delay: -2.1s, -1.5s;
        }

        .faq-neon-aura {
            position: absolute;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(96, 165, 250, 0.32), rgba(59, 130, 246, 0) 70%);
            filter: blur(12px);
            opacity: 0.82;
            animation: faqNeonAura 5.8s ease-in-out infinite;
        }

        .faq-neon-aura--one {
            left: 16%;
            top: 24%;
            width: 7rem;
            height: 7rem;
        }

        .faq-neon-aura--two {
            left: 45%;
            top: 42%;
            width: 5.25rem;
            height: 5.25rem;
            animation-delay: -1.4s;
        }

        .faq-neon-aura--three {
            right: 14%;
            top: 22%;
            width: 6.4rem;
            height: 6.4rem;
            animation-delay: -2.3s;
        }

        @keyframes faqNeonFloat {
            0%, 100% {
                transform: translate3d(0, 0, 0) scale(1);
            }
            25% {
                transform: translate3d(0.3rem, -0.55rem, 0) scale(1.02);
            }
            50% {
                transform: translate3d(-0.2rem, 0.45rem, 0) scale(0.985);
            }
            75% {
                transform: translate3d(0.22rem, -0.28rem, 0) scale(1.01);
            }
        }

        @keyframes faqNeonPulse {
            0%, 100% {
                opacity: 0.92;
                filter: brightness(1) saturate(1);
            }
            50% {
                opacity: 1;
                filter: brightness(1.16) saturate(1.14);
            }
        }

        @keyframes faqNeonAura {
            0%, 100% {
                transform: scale(0.94);
                opacity: 0.64;
            }
            50% {
                transform: scale(1.08);
                opacity: 0.98;
            }
        }

        @media (min-width: 1024px) {
            .faq-hero-inner {
                grid-template-columns: minmax(0, 1.15fr) minmax(18rem, 0.85fr);
            }
        }

        @media (max-width: 1023px) {
            .faq-hero-visual {
                min-height: 12rem;
            }

            .faq-neon-stage {
                width: min(21rem, 100%);
                height: 12rem;
            }

            .faq-neon-mark--large {
                font-size: 6.5rem;
            }

            .faq-neon-mark--mid {
                font-size: 4.8rem;
            }

            .faq-neon-mark--small {
                font-size: 5.7rem;
            }
        }

        @media (max-width: 640px) {
            .faq-hero-inner {
                gap: 1.5rem;
            }

            .faq-hero-copy {
                max-width: none;
            }

            .faq-hero-visual {
                min-height: 10rem;
            }

            .faq-neon-stage {
                width: min(18rem, 100%);
                height: 10rem;
            }

            .faq-neon-mark--large {
                left: 8%;
                font-size: 5rem;
            }

            .faq-neon-mark--mid {
                left: 40%;
                top: 34%;
                font-size: 3.9rem;
            }

            .faq-neon-mark--small {
                right: 8%;
                font-size: 4.5rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .faq-neon-mark,
            .faq-neon-aura {
                animation: none;
            }
        }

        /* ── FAQ HERO FIGURE ── */
    </style>
</head>
<body class="faq-page text-neutral-900 transition-colors duration-300">
    
    @include('layouts.navigation')

    <div class="faq-wave-layer"></div>
    <div class="faq-wave-layer faq-wave-layer-secondary"></div>

    <main class="faq-shell max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="faq-hero rounded-[2.25rem] px-6 py-8 sm:px-8 sm:py-10 mb-12 relative overflow-hidden">
            <div class="faq-hero-inner">
                <div class="faq-hero-content">
                    <p class="faq-hero-eyebrow font-medium tracking-[0.38em] uppercase text-xs sm:text-sm">Pusat Bantuan</p>
                    <h2 class="faq-hero-title mt-4 text-4xl sm:text-5xl lg:text-6xl tracking-[-0.05em] max-w-3xl">
                        Soalan Lazim (FAQ)
                    </h2>
                    <p class="faq-hero-copy mt-5 max-w-2xl text-base sm:text-lg leading-8">
                        Jawapan kepada pertanyaan yang sering diajukan oleh pelajar dan ibu bapa.
                    </p>
                </div>
                <div class="faq-hero-visual" aria-hidden="true">
                    <div class="faq-neon-stage">
                        <span class="faq-neon-aura faq-neon-aura--one"></span>
                        <span class="faq-neon-aura faq-neon-aura--two"></span>
                        <span class="faq-neon-aura faq-neon-aura--three"></span>
                        <span class="faq-neon-mark faq-neon-mark--large">?</span>
                        <span class="faq-neon-mark faq-neon-mark--mid">?</span>
                        <span class="faq-neon-mark faq-neon-mark--small">?</span>
                    </div>
                </div>
            </div>
        </div>

        @php
            $faqCategories = [
                'tvet' => [
                    'label' => 'TVET',
                    'title' => 'TVET',
                    'description' => 'Soalan lazim berkaitan kursus kemahiran, sijil SKM, tempoh latihan dan peluang kerjaya TVET.',
                    'button_class' => 'bg-[linear-gradient(135deg,#fb923c,#ea580c)] text-white border-transparent shadow-[0_14px_32px_rgba(249,115,22,0.28)]',
                    'questions' => [
                        [
                            'question' => 'Apa itu Sijil Kemahiran Malaysia (SKM)?',
                            'answer' => 'SKM ialah sijil kemahiran yang dianugerahkan oleh Jabatan Pembangunan Kemahiran di bawah Kementerian Sumber Manusia. Sijil ini terdiri daripada:<ul class="mt-3 list-disc space-y-2 pl-6 text-slate-600"><li>Sijil Kemahiran Malaysia (SKM) Tahap 1</li><li>Sijil Kemahiran Malaysia (SKM) Tahap 2</li><li>Sijil Kemahiran Malaysia (SKM) Tahap 3</li><li>Diploma Kemahiran Malaysia (DKM) Tahap 4</li><li>Diploma Lanjutan Kemahiran Malaysia (DLKM) Tahap 5</li></ul>',
                        ],
                        [
                            'question' => 'Persijilan Kemahiran Malaysia boleh didapati melalui kaedah apa?',
                            'answer' => 'Persijilan Kemahiran Malaysia boleh diperoleh melalui tiga kaedah, iaitu Sistem Latihan Pusat Bertauliah (SLaPB), Akademi Dalam Industri (ADI), dan Pentauliahan Pencapaian Terdahulu (PPT). SLaPB melibatkan latihan di pusat bertauliah JPK, ADI menggabungkan latihan di industri dan institusi kemahiran, manakala PPT membolehkan calon mendapatkan persijilan melalui pengalaman kerja atau latihan terdahulu berdasarkan bukti keterampilan yang dinilai dan disahkan.',
                        ],
                        [
                            'question' => 'Apa itu Pusat Bertauliah (PB)?',
                            'answer' => 'Pusat Bertauliah (PB) ialah institusi latihan yang telah mendapat kelulusan dan pengiktirafan daripada Jabatan Pembangunan Kemahiran untuk menjalankan program latihan kemahiran serta mengeluarkan persijilan SKM.',
                        ],
                        [
                            'question' => 'Apakah faedah Persijilan Kemahiran Malaysia?',
                            'answer' => 'Persijilan Kemahiran Malaysia diiktiraf oleh industri di Malaysia, menyediakan laluan kerjaya dan pembangunan diri yang menarik setanding dengan laluan berasaskan kelayakan akademik, serta membantu melahirkan pekerja mahir yang terlatih dan berkelayakan untuk meningkatkan daya saing industri tempatan di pasaran dunia.',
                        ],
                        [
                            'question' => 'Apakah syarat kelayakan Persijilan Kemahiran Malaysia?',
                            'answer' => 'Antara syarat asas ialah boleh bertutur dan menulis dalam Bahasa Melayu atau Bahasa Inggeris, serta mempunyai SKM tahap yang lebih rendah untuk menyertai SKM tahap yang lebih tinggi dalam bidang kursus yang sama. Walau bagaimanapun, Pusat Bertauliah boleh menetapkan syarat tambahan kepada pelatih mereka.',
                        ],
                        [
                            'question' => 'Apa beza SKM dengan diploma akademik?',
                            'answer' => 'SKM lebih fokus kepada latihan praktikal dan kemahiran kerja sebenar, manakala diploma akademik lebih menekankan teori serta pembelajaran dalam kelas.',
                        ],
                        [
                            'question' => 'Betul ke pelajar TVET boleh berjaya walaupun bukan aliran akademik?',
                            'answer' => 'Ya. Hari ini industri lebih memerlukan tenaga kerja berkemahiran tinggi berbanding hanya kelulusan teori semata-mata. Ramai graduan TVET berjaya menjadi tenaga pakar, penyelia, usahawan dan pengurus industri.',
                        ],
                        [
                            'question' => 'Kenapa kerajaan sekarang sangat fokus kepada TVET?',
                            'answer' => 'TVET menjadi antara sektor utama pembangunan ekonomi negara untuk melahirkan tenaga kerja mahir yang diperlukan oleh industri tempatan dan antarabangsa.',
                        ],
                        [
                            'question' => 'TVET ini untuk pelajar lemah belajar sahaja ke?',
                            'answer' => 'Tidak. TVET sesuai untuk pelajar yang mempunyai bakat praktikal, kemahiran teknikal, kreativiti dan minat hands-on. Ramai pelajar cemerlang juga memilih laluan TVET kerana peluang kerjaya yang luas.',
                        ],
                        [
                            'question' => 'Boleh ke pelajar TVET sambung sampai ijazah?',
                            'answer' => 'Boleh. Laluan TVET sekarang sangat luas bermula daripada SKM, DKM, DLKM, Diploma dan seterusnya ke Ijazah, bergantung kepada bidang dan syarat institusi.',
                        ],
                    ],
                ],
                'diploma' => [
                    'label' => 'Diploma',
                    'title' => 'Diploma',
                    'description' => 'Soalan lazim berkaitan syarat kemasukan, struktur pengajian dan laluan selepas Diploma.',
                    'button_class' => 'bg-[linear-gradient(135deg,#7c3aed,#4c1d95)] text-white border-transparent shadow-[0_14px_32px_rgba(124,58,237,0.28)]',
                    'questions' => [
                        [
                            'question' => 'Apakah Program Usahasama di Universiti Teknologi MARA?',
                            'answer' => 'Program usahasama ialah kerjasama akademik antara UiTM dengan mana-mana IPTS atau institusi pendidikan yang dilantik bagi menawarkan program pengajian yang diiktiraf oleh UiTM.',
                        ],
                        [
                            'question' => 'Kalau kolej di bawah program ini dipanggil apa?',
                            'answer' => 'Kolej tersebut biasanya dipanggil Kolej Usahasama UiTM.',
                        ],
                        [
                            'question' => 'Adakah Program Usahasama sama seperti belajar terus di kampus utama UiTM?',
                            'answer' => 'Tidak sepenuhnya. Pelajar belajar di kolej usahasama tetapi mengikuti silibus, peperiksaan dan standard akademik yang ditetapkan oleh UiTM.',
                        ],
                        [
                            'question' => 'Adakah sijil Program Usahasama diiktiraf?',
                            'answer' => 'Ya, sijil atau diploma yang dianugerahkan diiktiraf tertakluk kepada kelulusan dan akreditasi program.',
                        ],
                        [
                            'question' => 'Bagaimana ibu bapa boleh memastikan Program Usahasama itu sah dan diiktiraf?',
                            'answer' => 'Ibu bapa disarankan menyemak status program melalui laman rasmi UiTM di <a href="https://iceps.uitm.edu.my/" target="_blank" rel="noopener noreferrer" class="font-semibold text-cyan-600 underline decoration-cyan-400 underline-offset-4 hover:text-cyan-700">https://iceps.uitm.edu.my/</a> dan pengiktirafan daripada MQA sebelum membuat pendaftaran.',
                        ],
                        [
                            'question' => 'Siapakah yang layak memohon Program Usahasama UiTM?',
                            'answer' => 'Pelajar lepasan SPM, STPM, diploma atau kelayakan lain yang memenuhi syarat akademik program yang ditawarkan.',
                        ],
                        [
                            'question' => 'Adakah Program Usahasama sesuai untuk pelajar yang tidak mendapat tempat di UiTM kampus utama?',
                            'answer' => 'Ya, program ini menjadi alternatif untuk pelajar yang masih ingin mengikuti program berasaskan silibus dan standard UiTM.',
                        ],
                        [
                            'question' => 'Adakah yuran Program Usahasama lebih mahal daripada UiTM biasa?',
                            'answer' => 'Kebiasaannya ya, kerana pengurusan dibuat oleh kolej usahasama. Namun jumlah yuran bergantung kepada program dan institusi terlibat.',
                        ],
                        [
                            'question' => 'Apakah bidang pengajian yang ditawarkan dalam Program Usahasama UiTM?',
                            'answer' => 'Bidang yang ditawarkan termasuk perniagaan, teknologi maklumat, perakaunan, hospitaliti, komunikasi dan lain-lain bergantung kepada kolej usahasama.',
                        ],
                        [
                            'question' => 'Apakah kelebihan menyertai Program Usahasama UiTM?',
                            'answer' => 'Antara kelebihannya ialah peluang melanjutkan pelajaran lebih luas, lokasi kampus yang pelbagai dan pembelajaran berasaskan silibus UiTM.',
                        ],
                        [
                            'question' => 'Bagaimanakah cara memohon Program Usahasama UiTM?',
                            'answer' => 'Permohonan boleh dibuat melalui kolej usahasama yang terlibat atau melalui saluran rasmi pengambilan yang ditetapkan.',
                        ],
                        [
                            'question' => 'Adakah pelajar Program Usahasama mendapat kemudahan seperti pelajar UiTM lain?',
                            'answer' => 'Kebanyakan pelajar mendapat akses kepada silibus, peperiksaan dan pengiktirafan akademik yang setara mengikut program.',
                        ],
                        [
                            'question' => 'Adakah Program Usahasama mempunyai latihan industri?',
                            'answer' => 'Ya, sesetengah program mewajibkan latihan industri bagi memberi pengalaman kerja sebelum tamat pengajian.',
                        ],
                        [
                            'question' => 'Apakah peluang kerjaya selepas tamat Program Usahasama UiTM?',
                            'answer' => 'Graduan boleh bekerja dalam sektor kerajaan, swasta atau menyambung pengajian ke peringkat lebih tinggi bergantung kepada bidang yang diambil.',
                        ],
                        [
                            'question' => 'Adakah pelajar Program Usahasama boleh menggunakan nama atau pengiktirafan UiTM pada sijil mereka?',
                            'answer' => 'Ya, tertakluk kepada program yang diluluskan dan struktur kerjasama akademik yang ditetapkan.',
                        ],
                    ],
                ],
                'sains-kesihatan' => [
                    'label' => 'Sains Kesihatan',
                    'title' => 'Sains Kesihatan',
                    'description' => 'Soalan lazim berkaitan bidang kesihatan, latihan klinikal dan prospek kerjaya dalam sektor kesihatan.',
                    'button_class' => 'bg-[linear-gradient(135deg,#2563eb,#0f172a)] text-white border-transparent shadow-[0_14px_32px_rgba(37,99,235,0.28)]',
                    'questions' => [
                        [
                            'question' => 'Adakah program di Murni International College diiktiraf?',
                            'answer' => 'Ya, program yang ditawarkan mendapat pengiktirafan daripada Kementerian Pengajian Tinggi (KPT), Malaysian Qualifications Agency (MQA), dan badan profesional berkaitan mengikut kursus yang diambil.',
                        ],
                        [
                            'question' => 'Bolehkah pelatih bekerja di hospital kerajaan?',
                            'answer' => 'Ya, graduan yang memenuhi syarat dan lulus peperiksaan atau proses pendaftaran badan profesional boleh memohon pekerjaan di hospital kerajaan ataupun swasta.',
                        ],
                        [
                            'question' => 'Adakah kursus kejururawatan berdaftar dengan LJM?',
                            'answer' => 'Ya, program Diploma Kejururawatan didaftarkan dan dipantau sepenuhnya oleh Nursing Board Malaysia (Lembaga Jururawat Malaysia - LJM).',
                        ],
                        [
                            'question' => 'Adakah program Medical Assistant berdaftar dengan Lembaga Pembantu Perubatan?',
                            'answer' => 'Ya, program berkaitan Pembantu Perubatan tertakluk kepada piawaian Lembaga Pembantu Perubatan Malaysia bagi memastikan pelatih layak untuk pendaftaran profesional selepas tamat pengajian.',
                        ],
                        [
                            'question' => 'Adakah pelajar menjalani latihan klinikal di hospital sebenar?',
                            'answer' => 'Ya, pelajar akan menjalani latihan klinikal di hospital kerajaan atau fasiliti kesihatan untuk mendapatkan pengalaman praktikal secara langsung.',
                        ],
                        [
                            'question' => 'Adakah sijil atau diploma kolej ini diiktiraf untuk sambung belajar?',
                            'answer' => 'Ya, pelatih boleh menyambung pengajian ke peringkat lebih tinggi tertakluk kepada syarat universiti atau institusi yang dipohon.',
                        ],
                        [
                            'question' => 'Bagaimana peluang pekerjaan selepas tamat belajar?',
                            'answer' => 'Bidang kesihatan mempunyai permintaan yang tinggi, jadi peluang pekerjaan dalam sektor kerajaan dan swasta adalah luas.',
                        ],
                        [
                            'question' => 'Adakah pensyarah mempunyai pengalaman dalam bidang kesihatan?',
                            'answer' => 'Ya, kebanyakan pensyarah terdiri daripada tenaga pengajar yang mempunyai pengalaman akademik dan klinikal dalam bidang masing-masing. Pembelajaran juga lebih berorientasikan industri kerana ramai tenaga pengajar mempunyai pengalaman akademik dan klinikal.',
                        ],
                        [
                            'question' => 'Apakah kemudahan yang disediakan untuk pelajar kesihatan?',
                            'answer' => 'Kolej menyediakan makmal kemahiran klinikal, bilik simulasi, perpustakaan, dan kemudahan pembelajaran yang lengkap seperti Mock Ward, Skill Lab, ICT Lab, Makmal Praktikal, Asrama, Student Centre dan lain-lain untuk menyokong latihan pelatih.',
                        ],
                        [
                            'question' => 'Ada kemudahan bantuan kewangan?',
                            'answer' => 'Pelajar boleh memohon PTPTN serta beberapa bantuan penajaan tertentu mengikut syarat semasa.',
                        ],
                        [
                            'question' => 'Mengapa ibu bapa perlu memilih Murni International College?',
                            'answer' => 'MURNI memberi penekanan kepada pendidikan kesihatan yang berkualiti, latihan praktikal, disiplin pelajar, dan persediaan kerjaya dalam sektor healthcare. MURNI berada di Bandar Baru Nilai yang dekat dengan KLIA, Putrajaya, kemudahan awam, restoran, dan kawasan yang student-friendly.',
                        ],
                    ],
                ],
            ];
        @endphp

        <section class="max-w-5xl mx-auto">
            <div class="flex flex-wrap justify-center gap-3 mb-8" id="faqCategoryTabs" role="tablist" aria-label="Kategori FAQ">
                @foreach ($faqCategories as $categoryKey => $category)
                    <button
                        type="button"
                        class="faq-category-tab inline-flex items-center justify-center rounded-full border border-white/70 bg-white/80 px-6 py-3 text-sm font-semibold uppercase tracking-[0.16em] text-slate-700 shadow-[0_10px_26px_rgba(15,23,42,0.08)] transition hover:-translate-y-0.5"
                        data-category-tab="{{ $categoryKey }}"
                        data-category-title="{{ $category['title'] }}"
                        data-category-description="{{ $category['description'] }}"
                        data-active-class="{{ $category['button_class'] }}"
                        role="tab"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                    >
                        {{ $category['label'] }}
                    </button>
                @endforeach
            </div>

            <div class="space-y-6" id="faqCategoryPanels">
                @foreach ($faqCategories as $categoryKey => $category)
                    <section
                        class="faq-category-panel rounded-[1.8rem] border border-white/70 bg-white/75 p-4 sm:p-6 shadow-[0_18px_44px_rgba(15,23,42,0.08)] backdrop-blur"
                        data-category-panel="{{ $categoryKey }}"
                        role="tabpanel"
                        @if (! $loop->first) hidden @endif
                    >
                        <div class="space-y-3">
                            @foreach ($category['questions'] as $questionIndex => $faq)
                                <article class="overflow-hidden rounded-[1.4rem] border border-slate-200/80 bg-white/85 shadow-[0_12px_28px_rgba(15,23,42,0.05)]">
                                    <button
                                        type="button"
                                        class="faq-accordion-trigger flex w-full items-center justify-between gap-4 px-5 py-4 text-left text-slate-900 transition hover:bg-slate-50/80"
                                        data-accordion-trigger
                                        aria-expanded="{{ $questionIndex === 0 ? 'true' : 'false' }}"
                                    >
                                        <span class="text-base sm:text-lg font-semibold leading-7">{{ $faq['question'] }}</span>
                                        <span class="faq-accordion-icon inline-flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-slate-700 transition">
                                            <i class="fa-solid fa-angle-down"></i>
                                        </span>
                                    </button>
                                    <div class="faq-accordion-panel px-5 pb-5 text-sm sm:text-base leading-7 text-slate-600" data-accordion-panel @if ($questionIndex !== 0) hidden @endif>
                                        {!! $faq['answer'] !!}
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>
        </section>
    </main>

    <script>
    (() => {
        const tabButtons = Array.from(document.querySelectorAll('[data-category-tab]'));
        const panels = Array.from(document.querySelectorAll('[data-category-panel]'));
        const inactiveButtonClass = 'border-white/70 bg-white/80 text-slate-700 shadow-[0_10px_26px_rgba(15,23,42,0.08)]';

        function closeAllAccordions(panel) {
            panel.querySelectorAll('[data-accordion-trigger]').forEach((trigger, index) => {
                const content = trigger.parentElement.querySelector('[data-accordion-panel]');
                const icon = trigger.querySelector('.faq-accordion-icon');
                const isFirst = index === 0;

                trigger.setAttribute('aria-expanded', isFirst ? 'true' : 'false');
                if (content) {
                    content.hidden = !isFirst;
                }
                if (icon) {
                    icon.classList.toggle('rotate-180', isFirst);
                    icon.classList.toggle('bg-slate-900', isFirst);
                    icon.classList.toggle('text-white', isFirst);
                    icon.classList.toggle('bg-slate-100', !isFirst);
                    icon.classList.toggle('text-slate-700', !isFirst);
                }
            });
        }

        function setActiveCategory(categoryKey) {
            tabButtons.forEach((button) => {
                const isActive = button.dataset.categoryTab === categoryKey;
                const activeClasses = (button.dataset.activeClass || '').split(' ').filter(Boolean);
                const inactiveClasses = inactiveButtonClass.split(' ').filter(Boolean);

                button.setAttribute('aria-selected', isActive ? 'true' : 'false');
                button.classList.toggle('scale-[1.02]', isActive);
                button.classList.toggle('-translate-y-0.5', isActive);

                activeClasses.forEach((className) => button.classList.toggle(className, isActive));
                inactiveClasses.forEach((className) => button.classList.toggle(className, !isActive));

            });

            panels.forEach((panel) => {
                const isActive = panel.dataset.categoryPanel === categoryKey;
                panel.hidden = !isActive;
                if (isActive) {
                    closeAllAccordions(panel);
                }
            });
        }

        document.querySelectorAll('[data-accordion-trigger]').forEach((trigger) => {
            trigger.addEventListener('click', () => {
                const panel = trigger.closest('[data-category-panel]');
                if (!panel) {
                    return;
                }

                panel.querySelectorAll('[data-accordion-trigger]').forEach((otherTrigger) => {
                    const otherPanel = otherTrigger.parentElement.querySelector('[data-accordion-panel]');
                    const otherIcon = otherTrigger.querySelector('.faq-accordion-icon');
                    const isCurrent = otherTrigger === trigger;
                    const shouldOpen = isCurrent && otherTrigger.getAttribute('aria-expanded') !== 'true';

                    otherTrigger.setAttribute('aria-expanded', shouldOpen ? 'true' : 'false');
                    if (otherPanel) {
                        otherPanel.hidden = !shouldOpen;
                    }

                    if (otherIcon) {
                        otherIcon.classList.toggle('rotate-180', shouldOpen);
                        otherIcon.classList.toggle('bg-slate-900', shouldOpen);
                        otherIcon.classList.toggle('text-white', shouldOpen);
                        otherIcon.classList.toggle('bg-slate-100', !shouldOpen);
                        otherIcon.classList.toggle('text-slate-700', !shouldOpen);
                    }
                });
            });
        });

        tabButtons.forEach((button) => {
            button.addEventListener('click', () => {
                setActiveCategory(button.dataset.categoryTab);
            });
        });

        if (tabButtons.length) {
            setActiveCategory(tabButtons[0].dataset.categoryTab);
        }
    })();
    </script>

    @include('components.social-float')
    @include('layouts.footer')

</body>
</html>

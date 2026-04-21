<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        :root {
            --brand-orange: #f97316;
            --brand-orange-soft: #fdba74;
            --brand-slate-deep: #0f172a;
            --brand-slate-mid: #1e293b;
            --brand-slate-light: #334155;
            --brand-blue-soft: #38bdf8;
        }

        .titleglass {
            font-family: "Prata", serif;
            word-break: break-word;
            text-shadow: 0 8px 24px rgba(15, 23, 42, 0.35), 0 0 18px rgba(255, 255, 255, 0.12);
            transform-origin: left center;
            transition: transform 0.45s ease, text-shadow 0.45s ease;
            animation: heroTitleFloat 7s ease-in-out infinite;
        }

        .titleglass-2 {
            font-family: "Montserrat", sans-serif;
            font-weight: 900;
            letter-spacing: -0.04em;
            background: linear-gradient(135deg, #ffd08a 0%, #ff8a1f 35%, #ffb347 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 8px 18px rgba(255, 138, 31, 0.35));
            position: relative;
            display: inline-block;
            transition: transform 0.45s ease, filter 0.45s ease;
            animation: heroAccentPulse 5.5s ease-in-out infinite;
        }

        .titleglass-2::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -0.14em;
            width: 100%;
            height: 0.16em;
            background: linear-gradient(90deg, rgba(255, 190, 92, 0.8), rgba(255, 255, 255, 0));
            transform: scaleX(0.7);
            transform-origin: left center;
            opacity: 0.85;
            pointer-events: none;
        }

        p { font-family: "Lexend Deca", sans-serif; font-weight: 500; } /* Sans-serif */
        h2 { font-family: "Montserrat", sans-serif; font-weight: 800; } /* Sans-serif Bold */
        a { font-family: "Lexend Deca", sans-serif; font-weight: 500; } /* Sans-serif Bold */
        h3 { font-family: "Montserrat", sans-serif; font-weight: 500; } /* Playful */

        .hero-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            background: transparent;
            border-color: rgba(249, 115, 22, 0.26);
            box-shadow: 0 18px 46px rgba(15, 23, 42, 0.34), inset 0 1px 0 rgba(255, 255, 255, 0.08);
        }

        .hero-card::before {
            content: "";
            position: absolute;
            top: -4rem;
            left: -3rem;
            width: 15rem;
            height: 15rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(249, 115, 22, 0.36), rgba(251, 146, 60, 0.08) 45%, rgba(255, 255, 255, 0) 72%);
            opacity: 0.95;
            pointer-events: none;
            z-index: -1;
            animation: heroGlow 8s ease-in-out infinite;
        }

        .hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            letter-spacing: 0.45em;
            text-shadow: 0 0 12px rgba(255, 255, 255, 0.25);
        }

        .hero-kicker::before {
            content: "";
            width: 2.5rem;
            height: 1px;
            background: rgba(255, 255, 255, 0.45);
        }

        .hero-body {
            text-shadow: 0 4px 16px rgba(15, 23, 42, 0.2);
            transition: transform 0.45s ease, color 0.45s ease;
        }

        .hero-vision {
            margin-top: 1.5rem;
            padding: 1rem 1.1rem;
            border: 1px solid rgba(251, 146, 60, 0.28);
            background: linear-gradient(140deg, rgba(30, 41, 59, 0.68), rgba(15, 23, 42, 0.48));
            backdrop-filter: blur(12px);
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.2);
            transition: transform 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease, background-color 0.4s ease;
        }

        .hero-vision-label {
            display: inline-block;
            margin-bottom: 0.65rem;
            font-family: "Montserrat", sans-serif;
            font-size: clamp(1.2rem, 2.8vw, 1.8rem);
            font-weight: 900;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            background: linear-gradient(120deg, #ffedd5 0%, #fb923c 42%, #f97316 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 16px rgba(249, 115, 22, 0.2);
        }

        .hero-vision-text {
            font-size: 0.86rem;
            line-height: 1.75;
            color: rgba(241, 245, 249, 0.94);
            text-shadow: 0 4px 14px rgba(15, 23, 42, 0.24);
        }

        .hero-cta {
            position: relative;
            letter-spacing: 0.28em;
            color: #fff;
            border-color: rgba(251, 146, 60, 0.6) !important;
            background: linear-gradient(120deg, rgba(249, 115, 22, 0.84), rgba(234, 88, 12, 0.88));
            box-shadow: 0 18px 36px rgba(249, 115, 22, 0.28), 0 8px 20px rgba(15, 23, 42, 0.24);
            transition: transform 0.35s ease, box-shadow 0.35s ease, filter 0.35s ease;
        }

        .hero-card:hover .titleglass {
            transform: translateX(4px) scale(1.01);
            text-shadow: 0 12px 28px rgba(15, 23, 42, 0.42), 0 0 24px rgba(255, 255, 255, 0.18);
        }

        .hero-card:hover .titleglass-2 {
            transform: translateX(8px) scale(1.02);
            filter: drop-shadow(0 10px 24px rgba(255, 138, 31, 0.45));
        }

        .hero-card:hover .hero-body {
            transform: translateX(4px);
            color: rgba(255, 255, 255, 0.92);
        }

        .hero-card:hover .hero-vision {
            transform: translateX(6px);
            border-color: rgba(251, 146, 60, 0.6);
            background: linear-gradient(140deg, rgba(51, 65, 85, 0.76), rgba(15, 23, 42, 0.58));
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.24);
        }

        .hero-cta:hover {
            transform: translateY(-2px);
            filter: brightness(1.06);
            box-shadow: 0 22px 42px rgba(249, 115, 22, 0.34), 0 10px 24px rgba(15, 23, 42, 0.26);
        }

        @keyframes heroTitleFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
        }

        @keyframes heroAccentPulse {
            0%, 100% { transform: translateX(0) scale(1); }
            50% { transform: translateX(3px) scale(1.015); }
        }

        @keyframes heroGlow {
            0%, 100% { transform: scale(1); opacity: 0.75; }
            50% { transform: scale(1.08); opacity: 1; }
        }

        html,
        body {
            height: 100%;
        }

        .welcome-page {
            overflow: hidden;
        }

        .snap-container {
            height: 100svh;
            overflow-y: auto;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
            overscroll-behavior-y: contain;
            -webkit-overflow-scrolling: touch;
        }

        .snap-section {
            min-height: 100svh;
            scroll-snap-align: start;
            scroll-snap-stop: always;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 5rem 0 2rem;
        }

        /* Hero section (first slide) — no top padding, image fills edge-to-edge */
        .snap-section:first-child {
            padding-top: 0;
        }

        .snap-section.footer-slide {
            min-height: unset;
            height: auto;
            align-items: flex-start;
            padding: 0;
        }

        .section-content {
            opacity: 0;
            transform: translateY(32px) scale(0.985);
            transition: opacity 0.65s ease, transform 0.65s ease;
            will-change: transform, opacity;
        }

        .snap-section.is-active .section-content {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .story-panel {
            width: min(92vw, 960px);
            border-radius: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.34);
            background:
                linear-gradient(145deg, rgba(15, 23, 42, 0.58), rgba(30, 41, 59, 0.38)),
                linear-gradient(120deg, rgba(249, 115, 22, 0.12), rgba(56, 189, 248, 0.06));
            backdrop-filter: blur(22px) saturate(140%);
            -webkit-backdrop-filter: blur(22px) saturate(140%);
            padding: clamp(1.4rem, 3vw, 2.5rem);
            box-shadow:
                0 26px 64px rgba(15, 23, 42, 0.26),
                inset 0 1px 0 rgba(255, 255, 255, 0.34),
                inset 0 -12px 24px rgba(15, 23, 42, 0.14);
            position: relative;
            isolation: isolate;
            overflow: hidden;
            transition: transform 0.45s ease, box-shadow 0.45s ease, border-color 0.45s ease;
        }

        .story-panel::before,
        .story-panel::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .story-panel::before {
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(120deg, rgba(255, 255, 255, 0.22), rgba(255, 255, 255, 0.02) 32%, rgba(255, 255, 255, 0) 62%);
            z-index: 0;
        }

        .story-panel::after {
            width: 14rem;
            height: 14rem;
            top: -4.5rem;
            right: -3.5rem;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 176, 94, 0.44), rgba(255, 176, 94, 0) 72%);
            opacity: 0.62;
            animation: heroGlow 8s ease-in-out infinite;
        }

        .story-panel .hero-vision-label {
            margin-bottom: 0.9rem;
            letter-spacing: 0.18em;
            text-shadow: 0 4px 18px rgba(249, 115, 22, 0.22);
        }

        .story-panel .hero-vision-text {
            font-size: clamp(0.95rem, 1.45vw, 1.2rem);
            line-height: 1.9;
            color: rgba(241, 245, 249, 0.94);
            text-shadow: 0 8px 22px rgba(15, 23, 42, 0.22);
        }

        /* ── STORY SLIDE ANIMATIONS ── */
        .story-pair-wrapper {
            display: flex;
            gap: clamp(1rem, 2.5vw, 2rem);
            width: min(96vw, 1100px);
            align-items: stretch;
        }
        .story-pair-wrapper .story-panel {
            flex: 1;
        }
        @media (max-width: 640px) {
            .story-pair-wrapper {
                flex-direction: column;
            }
        }
        /* Panel itself: slides up from below */
        .story-panel {
            opacity: 0;
            transform: translateY(48px) scale(0.97);
            transition: opacity 0.7s cubic-bezier(0.22,1,0.36,1),
                        transform 0.7s cubic-bezier(0.22,1,0.36,1);
        }
        /* Left panel slides from left, right panel from right */
        .story-panel--left {
            transform: translateX(-60px) rotate(-0.8deg) scale(0.97);
        }
        .story-panel--right {
            transform: translateX(60px) rotate(0.8deg) scale(0.97);
            transition-delay: 0.12s;
        }
        .snap-section.is-active .story-panel {
            opacity: 1;
            transform: translateX(0) rotate(0deg) scale(1);
        }

        .snap-section.is-active .story-panel:hover {
            transform: translateY(-8px) scale(1.015);
            border-color: rgba(255, 255, 255, 0.48);
            box-shadow:
                0 32px 68px rgba(15, 23, 42, 0.32),
                inset 0 1px 0 rgba(255, 255, 255, 0.36),
                inset 0 -14px 28px rgba(15, 23, 42, 0.16);
        }
        /* Label: slides in from the left */
        .story-label {
            display: block;
            text-align: center;
            opacity: 0;
            transform: translateX(-40px);
            transition: opacity 0.55s ease 0.25s,
                        transform 0.55s cubic-bezier(0.22,1,0.36,1) 0.25s;
        }
        .snap-section.is-active .story-label {
            opacity: 1;
            transform: translateX(0);
        }
        /* Accent line: expands from center */
        .story-accent-line {
            display: block;
            height: 3px;
            width: 0;
            background: linear-gradient(90deg, rgba(255, 147, 72, 0.96), rgba(255, 233, 186, 0.72), rgba(255, 147, 72, 0.2));
            border-radius: 2px;
            margin: 0.5rem auto 1.2rem;
            box-shadow: 0 0 18px rgba(255, 147, 72, 0.35);
            transition: width 0.6s cubic-bezier(0.22,1,0.36,1) 0.45s;
        }
        .snap-section.is-active .story-accent-line {
            width: 3.5rem;
        }
        /* Text: centered, fades up in chunks via nth-child spans */
        .story-text-line {
            display: block;
            text-align: center;
            opacity: 0;
            transform: translateY(18px);
            letter-spacing: 0.01em;
            transition: opacity 0.55s ease, transform 0.55s cubic-bezier(0.22,1,0.36,1);
        }
        .story-text-line:nth-child(1) { transition-delay: 0.55s; }
        .story-text-line:nth-child(2) { transition-delay: 0.7s;  }
        .story-text-line:nth-child(3) { transition-delay: 0.85s; }
        .snap-section.is-active .story-text-line {
            opacity: 1;
            transform: translateY(0);
        }
        /* ── END STORY SLIDE ANIMATIONS ── */

        .story-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 18% 24%, rgba(251, 146, 60, 0.2), transparent 34%),
                radial-gradient(circle at 82% 72%, rgba(56, 189, 248, 0.16), transparent 42%),
                linear-gradient(180deg, rgba(15, 23, 42, 0.2), rgba(15, 23, 42, 0.04));
            pointer-events: none;
        }

        @media (max-width: 1024px) {
            .snap-section {
                padding-top: 4.5rem;
            }
            /* Hero slide always edge-to-edge */
            .snap-section:first-child {
                padding-top: 0;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .snap-container {
                scroll-behavior: auto;
            }

            .section-content,
            .titleglass,
            .titleglass-2,
            .hero-card::before {
                animation: none !important;
                transition: none !important;
            }
        }

        .welcome-page {
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
            background:
                radial-gradient(circle at top left, rgba(56, 189, 248, 0.16), transparent 20%),
                radial-gradient(circle at top right, rgba(251, 146, 60, 0.14), transparent 23%),
                radial-gradient(circle at bottom right, rgba(249, 115, 22, 0.12), transparent 24%),
                linear-gradient(180deg, #f8fafc 0%, #eef2f7 48%, #f8fafc 100%);
        }

        .welcome-page::before,
        .welcome-page::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .welcome-page::before {
            top: 1rem;
            left: -4rem;
            width: 15rem;
            height: 15rem;
            border-radius: 999px;
            background:
                radial-gradient(circle, rgba(56, 189, 248, 0.18), rgba(56, 189, 248, 0) 64%),
                repeating-radial-gradient(circle, rgba(56, 189, 248, 0.08) 0 2px, transparent 2px 16px);
            box-shadow: 0 0 70px rgba(56, 189, 248, 0.14);
        }

        .welcome-page::after {
            right: -4rem;
            bottom: 2rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background:
                radial-gradient(circle, rgba(249, 115, 22, 0.18), rgba(249, 115, 22, 0) 66%),
                repeating-radial-gradient(circle, rgba(249, 115, 22, 0.08) 0 2px, transparent 2px 18px);
            box-shadow: 0 0 80px rgba(249, 115, 22, 0.14);
        }

        /* ── STAT CARDS ── */
        .stats-section {
            background:
                radial-gradient(ellipse at 15% 50%, rgba(251,146,60,0.1) 0%, transparent 45%),
                radial-gradient(ellipse at 85% 50%, rgba(56,189,248,0.08) 0%, transparent 45%),
                linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
            position: relative;
            overflow: hidden;
        }
        .stats-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(15,23,42,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(15,23,42,0.04) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
        }
        .stats-section::after { content: none; }
        .stats-heading-label {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: rgba(234,88,12,0.8);
        }
        .stats-heading-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(1.6rem, 3.5vw, 2.8rem);
            font-weight: 900;
            color: #0f172a;
            line-height: 1.1;
        }
        .stats-heading-title span {
            background: linear-gradient(120deg, #ea580c 0%, #f97316 50%, #fb923c 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .stat-card {
            position: relative;
            background: #ffffff;
            border: 1px solid rgba(15,23,42,0.08);
            border-radius: 1.5rem;
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.6rem;
            cursor: default;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(15,23,42,0.07);
            transition: transform 0.35s cubic-bezier(0.23,1,0.32,1),
                        border-color 0.35s ease,
                        box-shadow 0.35s ease;
        }
        .stat-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.35s ease;
            pointer-events: none;
        }
        .stat-card.orange::before {
            background: radial-gradient(circle at 50% 0%, rgba(249,115,22,0.1), transparent 65%);
        }
        .stat-card.cyan::before {
            background: radial-gradient(circle at 50% 0%, rgba(56,189,248,0.1), transparent 65%);
        }
        .stat-card:hover {
            transform: translateY(-8px) scale(1.03);
            border-color: rgba(249,115,22,0.4);
            box-shadow: 0 20px 44px rgba(249,115,22,0.14), 0 4px 12px rgba(15,23,42,0.08);
        }
        .stat-card.cyan:hover {
            border-color: rgba(56,189,248,0.4);
            box-shadow: 0 20px 44px rgba(56,189,248,0.14), 0 4px 12px rgba(15,23,42,0.08);
        }
        .stat-card:hover::before { opacity: 1; }
        .stat-icon {
            width: 2.8rem;
            height: 2.8rem;
            border-radius: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 0.2rem;
            flex-shrink: 0;
        }
        .stat-icon.orange { background: rgba(249,115,22,0.12); color: #f97316; }
        .stat-icon.cyan   { background: rgba(56,189,248,0.12);  color: #0ea5e9; }
        .stat-number {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(2.4rem, 5vw, 3.6rem);
            font-weight: 900;
            line-height: 1;
            background: linear-gradient(140deg, #ea580c 0%, #f97316 50%, #fb923c 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .stat-card.cyan .stat-number {
            background: linear-gradient(140deg, #0284c7 0%, #0ea5e9 50%, #38bdf8 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .stat-label {
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            color: rgba(15,23,42,0.5);
            text-align: center;
        }
        .stat-divider {
            width: 2rem;
            height: 2px;
            border-radius: 1px;
            background: linear-gradient(90deg, rgba(249,115,22,0.6), transparent);
            margin: 0.1rem 0;
        }
        .stat-card.cyan .stat-divider {
            background: linear-gradient(90deg, rgba(56,189,248,0.6), transparent);
        }
        /* ── END STAT CARDS ── */

        /* ── PROGRAM POPULAR SECTION ── */
        .program-section {
            background:
                radial-gradient(ellipse at 8% 60%, rgba(251,146,60,0.09) 0%, transparent 42%),
                radial-gradient(ellipse at 92% 30%, rgba(56,189,248,0.07) 0%, transparent 42%),
                linear-gradient(180deg, #f1f5f9 0%, #f8fafc 100%);
            position: relative;
            overflow: hidden;
        }
        .program-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(0deg, rgba(15,23,42,0.025) 0px, rgba(15,23,42,0.025) 1px, transparent 1px, transparent 48px),
                repeating-linear-gradient(90deg, rgba(15,23,42,0.025) 0px, rgba(15,23,42,0.025) 1px, transparent 1px, transparent 48px);
            pointer-events: none;
        }
        .program-section::after {
            content: '';
            position: absolute;
            width: 600px; height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249,115,22,0.07), transparent 65%);
            top: -180px; right: -160px;
            pointer-events: none;
            animation: progOrbFloat 9s ease-in-out infinite;
        }
        @keyframes progOrbFloat {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-22px) scale(1.05); }
        }
        .program-section-heading-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: rgba(234,88,12,0.85);
        }
        .program-section-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(1.8rem, 4vw, 3rem);
            font-weight: 900;
            color: #0f172a;
            line-height: 1.05;
        }
        .program-section-title span {
            background: linear-gradient(120deg, #ea580c 0%, #f97316 55%, #fb923c 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .program-section .text-slate-500 { color: rgba(71,85,105,0.85) !important; }
        /* ─ Feature rows (right side) ─ */
        .prog-feat-col {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            justify-content: center;
        }
        .prog-feat-row {
            display: flex;
            align-items: flex-start;
            gap: 1.1rem;
            padding: 1.2rem 1.3rem;
            border-radius: 1.2rem;
            background: #ffffff;
            border: 1px solid rgba(15,23,42,0.07);
            box-shadow: 0 2px 12px rgba(15,23,42,0.05);
            transition: transform 0.32s cubic-bezier(0.23,1,0.32,1),
                        box-shadow 0.32s ease, border-color 0.32s ease;
            cursor: default;
        }
        .prog-feat-row:hover {
            transform: translateY(-3px) scale(1.01);
            box-shadow: 0 12px 36px rgba(249,115,22,0.1), 0 2px 10px rgba(15,23,42,0.06);
            border-color: rgba(249,115,22,0.28);
        }
        .prog-feat-row.row--cyan:hover {
            box-shadow: 0 12px 36px rgba(56,189,248,0.1), 0 2px 10px rgba(15,23,42,0.06);
            border-color: rgba(56,189,248,0.28);
        }
        .prog-feat-row.row--slate:hover {
            box-shadow: 0 12px 36px rgba(100,116,139,0.1), 0 2px 10px rgba(15,23,42,0.06);
            border-color: rgba(100,116,139,0.25);
        }
        .prog-feat-icon {
            flex-shrink: 0;
            width: 2.8rem; height: 2.8rem;
            border-radius: 0.9rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
        }
        .prog-feat-icon.ic--orange { background: rgba(249,115,22,0.1); }
        .prog-feat-icon.ic--cyan   { background: rgba(56,189,248,0.1); }
        .prog-feat-icon.ic--slate  { background: rgba(100,116,139,0.08); }
        .prog-feat-body { flex: 1; min-width: 0; }
        .prog-feat-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.92rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 0.25rem;
            transition: color 0.25s ease;
        }
        .prog-feat-row:hover .prog-feat-title { color: #f97316; }
        .prog-feat-row.row--cyan:hover .prog-feat-title { color: #0ea5e9; }
        .prog-feat-row.row--slate:hover .prog-feat-title { color: #475569; }
        .prog-feat-desc {
            font-size: 0.79rem;
            color: rgba(15,23,42,0.50);
            line-height: 1.6;
        }
        .prog-feat-row--featured {
            background: linear-gradient(135deg, rgba(255,247,237,0.9), rgba(255,255,255,0.95));
            border-color: rgba(249,115,22,0.2);
            box-shadow: 0 4px 20px rgba(249,115,22,0.09);
        }
        .prog-feat-row--featured .prog-feat-title { color: #f97316; }
        /* ─ Video Panel ─ */
        .video-panel {
            position: relative;
            height: 100%;
            min-height: 400px;
            border-radius: 2rem;
            overflow: hidden;
            box-shadow: 0 32px 80px rgba(15,23,42,0.18), 0 0 0 1px rgba(255,255,255,0.55);
            border: 1px solid rgba(255,255,255,0.55);
            cursor: pointer;
            transition: transform 0.5s cubic-bezier(0.23,1,0.32,1), box-shadow 0.5s ease;
        }
        .video-panel:hover {
            transform: perspective(1200px) rotateY(2deg) scale(1.015);
            box-shadow: 0 48px 100px rgba(15,23,42,0.24),
                        0 0 0 1px rgba(255,255,255,0.7),
                        0 0 40px rgba(249,115,22,0.08);
        }
        .video-panel video {
            width: 100%; height: 100%;
            object-fit: cover; display: block;
            transition: transform 0.6s cubic-bezier(0.23,1,0.32,1);
        }
        .video-panel:hover video { transform: scale(1.05); }
        .video-panel-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(15,23,42,0.94) 0%, rgba(15,23,42,0.14) 46%, transparent 70%);
            pointer-events: none; z-index: 1;
            transition: background 0.4s ease;
        }
        .video-panel:hover .video-panel-overlay {
            background: linear-gradient(to top, rgba(15,23,42,0.88) 0%, rgba(15,23,42,0.06) 46%, transparent 70%);
        }
        .video-panel-badge {
            position: absolute; top: 1.25rem; left: 1.25rem;
            display: inline-flex; align-items: center; gap: 0.5rem;
            border-radius: 999px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.22);
            backdrop-filter: blur(12px);
            padding: 0.4rem 1rem;
            font-size: 0.72rem; color: #fff; font-weight: 600; letter-spacing: 0.06em;
            z-index: 2;
            transition: background 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
        }
        .video-panel:hover .video-panel-badge {
            background: rgba(249,115,22,0.22);
            border-color: rgba(249,115,22,0.4);
            transform: translateY(-2px);
        }
        /* Floating stat chips */
        .video-chip {
            position: absolute; z-index: 3;
            display: inline-flex; align-items: center; gap: 0.45rem;
            border-radius: 0.9rem;
            background: rgba(15,23,42,0.75);
            border: 1px solid rgba(255,255,255,0.12);
            backdrop-filter: blur(10px);
            padding: 0.55rem 1rem;
            font-size: 0.72rem; font-weight: 700; color: rgba(241,245,249,0.85);
            pointer-events: none;
            opacity: 0; transform: translateX(12px);
            transition: opacity 0.35s ease, transform 0.35s cubic-bezier(0.23,1,0.32,1);
        }
        .video-chip .chip-val {
            font-size: 1rem; font-weight: 900;
            font-family: 'Montserrat', sans-serif;
            color: #fb923c;
        }
        .video-chip.chip-1 { top: 4.5rem; right: 1.2rem; transition-delay: 0.06s; }
        .video-chip.chip-2 { top: 8.2rem; right: 1.2rem; transition-delay: 0.15s; }
        .video-panel:hover .video-chip { opacity: 1; transform: translateX(0); }
        .video-panel-footer {
            position: absolute; inset-x: 0; bottom: 0;
            padding: 1.8rem 2rem; z-index: 2;
        }
        .video-panel-tags {
            font-size: 0.62rem; letter-spacing: 0.28em;
            text-transform: uppercase;
            color: rgba(241,245,249,0.42); margin-bottom: 0.5rem;
        }
        .video-panel-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(1rem, 2vw, 1.35rem);
            font-weight: 700; color: #fff; line-height: 1.3;
            max-width: 28rem;
            transition: transform 0.35s ease;
        }
        .video-panel:hover .video-panel-title { transform: translateY(-3px); }
        .video-cta {
            display: inline-flex; align-items: center; gap: 0.5rem;
            border-radius: 999px;
            background: linear-gradient(120deg, rgba(249,115,22,0.95), rgba(234,88,12,1));
            padding: 0.7rem 1.5rem;
            font-size: 0.82rem; font-weight: 700; color: #fff;
            text-decoration: none;
            box-shadow: 0 8px 24px rgba(249,115,22,0.36);
            transition: transform 0.2s ease, gap 0.2s ease, box-shadow 0.2s ease;
            flex-shrink: 0;
        }
        .video-cta:hover {
            transform: translateY(-2px);
            gap: 0.8rem;
            box-shadow: 0 14px 32px rgba(249,115,22,0.46);
        }
        /* ── END PROGRAM POPULAR SECTION ── */

        .intro-overlay {
            transition: opacity 0.6s ease, visibility 0.6s ease;
            opacity: 1;
            visibility: visible;
        }

        .intro-overlay.hide {
            opacity: 0;
            visibility: hidden;
        }
                
        .slideshow-container {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: -1; 
        background: #000;
        }

        .slide {
        position: absolute;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0;
        /* Total duration: 20s, looping infinitely */
        animation: fadeLoop 10s infinite;
        }

        /* Staggered Delays (Total Duration / Number of Images) */
        /* 20s / 5 = 4s intervals */
        .slide:nth-child(1) { animation-delay: 0s; }
        .slide:nth-child(2) { animation-delay: 2s; }
        .slide:nth-child(3) { animation-delay: 4s; }
        .slide:nth-child(4) { animation-delay: 6s; }
        .slide:nth-child(5) { animation-delay: 8s; }

        @keyframes fadeLoop {
        0% { opacity: 0; }
        10% { opacity: 1; }  /* Fade in */
        20% { opacity: 1; }  /* Stay visible */
        30% { opacity: 0; }  /* Fade out */
        100% { opacity: 0; } /* Stay hidden until next loop */
        }
        /* ── DARK MODE OVERRIDES ── */
        html.dark .welcome-page {
            background:
                radial-gradient(circle at top left, rgba(56, 189, 248, 0.10), transparent 20%),
                radial-gradient(circle at top right, rgba(251, 146, 60, 0.08), transparent 23%),
                radial-gradient(circle at bottom right, rgba(249, 115, 22, 0.06), transparent 24%),
                linear-gradient(180deg, #0f172a 0%, #1e293b 48%, #0f172a 100%);
        }
        html.dark .stats-section {
            background:
                radial-gradient(ellipse at 15% 50%, rgba(251,146,60,0.06) 0%, transparent 45%),
                radial-gradient(ellipse at 85% 50%, rgba(56,189,248,0.05) 0%, transparent 45%),
                linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
        }
        html.dark .program-section {
            background:
                radial-gradient(ellipse at 8% 60%, rgba(251,146,60,0.06) 0%, transparent 42%),
                radial-gradient(ellipse at 92% 30%, rgba(56,189,248,0.05) 0%, transparent 42%),
                linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        }
        html.dark .stats-heading-title,
        html.dark .program-section-title {
            color: #f8fafc;
        }
        html.dark .stat-card,
        html.dark .prog-feat-row {
            background: #1e293b;
            border-color: rgba(255,255,255,0.08);
            box-shadow: 0 4px 24px rgba(0,0,0,0.2);
        }
        html.dark .stat-label {
            color: rgba(248,250,252,0.7);
        }
        html.dark .prog-feat-title {
            color: #f8fafc;
        }
        html.dark .prog-feat-desc {
            color: rgba(248,250,252,0.6);
        }
        html.dark .prog-feat-row--featured {
            background: linear-gradient(135deg, rgba(30,41,59,0.9), rgba(15,23,42,0.95));
            border-color: rgba(249,115,22,0.4);
        }
        html.dark .program-section .text-slate-500 {
            color: rgba(148,163,184,0.85) !important;
        }
        html.dark .stats-section::before,
        html.dark .program-section::before {
            background-image:
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
        }
    </style>
</head>
<body class="welcome-page text-slate-800 dark:text-slate-200 no-bg transition-colors duration-300">
    <!-- <div class="slideshow-container">
        <div class="slide" style="background-image: url('{{ asset('images/background/Frame1.png') }}');"></div>
        <div class="slide" style="background-image: url('{{ asset('images/background/Frame2.png') }}');"></div>
        <div class="slide" style="background-image: url('{{ asset('images/background/Frame3.png') }}');"></div>
        <div class="slide" style="background-image: url('{{ asset('images/background/Frame4.png') }}');"></div>
        <div class="slide" style="background-image: url('{{ asset('images/background/Frame5.png') }}');"></div>
    </div> -->
    <div id="introOverlay" class="intro-overlay fixed inset-0 z-[9999] bg-black text-white flex items-center justify-center">
        <div class="absolute inset-0 bg-black/95"></div>
        <div id="introStart" class="relative z-10 flex flex-col items-center justify-center gap-6 px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold">Selamat Datang ke UPKB</h1>
            <button id="startIntroButton" class="bg-orange-500 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-orange-600 transition">Start Now</button>
        </div>
        <video id="introVideo" class="relative hidden w-full h-full object-cover" playsinline>
            <source src="{{ asset('videos/IntroUPKB.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <main id="snapContainer" class="snap-container">
    {{-- 🔹 IKLAN SECTION --}}
    <section class="snap-section is-active relative w-full">
    
   {{-- 🔹 GLASS CONTENT --}}
        <div class="absolute z-30 
                    /* Mobile: Centered horizontally,*/
                    inset-x-8 top-1/2 -translate-y-1/2 px-6 
                    /* Desktop: Reset to your original left-aligned look */
                    lg:left-20 lg:top-1/2 lg:-translate-y-1/2 lg:bottom-auto lg:px-0 lg:max-w-xl">
            
            <div class="hero-card section-content bg-white/10 backdrop-blur-2xl rounded-3xl p-6 md:p-10 shadow-2xl border border-white/20 ring-1 ring-white/10 mx-auto lg:mx-0">

                    <h2 class="titleglass text-2xl md:text-4xl lg:text-5xl text-white leading-[0.95] uppercase tracking-tight drop-shadow-2xl">
                        UNIT PEMBANGUNAN <br class="hidden md:block"> 
                </h2>

                    <h2 class="titleglass-2 text-2xl md:text-4xl lg:text-5xl text-orange-400 leading-[0.95] uppercase tracking-tight drop-shadow-2xl">
                        KEMAHIRAN BELIA
                </h2>

                    <p class="hero-body cubafont text-xs md:text-sm lg:text-sm text-white/80 mt-6 md:mt-8 max-w-md lg:max-w-lg leading-relaxed tracking-wide border-l border-white/30 pl-4">
                        UNIT PEMBANGUNAN KEMAHIRAN BELIA adalah Kumpulan untuk menyebarkan dan menawarkan peluang pendidikan kepada Lepasan SPM terutamanya kepada mereka yang gagal mendapat tempat di IPTA kerana kelayakan rendah atau gagal SPM.
                        <br><br>
                        Program yang difokuskan oleh UPKBN ialah Pengajian Peringkat Diploma Sepenuh Masa, Pengajian Sijil Kemahiran Malaysia (TVET) dan Program Laluan Pantas SPM untuk pelajar lepasan Tahfiz/Madrasah yang ingin memperolehi kelayakan akademik SPM.
                </p>

                <a href="{{ route('program') }}"
                   class="hero-cta inline-block mt-8 md:mt-10 border border-white text-white px-8 md:px-10 py-3 md:py-4 rounded-none text-[10px] md:text-xs uppercase font-bold hover:bg-white hover:text-black transition-all duration-300 transform active:scale-95 w-full sm:w-auto text-center">
                    Lihat Program
                </a>

            </div>
        </div>

    <div id="slider" class="overflow-hidden relative w-full">

        <div id="slides" class="flex transition-transform duration-700">

            <!-- SLIDE 1 -->
            <div class="min-w-full relative">
                <img src="{{ asset('images/stack-diplomas-antique-bookshelf-background-generated-by-ai.jpg') }}" class="w-full h-[100svh] object-cover">

                <!-- DARK OVERLAY -->
                <div class="absolute inset-0 bg-black/30"></div>
            </div>

            <!-- SLIDE 2 -->
            <div class="min-w-full relative">
                <img src="{{ asset('images/tvet.jpg') }}" class="w-full h-[100svh] object-cover">

                <div class="absolute inset-0 bg-black/30"></div>
            </div>

            <!-- SLIDE 3 -->
            <div class="min-w-full relative">
                <img src="{{ asset('images/doctors-with-laptop-whiteboard.jpg') }}" class="w-full h-[100svh] object-cover">

                <div class="absolute inset-0 bg-black/30"></div>
            </div>

        </div>

        <!-- LEFT BUTTON -->
        <button onclick="prevSlide()" 
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 backdrop-blur text-white p-3 rounded-full hover:bg-white/40 transition">
            ❮
        </button>

        <!-- RIGHT BUTTON -->
        <button onclick="nextSlide()" 
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 backdrop-blur text-white p-3 rounded-full hover:bg-white/40 transition">
            ❯
        </button>

        <!-- DOTS -->
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2">
            <span class="dot w-3 h-3 bg-white rounded-full"></span>
            <span class="dot w-3 h-3 bg-white/40 rounded-full"></span>
            <span class="dot w-3 h-3 bg-white/40 rounded-full"></span>
        </div>

    </div>

</section>

    <section class="snap-section story-section px-6">
        <div class="story-pair-wrapper">
            <div class="story-panel story-panel--left">
                <span class="hero-vision-label story-label">Visi</span>
                <span class="story-accent-line"></span>
                <p class="hero-vision-text">
                    <span class="story-text-line">UPKB menyampaikan kepentingan pendidikan kepada golongan belia</span>
                    <span class="story-text-line">di mana Pendidikan adalah matlamat sesebuah negara</span>
                    <span class="story-text-line">memandangkan pendidikan adalah tonggak kejayaan semua.</span>
                </p>
            </div>
            <div class="story-panel story-panel--right">
                <span class="hero-vision-label story-label">Misi</span>
                <span class="story-accent-line"></span>
                <p class="hero-vision-text">
                    <span class="story-text-line">UPKB mahu melahirkan generasi yang mempunyai</span>
                    <span class="story-text-line">pendidikan dan kemahiran, mensasarkan negara</span>
                    <span class="story-text-line">mencapai 0% pengangguran dan 100% golongan Profesional Belia.</span>
                </p>
            </div>
        </div>
    </section>

    {{-- 🔹 STATISTICS --}}
    <section class="snap-section stats-section flex items-center justify-center px-6">
        <div class="w-full max-w-6xl mx-auto section-content relative z-10">

            {{-- Heading --}}
            <div class="text-center mb-10 md:mb-14">
                <h2 class="stats-heading-title">Angka Yang <span>Berbicara</span></h2>
                <div class="mx-auto mt-4 h-px w-24 bg-gradient-to-r from-transparent via-orange-500 to-transparent opacity-60"></div>
            </div>

            {{-- Cards --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">

                <div class="stat-card orange">
                    <div class="stat-icon orange">🏆</div>
                    <div class="stat-number"><span class="counter" data-target="10">0</span>+</div>
                    <div class="stat-divider"></div>
                    <p class="stat-label">Tahun Pengalaman</p>
                </div>

                <div class="stat-card cyan">
                    <div class="stat-icon cyan">🎓</div>
                    <div class="stat-number"><span class="counter" data-target="15000">0</span>+</div>
                    <div class="stat-divider"></div>
                    <p class="stat-label">Graduan Berjaya</p>
                </div>

                <div class="stat-card orange">
                    <div class="stat-icon orange">📚</div>
                    <div class="stat-number"><span class="counter" data-target="30">0</span>+</div>
                    <div class="stat-divider"></div>
                    <p class="stat-label">Program Kursus</p>
                </div>

                <div class="stat-card cyan">
                    <div class="stat-icon cyan">🤝</div>
                    <div class="stat-number"><span class="counter" data-target="50">0</span>+</div>
                    <div class="stat-divider"></div>
                    <p class="stat-label">Rakan Industri</p>
                </div>

            </div>
        </div>
    </section>

    {{-- 🔹 VIDEO SECTION --}}
    <section class="snap-section program-section flex items-center justify-center px-6">
    <div class="w-full max-w-6xl mx-auto section-content">

        {{-- Heading --}}
        <div class="text-center mb-8">
            <h2 class="program-section-title">Program <span>Popular</span> Kami</h2>
            <div class="mx-auto mt-3 h-px w-20 bg-gradient-to-r from-transparent via-orange-400 to-transparent opacity-60"></div>
            <p class="mx-auto mt-3 max-w-xl text-sm text-slate-500 leading-relaxed">Program pilihan yang dilengkapi modul profesional, kemahiran abad ke-21, dan peluang kerjaya yang terjamin.</p>
        </div>

        {{-- Main Layout: video left, features right --}}
        <div class="grid grid-cols-1 lg:grid-cols-[3fr_2fr] gap-5 items-stretch">

            {{-- LEFT: Video --}}
            <div class="video-panel">
                <div class="video-panel-overlay"></div>

                <div class="video-panel-badge">
                    <i class="fas fa-star text-orange-400"></i>
                    Koleksi Terbaik UPKB
                </div>

                <div class="video-chip chip-1">
                    <span class="chip-val">1000+</span> Pelajar
                </div>
                <div class="video-chip chip-2">
                    <span class="chip-val">10+</span> Tahun
                </div>

                <video class="w-full h-full object-cover min-h-[340px]" controls autoplay playsinline muted>
                    <source src="{{ asset('videos/prop.mp4') }}" type="video/mp4">
                </video>

                <div class="video-panel-footer">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="video-panel-tags">Berkualiti &nbsp;/&nbsp; Dipercayai &nbsp;/&nbsp; Berprestasi</p>
                            <h3 class="video-panel-title">Pengalaman pembelajaran yang elegan dan profesional.</h3>
                        </div>
                        <a href="/program" class="video-cta">
                            Terokai <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Feature rows --}}
            <div class="prog-feat-col">

                <div class="prog-feat-row prog-feat-row--featured">
                    <div class="prog-feat-icon ic--orange">✨</div>
                    <div class="prog-feat-body">
                        <p class="prog-feat-title">Fokus Kualiti</p>
                        <p class="prog-feat-desc">Setiap program dirangka dengan kandungan mendalam dari pakar industri terkemuka.</p>
                    </div>
                </div>

                <div class="prog-feat-row row--cyan">
                    <div class="prog-feat-icon ic--cyan">🛡️</div>
                    <div class="prog-feat-body">
                        <p class="prog-feat-title">Mudah Dipercayai</p>
                        <p class="prog-feat-desc">Program kami telah dipercayai oleh ribuan pelajar dan institusi di seluruh Malaysia.</p>
                    </div>
                </div>

                <div class="prog-feat-row row--slate">
                    <div class="prog-feat-icon ic--slate">🌟</div>
                    <div class="prog-feat-body">
                        <p class="prog-feat-title">Nilai Tambahan</p>
                        <p class="prog-feat-desc">Kandungan disokong oleh sokongan pelajar, panduan kerjaya dan jaringan alumni aktif.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </section>

<section class="snap-section footer-slide">
    <div class="w-full">
        @include('layouts.footer')
    </div>
</section>

    </main>

    {{-- 🔹 SOCIAL FLOAT --}}
    @include('components.social-float')

</body>

<script>
let currentIndex = 0;
const slides = document.getElementById("slides");
const totalSlides = document.querySelectorAll("#slides > div").length;
const dots = document.querySelectorAll(".dot");
const introOverlay = document.getElementById('introOverlay');
const introVideo = document.getElementById('introVideo');
const startIntroButton = document.getElementById('startIntroButton');
const snapContainer = document.getElementById('snapContainer');
const snapSections = Array.from(document.querySelectorAll('.snap-section'));
let activeSectionIndex = 0;
let scrollLocked = false;
let touchStartY = 0;
let touchEndY = 0;
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const counterAnimationFrames = new WeakMap();

function introIsVisible() {
    return introOverlay && introOverlay.style.display !== 'none' && !introOverlay.classList.contains('hide');
}

function setActiveSection(index) {
    snapSections.forEach((section, sectionIndex) => {
        section.classList.toggle('is-active', sectionIndex === index);
    });

    const activeSection = snapSections[index];
    animateCountersInSection(activeSection);
}

function animateCountersInSection(section) {
    if (!section) return;

    const counters = section.querySelectorAll('.counter');
    if (!counters.length) return;

    counters.forEach((counter) => {
        const target = parseInt(counter.dataset.target, 10) || 0;

        const existingFrame = counterAnimationFrames.get(counter);
        if (existingFrame) {
            cancelAnimationFrame(existingFrame);
        }

        counter.innerText = '0';

        const duration = 1200;
        let startTime = null;

        const step = (timestamp) => {
            if (startTime === null) startTime = timestamp;

            const progress = Math.min((timestamp - startTime) / duration, 1);
            const easedProgress = 1 - Math.pow(1 - progress, 3);
            const value = Math.floor(target * easedProgress);

            counter.innerText = value.toLocaleString();

            if (progress < 1) {
                const frame = window.requestAnimationFrame(step);
                counterAnimationFrames.set(counter, frame);
            } else {
                counter.innerText = target.toLocaleString();
                counterAnimationFrames.delete(counter);
            }
        };

        const frame = window.requestAnimationFrame(step);
        counterAnimationFrames.set(counter, frame);
    });
}

function getNearestSectionIndex() {
    if (!snapContainer || !snapSections.length) return 0;

    const scrollTop = snapContainer.scrollTop;
    let nearestIndex = 0;
    let nearestDistance = Number.POSITIVE_INFINITY;

    snapSections.forEach((section, index) => {
        const distance = Math.abs(section.offsetTop - scrollTop);
        if (distance < nearestDistance) {
            nearestDistance = distance;
            nearestIndex = index;
        }
    });

    return nearestIndex;
}

function goToSection(nextIndex) {
    if (!snapContainer || !snapSections.length || scrollLocked) return;

    const safeIndex = Math.max(0, Math.min(nextIndex, snapSections.length - 1));
    if (safeIndex === activeSectionIndex) return;

    scrollLocked = true;
    activeSectionIndex = safeIndex;
    setActiveSection(activeSectionIndex);

    snapSections[activeSectionIndex].scrollIntoView({
        behavior: prefersReducedMotion ? 'auto' : 'smooth',
        block: 'start'
    });

    window.setTimeout(() => {
        scrollLocked = false;
    }, prefersReducedMotion ? 80 : 720);
}

function handleWheelNavigation(event) {
    if (!snapContainer || introIsVisible()) return;

    event.preventDefault();
    if (scrollLocked) return;

    const delta = event.deltaY;
    if (Math.abs(delta) < 12) return;

    goToSection(delta > 0 ? activeSectionIndex + 1 : activeSectionIndex - 1);
}

function handleKeyNavigation(event) {
    if (!snapContainer || introIsVisible()) return;

    const isTyping = ['INPUT', 'TEXTAREA', 'SELECT'].includes(document.activeElement?.tagName || '');
    if (isTyping) return;

    if (['ArrowDown', 'PageDown', ' '].includes(event.key)) {
        event.preventDefault();
        goToSection(activeSectionIndex + 1);
    }

    if (['ArrowUp', 'PageUp'].includes(event.key)) {
        event.preventDefault();
        goToSection(activeSectionIndex - 1);
    }
}

function handleTouchStart(event) {
    if (!snapContainer || introIsVisible()) return;
    touchStartY = event.changedTouches[0].clientY;
}

function handleTouchEnd(event) {
    if (!snapContainer || introIsVisible() || scrollLocked) return;

    touchEndY = event.changedTouches[0].clientY;
    const delta = touchStartY - touchEndY;

    if (Math.abs(delta) < 40) return;
    goToSection(delta > 0 ? activeSectionIndex + 1 : activeSectionIndex - 1);
}

function syncActiveSectionOnScroll() {
    if (!snapContainer || scrollLocked) return;

    const nearestSection = getNearestSectionIndex();
    if (nearestSection !== activeSectionIndex) {
        activeSectionIndex = nearestSection;
        setActiveSection(activeSectionIndex);
    }
}

function initSnapNavigation() {
    if (!snapContainer || !snapSections.length) return;

    setActiveSection(activeSectionIndex);
    snapContainer.addEventListener('wheel', handleWheelNavigation, { passive: false });
    snapContainer.addEventListener('scroll', syncActiveSectionOnScroll, { passive: true });
    snapContainer.addEventListener('touchstart', handleTouchStart, { passive: true });
    snapContainer.addEventListener('touchend', handleTouchEnd, { passive: true });
    document.addEventListener('keydown', handleKeyNavigation);
}

function updateSlider() {
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;

    dots.forEach((dot, index) => {
        dot.classList.remove("bg-white");
        dot.classList.add("bg-gray-400");

        if (index === currentIndex) {
            dot.classList.remove("bg-gray-400");
            dot.classList.add("bg-white");
        }
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlider();
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateSlider();
}

function hideIntroOverlay() {
    if (!introOverlay) return;

    // Stop & reset the video so it doesn't stay stuck on last frame
    if (introVideo) {
        introVideo.pause();
        introVideo.currentTime = 0;
        introVideo.classList.add('hidden');
    }

    introOverlay.classList.add('hide');

    // Use setTimeout as reliable fallback — transitionend may not fire in all browsers
    setTimeout(function() {
        introOverlay.style.display = 'none';
    }, 650); // slightly longer than the 0.6s CSS transition

    document.body.style.overflow = '';
    localStorage.setItem('upkbIntroSeen', '1');
}

function startIntro() {
    if (!introVideo || !introOverlay) return;

    introVideo.classList.remove('hidden');
    introVideo.play().catch(() => {
        // Browser may require user interaction, but start button click should satisfy that.
    });
    startIntroButton.classList.add('hidden');
}

function showIntroOverlayIfNeeded() {
    const hasSeenIntro = localStorage.getItem('upkbIntroSeen') === '1';

    if (!hasSeenIntro && introOverlay) {
        document.body.style.overflow = 'hidden';
        introVideo.addEventListener('ended', hideIntroOverlay);
        startIntroButton.addEventListener('click', startIntro);
    } else if (introOverlay) {
        introOverlay.style.display = 'none';
    }
}

showIntroOverlayIfNeeded();

document.addEventListener('DOMContentLoaded', () => {
    initSnapNavigation();
});

// AUTO SLIDE
setInterval(nextSlide, 4000);

</script>

</html>
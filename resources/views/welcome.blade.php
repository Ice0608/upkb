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
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Sora:wght@700;800&display=swap');

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
            --story-stagger: 0s;
            width: min(92vw, 960px);
            border-radius: clamp(2.6rem, 5vw, 3.3rem);
            border: 1px solid rgba(249, 115, 22, 0.24);
            background:
                radial-gradient(circle at 18% 18%, rgba(249, 115, 22, 0.34), rgba(249, 115, 22, 0) 38%),
                radial-gradient(circle at 86% 14%, rgba(168, 85, 247, 0.28), rgba(168, 85, 247, 0) 40%),
                radial-gradient(circle at 64% 86%, rgba(236, 72, 153, 0.2), rgba(236, 72, 153, 0) 48%),
                linear-gradient(145deg, rgba(22, 23, 31, 0.95), rgba(14, 18, 30, 0.94));
            backdrop-filter: blur(22px) saturate(140%);
            -webkit-backdrop-filter: blur(22px) saturate(140%);
            padding: clamp(2.4rem, 5vw, 4rem) clamp(2rem, 4vw, 3.5rem);
            box-shadow:
                0 38px 92px rgba(2, 6, 23, 0.62),
                inset 0 1px 0 rgba(255, 255, 255, 0.16),
                inset 0 -18px 30px rgba(2, 6, 23, 0.44),
                0 0 42px rgba(168, 85, 247, 0.14);
            position: relative;
            isolation: isolate;
            overflow: hidden;
            will-change: transform;
            opacity: 0;
            filter: blur(8px) saturate(0.92);
            transform: translateY(62px) scale(0.955);
            transition: opacity 0.95s cubic-bezier(0.2, 0.9, 0.22, 1),
                        transform 0.95s cubic-bezier(0.2, 0.9, 0.22, 1),
                        filter 0.95s cubic-bezier(0.2, 0.9, 0.22, 1),
                        box-shadow 0.45s ease,
                        border-color 0.45s ease;
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
            background:
                linear-gradient(138deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.02) 38%, rgba(255, 255, 255, 0) 74%),
                radial-gradient(circle at 22% 120%, rgba(17, 24, 39, 0.66), rgba(17, 24, 39, 0) 48%);
            z-index: 0;
        }

        .story-panel::after {
            width: 13rem;
            height: 13rem;
            top: -4rem;
            right: -3rem;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249, 115, 22, 0.42), rgba(249, 115, 22, 0) 74%);
            opacity: 0.8;
            animation: heroGlow 8s ease-in-out infinite;
        }

        .story-panel .hero-vision-label {
            font-family: 'Sora', 'Montserrat', sans-serif;
            font-size: clamp(2rem, 3.2vw, 3rem);
            font-weight: 800;
            margin-bottom: 0.9rem;
            letter-spacing: 0.28em;
            line-height: 1;
            text-shadow: 0 4px 18px rgba(249, 115, 22, 0.22);
        }

        .story-panel .hero-vision-text {
            font-family: 'Plus Jakarta Sans', 'Lexend Deca', sans-serif;
            font-size: clamp(1.05rem, 1.65vw, 1.35rem);
            font-weight: 600;
            letter-spacing: 0.01em;
            line-height: 1.85;
            color: rgba(241, 245, 249, 0.94);
            text-shadow: 0 10px 24px rgba(15, 23, 42, 0.28);
            max-width: 28ch;
            margin-inline: auto;
        }

        /* ── STORY SLIDE ANIMATIONS ── */
        .story-pair-wrapper {
            --story-ambient: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: clamp(1rem, 2.2vw, 1.35rem);
            width: min(96vw, 1180px);
            margin-inline: auto;
        }

        .story-panel {
            --story-stagger: 0s;
            --panel-scroll: 0;
            --card-rx: 0deg;
            --card-ry: 0deg;
            --card-mx: 50%;
            --card-my: 50%;
            display: grid;
            grid-template-columns: minmax(16.5rem, 33%) minmax(0, 1fr);
            align-items: stretch;
            padding: 0;
            border-radius: clamp(2.2rem, 4vw, 3rem);
            border: 1px solid rgba(244, 163, 88, 0.48);
            background: rgba(4, 6, 10, 0.94);
            box-shadow:
                0 26px 62px rgba(0, 0, 0, 0.52),
                inset 0 1px 0 rgba(255, 255, 255, 0.07),
                inset 0 -1px 0 rgba(0, 0, 0, 0.4);
            overflow: hidden;
            transform-style: preserve-3d;
            will-change: transform;
            opacity: 0;
            transform: translateY(52px) scale(0.965);
            filter: blur(8px);
            transition: opacity 0.9s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.9s cubic-bezier(0.16, 1, 0.3, 1),
                        filter 0.9s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.35s ease,
                        border-color 0.35s ease;
        }

        /* Specular gloss highlight — tracks mouse */
        .story-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 3;
            border-radius: inherit;
            background: radial-gradient(
                circle at var(--card-mx, 50%) var(--card-my, 50%),
                rgba(255, 255, 255, 0.14) 0%,
                rgba(255, 255, 255, 0.05) 28%,
                rgba(255, 255, 255, 0) 62%
            );
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.22s ease;
        }

        /* Ambient colour glow — tracks mouse */
        .story-panel::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
            border-radius: inherit;
            background: radial-gradient(
                circle at var(--card-mx, 50%) var(--card-my, 50%),
                rgba(244, 163, 88, 0.20) 0%,
                rgba(168, 85, 247, 0.10) 42%,
                rgba(244, 163, 88, 0) 70%
            );
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.22s ease;
        }

        .story-panel:hover::before { opacity: 1; }
        .story-panel:hover::after  { opacity: 1; }

        .story-panel--left {
            --story-stagger: 0.08s;
            border-color: rgba(244, 163, 88, 0.72);
        }

        .story-panel--right {
            --story-stagger: 0.24s;
            border-color: rgba(244, 163, 88, 0.72);
        }

        .story-panel-head {
            position: relative;
            padding: clamp(1.5rem, 2.8vw, 2.5rem);
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 0.5rem;
            border-right: 1px solid rgba(255, 255, 255, 0.07);
            transform: translateZ(28px) translateY(calc((1 - var(--panel-scroll)) * 10px));
            transition: transform 0.16s linear;
        }

        .story-panel-head::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(0, 0, 0, 0) 0%, rgba(4, 6, 10, 0.9) 100%);
            pointer-events: none;
        }

        .story-panel--left .story-panel-head {
            background:
                radial-gradient(circle at 82% 18%, rgba(248, 180, 112, 0.56), rgba(248, 180, 112, 0) 50%),
                radial-gradient(circle at 28% 76%, rgba(186, 132, 252, 0.34), rgba(186, 132, 252, 0) 56%),
                linear-gradient(114deg, rgba(17, 13, 24, 0.98) 0%, rgba(94, 55, 138, 0.84) 100%);
        }

        .story-panel--right .story-panel-head {
            background:
                radial-gradient(circle at 82% 18%, rgba(248, 180, 112, 0.5), rgba(248, 180, 112, 0) 50%),
                radial-gradient(circle at 22% 78%, rgba(167, 139, 250, 0.32), rgba(167, 139, 250, 0) 56%),
                linear-gradient(114deg, rgba(21, 13, 10, 0.98) 0%, rgba(132, 75, 45, 0.82) 100%);
        }

        .story-panel-body {
            padding: clamp(1.35rem, 2.4vw, 2.2rem) clamp(1.45rem, 2.8vw, 2.4rem);
            display: flex;
            align-items: center;
            color: rgba(241, 245, 249, 0.95);
            background: rgba(0, 0, 0, 0.28);
            transform: translateZ(10px) translateY(calc((1 - var(--panel-scroll)) * 12px));
            transition: transform 0.16s linear;
        }

        .story-panel-body p {
            margin: 0;
            font-family: 'Plus Jakarta Sans', 'Lexend Deca', sans-serif;
            font-size: clamp(1rem, 1.3vw, 1.42rem);
            line-height: 1.46;
            letter-spacing: 0.004em;
        }

        .story-role {
            font-family: 'Sora', 'Montserrat', sans-serif;
            font-size: clamp(1.9rem, 3.1vw, 3rem);
            font-weight: 800;
            line-height: 1.04;
            background: linear-gradient(135deg, #ffffff 18%, rgba(244, 163, 88, 0.95) 50%, #ffffff 82%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 220% 100%;
            animation: storyRoleShimmer 5s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes storyRoleShimmer {
            0%   { background-position: 180% center; }
            50%  { background-position: -80% center; }
            100% { background-position: 180% center; }
        }

        .story-panel-head > *,
        .story-panel-body > * {
            opacity: 0;
            transform: translateY(14px);
            transition: opacity 0.56s cubic-bezier(0.16, 1, 0.3, 1), transform 0.56s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .story-panel-head > :nth-child(1) { transition-delay: calc(var(--story-stagger) + 0.28s); }
        .story-panel-head > :nth-child(2) { transition-delay: calc(var(--story-stagger) + 0.4s); }
        .story-panel-body > :nth-child(1) { transition-delay: calc(var(--story-stagger) + 0.62s); }

        .snap-section.is-active .story-panel {
            opacity: 1;
            filter: blur(0);
            transform: perspective(1200px)
                       rotateX(var(--card-rx, 0deg))
                       rotateY(var(--card-ry, 0deg))
                       translateY(calc((1 - var(--panel-scroll)) * 18px))
                       scale(calc(0.988 + (var(--panel-scroll) * 0.012)));
            transition-delay: var(--story-stagger);
        }

        .snap-section.is-active .story-panel-head > *,
        .snap-section.is-active .story-panel-body > * {
            opacity: 1;
            transform: translateY(0);
        }

        .snap-section.is-active .story-panel:hover {
            transform: perspective(1200px)
                       rotateX(var(--card-rx, 0deg))
                       rotateY(var(--card-ry, 0deg))
                       translateY(-4px) scale(1.008);
            box-shadow:
                0 52px 100px rgba(0, 0, 0, 0.72),
                0 0 56px rgba(244, 163, 88, 0.2),
                0 0 0 1.5px rgba(244, 163, 88, 0.55),
                inset 0 1px 0 rgba(255, 255, 255, 0.12);
            border-color: rgba(244, 163, 88, 0.9);
        }

        @media (max-width: 920px) {
            .story-panel {
                grid-template-columns: 1fr;
            }

            .story-panel-head {
                border-right: 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            }
        }
        /* ── END STORY SLIDE ANIMATIONS ── */

        .story-section {
            position: relative;
            background: linear-gradient(180deg, #17181f 0%, #101219 100%);
        }

        .story-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 16% 22%, rgba(244, 163, 88, 0.2), transparent 34%),
                radial-gradient(circle at 84% 68%, rgba(186, 132, 252, 0.16), transparent 42%),
                linear-gradient(180deg, rgba(2, 6, 23, 0.48), rgba(2, 6, 23, 0.3));
            pointer-events: none;
            opacity: calc(0.52 + (var(--story-ambient) * 0.48));
            transform: translateY(calc((1 - var(--story-ambient)) * 20px));
            transition: opacity 0.16s linear, transform 0.16s linear;
        }

        .story-section::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(2, 6, 23, 0) 34%, rgba(2, 6, 23, 0.54) 100%);
            pointer-events: none;
            opacity: calc(0.58 + (var(--story-ambient) * 0.3));
            transition: opacity 0.16s linear;
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
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 84% 12%, rgba(249,115,22,0.24), rgba(249,115,22,0) 34%),
                radial-gradient(circle at 14% 88%, rgba(56,189,248,0.1), rgba(56,189,248,0) 40%),
                linear-gradient(132deg, #040a17 0%, #0a1732 56%, #12264b 100%);
        }
        .program-section::before {
            content: '';
            inset: 0;
            position: absolute;
            background-image:
                repeating-linear-gradient(0deg, rgba(148,163,184,0.08) 0px, rgba(148,163,184,0.08) 1px, transparent 1px, transparent 52px),
                repeating-linear-gradient(90deg, rgba(148,163,184,0.08) 0px, rgba(148,163,184,0.08) 1px, transparent 1px, transparent 52px);
            mix-blend-mode: soft-light;
            opacity: 0.24;
            pointer-events: none;
        }
        .program-section::after {
            content: '';
            position: absolute;
            width: 36rem;
            height: 36rem;
            right: -11rem;
            top: -8rem;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249,115,22,0.3), rgba(249,115,22,0) 74%);
            filter: blur(6px);
            animation: progOrbFloat 8s ease-in-out infinite;
            pointer-events: none;
        }

        .program-shell::before {
            content: '';
            position: absolute;
            inset: -8% -6% auto auto;
            width: 32rem;
            height: 18rem;
            background: linear-gradient(130deg, rgba(255, 198, 140, 0.22), rgba(255, 198, 140, 0));
            filter: blur(18px);
            pointer-events: none;
            z-index: 0;
        }
        @keyframes progOrbFloat {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-16px) scale(1.05); }
        }
        .program-shell {
            width: min(100%, 78rem);
            margin: 0 auto;
            padding: 1rem 0;
            position: relative;
            z-index: 1;
        }
        .program-heading {
            text-align: center;
            margin-bottom: 2rem;
        }
        .program-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            color: rgba(255,255,255,0.86);
            border: 1px solid rgba(255,255,255,0.22);
            background: rgba(13,24,42,0.45);
            backdrop-filter: blur(8px);
            font-size: 0.68rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 0.95rem;
        }
        .program-headline {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(1.9rem, 4.2vw, 3.35rem);
            font-weight: 900;
            line-height: 1.03;
            color: #f8fafc;
            letter-spacing: -0.03em;
            max-width: 42rem;
            margin: 0 auto;
            text-wrap: balance;
            text-shadow: 0 10px 26px rgba(2, 6, 23, 0.38);
        }
        .program-headline span {
            color: #fb923c;
            text-shadow: 0 0 22px rgba(249,115,22,0.38);
        }
        .program-subtitle {
            max-width: 42rem;
            margin: 1rem auto 0;
            color: rgba(226,232,240,0.92);
            font-size: 0.96rem;
            line-height: 1.75;
            text-shadow: 0 8px 24px rgba(2, 6, 23, 0.28);
        }
        .program-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.58fr) minmax(0, 1fr);
            gap: 1.25rem;
            align-items: stretch;
        }
        .program-featured-card {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            border-radius: 1.7rem;
            min-height: 28rem;
            border: 1px solid rgba(255,255,255,0.2);
            background: rgba(15,23,42,0.65);
            box-shadow:
                0 30px 74px rgba(2,6,23,0.48),
                0 0 0 1px rgba(255,255,255,0.15),
                0 0 36px rgba(249,115,22,0.18);
            transition: transform 520ms cubic-bezier(0.22, 1, 0.36, 1), box-shadow 520ms ease;
        }
        .program-featured-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            border: 1px solid rgba(251,146,60,0.48);
            opacity: 0.4;
            pointer-events: none;
        }
        .program-featured-card:hover {
            transform: translateY(-8px) rotateX(1.2deg);
            box-shadow:
                0 44px 92px rgba(2,6,23,0.62),
                0 0 0 1px rgba(251,146,60,0.38),
                0 0 60px rgba(249,115,22,0.34);
        }
        .program-featured-image {
            position: absolute;
            inset: 0;
            overflow: hidden;
            z-index: -3;
        }
        .program-featured-image video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.02);
            transition: transform 700ms cubic-bezier(0.22, 1, 0.36, 1);
        }
        .program-featured-card:hover .program-featured-image video {
            transform: scale(1.09);
        }
        .program-featured-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(118deg, rgba(8,15,31,0.32) 16%, rgba(8,15,31,0.10) 48%, rgba(249,115,22,0.08) 100%),
                linear-gradient(0deg, rgba(8,15,31,0.28) 0%, rgba(8,15,31,0.04) 52%, rgba(8,15,31,0.0) 100%);
            z-index: -2;
        }
        .program-featured-glow {
            position: absolute;
            inset: auto -24% -40% 32%;
            height: 62%;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249,115,22,0.46), rgba(249,115,22,0) 72%);
            filter: blur(8px);
            pointer-events: none;
            z-index: -1;
            transition: opacity 380ms ease;
        }
        .program-featured-card:hover .program-featured-glow {
            opacity: 0.95;
        }
        .program-popular-badge {
            position: absolute;
            left: 1.1rem;
            top: 1.1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            color: #fff7ed;
            background: rgba(15,23,42,0.46);
            border: 1px solid rgba(251,146,60,0.5);
            box-shadow: 0 8px 18px rgba(15,23,42,0.28);
            backdrop-filter: blur(10px);
            z-index: 2;
        }
        .program-featured-content {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 2;
            padding: 1.5rem;
        }
        .program-featured-meta {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            font-size: 0.68rem;
            color: rgba(255,237,213,0.84);
            text-transform: uppercase;
            letter-spacing: 0.2em;
            margin-bottom: 0.65rem;
        }
        .program-featured-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(2.05rem, 5.5vw, 3.2rem);
            line-height: 0.95;
            color: #f8fafc;
            font-weight: 900;
            letter-spacing: 0.04em;
            text-shadow: 0 10px 24px rgba(8,15,31,0.45);
            margin-bottom: 0.95rem;
        }
        .program-stat-row {
            display: flex;
            flex-wrap: wrap;
            gap: 0.55rem;
            margin-bottom: 1.15rem;
        }
        .program-stat-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.22);
            background: rgba(15,23,42,0.45);
            color: rgba(241,245,249,0.96);
            padding: 0.46rem 0.78rem;
            font-size: 0.72rem;
            font-weight: 600;
            backdrop-filter: blur(6px);
        }
        .program-featured-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            border-radius: 999px;
            padding: 0.78rem 1.4rem;
            text-decoration: none;
            font-size: 0.84rem;
            font-weight: 800;
            color: #fff;
            background: linear-gradient(125deg, #f97316 0%, #ea580c 100%);
            box-shadow: 0 14px 26px rgba(249,115,22,0.36);
            transition: transform 220ms ease, gap 220ms ease, box-shadow 260ms ease;
        }
        .program-featured-cta:hover {
            transform: translateY(-2px);
            gap: 0.8rem;
            box-shadow: 0 18px 36px rgba(249,115,22,0.48);
        }
        .program-benefit-stack {
            display: grid;
            gap: 0.95rem;
            align-content: center;
        }
        .program-benefit-card {
            position: relative;
            overflow: hidden;
            border-radius: 1.4rem;
            border: 1px solid rgba(148,163,184,0.24);
            padding: 1.1rem;
            background: linear-gradient(145deg, rgba(255,255,255,0.92), rgba(241,245,249,0.8));
            backdrop-filter: blur(10px);
            box-shadow: 0 14px 34px rgba(15,23,42,0.1);
            transition: transform 320ms cubic-bezier(0.22, 1, 0.36, 1), box-shadow 320ms ease, border-color 320ms ease;
        }
        .program-benefit-card::before {
            content: '';
            position: absolute;
            inset: auto -14% -58% 42%;
            height: 74%;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249,115,22,0.2), rgba(249,115,22,0) 74%);
            pointer-events: none;
            transition: opacity 320ms ease;
            opacity: 0.45;
        }
        .program-benefit-card:nth-child(2) {
            margin-left: 1rem;
        }
        .program-benefit-card:nth-child(3) {
            margin-left: 2rem;
        }
        .program-benefit-card:hover {
            transform: translateY(-6px);
            border-color: rgba(249,115,22,0.45);
            box-shadow: 0 24px 44px rgba(15,23,42,0.14), 0 0 30px rgba(249,115,22,0.16);
        }
        .program-benefit-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
            margin-bottom: 0.6rem;
        }
        .program-benefit-icon {
            width: 2.45rem;
            height: 2.45rem;
            border-radius: 0.92rem;
            display: grid;
            place-items: center;
            font-size: 1rem;
            color: #ea580c;
            background: linear-gradient(145deg, rgba(255,237,213,0.95), rgba(254,215,170,0.65));
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.95);
        }
        .program-benefit-metric {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.4rem;
            font-weight: 900;
            letter-spacing: -0.02em;
            color: #0f172a;
        }
        .program-benefit-title {
            font-size: 0.86rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 0.3rem;
        }
        .program-benefit-desc {
            font-size: 0.75rem;
            color: rgba(51,65,85,0.76);
            line-height: 1.55;
            max-width: 17rem;
        }
        @media (max-width: 1024px) {
            .program-section {
                background:
                    radial-gradient(circle at 86% 18%, rgba(249,115,22,0.2), rgba(249,115,22,0) 30%),
                    linear-gradient(180deg, #040a17 0%, #0a1732 52%, #12264b 100%);
            }
            .program-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            .program-benefit-stack {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
            .program-benefit-card:nth-child(2),
            .program-benefit-card:nth-child(3) {
                margin-left: 0;
            }
        }
        @media (max-width: 768px) {
            .program-subtitle {
                max-width: 26rem;
                font-size: 0.88rem;
            }
            .program-featured-card {
                min-height: 24rem;
            }
            .program-featured-content {
                padding: 1.2rem;
            }
            .program-benefit-stack {
                grid-template-columns: 1fr;
            }
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

    <section class="snap-section story-section flex items-center justify-center px-6">
        <div class="story-pair-wrapper">
            <div class="story-panel story-panel--left">
                <div class="story-panel-head">
                    <h3 class="story-role">Visi</h3>
                </div>
                <div class="story-panel-body">
                    <p>UPKB menyampaikan kepentingan pendidikan kepada golongan belia di mana pendidikan adalah matlamat sesebuah negara, memandangkan pendidikan adalah tonggak kejayaan semua.</p>
                </div>
            </div>
            <div class="story-panel story-panel--right">
                <div class="story-panel-head">
                    <h3 class="story-role">Misi</h3>
                </div>
                <div class="story-panel-body">
                    <p>UPKB mahu melahirkan generasi yang mempunyai pendidikan dan kemahiran, mensasarkan negara mencapai 0% pengangguran dan 100% golongan Profesional Belia.</p>
                </div>
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
                    <div class="stat-number"><span class="counter" data-target="1">0</span>+</div>
                    <div class="stat-divider"></div>
                    <p class="stat-label">Tahun Pengalaman</p>
                </div>

                <div class="stat-card cyan">
                    <div class="stat-icon cyan">🎓</div>
                    <div class="stat-number"><span class="counter" data-target="320">0</span>+</div>
                    <div class="stat-divider"></div>
                    <p class="stat-label">Graduan Berjaya</p>
                </div>

                <div class="stat-card orange">
                    <div class="stat-icon orange">📚</div>
                    <div class="stat-number"><span class="counter" data-target="12">0</span>+</div>
                    <div class="stat-divider"></div>
                    <p class="stat-label">Program Kursus</p>
                </div>

                <div class="stat-card cyan">
                    <div class="stat-icon cyan">🤝</div>
                    <div class="stat-number"><span class="counter" data-target="14">0</span>+</div>
                    <div class="stat-divider"></div>
                    <p class="stat-label">Rakan Industri</p>
                </div>

            </div>
        </div>
    </section>

    {{-- 🔹 PROGRAM SECTION --}}
    <section class="snap-section program-section flex items-center justify-center px-6">
        <div class="program-shell section-content">

            <div class="program-heading">
                <p class="program-kicker"><i class="fa-solid fa-bolt"></i> Program Teknikal Pilihan</p>
                <h2 class="program-headline">Belajar Skill Industri. <span>Terus Dapat Kerja.</span></h2>
                <p class="program-subtitle">Laluan pantas ke kerjaya sebenar melalui latihan berasaskan industri, pensijilan diiktiraf, dan bimbingan kerjaya berfokus hasil.</p>
            </div>

            <div class="program-grid">
                <article class="program-featured-card">
                    <div class="program-featured-image" aria-hidden="true">
                        <video autoplay muted loop playsinline preload="none">
                            <source src="{{ asset('videos/prop.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="program-featured-overlay" aria-hidden="true"></div>
                    <div class="program-featured-glow" aria-hidden="true"></div>


                </article>

                <div class="program-benefit-stack">
                    <article class="program-benefit-card">
                        <div class="program-benefit-top">
                            <div class="program-benefit-icon"><i class="fa-solid fa-user-graduate"></i></div>
                            <div class="program-benefit-metric">10,000+</div>
                        </div>
                        <p class="program-benefit-title">Pelajar Berjaya</p>
                        <p class="program-benefit-desc">Komuniti alumni besar yang sudah menembusi pasaran kerja.</p>
                    </article>

                    <article class="program-benefit-card">
                        <div class="program-benefit-top">
                            <div class="program-benefit-icon"><i class="fa-solid fa-handshake-angle"></i></div>
                            <div class="program-benefit-metric">120+</div>
                        </div>
                        <p class="program-benefit-title">Kerjasama Industri</p>
                        <p class="program-benefit-desc">Hubungan strategik untuk latihan praktikal dan peluang pekerjaan.</p>
                    </article>

                    <article class="program-benefit-card">
                        <div class="program-benefit-top">
                            <div class="program-benefit-icon"><i class="fa-solid fa-briefcase"></i></div>
                            <div class="program-benefit-metric">1-on-1</div>
                        </div>
                        <p class="program-benefit-title">Sokongan Kerjaya</p>
                        <p class="program-benefit-desc">CV, persediaan temuduga dan hala tuju kerjaya hingga dapat kerja.</p>
                    </article>
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

function initStoryPanelTilt() {
    const MAX_TILT = 8;
    document.querySelectorAll('.story-panel').forEach((panel) => {
        const FAST_T = [
            'opacity 0.9s cubic-bezier(0.16, 1, 0.3, 1)',
            'filter 0.9s cubic-bezier(0.16, 1, 0.3, 1)',
            'transform 0.07s linear',
            'box-shadow 0.10s ease',
            'border-color 0.10s ease'
        ].join(', ');
        const SLOW_T = [
            'opacity 0.9s cubic-bezier(0.16, 1, 0.3, 1)',
            'transform 0.55s cubic-bezier(0.16, 1, 0.3, 1)',
            'filter 0.9s cubic-bezier(0.16, 1, 0.3, 1)',
            'box-shadow 0.45s ease',
            'border-color 0.35s ease'
        ].join(', ');

        panel.addEventListener('mousemove', (e) => {
            const rect = panel.getBoundingClientRect();
            const dx = (e.clientX - (rect.left + rect.width  / 2)) / (rect.width  / 2);
            const dy = (e.clientY - (rect.top  + rect.height / 2)) / (rect.height / 2);
            panel.style.setProperty('--card-rx', `${(-dy * MAX_TILT * 0.62).toFixed(2)}deg`);
            panel.style.setProperty('--card-ry', `${( dx * MAX_TILT).toFixed(2)}deg`);
            panel.style.setProperty('--card-mx', `${((dx + 1) / 2 * 100).toFixed(1)}%`);
            panel.style.setProperty('--card-my', `${((dy + 1) / 2 * 100).toFixed(1)}%`);
            panel.style.transition = FAST_T;
        }, { passive: true });

        panel.addEventListener('mouseleave', () => {
            panel.style.setProperty('--card-rx', '0deg');
            panel.style.setProperty('--card-ry', '0deg');
            panel.style.setProperty('--card-mx', '50%');
            panel.style.setProperty('--card-my', '50%');
            panel.style.transition = SLOW_T;
        }, { passive: true });
    });
}

function updateStoryScrollAnimation() {
    const storySection = document.querySelector('.story-section');
    if (!storySection) return;

    const panels = storySection.querySelectorAll('.story-panel');
    if (!panels.length) return;

    const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
    const sectionRect = storySection.getBoundingClientRect();
    const sectionProgress = Math.max(0, Math.min(1, (viewportHeight - sectionRect.top) / (viewportHeight + sectionRect.height)));

    storySection.style.setProperty('--story-ambient', sectionProgress.toFixed(3));

    panels.forEach((panel) => {
        const rect = panel.getBoundingClientRect();
        const progress = Math.max(0, Math.min(1, (viewportHeight - rect.top) / (viewportHeight + rect.height)));
        panel.style.setProperty('--panel-scroll', progress.toFixed(3));
    });
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

    updateStoryScrollAnimation();

    const nearestSection = getNearestSectionIndex();
    if (nearestSection !== activeSectionIndex) {
        activeSectionIndex = nearestSection;
        setActiveSection(activeSectionIndex);
    }
}

function initSnapNavigation() {
    if (!snapContainer || !snapSections.length) return;

    setActiveSection(activeSectionIndex);
    updateStoryScrollAnimation();
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
    initStoryPanelTilt();
    window.addEventListener('resize', updateStoryScrollAnimation, { passive: true });
});

// AUTO SLIDE
setInterval(nextSlide, 4000);

</script>

</html>
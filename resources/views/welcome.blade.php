<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SMART EDUCATION SOCIETY</title>

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
            background: linear-gradient(135deg, #ffd08a 0%, #ff8a1f 35%, #ffb347 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 8px 18px rgba(255, 138, 31, 0.35));
            transform-origin: left center;
            transition: transform 0.45s ease, filter 0.45s ease;
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
            filter: drop-shadow(0 10px 24px rgba(255, 138, 31, 0.45));
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

        .hero-open-shell {
            opacity: 0;
            transform: translateY(30px) scale(0.972);
            filter: saturate(0.88) brightness(0.9);
            will-change: transform, opacity, filter;
        }

        .hero-open-active .hero-open-shell {
            animation: heroCardIntro 1250ms cubic-bezier(0.12, 0.9, 0.22, 1) 120ms forwards;
        }

        .hero-open-item {
            opacity: 0;
            transform: translateY(22px);
            will-change: transform, opacity;
        }

        .hero-open-active .hero-open-item {
            animation: heroItemIntro 980ms cubic-bezier(0.19, 1, 0.22, 1) forwards;
            animation-delay: var(--hero-delay, 0ms);
        }

        .hero-open-active .hero-cta.hero-open-item {
            animation-name: heroCtaIntro;
            animation-duration: 1050ms;
        }

        .hero-slider-shell {
            overflow: hidden;
        }

        .hero-open-slide {
            transform: scale(1.12);
            transform-origin: center;
            will-change: transform, filter;
            filter: brightness(0.82) saturate(1.16);
        }

        .hero-open-active .hero-open-slide {
            animation: heroSlideIntro 2600ms cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes heroCardIntro {
            0% {
                opacity: 0;
                transform: translateY(30px) scale(0.972);
                filter: saturate(0.88) brightness(0.9);
            }
            68% {
                opacity: 1;
                transform: translateY(-2px) scale(1.003);
                filter: saturate(1.02) brightness(1.01);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
                filter: saturate(1) brightness(1);
            }
        }

        @keyframes heroItemIntro {
            0% {
                opacity: 0;
                transform: translateY(22px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes heroCtaIntro {
            0% {
                opacity: 0;
                transform: translateY(22px) scale(0.94);
            }
            74% {
                opacity: 1;
                transform: translateY(0) scale(1.025);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes heroSlideIntro {
            0% {
                transform: scale(1.12);
                filter: brightness(0.82) saturate(1.16);
            }
            62% {
                transform: scale(1.035);
                filter: brightness(0.94) saturate(1.08);
            }
            100% {
                transform: scale(1);
                filter: brightness(1) saturate(1);
            }
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
            margin: 0;
            padding: 0;
            background: #040a17;
            overflow-x: hidden;
        }
        html:not(.dark),
        html:not(.dark) body {
            background: #f8fafc;
        }

        .welcome-page {
            overflow-x: hidden;
        }

        .snap-container {
            /* snap removed — normal page scroll */
        }

        .snap-section {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 5rem 0 4rem;
        }

        /* Hero section — no padding, image fills edge-to-edge */
        .snap-section:first-child {
            padding: 0;
        }

        .snap-section.footer-slide {
            height: auto;
            align-items: flex-start;
            padding: 0;
        }

        .section-content {
            /* always visible — no snap-gated reveal */
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
            opacity: 1;
            transform: none;
            transition: box-shadow 0.45s ease,
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
            opacity: 0.6;
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
            will-change: transform, opacity;
            opacity: 0;
            transform: translateY(52px) scale(0.965);
            transition: opacity 0.9s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.9s cubic-bezier(0.16, 1, 0.3, 1),
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
                circle at 50% 35%,
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
                circle at 50% 35%,
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
        }

        .story-panel-body p {
            margin: 0;
            font-family: 'Plus Jakarta Sans', 'Lexend Deca', sans-serif;
            font-size: clamp(1rem, 1.3vw, 1.42rem);
            line-height: 1.46;
            letter-spacing: 0.004em;
        }

        .mission-story {
            width: 100%;
            display: grid;
            gap: 0.75rem;
        }

        .mission-story-item {
            display: grid;
            grid-template-columns: auto minmax(0, 1fr);
            gap: 0.8rem;
            align-items: start;
            padding: 0;
        }

        .mission-story-index {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 1.75rem;
            height: 1.75rem;
            border-radius: 999px;
            border: 1px solid rgba(248, 180, 112, 0.28);
            background: rgba(249, 115, 22, 0.1);
            color: #f8fafc;
            font-family: 'Sora', 'Montserrat', sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.04em;
        }

        .mission-story-text {
            margin: 0;
            font-family: 'Plus Jakarta Sans', 'Lexend Deca', sans-serif;
            font-size: clamp(0.92rem, 1.05vw, 1.02rem);
            line-height: 1.62;
            letter-spacing: 0.004em;
            color: rgba(241, 245, 249, 0.96);
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
            animation: storyRoleShimmer 5s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes storyRoleShimmer {
            0%, 100% { opacity: 0.88; }
            50%       { opacity: 1;    }
        }

        .story-panel-head > *,
        .story-panel-body > * {
            opacity: 1;
            transform: translateY(0);
        }

        .story-panel-head > :nth-child(1) { transition-delay: calc(var(--story-stagger) + 0.28s); }
        .story-panel-head > :nth-child(2) { transition-delay: calc(var(--story-stagger) + 0.4s); }
        .story-panel-body > :nth-child(1) { transition-delay: calc(var(--story-stagger) + 0.62s); }
        .story-panel-body > :nth-child(2) { transition-delay: calc(var(--story-stagger) + 0.74s); }
        .story-panel-body > :nth-child(3) { transition-delay: calc(var(--story-stagger) + 0.86s); }

        .story-panel {
            opacity: 1;
            transform: scale(1);
        }

        .story-panel-head > *,
        .story-panel-body > * {
            /* always visible */
        }

        @media (max-width: 900px) {
            .mission-story-item {
                grid-template-columns: 1fr;
                gap: 0.55rem;
            }

            .mission-story-index {
                min-width: 1.75rem;
                width: 1.75rem;
                height: 1.75rem;
            }
        }

        .story-panel:hover {
            transform: translateY(-4px) scale(1.008);
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
            opacity: 1;
        }

        .story-section::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(2, 6, 23, 0) 34%, rgba(2, 6, 23, 0.54) 100%);
            pointer-events: none;
            opacity: 0.88;
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
            .section-content,
            .titleglass,
            .titleglass-2,
            .hero-card::before {
                animation: none !important;
                transition: none !important;
            }

            .hero-open-shell,
            .hero-open-item,
            .hero-open-slide {
                opacity: 1 !important;
                transform: none !important;
                filter: none !important;
                animation: none !important;
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

        /* ── PROCESS SECTION ── */
        @keyframes proc-pulse {
            0%   { opacity: 0.6; transform: scale(1); }
            50%  { opacity: 0.1; transform: scale(2.1); }
            100% { opacity: 0.6; transform: scale(1); }
        }

        .process-section {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(ellipse at 18% 30%, rgba(249,115,22,0.13) 0%, transparent 48%),
                radial-gradient(ellipse at 82% 70%, rgba(56,189,248,0.08) 0%, transparent 48%),
                linear-gradient(160deg, #040b1a 0%, #070f20 55%, #080d1c 100%);
        }

        .process-section::before {
            content: '';
            inset: 0;
            position: absolute;
            background-image:
                repeating-linear-gradient(0deg, rgba(255,255,255,0.02) 0px, rgba(255,255,255,0.02) 1px, transparent 1px, transparent 60px),
                repeating-linear-gradient(90deg, rgba(255,255,255,0.02) 0px, rgba(255,255,255,0.02) 1px, transparent 1px, transparent 60px);
            pointer-events: none;
        }

        .process-shell {
            position: relative;
            z-index: 1;
            width: min(100%, 72rem);
            margin: 0 auto;
        }

        .process-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            font-size: 0.67rem;
            font-weight: 800;
            letter-spacing: 0.17em;
            text-transform: uppercase;
            color: #fb923c;
            margin-bottom: 1rem;
        }

        .process-kicker::before {
            content: '';
            display: inline-block;
            width: 1.8rem;
            height: 2px;
            background: linear-gradient(90deg, #ea580c, #fb923c);
            border-radius: 2px;
        }

        .process-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(1.9rem, 4vw, 3rem);
            line-height: 1.1;
            font-weight: 900;
            color: #f8fafc;
            letter-spacing: -0.03em;
            text-wrap: balance;
        }

        .process-title span {
            background: linear-gradient(90deg, #fb923c, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .process-subtitle {
            margin-top: 0.75rem;
            max-width: 40rem;
            color: rgba(148,163,184,0.82);
            font-size: 0.95rem;
            line-height: 1.75;
        }

        /* timeline layout */
        .process-timeline {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            margin-top: 3.5rem;
        }

        .process-spine {
            position: absolute;
            left: 50%;
            top: 1.75rem;
            bottom: 1.75rem;
            width: 1px;
            transform: translateX(-50%);
            background: linear-gradient(
                180deg,
                transparent 0%,
                rgba(249,115,22,0.55) 8%,
                rgba(251,146,60,0.85) 50%,
                rgba(249,115,22,0.55) 92%,
                transparent 100%
            );
            box-shadow: 0 0 12px rgba(249,115,22,0.28);
        }

        .process-item {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        /* even items: card on right side */
        .process-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .proc-fill {
            flex: 1;
        }

        .proc-card {
            flex: 1;
            background: rgba(15,23,42,0.72);
            border: 1px solid rgba(249,115,22,0.22);
            border-radius: 1rem;
            padding: 1.4rem 1.6rem;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 4px 28px rgba(0,0,0,0.3), inset 0 1px 0 rgba(255,255,255,0.05);
            text-align: right;
            transition: border-color 0.3s, box-shadow 0.3s, transform 0.3s;
        }

        .process-item:nth-child(even) .proc-card {
            text-align: left;
        }

        .proc-card:hover {
            border-color: rgba(249,115,22,0.5);
            box-shadow: 0 8px 36px rgba(0,0,0,0.35), 0 0 22px rgba(249,115,22,0.13), inset 0 1px 0 rgba(255,255,255,0.07);
            transform: translateY(-2px);
        }

        .proc-card-step {
            font-size: 0.6rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(251,146,60,0.7);
            margin-bottom: 0.38rem;
        }

        .proc-card-title {
            font-size: 1rem;
            font-weight: 800;
            color: #f1f5f9;
            line-height: 1.3;
            margin-bottom: 0.3rem;
        }

        .proc-card-desc {
            font-size: 0.8rem;
            color: rgba(148,163,184,0.78);
            line-height: 1.65;
        }

        .proc-node {
            position: relative;
            z-index: 1;
            flex-shrink: 0;
            width: 3.6rem;
            height: 3.6rem;
            border-radius: 50%;
            background: linear-gradient(145deg, rgba(30,41,59,0.98), rgba(15,23,42,1));
            border: 1.5px solid rgba(249,115,22,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 0 0 5px rgba(249,115,22,0.07),
                0 0 20px rgba(249,115,22,0.22),
                inset 0 1px 0 rgba(255,255,255,0.07);
        }

        .proc-node::before {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249,115,22,0.22), transparent 70%);
            animation: proc-pulse 3s ease-in-out infinite;
            pointer-events: none;
        }

        .process-item:nth-child(2) .proc-node::before { animation-delay: 0.5s; }
        .process-item:nth-child(3) .proc-node::before { animation-delay: 1s; }
        .process-item:nth-child(4) .proc-node::before { animation-delay: 1.5s; }
        .process-item:nth-child(5) .proc-node::before { animation-delay: 2s; }
        .process-item:nth-child(6) .proc-node::before { animation-delay: 2.5s; }

        .proc-node i {
            font-size: 1.15rem;
            background: linear-gradient(135deg, #fb923c, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 0 6px rgba(249,115,22,0.6));
        }

        @media (max-width: 680px) {
            .process-spine {
                left: 1.8rem;
            }
            .process-item,
            .process-item:nth-child(even) {
                flex-direction: row;
                align-items: flex-start;
            }
            .proc-fill {
                display: none;
            }
            .proc-card,
            .process-item:nth-child(even) .proc-card {
                text-align: left;
            }
        }
        /* ── END PROCESS SECTION ── */

        /* subtle grid texture */
        .process-section::before {
            content: '';
            inset: 0;
            position: absolute;
            background-image:
                repeating-linear-gradient(0deg, rgba(255,255,255,0.025) 0px, rgba(255,255,255,0.025) 1px, transparent 1px, transparent 56px),
                repeating-linear-gradient(90deg, rgba(255,255,255,0.025) 0px, rgba(255,255,255,0.025) 1px, transparent 1px, transparent 56px);
            pointer-events: none;
        }

        .process-shell {
            position: relative;
            z-index: 1;
            width: min(100%, 76rem);
            margin: 0 auto;
        }

        .process-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: #fb923c;
            margin-bottom: 1rem;
        }

        .process-kicker::before {
            content: '';
            display: inline-block;
            width: 1.8rem;
            height: 2px;
            background: linear-gradient(90deg, #ea580c, #fb923c);
            border-radius: 2px;
        }

        .process-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(1.9rem, 4vw, 3rem);
            line-height: 1.1;
            font-weight: 900;
            color: #f8fafc;
            letter-spacing: -0.03em;
            text-wrap: balance;
        }

        .process-title span {
            background: linear-gradient(90deg, #fb923c, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .process-subtitle {
            margin-top: 0.75rem;
            max-width: 40rem;
            color: rgba(148,163,184,0.85);
            font-size: 0.95rem;
            line-height: 1.75;
        }

        .process-track {
            position: relative;
            margin-top: 3.5rem;
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 0;
        }

        /* glowing connector line */
        .process-track::before {
            content: '';
            position: absolute;
            top: 2.25rem;
            left: calc(8.33% / 2 + 2.1rem);
            right: calc(8.33% / 2 + 2.1rem);
            height: 1px;
            background: linear-gradient(
                90deg,
                transparent 0%,
                rgba(249,115,22,0.5) 20%,
                rgba(251,146,60,0.9) 50%,
                rgba(249,115,22,0.5) 80%,
                transparent 100%
            );
            box-shadow: 0 0 8px rgba(249,115,22,0.4);
        }

        .process-step {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 0.5rem;
        }

        /* outer glow ring (animated) */
        .process-icon-wrap::before {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249,115,22,0.28), transparent 70%);
            animation: proc-pulse 3s ease-in-out infinite;
            pointer-events: none;
        }

        .process-step:nth-child(2) .process-icon-wrap::before { animation-delay: 0.5s; }
        .process-step:nth-child(3) .process-icon-wrap::before { animation-delay: 1s; }
        .process-step:nth-child(4) .process-icon-wrap::before { animation-delay: 1.5s; }
        .process-step:nth-child(5) .process-icon-wrap::before { animation-delay: 2s; }
        .process-step:nth-child(6) .process-icon-wrap::before { animation-delay: 2.5s; }

        .process-icon-wrap {
            position: relative;
            z-index: 1;
            width: 4.5rem;
            height: 4.5rem;
            border-radius: 50%;
            background: linear-gradient(145deg, rgba(30,41,59,0.95), rgba(15,23,42,0.98));
            border: 1.5px solid rgba(249,115,22,0.45);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 0 0 0 rgba(249,115,22,0),
                0 0 18px rgba(249,115,22,0.18),
                inset 0 1px 0 rgba(255,255,255,0.07);
            transition: border-color 0.3s, box-shadow 0.3s, transform 0.3s;
        }

        .process-step:hover .process-icon-wrap {
            border-color: rgba(251,146,60,0.85);
            box-shadow:
                0 0 0 6px rgba(249,115,22,0.1),
                0 0 32px rgba(249,115,22,0.35),
                inset 0 1px 0 rgba(255,255,255,0.1);
            transform: translateY(-4px);
        }

        .process-icon-wrap i {
            font-size: 1.4rem;
            background: linear-gradient(135deg, #fb923c, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 0 6px rgba(249,115,22,0.55));
        }

        .process-step-num {
            margin-top: 1rem;
            font-size: 0.6rem;
            font-weight: 800;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            color: rgba(251,146,60,0.7);
        }

        .process-step-label {
            margin-top: 0.28rem;
            font-size: 0.88rem;
            font-weight: 800;
            color: #f1f5f9;
            line-height: 1.3;
        }

        .process-step-desc {
            margin-top: 0.32rem;
            font-size: 0.74rem;
            color: rgba(148,163,184,0.8);
            line-height: 1.6;
        }

        @media (max-width: 1024px) {
            .process-track {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 2.5rem 0.5rem;
            }
            .process-track::before { display: none; }
        }

        @media (max-width: 600px) {
            .process-track {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 2rem 0.5rem;
            }
        }

        @media (max-width: 380px) {
            .process-track {
                grid-template-columns: 1fr;
            }
        }
        /* ── END PROCESS SECTION ── */

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
            gap: 1rem;
            align-content: center;
        }

        /* ── per-card accent tokens ── */
        .program-benefit-card {
            --bc-r: 249; --bc-g: 115; --bc-b: 22; /* orange default */
        }
        .program-benefit-card:nth-child(2) {
            --bc-r: 6;   --bc-g: 182; --bc-b: 212; /* cyan */
        }
        .program-benefit-card:nth-child(3) {
            --bc-r: 139; --bc-g: 92;  --bc-b: 246; /* violet */
        }

        .program-benefit-card {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            border-radius: 1.6rem;
            border: 1px solid rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.22);
            padding: 1.4rem 1.5rem 1.35rem;
            background:
                linear-gradient(145deg,
                    rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.07) 0%,
                    rgba(15, 23, 42, 0.72) 100%
                );
            backdrop-filter: blur(18px) saturate(1.4);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.07),
                0 0 0 1px rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.08),
                0 16px 40px rgba(8, 15, 32, 0.38);
            transition:
                transform 380ms cubic-bezier(0.22, 1, 0.36, 1),
                box-shadow 380ms ease,
                border-color 280ms ease;
        }

        /* top accent line */
        .program-benefit-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 1.6rem;
            right: 1.6rem;
            height: 2px;
            border-radius: 0 0 4px 4px;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.9) 40%,
                rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.9) 60%,
                transparent
            );
            opacity: 0.7;
            pointer-events: none;
            transition: opacity 280ms ease;
        }

        /* ambient glow blob */
        .program-benefit-card::after {
            content: '';
            position: absolute;
            inset: auto -20% -55% 35%;
            height: 80%;
            border-radius: 50%;
            background: radial-gradient(
                circle,
                rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.18),
                rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0) 72%
            );
            pointer-events: none;
            transition: opacity 380ms ease;
            opacity: 0.6;
            z-index: -1;
        }

        .program-benefit-card:nth-child(2) {
            margin-left: 1rem;
        }
        .program-benefit-card:nth-child(3) {
            margin-left: 2rem;
        }

        .program-benefit-card:hover {
            transform: translateY(-7px) scale(1.015);
            border-color: rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.52);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.1),
                0 0 0 1px rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.18),
                0 28px 56px rgba(8, 15, 32, 0.44),
                0 0 38px rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.22);
        }
        .program-benefit-card:hover::before { opacity: 1; }
        .program-benefit-card:hover::after  { opacity: 1; }

        .program-benefit-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 0.75rem;
            margin-bottom: 0.85rem;
        }

        .program-benefit-icon {
            width: 2.7rem;
            height: 2.7rem;
            border-radius: 1rem;
            display: grid;
            place-items: center;
            font-size: 1.1rem;
            color: #fff;
            flex-shrink: 0;
            background: linear-gradient(
                145deg,
                rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.9),
                rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.55)
            );
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.24),
                0 8px 20px rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.3);
        }

        .program-benefit-metric {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.75rem;
            font-weight: 900;
            letter-spacing: -0.03em;
            line-height: 1;
            background: linear-gradient(
                135deg,
                rgb(var(--bc-r), var(--bc-g), var(--bc-b)) 0%,
                rgba(var(--bc-r), var(--bc-g), var(--bc-b), 0.65) 100%
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .program-benefit-title {
            font-size: 0.9rem;
            font-weight: 800;
            letter-spacing: 0.01em;
            color: rgba(241, 245, 249, 0.96);
            margin-bottom: 0.35rem;
        }

        .program-benefit-desc {
            font-size: 0.76rem;
            color: rgba(148, 163, 184, 0.88);
            line-height: 1.6;
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
        html.dark .program-section {
            background:
                radial-gradient(ellipse at 8% 60%, rgba(251,146,60,0.06) 0%, transparent 42%),
                radial-gradient(ellipse at 92% 30%, rgba(56,189,248,0.05) 0%, transparent 42%),
                linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        }
        html.dark .prog-feat-row {
            background: #1e293b;
            border-color: rgba(255,255,255,0.08);
            box-shadow: 0 4px 24px rgba(0,0,0,0.2);
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
        html.dark .program-section::before {
            background-image:
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
        }
        /* ── CTA SECTION ── */
        .partner-section {
            position: relative;
            overflow: hidden;
            background: #1a0a00;
            padding: 0;
        }

        /* CTA banner */
        .cta-banner {
            position: relative;
            margin: 0;
            border-radius: 0;
            overflow: hidden;
            background:
                radial-gradient(ellipse at 15% 50%, rgba(249,115,22,0.35) 0%, transparent 50%),
                radial-gradient(ellipse at 85% 50%, rgba(234,88,12,0.2) 0%, transparent 50%),
                linear-gradient(135deg, #1a0a00 0%, #2d1200 50%, #1a0a00 100%);
            padding: 4rem 2rem 4.5rem;
            text-align: center;
        }

        .cta-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(0deg, rgba(255,255,255,0.025) 0px, rgba(255,255,255,0.025) 1px, transparent 1px, transparent 60px),
                repeating-linear-gradient(90deg, rgba(255,255,255,0.025) 0px, rgba(255,255,255,0.025) 1px, transparent 1px, transparent 60px);
            pointer-events: none;
        }

        .cta-banner-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 1rem;
            border-radius: 999px;
            border: 1px solid rgba(251,146,60,0.4);
            background: rgba(249,115,22,0.12);
            color: #fb923c;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .cta-banner-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(2rem, 5vw, 3.6rem);
            font-weight: 900;
            color: #fff;
            line-height: 1.08;
            letter-spacing: -0.03em;
            max-width: 36rem;
            margin: 0 auto 1.25rem;
            position: relative;
        }

        .cta-banner-title span {
            background: linear-gradient(135deg, #f97316 30%, #fdba74);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .cta-banner-sub {
            color: rgba(253,186,116,0.7);
            font-size: 0.95rem;
            max-width: 30rem;
            margin: 0 auto 2.5rem;
            line-height: 1.7;
            position: relative;
        }

        .cta-banner-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            position: relative;
        }

        .cta-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2.8rem;
            border-radius: 999px;
            background: #fff;
            color: #ea580c;
            font-size: 1rem;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 16px 40px rgba(0,0,0,0.28);
            transition: transform 0.22s ease, box-shadow 0.22s ease, gap 0.22s ease;
        }

        .cta-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 22px 48px rgba(0,0,0,0.45);
            gap: 0.9rem;
        }

        .cta-btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            padding: 1rem 1.8rem;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.3);
            color: rgba(255,255,255,0.85);
            font-size: 0.88rem;
            font-weight: 700;
            text-decoration: none;
            backdrop-filter: blur(8px);
            transition: border-color 0.25s ease, color 0.25s ease, background 0.25s ease;
        }

        .cta-btn-secondary:hover {
            border-color: rgba(255,255,255,0.6);
            color: #fff;
            background: rgba(255,255,255,0.08);
        }
        /* ── END PARTNER + CTA ── */

        /* ── PROBLEM & SOLUTION SECTION ── */
        .probsol-section {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(ellipse at 10% 40%, rgba(239,68,68,0.10) 0%, transparent 45%),
                radial-gradient(ellipse at 90% 60%, rgba(249,115,22,0.12) 0%, transparent 45%),
                linear-gradient(160deg, #04080f 0%, #06101e 55%, #050b17 100%);
        }

        .probsol-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(0deg, rgba(255,255,255,0.018) 0px, rgba(255,255,255,0.018) 1px, transparent 1px, transparent 64px),
                repeating-linear-gradient(90deg, rgba(255,255,255,0.018) 0px, rgba(255,255,255,0.018) 1px, transparent 1px, transparent 64px);
            pointer-events: none;
        }

        .probsol-shell {
            position: relative;
            z-index: 1;
            width: min(100%, 76rem);
            margin: 0 auto;
        }

        .probsol-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            font-size: 0.67rem;
            font-weight: 800;
            letter-spacing: 0.17em;
            text-transform: uppercase;
            color: #f87171;
            margin-bottom: 1rem;
        }

        .probsol-kicker::before {
            display: none;
        }

        .probsol-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(1.9rem, 4vw, 3rem);
            font-weight: 900;
            line-height: 1.08;
            letter-spacing: -0.03em;
            color: #f8fafc;
            text-wrap: balance;
        }

        .probsol-title span {
            background: linear-gradient(90deg, #fb923c, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .probsol-subtitle {
            margin-top: 0.75rem;
            max-width: 42rem;
            color: rgba(148,163,184,0.8);
            font-size: 0.95rem;
            line-height: 1.75;
        }

        /* grid of two columns */
        .probsol-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-top: 3.5rem;
            align-items: start;
        }

        @media (max-width: 820px) {
            .probsol-grid { grid-template-columns: 1fr; }
        }

        /* shared column header */
        .probsol-col-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            font-size: 0.85rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            margin-bottom: 1.25rem;
        }

        .probsol-col-label i {
            font-size: 1rem;
        }

        .probsol-col-label--problem { color: #f87171; }
        .probsol-col-label--solution { color: #4ade80; }

        /* problem card */
        .probsol-problem-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            border-radius: 1.25rem;
            border: 1px solid rgba(239,68,68,0.22);
            background: rgba(10,6,6,0.72);
            backdrop-filter: blur(14px);
            padding: 1.35rem 1.5rem;
            margin-bottom: 0.85rem;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
            transition: border-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .probsol-problem-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(135deg, rgba(239,68,68,0.08) 0%, transparent 60%);
            pointer-events: none;
        }

        .probsol-problem-card:hover {
            border-color: rgba(239,68,68,0.48);
            transform: translateX(4px);
            box-shadow: 0 8px 28px rgba(239,68,68,0.12), inset 0 1px 0 rgba(255,255,255,0.05);
        }

        .probsol-problem-icon {
            flex-shrink: 0;
            width: 2.4rem;
            height: 2.4rem;
            border-radius: 0.75rem;
            background: rgba(239,68,68,0.14);
            border: 1px solid rgba(239,68,68,0.3);
            display: grid;
            place-items: center;
            color: #f87171;
            font-size: 0.9rem;
        }

        .probsol-problem-title {
            font-size: 0.9rem;
            font-weight: 800;
            color: #f1f5f9;
            margin-bottom: 0.28rem;
        }

        .probsol-problem-desc {
            font-size: 0.78rem;
            color: rgba(148,163,184,0.78);
            line-height: 1.62;
            margin: 0;
        }

        /* solution card */
        .probsol-solution-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            border-radius: 1.25rem;
            border: 1px solid rgba(74,222,128,0.2);
            background: rgba(4,12,8,0.72);
            backdrop-filter: blur(14px);
            padding: 1.35rem 1.5rem;
            margin-bottom: 0.85rem;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
            transition: border-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .probsol-solution-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(135deg, rgba(74,222,128,0.07) 0%, transparent 60%);
            pointer-events: none;
        }

        .probsol-solution-card:hover {
            border-color: rgba(74,222,128,0.45);
            transform: translateX(-4px);
            box-shadow: 0 8px 28px rgba(74,222,128,0.1), inset 0 1px 0 rgba(255,255,255,0.05);
        }

        .probsol-solution-icon {
            flex-shrink: 0;
            width: 2.4rem;
            height: 2.4rem;
            border-radius: 0.75rem;
            background: rgba(74,222,128,0.12);
            border: 1px solid rgba(74,222,128,0.28);
            display: grid;
            place-items: center;
            color: #4ade80;
            font-size: 0.9rem;
        }

        .probsol-solution-title {
            font-size: 0.9rem;
            font-weight: 800;
            color: #f1f5f9;
            margin-bottom: 0.28rem;
        }

        .probsol-solution-desc {
            font-size: 0.78rem;
            color: rgba(148,163,184,0.78);
            line-height: 1.62;
            margin: 0;
        }

        /* divider arrow between columns */
        .probsol-divider {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: rgba(249,115,22,0.5);
            font-size: 1.3rem;
            pointer-events: none;
        }

        @media (max-width: 820px) {
            .probsol-divider { display: none; }
        }
        /* ── END PROBLEM & SOLUTION SECTION ── */

        /* ── SCROLL REVEAL ANIMATIONS ── */
        @media (prefers-reduced-motion: no-preference) {
            [data-reveal] {
                opacity: 0 !important;
                transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1),
                            transform 0.85s cubic-bezier(0.16, 1, 0.3, 1) !important;
                will-change: opacity, transform;
            }
            [data-reveal="up"]    { transform: translateY(56px) scale(0.97) !important; }
            [data-reveal="left"]  { transform: translateX(-72px) scale(0.97) !important; }
            [data-reveal="right"] { transform: translateX(72px) scale(0.97) !important; }
            [data-reveal="scale"] { transform: scale(0.86) translateY(24px) !important; }
            [data-reveal].revealed {
                opacity: 1 !important;
                transform: none !important;
            }
            [data-delay="1"] { transition-delay: 0.12s; }
            [data-delay="2"] { transition-delay: 0.26s; }
            [data-delay="3"] { transition-delay: 0.40s; }
            [data-delay="4"] { transition-delay: 0.54s; }
            [data-delay="5"] { transition-delay: 0.68s; }
        }
        /* ── END SCROLL REVEAL ANIMATIONS ── */

        /* ── LIGHT MODE OVERRIDES ── */

        /* Story section */
        html:not(.dark) .story-section {
            background: linear-gradient(180deg, #f1f5f9 0%, #e8edf5 100%);
        }
        html:not(.dark) .story-section::before {
            background:
                radial-gradient(circle at 16% 22%, rgba(249,115,22,0.07), transparent 34%),
                radial-gradient(circle at 84% 68%, rgba(168,85,247,0.04), transparent 42%);
        }
        html:not(.dark) .story-section::after { display: none; }
        html:not(.dark) .story-panel {
            background: rgba(255,255,255,0.96);
            border-color: rgba(249,115,22,0.26);
            box-shadow: 0 12px 36px rgba(0,0,0,0.09), inset 0 1px 0 rgba(255,255,255,1);
        }
        html:not(.dark) .story-panel:hover {
            box-shadow: 0 24px 56px rgba(0,0,0,0.13), 0 0 0 1.5px rgba(249,115,22,0.36);
            border-color: rgba(249,115,22,0.6);
        }
        html:not(.dark) .story-panel-head {
            border-right-color: rgba(0,0,0,0.07);
        }
        html:not(.dark) .story-panel-body {
            background: rgba(248,250,252,0.6);
            color: #1e293b;
        }
        html:not(.dark) .story-panel-body p { color: #334155; }
        html:not(.dark) .mission-story-text { color: #334155; }
        html:not(.dark) .mission-story-index {
            color: #1e293b;
            background: rgba(249,115,22,0.08);
            border-color: rgba(249,115,22,0.22);
        }

        /* Process section */
        html:not(.dark) .process-section {
            background:
                radial-gradient(ellipse at 18% 30%, rgba(249,115,22,0.05) 0%, transparent 48%),
                radial-gradient(ellipse at 82% 70%, rgba(56,189,248,0.04) 0%, transparent 48%),
                linear-gradient(160deg, #f8fafc 0%, #f1f5f9 55%, #f8fafc 100%);
        }
        html:not(.dark) .process-section::before {
            background-image:
                repeating-linear-gradient(0deg, rgba(0,0,0,0.04) 0px, rgba(0,0,0,0.04) 1px, transparent 1px, transparent 56px),
                repeating-linear-gradient(90deg, rgba(0,0,0,0.04) 0px, rgba(0,0,0,0.04) 1px, transparent 1px, transparent 56px);
        }
        html:not(.dark) .process-title { color: #0f172a; }
        html:not(.dark) .process-subtitle { color: rgba(71,85,105,0.9); }
        html:not(.dark) .process-spine {
            background: linear-gradient(180deg, transparent 0%, rgba(249,115,22,0.36) 8%, rgba(249,115,22,0.58) 50%, rgba(249,115,22,0.36) 92%, transparent 100%);
        }
        html:not(.dark) .proc-card {
            background: rgba(255,255,255,0.95);
            border-color: rgba(249,115,22,0.16);
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        }
        html:not(.dark) .proc-card:hover {
            box-shadow: 0 8px 32px rgba(0,0,0,0.11), 0 0 18px rgba(249,115,22,0.08);
        }
        html:not(.dark) .proc-card-title { color: #0f172a; }
        html:not(.dark) .proc-card-desc { color: rgba(71,85,105,0.88); }
        html:not(.dark) .process-icon-wrap {
            background: linear-gradient(145deg, #ffffff, #f1f5f9);
            border-color: rgba(249,115,22,0.32);
            box-shadow: 0 0 0 0 transparent, 0 0 14px rgba(249,115,22,0.12), inset 0 1px 0 rgba(255,255,255,1);
        }
        html:not(.dark) .process-step-label { color: #0f172a; }
        html:not(.dark) .process-step-desc { color: rgba(71,85,105,0.84); }
        html:not(.dark) .proc-node {
            background: linear-gradient(145deg, #ffffff, #f1f5f9);
            border-color: rgba(249,115,22,0.42);
            box-shadow: 0 0 0 5px rgba(249,115,22,0.05), 0 0 16px rgba(249,115,22,0.14), inset 0 1px 0 rgba(255,255,255,1);
        }

        /* Program section */
        html:not(.dark) .program-section {
            background:
                radial-gradient(circle at 84% 12%, rgba(249,115,22,0.08), rgba(249,115,22,0) 34%),
                radial-gradient(circle at 14% 88%, rgba(56,189,248,0.04), rgba(56,189,248,0) 40%),
                linear-gradient(132deg, #f8fafc 0%, #eff6ff 56%, #f0f9ff 100%);
        }
        html:not(.dark) .program-headline { color: #0f172a; text-shadow: none; }
        html:not(.dark) .program-subtitle { color: rgba(51,65,85,0.88); text-shadow: none; }
        html:not(.dark) .program-kicker {
            color: rgba(15,23,42,0.78);
            border-color: rgba(15,23,42,0.16);
            background: rgba(255,255,255,0.8);
        }
        html:not(.dark) .program-benefit-card {
            background: linear-gradient(145deg, rgba(var(--bc-r),var(--bc-g),var(--bc-b),0.04) 0%, rgba(255,255,255,0.96) 100%);
            box-shadow: inset 0 1px 0 rgba(255,255,255,1), 0 0 0 1px rgba(var(--bc-r),var(--bc-g),var(--bc-b),0.1), 0 8px 24px rgba(0,0,0,0.06);
        }
        html:not(.dark) .program-benefit-title { color: #0f172a; }
        html:not(.dark) .program-benefit-desc { color: rgba(71,85,105,0.88); }
        html:not(.dark) .prog-feat-row {
            background: #ffffff;
            border-color: rgba(0,0,0,0.08);
            box-shadow: 0 4px 16px rgba(0,0,0,0.07);
        }
        html:not(.dark) .prog-feat-title { color: #0f172a; }
        html:not(.dark) .prog-feat-desc { color: rgba(71,85,105,0.88); }

        /* Problem & Solution section */
        html:not(.dark) .probsol-section {
            background:
                radial-gradient(ellipse at 10% 40%, rgba(239,68,68,0.04) 0%, transparent 45%),
                radial-gradient(ellipse at 90% 60%, rgba(249,115,22,0.05) 0%, transparent 45%),
                linear-gradient(160deg, #f8fafc 0%, #f1f5f9 55%, #f8fafc 100%);
        }
        html:not(.dark) .probsol-section::before {
            background-image:
                repeating-linear-gradient(0deg, rgba(0,0,0,0.03) 0px, rgba(0,0,0,0.03) 1px, transparent 1px, transparent 64px),
                repeating-linear-gradient(90deg, rgba(0,0,0,0.03) 0px, rgba(0,0,0,0.03) 1px, transparent 1px, transparent 64px);
        }
        html:not(.dark) .probsol-title { color: #0f172a; }
        html:not(.dark) .probsol-subtitle { color: rgba(71,85,105,0.84); }
        html:not(.dark) .probsol-problem-card {
            background: rgba(255,255,255,0.96);
            border-color: rgba(239,68,68,0.18);
            box-shadow: 0 4px 16px rgba(239,68,68,0.05);
        }
        html:not(.dark) .probsol-problem-card:hover {
            background: rgba(254,242,242,0.98);
            border-color: rgba(239,68,68,0.38);
            box-shadow: 0 8px 24px rgba(239,68,68,0.12);
        }
        html:not(.dark) .probsol-problem-title { color: #1e293b; }
        html:not(.dark) .probsol-problem-desc { color: rgba(71,85,105,0.86); }
        html:not(.dark) .probsol-solution-card {
            background: rgba(255,255,255,0.96);
            border-color: rgba(74,222,128,0.2);
            box-shadow: 0 4px 16px rgba(74,222,128,0.05);
        }
        html:not(.dark) .probsol-solution-card:hover {
            background: rgba(240,253,244,0.98);
            border-color: rgba(74,222,128,0.42);
            box-shadow: 0 8px 24px rgba(74,222,128,0.12);
        }
        html:not(.dark) .probsol-solution-title { color: #1e293b; }
        html:not(.dark) .probsol-solution-desc { color: rgba(71,85,105,0.86); }
        /* ── END LIGHT MODE OVERRIDES ── */
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
            {{-- <h1 class="text-3xl md:text-4xl font-bold">Selamat Datang ke SESOC</h1> --}}
            <button id="startIntroButton" class="bg-orange-500 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-orange-600 transition">Start Now</button>
        </div>
        <video id="introVideo" class="relative hidden w-full h-full object-cover" playsinline>
            <source src="{{ asset('videos/IntroSES.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <main id="snapContainer">
    {{-- 🔹 IKLAN SECTION --}}
    <section class="snap-section is-active relative w-full">
    
   {{-- 🔹 GLASS CONTENT --}}
        <div class="absolute z-30 
                    /* Mobile: Centered horizontally,*/
                    inset-x-8 top-1/2 -translate-y-1/2 px-6 
                    /* Desktop: Reset to your original left-aligned look */
                    lg:left-20 lg:top-1/2 lg:-translate-y-1/2 lg:bottom-auto lg:px-0 lg:max-w-xl">
            
            <div class="hero-card hero-open-shell section-content bg-white/10 backdrop-blur-2xl rounded-3xl p-6 md:p-10 shadow-2xl border border-white/20 ring-1 ring-white/10 mx-auto lg:mx-0" data-reveal="up">

                    <h2 class="titleglass hero-open-item text-2xl md:text-4xl lg:text-5xl leading-[0.95] uppercase tracking-tight" style="--hero-delay: 420ms;">
                        SMART <br class="hidden md:block"> 
                </h2>

                    <h2 class="titleglass-2 hero-open-item text-2xl md:text-4xl lg:text-5xl text-orange-400 leading-[0.95] uppercase tracking-tight drop-shadow-2xl" style="--hero-delay: 680ms;">
                        EDUCATION SOCIETY
                </h2>

                    <p class="hero-body hero-open-item cubafont text-xs md:text-sm lg:text-sm text-white/80 mt-6 md:mt-8 max-w-md lg:max-w-lg leading-relaxed tracking-wide border-l border-white/30 pl-4" style="--hero-delay: 980ms;">
                        SMART EDUCATION SOCIETY (SES) merupakan entiti strategik yang ditubuhkan sebagai platform rujukan dan bimbingan bagi membantu klien membuat keputusan tepat sebelum melangkah ke peringkat pendidikan tinggi.
                        <br><br>
                        Kami bukan sekadar penasihat, kami membina keyakinan, merangka strategi dan membuka perspektif baharu agar setiap individu mampu mengenal pasti potensi sebenar mereka. Kami percaya bahawa setiap keputusan yang diambil hari ini akan mencorak masa depan.
                </p>

                <a href="{{ route('program') }}"
                   class="hero-cta hero-open-item inline-block mt-8 md:mt-10 border border-white text-white px-8 md:px-10 py-3 md:py-4 rounded-none text-[10px] md:text-xs uppercase font-bold hover:bg-white hover:text-black transition-all duration-300 transform active:scale-95 w-full sm:w-auto text-center"
                   style="--hero-delay: 1320ms;">
                    Lihat Program
                </a>

            </div>
        </div>

    <div id="slider" class="hero-slider-shell overflow-hidden relative w-full">

        <div id="slides" class="flex transition-transform duration-700">

            <!-- SLIDE 1 -->
            <div class="min-w-full relative">
                <img src="{{ asset('images/stack-diplomas-antique-bookshelf-background-generated-by-ai.jpg') }}" class="hero-open-slide w-full h-[100svh] object-cover">

                <!-- DARK OVERLAY -->
                <div class="absolute inset-0 bg-black/30"></div>
            </div>

            <!-- SLIDE 2 -->
            <div class="min-w-full relative">
                <img src="{{ asset('images/tvet.jpg') }}" class="hero-open-slide w-full h-[100svh] object-cover">

                <div class="absolute inset-0 bg-black/30"></div>
            </div>

            <!-- SLIDE 3 -->
            <div class="min-w-full relative">
                <img src="{{ asset('images/doctors-with-laptop-whiteboard.jpg') }}" class="hero-open-slide w-full h-[100svh] object-cover">

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

    <section class="story-section flex items-center justify-center px-6 py-16">
        <div class="story-pair-wrapper">
            <div class="story-panel story-panel--left" data-reveal="left">
                <div class="story-panel-head">
                    <h3 class="story-role">Visi</h3>
                </div>
                <div class="story-panel-body">
                    <p>Menjadi pusat rujukan utama dan pilihan alternatif terbaik dalam membantu klien membuat keputusan yang tepat bagi menentukan hala tuju pendidikan dan kerjaya masa depan mereka.</p>
                </div>
            </div>
            <div class="story-panel story-panel--right" data-reveal="right" data-delay="2">
                <div class="story-panel-head">
                    <h3 class="story-role">Misi</h3>
                </div>
                <div class="story-panel-body">
                    <div class="mission-story">
                        <article class="mission-story-item">
                            <span class="mission-story-index">01</span>
                            <p class="mission-story-text">Menjangkau setiap individu yang tekad membuktikan bahawa kejayaan masih milik mereka, meskipun bermula dari titik paling belakang.</p>
                        </article>
                        <article class="mission-story-item">
                            <span class="mission-story-index">02</span>
                            <p class="mission-story-text">Membentuk minda pejuang sejati, kerana kejayaan sebenar tidak bergantung kepada titik permulaan, sebaliknya pada kekuatan "Sebab Utama" (Big Why) yang memacu mereka untuk terus melangkah dan menang.</p>
                        </article>
                        <article class="mission-story-item">
                            <span class="mission-story-index">03</span>
                            <p class="mission-story-text">Menjalin kerjasama dengan institusi pendidikan bagi mempermudah proses klien untuk mendapatkan tempat pengajian atau latihan tanpa perlu melalui prosedur yang rumit.</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🔹 PROBLEM & SOLUTION SECTION --}}
    <section class="probsol-section snap-section px-6 py-20">
        <div class="probsol-shell section-content">

            <div class="text-center" data-reveal="up">
                <h2 class="probsol-title">Masalah Sebenar.<br><span>Penyelesaian Nyata.</span></h2>
                <p class="probsol-subtitle mx-auto">Ramai pelajar terhenti kerana tiada panduan yang tepat. Kami bantu mereka teruskan langkah.</p>
            </div>

            <div class="probsol-grid">

                {{-- PROBLEMS COLUMN --}}
                <div data-reveal="left" data-delay="2">
                    <p class="probsol-col-label probsol-col-label--problem">
                        <i class="fa-solid fa-triangle-exclamation"></i> Masalah Yang Dihadapi
                    </p>

                    <div class="probsol-problem-card">
                        <div class="probsol-problem-icon"><i class="fa-solid fa-map-signs"></i></div>
                        <div>
                            <p class="probsol-problem-title">Tiada Hala Tuju Yang Jelas</p>
                            <p class="probsol-problem-desc">Tak pasti program atau institusi mana yang paling sesuai.</p>
                        </div>
                    </div>

                    <div class="probsol-problem-card">
                        <div class="probsol-problem-icon"><i class="fa-solid fa-file-circle-xmark"></i></div>
                        <div>
                            <p class="probsol-problem-title">Proses Permohonan Yang Rumit</p>
                            <p class="probsol-problem-desc">Borang dan syarat panjang membuat ramai rasa tertekan.</p>
                        </div>
                    </div>

                    <div class="probsol-problem-card">
                        <div class="probsol-problem-icon"><i class="fa-solid fa-circle-dollar-to-slot"></i></div>
                        <div>
                            <p class="probsol-problem-title">Kebimbangan Kos Pengajian</p>
                            <p class="probsol-problem-desc">Kos dan bantuan kewangan tidak jelas, jadi ramai ragu untuk mulakan.</p>
                        </div>
                    </div>

                    <div class="probsol-problem-card">
                        <div class="probsol-problem-icon"><i class="fa-solid fa-user-slash"></i></div>
                        <div>
                            <p class="probsol-problem-title">Kurang Sokongan &amp; Bimbingan</p>
                            <p class="probsol-problem-desc">Ramai membuat keputusan besar tanpa mentor yang faham mereka.</p>
                        </div>
                    </div>
                </div>

                {{-- SOLUTIONS COLUMN --}}
                <div data-reveal="right" data-delay="2">
                    <p class="probsol-col-label probsol-col-label--solution">
                        <i class="fa-solid fa-circle-check"></i> Penyelesaian Kami
                    </p>

                    <div class="probsol-solution-card">
                        <div class="probsol-solution-icon"><i class="fa-solid fa-compass"></i></div>
                        <div>
                            <p class="probsol-solution-title">Konsultasi Peribadi &amp; Terperinci</p>
                            <p class="probsol-solution-desc">Kami pilih laluan paling sesuai berdasarkan minat dan kelayakan anda.</p>
                        </div>
                    </div>

                    <div class="probsol-solution-card">
                        <div class="probsol-solution-icon"><i class="fa-solid fa-hands-holding"></i></div>
                        <div>
                            <p class="probsol-solution-title">Bantuan Permohonan Lengkap</p>
                            <p class="probsol-solution-desc">Kami uruskan dokumen dan proses supaya anda boleh fokus pada permulaan baru.</p>
                        </div>
                    </div>

                    <div class="probsol-solution-card">
                        <div class="probsol-solution-icon"><i class="fa-solid fa-piggy-bank"></i></div>
                        <div>
                            <p class="probsol-solution-title">Panduan Kewangan &amp; Biasiswa</p>
                            <p class="probsol-solution-desc">Kami tunjukkan pilihan pembiayaan dan biasiswa yang sesuai untuk situasi anda.</p>
                        </div>
                    </div>

                    <div class="probsol-solution-card">
                        <div class="probsol-solution-icon"><i class="fa-solid fa-people-roof"></i></div>
                        <div>
                            <p class="probsol-solution-title">Sokongan Berterusan Pasca-Daftar</p>
                            <p class="probsol-solution-desc">Kami terus bantu anda selepas daftar untuk kekal di landasan yang betul.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 🔹 PROGRAM SECTION --}}
    <section class="program-section flex items-center justify-center px-6 py-16">
        <div class="program-shell section-content">

            <div class="program-heading" data-reveal="up">
                <p class="program-kicker"><i class="fa-solid fa-bolt"></i> Program Teknikal Pilihan</p>
                <h2 class="program-headline">Belajar Skill Industri. <span>Terus Dapat Kerja.</span></h2>
                <p class="program-subtitle">Laluan pantas ke kerjaya sebenar melalui latihan berasaskan industri, pensijilan diiktiraf, dan bimbingan kerjaya berfokus hasil.</p>
            </div>

            <div class="program-grid">
                <article class="program-featured-card" data-reveal="scale">
                    <div class="program-featured-image" aria-hidden="true">
                        <video autoplay muted loop playsinline preload="none">
                            <source src="{{ asset('videos/prop.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="program-featured-overlay" aria-hidden="true"></div>
                    <div class="program-featured-glow" aria-hidden="true"></div>


                </article>

                <div class="program-benefit-stack">
                    <article class="program-benefit-card" data-reveal="right">
                        <div class="program-benefit-top">
                            <div class="program-benefit-icon"><i class="fa-solid fa-user-graduate"></i></div>
                            <div class="program-benefit-metric"></div>
                        </div>
                        <p class="program-benefit-title">Pelajar Berjaya</p>
                        <p class="program-benefit-desc">Komuniti alumni besar yang sudah menembusi pasaran kerja.</p>
                    </article>

                    <article class="program-benefit-card" data-reveal="right" data-delay="2">
                        <div class="program-benefit-top">
                            <div class="program-benefit-icon"><i class="fa-solid fa-handshake-angle"></i></div>
                            <div class="program-benefit-metric"></div>
                        </div>
                        <p class="program-benefit-title">Kerjasama Industri</p>
                        <p class="program-benefit-desc">Hubungan strategik untuk latihan praktikal dan peluang pekerjaan.</p>
                    </article>

                    <article class="program-benefit-card" data-reveal="right" data-delay="4">
                        <div class="program-benefit-top">
                            <div class="program-benefit-icon"><i class="fa-solid fa-briefcase"></i></div>
                            <div class="program-benefit-metric"></div>
                        </div>
                        <p class="program-benefit-title">Sokongan Kerjaya</p>
                        <p class="program-benefit-desc">CV, persediaan temuduga dan hala tuju kerjaya hingga dapat kerja.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {{-- 🔹 CTA BANNER --}}
    <section class="partner-section">

        <div class="cta-banner">
            <div class="cta-banner-eyebrow" data-reveal="up"><i class="fa-solid fa-bolt"></i> Konsultasi Percuma</div>
            <h2 class="cta-banner-title" data-reveal="up" data-delay="1">Jangan Tunggu.<br><span>Masa Depan Anda Bermula Hari Ini.</span></h2>
            <p class="cta-banner-sub" data-reveal="up" data-delay="2">Satu perbualan boleh ubah hala tuju hidup anda. Kami sedia membantu percuma, tanpa sebarang obligasi.</p>
            <div class="cta-banner-actions" data-reveal="up" data-delay="3">
                <a href="{{ route('program') }}" class="cta-btn-primary">
                    <i class="fa-solid fa-graduation-cap"></i> Terokai Program
                </a>
                <a href="{{ route('hubungi') }}" class="cta-btn-secondary">
                    Bincang Dengan Kami <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

    </section>

<section class="footer-slide">
    <div class="w-full [&_.footer-ocean]:mt-0 [&_.footer-ocean]:!mt-0">
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
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function runHeroOpeningAnimation() {
    if (prefersReducedMotion) return;
    document.body.classList.remove('hero-open-active');
    window.requestAnimationFrame(function() {
        document.body.classList.add('hero-open-active');
    });
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
        runHeroOpeningAnimation();
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
        runHeroOpeningAnimation();
    }
}

showIntroOverlayIfNeeded();

// AUTO SLIDE
setInterval(nextSlide, 4000);

// ── SCROLL REVEAL ──
(function () {
    var revealEls = document.querySelectorAll('[data-reveal]');
    if (!revealEls.length) return;

    // Fallback: if IntersectionObserver is not supported, show everything immediately
    if (!('IntersectionObserver' in window)) {
        revealEls.forEach(function (el) { el.classList.add('revealed'); });
        return;
    }

    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            } else {
                entry.target.classList.remove('revealed');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -48px 0px' });

    revealEls.forEach(function (el) { io.observe(el); });
})();
// ── END SCROLL REVEAL ──

</script>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
            border: 1px solid rgba(251, 146, 60, 0.36);
            background: linear-gradient(145deg, rgba(15, 23, 42, 0.84), rgba(30, 41, 59, 0.62));
            backdrop-filter: blur(14px);
            padding: clamp(1.4rem, 3vw, 2.5rem);
            box-shadow: 0 26px 64px rgba(15, 23, 42, 0.34), inset 0 1px 0 rgba(255, 255, 255, 0.06);
        }

        .story-panel .hero-vision-label {
            margin-bottom: 0.9rem;
        }

        .story-panel .hero-vision-text {
            font-size: clamp(0.95rem, 1.45vw, 1.2rem);
            line-height: 1.9;
        }

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
                radial-gradient(ellipse at 10% 50%, rgba(251,146,60,0.09) 0%, transparent 45%),
                radial-gradient(ellipse at 90% 50%, rgba(56,189,248,0.07) 0%, transparent 45%),
                linear-gradient(180deg, #eef2f7 0%, #f8fafc 100%);
            position: relative;
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
            font-size: clamp(1.6rem, 3.5vw, 2.6rem);
            font-weight: 900;
            color: #0f172a;
            line-height: 1.1;
        }
        .program-section-title span {
            background: linear-gradient(120deg, #ea580c 0%, #f97316 55%, #fb923c 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .feat-card {
            position: relative;
            background: #ffffff;
            border: 1px solid rgba(15,23,42,0.08);
            border-radius: 1.25rem;
            padding: 1.6rem 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(15,23,42,0.06);
            transition: transform 0.32s cubic-bezier(0.23,1,0.32,1),
                        border-color 0.32s ease,
                        box-shadow 0.32s ease;
            cursor: default;
        }
        .feat-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.32s ease;
            pointer-events: none;
        }
        .feat-card.orange::before {
            background: radial-gradient(circle at 0% 50%, rgba(249,115,22,0.1), transparent 60%);
        }
        .feat-card.cyan::before {
            background: radial-gradient(circle at 0% 50%, rgba(56,189,248,0.1), transparent 60%);
        }
        .feat-card.slate::before {
            background: radial-gradient(circle at 0% 50%, rgba(100,116,139,0.08), transparent 60%);
        }
        .feat-card:hover {
            transform: translateX(6px);
            border-color: rgba(249,115,22,0.35);
            box-shadow: 0 8px 32px rgba(249,115,22,0.12), 0 2px 10px rgba(15,23,42,0.06);
        }
        .feat-card.cyan:hover {
            border-color: rgba(56,189,248,0.35);
            box-shadow: 0 8px 32px rgba(56,189,248,0.12), 0 2px 10px rgba(15,23,42,0.06);
        }
        .feat-card:hover::before { opacity: 1; }
        .feat-icon-wrap {
            width: 2.6rem;
            height: 2.6rem;
            border-radius: 0.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        .feat-icon-wrap.orange { background: rgba(249,115,22,0.12); }
        .feat-icon-wrap.cyan   { background: rgba(56,189,248,0.12); }
        .feat-icon-wrap.slate  { background: rgba(100,116,139,0.1); }
        .feat-card-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #f97316;
        }
        .feat-card.cyan .feat-card-title { color: #0ea5e9; }
        .feat-card.slate .feat-card-title { color: #475569; }
        .feat-card-body {
            font-size: 0.82rem;
            color: rgba(15,23,42,0.56);
            line-height: 1.6;
        }
        .feat-card-accent {
            width: 1.8rem;
            height: 2px;
            border-radius: 1px;
            background: linear-gradient(90deg, rgba(249,115,22,0.7), transparent);
        }
        .feat-card.cyan .feat-card-accent {
            background: linear-gradient(90deg, rgba(56,189,248,0.7), transparent);
        }
        .feat-card.slate .feat-card-accent {
            background: linear-gradient(90deg, rgba(100,116,139,0.5), transparent);
        }
        .video-panel {
            position: relative;
            height: 100%;
            min-height: 420px;
            border-radius: 1.75rem;
            overflow: hidden;
            box-shadow: 0 24px 64px rgba(15,23,42,0.2), 0 0 0 1px rgba(255,255,255,0.6);
            border: 1px solid rgba(255,255,255,0.6);
        }
        .video-panel video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .video-panel-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15,23,42,0.92) 0%, rgba(15,23,42,0.18) 46%, transparent 70%);
            pointer-events: none;
            z-index: 1;
        }
        .video-panel-badge {
            position: absolute;
            top: 1.25rem;
            left: 1.25rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border-radius: 999px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.18);
            backdrop-filter: blur(10px);
            padding: 0.4rem 1rem;
            font-size: 0.72rem;
            color: #fff;
            font-weight: 600;
            letter-spacing: 0.06em;
            z-index: 2;
        }
        .video-panel-footer {
            position: absolute;
            inset-x: 0;
            bottom: 0;
            padding: 1.8rem 2rem;
            z-index: 2;
        }
        .video-panel-tags {
            font-size: 0.65rem;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: rgba(241,245,249,0.5);
            margin-bottom: 0.5rem;
        }
        .video-panel-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(1rem, 2vw, 1.3rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.35;
            max-width: 26rem;
        }
        .video-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border-radius: 999px;
            background: linear-gradient(120deg, rgba(249,115,22,0.95), rgba(234,88,12,1));
            padding: 0.7rem 1.5rem;
            font-size: 0.82rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 8px 24px rgba(249,115,22,0.36);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            flex-shrink: 0;
        }
        .video-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 32px rgba(249,115,22,0.46);
        }
        /* ── END PROGRAM POPULAR SECTION ── */
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
    </style>
</head>
<body class="welcome-page text-gray-800 no-bg">
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
    @include('layouts.navpelajar')

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

                <p class="hero-kicker text-[9px] md:text-[10px] text-white/70 mb-3 md:mb-4 uppercase italic">
                    // Program Kemahiran
                </p>

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
        <div class="story-panel section-content">
            <span class="hero-vision-label">Visi</span>
            <p class="hero-vision-text">
                UPKBN menyampaikan kepentingan pendidikan kepada golongan belia di mana Pendidikan adalah matlamat sesebuah negara memandangkan pendidikan adalah tonggak kejayaan semua.
            </p>
        </div>
    </section>

    <section class="snap-section story-section px-6">
        <div class="story-panel section-content">
            <span class="hero-vision-label">Misi</span>
            <p class="hero-vision-text">
                UPKB mahu melahirkan generasi yang mempunyai pendidikan dan kemahiran sekali gus mensasarkan negara menyasarkan 0% pengangguran dan 100% golongan Profesional dalam kalangan Belia di Malaysia.
            </p>
        </div>
    </section>

    {{-- 🔹 STATISTICS --}}
    <section class="snap-section stats-section flex items-center justify-center px-6">
        <div class="w-full max-w-6xl mx-auto section-content relative z-10">

            {{-- Heading --}}
            <div class="text-center mb-10 md:mb-14">
                <p class="stats-heading-label mb-3">// Pencapaian Kami</p>
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
    <div class="w-full max-w-7xl mx-auto section-content">

        {{-- Heading --}}
        <div class="text-center mb-10">
            <p class="program-section-heading-label mb-3">// Koleksi Program</p>
            <h2 class="program-section-title">Program <span>Popular</span> Kami</h2>
            <div class="mx-auto mt-4 h-px w-24 bg-gradient-to-r from-transparent via-orange-400 to-transparent opacity-60"></div>
            <p class="mx-auto mt-4 max-w-2xl text-sm text-slate-500 leading-relaxed">Program pilihan yang dilengkapi modul profesional, kemahiran abad ke-21, dan peluang kerjaya yang terjamin.</p>
        </div>

        {{-- Main Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 items-stretch">

            {{-- LEFT: Feature Cards --}}
            <div class="flex flex-col gap-4 order-2 lg:order-1">

                <div class="feat-card orange">
                    <div class="flex items-center gap-3">
                        <div class="feat-icon-wrap orange">✨</div>
                        <p class="feat-card-title">Fokus Kualiti</p>
                    </div>
                    <div class="feat-card-accent"></div>
                    <p class="feat-card-body">Setiap program dirangka dengan kandungan mendalam dari pakar industri terkemuka.</p>
                </div>

                <div class="feat-card cyan">
                    <div class="flex items-center gap-3">
                        <div class="feat-icon-wrap cyan">🛡️</div>
                        <p class="feat-card-title">Mudah Dipercayai</p>
                    </div>
                    <div class="feat-card-accent"></div>
                    <p class="feat-card-body">Program kami telah dipercayai oleh ribuan pelajar dan institusi di seluruh Malaysia.</p>
                </div>

                <div class="feat-card slate">
                    <div class="flex items-center gap-3">
                        <div class="feat-icon-wrap slate">🌟</div>
                        <p class="feat-card-title">Nilai Tambahan</p>
                    </div>
                    <div class="feat-card-accent"></div>
                    <p class="feat-card-body">Kandungan disokong oleh sokongan pelajar, panduan kerjaya dan jaringan alumni aktif.</p>
                </div>

            </div>

            {{-- RIGHT: Video Panel --}}
            <div class="lg:col-span-2 order-1 lg:order-2">
                <div class="video-panel">
                    <div class="video-panel-overlay"></div>

                    <div class="video-panel-badge">
                        <i class="fas fa-star text-orange-400"></i>
                        Koleksi Terbaik UPKB
                    </div>

                    <video class="w-full h-full object-cover min-h-[380px]" controls autoplay playsinline muted>
                        <source src="{{ asset('videos/prop.mp4') }}" type="video/mp4">
                    </video>

                    <div class="video-panel-footer">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                            <div>
                                <p class="video-panel-tags">Berkualiti &nbsp;/&nbsp; Dipercayai &nbsp;/&nbsp; Berprestasi</p>
                                <h3 class="video-panel-title">Pengalaman pembelajaran yang elegan dan profesional.</h3>
                            </div>
                            <a href="/program" class="video-cta">
                                Terokai
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
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

    introOverlay.classList.add('hide');
    introOverlay.addEventListener('transitionend', function onTransitionEnd() {
        introOverlay.style.display = 'none';
        introOverlay.removeEventListener('transitionend', onTransitionEnd);
    });

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
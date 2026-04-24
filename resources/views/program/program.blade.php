<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <title>UPKB - Program</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    
    <style>
        .program-page {
            position: relative;
            min-height: 100vh;
            overflow-x: clip;
            background:
                radial-gradient(circle at 12% 16%, rgba(255, 166, 0, 0.26), transparent 24%),
                radial-gradient(circle at 84% 18%, rgba(37, 99, 235, 0.14), transparent 28%),
                radial-gradient(circle at 50% 56%, rgba(255, 255, 255, 0.78), transparent 24%),
                linear-gradient(135deg, #fff0d9 0%, #edf4ff 44%, #dfe9ff 100%);
        }

        .program-page::before,
        .program-page::after {
            content: "";
            position: fixed;
            pointer-events: none;
            inset: 0;
            z-index: 0;
        }

        .program-page::before {
            background:
                linear-gradient(115deg, rgba(255, 255, 255, 0.62), rgba(255, 255, 255, 0) 42%),
                repeating-linear-gradient(90deg, rgba(15, 23, 42, 0.035) 0 1px, transparent 1px 120px),
                repeating-linear-gradient(180deg, rgba(15, 23, 42, 0.025) 0 1px, transparent 1px 120px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.92), rgba(0, 0, 0, 0.2));
            opacity: 0.48;
        }

        .program-page::after {
            inset: auto auto 4rem 50%;
            width: min(78rem, calc(100vw - 2rem));
            height: 24rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background:
                radial-gradient(circle at center, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0) 44%),
                radial-gradient(circle at center, rgba(255, 184, 28, 0.24), rgba(255, 184, 28, 0) 68%);
            filter: blur(36px);
            opacity: 0.9;
        }

        .program-page > * {
            position: relative;
            z-index: 1;
        }

        .program-shell {
            position: relative;
            isolation: isolate;
        }

        .program-shell::before,
        .program-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .program-shell::before {
            top: 50%;
            left: -6rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            transform: translateY(-50%);
            background: radial-gradient(circle, rgba(255, 152, 0, 0.22), rgba(255, 152, 0, 0) 72%);
            filter: blur(32px);
            opacity: 0.7;
        }

        .program-shell::after {
            top: 50%;
            right: -6rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            transform: translateY(-50%);
            background: radial-gradient(circle, rgba(33, 150, 243, 0.22), rgba(33, 150, 243, 0) 72%);
            filter: blur(32px);
            opacity: 0.7;
        }

        .program-wheel-wrap {
            position: relative;
        }

        .program-wheel-wrap::before {
            content: "";
            position: absolute;
            inset: 1rem 10% auto;
            height: 18rem;
            border-radius: 2rem;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.42), rgba(255, 255, 255, 0)),
                repeating-linear-gradient(90deg, rgba(255, 166, 0, 0.16) 0 1px, transparent 1px 34px),
                repeating-linear-gradient(180deg, rgba(15, 23, 42, 0.05) 0 1px, transparent 1px 34px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.5), transparent 88%);
            opacity: 0.62;
            pointer-events: none;
        }

        .program-wheel-wrap::after {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            width: min(30rem, 80vw);
            height: 14rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background:
                radial-gradient(circle, rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0) 56%),
                radial-gradient(circle, rgba(255, 184, 28, 0.14), rgba(255, 184, 28, 0) 72%);
            filter: blur(30px);
            opacity: 0.62;
            pointer-events: none;
        }

        .mercedes-container {
            overflow: visible;
            position: relative;
            background:
                linear-gradient(135deg, rgba(255,255,255,0.18) 0%, rgba(255,255,255,0.10) 100%);
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow:
                0 28px 72px rgba(15, 23, 42, 0.16),
                0 0 40px rgba(56, 189, 248, 0.08),
                0 0 64px rgba(255, 166, 0, 0.18),
                inset 0 0 40px 8px rgba(255,255,255,0.18),
                0 1.5px 16px 0 rgba(255,255,255,0.10);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .mercedes-container::before {
            content: "";
            position: absolute;
            inset: 12%;
            border-radius: 999px;
            background:
                radial-gradient(circle, rgba(255, 255, 255, 0.28), rgba(255, 255, 255, 0) 52%),
                radial-gradient(circle at 50% 50%, rgba(255, 184, 28, 0.1), rgba(255, 184, 28, 0) 72%);
            filter: blur(20px);
            opacity: 0.7;
            pointer-events: none;
            z-index: 0;
        }

        /* Glassmorphism segment backgrounds */
        .segment {
            inset: -2px;
            background-blend-mode: lighten;
            border-radius: 50%; /* Add rounded corners */
            overflow: hidden; /* Ensure content respects the border radius */
            border: 0;
            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,0.18),
                inset 0 2px 16px 0 rgba(255,255,255,0.10);
        }

        .segment-orange .segment,
        .segment-purple .segment,
        .segment-blue .segment {
            transition: box-shadow 0.3s, filter 0.3s;
        }

        .segment-wrapper:hover{
            z-index: 50;
        }

        .segment-orange:hover .segment {
            box-shadow: 0 0 48px 16px rgba(255,152,0,0.7), 0 0 0 4px rgba(255,243,230,0.6) inset;
            filter: brightness(1.08) saturate(1.1);
        }
        .segment-purple:hover .segment {
            box-shadow: 0 0 48px 16px rgba(156,39,176,0.7), 0 0 0 4px rgba(243,230,255,0.6) inset;
            filter: brightness(1.08) saturate(1.1);
        }
        .segment-blue:hover .segment {
            box-shadow: 0 0 48px 16px rgba(33,150,243,0.7), 0 0 0 4px rgba(230,244,255,0.6) inset;
            filter: brightness(1.08) saturate(1.1);
        }

        /* Subtle border for each segment */
        .segment {
            border: 0;
            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,0.18),
                inset 0 2px 16px 0 rgba(255,255,255,0.10);
        }

        /* Light reflection effect at the top */
        .mercedes-reflection {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 70%;
            height: 22%;
            background: linear-gradient(180deg, rgba(255,255,255,0.38) 0%, rgba(255,255,255,0.10) 80%, transparent 100%);
            border-radius: 100% 100% 60% 60% / 100% 100% 40% 40%;
            pointer-events: none;
            z-index: 5;
            filter: blur(1.5px);
            opacity: 0.85;
        }

        .segment-top-left-clip {
            clip-path: polygon(50% 50%, 50% -6%, 21% 2%, -6% 21%, -6% 60%, 7% 82%);
        }
        .segment-top-right-clip {
            clip-path: polygon(50% 50%, 50% -6%, 79% 2%, 106% 21%, 106% 60%, 93% 82%);
        }
        .segment-bottom-clip {
            clip-path: polygon(50% 50%, 7% 82%, 21% 106%, 79% 106%, 93% 82%);
        }

        .segment-wrapper .segment {
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            transform-origin: center;
        }

        .segment::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0)),
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.24), transparent 24%);
            pointer-events: none;
        }

        .segment-wrapper:hover .segment {
            transform: scale(1.05);
            filter: brightness(1.1);
            z-index: 10;
        }

        .segment-orange:hover .segment {
            box-shadow: 0 0 40px rgba(255, 152, 0, 0.6);
            transform: translate(-30px, -30px) scale(1.25);
        }

        .segment-purple:hover .segment {
            box-shadow: 0 0 40px rgba(156, 39, 176, 0.6);
            transform: translate(30px, -30px) scale(1.25);
        }

        .segment-blue:hover .segment {
            box-shadow: 0 0 40px rgba(33, 150, 243, 0.6);
            transform: translate(0px, 40px) scale(1.25);
        }

        .mercedes-container:hover .segment {
            opacity: 0.5;
        }

        .segment-wrapper:hover .segment {
            opacity: 1 !important;
            transform: scale(1.08);
            filter: brightness(1.15);
        }

        .segment-orange:hover .segment {
            transform: translate(-8px, -8px) scale(1.08);
        }

        .segment-purple:hover .segment {
            transform: translate(8px, -8px) scale(1.08);
        }

        .segment-blue:hover .segment {
            transform: translate(0px, 8px) scale(1.08);
        }

        @keyframes bounceSoft {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }

        @keyframes glowPulse {
            0%, 100% {
                opacity: 0.7;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.06);
            }
        }

        .segment-wrapper:hover i {
            animation: bounceSoft 0.6s ease;
        }

        .segment-content {
            text-shadow: 0 8px 20px rgba(15, 23, 42, 0.18);
        }

        .segment-chip {
            box-shadow:
                0 14px 26px rgba(15, 23, 42, 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        .segment-label {
            transition: transform 0.3s ease, border-color 0.3s ease, letter-spacing 0.3s ease;
        }

        .segment-wrapper:hover .segment-label {
            transform: translateX(3px);
            border-color: rgba(255, 255, 255, 0.95);
            letter-spacing: 0.18em;
        }

        @media (prefers-reduced-motion: reduce) {
            .segment-wrapper .segment,
            .segment-label {
                transition: none;
            }

            .segment-wrapper:hover i {
                animation: none;
            }
        }
        /* ── DARK MODE ── */
        html.dark body.program-page { color: #e2e8f0; }
        html.dark .program-page {
            background:
                radial-gradient(circle at 12% 16%, rgba(251, 146, 60, 0.12), transparent 24%),
                radial-gradient(circle at 84% 18%, rgba(37, 99, 235, 0.08), transparent 28%),
                linear-gradient(135deg, #0f172a 0%, #1e293b 44%, #0f172a 100%);
        }

        /* ── ENTRANCE ANIMATIONS ── */
        @keyframes pgFadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes pgScaleIn {
            from { opacity: 0; transform: scale(0.72); }
            to   { opacity: 1; transform: scale(1); }
        }
        @keyframes pgSegFan {
            from { opacity: 0; transform: scale(0.6) rotate(var(--fan-rot, 0deg)); }
            to   { opacity: 1; transform: scale(1) rotate(0deg); }
        }
        @keyframes pgRingPop {
            0%   { opacity: 0; transform: scale(0.5); }
            70%  { opacity: 1; transform: scale(1.04); }
            100% { opacity: 1; transform: scale(1); }
        }
        @keyframes pgIdlePulse {
            0%, 100% { box-shadow: 0 28px 72px rgba(15,23,42,0.16), 0 0 40px rgba(56,189,248,0.08), 0 0 64px rgba(255,166,0,0.18), inset 0 0 40px 8px rgba(255,255,255,0.18); }
            50%       { box-shadow: 0 28px 72px rgba(15,23,42,0.22), 0 0 70px rgba(255,166,0,0.38), 0 0 40px rgba(56,189,248,0.14), inset 0 0 40px 8px rgba(255,255,255,0.22); }
        }
        @keyframes pgHeadlineWord {
            from { opacity: 0; transform: translateY(18px) skewY(2deg); }
            to   { opacity: 1; transform: translateY(0) skewY(0deg); }
        }

        .pg-heading-anim {
            animation: pgFadeUp 0.7s cubic-bezier(0.22,1,0.36,1) 0.1s both;
        }
        .pg-heading-anim .pg-word {
            display: inline-block;
            opacity: 0;
            animation: pgHeadlineWord 0.55s cubic-bezier(0.22,1,0.36,1) both;
        }
        .pg-heading-anim .pg-word:nth-child(1) { animation-delay: 0.18s; }
        .pg-heading-anim .pg-word:nth-child(2) { animation-delay: 0.30s; }
        .pg-heading-anim .pg-word:nth-child(3) { animation-delay: 0.42s; }

        .pg-wheel-anim {
            animation: pgRingPop 0.9s cubic-bezier(0.34,1.56,0.64,1) 0.55s both;
        }
        .pg-wheel-anim.pg-idle {
            animation: pgRingPop 0.9s cubic-bezier(0.34,1.56,0.64,1) 0.55s both,
                       pgIdlePulse 3.6s ease-in-out 1.8s infinite;
        }

        .segment-wrapper.pg-seg-anim {
            animation: pgSegFan 0.65s cubic-bezier(0.34,1.4,0.64,1) both;
        }
        .segment-orange.pg-seg-anim { --fan-rot: -18deg; animation-delay: 0.72s; }
        .segment-purple.pg-seg-anim { --fan-rot:  18deg; animation-delay: 0.84s; }
        .segment-blue.pg-seg-anim   { --fan-rot:  0deg;  animation-delay: 0.96s; }

        @media (prefers-reduced-motion: reduce) {
            .pg-heading-anim, .pg-heading-anim .pg-word,
            .pg-wheel-anim, .segment-wrapper.pg-seg-anim {
                animation: none !important;
                opacity: 1 !important;
                transform: none !important;
            }
        }
        /* ── END ENTRANCE ANIMATIONS ── */

        /* ══════════════════════════════════════
           UNIQUE PER-SEGMENT HOVER EFFECTS
        ══════════════════════════════════════ */

        /* Shared hover-layer base */
        .holo-layer {
            position: absolute;
            inset: 0;
            z-index: 4;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.35s ease;
            overflow: hidden;
            border-radius: inherit;
        }
        .segment-wrapper:hover .holo-layer { opacity: 1; }

        /* Chromatic aberration glow on icon chip (shared) */
        .segment-wrapper:hover .segment-chip {
            box-shadow:
                -2px 0 6px rgba(255,0,80,0.55),
                 2px 0 6px rgba(0,200,255,0.55),
                 0 0 18px rgba(255,255,255,0.35);
            transition: box-shadow 0.25s ease, transform 0.3s ease;
        }

        /* ── TVET (orange): Circuit Trace ── */
        @keyframes tvetSigA { 0%{stroke-dashoffset:209} 100%{stroke-dashoffset:-209} }
        @keyframes tvetSigB { 0%{stroke-dashoffset:124} 100%{stroke-dashoffset:-124} }
        @keyframes tvetSigC { 0%{stroke-dashoffset:117} 100%{stroke-dashoffset:-117} }
        @keyframes tvetSigD { 0%{stroke-dashoffset:112} 100%{stroke-dashoffset:-112} }
        @keyframes tvetSigE { 0%{stroke-dashoffset:107} 100%{stroke-dashoffset:-107} }
        @keyframes tvetNodePulse { 0%,100%{opacity:0.5; transform:scale(1);} 50%{opacity:1; transform:scale(1.6);} }

        .tvet-circuit-bg {
            position: absolute; inset: 0;
            background-image: radial-gradient(circle, rgba(255,160,0,0.09) 1px, transparent 1px);
            background-size: 16px 16px;
            opacity: 0;
            transition: opacity 0.35s ease;
        }
        .segment-orange:hover .tvet-circuit-bg { opacity: 0.7; }
        .tvet-circuit-svg {
            position: absolute; inset: 0; width: 100%; height: 100%;
            overflow: visible;
        }
        .tvet-trace {
            fill: none;
            stroke: rgba(255,150,0,0.12);
            stroke-width: 1.5;
            stroke-linecap: square;
            transition: stroke 0.3s ease;
        }
        .segment-orange:hover .tvet-trace { stroke: rgba(255,165,0,0.35); }
        .tvet-signal {
            fill: none;
            stroke: rgba(255,235,80,0.55);
            stroke-width: 3.5;
            stroke-linecap: round;
            filter: drop-shadow(0 0 3px rgba(255,210,0,0.5));
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            animation-play-state: paused;
            /* animation-name, animation-duration, animation-delay, stroke-dasharray set inline */
        }
        .segment-orange:hover .tvet-signal { animation-play-state: running; }
        .tvet-node {
            fill: rgba(255,175,0,0.35);
            transform-box: fill-box;
            transform-origin: center;
            animation-name: tvetNodePulse;
            animation-duration: 2s;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
            animation-play-state: paused;
            /* animation-delay set inline per node */
        }
        .segment-orange:hover .tvet-node { animation-play-state: running; }

        /* ── DIPLOMA (purple): Cosmic Star Field ── */
        @keyframes diplomaStarDrift {
            0%   { background-position: 0px 0px,       20px 20px,    10px 35px; }
            100% { background-position: -80px -60px,  -52px -72px,  -55px -55px; }
        }
        @keyframes diplomaStarGlow {
            0%, 100% { opacity: 0.45; }
            50%       { opacity: 0.75; }
        }
        @keyframes diplomaAurora {
            0%   { transform: translateX(-80%) skewX(-10deg); opacity: 0; }
            15%  { opacity: 0.65; }
            85%  { opacity: 0.35; }
            100% { transform: translateX(180%) skewX(-10deg); opacity: 0; }
        }
        @keyframes diplomaOrb {
            0%   { transform: translate(0, 0) scale(1);           opacity: 0.55; }
            33%  { transform: translate(10px, -14px) scale(1.15); opacity: 0.9; }
            66%  { transform: translate(-8px, -20px) scale(0.9);  opacity: 0.65; }
            100% { transform: translate(0, 0) scale(1);           opacity: 0.55; }
        }
        @keyframes diplomaTicker {
            0% { transform: translateY(0); } 100% { transform: translateY(-50%); }
        }

        .diploma-stars {
            position: absolute; inset: 0;
            background-image:
                radial-gradient(circle, rgba(255,255,255,0.55) 1.5px, transparent 1.5px),
                radial-gradient(circle, rgba(220,170,255,0.50) 2px,   transparent 2px),
                radial-gradient(circle, rgba(255,255,255,0.42) 1px,   transparent 1px);
            background-size: 40px 40px, 72px 72px, 55px 55px;
            background-position: 0 0, 20px 20px, 10px 35px;
            animation: diplomaStarDrift 6s linear infinite,
                       diplomaStarGlow  3s ease-in-out infinite;
            animation-play-state: paused, running;
        }
        .segment-purple:hover .diploma-stars {
            animation-play-state: running, running;
        }
        .diploma-aurora {
            position: absolute; top: 0; bottom: 0; width: 38%;
            background: linear-gradient(90deg,
                transparent 0%,
                rgba(175,95,255,0.35)  28%,
                rgba(220,130,255,0.55) 50%,
                rgba(160,75,255,0.3)   72%,
                transparent 100%);
            filter: blur(10px);
            animation: diplomaAurora 3s ease-in-out infinite;
            animation-play-state: paused;
        }
        .segment-purple:hover .diploma-aurora { animation-play-state: running; }
        .diploma-aurora:nth-child(3) {
            width: 26%; animation-delay: 1.5s; animation-duration: 3.8s;
            background: linear-gradient(90deg,
                transparent 0%,
                rgba(120,50,210,0.25)  28%,
                rgba(195,100,255,0.42) 50%,
                rgba(120,50,210,0.2)   72%,
                transparent 100%);
            filter: blur(14px);
        }
        .diploma-orb {
            position: absolute;
            width: 20%; height: 20%;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(220,130,255,0.85), transparent 68%);
            filter: blur(5px);
            animation: diplomaOrb 3.8s ease-in-out infinite;
            top: 20%; left: 18%;
        }
        .diploma-orb:nth-child(5) {
            width: 13%; height: 13%;
            top: 58%; left: 62%;
            animation-delay: 2s; animation-duration: 4.5s;
            background: radial-gradient(circle, rgba(200,100,255,0.75), transparent 68%);
        }
        .diploma-ticker-wrap {
            position: absolute;
            bottom: 6%; left: 6%; right: 6%; height: 1.1rem;
            overflow: hidden;
            mask-image: linear-gradient(90deg, transparent, black 15%, black 85%, transparent);
        }
        .diploma-ticker {
            display: flex; flex-direction: column;
            animation: diplomaTicker 3s linear infinite;
            font-size: 0.44rem; font-family: 'Courier New', monospace;
            font-weight: 700; letter-spacing: 0.08em;
            color: rgba(220,130,255,0.9);
            text-shadow: 0 0 6px rgba(220,130,255,0.9);
            white-space: nowrap; line-height: 1.55;
        }

        /* ── SAINS KESIHATAN (blue): Health Monitor ECG ── */
        @keyframes sainsEcgScroll {
            0%   { background-position-x: 0; }
            100% { background-position-x: -160px; }
        }
        @keyframes sainsEcgCursor {
            0%   { left: -2px; opacity: 0; }
            5%   { opacity: 1; }
            95%  { opacity: 1; }
            100% { left: 100%; opacity: 0; }
        }
        @keyframes sainsEcgPulse {
            0%   { transform: scale(0.5); opacity: 0.75; }
            100% { transform: scale(1.8); opacity: 0; }
        }
        .sains-monitor-bg {
            position: absolute; inset: 0;
            background: rgba(0, 18, 36, 0.50);
            border-radius: inherit;
        }
        .sains-ecg-track {
            position: absolute;
            left: 0; right: 0;
            bottom: 12%; height: 40px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='40'%3E%3Cpath d='M0,20 L38,20 L48,16 L58,20 L68,20 L73,25 L78,3 L83,27 L88,20 L105,13 L126,20 L160,20' fill='none' stroke='%2350C8FF' stroke-width='1.5' opacity='0.9'/%3E%3C/svg%3E");
            background-repeat: repeat-x;
            background-position-y: center;
            animation: sainsEcgScroll 1.6s linear infinite;
            animation-play-state: paused;
            filter: drop-shadow(0 0 5px rgba(80,200,255,0.85));
        }
        .segment-blue:hover .sains-ecg-track { animation-play-state: running; }
        .sains-ecg-cursor {
            position: absolute;
            bottom: 10%; height: 44px;
            top: auto;
            width: 2px;
            background: linear-gradient(180deg,
                transparent 0%,
                rgba(80,200,255,0.9) 25%,
                rgba(255,255,255,1)  50%,
                rgba(80,200,255,0.9) 75%,
                transparent 100%);
            filter: blur(0.6px);
            animation: sainsEcgCursor 1.6s linear infinite;
            animation-play-state: paused;
        }
        .segment-blue:hover .sains-ecg-cursor { animation-play-state: running; }
        .sains-ecg-pulse {
            position: absolute;
            top: 50%; left: 50%;
            width: 44%; height: 44%;
            margin-top: -22%; margin-left: -22%;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(80,200,255,0.45), transparent 68%);
            animation: sainsEcgPulse 1.6s ease-out infinite;
        }
        .sains-ecg-pulse:nth-child(5) { animation-delay: 0.8s; }
        @media (prefers-reduced-motion: reduce) {
            .tvet-signal, .tvet-node, .diploma-aurora, .sains-ecg-track, .sains-ecg-cursor { animation: none !important; }
            .segment-wrapper:hover .holo-layer { opacity: 0.4; }
        }
        /* ══ END UNIQUE HOVER EFFECTS ══ */
    </style>
</head>
<body class="program-page text-gray-800 transition-colors duration-300">

    @include('layouts.navigation')
    
    <section class="program-shell max-w-7xl mx-auto px-4 pb-8 pt-12 sm:px-6">

        {{-- PAGE HEADING --}}
        <div class="text-center mb-8 pg-heading-anim">
            <h1 style="font-family:'Montserrat',sans-serif; font-weight:900; font-size:clamp(1.8rem,5vw,3.2rem); line-height:1.1; letter-spacing:-0.03em; color:#0f172a;">
                <span class="pg-word">Pilih</span>
                <span class="pg-word" style="background:linear-gradient(120deg,#f97316,#ea580c);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;">Laluan</span>
                <span class="pg-word">Anda</span>
            </h1>
        </div>

        <div class="program-wheel-wrap flex justify-center items-center py-4">
            <div class="mercedes-container pg-wheel-anim pg-idle relative overflow-hidden
                w-[280px] h-[280px] 
                sm:w-[360px] sm:h-[360px] 
                md:w-[520px] md:h-[520px] 
                rounded-full border-[8px] sm:border-[10px] border-white/90">

                <div class="mercedes-reflection"></div>
                @foreach($programs->take(3) as $index => $program)
                    @php
                        $configs = [
                            0 => [
                                'clip' => 'segment-top-left-clip',
                                'bg' => 'bg-[#FF9800]',
                                'pos' => 'top-[20%] left-[9%] sm:top-[19%] sm:left-[4%] text-right items-end',
                                'label_bg' => 'bg-[#d4af37]',
                                'label_border' => 'border-[#b88912]',
                                'label_hover' => 'group-hover:border-[#8a6a08]',
                                'label_shadow' => '#d4af37',
                            ],
                            1 => [
                                'clip' => 'segment-top-right-clip',
                                'bg' => 'bg-[#9C27B0]',
                                'pos' => 'top-[20%] right-[9%] sm:top-[19%] sm:right-[4%] text-left items-start',
                                'label_bg' => 'bg-[#8d2be2]',
                                'label_border' => 'border-[#7a1fd1]',
                                'label_hover' => 'group-hover:border-[#6216aa]',
                                'label_shadow' => '#8d2be2',
                            ],
                            2 => [
                                'clip' => 'segment-bottom-clip',
                                'bg' => 'bg-[#2196F3]',
                                'pos' => 'bottom-[10%] left-1/2 -translate-x-1/2 sm:bottom-[15%] text-center items-center',
                                'label_bg' => 'bg-[#2196f3]',
                                'label_border' => 'border-[#1d4ed8]',
                                'label_hover' => 'group-hover:border-[#1e40af]',
                                'label_shadow' => '#2196f3',
                            ],
                        ];
                        $ui = $configs[$index] ?? $configs[0];
                    @endphp

                    <a href="{{ route('kursus.index', ['jenis' => $program->jenis_program]) }}" 
                        class="segment-wrapper pg-seg-anim group 
                        {{ $index == 0 ? 'segment-orange' : ($index == 1 ? 'segment-purple' : 'segment-blue') }}">
                        <!-- Segment background with image overlay -->
                        <div class="segment absolute inset-0 {{ $ui['bg'] }} {{ $ui['clip'] }}">
                            @if($index == 0)
                                <!-- TVET: Robotics/Workshop -->
                                <div style="background: linear-gradient(rgba(255,152,0,0.60), rgba(255,152,0,0.50)), url('/images/tvet-vg2.jpeg') center/cover no-repeat; position:absolute; inset:0; z-index:1; border-radius:inherit; filter: brightness(0.92) blur(0.5px);" class="w-full h-full"></div>
                            @elseif($index == 1)
                                <!-- DIPLOMA: Graduation -->
                                <div style="background: linear-gradient(rgba(156,39,176,0.55), rgba(156,39,176,0.45)), url('/images/postgraduate-differences_sim-article.jpg') center/cover no-repeat; position:absolute; inset:0; z-index:1; border-radius:inherit; filter: brightness(0.96) blur(0.5px);" class="w-full h-full"></div>
                            @elseif($index == 2)
                                <!-- SAINS KESIHATAN: Lab/Microscope -->
                                <div style="background: linear-gradient(rgba(33,150,243,0.50), rgba(33,150,243,0.40)), url('/images/sains.jpg') center/cover no-repeat; position:absolute; inset:0; z-index:1; border-radius:inherit; filter: brightness(0.97) blur(0.5px);" class="w-full h-full"></div>
                            @endif

                            <!-- UNIQUE HOVER OVERLAY -->
                            @if($index == 0)
                            {{-- TVET: Circuit Trace (full coverage) --}}
                            <div class="holo-layer">
                                <div class="tvet-circuit-bg"></div>
                                <svg class="tvet-circuit-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 180">
                                    <!-- Base traces: 5 L-shaped paths spanning the full wedge -->
                                    {{-- A: left spine up + across top rail ~209px --}}
                                    <path class="tvet-trace" d="M 5,140 L 5,8 L 82,8"/>
                                    {{-- B: 2nd column down + left at y=115 ~124px --}}
                                    <path class="tvet-trace" d="M 22,8 L 22,115 L 5,115"/>
                                    {{-- C: 3rd column down + left at y=90 ~117px --}}
                                    <path class="tvet-trace" d="M 40,8 L 40,90 L 5,90"/>
                                    {{-- D: 4th column down + left at y=65 ~112px --}}
                                    <path class="tvet-trace" d="M 60,8 L 60,65 L 5,65"/>
                                    {{-- E: 5th column down + left at y=40 ~107px --}}
                                    <path class="tvet-trace" d="M 80,8 L 80,40 L 5,40"/>
                                    {{-- F: bottom stub (decorative) --}}
                                    <path class="tvet-trace" d="M 5,136 L 16,136"/>
                                    <!-- Animated signals (same paths, overlaid with dasharray) -->
                                    <path class="tvet-signal" style="stroke-dasharray:9 200; animation-name:tvetSigA; animation-duration:2.0s;  animation-delay:0s;"    d="M 5,140 L 5,8 L 82,8"/>
                                    <path class="tvet-signal" style="stroke-dasharray:7 117; animation-name:tvetSigB; animation-duration:1.25s; animation-delay:0.4s;"  d="M 22,8 L 22,115 L 5,115"/>
                                    <path class="tvet-signal" style="stroke-dasharray:7 110; animation-name:tvetSigC; animation-duration:1.15s; animation-delay:0.2s;"  d="M 40,8 L 40,90 L 5,90"/>
                                    <path class="tvet-signal" style="stroke-dasharray:7 105; animation-name:tvetSigD; animation-duration:1.1s;  animation-delay:0.7s;"  d="M 60,8 L 60,65 L 5,65"/>
                                    <path class="tvet-signal" style="stroke-dasharray:7 100; animation-name:tvetSigE; animation-duration:1.05s; animation-delay:0.5s;"  d="M 80,8 L 80,40 L 5,40"/>
                                    <!-- Junction nodes (staggered pulse) -->
                                    <circle class="tvet-node" style="animation-delay:0s;"    cx="5"  cy="8"   r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:0.12s;" cx="82" cy="8"   r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:0.24s;" cx="5"  cy="140" r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:0.36s;" cx="22" cy="8"   r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:0.48s;" cx="22" cy="115" r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:0.6s;"  cx="40" cy="8"   r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:0.72s;" cx="40" cy="90"  r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:0.84s;" cx="60" cy="8"   r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:0.96s;" cx="60" cy="65"  r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:1.08s;" cx="80" cy="8"   r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:1.2s;"  cx="80" cy="40"  r="2.5"/>
                                    <circle class="tvet-node" style="animation-delay:1.32s;" cx="16" cy="136" r="2.5"/>
                                </svg>
                            </div>
                            @elseif($index == 1)
                            {{-- DIPLOMA: Cosmic Academic Star Field --}}
                            <div class="holo-layer">
                                <div class="diploma-stars"></div>
                                <div class="diploma-aurora"></div>
                                <div class="diploma-aurora"></div>
                                <div class="diploma-orb"></div>
                                <div class="diploma-orb"></div>
                                <div class="diploma-ticker-wrap">
                                    <div class="diploma-ticker">
                                        <span>DIPLOMA ◆ AKADEMIK ◆ ILMU ◆ SIJIL ◆ DIPLOMA ◆ AKADEMIK ◆ ILMU ◆ SIJIL</span>
                                        <span>SYS:UPKB ◆ NODE:DIPLOMA ◆ STATUS:AKTIF ◆ SYS:UPKB ◆ NODE:DIPLOMA ◆ STATUS:AKTIF</span>
                                    </div>
                                </div>
                            </div>
                            @else
                            {{-- SAINS KESIHATAN: Health Monitor ECG --}}
                            <div class="holo-layer">
                                <div class="sains-monitor-bg"></div>
                                <div class="sains-ecg-track"></div>
                                <div class="sains-ecg-cursor"></div>
                                <div class="sains-ecg-pulse"></div>
                                <div class="sains-ecg-pulse"></div>
                            </div>
                            @endif
                            <!-- END UNIQUE HOVER OVERLAY -->
                        </div>
                        <!-- Segment content -->
                        <div class="segment-content absolute {{ $ui['pos'] }} z-20 text-white flex flex-col 
                                    w-[100px] sm:w-[140px] md:w-[180px]">
                               <div class="segment-chip mb-1 sm:mb-2 bg-white/30 p-1.5 sm:p-2 rounded-xl 
                                        group-hover:scale-110 transition-transform w-fit border border-white/40"
                                   style="backdrop-filter: blur(8px) saturate(1.2); -webkit-backdrop-filter: blur(8px) saturate(1.2); box-shadow: 0 2px 12px 0 rgba(255,255,255,0.10);">
                                @if($index == 0)
                                    <i class="{{ $program->icon }} text-[#FFC107] text-base sm:text-xl md:text-3xl"></i> <!-- TVET: gold -->
                                @elseif($index == 1)
                                    <i class="{{ $program->icon }} text-[#8d2be2] text-base sm:text-xl md:text-3xl"></i> <!-- Diploma: purple -->
                                @elseif($index == 2)
                                    <i class="{{ $program->icon }} text-[#2196f3] text-base sm:text-xl md:text-3xl"></i> <!-- Sains Kesihatan: blue -->
                                @endif
                            </div>
                            <h2 class="text-xs sm:text-lg md:text-2xl font-black uppercase 
                                       leading-tight break-words drop-shadow-md text-white">
                                {{ $program->jenis_program }}
                            </h2>
                            <div class="segment-label mt-1 sm:mt-2 text-[8px] sm:text-xs font-bold tracking-widest 
                                     border-b-2 {{ $ui['label_border'] }} text-white {{ $ui['label_bg'] }} {{ $ui['label_hover'] }} 
                                        transition-all inline-block w-fit rounded px-2 py-0.5 shadow-lg"
                                 style="box-shadow: 0 0 12px 2px {{ $ui['label_shadow'] }};">
                                LIHAT PROGRAM <i class="fas fa-chevron-right ml-1" style="text-shadow: 0 0 8px #fff;"></i>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @include('components.social-float')
    @include('layouts.footer')

</body>
</html>

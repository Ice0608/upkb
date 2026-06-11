<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <title>SESOC - Program</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    
    <style>
        .program-page {
            position: relative;
            min-height: 100vh;
            overflow-x: clip;
            background:
                radial-gradient(ellipse at 15% 20%, rgba(255, 140, 20, 0.14), transparent 32%),
                radial-gradient(ellipse at 80% 10%, rgba(100, 60, 220, 0.18), transparent 30%),
                radial-gradient(ellipse at 50% 85%, rgba(30, 100, 200, 0.12), transparent 36%),
                linear-gradient(160deg, #060818 0%, #0a0f25 40%, #08101e 100%);
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
                repeating-linear-gradient(90deg, rgba(255,255,255,0.025) 0 1px, transparent 1px 120px),
                repeating-linear-gradient(180deg, rgba(255,255,255,0.018) 0 1px, transparent 1px 120px);
            mask-image: linear-gradient(180deg, rgba(0,0,0,0.6), rgba(0,0,0,0.15));
            opacity: 0.5;
        }

        .program-page::after {
            inset: auto auto 2rem 50%;
            width: min(60rem, calc(100vw - 2rem));
            height: 18rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background:
                radial-gradient(circle at center, rgba(255, 160, 30, 0.18), rgba(255, 160, 30, 0) 52%),
                radial-gradient(circle at center, rgba(80, 120, 255, 0.12), rgba(80, 120, 255, 0) 68%);
            filter: blur(42px);
            opacity: 0.75;
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
            background: none;
            opacity: 0;
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
                radial-gradient(circle, rgba(255, 160, 30, 0.18), rgba(255, 160, 30, 0) 56%),
                radial-gradient(circle, rgba(80, 120, 255, 0.12), rgba(80, 120, 255, 0) 72%);
            filter: blur(30px);
            opacity: 0.55;
            pointer-events: none;
        }

        .mercedes-container {
            overflow: visible;
            position: relative;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow:
                0 28px 72px rgba(15, 23, 42, 0.16),
                0 0 40px rgba(56, 189, 248, 0.08),
                0 0 64px rgba(255, 166, 0, 0.18);
        }

        .mercedes-container::before {
            display: none;
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
            box-shadow: 0 0 48px 16px rgba(255,81,0,0.7), 0 0 0 4px rgba(255,220,200,0.6) inset;
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
            display: none;
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
            box-shadow: 0 0 40px rgba(255, 81, 0, 0.6);
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
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            white-space: nowrap;
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
        .pg-heading-title { color: #f1f5f9; }
        html.dark .pg-heading-title { color: #f1f5f9; }
        html.dark .program-page {
            background:
                radial-gradient(ellipse at 15% 20%, rgba(255, 140, 20, 0.14), transparent 32%),
                radial-gradient(ellipse at 80% 10%, rgba(100, 60, 220, 0.18), transparent 30%),
                radial-gradient(ellipse at 50% 85%, rgba(30, 100, 200, 0.12), transparent 36%),
                linear-gradient(160deg, #060818 0%, #0a0f25 40%, #08101e 100%);
        }

        /* ── ENTRANCE ANIMATIONS ── */
        @keyframes pgFadeUp {
            from { transform: translateY(28px); }
            to   { transform: translateY(0); }
        }
        @keyframes pgScaleIn {
            from { transform: scale(0.72); }
            to   { transform: scale(1); }
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
            from { transform: translateY(18px) skewY(2deg); }
            to   { transform: translateY(0) skewY(0deg); }
        }

        .pg-heading-anim {
            animation: pgFadeUp 0.7s cubic-bezier(0.22,1,0.36,1) 0.1s both;
        }
        .pg-heading-anim .pg-word {
            display: inline-block;
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
        .segment-orange:hover .tvet-trace { stroke: rgba(255,81,0,0.35); }
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

        /* ── DIPLOMA (purple): GLITCH EFFECT ── */

        /* Main RGB split glitch — slices jump left/right */
        @keyframes glitchSlice {
            0%          { clip-path: inset(0 0 100% 0);  transform: translate(0,0); }
            4%          { clip-path: inset(8% 0 72% 0);  transform: translate(-6px, 0); }
            8%          { clip-path: inset(8% 0 72% 0);  transform: translate( 6px, 0); }
            12%         { clip-path: inset(45% 0 35% 0); transform: translate(-4px, 0); }
            16%         { clip-path: inset(45% 0 35% 0); transform: translate( 4px, 0); }
            20%         { clip-path: inset(72% 0 8% 0);  transform: translate(-5px, 0); }
            24%         { clip-path: inset(72% 0 8% 0);  transform: translate( 5px, 0); }
            28%,100%    { clip-path: inset(0 0 100% 0);  transform: translate(0,0); }
        }

        /* Horizontal scanline sweep */
        @keyframes glitchScan {
            0%   { top: -4px; }
            100% { top: 110%; }
        }

        /* RGB channel offset — red channel */
        @keyframes glitchRed {
            0%,90%,100% { transform: translate(0,0); opacity: 0; }
            91%  { transform: translate(-5px, 2px); opacity: 0.55; }
            93%  { transform: translate( 4px,-2px); opacity: 0.55; }
            95%  { transform: translate(-3px, 0);   opacity: 0.55; }
            97%  { transform: translate( 5px, 1px); opacity: 0.55; }
            99%  { transform: translate(-2px,-1px); opacity: 0.55; }
        }

        /* RGB channel offset — cyan channel */
        @keyframes glitchCyan {
            0%,90%,100% { transform: translate(0,0); opacity: 0; }
            92%  { transform: translate( 5px,-2px); opacity: 0.45; }
            94%  { transform: translate(-4px, 2px); opacity: 0.45; }
            96%  { transform: translate( 3px, 0);   opacity: 0.45; }
            98%  { transform: translate(-5px,-1px); opacity: 0.45; }
        }

        /* Noise static flash */
        @keyframes glitchNoise {
            0%,100%     { opacity: 0; }
            3%,7%,23%,27%,67%,71% { opacity: 0.06; background-position: 0 0; }
            5%,25%,69%  { opacity: 0.10; background-position: 50px 30px; }
        }

        /* Block corruption: random rectangles pop in */
        @keyframes glitchBlock1 {
            0%,100%  { transform: translate(0,0) scaleX(1); opacity: 0; }
            6%       { transform: translate(-8px, 14px) scaleX(1.2); opacity: 0.7; }
            12%      { transform: translate( 6px,-10px) scaleX(0.8); opacity: 0.5; }
            18%      { opacity: 0; }
        }
        @keyframes glitchBlock2 {
            0%,100%  { transform: translate(0,0); opacity: 0; }
            30%      { transform: translate( 10px, 6px); opacity: 0.6; }
            36%      { transform: translate(-7px, -8px); opacity: 0.4; }
            42%      { opacity: 0; }
        }
        @keyframes glitchBlock3 {
            0%,100%  { transform: translate(0,0); opacity: 0; }
            55%      { transform: translate(8px, -12px); opacity: 0.65; }
            61%      { transform: translate(-5px, 8px);  opacity: 0.4; }
            67%      { opacity: 0; }
        }

        /* Flicker on/off burst */
        @keyframes glitchFlicker {
            0%,100%             { opacity: 1; }
            4%,8%,12%,16%       { opacity: 0.85; }
            6%,10%,14%          { opacity: 0.5; }
            22%                 { opacity: 0.95; filter: hue-rotate(40deg); }
            24%                 { opacity: 0.7;  filter: hue-rotate(-20deg); }
            26%                 { opacity: 1;    filter: hue-rotate(0deg); }
            70%                 { opacity: 0.9;  filter: brightness(1.4) saturate(1.6); }
            72%                 { opacity: 1;    filter: brightness(1) saturate(1); }
        }

        /* CRT vignette pulse */
        @keyframes glitchVignette {
            0%,100% { opacity: 0.5; }
            50%     { opacity: 0.8; }
        }

        /* Shared base: holo-layer activates on hover */
        /* (already defined above) */

        /* Dark CRT base */
        .diploma-glitch-bg {
            position: absolute; inset: 0;
            background: rgba(10, 0, 20, 0.60);
            border-radius: inherit;
        }

        /* Noise static layer */
        .diploma-noise {
            position: absolute; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='200'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='200' height='200' filter='url(%23n)' opacity='0.4'/%3E%3C/svg%3E");
            background-size: 160px 160px;
            mix-blend-mode: overlay;
            animation: glitchNoise 2.4s steps(1) infinite;
            animation-play-state: paused;
            pointer-events: none;
        }
        .segment-purple:hover .diploma-noise { animation-play-state: running; }

        /* Scanline sweep */
        .diploma-scanline {
            position: absolute; left: 0; right: 0;
            height: 3px; top: -4px;
            background: linear-gradient(180deg,
                transparent 0%,
                rgba(220, 120, 255, 0.55) 40%,
                rgba(150, 60, 220, 0.8)   50%,
                rgba(220, 120, 255, 0.55) 60%,
                transparent 100%);
            filter: blur(0.8px);
            animation: glitchScan 1.8s linear infinite;
            animation-play-state: paused;
        }
        .segment-purple:hover .diploma-scanline { animation-play-state: running; }

        /* RGB Red channel layer */
        .diploma-rgb-red {
            position: absolute; inset: 0;
            border-radius: inherit;
            background: linear-gradient(rgba(156,39,176,0.55), rgba(156,39,176,0.45)),
                        url('/images/postgraduate-differences_sim-article.jpg') center/cover no-repeat;
            mix-blend-mode: screen;
            filter: url(#diploma-glitch-filter) brightness(0.8) blur(0.4px);
            animation: glitchRed 3s steps(1) infinite;
            animation-play-state: paused;
            opacity: 0;
        }
        .segment-purple:hover .diploma-rgb-red { animation-play-state: running; }

        /* RGB Cyan channel layer */
        .diploma-rgb-cyan {
            position: absolute; inset: 0;
            border-radius: inherit;
            background: linear-gradient(rgba(0,200,220,0.35), rgba(0,150,180,0.25)),
                        url('/images/postgraduate-differences_sim-article.jpg') center/cover no-repeat;
            mix-blend-mode: screen;
            filter: brightness(0.6) blur(0.4px);
            animation: glitchCyan 3s steps(1) infinite;
            animation-play-state: paused;
            opacity: 0;
        }
        .segment-purple:hover .diploma-rgb-cyan { animation-play-state: running; }

        /* Corruption blocks */
        .diploma-block {
            position: absolute;
            height: 6px;
            background: linear-gradient(90deg, rgba(220,100,255,0.85), rgba(100,200,255,0.7));
            mix-blend-mode: screen;
            border-radius: 1px;
        }
        .diploma-block:nth-child(7) {
            width: 55%; top: 28%; left: 5%;
            animation: glitchBlock1 2.4s steps(1) infinite;
            animation-play-state: paused;
        }
        .diploma-block:nth-child(8) {
            width: 38%; top: 52%; left: 30%;
            height: 4px;
            background: linear-gradient(90deg, rgba(255,80,200,0.75), rgba(200,120,255,0.6));
            animation: glitchBlock2 3.1s steps(1) infinite 0.7s;
            animation-play-state: paused;
        }
        .diploma-block:nth-child(9) {
            width: 45%; top: 71%; left: 12%;
            height: 5px;
            background: linear-gradient(90deg, rgba(100,255,200,0.6), rgba(200,100,255,0.7));
            animation: glitchBlock3 2.7s steps(1) infinite 1.4s;
            animation-play-state: paused;
        }
        .segment-purple:hover .diploma-block { animation-play-state: running; }

        /* CRT vignette */
        .diploma-vignette {
            position: absolute; inset: 0;
            border-radius: inherit;
            background: radial-gradient(ellipse at center,
                transparent 40%,
                rgba(30, 0, 50, 0.7) 100%);
            animation: glitchVignette 3s ease-in-out infinite;
            animation-play-state: paused;
        }
        .segment-purple:hover .diploma-vignette { animation-play-state: running; }

        /* Whole segment flicker */
        .segment-purple:hover .segment {
            animation: glitchFlicker 3s steps(1) infinite !important;
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
            .tvet-signal, .tvet-node,
            .diploma-noise, .diploma-scanline, .diploma-rgb-red, .diploma-rgb-cyan,
            .diploma-block, .diploma-vignette,
            .sains-ecg-track, .sains-ecg-cursor { animation: none !important; }
            .segment-purple:hover .segment { animation: none !important; }
            .segment-wrapper:hover .holo-layer { opacity: 0.4; }
        }
        /* ══ END UNIQUE HOVER EFFECTS ══ */

        /* ══════════════════════════════════════
           FUTURISTIC GLOW EFFECTS
        ══════════════════════════════════════ */

        /* ── Heading neon glow + scanning beam ── */
        .pg-heading-anim {
            position: relative;
        }
        /* Overall heading glow pulse — use text-shadow on h1 (safe with background-clip:text children) */
        .pg-heading-anim h1 {
            /* no filter here — filter on parent breaks -webkit-background-clip:text on children */
        }
        /* "Pilih" and "Anda" — soft white glow */
        .pg-heading-anim .pg-word:nth-child(1),
        .pg-heading-anim .pg-word:nth-child(3) {
            text-shadow: none;
        }
        /* "Laluan" — glow via ::before blob on wrapper (filter on element breaks background-clip:text) */
        .pg-laluan-wrap {
            position: relative;
            display: inline-block;
        }
        .pg-laluan-wrap::before {
            content: none;
        }
        .pg-laluan-text {
            background: linear-gradient(120deg, #2dd4bf 0%, #14b8a6 48%, #0f766e 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: none;
        }
        @keyframes pgLaluanGlow {
            0%, 100% { opacity: 0.6; transform: scale(0.92); }
            50%      { opacity: 1;   transform: scale(1.08); }
        }
        html.dark .pg-heading-anim .pg-word:nth-child(1),
        html.dark .pg-heading-anim .pg-word:nth-child(3) {
            text-shadow: none;
        }
        .pg-heading-anim::after {
            content: none;
        }
        @keyframes pgUnderlineGlow {
            0%, 100% { opacity: 0.55; width: 40%; filter: blur(1px); }
            50%      { opacity: 1;    width: 68%; filter: blur(0.4px) drop-shadow(0 0 6px rgba(45,212,191,0.9)); }
        }

        /* Dark mode heading glow */
        html.dark .pg-heading-anim::after {
            filter: blur(1px) drop-shadow(0 0 8px rgba(45,212,191,0.7));
        }

        /* ── Wheel outer orbit rings ── */
        .pg-orbit-ring {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            border: 1px solid transparent;
        }
        .pg-orbit-ring-1 {
            inset: -18px;
            border-color: rgba(255, 140, 20, 0.22);
            box-shadow: 0 0 18px 2px rgba(255,140,20,0.14), inset 0 0 18px 2px rgba(255,140,20,0.06);
            animation: pgOrbitSpin1 18s linear infinite;
        }
        .pg-orbit-ring-2 {
            inset: -32px;
            border-color: rgba(139, 92, 246, 0.16);
            border-style: dashed;
            box-shadow: 0 0 22px 3px rgba(139,92,246,0.10);
            animation: pgOrbitSpin2 28s linear infinite reverse;
        }
        .pg-orbit-ring-3 {
            inset: -48px;
            border-color: rgba(56, 189, 248, 0.12);
            box-shadow: 0 0 28px 4px rgba(56,189,248,0.08);
            animation: pgOrbitSpin1 42s linear infinite;
        }
        @keyframes pgOrbitSpin1 {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }
        @keyframes pgOrbitSpin2 {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }

        /* Orbit tick marks on ring 1 */
        .pg-orbit-ring-1::before {
            content: "";
            position: absolute;
            top: -3px; left: 50%;
            transform: translateX(-50%);
            width: 6px; height: 6px;
            border-radius: 50%;
            background: rgba(255, 160, 30, 0.9);
            box-shadow: 0 0 8px 3px rgba(255,160,30,0.7);
        }
        .pg-orbit-ring-1::after {
            content: "";
            position: absolute;
            bottom: -3px; left: 50%;
            transform: translateX(-50%);
            width: 4px; height: 4px;
            border-radius: 50%;
            background: rgba(255, 200, 80, 0.7);
            box-shadow: 0 0 6px 2px rgba(255,200,80,0.5);
        }

        /* Purple ring (ring-2) tick dots */
        .pg-orbit-ring-2::before {
            content: "";
            position: absolute;
            top: -3px; left: 50%;
            transform: translateX(-50%);
            width: 6px; height: 6px;
            border-radius: 50%;
            background: rgba(167, 100, 255, 0.95);
            box-shadow: 0 0 9px 3px rgba(139,92,246,0.75);
        }
        .pg-orbit-ring-2::after {
            content: "";
            position: absolute;
            bottom: -3px; left: 50%;
            transform: translateX(-50%);
            width: 4px; height: 4px;
            border-radius: 50%;
            background: rgba(196, 140, 255, 0.8);
            box-shadow: 0 0 7px 2px rgba(167,100,255,0.55);
        }

        /* Cyan ring (ring-3) tick dots */
        .pg-orbit-ring-3::before {
            content: "";
            position: absolute;
            top: -3px; left: 50%;
            transform: translateX(-50%);
            width: 6px; height: 6px;
            border-radius: 50%;
            background: rgba(56, 200, 248, 0.95);
            box-shadow: 0 0 9px 3px rgba(56,189,248,0.7);
        }
        .pg-orbit-ring-3::after {
            content: "";
            position: absolute;
            bottom: -3px; left: 50%;
            transform: translateX(-50%);
            width: 4px; height: 4px;
            border-radius: 50%;
            background: rgba(120, 220, 255, 0.8);
            box-shadow: 0 0 7px 2px rgba(56,189,248,0.5);
        }

        /* ── Idle floating sparks around wheel ── */
        .pg-spark {
            position: absolute;
            width: 3px; height: 3px;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0;
            animation: pgSparkFloat 4s ease-in-out infinite;
        }
        .pg-spark:nth-child(1)  { background: rgba(255,160,30,0.9);  top: 8%;  left: 22%; animation-delay: 0s;    animation-duration: 3.8s; }
        .pg-spark:nth-child(2)  { background: rgba(139,92,246,0.9);  top: 12%; right: 18%; animation-delay: 0.6s; animation-duration: 4.2s; }
        .pg-spark:nth-child(3)  { background: rgba(56,189,248,0.9);  bottom: 14%; left: 28%; animation-delay: 1.2s; animation-duration: 3.6s; }
        .pg-spark:nth-child(4)  { background: rgba(255,200,80,0.85); top: 32%; left: 4%;  animation-delay: 1.8s; animation-duration: 4.4s; }
        .pg-spark:nth-child(5)  { background: rgba(200,100,255,0.8); top: 28%; right: 4%; animation-delay: 2.4s; animation-duration: 3.9s; }
        .pg-spark:nth-child(6)  { background: rgba(80,220,180,0.85); bottom: 22%; right: 22%; animation-delay: 0.9s; animation-duration: 4.1s; }
        @keyframes pgSparkFloat {
            0%   { opacity: 0; transform: translateY(0) scale(0.6); }
            20%  { opacity: 1; transform: translateY(-6px) scale(1); }
            80%  { opacity: 0.7; transform: translateY(-14px) scale(0.8); }
            100% { opacity: 0; transform: translateY(-22px) scale(0.4); }
        }

        /* ── Enhanced wheel glow (stronger on dark mode) ── */
        html.dark .mercedes-container {
            box-shadow:
                0 28px 72px rgba(0, 0, 0, 0.55),
                0 0 60px rgba(255, 140, 20, 0.32),
                0 0 100px rgba(139, 92, 246, 0.18),
                0 0 40px rgba(56, 189, 248, 0.12),
                inset 0 0 40px 8px rgba(255,255,255,0.06);
        }
        html.dark .pg-orbit-ring-1 {
            border-color: rgba(255, 140, 20, 0.42);
            box-shadow: 0 0 22px 4px rgba(255,140,20,0.28), inset 0 0 18px 2px rgba(255,140,20,0.1);
        }
        html.dark .pg-orbit-ring-2 {
            border-color: rgba(139, 92, 246, 0.32);
            box-shadow: 0 0 28px 4px rgba(139,92,246,0.22);
        }
        html.dark .pg-orbit-ring-3 {
            border-color: rgba(56, 189, 248, 0.24);
            box-shadow: 0 0 34px 5px rgba(56,189,248,0.16);
        }


        @media (prefers-reduced-motion: reduce) {
            .pg-orbit-ring-1, .pg-orbit-ring-2, .pg-orbit-ring-3,
            .pg-spark, .pg-heading-anim::after,
            .pg-laluan-wrap::before {
                animation: none !important;
            }
        }
        /* ══ END FUTURISTIC GLOW EFFECTS ══ */

        /* ══════════════════════════════════════
           SUN CENTER HUB
        ══════════════════════════════════════ */
        .pg-sun-hub {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            z-index: 30;
            width: clamp(60px, 12vw, 100px);
            height: clamp(60px, 12vw, 100px);
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-decoration: none;
            /* Core glass disc */
            background: radial-gradient(circle at 38% 32%,
                rgba(255, 240, 180, 0.96) 0%,
                rgba(255, 180, 30, 0.92)  38%,
                rgba(230, 100, 0, 0.88)   72%,
                rgba(180, 50, 0, 0.82)   100%);
            border: 2px solid rgba(255, 230, 120, 0.65);
            box-shadow:
                0 0 0 4px rgba(255, 180, 30, 0.22),
                0 0 18px 6px rgba(255, 160, 20, 0.65),
                0 0 44px 14px rgba(255, 120, 0, 0.35),
                0 0 80px 28px rgba(255, 80, 0, 0.18),
                inset 0 2px 6px rgba(255, 255, 200, 0.55),
                inset 0 -2px 4px rgba(180, 50, 0, 0.35);
            animation: pgSunPulse 3s ease-in-out infinite;
            transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.35s ease;
        }
        .pg-sun-hub:hover {
            transform: translate(-50%, -50%) scale(1.14);
            box-shadow:
                0 0 0 5px rgba(255, 210, 60, 0.4),
                0 0 28px 10px rgba(255, 180, 20, 0.85),
                0 0 64px 22px rgba(255, 120, 0, 0.55),
                0 0 110px 40px rgba(255, 80, 0, 0.28),
                inset 0 2px 8px rgba(255, 255, 200, 0.65),
                inset 0 -2px 5px rgba(180, 50, 0, 0.4);
        }
        /* Corona rays using conic-gradient ring */
        .pg-sun-hub::before {
            content: "";
            position: absolute;
            inset: -10px;
            border-radius: 50%;
            background: conic-gradient(
                rgba(255,220,80,0.55) 0deg,
                transparent 18deg,
                rgba(255,200,40,0.45) 36deg,
                transparent 54deg,
                rgba(255,220,80,0.55) 72deg,
                transparent 90deg,
                rgba(255,200,40,0.45) 108deg,
                transparent 126deg,
                rgba(255,220,80,0.55) 144deg,
                transparent 162deg,
                rgba(255,200,40,0.45) 180deg,
                transparent 198deg,
                rgba(255,220,80,0.55) 216deg,
                transparent 234deg,
                rgba(255,200,40,0.45) 252deg,
                transparent 270deg,
                rgba(255,220,80,0.55) 288deg,
                transparent 306deg,
                rgba(255,200,40,0.45) 324deg,
                transparent 342deg,
                rgba(255,220,80,0.55) 360deg
            );
            -webkit-mask: radial-gradient(circle, transparent 46%, black 48%, black 100%);
            mask: radial-gradient(circle, transparent 46%, black 48%, black 100%);
            animation: pgSunSpin 8s linear infinite;
            pointer-events: none;
        }
        /* Inner lens glare */
        .pg-sun-hub::after {
            content: "";
            position: absolute;
            top: 12%; left: 16%;
            width: 36%; height: 28%;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.75), rgba(255,255,255,0) 80%);
            pointer-events: none;
            filter: blur(1.5px);
        }
        .pg-sun-q {
            font-size: clamp(22px, 5vw, 34px);
            font-weight: 900;
            font-style: italic;
            color: rgba(255, 255, 255, 0.97);
            line-height: 1;
            text-shadow:
                0 0 6px rgba(255, 255, 200, 0.9),
                0 0 18px rgba(255, 200, 0, 0.8),
                0 0 36px rgba(255, 140, 0, 0.6);
            position: relative;
            z-index: 1;
            pointer-events: none;
            user-select: none;
        }
        /* ── Info Panel (centered on wheel) ── */
        .pg-info-tip {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.96);
            width: min(88vw, 340px);
            max-height: min(72vh, 520px);
            box-sizing: border-box;
            overflow-y: auto;
            background:
                linear-gradient(145deg, rgba(255,255,255,0.18) 0%, rgba(255,255,255,0.04) 24%, rgba(10,14,30,0.58) 100%),
                radial-gradient(circle at 12% 10%, rgba(255,180,40,0.25), rgba(255,180,40,0) 42%),
                radial-gradient(circle at 86% 92%, rgba(80,180,255,0.18), rgba(80,180,255,0) 38%),
                rgba(8, 11, 28, 0.72);
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 14px;
            padding: 14px 16px;
            box-shadow:
                0 0 0 1px rgba(255,255,255,0.05),
                0 16px 44px rgba(0,0,0,0.45),
                0 0 30px rgba(255,140,0,0.16),
                inset 0 1px 0 rgba(255,255,255,0.42),
                inset 0 -1px 0 rgba(255,255,255,0.08);
            opacity: 0;
            pointer-events: none;
            filter: blur(4px);
            transition: opacity 0.30s ease, transform 0.30s ease, filter 0.30s ease;
            z-index: 60;
            backdrop-filter: blur(20px) saturate(140%);
            -webkit-backdrop-filter: blur(20px) saturate(140%);
        }
        .pg-info-tip::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
            background:
                linear-gradient(180deg, rgba(255,255,255,0.24), rgba(255,255,255,0.04) 34%, rgba(255,255,255,0.02) 100%),
                repeating-linear-gradient(120deg, rgba(255,255,255,0.03) 0 1px, transparent 1px 10px);
            mix-blend-mode: screen;
            opacity: 0.65;
        }
        /* Centered panel does not use caret */
        .pg-info-tip::after {
            display: none;
        }
        /* Active state */
        .pg-info-tip.pg-info-active {
            opacity: 1;
            pointer-events: auto;
            filter: blur(0);
            transform: translate(-50%, -50%) scale(1);
        }
        /* Mobile: keep wheel-centered with safe width */
        @media (max-width: 767px) {
            .pg-info-backdrop {
                display: none;
                position: fixed;
                inset: 0;
                background: transparent;
                backdrop-filter: none;
                -webkit-backdrop-filter: none;
                z-index: 490;
                opacity: 0;
                transition: opacity 0.25s ease;
            }
            .pg-info-backdrop.pg-info-active { opacity: 1; }
            .pg-info-tip {
                width: min(340px, calc(100vw - 28px)) !important;
                max-height: min(72vh, 520px);
                transform: translate(-50%, -50%) !important;
                filter: none !important;
                backdrop-filter: blur(8px) saturate(115%) !important;
                -webkit-backdrop-filter: blur(8px) saturate(115%) !important;
                transition: opacity 0.2s ease !important;
                overscroll-behavior: contain;
                -webkit-overflow-scrolling: touch;
            }
            .pg-info-tip.pg-info-active {
                transform: translate(-50%, -50%) !important;
                filter: none !important;
            }
            .pg-info-tip::-webkit-scrollbar { width: 3px; }
            .pg-info-tip::-webkit-scrollbar-track { background: transparent; }
            .pg-info-tip::-webkit-scrollbar-thumb { background: rgba(255,160,30,0.4); border-radius: 999px; }
        }
        .pg-info-tip ul {
            list-style: none;
            margin: 0; padding: 0;
            display: flex; flex-direction: column; gap: 10px;
        }
        .pg-info-tip li {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: clamp(10px, 1.8vw, 12px);
            color: rgba(225, 232, 255, 0.92);
            line-height: 1.55;
        }
        .pg-info-tip li strong {
            color: #fff;
            font-weight: 800;
        }
        .pg-tip-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 3px;
            box-shadow: 0 0 6px 2px currentColor;
        }
        /* Glowing border pulse on active */
        @keyframes pgInfoGlow {
            0%,100% { box-shadow: 0 0 0 1px rgba(255,180,30,0.08), 0 0 24px 4px rgba(255,140,0,0.20), 0 12px 40px rgba(0,0,0,0.65); }
            50%     { box-shadow: 0 0 0 2px rgba(255,200,60,0.18), 0 0 36px 8px rgba(255,160,0,0.30), 0 12px 40px rgba(0,0,0,0.65); }
        }
        .pg-info-tip.pg-info-active {
            animation: pgInfoGlow 2.5s ease-in-out infinite;
        }
        .pg-sun-hub:hover .pg-sun-q {
            text-shadow:
                0 0 10px rgba(255,255,200,1),
                0 0 28px rgba(255,220,0,0.95),
                0 0 54px rgba(255,160,0,0.75);
        }
        @keyframes pgSunPulse {
            0%, 100% { box-shadow: 0 0 0 4px rgba(255,180,30,0.22), 0 0 18px 6px rgba(255,160,20,0.65), 0 0 44px 14px rgba(255,120,0,0.35), 0 0 80px 28px rgba(255,80,0,0.18), inset 0 2px 6px rgba(255,255,200,0.55), inset 0 -2px 4px rgba(180,50,0,0.35); }
            50%      { box-shadow: 0 0 0 7px rgba(255,200,50,0.32), 0 0 28px 10px rgba(255,180,30,0.80), 0 0 66px 22px rgba(255,120,0,0.48), 0 0 110px 40px rgba(255,80,0,0.26), inset 0 2px 8px rgba(255,255,200,0.65), inset 0 -2px 5px rgba(180,50,0,0.4); }
        }
        @keyframes pgSunSpin {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }
        @media (prefers-reduced-motion: reduce) {
            .pg-sun-hub { animation: pgSunPulse 3s ease-in-out infinite; }
            .pg-sun-hub::before { animation: none; }
        }
        /* ══ END SUN CENTER HUB ══ */
        /* Pathfinder command deck */
        .program-shell {
            width: min(100%, 92rem);
            min-height: calc(100vh - 5rem);
            padding-top: clamp(2rem, 5vw, 4.5rem) !important;
            padding-bottom: clamp(4rem, 8vw, 7rem) !important;
        }
        .pg-command-header {
            position: relative;
            z-index: 20;
            max-width: 58rem;
            margin: 0 auto clamp(1.7rem, 4vw, 3rem);
            text-align: center;
        }
        .pg-heading-title {
            margin-top: 1rem;
            font-size: clamp(2.5rem, 7vw, 5.8rem) !important;
            line-height: 0.93 !important;
            letter-spacing: -0.065em !important;
            text-wrap: balance;
        }
        .pg-laluan-text {
            background: linear-gradient(100deg, #5eead4 0%, #22d3ee 40%, #60a5fa 72%, #a78bfa 100%);
            -webkit-background-clip: text;
            background-clip: text;
        }
        .program-wheel-wrap {
            --pg-shift-x: 0px;
            --pg-shift-y: 0px;
            position: relative;
            min-height: clamp(22rem, 58vw, 43rem);
            isolation: isolate;
            perspective: 1200px;
        }
        .program-wheel-wrap::before {
            content: "";
            position: absolute;
            z-index: -2;
            inset: auto;
            left: 50%;
            top: 50%;
            width: min(72rem, 96vw);
            height: auto;
            aspect-ratio: 1.7;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            background:
                radial-gradient(circle at 32% 48%, rgba(249,115,22,0.19), transparent 28%),
                radial-gradient(circle at 68% 42%, rgba(139,92,246,0.2), transparent 28%),
                radial-gradient(circle at 50% 74%, rgba(56,189,248,0.18), transparent 28%);
            filter: blur(42px);
            opacity: 0.82;
        }
        .program-wheel-wrap::after {
            content: "";
            position: absolute;
            z-index: -1;
            inset: auto;
            left: 50%;
            top: auto;
            bottom: 5%;
            width: min(42rem, 84vw);
            height: 5rem;
            transform: translateX(-50%);
            border-radius: 50%;
            background: rgba(2,6,23,0.72);
            filter: blur(28px);
        }
        .pg-wheel-orbits {
            translate: var(--pg-shift-x) var(--pg-shift-y);
            transition: translate 0.3s ease-out;
        }
        .pg-orbit-stage {
            width: clamp(280px, 52vw, 560px) !important;
            height: clamp(280px, 52vw, 560px) !important;
        }
        .mercedes-container {
            width: clamp(280px, 52vw, 560px) !important;
            height: clamp(280px, 52vw, 560px) !important;
            translate: var(--pg-shift-x) var(--pg-shift-y);
            border: 1px solid rgba(255,255,255,0.38);
            box-shadow:
                0 38px 100px rgba(2,6,23,0.5),
                0 0 0 8px rgba(255,255,255,0.025),
                0 0 90px rgba(56,189,248,0.12);
            transition: translate 0.3s ease-out, box-shadow 0.35s ease;
        }
        .pg-stage-reticle {
            position: absolute;
            inset: 50% auto auto 50%;
            width: clamp(320px, 61vw, 660px);
            height: clamp(320px, 61vw, 660px);
            translate: -50% -50%;
            pointer-events: none;
            border: 1px solid rgba(148,163,184,0.1);
            border-radius: 50%;
            box-shadow: inset 0 0 60px rgba(56,189,248,0.035);
        }
        .pg-stage-reticle::before,
        .pg-stage-reticle::after {
            content: "";
            position: absolute;
            background: linear-gradient(90deg, transparent, rgba(94,234,212,0.28), transparent);
        }
        .pg-stage-reticle::before { left: -8%; right: -8%; top: 50%; height: 1px; }
        .pg-stage-reticle::after { top: -8%; bottom: -8%; left: 50%; width: 1px; background: linear-gradient(180deg, transparent, rgba(94,234,212,0.22), transparent); }
        .segment-content h2 {
            letter-spacing: -0.035em;
            text-shadow: 0 5px 24px rgba(2,6,23,0.72);
        }
        .segment-label {
            border: 1px solid var(--label-glass-border, rgba(255,255,255,0.34)) !important;
            border-radius: 999px !important;
            padding: 0.45rem 0.72rem !important;
            background:
                linear-gradient(145deg, rgba(255,255,255,0.26), rgba(255,255,255,0.04) 42%),
                var(--label-glass-bg, rgba(2,6,23,0.42)) !important;
            box-shadow:
                inset 0 1px 0 rgba(255,255,255,0.42),
                inset 0 -1px 0 rgba(255,255,255,0.08),
                0 8px 22px rgba(2,6,23,0.22),
                0 0 18px var(--label-glow, rgba(255,255,255,0.16)) !important;
            backdrop-filter: blur(14px) saturate(145%);
            -webkit-backdrop-filter: blur(14px) saturate(145%);
        }
        .segment-wrapper:focus-visible {
            outline: none;
        }
        .segment-wrapper:focus-visible .segment {
            filter: brightness(1.14) saturate(1.08);
            box-shadow: inset 0 0 0 3px rgba(255,255,255,0.78), 0 0 42px rgba(94,234,212,0.42);
        }
        .segment-wrapper:focus-visible .holo-layer { opacity: 0.82; }
        html:not(.dark) .program-page {
            background:
                radial-gradient(circle at 12% 16%, rgba(249,115,22,0.13), transparent 24%),
                radial-gradient(circle at 84% 18%, rgba(139,92,246,0.13), transparent 26%),
                radial-gradient(circle at 50% 78%, rgba(56,189,248,0.14), transparent 30%),
                linear-gradient(145deg, #f8fafc 0%, #eef2ff 52%, #ecfeff 100%);
        }
        html:not(.dark) .pg-heading-title { color: #0f172a; }
        html:not(.dark) .program-wheel-wrap::after { background: rgba(51,65,85,0.2); }
        @media (max-width: 767px) {
            .program-shell { padding-top: 1.5rem !important; }
            .pg-command-header { margin-bottom: 1.3rem; }
            .program-wheel-wrap { min-height: 24rem; }
            .pg-stage-reticle { width: min(94vw, 350px); height: min(94vw, 350px); }
        }
        @media (prefers-reduced-motion: reduce) {
            .pg-wheel-orbits,
            .mercedes-container { translate: 0 0 !important; transition: none; }
        }
    </style>
</head>
<body class="program-page text-gray-800 transition-colors duration-300">

    @include('layouts.navigation')
    
    <section class="program-shell max-w-7xl mx-auto px-4 pb-8 pt-12 sm:px-6">

        {{-- PAGE HEADING --}}
        <div class="pg-command-header pg-heading-anim">
            <h1 class="pg-heading-title" style="font-family:'Montserrat',sans-serif; font-weight:900; font-size:clamp(1.8rem,5vw,3.2rem); line-height:1.1; letter-spacing:-0.03em;">
                <span class="pg-word">Pilih</span>
                <span class="pg-laluan-wrap"><span class="pg-word pg-laluan-text">Laluan</span></span>
                <span class="pg-word">Anda</span>
            </h1>
        </div>

        <div class="program-wheel-wrap relative flex justify-center items-center py-4">
            <div class="pg-stage-reticle" aria-hidden="true"></div>
            {{-- Orbit rings + sparks + HUD corners --}}
            <div class="pg-wheel-orbits absolute inset-0 pointer-events-none" aria-hidden="true" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                <div class="pg-orbit-stage" style="position:relative;">
                    <div class="pg-orbit-ring pg-orbit-ring-1"></div>
                    <div class="pg-orbit-ring pg-orbit-ring-2"></div>
                    <div class="pg-orbit-ring pg-orbit-ring-3"></div>
                    <div class="pg-spark"></div>
                    <div class="pg-spark"></div>
                    <div class="pg-spark"></div>
                    <div class="pg-spark"></div>
                    <div class="pg-spark"></div>
                    <div class="pg-spark"></div>
                </div>
            </div>
            <div class="mercedes-container pg-wheel-anim pg-idle relative overflow-hidden
                w-[280px] h-[280px] 
                sm:w-[360px] sm:h-[360px] 
                md:w-[520px] md:h-[520px] 
                rounded-full">

                <div class="mercedes-reflection"></div>
                @foreach($programs->take(3) as $index => $program)
                    @php
                        $configs = [
                            0 => [
                                'clip' => 'segment-top-left-clip',
                                'bg' => 'bg-[#FF5100]',
                                'pos' => 'top-[25%] left-[9%] sm:top-[24%] sm:left-[4%] text-right items-end',
                                'label_bg' => 'bg-[#FF5100]',
                                'label_border' => 'border-[#CC4100]',
                                'label_hover' => 'group-hover:border-[#993100]',
                                'label_shadow' => '#FF5100',
                                'label_glass_bg' => 'rgba(255, 81, 0, 0.46)',
                                'label_glass_border' => 'rgba(255, 220, 190, 0.58)',
                                'label_glow' => 'rgba(255, 81, 0, 0.48)',
                            ],
                            1 => [
                                'clip' => 'segment-top-right-clip',
                                'bg' => 'bg-[#9C27B0]',
                                'pos' => 'top-[25%] right-[9%] sm:top-[24%] sm:right-[4%] text-left items-start',
                                'label_bg' => 'bg-[#8d2be2]',
                                'label_border' => 'border-[#7a1fd1]',
                                'label_hover' => 'group-hover:border-[#6216aa]',
                                'label_shadow' => '#8d2be2',
                                'label_glass_bg' => 'rgba(141, 43, 226, 0.46)',
                                'label_glass_border' => 'rgba(224, 196, 255, 0.58)',
                                'label_glow' => 'rgba(141, 43, 226, 0.48)',
                            ],
                            2 => [
                                'clip' => 'segment-bottom-clip',
                                'bg' => 'bg-[#2196F3]',
                                'pos' => 'bottom-[10%] left-1/2 -translate-x-1/2 sm:bottom-[15%] text-center items-center',
                                'label_bg' => 'bg-[#2196f3]',
                                'label_border' => 'border-[#1d4ed8]',
                                'label_hover' => 'group-hover:border-[#1e40af]',
                                'label_shadow' => '#2196f3',
                                'label_glass_bg' => 'rgba(33, 150, 243, 0.46)',
                                'label_glass_border' => 'rgba(190, 228, 255, 0.58)',
                                'label_glow' => 'rgba(33, 150, 243, 0.48)',
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
                                <div style="background: linear-gradient(rgba(255,81,0,0.60), rgba(255,81,0,0.50)), url('/images/tvet-vg2.jpeg') center/cover no-repeat; position:absolute; inset:0; z-index:1; border-radius:inherit; filter: brightness(0.92) blur(0.5px);" class="w-full h-full"></div>
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
                            {{-- DIPLOMA: Glitch / CRT Signal Corruption --}}
                            {{-- Hidden SVG filter for turbulence distortion --}}
                            <svg width="0" height="0" style="position:absolute">
                                <defs>
                                    <filter id="diploma-glitch-filter" x="-20%" y="-20%" width="140%" height="140%">
                                        <feTurbulence type="fractalNoise" baseFrequency="0.08 0.55" numOctaves="2" seed="3" result="noise"/>
                                        <feDisplacementMap in="SourceGraphic" in2="noise" scale="8" xChannelSelector="R" yChannelSelector="G"/>
                                    </filter>
                                </defs>
                            </svg>
                            <div class="holo-layer">
                                <div class="diploma-glitch-bg"></div>
                                <div class="diploma-noise"></div>
                                <div class="diploma-rgb-red"></div>
                                <div class="diploma-rgb-cyan"></div>
                                <div class="diploma-scanline"></div>
                                <div class="diploma-block"></div>
                                <div class="diploma-block"></div>
                                <div class="diploma-block"></div>
                                <div class="diploma-vignette"></div>
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
                                    w-auto max-w-[120px] sm:max-w-[140px] md:max-w-[180px]">
                            <h2 class="text-xs sm:text-lg md:text-2xl font-black uppercase 
                                       leading-tight break-words drop-shadow-md text-white">
                                {{ $program->jenis_program }}
                            </h2>
                            <div class="segment-label mt-1 sm:mt-2 text-[8px] sm:text-xs font-bold tracking-widest 
                                     border-b-2 {{ $ui['label_border'] }} text-white {{ $ui['label_bg'] }} {{ $ui['label_hover'] }} 
                                        transition-all inline-flex items-center whitespace-nowrap gap-1 w-fit rounded px-2 py-0.5 shadow-lg"
                                 style="--label-glass-bg: {{ $ui['label_glass_bg'] }}; --label-glass-border: {{ $ui['label_glass_border'] }}; --label-glow: {{ $ui['label_glow'] }};">
                                LIHAT PROGRAM <i class="fas fa-chevron-right" style="text-shadow: 0 0 8px #fff;"></i>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>

        </div>
    </section>

    @include('components.social-float')
    @include('layouts.footer')

    {{-- Cosmic star field canvas --}}
    <canvas id="pg-starfield" style="position:fixed;inset:0;width:100%;height:100%;pointer-events:none;z-index:0;" aria-hidden="true"></canvas>

    <script>
    (function(){
        var stage = document.querySelector('.program-wheel-wrap');
        if (!stage || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        function resetDepth() {
            stage.style.setProperty('--pg-shift-x', '0px');
            stage.style.setProperty('--pg-shift-y', '0px');
        }

        stage.addEventListener('pointermove', function(event) {
            if (event.pointerType === 'touch') return;
            var rect = stage.getBoundingClientRect();
            var x = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
            var y = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
            stage.style.setProperty('--pg-shift-x', (x * 10).toFixed(2) + 'px');
            stage.style.setProperty('--pg-shift-y', (y * 8).toFixed(2) + 'px');
        });

        stage.addEventListener('pointerleave', resetDepth);
    })();
    </script>
    <script>
    (function(){
        var canvas = document.getElementById('pg-starfield');
        if (!canvas) return;
        var ctx = canvas.getContext('2d');
        var stars = [];
        var nebulas = [
            { x: 0.15, y: 0.22, r: 0.28, color: '255,140,20',  opacity: 0.07 },
            { x: 0.80, y: 0.12, r: 0.24, color: '110,60,240',  opacity: 0.08 },
            { x: 0.50, y: 0.75, r: 0.30, color: '30,120,220',  opacity: 0.07 },
        ];
        var W, H;

        function resize() {
            W = canvas.width  = window.innerWidth;
            H = canvas.height = window.innerHeight;
        }

        function seedStars() {
            stars = [];
            var count = Math.min(320, Math.round(W * H / 5800));
            for (var i = 0; i < count; i++) {
                stars.push({
                    x:  Math.random(),
                    y:  Math.random(),
                    r:  Math.random() * 1.4 + 0.3,
                    b:  Math.random(),          // base brightness 0-1
                    sp: Math.random() * 0.004 + 0.001,  // twinkle speed
                    ph: Math.random() * Math.PI * 2,    // phase offset
                    color: Math.random() < 0.12
                        ? (Math.random() < 0.5 ? '200,180,255' : '180,230,255')
                        : '255,255,255'
                });
            }
        }

        var frame = 0;
        var raf;

        function draw() {
            raf = requestAnimationFrame(draw);
            frame++;
            ctx.clearRect(0, 0, W, H);

            // nebula blobs
            for (var n = 0; n < nebulas.length; n++) {
                var nb = nebulas[n];
                var grd = ctx.createRadialGradient(nb.x*W, nb.y*H, 0, nb.x*W, nb.y*H, nb.r*Math.min(W,H));
                grd.addColorStop(0,   'rgba('+nb.color+','+nb.opacity+')');
                grd.addColorStop(1,   'rgba('+nb.color+',0)');
                ctx.fillStyle = grd;
                ctx.fillRect(0, 0, W, H);
            }

            // stars
            for (var i = 0; i < stars.length; i++) {
                var s = stars[i];
                var t = frame * s.sp + s.ph;
                var alpha = s.b * 0.55 + 0.28 + Math.sin(t) * 0.22;
                var radius = s.r + Math.sin(t * 1.3) * 0.15;

                // cross-hair shimmer for bigger stars
                if (s.r > 1.2) {
                    ctx.save();
                    ctx.globalAlpha = alpha * 0.38;
                    ctx.strokeStyle = 'rgba('+s.color+',1)';
                    ctx.lineWidth = 0.5;
                    ctx.beginPath();
                    ctx.moveTo(s.x*W - radius*3, s.y*H);
                    ctx.lineTo(s.x*W + radius*3, s.y*H);
                    ctx.moveTo(s.x*W, s.y*H - radius*3);
                    ctx.lineTo(s.x*W, s.y*H + radius*3);
                    ctx.stroke();
                    ctx.restore();
                }

                ctx.save();
                ctx.globalAlpha = alpha;
                ctx.beginPath();
                ctx.arc(s.x*W, s.y*H, radius, 0, Math.PI*2);
                ctx.fillStyle = 'rgba('+s.color+',1)';
                ctx.fill();
                ctx.restore();
            }
        }

        var resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function(){ resize(); seedStars(); }, 200);
        });

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            // static render only — no animation loop
            resize(); seedStars();
            ctx.clearRect(0, 0, W, H);
            for (var n = 0; n < nebulas.length; n++) {
                var nb = nebulas[n];
                var grd = ctx.createRadialGradient(nb.x*W, nb.y*H, 0, nb.x*W, nb.y*H, nb.r*Math.min(W,H));
                grd.addColorStop(0, 'rgba('+nb.color+','+nb.opacity+')');
                grd.addColorStop(1, 'rgba('+nb.color+',0)');
                ctx.fillStyle = grd;
                ctx.fillRect(0, 0, W, H);
            }
            for (var i = 0; i < stars.length; i++) {
                var s = stars[i];
                ctx.globalAlpha = s.b * 0.7 + 0.25;
                ctx.beginPath();
                ctx.arc(s.x*W, s.y*H, s.r, 0, Math.PI*2);
                ctx.fillStyle = 'rgba('+s.color+',1)';
                ctx.fill();
            }
            ctx.globalAlpha = 1;
        } else {
            resize(); seedStars(); draw();
        }
    })();
    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Hubungi Kami - SESOC</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')

    <style>
        .contact-page {
            position: relative;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.18), transparent 20%),
                radial-gradient(circle at top right, rgba(168, 85, 247, 0.18), transparent 22%),
                radial-gradient(circle at bottom right, rgba(249, 115, 22, 0.18), transparent 24%),
                linear-gradient(180deg, #e7f0ff 0%, #eef1ff 48%, #fff5e7 100%);
        }

        .contact-page::before,
        .contact-page::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .contact-page::before {
            background:
                linear-gradient(120deg, rgba(255, 255, 255, 0.58), rgba(255, 255, 255, 0) 40%),
                repeating-linear-gradient(90deg, rgba(56, 189, 248, 0.04) 0 1px, transparent 1px 120px),
                repeating-linear-gradient(180deg, rgba(168, 85, 247, 0.03) 0 1px, transparent 1px 120px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.18));
            opacity: 0.52;
        }

        .contact-page::after {
            inset: auto auto 2rem 50%;
            width: min(76rem, calc(100vw - 2rem));
            height: 20rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 184, 28, 0.3), rgba(255, 184, 28, 0) 68%);
            filter: blur(36px);
            opacity: 0.94;
        }

        .contact-page > * {
            position: relative;
            z-index: 1;
        }

        .contact-shell {
            position: relative;
            isolation: isolate;
        }

        .contact-shell::before,
        .contact-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .contact-shell::before {
            top: 1rem;
            left: -4rem;
            width: 15rem;
            height: 15rem;
            border-radius: 999px;
            background:
                radial-gradient(circle, rgba(37, 99, 235, 0.22), rgba(37, 99, 235, 0) 64%),
                repeating-radial-gradient(circle, rgba(37, 99, 235, 0.1) 0 2px, transparent 2px 16px);
            box-shadow: 0 0 82px rgba(37, 99, 235, 0.16);
        }

        .contact-shell::after {
            right: -4rem;
            bottom: 1rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background:
                radial-gradient(circle, rgba(168, 85, 247, 0.2), rgba(168, 85, 247, 0) 66%),
                repeating-radial-gradient(circle, rgba(168, 85, 247, 0.1) 0 2px, transparent 2px 18px);
            box-shadow: 0 0 90px rgba(168, 85, 247, 0.16);
        }

        .contact-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.8);
            background:
                linear-gradient(90deg, #ff7300 0%, #ffd43b 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(255, 166, 0, 0.3),
                0 0 130px rgba(255, 212, 59, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .contact-hero::before,
        .contact-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .contact-hero::before {
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
            animation: contactGlowPulse 7s ease-in-out infinite;
        }

        .contact-hero::after {
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

        .contact-hero-eyebrow {
            color: rgba(255, 255, 255, 0.74);
        }

        .contact-hero-title {
            color: #ffffff;
            text-shadow: 0 8px 24px rgba(15, 23, 42, 0.18);
        }

        .contact-hero-copy {
            color: rgba(255, 255, 255, 0.84);
            text-shadow: 0 4px 14px rgba(15, 23, 42, 0.12);
        }

        .contact-hero-figure {
            position: absolute;
            right: 1.5rem;
            bottom: 0;
            height: 105%;
            pointer-events: none;
            user-select: none;
            filter: drop-shadow(-12px 0 36px rgba(140, 50, 0, 0.28));
        }

        .contact-hero-figure svg {
            height: 100%;
            width: auto;
            overflow: visible;
        }

        @keyframes figureFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        @keyframes bubblePop {
            0% { opacity: 0; transform: scale(0.6) translateY(6px); }
            20% { opacity: 1; transform: scale(1.06) translateY(0); }
            85% { opacity: 1; transform: scale(1) translateY(0); }
            100% { opacity: 0; transform: scale(0.9) translateY(-4px); }
        }
        @keyframes bubble2Pop {
            0%, 30% { opacity: 0; transform: scale(0.6) translateY(6px); }
            50% { opacity: 1; transform: scale(1.06) translateY(0); }
            90% { opacity: 1; transform: scale(1) translateY(0); }
            100% { opacity: 0; transform: scale(0.9) translateY(-4px); }
        }
        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0) rotate(0deg); }
            50% { opacity: 1; transform: scale(1) rotate(180deg); }
        }
        @keyframes glowPulse {
            0%, 100% { opacity: 0.5; r: 38; }
            50% { opacity: 0.9; r: 44; }
        }
        .contact-hero-figure .fig-body { animation: figureFloat 4s ease-in-out infinite; transform-origin: center bottom; }
        .contact-hero-figure .fig-bubble1 { animation: bubblePop 4s ease-in-out infinite; }
        .contact-hero-figure .fig-bubble2 { animation: bubble2Pop 4s ease-in-out 1.4s infinite; }
        .contact-hero-figure .fig-spark1 { animation: sparkle 3s ease-in-out 0.5s infinite; }
        .contact-hero-figure .fig-spark2 { animation: sparkle 3s ease-in-out 1.8s infinite; }
        .contact-hero-figure .fig-spark3 { animation: sparkle 3s ease-in-out 0.9s infinite; }

        @media (max-width: 768px) {
            .contact-hero-figure {
                right: -1.5rem;
                height: 75%;
                opacity: 0.28;
            }
        }

        .contact-grid {
            position: relative;
        }

        .contact-grid::before {
            content: "";
            position: absolute;
            inset: 2rem 7% auto;
            height: 18rem;
            border-radius: 2rem;
            background:
                repeating-linear-gradient(90deg, rgba(56, 189, 248, 0.08) 0 1px, transparent 1px 26px),
                repeating-linear-gradient(180deg, rgba(168, 85, 247, 0.08) 0 1px, transparent 1px 26px);
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.45), transparent 86%);
            opacity: 0.48;
            pointer-events: none;
        }

        .contact-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.72)),
                linear-gradient(135deg, rgba(37, 99, 235, 0.08), rgba(168, 85, 247, 0.06));
            box-shadow:
                0 22px 55px rgba(15, 23, 42, 0.12),
                0 0 34px rgba(255, 184, 28, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(16px);
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }

        .contact-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, 0.42), transparent 28%),
                radial-gradient(circle at bottom left, rgba(56, 189, 248, 0.08), transparent 24%);
            pointer-events: none;
        }

        .contact-card:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 255, 255, 0.94);
            box-shadow:
                0 28px 62px rgba(15, 23, 42, 0.14),
                0 0 42px rgba(255, 184, 28, 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .contact-icon-chip {
            position: relative;
            box-shadow:
                0 0 28px rgba(249, 115, 22, 0.18),
                0 14px 26px rgba(15, 23, 42, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
        }

        .contact-icon-chip::after {
            content: "";
            position: absolute;
            inset: auto auto -0.65rem 50%;
            width: 2.4rem;
            height: 0.85rem;
            transform: translateX(-50%);
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.1);
            filter: blur(10px);
            z-index: -1;
        }

        .contact-map-shell {
            border: 1px solid rgba(255, 255, 255, 0.76);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, 0.1),
                0 0 36px rgba(37, 99, 235, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.82);
        }

        .contact-input {
            border: 1px solid rgba(148, 163, 184, 0.28);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.82), rgba(255, 255, 255, 0.62)),
                linear-gradient(135deg, rgba(37, 99, 235, 0.06), rgba(168, 85, 247, 0.05));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.84);
            transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
        }

        .contact-input:focus {
            border-color: rgba(56, 189, 248, 0.42) !important;
            box-shadow:
                0 0 0 4px rgba(56, 189, 248, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            transform: translateY(-1px);
        }

        .contact-submit {
            box-shadow:
                0 0 34px rgba(249, 115, 22, 0.2),
                0 18px 34px rgba(249, 115, 22, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.18);
            transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
        }

        .contact-submit:hover {
            transform: translateY(-2px) scale(1.01);
            box-shadow:
                0 24px 42px rgba(249, 115, 22, 0.24),
                0 0 44px rgba(249, 115, 22, 0.24),
                inset 0 1px 0 rgba(255, 255, 255, 0.22);
            filter: saturate(1.05);
        }

        [data-fade-open] {
            opacity: 0;
            transform: translateY(1rem) scale(0.985);
            filter: blur(6px);
            transition:
                opacity 0.7s cubic-bezier(0.22, 1, 0.36, 1),
                transform 0.7s cubic-bezier(0.22, 1, 0.36, 1),
                filter 0.7s cubic-bezier(0.22, 1, 0.36, 1);
            transition-delay: var(--fade-delay, 0ms);
            will-change: opacity, transform, filter;
        }

        .fade-ready [data-fade-open] {
            opacity: 1;
            transform: translateY(0) scale(1);
            filter: blur(0);
        }

        @keyframes contactGlowPulse {
            0%, 100% {
                opacity: 0.7;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            [data-fade-open] {
                opacity: 1;
                transform: none;
                filter: none;
                transition: none;
            }

            .contact-input,
            .contact-submit,
            .contact-card {
                transition: none;
            }

            .contact-hero::before {
                animation: none;
            }
        }
        /* ── DARK MODE ── */
        html.dark .contact-page {
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.08), transparent 20%),
                radial-gradient(circle at top right, rgba(168, 85, 247, 0.08), transparent 22%),
                radial-gradient(circle at bottom right, rgba(249, 115, 22, 0.08), transparent 24%),
                linear-gradient(180deg, #0f172a 0%, #1e293b 48%, #0f172a 100%);
        }
        html.dark .contact-card {
            background: linear-gradient(135deg, rgba(30,41,59,0.9), rgba(15,23,42,0.95));
            border-color: rgba(255,255,255,0.08);
            box-shadow: 0 22px 55px rgba(0,0,0,0.3), inset 0 1px 0 rgba(255,255,255,0.05);
        }
        html.dark .contact-card h2 { color: #f1f5f9; }
        html.dark .contact-card .text-slate-900 { color: #f1f5f9 !important; }
        html.dark .contact-card .text-slate-500 { color: rgba(148,163,184,0.85) !important; }
        html.dark .contact-card .text-slate-700 { color: rgba(203,213,225,0.85) !important; }
        html.dark .contact-card .text-slate-400 { color: rgba(100,116,139,0.9) !important; }
        html.dark .contact-input {
            background: linear-gradient(135deg, rgba(30,41,59,0.9), rgba(15,23,42,0.8));
            border-color: rgba(255,255,255,0.1);
            color: #f1f5f9;
        }
        html.dark .contact-input::placeholder { color: rgba(148,163,184,0.6); }
    </style>
</head>
<body class="contact-page text-gray-800 transition-colors duration-300">

    @include('layouts.navigation')
    
    <main class="contact-shell max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="contact-hero rounded-[2rem] px-6 py-8 sm:px-8 sm:py-10 mb-10" data-fade-open data-fade-order="1">
            <p class="contact-hero-eyebrow text-xs sm:text-sm font-bold uppercase tracking-[0.28em]">Hubungi Kami</p>
            <h1 class="contact-hero-title text-4xl md:text-5xl font-extrabold tracking-[-0.04em] mt-3">Kami sentiasa membantu anda di sini</h1>
            <p class="contact-hero-copy mt-4 text-base sm:text-lg max-w-3xl leading-8">Mempunyai sebarang pertanyaan mengenai program atau kemasukan? Pasukan kami sedia membantu anda.</p>

            {{-- Customer support figure --}}
            <div class="contact-hero-figure" aria-hidden="true">
                <svg viewBox="-60 0 340 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <radialGradient id="skinGrad" cx="50%" cy="40%" r="60%">
                            <stop offset="0%" stop-color="#ffe0b2"/>
                            <stop offset="100%" stop-color="#ffb74d"/>
                        </radialGradient>
                        <radialGradient id="shirtGrad" cx="30%" cy="20%" r="80%">
                            <stop offset="0%" stop-color="#ff9d3a"/>
                            <stop offset="100%" stop-color="#e65100"/>
                        </radialGradient>
                        <radialGradient id="glowOrange" cx="50%" cy="50%" r="50%">
                            <stop offset="0%" stop-color="rgba(255,180,50,0.45)"/>
                            <stop offset="100%" stop-color="rgba(255,120,0,0)"/>
                        </radialGradient>
                        <filter id="softBlur"><feGaussianBlur stdDeviation="2.5"/></filter>
                        <filter id="glow"><feGaussianBlur stdDeviation="4" result="blur"/><feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge></filter>
                    </defs>

                    <!-- Ambient glow behind figure -->
                    <circle cx="110" cy="200" r="110" fill="url(#glowOrange)" filter="url(#softBlur)" opacity="0.6"/>

                    <!-- Floor shadow -->
                    <ellipse cx="110" cy="374" rx="62" ry="8" fill="rgba(0,0,0,0.22)"/>

                    <!-- === ANIMATED BODY GROUP === -->
                    <g class="fig-body">

                        <!-- Legs -->
                        <rect x="84" y="294" width="24" height="72" rx="12" fill="#263238"/>
                        <rect x="118" y="294" width="24" height="72" rx="12" fill="#263238"/>
                        <!-- Shoes -->
                        <path d="M78 364 Q82 372 100 372 Q108 372 110 366 L108 360 Q96 358 84 360Z" fill="#1a1a2e"/>
                        <path d="M116 364 Q120 372 138 372 Q146 372 148 366 L146 360 Q134 358 120 360Z" fill="#1a1a2e"/>
                        <!-- Shoe highlight -->
                        <path d="M82 363 Q88 360 100 361" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" stroke-linecap="round" fill="none"/>
                        <path d="M120 363 Q126 360 138 361" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" stroke-linecap="round" fill="none"/>

                        <!-- Shirt / Torso -->
                        <path d="M68 188 Q60 198 58 240 Q56 282 62 296 Q78 306 110 306 Q142 306 158 296 Q164 282 162 240 Q160 198 152 188 L138 176 Q124 186 110 186 Q96 186 82 176 Z" fill="url(#shirtGrad)"/>
                        <!-- Shirt highlight -->
                        <path d="M80 188 Q72 200 70 230" stroke="rgba(255,255,255,0.18)" stroke-width="3" stroke-linecap="round" fill="none"/>
                        <!-- Shirt collar / V-neck -->
                        <path d="M96 178 L110 210 L124 178" fill="white" opacity="0.82"/>
                        <!-- Shirt pocket -->
                        <rect x="125" y="214" width="22" height="18" rx="4" fill="rgba(0,0,0,0.12)"/>
                        <rect x="127" y="216" width="18" height="14" rx="3" fill="rgba(255,255,255,0.1)"/>
                        <!-- Pocket pen -->
                        <rect x="133" y="210" width="3" height="12" rx="1.5" fill="white" opacity="0.7"/>
                        <rect x="138" y="210" width="3" height="10" rx="1.5" fill="#ffd54f" opacity="0.8"/>

                        <!-- Left arm -->
                        <path d="M68 196 Q44 224 40 268" stroke="url(#shirtGrad)" stroke-width="26" stroke-linecap="round" fill="none"/>
                        <!-- Left hand -->
                        <circle cx="40" cy="272" r="13" fill="url(#skinGrad)"/>
                        <!-- Fingers hint -->
                        <path d="M30 268 Q28 262 32 260" stroke="#ffb74d" stroke-width="2" stroke-linecap="round" fill="none"/>
                        <path d="M28 273 Q25 267 29 265" stroke="#ffb74d" stroke-width="2" stroke-linecap="round" fill="none"/>

                        <!-- Right arm (holds clipboard) -->
                        <path d="M152 196 Q174 218 176 258" stroke="url(#shirtGrad)" stroke-width="26" stroke-linecap="round" fill="none"/>
                        <!-- Right hand -->
                        <circle cx="176" cy="264" r="13" fill="url(#skinGrad)"/>

                        <!-- Clipboard -->
                        <rect x="156" y="228" width="54" height="70" rx="8" fill="white" opacity="0.96" filter="url(#softBlur)"/>
                        <rect x="156" y="228" width="54" height="70" rx="8" fill="white"/>
                        <!-- Clipboard clip -->
                        <rect x="172" y="222" width="22" height="14" rx="5" fill="#90a4ae"/>
                        <rect x="175" y="224" width="16" height="10" rx="3" fill="#b0bec5"/>
                        <!-- Clipboard lines -->
                        <rect x="163" y="246" width="40" height="3.5" rx="2" fill="#ffd082"/>
                        <rect x="163" y="255" width="34" height="3.5" rx="2" fill="#ffcc70"/>
                        <rect x="163" y="264" width="38" height="3.5" rx="2" fill="#ffcc70"/>
                        <rect x="163" y="273" width="26" height="3.5" rx="2" fill="#ffe0a0"/>
                        <!-- Checkmark on clipboard -->
                        <circle cx="196" cy="250" r="8" fill="#4caf50" opacity="0.9"/>
                        <path d="M192 250 L195 254 L200 246" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>

                        <!-- Neck -->
                        <rect x="100" y="162" width="20" height="28" rx="8" fill="url(#skinGrad)"/>

                        <!-- Head -->
                        <ellipse cx="110" cy="132" rx="42" ry="46" fill="url(#skinGrad)"/>
                        <!-- Head highlight -->
                        <ellipse cx="100" cy="118" rx="14" ry="10" fill="rgba(255,255,255,0.14)" transform="rotate(-20 100 118)"/>

                        <!-- Ear left -->
                        <ellipse cx="68" cy="136" rx="7" ry="9" fill="url(#skinGrad)"/>
                        <ellipse cx="68" cy="136" rx="4" ry="6" fill="rgba(200,100,50,0.18)"/>
                        <!-- Ear right -->
                        <ellipse cx="152" cy="136" rx="7" ry="9" fill="url(#skinGrad)"/>
                        <ellipse cx="152" cy="136" rx="4" ry="6" fill="rgba(200,100,50,0.18)"/>

                        <!-- Hair -->
                        <path d="M68 122 Q68 74 110 72 Q152 74 152 122 Q150 94 142 84 Q128 72 110 72 Q92 72 78 84 Q70 94 68 122Z" fill="#4e342e"/>
                        <!-- Hair shine -->
                        <path d="M82 82 Q92 76 104 75" stroke="rgba(255,255,255,0.22)" stroke-width="3" stroke-linecap="round" fill="none"/>

                        <!-- Eyebrows -->
                        <path d="M91 110 Q97 106 103 109" stroke="#4e342e" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                        <path d="M117 109 Q123 106 129 110" stroke="#4e342e" stroke-width="2.5" stroke-linecap="round" fill="none"/>

                        <!-- Eyes -->
                        <circle cx="97" cy="124" r="7" fill="white"/>
                        <circle cx="123" cy="124" r="7" fill="white"/>
                        <circle cx="98" cy="125" r="4.5" fill="#3e2723"/>
                        <circle cx="124" cy="125" r="4.5" fill="#3e2723"/>
                        <circle cx="99.5" cy="123" r="1.8" fill="white"/>
                        <circle cx="125.5" cy="123" r="1.8" fill="white"/>
                        <!-- Eyelashes hint -->
                        <path d="M91 118 Q94 115 97 117" stroke="#4e342e" stroke-width="1.2" fill="none"/>
                        <path d="M117 117 Q120 115 123 118" stroke="#4e342e" stroke-width="1.2" fill="none"/>

                        <!-- Nose -->
                        <path d="M107 132 Q110 138 113 132" stroke="#d4874a" stroke-width="1.8" stroke-linecap="round" fill="none"/>

                        <!-- Smile / mouth -->
                        <path d="M99 146 Q110 157 121 146" stroke="#bf360c" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                        <!-- Teeth -->
                        <path d="M103 147 Q110 153 117 147" fill="white" opacity="0.8"/>

                        <!-- Cheek blush -->
                        <ellipse cx="88" cy="142" rx="8" ry="5" fill="rgba(255,100,80,0.18)"/>
                        <ellipse cx="132" cy="142" rx="8" ry="5" fill="rgba(255,100,80,0.18)"/>

                        <!-- Headset band -->
                        <path d="M70 126 Q70 76 110 74 Q150 76 150 126" stroke="#263238" stroke-width="6" fill="none" stroke-linecap="round"/>
                        <!-- Headset highlight -->
                        <path d="M80 96 Q90 80 110 76" stroke="rgba(255,255,255,0.2)" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                        <!-- Ear cup left -->
                        <rect x="60" y="118" width="18" height="26" rx="8" fill="#263238"/>
                        <rect x="63" y="121" width="12" height="20" rx="6" fill="#ff7300"/>
                        <rect x="65" y="123" width="8" height="16" rx="4" fill="rgba(255,180,50,0.3)"/>
                        <!-- Ear cup right -->
                        <rect x="142" y="118" width="18" height="26" rx="8" fill="#263238"/>
                        <rect x="145" y="121" width="12" height="20" rx="6" fill="#ff7300"/>
                        <rect x="147" y="123" width="8" height="16" rx="4" fill="rgba(255,180,50,0.3)"/>
                        <!-- Mic arm -->
                        <path d="M78 132 Q62 150 64 164" stroke="#263238" stroke-width="3.5" fill="none" stroke-linecap="round"/>
                        <!-- Mic capsule -->
                        <rect x="58" y="162" width="12" height="8" rx="4" fill="#263238"/>
                        <circle cx="64" cy="166" r="3" fill="#ff7300"/>
                        <!-- Mic glow -->
                        <circle cx="64" cy="166" r="5" fill="rgba(255,120,0,0.25)"/>

                        <!-- Name badge -->
                        <rect x="90" y="218" width="40" height="24" rx="6" fill="rgba(255,255,255,0.22)"/>
                        <rect x="92" y="220" width="36" height="20" rx="5" fill="rgba(255,255,255,0.14)"/>
                        <rect x="95" y="223" width="22" height="3" rx="1.5" fill="rgba(255,255,255,0.7)"/>
                        <rect x="95" y="229" width="16" height="2.5" rx="1.2" fill="rgba(255,255,255,0.45)"/>

                    </g>

                    <!-- === CHAT BUBBLE 1 === -->
                    <g class="fig-bubble1" style="transform-origin: 20px 60px;">
                        <rect x="-50" y="44" width="108" height="44" rx="14" fill="white" opacity="0.97"/>
                        <path d="M-8 88 L4 100 L16 88" fill="white"/>
                        <!-- Star rating -->
                        <text x="-38" y="62" font-size="12" fill="#ffc107">★★★★★</text>
                        <rect x="-38" y="68" width="60" height="5" rx="2.5" fill="#e2e8f0"/>
                        <rect x="-38" y="76" width="44" height="5" rx="2.5" fill="#e2e8f0"/>
                    </g>

                    <!-- === CHAT BUBBLE 2 === -->
                    <g class="fig-bubble2" style="transform-origin: 205px 80px;">
                        <rect x="168" y="58" width="86" height="50" rx="13" fill="#ff7300" opacity="0.95"/>
                        <path d="M172 108 L184 120 L196 108" fill="#ff7300"/>
                        <!-- Chat icon + text -->
                        <circle cx="184" cy="76" r="9" fill="rgba(255,255,255,0.22)"/>
                        <text x="180" y="80" font-size="10" fill="white">💬</text>
                        <rect x="196" y="70" width="48" height="5" rx="2.5" fill="rgba(255,255,255,0.55)"/>
                        <rect x="196" y="79" width="36" height="5" rx="2.5" fill="rgba(255,255,255,0.38)"/>
                        <rect x="196" y="88" width="42" height="5" rx="2.5" fill="rgba(255,255,255,0.3)"/>
                    </g>

                    <!-- === SPARKLES === -->
                    <g class="fig-spark1" style="transform-origin: -30px 168px;">
                        <path d="M-30 158 L-27 168 L-30 178 L-33 168 Z" fill="#ffd54f"/>
                        <path d="M-40 168 L-30 165 L-20 168 L-30 171 Z" fill="#ffd54f"/>
                    </g>
                    <g class="fig-spark2" style="transform-origin: 240px 130px;">
                        <path d="M240 122 L243 130 L240 138 L237 130 Z" fill="white" opacity="0.9"/>
                        <path d="M232 130 L240 127 L248 130 L240 133 Z" fill="white" opacity="0.9"/>
                    </g>
                    <g class="fig-spark3" style="transform-origin: 200px 200px;">
                        <path d="M200 193 L202.5 200 L200 207 L197.5 200 Z" fill="#ffd54f" opacity="0.8"/>
                        <path d="M193 200 L200 197.5 L207 200 L200 202.5 Z" fill="#ffd54f" opacity="0.8"/>
                    </g>

                </svg>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="mb-6 rounded-2xl border border-green-300/70 bg-green-100/80 px-4 py-3 text-green-700 shadow-sm backdrop-blur-sm" data-fade-open data-fade-order="2">
                <i class="fas fa-check-circle mr-2"></i>{{ $message }}
            </div>
        @endif

        <div class="contact-grid grid md:grid-cols-2 gap-8">
            <section class="contact-card rounded-[2rem] p-8" data-fade-open data-fade-order="3">
                <div class="relative z-10 flex items-center gap-4 mb-6">
                    <div class="contact-icon-chip h-12 w-12 rounded-full bg-[linear-gradient(135deg,#f97316,#fb7185)] text-white flex items-center justify-center">
                        <i class="fas fa-location-dot"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Alamat Pejabat</h2>
                        <p class="text-slate-500">34 Jalan MPK 4 Taman Bukit Kepayang 70300 Seremban Negeri Sembilan</p>
                        <a href="https://www.google.com/maps/search/?api=1&query=34+Jalan+MPK+4+Taman+Bukit+Kepayang+70300+Seremban" target="_blank" class="inline-flex items-center text-sm font-semibold text-orange-500 hover:text-orange-600 mt-2">
                            <i class="fas fa-map-marker-alt mr-2"></i> Buka di Google Maps
                        </a>
                    </div>
                </div>

                <div class="contact-map-shell mb-6 rounded-2xl overflow-hidden">
                    <iframe width="100%" height="250" frameborder="0" style="border:0" loading="lazy" allowfullscreen 
                        src="https://www.google.com/maps?q=34+Jalan+MPK+4+Taman+Bukit+Kepayang+70300+Seremban&output=embed">
                    </iframe>
                </div>

                <div class="relative z-10 flex items-center gap-4 mb-6">
                    <div class="contact-icon-chip h-12 w-12 rounded-full bg-[linear-gradient(135deg,#3b82f6,#0ea5e9)] text-white flex items-center justify-center">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Telefon</h2>
                        <p class="text-slate-500">+6011 2100 5537 </p>
                        <p class="text-sm text-slate-400">Isnin - Jumaat (9:00 AM - 5:00 PM)</p>
                    </div>
                </div>

                <div class="relative z-10 flex items-center gap-4">
                    <div class="contact-icon-chip h-12 w-12 rounded-full bg-[linear-gradient(135deg,#8b5cf6,#6366f1)] text-white flex items-center justify-center">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Emel Rasmi</h2>
                        <p class="text-orange-500 font-semibold">sesoclegacy@gmail.com</p>
                    </div>
                </div>
            </section>

            <section class="contact-card rounded-[2rem] p-8" data-fade-open data-fade-order="4">
                <div class="relative z-10">
                    <h2 class="text-2xl font-extrabold tracking-[-0.03em] text-slate-900 mb-6">Hantar Pertanyaan</h2>
                    <form action="{{ route('hubungi.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="nama" class="block text-sm font-semibold text-slate-700 mb-1">Nama Penuh</label>
                            <input id="nama" name="nama" type="text" required class="contact-input w-full rounded-2xl @error('nama') border-red-500 @enderror p-3 text-slate-800 outline-none" placeholder="Nama anda" value="{{ old('nama') }}" />
                            @error('nama')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="emel" class="block text-sm font-semibold text-slate-700 mb-1">Emel</label>
                            <input id="emel" name="emel" type="email" required class="contact-input w-full rounded-2xl @error('emel') border-red-500 @enderror p-3 text-slate-800 outline-none" placeholder="email@contoh.com" value="{{ old('emel') }}" />
                            @error('emel')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="perkara" class="block text-sm font-semibold text-slate-700 mb-1">Perkara</label>
                            <input id="perkara" name="perkara" type="text" required class="contact-input w-full rounded-2xl @error('perkara') border-red-500 @enderror p-3 text-slate-800 outline-none" placeholder="Apa yang ingin anda tanya" value="{{ old('perkara') }}" />
                            @error('perkara')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="mesej" class="block text-sm font-semibold text-slate-700 mb-1">Mesej</label>
                            <textarea id="mesej" name="mesej" rows="5" required class="contact-input w-full rounded-2xl @error('mesej') border-red-500 @enderror p-3 text-slate-800 outline-none" placeholder="Tulis mesej anda di sini">{{ old('mesej') }}</textarea>
                            @error('mesej')<p class="text-red-500 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="contact-submit w-full bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-2xl py-3 transition">
                            <i class="fas fa-paper-plane mr-2"></i> Hantar Mesej
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>

    @include('components.social-float')
    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                document.body.classList.add('fade-ready');
                return;
            }

            const items = document.querySelectorAll('[data-fade-open]');
            items.forEach(function (item, index) {
                const order = Number(item.getAttribute('data-fade-order')) || index + 1;
                item.style.setProperty('--fade-delay', String((order - 1) * 120) + 'ms');
            });

            requestAnimationFrame(function () {
                requestAnimationFrame(function () {
                    document.body.classList.add('fade-ready');
                });
            });
        });
    </script>

</body>
</html>

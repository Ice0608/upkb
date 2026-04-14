<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <title>UPKB - Program</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
            top: 1.5rem;
            left: -3rem;
            width: 20rem;
            height: 20rem;
            border-radius: 2.5rem;
            background:
                radial-gradient(circle at 30% 30%, rgba(255, 166, 0, 0.3), rgba(255, 166, 0, 0) 55%),
                linear-gradient(145deg, rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0)),
                conic-gradient(from 180deg at 50% 50%, rgba(15, 23, 42, 0.12), rgba(15, 23, 42, 0.02), rgba(255, 184, 28, 0.16));
            filter: blur(10px);
            box-shadow: 0 24px 80px rgba(15, 23, 42, 0.08);
            opacity: 0.94;
        }

        .program-shell::after {
            right: -2rem;
            top: 12rem;
            width: 24rem;
            height: 24rem;
            border-radius: 999px;
            background:
                radial-gradient(circle at center, rgba(255, 255, 255, 0.72), rgba(255, 255, 255, 0) 46%),
                radial-gradient(circle at 40% 40%, rgba(37, 99, 235, 0.18), rgba(37, 99, 235, 0) 68%);
            filter: blur(4px);
            box-shadow: 0 16px 60px rgba(15, 23, 42, 0.06);
            opacity: 0.98;
        }

        .program-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.8);
            background:
                linear-gradient(90deg, #ff7300 0%, #ffd43b 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(255, 166, 0, 0.3),
                0 0 130px rgba(255, 212, 59, 0.22),
                0 0 42px rgba(249, 115, 22, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.26);
        }

        .program-hero::before,
        .program-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .program-hero::before {
            top: -3rem;
            right: 8%;
            width: 11rem;
            height: 11rem;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.22);
            background: radial-gradient(circle, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0) 70%);
            box-shadow:
                0 0 36px rgba(255, 235, 140, 0.34),
                0 0 0 18px rgba(255, 255, 255, 0.08),
                0 0 0 40px rgba(255, 255, 255, 0.04);
            animation: glowPulse 7s ease-in-out infinite;
        }

        .program-hero::after {
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

        .program-search-button {
            border: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow:
                0 0 0 6px rgba(255, 255, 255, 0.16),
                0 0 34px rgba(255, 166, 0, 0.34),
                0 16px 36px rgba(15, 23, 42, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.88);
            transition: transform 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
        }

        .program-search-button:hover {
            transform: translateY(-3px) scale(1.04);
            box-shadow:
                0 0 0 8px rgba(255, 255, 255, 0.18),
                0 0 42px rgba(255, 187, 51, 0.44),
                0 22px 44px rgba(15, 23, 42, 0.18),
                0 0 24px rgba(255, 255, 255, 0.24),
                inset 0 1px 0 rgba(255, 255, 255, 0.92);
            color: #0ea5e9;
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

        .segment-wrapper:hover .segment {
            box-shadow: 0 0 48px 16px #ff7300, 0 0 0 4px #fff3e6 inset;
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
            .program-search-button,
            .segment-label {
                transition: none;
            }

            .program-hero::before {
                animation: none;
            }

            .segment-wrapper:hover i {
                animation: none;
            }
        }
    </style>
</head>
<body class="program-page text-gray-800">

    @include('layouts.navigation')
    
    <section class="program-shell max-w-7xl mx-auto px-4 py-8 sm:px-6">
        <div class="program-hero rounded-[2rem] p-8 sm:p-10 text-white mb-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <p class="text-xs sm:text-sm uppercase tracking-[0.1em] text-white/70 font-semibold">Eksplorasi Program</p>
                    <h1 class="mt-3 text-4xl md:text-5xl font-bold leading-tight tracking-[-0.04em]">Teroka Semua Kursus</h1>
                    <p class="mt-3 text-base sm:text-lg text-white/80 max-w-2xl">Cari program yang sesuai dengan minat dan kerjaya impian anda.</p>
                </div>
                <button class="program-search-button w-14 h-14 rounded-full bg-white/95 text-orange-600">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <div class="program-wheel-wrap flex justify-center items-center py-4">
            <div class="mercedes-container relative overflow-hidden
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
                            ],
                            1 => [
                                'clip' => 'segment-top-right-clip',
                                'bg' => 'bg-[#9C27B0]',
                                'pos' => 'top-[20%] right-[9%] sm:top-[19%] sm:right-[4%] text-left items-start',
                            ],
                            2 => [
                                'clip' => 'segment-bottom-clip',
                                'bg' => 'bg-[#2196F3]',
                                'pos' => 'bottom-[10%] left-1/2 -translate-x-1/2 sm:bottom-[15%] text-center items-center',
                            ],
                        ];
                        $ui = $configs[$index] ?? $configs[0];
                    @endphp

                    <a href="{{ route('kursus.index', ['jenis' => $program->jenis_program]) }}" 
                        class="segment-wrapper group 
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
                                        border-b-2 border-orange-600 text-white bg-orange-500 group-hover:border-orange-700 
                                        transition-all inline-block w-fit rounded px-2 py-0.5 shadow-lg"
                                 style="box-shadow: 0 0 12px 2px #ff7300;">
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

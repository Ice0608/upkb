<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPKB - Program</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* 🔹 CSS UNTUK BULATAN MERCEDES */
        .mercedes-container {
            overflow: hidden; /* Potong lebihan warna yang terkeluar dari bulatan */
        }

        /* Koordinat tepat supaya segmen bertemu di tengah & tidak pecah */
        .segment-top-left-clip { 
            clip-path: polygon(50% 50%, 50% -20%, -20% -20%, -20% 65%); 
        }
        .segment-top-right-clip { 
            clip-path: polygon(50% 50%, 50% -20%, 120% -20%, 120% 65%); 
        }
        .segment-bottom-clip { 
            clip-path: polygon(50% 50%, 120% 65%, 120% 120%, -20% 120%, -20% 65%); 
        }

        .segment-wrapper .segment {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .segment-wrapper:hover .segment {
            transform: scale(1.05);
            filter: brightness(1.1);
            z-index: 10;
        }

        /* 🔥 Hover glow ikut warna */
        .segment-orange:hover .segment {
            box-shadow: 0 0 40px rgba(255, 152, 0, 0.6);
        }

        .segment-purple:hover .segment {
            box-shadow: 0 0 40px rgba(156, 39, 176, 0.6);
        }

        .segment-blue:hover .segment {
            box-shadow: 0 0 40px rgba(33, 150, 243, 0.6);
        }

        /* 🔥 Fade segment lain bila hover */
        .mercedes-container:hover .segment {
            opacity: 0.5;
        }

        .segment-wrapper:hover .segment {
            opacity: 1 !important;
            transform: scale(1.08);
            filter: brightness(1.15);
        }

        /* Pop keluar ikut arah */
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

        .segment-wrapper:hover i {
            animation: bounceSoft 0.6s ease;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="max-w-7xl mx-auto px-6 py-6">
        
        {{-- 🔹 HERO HEADER --}}
        <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">Teroka Semua Kursus</h1>
                    <p class="mt-3 text-lg text-orange-100">Cari program yang sesuai dengan minat dan kerjaya impian anda.</p>
                </div>
                <button class="w-14 h-14 rounded-full bg-white text-orange-600 shadow-md hover:shadow-lg transition">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        {{-- 🔹 BAHAGIAN BULATAN (MERCEDES STYLE) --}}
        <div class="flex justify-center items-center py-4">
    <div class="mercedes-container relative 
        w-[280px] h-[280px] 
        sm:w-[360px] sm:h-[360px] 
        md:w-[520px] md:h-[520px] 
        rounded-full border-[8px] sm:border-[10px] border-white shadow-2xl bg-white">

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

            <a href="{{ route('institusi', ['jenis' => $program->jenis_program]) }}" 
                class="segment-wrapper group 
                {{ $index == 0 ? 'segment-orange' : ($index == 1 ? 'segment-purple' : 'segment-blue') }}">
                
                <!-- Background segment -->
                <div class="segment absolute inset-0 {{ $ui['bg'] }} {{ $ui['clip'] }}"></div>
                
                <!-- Content -->
                <div class="absolute {{ $ui['pos'] }} z-20 text-white flex flex-col 
                            w-[100px] sm:w-[140px] md:w-[180px]">

                    <!-- Icon -->
                    <div class="mb-1 sm:mb-2 bg-white/20 p-1.5 sm:p-2 rounded-xl backdrop-blur-sm 
                                group-hover:scale-110 transition-transform w-fit">
                        <i class="{{ $program->icon }} text-base sm:text-xl md:text-3xl"></i>
                    </div>

                    <!-- Title -->
                    <h2 class="text-xs sm:text-lg md:text-2xl font-black uppercase 
                               leading-tight break-words drop-shadow-md">
                        {{ $program->jenis_program }}
                    </h2>

                    <!-- Button -->
                    <div class="mt-1 sm:mt-2 text-[8px] sm:text-xs font-bold tracking-widest 
                                border-b border-white/40 group-hover:border-white 
                                transition-all inline-block w-fit">
                        LIHAT PROGRAM <i class="fas fa-chevron-right ml-1"></i>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
       
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

</body>
</html>
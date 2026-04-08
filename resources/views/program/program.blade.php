<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Program</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Membahagi bulatan kepada 3 bahagian (Mercedes style) */
        .segment-top-left {
            clip-path: polygon(50% 50%, -10% -10%, 50% -10%);
            /* Tarik lebih sikit ke tepi untuk cover lengkung bulatan */
            clip-path: polygon(50% 50%, 0 0, 50% 0, 0 60%);
        }
        .segment-top-right {
            clip-path: polygon(50% 50%, 50% 0, 100% 0, 100% 60%);
        }
        .segment-bottom {
            clip-path: polygon(50% 50%, 100% 60%, 100% 100%, 0 100%, 0 60%);
        }

        /* Hover effect supaya segmen timbul sikit */
        .mercedes-segment {
            transition: all 0.3s ease;
        }
        .mercedes-segment:hover {
            transform: scale(1.05);
            z-index: 30;
            filter: brightness(1.1);
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    @include('layouts.navigation')

    <section class="max-w-7xl mx-auto px-6 py-10">
        {{-- Hero Header --}}
        <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg p-8 text-white mb-16">
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

        {{-- CONTAINER BULATAN MERCEDES --}}
        <div class="flex justify-center items-center py-10">
            <div class="relative w-[340px] h-[340px] md:w-[500px] md:h-[500px] rounded-full bg-[#222] shadow-2xl overflow-visible border-[8px] border-white">
                
                @forelse($programs as $index => $program)
                    @php
                        // Mapping mengikut gambar yang awak beri
                        $config = [
                            0 => ['class' => 'segment-top-left', 'bg' => 'bg-[#FF5722]', 'align' => 'items-start justify-center pt-16 pr-16 text-right'], // Sains Kesihatan
                            1 => ['class' => 'segment-top-right', 'bg' => 'bg-[#FFA000]', 'align' => 'items-start justify-center pt-16 pl-16 text-left'], // Diploma
                            2 => ['class' => 'segment-bottom', 'bg' => 'bg-[#7CB342]', 'align' => 'items-end justify-center pb-16 px-10 text-center'],   // TVET
                        ];
                        $ui = $config[$index] ?? $config[0];
                    @endphp

                    <a href="{{ route('institusi', ['jenis' => $program->jenis_program]) }}" 
                       class="mercedes-segment absolute inset-0 rounded-full {{ $ui['bg'] }} {{ $ui['class'] }} flex {{ $ui['align'] }} text-white p-6 group">
                        
                        <div class="max-w-[120px] md:max-w-[180px]">
                            <div class="mb-2 opacity-90 group-hover:scale-110 transition-transform duration-300">
                                <i class="{{ $program->icon }} text-2xl md:text-4xl"></i>
                            </div>
                            <h2 class="text-sm md:text-xl font-black uppercase leading-tight mb-1">
                                {{ $program->jenis_program }}
                            </h2>
                            <p class="hidden md:block text-[10px] opacity-0 group-hover:opacity-100 transition-opacity">
                                {{ Str::limit($program->info_program, 50) }}
                            </p>
                            <span class="text-[9px] md:text-xs font-bold mt-2 inline-block border-b border-white/50">
                                LIHAT PROGRAM →
                            </span>
                        </div>
                    </a>

                @empty
                    <div class="absolute inset-0 flex items-center justify-center text-white italic">
                        Tiada program.
                    </div>
                @endforelse

                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 md:w-12 md:h-12 bg-[#222] rounded-full z-40 border-4 border-white shadow-lg"></div>
            </div>
        </div>
    </section>

    @include('components.social-float')
    @include('layouts.footer')

</body>
</html>
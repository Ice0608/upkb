<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

<main class="max-w-7xl mx-auto px-4 py-8 space-y-8">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-orange-500">Admin Dashboard</p>
            <h1 class="text-3xl font-semibold text-gray-900">Ringkasan Sistem</h1>
            <p class="mt-2 text-sm text-gray-600">Maklumat terkini mengenai event, pelajar, institusi dan kursus.</p>
        </div>
        <div class="text-sm text-gray-500">
            Hari ini: {{ now()->format('d M Y') }}
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Pelajar -->
        <div class="rounded-[32px] bg-white p-6 shadow-sm border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-gray-500">Total Pelajar</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalPelajar) }}</p>
                </div>
            </div>
        </div>

        <!-- Pelajar Hari Ini -->
        <div class="rounded-[32px] bg-white p-6 shadow-sm border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                    <i class="fas fa-user-plus text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-gray-500">Pelajar Hari Ini</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($todayPelajar) }}</p>
                </div>
            </div>
        </div>

        <!-- Total Institusi -->
        <div class="rounded-[32px] bg-white p-6 shadow-sm border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-100">
                    <i class="fas fa-building text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-gray-500">Total Institusi</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalInstitusi) }}</p>
                </div>
            </div>
        </div>

        <!-- Total Kursus -->
        <div class="rounded-[32px] bg-white p-6 shadow-sm border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-orange-100">
                    <i class="fas fa-graduation-cap text-orange-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-gray-500">Total Kursus</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalKursus) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Events -->
    <div class="rounded-[32px] bg-white p-8 shadow-sm border border-gray-200">
        <div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <i class="fas fa-calendar-days text-orange-500 text-xl"></i>
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">Event {{ $monthName }}</h2>
                    <p class="text-sm text-gray-500">Paparan untuk bulan yang dipilih. Semak semula bulan sebelumnya atau ke hadapan.</p>
                </div>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="{{ url()->current() . '?month=' . $prevMonth . '&year=' . $prevYear }}" class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-gray-50 px-3 py-2 hover:bg-gray-100 transition">
                    <i class="fas fa-chevron-left"></i>
                    Bulan Sebelumnya
                </a>
                <a href="{{ url()->current() . '?month=' . $nextMonth . '&year=' . $nextYear }}" class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-gray-50 px-3 py-2 hover:bg-gray-100 transition">
                    Bulan Seterusnya
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-6">{{ $monthRange }}</p>

        @if($monthEvents->count() > 0)
            <div class="space-y-4">
                @foreach($monthEvents as $event)
                    <a href="{{ route('admin.event-report', $event->id) }}" class="flex items-center justify-between p-4 rounded-2xl border border-gray-100 bg-gray-50 transition hover:border-orange-200 hover:bg-orange-50">
                        <div class="flex items-center gap-4">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-orange-100">
                                <i class="fas fa-calendar text-orange-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $event->nama_event }}</h3>
                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-orange-500">{{ $event->tarikh_event?->format('d M Y') }}</p>
                                <p class="text-sm text-gray-600">{{ $event->lokasi }} • {{ $event->masa_event }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-5 text-right">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $event->PIC }}</p>
                                <p class="text-xs text-gray-500">PIC</p>
                            </div>
                            <i class="fas fa-arrow-right text-orange-500"></i>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-calendar-times text-gray-300 text-4xl mb-4"></i>
                <p class="text-gray-500">Tiada event pada bulan ini</p>
            </div>
        @endif
    </div>
</main>

@if(session('show_dashboard_intro'))
<div id="pixel-loader" class="fixed inset-0 z-[9999] bg-black overflow-hidden flex items-center justify-center">
    
    <div class="absolute inset-0 opacity-10 pointer-events-none" 
         style="background-image: linear-gradient(#ffaa00 1px, transparent 1px), linear-gradient(90deg, #ffaa00 1px, transparent 1px); background-size: 60px 60px;">
    </div>

    <div class="absolute inset-0 z-10 opacity-0 transition-opacity duration-1000" id="video-container">
        <video id="splash-video" class="w-full h-full object-cover scale-110 transition-transform duration-[3s] ease-out" muted playsinline>
            <source src="{{ asset('videos/splash.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div id="loader-content" class="relative z-30 text-center transition-all duration-1000">
        
        <div class="relative w-56 h-56 md:w-76 md:h-80 mx-auto mb-6 opacity-0 transform translate-y-4 transition-all duration-1000 ease-out" id="logo-container">
            <img src="{{ asset('images/icon/seslogo.png') }}"
                 class="absolute inset-0 w-full h-full object-contain filter-glow multiply-blend animate-smoke-dissolve">
        </div>

        <div class="font-mono text-orange-500 tracking-[0.5em] text-[10px] uppercase animate-glitch-text opacity-0 transition-opacity duration-700 delay-500" id="status-text">
            Initializing System...
            <div class="mt-2 w-32 h-[1px] bg-gray-800 mx-auto overflow-hidden relative">
                <div id="load-bar" class="h-full bg-orange-500 w-0 transition-all duration-[2s] ease-in-out"></div>
            </div>
        </div>
    </div>

</div>

@endif

<style>
    /* Elakkan scroll masa loading */
    body.is-loading { overflow: hidden !important; }

    /* Efek Glow & Multiply untuk Logo */
    .filter-glow { filter: drop-shadow(0 0 25px rgba(255,165,0,0.6)); }
    .multiply-blend { mix-blend-mode: multiply; }

    /* Animasi Smoke/Dissolve untuk Logo */
    @keyframes smoke-dissolve {
        0% { opacity: 0; filter: blur(15px) drop-shadow(0 0 25px rgba(255,165,0,0)); transform: scale(1.1); }
        50% { opacity: 0.8; filter: blur(5px) drop-shadow(0 0 25px rgba(255,165,0,0.6)); transform: scale(1); }
        100% { opacity: 1; filter: blur(0px) drop-shadow(0 0 25px rgba(255,165,0,0.6)); transform: scale(1); }
    }
    .animate-smoke-dissolve { animation: smoke-dissolve 2s cubic-bezier(0.19, 1, 0.22, 1) forwards; }

    /* Animasi Glitch Teks Halus */
    @keyframes glitch-text {
        0%, 100% { transform: translate(0); text-shadow: 0 0 2px rgba(255,165,0,0.5); }
        33% { transform: translate(-1px, 1px); text-shadow: -1px 0 red, 1px 0 blue; }
        66% { transform: translate(1px, -1px); text-shadow: 1px 0 red, -1px 0 blue; }
    }
    .animate-glitch-text { animation: glitch-text 2s infinite linear; }

    /* Transition smooth untuk dashboard muncul (Sama macam kod sebelum) */
    main, nav { 
        opacity: 0; 
        transform: scale(1.05);
        transition: all 1.2s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .content-ready main, .content-ready nav { opacity: 1; transform: scale(1); }
</style>

@if(session('show_dashboard_intro'))
<script>
document.addEventListener('DOMContentLoaded', () => {
    const loader = document.getElementById('pixel-loader');
    const videoContainer = document.getElementById('video-container');
    const splashVideo = document.getElementById('splash-video');
    const logoContainer = document.getElementById('logo-container');
    const statusText = document.getElementById('status-text');
    const loadBar = document.getElementById('load-bar');
    const body = document.body;

    if (!loader || !videoContainer || !splashVideo || !logoContainer || !statusText || !loadBar) {
        body.classList.add('content-ready');
        return;
    }

    body.classList.add('is-loading');

    // 1. Mula mainkan video splash (Latar Belakang)
    splashVideo.play();
    videoContainer.style.opacity = '1';
    splashVideo.style.transform = 'scale(1)'; // Slow zoom out

    // 2. Munculkan Logo (Dengan Efek Smoke) - Selepas 0.5 saat
    setTimeout(() => {
        logoContainer.style.opacity = '1';
        logoContainer.style.transform = 'translateY(0)';
    }, 500);

    // 3. Munculkan Teks Status & Jalankan Loading Bar - Selepas 1 saat
    setTimeout(() => {
        statusText.style.opacity = '1';
        loadBar.style.width = '100%';
    }, 1000);

    // 4. Reveal Dashboard - Selepas dakwat memenuhi skrin (Sync dengan video)
    setTimeout(() => {
        // Hilangkan content tengah (logo & status) dulu
        loader.querySelector('#loader-content').style.opacity = '0';
        loader.querySelector('#loader-content').style.transform = 'scale(0.9)';

        // Paparkan Dashboard sedia ada secara perlahan
        setTimeout(() => {
            body.classList.add('content-ready');
            // Fade out skrin hitam sepenuhnya
            loader.style.transition = 'opacity 1s ease-out';
            loader.style.opacity = '0';
            
            setTimeout(() => {
                loader.style.display = 'none';
                body.classList.remove('is-loading');
            }, 1000); // Masa untuk loader fade out sepenuhnya
        }, 800); // Masa 'sync' untuk logo-splash merebak besar

    }, 3500); // Beri masa untuk video splash merebak megah
});
</script>
@else
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.body.classList.add('content-ready');
});
</script>
@endif

@include('components.social-float')

@include('layouts.footer-admin')

</body>
</html>

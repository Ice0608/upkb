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

        .titleglass { font-family: "Prata", serif; word-break: break-word;} /* Brutalist */
        .titleglass-2 { font-family: "Montserrat", sans-serif; font-weight: 900;} /* Brutalist 2 */
        p { font-family: "Lexend Deca", sans-serif; font-weight: 500; } /* Sans-serif */
        h2 { font-family: "Montserrat", sans-serif; font-weight: 800; } /* Sans-serif Bold */
        a { font-family: "Lexend Deca", sans-serif; font-weight: 500; } /* Sans-serif Bold */
        h3 { font-family: "Montserrat", sans-serif; font-weight: 500; } /* Playful */

        .welcome-page {
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
            background:
                radial-gradient(circle at top left, rgba(14, 165, 233, 0.16), transparent 20%),
                radial-gradient(circle at top right, rgba(168, 85, 247, 0.16), transparent 22%),
                radial-gradient(circle at bottom right, rgba(249, 115, 22, 0.12), transparent 24%),
                linear-gradient(180deg, #eef4ff 0%, #edf2ff 48%, #f8fafc 100%);
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
                radial-gradient(circle, rgba(14, 165, 233, 0.16), rgba(14, 165, 233, 0) 64%),
                repeating-radial-gradient(circle, rgba(14, 165, 233, 0.08) 0 2px, transparent 2px 16px);
            box-shadow: 0 0 70px rgba(14, 165, 233, 0.12);
        }

        .welcome-page::after {
            right: -4rem;
            bottom: 2rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background:
                radial-gradient(circle, rgba(168, 85, 247, 0.16), rgba(168, 85, 247, 0) 66%),
                repeating-radial-gradient(circle, rgba(168, 85, 247, 0.08) 0 2px, transparent 2px 18px);
            box-shadow: 0 0 80px rgba(168, 85, 247, 0.12);
        }

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

    {{-- 🔹 IKLAN SECTION --}}
    <div class="relative w-full">
    
   {{-- 🔹 GLASS CONTENT --}}
        <div class="absolute z-30 
                    /* Mobile: Centered horizontally,*/
                    inset-x-8 top-1/2 -translate-y-1/2 px-6 
                    /* Desktop: Reset to your original left-aligned look */
                    lg:left-20 lg:top-1/2 lg:-translate-y-1/2 lg:bottom-auto lg:px-0 lg:max-w-xl">
            
            <div class="bg-white/10 backdrop-blur-2xl rounded-3xl p-6 md:p-10 shadow-2xl border border-white/20 ring-1 ring-white/10 mx-auto lg:mx-0">

                <p class=" text-[9px] md:text-[10px] tracking-[0.4em] text-white/70 mb-3 md:mb-4 uppercase italic">
                    // Program Kemahiran
                </p>

                <h2 class="titleglass text-3xl md:text-5xl lg:text-6xl text-white leading-[0.9] uppercase tracking-tight drop-shadow-2xl">
                    BINA MASA <br class="hidden md:block"> DEPAN <br>
                </h2>

                <h2 class="titleglass-2 text-3xl md:text-5xl lg:text-6xl text-orange-400 leading-[0.9] uppercase tracking-tight drop-shadow-2xl">
                    KEMAHIRAN 
                </h2>

                <h2 class="titleglass-2 text-3xl md:text-5xl lg:text-6xl text-white leading-[0.9] uppercase tracking-tight drop-shadow-2xl">
                    ANDA
                </h2>

                <p class="cubafont text-xs md:text-sm lg:text-sm text-white/80 mt-6 md:mt-8 max-w-sm leading-relaxed  tracking-wide border-l border-white/30 pl-4">
                    Terokai program TVET, Diploma dan Sains Kesihatan 
                    <br>yang direka untuk meningkatkan peluang kerjaya anda.</br>
                </p>

                <a href="{{ route('program') }}"
                   class="inline-block mt-8 md:mt-10 border border-white text-white px-8 md:px-10 py-3 md:py-4 rounded-none text-[10px] md:text-xs uppercase tracking-[0.1em] font-bold hover:bg-white hover:text-black transition-all duration-300 transform active:scale-95 w-full sm:w-auto text-center">
                    Lihat Program
                </a>

            </div>
        </div>

    <div id="slider" class="overflow-hidden relative w-full">

        <div id="slides" class="flex transition-transform duration-700">

            <!-- SLIDE 1 -->
            <div class="min-w-full relative">
                <img src="{{ asset('images/diploma.jpg') }}" class="w-full h-[90vh] object-cover">

                <!-- DARK OVERLAY -->
                <div class="absolute inset-0 bg-black/30"></div>
            </div>

            <!-- SLIDE 2 -->
            <div class="min-w-full relative">
                <img src="{{ asset('images/tvet.png') }}" class="w-full h-[90vh] object-cover">

                <div class="absolute inset-0 bg-black/30"></div>
            </div>

            <!-- SLIDE 3 -->
            <div class="min-w-full relative">
                <img src="{{ asset('images/sainsKesihatan.jpg') }}" class="w-full h-[90vh] object-cover">

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

</div>

    {{-- 🔹 STATISTICS --}}
    <section class="max-w-7xl mx-auto px-6 mt-20">
        <div class="grid md:grid-cols-4 gap-4 text-center">

            <div class="bg-orange-500 shadow-xl rounded-[2rem] p-6 text-white">
                <h2 class="text-3xl font-bold"><span class="counter" data-target="10">0</span>+</h2>
                <p class="text-sm text-orange-100">Tahun Pengalaman</p>
            </div>

            <div class="bg-slate-100 shadow-xl rounded-[2rem] p-6 text-slate-800 border border-slate-200">
                <h2 class="text-3xl font-bold text-orange-500"><span class="counter" data-target="15000">0</span>+</h2>
                <p class="text-sm text-slate-500">Graduan Berjaya</p>
            </div>

            <div class="bg-orange-100 shadow-xl rounded-[2rem] p-6 text-orange-700 border border-orange-200">
                <h2 class="text-3xl font-bold"><span class="counter" data-target="30">0</span>+</h2>
                <p class="text-sm text-orange-700">Program Kursus</p>
            </div>

            <div class="bg-slate-100 shadow-xl rounded-[2rem] p-6 text-slate-800 border border-slate-200">
                <h2 class="text-3xl font-bold text-orange-500"><span class="counter" data-target="50">0</span>+</h2>
                <p class="text-sm text-slate-500">Rakan Industri</p>
            </div>

        </div>
    </section>

    {{-- 🔹 VIDEO SECTION --}}
<section class="max-w-7xl mx-auto px-6 mt-20">
    {{-- Header Content --}}
    <div class="text-center mb-10">
        <h2 class="text-5xl mb-6 uppercase">Program Popular</h2>
        <p class="mx-auto max-w-3xl text-sm text-slate-600">Tonton sorotan program pilihan kami yang dilengkapi modul profesional, kemahiran abad ke-21 dan peluang kerjaya yang terjamin.</p>
    </div>

    {{-- Main Layout Container: 1/3 for Cards, 2/3 for Video --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-stretch">
        
        {{-- LEFT SIDE: CARDS (1/3) --}}
        <div class="flex flex-col gap-4 order-2 lg:order-1">
            <div class="flex-1 rounded-[1.75rem] border border-white/10 bg-white/80 p-6 shadow-lg backdrop-blur-sm flex flex-col justify-center">
                <p class="text-xl uppercase text-orange-500 mb-2 font-bold">Fokus Kualiti</p>
                <p class="text-sm text-slate-600">Setiap program dirangka dengan kandungan mendalam dari pakar industri.</p>
            </div>

            <div class="flex-1 rounded-[1.75rem] border border-white/10 bg-slate-900/90 p-6 shadow-lg backdrop-blur-sm text-white flex flex-col justify-center border-l-4 border-l-orange-500">
                <p class="text-xl uppercase text-orange-300 mb-2 font-bold">Mudah Dipercayai</p>
                <p class="text-sm text-slate-300">Program kami telah dipercayai oleh ribuan pelajar dan institusi.</p>
            </div>

            <div class="flex-1 rounded-[1.75rem] border border-white/10 bg-white/80 p-6 shadow-lg backdrop-blur-sm flex flex-col justify-center">
                <p class="text-xl uppercase text-orange-500 mb-2 font-bold">Nilai Tambahan</p>
                <p class="text-sm text-slate-600">Kandungan disokong oleh sokongan pelajar, panduan kerjaya dan alumni.</p>
            </div>
        </div>

        {{-- RIGHT SIDE: VIDEO (2/3) --}}
        <div class="lg:col-span-2 order-1 lg:order-2">
            <div class="relative h-full overflow-hidden rounded-[2rem] shadow-2xl border border-white/20 bg-slate-950/80">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-950/20 to-transparent pointer-events-none z-10"></div>
                
                <div class="absolute left-6 top-6 inline-flex items-center gap-2 rounded-full bg-white/10 border border-white/10 px-4 py-2 text-xs text-white backdrop-blur-sm z-20">
                    <i class="fas fa-star text-orange-400"></i>
                    <p>Koleksi Terbaik UPKB</p>
                </div>

                <video class="w-full h-full object-cover min-h-[400px]" controls autoplay playsinline>
                    <source src="{{ asset('videos/prop.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <div class="absolute inset-x-0 bottom-0 p-8 z-20">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                        <div class="text-left">
                            <p class="text-[10px] uppercase tracking-[0.3em] text-slate-400 mb-2">Berkualiti / Dipercayai / Berprestasi</p>
                            <h3 class="text-lg md:text-xl font-semibold text-white max-w-md leading-snug">
                                Pengalaman pembelajaran yang elegan dan profesional.
                            </h3>
                        </div>
                        <a href="/program" class="inline-flex items-center justify-center gap-2 rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-orange-500/20 hover:bg-orange-600 transition shrink-0">
                            Terokai
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

    {{-- 🔹 SOCIAL FLOAT --}}
    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer-pelajar')

</body>

<script>
let currentIndex = 0;
const slides = document.getElementById("slides");
const totalSlides = document.querySelectorAll("#slides > div").length;
const dots = document.querySelectorAll(".dot");
const introOverlay = document.getElementById('introOverlay');
const introVideo = document.getElementById('introVideo');
const startIntroButton = document.getElementById('startIntroButton');

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

function animateCounters() {
    const counters = document.querySelectorAll('.counter');

    counters.forEach((counter) => {
        const target = parseInt(counter.dataset.target, 10) || 0;
        const duration = 1200;
        const stepTime = Math.max(Math.floor(duration / target), 20);
        let current = 0;

        const update = () => {
            const increment = target > 0 ? Math.ceil(target / (duration / stepTime)) : 1;
            current += increment;

            if (current >= target) {
                counter.innerText = target.toLocaleString();
            } else {
                counter.innerText = current.toLocaleString();
                window.requestAnimationFrame(update);
            }
        };

        update();
    });
}

document.addEventListener('DOMContentLoaded', animateCounters);

// AUTO SLIDE
setInterval(nextSlide, 4000);

</script>

</html>
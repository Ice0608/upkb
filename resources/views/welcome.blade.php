<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-orange-50 text-gray-800">
    <div id="introOverlay" class="fixed inset-0 z-[9999] bg-black text-white flex items-center justify-center">
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
    @include('layouts.navigation')

    {{-- 🔹 IKLAN SECTION --}}
    <div class="relative w-full mt-6">

        {{-- SLIDER --}}
        <div id="slider" class="overflow-hidden rounded-2xl relative w-full">

            {{-- SLIDES --}}
            <div id="slides" class="flex transition-transform duration-700">

                {{-- SLIDE 1 --}}
                <div class="min-w-full relative">
                    <img src="{{ asset('images/diploma.jpg') }}" class="w-full h-[80vh] object-cover bg-black">
                </div>

                {{-- SLIDE 2 --}}
                <div class="min-w-full relative">
                    <img src="{{ asset('images/tvet.png') }}" class="w-full h-[80vh] object-cover bg-black">
                </div>

                {{-- SLIDE 3 --}}
                <div class="min-w-full relative">
                    <img src="{{ asset('images/sainsKesihatan.jpg') }}" class="w-full h-[80vh] object-cover bg-black">
                </div>

            </div>

            {{-- LEFT BUTTON --}}
            <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/40 text-white p-2 rounded-full">
                ❮
            </button>

            {{-- RIGHT BUTTON --}}
            <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/40 text-white p-2 rounded-full">
                ❯
            </button>

            {{-- DOTS --}}
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                <span class="dot w-3 h-3 bg-white rounded-full"></span>
                <span class="dot w-3 h-3 bg-gray-400 rounded-full"></span>
                <span class="dot w-3 h-3 bg-gray-400 rounded-full"></span>
            </div>

        </div>

    </div>

    {{-- 🔹 STATISTICS --}}
    <section class="max-w-7xl mx-auto px-6 mt-10">
        <div class="grid md:grid-cols-4 gap-4 text-center">

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-2xl font-bold text-orange-500">10+</h2>
                <p class="text-sm text-gray-500">Tahun Pengalaman</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-2xl font-bold text-orange-500">15K+</h2>
                <p class="text-sm text-gray-500">Graduan Berjaya</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-2xl font-bold text-orange-500">30+</h2>
                <p class="text-sm text-gray-500">Program Kursus</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-2xl font-bold text-orange-500">50+</h2>
                <p class="text-sm text-gray-500">Rakan Industri</p>
            </div>

        </div>
    </section>

    {{-- 🔹 VIDEO SECTION --}}
    <section class="max-w-7xl mx-auto px-6 mt-12 text-center">

        <h2 class="text-xl font-semibold mb-4">Program Popular</h2>

        {{-- VIDEO SIZE --}}
        <div class="w-full max-w-5xl mx-auto overflow-hidden rounded-3xl shadow-xl">
            <video class="w-full h-80 md:h-[520px] object-cover" controls>
                <source src="{{ asset('videos/prop.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        {{-- BUTTON --}}
        <div class="mt-6">
            <a href="/program" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">
                Lihat Program
            </a>
        </div>
    </section>

    {{-- 🔹 SOCIAL FLOAT --}}
    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

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
    if (introOverlay) {
        introOverlay.style.display = 'none';
        document.body.style.overflow = '';
        localStorage.setItem('upkbIntroSeen', '1');
    }
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

// AUTO SLIDE
setInterval(nextSlide, 4000);

</script>

</html>
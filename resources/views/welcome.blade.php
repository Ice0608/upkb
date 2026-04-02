<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    
    {{-- 🔹 NAVBAR --}}
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

            {{-- LEFT: LOGO + NAME --}}
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.jpeg') }}" alt="logo" class="w-12 h-12 object-contain">

                <div class="leading-tight">
                    <h1 class="text-sm font-semibold text-gray-800">
                        Unit Pembangunan
                    </h1>
                    <h1 class="text-sm font-semibold text-gray-800">
                        Kemahiran Belia
                    </h1>
                </div>
            </div>

            {{-- CENTER: MENU --}}
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
                <a href="" class="text-orange-500 font-semibold">Utama</a>
                <a href="" class="hover:text-orange-500">Program</a>
                <a href="#" class="hover:text-orange-500">Berkouta</a>
                <a href="#" class="hover:text-orange-500">FAQ</a>
                <a href="#" class="hover:text-orange-500">Galeri</a>
                <a href="#" class="hover:text-orange-500">Hubungi</a>
            </div>

            {{-- RIGHT: LOGIN ICON --}}
            <div>
                <a href="/login">
                    <img src="{{ asset('images/loginIcon.png') }}" 
                        alt="login" 
                        class="w-8 h-8 hover:scale-110 transition">
                </a>
            </div>

        </div>
    </nav>

    {{-- 🔹 IKLAN SECTION --}}
    <div class="relative max-w-6xl mx-auto mt-6">

        {{-- SLIDER --}}
        <div id="slider" class="overflow-hidden rounded-2xl relative">

            {{-- SLIDES --}}
            <div id="slides" class="flex transition-transform duration-700">

                {{-- SLIDE 1 --}}
                <div class="min-w-full relative">
                    <img src="{{ asset('images/diploma.jpg') }}" class="w-full h-[400px] object-contain bg-black">
                </div>

                {{-- SLIDE 2 --}}
                <div class="min-w-full relative">
                    <img src="{{ asset('images/tvet.png') }}" class="w-full h-[400px] object-contain bg-black">
                </div>

                {{-- SLIDE 3 --}}
                <div class="min-w-full relative">
                    <img src="{{ asset('images/sainsKesihatan.jpg') }}" class="w-full h-[400px] object-contain bg-black">
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
        <div class="w-full max-w-3xl mx-auto">
            <iframe 
                class="w-full h-64 md:h-96 rounded-xl"
                src="vide.mp4"
                allowfullscreen>
            </iframe>
        </div>

        {{-- BUTTON --}}
        <div class="mt-6">
            <a href="/program" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">
                Lihat Program
            </a>
        </div>
    </section>

    <div class="fixed right-4 top-1/2 -translate-y-1/2 z-50 flex flex-col items-end gap-3">

    {{-- EXPAND BUTTON --}}
    <button onclick="toggleSocial()" 
        class="w-12 h-12 flex items-center justify-center rounded-full bg-grey-600 text-white shadow-lg hover:scale-110 transition">
        🔗
    </button>

    {{-- SOCIAL LIST --}}   
    <div id="socialMenu" 
     class="flex flex-col gap-3 max-h-0 overflow-hidden transition-all duration-500">

        <a href="https://facebook.com" target="_blank"
           class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-600 text-white shadow-lg hover:scale-110 transition">
            <i class="fab fa-facebook-f"></i>
        </a>

        <a href="https://instagram.com" target="_blank"
           class="w-12 h-12 flex items-center justify-center rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 text-white shadow-lg hover:scale-110 transition">
            <i class="fab fa-instagram"></i>
        </a>

        <a href="https://tiktok.com" target="_blank"
           class="w-12 h-12 flex items-center justify-center rounded-full bg-black text-white shadow-lg hover:scale-110 transition">
            <i class="fab fa-tiktok"></i>
        </a>

        <a href="https://youtube.com" target="_blank"
           class="w-12 h-12 flex items-center justify-center rounded-full bg-red-600 text-white shadow-lg hover:scale-110 transition">
            <i class="fab fa-youtube"></i>
        </a>

    </div>

    {{-- PHONE --}}
    <a href="tel:+60179215543"
       class="w-12 h-12 flex items-center justify-center rounded-full bg-grey-700 text-white shadow-lg hover:scale-110 transition">
        📞
    </a>

    {{-- SUPPORT --}}
    <button onclick="openSupport()" 
    class="w-12 h-12 flex items-center justify-center rounded-full bg-grey-500 text-white shadow-lg hover:scale-110 transition">
    🎧
    </button>
</div>
</div>

    

    {{-- 🔹 FOOTER --}}
    <footer class="bg-gray-900 text-gray-300 mt-16">

    <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-10">

        {{-- LEFT --}}
        <div>
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ asset('images/logo.jpeg') }}" class="h-12">
                <div>
                    <h2 class="text-lg font-bold text-white">UPKB</h2>
                    <p class="text-sm text-gray-400">Pusat maklumat program & pengambilan</p>
                </div>
            </div>

            <p class="text-sm text-gray-400 leading-relaxed">
                Bantu pelajar dan ibu bapa melihat pilihan pusat, program, kuota semasa dan maklumat penting dengan lebih jelas dalam satu tempat.
            </p>
        </div>

        {{-- MIDDLE --}}
        <div>
            <h3 class="font-semibold text-white mb-4">Pautan Pantas</h3>

            <div class="grid grid-cols-2 gap-2 text-sm">
                <a href="/" class="hover:text-orange-400">Utama</a>
                <a href="/program" class="hover:text-orange-400">Program</a>
                <a href="/program-berkuota" class="hover:text-orange-400">Program Berkuota</a>
                <a href="/faq" class="hover:text-orange-400">Soalan Lazim</a>
                <a href="/galeri" class="hover:text-orange-400">Galeri</a>
                <a href="/hubungi" class="hover:text-orange-400">Hubungi Kami</a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div>
            <h3 class="font-semibold text-white mb-4">Hubungi Kami</h3>

            <ul class="space-y-3 text-sm text-gray-400">
                <li>📞 +6017 921 5543</li>
                <li>✉️ info@upkb.my</li>
                <li>📍 34 Jalan MPK 4 Taman Bukit Kepayang, Seremban</li>
            </ul>
        </div>

    </div>

    <div class="border-t border-gray-700"></div>

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center text-sm">
        <p class="text-gray-400">
            © {{ date('Y') }} Unit Pembangunan Kemahiran Belia.
        </p>
    </div>

</footer>

</body>

<script>
let currentIndex = 0;
const slides = document.getElementById("slides");
const totalSlides = document.querySelectorAll("#slides > div").length;
const dots = document.querySelectorAll(".dot");

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

// AUTO SLIDE
setInterval(nextSlide, 4000);

//funtion untuk toggle social media menu
function toggleSocial() {
    const menu = document.getElementById("socialMenu");

    if (menu.classList.contains("max-h-0")) {
        menu.classList.remove("max-h-0");
        menu.classList.add("max-h-96");
    } else {
        menu.classList.remove("max-h-96");
        menu.classList.add("max-h-0");
    }
}

</script>

</html>
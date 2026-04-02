<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Program</title>
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
                    <h1 class="text-sm font-semibold text-gray-800">Unit Pembangunan</h1>
                    <h1 class="text-sm font-semibold text-gray-800">Kemahiran Belia</h1>
                </div>
            </div>

            {{-- CENTER: MENU --}}
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
                <a href="{{ url('/') }}" class="hover:text-orange-500">Utama</a>
                <a href="{{ route('program') }}" class="text-orange-500 font-semibold">Program</a>
                <a href="{{ route('kuota') }}" class="hover:text-orange-500">Berkouta</a>
                <a href="{{ route('faq') }}" class="hover:text-orange-500">FAQ</a>
                <a href="{{ route('galeri') }}" class="hover:text-orange-500">Galeri</a>
                <a href="{{ route('hubungi') }}" class="hover:text-orange-500">Hubungi</a>
            </div>

            {{-- RIGHT: LOGIN ICON --}}
            <div>
                <a href="/login">
                    <img src="{{ asset('images/loginIcon.png') }}" alt="login" class="w-8 h-8 hover:scale-110 transition">
                </a>
            </div>

        </div>
    </nav>

    {{-- 🔹 HERO / KANDUNGAN PROGRAM --}}
    <section class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Program Kami</h1>
        <p class="text-gray-600 mb-8">Lihat senarai program terkini yang ditawarkan oleh UPKB. Klik program untuk maklumat lanjut dan pendaftaran.</p>

        <div class="grid md:grid-cols-3 gap-6">
            <article class="bg-white border rounded-xl p-6 shadow-sm">
                <h2 class="text-xl font-semibold text-orange-500 mb-2">Program 1</h2>
                <p class="text-gray-600">Penerangan ringkas tentang program pertama.</p>
            </article>
            <article class="bg-white border rounded-xl p-6 shadow-sm">
                <h2 class="text-xl font-semibold text-orange-500 mb-2">Program 2</h2>
                <p class="text-gray-600">Penerangan ringkas tentang program kedua.</p>
            </article>
            <article class="bg-white border rounded-xl p-6 shadow-sm">
                <h2 class="text-xl font-semibold text-orange-500 mb-2">Program 3</h2>
                <p class="text-gray-600">Penerangan ringkas tentang program ketiga.</p>
            </article>
        </div>
    </section>

    {{-- 🔹 FOOTER --}}
    <footer class="bg-gray-900 text-gray-300 mt-16">
        <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/logo.jpeg') }}" class="h-12" alt="logo">
                    <div>
                        <h2 class="text-lg font-bold text-white">UPKB</h2>
                        <p class="text-sm text-gray-400">Pusat maklumat program & pengambilan</p>
                    </div>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">Bantu pelajar dan ibu bapa melihat pilihan pusat, program, kuota semasa dan maklumat penting dengan lebih jelas dalam satu tempat.</p>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-4">Pautan Pantas</h3>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <a href="{{ url('/') }}" class="hover:text-orange-400">Utama</a>
                    <a href="{{ route('program') }}" class="hover:text-orange-400">Program</a>
                    <a href="{{ route('kuota') }}" class="hover:text-orange-400">Program Berkuota</a>
                    <a href="{{ route('faq') }}" class="hover:text-orange-400">Soalan Lazim</a>
                    <a href="{{ route('galeri') }}" class="hover:text-orange-400">Galeri</a>
                    <a href="{{ route('hubungi') }}" class="hover:text-orange-400">Hubungi Kami</a>
                </div>
            </div>
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
            <p class="text-gray-400">© {{ date('Y') }} Unit Pembangunan Kemahiran Belia.</p>
        </div>
    </footer>

</body>
</html>

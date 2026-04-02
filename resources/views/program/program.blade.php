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
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium navbar menu">
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

        <div class="grid md:grid-cols-3 gap-6">
            <article class="rounded-3xl bg-white shadow-lg p-8 border border-gray-100 hover:shadow-xl transition">
                <div class="h-16 w-16 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center mb-5"><i class="fas fa-tools fa-lg"></i></div>
                <h2 class="text-2xl font-extrabold text-slate-900 mb-2">TVET</h2>
                <p class="text-gray-500 mb-6">Pendidikan Teknikal dan Latihan Vokasional untuk kerjaya berasaskan kemahiran industri.</p>
                <a href="{{ route('program') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold">LIHAT PROGRAM <span>→</span></a>
            </article>

            <article class="rounded-3xl bg-white shadow-lg p-8 border border-gray-100 hover:shadow-xl transition">
                <div class="h-16 w-16 rounded-xl bg-violet-100 text-violet-600 flex items-center justify-center mb-5"><i class="fas fa-graduation-cap fa-lg"></i></div>
                <h2 class="text-2xl font-extrabold text-slate-900 mb-2">Diploma</h2>
                <p class="text-gray-500 mb-6">Program Akademik dan Profesional untuk laluan ke peringkat ijazah dan kerjaya profesional.</p>
                <a href="{{ route('program') }}" class="inline-flex items-center gap-2 text-violet-600 font-bold">LIHAT PROGRAM <span>→</span></a>
            </article>

            <article class="rounded-3xl bg-white shadow-lg p-8 border border-gray-100 hover:shadow-xl transition">
                <div class="h-16 w-16 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center mb-5"><i class="fas fa-heartbeat fa-lg"></i></div>
                <h2 class="text-2xl font-extrabold text-slate-900 mb-2">Sains Kesihatan</h2>
                <p class="text-gray-500 mb-6">Program Sains Kesihatan untuk pembangunan kompetensi klinikal dan penyelidikan dalam bidang kesihatan.</p>
                <a href="{{ route('program') }}" class="inline-flex items-center gap-2 text-emerald-600 font-bold">LIHAT PROGRAM <span>→</span></a>
            </article>
        </div>
    </section>

    @include('components.social-float')

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

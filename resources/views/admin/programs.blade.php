<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Admin Programs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    {{-- 🔹 HERO / KANDUNGAN PROGRAM --}}
    <section class="max-w-7xl mx-auto px-6 py-10">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">Admin Programs</h1>
                    <p class="mt-3 text-lg text-orange-100">Manage all programs here.</p>
                </div>
                <a href="{{ route('admin.addprogram') }}" class="w-14 h-14 rounded-full bg-white text-orange-600 shadow-md hover:shadow-lg transition flex items-center justify-center">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($programs as $program)
            <article class="rounded-3xl bg-white shadow-lg p-8 border border-gray-100 hover:shadow-xl transition">
                <div class="h-16 w-16 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center mb-5"><i class="{{ $program->icon }} fa-lg"></i></div>
                <h2 class="text-2xl font-extrabold text-slate-900 mb-2">{{ $program->jenis_program }}</h2>
                <p class="text-gray-500 mb-6">{{ $program->info_program }}</p>
                <div class="flex gap-2">
                    <a href="{{ route('admin.editprogram', $program->id) }}" class="inline-flex items-center gap-2 text-blue-600 font-bold">EDIT <span>→</span></a>
                    <form action="{{ route('admin.deleteprogram', $program->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this program?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 font-bold hover:text-red-800">DELETE</button>
                    </form>
                </div>
            </article>
            @endforeach
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
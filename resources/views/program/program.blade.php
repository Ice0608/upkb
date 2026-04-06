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

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

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
            @forelse($programs as $program)
            <article class="rounded-3xl bg-white shadow-lg p-8 border border-gray-100 hover:shadow-xl transition">
                <div class="h-16 w-16 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center mb-5"><i class="{{ $program->icon }} fa-lg"></i></div>
                <h2 class="text-2xl font-extrabold text-slate-900 mb-2">{{ $program->jenis_program }}</h2>
                <p class="text-gray-500 mb-6">{{ $program->info_program }}</p>
                <a href="{{ route('institusi', ['jenis' => $program->jenis_program]) }}" class="inline-flex items-center gap-2 text-blue-600 font-bold">LIHAT PROGRAM <span>→</span></a>
            </article>
            @empty
            <div class="col-span-3 bg-white rounded-2xl p-8 text-center text-gray-500">
                Tiada program ditemui.
            </div>
            @endforelse
        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

</body>
</html>

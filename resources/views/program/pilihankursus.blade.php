<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - {{ $namaKursus }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .course-variation-card {
            transition: all 0.3s ease;
        }
        .course-variation-card:hover {
            transform: translateY(-4px);
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="max-w-7xl mx-auto px-6 py-10">
        <!-- HEADER -->
        <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <a href="{{ route('kursus.index') }}" class="text-orange-100 hover:text-white transition">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">{{ $namaKursus }}</h1>
                    <p class="mt-3 text-lg text-orange-100">Pilih institusi yang menawarkan kursus ini.</p>
                </div>
                <button class="w-14 h-14 rounded-full bg-white text-orange-600 shadow-md hover:shadow-lg transition">
                    <i class="fas fa-graduation-cap"></i>
                </button>
            </div>
        </div>

        <!-- COURSE VARIATIONS GRID -->
        <div>
            <h2 class="text-2xl font-bold text-slate-900 mb-6">Institusi yang Menawarkan Kursus Ini</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($semuaKursus as $kursus)
                <div class="course-variation-card rounded-3xl bg-white shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl">
                    <!-- Institution Image -->
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset($kursus->institusi->gambar_institusi ?? 'images/default-college.jpg') }}" 
                             alt="{{ $kursus->institusi->nama_institusi ?? 'Institusi' }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-x-0 top-4 px-4 flex items-start justify-between gap-3">
                            <span class="inline-flex items-center rounded-full bg-orange-600/95 px-3 py-1 text-xs font-semibold uppercase text-white shadow-sm">
                                {{ $kursus->institusi->jenis_institusi ?? 'Institusi' }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Institution Name -->
                        <h3 class="text-xl font-bold text-slate-900 mb-2">
                            {{ $kursus->institusi->nama_institusi ?? 'N/A' }}
                        </h3>

                        <!-- Course Details -->
                        <div class="space-y-3 mb-6 text-sm">
                            <!-- Course Code -->
                            <div class="flex items-start gap-3 p-3 rounded-2xl bg-gray-50">
                                <i class="fas fa-barcode text-orange-500 mt-0.5"></i>
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase">Kod Kursus</p>
                                    <p class="text-gray-800 font-semibold">{{ $kursus->kod_kursus }}</p>
                                </div>
                            </div>

                            <!-- Course Type -->
                            <div class="flex items-start gap-3 p-3 rounded-2xl bg-gray-50">
                                <i class="fas fa-book text-orange-500 mt-0.5"></i>
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase">Jenis Kursus</p>
                                    <p class="text-gray-800 font-semibold">{{ $kursus->jenis_kursus }}</p>
                                </div>
                            </div>

                            <!-- Duration -->
                            @if($kursus->tempoh)
                            <div class="flex items-start gap-3 p-3 rounded-2xl bg-gray-50">
                                <i class="fas fa-hourglass-half text-orange-500 mt-0.5"></i>
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase">Tempoh</p>
                                    <p class="text-gray-800 font-semibold">{{ $kursus->tempoh }}</p>
                                </div>
                            </div>
                            @endif

                            <!-- Quota -->
                            <div class="flex items-start gap-3 p-3 rounded-2xl bg-gray-50">
                                <i class="fas fa-users text-orange-500 mt-0.5"></i>
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase">Kuota</p>
                                    <p class="text-gray-800 font-semibold">
                                        @if($kursus->kuota && $kursus->kuota > 0)
                                            {{ $kursus->kuota }} {{ $kursus->kuota == 1 ? 'tempat' : 'tempat' }}
                                        @else
                                            <span class="text-red-600">Tiada Kuota</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Registration Date -->
                            @if($kursus->tarikh_pendaftaran)
                            <div class="flex items-start gap-3 p-3 rounded-2xl bg-gray-50">
                                <i class="fas fa-calendar text-orange-500 mt-0.5"></i>
                                <div>
                                    <p class="text-xs text-gray-600 font-semibold uppercase">Tarikh Daftar</p>
                                    <p class="text-gray-800 font-semibold">{{ $kursus->tarikh_pendaftaran->format('d M Y') }}</p>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Action Button -->
                        <a href="{{ route('kursus.show', $kursus->id) }}" 
                           class="inline-flex items-center justify-between w-full rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:bg-orange-600 transition">
                            <span>Lihat Detail</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 bg-white rounded-3xl p-10 text-center text-gray-500 shadow-sm border border-gray-100">
                    <i class="fas fa-inbox text-4xl mb-4 opacity-50"></i>
                    <p>Tiada institusi ditemui untuk kursus ini.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

</body>
</html>

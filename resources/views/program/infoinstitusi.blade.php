<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Info Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="max-w-6xl mx-auto px-6 py-10">
        <!-- Header Institusi -->
        <div class="rounded-3xl bg-white shadow-lg overflow-hidden border border-gray-100 mb-10">
            <div class="relative h-80 overflow-hidden">
                <img src="{{ asset($institusi->gambar_institusi) }}" alt="{{ $institusi->nama_institusi }}" class="w-full h-full object-cover">
            </div>
            <div class="p-8">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold uppercase tracking-wide mb-4">{{ $institusi->jenis_institusi }}</span>
                <h1 class="text-4xl font-bold text-slate-900 mb-2">{{ $institusi->nama_institusi }}</h1>
                <p class="text-gray-600 mb-6"><i class="fas fa-map-marker-alt mr-2"></i>{{ $institusi->alamat }}</p>
                
                <!-- Mengenai Institusi -->
                <div class="bg-orange-50 border-l-4 border-orange-500 p-6 rounded mb-6">
                    <h2 class="flex items-center gap-2 text-lg font-semibold text-gray-800 mb-3">
                        <i class="fas fa-info-circle text-orange-500"></i>Mengenai Institusi
                    </h2>
                    <p class="text-gray-700 leading-relaxed">{{ $institusi->mengenai_institusi }}</p>
                </div>

                <a href="{{ route('institusi') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-800">
                    <i class="fas fa-arrow-left"></i>Kembali ke Senarai Institusi
                </a>
            </div>
        </div>

        <!-- Senarai Kursus Ditawarkan -->
        <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100 mb-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                    <i class="fas fa-graduation-cap text-orange-500"></i>Senarai kursus Ditawarkan
                    <span class="text-sm bg-orange-100 text-orange-700 px-3 py-1 rounded-full font-semibold">{{ count($kursusList) }} kursus</span>
                </h2>
            </div>
            
            @if(count($kursusList) > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-100 border-b border-gray-300">
                        <tr>
                            <th class="px-4 py-3 font-semibold text-gray-700">Nama kursus</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Kod</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Mod Pengajian</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Tempoh</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Kuota</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kursusList as $kursus)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-800 font-medium">{{ $kursus->nama_kursus }}</td>
                            <td class="px-4 py-3 text-gray-600"><span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">{{ $kursus->kod_kursus }}</span></td>
                            <td class="px-4 py-3 text-gray-600">{{ $kursus->mod_pengajian }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $kursus->tempoh }}</td>
                            <td class="px-4 py-3 text-gray-600 font-semibold text-orange-600">{{ $kursus->kuota }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('kursus.show', $kursus->id) }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold">Lihat detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="bg-gray-50 rounded-2xl p-8 text-center text-gray-500">
                <i class="fas fa-inbox text-3xl mb-3 text-gray-300"></i>
                <p>Tiada kursus ditawarkan pada institusi ini.</p>
            </div>
            @endif
        </div>

        <!-- Galeri Fasiliti -->
        <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
            <h2 class="flex items-center gap-3 text-2xl font-bold text-gray-800 mb-6">
                <i class="fas fa-images text-orange-500"></i>Galeri Fasiliti
            </h2>
            
            @if(count($galeriList) > 0)
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($galeriList as $foto)
                <div class="rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition border border-gray-200">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset($foto->imej) }}" alt="Fasiliti" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <p class="text-gray-600 text-sm">{{ $foto->penerangan ?? 'Fasiliti institusi' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="bg-gray-50 rounded-2xl p-12 text-center text-gray-500">
                <i class="fas fa-image text-4xl mb-4 text-gray-300"></i>
                <p>Tiada gambar fasiliti diaparkan.</p>
            </div>
            @endif
        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

</body>
</html>

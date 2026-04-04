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
                    <i class="fas fa-graduation-cap text-orange-500"></i>Senarai Khusus Ditawarkan
                    <span class="text-sm bg-orange-100 text-orange-700 px-3 py-1 rounded-full font-semibold">{{ count($khususList) }} Khusus</span>
                </h2>
            </div>
            
            @if(count($khususList) > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-100 border-b border-gray-300">
                        <tr>
                            <th class="px-4 py-3 font-semibold text-gray-700">Nama Khusus</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Kod</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Mod Pengajian</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Tempoh</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Kuota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($khususList as $khusus)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-800 font-medium">{{ $khusus->nama_khusus }}</td>
                            <td class="px-4 py-3 text-gray-600"><span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">{{ $khusus->kod_khusus }}</span></td>
                            <td class="px-4 py-3 text-gray-600">{{ $khusus->mod_pengajian }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $khusus->tempoh }}</td>
                            <td class="px-4 py-3 text-gray-600 font-semibold text-orange-600">{{ $khusus->kuota }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="bg-gray-50 rounded-2xl p-8 text-center text-gray-500">
                <i class="fas fa-inbox text-3xl mb-3 text-gray-300"></i>
                <p>Tiada khusus ditawarkan pada institusi ini.</p>
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
                    <a href="{{ route('institusi') }}" class="hover:text-orange-400">Institusi</a>
                    <a href="{{ route('faq') }}" class="hover:text-orange-400">FAQ</a>
                    <a href="{{ route('galeri') }}" class="hover:text-orange-400">Galeri</a>
                    <a href="{{ route('hubungi') }}" class="hover:text-orange-400">Hubungi</a>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Info Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .institusi-info-page--tvet {
            --institusi-info-50: #fffbea;
            --institusi-info-100: #fef3c7;
            --institusi-info-500: #d4af37;
            --institusi-info-600: #b88912;
            --institusi-info-700: #8a6a08;
            background:
                radial-gradient(circle at 10% 12%, rgba(241, 207, 99, 0.14), transparent 24%),
                linear-gradient(180deg, #fffaf5 0%, #f8fafc 46%, #f6f8fc 100%);
        }

            .institusi-info-page--diploma {
                --institusi-info-50: #f7efff;
                --institusi-info-100: #ede0ff;
                --institusi-info-500: #8d2be2;
                --institusi-info-600: #7a1fd1;
                --institusi-info-700: #6216aa;
                background:
                radial-gradient(circle at 10% 12%, rgba(192, 132, 252, 0.14), transparent 24%),
                linear-gradient(180deg, #fcf8ff 0%, #f8fafc 46%, #f6f8fc 100%);
            }

        .institusi-info-page--sains-kesihatan {
            --institusi-info-50: #edf7ff;
            --institusi-info-100: #dbeafe;
            --institusi-info-500: #2196f3;
            --institusi-info-600: #1d4ed8;
            --institusi-info-700: #1e40af;
            background:
                radial-gradient(circle at 10% 12%, rgba(96, 165, 250, 0.14), transparent 24%),
                linear-gradient(180deg, #f5fbff 0%, #f8fafc 46%, #f6f8fc 100%);
        }

        .institusi-info-badge-tvet {
            background: var(--institusi-info-100);
            color: var(--institusi-info-600);
        }

        .institusi-info-highlight-tvet {
            background: rgba(255, 251, 235, 0.92);
            border-left: 4px solid var(--institusi-info-500);
        }

        .institusi-info-link-tvet {
            color: var(--institusi-info-600);
        }

        .institusi-info-link-tvet:hover {
            color: var(--institusi-info-700);
        }

        .institusi-info-count-tvet,
        .institusi-info-code-tvet {
            background: var(--institusi-info-100);
            color: var(--institusi-info-700);
        }

        .institusi-info-kuota-tvet,
        .institusi-info-accent-tvet {
            color: var(--institusi-info-500);
        }
    </style>
</head>
@php
    $institusiInfoType = strtolower((string) $institusi->jenis_institusi);
@endphp
<body class="{{ $institusiInfoType === 'tvet' ? 'institusi-info-page--tvet' : '' }} {{ $institusiInfoType === 'diploma' ? 'institusi-info-page--diploma' : '' }} {{ $institusiInfoType === 'sains kesihatan' ? 'institusi-info-page--sains-kesihatan' : '' }} {{ ! in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'bg-gray-100' : '' }} text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="max-w-6xl mx-auto px-6 py-10">
        <!-- Header Institusi -->
        <div class="rounded-3xl bg-white shadow-lg overflow-hidden border border-gray-100 mb-10">
            <div class="relative h-80 overflow-hidden">
                <img src="{{ asset($institusi->gambar_institusi) }}" alt="{{ $institusi->nama_institusi }}" class="w-full h-full object-cover">
            </div>
            <div class="p-8">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide mb-4 {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-badge-tvet' : 'bg-blue-100 text-blue-700' }}">{{ $institusi->jenis_institusi }}</span>
                <h1 class="text-4xl font-bold text-slate-900 mb-2">{{ $institusi->nama_institusi }}</h1>
                <p class="text-gray-600 mb-6"><i class="fas fa-map-marker-alt mr-2"></i>{{ $institusi->alamat }}</p>
                
                <!-- Mengenai Institusi -->
                <div class="p-6 rounded mb-6 {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-highlight-tvet' : 'bg-orange-50 border-l-4 border-orange-500' }}">
                    <h2 class="flex items-center gap-2 text-lg font-semibold text-gray-800 mb-3">
                        <i class="fas fa-info-circle {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-accent-tvet' : 'text-orange-500' }}"></i>Mengenai Institusi
                    </h2>
                    <p class="text-gray-700 leading-relaxed">{{ $institusi->mengenai_institusi }}</p>
                </div>

                <a href="{{ route('institusi') }}" class="inline-flex items-center gap-2 font-bold {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-link-tvet' : 'text-blue-600 hover:text-blue-800' }}">
                    <i class="fas fa-arrow-left"></i>Kembali ke Senarai Institusi
                </a>
            </div>
        </div>

        <!-- Senarai Kursus Ditawarkan -->
        <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100 mb-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                    <i class="fas fa-graduation-cap {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-accent-tvet' : 'text-orange-500' }}"></i>Senarai kursus Ditawarkan
                    <span class="text-sm px-3 py-1 rounded-full font-semibold {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-count-tvet' : 'bg-orange-100 text-orange-700' }}">{{ count($kursusList) }} kursus</span>
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
                            <td class="px-4 py-3 text-gray-600"><span class="px-2 py-1 rounded text-xs font-semibold {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-code-tvet' : 'bg-blue-100 text-blue-700' }}">{{ $kursus->kod_kursus }}</span></td>
                            <td class="px-4 py-3 text-gray-600">{{ $kursus->mod_pengajian }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $kursus->tempoh }}</td>
                            <td class="px-4 py-3 text-gray-600 font-semibold {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-kuota-tvet' : 'text-orange-600' }}">{{ $kursus->kuota }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('kursus.show', $kursus->id) }}" class="inline-flex items-center gap-2 font-semibold {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-link-tvet' : 'text-blue-600 hover:text-blue-800' }}">Lihat detail</a>
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
                <i class="fas fa-images {{ in_array($institusiInfoType, ['tvet', 'diploma'], true) ? 'institusi-info-accent-tvet' : 'text-orange-500' }}"></i>Galeri Fasiliti
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

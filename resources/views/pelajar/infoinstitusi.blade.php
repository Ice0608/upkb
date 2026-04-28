<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Info Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    <style>
        .institusi-info-page--tvet {
            --institusi-info-50: #fff2ec;
            --institusi-info-100: #ffe0cc;
            --institusi-info-500: #FF5100;
            --institusi-info-600: #CC4100;
            --institusi-info-700: #993100;
            background:
                url('/images/TVET-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(255, 81, 0, 0.18), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15, 23, 42, 0.18) 0%, rgba(30, 41, 59, 0.2) 44%, rgba(15, 23, 42, 0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .institusi-info-page--diploma {
            --institusi-info-50: #f7efff;
            --institusi-info-100: #ede0ff;
            --institusi-info-500: #8d2be2;
            --institusi-info-600: #7a1fd1;
            --institusi-info-700: #6216aa;
            background:
                url('/images/DIP-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(192, 132, 252, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(99, 102, 241, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15, 23, 42, 0.18) 0%, rgba(30, 41, 59, 0.2) 44%, rgba(15, 23, 42, 0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .institusi-info-page--sains-kesihatan {
            --institusi-info-50: #edf7ff;
            --institusi-info-100: #dbeafe;
            --institusi-info-500: #2196f3;
            --institusi-info-600: #1d4ed8;
            --institusi-info-700: #1e40af;
            background:
                url('/images/SK-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(96, 165, 250, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(33, 150, 243, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15, 23, 42, 0.18) 0%, rgba(30, 41, 59, 0.2) 44%, rgba(15, 23, 42, 0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .institusi-info-badge {
            background: var(--institusi-info-100);
            color: var(--institusi-info-600);
        }

        .institusi-info-highlight {
            background: rgba(255, 251, 235, 0.92);
            border-left: 4px solid var(--institusi-info-500);
        }

        .institusi-info-link {
            color: var(--institusi-info-600);
        }

        .institusi-info-link:hover {
            color: var(--institusi-info-700);
        }

        .institusi-info-count,
        .institusi-info-code {
            background: var(--institusi-info-100);
            color: var(--institusi-info-700);
        }

        .institusi-info-accent,
        .institusi-info-kuota {
            color: var(--institusi-info-500);
        }

        .institusi-about-panel {
            border-radius: 0.5rem;
        }

        .institusi-about-title {
            color: #1f2937;
        }

        .institusi-about-copy {
            color: #374151;
        }

        html.dark .institusi-info-page--tvet {
            background:
                url('/images/TVET-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56, 189, 248, 0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.05), transparent 24%),
                linear-gradient(180deg, rgba(15, 23, 42, 0.72) 0%, rgba(30, 41, 59, 0.72) 44%, rgba(15, 23, 42, 0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .institusi-info-page--diploma {
            background:
                url('/images/DIP-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56, 189, 248, 0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.05), transparent 24%),
                linear-gradient(180deg, rgba(15, 23, 42, 0.72) 0%, rgba(30, 41, 59, 0.72) 44%, rgba(15, 23, 42, 0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .institusi-info-page--sains-kesihatan {
            background:
                url('/images/SK-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56, 189, 248, 0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.05), transparent 24%),
                linear-gradient(180deg, rgba(15, 23, 42, 0.72) 0%, rgba(30, 41, 59, 0.72) 44%, rgba(15, 23, 42, 0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .institusi-info-card {
            background: linear-gradient(180deg, rgba(30, 41, 59, 0.98), rgba(15, 23, 42, 0.98));
            border-color: rgba(51, 65, 85, 0.92);
            box-shadow: 0 22px 48px rgba(0, 0, 0, 0.3);
        }

        html.dark .institusi-info-table-head {
            background: rgba(30, 41, 59, 0.92);
            border-color: rgba(71, 85, 105, 0.6);
        }

        html.dark .institusi-info-table-row {
            border-color: rgba(71, 85, 105, 0.4);
        }

        html.dark .institusi-info-table-row:hover {
            background: rgba(30, 41, 59, 0.46);
        }

        html.dark .text-slate-900,
        html.dark .text-gray-800 {
            color: #f1f5f9 !important;
        }

        html.dark .text-gray-700,
        html.dark .text-gray-600,
        html.dark .text-gray-500 {
            color: #cbd5e1 !important;
        }

        html.dark .bg-gray-50 {
            background-color: rgba(30, 41, 59, 0.82) !important;
            border-color: rgba(71, 85, 105, 0.5) !important;
        }

        html.dark .institusi-about-panel {
            background: rgba(15, 23, 42, 0.76) !important;
            border-left-color: var(--institusi-info-500) !important;
            border: 1px solid rgba(71, 85, 105, 0.62);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.03);
        }

        html.dark .institusi-about-title {
            color: #f8fafc !important;
        }

        html.dark .institusi-about-copy {
            color: #e2e8f0 !important;
        }
    </style>
</head>
@php
    $institusiInfoType = strtolower(trim((string) $institusi->jenis_institusi));
@endphp
<body class="no-bg {{ $institusiInfoType === 'tvet' ? 'institusi-info-page--tvet' : '' }} {{ $institusiInfoType === 'diploma' ? 'institusi-info-page--diploma' : '' }} {{ $institusiInfoType === 'sains kesihatan' ? 'institusi-info-page--sains-kesihatan' : '' }} {{ !in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'bg-gray-100' : '' }} text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navpelajar')

    <section class="max-w-6xl mx-auto px-6 py-10">
        <!-- Header Institusi -->
        <div class="institusi-info-card rounded-3xl bg-white shadow-lg overflow-hidden border border-gray-100 mb-10">
            <div class="relative h-80 overflow-hidden">
                <img src="{{ asset($institusi->gambar_institusi) }}" alt="{{ $institusi->nama_institusi }}" class="w-full h-full object-cover">
            </div>
            <div class="p-8">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide mb-4 {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-badge' : 'bg-blue-100 text-blue-700' }}">{{ $institusi->jenis_institusi }}</span>
                <h1 class="text-4xl font-bold text-slate-900 mb-2">{{ $institusi->nama_institusi }}</h1>
                <p class="text-gray-600 mb-6"><i class="fas fa-map-marker-alt mr-2"></i>{{ $institusi->alamat }}</p>
                
                <!-- Mengenai Institusi -->
                <div class="institusi-about-panel p-6 rounded mb-6 {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-highlight' : 'bg-orange-50 border-l-4 border-orange-500' }}">
                    <h2 class="institusi-about-title flex items-center gap-2 text-lg font-semibold text-gray-800 mb-3">
                        <i class="fas fa-info-circle {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-accent' : 'text-orange-500' }}"></i>Mengenai Institusi
                    </h2>
                    <p class="institusi-about-copy text-gray-700 leading-relaxed">{{ $institusi->mengenai_institusi }}</p>
                </div>

                <a href="{{ route('pelajar.institusi', ['pelajar' => $pelajar->id, 'jenis' => $institusi->jenis_institusi]) }}" class="inline-flex items-center gap-2 font-bold {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-link' : 'text-blue-600 hover:text-blue-800' }}">
                    <i class="fas fa-arrow-left"></i>Kembali
                </a>
            </div>
        </div>

        <!-- Senarai Kursus Ditawarkan -->
        <div class="institusi-info-card bg-white rounded-3xl shadow-lg p-8 border border-gray-100 mb-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                    <i class="fas fa-graduation-cap {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-accent' : 'text-orange-500' }}"></i>Senarai kursus Ditawarkan
                    <span class="text-sm px-3 py-1 rounded-full font-semibold {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-count' : 'bg-orange-100 text-orange-700' }}">{{ count($kursusList) }} kursus</span>
                </h2>
            </div>
            
            @if(count($kursusList) > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="institusi-info-table-head bg-gray-100 border-b border-gray-300">
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
                        <tr class="institusi-info-table-row border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-800 font-medium">{{ $kursus->nama_kursus }}</td>
                            <td class="px-4 py-3 text-gray-600"><span class="px-2 py-1 rounded text-xs font-semibold {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-code' : 'bg-blue-100 text-blue-700' }}">{{ $kursus->kod_kursus }}</span></td>
                            <td class="px-4 py-3 text-gray-600">{{ $kursus->mod_pengajian }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $kursus->tempoh }}</td>
                            <td class="px-4 py-3 text-gray-600 font-semibold {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-kuota' : 'text-orange-600' }}">{{ $kursus->kuota }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('pelajar.infokursus', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}" class="inline-flex items-center gap-2 font-semibold {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-link' : 'text-blue-600 hover:text-blue-800' }}">Lihat detail</a>
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
        <div class="institusi-info-card bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
            <h2 class="flex items-center gap-3 text-2xl font-bold text-gray-800 mb-6">
                <i class="fas fa-images {{ in_array($institusiInfoType, ['tvet', 'diploma', 'sains kesihatan'], true) ? 'institusi-info-accent' : 'text-orange-500' }}"></i>Galeri Fasiliti
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
    @include('layouts.footer-pelajar')

</body>
</html>

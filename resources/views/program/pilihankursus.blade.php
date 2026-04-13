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

        .pilihan-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background: linear-gradient(90deg, #ff7300 0%, #ffd43b 100%);
            box-shadow:
                0 24px 70px rgba(15, 23, 42, 0.14),
                0 0 68px rgba(255, 166, 0, 0.3),
                0 0 130px rgba(255, 212, 59, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .pilihan-hero::before,
        .pilihan-hero::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .pilihan-hero::before {
            top: -3rem;
            right: 8%;
            width: 11rem;
            height: 11rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.16), rgba(255, 255, 255, 0) 72%);
            border: 1px solid rgba(255, 255, 255, 0.24);
            box-shadow:
                0 0 36px rgba(255, 235, 140, 0.34),
                0 0 0 18px rgba(255, 255, 255, 0.08),
                0 0 0 40px rgba(255, 255, 255, 0.04);
            animation: pilihanGlowPulse 7s ease-in-out infinite;
        }

        .pilihan-hero::after {
            left: 4%;
            bottom: -1.5rem;
            width: 8rem;
            height: 8rem;
            border-radius: 2rem;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0)),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 18px),
                repeating-linear-gradient(180deg, rgba(255, 255, 255, 0.12) 0 1px, transparent 1px 18px);
            transform: rotate(12deg);
            opacity: 0.68;
            box-shadow: 0 0 42px rgba(255, 228, 92, 0.28);
        }

        @keyframes pilihanGlowPulse {
            0%, 100% {
                opacity: 0.72;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="max-w-7xl mx-auto px-6 py-10" id="pilihan-kursus-page" data-filter-url="{{ route('kursus.filterByName', ['nama' => $namaKursus]) }}">
        <div class="pilihan-hero rounded-3xl p-8 text-white mb-8">
            <div class="grid grid-cols-1 lg:grid-cols-[320px_minmax(0,1fr)] gap-6 mb-8">
                <div class="rounded-3xl overflow-hidden bg-white shadow-xl h-full">
                    <img src="{{ asset($heroImage) }}" alt="{{ $namaKursus }}" class="w-full h-72 object-cover">
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('kursus.index') }}" class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-white/15 text-white hover:bg-white/25 transition">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <div>
                            <p class="text-sm uppercase tracking-[0.2em] text-orange-100">Kursus Pilihan</p>
                            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">{{ $namaKursus }}</h1>
                        </div>
                    </div>
                    <p class="text-slate-100 text-lg leading-relaxed">{{ $selectedDescription }}</p>
                </div>
            </div>

            <div class="rounded-3xl bg-white p-6 shadow-xl border border-white/20 text-slate-900">
                <div class="mb-4">
                    <p class="text-sm uppercase tracking-[0.25em] text-orange-600">Tapisan</p>
                    <h2 class="text-2xl font-bold">Cari Berdasarkan Pilihan</h2>
                    <p class="mt-2 text-sm text-slate-600">Hanya pilih pilihan yang muncul untuk kursus ini.</p>
                </div>

                <div class="grid gap-4 lg:grid-cols-3">
                    <label class="block text-sm text-slate-700">
                        <span class="block mb-2 font-semibold">Jenis Program</span>
                        <select id="jenis-kursus-filter" name="jenis_kursus" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-orange-400 focus:ring-orange-300 focus:outline-none">
                            <option value="">Semua Jenis Program</option>
                            @foreach($jenisKursusOptions as $jenis)
                                <option value="{{ $jenis }}">{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="block text-sm text-slate-700">
                        <span class="block mb-2 font-semibold">Tempoh Pengajian</span>
                        <select id="tempoh-filter" name="tempoh" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-orange-400 focus:ring-orange-300 focus:outline-none">
                            <option value="">Semua Tempoh</option>
                            @foreach($tempohOptions as $tempoh)
                                <option value="{{ $tempoh }}">{{ $tempoh }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="block text-sm text-slate-700">
                        <span class="block mb-2 font-semibold">Mod Pengajian</span>
                        <select id="mod-pengajian-filter" name="mod_pengajian" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-orange-400 focus:ring-orange-300 focus:outline-none">
                            <option value="">Semua Mod Pengajian</option>
                            @foreach($modPengajianOptions as $mod)
                                <option value="{{ $mod }}">{{ $mod }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Institusi</p>
                <h2 class="text-3xl font-bold text-slate-900">Institusi yang Menawarkan Kursus Ini</h2>
            </div>
            <p class="text-sm text-slate-600">Hasil carian dikemas kini secara langsung apabila anda menukar pilihan.</p>
        </div>

        <div id="institusiResults">
            @include('program._pilihankursus_institusi')
        </div>
    </section>

    @include('components.social-float')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const page = document.getElementById('pilihan-kursus-page');
            if (!page) {
                return;
            }

            const filterUrl = page.dataset.filterUrl;
            const selects = [
                document.getElementById('jenis-kursus-filter'),
                document.getElementById('tempoh-filter'),
                document.getElementById('mod-pengajian-filter')
            ].filter(Boolean);
            const resultsContainer = document.getElementById('institusiResults');

            const updateResults = () => {
                const params = new URLSearchParams();
                selects.forEach(select => {
                    if (select.value) {
                        params.set(select.name, select.value);
                    }
                });

                fetch(`${filterUrl}?${params.toString()}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        resultsContainer.innerHTML = data.html;
                    })
                    .catch(error => {
                        console.error('Ajax filter error:', error);
                    });
            };

            selects.forEach(select => select.addEventListener('change', updateResults));
        });
    </script>

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

</body>
</html>

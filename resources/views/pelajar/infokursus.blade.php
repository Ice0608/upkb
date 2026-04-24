<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Info kursus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dark-mode-init')
    <style>
        .kursus-detail-page,
        .kursus-detail-shell {
            --detail-accent-50: #fff7ed;
            --detail-accent-100: #ffedd5;
            --detail-accent-500: #f97316;
            --detail-accent-600: #ea580c;
            --detail-accent-700: #c2410c;
            --detail-accent-rgb: 249, 115, 22;
            --detail-accent-rgb-soft: 251, 146, 60;
            --detail-gradient-start: #fb923c;
            --detail-gradient-end: #f97316;
            --detail-hero-soft-text: rgba(255, 237, 213, 0.92);
            --detail-tab-soft: rgba(255, 247, 237, 0.92);
            --detail-tab-active: linear-gradient(135deg, rgba(255, 247, 237, 0.96), rgba(255, 237, 213, 0.88));
            --detail-card-border: rgba(251, 146, 60, 0.14);
            --detail-card-bg: rgba(255, 247, 237, 0.72);
            --detail-card-strong-bg: rgba(255, 237, 213, 0.86);
            --detail-chip-bg: rgba(255, 255, 255, 0.18);
        }

        .kursus-detail-page {
            background:
                radial-gradient(circle at 10% 12%, rgba(var(--detail-accent-rgb-soft), 0.18), transparent 24%),
                radial-gradient(circle at 88% 14%, rgba(59, 130, 246, 0.08), transparent 24%),
                linear-gradient(180deg, #fffaf5 0%, #f8fafc 44%, #f6f8fc 100%);
        }

        .kursus-detail-page--tvet,
        .kursus-detail-shell--tvet {
            --detail-accent-50: #fffbea;
            --detail-accent-100: #fef3c7;
            --detail-accent-500: #d4af37;
            --detail-accent-600: #b88912;
            --detail-accent-700: #8a6a08;
            --detail-accent-rgb: 212, 175, 55;
            --detail-accent-rgb-soft: 241, 207, 99;
            --detail-gradient-start: #f1cf63;
            --detail-gradient-end: #d4af37;
            --detail-hero-soft-text: rgba(255, 248, 214, 0.92);
            --detail-tab-soft: rgba(255, 251, 235, 0.94);
            --detail-tab-active: linear-gradient(135deg, rgba(255, 251, 235, 0.98), rgba(254, 243, 199, 0.88));
            --detail-card-border: rgba(212, 175, 55, 0.16);
            --detail-card-bg: rgba(255, 251, 235, 0.8);
            --detail-card-strong-bg: rgba(254, 243, 199, 0.88);
        }

        .kursus-detail-page--diploma,
        .kursus-detail-shell--diploma {
            --detail-accent-50: #f5f3ff;
            --detail-accent-100: #ede9fe;
            --detail-accent-500: #8b5cf6;
            --detail-accent-600: #7c3aed;
            --detail-accent-700: #6d28d9;
            --detail-accent-rgb: 124, 58, 237;
            --detail-accent-rgb-soft: 192, 132, 252;
            --detail-gradient-start: #a855f7;
            --detail-gradient-end: #7c3aed;
            --detail-hero-soft-text: rgba(243, 232, 255, 0.92);
            --detail-tab-soft: rgba(245, 243, 255, 0.94);
            --detail-tab-active: linear-gradient(135deg, rgba(245, 243, 255, 0.98), rgba(233, 213, 255, 0.88));
            --detail-card-border: rgba(124, 58, 237, 0.16);
            --detail-card-bg: rgba(245, 243, 255, 0.8);
            --detail-card-strong-bg: rgba(233, 213, 255, 0.88);
        }

        .kursus-detail-page--sains-kesihatan,
        .kursus-detail-shell--sains-kesihatan {
            --detail-accent-50: #eff6ff;
            --detail-accent-100: #dbeafe;
            --detail-accent-500: #3b82f6;
            --detail-accent-600: #2563eb;
            --detail-accent-700: #1d4ed8;
            --detail-accent-rgb: 37, 99, 235;
            --detail-accent-rgb-soft: 96, 165, 250;
            --detail-gradient-start: #60a5fa;
            --detail-gradient-end: #2563eb;
            --detail-hero-soft-text: rgba(219, 234, 254, 0.92);
            --detail-tab-soft: rgba(239, 246, 255, 0.94);
            --detail-tab-active: linear-gradient(135deg, rgba(239, 246, 255, 0.98), rgba(219, 234, 254, 0.88));
            --detail-card-border: rgba(37, 99, 235, 0.16);
            --detail-card-bg: rgba(239, 246, 255, 0.8);
            --detail-card-strong-bg: rgba(219, 234, 254, 0.88);
        }

        .kursus-detail-page--tvet {
            background:
                url('/images/TVET-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(241, 207, 99, 0.18), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59, 130, 246, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .kursus-detail-page--diploma {
            background:
                url('/images/DIP-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(192, 132, 252, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(99, 102, 241, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .kursus-detail-page--sains-kesihatan {
            background:
                url('/images/SK-LIGHT.jpg'),
                radial-gradient(circle at 8% 12%, rgba(96, 165, 250, 0.16), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(33, 150, 243, 0.08), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.18) 0%, rgba(30,41,59,0.20) 44%, rgba(15,23,42,0.22) 100%);
            background-size: cover;
            background-position: center top 64px;
            background-attachment: fixed;
        }

        .kursus-detail-shell {
            position: relative;
            isolation: isolate;
        }

        .kursus-detail-shell::before,
        .kursus-detail-shell::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: -1;
        }

        .kursus-detail-shell::before {
            top: 1rem;
            left: -2rem;
            width: 16rem;
            height: 16rem;
            border-radius: 3rem;
            background: radial-gradient(circle at 30% 30%, rgba(var(--detail-accent-rgb-soft), 0.18), rgba(var(--detail-accent-rgb-soft), 0) 58%);
            filter: blur(10px);
            opacity: 0.9;
        }

        .kursus-detail-shell::after {
            right: -1.5rem;
            top: 12rem;
            width: 18rem;
            height: 18rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(var(--detail-accent-rgb), 0.12), rgba(var(--detail-accent-rgb), 0));
            filter: blur(12px);
            opacity: 0.92;
        }

        .kursus-detail-hero {
            border: 1px solid rgba(255, 255, 255, 0.72);
            background: linear-gradient(120deg, var(--detail-gradient-start), var(--detail-gradient-end));
            box-shadow: 0 28px 62px rgba(15, 23, 42, 0.12), 0 0 40px rgba(var(--detail-accent-rgb), 0.16);
        }

        .kursus-detail-soft-text {
            color: var(--detail-hero-soft-text);
        }

        .kursus-detail-chip {
            background: var(--detail-chip-bg);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.24);
        }

        .kursus-detail-primary-btn {
            color: var(--detail-accent-600);
        }

        .kursus-detail-primary-btn:hover {
            color: var(--detail-accent-700);
        }

        .kursus-detail-panel {
            border: 1px solid rgba(226, 232, 240, 0.84);
            background: rgba(255, 255, 255, 0.94);
            box-shadow: 0 20px 48px rgba(15, 23, 42, 0.08);
        }

        .kursus-detail-tabbar {
            background: rgba(248, 250, 252, 0.94);
        }

        .tab-link {
            color: #475569;
            transition: transform 0.28s ease, color 0.28s ease, background-color 0.28s ease, box-shadow 0.28s ease;
        }

        .tab-link:hover {
            background: var(--detail-tab-soft);
            color: var(--detail-accent-600);
        }

        .tab-link.is-active {
            background: var(--detail-tab-active);
            color: var(--detail-accent-700);
            box-shadow: 0 12px 24px rgba(var(--detail-accent-rgb), 0.12);
        }

        html.dark .kursus-detail-page--tvet {
            background:
                url('/images/TVET-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .kursus-detail-page--diploma {
            background:
                url('/images/DIP-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .kursus-detail-page--sains-kesihatan {
            background:
                url('/images/SK-DARK.jpg'),
                radial-gradient(circle at 8% 12%, rgba(56,189,248,0.07), transparent 24%),
                radial-gradient(circle at 90% 18%, rgba(59,130,246,0.05), transparent 24%),
                linear-gradient(180deg, rgba(15,23,42,0.72) 0%, rgba(30,41,59,0.72) 44%, rgba(15,23,42,0.72) 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        html.dark .kursus-detail-panel {
            border-color: rgba(51, 65, 85, 0.9);
            background: rgba(15, 23, 42, 0.92);
            box-shadow: 0 20px 48px rgba(0, 0, 0, 0.28);
        }

        html.dark .kursus-detail-tabbar {
            background: rgba(30, 41, 59, 0.9);
            border-bottom-color: rgba(51, 65, 85, 0.9) !important;
        }

        html.dark .tab-link {
            color: #cbd5e1;
        }

        html.dark .tab-link:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #f8fafc;
        }

        html.dark .tab-link.is-active {
            background: linear-gradient(135deg, rgba(var(--detail-accent-rgb), 0.35), rgba(var(--detail-accent-rgb), 0.18));
            color: #fff;
            box-shadow: 0 12px 24px rgba(var(--detail-accent-rgb), 0.20);
        }

        html.dark #tab-content {
            color: #e2e8f0;
        }

        html.dark #tab-content .bg-white {
            background-color: rgba(15, 23, 42, 0.78) !important;
        }

        html.dark #tab-content .bg-gray-50 {
            background-color: rgba(30, 41, 59, 0.72) !important;
        }

        html.dark #tab-content .bg-emerald-50 {
            background-color: rgba(6, 78, 59, 0.32) !important;
        }

        html.dark #tab-content .bg-orange-50 {
            background-color: rgba(124, 45, 18, 0.28) !important;
        }

        html.dark #tab-content .border-gray-100,
        html.dark #tab-content .border-gray-200,
        html.dark #tab-content .border-gray-300,
        html.dark #tab-content .border-dashed {
            border-color: rgba(71, 85, 105, 0.72) !important;
        }

        html.dark #tab-content .border-orange-100,
        html.dark #tab-content .border-orange-200 {
            border-color: rgba(249, 115, 22, 0.42) !important;
        }

        html.dark #tab-content .text-slate-900,
        html.dark #tab-content .text-gray-900,
        html.dark #tab-content .text-gray-800,
        html.dark #tab-content .text-gray-700 {
            color: #f1f5f9 !important;
        }

        html.dark #tab-content .text-gray-600,
        html.dark #tab-content .text-gray-500 {
            color: #cbd5e1 !important;
        }

        html.dark #tab-content .text-orange-700,
        html.dark #tab-content .text-orange-900 {
            color: #fdba74 !important;
        }

        html.dark #tab-content .text-emerald-700,
        html.dark #tab-content .text-emerald-900 {
            color: #6ee7b7 !important;
        }
    </style>
</head>
@php
    $detailProgramType = strtolower((string) optional($kursus->institusi)->jenis_institusi);
    $detailInstitusi = $kursus->institusi;
    $detailCourseName = strtolower(trim((string) $kursus->nama_kursus));
    $detailTvetCourseFallbacks = [
        'pengurusan & pentadbiran pejabat',
        'operasi sistem komputer',
    ];

    if ($detailProgramType === '' && (
        in_array($detailCourseName, $detailTvetCourseFallbacks, true)
        || str_contains($detailCourseName, 'kulinari')
    )) {
        $detailProgramType = 'tvet';
    }
@endphp
<body class="kursus-detail-page no-bg {{ $detailProgramType === 'tvet' ? 'kursus-detail-page--tvet' : '' }} {{ $detailProgramType === 'diploma' ? 'kursus-detail-page--diploma' : '' }} {{ $detailProgramType === 'sains kesihatan' ? 'kursus-detail-page--sains-kesihatan' : '' }} text-gray-800">
@include('layouts.navpelajar')

    <section class="kursus-detail-shell {{ $detailProgramType === 'tvet' ? 'kursus-detail-shell--tvet' : '' }} {{ $detailProgramType === 'diploma' ? 'kursus-detail-shell--diploma' : '' }} {{ $detailProgramType === 'sains kesihatan' ? 'kursus-detail-shell--sains-kesihatan' : '' }} max-w-7xl mx-auto px-6 py-10">
        <div class="kursus-detail-hero rounded-3xl shadow-lg overflow-hidden mb-10 text-white">
            <div class="grid md:grid-cols-[1.8fr,0.8fr] gap-6 p-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="kursus-detail-chip px-3 py-1 rounded-full uppercase text-xs tracking-[0.2em]">{{ $kursus->jenis_kursus }}</span>
                        <span class="kursus-detail-chip px-3 py-1 rounded-full uppercase text-xs tracking-[0.2em]">{{ $kursus->mod_pengajian }}</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">{{ $kursus->nama_kursus }}</h1>
                    <div class="kursus-detail-soft-text flex flex-wrap items-center gap-4 text-sm">
                        <div class="inline-flex items-center gap-2"><i class="fas fa-hashtag"></i> {{ $kursus->kod_kursus }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-clock"></i> {{ $kursus->tempoh }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-users"></i> Kuota {{ $kursus->kuota }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-calendar-days"></i> Daftar {{ $kursus->tarikh_pendaftaran ? $kursus->tarikh_pendaftaran->format('d M Y') : '-' }}</div>
                    </div>
                    <p class="kursus-detail-soft-text mt-6 max-w-3xl leading-relaxed">{{ $kursus->penerangan }}</p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        @if($detailInstitusi)
                            <a href="{{ route('pelajar.infoinstitusi', ['pelajar' => $pelajar->id, 'kod_institusi' => $detailInstitusi->kod_institusi]) }}" class="kursus-detail-primary-btn inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 font-semibold shadow-lg hover:bg-white/90 transition">
                                <i class="fas fa-arrow-left"></i> Kembali ke Institusi
                            </a>
                        @endif
                        <form action="{{ route('pelajar.apply-now', $pelajar->id) }}" method="POST" class="inline-flex">
                            @csrf
                            <input type="hidden" name="kod_institusi" value="{{ $kursus->kod_institusi }}">
                            <input type="hidden" name="kod_kursus" value="{{ $kursus->kod_kursus }}">
                            <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-white/20 border border-white text-white px-6 py-3 font-semibold hover:bg-white/10 transition">
                                <i class="fas fa-check"></i> Apply Now
                            </button>
                        </form>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="rounded-3xl bg-white/10 p-6 border border-white/20">
                        <h2 class="text-lg font-semibold mb-3">Institusi</h2>
                        <p class="kursus-detail-soft-text text-sm">{{ $detailInstitusi?->nama_institusi ?? 'Maklumat institusi tidak tersedia.' }}</p>
                        <p class="kursus-detail-soft-text text-sm">{{ $detailInstitusi?->alamat ?? trim((string) $kursus->kod_institusi) }}</p>
                    </div>
                    <div class="rounded-3xl bg-white/10 p-6 border border-white/20">
                        <h2 class="text-lg font-semibold mb-3">Ringkasan</h2>
                        <p class="kursus-detail-soft-text text-sm">{{ \Illuminate\Support\Str::limit($kursus->penerangan, 160) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="kursus-detail-panel rounded-3xl shadow-lg overflow-hidden mb-10">
            <div class="kursus-detail-tabbar border-b border-gray-200 px-6 py-4">
                <div class="flex flex-wrap gap-2 text-sm text-gray-600">
                    <a href="#" onclick="loadTab('maklumat')" class="tab-link px-4 py-2 rounded-full" data-tab="maklumat">Maklumat Am</a>
                    <a href="#" onclick="loadTab('syarat')" class="tab-link px-4 py-2 rounded-full" data-tab="syarat">Syarat Kelayakan</a>
                    <a href="#" onclick="loadTab('silibus')" class="tab-link px-4 py-2 rounded-full" data-tab="silibus">Struktur Silibus</a>
                    <a href="#" onclick="loadTab('kerjaya')" class="tab-link px-4 py-2 rounded-full" data-tab="kerjaya">Laluan Kerjaya</a>
                    <a href="#" onclick="loadTab('yuran')" class="tab-link px-4 py-2 rounded-full" data-tab="yuran">Yuran & Pinjaman</a>
                    <a href="#" onclick="loadTab('galeri')" class="tab-link px-4 py-2 rounded-full" data-tab="galeri">Galeri</a>
                </div>
            </div>

            <div id="tab-content">
                <!-- Tab content will be loaded here via AJAX -->
            </div>
        </div>
    </section>

    <script>
        let currentTab = 'maklumat';

        function loadTab(tab) {
            currentTab = tab;
            const tabContent = document.getElementById('tab-content');
            const tabLinks = document.querySelectorAll('.tab-link');

            tabLinks.forEach(link => {
                link.classList.remove('is-active');
                if (link.dataset.tab === tab) {
                    link.classList.add('is-active');
                }
            });

            const tabUrls = {
                maklumat: "{{ route('pelajar.tab.maklumat', ['pelajar' => $pelajar->id, 'kod_kursus' => $kursus->kod_kursus]) }}",
                syarat: "{{ route('pelajar.tab.syarat', ['pelajar' => $pelajar->id, 'kod_kursus' => $kursus->kod_kursus]) }}",
                silibus: "{{ route('pelajar.tab.silibus', ['pelajar' => $pelajar->id, 'kod_kursus' => $kursus->kod_kursus]) }}",
                kerjaya: "{{ route('pelajar.tab.kerjaya', ['pelajar' => $pelajar->id, 'kod_kursus' => $kursus->kod_kursus]) }}",
                yuran: "{{ route('pelajar.tab.yuran', ['pelajar' => $pelajar->id, 'kod_kursus' => $kursus->kod_kursus]) }}",
                galeri: "{{ route('pelajar.tab.galeri', ['pelajar' => $pelajar->id, 'kod_institusi' => $kursus->kod_institusi]) }}"
            };

            fetch(tabUrls[tab], {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                }
            })
            .then(response => response.text())
            .then(html => {
                tabContent.innerHTML = html;
            })
            .catch(error => {
                console.error('Error loading tab:', error);
                tabContent.innerHTML = '<p class="text-red-500 p-6">Error loading content.</p>';
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            loadTab('maklumat');
        });
    </script>

</body>
</html>


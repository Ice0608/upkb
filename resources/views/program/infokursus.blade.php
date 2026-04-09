<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Info kursus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navigation')

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg overflow-hidden mb-10 text-white">
            <div class="grid md:grid-cols-[1.8fr,0.8fr] gap-6 p-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="bg-white/20 px-3 py-1 rounded-full uppercase text-xs tracking-[0.2em]">{{ $kursus->jenis_kursus }}</span>
                        <span class="bg-white/20 px-3 py-1 rounded-full uppercase text-xs tracking-[0.2em]">{{ $kursus->mod_pengajian }}</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">{{ $kursus->nama_kursus }}</h1>
                    <div class="flex flex-wrap items-center gap-4 text-sm text-orange-100/90">
                        <div class="inline-flex items-center gap-2"><i class="fas fa-hashtag"></i> {{ $kursus->kod_kursus }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-clock"></i> {{ $kursus->tempoh }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-users"></i> Kuota {{ $kursus->kuota }}</div>
                        <div class="inline-flex items-center gap-2"><i class="fas fa-calendar-days"></i> Daftar {{ $kursus->tarikh_pendaftaran ? $kursus->tarikh_pendaftaran->format('d M Y') : '-' }}</div>
                    </div>
                    <p class="mt-6 max-w-3xl leading-relaxed text-orange-100/90">{{ $kursus->penerangan }}</p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('institusi.show', $kursus->institusi->id) }}" class="inline-flex items-center gap-2 rounded-full bg-white text-orange-600 px-6 py-3 font-semibold shadow-lg hover:bg-white/90 transition">
                            <i class="fas fa-arrow-left"></i> Kembali ke Institusi
                        </a>
                        <a href="{{ route('kursus.pdf', $kursus->id) }}" class="inline-flex items-center gap-2 rounded-full bg-white/20 border border-white text-white px-6 py-3 font-semibold hover:bg-white/10 transition">
                            <i class="fas fa-file-pdf"></i> Simpan PDF
                        </a>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="rounded-3xl bg-white/10 p-6 border border-white/20">
                        <h2 class="text-lg font-semibold mb-3">Institusi</h2>
                        <p class="text-sm text-orange-100/90">{{ $kursus->institusi->nama_institusi }}</p>
                        <p class="text-sm text-orange-100/90">{{ $kursus->institusi->alamat }}</p>
                    </div>
                    <div class="rounded-3xl bg-white/10 p-6 border border-white/20">
                        <h2 class="text-lg font-semibold mb-3">Ringkasan</h2>
                        <p class="text-sm text-orange-100/90">{{ \Illuminate\Support\Str::limit($kursus->penerangan, 160) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100 mb-10">
            <div class="border-b border-gray-200 bg-gray-50 px-6 py-4">
                <div class="flex flex-wrap gap-2 text-sm text-gray-600">
                    <a href="#" onclick="loadTab('maklumat')" class="tab-link px-4 py-2 rounded-full hover:bg-orange-50 hover:text-orange-600 transition" data-tab="maklumat">Maklumat Am</a>
                    <a href="#" onclick="loadTab('syarat')" class="tab-link px-4 py-2 rounded-full hover:bg-orange-50 hover:text-orange-600 transition" data-tab="syarat">Syarat Kelayakan</a>
                    <a href="#" onclick="loadTab('silibus')" class="tab-link px-4 py-2 rounded-full hover:bg-orange-50 hover:text-orange-600 transition" data-tab="silibus">Struktur Silibus</a>
                    <a href="#" onclick="loadTab('kerjaya')" class="tab-link px-4 py-2 rounded-full hover:bg-orange-50 hover:text-orange-600 transition" data-tab="kerjaya">Laluan Kerjaya</a>
                    <a href="#" onclick="loadTab('yuran')" class="tab-link px-4 py-2 rounded-full hover:bg-orange-50 hover:text-orange-600 transition" data-tab="yuran">Yuran & Pinjaman</a>
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

            // Update active tab styling
            tabLinks.forEach(link => {
                link.classList.remove('bg-orange-100', 'text-orange-700');
                if (link.dataset.tab === tab) {
                    link.classList.add('bg-orange-100', 'text-orange-700');
                }
            });

            // Load tab content via AJAX
            const kursusId = '{{ $kursus->id }}';
            fetch(`/kursus/tab${tab}/${kursusId}`, {
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
                tabContent.innerHTML = '<p class="text-red-500">Error loading content.</p>';
            });
        }

        // Load default tab on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadTab('maklumat');
        });
    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - {{ $namaKursus }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Animasi Hover Kad */
        .course-variation-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .course-variation-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        /* Hero Gradient Styling */
        .pilihan-hero-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            position: relative;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #fdba74; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #f97316; }

        /* Full Width Footer Utility */
        .footer-full {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <main class="flex-grow">
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" id="pilihan-kursus-page" data-filter-url="{{ route('kursus.filterByName', ['nama' => $namaKursus]) }}">
            
            <div class="grid lg:grid-cols-2 gap-12 items-center mb-20">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-orange-400 to-yellow-400 rounded-[2rem] blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl">
                        <img src="{{ asset($heroImage) }}" 
                             alt="{{ $namaKursus }}"
                             class="w-full h-[550px] object-cover transform transition duration-700 group-hover:scale-105">
                    </div>
                </div>

                <div class="space-y-8">
                    <div>
                        <span class="inline-block px-4 py-1.5 mb-4 text-xs font-bold tracking-widest text-orange-600 uppercase bg-orange-100 rounded-full">
                            Kursus Pilihan
                        </span>
                        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                            {{ $namaKursus }}
                        </h1>
                        <p class="mt-6 text-lg text-slate-600 leading-relaxed border-l-4 border-orange-500 pl-4">
                            {{ $selectedDescription }}
                        </p>
                    </div>

                    <div class="bg-white rounded-3xl p-8 shadow-xl shadow-slate-200/60 border border-slate-100">
                        <div class="flex items-center gap-2 mb-6">
                            <i class="fa-solid fa-sliders text-orange-500"></i>
                            <h3 class="font-bold text-xl text-slate-800">Carian Pantas</h3>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Program</label>
                                <select id="jenis-kursus-filter" name="jenis_kursus"
                                    class="w-full rounded-xl border-slate-200 focus:ring-orange-500 focus:border-orange-500 transition-all px-4 py-3">
                                    <option value="">Semua Jenis</option>
                                    @foreach($jenisKursusOptions as $jenis)
                                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Tempoh Pengajian</label>
                                <select id="tempoh-filter" name="tempoh"
                                    class="w-full rounded-xl border-slate-200 focus:ring-orange-500 focus:border-orange-500 transition-all px-4 py-3">
                                    <option value="">Semua Tempoh</option>
                                    @foreach($tempohOptions as $tempoh)
                                        <option value="{{ $tempoh }}">{{ $tempoh }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Mod Pengajian</label>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach($modPengajianOptions as $mod)
                                        <button type="button"
                                            class="mod-btn px-6 py-2.5 rounded-full border border-slate-200 text-sm font-medium hover:border-orange-500 hover:text-orange-500 transition-all"
                                            data-value="{{ $mod }}">
                                            {{ $mod }}
                                        </button>
                                    @endforeach
                                </div>
                                <input type="hidden" id="mod-pengajian-filter" name="mod_pengajian">
                            </div>

                            <button id="reset-filter-btn"
                                class="w-full mt-4 flex items-center justify-center gap-2 text-slate-500 hover:text-orange-600 font-medium py-3 transition-colors">
                                <i class="fa-solid fa-rotate-left text-xs"></i>
                                Reset Semua Pilihan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-12 border-t border-slate-200 pt-16">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div class="max-w-2xl">
                        <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Institusi Penawaran</h2>
                        <p class="mt-2 text-slate-500">Terdapat beberapa pusat bertauliah yang menawarkan kursus ini mengikut kesesuaian anda.</p>
                    </div>
                    <div class="flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-lg text-sm font-medium">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        Kemas kini Automatik
                    </div>
                </div>
            </div>

            <div id="institusiResults" class="min-h-[400px]">
                @include('program._pilihankursus_institusi')
            </div>
        </section>
    </main>

    @include('components.social-float')

    {{-- 🔹 FOOTER (FULL WIDTH) --}}
    <footer class="w-full mt-auto">
        @include('layouts.footer')
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const page = document.getElementById('pilihan-kursus-page');
            if (!page) return;

            const filterUrl = page.dataset.filterUrl;
            const resetBtn = document.getElementById('reset-filter-btn');
            const modInput = document.getElementById('mod-pengajian-filter');
            const selects = [
                document.getElementById('jenis-kursus-filter'),
                document.getElementById('tempoh-filter'),
                modInput
            ].filter(Boolean);
            
            const resultsContainer = document.getElementById('institusiResults');

            const updateResults = () => {
                // Add loading state
                resultsContainer.style.opacity = '0.5';
                
                const params = new URLSearchParams();
                selects.forEach(select => {
                    if (select.value) {
                        params.set(select.getAttribute('name'), select.value);
                    }
                });

                fetch(`${filterUrl}?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = data.html;
                    resultsContainer.style.opacity = '1';
                })
                .catch(error => {
                    console.error('Ajax filter error:', error);
                    resultsContainer.style.opacity = '1';
                });
            };

            // Event Listeners for Dropdowns
            document.querySelectorAll('select').forEach(el => {
                el.addEventListener('change', updateResults);
            });

            // Event Listeners for Mod Buttons
            document.querySelectorAll('.mod-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    document.querySelectorAll('.mod-btn').forEach(b => {
                        b.classList.remove('bg-orange-500', 'text-white', 'border-orange-500');
                    });
                    this.classList.add('bg-orange-500', 'text-white', 'border-orange-500');
                    modInput.value = this.dataset.value;
                    updateResults();
                });
            });

            // Reset Logic
            if (resetBtn) {
                resetBtn.addEventListener('click', function() {
                    document.querySelectorAll('select').forEach(s => s.value = '');
                    modInput.value = '';
                    document.querySelectorAll('.mod-btn').forEach(b => {
                        b.classList.remove('bg-orange-500', 'text-white', 'border-orange-500');
                    });
                    updateResults();
                });
            }
        });
    </script>
</body>
</html>
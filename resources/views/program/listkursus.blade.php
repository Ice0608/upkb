<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Senarai Kursus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar-scroll {
            max-height: calc(100vh - 250px);
            overflow-y: auto;
        }
        .category-btn {
            transition: all 0.3s ease;
        }
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- 🔹 NAVIGATION --}}
    @include('layouts.navigation')

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        @if(request('jenis'))
                            Kursus {{ request('jenis') }}
                        @else
                            Senarai Kursus
                        @endif
                    </h1>
                    <p class="mt-3 text-lg text-orange-100">Cari dan jelajahi kursus yang sesuai dengan minat anda.</p>
                </div>
                <button class="w-14 h-14 rounded-full bg-white text-orange-600 shadow-md hover:shadow-lg transition">
                    <i class="fas fa-graduation-cap"></i>
                </button>
            </div>
        </div>

        <!-- SIDEBAR + GRID LAYOUT -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            
            {{-- SIDEBAR (LEFT) --}}
            <aside class="lg:col-span-1">
                <div class="rounded-3xl bg-white shadow-lg p-6 border border-gray-100">
                    <!-- Filter Section -->
                    <h3 class="text-lg font-bold text-slate-900 mb-4">
                        <i class="fas fa-filter mr-2 text-orange-500"></i>Filter
                    </h3>
                    
                    <form method="GET" class="space-y-4 mb-6">
                        <!-- Negeri Select -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Negeri</label>
                            <select 
                                name="negeri" 
                                onchange="this.form.submit()" 
                                class="w-full rounded-2xl border border-gray-300 bg-white px-4 py-2 text-sm shadow-sm focus:border-orange-400 focus:outline-none"
                            >
                                <option value="">Semua Negeri</option>
                                <option value="Johor" {{ request('negeri') == 'Johor' ? 'selected' : '' }}>Johor</option>
                                <option value="Kedah" {{ request('negeri') == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                                <option value="Kelantan" {{ request('negeri') == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                                <option value="Melaka" {{ request('negeri') == 'Melaka' ? 'selected' : '' }}>Melaka</option>
                                <option value="Negeri Sembilan" {{ request('negeri') == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
                                <option value="Pahang" {{ request('negeri') == 'Pahang' ? 'selected' : '' }}>Pahang</option>
                                <option value="Perak" {{ request('negeri') == 'Perak' ? 'selected' : '' }}>Perak</option>
                                <option value="Perlis" {{ request('negeri') == 'Perlis' ? 'selected' : '' }}>Perlis</option>
                                <option value="Pulau Pinang" {{ request('negeri') == 'Pulau Pinang' ? 'selected' : '' }}>Pulau Pinang</option>
                                <option value="Sabah" {{ request('negeri') == 'Sabah' ? 'selected' : '' }}>Sabah</option>
                                <option value="Sarawak" {{ request('negeri') == 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
                                <option value="Selangor" {{ request('negeri') == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                                <option value="Terengganu" {{ request('negeri') == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
                                <option value="Kuala Lumpur" {{ request('negeri') == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                                <option value="Labuan" {{ request('negeri') == 'Labuan' ? 'selected' : '' }}>Labuan</option>
                                <option value="Putrajaya" {{ request('negeri') == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
                            </select>
                        </div>

                        <!-- Kuota Filter -->
                        <div>
                            <button 
                                type="submit" 
                                name="kuota" 
                                value="{{ request('kuota') ? 0 : 1 }}" 
                                class="w-full inline-flex items-center justify-center rounded-2xl border px-4 py-2 text-sm font-semibold transition {{ request('kuota') ? 'bg-orange-500 border-orange-500 text-white hover:bg-orange-600' : 'bg-white border-orange-300 text-orange-600 hover:bg-orange-50' }}"
                            >
                                <i class="fas fa-users mr-2"></i>
                                Ada Kuota
                                @if(request('kuota'))
                                    <i class="fas fa-check ml-2"></i>
                                @endif
                            </button>
                        </div>

                        <!-- Clear Filter -->
                        @if(request('negeri') || request('kuota'))
                            <div>
                                <a 
                                    href="{{ route('kursus.index') }}"
                                    class="block text-center text-orange-600 hover:text-orange-700 font-semibold text-sm py-2 rounded-2xl border border-orange-300 hover:bg-orange-50 transition"
                                >
                                    <i class="fas fa-redo mr-2"></i>Reset Filter
                                </a>
                            </div>
                        @endif

                        @if(request('jenis'))
                            <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                        @endif
                    </form>

                    <!-- Senarai Kursus Filter -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">
                            <i class="fas fa-list-ul mr-2 text-orange-500"></i>Kategori Kursus
                        </h3>
                        
                        <div class="flex flex-col space-y-1 sidebar-scroll">
                            <!-- Semua Kursus Button -->
                            <button 
                                onclick="filterCourses('')"
                                class="category-btn flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all bg-orange-100 text-orange-700 hover:bg-orange-200"
                                id="btn-all"
                            >
                                <span class="w-4 h-4 min-w-[1rem] min-h-[1rem] flex-shrink-0 rounded-full border-2 border-orange-500 flex items-center justify-center">
                                    <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                                </span>
                                Semua Kursus
                            </button>

                            {{-- Loop nama yang unik sahaja --}}
                            @foreach($kursusList->unique('nama_kursus') as $kursus)
                                <button 
                                    onclick="filterCourses('{{ addslashes($kursus->nama_kursus) }}')"
                                    class="category-btn flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all text-gray-600 hover:bg-gray-50 hover:text-orange-500"
                                    id="btn-{{ Illuminate\Support\Str::slug($kursus->nama_kursus, '-') }}"
                                >
                                    <span class="w-4 h-4 min-w-[1rem] min-h-[1rem] flex-shrink-0 rounded-full border-2 border-gray-300 flex items-center justify-center transition-colors">
                                    </span>
                                    
                                    <span class="truncate">{{ $kursus->nama_kursus }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>

            {{-- MAIN GRID (RIGHT) - UNIQUE COURSES ONLY --}}
            <main class="lg:col-span-3">
                <div id="courses-container" class="grid md:grid-cols-3 gap-6">
                    @forelse($kursusList->unique('nama_kursus')->values() as $kursus)
                    @php $galleryImage = optional($kursus->galeris->first())->imej ?? 'images/default-college.jpg'; @endphp
                    <article class="group rounded-3xl bg-white shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition course-card cursor-pointer" 
                             data-course-name="{{ $kursus->nama_kursus }}"
                             onclick="window.location.href='{{ route('kursus.showByName', urlencode($kursus->nama_kursus)) }}'">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset($galleryImage) }}" alt="{{ $kursus->nama_kursus }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-x-0 top-4 px-4 flex items-start justify-between gap-3">
                                <span class="inline-flex items-center rounded-full bg-orange-600/95 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-white shadow-sm">{{ $kursus->institusi->jenis_institusi ?? 'Program' }}</span>
                                <div class="inline-flex items-center gap-2">
                                    <span class="inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-orange-600 shadow-sm">{{ $kursus->jenis_kursus }}</span>
                                    <span class="inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-orange-600 shadow-sm">Kuota {{ $kursus->kuota ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <h2 class="text-2xl font-bold text-slate-900 mb-2">{{ $kursus->nama_kursus }}</h2>

                            <button class="inline-flex items-center justify-between w-full rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:bg-orange-600 transition">
                                <span>Lihat Pilihan Kursus</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </article>
                    @empty
                    <div class="col-span-3 bg-white rounded-3xl p-10 text-center text-gray-500 shadow-sm border border-gray-100">
                        Tiada kursus ditemui.
                    </div>
                    @endforelse
                </div>
            </main>

        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

    <script>
        function filterCourses(courseName) {
            const container = document.getElementById('courses-container');
            const cards = document.querySelectorAll('.course-card');
            let visibleCount = 0;

            // Update button styles
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('bg-orange-100', 'text-orange-700', 'hover:bg-orange-200', 'bg-orange-50', 'text-orange-600', 'font-bold', 'hover:bg-orange-100');
                btn.classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-orange-500');
                btn.querySelector('span').classList.remove('border-orange-500');
                btn.querySelector('span').classList.add('border-gray-300');
                btn.querySelector('span span')?.remove();
            });

            // Highlight active button
            if (courseName === '') {
                document.getElementById('btn-all').classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-orange-500');
                document.getElementById('btn-all').classList.add('bg-orange-100', 'text-orange-700', 'hover:bg-orange-200');
                document.getElementById('btn-all').querySelector('span').classList.remove('border-gray-300');
                document.getElementById('btn-all').querySelector('span').classList.add('border-orange-500');
                document.getElementById('btn-all').querySelector('span').innerHTML = '<span class="w-2 h-2 bg-orange-500 rounded-full"></span>';
            } else {
                const btnId = 'btn-' + courseName.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
                const activeBtn = document.getElementById(btnId);
                if (activeBtn) {
                    activeBtn.classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-orange-500');
                    activeBtn.classList.add('bg-orange-50', 'text-orange-600', 'font-bold', 'hover:bg-orange-100');
                    activeBtn.querySelector('span').classList.remove('border-gray-300');
                    activeBtn.querySelector('span').classList.add('border-orange-500');
                    activeBtn.querySelector('span').innerHTML = '<span class="w-2 h-2 bg-orange-500 rounded-full"></span>';
                }
            }

            // Filter cards
            cards.forEach(card => {
                const cardCourseName = card.getAttribute('data-course-name');
                const matches = courseName === '' || cardCourseName === courseName;
                
                if (matches) {
                    card.style.display = '';
                    card.style.animation = 'fadeIn 0.3s ease-in';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide empty state
            if (visibleCount === 0) {
                container.innerHTML = '<div class="col-span-3 bg-white rounded-3xl p-10 text-center text-gray-500 shadow-sm border border-gray-100">Tiada kursus ditemui.</div>';
            }
        }

        // Add fade-in animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        `;
        document.head.appendChild(style);
    </script>

</body>
</html>

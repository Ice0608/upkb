<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Senarai Kursus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                    <p class="mt-3 text-lg text-orange-100">Lihat kursus kolej, jenis program, kod, kuota, institusi dan tarikh pendaftaran.</p>
                </div>
                <button class="w-14 h-14 rounded-full bg-white text-orange-600 shadow-md hover:shadow-lg transition">
                    <i class="fas fa-graduation-cap"></i>
                </button>
            </div>
        </div>

        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <form method="GET" class="flex w-full max-w-[520px] gap-4 items-center">
                <select name="negeri" onchange="this.form.submit()" class="w-full rounded-full border border-gray-300 bg-white px-4 py-2 text-sm shadow-sm focus:border-orange-400 focus:outline-none">
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

                @if(request('jenis'))
                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                @endif
            </form>
            <form method="GET" class="inline-flex items-center">
                @if(request('jenis'))
                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                @endif
                @if(request('negeri'))
                    <input type="hidden" name="negeri" value="{{ request('negeri') }}">
                @endif
                <button type="submit" name="kuota" value="{{ request('kuota') ? 0 : 1 }}" class="inline-flex items-center justify-center rounded-full border px-6 py-2 text-sm font-semibold transition {{ request('kuota') ? 'bg-orange-500 border-orange-500 text-white hover:bg-orange-600' : 'bg-white border-orange-300 text-orange-600 hover:bg-orange-50' }}">
                    Kuota
                </button>
            </form>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse($kursusList as $kursus)
            <article class="group rounded-3xl bg-white shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset($kursus->institusi->gambar_institusi ?? 'images/default-college.jpg') }}" alt="{{ $kursus->nama_kursus }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
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
                    <p class="text-sm text-gray-500 mb-4"><span class="font-semibold text-slate-900">{{ $kursus->kod_kursus }}</span> • {{ $kursus->institusi->nama_institusi ?? 'Institusi tidak ditetapkan' }}</p>

                    <div class="grid gap-3 text-sm text-gray-600 mb-5">
                        <div class="inline-flex items-center gap-2 px-4 py-3 rounded-2xl bg-gray-50">
                            <i class="fas fa-university text-orange-500"></i>
                            <span>{{ $kursus->institusi->nama_institusi ?? 'N/A' }}</span>
                        </div>
                        <div class="inline-flex items-center gap-2 px-4 py-3 rounded-2xl bg-gray-50">
                            <i class="fas fa-calendar-days text-orange-500"></i>
                            <span>Tarikh daftar: {{ optional($kursus->tarikh_pendaftaran)->format('d M Y') ?? '-' }}</span>
                        </div>
                    </div>

                    <a href="{{ route('kursus.show', $kursus->id) }}" class="inline-flex items-center justify-between w-full rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:bg-orange-600 transition">
                        <span>Lihat kursus</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-3 bg-white rounded-3xl p-10 text-center text-gray-500 shadow-sm border border-gray-100">
                Tiada kursus ditemui.
            </div>
            @endforelse
        </div>
    </section>

    @include('components.social-float')

    {{-- 🔹 FOOTER --}}
    @include('layouts.footer')

</body>
</html>

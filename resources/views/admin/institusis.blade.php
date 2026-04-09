<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Admin Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    
@include('layouts.navadmin')

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-400 shadow-lg p-8 text-white mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">Admin Institusi {{ request('jenis') ? request('jenis') : '' }}</h1>
                    <p class="mt-3 text-lg text-orange-100">Urus semua institusi di sini. Tambah, sunting dan hapus data institusi dengan mudah.</p>
                </div>
                <a href="{{ route('admin.addinstitusi') }}" class="w-14 h-14 rounded-full bg-white text-orange-600 shadow-md hover:shadow-lg transition flex items-center justify-center">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>

        @if(session('success'))
        <div class="mb-6 rounded-2xl bg-white p-5 border border-green-200 text-green-700 shadow-sm">
            {{ session('success') }}
        </div>
        @endif

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
            @forelse($institusis as $institusi)
            <article class="rounded-3xl bg-white shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition">
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset($institusi->gambar_institusi) }}" alt="{{ $institusi->nama_institusi }}" class="w-full h-full object-cover">
                </div>
                <div class="p-8">
                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-xs font-semibold uppercase tracking-wide mb-4">{{ $institusi->jenis_institusi }}</span>
                    <h2 class="text-2xl font-extrabold text-slate-900 mb-2">{{ $institusi->nama_institusi }}</h2>
                    <p class="text-gray-500 mb-4"><i class="fas fa-map-marker-alt mr-2"></i>{{ $institusi->alamat }}</p>
                    <p class="text-gray-500 mb-6">{{ Illuminate\Support\Str::limit($institusi->mengenai_institusi, 100) }}</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('admin.editinstitusi', $institusi->id) }}" class="inline-flex items-center gap-2 text-blue-600 font-bold">EDIT <span>→</span></a>
                        <form action="{{ route('admin.deleteinstitusi', $institusi->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this institusi?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center gap-2 text-red-600 font-bold">DELETE <span>→</span></button>
                        </form>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-3 bg-white rounded-2xl p-8 text-center text-gray-500">
                Tiada institusi ditemui.
            </div>
            @endforelse
        </div>
    </section>

    @include('components.social-float')

    @include('layouts.footer-admin')

</body>
</html>

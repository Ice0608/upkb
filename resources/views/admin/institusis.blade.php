<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Admin Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-dark">

@include('layouts.navadmin')

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="mb-8 rounded-3xl bg-gradient-to-r from-orange-500 to-orange-400 p-8 text-white shadow-lg">
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-4xl font-bold leading-tight md:text-5xl">Admin Institusi {{ request('jenis') ? request('jenis') : '' }}</h1>
                    <p class="mt-3 text-lg text-orange-100">Urus semua institusi di sini. Tambah, kemaskini dan hapus data institusi dengan mudah.</p>
                </div>
                <a href="{{ route('admin.addinstitusi') }}" class="flex h-14 w-14 items-center justify-center rounded-full bg-white text-orange-600 shadow-md transition hover:shadow-lg">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>

        @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-white p-5 text-green-700 shadow-sm">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center">
            <form method="GET" class="grid w-full grid-cols-1 gap-3 md:grid-cols-4 lg:grid-cols-7">
                <input type="text" name="cari" placeholder="Cari Institusi..." value="{{ request('cari') }}" class="col-span-1 w-full rounded-full border border-gray-300 bg-white px-4 py-2 text-sm shadow-sm focus:border-orange-400 focus:outline-none md:col-span-2 lg:col-span-2">

                <select name="jenis" class="col-span-1 w-full rounded-full border border-gray-300 bg-white px-4 py-2 text-sm shadow-sm focus:border-orange-400 focus:outline-none lg:col-span-2">
                    <option value="">Semua Jenis</option>
                    <option value="TVET" {{ request('jenis') == 'TVET' ? 'selected' : '' }}>TVET</option>
                    <option value="DIPLOMA" {{ request('jenis') == 'DIPLOMA' ? 'selected' : '' }}>DIPLOMA</option>
                    <option value="SAINS KESIHATAN" {{ request('jenis') == 'SAINS KESIHATAN' ? 'selected' : '' }}>SAINS KESIHATAN</option>
                </select>
                
                <select name="negeri" class="col-span-1 w-full rounded-full border border-gray-300 bg-white px-4 py-2 text-sm shadow-sm focus:border-orange-400 focus:outline-none lg:col-span-2">
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

                <button type="submit" class="col-span-1 inline-flex w-full items-center justify-center rounded-full bg-orange-500 px-6 py-2 text-sm font-semibold text-white transition hover:bg-orange-600 lg:w-[9rem]">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>

            </form>

            <form method="GET" class="w-full lg:w-auto lg:flex-shrink-0">
                @if(request('jenis'))
                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                @endif
                @if(request('negeri'))
                    <input type="hidden" name="negeri" value="{{ request('negeri') }}">
                @endif
                @if(request('cari'))
                    <input type="hidden" name="cari" value="{{ request('cari') }}">
                @endif
                <button type="submit" name="kuota" value="{{ request('kuota') ? 0 : 1 }}" class="inline-flex w-full items-center justify-center rounded-full border px-6 py-2 text-sm font-semibold transition lg:w-[9rem] {{ request('kuota') ? 'border-orange-500 bg-orange-500 text-white hover:bg-orange-600' : 'border-orange-300 bg-white text-orange-600 hover:bg-orange-50' }}">
                    Kuota
                </button>
            </form>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            @forelse($institusis as $institusi)
            <article class="flex h-full flex-col overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-lg transition hover:shadow-xl">
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset($institusi->gambar_institusi) }}" alt="{{ $institusi->nama_institusi }}" class="h-full w-full object-cover">
                </div>
                <div class="flex flex-1 flex-col p-8">
                    <span class="mb-4 inline-flex w-fit items-center self-start rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-orange-700">{{ $institusi->jenis_institusi }}</span>
                    <h2 class="mb-2 text-2xl font-extrabold text-slate-900">{{ $institusi->nama_institusi }}</h2>
                    <p class="mb-4 text-gray-500 uppercase"><i class="fas fa-map-marker-alt mr-2"></i>{{ $institusi->alamat }}</p>
                    <p class="text-gray-500">{{ Illuminate\Support\Str::limit($institusi->mengenai_institusi, 100) }}</p>
                    <div class="mt-auto flex flex-nowrap items-center justify-center gap-3 pt-6">
                        <a href="{{ route('admin.editinstitusi', $institusi->id) }}" class="inline-flex items-center justify-center rounded-full bg-blue-50 px-4 py-2.5 text-sm font-semibold text-blue-700 ring-1 ring-blue-200 transition hover:bg-blue-100 hover:text-blue-800">
                            <i class="fas fa-pen-to-square mr-2"></i> Edit
                        </a>
                        <form action="{{ route('admin.deleteinstitusi', $institusi->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this institusi?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-700 ring-1 ring-red-200 transition hover:bg-red-100 hover:text-red-800">
                                <i class="fas fa-trash mr-2"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-3 rounded-2xl bg-white p-8 text-center text-gray-500">
                Tiada institusi ditemui.
            </div>
            @endforelse
        </div>
    </section>

    @include('components.social-float')

    @include('layouts.footer-admin')

</body>
</html>


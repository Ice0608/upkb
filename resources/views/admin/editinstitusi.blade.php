<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Edit Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-6xl mx-auto px-6 py-10">

        <!-- Form Edit Institusi -->
        <div class="rounded-3xl border border-gray-100 bg-white shadow-lg mb-10 overflow-hidden">
            <div class="border-b border-gray-200 bg-[radial-gradient(circle_at_top_left,_rgba(255,237,213,0.9),_rgba(255,255,255,1)_48%,_rgba(254,215,170,0.35)_100%)] px-8 py-8">
                <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Edit Institusi</h1>
                        <p class="mt-2 max-w-2xl text-gray-600">Kemaskini maklumat institusi, imej, alamat dan penerangan utama dalam satu paparan yang lebih jelas.</p>
                        <div class="mt-4 inline-flex items-center rounded-full border border-orange-200 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-orange-700 shadow-sm">
                            Kod: {{ $institusi->kod_institusi }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <button type="submit" form="edit-institusi-form" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-orange-600">
                            <i class="fas fa-floppy-disk mr-2"></i> Simpan Kemas Kini
                        </button>
                        <a href="{{ route('admin.institusis') }}" class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 font-semibold text-gray-700 ring-1 ring-gray-200 shadow-sm transition hover:bg-gray-50">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-8">

            @if($errors->any())
            <div class="mb-6 rounded-2xl bg-red-50 p-5 border border-red-200 text-red-700">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="mb-6 rounded-2xl bg-green-50 p-5 border border-green-200 text-green-700">
                {{ session('success') }}
            </div>
            @endif

            <form id="edit-institusi-form" action="{{ route('admin.updateinstitusi', $institusi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')
                <div class="grid gap-6 lg:grid-cols-2">
                    <div>
                        <label for="kod_institusi" class="block text-sm font-semibold text-gray-700">Kod Institusi</label>
                        <input type="text" name="kod_institusi" id="kod_institusi" value="{{ old('kod_institusi', $institusi->kod_institusi) }}" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
                    </div>
                    <div>
                        <label for="nama_institusi" class="block text-sm font-semibold text-gray-700">Nama Institusi</label>
                        <input type="text" name="nama_institusi" id="nama_institusi" value="{{ old('nama_institusi', $institusi->nama_institusi) }}" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
                    </div>
                    <div>
                        <label for="jenis_institusi" class="block text-sm font-semibold text-gray-700">Jenis Institusi</label>
                        <input type="text" name="jenis_institusi" id="jenis_institusi" value="{{ old('jenis_institusi', $institusi->jenis_institusi) }}" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
                    </div>
                    <div>
                        <label for="gambar_institusi" class="block text-sm font-semibold text-gray-700">Gambar Institusi</label>
                        <input type="file" name="gambar_institusi" id="gambar_institusi" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white text-sm text-gray-900 shadow-sm file:mr-4 file:rounded-full file:border-0 file:bg-orange-100 file:px-4 file:py-2.5 file:font-semibold file:text-orange-700" accept="image/*">
                        <p class="text-sm text-gray-500 mt-2">Biarkan kosong untuk kekal gambar sedia ada.</p>
                    </div>
                    <div class="lg:col-span-2">
                        <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>{{ old('alamat', $institusi->alamat) }}</textarea>
                    </div>
                    <div class="lg:col-span-2">
                        <label for="mengenai_institusi" class="block text-sm font-semibold text-gray-700">Mengenai Institusi</label>
                        <textarea name="mengenai_institusi" id="mengenai_institusi" rows="6" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>{{ old('mengenai_institusi', $institusi->mengenai_institusi) }}</textarea>
                    </div>
                </div>
            </form>
            </div>
        </div>

        <!-- Senarai kursus Ditawarkan -->
        <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100 mb-10">
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="min-w-0 flex flex-wrap items-center gap-3 text-2xl font-bold text-gray-800">
                    <i class="fas fa-graduation-cap text-orange-500"></i>Senarai kursus Ditawarkan
                    <span class="text-sm bg-orange-100 text-orange-700 px-3 py-1 rounded-full font-semibold">{{ count($kursusList) }} kursus</span>
                </h2>
                <a href="{{ route('admin.addkursus', $institusi->kod_institusi) }}" class="inline-flex w-full sm:w-auto items-center justify-center gap-2 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">
                    <i class="fas fa-plus"></i>Tambah kursus
                </a>
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
                            <td class="px-4 py-3 text-gray-600">
                                <span class="inline-flex max-w-[180px] items-center gap-2 rounded-full bg-blue-100 text-blue-700 px-2 py-1 text-xs font-semibold overflow-hidden whitespace-nowrap text-ellipsis">
                                    {{ $kursus->kod_kursus }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $kursus->mod_pengajian }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $kursus->tempoh }}</td>
                            <td class="px-4 py-3 text-gray-600 font-semibold text-orange-600">{{ $kursus->kuota }}</td>
                            <td class="px-4 py-3 text-gray-600">
                                <div class="inline-flex items-center gap-4 whitespace-nowrap">
                                    <a href="{{ route('admin.editkursus', $kursus->id) }}" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-semibold">
                                        <i class="fas fa-edit"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.deletekursus', $kursus->id) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Padam kursus ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 font-semibold">
                                            <i class="fas fa-trash"></i>Padam
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="bg-gray-50 rounded-2xl p-8 text-center text-gray-500">
                <i class="fas fa-inbox text-3xl mb-3 text-gray-300"></i>
                <p>Tiada kursus ditawarkan. <a href="{{ route('admin.addkursus', $institusi->kod_institusi) }}" class="text-orange-600 font-semibold hover:text-orange-800">Tambah sekarang</a></p>
            </div>
            @endif
        </div>

        <!-- Galeri Fasiliti -->
        <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                    <i class="fas fa-images text-orange-500"></i>Galeri Fasiliti
                </h2>
                <a href="{{ route('admin.addgaleri', $institusi->kod_institusi) }}" class="inline-flex items-center gap-2 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">
                    <i class="fas fa-plus"></i>Tambah Foto
                </a>
            </div>
            
            @if(count($galeriList) > 0)
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($galeriList as $foto)
                <div class="rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition border border-gray-200 relative group">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset($foto->imej) }}" alt="Fasiliti" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2">
                            <a href="{{ route('admin.editgaleri', $foto->id) }}" class="inline-flex items-center gap-2 bg-orange-500 text-white px-3 py-1 rounded-full text-sm hover:bg-orange-600 transition">
                                <i class="fas fa-edit"></i>Sunting
                            </a>
                            <form action="{{ route('admin.deletegaleri', $foto->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus foto ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-2 bg-red-500 text-white px-3 py-1 rounded-full text-sm hover:bg-red-600 transition">
                                    <i class="fas fa-trash"></i>Hapus
                                </button>
                            </form>
                        </div>
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
                <p>Tiada gambar fasiliti. <a href="{{ route('admin.addgaleri', $institusi->kod_institusi) }}" class="text-orange-600 font-semibold hover:text-orange-800">Tambah sekarang</a></p>
            </div>
            @endif
        </div>

    </section>

    @include('components.social-float')
    @include('layouts.footer-admin')

</body>
</html>

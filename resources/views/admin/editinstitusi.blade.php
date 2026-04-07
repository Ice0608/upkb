<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Edit Institusi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-6xl mx-auto px-6 py-10">

        <!-- Form Edit Institusi -->
        <div class="rounded-3xl bg-white shadow-lg p-8 border border-gray-100 mb-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Institusi</h1>

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

            <form action="{{ route('admin.updateinstitusi', $institusi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-6">
                    <div>
                        <label for="kod_institusi" class="block text-sm font-medium text-gray-700">Kod Institusi</label>
                        <input type="text" name="kod_institusi" id="kod_institusi" value="{{ old('kod_institusi', $institusi->kod_institusi) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="nama_institusi" class="block text-sm font-medium text-gray-700">Nama Institusi</label>
                        <input type="text" name="nama_institusi" id="nama_institusi" value="{{ old('nama_institusi', $institusi->nama_institusi) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="jenis_institusi" class="block text-sm font-medium text-gray-700">Jenis Institusi</label>
                        <input type="text" name="jenis_institusi" id="jenis_institusi" value="{{ old('jenis_institusi', $institusi->jenis_institusi) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <label for="gambar_institusi" class="block text-sm font-medium text-gray-700">Gambar Institusi</label>
                        <input type="file" name="gambar_institusi" id="gambar_institusi" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm file:border-0 file:bg-orange-100 file:px-3 file:py-2 file:rounded-md file:text-orange-700" accept="image/*">
                        <p class="text-sm text-gray-500 mt-2">Biarkan kosong untuk kekal gambar sedia ada.</p>
                    </div>
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('alamat', $institusi->alamat) }}</textarea>
                    </div>
                    <div>
                        <label for="mengenai_institusi" class="block text-sm font-medium text-gray-700">Mengenai Institusi</label>
                        <textarea name="mengenai_institusi" id="mengenai_institusi" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('mengenai_institusi', $institusi->mengenai_institusi) }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex items-center gap-4">
                    <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">Update Institusi</button>
                    <a href="{{ route('admin.institusis') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                </div>
            </form>
        </div>

        <!-- Senarai Khusus Ditawarkan -->
        <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100 mb-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                    <i class="fas fa-graduation-cap text-orange-500"></i>Senarai Khusus Ditawarkan
                    <span class="text-sm bg-orange-100 text-orange-700 px-3 py-1 rounded-full font-semibold">{{ count($khususList) }} Khusus</span>
                </h2>
                <a href="{{ route('admin.addkhusus', $institusi->kod_institusi) }}" class="inline-flex items-center gap-2 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">
                    <i class="fas fa-plus"></i>Tambah Khusus
                </a>
            </div>
            
            @if(count($khususList) > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-100 border-b border-gray-300">
                        <tr>
                            <th class="px-4 py-3 font-semibold text-gray-700">Nama Khusus</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Kod</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Mod Pengajian</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Tempoh</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Kuota</th>
                            <th class="px-4 py-3 font-semibold text-gray-700">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($khususList as $khusus)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-800 font-medium">{{ $khusus->nama_khusus }}</td>
                            <td class="px-4 py-3 text-gray-600"><span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">{{ $khusus->kod_khusus }}</span></td>
                            <td class="px-4 py-3 text-gray-600">{{ $khusus->mod_pengajian }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $khusus->tempoh }}</td>
                            <td class="px-4 py-3 text-gray-600 font-semibold text-orange-600">{{ $khusus->kuota }}</td>
                            <td class="px-4 py-3 text-gray-600 space-x-3">
                                <a href="{{ route('admin.editkhusus', $khusus->id) }}" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-semibold">
                                    <i class="fas fa-edit"></i>Edit
                                </a>
                                <form action="{{ route('admin.deletekhusus', $khusus->id) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Padam khusus ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 font-semibold">
                                        <i class="fas fa-trash"></i>Padam
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="bg-gray-50 rounded-2xl p-8 text-center text-gray-500">
                <i class="fas fa-inbox text-3xl mb-3 text-gray-300"></i>
                <p>Tiada khusus ditawarkan. <a href="{{ route('admin.addkhusus', $institusi->kod_institusi) }}" class="text-orange-600 font-semibold hover:text-orange-800">Tambah sekarang</a></p>
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
                                <i class="fas fa-edit"></i>Edit
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

    <footer class="bg-gray-900 text-gray-300 mt-16">
        <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/logo.jpeg') }}" class="h-12" alt="logo">
                    <div>
                        <h2 class="text-lg font-bold text-white">UPKB</h2>
                        <p class="text-sm text-gray-400">Pusat maklumat program & pengambilan</p>
                    </div>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">Bantu pelajar dan ibu bapa melihat pilihan pusat, program, kuota semasa dan maklumat penting dengan lebih jelas dalam satu tempat.</p>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-4">Pautan Pantas</h3>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <a href="{{ url('/') }}" class="hover:text-orange-400">Utama</a>
                    <a href="{{ route('program') }}" class="hover:text-orange-400">Program</a>
                    <a href="{{ route('institusi') }}" class="hover:text-orange-400">Institusi</a>
                    <a href="{{ route('faq') }}" class="hover:text-orange-400">FAQ</a>
                    <a href="{{ route('galeri') }}" class="hover:text-orange-400">Galeri</a>
                    <a href="{{ route('hubungi') }}" class="hover:text-orange-400">Hubungi</a>
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-4">Hubungi Kami</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li>📞 +6017 921 5543</li>
                    <li>✉️ info@upkb.my</li>
                    <li>📍 34 Jalan MPK 4 Taman Bukit Kepayang, Seremban</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700"></div>
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center text-sm">
            <p class="text-gray-400">© {{ date('Y') }} Unit Pembangunan Kemahiran Belia.</p>
        </div>
    </footer>

</body>
</html>

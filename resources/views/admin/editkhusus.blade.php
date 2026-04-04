<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Edit Khusus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-4xl mx-auto px-6 py-10">
        <div class="rounded-3xl bg-white shadow-lg p-8 border border-gray-100">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Khusus</h1>

            @if($errors->any())
            <div class="mb-6 rounded-2xl bg-red-50 p-5 border border-red-200 text-red-700">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.updatekhusus', $khusus->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-6">
                    
                    <div>
                        <label for="kod_khusus" class="block text-sm font-medium text-gray-700">Kod Khusus</label>
                        <input type="text" name="kod_khusus" id="kod_khusus" value="{{ old('kod_khusus', $khusus->kod_khusus) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="nama_khusus" class="block text-sm font-medium text-gray-700">Nama Khusus</label>
                        <input type="text" name="nama_khusus" id="nama_khusus" value="{{ old('nama_khusus', $khusus->nama_khusus) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="jenis_khusus" class="block text-sm font-medium text-gray-700">Jenis Khusus</label>
                        <input type="text" name="jenis_khusus" id="jenis_khusus" value="{{ old('jenis_khusus', $khusus->jenis_khusus) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="mod_pengajian" class="block text-sm font-medium text-gray-700">Mod Pengajian</label>
                        <input type="text" name="mod_pengajian" id="mod_pengajian" value="{{ old('mod_pengajian', $khusus->mod_pengajian) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="tempoh" class="block text-sm font-medium text-gray-700">Tempoh</label>
                        <input type="text" name="tempoh" id="tempoh" value="{{ old('tempoh', $khusus->tempoh) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="kuota" class="block text-sm font-medium text-gray-700">Kuota</label>
                        <input type="number" name="kuota" id="kuota" value="{{ old('kuota', $khusus->kuota) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="tarikh_pendaftaran" class="block text-sm font-medium text-gray-700">Tarikh Pendaftaran</label>
                        <input type="date" name="tarikh_pendaftaran" id="tarikh_pendaftaran" value="{{ old('tarikh_pendaftaran', $khusus->tarikh_pendaftaran) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="penerangan" class="block text-sm font-medium text-gray-700">Penerangan</label>
                        <textarea name="penerangan" id="penerangan" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('penerangan', $khusus->penerangan) }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex items-center gap-4">
                    <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">Update Khusus</button>
                    <form action="{{ route('admin.deletekhusus', $khusus->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this khusus?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-600 transition">Delete</button>
                    </form>
                    <a href="javascript:history.back()" class="text-gray-600 hover:text-gray-800 ml-auto">Cancel</a>
                </div>
            </form>
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

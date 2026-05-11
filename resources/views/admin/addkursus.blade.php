<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/icon/seslogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>SESOC - Tambah Kursus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-4xl mx-auto px-6 py-10">
        <div class="rounded-3xl bg-white shadow-lg p-8 border border-gray-100">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Add New kursus</h1>

            @if($errors->any())
            <div class="mb-6 rounded-2xl bg-red-50 p-5 border border-red-200 text-red-700">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.storekursus') }}" method="POST">
                @csrf
                <div class="grid gap-6">
                    <input type="hidden" name="kod_institusi" value="{{ $kod_institusi }}">
                    
                    <div>
                        <label for="kod_kursus" class="block text-sm font-medium text-gray-700">Kod kursus</label>
                        <input type="text" name="kod_kursus" id="kod_kursus" value="{{ old('kod_kursus') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="nama_kursus" class="block text-sm font-medium text-gray-700">Nama kursus</label>
                        <input type="text" name="nama_kursus" id="nama_kursus" value="{{ old('nama_kursus') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="jenis_kursus" class="block text-sm font-medium text-gray-700">Jenis kursus</label>
                        <input type="text" name="jenis_kursus" id="jenis_kursus" value="{{ old('jenis_kursus') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="mod_pengajian" class="block text-sm font-medium text-gray-700">Mod Pengajian</label>
                        <input type="text" name="mod_pengajian" id="mod_pengajian" value="{{ old('mod_pengajian') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    
                    <div>
                        <label for="tempoh" class="block text-sm font-medium text-gray-700">Tempoh</label>
                        <input type="text" name="tempoh" id="tempoh" value="{{ old('tempoh') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., 2 Tahun" required>
                    </div>
                    
                    <div>
                        <label for="kuota" class="block text-sm font-medium text-gray-700">Kuota <span class="text-xs text-gray-500">(pilihan)</span></label>
                        <input type="number" name="kuota" id="kuota" value="{{ old('kuota') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    
                    <div>
                        <label for="tarikh_pendaftaran" class="block text-sm font-medium text-gray-700">Tarikh Pendaftaran <span class="text-xs text-gray-500">(pilihan)</span></label>
                        <input type="date" name="tarikh_pendaftaran" id="tarikh_pendaftaran" value="{{ old('tarikh_pendaftaran') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    
                    <div>
                        <label for="penerangan" class="block text-sm font-medium text-gray-700">Penerangan</label>
                        <textarea name="penerangan" id="penerangan" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('penerangan') }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex items-center gap-4">
                    <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">Add kursus</button>
                    <a href="javascript:history.back()" class="text-gray-600 hover:text-gray-800">Cancel</a>
                </div>
            </form>
        </div>
    </section>

    @include('components.social-float')

    @include('layouts.footer-admin')

</body>
</html>

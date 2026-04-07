@if(session('success'))
    <div class="rounded-2xl bg-green-50 border border-green-200 p-5 text-green-700">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="rounded-2xl bg-red-50 border border-red-200 p-5 text-red-700">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="space-y-6">
    <h2 class="text-2xl font-semibold text-gray-800">Maklumat Am</h2>
    <form id="maklumat-form" action="{{ route('admin.updatekursus', $kursus->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label for="kod_kursus" class="block text-sm font-medium text-gray-700">Kod kursus</label>
                <input type="text" name="kod_kursus" id="kod_kursus" value="{{ old('kod_kursus', $kursus->kod_kursus) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
            </div>
            <div>
                <label for="nama_kursus" class="block text-sm font-medium text-gray-700">Nama kursus</label>
                <input type="text" name="nama_kursus" id="nama_kursus" value="{{ old('nama_kursus', $kursus->nama_kursus) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
            </div>
            <div>
                <label for="jenis_kursus" class="block text-sm font-medium text-gray-700">Jenis kursus</label>
                <input type="text" name="jenis_kursus" id="jenis_kursus" value="{{ old('jenis_kursus', $kursus->jenis_kursus) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
            </div>
            <div>
                <label for="mod_pengajian" class="block text-sm font-medium text-gray-700">Mod Pengajian</label>
                <input type="text" name="mod_pengajian" id="mod_pengajian" value="{{ old('mod_pengajian', $kursus->mod_pengajian) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
            </div>
            <div>
                <label for="tempoh" class="block text-sm font-medium text-gray-700">Tempoh</label>
                <input type="text" name="tempoh" id="tempoh" value="{{ old('tempoh', $kursus->tempoh) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
            </div>
            <div>
                <label for="kuota" class="block text-sm font-medium text-gray-700">Kuota <span class="text-xs text-gray-500">(pilihan)</span></label>
                <input type="number" name="kuota" id="kuota" value="{{ old('kuota', $kursus->kuota) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm">
            </div>
            <div>
                <label for="tarikh_pendaftaran" class="block text-sm font-medium text-gray-700">Tarikh Pendaftaran <span class="text-xs text-gray-500">(pilihan)</span></label>
                <input type="date" name="tarikh_pendaftaran" id="tarikh_pendaftaran" value="{{ old('tarikh_pendaftaran', $kursus->tarikh_pendaftaran?->format('Y-m-d')) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm">
            </div>
        </div>
        <div>
            <label for="penerangan" class="block text-sm font-medium text-gray-700">Penerangan</label>
            <textarea name="penerangan" id="penerangan" rows="5" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>{{ old('penerangan', $kursus->penerangan) }}</textarea>
        </div>
        <div class="flex flex-wrap gap-4 mt-6">
            <button type="submit" class="rounded-full bg-orange-500 text-white px-6 py-2 hover:bg-orange-600 transition">Simpan Maklumat</button>
        </div>
    </form>
    <form action="{{ route('admin.deletekursus', $kursus->id) }}" method="POST" onsubmit="return confirm('Padam kursus ini?');" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="rounded-full bg-red-500 text-white px-6 py-2 hover:bg-red-600 transition">Padam kursus</button>
    </form>
</div>

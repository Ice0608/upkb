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
    <form id="maklumat-form" action="{{ route('admin.updatekhusus', $khusus->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label for="kod_khusus" class="block text-sm font-medium text-gray-700">Kod Khusus</label>
                <input type="text" name="kod_khusus" id="kod_khusus" value="{{ old('kod_khusus', $khusus->kod_khusus) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
            </div>
            <div>
                <label for="nama_khusus" class="block text-sm font-medium text-gray-700">Nama Khusus</label>
                <input type="text" name="nama_khusus" id="nama_khusus" value="{{ old('nama_khusus', $khusus->nama_khusus) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
            </div>
            <div>
                <label for="jenis_khusus" class="block text-sm font-medium text-gray-700">Jenis Khusus</label>
                <input type="text" name="jenis_khusus" id="jenis_khusus" value="{{ old('jenis_khusus', $khusus->jenis_khusus) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
            </div>
            <div>
                <label for="mod_pengajian" class="block text-sm font-medium text-gray-700">Mod Pengajian</label>
                <input type="text" name="mod_pengajian" id="mod_pengajian" value="{{ old('mod_pengajian', $khusus->mod_pengajian) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
            </div>
            <div>
                <label for="tempoh" class="block text-sm font-medium text-gray-700">Tempoh</label>
                <input type="text" name="tempoh" id="tempoh" value="{{ old('tempoh', $khusus->tempoh) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>
            </div>
            <div>
                <label for="kuota" class="block text-sm font-medium text-gray-700">Kuota <span class="text-xs text-gray-500">(pilihan)</span></label>
                <input type="number" name="kuota" id="kuota" value="{{ old('kuota', $khusus->kuota) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm">
            </div>
            <div>
                <label for="tarikh_pendaftaran" class="block text-sm font-medium text-gray-700">Tarikh Pendaftaran <span class="text-xs text-gray-500">(pilihan)</span></label>
                <input type="date" name="tarikh_pendaftaran" id="tarikh_pendaftaran" value="{{ old('tarikh_pendaftaran', $khusus->tarikh_pendaftaran?->format('Y-m-d')) }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm">
            </div>
        </div>
        <div>
            <label for="penerangan" class="block text-sm font-medium text-gray-700">Penerangan</label>
            <textarea name="penerangan" id="penerangan" rows="5" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm" required>{{ old('penerangan', $khusus->penerangan) }}</textarea>
        </div>
        <div class="flex flex-wrap gap-4 mt-6">
            <button type="submit" class="rounded-full bg-orange-500 text-white px-6 py-2 hover:bg-orange-600 transition">Simpan Maklumat</button>
            <form action="{{ route('admin.deletekhusus', $khusus->id) }}" method="POST" onsubmit="return confirm('Padam khusus ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-full bg-red-500 text-white px-6 py-2 hover:bg-red-600 transition">Padam Khusus</button>
            </form>
        </div>
    </form>
</div>
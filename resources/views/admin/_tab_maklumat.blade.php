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
    <div class="rounded-3xl border border-orange-100 bg-gradient-to-r from-orange-50 via-white to-amber-50 p-6 shadow-sm">
        <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Maklumat Am</h2>
                <p class="mt-1 text-sm text-gray-600">Kemaskini maklumat utama kursus, butiran pengajian dan penerangan untuk paparan pengguna.</p>
            </div>
            <div class="inline-flex items-center rounded-full border border-orange-200 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-orange-700 shadow-sm">
                Kursus ID: {{ $kursus->id }}
            </div>
        </div>
    </div>

    <form id="maklumat-form" action="{{ route('admin.updatekursus', $kursus->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label for="kod_kursus" class="block text-sm font-semibold text-gray-700">Kod kursus</label>
                    <input type="text" name="kod_kursus" id="kod_kursus" value="{{ old('kod_kursus', $kursus->kod_kursus) }}" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
                </div>
                <div>
                    <label for="nama_kursus" class="block text-sm font-semibold text-gray-700">Nama kursus</label>
                    <input type="text" name="nama_kursus" id="nama_kursus" value="{{ old('nama_kursus', $kursus->nama_kursus) }}" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
                </div>
                <div>
                    <label for="jenis_kursus" class="block text-sm font-semibold text-gray-700">Jenis kursus</label>
                    <input type="text" name="jenis_kursus" id="jenis_kursus" value="{{ old('jenis_kursus', $kursus->jenis_kursus) }}" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
                </div>
                <div>
                    <label for="mod_pengajian" class="block text-sm font-semibold text-gray-700">Mod Pengajian</label>
                    <input type="text" name="mod_pengajian" id="mod_pengajian" value="{{ old('mod_pengajian', $kursus->mod_pengajian) }}" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
                </div>
                <div>
                    <label for="tempoh" class="block text-sm font-semibold text-gray-700">Tempoh</label>
                    <input type="text" name="tempoh" id="tempoh" value="{{ old('tempoh', $kursus->tempoh) }}" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
                </div>
                <div>
                    <label for="kuota" class="block text-sm font-semibold text-gray-700">Kuota <span class="text-xs font-medium text-gray-500">(pilihan)</span></label>
                    <input type="number" name="kuota" id="kuota" value="{{ old('kuota', $kursus->kuota) }}" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100">
                </div>
                <div class="md:col-span-2 lg:col-span-1">
                    <label for="tarikh_pendaftaran" class="block text-sm font-semibold text-gray-700">Tarikh Pendaftaran <span class="text-xs font-medium text-gray-500">(pilihan)</span></label>
                    <input type="date" name="tarikh_pendaftaran" id="tarikh_pendaftaran" value="{{ old('tarikh_pendaftaran', $kursus->tarikh_pendaftaran?->format('Y-m-d')) }}" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100">
                </div>
            </div>
        </div>

        <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
            <label for="penerangan" class="block text-sm font-semibold text-gray-700">Penerangan</label>
            <textarea name="penerangan" id="penerangan" rows="6" class="mt-2 block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>{{ old('penerangan', $kursus->penerangan) }}</textarea>
            <p class="mt-3 text-sm text-gray-500">Gunakan ruangan ini untuk ringkasan kursus, kelebihan program dan maklumat penting lain.</p>
        </div>
    </form>

    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between rounded-3xl border border-gray-200 bg-gray-50 p-4">
        <div class="text-sm text-gray-600">
            Simpan perubahan dahulu jika anda telah mengemaskini maklumat kursus.
        </div>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <button type="submit" form="maklumat-form" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-orange-600">
                Simpan Maklumat
            </button>
            <form action="{{ route('admin.deletekursus', $kursus->id) }}" method="POST" onsubmit="return confirm('Padam kursus ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-red-600">
                    Padam Kursus
                </button>
            </form>
        </div>
    </div>
</div>

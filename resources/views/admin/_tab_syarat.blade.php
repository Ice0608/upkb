<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h2 class="text-2xl font-semibold text-gray-800">Syarat Kelayakan</h2>
        <form id="syarat-form" action="{{ route('admin.storesyarat') }}" method="POST" class="w-full md:w-auto bg-white rounded-3xl border border-gray-200 p-6 shadow-sm">
            @csrf
            <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
            <div class="space-y-4">
                <label for="syarat_kelayakan" class="block text-sm font-medium text-gray-700">Tambah Syarat</label>
                <textarea name="syarat_kelayakan" id="syarat_kelayakan" rows="3" class="w-full border-gray-300 rounded-xl shadow-sm" required>{{ old('syarat_kelayakan') }}</textarea>
                <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Syarat</button>
            </div>
        </form>
    </div>

    <div id="syarat-list" class="grid gap-4">
        @forelse($kursus->syaratKelayakans as $item)
            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6 flex items-start justify-between gap-4">
                <p class="text-gray-700">{{ $item->syarat_kelayakan }}</p>
                <form action="{{ route('admin.deletesyarat', $item->id) }}" method="POST" onsubmit="return confirm('Padam syarat ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                </form>
            </div>
        @empty
            <div class="rounded-3xl border border-dashed border-gray-300 bg-white p-8 text-center text-gray-500">Tiada syarat kelayakan ditambah lagi.</div>
        @endforelse
    </div>
</div>

<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h2 class="text-2xl font-semibold text-gray-800">Struktur Silibus</h2>
        <form id="silibus-form" action="{{ route('admin.storesilibus') }}" method="POST" class="w-full md:w-auto bg-white rounded-3xl border border-gray-200 p-6 shadow-sm">
            @csrf
            <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
            <div class="space-y-4">
                <div>
                    <label for="topik" class="block text-sm font-medium text-gray-700">Topik</label>
                    <input type="text" name="topik" id="topik" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                </div>
                <div>
                    <label for="isi_kandungan" class="block text-sm font-medium text-gray-700">Isi Kandungan</label>
                    <textarea name="isi_kandungan" id="isi_kandungan" rows="3" class="w-full border-gray-300 rounded-xl shadow-sm" required></textarea>
                </div>
                <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Materi</button>
            </div>
        </form>
    </div>

    <div id="silibus-list" class="grid gap-4">
        @forelse($kursus->silibuses as $item)
            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6 flex flex-col gap-4">
                <div>
                    <h3 class="font-semibold text-gray-800">{{ $item->topik }}</h3>
                    <p class="text-gray-600 mt-2">{{ $item->isi_kandungan }}</p>
                </div>
                <form action="{{ route('admin.deletesilibus', $item->id) }}" method="POST" onsubmit="return confirm('Padam item silibus ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                </form>
            </div>
        @empty
            <div class="rounded-3xl border border-dashed border-gray-300 bg-white p-8 text-center text-gray-500">Tiada silibus ditambah lagi.</div>
        @endforelse
    </div>
</div>

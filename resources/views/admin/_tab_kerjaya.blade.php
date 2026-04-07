<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h2 class="text-2xl font-semibold text-gray-800">Laluan Kerjaya</h2>
        <form id="kerjaya-form" action="{{ route('admin.storekerjaya') }}" method="POST" class="w-full md:w-auto bg-white rounded-3xl border border-gray-200 p-6 shadow-sm">
            @csrf
            <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
            <div class="space-y-4">
                <label for="bidang_kerjaya" class="block text-sm font-medium text-gray-700">Bidang Kerjaya</label>
                <input type="text" name="bidang_kerjaya" id="bidang_kerjaya" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Kerjaya</button>
            </div>
        </form>
    </div>

    <div id="kerjaya-list" class="grid gap-4 md:grid-cols-2">
        @forelse($kursus->kerjayas as $item)
            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6 flex items-center justify-between gap-4">
                <p class="text-gray-700">{{ $item->bidang_kerjaya }}</p>
                <form action="{{ route('admin.deletekerjaya', $item->id) }}" method="POST" onsubmit="return confirm('Padam laluan kerjaya ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                </form>
            </div>
        @empty
            <div class="col-span-2 rounded-3xl border border-dashed border-gray-300 bg-white p-8 text-center text-gray-500">Tiada laluan kerjaya ditambah lagi.</div>
        @endforelse
    </div>
</div>

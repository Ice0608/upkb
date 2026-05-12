<div class="space-y-6">

    <form id="kerjaya-form" action="{{ route('admin.storekerjaya') }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
        @csrf
        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
        <div class="space-y-4">
            <div>
                <label for="gambar" class="block text-sm font-semibold text-gray-700">Muat Naik Gambar Kerjaya</label>
                <p class="mt-1 text-sm text-gray-500">Muat naik imej yang menerangkan laluan kerjaya.</p>
            </div>
            <input type="file" name="gambar" id="gambar" accept="image/*" class="block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-orange-600">
                    Muat Naik Kerjaya
                </button>
            </div>
        </div>
    </form>

    <div id="kerjaya-list" class="grid gap-3">
        @forelse($kursus->kerjayas as $item)
            <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm">
                @if($item->gambar)
                    <img src="{{ asset($item->gambar) }}" alt="Laluan Kerjaya {{ $loop->iteration }}" class="w-full object-cover">
                @else
                    <div class="min-h-[12rem] p-6 text-center text-gray-500">Tiada imej laluan kerjaya tersedia.</div>
                @endif
                <div class="flex items-center justify-between gap-4 border-t border-gray-200 bg-gray-50 p-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-orange-100 text-sm font-bold text-orange-600">
                            {{ $loop->iteration }}
                        </div>
                        <span class="text-sm font-semibold text-gray-800">Laluan {{ $loop->iteration }}</span>
                    </div>
                    <form action="{{ route('admin.deletekerjaya', $item->id) }}" method="POST" onsubmit="return confirm('Padam laluan kerjaya ini?');" class="sm:shrink-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-50 px-5 py-2.5 font-semibold text-red-600 ring-1 ring-red-200 transition hover:bg-red-100 hover:text-red-700">
                            Padam
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="rounded-3xl border border-dashed border-gray-300 bg-white p-8 text-center text-gray-500">Tiada laluan kerjaya ditambah lagi.</div>
        @endforelse
    </div>
</div>

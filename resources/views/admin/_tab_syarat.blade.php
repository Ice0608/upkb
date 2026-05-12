<div class="space-y-6">
    <div class="rounded-3xl border border-orange-100 bg-gradient-to-r from-orange-50 via-white to-amber-50 p-6 shadow-sm">
        <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Syarat Kelayakan</h2>
                <p class="mt-1 text-sm text-gray-600">Senaraikan syarat minimum kemasukan supaya pelajar lebih mudah semak kelayakan sebelum memohon.</p>
            </div>
            <div class="inline-flex items-center rounded-full border border-orange-200 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-orange-700 shadow-sm">
                {{ $kursus->syaratKelayakans->count() }} Syarat
            </div>
        </div>
    </div>

    <form id="syarat-form" action="{{ route('admin.storesyarat') }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
        @csrf
        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
        <div class="space-y-4">
            <div>
                <label for="gambar" class="block text-sm font-semibold text-gray-700">Muat Naik Gambar Syarat</label>
                <p class="mt-1 text-sm text-gray-500">Muat naik imej yang menerangkan syarat kelayakan.</p>
            </div>
            <input type="file" name="gambar" id="gambar" accept="image/*" class="block w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-orange-600">
                    Muat Naik Syarat
                </button>
            </div>
        </div>
    </form>

    <div id="syarat-list" class="grid gap-4">
        @forelse($kursus->syaratKelayakans as $item)
            <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm">
                @if($item->gambar)
                    <img src="{{ asset($item->gambar) }}" alt="Syarat Kelayakan {{ $loop->iteration }}" class="w-full object-cover">
                @else
                    <div class="min-h-[12rem] p-6 text-center text-gray-500">Tiada imej syarat kelayakan tersedia.</div>
                @endif
                <div class="flex items-center justify-between gap-4 border-t border-gray-200 bg-gray-50 p-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-orange-100 text-sm font-bold text-orange-600">
                            {{ $loop->iteration }}
                        </div>
                        <span class="text-sm font-semibold text-gray-800">Syarat {{ $loop->iteration }}</span>
                    </div>
                    <form action="{{ route('admin.deletesyarat', $item->id) }}" method="POST" onsubmit="return confirm('Padam syarat ini?');" class="sm:shrink-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-50 px-5 py-2.5 font-semibold text-red-600 ring-1 ring-red-200 transition hover:bg-red-100 hover:text-red-700">
                            Padam
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="rounded-3xl border border-dashed border-gray-300 bg-white p-8 text-center text-gray-500">
                Tiada syarat kelayakan ditambah lagi.
            </div>
        @endforelse
    </div>
</div>

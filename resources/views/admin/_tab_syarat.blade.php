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

    <form id="syarat-form" action="{{ route('admin.storesyarat') }}" method="POST" class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
        @csrf
        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
        <div class="space-y-4">
            <div>
                <label for="syarat_kelayakan" class="block text-sm font-semibold text-gray-700">Tambah Syarat</label>
                <p class="mt-1 text-sm text-gray-500">Contoh: Lulus BM dan Sejarah, minimum 3 kredit, atau syarat temuduga khas.</p>
            </div>
            <textarea name="syarat_kelayakan" id="syarat_kelayakan" rows="4" class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>{{ old('syarat_kelayakan') }}</textarea>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-orange-600">
                    Tambah Syarat
                </button>
            </div>
        </div>
    </form>

    <div id="syarat-list" class="grid gap-4">
        @forelse($kursus->syaratKelayakans as $item)
            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-5 shadow-sm">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div class="flex items-start gap-3">
                        <div class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-orange-100 text-sm font-bold text-orange-600">
                            {{ $loop->iteration }}
                        </div>
                        <p class="text-sm leading-7 text-gray-700 sm:text-base">{{ $item->syarat_kelayakan }}</p>
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

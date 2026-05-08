<div class="space-y-6">

    <form id="kerjaya-form" action="{{ route('admin.storekerjaya') }}" method="POST" class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
        @csrf
        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
        <div class="space-y-4">
            <div>
                <label for="bidang_kerjaya" class="block text-sm font-semibold text-gray-700">Bidang Kerjaya</label>
                <p class="mt-1 text-sm text-gray-500">Contoh: Juruteknik Sistem, Pegawai Operasi, Pereka Grafik, atau Penyelia Pengeluaran.</p>
            </div>
            <input type="text" name="bidang_kerjaya" id="bidang_kerjaya" class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" placeholder="Masukkan laluan kerjaya" required>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-orange-600">
                    Tambah Kerjaya
                </button>
            </div>
        </div>
    </form>

    <div id="kerjaya-list" class="grid gap-3">
        @forelse($kursus->kerjayas as $item)
            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-4 shadow-sm">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex min-w-0 items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-orange-100 text-sm font-bold text-orange-600">
                            {{ $loop->iteration }}
                        </div>
                        <p class="truncate text-base font-semibold text-gray-800">{{ $item->bidang_kerjaya }}</p>
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

@php
    $pendaftaranTotal = $kursus->yuranPendaftarans->sum('amount');
    $pilihanTotal = $kursus->yuranPilihans->sum('amount');
    $asramaTotal = $kursus->yuranAsramas->sum('amount');
    $pengajianTotal = $kursus->yuranPengajians->sum('amount');
    $elaunTotal = $kursus->elauns->sum('jumlah');
    $totalYuran = $pendaftaranTotal + $pilihanTotal + $asramaTotal;
    $totalPinjaman = $pengajianTotal + $elaunTotal;
    $grandTotal = $totalYuran + $totalPinjaman;
@endphp

<div class="space-y-6">
    <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Yuran & Pinjaman</h2>
                <p class="mt-2 text-sm text-gray-500">Semua item diambil dari rekod kursus ini.</p>
            </div>
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                <div class="rounded-3xl bg-orange-50 p-4">
                    <p class="text-xs uppercase tracking-[0.2em] text-orange-700">Yuran Daftar</p>
                    <p class="mt-3 text-xl font-semibold text-orange-900">RM {{ number_format($pendaftaranTotal, 2) }}</p>
                </div>
                <div class="rounded-3xl bg-orange-50 p-4">
                    <p class="text-xs uppercase tracking-[0.2em] text-orange-700">Yuran Pilihan</p>
                    <p class="mt-3 text-xl font-semibold text-orange-900">RM {{ number_format($pilihanTotal, 2) }}</p>
                </div>
                <div class="rounded-3xl bg-orange-50 p-4">
                    <p class="text-xs uppercase tracking-[0.2em] text-orange-700">Yuran Asrama</p>
                    <p class="mt-3 text-xl font-semibold text-orange-900">RM {{ number_format($asramaTotal, 2) }}</p>
                </div>
                <div class="rounded-3xl bg-orange-50 p-4">
                    <p class="text-xs uppercase tracking-[0.2em] text-orange-700">Jumlah Yuran</p>
                    <p class="mt-3 text-xl font-semibold text-orange-900">RM {{ number_format($totalYuran, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.3fr,0.9fr]">
        <div class="rounded-3xl border border-gray-200 bg-white p-6 space-y-6">
            <div class="grid gap-6 md:grid-cols-2">
                <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-gray-800">Yuran Pendaftaran</h3>
                        <span class="text-sm text-gray-500">RM {{ number_format($pendaftaranTotal, 2) }}</span>
                    </div>
                    <form id="pendaftaran-form" action="{{ route('admin.storeyuranpendaftaran') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                        <div>
                            <label for="item_pendaftaran" class="block text-sm font-medium text-gray-700">Item</label>
                            <input type="text" id="item_pendaftaran" name="item" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <div>
                            <label for="amount_pendaftaran" class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" step="0.01" id="amount_pendaftaran" name="amount" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Yuran Pendaftaran</button>
                    </form>
                </div>

                <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-gray-800">Yuran Pilihan</h3>
                        <span class="text-sm text-gray-500">RM {{ number_format($pilihanTotal, 2) }}</span>
                    </div>
                    <form id="pilihan-form" action="{{ route('admin.storeyuranpilihan') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                        <div>
                            <label for="pilihan" class="block text-sm font-medium text-gray-700">Pilihan</label>
                            <input type="text" id="pilihan" name="pilihan" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <div>
                            <label for="item_pilihan" class="block text-sm font-medium text-gray-700">Item</label>
                            <input type="text" id="item_pilihan" name="item" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <div>
                            <label for="amount_pilihan" class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" step="0.01" id="amount_pilihan" name="amount" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Yuran Pilihan</button>
                    </form>
                </div>
            </div>

            <div class="space-y-3" id="pendaftaran-list">
                @forelse($kursus->yuranPendaftarans as $item)
                    <div class="rounded-3xl border border-gray-200 bg-orange-50 p-4 flex items-center justify-between gap-4">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $item->item }}</p>
                            <p class="text-sm text-gray-600">RM {{ number_format($item->amount, 2) }}</p>
                        </div>
                        <form action="{{ route('admin.deleteyuranpendaftaran', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500">Tiada yuran pendaftaran ditambah lagi.</p>
                @endforelse
            </div>

            <div class="space-y-3" id="pilihan-list">
                @forelse($kursus->yuranPilihans as $item)
                    <div class="rounded-3xl border border-gray-200 bg-orange-50 p-4 flex items-center justify-between gap-4">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $item->pilihan }} - {{ $item->item }}</p>
                            <p class="text-sm text-gray-600">RM {{ number_format($item->amount, 2) }}</p>
                        </div>
                        <form action="{{ route('admin.deleteyuranpilihan', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500">Tiada yuran pilihan ditambah lagi.</p>
                @endforelse
            </div>
        </div>

        <div class="rounded-3xl border border-gray-200 bg-orange-50 p-6">
            <div class="space-y-5">
                <div>
                    <p class="text-sm uppercase tracking-[0.2em] text-orange-700">Yuran Asrama</p>
                    <h3 class="mt-2 text-xl font-semibold text-orange-900">Asrama</h3>
                </div>
                <div class="rounded-3xl bg-white p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm text-gray-600">Jumlah Asrama</p>
                        <p class="text-lg font-semibold text-gray-900">RM {{ number_format($asramaTotal, 2) }}</p>
                    </div>
                    <form id="asrama-form" action="{{ route('admin.storeyuranasrama') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                        <div>
                            <label for="item_asrama" class="block text-sm font-medium text-gray-700">Item</label>
                            <input type="text" id="item_asrama" name="item" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <div>
                            <label for="amount_asrama" class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" step="0.01" id="amount_asrama" name="amount" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Asrama</button>
                    </form>
                </div>
                <div id="asrama-list" class="space-y-3">
                    @forelse($kursus->yuranAsramas as $item)
                        <div class="rounded-3xl border border-gray-200 bg-white p-4 flex items-center justify-between gap-4">
                            <div>
                                <p class="font-semibold text-gray-800">{{ $item->item }}</p>
                                <p class="text-sm text-gray-600">RM {{ number_format($item->amount, 2) }}</p>
                            </div>
                            <form action="{{ route('admin.deleteyuranasrama', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Padam</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-gray-500">Tiada yuran asrama ditambah lagi.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.2fr,0.8fr]">
        <div class="rounded-3xl border border-gray-200 bg-white p-6">
            <div class="grid gap-6 md:grid-cols-2">
                <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-gray-800">Yuran Pengajian</h3>
                        <span class="text-sm text-gray-500">RM {{ number_format($pengajianTotal, 2) }}</span>
                    </div>
                    <form id="pengajian-form" action="{{ route('admin.storeyuranpengajian') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                        <div>
                            <label for="peringkat" class="block text-sm font-medium text-gray-700">Peringkat</label>
                            <input type="text" id="peringkat" name="peringkat" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <div>
                            <label for="tempoh_yuran" class="block text-sm font-medium text-gray-700">Tempoh</label>
                            <input type="text" id="tempoh_yuran" name="tempoh" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <div>
                            <label for="amount_pengajian" class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" step="0.01" id="amount_pengajian" name="amount" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Yuran</button>
                    </form>
                </div>
                <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-gray-800">Elaun</h3>
                        <span class="text-sm text-gray-500">RM {{ number_format($elaunTotal, 2) }}</span>
                    </div>
                    <form id="elaun-form" action="{{ route('admin.storeelaun') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                        <div>
                            <label for="elaun_bulanan" class="block text-sm font-medium text-gray-700">Elaun Bulanan</label>
                            <input type="text" id="elaun_bulanan" name="elaun_bulanan" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <div>
                            <label for="tempoh_elaun" class="block text-sm font-medium text-gray-700">Tempoh</label>
                            <input type="text" id="tempoh_elaun" name="tempoh" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <div>
                            <label for="jumlah_elaun" class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" step="0.01" id="jumlah_elaun" name="jumlah" class="mt-1 w-full border-gray-300 rounded-xl shadow-sm" required>
                        </div>
                        <button type="submit" class="rounded-full bg-orange-500 text-white px-5 py-2 hover:bg-orange-600 transition">Tambah Elaun</button>
                    </form>
                </div>
            </div>

            <div class="space-y-3 mt-6" id="pengajian-list">
                @forelse($kursus->yuranPengajians as $item)
                    <div class="rounded-3xl border border-gray-200 bg-white p-4 flex items-center justify-between gap-4">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $item->peringkat }} / {{ $item->tempoh }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-gray-900">RM {{ number_format($item->amount, 2) }}</p>
                            <form action="{{ route('admin.deleteyuranpengajian', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Padam</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Tiada yuran pengajian direkodkan.</p>
                @endforelse
            </div>

            <div class="space-y-3 mt-4" id="elaun-list">
                @forelse($kursus->elauns as $item)
                    <div class="rounded-3xl border border-gray-200 bg-white p-4 flex items-center justify-between gap-4">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $item->elaun_bulanan }} / {{ $item->tempoh }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-gray-900">RM {{ number_format($item->jumlah, 2) }}</p>
                            <form action="{{ route('admin.deleteelaun', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Padam</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Tiada elaun direkodkan.</p>
                @endforelse
            </div>
        </div>

        <div class="rounded-3xl border border-gray-200 bg-orange-50 p-6">
            <div class="space-y-5">
                <div>
                    <p class="text-sm uppercase tracking-[0.2em] text-orange-700">Pinjaman Pendidikan</p>
                    <h3 class="mt-2 text-2xl font-semibold text-orange-900">Anggaran Jumlah Pinjaman</h3>
                </div>
                <div class="rounded-3xl bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm text-gray-600">Yuran Pengajian</p>
                        <p class="text-lg font-semibold text-gray-900">RM {{ number_format($pengajianTotal, 2) }}</p>
                    </div>
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm text-gray-600">Elaun</p>
                        <p class="text-lg font-semibold text-gray-900">RM {{ number_format($elaunTotal, 2) }}</p>
                    </div>
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex items-center justify-between">
                            <p class="font-semibold text-gray-800">Jumlah Pinjaman</p>
                            <p class="text-xl font-bold text-orange-900">RM {{ number_format($totalPinjaman, 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-3xl bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-gray-800">Keseluruhan</p>
                        <p class="text-2xl font-bold text-orange-900">RM {{ number_format($grandTotal, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

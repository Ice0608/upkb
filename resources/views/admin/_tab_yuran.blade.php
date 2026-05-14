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

<style>
    body.admin-dark .admin-yuran-tab .admin-yuran-stat {
        border-color: rgba(148, 163, 184, 0.18) !important;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.94), rgba(30, 41, 59, 0.9)) !important;
    }

    body.admin-dark .admin-yuran-tab .admin-yuran-surface,
    body.admin-dark .admin-yuran-tab .admin-yuran-card,
    body.admin-dark .admin-yuran-tab .admin-yuran-form,
    body.admin-dark .admin-yuran-tab .admin-yuran-item,
    body.admin-dark .admin-yuran-tab .admin-yuran-empty {
        border-color: rgba(148, 163, 184, 0.18) !important;
        background: rgba(15, 23, 42, 0.82) !important;
    }

    body.admin-dark .admin-yuran-tab .admin-yuran-soft {
        border-color: rgba(148, 163, 184, 0.14) !important;
        background: rgba(15, 23, 42, 0.72) !important;
    }

    body.admin-dark .admin-yuran-tab .admin-yuran-stat p,
    body.admin-dark .admin-yuran-tab .admin-yuran-surface p,
    body.admin-dark .admin-yuran-tab .admin-yuran-card p,
    body.admin-dark .admin-yuran-tab .admin-yuran-form p,
    body.admin-dark .admin-yuran-tab .admin-yuran-item p,
    body.admin-dark .admin-yuran-tab .admin-yuran-empty {
        color: #e2e8f0 !important;
    }

    body.admin-dark .admin-yuran-tab .admin-yuran-muted {
        color: #cbd5e1 !important;
    }

    body.admin-dark .admin-yuran-tab .admin-yuran-kicker {
        color: #94a3b8 !important;
    }
</style>

<div class="admin-yuran-tab space-y-6">

    <div class="grid justify-items-center gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="admin-yuran-stat w-full max-w-sm rounded-[2rem] border border-orange-200 bg-gradient-to-br from-orange-50 to-white p-5 text-center shadow-sm">
            <p class="admin-yuran-kicker text-xs font-semibold uppercase tracking-[0.2em] text-orange-700">Jumlah Yuran</p>
            <p class="mt-3 text-3xl font-bold text-orange-900">RM {{ number_format($totalYuran, 2) }}</p>
            <p class="admin-yuran-muted mt-2 text-sm text-gray-600">Yuran pendaftaran, pilihan dan asrama.</p>
        </div>
        <div class="admin-yuran-stat w-full max-w-sm rounded-[2rem] border border-sky-200 bg-gradient-to-br from-sky-50 to-white p-5 text-center shadow-sm">
            <p class="admin-yuran-kicker text-xs font-semibold uppercase tracking-[0.2em] text-sky-700">Jumlah Pengajian</p>
            <p class="mt-3 text-3xl font-bold text-sky-900">RM {{ number_format($pengajianTotal, 2) }}</p>
            <p class="admin-yuran-muted mt-2 text-sm text-gray-600">Yuran pengajian.</p>
        </div>
        <div class="admin-yuran-stat w-full max-w-sm rounded-[2rem] border border-emerald-200 bg-gradient-to-br from-emerald-50 to-white p-5 text-center shadow-sm">
            <p class="admin-yuran-kicker text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">Jumlah Elaun</p>
            <p class="mt-3 text-3xl font-bold text-emerald-900">RM {{ number_format($elaunTotal, 2) }}</p>
            <p class="admin-yuran-muted mt-2 text-sm text-gray-600">Elaun dan bantuan tambahan.</p>
        </div>
        <div class="admin-yuran-stat w-full max-w-sm rounded-[2rem] border border-violet-200 bg-gradient-to-br from-violet-50 to-white p-5 text-center shadow-sm">
            <p class="admin-yuran-kicker text-xs font-semibold uppercase tracking-[0.2em] text-violet-700">Jumlah Keseluruhan</p>
            <p class="mt-3 text-3xl font-bold text-violet-900">RM {{ number_format($grandTotal, 2) }}</p>
            <p class="admin-yuran-muted mt-2 text-sm text-gray-600">Anggaran penuh kos dan bantuan untuk kursus ini.</p>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.35fr,0.95fr]">
        <div class="space-y-6">
            <div class="admin-yuran-surface rounded-[2rem] border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Yuran</h3>
                    </div>
                </div>

                <div class="mt-6 grid gap-5">
                    <section class="admin-yuran-card rounded-[1.75rem] border border-orange-100 bg-gradient-to-br from-orange-50 to-white p-5">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Yuran Pendaftaran</h4>
                            </div>
                            <div class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-orange-700 shadow-sm">
                                RM {{ number_format($pendaftaranTotal, 2) }}
                            </div>
                        </div>

                        <div class="mt-5 grid gap-5 lg:grid-cols-[0.95fr,1.05fr]">
                            <form id="pendaftaran-form" action="{{ route('admin.storeyuranpendaftaran') }}" method="POST" class="admin-yuran-form rounded-[1.5rem] border border-orange-100 bg-white p-5 shadow-sm">
                                @csrf
                                <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                                <div class="space-y-4">
                                    <div>
                                        <label for="item_pendaftaran" class="block text-sm font-semibold text-gray-700">Item</label>
                                        <input type="text" id="item_pendaftaran" name="item" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" placeholder="Contoh: Bayaran proses pendaftaran" required>
                                    </div>
                                    <div>
                                        <label for="amount_pendaftaran" class="block text-sm font-semibold text-gray-700">Jumlah (RM)</label>
                                        <input type="number" step="0.01" id="amount_pendaftaran" name="amount" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-orange-400 focus:ring focus:ring-orange-100" required>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-orange-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-orange-600">
                                            Tambah Yuran Pendaftaran
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div id="pendaftaran-list" class="space-y-3">
                                @forelse($kursus->yuranPendaftarans as $item)
                                    <div class="admin-yuran-item rounded-[1.5rem] border border-orange-100 bg-white p-4 shadow-sm">
                                        <div class="grid gap-3 sm:grid-cols-[minmax(0,1fr)_auto] sm:items-center">
                                            <div class="min-w-0">
                                                <p class="font-semibold text-gray-800">{{ $item->item }}</p>
                                                <p class="mt-1 text-sm text-gray-500">Yuran pendaftaran</p>
                                                <p class="mt-3 whitespace-nowrap text-base font-semibold text-gray-900">RM {{ number_format($item->amount, 2) }}</p>
                                            </div>
                                            <div class="flex items-center justify-end sm:min-w-[140px]">
                                                <form action="{{ route('admin.deleteyuranpendaftaran', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-50 px-4 py-2 font-semibold text-red-600 ring-1 ring-red-200 transition hover:bg-red-100 hover:text-red-700">
                                                        Padam
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="admin-yuran-empty rounded-[1.5rem] border border-dashed border-orange-200 bg-white p-6 text-center text-sm text-gray-500">
                                        Tiada yuran pendaftaran ditambah lagi.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </section>

                    <section class="admin-yuran-card rounded-[1.75rem] border border-amber-100 bg-gradient-to-br from-amber-50 to-white p-5">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Yuran Pilihan</h4>
                            </div>
                            <div class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-amber-700 shadow-sm">
                                RM {{ number_format($pilihanTotal, 2) }}
                            </div>
                        </div>

                        <div class="mt-5 grid gap-5 lg:grid-cols-[0.95fr,1.05fr]">
                            <form id="pilihan-form" action="{{ route('admin.storeyuranpilihan') }}" method="POST" class="admin-yuran-form rounded-[1.5rem] border border-amber-100 bg-white p-5 shadow-sm">
                                @csrf
                                <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                                <div class="space-y-4">
                                    <div>
                                        <label for="pilihan" class="block text-sm font-semibold text-gray-700">Kategori / Pilihan</label>
                                        <input type="text" id="pilihan" name="pilihan" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-amber-400 focus:ring focus:ring-amber-100" placeholder="Contoh: Pilihan 1" required>
                                    </div>
                                    <div>
                                        <label for="item_pilihan" class="block text-sm font-semibold text-gray-700">Item</label>
                                        <input type="text" id="item_pilihan" name="item" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-amber-400 focus:ring focus:ring-amber-100" placeholder="Contoh: Kit bengkel" required>
                                    </div>
                                    <div>
                                        <label for="amount_pilihan" class="block text-sm font-semibold text-gray-700">Jumlah (RM)</label>
                                        <input type="number" step="0.01" id="amount_pilihan" name="amount" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-amber-400 focus:ring focus:ring-amber-100" required>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-amber-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-amber-600">
                                            Tambah Yuran Pilihan
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div id="pilihan-list" class="space-y-3">
                                @forelse($kursus->yuranPilihans as $item)
                                    <div class="admin-yuran-item rounded-[1.5rem] border border-amber-100 bg-white p-4 shadow-sm">
                                        <div class="grid gap-3 sm:grid-cols-[minmax(0,1fr)_auto] sm:items-center">
                                            <div class="min-w-0">
                                                <p class="font-semibold text-gray-800">{{ $item->pilihan }}</p>
                                                <p class="mt-1 text-sm text-gray-500">{{ $item->item }}</p>
                                                <p class="mt-3 whitespace-nowrap text-base font-semibold text-gray-900">RM {{ number_format($item->amount, 2) }}</p>
                                            </div>
                                            <div class="flex items-center justify-end sm:min-w-[140px]">
                                                <form action="{{ route('admin.deleteyuranpilihan', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-50 px-4 py-2 font-semibold text-red-600 ring-1 ring-red-200 transition hover:bg-red-100 hover:text-red-700">
                                                        Padam
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="admin-yuran-empty rounded-[1.5rem] border border-dashed border-amber-200 bg-white p-6 text-center text-sm text-gray-500">
                                        Tiada yuran pilihan ditambah lagi.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </section>

                    <section class="admin-yuran-card rounded-[1.75rem] border border-rose-100 bg-gradient-to-br from-rose-50 to-white p-5">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Yuran Asrama</h4>
                            </div>
                            <div class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-rose-700 shadow-sm">
                                RM {{ number_format($asramaTotal, 2) }}
                            </div>
                        </div>

                        <div class="mt-5 grid gap-5 lg:grid-cols-[0.95fr,1.05fr]">
                            <form id="asrama-form" action="{{ route('admin.storeyuranasrama') }}" method="POST" class="admin-yuran-form rounded-[1.5rem] border border-rose-100 bg-white p-5 shadow-sm">
                                @csrf
                                <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                                <div class="space-y-4">
                                    <div>
                                        <label for="item_asrama" class="block text-sm font-semibold text-gray-700">Item</label>
                                        <input type="text" id="item_asrama" name="item" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-rose-400 focus:ring focus:ring-rose-100" placeholder="Contoh: Bayaran bilik asrama" required>
                                    </div>
                                    <div>
                                        <label for="amount_asrama" class="block text-sm font-semibold text-gray-700">Jumlah (RM)</label>
                                        <input type="number" step="0.01" id="amount_asrama" name="amount" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-rose-400 focus:ring focus:ring-rose-100" required>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-rose-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-rose-600">
                                            Tambah Yuran Asrama
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div id="asrama-list" class="space-y-3">
                                @forelse($kursus->yuranAsramas as $item)
                                    <div class="admin-yuran-item rounded-[1.5rem] border border-rose-100 bg-white p-4 shadow-sm">
                                        <div class="grid gap-3 sm:grid-cols-[minmax(0,1fr)_auto] sm:items-center">
                                            <div class="min-w-0">
                                                <p class="font-semibold text-gray-800">{{ $item->item }}</p>
                                                <p class="mt-1 text-sm text-gray-500">Yuran asrama</p>
                                                <p class="mt-3 whitespace-nowrap text-base font-semibold text-gray-900">RM {{ number_format($item->amount, 2) }}</p>
                                            </div>
                                            <div class="flex items-center justify-end sm:min-w-[140px]">
                                                <form action="{{ route('admin.deleteyuranasrama', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-50 px-4 py-2 font-semibold text-red-600 ring-1 ring-red-200 transition hover:bg-red-100 hover:text-red-700">
                                                        Padam
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="admin-yuran-empty rounded-[1.5rem] border border-dashed border-rose-200 bg-white p-6 text-center text-sm text-gray-500">
                                        Tiada yuran asrama ditambah lagi.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="space-y-6">

            <section class="admin-yuran-surface rounded-[1.9rem] border border-sky-100 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800">Yuran Pengajian</h4>
                        <p class="admin-yuran-muted mt-1 text-sm text-gray-500">Masukkan amaun pinjaman mengikut peringkat dan tempoh pengajian.</p>
                    </div>
                </div>

                <form id="pengajian-form" action="{{ route('admin.storeyuranpengajian') }}" method="POST" class="admin-yuran-soft mt-5 rounded-[1.5rem] border border-sky-100 bg-sky-50/50 p-5">
                    @csrf
                    <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                    <div class="space-y-4">
                        <div>
                            <label for="peringkat" class="block text-sm font-semibold text-gray-700">Peringkat Pengajian</label>
                            <input type="text" id="peringkat" name="peringkat" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-sky-400 focus:ring focus:ring-sky-100" placeholder="Contoh: Diploma" required>
                        </div>
                        <div>
                            <label for="tempoh_yuran" class="block text-sm font-semibold text-gray-700">Tempoh Pembayaran</label>
                            <input type="text" id="tempoh_yuran" name="tempoh" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-sky-400 focus:ring focus:ring-sky-100" placeholder="Contoh: 24 bulan" required>
                        </div>
                        <div>
                            <label for="amount_pengajian" class="block text-sm font-semibold text-gray-700">Jumlah (RM)</label>
                            <input type="number" step="0.01" id="amount_pengajian" name="amount" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-sky-400 focus:ring focus:ring-sky-100" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-sky-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-sky-600">
                                Tambah Yuran Pengajian
                            </button>
                        </div>
                    </div>
                </form>

                <div class="mt-5 space-y-3" id="pengajian-list">
                    @forelse($kursus->yuranPengajians as $item)
                        <div class="admin-yuran-soft rounded-[1.5rem] border border-sky-100 bg-sky-50 p-4">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                <div class="min-w-0">
                                    <p class="font-semibold text-gray-800">{{ $item->peringkat }}</p>
                                    <p class="mt-1 text-sm text-gray-500">{{ $item->tempoh }}</p>
                                </div>
                                <div class="flex flex-wrap items-center justify-end gap-3 sm:shrink-0">
                                    <p class="whitespace-nowrap text-base font-semibold text-gray-900">RM {{ number_format($item->amount, 2) }}</p>
                                    <form action="{{ route('admin.deleteyuranpengajian', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-50 px-4 py-2 font-semibold text-red-600 ring-1 ring-red-200 transition hover:bg-red-100 hover:text-red-700">
                                            Padam
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="admin-yuran-empty rounded-[1.5rem] border border-dashed border-sky-200 bg-white p-6 text-center text-sm text-gray-500">
                            Tiada yuran pengajian direkodkan.
                        </div>
                    @endforelse
                </div>
            </section>

            <section class="admin-yuran-surface rounded-[1.9rem] border border-emerald-100 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800">Elaun</h4>
                        <p class="admin-yuran-muted mt-1 text-sm text-gray-500">Masukkan elaun bulanan atau bantuan tambahan yang diterima pelajar.</p>
                    </div>
                </div>

                <form id="elaun-form" action="{{ route('admin.storeelaun') }}" method="POST" class="admin-yuran-soft mt-5 rounded-[1.5rem] border border-emerald-100 bg-emerald-50/60 p-5">
                    @csrf
                    <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                    <div class="space-y-4">
                        <div>
                            <label for="elaun_bulanan" class="block text-sm font-semibold text-gray-700">Elaun Bulanan</label>
                            <input type="text" id="elaun_bulanan" name="elaun_bulanan" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-emerald-400 focus:ring focus:ring-emerald-100" placeholder="Masukkan elaun bulanan" required>
                        </div>
                        <div>
                            <label for="tempoh_elaun" class="block text-sm font-semibold text-gray-700">Tempoh Elaun</label>
                            <input type="text" id="tempoh_elaun" name="tempoh" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-emerald-400 focus:ring focus:ring-emerald-100" placeholder="Contoh: 12 bulan" required>
                        </div>
                        <div>
                            <label for="jumlah_elaun" class="block text-sm font-semibold text-gray-700">Jumlah (RM)</label>
                            <input type="number" step="0.01" id="jumlah_elaun" name="jumlah" class="mt-2 w-full rounded-2xl border border-gray-200 bg-white px-4 py-3 text-gray-800 shadow-sm transition focus:border-emerald-400 focus:ring focus:ring-emerald-100" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-emerald-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-emerald-600">
                                Tambah Elaun
                            </button>
                        </div>
                    </div>
                </form>

                <div class="mt-5 space-y-3" id="elaun-list">
                    @forelse($kursus->elauns as $item)
                        <div class="admin-yuran-soft rounded-[1.5rem] border border-emerald-100 bg-emerald-50 p-4">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                <div class="min-w-0">
                                    <p class="font-semibold text-gray-800">{{ $item->elaun_bulanan }}</p>
                                    <p class="mt-1 text-sm text-gray-500">{{ $item->tempoh }}</p>
                                </div>
                                <div class="flex flex-wrap items-center justify-end gap-3 sm:shrink-0">
                                    <p class="whitespace-nowrap text-base font-semibold text-gray-900">RM {{ number_format($item->jumlah, 2) }}</p>
                                    <form action="{{ route('admin.deleteelaun', $item->id) }}" method="POST" onsubmit="return confirm('Padam yuran ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-50 px-4 py-2 font-semibold text-red-600 ring-1 ring-red-200 transition hover:bg-red-100 hover:text-red-700">
                                            Padam
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="admin-yuran-empty rounded-[1.5rem] border border-dashed border-emerald-200 bg-white p-6 text-center text-sm text-gray-500">
                            Tiada elaun direkodkan.
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
</div>

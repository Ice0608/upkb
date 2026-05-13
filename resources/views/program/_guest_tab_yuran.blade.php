@php
    $pendaftaranTotal = $kursus->yuranPendaftarans->sum('amount');
    $pilihanTotal = $kursus->yuranPilihans->sum('amount');
    $asramaTotal = $kursus->yuranAsramas->sum('amount');
    $pengajianTotal = $kursus->yuranPengajians->sum('amount');
    $elaunTotal = $kursus->elauns->sum('jumlah');
    $totalYuran = $pendaftaranTotal + $pilihanTotal + $asramaTotal;
    $totalPinjaman = $pengajianTotal + $elaunTotal;
@endphp

<div class="p-8 border-t border-gray-100 space-y-6">
    <div class="rounded-3xl bg-white border border-gray-200 shadow-sm overflow-hidden">
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 bg-gray-50 p-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Yuran Kemasukan</h2>
                <p class="text-sm text-gray-500">Yuran kemasukan tertakluk kepada perubahan pengurusan institusi.</p>
            </div>
        </div>
        <div class="grid gap-6 xl:grid-cols-[1.6fr,1fr] p-6">
            <div class="grid gap-6 md:grid-cols-2">
                <div class="kursus-tab-card rounded-3xl p-6">
                    <h3 class="kursus-tab-accent-strong font-semibold mb-5">Yuran Pendaftaran</h3>
                    @if($kursus->yuranPendaftarans->isNotEmpty())
                        <div class="space-y-4">
                            @foreach($kursus->yuranPendaftarans as $fee)
                                <div class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4 border border-gray-200">
                                    <p class="text-sm text-gray-700">{{ $fee->item }}</p>
                                    <p class="font-semibold text-gray-900">RM {{ number_format($fee->amount, 2) }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500">Tiada yuran pendaftaran direkodkan.</p>
                    @endif
                    <div class="mt-6 border-t border-gray-200 pt-4 flex items-center justify-between text-sm font-semibold text-gray-900">
                        <span>Jumlah</span>
                        <span>RM {{ number_format($pendaftaranTotal, 2) }}</span>
                    </div>
                </div>

                <div class="kursus-tab-card rounded-3xl p-6">
                    <h3 class="kursus-tab-accent-strong font-semibold mb-5">Yuran Pilihan</h3>
                    @if($kursus->yuranPilihans->isNotEmpty())
                        <div class="space-y-4">
                            @foreach($kursus->yuranPilihans as $fee)
                                <div class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4 border border-gray-200">
                                    <div class="text-sm text-gray-700">{{ $fee->item }}</div>
                                    <div class="text-sm font-semibold text-gray-900">RM {{ number_format($fee->amount, 2) }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500">Tiada yuran pilihan disenaraikan.</p>
                    @endif
                    <div class="mt-6 border-t border-gray-200 pt-4 flex items-center justify-between text-sm font-semibold text-gray-900">
                        <span>Jumlah</span>
                        <span>RM {{ number_format($pilihanTotal, 2) }}</span>
                    </div>
                </div>
            </div>

            <div class="kursus-tab-card kursus-tab-card-strong rounded-3xl p-6">
                <div class="mb-5 space-y-2">
                    <p class="kursus-tab-accent-strong text-sm uppercase tracking-[0.2em]">Yuran Asrama</p>
                    <div class="inline-flex items-center gap-2 rounded-full border px-4 py-2 text-sm font-semibold bg-white" style="border-color: var(--detail-card-border); color: var(--detail-accent-700);">
                        <span>Pilihan Baru</span>
                    </div>
                </div>

                <div class="rounded-3xl bg-white p-4 shadow-sm" style="border: 1px solid var(--detail-card-border);">
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-3">
                        <span>Perincian Pilihan Baru</span>
                        <span class="font-semibold text-gray-900">RM {{ number_format($asramaTotal, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>Total Asrama</span>
                        <span class="kursus-tab-accent-strong font-semibold">RM {{ number_format($asramaTotal, 2) }}</span>
                    </div>
                </div>

                <div class="kursus-tab-accent-strong mt-6 border-t pt-4 text-sm uppercase tracking-[0.2em]" style="border-color: var(--detail-card-border);">Keseluruhan (Daftar + Pilihan + Asrama)</div>
                <div class="kursus-tab-accent-strong mt-3 text-3xl font-bold">RM {{ number_format($totalYuran, 2) }}</div>
            </div>
        </div>
    </div>

    <div class="rounded-3xl bg-white border border-gray-200 shadow-sm overflow-hidden">
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 bg-emerald-50 p-6">
            <div>
                <h2 class="text-2xl font-bold text-emerald-900">PINJAMAN PTPK</h2>
                <p class="text-sm text-emerald-700">Kemudahan pembiayaan pendidikan</p>
            </div>
            <div class="rounded-3xl bg-white px-5 py-4 text-center shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-emerald-700">Anggaran Jumlah Pinjaman</p>
                <p class="mt-2 text-3xl font-bold text-emerald-900">RM {{ number_format($totalPinjaman, 2) }}</p>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2 p-6">
            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-gray-800">Yuran Pengajian</h3>
                    <span class="text-sm font-semibold text-gray-900">RM {{ number_format($pengajianTotal, 2) }}</span>
                </div>
                @if($kursus->yuranPengajians->isNotEmpty())
                    <div class="space-y-4">
                        @foreach($kursus->yuranPengajians as $fee)
                            <div class="rounded-3xl bg-white p-4 border border-gray-200 shadow-sm">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $fee->peringkat }}</p>
                                        <p class="text-sm text-gray-500">{{ $fee->tempoh }}</p>
                                    </div>
                                    <p class="text-lg font-semibold text-gray-900">RM {{ number_format($fee->amount, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">Tiada yuran pengajian direkodkan.</p>
                @endif
                <div class="mt-6 border-t border-gray-200 pt-4 text-sm font-semibold text-gray-900 flex items-center justify-between">
                    <span>Jumlah Yuran Pengajian</span>
                    <span>RM {{ number_format($pengajianTotal, 2) }}</span>
                </div>
            </div>

            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-gray-800">Elaun / Bantuan Sara Hidup</h3>
                    <span class="text-sm font-semibold text-gray-900">RM {{ number_format($elaunTotal, 2) }}</span>
                </div>
                @if($kursus->elauns->isNotEmpty())
                    <div class="space-y-4">
                        @foreach($kursus->elauns as $fee)
                            <div class="rounded-3xl bg-white p-4 border border-gray-200 shadow-sm">
                                <div class="grid gap-4 md:grid-cols-3 items-center">
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-[0.2em]">Kadar Bulanan</p>
                                        <p class="mt-2 text-lg font-semibold text-emerald-900">RM {{ number_format($fee->elaun_bulanan, 2) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-[0.2em]">Tempoh</p>
                                        <p class="mt-2 text-lg font-semibold text-emerald-900">{{ $fee->tempoh }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs text-gray-500 uppercase tracking-[0.2em]">Jumlah</p>
                                        <p class="mt-2 text-lg font-semibold text-emerald-900">RM {{ number_format($fee->jumlah, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">Tiada elaun direkodkan.</p>
                @endif
                <div class="mt-6 border-t border-gray-200 pt-4 text-sm font-semibold text-gray-900 flex items-center justify-between">
                    <span>Jumlah Elaun</span>
                    <span>RM {{ number_format($elaunTotal, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

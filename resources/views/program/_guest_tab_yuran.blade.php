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
                                <div class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4 border border-gray-200" data-pilihan-item data-item-name="{{ $fee->item }}" data-item-amount="{{ $fee->amount }}" data-is-active="1">
                                    <div class="text-sm text-gray-700">{{ $fee->item }}</div>
                                    <button type="button" data-pilihan-item-toggle aria-pressed="true" onclick="(function(btn){const item=btn.closest('[data-pilihan-item]');if(!item)return;const card=item.closest('[data-yuran-card]')?.parentElement?.closest('[data-yuran-card]')||document.querySelector('[data-yuran-card]');if(!card)return;const isActive=item.dataset.isActive==='1';item.dataset.isActive=isActive?'0':'1';const badge=btn.querySelector('[data-toggle-state]');if(badge)badge.textContent=isActive?'TIDAK':'YA';btn.className=isActive?'inline-flex items-center gap-2 rounded-full border border-gray-300 bg-white px-3 py-1 text-xs font-semibold text-gray-700 transition':'inline-flex items-center gap-2 rounded-full border border-gray-300 bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700 transition';updateYuranTotal(card);})(this)" class="inline-flex items-center gap-2 rounded-full border border-gray-300 bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700 transition">
                                        <span data-toggle-state class="uppercase tracking-wide">YA</span>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500">Tiada yuran pilihan disenaraikan.</p>
                    @endif
                    <div class="mt-6 border-t border-gray-200 pt-4 flex items-center justify-between text-sm font-semibold text-gray-900">
                        <span>Jumlah</span>
                        <span data-pilihan-total-display>RM {{ number_format($pilihanTotal, 2) }}</span>
                    </div>
                </div>
            </div>

            <div class="kursus-tab-card kursus-tab-card-strong rounded-3xl p-6"
                data-yuran-card
                data-pendaftaran-total="{{ $pendaftaranTotal }}"
                data-pilihan-total="{{ $pilihanTotal }}"
                data-asrama-total="{{ $asramaTotal }}">
                <div class="mb-5 space-y-2">
                    <p class="kursus-tab-accent-strong text-sm uppercase tracking-[0.2em]">Yuran Asrama</p>
                    <button type="button"
                        data-asrama-toggle
                        aria-pressed="true"
                        data-is-on="1"
                        onclick="(function(btn){const card=btn.closest('[data-yuran-card]');if(!card)return;const on=btn.dataset.isOn!=='1';btn.dataset.isOn=on?'1':'0';btn.setAttribute('aria-pressed',on?'true':'false');const badge=btn.querySelector('[data-toggle-state]');if(badge)badge.textContent=on?'YA':'TIDAK';if(on){btn.className='inline-flex items-center gap-3 rounded-full border px-4 py-2 text-sm font-semibold text-white shadow-sm transition focus:outline-none focus:ring-2 dark:border-orange-400 dark:bg-orange-500';btn.style.borderColor='var(--detail-accent-500)';btn.style.background='var(--detail-accent-500)';btn.style.color='#ffffff';if(badge)badge.className='rounded-full bg-white/25 px-2 py-0.5 text-xs uppercase tracking-wide';}else{btn.className='inline-flex items-center gap-3 rounded-full border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition focus:outline-none focus:ring-2 focus:ring-gray-300 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-200 dark:focus:ring-slate-500';btn.style.borderColor='';btn.style.background='';btn.style.color='';if(badge)badge.className='rounded-full bg-gray-200 px-2 py-0.5 text-xs uppercase tracking-wide text-gray-700 dark:bg-slate-700 dark:text-slate-200';}updateYuranTotal(card);})(this)"
                        class="inline-flex items-center gap-3 rounded-full border px-4 py-2 text-sm font-semibold text-white shadow-sm transition focus:outline-none focus:ring-2 dark:border-orange-400 dark:bg-orange-500"
                        style="border-color: var(--detail-accent-500); background: var(--detail-accent-500); --tw-ring-color: color-mix(in srgb, var(--detail-accent-500) 35%, white);">
                        <span>Asrama</span>
                        <span data-toggle-state class="rounded-full bg-white/25 px-2 py-0.5 text-xs uppercase tracking-wide">YA</span>
                    </button>
                </div>

                <div class="rounded-3xl bg-white p-4 shadow-sm" style="border: 1px solid var(--detail-card-border);">
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-3">
                        <span>Bulanan Asrama</span>
                        <span class="font-semibold text-gray-900">RM {{ number_format($asramaTotal, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>Total Asrama</span>
                        <span class="kursus-tab-accent-strong font-semibold">RM {{ number_format($asramaTotal, 2) }}</span>
                    </div>
                </div>

                <div class="kursus-tab-accent-strong mt-6 border-t pt-4 text-sm uppercase tracking-[0.2em]" style="border-color: var(--detail-card-border);" data-keseluruhan-label>Keseluruhan (Daftar + Pilihan + Asrama)</div>
                <div data-total-yuran class="kursus-tab-accent-strong mt-3 text-3xl font-bold">RM {{ number_format($totalYuran, 2) }}</div>
                <script>
                  function updateYuranTotal(card) {
                    const asramaBtn = card.querySelector('[data-asrama-toggle]');
                    const asramaActive = asramaBtn?.dataset.isOn === '1';
                    const p = Number(card.dataset.pendaftaranTotal || 0);
                    const a = Number(card.dataset.asramaTotal || 0);
                    const totalYuranEl = card.querySelector('[data-total-yuran]');
                    const labelEl = card.querySelector('[data-keseluruhan-label]');
                    const pilihanItems = document.querySelectorAll('[data-pilihan-item]');
                    let pl = 0;
                    pilihanItems.forEach(item => {
                      if (item.dataset.isActive === '1') {
                        pl += Number(item.dataset.itemAmount || 0);
                      }
                    });
                    const pilihanTotalDisplay = document.querySelector('[data-pilihan-total-display]');
                    if (pilihanTotalDisplay) {
                      pilihanTotalDisplay.textContent = 'RM ' + pl.toLocaleString('en-MY', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    }
                    const total = p + pl + (asramaActive ? a : 0);
                    if (totalYuranEl) {
                      totalYuranEl.textContent = 'RM ' + total.toLocaleString('en-MY', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    }
                    if (labelEl) {
                      if (asramaActive) {
                        labelEl.textContent = 'Keseluruhan (Daftar + Pilihan + Asrama)';
                      } else {
                        labelEl.textContent = 'Keseluruhan (Daftar + Pilihan)';
                      }
                    }
                  }
                  document.addEventListener('DOMContentLoaded', function() {
                    const card = document.querySelector('[data-yuran-card]');
                    if (card) updateYuranTotal(card);
                  });
                </script>
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

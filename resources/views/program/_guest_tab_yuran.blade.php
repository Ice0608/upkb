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
    <div class="rounded-3xl bg-white border border-gray-200 shadow-sm overflow-hidden" data-yuran-section>
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 bg-gray-50 p-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Yuran Kemasukan</h2>
                <p class="text-sm text-gray-500">Yuran kemasukan tertakluk kepada perubahan pengurusan institusi.</p>
            </div>
            <div class="rounded-3xl bg-white px-5 py-4 text-center shadow-sm" style="border: 1px solid var(--detail-card-border);">
                <p class="kursus-tab-accent-strong text-sm uppercase tracking-[0.2em]" data-keseluruhan-label>Keseluruhan (Daftar + Pilihan + Asrama)</p>
                <p data-total-yuran class="kursus-tab-accent-strong mt-2 text-3xl font-bold">RM {{ number_format($totalYuran, 2) }}</p>
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
                                    <div>
                                        <p class="text-sm text-gray-700">{{ $fee->item }}</p>
                                        <p class="text-sm font-semibold text-gray-900">RM {{ number_format($fee->amount, 2) }}</p>
                                    </div>
                                    <button type="button" data-pilihan-item-toggle aria-pressed="true" onclick="window.updateGuestYuranTotal?.(this, 'pilihan')" class="inline-flex items-center gap-2 rounded-full border border-gray-300 bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700 transition">
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

            <div class="kursus-tab-card rounded-3xl p-6"
                data-yuran-card
                data-pendaftaran-total="{{ $pendaftaranTotal }}"
                data-pilihan-total="{{ $pilihanTotal }}"
                data-asrama-total="{{ $asramaTotal }}">
                <h3 class="kursus-tab-accent-strong font-semibold mb-5">Yuran Asrama</h3>
                @if($kursus->yuranAsramas->isNotEmpty())
                    <div class="space-y-4">
                        @foreach($kursus->yuranAsramas as $fee)
                            <div class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4 border border-gray-200" data-asrama-item data-item-name="{{ $fee->item }}" data-item-amount="{{ $fee->amount }}" data-is-active="1">
                                <div>
                                    <p class="text-sm text-gray-700">{{ $fee->item }}</p>
                                    <p class="text-sm font-semibold text-gray-900">RM {{ number_format($fee->amount, 2) }}</p>
                                </div>
                                <button type="button" data-asrama-item-toggle aria-pressed="true" onclick="window.updateGuestYuranTotal?.(this, 'asrama')" class="inline-flex items-center gap-2 rounded-full border border-gray-300 bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700 transition">
                                    <span data-toggle-state class="uppercase tracking-wide">YA</span>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">Tiada yuran asrama disenaraikan.</p>
                @endif
                <div class="mt-6 border-t border-gray-200 pt-4 flex items-center justify-between text-sm font-semibold text-gray-900">
                    <span>Jumlah</span>
                    <span class="kursus-tab-accent-strong" data-asrama-total-display>RM {{ number_format($asramaTotal, 2) }}</span>
                </div>

                <script>
                  window.updateGuestYuranTotal = function(trigger, type) {
                    const section = trigger.closest('[data-yuran-section]');
                    if (!section) return;
                    const card = section.querySelector('[data-yuran-card]');
                    if (!card) return;

                    if (type === 'pilihan') {
                      const item = trigger.closest('[data-pilihan-item]');
                      if (!item) return;
                      const isActive = item.dataset.isActive === '1';
                      const nextActive = !isActive;
                      item.dataset.isActive = nextActive ? '1' : '0';
                      trigger.setAttribute('aria-pressed', nextActive ? 'true' : 'false');
                      const badge = trigger.querySelector('[data-toggle-state]');
                      if (badge) badge.textContent = nextActive ? 'YA' : 'TIDAK';
                      trigger.className = nextActive ? 'inline-flex items-center gap-2 rounded-full border border-gray-300 bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700 transition' : 'inline-flex items-center gap-2 rounded-full border border-gray-300 bg-white px-3 py-1 text-xs font-semibold text-gray-700 transition';
                    }

                    if (type === 'asrama') {
                      const item = trigger.closest('[data-asrama-item]');
                      if (!item) return;
                      const isActive = item.dataset.isActive === '1';
                      const nextActive = !isActive;
                      item.dataset.isActive = nextActive ? '1' : '0';
                      trigger.setAttribute('aria-pressed', nextActive ? 'true' : 'false');
                      const badge = trigger.querySelector('[data-toggle-state]');
                      if (badge) badge.textContent = nextActive ? 'YA' : 'TIDAK';
                      trigger.className = nextActive ? 'inline-flex items-center gap-2 rounded-full border border-gray-300 bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700 transition' : 'inline-flex items-center gap-2 rounded-full border border-gray-300 bg-white px-3 py-1 text-xs font-semibold text-gray-700 transition';
                    }

                    const p = Number(card.dataset.pendaftaranTotal || 0);
                    const totalYuranEl = section.querySelector('[data-total-yuran]');
                    const labelEl = section.querySelector('[data-keseluruhan-label]');
                    const pilihanItems = section.querySelectorAll('[data-pilihan-item]');
                    const asramaItems = section.querySelectorAll('[data-asrama-item]');
                    let pl = 0;
                    let al = 0;
                    pilihanItems.forEach(item => {
                      if (item.dataset.isActive === '1') {
                        pl += Number(item.dataset.itemAmount || 0);
                      }
                    });
                    asramaItems.forEach(item => {
                      if (item.dataset.isActive === '1') {
                        al += Number(item.dataset.itemAmount || 0);
                      }
                    });
                    const pilihanTotalDisplay = section.querySelector('[data-pilihan-total-display]');
                    if (pilihanTotalDisplay) {
                      pilihanTotalDisplay.textContent = 'RM ' + pl.toLocaleString('en-MY', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    }
                    const asramaTotalDisplay = section.querySelector('[data-asrama-total-display]');
                    if (asramaTotalDisplay) {
                      asramaTotalDisplay.textContent = 'RM ' + al.toLocaleString('en-MY', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    }
                    const total = p + pl + al;
                    if (totalYuranEl) {
                      totalYuranEl.textContent = 'RM ' + total.toLocaleString('en-MY', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    }
                    if (labelEl) {
                      if (al > 0) {
                        labelEl.textContent = 'Keseluruhan (Daftar + Pilihan + Asrama)';
                      } else {
                        labelEl.textContent = 'Keseluruhan (Daftar + Pilihan)';
                      }
                    }
                  }
                  document.addEventListener('DOMContentLoaded', function() {
                    document.querySelectorAll('[data-yuran-section]').forEach(section => {
                      const card = section.querySelector('[data-yuran-card]');
                      if (card) window.updateGuestYuranTotal(card, 'init');
                    });
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

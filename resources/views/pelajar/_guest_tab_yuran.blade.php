@php
    $pendaftaranTotal = $kursus->yuranPendaftarans->sum('amount');
    $pilihanTotal = $kursus->yuranPilihans->sum('amount');
    $asramaTotal = $kursus->yuranAsramas->sum('amount');
    $pengajianTotal = $kursus->yuranPengajians->sum('amount');
    $elaunTotal = $kursus->elauns->sum('jumlah');
    $totalYuran = $pendaftaranTotal + $pilihanTotal + $asramaTotal;
    $totalPinjaman = $pengajianTotal + $elaunTotal;
    $programType = strtolower(trim((string) ($heroProgramType ?? optional($kursus->institusi)->jenis_institusi ?? '')));
    $pinjamanLabel = in_array($programType, ['diploma', 'sains kesihatan'], true) ? 'PTPTN' : 'PTPK';
    $pusatLabelLower = in_array($programType, ['diploma', 'sains kesihatan'], true) ? 'institusi' : 'pusat bertauliah';
    $hasPilihan = $kursus->yuranPilihans->isNotEmpty();
    $hasAsrama = $kursus->yuranAsramas->isNotEmpty();
    $visibleYuranCards = 1 + ($hasPilihan ? 1 : 0) + ($hasAsrama ? 1 : 0);
    $yuranGridClass = $visibleYuranCards >= 3 ? 'lg:grid-cols-3' : ($visibleYuranCards === 2 ? 'md:grid-cols-2' : '');
    $keseluruhanParts = collect(['Daftar'])
        ->when($hasPilihan, fn ($items) => $items->push('Pilihan'))
        ->when($hasAsrama, fn ($items) => $items->push('Asrama'))
        ->implode(' + ');
@endphp

<div class="p-4 sm:p-6 lg:p-8 border-t border-gray-100 space-y-6">
    <div class="rounded-3xl bg-white border border-gray-200 shadow-sm overflow-hidden" data-yuran-section data-pendaftaran-total="{{ $pendaftaranTotal }}">
        <div class="flex flex-col gap-4 border-b border-gray-100 bg-gradient-to-br from-orange-50 via-white to-amber-50 p-4 sm:p-6 lg:flex-row lg:items-center lg:justify-between">
            <div class="min-w-0">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Yuran Kemasukan</h2>
                <p class="mt-1 text-sm text-gray-500">Yuran kemasukan tertakluk kepada perubahan pengurusan {{ $pusatLabelLower }}.</p>
            </div>
            <div class="w-full rounded-2xl bg-white px-4 py-4 text-left shadow-sm border border-orange-100 sm:w-auto sm:min-w-[280px] sm:px-5 sm:text-center">
                <p class="text-xs sm:text-sm uppercase tracking-[0.16em] sm:tracking-[0.2em] text-orange-700" data-keseluruhan-label>Keseluruhan ({{ $keseluruhanParts }})</p>
                <p data-total-yuran class="mt-2 text-2xl sm:text-3xl font-bold text-orange-900">RM {{ number_format($totalYuran, 2) }}</p>
            </div>
        </div>
        <div class="grid gap-4 sm:gap-6 {{ $yuranGridClass }} p-4 sm:p-6 auto-rows-fr">
            <div class="rounded-2xl border border-orange-100 bg-gradient-to-br from-white to-orange-50/60 p-4 sm:p-6 h-full min-h-[220px] flex flex-col shadow-sm">
                <h3 class="text-base sm:text-lg font-bold text-orange-700 mb-4 sm:mb-5">Yuran Pendaftaran</h3>
                @if($kursus->yuranPendaftarans->isNotEmpty())
                    <div class="space-y-3">
                        @foreach($kursus->yuranPendaftarans as $fee)
                            <div class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4 border border-gray-200 shadow-sm">
                                <p class="text-sm font-medium text-gray-700">{{ $fee->item }}</p>
                                <p class="shrink-0 font-bold text-gray-900">RM {{ number_format($fee->amount, 2) }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">Tiada yuran pendaftaran direkodkan.</p>
                @endif
                <div class="mt-auto border-t border-orange-100 pt-4 flex items-center justify-between gap-4 text-sm font-bold text-gray-900">
                    <span>Jumlah</span>
                    <span>RM {{ number_format($pendaftaranTotal, 2) }}</span>
                </div>
            </div>

            @if($hasPilihan)
            <div class="rounded-2xl border border-orange-100 bg-gradient-to-br from-white to-orange-50/60 p-4 sm:p-6 h-full min-h-[220px] flex flex-col shadow-sm">
                <h3 class="text-base sm:text-lg font-bold text-orange-700 mb-4 sm:mb-5">Yuran Pilihan</h3>
                <div class="space-y-3">
                    @foreach($kursus->yuranPilihans as $fee)
                        <div class="flex items-center justify-between gap-3 rounded-2xl bg-white p-4 border border-gray-200 shadow-sm" data-pilihan-item data-item-name="{{ $fee->item }}" data-item-amount="{{ $fee->amount }}" data-is-active="1">
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-gray-700">{{ $fee->item }}</p>
                                <p class="text-sm font-bold text-gray-900">RM {{ number_format($fee->amount, 2) }}</p>
                            </div>
                            <button type="button" data-pilihan-item-toggle aria-pressed="true" onclick="window.updateGuestYuranTotal?.(this, 'pilihan')" class="shrink-0 inline-flex items-center rounded-full border border-orange-200 bg-orange-50 px-3 py-1 text-xs font-bold text-orange-700 transition">
                                <span data-toggle-state class="uppercase tracking-wide">YA</span>
                            </button>
                        </div>
                    @endforeach
                </div>
                <div class="mt-auto border-t border-orange-100 pt-4 flex items-center justify-between gap-4 text-sm font-bold text-gray-900">
                    <span>Jumlah</span>
                    <span data-pilihan-total-display>RM {{ number_format($pilihanTotal, 2) }}</span>
                </div>
            </div>
            @endif

            @if($hasAsrama)
            <div class="rounded-2xl border border-orange-100 bg-gradient-to-br from-white to-orange-50/60 p-4 sm:p-6 h-full min-h-[220px] flex flex-col shadow-sm">
                <h3 class="text-base sm:text-lg font-bold text-orange-700 mb-4 sm:mb-5">Yuran Asrama</h3>
                <div class="space-y-3">
                    @foreach($kursus->yuranAsramas as $fee)
                        <div class="flex items-center justify-between gap-3 rounded-2xl bg-white p-4 border border-gray-200 shadow-sm" data-asrama-item data-item-name="{{ $fee->item }}" data-item-amount="{{ $fee->amount }}" data-is-active="1">
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-gray-700">{{ $fee->item }}</p>
                                <p class="text-sm font-bold text-gray-900">RM {{ number_format($fee->amount, 2) }}</p>
                            </div>
                            <button type="button" data-asrama-item-toggle aria-pressed="true" onclick="window.updateGuestYuranTotal?.(this, 'asrama')" class="shrink-0 inline-flex items-center rounded-full border border-orange-200 bg-orange-50 px-3 py-1 text-xs font-bold text-orange-700 transition">
                                <span data-toggle-state class="uppercase tracking-wide">YA</span>
                            </button>
                        </div>
                    @endforeach
                </div>
                <div class="mt-auto border-t border-orange-100 pt-4 flex items-center justify-between gap-4 text-sm font-bold text-gray-900">
                    <span>Jumlah</span>
                    <span data-asrama-total-display>RM {{ number_format($asramaTotal, 2) }}</span>
                </div>
            </div>
            @endif

            <script>
              window.updateGuestYuranTotal = function(trigger, type) {
                const section = trigger.closest('[data-yuran-section]');
                if (!section) return;

                if (type === 'pilihan' || type === 'asrama') {
                  const item = trigger.closest(type === 'pilihan' ? '[data-pilihan-item]' : '[data-asrama-item]');
                  if (!item) return;
                  const isActive = item.dataset.isActive === '1';
                  const nextActive = !isActive;
                  item.dataset.isActive = nextActive ? '1' : '0';
                  trigger.setAttribute('aria-pressed', nextActive ? 'true' : 'false');
                  const badge = trigger.querySelector('[data-toggle-state]');
                  if (badge) badge.textContent = nextActive ? 'YA' : 'TIDAK';
                  trigger.className = nextActive ? 'shrink-0 inline-flex items-center rounded-full border border-orange-200 bg-orange-50 px-3 py-1 text-xs font-bold text-orange-700 transition' : 'shrink-0 inline-flex items-center rounded-full border border-gray-300 bg-white px-3 py-1 text-xs font-bold text-gray-500 transition';
                }

                const p = Number(section.dataset.pendaftaranTotal || 0);
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
                  const parts = ['Daftar'];
                  if (pilihanItems.length) parts.push('Pilihan');
                  if (asramaItems.length) parts.push('Asrama');
                  labelEl.textContent = 'Keseluruhan (' + parts.join(' + ') + ')';
                }
              }
              document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('[data-yuran-section]').forEach(section => {
                  window.updateGuestYuranTotal(section, 'init');
                });
              });
            </script>
        </div>
    </div>

    <div class="rounded-3xl bg-white border border-gray-200 shadow-sm overflow-hidden">
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 bg-emerald-50 p-6">
            <div>
                <h2 class="text-2xl font-bold text-emerald-900">PINJAMAN {{ $pinjamanLabel }}</h2>
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

<div class="kursus-tab-section border-t border-gray-100">
    <h2 class="kursus-tab-title">Laluan Kerjaya</h2>
    @if($kursus->kerjayas->isNotEmpty())
        <div class="grid gap-4 md:grid-cols-2">
            @foreach($kursus->kerjayas as $item)
                <div class="kursus-tab-card rounded-3xl p-6">
                    <p class="font-semibold text-slate-900 mb-2">{{ $item->bidang_kerjaya }}</p>
                    <p class="text-gray-600 leading-relaxed">Potensi jawatan dan peluang dalam bidang ini.</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="kursus-tab-empty rounded-3xl p-10 text-center text-gray-500">
            Laluan kerjaya belum ditambah.
        </div>
    @endif
</div>

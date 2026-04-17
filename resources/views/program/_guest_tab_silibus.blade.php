<div class="kursus-tab-section border-t border-gray-100">
    <h2 class="kursus-tab-title">Struktur Silibus</h2>
    @if($kursus->silibuses->isNotEmpty())
        <div class="space-y-4">
            @foreach($kursus->silibuses as $item)
                <div class="kursus-tab-card rounded-3xl p-6">
                    <h3 class="kursus-tab-accent-strong font-semibold mb-2">{{ $item->topik }}</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $item->isi_kandungan }}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="kursus-tab-empty rounded-3xl p-10 text-center text-gray-500">
            Struktur silibus belum ditambah.
        </div>
    @endif
</div>

<div class="p-8 border-t border-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Struktur Silibus</h2>
    @if($kursus->silibuses->isNotEmpty())
        <div class="space-y-4">
            @foreach($kursus->silibuses as $item)
                <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                    <h3 class="font-semibold text-gray-800 mb-2">{{ $item->topik }}</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $item->isi_kandungan }}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="rounded-3xl border border-dashed border-gray-200 p-10 text-center text-gray-500 bg-gray-50">
            Struktur silibus belum ditambah.
        </div>
    @endif
</div>

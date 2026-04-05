<div class="p-8 border-t border-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Laluan Kerjaya</h2>
    @if($khusus->kerjayas->isNotEmpty())
        <div class="grid gap-4 md:grid-cols-2">
            @foreach($khusus->kerjayas as $item)
                <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                    <p class="font-semibold text-slate-900 mb-2">{{ $item->bidang_kerjaya }}</p>
                    <p class="text-gray-600 leading-relaxed">Potensi jawatan dan peluang dalam bidang ini.</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="rounded-3xl border border-dashed border-gray-200 p-10 text-center text-gray-500 bg-gray-50">
            Laluan kerjaya belum ditambah.
        </div>
    @endif
</div>
<div class="kursus-tab-section border-t border-gray-100">
    <h2 class="kursus-tab-title">Syarat Kelayakan</h2>
    @if($kursus->syaratKelayakans->isNotEmpty())
        <div class="space-y-4">
            @foreach($kursus->syaratKelayakans as $item)
                <div class="kursus-tab-card rounded-3xl p-6">
                    <p class="text-gray-700 leading-relaxed">{{ $item->syarat_kelayakan }}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="kursus-tab-empty rounded-3xl p-10 text-center text-gray-500">
            Tiada syarat kelayakan direkodkan.
        </div>
    @endif
</div>

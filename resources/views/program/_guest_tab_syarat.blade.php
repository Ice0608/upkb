<div class="p-8 border-t border-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Syarat Kelayakan</h2>
    @if($khusus->syaratKelayakans->isNotEmpty())
        <div class="space-y-4">
            @foreach($khusus->syaratKelayakans as $item)
                <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
                    <p class="text-gray-700 leading-relaxed">{{ $item->syarat_kelayakan }}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="rounded-3xl border border-dashed border-gray-200 p-10 text-center text-gray-500 bg-gray-50">
            Tiada syarat kelayakan direkodkan.
        </div>
    @endif
</div>
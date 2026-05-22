<div class="p-8 border-t border-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Syarat Kelayakan</h2>
    @if($kursus->syaratKelayakans->isNotEmpty())
        <div class="space-y-4">
            @foreach($kursus->syaratKelayakans as $item)
                <div class="rounded-3xl overflow-hidden border border-gray-200 bg-white shadow-sm">
                    @if($item->gambar)
                        <img src="{{ asset($item->gambar) }}" alt="Syarat Kelayakan {{ $loop->iteration }}" class="w-full object-cover" data-lightbox="syarat">
                    @else
                        <div class="min-h-[14rem] p-6 text-center text-gray-500">Tiada imej syarat kelayakan tersedia.</div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="rounded-3xl border border-dashed border-gray-200 p-10 text-center text-gray-500 bg-gray-50">
            Tiada syarat kelayakan direkodkan.
        </div>
    @endif
</div>

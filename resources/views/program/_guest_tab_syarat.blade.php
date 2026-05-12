<div class="kursus-tab-section border-t border-gray-100">
    <h2 class="kursus-tab-title">Syarat Kelayakan</h2>
    @if($kursus->syaratKelayakans->isNotEmpty())
        <div class="space-y-4">
            @foreach($kursus->syaratKelayakans as $item)
                <div class="kursus-tab-card overflow-hidden rounded-3xl p-0">
                    @if($item->gambar)
                        <img src="{{ asset($item->gambar) }}" alt="Syarat Kelayakan {{ $loop->iteration }}" class="w-full object-cover">
                    @else
                        <div class="min-h-[14rem] bg-slate-100 p-6 text-center text-gray-500">Tiada imej syarat kelayakan tersedia.</div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="kursus-tab-empty rounded-3xl p-10 text-center text-gray-500">
            Tiada syarat kelayakan direkodkan.
        </div>
    @endif
</div>

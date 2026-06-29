<div class="kursus-tab-section border-t border-gray-100">
    <h2 class="kursus-tab-title">Laluan Kerjaya</h2>
    @if($kursus->kerjayas->isNotEmpty())
        <div class="grid gap-4">
            @foreach($kursus->kerjayas as $item)
                <div class="kursus-tab-card overflow-hidden rounded-3xl p-0">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . ltrim($item->gambar, '/')) }}" alt="Laluan Kerjaya {{ $loop->iteration }}" class="w-full object-cover" data-lightbox="kerjaya">
                    @else
                        <div class="min-h-[14rem] bg-slate-100 p-6 text-center text-gray-500">Tiada imej laluan kerjaya tersedia.</div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="kursus-tab-empty rounded-3xl p-10 text-center text-gray-500">
            Laluan kerjaya belum ditambah.
        </div>
    @endif
</div>

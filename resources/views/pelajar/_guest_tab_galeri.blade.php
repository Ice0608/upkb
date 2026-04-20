<div class="space-y-6">
    <div class="rounded-3xl bg-white shadow-sm border border-gray-200 p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-3">Galeri Kursus</h2>
        <p class="text-sm text-gray-600">Lihat imej berkaitan kursus <strong>{{ $kursus->nama_kursus }}</strong>. Gambar dikaitkan secara automatik dengan kod kursus dan institusi.</p>
    </div>

    @if(isset($galleries) && $galleries->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($galleries as $gallery)
                @php
                    $extension = strtolower(pathinfo($gallery->imej, PATHINFO_EXTENSION));
                    $isVideo = in_array($extension, ['mp4', 'webm', 'ogg']);
                @endphp
                <div class="group rounded-3xl overflow-hidden border border-gray-200 bg-white shadow-sm">
                    <a href="{{ asset($gallery->imej) }}" target="_blank" class="block overflow-hidden">
                        @if($isVideo)
                            <video controls class="w-full h-56 object-cover bg-black">
                                <source src="{{ asset($gallery->imej) }}" type="video/{{ $extension }}">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset($gallery->imej) }}" alt="Galeri {{ $kursus->nama_kursus }}" class="w-full h-56 object-cover transition duration-300 group-hover:scale-105">
                        @endif
                    </a>
                    <div class="p-4">
                        @if($gallery->penerangan)
                            <p class="text-sm text-gray-700 mb-2">{{ $gallery->penerangan }}</p>
                        @endif
                        <p class="text-xs text-gray-500">Dimuat naik pada {{ $gallery->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="rounded-3xl border border-dashed border-gray-300 bg-gray-50 p-10 text-center">
            <i class="fas fa-image text-4xl text-gray-300 mb-4"></i>
            <p class="text-lg font-semibold text-gray-700">Tiada gambar galeri buat masa ini.</p>
            <p class="text-sm text-gray-500 mt-2">Sila kembali semula apabila gambar kursus telah dimuat naik.</p>
        </div>
    @endif
</div>

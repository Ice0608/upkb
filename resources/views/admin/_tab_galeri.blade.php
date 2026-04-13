<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Galeri Kursus</h2>
            <p class="text-gray-600 mt-2">Urus gambar dan video untuk kursus ini. Media akan automatik disimpan dengan kod kursus dan institusi.</p>
        </div>
    </div>

    <!-- Upload Form -->
    <div class="bg-gradient-to-br from-orange-50 to-orange-100 border-2 border-dashed border-orange-300 rounded-2xl p-8">
        <form id="galeriUploadForm" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <input type="hidden" name="kod_kursus" value="{{ $kursus->kod_kursus }}">
            <input type="hidden" name="kod_institusi" value="{{ $kursus->institusi?->kod_institusi }}">

            <div class="flex flex-col items-center justify-center">
                <div class="w-full">
                    <label class="flex flex-col items-center justify-center w-full h-40 border-2 border-orange-300 border-dashed rounded-xl cursor-pointer bg-white hover:bg-orange-50 transition">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-12 h-12 text-orange-500 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <p class="text-sm text-gray-700 font-semibold">Klik atau seret gambar atau video ke sini</p>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF, WEBP, MP4, WEBM, OGG (Max 20MB setiap fail)</p>
                        </div>
                        <input type="file" name="imej[]" multiple accept="image/*,video/*" class="hidden" id="gambarInput">
                    </label>
                </div>

                <div id="filePreview" class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4 w-full"></div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-full transition">
                    <i class="fas fa-cloud-upload-alt mr-2"></i> Muat Naik Media
                </button>
                <button type="reset" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 rounded-full transition">
                    <i class="fas fa-times mr-2"></i> Kosongkan
                </button>
            </div>
        </form>
    </div>

    <!-- Existing Gallery -->
    <div>
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Media Sedia Ada</h3>
        @if($galleries && $galleries->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($galleries as $gallery)
                    <div class="group relative rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                        @php
                            $extension = strtolower(pathinfo($gallery->imej, PATHINFO_EXTENSION));
                            $isVideo = in_array($extension, ['mp4', 'webm', 'ogg']);
                        @endphp
                        @if($isVideo)
                            <video controls class="w-full h-48 object-cover bg-black">
                                <source src="{{ asset($gallery->imej) }}" type="video/{{ $extension }}">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset($gallery->imej) }}" alt="Gallery" class="w-full h-48 object-cover group-hover:opacity-80 transition">
                        @endif
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2">
                            <a href="{{ asset($gallery->imej) }}" target="_blank" class="bg-white text-gray-800 px-3 py-2 rounded-full text-sm font-semibold hover:bg-gray-100 transition">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                            <form action="/admin/galeri/{{ $gallery->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Padam gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-full text-sm font-semibold hover:bg-red-600 transition">
                                    <i class="fas fa-trash"></i> Padam
                                </button>
                            </form>
                        </div>
                        <div class="p-3 bg-white">
                            <p class="text-xs text-gray-600 truncate">{{ basename($gallery->imej) }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $gallery->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 bg-gray-50 rounded-xl border border-gray-200">
                <i class="fas fa-image text-4xl text-gray-300 mb-3"></i>
                <p class="text-gray-600 font-semibold">Tiada media dalam galeri</p>
                <p class="text-gray-500 text-sm">Muat naik media pertama anda di atas</p>
            </div>
        @endif
    </div>
</div>

<script>
document.getElementById('gambarInput').addEventListener('change', function() {
    const files = this.files;
    const preview = document.getElementById('filePreview');
    preview.innerHTML = '';

    if (files.length === 0) return;

    for (let file of files) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'relative rounded-lg overflow-hidden';

            if (file.type.startsWith('video/')) {
                div.innerHTML = `
                    <video controls class="w-full h-32 object-cover bg-black">
                        <source src="${e.target.result}" type="${file.type}">
                        Your browser does not support the video tag.
                    </video>
                    <div class="absolute inset-0 bg-black/30"></div>
                    <span class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded text-xs font-semibold">Baru</span>
                `;
            } else {
                div.innerHTML = `
                    <img src="${e.target.result}" alt="Preview" class="w-full h-32 object-cover">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <span class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded text-xs font-semibold">Baru</span>
                `;
            }

            preview.appendChild(div);
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('galeriUploadForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('/admin/galeri/store', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        }
    })
    .then(response => {
        if (!response.ok) throw new Error('Upload gagal');
        return response.json();
    })
    .then(data => {
        if (data.success) {
            document.getElementById('galeriUploadForm').reset();
            document.getElementById('filePreview').innerHTML = '';
            loadTab('galeri');
            showMessage(data.message, 'success');
        }
    })
    .catch(error => {
        showMessage(error.message || 'Ralat muat naik', 'error');
    });
});
</script>

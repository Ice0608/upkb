<style>
    body.admin-dark .admin-galeri-hero {
        border-color: rgba(148, 163, 184, 0.14) !important;
        background:
            radial-gradient(circle at top left, rgba(251, 146, 60, 0.12), transparent 24%),
            radial-gradient(circle at top right, rgba(59, 130, 246, 0.14), transparent 30%),
            linear-gradient(135deg, rgba(15, 23, 42, 0.98), rgba(30, 41, 59, 0.94) 48%, rgba(15, 23, 42, 0.98)) !important;
    }

    body.admin-dark .admin-galeri-title {
        color: #f8fafc !important;
    }

    body.admin-dark .admin-galeri-copy {
        color: #cbd5e1 !important;
    }

    body.admin-dark .admin-galeri-format {
        background: rgba(15, 23, 42, 0.82) !important;
        color: #e2e8f0 !important;
    }

    body.admin-dark .admin-galeri-dropzone {
        border-color: rgba(251, 146, 60, 0.65) !important;
        background: rgba(15, 23, 42, 0.82) !important;
    }

    body.admin-dark .admin-galeri-panel,
    body.admin-dark .admin-galeri-card,
    body.admin-dark .admin-galeri-empty,
    body.admin-dark .admin-galeri-modal {
        border-color: rgba(148, 163, 184, 0.18) !important;
        background: rgba(15, 23, 42, 0.82) !important;
    }

    body.admin-dark .admin-galeri-empty-icon,
    body.admin-dark .admin-galeri-icon {
        background: rgba(30, 41, 59, 0.94) !important;
        color: #fdba74 !important;
    }

    body.admin-dark .admin-galeri-modal-header {
        border-bottom-color: rgba(148, 163, 184, 0.14) !important;
    }

    body.admin-dark .admin-galeri-reset {
        background: rgba(15, 23, 42, 0.82) !important;
        color: #e2e8f0 !important;
    }

    body.admin-dark .admin-galeri-reset:hover {
        background: rgba(30, 41, 59, 0.94) !important;
        color: #fb923c !important;
    }
</style>

<div class="space-y-6">

    <div class="admin-galeri-hero rounded-[2rem] border border-orange-100 bg-gradient-to-br from-orange-50 via-white to-amber-50 p-6 shadow-sm">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h3 class="admin-galeri-title text-xl font-semibold text-gray-800">Muat Naik Media</h3>
                <p class="admin-galeri-copy mt-1 text-sm text-gray-500">Seret fail ke ruangan ini atau klik untuk pilih gambar dan video kursus.</p>
            </div>
            <div class="admin-galeri-format rounded-full bg-white px-4 py-2 text-sm font-semibold text-orange-700 shadow-sm">
                PNG, JPG, WEBP, MP4
            </div>
        </div>

        <form id="galeriUploadForm" action="{{ route('admin.storegaleri') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-5">
            @csrf
            <input type="hidden" name="kod_kursus" value="{{ $kursus->kod_kursus }}">
            <input type="hidden" name="kod_institusi" value="{{ $kursus->institusi?->kod_institusi }}">

            <label id="galeriDropzone" class="admin-galeri-dropzone flex min-h-[260px] w-full cursor-pointer flex-col items-center justify-center rounded-[1.75rem] border-2 border-dashed border-orange-300 bg-white px-6 py-10 text-center shadow-sm transition hover:border-orange-400 hover:bg-orange-50">
                <div class="admin-galeri-icon flex h-16 w-16 items-center justify-center rounded-full bg-orange-100 text-orange-600 shadow-sm">
                    <i class="fas fa-photo-film text-2xl"></i>
                </div>
                <p class="mt-5 text-base font-semibold text-gray-800">Klik atau seret gambar dan video ke sini</p>
                <p class="mt-2 max-w-md text-sm leading-6 text-gray-500">Sokong fail PNG, JPG, GIF, WEBP, MP4, WEBM dan OGG. Saiz maksimum 20MB untuk setiap fail.</p>
                <span class="mt-5 inline-flex items-center rounded-full bg-orange-500 px-5 py-2 text-sm font-semibold text-white shadow-sm">
                    Pilih Media
                </span>
                <input type="file" name="imej[]" multiple accept="image/*,video/*" class="hidden" id="gambarInput">
            </label>

            <div id="filePreview" class="grid grid-cols-2 gap-4 md:grid-cols-3 xl:grid-cols-4"></div>

            <div class="flex flex-col gap-3 sm:flex-row">
                <button type="submit" class="inline-flex flex-1 items-center justify-center rounded-full bg-orange-500 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-orange-600">
                    <i class="fas fa-cloud-upload-alt mr-2"></i> Muat Naik Media
                </button>
                <button type="reset" class="admin-galeri-reset inline-flex flex-1 items-center justify-center rounded-full bg-white px-6 py-3 font-semibold text-gray-700 ring-1 ring-gray-200 shadow-sm transition hover:bg-gray-50">
                    <i class="fas fa-rotate-left mr-2"></i> Kosongkan Pilihan
                </button>
            </div>
        </form>
    </div>

    <div class="admin-galeri-panel rounded-[2rem] border border-gray-200 bg-white p-6 shadow-sm">
        <div>
            <h3 class="text-xl font-semibold text-gray-800">Media Sedia Ada</h3>
            <p class="mt-1 text-sm text-gray-500">Senarai semua gambar dan video yang telah dimuat naik untuk kursus ini.</p>
        </div>

        @if($galleries && $galleries->count() > 0)
            <div class="mt-6 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
                @foreach($galleries as $gallery)
                    @php
                        $extension = strtolower(pathinfo($gallery->imej, PATHINFO_EXTENSION));
                        $isVideo = in_array($extension, ['mp4', 'webm', 'ogg']);
                    @endphp

                    <div class="admin-galeri-card group overflow-hidden rounded-[1.75rem] border border-gray-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <div class="relative">
                            @if($isVideo)
                                <video controls class="h-52 w-full object-cover bg-black">
                                    <source src="{{ asset($gallery->imej) }}" type="video/{{ $extension }}">
                                    Your browser does not support the video tag.
                                </video>
                                <span class="absolute left-4 top-4 rounded-full bg-black/70 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-white">
                                    Video
                                </span>
                            @else
                                <img src="{{ asset($gallery->imej) }}" alt="Gallery" class="h-52 w-full object-cover transition duration-300 group-hover:scale-105">
                                <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-gray-700 shadow-sm">
                                    Imej
                                </span>
                            @endif
                        </div>

                        <div class="space-y-4 p-4">
                            <div>
                                <p class="truncate text-sm font-semibold text-gray-800">{{ basename($gallery->imej) }}</p>
                                <p class="mt-1 text-xs text-gray-500">{{ $gallery->created_at->format('d/m/Y H:i') }}</p>
                            </div>

                            <div class="flex flex-col gap-2">
                                <button
                                    type="button"
                                    class="galeri-preview-trigger inline-flex items-center justify-center rounded-full bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-black"
                                    data-src="{{ asset($gallery->imej) }}"
                                    data-type="{{ $isVideo ? 'video' : 'image' }}"
                                    data-name="{{ basename($gallery->imej) }}"
                                >
                                    <i class="fas fa-eye mr-2"></i> Lihat Media
                                </button>
                                <form action="/admin/galeri/{{ $gallery->id }}" method="POST" onsubmit="return confirm('Padam gambar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex w-full items-center justify-center rounded-full bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 ring-1 ring-red-200 transition hover:bg-red-100 hover:text-red-700">
                                        <i class="fas fa-trash mr-2"></i> Padam
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="admin-galeri-empty mt-6 rounded-[1.75rem] border border-dashed border-gray-300 bg-gray-50 px-6 py-14 text-center">
                <div class="admin-galeri-empty-icon mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-white text-gray-300 shadow-sm">
                    <i class="fas fa-image text-3xl"></i>
                </div>
                <p class="mt-5 text-lg font-semibold text-gray-700">Tiada media dalam galeri</p>
                <p class="mt-2 text-sm text-gray-500">Muat naik media pertama untuk menjadikan paparan kursus lebih menarik.</p>
            </div>
        @endif
    </div>

    <div id="galeriPreviewModal" class="fixed inset-0 z-50 hidden bg-black/80 px-4 py-8">
            <div class="mx-auto flex h-full w-full max-w-5xl items-center justify-center">
            <div class="admin-galeri-modal relative w-full rounded-[1.75rem] bg-white p-4 shadow-2xl">
                <div class="admin-galeri-modal-header mb-4 flex items-center justify-between gap-4 border-b border-gray-200 pb-4">
                    <p id="galeriPreviewTitle" class="truncate text-sm font-semibold text-gray-700"></p>
                    <button type="button" id="galeriPreviewClose" class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-gray-600 transition hover:bg-gray-200 hover:text-gray-800">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div id="galeriPreviewBody" class="flex max-h-[75vh] items-center justify-center overflow-auto rounded-[1.25rem] bg-gray-950 p-2"></div>
            </div>
        </div>
    </div>
</div>

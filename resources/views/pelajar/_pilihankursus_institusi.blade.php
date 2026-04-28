@if($semuaKursus->isEmpty())
<div class="course-result-empty col-span-3 rounded-3xl p-10 text-center text-gray-500">
    <i class="fas fa-inbox text-4xl mb-4 opacity-50"></i>
    <p>Tiada institusi ditemui untuk kursus ini berdasarkan pilihan anda.</p>
</div>
@else
<div class="mb-6 flex flex-col gap-3 rounded-3xl border border-slate-200/80 bg-white/80 px-5 py-4 shadow-[0_18px_34px_rgba(15,23,42,0.05)] backdrop-blur sm:flex-row sm:items-center sm:justify-between">
    <div>
        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-orange-500">Hasil Padanan</p>
        <p class="mt-2 text-sm text-slate-500">{{ $semuaKursus->count() }} institusi menawarkan kursus ini mengikut pilihan semasa anda.</p>
    </div>
    <span class="inline-flex items-center gap-2 rounded-full bg-orange-50 px-4 py-2 text-sm font-semibold text-orange-600">
        <i class="fas fa-school text-xs"></i>
        Institusi bertauliah
    </span>
</div>

<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
    @foreach($semuaKursus as $kursus)
    <article class="course-result-card rounded-3xl flex flex-col h-full">
        @if(isset($pelajar) && $kursus->institusi)
            <a href="{{ route('pelajar.infokursus', ['pelajar' => $pelajar->id, 'kursus' => $kursus->id]) }}" class="group flex h-full flex-col text-current no-underline">
        @else
            <a href="{{ route('kursus.show', $kursus->id) }}" class="group flex h-full flex-col text-current no-underline">
        @endif
        <div class="course-result-media">
            <img src="{{ asset(optional($kursus->galeris->first())->imej ?? $kursus->institusi->gambar_institusi ?? 'images/default-course.jpg') }}"
                 alt="{{ $kursus->institusi->nama_institusi ?? 'Institusi' }}"
                 class="course-result-image w-full h-full object-cover">
            <div class="absolute inset-x-0 top-4 px-4 flex items-start justify-between gap-3">
                <span class="course-result-badge inline-flex items-center rounded-full px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.22em] text-white">
                    {{ $kursus->institusi->jenis_institusi ?? 'Institusi' }}
                </span>
                <span class="course-result-code inline-flex items-center rounded-full px-3 py-1 text-[0.68rem] font-semibold uppercase tracking-[0.2em]">
                    {{ $kursus->kod_kursus }}
                </span>
            </div>
            <div class="absolute inset-x-0 bottom-0 z-10 flex items-end justify-between gap-4 p-5 text-white">
                <div>
                    <p class="text-[0.68rem] font-semibold uppercase tracking-[0.34em] text-orange-100/90">Institusi</p>
                    <h3 class="mt-2 text-2xl font-extrabold text-white">{{ $kursus->institusi->nama_institusi ?? 'N/A' }}</h3>
                </div>
                <span class="course-result-arrow shrink-0">
                    <i class="fas fa-arrow-right"></i>
                </span>
            </div>
        </div>

        <div class="p-6 sm:p-7 flex flex-col flex-1">
            <div class="course-result-meta-grid mb-6 text-sm">
                <div class="course-result-meta flex items-start gap-3 rounded-2xl px-4 py-3">
                    <i class="fas fa-barcode text-orange-500 mt-0.5"></i>
                    <div>
                        <p class="text-xs text-gray-600 font-semibold uppercase">Kod Kursus</p>
                        <p class="text-gray-800 font-semibold">{{ $kursus->kod_kursus }}</p>
                    </div>
                </div>

                <div class="course-result-meta flex items-start gap-3 rounded-2xl px-4 py-3">
                    <i class="fas fa-book text-orange-500 mt-0.5"></i>
                    <div>
                        <p class="text-xs text-gray-600 font-semibold uppercase">Jenis Program</p>
                        <p class="text-gray-800 font-semibold pilihan-clamp-2">{{ $kursus->jenis_kursus }}</p>
                    </div>
                </div>

                <div class="course-result-meta flex items-start gap-3 rounded-2xl px-4 py-3">
                    <i class="fas fa-clock text-orange-500 mt-0.5"></i>
                    <div>
                        <p class="text-xs text-gray-600 font-semibold uppercase">Tempoh</p>
                        <p class="text-gray-800 font-semibold">{{ $kursus->tempoh }}</p>
                    </div>
                </div>

                <div class="course-result-meta flex items-start gap-3 rounded-2xl px-4 py-3">
                    <i class="fas fa-user-graduate text-orange-500 mt-0.5"></i>
                    <div>
                        <p class="text-xs text-gray-600 font-semibold uppercase">Mod Pengajian</p>
                        <p class="text-gray-800 font-semibold">{{ $kursus->mod_pengajian }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-auto flex items-center justify-between border-t border-slate-200/80 pt-5">
                <span class="text-sm font-semibold text-slate-800">Lihat detail kursus</span>
                <span class="course-result-cta inline-flex items-center gap-2 text-sm font-semibold">
                    Teroka
                    <i class="fas fa-arrow-right text-xs"></i>
                </span>
            </div>
        </div>
        </a>
    </article>
    @endforeach
</div>
@endif

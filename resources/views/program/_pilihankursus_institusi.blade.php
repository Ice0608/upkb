@if($semuaKursus->isEmpty())
<div class="course-result-empty col-span-3 rounded-3xl p-10 text-center text-gray-500 dark:text-slate-400">
    <i class="fas fa-inbox text-4xl mb-4 opacity-50"></i>
    <p>Tiada institusi ditemui untuk kursus ini berdasarkan pilihan anda.</p>
</div>
@else
<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
    @foreach($semuaKursus as $kursus)
    <article class="course-result-card rounded-3xl flex flex-col h-full">
        <a href="{{ route('kursus.show', $kursus->id) }}" class="group flex h-full flex-col text-current no-underline">
        <div class="course-result-media">
            <img src="{{ asset($kursus->institusi->gambar_institusi ?? 'images/default-course.jpg') }}"
                 alt="{{ $kursus->institusi->nama_institusi ?? 'Institusi' }}"
                 class="course-result-image w-full h-full object-cover">
            <div class="absolute inset-x-0 top-4 px-4 flex items-start justify-between gap-3">
                <span class="course-result-badge inline-flex items-center rounded-full px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.22em] text-white">
                    {{ $kursus->institusi->jenis_institusi ?? 'Institusi' }}
                </span>
            </div>
            <div class="absolute inset-x-0 bottom-0 z-10 flex items-end justify-between gap-4 p-5 text-white">
                <div>
                    <p class="pilihan-theme-soft-label text-[0.68rem] font-semibold uppercase tracking-[0.34em]">Institusi</p>
                    <h3 class="mt-2 text-2xl font-extrabold text-white">{{ $kursus->institusi->nama_institusi ?? 'N/A' }}</h3>
                </div>
                <span class="course-result-arrow shrink-0">
                    <i class="fas fa-arrow-right"></i>
                </span>
            </div>
        </div>

        <div class="px-6 pb-6 pt-0">
            <div class="flex items-center justify-between border-t border-slate-200/80 dark:border-white/10 pt-4">
                <span class="text-sm font-semibold text-slate-800 dark:text-slate-100">Lihat detail kursus</span>
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

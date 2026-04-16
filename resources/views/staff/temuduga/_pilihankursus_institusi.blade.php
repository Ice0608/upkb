@if($semuaKursus->isEmpty())
<div class="col-span-3 bg-white rounded-3xl p-10 text-center text-gray-500 shadow-sm border border-gray-100">
    <i class="fas fa-inbox text-4xl mb-4 opacity-50"></i>
    <p>Tiada institusi ditemui untuk kursus ini berdasarkan pilihan anda.</p>
</div>
@else
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($semuaKursus as $kursus)
    <div class="course-variation-card rounded-3xl bg-white shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl flex flex-col h-full">
        <div class="relative h-48 overflow-hidden">
            <img src="{{ asset(optional($kursus->galeris->first())->imej ?? $kursus->institusi->gambar_institusi ?? 'images/default-course.jpg') }}"
                 alt="{{ $kursus->institusi->nama_institusi ?? 'Institusi' }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            <div class="absolute inset-x-0 top-4 px-4 flex items-start justify-between gap-3">
                <span class="inline-flex items-center rounded-full bg-orange-600/95 px-3 py-1 text-xs font-semibold uppercase text-white shadow-sm">
                    {{ $kursus->institusi->jenis_institusi ?? 'Institusi' }}
                </span>
            </div>
        </div>

        <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-slate-900 mb-2">
                {{ $kursus->institusi->nama_institusi ?? 'N/A' }}
            </h3>

            <div class="space-y-3 mb-6 text-sm">
                <div class="flex items-start gap-3 p-3 rounded-2xl bg-gray-50">
                    <i class="fas fa-barcode text-orange-500 mt-0.5"></i>
                    <div>
                        <p class="text-xs text-gray-600 font-semibold uppercase">Kod Kursus</p>
                        <p class="text-gray-800 font-semibold">{{ $kursus->kod_kursus }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-3 rounded-2xl bg-gray-50">
                    <i class="fas fa-book text-orange-500 mt-0.5"></i>
                    <div>
                        <p class="text-xs text-gray-600 font-semibold uppercase">Jenis Program</p>
                        <p class="text-gray-800 font-semibold">{{ $kursus->jenis_kursus }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-3 rounded-2xl bg-gray-50">
                    <i class="fas fa-clock text-orange-500 mt-0.5"></i>
                    <div>
                        <p class="text-xs text-gray-600 font-semibold uppercase">Tempoh</p>
                        <p class="text-gray-800 font-semibold">{{ $kursus->tempoh }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-3 rounded-2xl bg-gray-50">
                    <i class="fas fa-user-graduate text-orange-500 mt-0.5"></i>
                    <div>
                        <p class="text-xs text-gray-600 font-semibold uppercase">Mod Pengajian</p>
                        <p class="text-gray-800 font-semibold">{{ $kursus->mod_pengajian }}</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('kursus.show', $kursus->id) }}"
               class="inline-flex items-center justify-between w-full rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:bg-orange-600 transition mt-auto">
                <span>Lihat Detail</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endif

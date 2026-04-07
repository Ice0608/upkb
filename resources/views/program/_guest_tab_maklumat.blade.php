<div class="p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Maklumat Am</h2>
    <div class="grid gap-6 md:grid-cols-3 mb-8">
        <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
            <p class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-2">Kod kursus</p>
            <p class="font-semibold text-slate-900">{{ $kursus->kod_kursus ?? '-' }}</p>
        </div>
        <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
            <p class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-2">Tempoh</p>
            <p class="font-semibold text-slate-900">{{ $kursus->tempoh ?? '-' }}</p>
        </div>
        <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
            <p class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-2">Mod Pengajian</p>
            <p class="font-semibold text-slate-900">{{ $kursus->mod_pengajian ?? '-' }}</p>
        </div>
    </div>
    <div class="grid gap-6 md:grid-cols-3 mb-8">
        <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
            <p class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-2">Jenis Program</p>
            <p class="font-semibold text-slate-900">{{ $kursus->jenis_kursus ?? '-' }}</p>
        </div>
        <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
            <p class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-2">Kuota Pelajar</p>
            <p class="font-semibold text-slate-900">{{ $kursus->kuota ?? '-' }}</p>
        </div>
        <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
            <p class="text-sm uppercase tracking-[0.2em] text-gray-500 mb-2">Tarikh Pendaftaran</p>
            <p class="font-semibold text-slate-900">{{ optional($kursus->tarikh_pendaftaran)->format('d/m/Y') ?? '-' }}</p>
        </div>
    </div>
    <div class="rounded-3xl border border-gray-200 p-6 bg-gray-50">
        <h3 class="font-semibold text-gray-800 mb-3">Penerangan Program</h3>
        <p class="text-gray-600 leading-relaxed">{{ $kursus->penerangan }}</p>
    </div>
</div>

<div class="kursus-tab-section">
    <h2 class="kursus-tab-title">Maklumat Am</h2>
    <div class="grid gap-6 md:grid-cols-3 mb-8">
        <div class="kursus-tab-card rounded-3xl p-6">
            <p class="kursus-tab-label mb-2">Kod kursus</p>
            <p class="font-semibold text-slate-900">{{ $kursus->kod_kursus ?? '-' }}</p>
        </div>
        <div class="kursus-tab-card rounded-3xl p-6">
            <p class="kursus-tab-label mb-2">Tempoh</p>
            <p class="font-semibold text-slate-900">{{ $kursus->tempoh ?? '-' }}</p>
        </div>
        <div class="kursus-tab-card rounded-3xl p-6">
            <p class="kursus-tab-label mb-2">Mod Pengajian</p>
            <p class="font-semibold text-slate-900">{{ $kursus->mod_pengajian ?? '-' }}</p>
        </div>
    </div>
    <div class="grid gap-6 md:grid-cols-3 mb-8">
        <div class="kursus-tab-card rounded-3xl p-6">
            <p class="kursus-tab-label mb-2">Jenis Program</p>
            <p class="font-semibold text-slate-900">{{ $kursus->jenis_kursus ?? '-' }}</p>
        </div>
        <div class="kursus-tab-card rounded-3xl p-6">
            <p class="kursus-tab-label mb-2">Kuota Pelajar</p>
            <p class="font-semibold text-slate-900">{{ $kursus->kuota ?? '-' }}</p>
        </div>
        <div class="kursus-tab-card rounded-3xl p-6">
            <p class="kursus-tab-label mb-2">Tarikh Pendaftaran</p>
            <p class="font-semibold text-slate-900">{{ optional($kursus->tarikh_pendaftaran)->format('d/m/Y') ?? '-' }}</p>
        </div>
    </div>
    <div class="kursus-tab-card kursus-tab-card-strong rounded-3xl p-6">
        <h3 class="kursus-tab-accent-strong font-semibold mb-3">Penerangan Program</h3>
        <p class="text-gray-600 leading-relaxed">{{ $kursus->penerangan }}</p>
    </div>
</div>

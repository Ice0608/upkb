<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; color: #222; margin: 0; padding: 0; }
        .page { padding: 24px; }
        .section { margin-bottom: 18px; }
        .heading { font-size: 18px; margin-bottom: 10px; border-bottom: 1px solid #ddd; padding-bottom: 6px; }
        .card { border: 1px solid #ddd; border-radius: 10px; padding: 12px; margin-bottom: 10px; }
        .small { color: #555; font-size: 12px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 8px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .table th { background: #f5f5f5; }
    </style>
</head>
<body>
    <div class="page">
        <div class="section">
            <h1 class="heading">{{ $kursus->nama_kursus }}</h1>
            <p class="small">{{ $kursus->institusi->nama_institusi }} | {{ $kursus->institusi->alamat }}</p>
            <p class="small">Kod: {{ $kursus->kod_kursus }} · Mod: {{ $kursus->mod_pengajian }} · Tempoh: {{ $kursus->tempoh }}</p>
        </div>

        <div class="section card">
            <h2 class="heading">Penerangan Program</h2>
            <p>{{ $kursus->penerangan }}</p>
        </div>

        <div class="section card">
            <h2 class="heading">Syarat Kelayakan</h2>
            @forelse($kursus->syaratKelayakans as $item)
                @if($item->gambar)
                    <img src="{{ public_path($item->gambar) }}" alt="Syarat Kelayakan" style="max-width:100%; margin-bottom:8px; display:block;" />
                @else
                    <p>Tiada imej syarat kelayakan direkodkan.</p>
                @endif
            @empty
                <p>Tiada syarat kelayakan direkodkan.</p>
            @endforelse
        </div>

        <div class="section card">
            <h2 class="heading">Struktur Silibus</h2>
            <table class="table">
                <thead>
                    <tr><th>Topik</th><th>Isi Kandungan</th></tr>
                </thead>
                <tbody>
                    @forelse($kursus->silibuses as $item)
                        <tr><td>{{ $item->topik }}</td><td>{{ $item->isi_kandungan }}</td></tr>
                    @empty
                        <tr><td colspan="2">Tiada silibus direkodkan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="section card">
            <h2 class="heading">Laluan Kerjaya</h2>
            @forelse($kursus->kerjayas as $item)
                @if($item->gambar)
                    <img src="{{ public_path($item->gambar) }}" alt="Laluan Kerjaya" style="max-width:100%; margin-bottom:8px; display:block;" />
                @else
                    <p>Tiada imej laluan kerjaya direkodkan.</p>
                @endif
            @empty
                <p>Tiada laluan kerjaya direkodkan.</p>
            @endforelse
        </div>

        <div class="section card">
            <h2 class="heading">Yuran & Pinjaman</h2>
            <table class="table">
                <thead>
                    <tr><th>Jenis</th><th>Item</th><th>Jumlah</th></tr>
                </thead>
                <tbody>
                    @foreach($kursus->yuranPendaftarans as $fee)
                        <tr><td>Yuran Pendaftaran</td><td>{{ $fee->item }}</td><td>RM {{ number_format($fee->amount, 2) }}</td></tr>
                    @endforeach
                    @foreach($kursus->yuranPilihans as $fee)
                        <tr><td>Yuran Pilihan</td><td>{{ $fee->pilihan }} - {{ $fee->item }}</td><td>RM {{ number_format($fee->amount, 2) }}</td></tr>
                    @endforeach
                    @foreach($kursus->yuranAsramas as $fee)
                        <tr><td>Yuran Asrama</td><td>{{ $fee->item }}</td><td>RM {{ number_format($fee->amount, 2) }}</td></tr>
                    @endforeach
                    @foreach($kursus->yuranPengajians as $fee)
                        <tr><td>Yuran Pengajian</td><td>{{ $fee->peringkat }} / {{ $fee->tempoh }}</td><td>RM {{ number_format($fee->amount, 2) }}</td></tr>
                    @endforeach
                    @foreach($kursus->elauns as $fee)
                        <tr><td>Elaun</td><td>{{ $fee->elaun_bulanan }} / {{ $fee->tempoh }}</td><td>RM {{ number_format($fee->jumlah, 2) }}</td></tr>
                    @endforeach
                    @if($kursus->yuranPendaftarans->isEmpty() && $kursus->yuranPilihans->isEmpty() && $kursus->yuranAsramas->isEmpty() && $kursus->yuranPengajians->isEmpty() && $kursus->elauns->isEmpty())
                        <tr><td colspan="3">Tiada yuran atau elaun direkodkan.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

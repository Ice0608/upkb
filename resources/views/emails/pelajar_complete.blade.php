<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahniah! Permohonan Anda Telah Selesai</title>
    <style>
        body { margin: 0; padding: 0; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #f8fafc; color: #0f172a; }
        .email-container { width: 100%; max-width: 640px; margin: 0 auto; padding: 24px; }
        .card { background: #ffffff; border-radius: 24px; padding: 32px; box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08); }
        .badge { display: inline-flex; align-items: center; justify-content: center; padding: 0.5rem 1rem; border-radius: 999px; background: #f97316; color: white; font-weight: 700; letter-spacing: 0.03em; margin-bottom: 1.25rem; }
        h1 { margin: 0 0 1rem; font-size: 2rem; line-height: 1.05; }
        p { margin: 0 0 1rem; line-height: 1.7; color: #334155; }
        .info-box { background: #f1f5f9; border-radius: 1rem; padding: 1.5rem; margin: 1.5rem 0; }
        .info-label { display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; color: #334155; margin-bottom: 0.35rem; }
        .info-value { font-size: 1rem; font-weight: 600; color: #0f172a; }
        .button { display: inline-flex; align-items: center; justify-content: center; padding: 0.95rem 1.5rem; border-radius: 999px; background: #f97316; color: #ffffff; text-decoration: none; font-weight: 700; }
        .footer { margin-top: 2rem; font-size: 0.9rem; color: #64748b; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="card">
            <span class="badge">TAHNIAH</span>
            <h1>Permohonan Anda Telah Selesai</h1>
            <p>Salam <strong>{{ $pelajar->nama_pelajar }}</strong>,</p>
            <p>Terima kasih kerana melengkapkan proses temu duga. Status pembayaran anda telah dikemaskini kepada <strong>Pending</strong>.</p>
            <div class="info-box">
                <div>
                    <span class="info-label">Nama</span>
                    <span class="info-value">{{ $pelajar->nama_pelajar }}</span>
                </div>
                <div style="margin-top:0.75rem;">
                    <span class="info-label">No. K/P</span>
                    <span class="info-value">{{ $pelajar->ic_pelajar }}</span>
                </div>
                    <div style="margin-top:0.75rem;">
                        <span class="info-label">Nama Institusi</span>
                        <span class="info-value">{{ $institusi->nama_institusi ?? ($pelajar->kod_institusi ?? '-') }}</span>
                    </div>
                    <div style="margin-top:0.75rem;">
                        <span class="info-label">Program Pengajian</span>
                        <span class="info-value">{{ $program ?? ($pelajar->program ?? '-') }}</span>
                    </div>
                @if($pelajar->kod_kursus)
                <div style="margin-top:0.75rem;">
                    <span class="info-label">Kursus</span>
                    <span class="info-value">{{ $pelajar->kod_kursus }}</span>
                </div>
                @endif
            </div>
            <p>Sila simpan email ini sebagai rujukan. Sekiranya anda mempunyai sebarang pertanyaan, anda boleh menghubungi pihak kami melalui laman web rasmi.</p>
            <a href="{{ url('/') }}" class="button">Kembali ke Laman Utama</a>
            <p class="footer">UPKB<br>Terima kasih kerana memilih kami.</p>
        </div>
    </div>
</body>
</html>

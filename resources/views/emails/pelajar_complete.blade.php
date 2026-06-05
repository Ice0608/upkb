<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Anda Telah Selesai</title>
</head>
<body style="margin:0;padding:0;background:#eef2f7;color:#0f172a;font-family:Arial,Helvetica,sans-serif;">
    <div style="display:none;max-height:0;overflow:hidden;color:#eef2f7;">
        Permohonan anda telah selesai dan sedang diproses oleh pihak kami.
    </div>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#eef2f7;padding:28px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:640px;background:#ffffff;border:1px solid #dbe3ec;border-radius:10px;overflow:hidden;">
                    <tr>
                        <td style="background:#0f766e;padding:24px 28px;color:#ffffff;">
                            <div style="font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;opacity:.9;">Smart Education Society</div>
                            <h1 style="margin:8px 0 0;font-size:24px;line-height:31px;font-weight:700;">Permohonan Anda Telah Selesai</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px;">
                            <p style="margin:0 0 14px;font-size:15px;line-height:24px;color:#334155;">
                                Salam <strong style="color:#0f172a;">{{ $pelajar->nama_pelajar }}</strong>,
                            </p>
                            <p style="margin:0 0 18px;font-size:15px;line-height:24px;color:#334155;">
                                Terima kasih kerana melengkapkan proses temu duga. Maklumat permohonan anda telah diterima dan status pembayaran kini berada pada peringkat semakan.
                            </p>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin:0 0 20px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;">
                                <tr>
                                    <td style="padding:16px 18px;">
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding:0 0 10px;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;">Nama</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 0 14px;color:#0f172a;font-size:15px;font-weight:700;">{{ $pelajar->nama_pelajar }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 0 10px;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;">No. K/P</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 0 14px;color:#0f172a;font-size:15px;font-weight:700;">{{ $pelajar->ic_pelajar }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 0 10px;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;">Institusi</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 0 14px;color:#0f172a;font-size:15px;font-weight:700;">{{ $institusi->nama_institusi ?? ($pelajar->kod_institusi ?? '-') }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 0 10px;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;">Program Pengajian</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;color:#0f172a;font-size:15px;font-weight:700;">{{ $kursus->nama_kursus ?? ($program ?? ($pelajar->program ?? '-')) }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:0 0 22px;font-size:15px;line-height:24px;color:#334155;">
                                Sila simpan email ini sebagai rujukan. Pihak kami akan menghubungi anda sekiranya terdapat maklumat tambahan yang diperlukan.
                            </p>

                            <a href="{{ url('/') }}" style="display:inline-block;background:#0f766e;color:#ffffff;text-decoration:none;font-weight:700;font-size:14px;line-height:20px;padding:12px 22px;border-radius:6px;">Kembali ke Laman Utama</a>

                            <p style="margin:22px 0 0;border-top:1px solid #e2e8f0;padding-top:18px;color:#64748b;font-size:12px;line-height:18px;">
                                Email ini dijana oleh sistem Smart Education Society. Terima kasih kerana memilih kami.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

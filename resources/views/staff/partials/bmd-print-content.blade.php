<style>
    .bmd-print-root,
    .bmd-print-root * {
        box-sizing: border-box;
    }

    @page {
        size: A4;
        margin: 0;
    }

    .bmd-print-root {
        width: 210mm;
        height: 297mm;
        background: #fff;
        margin: 0;
        padding: 0;
        overflow: hidden;
        font-family: 'Helvetica', 'Arial', sans-serif;
        color: #000;
        font-size: 10.5px;
        line-height: 1.3;
    }

    .bmd-print-sheet {
        width: 210mm;
        height: 297mm;
        padding: 8mm 10mm 7mm;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 5px;
        overflow: hidden;
    }

    .bmd-print-root .header-container {
        position: relative;
        padding-bottom: 7px;
        border-bottom: 1.8px solid #000;
        text-align: center;
    }

    .bmd-print-root .logos-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-bottom: 6px;
    }

    .bmd-print-root .logos-wrapper img {
        width: auto;
        height: 46px;
        object-fit: contain;
    }

    .bmd-print-root .header-title {
        margin: 0;
        color: #002060;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .bmd-print-root .header-subtitle {
        margin: 2px 0 0;
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .bmd-print-root .ref-number {
        position: absolute;
        top: 0;
        left: 0;
        font-size: 9.5px;
    }

    .bmd-print-root .section-title {
        margin: 0 0 4px;
        padding-bottom: 2px;
        border-bottom: 1px solid #000;
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .bmd-print-root .print-section {
        page-break-inside: avoid;
        break-inside: avoid;
    }

    .bmd-print-root .info-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .bmd-print-root .info-table td {
        padding: 4px 6px;
        border: 0.5px solid #666;
        vertical-align: top;
        word-break: break-word;
    }

    .bmd-print-root .label {
        width: 20%;
        background-color: #f9f9f9;
        font-size: 9px;
        font-weight: 700;
    }

    .bmd-print-root .label-sub {
        display: block;
        color: #333;
        font-size: 7.8px;
        font-weight: 400;
    }

    .bmd-print-root .value {
        width: 30%;
        text-transform: uppercase;
    }

    .bmd-print-root .declaration {
        padding-top: 6px;
        border-top: 1px solid #000;
    }

    .bmd-print-root .declaration-title {
        margin-bottom: 4px;
        font-weight: 700;
        text-align: center;
        text-transform: uppercase;
    }

    .bmd-print-root .declaration p {
        margin: 2px 0;
        font-size: 9px;
    }

    .bmd-print-root .signature-section {
        display: flex;
        justify-content: space-between;
        gap: 12px;
    }

    .bmd-print-root .signature-block {
        width: 48%;
    }

    .bmd-print-root .signature-line {
        margin: 28px 0 4px;
        border-bottom: 1px solid #000;
    }

    .bmd-print-root .signature-label {
        font-size: 8.5px;
        text-align: center;
    }

    .bmd-print-root .footer {
        color: #555;
        font-size: 7.5px;
        text-align: center;
    }

    @media print {
        .bmd-print-root {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .bmd-print-root .print-section,
        .bmd-print-root .declaration,
        .bmd-print-root .signature-section,
        .bmd-print-sheet {
            page-break-inside: avoid !important;
            break-inside: avoid !important;
        }
    }
</style>

<div class="bmd-print-root">
<div class="bmd-print-sheet">
    <div class="header-container">
        <div class="ref-number">SES/{{ now()->format('Y-m-d') }}/{{ str_pad(\App\Models\Pelajar::where('event_id', $pelajar->event_id)->where(function($q) use ($pelajar) { $q->where('tarikh_pendaftaran', '<', $pelajar->tarikh_pendaftaran)->orWhere('tarikh_pendaftaran', '=', $pelajar->tarikh_pendaftaran)->where('id', '<', $pelajar->id); })->count() + 1, 3, '0', STR_PAD_LEFT) }}</div>

        <div class="logos-wrapper">
            <img src="/images/icon/seslogoo.png" alt="Logo SES">
        </div>

        <h1 class="header-title">Borang Permohonan & Temuduga</h1>
        <p class="header-subtitle">APPLICATION & INTERVIEW FORM</p>
    </div>

    <div class="print-section">
        <div class="section-title">1. Maklumat Pemohon / Applicant Information</div>
        <table class="info-table">
            <tr>
                <td class="label">Nombor Rujukan / <span class="label-sub">Referral Number:</span></td>
                <td class="value">{{ $pelajar->noreff ?? '-' }}</td>
                <td class="label">Tarikh Pendaftaran / <span class="label-sub">Date:</span></td>
                <td class="value">{{ $pelajar->tarikh_pendaftaran?->format('d/m/Y') ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Program Dipilih / <span class="label-sub">Applied Programme:</span></td>
                <td class="value">{{ $pelajar->program ?? '-' }}</td>
                <td class="label">SPM Total Credit:</td>
                <td class="value">{{ $pelajar->spm_credit ?? '0' }}</td>
            </tr>
            <tr>
                <td class="label">Nama Penuh (IC) / <span class="label-sub">Full Name (as per IC):</span></td>
                <td colspan="3" class="value" style="font-weight: 700;">{{ $pelajar->nama_pelajar ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="print-section">
        <div class="section-title">2. Maklumat Peribadi / Personal Details</div>
        <table class="info-table">
            <tr>
                <td class="label">No. Kad Pengenalan / <span class="label-sub">IC No.:</span></td>
                <td class="value">{{ $pelajar->ic_pelajar ?? '-' }}</td>
                <td class="label">Status Perkahwinan / <span class="label-sub">Marital Status:</span></td>
                <td class="value">{{ $pelajar->status_perkahwinan ?? 'SINGLE' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat Emel / <span class="label-sub">Email Address:</span></td>
                <td class="value" style="text-transform: lowercase;">{{ $pelajar->email ?? '-' }}</td>
                <td class="label">No. Telefon / <span class="label-sub">Phone Number:</span></td>
                <td class="value">{{ $pelajar->no_tel ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="print-section">
        <div class="section-title">3. Maklumat Alamat / Address Details</div>
        <table class="info-table">
            <tr>
                <td class="label">Alamat Baris / <span class="label-sub">Address Line:</span></td>
                <td colspan="3" class="value">
                    {{ $pelajar->address_line1 ?? '-' }}{{ $pelajar->address_line2 ? ', ' . $pelajar->address_line2 : '' }}
                </td>
            </tr>
            <tr>
                <td class="label">Bandar / <span class="label-sub">City:</span></td>
                <td class="value">{{ $pelajar->city ?? '-' }}</td>
                <td class="label">Poskod / <span class="label-sub">Postcode:</span></td>
                <td class="value">{{ $pelajar->postcode ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Negeri / <span class="label-sub">State:</span></td>
                <td colspan="3" class="value">{{ $pelajar->region ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="print-section">
        <div class="section-title">4. Maklumat Bapa / Father's Information</div>
        <table class="info-table">
            <tr>
                <td class="label">Nama Penuh / <span class="label-sub">Full Name:</span></td>
                <td colspan="3" class="value">{{ $pelajar->nama_bapa ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">No. Kad Pengenalan / <span class="label-sub">IC No.:</span></td>
                <td class="value">{{ $pelajar->ic_bapa ?? '-' }}</td>
                <td class="label">No. Telefon / <span class="label-sub">Phone Number:</span></td>
                <td class="value">{{ $pelajar->no_tel_bapa ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan / <span class="label-sub">Occupation:</span></td>
                <td class="value">{{ $pelajar->pekerjaan_bapa ?? '-' }}</td>
                <td class="label">Pendapatan Bulanan / <span class="label-sub">Monthly Income (RM):</span></td>
                <td class="value">{{ number_format((float) ($pelajar->pendapatan_bapa ?? 0), 2) }}</td>
            </tr>
        </table>
    </div>

    <div class="print-section">
        <div class="section-title">5. Maklumat Ibu / Mother's Information</div>
        <table class="info-table">
            <tr>
                <td class="label">Nama Penuh / <span class="label-sub">Full Name:</span></td>
                <td colspan="3" class="value">{{ $pelajar->nama_ibu ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">No. Kad Pengenalan / <span class="label-sub">IC No.:</span></td>
                <td class="value">{{ $pelajar->ic_ibu ?? '-' }}</td>
                <td class="label">No. Telefon / <span class="label-sub">Phone Number:</span></td>
                <td class="value">{{ $pelajar->no_tel_ibu ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan / <span class="label-sub">Occupation:</span></td>
                <td class="value">{{ $pelajar->pekerjaan_ibu ?? '-' }}</td>
                <td class="label">Pendapatan Bulanan / <span class="label-sub">Monthly Income (RM):</span></td>
                <td class="value">{{ number_format((float) ($pelajar->pendapatan_ibu ?? 0), 2) }}</td>
            </tr>
            <tr>
                <td class="label">Bil. Tanggungan / <span class="label-sub">No. of Dependants:</span></td>
                <td colspan="3" class="value">{{ $pelajar->jumlah_tanggungan ?? 0 }}</td>
            </tr>
        </table>
    </div>

    <div class="print-section">
        <div class="section-title">6. Kursus Dipilih / Selected Course</div>
        <table class="info-table">
            <tr>
                <td class="label">Kod Institusi / <span class="label-sub">Institution Code:</span></td>
                <td class="value">{{ $pelajar->kod_institusi ?? '-' }}</td>
                <td class="label">Kod Kursus / <span class="label-sub">Course Code:</span></td>
                <td class="value">{{ $pelajar->kod_kursus ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="print-section declaration">
        <div class="declaration-title">Pengakuan dan Tandatangan / Declaration & Signature</div>
        <p>Saya dengan ini mengaku bahawa semua maklumat yang diberikan dalam borang permohonan ini adalah benar, lengkap, dan tepat mengikut pengetahuan saya.</p>
        <p><i>I hereby declare that all information given in this application form is true, complete, and accurate to the best of my knowledge.</i></p>
    </div>

    <div class="signature-section">
        <div class="signature-block">
            <div class="signature-line"></div>
            <div class="signature-label">
                Tandatangan Pemohon / Applicant's Signature<br>
                Nama: {{ $pelajar->nama_pelajar }}<br>
                Tarikh: {{ now()->format('d/m/Y') }}
            </div>
        </div>

        <div class="signature-block">
            <div class="signature-line"></div>
            <div class="signature-label">
                Tandatangan Pegawai Temuduga / Interview Officer's Signature<br>
                Tarikh: {{ now()->format('d/m/Y') }}
            </div>
        </div>
    </div>

    <div class="footer">
        Borang ini telah dicetak secara digital pada {{ now()->format('d/m/Y H:i') }}
    </div>
</div>
</div>

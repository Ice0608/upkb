<!DOCTYPE html>
<html lang="ms">
<head>
<meta charset="UTF-8">
<title>BMD - {{ $pelajar->nama_pelajar }}</title>

<style>
    @page {
        size: A4;
        margin: 0;
    }
    body {
        font-family: 'Helvetica', 'Arial', sans-serif;
        background: #fff;
        color: #000;
        font-size: 10.5px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
    }
    .page {
        width: 185mm;
        margin: auto;
        padding: 10mm 12mm;
    }
    /* HEADER */
    /* Kemas kini Header supaya semuanya duduk di tengah */
    .header-container {
        text-align: center; /* Memastikan teks duduk tengah */
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
        margin-bottom: 15px;
        position: relative;
    }

    .logos-wrapper {
        display: flex;
        justify-content: center; /* Logo duduk tengah */
        align-items: center;
        gap: 15px;
        margin-bottom: 8px;
    }

    /* Memastikan kedua-dua logo sama saiz */
    .logos-wrapper img {
        height: 50px; /* Saiz yang seimbang */
        width: auto;
        object-fit: contain;
    }

    .header-title {
        font-weight: bold;
        font-size: 16px;
        text-transform: uppercase;
        margin: 0;
        color: #002060; /* Warna biru gelap seperti dalam rujukan */
    }

    .header-subtitle {
        font-weight: bold;
        font-size: 11px;
        text-transform: uppercase;
        margin: 2px 0 0 0;
    }

    /* No Rujukan di penjuru kiri atas */
    .ref-number {
        position: absolute;
        top: -5px;
        left: 0;
        font-size: 10px;
    }

    /* SECTION */
    .section-title {
        font-weight: bold;
        font-size: 11px;
        margin-top: 12px;
        margin-bottom: 4px;
        text-transform: uppercase;
        border-bottom: 1px solid #000;
        padding-bottom: 2px;
    }

    /* TABLE */
    .info-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 8px;
    }
    .info-table td {
        border: 0.5px solid #666;
        padding: 4px 8px;
        vertical-align: top;
    }
    .label {
        background-color: #f9f9f9;
        font-weight: bold;
        width: 20%;
        font-size: 9.5px;
    }
    .label-sub {
        font-size: 8.5px;
        font-weight: normal;
        display: block;
        color: #333;
    }
    .value {
        width: 30%;
        text-transform: uppercase;
    }

    /* PROGRAM CHOICES */
    .choices-grid {
        display: flex;
        gap: 10px;
        margin-top: 5px;
    }
    .choice-item {
        flex: 1;
        border: 0.5px solid #000;
        padding: 5px;
        text-align: center;
    }
    .choice-header {
        font-weight: bold;
        font-size: 8.5px;
        border-bottom: 0.5px solid #ccc;
        margin-bottom: 4px;
        padding-bottom: 2px;
    }
    .choice-value {
        font-size: 10px;
        min-height: 15px;
    }

    /* DECLARATION */
    .declaration {
        margin-top: 15px;
        border-top: 1.5px solid #000;
        padding-top: 8px;
    }
    .declaration-title {
        text-align: center;
        font-weight: bold;
        margin-bottom: 5px;
        text-transform: uppercase;
    }
    .declaration p {
        margin: 2px 0;
        font-size: 10px;
    }

    /* SIGNATURE */
    .signature-section {
        margin-top: 25px;
        display: flex;
        justify-content: space-between;
    }
    .signature-block {
        width: 45%;
    }
    .signature-line {
        border-bottom: 1px solid #000;
        margin-top: 40px;
        margin-bottom: 4px;
    }
    .signature-label {
        font-size: 9px;
        text-align: center;
    }

    .footer {
        text-align: center;
        font-size: 8px;
        margin-top: 20px;
        color: #555;
    }

    @media print {
        body { -webkit-print-color-adjust: exact; }
    }
</style>
</head>

<body>
<div class="page">
    <div class="header-container">
        <div class="ref-number">SES.KUL.01.3779</div>
        
        <div class="logos-wrapper">
            <img src="/images/icon/SES LOGO RENEW.png" alt="Logo SES">
            <img src="/images/icon/noBgLogo.jpeg" alt="Logo UPKB">
        </div>
        
        <h1 class="header-title">Borang Permohonan & Temuduga</h1>
        <p class="header-subtitle">APPLICATION & INTERVIEW FORM</p>
    </div>

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
            <td colspan="3" class="value" style="font-weight: bold;">{{ $pelajar->nama_pelajar ?? '-' }}</td>
        </tr>
    </table>

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

    <div class="section-title">3. Maklumat Alamat / Address Details</div>
    <table class="info-table">
        <tr>
            <td class="label">Alamat Baris / <span class="label-sub">Address Line:</span></td>
            <td colspan="3" class="value">
                {{ $pelajar->address_line1 ?? '-' }} {{ $pelajar->address_line2 ? ', ' . $pelajar->address_line2 : '' }}
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
            <td class="value">{{ number_format((float)($pelajar->pendapatan_bapa ?? 0), 2) }}</td>
        </tr>
    </table>

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
            <td class="value">{{ number_format((float)($pelajar->pendapatan_ibu ?? 0), 2) }}</td>
        </tr>
        <tr>
            <td class="label">Bil. Tanggungan / <span class="label-sub">No. of Dependants:</span></td>
            <td colspan="3" class="value">{{ $pelajar->jumlah_tanggungan ?? 0 }}</td>
        </tr>
    </table>

    <div class="section-title">6. Kursus Dipilih / Selected Course</div>
    <table class="info-table" style="margin-top: 5px;">
        <tr>
            <td class="label" style="width: 25%;">Nama Kursus / <span class="label-sub">Course Name:</span></td>
            <td colspan="3" class="value" style="font-weight: bold; font-size: 11px;">
                {{ $pelajar->pilihan_pertama ?? '-' }}
            </td>
        </tr>
        <tr>
            <td class="label">Kod Institusi / <span class="label-sub">Institution Code:</span></td>
            <td class="value">{{ $pelajar->kod_institusi ?? '-' }}</td>
            <td class="label">Kod Kursus / <span class="label-sub">Course Code:</span></td>
            <td class="value">{{ $pelajar->kod_kursus ?? '-' }}</td>
        </tr>
    </table>

    <div class="declaration">
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
</body>
</html>
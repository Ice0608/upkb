<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resit - {{ $pelajar->nama_pelajar }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @page {
            size: A4 portrait;
            margin: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .page {
            width: 210mm;
            height: 297mm;
            background-color: white;
            margin: 0 auto;
            padding: 8mm;
            display: flex;
            flex-direction: column;
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 8mm;
            margin-bottom: 6mm;
            border-bottom: 2px solid #000;
            padding-bottom: 4mm;
        }

        .logo {
            width: 30mm;
            height: auto;
        }

        .logo-cell {
            width: 30mm;
            flex-shrink: 0;
        }

        .header-center {
            flex: 1;
            text-align: center;
        }

        .org-registry {
            font-size: 9px;
            font-weight: bold;
            color: #000;
        }

        .org-presenting {
            font-size: 8px;
            color: #000;
            margin-bottom: 2mm;
        }

        .org-name {
            font-size: 14px;
            font-weight: bold;
            color: #000;
            letter-spacing: 1px;
            margin: 1mm 0;
        }

        .org-address {
            font-size: 8px;
            color: #555;
            line-height: 1.3;
        }

        .header-right {
            font-size: 9px;
            line-height: 1.8;
            min-width: 45mm;
        }

        .resit-label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: fit-content;
            padding: 0.9rem 1.5rem;
            background: #111;
            color: #fff;
            border-radius: 999px;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-top: 6mm;
            margin-bottom: 6mm;
        }

        .header-field {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2mm;
        }

        .header-label {
            font-weight: bold;
            min-width: 15mm;
        }

        .header-line {
            border-bottom: 1px solid #000;
            flex: 1;
            margin-left: 2mm;
        }

        /* CONTENT */
        .details {
            display: flex;
            flex-direction: column;
            gap: 4mm;
            margin-bottom: 6mm;
            font-size: 9px;
        }

        .details-row {
            display: flex;
            gap: 5mm;
            align-items: flex-end;
            justify-content: space-between;
        }

        .detail-field {
            display: flex;
            align-items: center;
            gap: 4mm;
            flex: 1;
            min-width: 0;
        }

        .detail-label {
            font-weight: bold;
            font-size: 9px;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .detail-line {
            border-bottom: 1px solid #000;
            flex: 1;
            min-height: 5mm;
            padding: 1mm 0;
            font-size: 8px;
            line-height: 1.3;
        }

        .payment-row {
            display: flex;
            align-items: center;
            gap: 10mm;
            flex-wrap: wrap;
            margin-bottom: 6mm;
            font-size: 9px;
            font-weight: bold;
        }

        .payment-row .label {
            white-space: nowrap;
            flex-shrink: 0;
        }

        .payment-item {
            display: flex;
            align-items: center;
            gap: 3mm;
            min-width: 0;
            flex: 1;
        }

        .payment-item span {
            white-space: nowrap;
        }

        .payment-amount {
            border-bottom: 1px solid #000;
            min-width: 18mm;
            max-width: 28mm;
            padding: 1mm 0;
            text-align: right;
            font-size: 8px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .payment-item .checkbox {
            width: 4.5mm;
            height: 4.5mm;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10mm;
            margin-bottom: 3mm;
        }

        .total-left {
            display: flex;
            align-items: center;
            gap: 6mm;
            flex: 1;
            min-width: 0;
        }

        .rm-label {
            font-size: 26px;
            font-weight: bold;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .rm-value {
            border-bottom: 1px solid #000;
            width: 24mm;
            padding: 1mm 0;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }

        .signature-block {
            text-align: center;
            min-width: 55mm;
            flex-shrink: 0;
        }

        .disclaimer {
            text-align: center;
            font-size: 7px;
            font-weight: bold;
            margin-bottom: 4mm;
            line-height: 1.4;
        }

        .disclaimer {
            text-align: center;
            font-size: 7px;
            font-weight: bold;
            margin-bottom: 4mm;
            line-height: 1.4;
        }

        .signature-section {
            display: flex;
            justify-content: flex-end;
            margin-top: auto;
            min-height: 30mm;
        }

        .signature-block {
            text-align: center;
            min-width: 55mm;
        }

        .signature-image {
            width: 34mm;
            height: auto;
            position: absolute;
            left: 50%;
            top: 0;
            transform: translate(-50%, -58%);
            z-index: 2;
            pointer-events: none;
        }

        .signature-line {
            border-bottom: 1px solid #000;
            width: 66mm;
            height: 8mm;
            margin-bottom: 2mm;
            position: relative;
            z-index: 1;
        }

        .signature-name {
            font-weight: bold;
            font-size: 8px;
        }

        /* PRINT STYLES */
        @media print {
            body {
                background-color: white;
                margin: 0;
                padding: 0;
            }

            .page {
                margin: 0;
                box-shadow: none;
                page-break-after: avoid;
                page-break-inside: avoid;
                height: 297mm;
            }

            * {
                page-break-inside: avoid;
            }
        }

        body.pdf-render {
            background-color: #fff;
        }

        body.pdf-render .page {
            display: block;
        }

        body.pdf-render .header {
            display: table;
            width: 100%;
            table-layout: fixed;
            border-bottom: 2px solid #000;
            padding-bottom: 4mm;
        }

        body.pdf-render .header > .logo-cell,
        body.pdf-render .header > .header-center,
        body.pdf-render .header > .header-right {
            display: table-cell;
            vertical-align: top;
        }

        body.pdf-render .header > .logo-cell {
            width: 36mm;
            padding-top: 1mm;
        }

        body.pdf-render .logo {
            width: 30mm;
        }

        body.pdf-render .header-center {
            width: 105mm;
            padding: 0 6mm;
        }

        body.pdf-render .header-right {
            width: 45mm;
        }

        body.pdf-render .header-field {
            display: table;
            width: 100%;
            table-layout: fixed;
            margin-bottom: 2mm;
        }

        body.pdf-render .header-label,
        body.pdf-render .header-line {
            display: table-cell;
            vertical-align: bottom;
        }

        body.pdf-render .header-label {
            width: 17mm;
        }

        body.pdf-render .header-line {
            margin-left: 0;
            padding-left: 2mm;
        }

        body.pdf-render .resit-label {
            display: inline-block;
            width: 36mm;
            text-align: center;
            padding: 4mm 5mm;
            border-radius: 14mm;
            margin-top: 12mm;
            margin-bottom: 9mm;
        }

        body.pdf-render .details {
            display: block;
            width: 100%;
            margin-bottom: 7mm;
        }

        body.pdf-render .details-row {
            display: table;
            width: 100%;
            table-layout: fixed;
            margin-bottom: 4mm;
        }

        body.pdf-render .detail-field {
            display: table-cell;
            width: 50%;
            vertical-align: bottom;
            padding-right: 6mm;
        }

        body.pdf-render .details-row .detail-field:last-child {
            padding-right: 0;
            padding-left: 2mm;
        }

        body.pdf-render .detail-label {
            display: inline-block;
            vertical-align: bottom;
            margin-right: 3mm;
        }

        body.pdf-render .detail-line {
            display: inline-block;
            vertical-align: bottom;
            min-height: 0;
            padding: 0 0 1mm;
        }

        body.pdf-render .details-row:nth-child(1) .detail-field:nth-child(1) .detail-line {
            width: 64mm;
        }

        body.pdf-render .details-row:nth-child(1) .detail-field:nth-child(2) .detail-line {
            width: 63mm;
        }

        body.pdf-render .details-row:nth-child(2) .detail-field:nth-child(1) .detail-line {
            width: 79mm;
        }

        body.pdf-render .details-row:nth-child(2) .detail-field:nth-child(2) .detail-line {
            width: 70mm;
        }

        body.pdf-render .payment-row {
            display: table;
            width: 100%;
            table-layout: fixed;
            margin-bottom: 7mm;
        }

        body.pdf-render .payment-row > .label,
        body.pdf-render .payment-row > .payment-item {
            display: table-cell;
            vertical-align: middle;
        }

        body.pdf-render .payment-row > .label {
            width: 32mm;
        }

        body.pdf-render .payment-row > .payment-item {
            width: 78mm;
        }

        body.pdf-render .payment-item .checkbox {
            display: inline-block;
            vertical-align: middle;
            margin-right: 3mm;
        }

        body.pdf-render .payment-item span {
            display: inline-block;
            vertical-align: middle;
        }

        body.pdf-render .payment-amount {
            width: 18mm;
            min-width: 18mm;
            margin-left: 3mm;
        }

        body.pdf-render .total-row {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        body.pdf-render .total-left,
        body.pdf-render .signature-block {
            display: table-cell;
            vertical-align: top;
        }

        body.pdf-render .total-left {
            width: 95mm;
        }

        body.pdf-render .signature-block {
            width: 70mm;
            padding-top: 1mm;
        }

        body.pdf-render .rm-label,
        body.pdf-render .rm-value {
            display: inline-block;
            vertical-align: bottom;
        }

        body.pdf-render .rm-label {
            margin-right: 12mm;
        }

        body.pdf-render .signature-image {
            width: 34mm;
            left: 50%;
            top: 0;
            transform: translate(-50%, -58%);
        }

        body.pdf-render .disclaimer {
            margin-top: 2mm;
        }
    </style>
</head>
<body class="{{ ($isPdf ?? false) ? 'pdf-render' : '' }}">
    <div class="page">
        <!-- HEADER -->
        <div class="header">
            <div class="logo-cell">
                <img src="{{ ($isPdf ?? false) ? public_path('images/icon/sesL.png') : asset('images/icon/sesL.png') }}" alt="SES Logo" class="logo">
            </div>
            
            <div class="header-center">
                <div class="org-registry">SESOC LEGACY (PG0576768)</div>
                <div class="org-presenting">PRESENTING</div>
                <div class="org-name">SMART EDUCATION SOCIETY</div>
                <div class="org-address">
                    NO 34 JALAN MPK 4 KEPAYANG COMMERCE SQUARE 70300 SEREMBAN NEGERI SEMBILAN
                </div>
            </div>

            <div class="header-right">
                <div class="header-field">
                    <div class="header-label">No:</div>
                    <div class="header-line">SESOC/{{ date('Ymd') }}/0001</div>
                </div>
                <div class="header-field">
                    <div class="header-label">Tarikh:</div>
                    <div class="header-line">{{ date('d/m/Y') }}</div>
                </div>
                <div class="header-field">
                    <div class="header-label">Taklimat:</div>
                    <div class="header-line">{{ $pelajar->event->nama_event ?? 'SES' }}</div>
                </div>
            </div>
        </div>

        <div class="resit-label">Resit Rasmi</div>

        @php
            $institusi_nama = $institusi?->nama_institusi
                ?? $kursus?->institusi?->nama_institusi
                ?? '-';
            $kursus_nama = $kursus?->nama_kursus
                ?? $pelajar->pilihan_pertama
                ?? '-';

            $jumlah_bayaran = (float) ($pembayaran?->jumlah_bayaran ?? (($pelajar->yuran_proses ?? 100.00) + ($pelajar->yuran_pendaftaran ?? 200.00)));
            $bayaran_semasa = (float) ($pembayaran?->bayaran_semasa ?? $jumlah_bayaran);
            $bayaran_penuh = $jumlah_bayaran > 0 && $bayaran_semasa >= $jumlah_bayaran;
            $wang_proses_nilai = $bayaran_penuh ? null : $bayaran_semasa;
            $pra_pendaftaran_nilai = $bayaran_penuh ? $bayaran_semasa : null;
        @endphp

        <div class="details">
            <div class="details-row">
                <div class="detail-field">
                    <span class="detail-label">DITERIMA DARIPADA:</span>
                    <span class="detail-line">{{ $pelajar->nama_pelajar ?? '' }}</span>
                </div>
                <div class="detail-field">
                    <span class="detail-label">NO KAD PENGENALAN:</span>
                    <span class="detail-line">{{ $pelajar->ic_pelajar ?? '' }}</span>
                </div>
            </div>
            <div class="details-row">
                <div class="detail-field">
                    <span class="detail-label">INSTITUSI:</span>
                    <span class="detail-line">{{ $institusi_nama }}</span>
                </div>
                <div class="detail-field">
                    <span class="detail-label">KURSUS PILIHAN:</span>
                    <span class="detail-line">{{ $kursus_nama }}</span>
                </div>
            </div>
        </div>

        <div class="payment-row">
            <span class="label">BAYARAN UNTUK:</span>
            <div class="payment-item">
                <input type="checkbox" class="checkbox" style="accent-color:#000" {{ ! $bayaran_penuh ? 'checked' : '' }} disabled>
                <span>WANG PROSES :</span>
                <span class="payment-amount">
                    @if(! is_null($wang_proses_nilai))
                        RM {{ number_format($wang_proses_nilai, 2) }}
                    @endif
                </span>
            </div>
            <div class="payment-item">
                <input type="checkbox" class="checkbox" style="accent-color:#000" {{ $bayaran_penuh ? 'checked' : '' }} disabled>
                <span>PRA PENDAFTARAN :</span>
                <span class="payment-amount">
                    @if(! is_null($pra_pendaftaran_nilai))
                        RM {{ number_format($pra_pendaftaran_nilai, 2) }}
                    @endif
                </span>
            </div>
        </div>

        <div class="total-row">
            <div class="total-left">
                <span class="rm-label">RM</span>
                <span class="rm-value">{{ number_format($bayaran_semasa, 2) }}</span>
            </div>
            <div class="signature-block" style="position:relative;">
                <div class="signature-line"></div>
                @if(file_exists(public_path('images/signature.png')))
                    <img src="{{ ($isPdf ?? false) ? public_path('images/signature.png') : asset('images/signature.png') }}" alt="Signature" class="signature-image">
                @endif
                <div class="signature-name">PEGAWAI BERTUGAS</div>
            </div>
        </div>

        <div class="disclaimer">
            ** BAYARAN YANG TELAH DITERIMA TIDAK AKAN DIKEMBALIKAN **
        </div>
        {{-- <div style="display:flex; justify-content:flex-end; margin-top:2mm; font-size:10px;">
            <div>
                <b>BAYARAN SEMASA:</b> RM {{ number_format($bayaran_semasa, 2) }}
                &nbsp;&nbsp;&nbsp;
                <b>JUMLAH BAYARAN:</b> RM {{ number_format($jumlah_bayaran, 2) }}
            </div>
        </div> --}}
    </div>
</body>
</html>

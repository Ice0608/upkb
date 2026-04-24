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
            max-width: 22mm;
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
            min-width: 28mm;
            max-width: 38mm;
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
            width: 30mm;
            height: auto;
            margin-bottom: 2mm;
        }

        .signature-line {
            border-bottom: 1px solid #000;
            width: 90mm;
            height: 8mm;
            margin-bottom: 2mm;
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
    </style>
</head>
<body>
    <div class="page">
        <!-- HEADER -->
        <div class="header">
            <img src="{{ asset('images/icon/sesL.png') }}" alt="SES Logo" class="logo">
            
            <div class="header-center">
                <div class="org-registry">SESOC LEGACY (PG0576768)</div>
                <div class="org-presenting">PRESENTING</div>
                <div class="org-name">SMART EDUCATION SOCIETY</div>
                <div class="org-address">
                    No. 1, Jalan Guru, Taman Pendidikan,<br>
                    58100 Kuala Lumpur
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
                    <span class="detail-line">{{ $pelajar->institusi->nama_institusi ?? $pelajar->institusi ?? '-' }}</span>
                </div>
                <div class="detail-field">
                    <span class="detail-label">KURSUS PILIHAN:</span>
                    <span class="detail-line">{{ $pelajar->kursus->nama_kursus ?? $pelajar->pilihan_pertama ?? '-' }}</span>
                </div>
            </div>
        </div>

        @php
            $yuran_proses = $pelajar->yuran_proses ?? 100.00;
            $yuran_pra = $pelajar->yuran_pendaftaran ?? 200.00;
            $jumlah_bayaran = $yuran_proses + $yuran_pra;
            $bayaran_semasa = $pelajar->bayaran_semasa ?? $jumlah_bayaran;
        @endphp
        <div class="payment-row">
            <span class="label">BAYARAN UNTUK:</span>
            <div class="payment-item">
                <input type="checkbox" class="checkbox" style="accent-color:#000" {{ $bayaran_semasa < $jumlah_bayaran ? 'checked' : '' }} disabled>
                <span>WANG PROSES :</span>
                <span class="payment-amount">RM {{ number_format($yuran_proses, 2) }}</span>
            </div>
            <div class="payment-item">
                <input type="checkbox" class="checkbox" style="accent-color:#000" {{ $bayaran_semasa >= $jumlah_bayaran ? 'checked' : '' }} disabled>
                <span>PRA PENDAFTARAN :</span>
                <span class="payment-amount">RM {{ number_format($yuran_pra, 2) }}</span>
            </div>
        </div>

        <div class="total-row">
            <div class="total-left">
                <span class="rm-label">RM</span>
                <span class="rm-value">{{ number_format($jumlah_bayaran, 2) }}</span>
            </div>
            <div class="signature-block" style="position:relative;">
                <div class="signature-line" style="position:relative; z-index:1;"></div>
                @if(file_exists(public_path('images/signature/en. amri signature.png')))
                    <img src="{{ asset('images/signature/en. amri signature.png') }}" alt="Signature" class="signature-image" style="position:absolute; left:50%; top:0; transform:translate(-50%,-60%); z-index:2; pointer-events:none;">
                @endif
                <div class="signature-name">PEGAWAI BERTUGAS</div>
            </div>
        </div>

        <div class="disclaimer">
            ** BAYARAN YANG TELAH DITERIMA TIDAK AKAN DIKEMBALIKAN **
        </div>
        <div style="display:flex; justify-content:flex-end; margin-top:2mm; font-size:10px;">
            <div>
                <b>BAYARAN SEMASA:</b> RM {{ number_format($bayaran_semasa, 2) }}
            </div>
        </div>
    </div>
</body>
</html>

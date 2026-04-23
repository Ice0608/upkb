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
        .content {
            display: flex;
            gap: 8mm;
            margin-bottom: 4mm;
            font-size: 9px;
            flex: 1;
        }

        .left-section {
            flex: 1;
        }

        .right-section {
            flex: 1;
        }

        .form-row {
            display: flex;
            gap: 2mm;
            margin-bottom: 3mm;
        }

        .form-field {
            flex: 1;
        }

        .form-label {
            font-weight: bold;
            font-size: 8px;
            margin-bottom: 1mm;
            display: block;
        }

        .form-line {
            border-bottom: 1px solid #000;
            min-height: 4mm;
            padding: 1mm 0;
            font-size: 8px;
        }

        /* PAYMENT SECTION */
        .payment-section {
            margin-bottom: 4mm;
            border: 1px solid #000;
            padding: 3mm;
        }

        .payment-title {
            font-weight: bold;
            font-size: 9px;
            margin-bottom: 2mm;
            text-decoration: underline;
        }

        .payment-item {
            display: flex;
            align-items: center;
            gap: 2mm;
            margin-bottom: 2mm;
            font-size: 8px;
        }

        .checkbox {
            width: 3.5mm;
            height: 3.5mm;
            border: 1px solid #000;
            flex-shrink: 0;
        }

        .payment-label {
            flex: 1;
        }

        .payment-amount {
            border-bottom: 1px solid #000;
            min-width: 25mm;
            text-align: right;
            padding-right: 2mm;
            font-weight: bold;
        }

        /* TOTAL SECTION */
        .total-section {
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            padding: 3mm 0;
            margin-bottom: 4mm;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            font-weight: bold;
        }

        .total-label {
            font-weight: bold;
        }

        .total-amount {
            border-bottom: 1px solid #000;
            min-width: 50mm;
            text-align: right;
            padding-right: 5mm;
        }

        .payment-method {
            text-align: center;
            font-size: 8px;
            font-weight: bold;
            margin-top: 1mm;
        }

        /* FOOTER DISCLAIMER */
        .disclaimer {
            text-align: center;
            font-size: 7px;
            font-weight: bold;
            margin-bottom: 4mm;
            line-height: 1.4;
        }

        /* SIGNATURE SECTION */
        .signature-section {
            display: flex;
            justify-content: flex-end;
            margin-top: auto;
            min-height: 30mm;
        }

        .signature-block {
            text-align: center;
            min-width: 45mm;
        }

        .signature-image {
            width: 30mm;
            height: auto;
            margin-bottom: 2mm;
        }

        .signature-line {
            border-bottom: 1px solid #000;
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

        <!-- CONTENT -->
        <div class="content">
            <div class="left-section">
                <div class="form-row">
                    <div class="form-field">
                        <span class="form-label">Diterima Daripada:</span>
                        <div class="form-line">{{ $pelajar->nama_pelajar ?? '' }}</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <span class="form-label">No Kad Pengenalan:</span>
                        <div class="form-line">{{ $pelajar->ic_pelajar ?? '' }}</div>
                    </div>
                </div>
            </div>

            <div class="right-section">
                <div class="form-row">
                    <div class="form-field">
                        <span class="form-label">Institusi:</span>
                        <div class="form-line">{{ $pelajar->institusi ?? '' }}</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <span class="form-label">Kursus Pilihan:</span>
                        <div class="form-line">{{ $pelajar->pilihan_pertama ?? '' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PAYMENT SECTION -->
        <div class="payment-section">
            <div class="payment-title">BUTIRAN PEMBAYARAN</div>
            
            <div class="payment-item">
                <div class="checkbox"></div>
                <div class="payment-label">Wang Proses</div>
                <div class="payment-amount">RM {{ number_format($pelajar->yuran_proses ?? 100.00, 2) }}</div>
            </div>

            <div class="payment-item">
                <div class="checkbox"></div>
                <div class="payment-label">Pra Pendaftaran</div>
                <div class="payment-amount">RM {{ number_format($pelajar->yuran_pendaftaran ?? 200.00, 2) }}</div>
            </div>
        </div>

        <!-- TOTAL SECTION -->
        <div class="total-section">
            <div class="total-label">JUMLAH TOTAL:</div>
            <div class="total-amount">RM {{ number_format(($pelajar->yuran_proses ?? 100.00) + ($pelajar->yuran_pendaftaran ?? 200.00), 2) }}</div>
        </div>

        <div class="payment-method">TUNAI & LAIN-LAIN</div>

        <!-- DISCLAIMER -->
        <div class="disclaimer">
            ** BAYARAN YANG TELAH DITERIMA TIDAK AKAN DIKEMBALIKAN **
        </div>

        <!-- SIGNATURE SECTION -->
        <div class="signature-section">
            <div class="signature-block">
                @if(file_exists(public_path('images/signature/en. amri signature.png')))
                    <img src="{{ asset('images/signature/en. amri signature.png') }}" alt="Signature" class="signature-image">
                @else
                    <div class="signature-line"></div>
                @endif
                <div class="signature-name">PEGAWAI BERTUGAS</div>
            </div>
        </div>
    </div>
</body>
</html>

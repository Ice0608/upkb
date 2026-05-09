<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        width: 100%;
        min-height: 100%;
        background: #fff;
        color: #000;
        font-family: Arial, sans-serif;
        font-size: 10px;
        line-height: 1.3;
    }

    @page {
        size: A5 landscape;
        margin: 5mm;
    }

    .page {
        width: 100%;
        min-height: 100%;
        padding: 8mm;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .receipt {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex: 1;
    }

    .header {
        display: grid;
        grid-template-columns: 60px 1fr 140px;
        gap: 10px;
        align-items: start;
        border-bottom: 1.5px solid #000;
        padding-bottom: 8px;
        margin-bottom: 8px;
    }

    .logo img {
        width: auto;
        max-height: 60px;
        display: block;
    }

    .header-center {
        text-align: center;
    }

    .header-center .line-small {
        font-size: 8px;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 2px;
    }

    .header-center .title-large {
        margin: 2px 0 0;
        font-size: 18px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .header-center .address {
        margin-top: 4px;
        font-size: 8px;
        line-height: 1.25;
        text-transform: uppercase;
    }

    .header-right {
        display: grid;
        gap: 5px;
        font-size: 9px;
    }

    .meta-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 6px;
    }

    .meta-label {
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        width: 48px;
    }

    .meta-value {
        text-align: right;
        min-width: 80px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .section {
        display: grid;
        gap: 10px;
    }

    .field-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px 14px;
    }

    .field {
        display: grid;
        gap: 3px;
    }

    .field-label {
        font-size: 8.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .field-value {
        border-bottom: 1px solid #000;
        min-height: 16px;
        padding-bottom: 2px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .payment-box {
        border: 1px solid #000;
        padding: 8px;
        display: grid;
        gap: 8px;
    }

    .payment-row {
        display: flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
        font-size: 10px;
    }

    .checkbox {
        width: 12px;
        height: 12px;
        border: 1px solid #000;
        flex-shrink: 0;
    }

    .payment-label {
        flex: 1;
        font-weight: 700;
    }

    .payment-amount {
        min-width: 60px;
        text-align: right;
        font-weight: 700;
        border-bottom: 1px solid #000;
        padding-bottom: 2px;
    }

    .total-section {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 12px;
        margin-top: 10px;
    }

    .total-text {
        display: flex;
        flex-direction: column;
        gap: 4px;
        text-transform: uppercase;
    }

    .total-label {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.08em;
    }

    .total-note {
        font-size: 8.5px;
        letter-spacing: 0.08em;
    }

    .total-value {
        font-size: 28px;
        font-weight: 900;
        letter-spacing: 0.06em;
        border-bottom: 1px solid #000;
        padding-bottom: 2px;
    }

    .signature-block {
        display: flex;
        justify-content: flex-end;
        margin-top: 12px;
    }

    .signature-card {
        width: 170px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
    }

    .signature-image {
        width: auto;
        max-height: 55px;
        object-fit: contain;
        display: block;
    }

    .signature-line {
        width: 100%;
        border-bottom: 1px solid #000;
    }

    .signature-label {
        text-transform: uppercase;
        font-size: 9px;
        font-weight: 700;
        text-align: center;
    }

    .receipt-footer {
        text-align: center;
        font-size: 8.5px;
        font-weight: 700;
        text-transform: uppercase;
        padding-top: 8px;
        border-top: 1px solid #000;
        margin-top: 12px;
    }

    @media print {
        body {
            background: #fff;
        }

        .page {
            padding: 5mm;
        }

        .receipt {
            break-inside: avoid;
        }

        * {
            page-break-inside: avoid !important;
        }
    }
</style>

@php
    $printDate = now();
    $receiptNumber = 'SESOC/' . $printDate->format('Y-m-d') . '/0001';
    $taklimatText = optional($pelajar)->taklimat ?? '-';
    $processFee = optional($pelajar)->yuran_proses ?? 100.00;
    $registrationFee = optional($pelajar)->yuran_pendaftaran ?? 200.00;
    $totalAmount = (float) $processFee + (float) $registrationFee;
@endphp

<div class="page">
    <div class="receipt">
        <div>
            <div class="header">
                <div class="logo">
                    <img src="{{ asset('images/icon/seslogo.png') }}" alt="SESOC Logo">
                </div>
                <div class="header-center">
                    <div class="line-small">SESOC LEGACY (PG0576768)</div>
                    <div class="line-small">PRESENTING</div>
                    <div class="title-large">SMART EDUCATION SOCIETY</div>
                    <div class="address">No. 20, Jalan Utama 5, Kawasan Pendidikan, 43000 Kajang, Selangor</div>
                </div>
                <div class="header-right">
                    <div class="meta-row">
                        <div class="meta-label">No:</div>
                        <div class="meta-value">{{ $receiptNumber }}</div>
                    </div>
                    <div class="meta-row">
                        <div class="meta-label">Tarikh:</div>
                        <div class="meta-value">{{ $printDate->format('d/m/Y') }}</div>
                    </div>
                    <div class="meta-row">
                        <div class="meta-label">Taklimat:</div>
                        <div class="meta-value">{{ $taklimatText }}</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="field-grid">
                    <div class="field">
                        <div class="field-label">Diterima Daripada</div>
                        <div class="field-value">{{ optional($pelajar)->nama_pelajar ?? '-' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">No Kad Pengenalan</div>
                        <div class="field-value">{{ optional($pelajar)->ic_pelajar ?? '-' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Institusi</div>
                        <div class="field-value">{{ optional($pelajar)->institusi ?? '-' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Kursus Pilihan</div>
                        <div class="field-value">{{ optional($pelajar)->pilihan_pertama ?? '-' }}</div>
                    </div>
                </div>

                <div class="payment-box">
                    <div class="payment-row">
                        <span class="checkbox"></span>
                        <span class="payment-label">Wang Proses</span>
                        <span class="payment-amount"></span>
                    </div>
                    <div class="payment-row">
                        <span class="checkbox"></span>
                        <span class="payment-label">Pra Pendaftaran</span>
                        <span class="payment-amount"></span>
                    </div>
                </div>

                <div class="total-section">
                    <div class="total-text">
                        <div class="total-label">Jumlah</div>
                        <div class="total-note">Tunai & Lain-lain</div>
                    </div>
                    <div class="total-value"></div>
                </div>
            </div>
        </div>

        <div>
            <div class="receipt-footer">** BAYARAN YANG TELAH DITERIMA TIDAK AKAN DIKEMBALIKAN **</div>
            <div class="signature-block">
                <div class="signature-card">
                    <img src="{{ asset('images/en. amri signature.png') }}" alt="Signature" class="signature-image">
                    <div class="signature-line"></div>
                    <div class="signature-label">Pegawai Bertugas</div>
                </div>
            </div>
        </div>
    </div>
</div>

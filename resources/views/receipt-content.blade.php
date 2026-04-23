<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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
        overflow: hidden;
    }

    .header {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 8mm;
        margin-bottom: 6mm;
        border-bottom: 1px solid #000;
        padding-bottom: 4mm;
    }

    .logo {
        width: 25mm;
        height: auto;
    }

    .title-center {
        flex: 1;
        text-align: center;
    }

    .organization-name {
        font-size: 16px;
        font-weight: bold;
        color: #000;
        letter-spacing: 1px;
    }

    .header-right {
        font-size: 10px;
        line-height: 1.6;
    }

    .header-field {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2mm;
    }

    .header-label {
        font-weight: bold;
        width: 25mm;
    }

    .header-line {
        border-bottom: 1px solid #000;
        flex: 1;
        margin-left: 2mm;
    }

    .content {
        display: flex;
        gap: 8mm;
        margin-bottom: 5mm;
        font-size: 10px;
        flex: 1;
    }

    .left-content {
        flex: 1;
    }

    .right-content {
        flex: 1;
    }

    .form-row {
        display: flex;
        gap: 4mm;
        margin-bottom: 3mm;
    }

    .form-field {
        flex: 1;
    }

    .form-label {
        font-weight: bold;
        font-size: 9px;
        margin-bottom: 1mm;
        display: block;
    }

    .form-line {
        border-bottom: 1px solid #000;
        min-height: 4mm;
        padding: 1mm 0;
    }

    .checkbox-group {
        display: flex;
        gap: 3mm;
        margin-bottom: 3mm;
        align-items: center;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        gap: 2mm;
        font-size: 9px;
    }

    .checkbox {
        width: 4mm;
        height: 4mm;
        border: 1px solid #000;
        cursor: pointer;
    }

    .total-section {
        border-top: 2px solid #000;
        border-bottom: 2px solid #000;
        padding: 3mm 0;
        margin-bottom: 5mm;
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        font-weight: bold;
    }

    .total-label {
        font-weight: bold;
    }

    .total-amount {
        border-bottom: 1px solid #000;
        min-width: 40mm;
        text-align: right;
        padding-right: 5mm;
    }

    .footer {
        display: flex;
        justify-content: space-between;
        font-size: 9px;
        border-top: 1px solid #000;
        padding-top: 3mm;
        margin-top: auto;
        line-height: 1.4;
    }

    .signature-block {
        text-align: center;
        min-width: 45mm;
    }

    .signature-line {
        border-bottom: 1px solid #000;
        height: 12mm;
        margin-bottom: 2mm;
    }

    .signature-name {
        font-weight: bold;
        font-size: 8px;
    }

    .disclaimer {
        flex: 1;
        padding-left: 5mm;
        font-size: 8px;
        line-height: 1.3;
    }

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
        }

        * {
            page-break-inside: avoid;
        }
    }
</style>

<div class="page">
    <!-- Header -->
    <div class="header">
        <img src="{{ asset('images/icon/sesL.png') }}" alt="SES Logo" class="logo">
        <div class="title-center">
            <div class="organization-name">SMART EDUCATION SOCIETY</div>
        </div>
        <div class="header-right">
            <div class="header-field">
                <div class="header-label">No:</div>
                <div class="header-line"></div>
            </div>
            <div class="header-field">
                <div class="header-label">Tarikh:</div>
                <div class="header-line"></div>
            </div>
            <div class="header-field">
                <div class="header-label">Taklimat:</div>
                <div class="header-line"></div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Left Content -->
        <div class="left-content">
            <div class="form-row">
                <div class="form-field">
                    <span class="form-label">Diterima Daripada:</span>
                    <div class="form-line"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <span class="form-label">No IC:</span>
                    <div class="form-line"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <span class="form-label">Institusi:</span>
                    <div class="form-line"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-field">
                    <span class="form-label">Kursus Pilihan:</span>
                    <div class="form-line"></div>
                </div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="right-content">
            <div class="checkbox-group">
                <div class="checkbox-item">
                    <input type="checkbox" class="checkbox">
                    <span>Wang Proses</span>
                </div>
                <div style="border-bottom: 1px solid #000; min-width: 30mm; height: 4mm;"></div>
                <span style="font-weight: bold;">RM</span>
            </div>

            <div class="checkbox-group">
                <div class="checkbox-item">
                    <input type="checkbox" class="checkbox">
                    <span>Pra Pendaftaran</span>
                </div>
                <div style="border-bottom: 1px solid #000; min-width: 30mm; height: 4mm;"></div>
                <span style="font-weight: bold;">RM</span>
            </div>

            <div style="height: 8mm;"></div>

            <div class="total-section">
                <div class="total-label">JUMLAH TOTAL:</div>
                <div class="total-amount">RM</div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="signature-block">
            <div class="signature-line"></div>
            <div class="signature-name">Pegawai Bertugas</div>
        </div>
        <div class="disclaimer">
            <strong>Penafian:</strong> Resit ini adalah bukti pembayaran yang sah. Sila simpan untuk rujukan. Sekiranya terdapat percanggahan, sila hubungi pejabat dalam masa 7 hari.
        </div>
    </div>
</div>

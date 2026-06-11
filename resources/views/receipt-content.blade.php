<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html, body {
        width: 100%;
        min-height: 100%;
        background: #fff;
        color: #000;
        font-family: Arial, sans-serif;
    }

    @page {
        size: A4 landscape;
        margin: 6mm;
    }

    .receipt-sheet {
        width: 100%;
        min-height: 100%;
        padding: 6mm;
    }

    .receipt-card {
        width: 100%;
    }

    .receipt-header {
        display: grid;
        grid-template-columns: 1.25fr 1fr;
        gap: 18px;
        align-items: start;
    }

    .brand-block {
        display: flex;
        align-items: flex-start;
        gap: 14px;
    }

    .brand-logo {
        width: 150px;
        max-width: 100%;
        height: auto;
        display: block;
    }

    .org-block {
        text-align: right;
        font-size: 11px;
        line-height: 1.35;
    }

    .org-title {
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .org-subtitle {
        text-transform: uppercase;
    }

    .org-contact {
        margin-top: 2px;
    }

    .meta-stack {
        display: flex;
        flex-direction: column;
        gap: 16px;
        align-items: flex-end;
        margin-top: 12px;
    }

    .receipt-label {
        width: 170px;
        background: #111;
        color: #fff;
        text-align: center;
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        padding: 4px 10px;
    }

    .meta-box,
    .payment-method-box {
        width: 268px;
        border: 1px solid #000;
        border-collapse: collapse;
    }

    .meta-box table,
    .payment-method-box table,
    .payment-table {
        width: 100%;
        border-collapse: collapse;
    }

    .meta-box td,
    .payment-method-box td {
        border: 1px solid #000;
        padding: 4px 8px;
        font-size: 12px;
    }

    .meta-box .label,
    .payment-method-box .label {
        width: 108px;
        text-align: center;
        font-weight: 700;
        text-transform: uppercase;
        background: #f2f2f2;
    }

    .meta-box .value,
    .payment-method-box .value {
        text-align: center;
        font-weight: 700;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .receipt-no-input {
        width: 100%;
        border: 0;
        padding: 0;
        margin: 0;
        background: transparent;
        color: #c00;
        font-family: 'Courier New', Courier, monospace;
        font-size: 14px;
        font-weight: 700;
        line-height: inherit;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        outline: none;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
    }

    #receipt-no-text {
        color: #c00;
        font-family: 'Courier New', Courier, monospace;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0.08em;
    }

    .details-block {
        display: grid;
        grid-template-columns: 1fr 268px;
        gap: 18px;
        margin-top: 14px;
        align-items: start;
    }

    .person-lines {
        padding-top: 10px;
    }

    .detail-line {
        display: grid;
        grid-template-columns: 170px 14px 1fr;
        gap: 8px;
        align-items: start;
        margin-bottom: 4px;
        font-size: 12px;
        text-transform: uppercase;
    }

    .detail-label {
        font-weight: 700;
    }

    .detail-colon {
        font-weight: 700;
        text-align: center;
    }

    .detail-value {
        font-weight: 700;
    }

    .payment-table-wrap {
        margin-top: 16px;
    }

    .payment-table th,
    .payment-table td {
        border: 1px solid #000;
        padding: 5px 6px;
        font-size: 12px;
    }

    .payment-table th {
        background: #cfcaca;
        text-transform: uppercase;
        font-weight: 700;
    }

    .payment-table .col-bil {
        width: 46px;
        text-align: center;
    }

    .payment-table .col-amount {
        width: 105px;
        text-align: right;
        white-space: nowrap;
    }

    .payment-table tbody td:first-child {
        text-align: center;
    }

    .payment-table tfoot td {
        font-weight: 700;
        text-transform: uppercase;
    }

    .payment-table .total-label {
        text-align: right;
    }

    .receipt-notes {
        margin-top: 12px;
        text-align: center;
        text-transform: uppercase;
        line-height: 1.35;
    }

    .receipt-notes .warning {
        color: #f00;
        font-size: 14px;
        font-weight: 700;
    }

    .receipt-notes .note-line {
        font-size: 11px;
        font-weight: 400;
    }

    .receipt-notes .note-line.strong {
        font-weight: 700;
    }

    @media print {
        .receipt-sheet {
            padding: 0;
        }
    }

    @if ($isPdf ?? false)
        .receipt-sheet {
            padding: 0;
        }

        .receipt-header,
        .details-block {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .brand-block,
        .org-block,
        .details-block > div,
        .meta-stack {
            display: table-cell;
            vertical-align: top;
        }

        .brand-block,
        .details-block > div:first-child {
            width: 62%;
        }

        .org-block,
        .meta-stack {
            width: 38%;
        }

        .meta-stack {
            text-align: right;
        }

        .meta-box,
        .payment-method-box {
            margin-left: auto;
            margin-bottom: 16px;
        }

        .detail-line {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .detail-label,
        .detail-colon,
        .detail-value {
            display: table-cell;
            vertical-align: top;
        }

        .detail-label {
            width: 170px;
        }

        .detail-colon {
            width: 14px;
        }
    @endif
</style>

@php
    $pelajar = $pelajar ?? null;
    $pembayaran = $pembayaran ?? null;
    $kursus = $kursus ?? null;
    $institusi = $institusi ?? null;

    if ($pelajar && ! $kursus && $pelajar->kod_kursus) {
        $kursus = \App\Models\Kursus::with('institusi')
            ->where('kod_kursus', $pelajar->kod_kursus)
            ->when($pelajar->kod_institusi, fn ($query) => $query->where('kod_institusi', $pelajar->kod_institusi))
            ->first();
    }

    if (! $institusi && $kursus) {
        $institusi = $kursus->institusi;
    }

    $receiptDate = $pembayaran?->tarikh_pembayaran
        ? \Illuminate\Support\Carbon::parse($pembayaran->tarikh_pembayaran)
        : ($pelajar?->tarikh_pendaftaran ?? now());

    $programCode = match ($pelajar?->program) {
        'Sains Kesihatan' => 'SK',
        'Diploma' => 'UA',
        'TVET' => 'TVET',
        default => 'GEN',
    };

    $referenceNumber = 'SES/' . $programCode . '/' . $receiptDate->format('my');
    $defaultReceiptNumber = str_pad((string) ($pembayaran?->id ?? 1), 5, '0', STR_PAD_LEFT);
    $receiptNumber = filled($receiptNumberOverride ?? null) ? trim((string) $receiptNumberOverride) : $defaultReceiptNumber;
    $previewReceiptNumber = ($isPreviewModal ?? false) && !($isPdf ?? false)
        ? (filled($receiptNumberOverride ?? null) ? trim((string) $receiptNumberOverride) : $defaultReceiptNumber)
        : $receiptNumber;

    $paymentMethod = match (strtolower((string) ($pembayaran?->kaedah_pembayaran ?? ''))) {
        'cash', 'tunai' => 'TUNAI',
        'qr', 'qr transfer' => 'QR TRANSFER',
        'transfer', 'online transfer' => 'ONLINE TRANSFER',
        default => strtoupper((string) ($pembayaran?->kaedah_pembayaran ?? '-')),
    };

    $defaultLogoPath = public_path('images/icon/sesL.png');
    $sesLogoSrc = ($isPdf ?? false)
        ? ($sesLogoPdfSrc ?? (file_exists($defaultLogoPath)
            ? 'data:image/png;base64,' . base64_encode(file_get_contents($defaultLogoPath))
            : 'file:///' . str_replace('\\', '/', $defaultLogoPath)))
        : asset('images/icon/sesL.png');
    $institusiNama = strtoupper((string) ($institusi?->nama_institusi ?? $pelajar?->kod_institusi ?? '-'));
    $kursusNama = strtoupper((string) ($kursus?->nama_kursus ?? $pelajar?->pilihan_pertama ?? $pelajar?->kod_kursus ?? '-'));

    $yuranItems = collect();
    if ($kursus?->kod_kursus && $kursus?->kod_institusi) {
        $yuranItems = \App\Models\YuranPendaftaran::query()
            ->where('kod_kursus', $kursus->kod_kursus)
            ->where('kod_institusi', $kursus->kod_institusi)
            ->get();
    }

    $paymentRows = [
        ['label' => 'PROSES PENDAFTARAN', 'amount' => null],
        ['label' => 'PRA PENDAFTARAN', 'amount' => null],
        ['label' => 'LAIN-LAIN', 'amount' => null],
    ];

    foreach ($yuranItems as $item) {
        $itemName = strtoupper(trim((string) $item->item));
        $amount = (float) $item->amount;

        if (str_contains($itemName, 'PROSES')) {
            $paymentRows[0]['amount'] = ($paymentRows[0]['amount'] ?? 0) + $amount;
            continue;
        }

        if (str_contains($itemName, 'PRA') || str_contains($itemName, 'PENDAFTARAN')) {
            $paymentRows[1]['amount'] = ($paymentRows[1]['amount'] ?? 0) + $amount;
            continue;
        }

        $paymentRows[2]['amount'] = ($paymentRows[2]['amount'] ?? 0) + $amount;
    }

    $registeredTotal = $yuranItems->sum(fn ($item) => (float) $item->amount);
    $paidAmount = (float) ($pembayaran?->bayaran_semasa ?? $pembayaran?->jumlah_bayaran ?? 0);
    $totalAmount = $paidAmount > 0 ? $paidAmount : $registeredTotal;

    if ($paidAmount > 0) {
        $paymentRows[0]['amount'] = $paidAmount;
    }

    if ($totalAmount > 0 && collect($paymentRows)->every(fn ($row) => empty($row['amount']))) {
        $paymentRows[0]['amount'] = $totalAmount;
    }
@endphp

<div class="receipt-sheet">
    <div class="receipt-card">
        <div class="receipt-header">
            <div class="brand-block">
                <img src="{{ $sesLogoSrc }}" alt="SESOC Logo" class="brand-logo">
            </div>

            <div class="org-block">
                <div class="org-title">SESOC LEGACY [ PG0576768 - A ]</div>
                <div class="org-subtitle">SMART EDUCATION SOCIETY</div>
                <div>NO 34 JALAN MPK 4 KEPAYANG COMMERCE SQUARE 70300 SEREMBAN NEGERI SEMBILAN</div>
                <div class="org-contact">Tel : +60 11 2672 5795 | Laman Web : secoc.com.my | Emel : sesoclegacy@gmail.com</div>
            </div>
        </div>

        <div class="details-block">
            <div>
                <div class="receipt-label">RESIT RASMI</div>

                <div class="person-lines">
                    <div class="detail-line">
                        <div class="detail-label">DITERIMA DARI</div>
                        <div class="detail-colon">:</div>
                        <div class="detail-value">{{ strtoupper((string) ($pelajar?->nama_pelajar ?? '-')) }}</div>
                    </div>
                    <div class="detail-line">
                        <div class="detail-label">NO KAD PENGENALAN</div>
                        <div class="detail-colon">:</div>
                        <div class="detail-value">{{ strtoupper((string) ($pelajar?->ic_pelajar ?? '-')) }}</div>
                    </div>
                    <div class="detail-line">
                        <div class="detail-label">INSTITUSI</div>
                        <div class="detail-colon">:</div>
                        <div class="detail-value">{{ $institusiNama }}</div>
                    </div>
                    <div class="detail-line">
                        <div class="detail-label">KURSUS PILIHAN</div>
                        <div class="detail-colon">:</div>
                        <div class="detail-value">{{ $kursusNama }}</div>
                    </div>
                </div>
            </div>

            <div class="meta-stack">
                <div class="meta-box">
                    <table>
                        <tr>
                            <td class="label">RUJUKAN</td>
                            <td class="value">{{ $referenceNumber }}</td>
                        </tr>
                        <tr>
                            <td class="label">RESIT NO</td>
                            <td class="value">
                                @if (($isPreviewModal ?? false) && !($isPdf ?? false))
                                    <input
                                        type="text"
                                        id="receipt-no-input"
                                        value="{{ $previewReceiptNumber }}"
                                        data-default-receipt-no="{{ $defaultReceiptNumber }}"
                                        class="receipt-no-input"
                                    >
                                @else
                                    <span id="receipt-no-text">{{ $receiptNumber }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="label">TARIKH</td>
                            <td class="value">{{ $receiptDate->format('d/m/Y') }}</td>
                        </tr>
                    </table>
                </div>

                <div class="payment-method-box">
                    <table>
                        <tr>
                            <td class="label">KAEDAH BAYARAN</td>
                        </tr>
                        <tr>
                            <td class="value">{{ $paymentMethod }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="payment-table-wrap">
            <table class="payment-table">
                <thead>
                    <tr>
                        <th class="col-bil">BIL</th>
                        <th>JENIS BAYARAN</th>
                        <th class="col-amount">JUMLAH (RM)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paymentRows as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $row['label'] }}</td>
                            <td class="col-amount">
                                @if (trim(strtoupper($row['label'])) === 'PRA PENDAFTARAN')
                                    
                                @else
                                    {{ $row['amount'] !== null ? number_format((float) $row['amount'], 2) : '' }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="total-label">JUMLAH BAYARAN (RM)</td>
                        <td class="col-amount">{{ $totalAmount > 0 ? number_format($totalAmount, 2) : '' }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="receipt-notes">
            <div class="warning">NOTA : JUMLAH BAYARAN INI TIDAK AKAN DIKEMBALIKAN</div>
            <div class="note-line">RESIT INI ADALAH JANAAN KOMPUTER TANDATANGAN TIDAK DIPERLUKAN</div>
            <div class="note-line strong">SILA SIMPAN RESIT INI UNTUK RUJUKAN</div>
        </div>
    </div>
</div>

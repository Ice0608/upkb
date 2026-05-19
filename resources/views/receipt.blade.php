<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resit - SESOC</title>
    <style>
        body {
            padding: 0;
            background: #fff;
        }

        .button-container {
            padding: 10px;
            text-align: right;
            background: #f5f5f5;
        }

        .print-btn {
            background: #000;
            color: #fff;
            border: none;
            padding: 8px 16px;
            font-size: 12px;
            cursor: pointer;
            border-radius: 3px;
        }

        @media print {
            body {
                background: #fff;
            }

            .button-container {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="button-container">
        <button class="print-btn" onclick="window.print()">Cetak</button>
    </div>

    @include('receipt-content', [
        'pelajar' => $pelajar ?? null,
        'pembayaran' => $pembayaran ?? null,
        'kursus' => $kursus ?? null,
        'institusi' => $institusi ?? null,
        'isPdf' => $isPdf ?? false,
    ])
</body>
</html>

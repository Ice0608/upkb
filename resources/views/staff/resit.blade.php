<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resit - {{ $pelajar->nama_pelajar }}</title>
</head>
<body>
    @include('receipt-content', [
        'pelajar' => $pelajar,
        'pembayaran' => $pembayaran ?? null,
        'kursus' => $kursus ?? null,
        'institusi' => $institusi ?? null,
        'isPdf' => $isPdf ?? false,
        'isPreviewModal' => $isPreviewModal ?? false,
        'receiptNumberOverride' => $receiptNumberOverride ?? null,
    ])
</body>
</html>

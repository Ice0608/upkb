<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$pelajarId = $argv[1] ?? 4;
$pel = App\Models\Pelajar::find($pelajarId);
if (!$pel) {
    echo "Pelajar not found\n";
    exit(1);
}

$jumlah = $argv[2] ?? 50.00;
$kaedah = $argv[3] ?? 'qr';

$p = App\Models\Pembayaran::create([
    'ic_pelajar' => $pel->ic_pelajar,
    'username' => 'pelajar',
    'kaedah_pembayaran' => $kaedah,
    'jumlah_bayaran' => $jumlah,
    'bayaran_semasa' => $jumlah,
    'status' => 'pending',
    'resit' => null,
    'tarikh_pembayaran' => now()->toDateString(),
    'masa_pembayaran' => now()->toTimeString(),
]);

echo "Created Pembayaran id: {$p->id}\n";
echo json_encode($p->toArray(), JSON_PRETTY_PRINT) . PHP_EOL;

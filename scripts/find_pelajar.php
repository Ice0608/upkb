<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$ic = $argv[1] ?? '900101010104';
$pel = App\Models\Pelajar::where('ic_pelajar', $ic)->first();
if ($pel) {
    echo "FOUND Pelajar ID: " . $pel->id . PHP_EOL;
    echo json_encode($pel->toArray(), JSON_PRETTY_PRINT) . PHP_EOL;
} else {
    echo "NOTFOUND" . PHP_EOL;
}

<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$k = App\Models\Kursus::first();
if ($k) {
    echo json_encode($k->toArray(), JSON_PRETTY_PRINT) . PHP_EOL;
} else {
    echo "NO KURSUS" . PHP_EOL;
}

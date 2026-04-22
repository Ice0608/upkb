<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$e = App\Models\Event::find(1);
if ($e) {
    echo "FOUND:" . $e->id . PHP_EOL;
    echo json_encode($e->toArray(), JSON_PRETTY_PRINT) . PHP_EOL;
} else {
    echo "NOTFOUND" . PHP_EOL;
}

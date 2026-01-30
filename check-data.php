<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Portfolio Count: " . App\Models\Portfolio::count() . PHP_EOL;
echo PHP_EOL;

$portfolios = App\Models\Portfolio::all(['id', 'title', 'is_featured', 'technologies']);
foreach ($portfolios as $portfolio) {
    echo "ID: {$portfolio->id} - {$portfolio->title}" . PHP_EOL;
    echo "  Featured: " . ($portfolio->is_featured ? 'Yes' : 'No') . PHP_EOL;
    echo "  Technologies: " . implode(', ', $portfolio->technologies ?? []) . PHP_EOL;
    echo PHP_EOL;
}

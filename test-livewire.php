<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== LIVEWIRE COMPONENT TEST ===" . PHP_EOL;
echo PHP_EOL;

// Test 1: Check if Livewire is installed
echo "1. Livewire installed: ";
if (class_exists('Livewire\Component')) {
    echo "✓ YES" . PHP_EOL;
} else {
    echo "✗ NO (CRITICAL)" . PHP_EOL;
}

// Test 2: Check if ProjectFilter component exists
echo "2. ProjectFilter component exists: ";
if (class_exists('App\Livewire\ProjectFilter')) {
    echo "✓ YES" . PHP_EOL;
} else {
    echo "✗ NO (CRITICAL)" . PHP_EOL;
}

// Test 3: Check if ApiContact component exists
echo "3. ApiContact component exists: ";
if (class_exists('App\Livewire\ApiContact')) {
    echo "✓ YES" . PHP_EOL;
} else {
    echo "✗ NO (CRITICAL)" . PHP_EOL;
}

// Test 4: Check portfolio count
$count = App\Models\Portfolio::count();
echo "4. Portfolio count: {$count}" . ($count > 0 ? " ✓" : " ✗") . PHP_EOL;

// Test 5: Try to instantiate the component
echo "5. Can instantiate ProjectFilter: ";
try {
    $component = new App\Livewire\ProjectFilter();
    echo "✓ YES" . PHP_EOL;
    
    // Try to get the portfolios
    echo "6. Testing component render method..." . PHP_EOL;
    $component->mount();
    $view = $component->render();
    $data = $view->getData();
    
    echo "   - Portfolios in component: " . $data['portfolios']->count() . PHP_EOL;
    echo "   - Technologies available: " . $data['technologies']->count() . PHP_EOL;
    
} catch (\Exception $e) {
    echo "✗ ERROR: " . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL;
echo "=== END TEST ===" . PHP_EOL;

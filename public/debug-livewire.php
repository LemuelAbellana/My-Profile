<!DOCTYPE html>
<html>
<head>
    <title>Debug - Livewire Render Test</title>
</head>
<body>
    <h1>Testing Livewire Component Rendering</h1>
    
    <?php
    require __DIR__.'/vendor/autoload.php';
    $app = require_once __DIR__.'/bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();
    
    // Try to render the ProjectFilter component directly
    try {
        $component = new App\Livewire\ProjectFilter();
        $component->mount();
        
        echo "<h2>Component Data:</h2>";
        echo "<pre>";
        $view = $component->render();
        $data = $view->getData();
        echo "Portfolios: " . $data['portfolios']->count() . "\n";
        echo "Technologies: " . $data['technologies']->count() . "\n";
        print_r($data['technologies']->toArray());
        echo "</pre>";
        
        echo "<h2>First 2 Portfolios:</h2>";
        echo "<pre>";
        foreach($data['portfolios']->take(2) as $p) {
            echo "ID: {$p->id}\n";
            echo "Title: {$p->title}\n";
            echo "Featured: " . ($p->is_featured ? 'Yes' : 'No') . "\n";
            echo "Technologies: " . implode(', ', $p->technologies ?? []) . "\n";
            echo "---\n";
        }
        echo "</pre>";
        
    } catch (\Exception $e) {
        echo "<p style='color:red'>ERROR: " . $e->getMessage() . "</p>";
        echo "<pre>" . $e->getTraceAsString() . "</pre>";
    }
    ?>
</body>
</html>

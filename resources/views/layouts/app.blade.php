<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Living Release Note') }} - Full-Cycle IT Specialist</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|fira-code:400,500,600" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="client-mode antialiased">
    <!-- Matrix Rain Canvas for Dev Mode -->
    <canvas id="matrix-canvas" class="matrix-rain hidden"></canvas>

    <div class="relative min-h-screen">
        <!-- Header with Mode Toggle -->
        <header class="sticky top-0 z-50 backdrop-blur-sm" data-component="Header">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold">
                            <span class="client-only">Your Name</span>
                            <span class="dev-only hidden">&lt;YourName /&gt;</span>
                        </h1>
                    </div>
                    
                    <!-- Perspective Toggle Component -->
                    <livewire:perspective-toggle />
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="mt-20 border-t" data-component="Footer">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="text-center text-sm">
                    <p class="client-only">© {{ date('Y') }} Your Name. All rights reserved.</p>
                    <p class="dev-only hidden">
                        <span class="text-terminal-text">
                            // Built with Laravel {{ app()->version() }} + Livewire 3<br>
                            // Last deployed: {{ now()->format('Y-m-d H:i:s') }} UTC<br>
                            // Status: 🟢 Production | Uptime: 99.8%
                        </span>
                    </p>
                </div>
            </div>
        </footer>
    </div>

    @livewireScripts
    
    <script>
        // Toggle content visibility based on mode
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('modeChanged', (event) => {
                const mode = event.mode;
                
                // Toggle visibility of mode-specific content
                document.querySelectorAll('.client-only').forEach(el => {
                    el.classList.toggle('hidden', mode !== 'client');
                });
                
                document.querySelectorAll('.dev-only').forEach(el => {
                    el.classList.toggle('hidden', mode !== 'dev');
                });
                
                // Toggle matrix canvas
                const canvas = document.getElementById('matrix-canvas');
                if (canvas) {
                    canvas.classList.toggle('hidden', mode !== 'dev');
                }
            });
        });
    </script>
</body>
</html>

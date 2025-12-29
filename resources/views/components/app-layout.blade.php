<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Living Release Note') }} | Technical Portfolio</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased" x-data="{ deconstructed: false }">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white/80 backdrop-blur-sm shadow-sm sticky top-0 z-50 border-b-2 border-blueprint">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo with Technical Typography -->
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-blueprint rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl font-mono">&lt;/&gt;</span>
                        </div>
                        <div>
                            <h1 class="text-xl font-heading font-bold text-slate-deep-900">
                                {{ config('app.name') }}
                            </h1>
                            <p class="text-xs text-technical text-slate-deep-600">
                                v1.0.0 | Status: <span class="text-emerald">PRODUCTION</span>
                            </p>
                        </div>
                    </div>

                    <!-- Navigation Links with Technical Styling -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#specs" class="text-slate-deep-700 hover:text-blueprint transition font-medium">
                            <span class="text-blueprint text-xs">01.</span> SPECIFICATIONS
                        </a>
                        <a href="#portfolio" class="text-slate-deep-700 hover:text-blueprint transition font-medium">
                            <span class="text-blueprint text-xs">02.</span> PROJECTS
                        </a>
                        <a href="#career" class="text-slate-deep-700 hover:text-blueprint transition font-medium">
                            <span class="text-blueprint text-xs">03.</span> TIMELINE
                        </a>
                        <a href="#contact" class="text-slate-deep-700 hover:text-blueprint transition font-medium">
                            <span class="text-blueprint text-xs">04.</span> CONTACT
                        </a>
                        
                        <!-- Deconstruct Toggle Button -->
                        <button 
                            @click="deconstructed = !deconstructed"
                            class="px-4 py-2 border-2 border-blueprint text-blueprint hover:bg-blueprint hover:text-white transition font-mono text-sm font-bold rounded"
                            :class="{ 'bg-blueprint text-white': deconstructed }"
                        >
                            <span x-show="!deconstructed">⏏ DECONSTRUCT</span>
                            <span x-show="deconstructed">⏏ RECONSTRUCT</span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white/90 border-t-2 border-blueprint mt-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="grid md:grid-cols-4 gap-12">
                    <div class="md:col-span-2">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-blueprint rounded flex items-center justify-center">
                                <span class="text-white font-bold font-mono">&lt;/&gt;</span>
                            </div>
                            <h3 class="text-lg font-heading font-bold">{{ config('app.name') }}</h3>
                        </div>
                        <p class="text-slate-deep-600 mb-4 leading-relaxed">
                            A technical portfolio demonstrating full-cycle software engineering expertise across Programming, Project Management, and Quality Assurance.
                        </p>
                        <div class="flex items-center space-x-2 text-technical">
                            <span class="text-emerald">●</span>
                            <span class="text-slate-deep-600">All systems operational</span>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-heading font-bold mb-4 text-blueprint">QUICK ACCESS</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#specs" class="text-slate-deep-600 hover:text-blueprint transition">→ Specifications</a></li>
                            <li><a href="#portfolio" class="text-slate-deep-600 hover:text-blueprint transition">→ Projects</a></li>
                            <li><a href="#career" class="text-slate-deep-600 hover:text-blueprint transition">→ Timeline</a></li>
                            <li><a href="#contact" class="text-slate-deep-600 hover:text-blueprint transition">→ Contact API</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-heading font-bold mb-4 text-blueprint">STACK INFO</h3>
                        <ul class="space-y-2 text-sm text-technical text-slate-deep-600">
                            <li>Laravel {{ app()->version() }}</li>
                            <li>Livewire 3.x</li>
                            <li>Alpine.js 3.x</li>
                            <li>Tailwind CSS</li>
                        </ul>
                    </div>
                </div>
                
                <div class="mt-12 pt-8 border-t border-blueprint-200">
                    <div class="flex flex-col md:flex-row justify-between items-center text-sm text-slate-deep-600">
                        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                        <p class="text-technical mt-2 md:mt-0">
                            Built with precision | Tested rigorously | Deployed confidently
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>

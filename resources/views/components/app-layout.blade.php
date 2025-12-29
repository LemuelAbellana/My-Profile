<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Living Release Note') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            {{ config('app.name') }}
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:flex space-x-8">
                        <a href="#portfolio" class="text-gray-700 hover:text-blue-600 transition">Portfolio</a>
                        <a href="#career" class="text-gray-700 hover:text-blue-600 transition">Career</a>
                        <a href="#contact" class="text-gray-700 hover:text-blue-600 transition">Contact</a>
                    </div>

                    <!-- Theme Toggle -->
                    <div class="flex items-center space-x-4">
                        @livewire('perspective-toggle')
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">{{ config('app.name') }}</h3>
                        <p class="text-gray-600">
                            A dual-perspective portfolio showcasing expertise in Programming, Project Management, and Quality Assurance.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#portfolio" class="text-gray-600 hover:text-blue-600">Portfolio</a></li>
                            <li><a href="#career" class="text-gray-600 hover:text-blue-600">Career Timeline</a></li>
                            <li><a href="#contact" class="text-gray-600 hover:text-blue-600">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Connect</h3>
                        <p class="text-gray-600">
                            Get in touch for collaborations or inquiries.
                        </p>
                    </div>
                </div>
                <div class="mt-8 pt-8 border-t border-gray-200 text-center text-gray-600">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>

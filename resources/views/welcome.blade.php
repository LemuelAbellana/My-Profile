<x-app-layout>
    <!-- Hero Section -->
    <section class="py-20" data-component="HeroSection">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <!-- Client Mode Content -->
                    <div class="client-only">
                        <h1 class="text-5xl font-bold mb-4 text-gray-900">
                            Building Reliable Digital Products
                        </h1>
                        <p class="text-xl text-gray-600 mb-8">
                            I bridge the gap between business goals and technical execution.
                        </p>
                        <a href="#portfolio" 
                           class="inline-block px-8 py-3 bg-client-500 text-white rounded-lg font-semibold hover:bg-client-600 transition">
                            View Portfolio
                        </a>
                    </div>

                    <!-- Dev Mode Content -->
                    <div class="dev-only hidden">
                        <h1 class="text-4xl font-bold mb-4 text-terminal-text font-mono">
                            class Developer extends Human<br>
                            implements PM, QA {
                        </h1>
                        <p class="text-lg text-terminal-text mb-8 font-mono">
                            public $status = 'Ready to Deploy';<br>
                            // Test Coverage: 100%
                        </p>
                        <button 
                           onclick="window.location.href='#portfolio'"
                           class="inline-block px-8 py-3 bg-dev-500 text-terminal-bg rounded-lg font-semibold hover:bg-dev-600 transition font-mono">
                            echo "View Source";
                        </button>
                    </div>
                </div>

                <!-- Profile Image -->
                <div class="relative">
                    <div class="client-only">
                        <img src="/images/profile.jpg" 
                             alt="Professional Portrait" 
                             class="rounded-lg shadow-2xl w-full"
                             onerror="this.src='https://ui-avatars.com/api/?name=Your+Name&size=500&background=3b82f6&color=fff'">
                    </div>
                    <div class="dev-only hidden relative">
                        <img src="/images/profile.jpg" 
                             alt="Developer Portrait" 
                             class="rounded-lg shadow-2xl w-full opacity-80"
                             onerror="this.src='https://ui-avatars.com/api/?name=Your+Name&size=500&background=16a34a&color=0a0a0a'">
                        <div class="absolute inset-0 border-2 border-dev-500 rounded-lg" 
                             style="background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(22, 163, 74, 0.1) 2px, rgba(22, 163, 74, 0.1) 4px);"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kanban Career Section -->
    <section id="about" class="py-20 bg-gray-50" data-component="AboutSection">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold mb-12 text-center">
                <span class="client-only">My Journey</span>
                <span class="dev-only hidden">// Career Timeline</span>
            </h2>
            
            <livewire:kanban-career />
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-20" data-component="PortfolioSection">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold mb-12 text-center">
                <span class="client-only">Featured Projects</span>
                <span class="dev-only hidden">// $projects->where('quality', 'verified')</span>
            </h2>
            
            <livewire:portfolio-grid />
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50" data-component="ContactSection">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold mb-12 text-center">
                <span class="client-only">Get In Touch</span>
                <span class="dev-only hidden">// Submit Support Ticket</span>
            </h2>
            
            <livewire:support-ticket />
        </div>
    </section>
</x-app-layout>

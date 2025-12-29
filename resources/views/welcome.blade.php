<x-app-layout>
    <!-- Hero Section with Exploded Architecture -->
    <section id="specs" class="pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left: Text Content -->
                <div class="space-y-8">
                    <div>
                        <p class="text-blueprint font-mono text-sm mb-2">/** SYSTEM SPECIFICATIONS */</p>
                        <h1 class="text-6xl font-heading font-bold text-slate-deep-900 leading-tight mb-6">
                            Full-Stack<br/>
                            <span class="text-blueprint">Engineering</span><br/>
                            Architecture
                        </h1>
                        <p class="text-xl text-slate-deep-600 leading-relaxed">
                            Building robust software systems through the complete development lifecycle—from strategic planning to quality deployment.
                        </p>
                    </div>
                    
                    <!-- Skill Badges -->
                    <div class="flex flex-wrap gap-3">
                        <div class="tech-card px-4 py-2">
                            <span class="text-sm font-mono text-electric-blue">PM</span>
                            <span class="text-sm text-slate-deep-700 ml-2">Strategic Architect</span>
                        </div>
                        <div class="tech-card px-4 py-2">
                            <span class="text-sm font-mono text-blueprint">DEV</span>
                            <span class="text-sm text-slate-deep-700 ml-2">Laravel Engineer</span>
                        </div>
                        <div class="tech-card px-4 py-2">
                            <span class="text-sm font-mono text-safety-orange">QA</span>
                            <span class="text-sm text-slate-deep-700 ml-2">Quality Controller</span>
                        </div>
                    </div>
                </div>

                <!-- Right: 3D Layered Deconstruct -->
                <div class="layer-container relative h-[500px]" :class="{ 'deconstructed': deconstructed }">
                    <!-- Front Layer: PM -->
                    <div class="layer layer-front absolute inset-0 bg-white border-2 border-electric-blue rounded-lg p-8 shadow-xl">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-electric-blue rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-heading font-bold text-lg text-electric-blue mb-2">PROJECT MANAGER</h3>
                                <p class="text-sm text-slate-deep-700 leading-relaxed">Strategic planning, stakeholder alignment, and roadmap execution with Agile/Scrum methodologies.</p>
                                <div class="mt-4 space-y-2 text-xs font-mono text-slate-deep-600">
                                    <div>✓ Sprint Planning & Execution</div>
                                    <div>✓ Risk Assessment & Mitigation</div>
                                    <div>✓ Resource Optimization</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Layer: DEV -->
                    <div class="layer layer-middle absolute inset-0 bg-white border-2 border-blueprint rounded-lg p-8 shadow-xl">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blueprint rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-heading font-bold text-lg text-blueprint mb-2">DEVELOPER</h3>
                                <p class="text-sm text-slate-deep-700 leading-relaxed">Full-stack development with Laravel, Livewire, and modern JavaScript frameworks.</p>
                                <div class="mt-4 bg-slate-deep-900 rounded p-3 text-xs font-mono text-emerald">
                                    <div>class Engineer {</div>
                                    <div class="ml-4">public $stack = [</div>
                                    <div class="ml-8">'Laravel', 'Livewire',</div>
                                    <div class="ml-8">'Alpine.js', 'Tailwind'</div>
                                    <div class="ml-4">];</div>
                                    <div>}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Back Layer: QA -->
                    <div class="layer layer-back absolute inset-0 bg-white border-2 border-safety-orange rounded-lg p-8 shadow-xl">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-safety-orange rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-heading font-bold text-lg text-safety-orange mb-2">QA ENGINEER</h3>
                                <p class="text-sm text-slate-deep-700 leading-relaxed">Comprehensive testing strategies ensuring reliability and performance.</p>
                                <div class="mt-4 space-y-2">
                                    <div class="flex items-center text-xs">
                                        <span class="test-pass mr-2">✓</span>
                                        <span class="text-slate-deep-600">Unit Tests: 98% Coverage</span>
                                    </div>
                                    <div class="flex items-center text-xs">
                                        <span class="test-pass mr-2">✓</span>
                                        <span class="text-slate-deep-600">Integration Tests: Passing</span>
                                    </div>
                                    <div class="flex items-center text-xs">
                                        <span class="test-pass mr-2">✓</span>
                                        <span class="text-slate-deep-600">Performance: Lighthouse 95+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section with Semantic Zoom -->
    <section id="portfolio" class="py-20 bg-white/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <p class="text-blueprint font-mono text-sm mb-2">/** PROJECT SHOWCASE */</p>
                <h2 class="text-4xl font-heading font-bold text-slate-deep-900 mb-4">Featured Projects</h2>
                <p class="text-slate-deep-600 max-w-2xl">Each project demonstrates full-cycle involvement from requirements gathering to deployment.</p>
            </div>

            @livewire('portfolio-grid')
        </div>
    </section>

    <!-- Career Timeline -->
    <section id="career" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <p class="text-blueprint font-mono text-sm mb-2">/** PROFESSIONAL TIMELINE */</p>
                <h2 class="text-4xl font-heading font-bold text-slate-deep-900 mb-4">Career Path</h2>
                <p class="text-slate-deep-600 max-w-2xl">Progressive growth across technical and leadership roles.</p>
            </div>

            @livewire('kanban-career')
        </div>
    </section>

    <!-- API Contact Section -->
    <section id="contact" class="py-20 bg-white/50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <p class="text-blueprint font-mono text-sm mb-2">/** CONTACT ENDPOINT */</p>
                <h2 class="text-4xl font-heading font-bold text-slate-deep-900 mb-4">Initiate Connection</h2>
                <p class="text-slate-deep-600">Submit a request through the API interface below.</p>
            </div>

            @livewire('api-contact')
        </div>
    </section>
</x-app-layout>

<x-layouts.app-cyber>
    {{-- Scroll Progress Bar --}}
    <div class="scroll-progress" x-data="scrollProgress()" x-bind:style="`transform: scaleX(${progress})`"></div>

    {{-- Gradient Orbs Background --}}
    <x-gradient-orb color="emerald" size="700" position="top-right" />
    <x-gradient-orb color="violet" size="600" position="bottom-left" />

    {{-- Hero Section with Enhanced Typewriter & Role Badges --}}
    <section id="hero" class="min-h-screen flex items-center justify-center pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            {{-- Status Indicator --}}
            <div class="status-indicator justify-center mb-6" data-aos="fade-down">
                <span class="status-dot online"></span>
                <span class="text-syntax-comment font-mono text-sm">// Available for hire</span>
            </div>
            
            {{-- Role Badges with Staggered Animation --}}
            <div class="flex gap-3 justify-center mb-6 flex-wrap">
                <span class="hero-badge px-4 py-2 rounded-lg bg-syntax-keyword/10 border border-syntax-keyword/30 text-syntax-keyword font-mono text-sm font-semibold">
                    PM
                </span>
                <span class="hero-badge px-4 py-2 rounded-lg bg-syntax-string/10 border border-syntax-string/30 text-syntax-string font-mono text-sm font-semibold">
                    DEV
                </span>
                <span class="hero-badge px-4 py-2 rounded-lg bg-syntax-variable/10 border border-syntax-variable/30 text-syntax-variable font-mono text-sm font-semibold">
                    QA
                </span>
            </div>
            
            <h1 class="text-6xl md:text-8xl font-heading font-bold mb-6" data-aos="fade-up">
                <span class="text-syntax-comment">// </span>Hi, I'm <span class="text-syntax-string glow-effect">Lemuel</span>
            </h1>
            <div class="text-3xl md:text-5xl font-mono font-bold mb-8 h-20 flex items-center justify-center" data-aos="fade-up" data-aos-delay="200">
                <span class="text-syntax-keyword">const</span>
                <span class="text-syntax-variable mx-2">role</span>
                <span class="text-syntax-keyword">=</span>
                <span id="hero-typewriter" class="text-syntax-string ml-2"></span>
                <span class="text-syntax-keyword">;</span>
            </div>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-12 font-sans" data-aos="fade-up" data-aos-delay="400">
                <span class="text-syntax-comment">/** </span>
                Crafting elegant solutions with modern web technologies. Passionate about clean code, user experience, and continuous learning.
                <span class="text-syntax-comment"> */</span>
            </p>
            <div class="flex gap-4 justify-center flex-wrap" data-aos="fade-up" data-aos-delay="600">
                <a href="#projects" class="cyber-btn inline-block">
                    <span class="relative z-10">View My Work</span>
                </a>
                <a href="#contact" class="cyber-btn-outline inline-block">
                    <span class="relative z-10">Get In Touch</span>
                </a>
            </div>
            
            {{-- Scroll Indicator --}}
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce" data-aos="fade-in" data-aos-delay="1000">
                <svg class="w-6 h-6 text-syntax-string" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </div>
        </div>
    </section>

    {{-- Skills Bento Grid Section with Enhanced Layout --}}
    <section id="skills" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-heading font-bold text-center mb-4">
                <span class="text-syntax-comment">// </span>
                Skills & <span class="text-syntax-string">Expertise</span>
            </h2>
            <p class="text-gray-400 text-center mb-12 max-w-2xl mx-auto font-sans">
                <span class="text-syntax-comment">/** </span>Technologies and tools I work with to build modern web applications<span class="text-syntax-comment"> */</span>
            </p>
            
            <div class="bento-container">
                {{-- Large Featured Skill - Laravel (2x2) --}}
                <div class="bento-item bento-featured">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="text-6xl">🔥</div>
                        <div>
                            <h3 class="text-3xl font-heading font-bold text-white" style="color: white !important;">Laravel</h3>
                            <p class="text-syntax-comment font-mono text-sm">v11.x</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 text-lg font-sans leading-relaxed">
                        Full-stack PHP framework for building elegant, feature-rich web applications with clean architecture and robust security
                    </p>
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm text-gray-400 mb-1 font-mono">
                            <span class="text-syntax-keyword">proficiency</span>
                            <span class="text-syntax-string font-semibold">90%</span>
                        </div>
                        <div class="w-full bg-slate-900 rounded-full h-3 overflow-hidden">
                            <div class="bg-gradient-to-r from-syntax-string to-syntax-keyword h-3 rounded-full transition-all duration-1000 ease-out" 
                                 style="width: 90%"></div>
                        </div>
                    </div>
                    {{-- Tech Tags --}}
                    <div class="flex flex-wrap gap-2 mt-6">
                        <span class="tech-badge">Eloquent ORM</span>
                        <span class="tech-badge">Blade Templates</span>
                        <span class="tech-badge">Livewire</span>
                        <span class="tech-badge">API Development</span>
                    </div>
                </div>
                
                {{-- Small Skills Cards --}}
                <div class="bento-item">
                    <div class="text-4xl mb-3">⚡</div>
                    <h4 class="text-xl font-heading font-semibold mb-2 text-white">Livewire</h4>
                    <p class="text-sm text-gray-400 mb-3 font-sans">Dynamic UIs without leaving PHP</p>
                    <div class="w-full bg-slate-900 rounded-full h-2">
                        <div class="bg-syntax-variable h-2 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
                
                <div class="bento-item">
                    <div class="text-4xl mb-3">🎨</div>
                    <h4 class="text-xl font-heading font-semibold mb-2 text-white">Tailwind CSS</h4>
                    <p class="text-sm text-gray-400 mb-3 font-sans">Utility-first CSS framework</p>
                    <div class="w-full bg-slate-900 rounded-full h-2">
                        <div class="bg-syntax-keyword h-2 rounded-full" style="width: 95%"></div>
                    </div>
                </div>
                
                <div class="bento-item md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="text-3xl">🗃️</div>
                        <h4 class="text-xl font-heading font-semibold text-white">Database & Backend</h4>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="tech-badge">MySQL</span>
                        <span class="tech-badge">PostgreSQL</span>
                        <span class="tech-badge">Redis</span>
                        <span class="tech-badge">REST APIs</span>
                        <span class="tech-badge">GraphQL</span>
                        <span class="tech-badge">Microservices</span>
                    </div>
                </div>
                
                <div class="bento-item">
                    <div class="text-4xl mb-3">🚀</div>
                    <h4 class="text-xl font-heading font-semibold mb-2 text-white">DevOps</h4>
                    <p class="text-sm text-gray-400 mb-3 font-sans">CI/CD & deployment</p>
                    <div class="w-full bg-slate-900 rounded-full h-2">
                        <div class="bg-syntax-method h-2 rounded-full" style="width: 80%"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Projects Section with Bento Grid & Livewire Filter --}}
    <section id="projects" class="py-20 bg-slate-950/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-heading font-bold text-center mb-4">
                <span class="text-syntax-comment">// </span>
                Featured <span class="text-syntax-string">Projects</span>
            </h2>
            <p class="text-gray-400 text-center mb-12 max-w-2xl mx-auto font-sans">
                <span class="text-syntax-comment">/** </span>A collection of production-ready applications and experiments<span class="text-syntax-comment"> */</span>
            </p>
            
            @livewire('project-filter')
        </div>
    </section>

    {{-- Contact Section with Terminal Interface --}}
    <section id="contact" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-heading font-bold text-center mb-4">
                <span class="text-syntax-comment">// </span>
                Get In <span class="text-syntax-string">Touch</span>
            </h2>
            <p class="text-gray-400 text-center mb-12 max-w-2xl mx-auto font-sans">
                <span class="text-syntax-comment">/** </span>Have a project in mind? Execute the contact protocol below<span class="text-syntax-comment"> */</span>
            </p>
            
            <div class="grid md:grid-cols-5 gap-8 max-w-6xl mx-auto">
                {{-- Terminal Contact Form (3 columns) --}}
                <div class="md:col-span-3">
                    <x-glass-card class="terminal-interface overflow-hidden">
                        {{-- Terminal Header --}}
                        <div class="terminal-header bg-cyber-dark px-4 py-3 flex items-center justify-between border-b border-syntax-comment/20">
                            <div class="flex items-center gap-2">
                                <div class="flex gap-1.5">
                                    <div class="w-3 h-3 rounded-full bg-syntax-error"></div>
                                    <div class="w-3 h-3 rounded-full bg-syntax-method"></div>
                                    <div class="w-3 h-3 rounded-full bg-syntax-string"></div>
                                </div>
                                <span class="font-mono text-xs text-syntax-comment ml-3">bash — contact.sh</span>
                            </div>
                        </div>

                        {{-- Terminal Body --}}
                        <div class="terminal-body bg-cyber-black p-6 font-mono text-sm min-h-[500px]" 
                             x-data="{ bootComplete: false, focusedInput: 'name' }"
                             x-init="setTimeout(() => { bootComplete = true; $nextTick(() => $refs.nameInput?.focus()) }, 800)">
                            
                            {{-- Initial Boot Sequence --}}
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center gap-2 text-syntax-string">
                                    <span class="terminal-prompt">➜</span>
                                    <span x-show="bootComplete">./contact.sh --interactive</span>
                                    <span class="terminal-cursor" x-show="!bootComplete">█</span>
                                </div>
                                
                                <template x-if="bootComplete">
                                    <div class="text-syntax-comment space-y-1">
                                        <div class="terminal-line opacity-0" style="animation: fadeIn 0.3s ease 0.1s forwards">
                                            <span class="text-syntax-keyword">◆</span> Initializing contact protocol...
                                            <span class="text-syntax-string ml-2">✓</span>
                                        </div>
                                        <div class="terminal-line opacity-0" style="animation: fadeIn 0.3s ease 0.4s forwards">
                                            <span class="text-syntax-keyword">◆</span> Loading developer profile...
                                            <span class="text-syntax-string ml-2">✓</span>
                                        </div>
                                        <div class="terminal-line opacity-0" style="animation: fadeIn 0.3s ease 0.7s forwards">
                                            <span class="text-syntax-keyword">◆</span> Awaiting input parameters...
                                        </div>
                                    </div>
                                </template>
                            </div>

                            {{-- Interactive Form Fields --}}
                            <div class="space-y-4" x-show="bootComplete" x-transition>
                                <p class="text-syntax-comment text-xs mb-4">// Enter your contact details below:</p>
                                
                                @livewire('api-contact')
                            </div>
                        </div>

                        {{-- Terminal Footer --}}
                        <div class="terminal-footer bg-cyber-dark px-4 py-2 border-t border-syntax-comment/20 flex items-center justify-between font-mono text-xs">
                            <div class="flex items-center gap-4 text-syntax-comment">
                                <span>contact.sh</span>
                            </div>
                            <div class="flex items-center gap-4 text-syntax-comment">
                                <span class="flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-syntax-string animate-pulse"></span>
                                    Ready
                                </span>
                            </div>
                        </div>
                    </x-glass-card>
                </div>
                
                {{-- Social Links (2 columns) --}}
                <div class="md:col-span-2 space-y-4">
                    {{-- Code File Header --}}
                    <x-glass-card class="p-6">
                        <div class="flex items-center gap-2 mb-4 pb-3 border-b border-syntax-comment/20">
                            <div class="w-3 h-3 rounded-full bg-syntax-keyword"></div>
                            <span class="font-mono text-xs text-syntax-comment">social-links.ts</span>
                        </div>
                        
                        <div class="font-mono text-sm space-y-4">
                            <div>
                                <span class="text-syntax-keyword">export const</span>
                                <span class="text-syntax-variable"> socialLinks</span>
                                <span class="text-white"> = {</span>
                            </div>
                            
                            <div class="ml-4 space-y-3">
                                <a href="mailto:your@email.com" 
                                   class="flex items-center gap-3 group hover:translate-x-1 transition-transform">
                                    <span class="text-3xl">📧</span>
                                    <div class="flex-1">
                                        <div class="text-syntax-variable text-xs">email</div>
                                        <div class="text-syntax-string group-hover:text-white transition-colors">"your@email.com"</div>
                                    </div>
                                </a>
                                
                                <a href="https://github.com/yourusername" 
                                   target="_blank"
                                   class="flex items-center gap-3 group hover:translate-x-1 transition-transform">
                                    <span class="text-3xl">💻</span>
                                    <div class="flex-1">
                                        <div class="text-syntax-variable text-xs">github</div>
                                        <div class="text-syntax-string group-hover:text-white transition-colors">"@yourusername"</div>
                                    </div>
                                </a>
                                
                                <a href="https://linkedin.com/in/yourprofile" 
                                   target="_blank"
                                   class="flex items-center gap-3 group hover:translate-x-1 transition-transform">
                                    <span class="text-3xl">💼</span>
                                    <div class="flex-1">
                                        <div class="text-syntax-variable text-xs">linkedin</div>
                                        <div class="text-syntax-string group-hover:text-white transition-colors">"yourprofile"</div>
                                    </div>
                                </a>
                                
                                <a href="https://twitter.com/yourusername" 
                                   target="_blank"
                                   class="flex items-center gap-3 group hover:translate-x-1 transition-transform">
                                    <span class="text-3xl">🐦</span>
                                    <div class="flex-1">
                                        <div class="text-syntax-variable text-xs">facebook</div>
                                        <div class="text-syntax-string group-hover:text-white transition-colors">"@yourusername"</div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="text-white">};</div>
                            
                            <div class="text-syntax-comment text-xs pt-3 border-t border-syntax-comment/20">
                                // Feel free to reach out! 👋
                            </div>
                        </div>
                    </x-glass-card>
                    
                    {{-- Response Time Card --}}
                    <x-glass-card class="p-4 bg-syntax-string/5 border border-syntax-string/20">
                        <div class="flex items-start gap-3">
                            <div class="text-2xl">⚡</div>
                            <div class="flex-1">
                                <div class="font-mono text-xs text-syntax-comment mb-1">// Response time</div>
                                <div class="text-white font-semibold">Usually within 24 hours</div>
                            </div>
                        </div>
                    </x-glass-card>
                </div>
            </div>
        </div>
    </section>

    {{-- Initialize Typewriter --}}
    <script>
        // Call typewriter initialization after page loads
        window.addEventListener('DOMContentLoaded', function() {
            if (typeof window.initTypewriter === 'function') {
                window.initTypewriter();
            }
        });
    </script>
</x-layouts.app-cyber>

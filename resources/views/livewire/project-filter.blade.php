<div>
    <!-- Filter Controls with Pills -->
    <div class="mb-12 flex flex-col gap-6">
        <!-- Technology Pills -->
        <div class="flex flex-wrap justify-center gap-3">
            <button 
                wire:click="$set('selectedTechnology', 'all')"
                class="category-pill {{ $selectedTechnology === 'all' ? 'active' : '' }}">
                <span class="text-syntax-comment font-mono">All</span>
            </button>
            @foreach($technologies as $tech)
                <button 
                    wire:click="$set('selectedTechnology', '{{ $tech }}')"
                    class="category-pill {{ $selectedTechnology === $tech ? 'active' : '' }}">
                    <span class="text-syntax-variable font-mono">{{ $tech }}</span>
                </button>
            @endforeach
        </div>
        
        <!-- Search Bar -->
        <div class="max-w-xl mx-auto w-full">
            <div class="relative">
                <input 
                    type="text" 
                    wire:model.live.debounce.300ms="searchTerm"
                    placeholder="🔍 Search projects... (try 'laravel', 'api', etc.)"
                    class="w-full px-6 py-4 bg-slate-900/60 backdrop-blur-xl border-2 border-syntax-keyword/20 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:border-syntax-keyword transition-all font-mono text-sm"
                >
                @if($searchTerm)
                    <button 
                        wire:click="$set('searchTerm', '')"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white transition-colors">
                        ✕
                    </button>
                @endif
            </div>
        </div>
        
        <!-- Results Count with Code Style -->
        <div class="text-center text-sm font-mono">
            <span class="text-syntax-comment">// </span>
            <span class="text-syntax-keyword">const </span>
            <span class="text-syntax-variable">results</span>
            <span class="text-white"> = </span>
            <span class="text-syntax-string">{{ $portfolios->count() }}</span>
            <span class="text-syntax-comment">; // {{ Str::plural('project', $portfolios->count()) }} found</span>
        </div>
    </div>

    <!-- Projects Carousel with Swiper -->
    <div class="relative" wire:key="carousel-{{ $selectedTechnology }}-{{ $searchTerm }}">
        <div class="swiper projects-swiper" x-data x-init="
            $nextTick(() => {
                if (window.initProjectsCarousel) {
                    setTimeout(() => window.initProjectsCarousel(), 100);
                }
            })
        ">
            <div class="swiper-wrapper">
                @forelse($portfolios as $index => $portfolio)
                    <div class="swiper-slide" wire:key="project-{{ $portfolio->id }}">
                        <!-- Flip Card Container -->
                        <div class="flip-card h-full" x-data="{ flipped: false }" @click="flipped = !flipped" :class="{ 'is-flipped': flipped }">
                            <div class="flip-card-inner h-full">
                                <!-- Front of Card: Title Only -->
                                <div class="flip-card-front h-full flex items-center justify-center bg-slate-900/80 backdrop-blur-xl border-2 border-syntax-keyword/30 rounded-2xl p-10 shadow-xl">
                                    <div class="text-center">
                                        @if($portfolio->is_featured)
                                            <div class="mb-6">
                                                <span class="status-dot featured"></span>
                                            </div>
                                        @endif
                                        <h3 class="text-4xl md:text-5xl font-heading font-bold text-white mb-6 leading-tight">
                                            {{ $portfolio->title }}
                                        </h3>
                                        <p class="text-syntax-string text-sm font-mono animate-pulse">
                                            👆 Click to view details
                                        </p>
                                    </div>
                                </div>
                                
                                <!-- Back of Card: Full Details -->
                                <div class="flip-card-back h-full flex flex-col bg-gradient-to-br from-slate-900/95 to-slate-800/95 backdrop-blur-xl border-2 border-syntax-string/40 rounded-2xl p-10 shadow-2xl">
                                    <div class="flex-1">
                                        <h3 class="text-2xl md:text-3xl font-heading font-bold text-syntax-string mb-6">
                                            {{ $portfolio->title }}
                                        </h3>
                                        
                                        <p class="text-gray-300 text-base mb-6 line-clamp-4 font-sans leading-relaxed">
                                            {{ $portfolio->description }}
                                        </p>
                                        
                                        <!-- Tech Stack Badges -->
                                        <div class="flex flex-wrap gap-2 mb-6">
                                            @foreach($portfolio->technologies ?? [] as $tech)
                                                <span class="tech-badge text-xs">
                                                    {{ $tech }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <!-- Project Links Footer -->
                                    <div class="flex gap-4 mt-auto pt-4">
                                        @if($portfolio->github_url)
                                            <a href="{{ $portfolio->github_url }}" 
                                               target="_blank"
                                               class="flex-1 text-center cyber-btn-outline text-sm px-5 py-3 inline-block font-mono font-semibold"
                                               onclick="event.stopPropagation()">
                                                <span class="text-syntax-comment">// </span>Code
                                            </a>
                                        @endif
                                        
                                        @if($portfolio->url)
                                            <a href="{{ $portfolio->url }}" 
                                               target="_blank"
                                               class="flex-1 text-center cyber-btn text-sm px-5 py-3 inline-block font-mono font-semibold"
                                               onclick="event.stopPropagation()">
                                                🚀 Live
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="text-center py-16">
                            <div class="text-6xl mb-4">🔍</div>
                            <p class="text-gray-400 text-lg font-mono">
                                <span class="text-syntax-comment">// </span>
                                <span class="text-syntax-error">Error:</span>
                                <span class="text-white"> No projects found</span>
                            </p>
                            <p class="text-gray-500 text-sm mt-2 font-mono">
                                Try adjusting your filters or search term
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <!-- Navigation Buttons -->
            @if($portfolios->count() > 1)
                <div class="swiper-button-next !text-syntax-string hover:!text-white transition-colors"></div>
                <div class="swiper-button-prev !text-syntax-string hover:!text-white transition-colors"></div>
            @endif
            
            <!-- Pagination -->
            @if($portfolios->count() > 1)
                <div class="swiper-pagination !bottom-0 !relative mt-8"></div>
            @endif
        </div>
    </div>
    
    <!-- Loading State -->
    <div wire:loading class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center z-50">
        <div class="glass-card p-8 text-center">
            <div class="animate-spin text-6xl mb-4">⚡</div>
            <p class="text-white font-mono">
                <span class="text-syntax-keyword">Loading</span>
                <span class="text-syntax-string animate-pulse">...</span>
            </p>
        </div>
    </div>
</div>

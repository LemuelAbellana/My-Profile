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

    <!-- Projects Bento Grid with Wire Transition -->
    <div class="bento-container" wire:transition>
        @forelse($portfolios as $index => $portfolio)
            @php
                // Make first project (or featured) large, others small
                $isFeatured = $index === 0 || $portfolio->is_featured;
            @endphp
            
            <div class="bento-item {{ $isFeatured ? 'bento-featured' : '' }}" 
                 wire:key="project-{{ $portfolio->id }}">
                 
                <!-- Project Card Content -->
                <div class="flex flex-col h-full">
                    
                    <!-- Project Header -->
                    <div class="flex-1">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-xl {{ $isFeatured ? 'md:text-3xl' : 'md:text-2xl' }} font-heading font-bold text-white group-hover:text-syntax-string transition-colors">
                                {{ $portfolio->title }}
                            </h3>
                            
                            @if($portfolio->is_featured)
                                <span class="status-dot featured ml-2 flex-shrink-0"></span>
                            @endif
                        </div>
                        
                        <p class="text-gray-400 {{ $isFeatured ? 'text-base mb-6' : 'text-sm mb-4' }} line-clamp-{{ $isFeatured ? '4' : '3' }} font-sans leading-relaxed">
                            {{ $portfolio->description }}
                        </p>
                        
                        <!-- Tech Stack Badges -->
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach($portfolio->technologies ?? [] as $tech)
                                <span class="tech-badge">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Project Links Footer -->
                    <div class="flex gap-3 mt-auto">
                        @if($portfolio->github_url)
                            <a href="{{ $portfolio->github_url }}" 
                               target="_blank"
                               class="flex-1 text-center cyber-btn-outline text-sm px-4 py-2.5 inline-block font-mono"
                               onclick="event.stopPropagation()">
                                <span class="text-syntax-comment">// </span>Code
                            </a>
                        @endif
                        
                        @if($portfolio->url)
                            <a href="{{ $portfolio->url }}" 
                               target="_blank"
                               class="flex-1 text-center cyber-btn text-sm px-4 py-2.5 inline-block font-mono"
                               onclick="event.stopPropagation()">
                                🚀 Live
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16">
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
        @endforelse
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

<div class="terminal-contact-form font-mono text-sm">
    {{-- Name Input --}}
    <div class="flex items-start gap-3 mb-4">
        <span class="text-syntax-keyword">$</span>
        <div class="flex-1">
            <label class="text-syntax-variable">--name</label>
            <span class="text-syntax-comment">:</span>
            <input 
                type="text"
                wire:model.live="name"
                class="bg-transparent border-none text-syntax-string focus:ring-0 p-0 ml-2 font-mono w-full placeholder:text-syntax-comment/50"
                style="position: relative; z-index: 10; pointer-events: auto;"
                placeholder="John_Doe"
                autofocus
            />
            @error('name')
                <div class="text-syntax-error text-xs mt-1">
                    <span>// Error: </span>{{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Email Input --}}
    <div class="flex items-start gap-3 mb-4">
        <span class="text-syntax-keyword">$</span>
        <div class="flex-1">
            <label class="text-syntax-variable">--email</label>
            <span class="text-syntax-comment">:</span>
            <input 
                type="email"
                wire:model.live="email"
                class="bg-transparent border-none text-syntax-string focus:ring-0 p-0 ml-2 font-mono w-full placeholder:text-syntax-comment/50"
                style="position: relative; z-index: 10; pointer-events: auto;"
                placeholder="john@example.com"
            />
            @error('email')
                <div class="text-syntax-error text-xs mt-1">
                    <span>// Error: </span>{{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Priority Select --}}
    <div class="flex items-start gap-3 mb-4">
        <span class="text-syntax-keyword">$</span>
        <div class="flex-1">
            <label class="text-syntax-variable">--priority</label>
            <span class="text-syntax-comment">:</span>
            <div class="inline-flex gap-2 ml-2">
                <button 
                    type="button"
                    wire:click="$set('priority', 'low')" 
                    class="hover:text-syntax-string transition {{ $priority === 'low' ? 'text-syntax-string' : 'text-syntax-comment' }}">
                    [low]
                </button>
                <button 
                    type="button"
                    wire:click="$set('priority', 'medium')" 
                    class="hover:text-syntax-string transition {{ $priority === 'medium' ? 'text-syntax-string' : 'text-syntax-comment' }}">
                    [medium]
                </button>
                <button 
                    type="button"
                    wire:click="$set('priority', 'high')" 
                    class="hover:text-syntax-string transition {{ $priority === 'high' ? 'text-syntax-string' : 'text-syntax-comment' }}">
                    [high]
                </button>
            </div>
        </div>
    </div>

    {{-- Message Textarea --}}
    <div class="flex items-start gap-3 mb-4">
        <span class="text-syntax-keyword">$</span>
        <div class="flex-1">
            <label class="text-syntax-variable">--message</label>
            <span class="text-syntax-comment">:</span>
            <div class="ml-2 mt-2 border-l-2 border-syntax-comment/30 pl-4">
                <textarea 
                    wire:model.live="message"
                    rows="6"
                    class="bg-transparent border-none text-syntax-string focus:ring-0 p-0 font-mono w-full resize-none placeholder:text-syntax-comment/50"
                    style="position: relative; z-index: 10; pointer-events: auto;"
                    placeholder="Type your message here..."
                ></textarea>
            </div>
            @error('message')
                <div class="text-syntax-error text-xs mt-1 ml-2">
                    <span>// Error: </span>{{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Submit Command --}}
    <div class="flex items-center gap-3 pt-4 border-t border-syntax-comment/20">
        <span class="text-syntax-keyword">$</span>
        <button 
            type="button"
            wire:click="submit"
            class="terminal-submit-btn group flex items-center gap-2 text-syntax-string hover:text-white transition"
            wire:loading.attr="disabled">
            <span wire:loading.remove>./submit</span>
            <span wire:loading class="flex items-center gap-2">
                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                sending
            </span>
            <span class="text-syntax-comment">--async</span>
            <span class="group-hover:translate-x-1 transition-transform">→</span>
        </button>
    </div>

    {{-- Success/Error Response --}}
    @if($statusCode)
        <div class="mt-6 border-t border-syntax-comment/20 pt-4">
            <div class="text-syntax-comment mb-2 text-xs">// Response:</div>
            <div class="bg-cyber-dark rounded-lg p-4 border {{ $statusCode == 200 ? 'border-syntax-string/30' : 'border-syntax-error/30' }}">
                <div class="flex items-center gap-2 mb-2">
                    <span class="font-bold {{ $statusCode == 200 ? 'text-syntax-string' : 'text-syntax-error' }}">
                        {{ $statusCode }}
                    </span>
                    <span class="text-syntax-comment text-xs">
                        {{ $statusCode == 200 ? 'OK' : 'ERROR' }}
                    </span>
                </div>
                <pre class="text-{{ $statusCode == 200 ? 'syntax-string' : 'syntax-error' }} text-xs">{{ $statusMessage ?? 'Message sent successfully!' }}</pre>
            </div>
        </div>
    @endif

    {{-- Loading State --}}
    <div wire:loading class="mt-4 text-syntax-comment text-xs flex items-center gap-2">
        <svg class="animate-spin h-3 w-3" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span>// Processing request...</span>
    </div>
</div>
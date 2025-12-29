<div>
    <!-- Kanban Board -->
    <div class="overflow-x-auto kanban-scroll pb-4">
        <div class="flex gap-6 min-w-max">
            <!-- BACKLOG Column -->
            <div class="flex-shrink-0 w-80">
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg">
                            <span class="client-only">Future Goals</span>
                            <span class="dev-only hidden">// BACKLOG</span>
                        </h3>
                        <span class="status-badge gray">{{ $careers['backlog']->count() }}</span>
                    </div>
                    
                    <div class="space-y-3">
                        @foreach($careers['backlog'] as $career)
                            <div 
                                wire:click="viewCard({{ $career->id }})"
                                class="bg-gray-50 rounded-lg p-4 cursor-pointer hover:shadow-md transition border-l-4 border-gray-400">
                                <h4 class="font-semibold mb-2">{{ $career->title }}</h4>
                                <p class="text-sm text-gray-600 mb-2">{{ Str::limit($career->description, 60) }}</p>
                                
                                @if($career->technologies)
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($career->technologies as $tech)
                                            <span class="text-xs bg-gray-200 text-gray-700 px-2 py-1 rounded">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- IN PROGRESS Column -->
            <div class="flex-shrink-0 w-80">
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg">
                            <span class="client-only">Current Sprint</span>
                            <span class="dev-only hidden">// IN_PROGRESS</span>
                        </h3>
                        <span class="status-badge blue">{{ $careers['in_progress']->count() }}</span>
                    </div>
                    
                    <div class="space-y-3">
                        @foreach($careers['in_progress'] as $career)
                            <div 
                                wire:click="viewCard({{ $career->id }})"
                                class="bg-blue-50 rounded-lg p-4 cursor-pointer hover:shadow-md transition border-l-4 border-blue-500">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="font-semibold">{{ $career->title }}</h4>
                                    <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">
                                        {{ $career->progress }}%
                                    </span>
                                </div>
                                
                                <!-- Progress Bar -->
                                <div class="w-full bg-blue-200 rounded-full h-2 mb-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $career->progress }}%"></div>
                                </div>
                                
                                <p class="text-sm text-gray-600 mb-2">{{ Str::limit($career->description, 60) }}</p>
                                
                                @if($career->deadline)
                                    <p class="text-xs text-gray-500">
                                        ⏰ {{ abs($career->days_remaining) }} days {{ $career->days_remaining >= 0 ? 'left' : 'overdue' }}
                                    </p>
                                @endif
                                
                                @if($career->technologies)
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        @foreach($career->technologies as $tech)
                                            <span class="text-xs bg-blue-200 text-blue-700 px-2 py-1 rounded">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- SHIPPED Column -->
            <div class="flex-shrink-0 w-80">
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg">
                            <span class="client-only">Completed 🎉</span>
                            <span class="dev-only hidden">// SHIPPED</span>
                        </h3>
                        <span class="status-badge green">{{ $careers['shipped']->count() }}</span>
                    </div>
                    
                    <div class="space-y-3">
                        @foreach($careers['shipped'] as $career)
                            <div 
                                wire:click="viewCard({{ $career->id }})"
                                class="bg-green-50 rounded-lg p-4 cursor-pointer hover:shadow-md transition border-l-4 border-green-500">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="font-semibold">{{ $career->title }}</h4>
                                    <span class="text-xl">✅</span>
                                </div>
                                
                                <p class="text-sm text-gray-600 mb-2">{{ Str::limit($career->description, 60) }}</p>
                                
                                @if($career->completed_at)
                                    <p class="text-xs text-gray-500">
                                        Completed: {{ $career->completed_at->format('M Y') }}
                                    </p>
                                @endif
                                
                                @if($career->technologies)
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        @foreach($career->technologies as $tech)
                                            <span class="text-xs bg-green-200 text-green-700 px-2 py-1 rounded">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Detail Modal -->
    @if($showModal && $selectedCard)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50" wire:click="closeModal">
            <div class="bg-white rounded-lg max-w-2xl w-full p-8" wire:click.stop>
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-2xl font-bold">{{ $selectedCard->title }}</h3>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="mb-4">
                    <span class="status-badge {{ $selectedCard->status_color }}">
                        {{ strtoupper(str_replace('_', ' ', $selectedCard->status)) }}
                    </span>
                    
                    @if($selectedCard->category)
                        <span class="status-badge gray ml-2">{{ $selectedCard->category }}</span>
                    @endif
                </div>
                
                @if($selectedCard->status === 'in_progress')
                    <div class="mb-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium">Progress</span>
                            <span class="text-sm font-medium">{{ $selectedCard->progress }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $selectedCard->progress }}%"></div>
                        </div>
                    </div>
                @endif
                
                <div class="prose max-w-none mb-4">
                    <p>{{ $selectedCard->description }}</p>
                </div>
                
                @if($selectedCard->technologies)
                    <div class="mb-4">
                        <h4 class="font-semibold mb-2">Technologies:</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($selectedCard->technologies as $tech)
                                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                    @if($selectedCard->started_at)
                        <div>
                            <span class="font-semibold">Started:</span> {{ $selectedCard->started_at->format('M d, Y') }}
                        </div>
                    @endif
                    
                    @if($selectedCard->deadline)
                        <div>
                            <span class="font-semibold">Deadline:</span> {{ $selectedCard->deadline->format('M d, Y') }}
                        </div>
                    @endif
                    
                    @if($selectedCard->completed_at)
                        <div>
                            <span class="font-semibold">Completed:</span> {{ $selectedCard->completed_at->format('M d, Y') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

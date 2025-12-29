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
                        <span class="status-badge gray"><?php echo e($careers['backlog']->count()); ?></span>
                    </div>
                    
                    <div class="space-y-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $careers['backlog']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div 
                                wire:click="viewCard(<?php echo e($career->id); ?>)"
                                class="bg-gray-50 rounded-lg p-4 cursor-pointer hover:shadow-md transition border-l-4 border-gray-400">
                                <h4 class="font-semibold mb-2"><?php echo e($career->title); ?></h4>
                                <p class="text-sm text-gray-600 mb-2"><?php echo e(Str::limit($career->description, 60)); ?></p>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($career->technologies): ?>
                                    <div class="flex flex-wrap gap-1">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $career->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="text-xs bg-gray-200 text-gray-700 px-2 py-1 rounded">
                                                <?php echo e($tech); ?>

                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                        <span class="status-badge blue"><?php echo e($careers['in_progress']->count()); ?></span>
                    </div>
                    
                    <div class="space-y-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $careers['in_progress']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div 
                                wire:click="viewCard(<?php echo e($career->id); ?>)"
                                class="bg-blue-50 rounded-lg p-4 cursor-pointer hover:shadow-md transition border-l-4 border-blue-500">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="font-semibold"><?php echo e($career->title); ?></h4>
                                    <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">
                                        <?php echo e($career->progress); ?>%
                                    </span>
                                </div>
                                
                                <!-- Progress Bar -->
                                <div class="w-full bg-blue-200 rounded-full h-2 mb-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: <?php echo e($career->progress); ?>%"></div>
                                </div>
                                
                                <p class="text-sm text-gray-600 mb-2"><?php echo e(Str::limit($career->description, 60)); ?></p>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($career->deadline): ?>
                                    <p class="text-xs text-gray-500">
                                        ⏰ <?php echo e(abs($career->days_remaining)); ?> days <?php echo e($career->days_remaining >= 0 ? 'left' : 'overdue'); ?>

                                    </p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($career->technologies): ?>
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $career->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="text-xs bg-blue-200 text-blue-700 px-2 py-1 rounded">
                                                <?php echo e($tech); ?>

                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                        <span class="status-badge green"><?php echo e($careers['shipped']->count()); ?></span>
                    </div>
                    
                    <div class="space-y-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $careers['shipped']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div 
                                wire:click="viewCard(<?php echo e($career->id); ?>)"
                                class="bg-green-50 rounded-lg p-4 cursor-pointer hover:shadow-md transition border-l-4 border-green-500">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="font-semibold"><?php echo e($career->title); ?></h4>
                                    <span class="text-xl">✅</span>
                                </div>
                                
                                <p class="text-sm text-gray-600 mb-2"><?php echo e(Str::limit($career->description, 60)); ?></p>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($career->completed_at): ?>
                                    <p class="text-xs text-gray-500">
                                        Completed: <?php echo e($career->completed_at->format('M Y')); ?>

                                    </p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($career->technologies): ?>
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $career->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="text-xs bg-green-200 text-green-700 px-2 py-1 rounded">
                                                <?php echo e($tech); ?>

                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Detail Modal -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showModal && $selectedCard): ?>
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50" wire:click="closeModal">
            <div class="bg-white rounded-lg max-w-2xl w-full p-8" wire:click.stop>
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-2xl font-bold"><?php echo e($selectedCard->title); ?></h3>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="mb-4">
                    <span class="status-badge <?php echo e($selectedCard->status_color); ?>">
                        <?php echo e(strtoupper(str_replace('_', ' ', $selectedCard->status))); ?>

                    </span>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedCard->category): ?>
                        <span class="status-badge gray ml-2"><?php echo e($selectedCard->category); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedCard->status === 'in_progress'): ?>
                    <div class="mb-4">
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium">Progress</span>
                            <span class="text-sm font-medium"><?php echo e($selectedCard->progress); ?>%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: <?php echo e($selectedCard->progress); ?>%"></div>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <div class="prose max-w-none mb-4">
                    <p><?php echo e($selectedCard->description); ?></p>
                </div>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedCard->technologies): ?>
                    <div class="mb-4">
                        <h4 class="font-semibold mb-2">Technologies:</h4>
                        <div class="flex flex-wrap gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $selectedCard->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">
                                    <?php echo e($tech); ?>

                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedCard->started_at): ?>
                        <div>
                            <span class="font-semibold">Started:</span> <?php echo e($selectedCard->started_at->format('M d, Y')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedCard->deadline): ?>
                        <div>
                            <span class="font-semibold">Deadline:</span> <?php echo e($selectedCard->deadline->format('M d, Y')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedCard->completed_at): ?>
                        <div>
                            <span class="font-semibold">Completed:</span> <?php echo e($selectedCard->completed_at->format('M d, Y')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\My-Profile\resources\views/livewire/kanban-career.blade.php ENDPATH**/ ?>
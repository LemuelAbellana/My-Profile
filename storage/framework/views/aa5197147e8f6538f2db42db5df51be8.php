<div>
    <!-- Portfolio Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div 
                wire:click="viewProject(<?php echo e($portfolio->id); ?>)"
                class="bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer hover:shadow-xl transition transform hover:-translate-y-1">
                
                <!-- Thumbnail -->
                <div class="h-48 bg-gray-200 overflow-hidden">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->thumbnail): ?>
                        <img src="<?php echo e($portfolio->thumbnail); ?>" 
                             alt="<?php echo e($portfolio->title); ?>" 
                             class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <div class="flex items-start justify-between mb-2">
                        <h3 class="font-bold text-xl"><?php echo e($portfolio->title); ?></h3>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->is_featured): ?>
                            <span class="text-yellow-500">⭐</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    
                    <p class="text-gray-600 text-sm mb-4"><?php echo e(Str::limit($portfolio->description, 100)); ?></p>

                    <!-- QA Scorecard -->
                    <div class="space-y-2 mb-4">
                        <!-- Build Status -->
                        <div class="flex items-center justify-between text-sm">
                            <span class="client-only">Build:</span>
                            <span class="dev-only hidden">tests:</span>
                            <span class="font-semibold <?php echo e($portfolio->tests_passing ? 'text-green-600' : 'text-red-600'); ?>">
                                <?php echo e($portfolio->tests_passing ? '🟢 Passing' : '🔴 Failing'); ?>

                            </span>
                        </div>

                        <!-- Bugs -->
                        <div class="flex items-center justify-between text-sm">
                            <span class="client-only">Bugs:</span>
                            <span class="dev-only hidden">bugs:</span>
                            <span class="font-semibold">
                                🛡️ <?php echo e($portfolio->critical_bugs); ?> Critical
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->minor_bugs > 0): ?>
                                    , <?php echo e($portfolio->minor_bugs); ?> Minor
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </span>
                        </div>

                        <!-- Performance -->
                        <div class="flex items-center justify-between text-sm">
                            <span class="client-only">Performance:</span>
                            <span class="dev-only hidden">performance:</span>
                            <div class="flex items-center gap-2">
                                <div class="w-24 bg-gray-200 rounded-full h-2">
                                    <div 
                                        class="h-2 rounded-full <?php echo e($portfolio->performance_score >= 90 ? 'bg-green-500' : ($portfolio->performance_score >= 70 ? 'bg-yellow-500' : 'bg-red-500')); ?>" 
                                        style="width: <?php echo e($portfolio->performance_score); ?>%">
                                    </div>
                                </div>
                                <span class="font-semibold"><?php echo e($portfolio->performance_score); ?>/100</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->technologies): ?>
                        <div class="flex flex-wrap gap-1 mb-3">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = array_slice($portfolio->technologies, 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded">
                                    <?php echo e($tech); ?>

                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($portfolio->technologies) > 4): ?>
                                <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded">
                                    +<?php echo e(count($portfolio->technologies) - 4); ?>

                                </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <!-- Overall Health Badge -->
                    <div class="mt-4">
                        <span class="status-badge <?php echo e($portfolio->health_color); ?>">
                            <?php echo e(strtoupper($portfolio->health_status)); ?>

                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <!-- Project Detail Modal -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showModal && $selectedProject): ?>
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 overflow-y-auto" wire:click="closeModal">
            <div class="bg-white rounded-lg max-w-4xl w-full p-8 my-8" wire:click.stop>
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-3xl font-bold mb-2"><?php echo e($selectedProject->title); ?></h2>
                        <div class="flex gap-2">
                            <span class="status-badge <?php echo e($selectedProject->health_color); ?>">
                                <?php echo e(strtoupper($selectedProject->health_status)); ?>

                            </span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProject->is_featured): ?>
                                <span class="status-badge yellow">⭐ FEATURED</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Thumbnail -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProject->thumbnail): ?>
                    <div class="mb-6 rounded-lg overflow-hidden">
                        <img src="<?php echo e($selectedProject->thumbnail); ?>" 
                             alt="<?php echo e($selectedProject->title); ?>" 
                             class="w-full">
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- Description -->
                <div class="prose max-w-none mb-6">
                    <p class="text-lg"><?php echo e($selectedProject->description); ?></p>
                </div>

                <!-- QA Metrics -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="font-bold text-lg mb-4">Quality Assurance Report</h3>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="text-center">
                            <div class="text-3xl mb-2">
                                <?php echo e($selectedProject->tests_passing ? '🟢' : '🔴'); ?>

                            </div>
                            <div class="font-semibold"><?php echo e($selectedProject->build_status); ?></div>
                            <div class="text-sm text-gray-600">Build Status</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl mb-2">🛡️</div>
                            <div class="font-semibold"><?php echo e($selectedProject->critical_bugs); ?> Critical</div>
                            <div class="text-sm text-gray-600"><?php echo e($selectedProject->minor_bugs); ?> Minor Bugs</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl mb-2">⚡</div>
                            <div class="font-semibold"><?php echo e($selectedProject->performance_score); ?>/100</div>
                            <div class="text-sm text-gray-600">Performance Score</div>
                        </div>
                    </div>
                </div>

                <!-- Case Study -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProject->challenge || $selectedProject->solution || $selectedProject->results): ?>
                    <div class="space-y-4 mb-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProject->challenge): ?>
                            <div>
                                <h4 class="font-bold mb-2">The Challenge</h4>
                                <p class="text-gray-700"><?php echo e($selectedProject->challenge); ?></p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProject->solution): ?>
                            <div>
                                <h4 class="font-bold mb-2">The Solution</h4>
                                <p class="text-gray-700"><?php echo e($selectedProject->solution); ?></p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProject->results): ?>
                            <div>
                                <h4 class="font-bold mb-2">The Results</h4>
                                <p class="text-gray-700"><?php echo e($selectedProject->results); ?></p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- Technologies -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProject->technologies): ?>
                    <div class="mb-6">
                        <h4 class="font-bold mb-3">Tech Stack</h4>
                        <div class="flex flex-wrap gap-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $selectedProject->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="bg-gray-100 text-gray-800 px-4 py-2 rounded-lg font-medium">
                                    <?php echo e($tech); ?>

                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- Links -->
                <div class="flex gap-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProject->url): ?>
                        <a href="<?php echo e($selectedProject->url); ?>" 
                           target="_blank"
                           class="inline-flex items-center px-6 py-3 bg-client-500 text-white rounded-lg hover:bg-client-600 transition">
                            View Live
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedProject->github_url): ?>
                        <a href="<?php echo e($selectedProject->github_url); ?>" 
                           target="_blank"
                           class="inline-flex items-center px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                            View Code
                            <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\My-Profile\resources\views/livewire/portfolio-grid.blade.php ENDPATH**/ ?>
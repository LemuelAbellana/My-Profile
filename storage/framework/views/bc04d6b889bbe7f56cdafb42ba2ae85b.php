<div class="api-panel rounded-lg overflow-hidden">
    <!-- API Header -->
    <div class="bg-slate-deep-900 text-white p-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <span class="api-method api-method-post">POST</span>
            <span class="font-mono text-sm">/api/v1/contact-me</span>
        </div>
        <div class="flex items-center space-x-2 text-xs">
            <span class="text-gray-400">Status:</span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($statusCode): ?>
                <span class="px-2 py-1 rounded <?php echo e($statusCode == 200 ? 'bg-emerald text-white' : 'bg-safety-orange text-white'); ?>">
                    <?php echo e($statusCode); ?>

                </span>
            <?php else: ?>
                <span class="text-gray-400">Ready</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid lg:grid-cols-2 gap-0">
        <!-- Left: Request Body -->
        <div class="bg-white p-6 border-r-2 border-slate-deep-800">
            <h3 class="font-heading font-bold text-sm text-slate-deep-900 mb-4">REQUEST BODY</h3>
            
            <!-- JSON-style Form -->
            <div class="font-mono text-sm space-y-4">
                <div class="text-slate-deep-600">{</div>
                
                <!-- Name Field -->
                <div class="ml-4">
                    <label class="text-blueprint">"sender":</label>
                    <input 
                        type="text" 
                        wire:model.live="name"
                        class="ml-2 flex-1 border-0 border-b-2 border-blueprint-200 focus:border-blueprint focus:ring-0 text-slate-deep-900 bg-transparent font-mono text-sm"
                        placeholder="John Doe"
                    />
                </div>
                
                <!-- Email Field -->
                <div class="ml-4">
                    <label class="text-blueprint">"email":</label>
                    <input 
                        type="email" 
                        wire:model.live="email"
                        class="ml-2 flex-1 border-0 border-b-2 border-blueprint-200 focus:border-blueprint focus:ring-0 text-slate-deep-900 bg-transparent font-mono text-sm"
                        placeholder="john@example.com"
                    />
                </div>
                
                <!-- Priority Field -->
                <div class="ml-4">
                    <label class="text-blueprint">"priority":</label>
                    <select 
                        wire:model="priority"
                        class="ml-2 border-0 border-b-2 border-blueprint-200 focus:border-blueprint focus:ring-0 text-slate-deep-900 bg-transparent font-mono text-sm"
                    >
                        <option value="low">low</option>
                        <option value="medium" selected>medium</option>
                        <option value="high">high</option>
                    </select>
                </div>
                
                <!-- Message Field -->
                <div class="ml-4">
                    <label class="text-blueprint">"payload":</label>
                    <textarea 
                        wire:model.live="message"
                        rows="4"
                        class="mt-2 w-full border-2 border-blueprint-200 focus:border-blueprint focus:ring-0 rounded text-slate-deep-900 bg-porcelain font-mono text-sm p-3"
                        placeholder="Your message here..."
                    ></textarea>
                </div>
                
                <div class="text-slate-deep-600">}</div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button 
                    wire:click="submit"
                    class="w-full bg-blueprint hover:bg-blueprint-600 text-white font-bold py-3 px-6 rounded font-mono transition"
                >
                    ► SEND REQUEST
                </button>
            </div>
        </div>

        <!-- Right: Test Cases & Response -->
        <div class="bg-porcelain p-6">
            <!-- Test Cases Panel -->
            <div class="mb-6">
                <h3 class="font-heading font-bold text-sm text-slate-deep-900 mb-4">VALIDATION TESTS</h3>
                <div class="space-y-2">
                    <!-- Email Format Test -->
                    <div class="flex items-center justify-between p-3 bg-white rounded border border-blueprint-200">
                        <span class="font-mono text-xs text-slate-deep-700">Assert::email()->isValid()</span>
                        <span class="font-mono text-xs <?php echo e($tests['email_format'] == 'pass' ? 'test-pass' : ($tests['email_format'] == 'fail' ? 'test-fail' : 'test-pending')); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tests['email_format'] == 'pass'): ?>
                                ✓ PASS
                            <?php elseif($tests['email_format'] == 'fail'): ?>
                                ✗ FAIL
                            <?php else: ?>
                                ⧗ PENDING
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>

                    <!-- DNS Check Test -->
                    <div class="flex items-center justify-between p-3 bg-white rounded border border-blueprint-200">
                        <span class="font-mono text-xs text-slate-deep-700">Assert::email()->hasMX()</span>
                        <span class="font-mono text-xs <?php echo e($tests['email_dns'] == 'pass' ? 'test-pass' : ($tests['email_dns'] == 'fail' ? 'test-fail' : 'test-pending')); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tests['email_dns'] == 'pass'): ?>
                                ✓ PASS
                            <?php elseif($tests['email_dns'] == 'fail'): ?>
                                ✗ FAIL
                            <?php else: ?>
                                ⧗ PENDING
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>

                    <!-- Name Length Test -->
                    <div class="flex items-center justify-between p-3 bg-white rounded border border-blueprint-200">
                        <span class="font-mono text-xs text-slate-deep-700">Assert::name()->length(2-100)</span>
                        <span class="font-mono text-xs <?php echo e($tests['name_length'] == 'pass' ? 'test-pass' : ($tests['name_length'] == 'fail' ? 'test-fail' : 'test-pending')); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tests['name_length'] == 'pass'): ?>
                                ✓ PASS
                            <?php elseif($tests['name_length'] == 'fail'): ?>
                                ✗ FAIL
                            <?php else: ?>
                                ⧗ PENDING
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>

                    <!-- Message Length Test -->
                    <div class="flex items-center justify-between p-3 bg-white rounded border border-blueprint-200">
                        <span class="font-mono text-xs text-slate-deep-700">Assert::message()->length(10-5000)</span>
                        <span class="font-mono text-xs <?php echo e($tests['message_length'] == 'pass' ? 'test-pass' : ($tests['message_length'] == 'fail' ? 'test-fail' : 'test-pending')); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tests['message_length'] == 'pass'): ?>
                                ✓ PASS
                            <?php elseif($tests['message_length'] == 'fail'): ?>
                                ✗ FAIL
                            <?php else: ?>
                                ⧗ PENDING
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Response Panel -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($response): ?>
                <div class="mt-6">
                    <h3 class="font-heading font-bold text-sm text-slate-deep-900 mb-4">RESPONSE</h3>
                    <div class="bg-slate-deep-900 rounded p-4 text-sm font-mono overflow-x-auto">
                        <pre class="text-emerald"><?php echo e(json_encode($response, JSON_PRETTY_PRINT)); ?></pre>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    <!-- Request Info Footer -->
    <div class="bg-slate-deep-800 text-white p-3 text-xs font-mono flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <span class="text-gray-400">Content-Type:</span>
            <span>application/json</span>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-gray-400">Accept:</span>
            <span>application/json</span>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-gray-400">X-Powered-By:</span>
            <span>Laravel <?php echo e(app()->version()); ?></span>
        </div>
    </div>
</div>

    <?php
        $__scriptKey = '4227350589-0';
        ob_start();
    ?>
<script>
    $wire.on('reset-form-delay', () => {
        setTimeout(() => {
            $wire.resetForm();
        }, 3000);
    });
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH D:\My-Profile\resources\views/livewire/api-contact.blade.php ENDPATH**/ ?>
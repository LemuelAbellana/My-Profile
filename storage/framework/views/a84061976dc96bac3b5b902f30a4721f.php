<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($submitted): ?>
        <!-- Success Message -->
        <div class="bg-green-50 border-2 border-green-500 rounded-lg p-8 text-center">
            <div class="text-6xl mb-4">✅</div>
            <h3 class="text-2xl font-bold mb-2">
                <span class="client-only">Message Sent Successfully!</span>
                <span class="dev-only hidden">// Ticket Deployed</span>
            </h3>
            <p class="text-gray-600 mb-4">
                <span class="client-only">Thank you for reaching out! I'll get back to you soon.</span>
                <span class="dev-only hidden">echo "Response ETA: &lt; 24 hours";</span>
            </p>
            <div class="bg-white rounded-lg p-4 inline-block">
                <p class="text-sm text-gray-600">Your ticket number:</p>
                <p class="text-2xl font-mono font-bold text-green-600"><?php echo e($ticketNumber); ?></p>
            </div>
        </div>
    <?php else: ?>
        <!-- Contact Form -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <form wire:submit.prevent="submitTicket">
                <!-- Honeypot Fields (Hidden) -->
                <div style="position: absolute; left: -9999px;">
                    <input type="text" wire:model="website" tabindex="-1" autocomplete="off">
                    <input type="hidden" wire:model="timestamp">
                </div>

                <!-- Name Field -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2">
                        <span class="client-only">Your Name *</span>
                        <span class="dev-only hidden">$requester_name *</span>
                    </label>
                    <input 
                        type="text" 
                        wire:model="requester_name"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-client-500 focus:border-client-500"
                        placeholder="John Doe">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['requester_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Email Field -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2">
                        <span class="client-only">Email Address *</span>
                        <span class="dev-only hidden">$requester_email *</span>
                    </label>
                    <input 
                        type="email" 
                        wire:model="requester_email"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-client-500 focus:border-client-500"
                        placeholder="john@example.com">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['requester_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Severity Field -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2">
                        <span class="client-only">Priority Level *</span>
                        <span class="dev-only hidden">$severity *</span>
                    </label>
                    <select 
                        wire:model="severity"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-client-500 focus:border-client-500">
                        <option value="low">💬 Low - Just saying hi</option>
                        <option value="medium">📋 Medium - General inquiry</option>
                        <option value="high">⚠️ High - Project collaboration</option>
                        <option value="critical">🚨 Critical - I want to hire you!</option>
                    </select>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['severity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Environment Field -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2">
                        <span class="client-only">Organization Type (Optional)</span>
                        <span class="dev-only hidden">$environment</span>
                    </label>
                    <div class="flex gap-4">
                        <label class="flex items-center">
                            <input type="radio" wire:model="environment" value="startup" class="mr-2">
                            <span>Startup</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" wire:model="environment" value="agency" class="mr-2">
                            <span>Agency</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" wire:model="environment" value="enterprise" class="mr-2">
                            <span>Enterprise</span>
                        </label>
                    </div>
                </div>

                <!-- Description Field -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2">
                        <span class="client-only">Message *</span>
                        <span class="dev-only hidden">$description *</span>
                    </label>
                    <textarea 
                        wire:model="description"
                        rows="5"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-client-500 focus:border-client-500"
                        placeholder="Tell me about your project or inquiry..."></textarea>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Error Messages -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['general'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- Submit Button -->
                <div class="flex gap-4">
                    <button 
                        type="button"
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        <span class="client-only">🧪 Run Tests</span>
                        <span class="dev-only hidden">validate()</span>
                    </button>
                    
                    <button 
                        type="submit"
                        class="flex-1 px-8 py-3 font-semibold rounded-lg transition <?php echo e($severity === 'critical' ? 'bg-red-500 hover:bg-red-600 text-white animate-pulse' : 'bg-client-500 hover:bg-client-600 text-white'); ?>">
                        <span class="client-only">
                            <?php echo e($severity === 'critical' ? '🚀 Deploy to Inbox (URGENT!)' : 'Send Message'); ?>

                        </span>
                        <span class="dev-only hidden">
                            <?php echo e($severity === 'critical' ? 'deploy("CRITICAL")' : 'submit()'); ?>

                        </span>
                    </button>
                </div>

                <!-- Loading State -->
                <div wire:loading class="mt-4 text-center text-gray-600">
                    <span class="client-only">Sending...</span>
                    <span class="dev-only hidden">// Processing...</span>
                </div>
            </form>
        </div>

        <!-- Info Box -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4 text-sm text-blue-800">
            <p class="font-semibold mb-1">Response Time SLA:</p>
            <ul class="list-disc list-inside space-y-1">
                <li>🚨 Critical: Within 4 hours</li>
                <li>⚠️ High: Within 24 hours</li>
                <li>📋 Medium/Low: Within 48 hours</li>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\My-Profile\resources\views/livewire/support-ticket.blade.php ENDPATH**/ ?>
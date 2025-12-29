<div class="flex items-center gap-3">
    <!-- Mode Label -->
    <span class="text-sm font-medium">
        <span class="client-only">View:</span>
        <span class="dev-only hidden">$mode =</span>
    </span>
    
    <!-- Toggle Switch -->
    <button 
        wire:click="toggleMode"
        class="relative inline-flex h-8 w-16 items-center rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2"
        :class="{'bg-client-500': <?php echo \Illuminate\Support\Js::from($mode === 'client')->toHtml() ?>, 'bg-dev-500': <?php echo \Illuminate\Support\Js::from($mode === 'dev')->toHtml() ?>}"
        role="switch"
        aria-checked="<?php echo e($mode === 'dev' ? 'true' : 'false'); ?>">
        
        <span class="sr-only">Toggle perspective mode</span>
        
        <!-- Toggle Circle -->
        <span 
            class="inline-block h-6 w-6 transform rounded-full bg-white transition-transform"
            :class="{'translate-x-1': <?php echo \Illuminate\Support\Js::from($mode === 'client')->toHtml() ?>, 'translate-x-9': <?php echo \Illuminate\Support\Js::from($mode === 'dev')->toHtml() ?>}">
        </span>
    </button>
    
    <!-- Mode Labels -->
    <div class="flex gap-2 text-sm font-medium">
        <span class="client-only <?php echo e($mode === 'client' ? 'text-client-600' : 'text-gray-400'); ?>">
            Client
        </span>
        <span class="client-only text-gray-300">|</span>
        <span class="client-only <?php echo e($mode === 'dev' ? 'text-dev-600' : 'text-gray-400'); ?>">
            Dev
        </span>
        
        <span class="dev-only hidden <?php echo e($mode === 'client' ? 'text-terminal-text' : 'text-gray-600'); ?>">
            'client'
        </span>
        <span class="dev-only hidden text-gray-600">:</span>
        <span class="dev-only hidden <?php echo e($mode === 'dev' ? 'text-terminal-text' : 'text-gray-600'); ?>">
            'dev'
        </span>
    </div>
</div>
<?php /**PATH D:\My-Profile\resources\views/livewire/perspective-toggle.blade.php ENDPATH**/ ?>
<?php if (isset($component)) { $__componentOriginal4619374cef299e94fd7263111d0abc69 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4619374cef299e94fd7263111d0abc69 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Hero Section -->
    <section class="py-20" data-component="HeroSection">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <!-- Client Mode Content -->
                    <div class="client-only">
                        <h1 class="text-5xl font-bold mb-4 text-gray-900">
                            Building Reliable Digital Products
                        </h1>
                        <p class="text-xl text-gray-600 mb-8">
                            I bridge the gap between business goals and technical execution.
                        </p>
                        <a href="#portfolio" 
                           class="inline-block px-8 py-3 bg-client-500 text-white rounded-lg font-semibold hover:bg-client-600 transition">
                            View Portfolio
                        </a>
                    </div>

                    <!-- Dev Mode Content -->
                    <div class="dev-only hidden">
                        <h1 class="text-4xl font-bold mb-4 text-terminal-text font-mono">
                            class Developer extends Human<br>
                            implements PM, QA {
                        </h1>
                        <p class="text-lg text-terminal-text mb-8 font-mono">
                            public $status = 'Ready to Deploy';<br>
                            // Test Coverage: 100%
                        </p>
                        <button 
                           onclick="window.location.href='#portfolio'"
                           class="inline-block px-8 py-3 bg-dev-500 text-terminal-bg rounded-lg font-semibold hover:bg-dev-600 transition font-mono">
                            echo "View Source";
                        </button>
                    </div>
                </div>

                <!-- Profile Image -->
                <div class="relative">
                    <div class="client-only">
                        <img src="/images/profile.jpg" 
                             alt="Professional Portrait" 
                             class="rounded-lg shadow-2xl w-full"
                             onerror="this.src='https://ui-avatars.com/api/?name=Your+Name&size=500&background=3b82f6&color=fff'">
                    </div>
                    <div class="dev-only hidden relative">
                        <img src="/images/profile.jpg" 
                             alt="Developer Portrait" 
                             class="rounded-lg shadow-2xl w-full opacity-80"
                             onerror="this.src='https://ui-avatars.com/api/?name=Your+Name&size=500&background=16a34a&color=0a0a0a'">
                        <div class="absolute inset-0 border-2 border-dev-500 rounded-lg" 
                             style="background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(22, 163, 74, 0.1) 2px, rgba(22, 163, 74, 0.1) 4px);"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kanban Career Section -->
    <section id="about" class="py-20 bg-gray-50" data-component="AboutSection">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold mb-12 text-center">
                <span class="client-only">My Journey</span>
                <span class="dev-only hidden">// Career Timeline</span>
            </h2>
            
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('kanban-career', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2241667544-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-20" data-component="PortfolioSection">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold mb-12 text-center">
                <span class="client-only">Featured Projects</span>
                <span class="dev-only hidden">// $projects->where('quality', 'verified')</span>
            </h2>
            
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('portfolio-grid', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2241667544-1', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50" data-component="ContactSection">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold mb-12 text-center">
                <span class="client-only">Get In Touch</span>
                <span class="dev-only hidden">// Submit Support Ticket</span>
            </h2>
            
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('support-ticket', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2241667544-2', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4619374cef299e94fd7263111d0abc69)): ?>
<?php $attributes = $__attributesOriginal4619374cef299e94fd7263111d0abc69; ?>
<?php unset($__attributesOriginal4619374cef299e94fd7263111d0abc69); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4619374cef299e94fd7263111d0abc69)): ?>
<?php $component = $__componentOriginal4619374cef299e94fd7263111d0abc69; ?>
<?php unset($__componentOriginal4619374cef299e94fd7263111d0abc69); ?>
<?php endif; ?>
<?php /**PATH D:\My-Profile\resources\views/welcome.blade.php ENDPATH**/ ?>
@props(['color' => 'emerald', 'size' => '600', 'position' => 'top-right'])

@php
$colors = [
    'emerald' => 'rgba(16, 185, 129, 0.15)',
    'violet' => 'rgba(139, 92, 246, 0.15)',
    'purple' => 'rgba(168, 85, 247, 0.15)',
    'amber' => 'rgba(245, 158, 11, 0.15)',
];

$positions = [
    'top-left' => 'top: -200px; left: -200px;',
    'top-right' => 'top: -200px; right: -200px;',
    'bottom-left' => 'bottom: -150px; left: -150px;',
    'bottom-right' => 'bottom: -150px; right: -150px;',
];

$bgColor = $colors[$color] ?? $colors['emerald'];
$positionStyle = $positions[$position] ?? $positions['top-right'];
@endphp

<div class="fixed pointer-events-none z-[-1] rounded-full opacity-30 animate-float"
     style="width: {{ $size }}px; height: {{ $size }}px; background: radial-gradient(circle, {{ $bgColor }} 0%, transparent 70%); filter: blur(120px); {{ $positionStyle }}">
</div>

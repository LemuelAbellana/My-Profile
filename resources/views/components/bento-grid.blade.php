@props(['cols' => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-4'])

<div {{ $attributes->merge(['class' => "grid {$cols} gap-4 auto-rows-auto"]) }}>
    {{ $slot }}
</div>

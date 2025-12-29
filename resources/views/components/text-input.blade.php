@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-client-500 focus:ring-client-500 rounded-md shadow-sm']) !!}>

{{-- resources/views/components/button.blade.php --}}
@props([
    'label',
    'type' => 'button',
    'color' => 'primary', // primary, secondary, danger, success
    'small' => false,
    'href' => null,
    'disabled' => false,
])

@php
    $colors = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white focus:ring-blue-500',
        'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-700 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white focus:ring-red-500',
        'success' => 'bg-green-600 hover:bg-green-700 text-white focus:ring-green-500',
    ];

    $size = $small ? 'px-3 py-1.5 text-sm' : 'px-4 py-2 text-sm';
    $colorClass = $colors[$color] ?? $colors['primary'];
@endphp

<button type="{{ $type }}"
    @if($href) onclick="document.location.href='{{ $href }}'" @endif
    @if($disabled) disabled @endif
    {{ $attributes->merge(['class' => "inline-flex items-center rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-offset-1 $colorClass $size"]) }}>
    {{ $label }}
</button>

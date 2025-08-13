{{-- resources/views/components/button.blade.php --}}
@props([
    'label' => null,
    'type' => 'button',
    'color' => 'primary', // primary, secondary, danger, success
    'small' => false,
    'href' => null,
    'disabled' => false,
    'icon' => null
])

@php
    $colors = [
        'primary' => 'bg-blue-400/80 hover:bg-blue-700 text-white focus:ring-blue-500',
        'secondary' => 'bg-gray-400/80 hover:bg-gray-300 text-gray-700 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500',
        'danger' => 'bg-red-400/80 hover:bg-red-700 text-white focus:ring-red-500',
        'success' => 'bg-green-400/80 hover:bg-green-700 text-white focus:ring-green-500',
    ];

    $size = $small ? 'px-1 py-1 text-sm' : 'px-4 py-2 text-sm';
    $colorClass = $colors[$color] ?? $colors['primary'];
@endphp

<button type="{{ $type }}"
    @if($href) onclick="document.location.href='{{ $href }}'" @endif
    @if($disabled) disabled @endif
    {{ $attributes->merge(['class' => "inline-flex items-center rounded-md font-small text-sm focus:outline-none focus:ring-2 focus:ring-offset-1 $colorClass $size"]) }}> <x-icon :name="$icon" width="1" height="1"  class="w-4 h-4" />
    {{ $label }}
</button>

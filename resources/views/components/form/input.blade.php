@props([
    'id' ,
    'label' => null,
    'type' => 'text',
    'name' => null,
    'value' => null,
    'hidden' => false,
    'readonly' => false,
    'required' => false,
    'helperText' => null,
])

<div class="mb-4" {{ $hidden ? 'hidden' : '' }}>
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $value }}"
        {{ $readonly ? 'readonly' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'block w-full rounded-md border-gray-300 shadow-sm
                        focus:border-blue-500 focus:ring focus:ring-blue-200
                        dark:bg-gray-800 dark:border-gray-600 dark:text-gray-100 sm:text-sm'
        ]) }}
    >

    @if ($helperText)
        <small class="text-gray-500 dark:text-gray-400">{{ $helperText }}</small>
    @endif
</div>

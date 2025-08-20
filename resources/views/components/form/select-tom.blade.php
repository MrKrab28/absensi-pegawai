@props([
    'id' => Str::uuid(), // default unik biar tidak bentrok
    'name',
    'label' => null,
    'placeholder' => 'Pilih...',
    'required' => false,
    'multiple' => false,
])

<div class="w-full">
    @if ($label)
        <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
            {{ $label }} @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <select id="{{ $id }}" name="{{ $name }}{{ $multiple ? '[]' : '' }}"
        placeholder="{{ $placeholder }}" @if ($required) required @endif
        @if ($multiple) multiple @endif data-tom="true" autocomplete="off" class="w-full mb-3  ">
        {{ $slot }}
    </select>
</div>

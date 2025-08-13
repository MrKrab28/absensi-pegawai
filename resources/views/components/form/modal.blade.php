@props([
    'id' => 'form-modal',
    'title' => 'Form Modal',
    'label' => 'Tambah Data',
    'size' => 'medium',
])

<!-- Trigger button -->
<div class="flex justify-end mb-2">
    <button data-modal-target="{{ $id }}" data-modal-toggle="{{ $id }}"
        class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300
               font-medium rounded-md text-sm px-3 py-2 text-center dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-900"
        type="button">
        {{ $label }}
    </button>
</div>

<!-- Include modal utama -->
<x-component.modal :id="$id" :title="$title" :size="$size">
    {{ $slot }}
    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-600">

        <button type="submit"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600">
            Submit
        </button>
    </div>

</x-component.modal>

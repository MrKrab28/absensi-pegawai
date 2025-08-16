@props([
    'id' => 'form-modal',
    'size' => 'medium',
    'title',
    'label',
    'action',
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
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        {{ $slot }}
        <div class="flex justify-end space-x-3  p-5 border-t border-gray-200 dark:border-gray-600">
            <button type="button" data-modal-hide="{{ $id }}"
                class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-md
                       hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-1
                       focus:ring-gray-400 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                Close
            </button>
            <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600">
                Submit
            </button>

        </div>
    </form>
</x-component.modal>

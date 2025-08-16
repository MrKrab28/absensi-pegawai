@props([
    'id' => 'default-modal',
    'title' => 'Modal Title',
    'size' => 'medium', // small, medium, large, large-2
])

@php
    $maxWidth = match ($size) {
        'small' => 'max-w-md',
        'medium' => 'max-w-lg',
        'large' => 'max-w-4xl',
        'large-2' => 'max-w-6xl',
        default => 'max-w-lg',
    };
@endphp

<!-- Modal -->

<div id="{{ $id }}" tabindex="-1" aria-hidden="true"
    class=" hidden fixed inset-0 z-50 flex items-start justify-center pt-20 ps-60
           bg-black/50 transition-opacity duration-700 p-10">

    <div class="relative p-4 w-full {{ $maxWidth }} max-h-full ">
        <!-- Modal content -->
        <div
            class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700
                    transform scale-95 opacity-0 transition-all duration-700">

            <!-- Header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-600 rounded-t">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
                <button type="button" data-modal-toggle="{{ $id }}"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Body -->
            <form class="p-4">
                {{ $slot }}
            </form>

            <!-- Footer opsional -->
            @isset($footer)
                <div class="flex justify-end pt-4 border-t border-gray-200 dark:border-gray-600">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtns = document.querySelectorAll('[data-modal-toggle]');

            toggleBtns.forEach(btn => {
                const modalId = btn.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);
                const modalContent = modal.querySelector('div.relative.bg-white');
                const overlay = modal;

                const duration = 700; // ms, sama dengan Tailwind

                // Buka modal
                btn.addEventListener('click', () => {
                    modal.classList.remove('hidden');

                    // Overlay dan content reset
                    overlay.classList.remove('opacity-0');
                    overlay.classList.add('opacity-100');

                    modalContent.classList.remove('scale-100', 'opacity-100');
                    modalContent.classList.add('scale-95', 'opacity-0');

                    setTimeout(() => {
                        modalContent.classList.remove('scale-95', 'opacity-0');
                        modalContent.classList.add('scale-100', 'opacity-100');
                    }, 10);
                });

                // Tutup modal
                const closeModal = () => {
                    modalContent.classList.remove('scale-100', 'opacity-100');
                    modalContent.classList.add('scale-95', 'opacity-0');

                    overlay.classList.remove('opacity-100');
                    overlay.classList.add('opacity-0');

                    setTimeout(() => modal.classList.add('hidden'), duration);
                };

                // Klik tombol close
                const closeBtn = modal.querySelector('[data-modal-toggle]');
                if (closeBtn) closeBtn.addEventListener('click', closeModal);

                // Klik overlay
                overlay.addEventListener('click', e => {
                    if (e.target === overlay) closeModal();
                });
            });
        });
    </script>
@endpush

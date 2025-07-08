@php
  $icon = $name ?? null;
  $style = $style ?? 'outline';
@endphp

@if($style === 'outline' && view()->exists("components.icon.{$icon}"))
  @include("components.icon.{$icon}")
@elseif($style === 'filled' && view()->exists("components.icon.filled.{$icon}"))
  @include("components.icon.filled.{$icon}")
@else
  {{-- Fallback jika ikon tidak ditemukan --}}
  <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
  </svg>
@endif

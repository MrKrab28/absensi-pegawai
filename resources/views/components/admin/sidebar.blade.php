@php
    $activeGuard = get_active_guard();
    $menus = config('menu')[$activeGuard] ?? [];
@endphp

<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed lg:top-[0px] top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400/20  bg-white left-sidebar   transition-all duration-300">
    <div class="pl-8 pr-8 pb-5 pt-8 px-0 ">
        <a href="{{ route('admin.dashboard') }}" class="text-nowrap">
            <img src="{{ asset('assets/images/logos/logo-text.png') }}" alt="Logo-Dark" />
        </a>
    </div>
  
    <div data-simplebar class="h-full overflow-auto simplebar-primary">
        <div class="px-6 mt-0">
            <nav class=" w-full flex flex-col sidebar-nav">
                <ul id="sidebarnav" class="text-dark text-lg">
                    @foreach ($menus as $menuGroup)
                        <li class="text-sm font-bold pb-2 px-0 mt-2 mb-0"
                            data-key="t-{{ Str::slug($menuGroup['title']) }}">
                            <span>{{ $menuGroup['title'] }}</span>
                        </li>

                        @foreach ($menuGroup['items'] as $item)
                            @if (isset($item['submenu']))
                                <li class="hs-accordion sidebar-item" id="ui-accordion">
                                    <a href="#" class="hs-accordion-toggle sidebar-link dropdown-menu-link">
                                        <x-icon name="{{ $item['icon'] }}" />
                                        <span class="hide-menu">{{ $item['label'] }}</span>
                                        <span class="hide-menu ms-auto">
                                            <x-icon name="chevron-down" class="text-lg ms-auto  hs-accordion-active:hidden" />
                                            <x-icon name="chevron-up" class="text-lg ms-auto  hs-accordion-active:block ml-auto hidden z-10 relative" />
                                        </span>
                                    </a>
                                    <div id="ui-accordion" class="hs-accordion-content ">
                                        <ul>
                                            @foreach ($item['submenu'] as $submenu)
                                                <li class="pl-4 pr-3">
                                                    <a class="dropdown-submenu-link flex items-center justify-between"
                                                       href="{{ isset($submenu['route-name']) ? route($submenu['route-name']) : '#' }}"
                                                       target="{{ $submenu['target'] ?? '_self' }}">
                                                        <span class="flex gap-2 items-center ">
                                                            <x-icon name="point" />
                                                            <span class="hide-menu">{{ $submenu['label'] }}</span>
                                                        </span>
                                                        @if (isset($submenu['badge']))
                                                            <span class="items-center gap-x-1.5 py-1 leading-3 px-2 rounded-md text-[10px] font-medium bg-secondary/30 text-secondary justify-end">
                                                                {{ $submenu['badge'] }}
                                                            </span>
                                                        @endif
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li class="sidebar-item">
                                    <a class="sidebar-link @if (request()->segment(2) == $item['route-active']) active @endif gap-3 py-3 px-3 rounded-md w-full flex items-center justify-between hover:text-primary hover:bg-primary/15"
                                       href="{{ isset($item['route-name']) ? route($item['route-name']) : '#' }}">
                                        <span class="flex gap-3 items-center">
                                            <x-icon name="{{ $item['icon'] }}" />
                                            <span>{{ $item['label'] }}</span>
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</aside>

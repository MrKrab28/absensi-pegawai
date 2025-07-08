<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed lg:top-[0px] top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400/20  bg-white left-sidebar   transition-all duration-300">
    <div class="p-5">
        <a href="../" class="text-nowrap">
            <img src="./assets/images/logos/dark-logo.svg" alt="Logo-Dark" />
        </a>
    </div>
    <div data-simplebar class="h-full overflow-auto simplebar-primary">
        <div class="px-6 mt-8">
            <nav class=" w-full flex flex-col sidebar-nav">
                <ul id="sidebarnav" class="text-dark text-lg">
                    @foreach (config('menu') as $menuKey => $menuGroup)
                        <li class="text-xs font-bold pb-4 mt-8 mb-0" data-key="t-{{ Str::slug($menuGroup['title']) }}">
                            <span>{{ $menuGroup['title'] }}</span>
                        </li>
                        @foreach ($menuGroup['items'] as $item)
                            @if (isset($item['submenu']))
                                <li class="hs-accordion sidebar-item" id="ui-accordion">
                                    <a href="#cards" class="hs-accordion-toggle sidebar-link dropdown-menu-link">
                                        <x-icon name="{{ $item['icon'] }}" />
                                        <span class="hide-menu">{{ $item['label'] }}</span>
                                        <span class="hide-menu ms-auto">
                                            <x-icon name="chevron-down"
                                                class="text-lg ms-auto  hs-accordion-active:hidden" />
                                            <x-icon name="chevron-up"
                                                class="text-lg ms-auto  hs-accordion-active:block ml-auto hidden z-10 relative" />
                                        </span>
                                    </a>
                                    <div id="ui-accordion" class="hs-accordion-content ">
                                        <ul class>
                                            @foreach ($item['submenu'] as $submenu)
                                                <li class="pl-4 pr-3">
                                                    <a class="dropdown-submenu-link flex items-center justify-between"
                                                        target="_blank"
                                                        href="https://bootstrapdemos.adminmart.com/modernize-tailwind-pro/dist/main/ui-cards.html">
                                                        <span class="flex gap-2 items-center ">
                                                            <x-icon name="point" />
                                                            <span class="hide-menu">{{ $submenu['label'] }}</span>

                                                        </span>
                                                        <span
                                                            class="items-center gap-x-1.5 py-1 leading-3 px-2 rounded-md text-[10px] font-medium bg-secondary/30 text-secondary justify-end">Pro</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-3 px-3 rounded-md w-full flex items-center justify-between hover:text-primary hover:bg-primary/15"
                                        target="_blank"
                                        href="https://bootstrapdemos.adminmart.com/modernize-tailwind-pro/dist/main/index5.html">
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

        <!-- </aside> -->
    </div>


</aside>

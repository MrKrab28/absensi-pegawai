<x-admin.layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
        <div class="col-span-2">
            <div class="card">
                <div class="card-body">
                    <div class="sm:flex block justify-between mb-5">
                        <h4 class="text-dark text-lg font-semibold sm:mb-0 mb-2">Sales
                            Overview</h4>
                        <select name="cars" id="cars"
                            class=" border-gray-400/20 text-gray-500 rounded-md text-sm border-[1px] focus:ring-0 sm:w-auto w-full">
                            <option value="volvo">March 2025</option>
                            <option value="saab">April 2025</option>
                            <option value="mercedes">May 2025</option>
                            <option value="audi">June 2025</option>
                        </select>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-dark text-lg font-semibold mb-5">Yearly Breakup</h4>
                    <div class="flex gap-6 items-center justify-between">
                        <div class="flex flex-col gap-4">
                            <h3 class="text-[21px] font-semibold text-dark">$36,358</h3>
                            <div class="flex items-center gap-1">
                                <span class="flex items-center justify-center w-5 h-5 rounded-full bg-success/20">
                                    <i class="ti ti-arrow-up-left text-success"></i>
                                </span>
                                <p class="text-dark text-sm font-normal ">+9%</p>
                                <p class="text-gray-500 text-sm font-normal text-nowrap">last
                                    year</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="flex gap-2 items-center">
                                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                                    <p class="text-gray-500 font-normal text-xs">2024</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <span class="w-2 h-2 rounded-full bg-gray-500/20"></span>
                                    <p class="text-gray-500 font-normal text-xs">2025</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex  items-center">
                            <div id="breakup"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="flex gap-6 items-center justify-between">
                        <div class="flex flex-col gap-5">
                            <h4 class="text-dark text-lg font-semibold">Monthly Earnings</h4>
                            <div class="flex flex-col gap-[18px]">
                                <h3 class="text-[21px] font-semibold text-dark">$6,820</h3>
                                <div class="flex items-center gap-1">
                                    <span class="flex items-center justify-center w-5 h-5 rounded-full bg-error/20">
                                        <i class="ti ti-arrow-down-right text-error"></i>
                                    </span>
                                    <p class="text-dark text-sm font-normal ">+9%</p>
                                    <p class="text-gray-500 text-sm font-normal">last year</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="w-11 h-11 flex justify-center items-center rounded-full bg-info text-white self-start">
                            <i class="ti ti-currency-dollar text-xl"></i>
                        </div>

                    </div>
                </div>
                <div id="earning"></div>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
        <div class="card">
            <div class="card-body">
                <h4 class="text-dark text-lg font-semibold mb-6">Recent
                    Transactions</h4>
                <ul class="timeline-widget relative">
                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-dark text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-primary my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-dark text-sm font-normal">Payment received from John
                                Doe of $385.90</p>
                        </div>
                    </li>
                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-dark min-w-[90px] py-[6px] text-sm pr-4 text-end">
                            10:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-secondary my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4 text-sm">
                            <p class="text-dark  font-semibold">New sale recorded</p>
                            <a href="javascript:void('')" class="text-primary">#ML-3467</a>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-dark min-w-[90px] text-sm py-[6px] pr-4 text-end">
                            12:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-success my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-dark text-sm font-normal">Payment was made of $64.95
                                to Michael</p>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-dark min-w-[90px] text-sm py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-warning my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4 text-sm">
                            <p class="text-dark font-semibold">New sale recorded</p>
                            <a href="javascript:void('')" class="text-primary">#ML-3467</a>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-dark text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-error my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-dark text-sm font-semibold">New arrival recorded</p>
                        </div>
                    </li>
                    <li class="timeline-item flex relative overflow-hidden">
                        <div class="timeline-time text-dark text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            12:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center ">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-success my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100">
                            </div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-dark text-sm font-normal">Payment Done</p>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="col-span-2">
            <div class="card ">
                <div class="card-body">

                    <div class="sm:flex block justify-between mb-5">
                        <div>
                            <h4 class="text-dark text-lg font-semibold sm:mb-0 mb-2">Top
                                Performers
                            </h4>
                            <p class="text-gray-500 text-sm">Best Employees</p>
                        </div>
                        <div>
                            <select name="cars" id="cars"
                                class=" border-gray-400/20 text-gray-500 rounded-md text-sm border-[1px] focus:ring-0 sm:w-auto w-full">
                                <option value="volvo">March 2025</option>
                                <option value="saab">April 2025</option>
                                <option value="mercedes">May 2025</option>
                                <option value="audi">June 2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <!-- table -->
                        <table class="text-left w-full whitespace-nowrap text-sm my-2.5">
                            <thead class="text-gray-700">
                                <tr class="font-semibold text-dark">

                                    <th scope="col" class="p-4">Assigned</th>
                                    <th scope="col" class="p-4">Project</th>
                                    <th scope="col" class="p-4">Priority</th>
                                    <th scope="col" class="p-4">Budget</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-400/10">

                                    <td class="p-4">
                                        <div class="flex gap-3 items-center">
                                            <img class="object-cover w-9 h-9 rounded-full "
                                                src="./assets/images/profile/user-2.jpg" alt aria-hidden="true">
                                            <div>
                                                <h3 class=" font-semibold text-dark">Sunil Joshi
                                                </h3>
                                                <span class="font-normal text-gray-500 text-xs">Web
                                                    Designer</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-normal  text-gray-500">Elite
                                            Admin</span>
                                    </td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center py-[3px] px-[10px] rounded-md font-medium bg-primary text-white">Low</span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-semibold text-base text-dark">$3.9</span>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-400/10">

                                    <td class="p-4">
                                        <div class="flex gap-3 items-center">
                                            <img class="object-cover w-9 h-9 rounded-full "
                                                src="./assets/images/profile/user-3.jpg" alt aria-hidden="true">
                                            <div>
                                                <h3 class="font-semibold text-dark">Andrew
                                                    McDownland</h3>
                                                <span class="font-normal text-gray-500 text-xs">Project
                                                    Manager</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-normal text-gray-500">Real Homes WP
                                            Theme</span>
                                    </td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center py-[3px] px-[10px] rounded-md font-medium text-white bg-info">Medium</span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-semibold text-base text-dark">$24.5k</span>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-400/10">

                                    <td class="p-4">
                                        <div class="flex gap-3 items-center">
                                            <img class="object-cover w-9 h-9 rounded-full "
                                                src="./assets/images/profile/user-4.jpg" alt aria-hidden="true">
                                            <div>
                                                <h3 class="font-semibold text-dark">Christopher
                                                    Jamil</h3>
                                                <span class="font-normal text-xs text-gray-500">Project
                                                    Manager</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-normal text-gray-500">MedicalPro WP
                                            Theme</span>
                                    </td>
                                    <td class="p-4 ">
                                        <span
                                            class="inline-flex items-center py-[3px] px-[10px] rounded-md font-medium text-white bg-error">High</span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-semibold text-base text-dark">$12.8k</span>
                                    </td>
                                </tr>
                                <tr>

                                    <td class="p-4">
                                        <div class="flex gap-3 items-center">
                                            <img class="object-cover w-9 h-9 rounded-full "
                                                src="./assets/images/profile/user-5.jpg" alt aria-hidden="true">
                                            <div>
                                                <h3 class="font-semibold text-dark">Nirav Joshi
                                                </h3>
                                                <span class="font-normal text-xs text-gray-500">Frontend
                                                    Engineer</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-normal text-sm text-gray-500">Hosting
                                            Press
                                            HTML</span>
                                    </td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center py-[3px] px-[10px] rounded-md font-medium text-white bg-success">Critical</span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-semibold text-base text-dark">$2.4k</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-2 gap-6">
        <div class="card overflow-hidden">
            <div class="relative">
                <a href="javascript:void(0)">
                    <img src="./assets/images/products/product-1.jpg" alt="product_img" class="w-full">
                </a>
                <a href="javascript:void(0)"
                    class="bg-primary w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3">
                    <i class="ti ti-basket text-base"></i>
                </a>
            </div>
            <div class="card-body">
                <h6 class="text-base font-semibold text-dark mb-1">Boat Headphone</h6>
                <div class="flex justify-between">
                    <div class="flex gap-2 items-center">
                        <h6 class="text-base text-dark font-semibold">$50</h6>
                        <span class="text-gray-500 text-sm">
                            <del>$65</del>
                        </span>
                    </div>
                    <ul class="list-none flex gap-1">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card overflow-hidden">
            <div class="relative">
                <a href="javascript:void(0)">
                    <img src="./assets/images/products/product-2.jpg" alt="product_img" class="w-full">
                </a>
                <a href="javascript:void(0)"
                    class="bg-primary w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3">
                    <i class="ti ti-basket text-base"></i>
                </a>
            </div>
            <div class="card-body">
                <h6 class="text-base font-semibold text-dark mb-1">MacBook Air
                    Pro</h6>
                <div class="flex justify-between">
                    <div class="flex gap-2 items-center">
                        <h6 class="text-base text-dark font-semibold">$650</h6>
                        <span class="text-gray-500 text-sm">
                            <del>$900</del>
                        </span>
                    </div>
                    <ul class="list-none flex gap-1">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card overflow-hidden">
            <div class="relative">
                <a href="javascript:void(0)">
                    <img src="./assets/images/products/product-3.jpg" alt="product_img" class="w-full">
                </a>
                <a href="javascript:void(0)"
                    class="bg-primary w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3">
                    <i class="ti ti-basket text-base"></i>
                </a>
            </div>
            <div class="card-body">
                <h6 class="text-base font-semibold text-dark mb-1">Red Valvet
                    Dress</h6>
                <div class="flex justify-between">
                    <div class="flex gap-2 items-center">
                        <h6 class="text-base text-dark font-semibold">$150</h6>
                        <span class="text-gray-500 text-sm">
                            <del>$200</del>
                        </span>
                    </div>
                    <ul class="list-none flex gap-1">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card overflow-hidden">
            <div class="relative">
                <a href="javascript:void(0)">
                    <img src="./assets/images/products/product-4.jpg" alt="product_img" class="w-full">
                </a>
                <a href="javascript:void(0)"
                    class="bg-primary w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3">
                    <i class="ti ti-basket text-base"></i>
                </a>
            </div>
            <div class="card-body">
                <h6 class="text-base font-semibold text-dark mb-1">Cute Soft
                    Teddybear</h6>
                <div class="flex justify-between">
                    <div class="flex gap-2 items-center">
                        <h6 class="text-base text-dark font-semibold">$285</h6>
                        <span class="text-gray-500 text-sm">
                            <del>$345</del>
                        </span>
                    </div>
                    <ul class="list-none flex gap-1">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="ti ti-star text-yellow-500 text-sm"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>

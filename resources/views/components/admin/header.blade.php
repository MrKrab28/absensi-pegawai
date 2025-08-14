 <header class="full-container w-full text-sm py-3 px-5 bg-white lg:sticky z-30">
     <nav class=" w-full  flex items-center justify-between " aria-label="Global">
         <ul class="icon-nav flex items-center gap-4">
             <li class="relative xl:hidden">
                 <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                     data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand"
                     aria-label="Toggle navigation" href="javascript:void(0)">
                     <x-icon name="menu-2" />
                 </a>
             </li>

             <li class="relative">



             </li>
         </ul>
         <div class="flex items-center gap-4">
            <p class="text-dark text-sm font-semibold" >{{ auth()->user()->nama }}</p>


             <div class="m-1 hs-dropdown [--trigger:hover] relative inline-flex">

                 <img class="object-cover w-9 h-9 rounded-full " src="{{ asset('assets/images/profile/avatar.png') }}"
                     alt aria-hidden="true">

                 <div class="hs-dropdown-menu py-3 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden  bg-white shadow-md rounded-lg mt-2  after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-20 w-[200px]"
                     role="menu">
                     <div class="space-y-1">
                         <a href="javscript:void(0)" class="flex gap-2 items-center px-4 py-2.5 hover:bg-primary/10">
                             <i class="ti ti-user text-gray-500 text-xl "></i>
                             <p class="text-sm text-dark">My Profile</p>
                         </a>
                         <a href="javscript:void(0)" class="flex gap-2 items-center px-4 py-2.5 hover:bg-primary/10">
                             <i class="ti ti-mail text-gray-500 text-xl"></i>
                             <p class="text-sm text-dark">My Account</p>
                         </a>
                         <a href="javscript:void(0)" class="flex gap-2 items-center px-4 py-2.5 hover:bg-primary/10">
                             <i class="ti ti-list-check text-gray-500 text-xl "></i>
                             <p class="text-sm text-dark">My Task</p>
                         </a>
                         <div class="px-4 mt-[7px] grid">
                             <form action="{{ route('logout') }}" method="POST }}">
                                 @csrf

                                 <button class="btn-outline-primary w-full hover:bg-blue-700/80 hover:text-white"
                                     type="submit">Logout</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </nav>
 </header>

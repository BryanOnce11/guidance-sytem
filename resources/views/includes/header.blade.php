        <!-- BEGIN: Top Bar -->
        <div
            class="h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-5 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700 before:content-[''] before:absolute before:h-[65px] before:inset-0 before:top-0 before:mx-7 before:bg-primary/30 before:mt-3 before:rounded-xl before:hidden before:md:block before:dark:bg-darkmode-600/30 after:content-[''] after:absolute after:inset-0 after:h-[65px] after:mx-3 after:bg-primary after:mt-5 after:rounded-xl after:shadow-md after:hidden after:md:block after:dark:bg-darkmode-600">
            <div class="flex items-center h-full">
                <!-- BEGIN: Logo -->
                <a href="" class="-intro-x hidden md:flex xl:w-[180px]">
                    <img class="w-6" src="{{ asset('dist/images/logo.svg') }}"
                        alt="Enigma Tailwind HTML Admin Template">
                    <span class="hidden ml-3 text-lg text-white xl:block">
                        PSU-Guidance
                    </span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb"
                    class="flex h-[45px] md:ml-10 md:border-l border-white/[0.08] dark:border-white/[0.08] mr-auto -intro-x md:pl-6">
                    <ol class="flex items-center text-theme-1 dark:text-slate-300 text-white/90">
                        <li class="">
                            <a href="">Application</a>
                        </li>
                        <li
                            class="relative ml-5 pl-0.5 before:content-[''] before:w-[14px] before:h-[14px] before:bg-chevron-white before:transform before:rotate-[-90deg] before:bg-[length:100%] before:-ml-[1.125rem] before:absolute before:my-auto before:inset-y-0 dark:before:bg-chevron-white text-white/70">
                            <a href="">Dashboard</a>
                        </li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                {{-- <div class="relative mr-3 intro-x sm:mr-6">
                    <div class="relative hidden search sm:block">
                        <input data-tw-merge="" type="text" placeholder="Search..."
                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent ease-in-out text-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-opacity-40 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 w-56 rounded-full border-transparent bg-slate-200 pr-8 shadow-none transition-[width] duration-300 focus:w-72 focus:border-transparent dark:bg-darkmode-400">
                        <i data-tw-merge="" data-lucide="search"
                            class="stroke-1.5 w-5 h-5 absolute inset-y-0 right-0 my-auto mr-3 text-slate-600 dark:text-slate-500"></i>
                    </div>
                    <a class="relative text-white/70 sm:hidden" href="">
                        <i data-tw-merge="" data-lucide="search" class="stroke-1.5 w-5 h-5 dark:text-slate-500"></i>
                    </a>
                    <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150"
                        data-enter-from="mt-5 invisible opacity-0 translate-y-1"
                        data-enter-to="mt-[3px] visible opacity-100 translate-y-0"
                        data-leave="transition-all ease-linear duration-150"
                        data-leave-from="mt-[3px] visible opacity-100 translate-y-0"
                        data-leave-to="mt-5 invisible opacity-0 translate-y-1"
                        class="search-result absolute right-0 z-10 mt-[3px] hidden">
                        <div class="box w-[450px] p-5">
                            <div class="mb-2 font-medium">Pages</div>
                            <div class="mb-5">
                                <a class="flex items-center" href="">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 rounded-full bg-success/20 text-success dark:bg-success/10">
                                        <i data-tw-merge="" data-lucide="inbox" class="stroke-1.5 h-4 w-4"></i>
                                    </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a class="flex items-center mt-2" href="">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 rounded-full bg-pending/10 text-pending">
                                        <i data-tw-merge="" data-lucide="users" class="stroke-1.5 h-4 w-4"></i>
                                    </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a class="flex items-center mt-2" href="">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/10 text-primary/80 dark:bg-primary/20">
                                        <i data-tw-merge="" data-lucide="credit-card" class="stroke-1.5 h-4 w-4"></i>
                                    </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="mb-2 font-medium">Users</div>
                            <div class="mb-5">
                                <a class="flex items-center mt-2" href="">
                                    <div class="w-8 h-8 image-fit">
                                        <img class="rounded-full" src="dist/images/fakers/profile-13.jpg"
                                            alt="Midone Tailwind HTML Admin Template">
                                    </div>
                                    <div class="ml-3">Christian Bale</div>
                                    <div class="w-48 ml-auto text-xs text-right truncate text-slate-500">
                                        christianbale@left4code.com
                                    </div>
                                </a>
                                <a class="flex items-center mt-2" href="">
                                    <div class="w-8 h-8 image-fit">
                                        <img class="rounded-full" src="dist/images/fakers/profile-9.jpg"
                                            alt="Midone Tailwind HTML Admin Template">
                                    </div>
                                    <div class="ml-3">Kevin Spacey</div>
                                    <div class="w-48 ml-auto text-xs text-right truncate text-slate-500">
                                        kevinspacey@left4code.com
                                    </div>
                                </a>
                                <a class="flex items-center mt-2" href="">
                                    <div class="w-8 h-8 image-fit">
                                        <img class="rounded-full" src="dist/images/fakers/profile-15.jpg"
                                            alt="Midone Tailwind HTML Admin Template">
                                    </div>
                                    <div class="ml-3">Tom Cruise</div>
                                    <div class="w-48 ml-auto text-xs text-right truncate text-slate-500">
                                        tomcruise@left4code.com
                                    </div>
                                </a>
                                <a class="flex items-center mt-2" href="">
                                    <div class="w-8 h-8 image-fit">
                                        <img class="rounded-full" src="dist/images/fakers/profile-14.jpg"
                                            alt="Midone Tailwind HTML Admin Template">
                                    </div>
                                    <div class="ml-3">Johnny Depp</div>
                                    <div class="w-48 ml-auto text-xs text-right truncate text-slate-500">
                                        johnnydepp@left4code.com
                                    </div>
                                </a>
                            </div>
                            <div class="mb-2 font-medium">Products</div>
                            <a class="flex items-center mt-2" href="">
                                <div class="w-8 h-8 image-fit">
                                    <img class="rounded-full" src="dist/images/fakers/preview-2.jpg"
                                        alt="Midone Tailwind HTML Admin Template">
                                </div>
                                <div class="ml-3">Sony A7 III</div>
                                <div class="w-48 ml-auto text-xs text-right truncate text-slate-500">
                                    Photography
                                </div>
                            </a>
                            <a class="flex items-center mt-2" href="">
                                <div class="w-8 h-8 image-fit">
                                    <img class="rounded-full" src="dist/images/fakers/preview-5.jpg"
                                        alt="Midone Tailwind HTML Admin Template">
                                </div>
                                <div class="ml-3">Dell XPS 13</div>
                                <div class="w-48 ml-auto text-xs text-right truncate text-slate-500">
                                    PC & Laptop
                                </div>
                            </a>
                            <a class="flex items-center mt-2" href="">
                                <div class="w-8 h-8 image-fit">
                                    <img class="rounded-full" src="dist/images/fakers/preview-1.jpg"
                                        alt="Midone Tailwind HTML Admin Template">
                                </div>
                                <div class="ml-3">Apple MacBook Pro 13</div>
                                <div class="w-48 ml-auto text-xs text-right truncate text-slate-500">
                                    PC & Laptop
                                </div>
                            </a>
                            <a class="flex items-center mt-2" href="">
                                <div class="w-8 h-8 image-fit">
                                    <img class="rounded-full" src="dist/images/fakers/preview-5.jpg"
                                        alt="Midone Tailwind HTML Admin Template">
                                </div>
                                <div class="ml-3">Nikon Z6</div>
                                <div class="w-48 ml-auto text-xs text-right truncate text-slate-500">
                                    Photography
                                </div>
                            </a>
                        </div>
                    </div>
                </div> --}}
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                @if (auth()->user()->role == 'Student')
                    <div data-tw-merge="" data-tw-placement="bottom-end" class="relative mr-4 dropdown intro-x sm:mr-6">
                        <div data-tw-toggle="dropdown" aria-expanded="false"
                            class="cursor-pointer relative block text-white/70 outline-none before:absolute before:right-0 before:top-[-2px] before:h-[8px] before:w-[8px] before:rounded-full before:bg-danger before:content-['']">
                            <i data-tw-merge="" data-lucide="bell" class="stroke-1.5 w-5 h-5 dark:text-slate-500"></i>
                        </div>
                        <div data-transition="" data-selector=".show"
                            data-enter="transition-all ease-linear duration-150"
                            data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                            data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                            data-leave="transition-all ease-linear duration-150"
                            data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                            data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                            class="dropdown-menu absolute z-[9999] hidden">
                            <div data-tw-merge=""
                                class="dropdown-content rounded-md border-transparent bg-white shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 mt-2 w-[280px] p-5 sm:w-[350px]">
                                <div class="mb-5 font-medium">Notifications</div>
                                @foreach ($notifications as $notification)
                                    <div class="relative flex items-center cursor-pointer">
                                        <div class="ml-2">
                                            <div class="flex items-center">
                                                <a class="mr-5 font-medium" href="">
                                                    Reject Request!
                                                </a>
                                                <div class="ml-auto text-xs whitespace-nowrap text-slate-400">
                                                    Date Requested:
                                                    {{ \Carbon\Carbon::parse($notification->date_requested)->format('M d, Y') }}
                                                </div>
                                            </div>
                                            <div class="mt-0.5 w-full text-slate-500">
                                                Your request, {{ $notification->type }}, has been rejected on
                                                {{ \Carbon\Carbon::parse($notification->date_rejected)->format('M d, Y') }}.
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div data-tw-merge="" data-tw-placement="bottom-end" class="relative dropdown"><button
                        data-tw-toggle="dropdown" aria-expanded="false"
                        class="block w-8 h-8 overflow-hidden scale-110 rounded-full shadow-lg cursor-pointer image-fit zoom-in intro-x"><img
                            src="{{ auth()->user()->role == 'Student' ? asset('storage/' . auth()->user()->student->image) : asset('storage/' . auth()->user()->admin->image) }}"
                            alt="">
                    </button>
                    <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150"
                        data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                        data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                        data-leave="transition-all ease-linear duration-150"
                        data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                        data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                        class="dropdown-menu absolute z-[9999] hidden">
                        <div data-tw-merge=""
                            class="dropdown-content rounded-md border-transparent p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 relative mt-px w-56 bg-theme-1/80 text-white before:absolute before:inset-0 before:z-[-1] before:block before:rounded-md before:bg-black">
                            <div class="p-2 font-normal font-medium">
                                @if (auth()->user()->role == 'Admin')
                                    <div class="font-medium">{{ auth()->user()->admin->fname }}
                                        {{ auth()->user()->admin->lname }}</div>
                                @else
                                    <div class="font-medium">{{ auth()->user()->student->fname }}
                                        {{ auth()->user()->student->lname }}</div>
                                @endif
                                <div class="mt-0.5 text-xs text-white/70 dark:text-slate-500">
                                    {{ auth()->user()->role }}
                                </div>
                            </div>
                            {{-- <div class="h-px my-2 -mx-2 bg-slate-200/60 dark:bg-darkmode-400 bg-white/[0.08]">
                            </div>
                            <a
                                class="flex items-center p-2 transition duration-300 ease-in-out rounded-md cursor-pointer hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item hover:bg-white/5"><i
                                    data-tw-merge="" data-lucide="user" class="stroke-1.5 mr-2 h-4 w-4"></i>
                                Profile</a>
                            <a
                                class="flex items-center p-2 transition duration-300 ease-in-out rounded-md cursor-pointer hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item hover:bg-white/5"><i
                                    data-tw-merge="" data-lucide="edit" class="stroke-1.5 mr-2 h-4 w-4"></i>
                                Add Account</a>
                            <a
                                class="flex items-center p-2 transition duration-300 ease-in-out rounded-md cursor-pointer hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item hover:bg-white/5"><i
                                    data-tw-merge="" data-lucide="lock" class="stroke-1.5 mr-2 h-4 w-4"></i>
                                Reset Password</a>
                            <a
                                class="flex items-center p-2 transition duration-300 ease-in-out rounded-md cursor-pointer hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item hover:bg-white/5"><i
                                    data-tw-merge="" data-lucide="help-circle" class="stroke-1.5 mr-2 h-4 w-4"></i>
                                Help</a> --}}
                            <div class="h-px my-2 -mx-2 bg-slate-200/60 dark:bg-darkmode-400 bg-white/[0.08]">
                            </div>
                            <a href="{{ route('logout') }}"
                                class="flex items-center p-2 transition duration-300 ease-in-out rounded-md cursor-pointer hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item hover:bg-white/5"><i
                                    data-tw-merge="" data-lucide="toggle-right" class="stroke-1.5 mr-2 h-4 w-4"></i>
                                Logout</a>
                        </div>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->

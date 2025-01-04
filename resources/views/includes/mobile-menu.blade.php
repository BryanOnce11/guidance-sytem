        <!-- BEGIN: Mobile Menu -->
        <div
            class="mobile-menu group top-0 inset-x-0 fixed bg-theme-1/90 z-[60] border-b border-white/[0.08] dark:bg-darkmode-800/90 md:hidden before:content-[''] before:w-full before:h-screen before:z-10 before:fixed before:inset-x-0 before:bg-black/90 before:transition-opacity before:duration-200 before:ease-in-out before:invisible before:opacity-0 [&.mobile-menu--active]:before:visible [&.mobile-menu--active]:before:opacity-100">
            <div class="flex h-[70px] items-center px-3 sm:px-8">
                <a class="flex mr-auto" href="">
                    <img class="w-6" src="{{ asset('dist/images/logo.svg') }}"
                        alt="Midone - Tailwind Admin Dashboard Template">
                </a>
                <a class="mobile-menu-toggler" href="#">
                    <i data-tw-merge="" data-lucide="bar-chart2"
                        class="stroke-1.5 h-8 w-8 -rotate-90 transform text-white"></i>
                </a>
            </div>
            <div
                class="scrollable h-screen z-20 top-0 left-0 w-[270px] -ml-[100%] bg-primary transition-all duration-300 ease-in-out dark:bg-darkmode-800 [&[data-simplebar]]:fixed [&_.simplebar-scrollbar]:before:bg-black/50 group-[.mobile-menu--active]:ml-0">
                <a href="#"
                    class="fixed top-0 right-0 mt-4 mr-4 transition-opacity duration-200 ease-in-out invisible opacity-0 group-[.mobile-menu--active]:visible group-[.mobile-menu--active]:opacity-100">
                    <i data-tw-merge="" data-lucide="x-circle"
                        class="stroke-1.5 mobile-menu-toggler h-8 w-8 -rotate-90 transform text-white"></i>
                </a>
                <ul class="py-2">
                    <!-- BEGIN: First Child -->
                    @if (auth()->user()->role == 'Student')
                        <li>
                            <a href="{{ route('student.home-page') }}" class="menu">
                                <div class="menu__icon">
                                    <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="menu__title">Home Page</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('student.profile.show') }}" class="menu">
                                <div class="menu__icon">
                                    <i data-tw-merge="" data-lucide="user" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="menu__title">Profile</div>
                            </a>
                        </li>
                        @if (auth()->user()->status == 'Verified')
                            <li>
                                <a href="javascript:;"
                                    class="menu {{ request()->routeIs('student.good-moral.pending') || request()->routeIs('student.good-moral.ready_to_pickup') ? 'menu--active' : '' }}">
                                    <div class="menu__icon">
                                        <i data-tw-merge="" data-lucide="file-text" class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                    <div class="menu__title">
                                        Good Moral Request
                                        <div
                                            class="menu__sub-icon {{ request()->routeIs('student.good-moral.pending') || request()->routeIs('student.good-moral.ready_to_pickup') ? 'transform rotate-180' : '' }}">
                                            <i data-tw-merge="" data-lucide="chevron-down"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul
                                    class="{{ request()->routeIs('student.good-moral.pending') || request()->routeIs('student.good-moral.ready_to_pickup') ? 'menu__sub-open' : '' }}">
                                    <li>
                                        <a href="{{ route('student.good-moral.pending') }}"
                                            class="menu {{ request()->routeIs('student.good-moral.pending') ? 'menu--active' : '' }}">
                                            <div class="menu__icon">
                                                <i data-tw-merge="" data-lucide="hourglass"
                                                    class="stroke-1.5 w-5 h-5"></i>
                                            </div>
                                            <div class="menu__title">Pending Request</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.good-moral.ready_to_pickup') }}"
                                            class="menu {{ request()->routeIs('student.good-moral.ready_to_pickup') ? 'menu--active' : '' }}">
                                            <div class="menu__icon">
                                                <i data-tw-merge="" data-lucide="check-circle"
                                                    class="stroke-1.5 w-5 h-5"></i>
                                            </div>
                                            <div class="menu__title">Ready To Pickup Request</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;"
                                    class="menu {{ request()->routeIs('student.counseling.pending') || request()->routeIs('student.counseling.approved') ? 'menu--active' : '' }}">
                                    <div class="menu__icon">
                                        <i data-tw-merge="" data-lucide="chat-square" class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                    <div class="menu__title">
                                        Virtual Counseling
                                        <div
                                            class="menu__sub-icon {{ request()->routeIs('student.counseling.pending') || request()->routeIs('student.counseling.approved') ? 'transform rotate-180' : '' }}">
                                            <i data-tw-merge="" data-lucide="chevron-down"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul
                                    class="{{ request()->routeIs('student.counseling.pending') || request()->routeIs('student.counseling.approved') ? 'menu__sub-open' : '' }}">
                                    <li>
                                        <a href="{{ route('student.counseling.pending') }}"
                                            class="menu {{ request()->routeIs('student.counseling.pending') ? 'menu--active' : '' }}">
                                            <div class="menu__icon">
                                                <i data-tw-merge="" data-lucide="hourglass"
                                                    class="stroke-1.5 w-5 h-5"></i>
                                            </div>
                                            <div class="menu__title">Pending</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.counseling.approved') }}"
                                            class="menu {{ request()->routeIs('student.counseling.approved') ? 'menu--active' : '' }}">
                                            <div class="menu__icon">
                                                <i data-tw-merge="" data-lucide="check-circle"
                                                    class="stroke-1.5 w-5 h-5"></i>
                                            </div>
                                            <div class="menu__title">Approved</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="{{ route('admin.home-page') }}" class="menu">
                                <div class="menu__icon">
                                    <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="menu__title">Home Page</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;"
                                class="menu {{ request()->routeIs('admin.student-list.pending') || request()->routeIs('admn.student-list.verified') ? 'menu--active' : '' }}">
                                <div class="menu__icon">
                                    <i data-tw-merge="" data-lucide="users" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="menu__title">
                                    Students List
                                    <div
                                        class="menu__sub-icon {{ request()->routeIs('admin.student-list.pending') || request()->routeIs('admn.student-list.verified') ? 'transform rotate-180' : '' }}">
                                        <i data-tw-merge="" data-lucide="chevron-down"
                                            class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                </div>
                            </a>
                            <ul
                                class="{{ request()->routeIs('admin.student-list.pending') || request()->routeIs('admn.student-list.verified') ? 'menu__sub-open' : '' }}">
                                <li>
                                    <a href="{{ route('admin.student-list.pending') }}"
                                        class="menu {{ request()->routeIs('admin.student-list.pending') ? 'menu--active' : '' }}">
                                        <div class="menu__icon">
                                            <i data-tw-merge="" data-lucide="hourglass"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="menu__title">Pending</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admn.student-list.verified') }}"
                                        class="menu {{ request()->routeIs('admn.student-list.verified') ? 'menu--active' : '' }}">
                                        <div class="menu__icon">
                                            <i data-tw-merge="" data-lucide="check-circle"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="menu__title">Verified</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;"
                                class="menu {{ request()->routeIs('admin.good-moral.pending') || request()->routeIs('admin.good-moral.ready_to_pickup') || request()->routeIs('admin.good-moral.show-picked_up') ? 'menu--active' : '' }}">
                                <div class="menu__icon">
                                    <i data-tw-merge="" data-lucide="file-text" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="menu__title">
                                    Good Moral Requests
                                    <div
                                        class="menu__sub-icon {{ request()->routeIs('admin.good-moral.pending') || request()->routeIs('admin.good-moral.ready_to_pickup') || request()->routeIs('admin.good-moral.show-picked_up') ? 'transform rotate-180' : '' }}">
                                        <i data-tw-merge="" data-lucide="chevron-down"
                                            class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                </div>
                            </a>
                            <ul
                                class="{{ request()->routeIs('admin.good-moral.pending') || request()->routeIs('admin.good-moral.ready_to_pickup') || request()->routeIs('admin.good-moral.show-picked_up') ? 'menu__sub-open' : '' }}">
                                <li>
                                    <a href="{{ route('admin.good-moral.pending') }}"
                                        class="menu {{ request()->routeIs('admin.good-moral.pending') ? 'menu--active' : '' }}">
                                        <div class="menu__icon">
                                            <i data-tw-merge="" data-lucide="hourglass"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="menu__title">Pending Request</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.good-moral.ready_to_pickup') }}"
                                        class="menu {{ request()->routeIs('admin.good-moral.ready_to_pickup') ? 'menu--active' : '' }}">
                                        <div class="menu__icon">
                                            <i data-tw-merge="" data-lucide="check-circle"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="menu__title">Ready To Pickup Request</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.good-moral.show-picked_up') }}"
                                        class="menu {{ request()->routeIs('admin.good-moral.show-picked_up') ? 'menu--active' : '' }}">
                                        <div class="menu__icon">
                                            <i data-tw-merge="" data-lucide="history" class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="menu__title">Picked Up Request</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;"
                                class="menu {{ request()->routeIs('admin.counseling.pending') || request()->routeIs('admin.counseling.approved') || request()->routeIs('admin.counseling.record_history') ? 'menu--active' : '' }}">
                                <div class="menu__icon">
                                    <i data-tw-merge="" data-lucide="chat-square" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="menu__title">
                                    Virtual Counseling
                                    <div
                                        class="menu__sub-icon {{ request()->routeIs('admin.counseling.pending') || request()->routeIs('admin.counseling.approved') || request()->routeIs('admin.counseling.record_history') ? 'transform rotate-180' : '' }}">
                                        <i data-tw-merge="" data-lucide="chevron-down"
                                            class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                </div>
                            </a>
                            <ul
                                class="{{ request()->routeIs('admin.counseling.pending') || request()->routeIs('admin.counseling.approved') || request()->routeIs('admin.counseling.record_history') ? 'menu__sub-open' : '' }}">
                                <li>
                                    <a href="{{ route('admin.counseling.pending') }}"
                                        class="menu {{ request()->routeIs('admin.counseling.pending') ? 'menu--active' : '' }}">
                                        <div class="menu__icon">
                                            <i data-tw-merge="" data-lucide="hourglass"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="menu__title">Pending</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.counseling.approved') }}"
                                        class="menu {{ request()->routeIs('admin.counseling.approved') ? 'menu--active' : '' }}">
                                        <div class="menu__icon">
                                            <i data-tw-merge="" data-lucide="check-circle"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="menu__title">Approved</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.counseling.record_history') }}"
                                        class="menu {{ request()->routeIs('admin.counseling.record_history') ? 'menu--active' : '' }}">
                                        <div class="menu__icon">
                                            <i data-tw-merge="" data-lucide="history" class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="menu__title">Record History</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;"
                                class="menu {{ request()->routeIs('admin.settings.history_logs') || request()->routeIs('admin.settings.admin-list') ? 'menu--active' : '' }}">
                                <div class="menu__icon">
                                    <i data-tw-merge="" data-lucide="settings" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="menu__title">
                                    Settings
                                    <div
                                        class="menu__sub-icon {{ request()->routeIs('admin.settings.history_logs') || request()->routeIs('admin.settings.admin-list') ? 'transform rotate-180' : '' }}">
                                        <i data-tw-merge="" data-lucide="chevron-down"
                                            class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                </div>
                            </a>
                            <ul
                                class="{{ request()->routeIs('admin.settings.history_logs') || request()->routeIs('admin.settings.admin-list') ? 'menu__sub-open' : '' }}">
                                <li>
                                    <a href="{{ route('admin.settings.history_logs') }}"
                                        class="menu {{ request()->routeIs('admin.settings.history_logs') ? 'menu--active' : '' }}">
                                        <div class="menu__icon">
                                            <i data-tw-merge="" data-lucide="file-text"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="menu__title">History Logs</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.settings.admin-list') }}"
                                        class="menu {{ request()->routeIs('admin.settings.admin-list') ? 'menu--active' : '' }}">
                                        <div class="menu__icon">
                                            <i data-tw-merge="" data-lucide="file-text"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="menu__title">Account List</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="my-6 menu__divider"></li>
                    <!-- END: First Child -->
                </ul>
            </div>
        </div>
        <!-- END: Mobile Menu -->

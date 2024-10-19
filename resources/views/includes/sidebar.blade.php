            <!-- BEGIN: Side Menu -->
            <nav class="side-nav z-50 -mt-4 hidden w-[100px] overflow-x-hidden px-5 pb-16 pt-32 md:block xl:w-[260px]">
                <ul>
                    <li>
                        <a href="enigma-side-menu-inbox-page.html" class="side-menu">
                            <div class="side-menu__icon">
                                <i data-tw-merge="" data-lucide="inbox" class="stroke-1.5 w-5 h-5"></i>
                            </div>
                            <div class="side-menu__title">
                                Profile
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"
                            class="side-menu {{ request()->routeIs('student.good-moral.pending') || request()->routeIs('student.good-moral.ready_to_pickup') ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon">
                                <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
                            </div>
                            <div class="side-menu__title">
                                Good Moral Request
                                <div
                                    class="side-menu__sub-icon {{ request()->routeIs('student.good-moral.pending') || request()->routeIs('student.good-moral.ready_to_pickup') ? 'transform rotate-180' : '' }}">
                                    <i data-tw-merge="" data-lucide="chevron-down" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                            </div>
                        </a>
                        <ul
                            class="{{ request()->routeIs('student.good-moral.pending') || request()->routeIs('student.good-moral.ready_to_pickup') ? 'side-menu__sub-open' : '' }}">
                            <li>
                                <a href="{{ route('student.good-moral.pending') }}"
                                    class="side-menu {{ request()->routeIs('student.good-moral.pending') ? 'side-menu--active' : '' }}">
                                    <div class="side-menu__icon">
                                        <i data-tw-merge="" data-lucide="activity" class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Pending Request
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('student.good-moral.ready_to_pickup') }}"
                                    class="side-menu {{ request()->routeIs('student.good-moral.ready_to_pickup') ? 'side-menu--active' : '' }}">
                                    <div class="side-menu__icon">
                                        <i data-tw-merge="" data-lucide="activity" class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Ready To Pickup Request
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"
                            class="side-menu {{ request()->routeIs('student.counseling.pending') || request()->routeIs('student.counseling.aprroved') ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon">
                                <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
                            </div>
                            <div class="side-menu__title">
                                Virtual Counseling
                                <div
                                    class="side-menu__sub-icon {{ request()->routeIs('student.counseling.pending') || request()->routeIs('student.counseling.aprroved') ? 'transform rotate-180' : '' }}">
                                    <i data-tw-merge="" data-lucide="chevron-down" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                            </div>
                        </a>
                        <ul
                            class="{{ request()->routeIs('student.counseling.pending') || request()->routeIs('student.counseling.aprroved') ? 'side-menu__sub-open' : '' }}">
                            <li>
                                <a href="{{ route('student.counseling.pending') }}"
                                    class="side-menu {{ request()->routeIs('student.counseling.pending') ? 'side-menu--active' : '' }}">
                                    <div class="side-menu__icon">
                                        <i data-tw-merge="" data-lucide="activity" class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Pending
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('student.counseling.approved') }}"
                                    class="side-menu {{ request()->routeIs('student.counseling.aprroved') ? 'side-menu--active' : '' }}">
                                    <div class="side-menu__icon">
                                        <i data-tw-merge="" data-lucide="activity" class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Approved
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->

            <!-- BEGIN: Side Menu -->
            <nav class="side-nav z-50 -mt-4 hidden w-[100px] overflow-x-hidden px-5 pb-16 pt-32 md:block xl:w-[260px]">
                <ul>
                    @if (auth()->user()->role == 'Student')
                        <li>
                            <a href="{{ route('student.profile.show') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-tw-merge="" data-lucide="inbox" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="side-menu__title">
                                    Profile
                                </div>
                            </a>
                        </li>
                        @if (auth()->user()->status == 'Verified')
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
                                            <i data-tw-merge="" data-lucide="chevron-down"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul
                                    class="{{ request()->routeIs('student.good-moral.pending') || request()->routeIs('student.good-moral.ready_to_pickup') ? 'side-menu__sub-open' : '' }}">
                                    <li>
                                        <a href="{{ route('student.good-moral.pending') }}"
                                            class="side-menu {{ request()->routeIs('student.good-moral.pending') ? 'side-menu--active' : '' }}">
                                            <div class="side-menu__icon">
                                                <i data-tw-merge="" data-lucide="activity"
                                                    class="stroke-1.5 w-5 h-5"></i>
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
                                                <i data-tw-merge="" data-lucide="activity"
                                                    class="stroke-1.5 w-5 h-5"></i>
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
                                    class="side-menu {{ request()->routeIs('student.counseling.pending') || request()->routeIs('student.counseling.approved') ? 'side-menu--active' : '' }}">
                                    <div class="side-menu__icon">
                                        <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Virtual Counseling
                                        <div
                                            class="side-menu__sub-icon {{ request()->routeIs('student.counseling.pending') || request()->routeIs('student.counseling.approved') ? 'transform rotate-180' : '' }}">
                                            <i data-tw-merge="" data-lucide="chevron-down"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul
                                    class="{{ request()->routeIs('student.counseling.pending') || request()->routeIs('student.counseling.approved') ? 'side-menu__sub-open' : '' }}">
                                    <li>
                                        <a href="{{ route('student.counseling.pending') }}"
                                            class="side-menu {{ request()->routeIs('student.counseling.pending') ? 'side-menu--active' : '' }}">
                                            <div class="side-menu__icon">
                                                <i data-tw-merge="" data-lucide="activity"
                                                    class="stroke-1.5 w-5 h-5"></i>
                                            </div>
                                            <div class="side-menu__title">
                                                Pending
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('student.counseling.approved') }}"
                                            class="side-menu {{ request()->routeIs('student.counseling.approved') ? 'side-menu--active' : '' }}">
                                            <div class="side-menu__icon">
                                                <i data-tw-merge="" data-lucide="activity"
                                                    class="stroke-1.5 w-5 h-5"></i>
                                            </div>
                                            <div class="side-menu__title">
                                                Approved
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="javascript:;"
                                class="side-menu {{ request()->routeIs('admin.student-list.pending') || request()->routeIs('admn.student-list.verified') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon">
                                    <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="side-menu__title">
                                    Students List
                                    <div
                                        class="side-menu__sub-icon {{ request()->routeIs('admin.student-list.pending') || request()->routeIs('admn.student-list.verified') ? 'transform rotate-180' : '' }}">
                                        <i data-tw-merge="" data-lucide="chevron-down" class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                </div>
                            </a>
                            <ul
                                class="{{ request()->routeIs('admin.student-list.pending') || request()->routeIs('admn.student-list.verified') ? 'side-menu__sub-open' : '' }}">
                                <li>
                                    <a href="{{ route('admin.student-list.pending') }}"
                                        class="side-menu {{ request()->routeIs('admin.student-list.pending') ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon">
                                            <i data-tw-merge="" data-lucide="activity" class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Pending
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admn.student-list.verified') }}"
                                        class="side-menu {{ request()->routeIs('admn.student-list.verified') ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon">
                                            <i data-tw-merge="" data-lucide="activity" class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Verified
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;"
                                class="side-menu {{ request()->routeIs('admin.good-moral.pending') || request()->routeIs('admin.good-moral.ready_to_pickup') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon">
                                    <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="side-menu__title">
                                    Good Moral Requests
                                    <div
                                        class="side-menu__sub-icon {{ request()->routeIs('admin.good-moral.pending') || request()->routeIs('admin.good-moral.ready_to_pickup') ? 'transform rotate-180' : '' }}">
                                        <i data-tw-merge="" data-lucide="chevron-down" class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                </div>
                            </a>
                            <ul
                                class="{{ request()->routeIs('admin.good-moral.pending') || request()->routeIs('admin.good-moral.ready_to_pickup') ? 'side-menu__sub-open' : '' }}">
                                <li>
                                    <a href="{{ route('admin.good-moral.pending') }}"
                                        class="side-menu {{ request()->routeIs('admin.good-moral.pending') ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon">
                                            <i data-tw-merge="" data-lucide="activity"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Pending Request
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.good-moral.ready_to_pickup') }}"
                                        class="side-menu {{ request()->routeIs('admin.good-moral.ready_to_pickup') ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon">
                                            <i data-tw-merge="" data-lucide="activity"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Ready To Picup Request
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;"
                                class="side-menu {{ request()->routeIs('admin.counseling.pending') || request()->routeIs('admin.counseling.approved') || request()->routeIs('admin.counseling.record_history') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon">
                                    <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="side-menu__title">
                                    Virtual Counseling
                                    <div
                                        class="side-menu__sub-icon {{ request()->routeIs('admin.counseling.pending') || request()->routeIs('admin.counseling.approved') || request()->routeIs('admin.counseling.record_history') ? 'transform rotate-180' : '' }}">
                                        <i data-tw-merge="" data-lucide="chevron-down"
                                            class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                </div>
                            </a>
                            <ul
                                class="{{ request()->routeIs('admin.counseling.pending') || request()->routeIs('admin.counseling.approved') || request()->routeIs('admin.counseling.record_history') ? 'side-menu__sub-open' : '' }}">
                                <li>
                                    <a href="{{ route('admin.counseling.pending') }}"
                                        class="side-menu {{ request()->routeIs('admin.counseling.pending') ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon">
                                            <i data-tw-merge="" data-lucide="activity"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Pending
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.counseling.approved') }}"
                                        class="side-menu {{ request()->routeIs('admin.counseling.approved') ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon">
                                            <i data-tw-merge="" data-lucide="activity"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Approved
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.counseling.record_history') }}"
                                        class="side-menu {{ request()->routeIs('admin.counseling.record_history') ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon">
                                            <i data-tw-merge="" data-lucide="activity"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            Record History
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;"
                                class="side-menu {{ request()->routeIs('admin.settings.history_logs') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon">
                                    <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
                                </div>
                                <div class="side-menu__title">
                                    Settings
                                    <div
                                        class="side-menu__sub-icon {{ request()->routeIs('admin.settings.history_logs') ? 'transform rotate-180' : '' }}">
                                        <i data-tw-merge="" data-lucide="chevron-down"
                                            class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                </div>
                            </a>
                            <ul
                                class="{{ request()->routeIs('admin.settings.history_logs') ? 'side-menu__sub-open' : '' }}">
                                <li>
                                    <a href="{{ route('admin.settings.history_logs') }}"
                                        class="side-menu {{ request()->routeIs('admin.settings.history_logs') ? 'side-menu--active' : '' }}">
                                        <div class="side-menu__icon">
                                            <i data-tw-merge="" data-lucide="activity"
                                                class="stroke-1.5 w-5 h-5"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            History Logs
                                        </div>
                                    </a>
                                </li>
                                {{-- <li>
                                <a href="{{ route('admin.good-moral.ready_to_pickup') }}"
                                    class="side-menu {{ request()->routeIs('admin.good-moral.ready_to_pickup') ? 'side-menu--active' : '' }}">
                                    <div class="side-menu__icon">
                                        <i data-tw-merge="" data-lucide="activity" class="stroke-1.5 w-5 h-5"></i>
                                    </div>
                                    <div class="side-menu__title">
                                        Verified
                                    </div>
                                </a>
                            </li> --}}
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- END: Side Menu -->

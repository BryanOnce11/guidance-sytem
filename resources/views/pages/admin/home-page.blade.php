@extends('layouts.app')
@section('content')
    <style>
        .test {
            height: 100vh;
        }
    </style>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="flex flex-wrap items-center col-span-12 mt-2 intro-y sm:flex-nowrap">
            {{-- <button data-tw-merge="" data-tw-toggle="modal" data-tw-target="#new-order-modal"
            class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md">
            Request Good Moral</button>
        <div data-tw-merge="" data-tw-placement="bottom-end" class="relative dropdown"><button data-tw-merge=""
                data-tw-toggle="dropdown" aria-expanded="false"
                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed !box px-2"><span
                    class="flex items-center justify-center w-5 h-5">
                    <i data-tw-merge="" data-lucide="plus" class="stroke-1.5 h-4 w-4"></i>
                </span></button>
            <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150"
                data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                data-leave="transition-all ease-linear duration-150"
                data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                class="dropdown-menu absolute z-[9999] hidden">
                <div data-tw-merge=""
                    class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                    <a
                        class="flex items-center p-2 transition duration-300 ease-in-out rounded-md cursor-pointer hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                            data-tw-merge="" data-lucide="printer" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Print</a>
                    <a
                        class="flex items-center p-2 transition duration-300 ease-in-out rounded-md cursor-pointer hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                            data-tw-merge="" data-lucide="file-text" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Export to
                        Excel</a>
                    <a
                        class="flex items-center p-2 transition duration-300 ease-in-out rounded-md cursor-pointer hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                            data-tw-merge="" data-lucide="file-text" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Export to
                        PDF</a>
                </div>
            </div>
        </div> --}}
            <div class="hidden mx-auto text-slate-500 md:block">
                Showing {{ $virtual_counselings_pending->firstItem() }} to {{ $virtual_counselings_pending->lastItem() }} of
                {{ $virtual_counselings_pending->total() }} entries
            </div>
            <div class="w-full mt-3 sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
                {{-- <div class="relative w-56 text-slate-500">
                <input data-tw-merge="" type="text" placeholder="Search..."
                    class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 !box w-56 pr-10">
                <i data-tw-merge="" data-lucide="search"
                    class="stroke-1.5 absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4"></i>
            </div> --}}
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="col-span-12 overflow-auto intro-y lg:overflow-visible">
            <table data-tw-merge="" class="w-full text-left -mt-2 border-separate border-spacing-y-[10px]">
                <thead data-tw-merge="" class="">
                    <tr data-tw-merge="" class="">
                        <th data-tw-merge=""
                            class="px-5 py-3 font-medium border-b-0 dark:border-darkmode-300 whitespace-nowrap">
                            STUDENT ID
                        </th>
                        <th data-tw-merge=""
                            class="px-5 py-3 font-medium text-center border-b-0 dark:border-darkmode-300 whitespace-nowrap">
                            FULL NAME
                        </th>
                        <th data-tw-merge=""
                            class="px-5 py-3 font-medium text-center border-b-0 dark:border-darkmode-300 whitespace-nowrap">
                            PROGRAM
                        </th>
                        <th data-tw-merge=""
                            class="px-5 py-3 font-medium border-b-0 dark:border-darkmode-300 whitespace-nowrap">
                            YEAR LEVEL
                        </th>
                        <th data-tw-merge=""
                            class="px-5 py-3 font-medium text-center border-b-0 dark:border-darkmode-300 whitespace-nowrap">
                            CONTACT NUMBER
                        </th>
                        <th data-tw-merge=""
                            class="px-5 py-3 font-medium text-center border-b-0 dark:border-darkmode-300 whitespace-nowrap">
                            Notification
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($virtual_counselings_pending as $virtual_counseling_pending)
                        <tr data-tw-merge="" class="intro-x">
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $virtual_counseling_pending->student->student_id }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                <a class="font-medium whitespace-nowrap" href="">
                                    {{ $virtual_counseling_pending->student->fname }}
                                    {{ $virtual_counseling_pending->student->m_i }}
                                    {{ $virtual_counseling_pending->student->lname }}
                                </a>
                                <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                    {{ $virtual_counseling_pending->student->gender }}
                                </div>
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $virtual_counseling_pending->student->course->code }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $virtual_counseling_pending->student->year_lvl }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $virtual_counseling_pending->student->contact_num }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box min-w-[200px] rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                @php
                                    $scheduled_time = Carbon\Carbon::parse($virtual_counseling_pending->time_scheduled);
                                    $scheduled_date = Carbon\Carbon::parse($virtual_counseling_pending->date_scheduled);

                                    if ($scheduled_date->isToday()) {
                                        echo 'Your virtual counseling session is scheduled for today at: ' .
                                            $scheduled_time->format('h:i A') .
                                            '. Please be ready for the meeting.';
                                    } elseif ($scheduled_date->isTomorrow()) {
                                        echo 'Your virtual counseling session is scheduled for tomorrow at: ' .
                                            $scheduled_time->format('h:i A') .
                                            '. Please be ready for the meeting.';
                                    }
                                @endphp
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"
                                class="py-4 text-lg font-medium text-center text-gray-500 bg-gray-100 dark:bg-darkmode-600 dark:text-gray-300">
                                No approved virtual counseling sessions scheduled for today or tomorrow.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="flex flex-wrap items-center col-span-12 intro-y sm:flex-row sm:flex-nowrap">
            <nav class="w-full sm:mr-auto sm:w-auto">
                {{ $virtual_counselings_pending->links('vendor.pagination.tailwind') }}
            </nav>
            <select onChange="window.location.href=this.value" data-tw-merge=""
                class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 !box mt-3 w-20 sm:mt-0">
                @foreach ([10, 25, 35, 50] as $perPage)
                    <option value="{{ request()->fullUrlWithQuery(['per_page' => $perPage]) }}"
                        {{ request('per_page') == $perPage ? 'selected' : '' }}>
                        {{ $perPage }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- END: Pagination -->
    </div>

    <div class="mt-10 overflow-x-auto">
        <table data-tw-merge class="w-full text-left">
            <thead data-tw-merge class="">
                <tr data-tw-merge
                    class="[&:hover_td]:bg-slate-100 [&:hover_td]:dark:bg-darkmode-300 [&:hover_td]:dark:bg-opacity-50">
                    <th data-tw-merge
                        class="px-5 py-3 font-medium border-t border-b-2 border-l border-r dark:border-darkmode-300 whitespace-nowrap">
                        #</th>
                    <th data-tw-merge
                        class="px-5 py-3 font-medium border-t border-b-2 border-l border-r dark:border-darkmode-300 whitespace-nowrap">
                        First Name</th>
                    <th data-tw-merge
                        class="px-5 py-3 font-medium border-t border-b-2 border-l border-r dark:border-darkmode-300 whitespace-nowrap">
                        Last Name</th>
                    <th data-tw-merge
                        class="px-5 py-3 font-medium border-t border-b-2 border-l border-r dark:border-darkmode-300 whitespace-nowrap">
                        Email</th>
                    <th data-tw-merge
                        class="px-5 py-3 font-medium border-t border-b-2 border-l border-r dark:border-darkmode-300 whitespace-nowrap">
                        Notification</th>
                    <th data-tw-merge
                        class="px-5 py-3 font-medium border-t border-b-2 border-l border-r dark:border-darkmode-300 whitespace-nowrap">
                        Action</th>
                </tr>
            </thead>
            <tbody>
                <tr data-tw-merge
                    class="[&:hover_td]:bg-slate-100 [&:hover_td]:dark:bg-darkmode-300 [&:hover_td]:dark:bg-opacity-50">
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">1</td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">
                        John</td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">Duyan
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">
                        janduyan@gmail.com</td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">
                        <div class="text-sm text-yellow-500">Your virtual counseling session is scheduled for today at:
                            <strong>10:00 AM</strong>. Please be ready for the meeting.
                        </div>
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">
                        <i data-tw-merge="" data-lucide="eye"
                            class="stroke-1.5 mr-1 h-4 w-4 cursor-pointer text-blue-500"></i>
                    </td>
                </tr>
                <tr data-tw-merge
                    class="[&:hover_td]:bg-slate-100 [&:hover_td]:dark:bg-darkmode-300 [&:hover_td]:dark:bg-opacity-50">
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">2</td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">Julie
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">
                        Sandoval
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">
                        julie@gmail.com</td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">
                        <div class="text-sm text-yellow-500">Your virtual counseling session is scheduled for today at:
                            <strong>02:00 PM</strong>. Please be ready for the meeting.
                        </div>
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">
                        <a data-tw-merge="" data-tw-toggle="modal" data-tw-target="#new-order-modal">
                            <i data-tw-merge="" data-lucide="eye"
                                class="stroke-1.5 mr-1 h-4 w-4 cursor-pointer text-blue-500"></i></a>
                    </td>
                </tr>
                <tr data-tw-merge
                    class="[&:hover_td]:bg-slate-100 [&:hover_td]:dark:bg-darkmode-300 [&:hover_td]:dark:bg-opacity-50">
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">3</td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">Mark
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">Alcasid
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">
                        alcasidmark@gmail.com</td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">

                        <div class="text-sm text-yellow-500">Your virtual counseling session is scheduled for tomorrow at:
                            <strong>10:30 AM</strong>. Please prepare any questions or concerns.
                        </div>
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-t border-b border-l border-r dark:border-darkmode-300">
                        <i data-tw-merge="" data-lucide="eye"
                            class="stroke-1.5 mr-1 h-4 w-4 cursor-pointer text-blue-500"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="w-auto h-[400px] mt-10">
        <canvas class="chart horizontal-bar-chart"></canvas>
    </div>

    <div class="flex items-center justify-center h-screen mt-10 bg-center bg-no-repeat bg-cover"
        style="background-image: url('{{ asset('image/bgbrookes1.jpg') }}'); background-size: contain;">
    </div>

    <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="new-order-modal"
        class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
        <div data-tw-merge=""
            class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
            <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="mr-auto text-base font-medium">Request Virtual Counseling</h2>
            </div>
            <form action="{{ route('student.good-moral.store') }}" method="POST">
                @csrf
                <div data-tw-merge="" class="grid grid-cols-12 gap-4 p-5 gap-y-3">
                    <div class="col-span-12">
                        <div class="form-group">
                            <label for="status">Request Status</label>
                            <div class="flex items-center gap-4">
                                <label for="accept" class="inline-flex items-center">
                                    <input type="radio" id="accept" name="status" value="accept"
                                        class="form-radio text-primary focus:ring-primary" required>
                                    <span class="ml-2">Accept</span>
                                </label>
                                <label for="reject" class="inline-flex items-center">
                                    <input type="radio" id="reject" name="status" value="reject"
                                        class="form-radio text-danger focus:ring-danger" required>
                                    <span class="ml-2">Reject</span>
                                </label>
                            </div>

                            @error('status')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Date Picker for Reschedule -->
                    <div class="col-span-12" id="reschedule-date">
                        <div class="form-group">
                            <label for="reschedule_date">New Date for Request</label>
                            <input type="date" name="reschedule_date" id="reschedule_date"
                                class="w-full text-sm rounded-md shadow-sm border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80">
                            @error('reschedule_date')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-slate-200/60 dark:border-darkmode-400"><button
                        data-tw-merge="" data-tw-dismiss="modal" type="button"
                        class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1 w-32">Cancel</button>
                    <button data-tw-merge="" type="submit"
                        class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-32">
                        Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

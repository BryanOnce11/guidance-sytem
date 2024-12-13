@extends('layouts.app')
@section('content')
    <div class="flex items-center h-10 mt-10 intro-y">
        <h2 class="mr-5 text-lg font-medium truncate">Virtual Counseling</h2>
        <a class="flex items-center ml-auto text-primary" href="">
            <i data-tw-merge="" data-lucide="refresh-ccw" class="stroke-1.5 mr-3 h-4 w-4"></i>
            Reload Data
        </a>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="flex flex-wrap items-center col-span-12 mt-2 intro-y sm:flex-nowrap">
            {{-- <form action="{{ route('student.counseling.store') }}" method="POST">
                @csrf
                <button data-tw-merge="" type="submit"
                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md">
                    Request Appointmeant</button>
            </form> --}}
            <button data-tw-merge="" data-tw-toggle="modal" data-tw-target="#new-order-modal"
                class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md">
                Request Appointment</button>
            {{-- <div data-tw-merge="" data-tw-placement="bottom-end" class="relative dropdown"><button data-tw-merge=""
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
                Showing {{ $pending_counselings->firstItem() }} to {{ $pending_counselings->lastItem() }} of
                {{ $pending_counselings->total() }} entries
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
                            DATE REQUESTED
                        </th>
                        <th data-tw-merge=""
                            class="px-5 py-3 font-medium text-center border-b-0 dark:border-darkmode-300 whitespace-nowrap">
                            STATUS
                        </th>
                        <th data-tw-merge=""
                            class="px-5 py-3 font-medium text-center border-b-0 dark:border-darkmode-300 whitespace-nowrap">
                            ACTIONS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pending_counselings as $pending_counseling)
                        <tr data-tw-merge="" class="intro-x">
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $pending_counseling->student->student_id }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                <a class="font-medium whitespace-nowrap" href="">
                                    {{ $pending_counseling->student->fname }} {{ $pending_counseling->student->m_i }}
                                    {{ $pending_counseling->student->lname }}
                                </a>
                                <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                    {{ $pending_counseling->student->gender }}
                                </div>
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $pending_counseling->student->course->code }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $pending_counseling->student->year_lvl }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $pending_counseling->date_requested->setTimezone('Asia/Manila')->format('M d, Y') }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                <div class="flex items-center justify-center text-pending">
                                    <i data-tw-merge="" data-lucide="check-square" class="stroke-1.5 mr-2 h-4 w-4"></i>
                                    {{ $pending_counseling->status }}
                                </div>
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box w-56 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600 before:absolute before:inset-y-0 before:left-0 before:my-auto before:block before:h-8 before:w-px before:bg-slate-200 before:dark:bg-darkmode-400">
                                <div class="flex items-center justify-center">
                                    <a class="flex items-center mr-3 text-primary"
                                        href="{{ route('admin.counseling.letter', $pending_counseling->id) }}">
                                        <i data-tw-merge="" data-lucide="mail" class="stroke-1.5 mr-1 h-4 w-4"></i>
                                        Letter
                                    </a>
                                </div>
                            </td>
                            {{-- <td data-tw-merge=""
                            class="px-5 py-3 border-b dark:border-darkmode-300 box w-56 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600 before:absolute before:inset-y-0 before:left-0 before:my-auto before:block before:h-8 before:w-px before:bg-slate-200 before:dark:bg-darkmode-400">
                            <div class="flex items-center justify-center">
                                <a class="flex items-center mr-3" href="#">
                                    <i data-tw-merge="" data-lucide="check-square" class="stroke-1.5 mr-1 h-4 w-4"></i>
                                    Edit
                                </a>
                                <a class="flex items-center text-danger" data-tw-toggle="modal"
                                    data-tw-target="#delete-confirmation-modal" href="#">
                                    <i data-tw-merge="" data-lucide="trash" class="stroke-1.5 mr-1 h-4 w-4"></i>
                                    Delete
                                </a>
                            </div>
                        </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 text-center">No pending request found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="flex flex-wrap items-center col-span-12 intro-y sm:flex-row sm:flex-nowrap">
            <nav class="w-full sm:mr-auto sm:w-auto">
                {{ $pending_counselings->links('vendor.pagination.tailwind') }}
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

    <!-- BEGIN: Delete Confirmation Modal -->
    <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="delete-confirmation-modal"
        class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
        <div data-tw-merge=""
            class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
            <div class="p-5 text-center">
                <i data-tw-merge="" data-lucide="x-circle" class="stroke-1.5 mx-auto mt-3 h-16 w-16 text-danger"></i>
                <div class="mt-5 text-3xl">Are you sure?</div>
                <div class="mt-2 text-slate-500">
                    Do you really want to delete these records? <br>
                    This process cannot be undone.
                </div>
            </div>
            <div class="px-5 pb-8 text-center">
                <button data-tw-merge="" data-tw-dismiss="modal" type="button"
                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1 w-24">Cancel</button>
                <button data-tw-merge="" type="button"
                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-danger border-danger text-white dark:border-danger w-24">Delete</button>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

    <!-- BEGIN: New Order Modal -->
    <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="new-order-modal"
        class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
        <div data-tw-merge=""
            class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
            <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="mr-auto text-base font-medium">Request Appointmeant</h2>
            </div>
            <form action="{{ route('student.counseling.store') }}" method="POST">
                @csrf
                <div data-tw-merge="" class="grid grid-cols-12 gap-4 p-5 gap-y-3">
                    <div class="col-span-12">
                        <label data-tw-merge="" for="pos-form-1"
                            class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                            Reason
                        </label>
                        <input data-tw-merge="" name="reason" id="pos-form-1" type="text"
                            value="{{ old('reason') }}" placeholder="Input your reason"
                            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 flex-1">
                        @error('reason')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
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
    <!-- END: New Order Modal -->
@endsection

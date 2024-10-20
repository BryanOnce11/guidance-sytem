@extends('layouts.app')
@section('content')
    <div class="intro-y flex h-10 items-center mt-10">
        <h2 class="mr-5 truncate text-lg font-medium">Good Moral Request</h2>
        <a class="ml-auto flex items-center text-primary" href="">
            <i data-tw-merge="" data-lucide="refresh-ccw" class="stroke-1.5 mr-3 h-4 w-4"></i>
            Reload Data
        </a>
    </div>
    <div class="mt-5 grid grid-cols-12 gap-6">
        <div class="intro-y col-span-12 mt-2 flex flex-wrap items-center sm:flex-nowrap">
            {{-- <button data-tw-merge="" data-tw-toggle="modal" data-tw-target="#new-order-modal"
                class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md">
                Request Good Moral</button>
            <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge=""
                    data-tw-toggle="dropdown" aria-expanded="false"
                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed !box px-2"><span
                        class="flex h-5 w-5 items-center justify-center">
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
                            class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                                data-tw-merge="" data-lucide="printer" class="stroke-1.5 mr-2 h-4 w-4"></i>
                            Print</a>
                        <a
                            class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                                data-tw-merge="" data-lucide="file-text" class="stroke-1.5 mr-2 h-4 w-4"></i>
                            Export to
                            Excel</a>
                        <a
                            class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                                data-tw-merge="" data-lucide="file-text" class="stroke-1.5 mr-2 h-4 w-4"></i>
                            Export to
                            PDF</a>
                    </div>
                </div>
            </div> --}}
            <div class="mx-auto hidden text-slate-500 md:block">
                Showing {{ $good_moral_ready_to_pickups->firstItem() }} to {{ $good_moral_ready_to_pickups->lastItem() }}
                of
                {{ $good_moral_ready_to_pickups->total() }} entries
            </div>
            <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
                <div class="relative w-56 text-slate-500">
                    <input data-tw-merge="" type="text" placeholder="Search..."
                        class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 !box w-56 pr-10">
                    <i data-tw-merge="" data-lucide="search"
                        class="stroke-1.5 absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table data-tw-merge="" class="w-full text-left -mt-2 border-separate border-spacing-y-[10px]">
                <thead data-tw-merge="" class="">
                    <tr data-tw-merge="" class="">
                        <th data-tw-merge=""
                            class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                            STUDENT ID
                        </th>
                        <th data-tw-merge=""
                            class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                            FULL NAME
                        </th>
                        <th data-tw-merge=""
                            class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                            PROGRAM
                        </th>
                        <th data-tw-merge=""
                            class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                            YEAR LEVEL
                        </th>
                        <th data-tw-merge=""
                            class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                            DATE REQUESTED
                        </th>
                        <th data-tw-merge=""
                            class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                            STATUS
                        </th>
                        <th data-tw-merge=""
                            class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                            ACTIONS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($good_moral_ready_to_pickups as $good_moral_ready_to_pickup)
                        <tr data-tw-merge="" class="intro-x">
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $good_moral_ready_to_pickup->student->student_id }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                <a class="whitespace-nowrap font-medium" href="">
                                    {{ $good_moral_ready_to_pickup->student->fname }}
                                    {{ $good_moral_ready_to_pickup->student->m_i }}
                                    {{ $good_moral_ready_to_pickup->student->lname }}
                                </a>
                                <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                    {{ $good_moral_ready_to_pickup->student->gender }}
                                </div>
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $good_moral_ready_to_pickup->student->course }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $good_moral_ready_to_pickup->student->year_lvl }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 text-center shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                {{ $good_moral_ready_to_pickup->date_requested->setTimezone('Asia/Manila')->format('M d, Y') }}
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                                <div class="flex items-center justify-center text-pending">
                                    <i data-tw-merge="" data-lucide="check-square"
                                        class="stroke-1.5 mr-2 {{ $good_moral_ready_to_pickup->status == 'Picked Up' ? 'h-8 w-8' : 'h-4 w-4' }}"></i>
                                    {{ $good_moral_ready_to_pickup->status == 'Picked Up' ? $good_moral_ready_to_pickup->status . '--' . $good_moral_ready_to_pickup->date_to_pickup->setTimezone('Asia/Manila')->format('M d, Y') : $good_moral_ready_to_pickup->status }}
                                </div>
                            </td>
                            <td data-tw-merge=""
                                class="px-5 py-3 border-b dark:border-darkmode-300 box w-56 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600 before:absolute before:inset-y-0 before:left-0 before:my-auto before:block before:h-8 before:w-px before:bg-slate-200 before:dark:bg-darkmode-400">
                                <div class="flex items-center justify-center">
                                    @if ($good_moral_ready_to_pickup->status != 'Picked Up')
                                        <a class="mr-3 flex items-center text-success" data-tw-toggle="modal"
                                            data-tw-target="#confirmation-modal{{ $good_moral_ready_to_pickup->id }}"
                                            href="#">
                                            <i data-tw-merge="" data-lucide="box" class="stroke-1.5 mr-1 h-4 w-4"></i>
                                            Picked Up
                                        </a>
                                    @endif
                                    {{-- <a class="flex items-center text-danger" data-tw-toggle="modal"
                                        data-tw-target="#delete-confirmation-modal" href="#">
                                        <i data-tw-merge="" data-lucide="trash" class="stroke-1.5 mr-1 h-4 w-4"></i>
                                        Delete
                                    </a> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap items-center sm:flex-row sm:flex-nowrap">
            <nav class="w-full sm:mr-auto sm:w-auto">
                {{ $good_moral_ready_to_pickups->links('vendor.pagination.tailwind') }}
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

    @foreach ($good_moral_ready_to_pickups as $good_moral_ready_to_pickup)
        <!-- BEGIN: Confirmation Modal -->
        <div data-tw-backdrop="" aria-hidden="true" tabindex="-1"
            id="confirmation-modal{{ $good_moral_ready_to_pickup->id }}"
            class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
            <div data-tw-merge=""
                class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
                <div class="p-5 text-center">
                    <i data-tw-merge="" data-lucide="shield-check"
                        class="stroke-1.5 mx-auto mt-3 h-16 w-16 text-success"></i>
                    <div class="mt-5 text-3xl">Confirmation</div>
                    <div class="mt-2 text-slate-500">
                        You are about to confirm that the student has picked up their good moral request. <br>
                        This process cannot be undone.
                    </div>
                </div>
                <form action="{{ route('admin.good-moral.picked_up', $good_moral_ready_to_pickup) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="px-5 pb-8 text-center">
                        <button data-tw-merge="" data-tw-dismiss="modal" type="button"
                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1 w-24">Cancel</button>
                        <button data-tw-merge="" type="submit"
                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-24">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END: Confirmation Modal -->
    @endforeach



    <!-- BEGIN: New Order Modal -->
    <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="new-order-modal"
        class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
        <div data-tw-merge=""
            class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
            <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="mr-auto text-base font-medium">Request Good Moral</h2>
            </div>
            <div data-tw-merge="" class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-12">
                    <label data-tw-merge="" for="pos-form-1"
                        class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                        Reason
                    </label>
                    <input data-tw-merge="" name="reason" id="pos-form-1" type="text" placeholder="Customer name"
                        class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 flex-1">
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-slate-200/60 dark:border-darkmode-400"><button
                    data-tw-merge="" data-tw-dismiss="modal" type="button"
                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1 w-32">Cancel</button>
                <button data-tw-merge="" type="button"
                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-32">Create
                    Ticket</button>
            </div>
        </div>
    </div>
    <!-- END: New Order Modal -->
@endsection

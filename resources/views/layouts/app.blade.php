<!DOCTYPE html><!--
    Template Name: Midone - Admin Dashboard Template
    Author: Left4code
    Website: http://www.left4code.com/
    Contact: muhammadrizki@left4code.com
    Purchase: https://themeforest.net/user/left4code/portfolio
    Renew Support: https://themeforest.net/user/left4code/portfolio
    License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
    -->
<html xmlns="http://www.w3.org/1999/xhtml" class="opacity-0" lang="en"><!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="ceKdwoQjZ4VuoGqoSQaSREwB7MD9sjwFnfhlp7MH">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Dashboard - Midone - Tailwind Admin Dashboard Template</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tippy.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/litepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/themes/enigma/side-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/components/mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"> <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body>
    <div
        class="enigma py-5 px-5 md:py-0 sm:px-8 md:px-0 before:content-[''] before:bg-gradient-to-b before:from-theme-1 before:to-theme-2 dark:before:from-darkmode-800 dark:before:to-darkmode-800 md:before:bg-none md:bg-slate-200 md:dark:bg-darkmode-800 before:fixed before:inset-0 before:z-[-1]">
        @include('includes.mobile-menu')
        @include('includes.header')
        <div class="flex overflow-hidden">
            @include('includes.sidebar')
            <!-- BEGIN: Content -->
            <div
                class="max-w-full md:max-w-none rounded-[30px] md:rounded-none px-4 md:px-[22px] min-w-0 min-h-screen bg-slate-100 flex-1 md:pt-20 pb-10 mt-5 md:mt-1 relative dark:bg-darkmode-700 before:content-[''] before:w-full before:h-px before:block">
                {{-- <div class="grid grid-cols-12 gap-6"> --}}
                @include('sweetalert::alert')
                @yield('content')
                {{-- </div> --}}
            </div>
            <!-- END: Content -->
        </div>
    </div>
    <!-- BEGIN: Vendor JS Assets-->
    <script src="{{ asset('dist/js/vendors/dom.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/tailwind-merge.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/lucide.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/tippy.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/dayjs.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/litepicker.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/popper.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/dropdown.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/tiny-slider.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/transition.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/chartjs.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/leaflet-map.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/axios.js') }}"></script>
    <script src="{{ asset('dist/js/utils/colors.js') }}"></script>
    <script src="{{ asset('dist/js/utils/helper.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/simplebar.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/modal.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/theme-color.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/lucide.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/tippy.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/litepicker.js') }}"></script>
    <script src="{{ asset('dist/js/components/report-line-chart.js') }}"></script>
    <script src="{{ asset('dist/js/components/report-pie-chart.js') }}"></script>
    <script src="{{ asset('dist/js/components/report-donut-chart.js') }}"></script>
    <script src="{{ asset('dist/js/components/report-donut-chart-1.js') }}"></script>
    <script src="{{ asset('dist/js/components/simple-line-chart-1.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/tiny-slider.js') }}"></script>
    <script src="{{ asset('dist/js/themes/enigma.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/leaflet-map-loader.js') }}"></script>
    <script src="{{ asset('dist/js/components/mobile-menu.js') }}"></script>
    <script src="{{ asset('dist/js/components/themes/enigma/top-bar.js') }}"></script> <!-- END: Vendor JS Assets-->
    <!-- BEGIN: Pages, layouts, components JS Assets-->
    <!-- END: Pages, layouts, components JS Assets-->
</body>

</html>

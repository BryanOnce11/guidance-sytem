<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guidance Office Portal - Login</title>
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @vite('resources/css/app.css') <!-- Ensure Vite is managing your CSS -->
    <style>
        /* Custom styles to create the circular left-side design */
        .curved-bg {
            clip-path: ellipse(90% 100% at 10% 50%);
            background-color: #D87A0D;
            height: 100vh;
        }
    </style>
</head>

<body class="bg-gray-100">
    @include('sweetalert::alert')
    <div class="flex flex-col w-full min-h-screen md:flex-row">
        <!-- Left Side with Curved Background -->
        <div
            class="w-full md:w-[40rem] curved-bg flex flex-col justify-center items-center text-white bg-[#D87A0D] relative px-4 py-8 md:py-0">
            <!-- Logo Header -->
            <div class="flex items-center mb-8 space-x-2 md:absolute md:top-8 md:left-8 md:mb-0">
                <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="w-8 h-8">
                <span class="font-bold">PSU - Brookes Point</span>
            </div>

            <!-- Center Logo -->
            <div class="flex justify-center">
                <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="w-32 mb-4 opacity-75 md:w-48">
            </div>

            <!-- Text Content -->
            <div class="px-4 mt-6 text-center">
                <h1 class="text-2xl font-bold md:text-3xl">PSU BROOKES POINT CAMPUS</h1>
                <p class="mt-2 text-base md:text-lg">Student Information Management and Virtual Counseling</p>
            </div>
        </div>

        <!-- Right Side - Registration Form (Full Width and Height) -->
        <div class="w-full md:w-[60%] px-4 md:px-12 py-8 md:py-0 flex items-center justify-center bg-center bg-no-repeat bg-cover"
            style="background-image: url('{{ asset('image/bgbrookes2.jpg') }}');">
            <div class="w-full max-w-md overflow-hidden rounded-lg shadow-md bg-gray-50">
                <div class="py-4 text-lg font-semibold text-center bg-gray-100 rounded-t-lg">
                    {{ __('Verify Your Email Address') }}
                </div>

                <div class="p-8">
                    @if (session('resent'))
                        <div class="mb-4 text-lg text-center text-green-600">
                            A new verification link has been sent to your email address.
                        </div>
                    @endif

                    <p class="mb-4 text-lg text-center text-gray-600">
                        Before proceeding, please check your email for a verification link.
                    </p>

                    <p class="text-lg text-center text-gray-600">
                        If you did not receive the email,
                    <form class="inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="text-orange-500 hover:underline">click here to request
                            another</button>.
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>


</html>

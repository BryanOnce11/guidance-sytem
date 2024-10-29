<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
    @vite('resources/css/app.css') <!-- Ensure Vite is managing your CSS -->
    <style>
        /* Custom styles to create the circular left-side design */
        .curved-bg {
            clip-path: ellipse(90% 100% at 10% 50%);
            background-color: #D87A0D;
            /* Matches the orange background */
            height: 100vh;
            /* Ensures full height */
        }
    </style>
</head>

<body class="bg-gray-100">
    @include('sweetalert::alert')
    <div class="flex w-full h-screen"> <!-- Full width and height of screen -->
        <!-- Left Side with Curved Background (Full Width and Height) -->
        <div class="w-[40rem] curved-bg flex flex-col justify-center items-center text-white">
            <div class="absolute flex items-center space-x-2 top-8 left-8">
                <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="w-8 h-8">
                <span class="font-bold">PSU - Brookes Point</span>
            </div>

            <div class="flex justify-center">
                <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="w-48 mb-4 opacity-75">
            </div>

            <div class="mt-6 text-center">
                <h1 class="text-3xl font-bold">PSU BROOKES POINT CAMPUS</h1>
                <p class="mt-2 text-lg">Student Information Management and Virtual Counseling</p>
            </div>
        </div>

        <!-- Right Side - Registration Form (Full Width and Height) -->
        <div class="w-[60rem] bg-white p-12 flex flex-col justify-center items-center h-screen">
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

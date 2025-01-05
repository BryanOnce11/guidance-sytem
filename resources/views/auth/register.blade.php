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

        @media (min-width: 768px) {
            .curved-bg {
                clip-path: ellipse(90% 100% at 10% 50%);
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    @include('sweetalert::alert')

    <!-- Main Container -->
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

        <!-- Right Side - Registration Form -->
        <div class="w-full md:w-[60%] px-4 md:px-12 py-8 md:py-0 flex items-center justify-center bg-center bg-no-repeat bg-cover"
            style="background-image: url('{{ asset('image/bgbrookes2.jpg') }}');">
            <div class="w-full max-w-md p-8 rounded-lg bg-white/90">
                <h2 class="mb-8 text-3xl font-bold text-center text-gray-800 md:text-4xl">Register</h2>
                <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Email">
                            @error('email')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-gray-700">Password</label>
                            <input type="password" name="password" id="password"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Password">
                            @error('password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-gray-700">Password Confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Password Confirmation">
                            @error('password_confirmation')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-center mt-8 space-x-4">
                        <button type="submit"
                            class="px-6 py-3 text-white transition duration-200 bg-orange-500 rounded-lg hover:bg-orange-600">REGISTER</button>
                        <a href="{{ route('login') }}"
                            class="px-6 py-3 text-gray-700 transition duration-200 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">LOGIN</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

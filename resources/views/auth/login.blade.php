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
            <div class="absolute top-8 left-8 flex items-center space-x-2">
                <!-- Replace with your logo -->
                <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="w-8 h-8">
                <span class="font-bold">PSU - Brookes Point</span>
            </div>

            <div class="flex justify-center">
                <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="w-48 mb-4  opacity-75">
            </div>

            <div class="text-center mt-6">
                <h1 class="text-3xl font-bold">PSU BROOKES POINT CAMPUS</h1>
                <p class="mt-2 text-lg">Student Information Management and Virtual Counseling</p>
            </div>
        </div>

        <!-- Right Side - Registration Form (Full Width and Height) -->
        <div class="w-[60rem] bg-white p-12 flex flex-col justify-center items-center h-screen">
            <div class="w-full max-w-md">
                <h2 class="text-4xl font-bold text-gray-800 mb-8 text-center">Login</h2>
                <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Email">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-gray-700">Password</label>
                            <input type="password" name="password" id="password" value="{{ old('password') }}"
                                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                                placeholder="Password">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-center space-x-4 mt-8">
                        <button type="submit"
                            class="bg-orange-500 text-white py-3 px-6 rounded-lg hover:bg-orange-600 transition duration-200">LOGIN</button>
                        <a href="{{ route('register') }}"
                            class="bg-white border border-gray-300 text-gray-700 py-3 px-6 rounded-lg hover:bg-gray-100 transition duration-200">REGISTER</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

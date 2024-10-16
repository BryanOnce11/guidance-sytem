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
            background-color: #D87A0D; /* Matches the orange background */
            height: 100vh; /* Ensures full height */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex w-full h-screen"> <!-- Full width and height of screen -->
        <!-- Left Side with Curved Background (Full Width and Height) -->
        <div class="w-[40rem] curved-bg flex flex-col justify-center items-center text-white">
            <div class="absolute top-8 left-8 flex items-center space-x-2">
                <!-- Replace with your logo -->
                <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="w-8 h-8">
                <span class="font-bold">PSU - Brookes Point</span>
            </div>

            <div class="flex justify-center">
                <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="w-48 mb-4 opacity-75">
            </div>

            <div class="text-center mt-6">
                <h1 class="text-3xl font-bold">PSU BROOKES POINT CAMPUS</h1>
                <p class="mt-2 text-lg">Student Information Management and Virtual Counseling</p>
            </div>
        </div>

        <!-- Right Side - Registration Form (Full Width and Height) -->
        <div class="w-[60rem] bg-white p-12 flex flex-col justify-center items-center h-screen">
            <div class="w-full max-w-md">
                <h2 class="text-4xl font-bold text-gray-800 mb-8 text-center">Create User</h2>
                <form action="#" class="space-y-6">
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="fullname" class="block text-gray-700">LastName</label>
                            <input type="text" id="fullname" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="LastName">
                        </div>
                        <div class="w-1/2">
                            <label for="email" class="block text-gray-700">FirstName</label>
                            <input type="text" id="email" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="FirstName">
                        </div>
                        <div class="w-1/2">
                            <label for="email" class="block text-gray-700">MiddleName</label>
                            <input type="text" id="email" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="MiddleName">
                        </div>
                    </div>
                    <div class="space-y-4">

                        <div class="">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Email">
                        </div>
                        <div>
                            <label for="password" class="block text-gray-700">Password</label>
                            <input type="password" id="password" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Password">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-gray-700">Password Confirmation</label>
                            <input type="password" id="password_confirmation" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Password Confirmation">
                        </div>
                    </div>

                    <div class="flex justify-center space-x-4 mt-8">
                        <button class="bg-orange-500 text-white py-3 px-6 rounded-lg hover:bg-orange-600 transition duration-200">REGISTER</button>
                        <button class="bg-white border border-gray-300 text-gray-700 py-3 px-6 rounded-lg hover:bg-gray-100 transition duration-200">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

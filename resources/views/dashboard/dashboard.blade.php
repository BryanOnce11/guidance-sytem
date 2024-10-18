<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Layout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="h-screen bg-gray-100">

    <!-- Navbar -->
    <header class="flex justify-between p-4 text-white bg-orange-500">
        <div class="container flex mx-auto ">
            <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="w-[3rem] mb-4 opacity-75">
            <h1 class="ml-[1rem] mt-[7px] text-2xl font-bold">Dashboard</h1>
        </div>

        <div class="flex items-center w-full max-w-md p-4 bg-orange-600 rounded-lg shadow-lg">
            <div class="flex-grow font-bold text-white">
              luxustabang
            </div>
            <div class="w-10 h-10 ml-4 overflow-hidden rounded-full">
              <img src="{{ asset('psu.png') }}" alt="Profile Image" class="object-cover w-full h-full">
            </div>
          </div>


    </header>

    <!-- Main container -->
    <div class="flex h-full">

        <!-- Sidebar -->
        <aside class="w-64 p-6 text-gray-800 bg-gray-300">
            <nav>
                <ul class="space-y-2">
                    <!-- Parent Menu -->
                    <li class="relative w-[14rem]">
                        <a href="#" id="dropdownToggle" class="flex items-center px-4 py-2 text-orange-600 rounded hover:bg-gray-200">
                            <!-- Icon for Student List (group icon) -->
                            <i class="fas fa-users w-5 h-5 mr-2"></i>
                            <span class="font-medium">Student List</span>
                            <i class="fas fa-chevron-down w-4 h-4 ml-auto"></i>
                        </a>
                        <!-- Dropdown Menu (Initially hidden) -->
                        <ul id="dropdownMenu" class="hidden pl-8 mt-2 space-y-2">
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 rounded hover:bg-gray-200">
                                    <!-- Icon for List of Students (person with checkmark) -->
                                    <i class="fas fa-user-check w-5 h-5 mr-2"></i>
                                    <span>List of Students</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 rounded hover:bg-gray-200">
                                    <!-- Icon for Student Request (person with an 'X') -->
                                    <i class="fas fa-user-times w-5 h-5 mr-2"></i>
                                    <span>Student Request</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="relative w-[14rem]">
                        <a href="#" id="dropdownToggle2" class="flex items-center px-4 py-2 text-gray-700 rounded hover:bg-gray-200">
                            <!-- Icon for Goodmoral Request (document icon) -->
                            <i class="w-5 h-5 mr-2 fas fa-file-alt"></i>
                            <span>Goodmoral Request</span>
                            <i class="w-4 h-4 ml-auto fas fa-chevron-down"></i>
                        </a>
                        <!-- Dropdown Menu (Initially hidden) -->
                        <ul id="dropdownMenu2" class="hidden pl-8 mt-2 space-y-2">
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 rounded hover:bg-gray-200">
                                    <!-- Icon for Student Request (user icon) -->
                                    <i class="w-5 h-5 mr-2 fas fa-user"></i>
                                    <span>Student Request</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 rounded hover:bg-gray-200">
                                    <!-- Icon for Scheduling (calendar icon) -->
                                    <i class="w-5 h-5 mr-2 fas fa-calendar-alt"></i>
                                    <span>Scheduling</span>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="relative w-[14rem]">
                        <a href="#" id="dropdownToggle3" class="flex items-center px-4 py-2 text-gray-700 rounded hover:bg-gray-200">
                            <!-- Icon for Virtual Counseling (video icon) -->
                            <i class="w-5 h-5 mr-2 fas fa-video"></i>
                            <span>Virtual Counseling</span>
                            <i class="w-4 h-4 ml-auto fas fa-chevron-down"></i>
                        </a>
                        <!-- Dropdown Menu (Initially hidden) -->
                        <ul id="dropdownMenu3" class="hidden pl-8 mt-2 space-y-2">
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 rounded hover:bg-gray-200">
                                    <!-- Icon for Student Request (user icon) -->
                                    <i class="w-5 h-5 mr-2 fas fa-user-plus"></i>
                                    <span>Student Request</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 rounded hover:bg-gray-200">
                                    <!-- Icon for Scheduling (calendar icon) -->
                                    <i class="w-5 h-5 mr-2 fas fa-calendar-check"></i>
                                    <span>Scheduling</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 rounded hover:bg-gray-200">
                                    <!-- Icon for Record History (file icon) -->
                                    <i class="w-5 h-5 mr-2 fas fa-file-alt"></i>
                                    <span>Record History</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="relative w-[14rem]">
                        <a href="#" id="dropdownToggle4" class="flex items-center px-4 py-2 text-gray-700 rounded hover:bg-gray-200">
                            <!-- Icon for Settings (cog icon) -->
                            <i class="w-5 h-5 mr-2 fas fa-cog"></i>
                            <span>Settings</span>
                            <i class="w-4 h-4 ml-auto fas fa-chevron-down"></i>
                        </a>
                        <!-- Dropdown Menu -->
                        <ul id="dropdownMenu4" class="hidden pl-8 mt-2 space-y-2">
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 rounded hover:bg-gray-200">
                                    <!-- Icon for Manage Users (shield icon) -->
                                    <i class="w-5 h-5 mr-2 fas fa-shield-alt"></i>
                                    <span>Manage Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 rounded hover:bg-gray-200">
                                    <!-- Icon for History (file icon) -->
                                    <i class="w-5 h-5 mr-2 fas fa-file-alt"></i>
                                    <span>History</span>
                                </a>
                            </li>
                        </ul>
                    </li>




                </ul>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">
            <h2 class="mb-4 text-2xl font-bold">Content Area</h2>
            <p class="text-gray-700">This is where your main content will go. You can add any content you like here, such as tables, forms, or additional information.</p>
        </main>

    </div>

</body>
</html>

<script>
    document.getElementById('dropdownToggle').addEventListener('click', function (e) {
        e.preventDefault();
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('hidden');
    });

    document.getElementById('dropdownToggle2').addEventListener('click', function (e) {
        e.preventDefault();
        const dropdownMenu = document.getElementById('dropdownMenu2');
        dropdownMenu.classList.toggle('hidden');
    });

    document.getElementById('dropdownToggle3').addEventListener('click', function (e) {
        e.preventDefault();
        const dropdownMenu = document.getElementById('dropdownMenu3');
        dropdownMenu.classList.toggle('hidden');
    });

    document.getElementById('dropdownToggle4').addEventListener('click', function (e) {
        e.preventDefault();
        const dropdownMenu = document.getElementById('dropdownMenu4');
        dropdownMenu.classList.toggle('hidden');
    });
</script>

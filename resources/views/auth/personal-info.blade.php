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
                <!-- Replace with your logo -->
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
            <div class="w-full max-w-4xl p-8 mx-auto">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="px-8 py-4">
                        <h2 class="text-3xl font-bold text-center">Register</h2>
                    </div>
                    <div class="px-8 py-4">
                        <div class="flex justify-center mb-8" id="step-indicator">
                            <div class="flex items-center">
                                <div id="step1"
                                    class="flex items-center justify-center w-8 h-8 text-white bg-orange-500 rounded-full">
                                    1</div>
                                <div class="w-16 h-1 bg-gray-200"></div>
                            </div>
                            <div class="flex items-center">
                                <div id="step2"
                                    class="flex items-center justify-center w-8 h-8 text-white bg-gray-200 rounded-full">
                                    2</div>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('student.personal-info.post') }}" id="registration-form"
                            class="space-y-6">
                            @csrf
                            <div id="" class="step">
                                <h3 class="mb-4 text-lg font-semibold">Personal Information</h3>
                                <div class="mb-4">
                                    <label class="block text-gray-700">Student ID</label>
                                    <input type="text" name="student_id" value="{{ old('student_id') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('student_id')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block text-gray-700">Course</label>
                                        <select name="course_id"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                            <option value="" hidden>Select Course</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                                    {{ $course->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Year Level</label>
                                        <select name="year_lvl"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                            <option value="" hidden>Select Year Level</option>
                                            <option value="1st Year"
                                                {{ old('year_lvl') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                                            <option value="2nd Year"
                                                {{ old('year_lvl') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                            <option value="3rd Year"
                                                {{ old('year_lvl') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                            <option value="4th Year"
                                                {{ old('year_lvl') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                                        </select>
                                        @error('year_lvl')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-4 mb-4">
                                    <div>
                                        <label class="block text-gray-700">First Name</label>
                                        <input type="text" name="fname" value="{{ old('fname') }}"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        @error('fname')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Last Name</label>
                                        <input type="text" name="lname" value="{{ old('lname') }}"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        @error('lname')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Middle Name</label>
                                        <input type="text" name="m_i" value="{{ old('m_i') }}"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        @error('m_i')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-4 mb-4">
                                    <div>
                                        <label class="block text-gray-700">Birth Date</label>
                                        <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        @error('birth_date')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Birth Place</label>
                                        <input type="text" name="birth_place" value="{{ old('birth_place') }}"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        @error('birth_place')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Contact Number</label>
                                        <input type="tel" name="contact_num" value="{{ old('contact_num') }}"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        @error('contact_num')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="" class="hidden step">
                                <h3 class="mb-4 text-lg font-semibold">Personal Information</h3>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Gender</label>
                                        <select name="gender"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                            <option value="" hidden>Select Gender</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Civil Status</label>
                                        <select name="civil_status"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                            <option value="" hidden>Select Status</option>
                                            <option value="Single"
                                                {{ old('civil_status') == 'Single' ? 'selected' : '' }}>Single</option>
                                            <option value="Married"
                                                {{ old('civil_status') == 'Married' ? 'selected' : '' }}>Married
                                            </option>
                                            <option value="Widowed"
                                                {{ old('civil_status') == 'Widowed' ? 'selected' : '' }}>Widowed
                                            </option>
                                        </select>
                                        @error('civil_status')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Citizenship</label>
                                        <input type="text" name="citizenship" value="{{ old('citizenship') }}"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        @error('citizenship')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <h4 class="font-medium">Emergency Contact</h4>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Full Name</label>
                                        <input type="text" name="e_fullname" value="{{ old('e_fullname') }}"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        @error('e_fullname')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Contact Number</label>
                                        <input type="tel" name="e_contact_num"
                                            value="{{ old('e_contact_num') }}"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        @error('e_contact_num')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Occupation</label>
                                        <input type="text" name="e_occupation" value="{{ old('e_occupation') }}"
                                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        @error('e_occupation')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button type="button" id="prev-btn"
                                    class="hidden px-6 py-3 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">Previous</button>
                                <button type="button" id="next-btn"
                                    class="px-6 py-3 text-white bg-orange-500 rounded-lg hover:bg-orange-600">Next</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    const steps = document.querySelectorAll('.step');
    const nextBtn = document.getElementById('next-btn');
    const prevBtn = document.getElementById('prev-btn');
    const step1 = document.getElementById('step1')
    const step2 = document.getElementById('step2');

    let currentStep = 0;

    function updateStepDisplay() {
        steps.forEach((step, index) => {
            step.classList.toggle('hidden', index !== currentStep);
        });

        if (currentStep === steps.length - 1) {
            step2.classList.remove('bg-gray-200')
            step2.classList.add('bg-orange-500')
            step1.classList.remove('bg-orange-500')
            step1.classList.add('bg-gray-200')
        } else {
            step2.classList.add('bg-gray-200')
            step2.classList.remove('bg-orange-500')
            step1.classList.add('bg-orange-500')
            step1.classList.remove('bg-gray-200')
        }

        prevBtn.classList.toggle('hidden', currentStep === 0);
        nextBtn.textContent = currentStep === steps.length - 1 ? 'Submit' : 'Next';
    }

    nextBtn.addEventListener('click', () => {
        if (currentStep < steps.length - 1) {
            currentStep++;
        } else {
            document.getElementById('registration-form').submit();
        }
        updateStepDisplay();
    });

    prevBtn.addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
        }
        updateStepDisplay();
    });

    updateStepDisplay();
</script>

</html>

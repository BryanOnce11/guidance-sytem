<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guidance Office Portal - Login</title>
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
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
        <div class="w-full max-w-4xl p-8 mx-auto">
            <div class="bg-white rounded-lg shadow-md">
                <div class="px-8 py-4">
                    <h2 class="text-3xl font-bold text-center">Register</h2>
                </div>
                <div class="px-8 py-4">
                    <div class="flex justify-center mb-8" id="step-indicator">
                        <div class="flex items-center">
                            <div id="step1"
                                class="flex items-center justify-center w-8 h-8 text-white bg-orange-500 rounded-full">1
                            </div>
                            <div class="w-16 h-1 bg-gray-200"></div>
                        </div>
                        <div class="flex items-center">
                            <div id="step2"
                                class="flex items-center justify-center w-8 h-8 text-white bg-gray-200 rounded-full">2
                            </div>
                            <div class="w-16 h-1 bg-gray-200"></div>
                        </div>
                        <div class="flex items-center">
                            <div id="step3"
                                class="flex items-center justify-center w-8 h-8 text-white bg-gray-200 rounded-full">3
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('student.family-background.post') }}" id="registration-form"
                        class="space-y-6">
                        @csrf
                        <div id="" class="step">
                            <div class="space-y-4">
                                <h3 class="mb-4 text-lg font-semibold">Family Background</h3>
                                <h4 class="font-medium">Father's Information</h4>
                                <div>
                                    <label class="block text-gray-700">First Name</label>
                                    <input type="text" name="f_fname" value="{{ old('f_fname') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('f_fname')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700">Last Name</label>
                                    <input type="text" name="f_lname" value="{{ old('f_lname') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('f_lname')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700">Middle Name</label>
                                    <input type="text" name="f_m_i" value="{{ old('f_m_i') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('f_m_i')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700">Occupation</label>
                                    <input type="text" name="f_occupation" value="{{ old('f_occupation') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('f_occupation')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div id="" class="hidden step">
                            <h3 class="mb-4 text-lg font-semibold">Family Background</h3>
                            <div class="space-y-4">
                                <h4 class="font-medium">Mother's Information</h4>
                                <div>
                                    <label class="block text-gray-700">First Name</label>
                                    <input type="text" name="m_fname" value="{{ old('m_fname') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('m_fname')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700">Last Name</label>
                                    <input type="text" name="m_lname" value="{{ old('m_lname') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('m_lname')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700">Middle Name</label>
                                    <input type="text" name="m_m_i" value="{{ old('m_m_i') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('m_m_i')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700">Occupation</label>
                                    <input type="text" name="m_occupation" value="{{ old('m_occupation') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('m_occupation')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div id="" class="hidden step">
                            <h3 class="mb-4 text-lg font-semibold">Family Background</h3>
                            <div class="space-y-4">
                                <h4 class="font-medium">Spouse's Information</h4>
                                <div>
                                    <label class="block text-gray-700">First Name</label>
                                    <input type="text" name="s_fname" value="{{ old('s_fname') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('s_fname')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700">Last Name</label>
                                    <input type="text" name="s_lname" value="{{ old('s_lname') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('s_lname')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700">Middle Name</label>
                                    <input type="text" name="s_m_i" value="{{ old('s_m_i') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('s_m_i')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700">Occupation</label>
                                    <input type="text" name="s_occupation" value="{{ old('s_occupation') }}"
                                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                    @error('s_occupation')
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

        <script>
            const steps = document.querySelectorAll('.step');
            const nextBtn = document.getElementById('next-btn');
            const prevBtn = document.getElementById('prev-btn');
            const step1 = document.getElementById('step1')
            const step2 = document.getElementById('step2')
            const step3 = document.getElementById('step3')
            let currentStep = 0;

            function updateStepDisplay() {
                steps.forEach((step, index) => {
                    step.classList.toggle('hidden', index !== currentStep);
                });

                console.log('test123', currentStep);

                if (currentStep == 1) {
                    step2.classList.remove('bg-gray-200')
                    step2.classList.add('bg-orange-500')
                    step1.classList.remove('bg-orange-500')
                    step1.classList.add('bg-gray-200')
                    step3.classList.remove('bg-orange-500')
                    step3.classList.add('bg-gray-200')
                } else if (currentStep == 2) {
                    step3.classList.remove('bg-gray-200')
                    step3.classList.add('bg-orange-500')
                    step2.classList.remove('bg-orange-500')
                    step2.classList.add('bg-gray-200')
                } else {
                    step1.classList.remove('bg-gray-200')
                    step1.classList.add('bg-orange-500')
                    step2.classList.remove('bg-orange-500')
                    step2.classList.add('bg-gray-200')
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

    </div>

</body>

</html>

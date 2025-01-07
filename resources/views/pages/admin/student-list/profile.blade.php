@extends('layouts.app')
@section('content')
    <div class="mt-5 intro-y box">
        @if ($errors->any())
            <div class="p-4 mb-4 text-black bg-red-500 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                Personal Information
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-wrap gap-x-5">
                <div class="mb-6 ">
                    <label for="image-upload" class="inline-block mb-2">Student Image</label>

                    <!-- Image Preview Section -->
                    <div id="image-preview-container" class="mt-2">
                        <!-- Display the current image if it exists -->
                        @if ($user->student->image)
                            <img id="image-preview" src="{{ asset('storage/' . $user->student->image) }}"
                                alt="Image Preview"
                                class="block w-20 h-20 overflow-hidden scale-110 rounded-full shadow-lg cursor-pointer image-fit zoom-in intro-x">
                        @else
                            <img id="image-preview" src="" alt="Image Preview"
                                class="hidden w-20 h-20 overflow-hidden scale-110 rounded-full shadow-lg cursor-pointer image-fit zoom-in intro-x">
                        @endif
                    </div>

                    <!-- Image Upload Input -->
                    {{-- <input type="file" name="image" id="image-upload"
                        class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                        accept="image/*" onchange="previewImage(event)"> --}}

                    <!-- Optionally Display a message about updating the image -->
                    @if (isset($imagePath) && $imagePath)
                        <div class="mt-2 text-sm text-gray-600">You can update your image by selecting a new one.
                        </div>
                    @endif

                    <!-- Error message for image upload -->
                    @error('image')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <script>
                    function previewImage(event) {
                        const input = event.target;
                        const previewContainer = document.getElementById('image-preview-container');
                        const previewImage = document.getElementById('image-preview');

                        if (input.files && input.files[0]) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                previewImage.src = e.target.result;
                                previewImage.classList.remove('hidden'); // Make the preview visible
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
                <div class="flex flex-row w-full gap-3">
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Student Status</label>
                        <select name="status" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option value="Old" {{ old('status', $user->student->status) == 'Old' ? 'selected' : '' }}>
                                Old</option>
                            <option value="New" {{ old('status', $user->student->status) == 'New' ? 'selected' : '' }}>
                                New</option>
                        </select>
                        @error('status')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row w-full gap-3">
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Student ID</label>
                        <input name="student_id" id="update-profile-form-6" type="text"
                            value="{{ old('student_id', $user->student->student_id) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('student_id')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Course</label>
                        <select name="course_id" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ old('course_id', $user->student->course->id) == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Year Level</label>
                        <select name="year_lvl" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option value="1st Year"
                                {{ old('year_lvl', $user->student->year_lvl) == '1st Year' ? 'selected' : '' }}>1st
                                Year
                            </option>
                            <option value="2nd Year"
                                {{ old('year_lvl', $user->student->year_lvl) == '2nd Year' ? 'selected' : '' }}>2nd
                                Year
                            </option>
                            <option value="3rd Year"
                                {{ old('year_lvl', $user->student->year_lvl) == '3rd Year' ? 'selected' : '' }}>3rd
                                Year</option>
                            <option value="4th Year"
                                {{ old('year_lvl', $user->student->year_lvl) == '4th Year' ? 'selected' : '' }}>4th
                                Year</option>
                        </select>
                        @error('year_lvl')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Last Name</label>
                        <input name="lname" id="update-profile-form-6" type="text"
                            value="{{ old('lname', ucwords($user->student->lname)) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('lname')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">First Name</label>
                        <input name="fname" id="update-profile-form-6" type="text"
                            value="{{ old('fname', ucwords($user->student->fname)) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('fname')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Middle Name</label>
                        <input name="m_i" id="update-profile-form-6" type="text"
                            value="{{ old('m_i', ucwords($user->student->m_i)) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_i')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Gender</label>
                        <select name="gender" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option {{ $user->student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option {{ $user->student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Civil Status</label>
                        <select name="civil_status" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option value="Single"
                                {{ old('civil_status', $user->student->civil_status) == 'Single' ? 'selected' : '' }}>
                                Single</option>
                            <option value="Married"
                                {{ old('civil_status', $user->student->civil_status) == 'Married' ? 'selected' : '' }}>
                                Married</option>
                            <option value="Widowed"
                                {{ old('civil_status', $user->student->civil_status) == 'Widowed' ? 'selected' : '' }}>
                                Widowed</option>
                        </select>
                        @error('civil_status')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Age</label>
                        <input name="age" id="update-profile-form-6" type="text"
                            value="{{ old('age', $user->student->age) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('age')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Date Of Birth</label>
                        <input name="birth_date" id="update-profile-form-6" type="date"
                            value="{{ old('birth_date', $user->student->birth_date) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('birth_date')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Place Of Birth</label>
                        <input name="birth_place" id="update-profile-form-6" type="text"
                            value="{{ old('birth_place', ucwords($user->student->birth_place)) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('birth_place')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Citizenship</label>
                        <input name="citizenship" id="update-profile-form-6" type="text"
                            value="{{ old('citizenship', ucwords($user->student->citizenship)) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('citizenship')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Email</label>
                        <input name="email" id="update-profile-form-6" type="text"
                            value="{{ old('email', $user->email) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('email')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Contact Number</label>
                        <input name="contact_num" id="update-profile-form-6" type="text"
                            value="{{ old('contact_num', $user->student->contact_num) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('contact_num')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Height</label>
                        <input name="height" id="update-profile-form-6" type="text"
                            value="{{ old('height', $user->student->height) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('height')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Weight</label>
                        <input name="weight" id="update-profile-form-6" type="text"
                            value="{{ old('weight', $user->student->weight) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('weight')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-6" class="inline-block mb-2">Blood Type</label>
                        <input name="blood_type" id="update-profile-form-6" type="text"
                            value="{{ old('blood_type', $user->student->blood_type) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('blood_type')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <h2 class="mr-auto text-base font-medium">
                    While Studying At Palawan State University, You Are Staying?
                </h2>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Please Select One</label>
                        <select name="where_staying" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option value="With Parents"
                                {{ old('where_staying', $user->student->where_staying) == 'With Parents' ? 'selected' : '' }}>
                                With Parents</option>
                            <option value="With Relatives"
                                {{ old('where_staying', $user->student->where_staying) == 'With Relatives' ? 'selected' : '' }}>
                                With Relatives</option>
                            <option value="In Boarding House"
                                {{ old('where_staying', $user->student->where_staying) == 'In Boarding House' ? 'selected' : '' }}>
                                In Boarding House</option>
                            <option value="With Employer"
                                {{ old('where_staying', $user->student->where_staying) == 'With Employer' ? 'selected' : '' }}>
                                With Employer</option>
                        </select>
                        @error('where_staying')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="mt-8 intro-y box">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                Family Background
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-wrap gap-x-5">
                <h2 class="mr-auto text-base font-medium">
                    Father Information
                </h2>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="f_fname" class="inline-block mb-2">
                            First Name
                        </label>
                        <input name="f_fname" id="f_fname" type="text"
                            value="{{ old('f_fname', ucwords($user->student->family_back->father->fname ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_fname')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="f_lname" class="inline-block mb-2">
                            Last Name
                        </label>
                        <input name="f_lname" id="f_lname" type="text"
                            value="{{ old('f_lname', ucwords($user->student->family_back->father->lname ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_lname')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="f_m_i" class="inline-block mb-2">
                            Middle Name
                        </label>
                        <input name="f_m_i" id="f_m_i" type="text"
                            value="{{ old('f_m_i', ucwords($user->student->family_back->father->m_i ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_m_i')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="f_birth_date" class="inline-block mb-2">
                            Date of Birth
                        </label>
                        <input name="f_birth_date" id="f_birth_date" type="date"
                            value="{{ old('f_birth_date', $user->student->family_back->father->birth_date ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_birth_date')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="f_educational_attainment" class="inline-block mb-2">
                            Educational Attainment
                        </label>
                        <input name="f_educational_attainment" id="f_educational_attainment" type="text"
                            value="{{ old('f_educational_attainment', ucwords($user->student->family_back->father->educational_attainment ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_educational_attainment')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="f_contact_num" class="inline-block mb-2">
                            Contact Number
                        </label>
                        <input name="f_contact_num" id="f_contact_num" type="text"
                            value="{{ old('f_contact_num', ucwords($user->student->family_back->father->contact_num ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_contact_num')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="f_email" class="inline-block mb-2">
                            Email
                        </label>
                        <input name="f_email" id="f_email" type="text"
                            value="{{ old('f_email', $user->student->family_back->father->email ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_email')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="f_occupation" class="inline-block mb-2">
                            Occupation
                        </label>
                        <input name="f_occupation" id="f_occupation" type="text"
                            value="{{ old('f_occupation', ucwords($user->student->family_back->father->occupation ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_occupation')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="f_company_name" class="inline-block mb-2">
                            Name of Company
                        </label>
                        <input name="f_company_name" id="f_company_name" type="text"
                            value="{{ old('f_company_name', ucwords($user->student->family_back->father->company_name ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_company_name')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="f_company_address" class="inline-block mb-2">
                            Company Address
                        </label>
                        <input name="f_company_address" id="f_company_address" type="text"
                            value="{{ old('f_company_address', ucwords($user->student->family_back->father->company_address ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_company_address')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="f_avg_monthly_income" class="inline-block mb-2">
                            Average Monthly Income
                        </label>
                        <input name="f_avg_monthly_income" id="f_avg_monthly_income" type="text"
                            value="{{ old('f_avg_monthly_income', ucwords($user->student->family_back->father->avg_monthly_income ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('f_avg_monthly_income')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h2 class="mt-5 mr-auto text-base font-medium">
                    Mother Information
                </h2>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="m_fname" class="inline-block mb-2">
                            First Name
                        </label>
                        <input name="m_fname" id="m_fname" type="text"
                            value="{{ old('m_fname', ucwords($user->student->family_back->mother->fname ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_fname')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="m_lname" class="inline-block mb-2">
                            Last Name
                        </label>
                        <input name="m_lname" id="m_lname" type="text"
                            value="{{ old('m_lname', ucwords($user->student->family_back->mother->lname ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_lname')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="m_m_i" class="inline-block mb-2">
                            Middle Name
                        </label>
                        <input name="m_m_i" id="m_m_i" type="text"
                            value="{{ old('m_m_i', ucwords($user->student->family_back->mother->m_i ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_m_i')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="m_birth_date" class="inline-block mb-2">
                            Date of Birth
                        </label>
                        <input name="m_birth_date" id="m_birth_date" type="date"
                            value="{{ old('m_birth_date', $user->student->family_back->mother->birth_date ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_birth_date')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="m_educational_attainment" class="inline-block mb-2">
                            Educational Attainment
                        </label>
                        <input name="m_educational_attainment" id="m_educational_attainment" type="text"
                            value="{{ old('m_educational_attainment', ucwords($user->student->family_back->mother->educational_attainment ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_educational_attainment')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="m_contact_num" class="inline-block mb-2">
                            Contact Number
                        </label>
                        <input name="m_contact_num" id="m_contact_num" type="text"
                            value="{{ old('m_contact_num', ucwords($user->student->family_back->mother->contact_num ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_contact_num')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="m_email" class="inline-block mb-2">
                            Email
                        </label>
                        <input name="m_email" id="m_email" type="text"
                            value="{{ old('m_email', $user->student->family_back->mother->email ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_email')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="m_occupation" class="inline-block mb-2">
                            Occupation
                        </label>
                        <input name="m_occupation" id="m_occupation" type="text"
                            value="{{ old('m_occupation', ucwords($user->student->family_back->mother->occupation ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_occupation')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="m_company_name" class="inline-block mb-2">
                            Name of Company
                        </label>
                        <input name="m_company_name" id="m_company_name" type="text"
                            value="{{ old('m_company_name', ucwords($user->student->family_back->mother->company_name ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_company_name')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="m_company_address" class="inline-block mb-2">
                            Company Address
                        </label>
                        <input name="m_company_address" id="m_company_address" type="text"
                            value="{{ old('m_company_address', ucwords($user->student->family_back->mother->company_address ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_company_address')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex-1">
                        <label for="m_avg_monthly_income" class="inline-block mb-2">
                            Average Monthly Income
                        </label>
                        <input name="m_avg_monthly_income" id="m_avg_monthly_income" type="text"
                            value="{{ old('m_avg_monthly_income', ucwords($user->student->family_back->mother->avg_monthly_income ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('m_avg_monthly_income')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="source_of_income" class="inline-block mb-2">
                            Other Source's Of Income (family/individual)
                        </label>
                        <input name="source_of_income" id="source_of_income" type="text"
                            value="{{ old('source_of_income', ucwords($user->student->family_back->source_of_income ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('source_of_income')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Parents Status</label>
                        <select name="parent_status" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option value="Living Together"
                                {{ old('parent_status', $user->student->family_back->parent_status ?? 'Living Together') == 'Living Together' ? 'selected' : '' }}>
                                Living Together
                            </option>
                            <option value="Widowed"
                                {{ old('parent_status', $user->student->family_back->parent_status ?? 'Widowed') == 'Widowed' ? 'selected' : '' }}>
                                Widowed
                            </option>
                            <option value="Separated"
                                {{ old('parent_status', $user->student->family_back->parent_status ?? 'Separated') == 'Separated' ? 'selected' : '' }}>
                                Separated
                            </option>
                        </select>
                        @error('parent_status')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="birth_rank" class="inline-block mb-2">
                            Birth Rank In The Family
                        </label>
                        <input name="birth_rank" id="birth_rank" type="text"
                            value="{{ old('birth_rank', $user->student->family_back->birth_rank ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('birth_rank')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="number_of_siblings" class="inline-block mb-2">
                            Number Of Siblings
                        </label>
                        <input name="number_of_siblings" id="number_of_siblings" type="text"
                            value="{{ old('number_of_siblings', $user->student->family_back->number_of_siblings ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('number_of_siblings')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="number_of_children" class="inline-block mb-2">
                            Number Of Children
                        </label>
                        <input name="number_of_children" id="number_of_children" type="text"
                            value="{{ old('number_of_children', $user->student->family_back->number_of_children ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('number_of_children')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h2 class="mt-5 mr-auto text-base font-medium">
                    Spouse Information
                </h2>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="s_fname" class="inline-block mb-2">
                            First Name
                        </label>
                        <input name="s_fname" id="s_fname" type="text"
                            value="{{ old('s_fname', ucwords($user->student->family_back->spouse->fname ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_fname')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="s_lname" class="inline-block mb-2">
                            Last Name
                        </label>
                        <input name="s_lname" id="s_lname" type="text"
                            value="{{ old('s_lname', ucwords($user->student->family_back->spouse->lname ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_lname')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="s_m_i" class="inline-block mb-2">
                            Middle Name
                        </label>
                        <input name="s_m_i" id="s_m_i" type="text"
                            value="{{ old('s_m_i', ucwords($user->student->family_back->spouse->m_i ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_m_i')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="s_birth_date" class="inline-block mb-2">
                            Date of Birth
                        </label>
                        <input name="s_birth_date" id="s_birth_date" type="date"
                            value="{{ old('s_birth_date', $user->student->family_back->spouse->birth_date ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_birth_date')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="s_educational_attainment" class="inline-block mb-2">
                            Educational Attainment
                        </label>
                        <input name="s_educational_attainment" id="s_educational_attainment" type="text"
                            value="{{ old('s_educational_attainment', ucwords($user->student->family_back->spouse->educational_attainment ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_educational_attainment')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="s_contact_num" class="inline-block mb-2">
                            Contact Number
                        </label>
                        <input name="s_contact_num" id="s_contact_num" type="text"
                            value="{{ old('s_contact_num', $user->student->family_back->spouse->contact_num ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_contact_num')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="s_email" class="inline-block mb-2">
                            Email
                        </label>
                        <input name="s_email" id="s_email" type="text"
                            value="{{ old('s_email', $user->student->family_back->spouse->email ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_email')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="s_occupation" class="inline-block mb-2">
                            Occupation
                        </label>
                        <input name="s_occupation" id="s_occupation" type="text"
                            value="{{ old('s_occupation', ucwords($user->student->family_back->spouse->occupation ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_occupation')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="s_company_name" class="inline-block mb-2">
                            Name of Company
                        </label>
                        <input name="s_company_name" id="s_company_name" type="text"
                            value="{{ old('s_company_name', ucwords($user->student->family_back->spouse->company_name ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_company_name')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="s_company_address" class="inline-block mb-2">
                            Company Address
                        </label>
                        <input name="s_company_address" id="s_company_address" type="text"
                            value="{{ old('s_company_address', ucwords($user->student->family_back->spouse->company_address ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_company_address')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="s_avg_monthly_income" class="inline-block mb-2">
                            Average Monthly Income
                        </label>
                        <input name="s_avg_monthly_income" id="s_avg_monthly_income" type="text"
                            value="{{ old('s_avg_monthly_income', $user->student->family_back->spouse->avg_monthly_income ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('s_avg_monthly_income')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h2 class="mt-5 mr-auto text-base font-medium">
                    Guardian Information
                </h2>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="g_full_name" class="inline-block mb-2">
                            Name
                        </label>
                        <input name="g_full_name" id="g_full_name" type="text"
                            value="{{ old('g_full_name', ucwords($user->student->family_back->guardian->full_name ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('g_full_name')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="g_contact_num" class="inline-block mb-2">
                            Contact Number
                        </label>
                        <input name="g_contact_num" id="g_contact_num" type="text"
                            value="{{ old('g_contact_num', $user->student->family_back->guardian->contact_num ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('g_contact_num')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="g_occupation" class="inline-block mb-2">
                            Occupation
                        </label>
                        <input name="g_occupation" id="g_occupation" type="text"
                            value="{{ old('g_occupation', ucwords($user->student->family_back->guardian->occupation ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('g_occupation')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="g_company_name" class="inline-block mb-2">
                            Company Name
                        </label>
                        <input name="g_company_name" id="g_company_name" type="text"
                            value="{{ old('g_company_name', ucwords($user->student->family_back->guardian->company_name ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('g_company_name')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="g_relationship" class="inline-block mb-2">
                            Relationship
                        </label>
                        <input name="g_relationship" id="g_relationship" type="text"
                            value="{{ old('g_relationship', ucwords($user->student->family_back->guardian->relationship ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('g_relationship')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="g_address" class="inline-block mb-2">
                            Address
                        </label>
                        <input name="g_address" id="g_address" type="text"
                            value="{{ old('g_address', ucwords($user->student->family_back->guardian->address ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('g_address')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h2 class="mt-5 mr-auto text-base font-medium">
                    Person To Notified In Case Of Emergency
                </h2>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="e_full_name" class="inline-block mb-2">
                            Name
                        </label>
                        <input name="e_full_name" id="e_full_name" type="text"
                            value="{{ old('e_full_name', ucwords($user->student->family_back->emergency_contact->full_name ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('e_full_name')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="e_contact_num" class="inline-block mb-2">
                            Contact Number
                        </label>
                        <input name="e_contact_num" id="e_contact_num" type="text"
                            value="{{ old('e_contact_num', $user->student->family_back->emergency_contact->contact_num ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('e_contact_num')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1">
                        <label for="e_relationship" class="inline-block mb-2">
                            Relationship
                        </label>
                        <input name="e_relationship" id="e_relationship" type="text"
                            value="{{ old('e_relationship', ucwords($user->student->family_back->emergency_contact->relationship ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('e_relationship')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="e_address" class="inline-block mb-2">
                            Address
                        </label>
                        <input name="e_address" id="e_address" type="text"
                            value="{{ old('e_address', ucwords($user->student->family_back->emergency_contact->address ?? '')) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('e_address')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="mt-8 intro-y box">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                Educational Data
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-wrap gap-x-5">
                <h2 class="mr-auto text-base font-medium">
                    Elementary
                </h2>
                <div class="flex flex-row w-full gap-3 mt-3">
                    <div class="flex-1">
                        <label for="elementary[school_attended]" class="inline-block mb-2">
                            School Attended
                        </label>
                        <input name="elementary[school_attended]" id="elementary[school_attended]" type="text"
                            value="{{ old('elementary.school_attended', $user->student->educational_data->elementary['school_attended'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('elementary.school_attended')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="elementary[school_year]" class="inline-block mb-2">
                            School Year
                        </label>
                        <input name="elementary[school_year]" id="elementary[school_year]" type="text"
                            value="{{ old('elementary.school_year', $user->student->educational_data->elementary['school_year'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('elementary.school_year')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="elementary[school_address]" class="inline-block mb-2">
                            School Address
                        </label>
                        <input name="elementary[school_address]" id="elementary[school_address]" type="text"
                            value="{{ old('elementary.school_address', $user->student->educational_data->elementary['school_address'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('elementary.school_address')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="elementary[honors_received]" class="inline-block mb-2">
                            Honor's Awards Received
                        </label>
                        <input name="elementary[honors_received]" id="elementary[honors_received]" type="text"
                            value="{{ old('elementary.honors_received', $user->student->educational_data->elementary['honors_received'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('elementary.honors_received')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <h2 class="mt-2 mr-auto text-base font-medium">
                    High School
                </h2>
                <div class="flex flex-row w-full gap-3 mt-3">
                    <div class="flex-1">
                        <label for="high_school[school_attended]" class="inline-block mb-2">
                            School Attended
                        </label>
                        <input name="high_school[school_attended]" id="high_school[school_attended]" type="text"
                            value="{{ old('high_school.school_attended', $user->student->educational_data->high_school['school_attended'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('high_school.school_attended')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="high_school[school_year]" class="inline-block mb-2">
                            School Year
                        </label>
                        <input name="high_school[school_year]" id="high_school[school_year]" type="text"
                            value="{{ old('high_school.school_year', $user->student->educational_data->high_school['school_year'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('high_school.school_year')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="high_school[school_address]" class="inline-block mb-2">
                            School Address
                        </label>
                        <input name="high_school[school_address]" id="high_school[school_address]" type="text"
                            value="{{ old('high_school.school_address', $user->student->educational_data->high_school['school_address'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('high_school.school_address')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="high_school[honors_received]" class="inline-block mb-2">
                            Honor's Awards Received
                        </label>
                        <input name="high_school[honors_received]" id="high_school[honors_received]" type="text"
                            value="{{ old('high_school.honors_received', $user->student->educational_data->high_school['honors_received'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('high_school.honors_received')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h2 class="mt-2 mr-auto text-base font-medium">
                    Vocational
                </h2>
                <div class="flex flex-row w-full gap-3 mt-3">
                    <div class="flex-1">
                        <label for="vocational[school_attended]" class="inline-block mb-2">
                            School Attended
                        </label>
                        <input name="vocational[school_attended]" id="vocational[school_attended]" type="text"
                            value="{{ old('vocational.school_attended', $user->student->educational_data->vocational['school_attended'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('vocational.school_attended')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="vocational[school_year]" class="inline-block mb-2">
                            School Year
                        </label>
                        <input name="vocational[school_year]" id="vocational[school_year]" type="text"
                            value="{{ old('vocational.school_year', $user->student->educational_data->vocational['school_year'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('vocational.school_year')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="vocational[school_address]" class="inline-block mb-2">
                            School Address
                        </label>
                        <input name="vocational[school_address]" id="vocational[school_address]" type="text"
                            value="{{ old('vocational.school_address', $user->student->educational_data->vocational['school_address'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('vocational.school_address')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="vocational[honors_received]" class="inline-block mb-2">
                            Honor's Awards Received
                        </label>
                        <input name="vocational[honors_received]" id="vocational[honors_received]" type="text"
                            value="{{ old('vocational.honors_received', $user->student->educational_data->vocational['honors_received'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('vocational.honors_received')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h2 class="mt-2 mr-auto text-base font-medium">
                    College
                </h2>
                <div class="flex flex-row w-full gap-3 mt-3">
                    <div class="flex-1">
                        <label for="college[school_attended]" class="inline-block mb-2">
                            School Attended
                        </label>
                        <input name="college[school_attended]" id="college[school_attended]" type="text"
                            value="{{ old('college.school_attended', $user->student->educational_data->college['school_attended'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('college.school_attended')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="college[school_year]" class="inline-block mb-2">
                            School Year
                        </label>
                        <input name="college[school_year]" id="college[school_year]" type="text"
                            value="{{ old('college.school_year', $user->student->educational_data->college['school_year'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('college.school_year')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="college[school_address]" class="inline-block mb-2">
                            School Address
                        </label>
                        <input name="college[school_address]" id="college[school_address]" type="text"
                            value="{{ old('college.school_address', $user->student->educational_data->college['school_address'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('college.school_address')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="college[honors_received]" class="inline-block mb-2">
                            Honor's Awards Received
                        </label>
                        <input name="college[honors_received]" id="college[honors_received]" type="text"
                            value="{{ old('college.honors_received', $user->student->educational_data->college['honors_received'] ?? '') }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                        @error('college.honors_received')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex-1 mt-2">
                    <label for="scholarship" class="inline-block mb-2">
                        Scholarship
                    </label>
                    <input name="scholarship" id="scholarship" type="text"
                        value="{{ old('scholarship', $user->student->educational_data->scholarship ?? '') }}"
                        placeholder="Input text"
                        class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    @error('scholarship')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 intro-y box">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                ACTIVITIES/HOBBIES & INTERESST
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-wrap gap-x-5">
                <h2 class="mr-auto text-base font-medium">
                    Extra-Curricular activities during elementary and high school (please check):
                </h2>
                <div class="flex flex-row w-full gap-4 mt-5 mb-4">
                    <div class="flex items-center">
                        <input name="extra_curricular[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-4" value="Sports"
                            {{ in_array('Sports', old('extra_curricular', $user->student->activity_interest->extra_curricular ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-4" class="ml-2 cursor-pointer">Sports</label>
                    </div>
                    <div class="flex items-center">
                        <input name="extra_curricular[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-5" value="Theatre/Dramatic Guild"
                            {{ in_array('Theatre/Dramatic Guild', old('extra_curricular', $user->student->activity_interest->extra_curricular ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-5" class="ml-2 cursor-pointer">Theatre/Dramatic
                            Guild</label>
                    </div>
                    <div class="flex items-center">
                        <input name="extra_curricular[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-6" value="Choir"
                            {{ in_array('Choir', old('extra_curricular', $user->student->activity_interest->extra_curricular ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-6" class="ml-2 cursor-pointer">Choir</label>
                    </div>
                    <div class="flex items-center">
                        <input name="extra_curricular[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-7" value="School Paper"
                            {{ in_array('School Paper', old('extra_curricular', $user->student->activity_interest->extra_curricular ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-7" class="ml-2 cursor-pointer">School Paper</label>
                    </div>
                    <div class="flex items-center">
                        <input name="extra_curricular[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-8" value="Literacy"
                            {{ in_array('Literacy', old('extra_curricular', $user->student->activity_interest->extra_curricular ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-8" class="ml-2 cursor-pointer">Literacy</label>
                    </div>
                    <div class="flex items-center">
                        <input name="extra_curricular[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-9" value="Dance Group"
                            {{ in_array('Dance Group', old('extra_curricular', $user->student->activity_interest->extra_curricular ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-9" class="ml-2 cursor-pointer">Dance Group</label>
                    </div>
                </div>

                <!-- Error Handling -->
                @error('extra_curricular')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror


                <label>Special Skills</label>
                <input name="special_skills" id="update-profile-form-6" type="text"
                    value="{{ old('special_skills', $user->student->activity_interest->special_skills ?? '') }}"
                    placeholder="Input text"
                    class="w-full mb-4 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                @error('special_skills')
                    <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                @enderror

                <label>Hobbies</label>
                <input name="hobbies" id="update-profile-form-6" type="text"
                    value="{{ old('hobbies', $user->student->activity_interest->hobbies ?? '') }}"
                    placeholder="Input text"
                    class="w-full mb-4 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                @error('hobbies')
                    <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                @enderror

                <label>Interest</label>
                <div class="flex flex-row w-full gap-4 mt-3">
                    <!-- Row 1: Dancing, Singing/Music, Acting -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-dancing" value="Dancing"
                            {{ in_array('Dancing', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-dancing" class="ml-2 cursor-pointer">Dancing</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-singing" value="Singing/Music"
                            {{ in_array('Singing/Music', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-singing"
                            class="ml-2 cursor-pointer">Singing/Music</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-acting" value="Acting"
                            {{ in_array('Acting', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-acting" class="ml-2 cursor-pointer">Acting</label>
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-politics" value="Politics"
                            {{ in_array('Politics', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-politics" class="ml-2 cursor-pointer">Politics</label>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-4 mt-3">
                    <!-- Row 2: Debate, Oration, Storytelling -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-debate" value="Debate"
                            {{ in_array('Debate', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-debate" class="ml-2 cursor-pointer">Debate</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-oration" value="Oration"
                            {{ in_array('Oration', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-oration" class="ml-2 cursor-pointer">Oration</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-storytelling" value="Storytelling"
                            {{ in_array('Storytelling', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-storytelling"
                            class="ml-2 cursor-pointer">Storytelling</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-poetry" value="Poetry Interpretation"
                            {{ in_array('Poetry Interpretation', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-poetry" class="ml-2 cursor-pointer">Poetry
                            Interpretation</label>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-4 mt-3">
                    <!-- Row 4: Musical Instruments -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-piano" value="Piano"
                            {{ in_array('Piano', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-piano" class="ml-2 cursor-pointer">Piano</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-guitar" value="Guitar"
                            {{ in_array('Guitar', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-guitar" class="ml-2 cursor-pointer">Guitar</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-violin" value="Violin"
                            {{ in_array('Violin', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-violin" class="ml-2 cursor-pointer">Violin</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-drums" value="Drums"
                            {{ in_array('Drums', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-drums" class="ml-2 cursor-pointer">Drums</label>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-4 mt-3">
                    <!-- Row 3: Sports -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-basketball" value="Basketball"
                            {{ in_array('Basketball', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-basketball"
                            class="ml-2 cursor-pointer">Basketball</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-soccer" value="Soccer"
                            {{ in_array('Soccer', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-soccer" class="ml-2 cursor-pointer">Soccer</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-football" value="Football"
                            {{ in_array('Football', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-football" class="ml-2 cursor-pointer">Football</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-track" value="Track and Field"
                            {{ in_array('Track and Field', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-track" class="ml-2 cursor-pointer">Track and
                            Field</label>
                    </div>
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="interest[]" data-tw-merge type="checkbox"
                            class="transition-all duration-100 ease-in-out rounded shadow-sm cursor-pointer border-slate-200 focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            id="checkbox-switch-volleyball" value="Volleyball"
                            {{ in_array('Volleyball', old('interest', $user->student->activity_interest->interest ?? [])) ? 'checked' : '' }} />
                        <label data-tw-merge for="checkbox-switch-volleyball"
                            class="ml-2 cursor-pointer">Volleyball</label>
                    </div>
                </div>

                <!-- Error Handling -->
                @error('interest')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror


                <label>What subject/s in high school you like the best?</label>
                <input name="subject_best_like" id="update-profile-form-6" type="text"
                    value="{{ old('subject_best_like', $user->student->activity_interest->subject_best_like ?? '') }}"
                    placeholder="Input text"
                    class="w-full mb-4 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                @error('subject_best_like')
                    <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                @enderror

                <label>What subject/s in high school you like the least?</label>
                <input name="subject_least_like" id="update-profile-form-6" type="text"
                    value="{{ old('subject_least_like', $user->student->activity_interest->subject_least_like ?? '') }}"
                    placeholder="Input text"
                    class="w-full mb-4 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                @error('subject_least_like')
                    <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                @enderror

            </div>
        </div>
    </div>

    <div class="mt-8 intro-y box">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                PERSONAL HISTORY
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-wrap gap-x-5">
                {{-- <h2 class="mr-auto text-base font-medium">
                Extra-Curricular activities during elementary and high school (please check):
            </h2> --}}
                <div class="flex flex-row w-full gap-3">
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Do You Smoke Cigarette?</label>
                        <select name="cigarette" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option value="Never"
                                {{ old('cigarette', $user->student->personal_history->cigarette ?? 'Never') == 'Never' ? 'selected' : '' }}>
                                Never
                            </option>
                            <option value="Not Anymore"
                                {{ old('cigarette', $user->student->personal_history->cigarette ?? 'Not Anymore') == 'Not Anymore' ? 'selected' : '' }}>
                                Not
                                Anymore
                            </option>
                            <option value="Occasionally"
                                {{ old('cigarette', $user->student->personal_history->cigarette ?? 'Occasionally') == 'Occasionally' ? 'selected' : '' }}>
                                Occasionally
                            </option>
                            <option value="Almost Always"
                                {{ old('cigarette', $user->student->personal_history->cigarette ?? 'Almost Always') == 'Almost Always' ? 'selected' : '' }}>
                                Almost Always
                            </option>
                            <option value="Habitually"
                                {{ old('cigarette', $user->student->personal_history->cigarette ?? 'Habitually') == 'Habitually' ? 'selected' : '' }}>
                                Habitually
                            </option>
                        </select>
                        @error('cigarette')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Do You Drink Liquior?</label>
                        <select name="liquior" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option value="Never"
                                {{ old('liquior', $user->student->personal_history->liquior ?? 'Never') == 'Never' ? 'selected' : '' }}>
                                Never
                            </option>
                            <option value="Not Anymore"
                                {{ old('liquior', $user->student->personal_history->liquior ?? 'Not Anymore') == 'Not Anymore' ? 'selected' : '' }}>
                                Not
                                Anymore
                            </option>
                            <option value="Occasionally"
                                {{ old('liquior', $user->student->personal_history->liquior ?? 'Occasionally') == 'Occasionally' ? 'selected' : '' }}>
                                Occasionally
                            </option>
                            <option value="Almost Always"
                                {{ old('liquior', $user->student->personal_history->liquior ?? 'Almost Always') == 'Almost Always' ? 'selected' : '' }}>
                                Almost Always
                            </option>
                            <option value="Habitually"
                                {{ old('liquior', $user->student->personal_history->liquior ?? 'Habitually') == 'Habitually' ? 'selected' : '' }}>
                                Habitually
                            </option>
                        </select>
                        @error('liquior')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Do You Take Phobihited
                            Drugs?</label>
                        <select name="drugs" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option value="Never"
                                {{ old('drugs', $user->student->personal_history->drugs ?? 'Never') == 'Never' ? 'selected' : '' }}>
                                Never
                            </option>
                            <option value="Not Anymore"
                                {{ old('drugs', $user->student->personal_history->drugs ?? 'Not Anymore') == 'Not Anymore' ? 'selected' : '' }}>
                                Not
                                Anymore
                            </option>
                            <option value="Occasionally"
                                {{ old('drugs', $user->student->personal_history->drugs ?? 'Occasionally') == 'Occasionally' ? 'selected' : '' }}>
                                Occasionally
                            </option>
                            <option value="Almost Always"
                                {{ old('drugs', $user->student->personal_history->drugs ?? 'Almost Always') == 'Almost Always' ? 'selected' : '' }}>
                                Almost Always
                            </option>
                            <option value="Habitually"
                                {{ old('drugs', $user->student->personal_history->drugs ?? 'Habitually') == 'Habitually' ? 'selected' : '' }}>
                                Habitually
                            </option>
                        </select>
                        @error('drugs')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row w-full gap-3">
                    <div class="flex-1">
                        <label for="update-profile-form-8" class="inline-block mb-2">Have You Ever Disciplined In
                            School?</label>
                        <select name="discipline" id="have_you_ever_disciplined"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50"
                            onchange="toggleDisciplineDetails()">
                            <option value="Yes"
                                {{ old('discipline', $user->student->personal_history->discipline ?? 'Yes') == 'Yes' ? 'selected' : '' }}>
                                Yes
                            </option>
                            <option value="No"
                                {{ old('discipline', $user->student->personal_history->discipline ?? 'No') == 'No' ? 'selected' : '' }}>
                                No
                            </option>
                        </select>
                        @error('discipline')
                            <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <!-- Conditional input for details when "No" is selected -->
                    <div class="flex-1" id="discipline-details-container" style="display: none;">
                        <label for="discipline-details" class="inline-block mb-2">Details:</label>
                        <input type="text" name="discipline1" id="discipline-details"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                </div>

                <script>
                    function toggleDisciplineDetails() {
                        const selectElement = document.getElementById('have_you_ever_disciplined');
                        const detailsContainer = document.getElementById('discipline-details-container');
                        if (selectElement.value === '') { // If "No" is selected
                            detailsContainer.style.display = 'block';
                        } else {
                            detailsContainer.style.display = 'none';
                        }
                    }

                    // Initialize the state based on the current selection
                    document.addEventListener('DOMContentLoaded', function() {
                        toggleDisciplineDetails();
                    });
                </script>

            </div>
        </div>
    </div>

    <div class="mt-8 intro-y box">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                COUNSELLING RECORD
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-wrap gap-x-5">
                {{-- <h2 class="mr-auto text-base font-medium">
                Extra-Curricular activities during elementary and high school (please check):
            </h2> --}}
                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="counselling_record_1[date]" class="inline-block mb-2">
                                Date
                            </label>
                            <input name="counselling_record_1[date]" id="counselling_record_1[date]" type="text"
                                value="{{ old('counselling_record_1.date', $user->student->counselling_record->counselling_record_1['date'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_1.date')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="counselling_record_1[concern_taken_up]" class="inline-block mb-2">
                                Concern Taken Up With The Councilor
                            </label>
                            <input name="counselling_record_1[concern_taken_up]"
                                id="counselling_record_1[concern_taken_up]" type="text"
                                value="{{ old('counselling_record_1.concern_taken_up', $user->student->counselling_record->counselling_record_1['concern_taken_up'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_1.concern_taken_up')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="counselling_record_1[remarks]" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="counselling_record_1[remarks]" id="counselling_record_1[remarks]"
                                type="text"
                                value="{{ old('counselling_record_1.remarks', $user->student->counselling_record->counselling_record_1['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_1.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="counselling_record_1[concern_signature]" class="inline-block mb-2">
                                Councilor's Signature
                            </label>
                            <input name="counselling_record_1[concern_signature]"
                                id="counselling_record_1[concern_signature]" type="text"
                                value="{{ old('counselling_record_1.concern_signature', $user->student->counselling_record->counselling_record_1['concern_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_1.concern_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <input name="counselling_record_2[date]" id="counselling_record_2[date]" type="text"
                                value="{{ old('counselling_record_2.date', $user->student->counselling_record->counselling_record_2['date'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_2.date')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <input name="counselling_record_2[concern_taken_up]"
                                id="counselling_record_2[concern_taken_up]" type="text"
                                value="{{ old('counselling_record_2.concern_taken_up', $user->student->counselling_record->counselling_record_2['concern_taken_up'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_2.concern_taken_up')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <input name="counselling_record_2[remarks]" id="counselling_record_2[remarks]"
                                type="text"
                                value="{{ old('counselling_record_2.remarks', $user->student->counselling_record->counselling_record_2['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_2.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <input name="counselling_record_2[concern_signature]"
                                id="counselling_record_2[concern_signature]" type="text"
                                value="{{ old('counselling_record_2.concern_signature', $user->student->counselling_record->counselling_record_2['concern_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_2.concern_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <input name="counselling_record_3[date]" id="counselling_record_3[date]" type="text"
                                value="{{ old('counselling_record_3.date', $user->student->counselling_record->counselling_record_3['date'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_3.date')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <input name="counselling_record_3[concern_taken_up]"
                                id="counselling_record_3[concern_taken_up]" type="text"
                                value="{{ old('counselling_record_3.concern_taken_up', $user->student->counselling_record->counselling_record_3['concern_taken_up'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_3.concern_taken_up')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <input name="counselling_record_3[remarks]" id="counselling_record_3[remarks]"
                                type="text"
                                value="{{ old('counselling_record_3.remarks', $user->student->counselling_record->counselling_record_3['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_3.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <input name="counselling_record_3[concern_signature]"
                                id="counselling_record_3[concern_signature]" type="text"
                                value="{{ old('counselling_record_3.concern_signature', $user->student->counselling_record->counselling_record_3['concern_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('counselling_record_3.concern_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-8 intro-y box">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                SCHOLASTIC RECORD
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-wrap gap-x-5">
                {{-- <h2 class="mr-auto text-base font-medium">
                Extra-Curricular activities during elementary and high school (please check):
            </h2> --}}
                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="scholastic_record_1_term_school_year" class="inline-block mb-2">
                                Term And School Year
                            </label>
                            <input name="scholastic_record_1[term_school_year]"
                                id="scholastic_record_1_term_school_year" type="text"
                                value="{{ old('scholastic_record_1.term_school_year', $user->student->sholastic_record->scholastic_record_1['term_school_year'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_1.term_school_year')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_1_no_of_units" class="inline-block mb-2">
                                No. Of Units
                            </label>
                            <input name="scholastic_record_1[no_of_units]" id="scholastic_record_1_no_of_units"
                                type="text"
                                value="{{ old('scholastic_record_1.no_of_units', $user->student->sholastic_record->scholastic_record_1['no_of_units'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_1.no_of_units')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_1_gwa" class="inline-block mb-2">
                                GWA
                            </label>
                            <input name="scholastic_record_1[gwa]" id="scholastic_record_1_gwa" type="text"
                                value="{{ old('scholastic_record_1.gwa', $user->student->sholastic_record->scholastic_record_1['gwa'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_1.gwa')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_1_remarks" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="scholastic_record_1[remarks]" id="scholastic_record_1_remarks" type="text"
                                value="{{ old('scholastic_record_1.remarks', $user->student->sholastic_record->scholastic_record_1['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_1.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_1_councilor_signature" class="inline-block mb-2">
                                Councilor Signature
                            </label>
                            <input name="scholastic_record_1[councilor_signature]"
                                id="scholastic_record_1_councilor_signature" type="text"
                                value="{{ old('scholastic_record_1.councilor_signature', $user->student->sholastic_record->scholastic_record_1['councilor_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_1.councilor_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="scholastic_record_2_term_school_year" class="inline-block mb-2">
                                Term And School Year
                            </label>
                            <input name="scholastic_record_2[term_school_year]"
                                id="scholastic_record_2_term_school_year" type="text"
                                value="{{ old('scholastic_record_2.term_school_year', $user->student->sholastic_record->scholastic_record_2['term_school_year'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_2.term_school_year')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_2_no_of_units" class="inline-block mb-2">
                                No. Of Units
                            </label>
                            <input name="scholastic_record_2[no_of_units]" id="scholastic_record_2_no_of_units"
                                type="text"
                                value="{{ old('scholastic_record_2.no_of_units', $user->student->sholastic_record->scholastic_record_2['no_of_units'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_2.no_of_units')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_2_gwa" class="inline-block mb-2">
                                GWA
                            </label>
                            <input name="scholastic_record_2[gwa]" id="scholastic_record_2_gwa" type="text"
                                value="{{ old('scholastic_record_2.gwa', $user->student->sholastic_record->scholastic_record_2['gwa'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_2.gwa')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_2_remarks" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="scholastic_record_2[remarks]" id="scholastic_record_2_remarks" type="text"
                                value="{{ old('scholastic_record_2.remarks', $user->student->sholastic_record->scholastic_record_2['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_2.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_2_councilor_signature" class="inline-block mb-2">
                                Councilor Signature
                            </label>
                            <input name="scholastic_record_2[councilor_signature]"
                                id="scholastic_record_2_councilor_signature" type="text"
                                value="{{ old('scholastic_record_2.councilor_signature', $user->student->sholastic_record->scholastic_record_2['councilor_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_2.councilor_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="scholastic_record_3_term_school_year" class="inline-block mb-2">
                                Term And School Year
                            </label>
                            <input name="scholastic_record_3[term_school_year]"
                                id="scholastic_record_3_term_school_year" type="text"
                                value="{{ old('scholastic_record_3.term_school_year', $user->student->sholastic_record->scholastic_record_3['term_school_year'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_3.term_school_year')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_3_no_of_units" class="inline-block mb-2">
                                No. Of Units
                            </label>
                            <input name="scholastic_record_3[no_of_units]" id="scholastic_record_3_no_of_units"
                                type="text"
                                value="{{ old('scholastic_record_3.no_of_units', $user->student->sholastic_record->scholastic_record_3['no_of_units'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_3.no_of_units')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_3_gwa" class="inline-block mb-2">
                                GWA
                            </label>
                            <input name="scholastic_record_3[gwa]" id="scholastic_record_3_gwa" type="text"
                                value="{{ old('scholastic_record_3.gwa', $user->student->sholastic_record->scholastic_record_3['gwa'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_3.gwa')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_3_remarks" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="scholastic_record_3[remarks]" id="scholastic_record_3_remarks" type="text"
                                value="{{ old('scholastic_record_3.remarks', $user->student->sholastic_record->scholastic_record_3['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_3.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_3_councilor_signature" class="inline-block mb-2">
                                Councilor Signature
                            </label>
                            <input name="scholastic_record_3[councilor_signature]"
                                id="scholastic_record_3_councilor_signature" type="text"
                                value="{{ old('scholastic_record_3.councilor_signature', $user->student->sholastic_record->scholastic_record_3['councilor_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_3.councilor_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="scholastic_record_4_term_school_year" class="inline-block mb-2">
                                Term And School Year
                            </label>
                            <input name="scholastic_record_4[term_school_year]"
                                id="scholastic_record_4_term_school_year" type="text"
                                value="{{ old('scholastic_record_4.term_school_year', $user->student->sholastic_record->scholastic_record_4['term_school_year'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_4.term_school_year')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_4_no_of_units" class="inline-block mb-2">
                                No. Of Units
                            </label>
                            <input name="scholastic_record_4[no_of_units]" id="scholastic_record_4_no_of_units"
                                type="text"
                                value="{{ old('scholastic_record_4.no_of_units', $user->student->sholastic_record->scholastic_record_4['no_of_units'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_4.no_of_units')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_4_gwa" class="inline-block mb-2">
                                GWA
                            </label>
                            <input name="scholastic_record_4[gwa]" id="scholastic_record_4_gwa" type="text"
                                value="{{ old('scholastic_record_4.gwa', $user->student->sholastic_record->scholastic_record_4['gwa'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_4.gwa')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_4_remarks" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="scholastic_record_4[remarks]" id="scholastic_record_4_remarks" type="text"
                                value="{{ old('scholastic_record_4.remarks', $user->student->sholastic_record->scholastic_record_4['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_4.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_4_councilor_signature" class="inline-block mb-2">
                                Councilor Signature
                            </label>
                            <input name="scholastic_record_4[councilor_signature]"
                                id="scholastic_record_4_councilor_signature" type="text"
                                value="{{ old('scholastic_record_4.councilor_signature', $user->student->sholastic_record->scholastic_record_4['councilor_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_4.councilor_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="scholastic_record_5_term_school_year" class="inline-block mb-2">
                                Term And School Year
                            </label>
                            <input name="scholastic_record_5[term_school_year]"
                                id="scholastic_record_5_term_school_year" type="text"
                                value="{{ old('scholastic_record_5.term_school_year', $user->student->sholastic_record->scholastic_record_5['term_school_year'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_5.term_school_year')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_5_no_of_units" class="inline-block mb-2">
                                No. Of Units
                            </label>
                            <input name="scholastic_record_5[no_of_units]" id="scholastic_record_5_no_of_units"
                                type="text"
                                value="{{ old('scholastic_record_5.no_of_units', $user->student->sholastic_record->scholastic_record_5['no_of_units'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_5.no_of_units')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_5_gwa" class="inline-block mb-2">
                                GWA
                            </label>
                            <input name="scholastic_record_5[gwa]" id="scholastic_record_5_gwa" type="text"
                                value="{{ old('scholastic_record_5.gwa', $user->student->sholastic_record->scholastic_record_5['gwa'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_5.gwa')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_5_remarks" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="scholastic_record_5[remarks]" id="scholastic_record_5_remarks" type="text"
                                value="{{ old('scholastic_record_5.remarks', $user->student->sholastic_record->scholastic_record_5['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_5.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_5_councilor_signature" class="inline-block mb-2">
                                Councilor Signature
                            </label>
                            <input name="scholastic_record_5[councilor_signature]"
                                id="scholastic_record_5_councilor_signature" type="text"
                                value="{{ old('scholastic_record_5.councilor_signature', $user->student->sholastic_record->scholastic_record_5['councilor_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_5.councilor_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="scholastic_record_6_term_school_year" class="inline-block mb-2">
                                Term And School Year
                            </label>
                            <input name="scholastic_record_6[term_school_year]"
                                id="scholastic_record_6_term_school_year" type="text"
                                value="{{ old('scholastic_record_6.term_school_year', $user->student->sholastic_record->scholastic_record_6['term_school_year'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_6.term_school_year')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_6_no_of_units" class="inline-block mb-2">
                                No. Of Units
                            </label>
                            <input name="scholastic_record_6[no_of_units]" id="scholastic_record_6_no_of_units"
                                type="text"
                                value="{{ old('scholastic_record_6.no_of_units', $user->student->sholastic_record->scholastic_record_6['no_of_units'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_6.no_of_units')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_6_gwa" class="inline-block mb-2">
                                GWA
                            </label>
                            <input name="scholastic_record_6[gwa]" id="scholastic_record_6_gwa" type="text"
                                value="{{ old('scholastic_record_6.gwa', $user->student->sholastic_record->scholastic_record_6['gwa'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_6.gwa')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_6_remarks" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="scholastic_record_6[remarks]" id="scholastic_record_6_remarks" type="text"
                                value="{{ old('scholastic_record_6.remarks', $user->student->sholastic_record->scholastic_record_6['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_6.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_6_councilor_signature" class="inline-block mb-2">
                                Councilor Signature
                            </label>
                            <input name="scholastic_record_6[councilor_signature]"
                                id="scholastic_record_6_councilor_signature" type="text"
                                value="{{ old('scholastic_record_6.councilor_signature', $user->student->sholastic_record->scholastic_record_6['councilor_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_6.councilor_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="scholastic_record_7_term_school_year" class="inline-block mb-2">
                                Term and School Year
                            </label>
                            <input name="scholastic_record_7[term_school_year]"
                                id="scholastic_record_7_term_school_year" type="text"
                                value="{{ old('scholastic_record_7.term_school_year', $user->student->sholastic_record->scholastic_record_7['term_school_year'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_7.term_school_year')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_7_no_of_units" class="inline-block mb-2">
                                No. Of Units
                            </label>
                            <input name="scholastic_record_7[no_of_units]" id="scholastic_record_7_no_of_units"
                                type="text"
                                value="{{ old('scholastic_record_7.no_of_units', $user->student->sholastic_record->scholastic_record_7['no_of_units'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_7.no_of_units')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_7_gwa" class="inline-block mb-2">
                                GWA
                            </label>
                            <input name="scholastic_record_7[gwa]" id="scholastic_record_7_gwa" type="text"
                                value="{{ old('scholastic_record_7.gwa', $user->student->sholastic_record->scholastic_record_7['gwa'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_7.gwa')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_7_remarks" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="scholastic_record_7[remarks]" id="scholastic_record_7_remarks" type="text"
                                value="{{ old('scholastic_record_7.remarks', $user->student->sholastic_record->scholastic_record_7['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_7.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_7_councilor_signature" class="inline-block mb-2">
                                Councilor Signature
                            </label>
                            <input name="scholastic_record_7[councilor_signature]"
                                id="scholastic_record_7_councilor_signature" type="text"
                                value="{{ old('scholastic_record_7.councilor_signature', $user->student->sholastic_record->scholastic_record_7['councilor_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_7.councilor_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="scholastic_record_8_term_school_year" class="inline-block mb-2">
                                Term and School Year
                            </label>
                            <input name="scholastic_record_8[term_school_year]"
                                id="scholastic_record_8_term_school_year" type="text"
                                value="{{ old('scholastic_record_8.term_school_year', $user->student->sholastic_record->scholastic_record_8['term_school_year'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_8.term_school_year')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_8_no_of_units" class="inline-block mb-2">
                                No. Of Units
                            </label>
                            <input name="scholastic_record_8[no_of_units]" id="scholastic_record_8_no_of_units"
                                type="text"
                                value="{{ old('scholastic_record_8.no_of_units', $user->student->sholastic_record->scholastic_record_8['no_of_units'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_8.no_of_units')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_8_gwa" class="inline-block mb-2">
                                GWA
                            </label>
                            <input name="scholastic_record_8[gwa]" id="scholastic_record_8_gwa" type="text"
                                value="{{ old('scholastic_record_8.gwa', $user->student->sholastic_record->scholastic_record_8['gwa'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_8.gwa')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_8_remarks" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="scholastic_record_8[remarks]" id="scholastic_record_8_remarks" type="text"
                                value="{{ old('scholastic_record_8.remarks', $user->student->sholastic_record->scholastic_record_8['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_8.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_8_councilor_signature" class="inline-block mb-2">
                                Councilor Signature
                            </label>
                            <input name="scholastic_record_8[councilor_signature]"
                                id="scholastic_record_8_councilor_signature" type="text"
                                value="{{ old('scholastic_record_8.councilor_signature', $user->student->sholastic_record->scholastic_record_8['councilor_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_8.councilor_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="scholastic_record_9_term_school_year" class="inline-block mb-2">
                                Term and School Year
                            </label>
                            <input name="scholastic_record_9[term_school_year]"
                                id="scholastic_record_9_term_school_year" type="text"
                                value="{{ old('scholastic_record_9.term_school_year', $user->student->sholastic_record->scholastic_record_9['term_school_year'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_9.term_school_year')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_9_no_of_units" class="inline-block mb-2">
                                No. Of Units
                            </label>
                            <input name="scholastic_record_9[no_of_units]" id="scholastic_record_9_no_of_units"
                                type="text"
                                value="{{ old('scholastic_record_9.no_of_units', $user->student->sholastic_record->scholastic_record_9['no_of_units'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_9.no_of_units')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_9_gwa" class="inline-block mb-2">
                                GWA
                            </label>
                            <input name="scholastic_record_9[gwa]" id="scholastic_record_9_gwa" type="text"
                                value="{{ old('scholastic_record_9.gwa', $user->student->sholastic_record->scholastic_record_9['gwa'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_9.gwa')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_9_remarks" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="scholastic_record_9[remarks]" id="scholastic_record_9_remarks" type="text"
                                value="{{ old('scholastic_record_9.remarks', $user->student->sholastic_record->scholastic_record_9['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_9.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_9_councilor_signature" class="inline-block mb-2">
                                Councilor Signature
                            </label>
                            <input name="scholastic_record_9[councilor_signature]"
                                id="scholastic_record_9_councilor_signature" type="text"
                                value="{{ old('scholastic_record_9.councilor_signature', $user->student->sholastic_record->scholastic_record_9['councilor_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_9.councilor_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row w-full gap-3">
                    <div class="flex flex-row w-full gap-3 mt-5">
                        <div class="flex-1">
                            <label for="scholastic_record_10_term_school_year" class="inline-block mb-2">
                                Term and School Year
                            </label>
                            <input name="scholastic_record_10[term_school_year]"
                                id="scholastic_record_10_term_school_year" type="text"
                                value="{{ old('scholastic_record_10.term_school_year', $user->student->sholastic_record->scholastic_record_10['term_school_year'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_10.term_school_year')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_10_no_of_units" class="inline-block mb-2">
                                No. Of Units
                            </label>
                            <input name="scholastic_record_10[no_of_units]" id="scholastic_record_10_no_of_units"
                                type="text"
                                value="{{ old('scholastic_record_10.no_of_units', $user->student->sholastic_record->scholastic_record_10['no_of_units'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_10.no_of_units')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_10_gwa" class="inline-block mb-2">
                                GWA
                            </label>
                            <input name="scholastic_record_10[gwa]" id="scholastic_record_10_gwa" type="text"
                                value="{{ old('scholastic_record_10.gwa', $user->student->sholastic_record->scholastic_record_10['gwa'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_10.gwa')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_10_remarks" class="inline-block mb-2">
                                Remarks
                            </label>
                            <input name="scholastic_record_10[remarks]" id="scholastic_record_10_remarks"
                                type="text"
                                value="{{ old('scholastic_record_10.remarks', $user->student->sholastic_record->scholastic_record_10['remarks'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_10.remarks')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex-1">
                            <label for="scholastic_record_10_councilor_signature" class="inline-block mb-2">
                                Councilor Signature
                            </label>
                            <input name="scholastic_record_10[councilor_signature]"
                                id="scholastic_record_10_councilor_signature" type="text"
                                value="{{ old('scholastic_record_10.councilor_signature', $user->student->sholastic_record->scholastic_record_10['councilor_signature'] ?? '') }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('scholastic_record_10.councilor_signature')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="mt-8 intro-y box">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                PROBLEM CHECKLIST
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-wrap gap-x-5">
                <h2 class="mr-auto text-base font-medium">
                    Given below is a list of problems which are often troubling the students of your age. Please read
                    through the list slowly, and when you came to a problem which suggests something that is troubling
                    you, place a check mark on the space opposite it.
                </h2>
            </div>
            <div class="problem-checklist">
                <div class="flex flex-col mt-2 sm:flex-row">
                    <!-- First Group -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox1" class="cursor-pointer"
                            value="Feeling tired most of the time"
                            {{ in_array('Feeling tired most of the time', old('check_list', $user->student->problem_checklist->check_list ?? [])) ? 'checked' : '' }} />
                        <label for="checkbox1" class="ml-2 cursor-pointer">Feeling tired most of the time</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox2" class="cursor-pointer"
                            value="Not getting enough sleep" @if (in_array('Not getting enough sleep', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox2" class="ml-2 cursor-pointer">Not getting enough sleep</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox3" class="cursor-pointer"
                            value="Frequent colds/cough/sore throat" @if (in_array(
                                    'Frequent colds/cough/sore throat',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox3" class="ml-2 cursor-pointer">Frequent colds/cough/sore throat</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox4" class="cursor-pointer"
                            value="Weak eyes" @if (in_array('Weak eyes', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox4" class="ml-2 cursor-pointer">Weak eyes</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox5" class="cursor-pointer"
                            value="Frequent headaches" @if (in_array('Frequent headaches', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox5" class="ml-2 cursor-pointer">Frequent headaches</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-2 sm:flex-row">
                    <!-- Second Group -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox6" class="cursor-pointer"
                            value="Financial help from home/benefactor not enough"
                            @if (in_array(
                                    'Financial help from home/benefactor not enough',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox6" class="ml-2 cursor-pointer">Financial help from home/benefactor not
                            enough</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox7" class="cursor-pointer"
                            value="Having no regular allowance" @if (in_array('Having no regular allowance', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox7" class="ml-2 cursor-pointer">Having no regular allowance</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox8" class="cursor-pointer"
                            value="Working late night on a job" @if (in_array('Working late night on a job', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox8" class="ml-2 cursor-pointer">Working late night on a job</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox9" class="cursor-pointer"
                            value="Unsure of future financial support"
                            @if (in_array(
                                    'Unsure of future financial support',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox9" class="ml-2 cursor-pointer">Unsure of future financial
                            support</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox10" class="cursor-pointer"
                            value="Living in an inconvenient location"
                            @if (in_array(
                                    'Living in an inconvenient location',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox10" class="ml-2 cursor-pointer">Living in an inconvenient
                            location</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-2 sm:flex-row">
                    <!-- Third Group -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox11" class="cursor-pointer"
                            value="Not using leisure time well" @if (in_array('Not using leisure time well', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox11" class="ml-2 cursor-pointer">Not using leisure time well</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox12" class="cursor-pointer"
                            value="Awkward in meeting people" @if (in_array('Awkward in meeting people', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox12" class="ml-2 cursor-pointer">Awkward in meeting people</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox13" class="cursor-pointer"
                            value="Slow in getting acquainted with people"
                            @if (in_array(
                                    'Slow in getting acquainted with people',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox13" class="ml-2 cursor-pointer">Slow in getting acquainted with
                            people</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox14" class="cursor-pointer"
                            value="Too much social life" @if (in_array('Too much social life', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox14" class="ml-2 cursor-pointer">Too much social life</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox15" class="cursor-pointer"
                            value="Lacking skill in sports and games"
                            @if (in_array(
                                    'Lacking skill in sports and games',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox15" class="ml-2 cursor-pointer">Lacking skill in sports and
                            games</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-2 sm:flex-row">
                    <!-- Fourth Group -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox16" class="cursor-pointer"
                            value="Being timid or shy" @if (in_array('Being timid or shy', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox16" class="ml-2 cursor-pointer">Being timid or shy</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox17" class="cursor-pointer"
                            value="Feeling inferior" @if (in_array('Feeling inferior', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox17" class="ml-2 cursor-pointer">Feeling inferior</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox18" class="cursor-pointer"
                            value="Lacking leadership ability" @if (in_array('Lacking leadership ability', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox18" class="ml-2 cursor-pointer">Lacking leadership ability</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox19" class="cursor-pointer"
                            value="Getting into arguments" @if (in_array('Getting into arguments', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox19" class="ml-2 cursor-pointer">Getting into arguments</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox20" class="cursor-pointer"
                            value="Having no one to tell my troubles to"
                            @if (in_array(
                                    'Having no one to tell my troubles to',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox20" class="ml-2 cursor-pointer">Having no one to tell my troubles
                            to</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-2 sm:flex-row">
                    <!-- Eighth Group -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox35" class="cursor-pointer"
                            value="Worrying about unimportant things"
                            @if (in_array(
                                    'Worrying about unimportant things',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox35" class="ml-2 cursor-pointer">Worrying about unimportant
                            things</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox36" class="cursor-pointer"
                            value="Nervousness" @if (in_array('Nervousness', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox36" class="ml-2 cursor-pointer">Nervousness</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox37" class="cursor-pointer"
                            value="Too easily discourage" @if (in_array('Too easily discourage', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox37" class="ml-2 cursor-pointer">Too easily discourage</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox38" class="cursor-pointer"
                            value="Unhappy too much of the time" @if (in_array('Unhappy too much of the time', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox38" class="ml-2 cursor-pointer">Unhappy too much of the time</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox39" class="cursor-pointer"
                            value="Lacking of self-confidence" @if (in_array('Lacking of self-confidence', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox39" class="ml-2 cursor-pointer">Lacking of self-confidence</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-2 sm:flex-row">
                    <!-- Ninth Group -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox40" class="cursor-pointer"
                            value="Going with someone my family won't accept"
                            @if (in_array(
                                    'Going with someone my family won\'t accept',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox40" class="ml-2 cursor-pointer">Going with someone my family won't
                            accept</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox41" class="cursor-pointer"
                            value="Loving someone who does not love me"
                            @if (in_array(
                                    'Loving someone who does not love me',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox41" class="ml-2 cursor-pointer">Loving someone who does not love
                            me</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox42" class="cursor-pointer"
                            value="Being in love" @if (in_array('Being in love', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox42" class="ml-2 cursor-pointer">Being in love</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox43" class="cursor-pointer"
                            value="Disappointed in a love affair" @if (in_array('Disappointed in a love affair', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox43" class="ml-2 cursor-pointer">Disappointed in a love affair</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox44" class="cursor-pointer"
                            value="Deciding whether to go steady" @if (in_array('Deciding whether to go steady', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox44" class="ml-2 cursor-pointer">Deciding whether to go steady</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-2 sm:flex-row">
                    <!-- Tenth Group -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox45" class="cursor-pointer"
                            value="Being criticized by my parents" @if (in_array('Being criticized by my parents', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox45" class="ml-2 cursor-pointer">Being criticized by my parents</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox46" class="cursor-pointer"
                            value="Parents are separated" @if (in_array('Parents are separated', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox46" class="ml-2 cursor-pointer">Parents are separated</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox47" class="cursor-pointer"
                            value="Parents expecting too much from me"
                            @if (in_array(
                                    'Parents expecting too much from me',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox47" class="ml-2 cursor-pointer">Parents expecting too much from
                            me</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox48" class="cursor-pointer"
                            value="Parents are unreasonable strict" @if (in_array('Parents are unreasonable strict', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox48" class="ml-2 cursor-pointer">Parents are unreasonable strict</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox49" class="cursor-pointer"
                            value="Home life is unhappy" @if (in_array('Home life is unhappy', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox49" class="ml-2 cursor-pointer">Home life is unhappy</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-2 sm:flex-row">
                    <!-- Fifth Group -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox21" class="cursor-pointer"
                            value="Not knowing how to study efficiently"
                            @if (in_array(
                                    'Not knowing how to study efficiently',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox21" class="ml-2 cursor-pointer">Not knowing how to study
                            efficiently</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox22" class="cursor-pointer"
                            value="Having a poor background for some subjects"
                            @if (in_array(
                                    'Having a poor background for some subjects',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox22" class="ml-2 cursor-pointer">Having a poor background for some
                            subjects</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox23" class="cursor-pointer"
                            value="Unable to concentrate well" @if (in_array('Unable to concentrate well', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox23" class="ml-2 cursor-pointer">Unable to concentrate well</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox24" class="cursor-pointer"
                            value="Getting low grades" @if (in_array('Getting low grades', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox24" class="ml-2 cursor-pointer">Getting low grades</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox25" class="cursor-pointer"
                            value="Afraid to speak up in a class discussion"
                            @if (in_array(
                                    'Afraid to speak up in a class discussion',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox25" class="ml-2 cursor-pointer">Afraid to speak up in a class
                            discussion</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-2 sm:flex-row">
                    <!-- Sixth Group -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox25" class="cursor-pointer"
                            value="Doubting the wisdom of my course choice"
                            @if (in_array(
                                    'Doubting the wisdom of my course choice',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox25" class="ml-2 cursor-pointer">Doubting the wisdom of my course
                            choice</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox26" class="cursor-pointer"
                            value="Unable to enter my desired course"
                            @if (in_array(
                                    'Unable to enter my desired course',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox26" class="ml-2 cursor-pointer">Unable to enter my desired
                            course</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox27" class="cursor-pointer"
                            value="Doubting I can get a job in my chosen course"
                            @if (in_array(
                                    'Doubting I can get a job in my chosen course',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox27" class="ml-2 cursor-pointer">Doubting I can get a job in my chosen
                            course</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox28" class="cursor-pointer"
                            value="Needing to know my vocational abilities"
                            @if (in_array(
                                    'Needing to know my vocational abilities',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox28" class="ml-2 cursor-pointer">Needing to know my vocational
                            abilities</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox29" class="cursor-pointer"
                            value="Purpose in going to college not clear"
                            @if (in_array(
                                    'Purpose in going to college not clear',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox29" class="ml-2 cursor-pointer">Purpose in going to college not
                            clear</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-2 sm:flex-row">
                    <!-- Seventh Group -->
                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox30" class="cursor-pointer"
                            value="Teachers are too hard to understand"
                            @if (in_array(
                                    'Teachers are too hard to understand',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox30" class="ml-2 cursor-pointer">Teachers are too hard to
                            understand</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox31" class="cursor-pointer"
                            value="Not getting individual help from teachers"
                            @if (in_array(
                                    'Not getting individual help from teachers',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox31" class="ml-2 cursor-pointer">Not getting individual help from
                            teachers</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox32" class="cursor-pointer"
                            value="Graded unfairly as measures of ability"
                            @if (in_array(
                                    'Graded unfairly as measures of ability',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox32" class="ml-2 cursor-pointer">Graded unfairly as measures of
                            ability</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox33" class="cursor-pointer"
                            value="Unfair test" @if (in_array('Unfair test', old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox33" class="ml-2 cursor-pointer">Unfair test</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center w-full mb-4 mr-4">
                        <input name="check_list[]" type="checkbox" id="checkbox34" class="cursor-pointer"
                            value="Not having a good college adviser"
                            @if (in_array(
                                    'Not having a good college adviser',
                                    old('check_list', $user->student->problem_checklist->check_list ?? []))) checked @endif />
                        <label for="checkbox34" class="ml-2 cursor-pointer">Not having a good college
                            adviser</label>
                        @error('check_list')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

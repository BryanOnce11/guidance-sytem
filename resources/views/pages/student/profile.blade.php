@extends('layouts.app')
@section('content')
    <form action="{{ route('student.profile.update', $user->student) }}" method="POST">
        @csrf
        @method('PUT')
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
                                <option value="1"
                                    {{ old('year_lvl', $user->student->year_lvl) == '1st Year' ? 'selected' : '' }}>1st Year
                                </option>
                                <option value="2"
                                    {{ old('year_lvl', $user->student->year_lvl) == '2nd Year' ? 'selected' : '' }}>2nd Year
                                </option>
                                <option value="3"
                                    {{ old('year_lvl', $user->student->year_lvl) == '3rd Year' ? 'selected' : '' }}>3rd
                                    Year</option>
                                <option value="4"
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
                            <label for="update-profile-form-6" class="inline-block mb-2">First Name</label>
                            <input name="fname" id="update-profile-form-6" type="text"
                                value="{{ old('fname', $user->student->fname) }}" placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('fname')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="update-profile-form-6" class="inline-block mb-2">Last Name</label>
                            <input name="lname" id="update-profile-form-6" type="text"
                                value="{{ old('lname', $user->student->lname) }}" placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('lname')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="update-profile-form-6" class="inline-block mb-2">Middle Name</label>
                            <input name="m_i" id="update-profile-form-6" type="text"
                                value="{{ old('m_i', $user->student->m_i) }}" placeholder="Input text"
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
                                value="{{ old('birth_place', $user->student->birth_place) }}" placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('birth_place')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="update-profile-form-6" class="inline-block mb-2">Citizenship</label>
                            <input name="citizenship" id="update-profile-form-6" type="text"
                                value="{{ old('citizenship', $user->student->citizenship) }}" placeholder="Input text"
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
                                value="{{ old('f_fname', $user->student->family_back->father->fname) }}"
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
                                value="{{ old('f_lname', $user->student->family_back->father->lname) }}"
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
                                value="{{ old('f_m_i', $user->student->family_back->father->m_i) }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('f_m_i')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="f_occupation" class="inline-block mb-2">
                                Occupation
                            </label>
                            <input name="f_occupation" id="f_occupation" type="text"
                                value="{{ old('f_occupation', $user->student->family_back->father->occupation) }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('f_occupation')
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
                                value="{{ old('m_fname', $user->student->family_back->mother->fname) }}"
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
                                value="{{ old('m_lname', $user->student->family_back->mother->lname) }}"
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
                                value="{{ old('m_m_i', $user->student->family_back->mother->m_i) }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('m_m_i')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="m_occupation" class="inline-block mb-2">
                                Occupation
                            </label>
                            <input name="m_occupation" id="m_occupation" type="text"
                                value="{{ old('m_occupation', $user->student->family_back->mother->occupation) }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('m_occupation')
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
                                value="{{ old('s_fname', $user->student->family_back->spouse->fname) }}"
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
                                value="{{ old('s_lname', $user->student->family_back->spouse->lname) }}"
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
                                value="{{ old('s_m_i', $user->student->family_back->spouse->m_i) }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('s_m_i')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="s_occupation" class="inline-block mb-2">
                                Occupation
                            </label>
                            <input name="s_occupation" id="s_occupation" type="text"
                                value="{{ old('s_occupation', $user->student->family_back->spouse->occupation) }}"
                                placeholder="Input text"
                                class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            @error('s_occupation')
                                <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 text-right">
            {{-- <button data-tw-merge="" type="button"
                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1 w-24">Cancel</button> --}}
            <button data-tw-merge="" type="submit"
                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-24">Update</button>
        </div>
    </form>
@endsection

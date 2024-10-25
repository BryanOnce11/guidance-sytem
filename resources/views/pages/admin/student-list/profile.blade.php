@extends('layouts.app')
@section('content')
    <div class="mt-5 intro-y box">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                Personal Information
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-wrap gap-x-5">
                <div class="flex flex-row w-full gap-3">
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Student ID
                        </label>
                        <input name="student_id" id="update-profile-form-6" type="text"
                            value="{{ old('student_id', $user->student->student_id) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-8" class="inline-block mb-2">
                            Course
                        </label>
                        <select name="coruse" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option>IC</option>
                            <option>FIN</option>
                            <option>Passport</option>
                        </select>
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-8" class="inline-block mb-2">
                            Year Level
                        </label>
                        <select name="year_lvl" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option {{ $user->student->year_lvl == 1 ? 'selected' : '' }}>1</option>
                            <option {{ $user->student->year_lvl == 2 ? 'selected' : '' }}>2</option>
                            <option {{ $user->student->year_lvl == 3 ? 'selected' : '' }}>3</option>
                            <option {{ $user->student->year_lvl == 4 ? 'selected' : '' }}>4</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            First Name
                        </label>
                        <input name="fname" id="update-profile-form-6" type="text"
                            value="{{ old('fname', $user->student->fname) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Last Name
                        </label>
                        <input name="lname" id="update-profile-form-6" type="text"
                            value="{{ old('lname', $user->student->lname) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Middle Name
                        </label>
                        <input name="m_i" id="update-profile-form-6" type="text"
                            value="{{ old('m_i', $user->student->m_i) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>

                </div>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1 ">
                        <label for="update-profile-form-8" class="inline-block mb-2">
                            Gender
                        </label>
                        <select name="gender" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option {{ $user->student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option {{ $user->student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-8" class="inline-block mb-2">
                            Civil Status
                        </label>
                        <select name="civil_status" id="update-profile-form-8"
                            class="w-full px-3 py-2 text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                            <option {{ $user->student->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                            <option {{ $user->student->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                            <option {{ $user->student->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                        </select>
                    </div>

                </div>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Date Of Birth
                        </label>
                        <input name="birth_date" id="update-profile-form-6" type="date"
                            value="{{ old('birth_date', $user->student->birth_date) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Place Of Birth
                        </label>
                        <input name="date_place" id="update-profile-form-6" type="text"
                            value="{{ old('date_place', $user->student->birth_place) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Citizenship
                        </label>
                        <input name="citizenship" id="update-profile-form-6" type="text"
                            value="{{ old('citizenship', $user->student->citizenship) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                </div>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Email
                        </label>
                        <input name="email" id="update-profile-form-6" type="text"
                            value="{{ old('email', $user->email) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Contact Number
                        </label>
                        <input name="cotact_num" id="update-profile-form-6" type="text"
                            value="{{ old('cotact_num', $user->student->contact_num) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
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
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            First Name
                        </label>
                        <input name="f_fname" id="update-profile-form-6" type="text"
                            value="{{ old('f_fname', $user->student->family_back->father->fname) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Last Name
                        </label>
                        <input name="f_lname" id="update-profile-form-6" type="text"
                            value="{{ old('f_lname', $user->student->family_back->father->lname) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Middle Name
                        </label>
                        <input name="f_m_i" id="update-profile-form-6" type="text"
                            value="{{ old('f_m_i', $user->student->family_back->father->m_i) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Occupation
                        </label>
                        <input name="f_occupation" id="update-profile-form-6" type="text"
                            value="{{ old('f_occupation', $user->student->family_back->father->occupation) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>

                </div>
                <h2 class="mt-5 mr-auto text-base font-medium">
                    Mother Information
                </h2>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            First Name
                        </label>
                        <input name="m_fname" id="update-profile-form-6" type="text"
                            value="{{ old('m_fname', $user->student->family_back->mother->fname) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Last Name
                        </label>
                        <input name="m_lname" id="update-profile-form-6" type="text"
                            value="{{ old('m_lname', $user->student->family_back->mother->lname) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Middle Name
                        </label>
                        <input name="m_m_i" id="update-profile-form-6" type="text"
                            value="{{ old('m_m_i', $user->student->family_back->mother->m_i) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Occupation
                        </label>
                        <input name="m_occupation" id="update-profile-form-6" type="text"
                            value="{{ old('m_occupation', $user->student->family_back->mother->occupation) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>

                </div>
                <h2 class="mt-5 mr-auto text-base font-medium">
                    Spouse Information
                </h2>
                <div class="flex flex-row w-full gap-3 mt-5">
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            First Name
                        </label>
                        <input name="s_fname" id="update-profile-form-6" type="text"
                            value="{{ old('s_fname', $user->student->family_back->spouse->fname) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Last Name
                        </label>
                        <input name="s_lname" id="update-profile-form-6" type="text"
                            value="{{ old('s_lname', $user->student->family_back->spouse->lname) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Middle Name
                        </label>
                        <input name="s_m_i" id="update-profile-form-6" type="text"
                            value="{{ old('s_m_i', $user->student->family_back->spouse->m_i) }}" placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                    <div class="flex-1 ">
                        <label for="update-profile-form-6" class="inline-block mb-2">
                            Occupation
                        </label>
                        <input name="s_occupation" id="update-profile-form-6" type="text"
                            value="{{ old('s_occupation', $user->student->family_back->spouse->occupation) }}"
                            placeholder="Input text"
                            class="w-full text-sm transition duration-200 ease-in-out rounded-md shadow-sm disabled:bg-slate-100 disabled:cursor-not-allowed border-slate-200 placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

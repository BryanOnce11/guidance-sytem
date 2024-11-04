<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'student_id' => 'required|string|max:20',
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'm_i' => 'nullable',
            'course_id' => 'required',
            'year_lvl' => 'required|string|max:10',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:100',
            'gender' => 'required|in:Male,Female',
            'citizenship' => 'required|string|max:50',
            'civil_status' => 'required|string|max:20',
            'contact_num' => 'required|string|size:11|regex:/^09\d{9}$/',

            // 'e_fullname' => 'required|string|max:100',
            // 'e_contact_num' => 'required|string|size:11|regex:/^09\d{9}$/',
            // 'e_occupation' => 'required|string|max:100',

            'f_fname' => 'required|string|max:50',
            'f_lname' => 'required|string|max:50',
            'f_m_i' => 'nullable',
            'f_occupation' => 'required|string|max:100',

            'm_fname' => 'required|string|max:50',
            'm_lname' => 'required|string|max:50',
            'm_m_i' => 'nullable',
            'm_occupation' => 'required|string|max:100',

            's_fname' => 'required|string|max:50',
            's_lname' => 'required|string|max:50',
            's_m_i' => 'nullable',
            's_occupation' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user ID is invalid.',
            'student_id.required' => 'The student ID is required.',
            'student_id.string' => 'The student ID must be a string.',
            'student_id.max' => 'The student ID may not be greater than 20 characters.',
            'fname.required' => 'The first name is required.',
            'fname.string' => 'The first name must be a string.',
            'fname.max' => 'The first name may not be greater than 50 characters.',
            'lname.required' => 'The last name is required.',
            'lname.string' => 'The last name must be a string.',
            'lname.max' => 'The last name may not be greater than 50 characters.',
            'm_i.max' => 'Middle initial must be a single character.',
            'course_id.required' => 'The course is required.',
            'course_id.string' => 'The course must be a string.',
            'course_id.max' => 'The course may not be greater than 100 characters.',
            'year_lvl.required' => 'The year level is required.',
            'year_lvl.string' => 'The year level must be a string.',
            'year_lvl.max' => 'The year level may not be greater than 10 characters.',
            'birth_date.required' => 'The birth date is required.',
            'birth_date.date' => 'The birth date must be a valid date.',
            'birth_place.required' => 'The birth place is required.',
            'birth_place.string' => 'The birth place must be a string.',
            'birth_place.max' => 'The birth place may not be greater than 100 characters.',
            'gender.required' => 'The gender is required.',
            'gender.in' => 'The selected gender is invalid.',
            'citizenship.required' => 'The citizenship is required.',
            'citizenship.string' => 'The citizenship must be a string.',
            'citizenship.max' => 'The citizenship may not be greater than 50 characters.',
            'civil_status.required' => 'The civil status is required.',
            'civil_status.string' => 'The civil status must be a string.',
            'civil_status.max' => 'The civil status may not be greater than 20 characters.',
            'contact_num.required' => 'The contact number is required.',
            'contact_num.size' => 'Contact number must be exactly 11 digits.',
            'contact_num.regex' => 'Contact number must be in the format 09********.',

            'e_fullname.required' => 'The emergency contact full name is required.',
            'e_fullname.string' => 'The emergency contact full name must be a string.',
            'e_fullname.max' => 'The emergency contact full name may not be greater than 100 characters.',
            'e_contact_num.required' => 'The emergency contact number is required.',
            'e_contact_num.size' => 'Contact number must be exactly 11 digits.',
            'e_contact_num.regex' => 'Contact number must be in the format 09********.',
            'e_occupation.required' => 'The emergency contact occupation is required.',
            'e_occupation.string' => 'The emergency contact occupation must be a string.',
            'e_occupation.max' => 'The emergency contact occupation may not be greater than 100 characters.',

            'f_fname.required' => 'The first name is required.',
            'f_fname.string' => 'The first name must be a string.',
            'f_fname.max' => 'The first name may not be greater than 50 characters.',
            'f_lname.required' => 'The last name is required.',
            'f_lname.string' => 'The last name must be a string.',
            'f_lname.max' => 'The last name may not be greater than 50 characters.',
            'f_occupation.required' => 'The occupation is required.',
            'f_occupation.string' => 'The occupation must be a string.',
            'f_occupation.max' => 'The occupation may not be greater than 100 characters.',

            'm_fname.required' => 'The first name is required.',
            'm_fname.string' => 'The first name must be a string.',
            'm_fname.max' => 'The first name may not be greater than 50 characters.',
            'm_lname.required' => 'The last name is required.',
            'm_lname.string' => 'The last name must be a string.',
            'm_lname.max' => 'The last name may not be greater than 50 characters.',
            'm_occupation.required' => 'The occupation is required.',
            'm_occupation.string' => 'The occupation must be a string.',
            'm_occupation.max' => 'The occupation may not be greater than 100 characters.',


            's_fname.required' => 'The first name is required.',
            's_fname.string' => 'The first name must be a string.',
            's_fname.max' => 'The first name may not be greater than 50 characters.',
            's_lname.required' => 'The last name is required.',
            's_lname.string' => 'The last name must be a string.',
            's_lname.max' => 'The last name may not be greater than 50 characters.',
            's_occupation.required' => 'The occupation is required.',
            's_occupation.string' => 'The occupation must be a string.',
            's_occupation.max' => 'The occupation may not be greater than 100 characters.',
        ];
    }
}

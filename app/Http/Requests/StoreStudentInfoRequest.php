<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentInfoRequest extends FormRequest
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
            'student_id' => 'required|string|max:20',
            'image' => 'required|image|mimes:png,jpg',
            'status' => 'required',
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'm_i' => 'nullable',
            'course_id' => 'required',
            'year_lvl' => 'required|string|max:10',
            'age' => 'required',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:100',
            'gender' => 'required|in:Male,Female,other',
            'citizenship' => 'required|string|max:50',
            'civil_status' => 'required|string|max:20',
            'contact_num' => 'required|string|size:11|regex:/^09\d{9}$/',
            // 'height' => 'required',
            // 'weight' => 'required',
            // 'blood_type' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'where_staying' => 'required',

            // 'e_fullname' => 'required|string|max:100',
            // 'e_contact_num' => 'required|string|size:11|regex:/^09\d{9}$/',
            // 'e_relationship' => 'required|string|max:100',
            // 'e_address' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
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
            // 'course.string' => 'The course must be a string.',
            // 'course.max' => 'The course may not be greater than 100 characters.',
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
            'e_relationship.required' => 'The emergency contact relationship is required.',
            'e_relationship.string' => 'The emergency contact relationship must be a string.',
            'e_relationship.max' => 'The emergency contact relationship may not be greater than 100 characters.',
            'e_address.required' => 'The emergency contact relationship is required.',
            'e_address.string' => 'The emergency contact relationship must be a string.',
            'e_address.max' => 'The emergency contact relationship may not be greater than 100 characters.',
        ];
    }
}

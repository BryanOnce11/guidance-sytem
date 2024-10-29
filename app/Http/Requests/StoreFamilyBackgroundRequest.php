<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyBackgroundRequest extends FormRequest
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

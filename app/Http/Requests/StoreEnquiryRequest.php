<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'program_interested' => 'required',
            'entry_semester' => 'required',
            'current_education' => 'required',
            'school_name' => 'required',
            'email' => 'required|string|max:255',
            'direct_message' => 'required|string|max:255',
            'where_did_you_hear' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'nationality.required' => 'Please enter your nationality.',
            'program_interested.required' => 'Please enter the program you are interested in.',
            'entry_semester.required' => 'Please select a semester.',
            'current_education.required' => 'Please enter current education.',
            'school_name.required' => 'Please enter the school name.',
            'email.required' => 'Please enter the Email Address.',
            'direct_message.required' => 'Please enter a message to send to us.',
            'where_did_you_hear.required' => 'Please fill in where you heard about us.',
        ];
    }
}

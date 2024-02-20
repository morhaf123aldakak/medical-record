<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'first_name'=>['required' , 'string'],
            'last_name'=>['required','string'],
            'email'      => ['required' , 'email' , 'unique:users,email'],
            'city'=>['nullable','string'],
            'dob'=>['nullable','string'],
            'country'=>['nullable','string'],
            'gender'=>['required','string'],
            'address'=>['nullable','string'],
            'mobile'=>['required','integer'],
            'zipcode'=>['nullable','string'],
            'Relationship_Status'=>['nullable','string'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Diseases extends FormRequest
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
            'patient_history_id'=>['required' , 'exists:patientHistory,id'],
            'name'=>['required' , 'string'],
            'symptoms'=>['required' , 'string'],
            'Feeling_sick_date'=>['required' , 'string'],
            'medicines'=>['required' , 'string'],
        ];
    }
}

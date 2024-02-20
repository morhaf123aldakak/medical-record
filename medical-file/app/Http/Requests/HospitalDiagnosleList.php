<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospitalDiagnosleList extends FormRequest
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
            'lap_address'=>['nullable','string'],
            'lap_phone'=>['nullable','string'],
            'lap_mobile'=>['required','numeric'],
            'lap_email'=>['nullable','string'],
            'note '=>['nullable','string'],
            'hospital_dep_id'=>['nullable','exists:hospital_deps,id'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionRequest extends FormRequest
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
            'bed_id'=>['required','integer'],
            'admission_data'=>['required','date'],
            'discharge_data'=>['required','date'],
            'total_cost'=>['required','integer'],
            'note'=>['required','string'],
        ];
    }
}

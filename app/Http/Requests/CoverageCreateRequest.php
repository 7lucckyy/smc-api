<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoverageCreateRequest extends FormRequest
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
            'cycle' => 'required',
            'day' => 'required',
            'file' => 'required|mimes:xlsx',
        ];
    }

    public function messages(){
        return [
            'cycle.required' => 'Select the activity cycle',
            'day.required' => 'Kindly ensure you select the implemetation day',
            'file.requred' => 'Kindly upload Excel file',
        ];
    }
}

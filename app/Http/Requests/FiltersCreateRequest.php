<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiltersCreateRequest extends FormRequest
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
            'cycle' => 'string',
            'day' => 'string',           
        ];
    }

    public function messages(){
        return [
            'cycle.string' => 'Select the activity cycle',
            'day.string' => 'Kindly ensure you select the implemetation day',
        ];
    }
}

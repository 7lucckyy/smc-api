<?php

namespace App\Http\Requests\Base;

use App\Http\Requests\Base\BaseRequest;


class StoreRequest extends BaseRequest
{
    
    
   /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cycle' => 'required|integer',
            'day' => 'required|integer',
            'file' => 'required|mimes:xlsx',
           
        ];
    }

    public function messages(){
        return [
            'cycle.require' => 'Select the activity cycle',
            'cycle.integer' => 'Kindly provide the cycle as number',
            'day.require' => 'Kindly ensure you select the implementation day',
            'day.integer' => 'Kindly provide the day as number',
            'file.required' => 'Kindly upload Excel file'
        ];
    }
}

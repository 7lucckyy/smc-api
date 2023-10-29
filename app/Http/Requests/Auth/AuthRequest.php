<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;


class AuthRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
  
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required',
        ];
    }

    public function customisedValidationMessages(): array{
        return [
            'email.required' => 'Kindly provide your email address',
            'password.required' => 'Password cannot be blank',
        ];
    }
}

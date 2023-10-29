<?php

namespace App\Http\Requests\V1\Users;

use App\Http\Requests\Base\BaseRequest;


class CreateUserRequest extends BaseRequest
{
  
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'state' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function customValidatedMessages(): array {
        return [
            'name.required' => 'Name cannot be blank',
            'email.required' => 'Email address cannot be blank',
            'email.email' => 'Invalid email format',
            'email.unique' => 'Email address already exists',
            'state.required' => 'State Name cannot be blank',
            'password.required' => 'Password field must be fill',
        ];
    }
}

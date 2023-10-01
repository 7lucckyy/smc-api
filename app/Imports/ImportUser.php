<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;


class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $request = request()->all();
        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'password' => bcrypt($row[2]),
            'cycle' => $request['cycle'],
        ]);
        
    }

    public function rules() : array {
        return [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
        ];
       
    }

    public function customValidationMessages(){
        return [
            'name.required' => 'Name must be provided',
            'email.required' => 'Email address is required field',
            'password' => 'Password also is required',
        ];
    }
}

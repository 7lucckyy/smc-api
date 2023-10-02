<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthCreateRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(AuthCreateRequest $request){
        $Data = $request->all();

        $user = User::create([
            'name' => $Data['name'],
            'email' => $Data['email'],
            'state' => $Data['state'],
            'password' => bcrypt($Data['password']),
        ]);

        $token = $user->createToken('secretTokenAccess')->plainTextToken;

        return response()->json([
            'Success' => true,
            'Message' => 'User Created Successfully',
            'Data' => $user,
            'Token' => $token
        ]);
    }
}

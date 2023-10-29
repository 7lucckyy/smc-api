<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\V1\Users\CreateUserRequest;


class AuthController extends Controller
{
    public function register(CreateUserRequest $request){
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

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'Success' => true,
            'Message' => 'Logout Successfully'
        ], 200);
    }


    public function login(AuthRequest $request)
    {
        $data = $request->all();

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'Success' => false,
                'Message' => 'incorrect username or password'
            ], 401);
        }

        $token = $user->createToken('apiToken')->plainTextToken;

        return response()->json([
            'Success' => true,
            'Message' => 'Login Success',
            'user' => $user,
            'token' => $token
        ], 201);
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Register Method
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'phone' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password)
            ]);

            $user->assignRole('user');

            $token = $user->createToken('auth')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'User registered',
                'data' => [
                    'user' => $user,
                    'role' => $user->getRoleNames(),
                    'token' => $token,
                    'email_verified' => $user->hasVerifiedEmail()
                ],
            ]);
        } catch (\Exception $er) {
            return response()->json([
                'status' => false,
                'message' => $er->getMessage(),
                'code' => 500
            ], 500);
        }
    }
}

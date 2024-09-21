<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class SigninController extends Controller
{
    /**
     * Signin Method
     */
    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('auth')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'User authenticated',
                'data' => [
                    'user' => $user,
                    'token' => $token,
                    'role' => $user->getRoleNames(),
                ]
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials',
                'code' => 401
            ], 401);
        }
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $google = Socialite::driver('google')->user();
            $user = User::firstOrCreate([
                'email' => $google->email
            ], [
                'name' => $google->name,
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ]);

            if (empty($user->getRoleNames())) {
                $user->assignRole('user');
            }

            return response()->json([
                'status' => true,
                'message' => 'User authenticated',
                'data' => [
                    'user' => $user,
                    'token' => $user->createToken('auth')->plainTextToken,
                    'role' => $user->getRoleNames(),
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'code' => 500
            ], 500);
        }
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SigninController extends Controller
{
    /**
     * Signin Method
     */
    public function auth(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        if(Auth::attempt($request->only('email', 'password'))){
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
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials',
                'code' => 401
            ], 401);
        }
    }
}

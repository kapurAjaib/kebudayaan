<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Send email to reset password
     */
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'code' => 400
            ], 400);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Email not found',
                'code' => 404
            ], 404);
        } else {
            try {
                $token = Str::random(60);
                $data = [
                    "token" => $token,

                ];
                DB::table('password_reset_tokens')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => now()->addMinute(5)
                ]);
                Mail::to($user->email)->send(new ForgotPassword($data));

                return response()->json([
                    'status' => true,
                    'message' => 'Email sent',
                    'code' => 200
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage(),
                    'code' => 500
                ], 500);
            }
        }
    }

    /**
     * Reset password
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if (validator()->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'code' => 400
            ], 400);
        }
        try {
            $user = User::where('email', $request->email)->firstOrFail();
            $token = DB::table('password_reset_tokens')->where('email', $request->email)->where('token', $request->token)->firstOrFail();

            if (now() > $token->created_at) {
                return response()->json([
                    'status' => false,
                    'message' => 'Token expired',
                    'code' => 400
                ], 400);
            }

            $user->password = bcrypt($request->password);
            $user->save();

            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Password has been reset',
                'code' => 200
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'code' => 500
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Auth\VerifyEmail;
use App\Models\User;
use App\Models\VerifyEmail as ModelsVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class VerifyEmailController extends Controller
{
    /**
     * email activation code
     */
    public function verify(Request $request)
    {
        $user = User::find($request->user()->id);
        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'status' => false,
                'message' => 'Email already verified',
                'code' => 400
            ], 400);
        } else {
            try {
                $data = [
                    'user' => $request->user(),
                    'code' => rand(100000, 999999)
                ];

                ModelsVerifyEmail::create([
                    'user_id' => $request->user()->id,
                    'code' => $data['code'],
                    'expired_at' => now()->addMinutes(5)
                ]);

                Mail::to($request->user()->email)->send(new VerifyEmail($data));
                return response()->json([
                    'status' => true,
                    'message' => 'Email verification sent',
                    'activation_code' => $data['code'],
                    'code' => 200
                ], 200);
            } catch (\Exception $er) {
                return response()->json([
                    'status' => false,
                    'message' => $er->getMessage(),
                    'code' => 500
                ], 500);
            }
        }
    }

    /**
     * email verification
     */
    public function verified(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $verification = ModelsVerifyEmail::where('code', $request->code)->where('user_id', $request->user()->id)->first();

        if (!$verification) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid verification code',
                'code' => 400
            ], 400);
        } elseif ($verification->expired_at < now()) {
            return response()->json([
                'status' => false,
                'message' => 'Verification code expired',
                'code' => 400
            ], 400);
        } else {
            try {
                $user = User::find($request->user()->id);
                $user->markEmailAsVerified();

                $verification->delete();

                return response()->json([
                    'status' => true,
                    'message' => 'Email verified',
                    'code' => 200
                ], 200);
            } catch (\Exception $er) {
                return response()->json([
                    'status' => false,
                    'message' => $er->getMessage(),
                    'code' => 500
                ], 500);
            }
        }
    }
}

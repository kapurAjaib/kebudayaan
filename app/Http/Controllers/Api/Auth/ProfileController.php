<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display user profile.
     */
    public function index(Request $request)
    {
        $user = User::find($request->user()->id);
        return response()->json([
            'status' => true,
            'message' => 'Profile data',
            'data' => $user,
            'role' => $user->getRoleNames(),
        ], 200);
    }

    /**
     * Update user profile.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:dns|unique:user,email,' . $request->user()->id,
            'name' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages(),
                'code' => 422
            ], 422);
        }

        try {
            $user = User::find($request->user()->id);
            if ($request->email != $user->email) {
                $user->email_verified_at = null;
            }
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Profile updated',
                'data' => $user,
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

    /**
     * Remove user profile.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                'status' => true,
                'message' => 'Profile deleted',
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

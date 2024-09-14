<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Show users who have the user role
     */
    public function user()
    {
        try {
            $user = User::role('user')->get();
            return response()->json([
                'status' => true,
                'message' => 'User data',
                'data' => $user,
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
     * Show users who have the writer role
     */
    public function writer(){
        try {
            $writer = User::role('writer')->get();
            return response()->json([
                'status' => true,
                'message' => 'Writer data',
                'data' => $writer,
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

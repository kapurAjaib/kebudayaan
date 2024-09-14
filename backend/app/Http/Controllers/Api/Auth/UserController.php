<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Show all user.
     */
    public function index()
    {
        try {
            $users = User::withoutRole('admin')->get();
            return response()->json([
                'status' => true,
                'message' => 'User data',
                'data' => $users,
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Create new user.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email:dns|unique:users,email',
            'name' => 'required',
            'phone' => 'nullable|numeric',
            'password' => 'required|confirmed:min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        try {
            $user = new User();
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt('password')
            ]);
            $user->save();

            $user->assignRole('user');

            return response()->json([
                'status' => true,
                'message' => 'User created',
                'data' => $user,
                'code' => 201
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'code' => 500
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::find($id);
            if (in_array('admin', $user->getRoleNames()->toArray())) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found',
                    'code' => 404
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'User data',
                'data' => $user,
                'role' => $user->getRoleNames(),
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookmarkController extends Controller
{
    /**
     * Show bookmark data.
     */
    public function index(Request $request)
    {
        Bookmark::where('user_id', $request->user()->id)->get();
        return response()->json([
            'status' => true,
            'message' => 'Bookmark data',
            'data' => Bookmark::where('user_id', $request->user()->id)->get(),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Create a new bookmarks
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'culture_id' => 'required|numeric',
            'user_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'code' => 400
            ], 400);
        }

        try {
            $bookmark = new Bookmark();
            $bookmark->culture_id = $request->culture_id;
            $bookmark->user_id = $request->user()->id;
            $bookmark->save();

            return response()->json([
                'status' => true,
                'message' => 'Bookmark data has been created',
                'data' => $bookmark,
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
        //
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
        try {
            $bookmark = Bookmark::find($id);
            if($bookmark->user_id != $request->user()->id) {
                return response()->json([
                    'status' => false,
                    'message' => 'You are not authorized to update this bookmark',
                    'code' => 403
                ], 403);
            }
            $bookmark->culture_id = $request->culture_id;
            $bookmark->user_id = $request->user()->id;

            $bookmark->save();

            return response()->json([
                'status' => true,
                'message' => 'Bookmark data has been updated',
                'data' => $bookmark,
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

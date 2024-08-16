<?php

use App\Http\Controllers\api\auth\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix(env("API_VERSION"))->middleware(['auth:sanctum'])->group(function () {
    Route::resource('profile', ProfileController::class);
});
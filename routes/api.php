<?php

use App\Http\Controllers\api\RegisterController;
use App\Http\Controllers\api\SigninController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix(env("API_VERSION"))->middleware('guest')->group(function(){
    Route::post('signin', [SigninController::class, 'auth'])->name('api.signin');
    Route::post('signup', [RegisterController::class, 'register'])->name('api.signup');
});

require __DIR__.'/api/auth/auth.php';
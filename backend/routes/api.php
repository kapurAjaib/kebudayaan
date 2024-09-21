<?php

use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SigninController;
use App\Http\Controllers\ContactController;
use Illuminate\Foundation\Inspiring;
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

Route::get('/', function () {
    return response()->json([
        'status' => true,
        'message' => Inspiring::quotes()[rand(0, 39)],
        'code' => 200
    ], 200);
});

Route::prefix(env("API_VERSION"))->middleware('guest')->group(function () {
    Route::post('signin', [SigninController::class, 'auth'])->name('api.signin');
    Route::post('signup', [RegisterController::class, 'register'])->name('api.signup');
    Route::post('contactus', [ContactController::class, 'contactUs'])->name('api.contactus');
    Route::post('forgot-password', [ForgotPasswordController::class, 'send'])->name('user')->middleware('throttle:6,1');
    Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password')->middleware('throttle:6,1');
});

require __DIR__ . '/api/auth/auth.php';
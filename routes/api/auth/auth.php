<?php

use App\Http\Controllers\Api\Auth\BookmarkController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;
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
    Route::resource('profile', ProfileController::class)->only('index', 'update', 'destroy');
    Route::post('verify-email', [VerifyEmailController::class, 'verify'])->name('api.verify-email')->middleware('throttle:6,1');
    Route::post('verified-email', [VerifyEmailController::class, 'verified'])->name('api.verified-email');
    Route::resource('bookmark', BookmarkController::class)->only('index', 'store', 'update');
});
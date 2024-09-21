<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SigninController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('auth/google', [SigninController::class, 'google'])->name('api.signin.google');
Route::get('auth/google/callback', [SigninController::class, 'googleCallback'])->name('api.signin.google.callback');

Route::get('/', function(){
    return abort(403, "Forbidden");
});

require __DIR__ . '/auth.php';

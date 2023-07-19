<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('documentation');
});

Route::post('/register', [UserController::class, 'saveUser']);

Route::get('/generate-token', function () {
    return view('generate-token');
})->name('generate-token');

Route::post('/login', [UserController::class, 'loginUser']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
});
Route::middleware('throttle:5,60')->group(function () {
    Route::post('/generate-token', [UserController::class, 'generateToken']);
});

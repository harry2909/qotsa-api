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

Route::post('/login', [UserController::class, 'loginUser'])->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
});
Route::middleware('throttle:20,60')->group(function () {
    Route::get('/generate-token', [UserController::class, 'generateToken']);
});

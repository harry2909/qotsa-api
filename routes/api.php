<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Return random lyrics
Route::middleware('auth:sanctum')->get('/lyrics', [APIController::class, 'returnRandomLyrics']);

// Return random song
Route::middleware('auth:sanctum')->get('/song', [APIController::class, 'returnRandomSong']);

// Return random album
Route::middleware('auth:sanctum')->get('/album', [APIController::class, 'returnRandomAlbum']);

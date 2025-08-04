<?php

use App\Http\Controllers\PollController;
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

Route::get('/', [PollController::class, 'index']);
Route::post('/poll/create', [PollController::class, 'store']);
Route::post('/poll/{poll:poll_uid}/vote', [PollController::class, 'vote']);
Route::get('/poll/{poll:poll_uid}', [PollController::class, 'show']);

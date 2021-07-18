<?php

use App\Http\Controllers\ChatController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::inertia('/', 'Home')->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
    Route::post('/token', [ChatController::class, 'token']);
    Route::post('/call', [ChatController::class, 'call']);
});
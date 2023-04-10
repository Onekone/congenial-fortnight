<?php

use App\Http\Controllers as Cont;
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

Route::middleware('auth')->name('questions.')->group(function () {
    Route::get('/', [Cont\ProphecyController::class, 'index'])->middleware('auth')->name('index');
    Route::post('/', [Cont\ProphecyController::class, 'question'])->middleware('auth')->name('ask');
});


Route::post('/logout', [Cont\LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('')->name('login.')->group(function () {

    Route::get('/login', [Cont\LoginController::class, 'loginView'])->name('view')->middleware('guest');
    Route::post('/login', [Cont\LoginController::class, 'login'])->name('auth')->middleware('guest');

    Route::prefix('/login/{driver}')->middleware('guest')->name('socialite.')->group(function () {
        Route::get('/', [Cont\LoginController::class, 'socialite'])->name('index');
        Route::get('/callback', [Cont\LoginController::class, 'socialiteCallback'])->name('callback');
    })->whereIn('driver', ['vkontakte']);
});
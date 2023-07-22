<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/',
    [\App\Http\Controllers\MainPageController::class, 'show'])->name('main');
Route::get('/requests',
    [\App\Http\Controllers\SendReqPageController::class, 'show'])->name('req');
Route::post('/requests/submit', [
    \App\Http\Controllers\SendReqPageController::class, 'send'])->name('req_send');

Route::middleware('guest')->group(function (){

    Route::get('/register',
        [\App\Http\Controllers\RegisterController::class, 'create'])->name('register');
    Route::post('/register',
        [\App\Http\Controllers\RegisterController::class, 'store']);

    Route::get('/login',
        [\App\Http\Controllers\LoginController::class, 'create'])->name('login');
    Route::post('/login',
        [\App\Http\Controllers\LoginController::class, 'store']);

});

Route::middleware('auth')->group(function () {
    Route::get('/logout',
        [\App\Http\Controllers\MainPageController::class, 'logout'])->name('logout');
    Route::get('/show',
        [\App\Http\Controllers\ShowReqPageController::class, 'show'])->name('show');
    Route::get('/show/active',
        [\App\Http\Controllers\ShowReqPageController::class, 'show_active'])->name('show_active');
    Route::get('/show/resolved',
        [\App\Http\Controllers\ShowReqPageController::class, 'show_resolved'])->name('show_resolved');
    Route::get('/show/oldest',
        [\App\Http\Controllers\ShowReqPageController::class, 'byDateNewest'])->name('byDateNewest');
    Route::get('/show/msg-{id}',
        [\App\Http\Controllers\ShowReqPageController::class, 'showMessage'])->name('showMessage');
    Route::get('/show/msg-{id}/answer',
        [\App\Http\Controllers\ShowReqPageController::class, 'answerMessage'])->name('answerMessage');
    Route::post('/show/msg-{id}/answer',
        [\App\Http\Controllers\ShowReqPageController::class, 'answerMessageSend'])->name('answerMessage_send');
});

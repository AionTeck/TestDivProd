<?php

use App\Http\Controllers\Login\LoginCreateController;
use App\Http\Controllers\Login\LoginStoreController;
use App\Http\Controllers\main\MainPageLogoutController;
use App\Http\Controllers\main\MainPageShowController;
use App\Http\Controllers\Register\RegisterCreateController;
use App\Http\Controllers\Register\RegisterStoreController;
use App\Http\Controllers\SendRequest\SendReqController;
use App\Http\Controllers\SendRequest\ShowSendController;
use App\Http\Controllers\ShowRequest\ActiveController;
use App\Http\Controllers\ShowRequest\AnswerMessageController;
use App\Http\Controllers\ShowRequest\AnswerSendController;
use App\Http\Controllers\ShowRequest\MessageController;
use App\Http\Controllers\ShowRequest\NewestController;
use App\Http\Controllers\ShowRequest\ResolvedController;
use App\Http\Controllers\ShowRequest\ShowController;
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
    [MainPageShowController::class, '__invoke'])->name('main');
Route::get('/requests',
    [ShowSendController::class, '__invoke'])->name('req');
Route::post('/requests/submit', [
    SendReqController::class, '__invoke'])->name('req_send');

Route::middleware('guest')->group(function () {
    Route::get('/register',
        [RegisterCreateController::class, '__invoke'])->name('register');
    Route::post('/register',
        [RegisterStoreController::class, '__invoke']);

    Route::get('/login',
        [LoginCreateController::class, '__invoke'])->name('login');
    Route::post('/login',
        [LoginStoreController::class, '__invoke']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [MainPageLogoutController::class, '__invoke'])->name('logout');
    Route::get('/show', [ShowController::class, '__invoke'])->name('show');
    Route::get('/show/active', [ActiveController::class, '__invoke'])->name('show_active');
    Route::get('/show/resolved', [ResolvedController::class, '__invoke'])->name('show_resolved');
    Route::get('/show/oldest', [NewestController::class, '__invoke'])->name('byDateNewest');
    Route::get('/show/msg-{id}', [MessageController::class, '__invoke'])->name('showMessage');
    Route::get('/show/msg-{id}/answer', [AnswerMessageController::class, '__invoke'])->name('answerMessage');
    Route::post('/show/msg-{id}/answer', [AnswerSendController::class, '__invoke'])->name('answerMessage_send');
});

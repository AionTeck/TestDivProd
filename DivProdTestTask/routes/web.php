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

Route::get('/show',
    [\App\Http\Controllers\ShowReqPageController::class, 'show'])->name('show');
Route::get('/show/msg-{id}',
    [\App\Http\Controllers\ShowReqPageController::class, 'showMessage'])->name('showMessage');
Route::get('/show/msg-{id}/answer',
    [\App\Http\Controllers\ShowReqPageController::class, 'answerMessage'])->name('answerMessage');
Route::post('/show/msg-{id}/answer',
    [\App\Http\Controllers\ShowReqPageController::class, 'answerMessageSend'])->name('answerMessage_send');

Route::get('/requests',
    [\App\Http\Controllers\SendReqPageController::class, 'show'])->name('req');
Route::post('/requests/submit', [
    \App\Http\Controllers\SendReqPageController::class, 'send'])->name('req_send');

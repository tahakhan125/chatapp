<?php

use App\Http\Controllers\Auth\AuthenticatedSessionApiController;
use App\Http\Controllers\Auth\RegisterUserApiController;
use App\Http\Controllers\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//auth api
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterUserApiController::class, 'store'])
    ->name('register');

Route::post('/login', [AuthenticatedSessionApiController::class, 'store'])
    ->name('login');

Route::post('/logout', [AuthenticatedSessionApiController::class, 'destroy'])
    ->middleware('auth:sanctum')
    ->name('logout');

//room api
Route::post('create/room', [ChatController::class , 'createRoom']);
Route::post('remove/room', [ChatController::class , 'removeRoom']);
Route::post('join/room', [ChatController::class , 'joinRoom']);
Route::post('leave/room', [ChatController::class , 'leaveRoom']);
Route::get('list/room', [ChatController::class , 'listRoom']);

//messages api
Route::get('list/message', [ChatController::class , 'listMessage']);
Route::post('send/message', [ChatController::class , 'sendMessage'])->middleware(['auth:sanctum']);
Route::post('remove/message', [ChatController::class , 'removeMessage']);


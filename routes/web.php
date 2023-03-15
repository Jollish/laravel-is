<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

Route::get('/', [CustomerController::class, 'index']);
Route::get('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/login/process', [UserController::class, 'process']);

Route::post('/store', [UserController::class, 'store']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/delete/{id}', [CustomerController::class, 'delete']);
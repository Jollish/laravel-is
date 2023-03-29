<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', [CustomerController::class, 'index']);
Route::get('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/login/process', [UserController::class, 'process']);
Route::post('/store', [UserController::class, 'store']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/delete/{id}', [CustomerController::class, 'delete']);

Route::get('/addCustomer', [CustomerController::class, 'addCustomer']);
Route::get('/edit/{id}', [CustomerController::class, 'edit']);
Route::post('/updateCustomer', [CustomerController::class, 'updateCustomer']);

Route::post('/saveCustomer', [CustomerController::class, 'saveCustomer']);

// Product
Route::get('/products', [ProductController::class, 'products']);
Route::get('/addProduct', [ProductController::class, 'addProduct']);
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::get('/delete/{id}', [ProductController::class, 'delete']);

Route::post('/saveProduct', [ProductController::class, 'saveProduct']);
Route::post('/updateProduct', [ProductController::class, 'updateProduct']);
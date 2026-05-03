<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CategoryController;


Route::get('/', [HomeController::class, 'utama']); 
Route::get('/register', [FormController::class, 'registerutama']);
Route::post('/welcome', [FormController::class, 'welcomeuser']);
	
Route::get('/category/create',[CategoryController::class, 'create']);
Route::post('/category',[CategoryController::class, 'store']);

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}',        [CategoryController::class, 'show']);

Route::get('/category/{id}/edit',   [CategoryController::class, 'edit']);

Route::put('/category/{id}',        [CategoryController::class, 'update']);

Route::delete('/category/{id}',     [CategoryController::class, 'destroy']);
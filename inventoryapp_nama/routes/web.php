<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;

Route::get('/', [HomeController::class, 'utama']); 
Route::get('/register', [FormController::class, 'registerutama']);
Route::post('/welcome', [FormController::class, 'welcomeuser']);

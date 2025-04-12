<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index']);
// register & login
Route::get('/register',[AuthController::class,'register']);
Route::post('/register',[AuthController::class,'store']);

Route::get('/login',[AuthController::class,'login']);
Route::Post('/login',[AuthController::class,'authenticate']);
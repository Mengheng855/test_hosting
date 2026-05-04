<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(UserController::class)->group(function(){
    Route::post('/register','register');
    
    Route::post('/login','login')->name('login');
});
Route::middleware('auth:sanctum')->group(function(){
    Route::middleware('is_admin')->group(function(){
        Route::controller(UserController::class)->group(function(){
            Route::get('/user','user');
        });
        Route::controller(ProductController::class)->group(function(){
            Route::get('/product','product');
            Route::post('/addProduct','addProduct');
        });
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PostController;
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
Route::view('/', "home");
Route::view('/home', "home");
Route::get('/inscription',[AuthController::class,'index'])->name('inscription');
Route::post('/inscription', [AuthController::class, 'store']);
Route::view('/post', "post");

Route::get('/post',[PostController::class,'index'])->name('post');
Route::post('/post', [PostController::class, 'store']);

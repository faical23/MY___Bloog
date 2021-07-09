<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//// authentification
Route::post('/Inscription/insert', [AuthController::class, 'store']);
Route::post('/Inscription/login', [AuthController::class, 'login']);

//// add post
Route::post('/post/create', [PostController::class, 'create']);
//// get posts
Route::get('/post/show/{id}', [PostController::class, 'show']);




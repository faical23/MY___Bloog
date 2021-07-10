<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CmnController;
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

//// =============>  authentification

//// inscription
Route::post('/Inscription/insert', [AuthController::class, 'store']);
///// login
Route::post('/Inscription/login', [AuthController::class, 'login']);
////// get user
Route::get('/Inscription/user/{id}', [AuthController::class, 'get_user']);


//// =============>  post crud

//// add post
Route::post('/post/create', [PostController::class, 'create']);
//// get posts
Route::get('/post/show/{id}', [PostController::class, 'show']);
//// get single post
Route::get('/post/singlepost/{id}', [PostController::class, 'singlePost']);
//// delete posts
Route::get('/post/delete/{id}', [PostController::class, 'delete']);
//// update post
Route::post('/post/update', [PostController::class, 'update']);
//// get all post
Route::get('/post/all', [PostController::class, 'all_post']);


///////// ============> commontarie

//// get commantaire
Route::get('/commontaire/all/{id}', [CmnController::class, 'show']);





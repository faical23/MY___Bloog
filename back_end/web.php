<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/about', "about",['name' => 'faical', 'age' =>25]);
Route::view('/contact', "contact");
Route::get('/profil/service={haricut}', function ($name) {
    return view('profil' ,[ 'name' => $name]);
});
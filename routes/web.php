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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/saveProduct','ProductController@saveProduct');
Route::get('/getProducts','ProductController@getProducts');
Route::post('/deleteProduct/{id}','ProductController@deleteProduct');
Route::post('/updateProduct/{id}','ProductController@updateProduct');

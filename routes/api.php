<?php

use Illuminate\Http\Request;

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

Route::get('/posts','PostsController@index')->name('posts.index');
Route::get('/posts/{post}','PostsController@show')->name('posts.show');

Route::post('/register','Auth\RegisterController@register')->name('register');
Route::post('/login','Auth\LoginController@login')->name('login');

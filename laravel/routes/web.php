<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/user/{nick}/configuracion', 'UserController@edit')->name('user.edit');
Route::patch('/user/{nick}', 'UserController@update')->name('user.update');

Route::get('/user/{nick}/upload', 'UserController@upload')->name('image.upload');
Route::patch('/user/{nick}/image', 'ImageController@create')->name('image.create');
Route::get('/user/delete_image/{id}', 'ImageController@destroy')->name('image.destroy');

Route::patch('/comment', 'CommentController@create')->name('comment.create');
Route::get('/comment/delete/{id}', 'CommentController@destroy')->name('comment.destroy');

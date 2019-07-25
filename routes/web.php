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
Auth::routes();
Route::get('/', function () {
    return redirect('/posts');
});
Route::resource('posts','PostController');
Route::post('/post/{post}/comments', 'PostCommentsController@store');

Route::post('/post/{post}/like', 'LikeController@store');
Route::delete('/post/{post}/unlike', 'LikeController@destroy');

Route::get('/profile/{user}', 'ProfileController@show');
// Route::get('/profile/{user}/edit', 'ProfileController@edit');
Route::patch('/profile/{user}/update', 'ProfileController@update');


Route::get('/search','SearchController@index');
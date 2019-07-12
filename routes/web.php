<?php

use Illuminate\Support\Facades\Redis;

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

	return redirect('/articles');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

//Article
Route::resource('/articles', 'ArticlesController');
//Tag
Route::resource('/tags', 'TagsController')->only(['show']);
//Comment
Route::post('/articles/{article}/comments', 'CommentsController@store');


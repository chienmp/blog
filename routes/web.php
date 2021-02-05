<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('posts','Admin\PostController@index')->name('post.index');
Route::get('/search','SearchController@search')->name('search');
Route::post('subcribe', 'SubcriberController@store')->name('subcriber.store');
Route::get('about', 'HomeController@about')->name('about');
Route::group(['middleware'=>'auth'], function () {
    Route::get('favorite/{id}/add', 'FavoriteController@add')->name('post.favorite');
    Route::post('comments/{post}', 'CommentController@store')->name('comment.store');
});
Route::get('/post/{id}', 'PostController@details')->name('post');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('lang/{lang}', 'LangController@changeLanguage')->name('lang');
Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'middleware'=>'admin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('tags', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('posts', 'PostController');
});
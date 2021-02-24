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
/*
Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();
Route::get('posts','PostController@index')->name('post.index');
Route::get('posts/fetch', 'PostController@fetch')->name('posts.fetch');
Route::get('/search','SearchController@search')->name('search');
Route::post('subcribe', 'SubcriberController@store')->name('subcriber.store');
Route::get('/category/{id}', 'PostController@showPostByCate')->name('cate.posts');
Route::get('tag/{id}', 'PostController@showPostByTag')->name('tag.posts');
Route::group(['middleware'=>'auth'], function () {
    Route::get('favorite/{id}/add', 'FavoriteController@add')->name('post.favorite');
    Route::post('comments/{post}', 'CommentController@store')->name('comment.store');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('update-profile', 'ProfileController@updateProfile')->name('profile.update');
    Route::get('favorite', 'FavoriteController@favorPost')->name('favor');
});
Route::get('/post/{id}', 'PostController@details')->name('post');
Route::get('/', 'HomeController@index')->name('home');
Route::get('lang/{lang}', 'LangController@changeLanguage')->name('lang');
Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'middleware'=>'admin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('tags', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::resource('subcribers', 'SubcriberController');
    Route::get('profile', 'ProfileController@index')->name('admin.profile');
    Route::post('profile-update', 'ProfileController@updateProfile')->name('profile.update');
});

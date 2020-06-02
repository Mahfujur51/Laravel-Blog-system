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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

Route::get('/post/create','PostController@create')->name('post.create');
Route::get('/post/index','PostController@index')->name('post');
Route::post('/post/store','PostController@store')->name('post.store');
Route::post('/post/update/{id}','PostController@update')->name('post.update');
Route::get('/post/trushed','PostController@trushed')->name('post.trushed');
Route::get('/post/edit/{id}','PostController@edit')->name('post.edit');
Route::get('/post/delete/{id}','PostController@destroy')->name('post.delete');
Route::get('/post/kill/{id}','PostController@kill')->name('post.kill');
Route::get('/post/restore/{id}','PostController@restore')->name('post.restore');


Route::get('/category/create','CategoryController@create')->name('category.create');
Route::post('/category/store','CategoryController@store')->name('category.store');
Route::get('/category/index','CategoryController@index')->name('category');
Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
Route::post('/category/update/{id}','CategoryController@update')->name('category.update');
Route::get('/category/delete/{id}','CategoryController@destroy')->name('category.delete');
});


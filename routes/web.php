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

Route::get('/', 'HomeController@index')->name('home');

Route::resource('article', 'ArticleController');

Route::get('/article/{id}/list', 'ArticleController@indexByUser')->name('article.list');

Route::post('/article/search', 'ArticleController@indexByKeyword')->name('article.search');

Route::get('/article/{tagId}/tag', 'ArticleController@indexByTag')->name('article.tag');
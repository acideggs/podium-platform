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

/*
 *  Route Block For Profiles
 */

Route::get('profile', 'ProfileController@show')->name('profile.show');
Route::post('profile', 'ProfileController@store')->name('profile.store');
Route::put('profile', 'ProfileController@update')->name('profile.update');

/*
 *  Route Block For Articles
 */

Route::resource('article', 'ArticleController');

Route::get('/article/{id}/list', 'ArticleController@indexByUser')->name('article.list');

Route::post('/article/search', 'ArticleController@indexByKeyword')->name('article.search');

Route::get('/article/{tagId}/tag', 'ArticleController@indexByTag')->name('article.tag');

/*
 *  Route Block For Responses
 */

Route::resource('response', 'ResponseController', ['only' => ['store', 'update', 'destroy', 'edit']]);

Route::get('/response/{id}/list', 'ResponseController@index')->name('response.list');

/**
 * Route block for Follow
 */

Route::post('/follow', 'FollowController@follow')->name('follow');
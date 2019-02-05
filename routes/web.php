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
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::resource('/','HomeController');

Auth::routes();

//Route::get('/post/search','BlogController@search');
Route::get('/post' , 'BlogController@index');
Route::get('/post/{post}' , 'BlogController@show');
Route::get('/Guest_Blog','GuestblogController@index');
Route::get('/Guest_Blog/{gpost}','GuestblogController@show');
Route::post('/Guest_Blog/new','GuestblogController@store');
Route::get('/write_with_us','GuestblogController@write');

Route::get('/initiative','InitiativeController@index');
Route::get('/initiative/{id}/image', 'InitiativeController@getImage');
Route::get('/initiative/{id}/map', 'InitiativeController@getMap');


Route::get('/programs','HomeController@programs');
Route::get('/programs/{program}','HomeController@program');

Route::get('/what_we_do' , 'WhatwedoController@index');
Route::get('/support' , 'HomeController@support');
Route::get('/person' , 'HomeController@person');

Route::get('/apply' , 'ApplyController@index');

Route::get('/about' , 'AboutusController@index');

Route::post('postContact', 'HomeController@postContact');

//
//Route::get('/home', 'HomeController@index')->name('home');
//
// Admin Area
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    require_once base_path('routes/admin.php');
});

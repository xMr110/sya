<?php


Route::get('/', function(){
return view('admin.dashboard');
})->name('dashboard');

Route::resource('settings', 'SettingsController',['only' => ['index','store']]);
Route::resource('Backgrounds','BackgroundController');



Route::resource('user','UserController');
Route::resource('initiative','InitiativeController');
Route::post('initiative/featured/{initiative}', 'InitiativeController@featured');

Route::resource('program','ProgramController');
Route::post('program/featured/{program}', 'ProgramController@featured');


Route::resource('post', 'PostController');
Route::post('post/visible/{post}', 'PostController@visible');

Route::resource('Guest_post', 'GpostController');
Route::get('Guest_post/{gpost}/approved','GpostController@approv');
Route::get('Guest_post/{gpost}/rejected','GpostController@reject');

Route::resource('what_we_do', 'WhatwedoController');

Route::resource('joinus', 'JoinusController');
Route::resource('partners', 'PartnersController');
Route::resource('Our_Team', 'OurteamsController');





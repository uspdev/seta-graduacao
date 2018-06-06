<?php
# resources
//Route::resource('editais','EditalController');

Route::get('editais', 'EditalController@index');
Route::get('editais/create', 'EditalController@create');
Route::get('editais/{edital}', 'EditalController@show');
Route::delete('editais/{edital}', 'EditalController@destroy');
Route::patch('editais/{edital}', 'EditalController@update');
Route::get('editais/{edital}/edit', 'EditalController@edit');
Route::post('editais', 'EditalController@store');

Route::get('login', 'Auth\LoginController@redirectToProvider');
Route::get('callback', 'Auth\LoginController@handleProviderCallback');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('/', 'IndexController@index');
Route::get('/arquivo', 'FileController@index');
Route::post('/arquivo/submeter', 'FileController@submit');

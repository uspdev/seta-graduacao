<?php

Route::get('login', 'Auth\LoginController@redirectToProvider');
Route::get('callback', 'Auth\LoginController@handleProviderCallback');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('/', 'IndexController@index');
Route::get('/arquivo', 'FileController@index');
Route::post('/arquivo/submeter', 'FileController@submit');

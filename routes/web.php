<?php

Route::get('/', 'IndexController@index');

# Área do Administrador
Route::resource('editais','EditalController')->parameters([
    'editais' => 'edital'
]);
/*Route::get('editais', 'EditalController@index');
Route::get('editais/create', 'EditalController@create');
Route::get('editais/{edital}', 'EditalController@show');
Route::delete('editais/{edital}', 'EditalController@destroy');
Route::patch('editais/{edital}', 'EditalController@update');
Route::get('editais/{edital}/edit', 'EditalController@edit');
Route::post('editais', 'EditalController@store');*/

#Login
Route::get('login', 'Auth\LoginController@redirectToProvider');
Route::get('callback', 'Auth\LoginController@handleProviderCallback');
Route::post('logout', 'Auth\LoginController@logout');

#Área do aluno
Route::get('/inscricao', 'TrabalhoAcademicoController@index');
Route::get('/trabacad', 'TrabalhoAcademicoController@trabAcadIndex');
Route::post('/trabacad/submeter', 'TrabalhoAcademicoController@submit');

#Área de Docentes
Route::get('/cadtema/{ano}', 'EditalController@cadTemaAluno');
Route::post('/cadtema', 'EditalController@storeTemaAluno');
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
Route::get('/cadtemagrad', 'EditalController@cadTemaAlunoGrad');
Route::post('/cadtemagrad', 'EditalController@storeTemaAlunoGrad');

#Login
Route::get('login', 'Auth\LoginController@redirectToProvider');
Route::get('callback', 'Auth\LoginController@handleProviderCallback');
Route::post('logout', 'Auth\LoginController@logout');

#Área do aluno
Route::get('/inscricao', 'TrabalhoAcademicoController@index');
Route::post('/inscricao', 'TrabalhoAcademicoController@store');
Route::get('/trabacad', 'TrabalhoAcademicoController@trabAcadIndex');
Route::post('/trabacad/submeter', 'TrabalhoAcademicoController@submit');

#Área de Docentes
Route::get('/cadtema/{ano}', 'DocenteController@cadTemaAluno');
Route::post('/cadtema/{edital}', 'DocenteController@storeTemaAluno');

#Ajax
Route::post('/ajax/TAD', 'EditalController@getTemaAlunoDocente');
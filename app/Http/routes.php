<?php

Route::get('/', 'WelcomeController@index');

Route::get('cards', 'FitnessCardController@index');
Route::patch('cards/{id}', 'FitnessCardController@update');
Route::post('cards', 'FitnessCardController@store');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

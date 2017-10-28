<?php


Auth::routes();
Route::resource('/registro','employeeController');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');

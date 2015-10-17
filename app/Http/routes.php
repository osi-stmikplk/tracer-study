<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Prinsip kita adalah terlihat, semua link agar terlihat! Semua link agar memiliki nama alias dan jelas.
|
*/

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::group(['middleware'=>'auth'], function() {

    Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    // ALUMNI
    Route::get('alumni', ['as' => 'alumni', 'uses' => 'AlumniController@index']);
    Route::get('alumni/show/{id?}', ['as' => 'alumni.show', 'uses' => 'AlumniController@show']);
    Route::get('alumni/onlyProfile/{id?}', ['as' => 'alumni.onlyProfile', 'uses' => 'AlumniController@onlyProfile']);
    Route::get('alumni/getData', ['as' => 'alumni.getData', 'uses' => 'AlumniController@getData']);
    Route::get('alumni/create', ['as' => 'alumni.create', 'uses' => 'AlumniController@create']);
    Route::put('alumni/store', ['as' => 'alumni.store', 'uses' => 'AlumniController@store']);
    Route::get('alumni/edit/{id}', ['as' => 'alumni.edit', 'uses' => 'AlumniController@edit']);
    Route::post('alumni/update/{id}', ['as' => 'alumni.update', 'uses' => 'AlumniController@update']);
});
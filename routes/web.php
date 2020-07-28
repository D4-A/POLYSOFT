<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('services','ServicesController@index');
Route::get('services/create','ServicesController@create');
Route::post('services','ServicesController@store');
Route::get('services/edit/{service}','ServicesController@edit');
Route::put('services/{service}','ServicesController@update');
Route::post('services/destroy/{service}','ServicesController@destroy');

Route::get('fonctions','FonctionsController@index');
Route::get('fonctions/create','FonctionsController@create');
Route::post('fonctions','FonctionsController@store');
Route::get('fonctions/edit/{fonction}','FonctionsController@edit');
Route::put('fonctions/{fonction}','FonctionsController@update');
Route::post('fonctions/destroy/{fonction}','FonctionsController@destroy');

Route::get('users','UsersController@index');
Route::get('users/create','UsersController@create');
Route::post('users','UsersController@store');
Route::get('users/edit/{user}','UsersController@edit');
Route::put('users/{user}','UsersController@update');
Route::post('users/destroy/{user}','UsersController@destroy');

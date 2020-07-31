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
    return view('home/index');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index');

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


Route::get('typePayements','TypePayementsController@index');
Route::get('typePayements/create','TypePayementsController@create');
Route::post('typePayements','TypePayementsController@store');
Route::get('typePayements/edit/{typePayement}','TypePayementsController@edit');
Route::put('typePayements/{typePayement}','TypePayementsController@update');
Route::post('typePayements/destroy/{typePayement}','TypePayementsController@destroy');

Route::get('patients','PatientsController@index');
Route::get('patients/create','PatientsController@create');
Route::post('patients','PatientsController@store');
Route::get('patients/edit/{patient}','PatientsController@edit');
Route::put('patients/{patient}','PatientsController@update');
Route::post('patients/destroy/{patient}','PatientsController@destroy');

Route::get('payements','PayementsController@index');
Route::get('payements/create','PayementsController@create');
Route::post('payements','PayementsController@store');
Route::get('payements/edit/{payement}','PayementsController@edit');
Route::put('payements/{payement}','PayementsController@update');
Route::post('payements/destroy/{payement}','PayementsController@destroy');

Route::get('consultations','ConsultationsController@index');
Route::get('consultations/create','ConsultationsController@create');
Route::post('consultations','ConsultationsController@store');
Route::get('consultations/edit/{consultation}','ConsultationsController@edit');
Route::get('consultations/show/{consultation}','ConsultationsController@show');
Route::put('consultations/{consultation}','ConsultationsController@update');
Route::post('consultations/destroy/{consultation}','ConsultationsController@destroy');

Route::get('examens','ExamensController@index');
Route::get('examens/create','ExamensController@create');
Route::post('examens','ExamensController@store');
Route::get('examens/edit/{examen}','ExamensController@edit');
Route::put('examens/{examen}','ExamensController@update');
Route::post('examens/destroy/{examen}','ExamensController@destroy');

Route::get('emails','EmailsController@index');
Route::get('emails/create','EmailsController@create');
Route::post('emails/send','EmailsController@send');
Route::post('sendp','EmailsController@senddeux');
Route::post('emails','EmailsController@store');
Route::post('emails/destroy/{email}','EmailsController@destroy');

Route::get('download/{patient}/{consultation}/{filename}', 'ConsultationsController@download');

Route::get('profile','ProfilesController@index');
Route::get('profile/edit/{profile}','ProfilesController@edit');
Route::put('profile/{profile}','ProfilesController@update');

Route::get('creneaux','CreneauxController@index');
Route::get('creneaux/create','CreneauxController@create');
Route::post('creneaux','CreneauxController@store');
Route::get('creneaux/edit/{creneau}','CreneauxController@edit');
Route::put('creneaux/{creneau}','CreneauxController@update');
Route::post('creneaux/destroy/{creneau}','CreneauxController@destroy');

Route::get('rendezVous','RendezVousController@index');
Route::get('rendezVous/create','RendezVousController@create');
Route::post('rendezVous','RendezVousController@store');
Route::get('rendezVous/edit/{rendezvous}','RendezVousController@edit');
Route::put('rendezVous/{rendezvous}','RendezVousController@update');
Route::post('rendezVous/destroy/{rendezvous}','RendezVousController@destroy');

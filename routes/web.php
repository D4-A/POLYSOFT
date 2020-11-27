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


Route::get('typePaiements','TypePaiementsController@index');
Route::get('typePaiements/create','TypePaiementsController@create');
Route::post('typePaiements','TypePaiementsController@store');
Route::get('typePaiements/edit/{typePaiement}','TypePaiementsController@edit');
Route::put('typePaiements/{typePaiement}','TypePaiementsController@update');
Route::post('typePaiements/destroy/{typePaiement}','TypePaiementsController@destroy');

Route::get('patients','PatientsController@index');
Route::get('patients/create','PatientsController@create');
Route::post('patients','PatientsController@store');
Route::get('patients/edit/{patient}','PatientsController@edit');
Route::put('patients/{patient}','PatientsController@update');
Route::post('patients/destroy/{patient}','PatientsController@destroy');

Route::get('paiements','PaiementsController@index');
Route::get('paiements/create','PaiementsController@create');
Route::post('paiements','PaiementsController@store');
Route::get('paiements/edit/{paiement}','PaiementsController@edit');
Route::put('paiements/{paiement}','PaiementsController@update');
Route::post('paiements/destroy/{paiement}','PaiementsController@destroy');

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
Route::get('ajaxfiles','ExamensController@ajaxfiles');

Route::get('emails','EmailsController@index');
Route::get('emails/create','EmailsController@create');
Route::post('emails/send','EmailsController@send');
Route::post('sendp','EmailsController@senddeux');
Route::post('emails','EmailsController@store');
Route::post('emails/destroy/{email}','EmailsController@destroy');

Route::get('download/{patient}/{consultation}/{filename}',
           'ConsultationsController@download');

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
Route::put('rendezVous','RendezVousController@refresh');
Route::post('rendezVous','RendezVousController@store');
Route::get('rendezVous/edit/{rendezvous}','RendezVousController@edit');
Route::get('rendezVous/refresh/{id}','RendezVousController@actualiser');
Route::put('rendezVous/{rendezvous}','RendezVousController@update');
Route::post('rendezVous/destroy/{rendezvous}','RendezVousController@destroy');
Route::get('rendezVous/cons/{rendezvous}','RendezVousController@cons');

Route::get('rapport','RapportsControllers@index');
Route::get('rapport/create','RapportsControllers@create');
Route::post('rapport','RapportsControllers@store');


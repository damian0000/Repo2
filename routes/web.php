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


Route::middleware(['auth'])->group(function () {

    //--------------all users----------------------
    Route::get('/users', 'App\Http\Controllers\UserController@index');
    Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');

    //--------------assistants-----------------------
    Route::get('/assistants', 'App\Http\Controllers\AssistantController@index')->name('assistants');
    Route::get('/assistants/create', 'App\Http\Controllers\AssistantController@create')->name('create_assistants');
    Route::post('/assistants/save', 'App\Http\Controllers\AssistantController@store')->name('save_assistants');
    Route::get('/assistants/delete/{id}', 'App\Http\Controllers\AssistantController@delete')->name('delete_assistants');
    Route::get('/assistants/edit/{id}', 'App\Http\Controllers\AssistantController@edit');

    Route::post('/assistants/edit/', 'App\Http\Controllers\AssistantController@editStore')->name('save_edit_assistants');

    Route::get('/assistants/{id}', 'App\Http\Controllers\AssistantController@show');


    //----------------patients---------------------------
    Route::get('/patients', 'App\Http\Controllers\PatientController@index')->name('patients');
    Route::get('/patients/create', 'App\Http\Controllers\PatientController@create')->name('create_patients');
    Route::post('/patients/save', 'App\Http\Controllers\PatientController@store')->name('save_patients');

    Route::get('/patients/edit/{id}', 'App\Http\Controllers\PatientController@edit');

    Route::post('/patients/edit/', 'App\Http\Controllers\PatientController@editStore')->name('save_edit_patients');

    Route::get('/patients/{id}', 'App\Http\Controllers\PatientController@show');


    //--------------company---------------------------------
    Route::get('/companies', 'App\Http\Controllers\CompanyController@index')->name('companies');
    Route::get('/companies/create', 'App\Http\Controllers\CompanyController@create')->name('create_company');
    Route::post('/companies/save', 'App\Http\Controllers\CompanyController@store')->name('save_company');

 //--------------visit---------------------------------
    Route::get('/visits', 'App\Http\Controllers\VisitController@index')->name('visits');;
    Route::get('/visits/create', 'App\Http\Controllers\VisitController@create')->name('create_visits');
    Route::post('/visits/save', 'App\Http\Controllers\VisitController@store')->name('save_visits');

    Route::get('/visits/edit/{id}', 'App\Http\Controllers\VisitController@edit');

    Route::post('/visits/edit/', 'App\Http\Controllers\VisitController@editStore')->name('save_edit_visits');
    Route::get('/visits/delete/{id}', 'App\Http\Controllers\VisitController@delete')->name('delete_visits');
    Route::get('/visits/details/{id}', 'App\Http\Controllers\VisitController@details')->name('details_visits');

    Route::get('/visits/pdf', 'App\Http\Controllers\PdfController@generatePDF')->name('generate_pdf');
});


Route::post('/new/patients', 'App\Http\Controllers\PatientController@newStore')->name('quest_patients');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

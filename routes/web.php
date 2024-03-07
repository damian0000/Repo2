<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\VisitController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {

    //--------------all users----------------------
    Route::get('/users', 'App\Http\Controllers\UserController@index');
    Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');

    route::prefix('asystenci')->name('assistants.')->controller(AssistantController::class)->group((function()
    {
        //--------------assistants-----------------------
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/save', 'store')->name('store');
        Route::put('/update/{userId}', 'update')->name('update');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/addPatient/{id}', 'addPatient')->name('addPatient');
        //Route::get('/delete/{id}',  'delete')->name('delete');
    }));


    route::prefix('podopieczni')->name('patients.')->controller(PatientController::class)->group((function()
    {
        //--------------patients-----------------------
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/save', 'store')->name('store');
        Route::put('/update/{userId}', 'update')->name('update');
        Route::get('/{id}', 'show')->name('show');
        //Route::get('/delete/{id}',  'delete')->name('delete');
    }));
    

    route::prefix('organizacje')->name('companies.')->controller(CompanyController::class)->group((function()
    {
        //--------------companies-----------------------
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/save', 'store')->name('store');
        Route::put('/update/{companyId}', 'update')->name('update');
        //Route::get('/{id}', 'show')->name('show');
        //Route::get('/delete/{id}',  'delete')->name('delete');
    }));
   
    route::prefix('projekty')->name('projects.')->controller(ProjectController::class)->group((function()
    {
        //--------------companies-----------------------
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/save', 'store')->name('store');
        Route::put('/update/{projectId}', 'update')->name('update');
        //Route::get('/{id}', 'show')->name('show');
        //Route::get('/delete/{id}',  'delete')->name('delete');
    }));

    route::prefix('wizyty')->name('visits.')->controller(VisitController::class)->group((function()
    {
        //--------------companies-----------------------
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/save', 'store')->name('store');
        Route::put('/update/{visitId}', 'update')->name('update');
        //Route::get('/{id}', 'show')->name('show');
        //Route::get('/delete/{id}',  'delete')->name('delete');
    }));
 //--------------visit---------------------------------
    // Route::get('/visits', 'App\Http\Controllers\VisitController@index')->name('visits');;
    // Route::get('/visits/create', 'App\Http\Controllers\VisitController@create')->name('create_visits');
    // Route::post('/visits/save', 'App\Http\Controllers\VisitController@store')->name('save_visits');

    // Route::get('/visits/edit/{id}', 'App\Http\Controllers\VisitController@edit');

    // Route::post('/visits/edit/', 'App\Http\Controllers\VisitController@editStore')->name('save_edit_visits');
    // Route::get('/visits/delete/{id}', 'App\Http\Controllers\VisitController@delete')->name('delete_visits');
    // Route::get('/visits/details/{id}', 'App\Http\Controllers\VisitController@details')->name('details_visits');

    Route::get('/visits/pdf', 'App\Http\Controllers\PdfController@generatePDF')->name('generate_pdf');
});


Route::post('/new/patients', 'App\Http\Controllers\PatientController@newStore')->name('quest_patients');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

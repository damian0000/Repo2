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
//prefix
Route::prefix('admin')->group(function(){
    Route::get('/test', function () {
        return "test admin";
    })->name('testowaTrasa');
});
//--------------all users----------------------
Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');

//--------------assistants-----------------------
Route::get('/assistants', 'App\Http\Controllers\AssistantController@index')->name('assistants');
Route::get('/assistants/create', 'App\Http\Controllers\AssistantController@create')->name('create_assistants');
Route::post('/assistants/save', 'App\Http\Controllers\AssistantController@store')->name('save_assistants');


Route::get('/assistants/edit/{id}', 'App\Http\Controllers\AssistantController@edit');
Route::get('/assistants/{id}', 'App\Http\Controllers\AssistantController@show');


//----------------patients---------------------------
Route::get('/patients', 'App\Http\Controllers\PatientController@index');
Route::get('/patients/{id}', 'App\Http\Controllers\PatientController@show');


//--------------company---------------------------------
Route::get('/companies', 'App\Http\Controllers\CompanyController@index')->name('companies');
Route::get('/companies/create', 'App\Http\Controllers\CompanyController@create')->name('create_company');
Route::post('/companies/save', 'App\Http\Controllers\CompanyController@store')->name('save_company');


Route::get('/services', 'App\Http\Controllers\ServiceController@index');

Route::get('/visits', 'App\Http\Controllers\VisitController@index');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

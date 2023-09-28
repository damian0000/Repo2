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

Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');


Route::get('/assistants', 'App\Http\Controllers\AssistantController@index');
Route::get('/assistants/create', 'App\Http\Controllers\AssistantController@create');
Route::get('/assistants/edit/{id}', 'App\Http\Controllers\AssistantController@edit');
Route::get('/assistants/{id}', 'App\Http\Controllers\AssistantController@show');

Route::get('/patients', 'App\Http\Controllers\PatientController@index');

Route::get('/patients/{id}', 'App\Http\Controllers\PatientController@show');


Route::get('/services', 'App\Http\Controllers\ServiceController@index');

Route::get('/visits', 'App\Http\Controllers\VisitController@index');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
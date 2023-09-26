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

Route::get('/assistants', 'App\Http\Controllers\UserController@index');

Route::get('/assistants/create', 'App\Http\Controllers\UserController@create');

Route::get('/assistants/edit/{id}', 'App\Http\Controllers\UserController@edit');

Route::get('/assistants/{id}', 'App\Http\Controllers\UserController@show');

Route::get('/services', 'App\Http\Controllers\ServiceController@index');

Route::get('/assistantservices', 'App\Http\Controllers\AssistantServiceController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

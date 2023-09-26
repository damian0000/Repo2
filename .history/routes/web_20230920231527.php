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

Route::get('/assistant', 'App\Http\Controllers\AssistantController@index');

Route::get('/assistant/create', 'App\Http\Controllers\AssistantController@create');
Route::get('/assistant/{id}', 'App\Http\Controllers\AssistantController@edit');
Route::get('/assistant/{id}', 'App\Http\Controllers\AssistantController@show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
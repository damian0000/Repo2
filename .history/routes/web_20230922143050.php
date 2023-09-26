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

Route::get('/assistant', 'App\Http\Controllers\UserController@index');

Route::get('/assistant/create', 'App\Http\Controllers\UserController@create');

Route::get('/assistant/edit/{id}', 'App\Http\Controllers\UserController@edit');

Route::get('/assistant/{id}', 'App\Http\Controllers\UserController@show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

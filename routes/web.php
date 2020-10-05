<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
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

Route::get('login', ['as' => 'login', 'uses' => '\App\Http\Controllers\LoginController@logged']);
Route::post('/login', [LoginController::class ,'authenticate']);
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');
Route::view('dashboard', 'dashboard');

Route::resource('users','\App\Http\Controllers\UserController')->middleware('auth');



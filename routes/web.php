<?php

use App\Http\Controllers\ProductoController;
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

Route::get('/', [ 'uses' => '\App\Http\Controllers\ProductoController@index'])
    ->middleware('role:2');

Route::get('login', ['as' => 'login', 'uses' => '\App\Http\Controllers\LoginController@logged']);
Route::post('/login', [LoginController::class ,'authenticate']);
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');
Route::view('dashboard', '/');
Route::view('ingresarProductos', 'ingresarProductos');


Route::resource('users','\App\Http\Controllers\UserController')
    ->middleware('role:1');
Route::resource('productos','\App\Http\Controllers\ProductoController')
    ->middleware('role:2');
Route::resource('categorias','\App\Http\Controllers\CategoriaController')
    ->middleware('role:2');
Route::resource('marcas','\App\Http\Controllers\MarcaController')
    ->middleware('role:2');
Route::resource('clientes','\App\Http\Controllers\ClienteController')
    ->middleware('role:2');
Route::view('buscadorProductos', 'productos.buscadorProductos');

Route::get('buscadorProductos', function () {
    return view('productos.buscadorProductos');
});
Route::post('buscadorProductos', '\App\Http\Controllers\ProductoController@busqueda');


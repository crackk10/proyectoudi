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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('productos', 'Admin\productosController')
->only([
    'index', 'create','store','show','edit','update','destroy',
    ])
    ->names([
    'index' => 'productos',
    'create' => 'productos.crear',
    'store' => 'productos/guardar',
    'show' => 'productos/detalle',
    'edit' => 'productos/editar',
    'update' => 'productos/actualizar',
    'destroy' => 'productos/eliminar',
    
])->middleware('auth');

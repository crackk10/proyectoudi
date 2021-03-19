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
/* rutas de productos */
    Route::get('productos.listar{page?}','Admin\productosController@listar')->name('productos.listar');
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
/* /rutas de productos */

/* rutas de vehiculos */
    Route::get('vehiculos/transportadora','Admin\vehiculosController@transportadora')->name('vehiculos/transportadora');
    Route::get('vehiculos.listar{page?}','Admin\vehiculosController@listar')->name('vehiculos.listar');
    Route::resource('vehiculos', 'Admin\vehiculosController')
    ->only([
        'index', 'create','store','show','edit','update','destroy',
        ])
        ->names([
        'index' => 'vehiculos',
        'create' => 'vehiculos.crear',
        'store' => 'vehiculos/guardar',
        'show' => 'vehiculos/detalle',
        'edit' => 'vehiculos/editar',
        'update' => 'vehiculos/actualizar',
        'destroy' => 'vehiculos/eliminar',
        
    ])->middleware('auth');
/* rutas de /vehiculos */

/* rutas de conductores */
    Route::get('conductores/transportadora','Admin\conductoresController@transportadora')->name('conductores/transportadora');
    Route::get('conductores.listar{page?}','Admin\conductoresController@listar')->name('conductores.listar');
    Route::resource('conductores', 'Admin\conductoresController')
    ->only([
        'index', 'create','store','show','edit','update','destroy',
        ])
        ->names([
        'index' => 'conductores',
        'create' => 'conductores.crear',
        'store' => 'conductores/guardar',
        'show' => 'conductores/detalle',
        'edit' => 'conductores/editar',
        'update' => 'conductores/actualizar',
        'destroy' => 'conductores/eliminar',
        
    ])->middleware('auth');
/* rutas de conductores */

/* rutas de transportadoras */
    Route::get('transportadoras.listar{page?}','Admin\transportadoraController@listar')->name('transportadoras.listar');
    Route::resource('transportadoras', 'Admin\transportadoraController')
    ->only([
        'index', 'create','store','show','edit','update','destroy',
        ])
        ->names([
        'index' => 'transportadoras',
        'create' => 'transportadoras.crear',
        'store' => 'transportadoras/guardar',
        'show' => 'transportadoras/detalle',
        'edit' => 'transportadoras/editar',
        'update' => 'transportadoras/actualizar',
        'destroy' => 'transportadoras/eliminar',
        
    ])->middleware('auth');
/* rutas de transportadoras */
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

Route::get('/inicio', function () {
   
    return view('theme/lte/layout');
})->name('inicio');
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

/* rutas de calendario*/

Route::get('calendario/evento','Admin\calendarioController@evento')->name('calendario/evento');
Route::get('calendario/producto','Admin\calendarioController@producto')->name('calendario/producto');
Route::get('calendario/proceso','Admin\calendarioController@proceso')->name('calendario/proceso');
Route::get('calendario/vehiculo','Admin\calendarioController@vehiculo')->name('calendario/vehiculo');
Route::get('calendario/conductor','Admin\calendarioController@conductor')->name('calendario/conductor');
Route::get('calendario.listar{page?}','Admin\calendarioController@listar')->name('calendario.listar');
Route::get('calendario.detallado{page?}','Admin\calendarioController@detallado')->name('calendario.detallado');
Route::resource('calendario', 'Admin\calendarioController')
->only([
    'index', 'create','store','show','edit','update','destroy',
    ])
    ->names([
    'index' => 'calendario',
    'create' => 'calendario.crear',
    'store' => 'calendario/guardar',
    'show' => 'calendario/detalle',
    'edit' => 'calendario/editar',
    'update' =>'calendario/actualizar',
    'destroy' => 'calendario/eliminar',
    
])->middleware('auth');
/* rutas de calentadio*/
/* rutas de detalleEvento */
Route::get('detalle/eliminar{page?}','Admin\detalleController@eliminar')->name('detalle/eliminar');
Route::resource('detalle', 'Admin\detalleController')
->only([
    'index', 'create','store','show','edit','update','destroy',
    ])
    ->names([
    'index' => 'detalle',
    'create' => 'detalle.crear',
    'store' => 'detalle/guardar',
    'show' => 'detalle/detalle',
    'edit' => 'detalle/editar',
    'update' =>'detalle/actualizar',
    'destroy' => 'detalle/eliminar',
    
]);
/* rutas de detalleEvento */
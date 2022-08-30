<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\HistorialController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles',RolController::class);
    Route::resource('usuarios',UsuarioController::class);
    Route::resource('productos',ProductoController::class);
    Route::resource('categorias',CategoriaController::class);
    Route::resource('clientes',ClienteController::class);
    Route::resource('proveedors',ProveedorController::class);
    Route::resource('historials',HistorialController::class);

    Route::get('compra/{id}', [ProductoController::class, 'compra']);
    Route::post('guardar_compra/{id}', [ProductoController::class, 'guardar_compra']);

    Route::get('venta/{id}', [ProductoController::class, 'venta']);
    Route::post('guardar_venta/{id}', [ProductoController::class, 'guardar_venta']);
});
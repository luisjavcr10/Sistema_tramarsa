<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MaquinariaController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\OrdenUsoController;
use App\Http\Controllers\GuiaMantenimientoController;

Route::get('/', function () {
    return view('layout.layout');
});

// CATEGORIAS
Route::get('categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('categoria', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('categoria/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

//ALMACEN
Route::get('almacen', [AlmacenController::class, 'index'])->name('almacen.index');
Route::get('almacen/create', [AlmacenController::class, 'create'])->name('almacen.create');
Route::post('almacen', [AlmacenController::class, 'store'])->name('almacen.store');
Route::get('almacen/{almacen}/edit', [AlmacenController::class, 'edit'])->name('almacen.edit');
Route::put('almacen/{almacen}', [AlmacenController::class, 'update'])->name('almacen.update');
Route::delete('almacen/{almacen}', [AlmacenController::class, 'destroy'])->name('almacen.destroy');

//MAQUINARIA
Route::get('maquinaria', [MaquinariaController::class, 'index'])->name('maquinaria.index');
Route::get('maquinaria/create', [MaquinariaController::class, 'create'])->name('maquinaria.create');
Route::post('maquinaria', [MaquinariaController::class, 'store'])->name('maquinaria.store');
Route::get('maquinaria/{maquinaria}/edit', [MaquinariaController::class, 'edit'])->name('maquinaria.edit');
Route::put('maquinaria/{maquinaria}', [MaquinariaController::class, 'update'])->name('maquinaria.update');
Route::delete('maquinaria/{maquinaria}', [MaquinariaController::class, 'destroy'])->name('maquinaria.destroy');


Route::resource('inventario', InventarioController::class);

Route::resource('orden-uso', OrdenUsoController::class);

Route::resource('guia-mantenimiento', GuiaMantenimientoController::class);


<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para Customers
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);



// Ruta para ver productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

// Ruta para ver categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

/*use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
*/
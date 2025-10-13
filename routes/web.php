<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para Customers
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);




/*use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
*/
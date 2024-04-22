<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProveedorController;

Route::get('/proveedores', [ProveedorController::class, 'index']);

Route::get('/proveedores/{id}', [ProveedorController::class, 'show']);

Route::post('/proveedores', [ProveedorController::class, 'store']);

Route::put('/proveedores/{id}', [ProveedorController::class, 'update']);

Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy']);

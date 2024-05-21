<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\ProductoController;

// Rutas para el controlador Proveedor
Route::get('/proveedores', [ProveedorController::class, 'index']);
Route::get('/proveedores/{id}', [ProveedorController::class, 'show']);
Route::post('/proveedores', [ProveedorController::class, 'store']);
Route::put('/proveedores/{id}', [ProveedorController::class, 'update']);
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy']);

// Rutas para el controlador Categoria
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::put('/categorias/{id}', [CategoriaController::class, 'update']);
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);

// Rutas para el controlador Compra
Route::get('/compras', [CompraController::class, 'index']);
Route::get('/compras/{id}', [CompraController::class, 'show']);
Route::post('/compras', [CompraController::class, 'store']);
Route::put('/compras/{id}', [CompraController::class, 'update']);
Route::delete('/compras/{id}', [CompraController::class, 'destroy']);

// Rutas para el controlador DetalleCompra
Route::get('/detalle-compras', [DetalleCompraController::class, 'index']);
Route::get('/detalle-compras/{id}', [DetalleCompraController::class, 'show']);
Route::post('/detalle-compras', [DetalleCompraController::class, 'store']);
Route::put('/detalle-compras/{id}', [DetalleCompraController::class, 'update']);
Route::delete('/detalle-compras/{id}', [DetalleCompraController::class, 'destroy']);

// Rutas para el controlador Lote
Route::get('/lotes', [LoteController::class, 'index']);
Route::get('/lotes/{id}', [LoteController::class, 'show']);
Route::post('/lotes', [LoteController::class, 'store']);
Route::put('/lotes/{id}', [LoteController::class, 'update']);
Route::delete('/lotes/{id}', [LoteController::class, 'destroy']);

// Rutas para el controlador Producto
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

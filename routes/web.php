<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersController;

Route::get('/', [OrdersController::class, 'index']);

Route::post('/orders/store', [OrdersController::class, 'store']);
Route::delete('/orders/{order}/destroy', [OrdersController::class, 'destroy']);
Route::get('/orders/{order}/edit', [OrdersController::class, 'edit']);
Route::put('/orders/{order}/update', [OrdersController::class, 'update']);
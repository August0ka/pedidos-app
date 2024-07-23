<?php

use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

Route::post('/orders/store', [OrdersController::class, 'store'])->name('orders.store');
Route::delete('/orders/{order}/destroy', [OrdersController::class, 'destroy']);
Route::put('/orders/{order}/update', [OrdersController::class, 'update']);

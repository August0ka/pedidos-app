<?php

use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

Route::delete('/orders/{order}/destroy', [OrdersController::class, 'destroy']);
Route::put('/orders/{order}/update', [OrdersController::class, 'update']);
Route::get('/orders/consult', [OrdersController::class, 'consultOrders']);
Route::post('/orders/store', [OrdersController::class, 'store']);

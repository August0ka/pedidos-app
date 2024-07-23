<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersController;

Route::get('/', [OrdersController::class, 'index']);

Route::get('/orders/{order}/edit', [OrdersController::class, 'edit']);

<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TransactionController::class, 'index']);
Route::resource('transactions', TransactionController::class);

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

Route::get('/fleets', [FleetController::class, 'index'])->name('fleets.index');

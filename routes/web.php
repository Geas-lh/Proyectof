<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserManualController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('servicios', ServicioController::class)->middleware('role:admin');
    Route::resource('reservas', ReservaController::class);

    Route::resource('usuarios', UserManualController::class)->middleware('role:admin');
});

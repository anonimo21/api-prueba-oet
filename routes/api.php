<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('vehicles', VehicleController::class);
Route::resource('drivers', DriverController::class);
Route::resource('owners', OwnerController::class);
Route::resource('informe', InformeController::class);
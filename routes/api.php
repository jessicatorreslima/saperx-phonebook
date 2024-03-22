<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhoneController;

Route::apiResource('contacts', ContactController::class);
Route::post('contacts/{contact}/phones', [PhoneController::class, 'store']);
Route::put('contacts/{contact}/phones/{phone}', [PhoneController::class, 'update']);
Route::delete('contacts/{contact}/phones/{phone}', [PhoneController::class, 'destroy']);

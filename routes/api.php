<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhoneController;

Route::apiResource('contacts', ContactController::class);
Route::apiResource('contacts.phones', PhoneController::class)->shallow()->only(['store', 'update', 'destroy']);

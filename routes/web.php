<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/phonebook', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');  // Rota de edição
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update'); // Rota para atualização do contato
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy'); // Rota para exclusão do contato

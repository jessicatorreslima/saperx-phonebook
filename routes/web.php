<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/**
 * Display the phonebook.
 *
 * @response \Illuminate\Http\JsonResponse
 * {
 *     "id": 1,
 *     "name": "John Doe",
 *     "email": "john@example.com",
 *     "birthdate": "1990-01-01",
 *     "cpf": "12345678901",
 *     "created_at": "2024-03-21T12:00:00Z",
 *     "updated_at": "2024-03-21T12:00:00Z",
 *     "phones": [
 *         {
 *             "id": 1,
 *             "contact_id": 1,
 *             "phone_number": "1234567890",
 *             "created_at": "2024-03-21T12:00:00Z",
 *             "updated_at": "2024-03-21T12:00:00Z"
 *         },
 *         {
 *             "id": 2,
 *             "contact_id": 1,
 *             "phone_number": "0987654321",
 *             "created_at": "2024-03-21T12:00:00Z",
 *             "updated_at": "2024-03-21T12:00:00Z"
 *         }
 *     ]
 * }
 */
Route::get('/phonebook', [ContactController::class, 'index']);

/**
 * Store a new contact.
 *
 * @bodyParam name string required The name of the contact.
 * @bodyParam email email required The email of the contact.
 * @bodyParam birthdate date required The birthdate of the contact (YYYY-MM-DD).
 * @bodyParam cpf string required The CPF of the contact.
 * @bodyParam phones array required The phones of the contact.
 * @response \Illuminate\Http\RedirectResponse
 * {
 *     "message": "Contact added successfully!"
 * }
 */
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

/**
 * Display the contact edit form.
 *
 * @urlParam contact integer required The ID of the contact.
 * @response \Illuminate\View\View
 * {
 *     "id": 1,
 *     "name": "John Doe",
 *     "email": "john@example.com",
 *     "birthdate": "1990-01-01",
 *     "cpf": "12345678901",
 *     "created_at": "2024-03-21T12:00:00Z",
 *     "updated_at": "2024-03-21T12:00:00Z",
 *     "phones": [
 *         {
 *             "id": 1,
 *             "contact_id": 1,
 *             "phone_number": "1234567890",
 *             "created_at": "2024-03-21T12:00:00Z",
 *             "updated_at": "2024-03-21T12:00:00Z"
 *         },
 *         {
 *             "id": 2,
 *             "contact_id": 1,
 *             "phone_number": "0987654321",
 *             "created_at": "2024-03-21T12:00:00Z",
 *             "updated_at": "2024-03-21T12:00:00Z"
 *         }
 *     ]
 * }
 */
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

/**
 * Update a contact.
 *
 * @urlParam contact integer required The ID of the contact.
 * @bodyParam name string required The name of the contact.
 * @bodyParam email email required The email of the contact.
 * @bodyParam birthdate date required The birthdate of the contact (YYYY-MM-DD).
 * @bodyParam cpf string required The CPF of the contact.
 * @bodyParam phones array required The phones of the contact.
 * @response \Illuminate\Http\RedirectResponse
 * {
 *     "message": "Contact updated successfully!"
 * }
 */
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

/**
 * Delete a contact.
 *
 * @urlParam contact integer required The ID of the contact.
 * @response \Illuminate\Http\RedirectResponse
 * {
 *     "message": "Contact deleted successfully!"
 * }
 */
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');


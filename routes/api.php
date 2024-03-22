<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhoneController;

/**
 * API Routes
 */

/**
 * Contacts Resource Routes
 *
 * GET /api/contacts
 * Description: Get all contacts.
 * Example Response:
 * {
 *     "data": [
 *         {
 *             "id": 1,
 *             "name": "John Doe",
 *             "email": "john.doe@example.com",
 *             "birthdate": "1990-01-01",
 *             "cpf": "12345678901",
 *             "created_at": "2022-03-21T00:00:00.000000Z",
 *             "updated_at": "2022-03-21T00:00:00.000000Z",
 *             "phones": [
 *                 {
 *                     "id": 1,
 *                     "contact_id": 1,
 *                     "phone_number": "123456789"
 *                 },
 *                 {
 *                     "id": 2,
 *                     "contact_id": 1,
 *                     "phone_number": "987654321"
 *                 }
 *             ]
 *         }
 *     ]
 * }
 */
Route::apiResource('contacts', ContactController::class);

/**
 * Contact Phones Sub-resource Routes
 *
 * POST /api/contacts/{contact}/phones
 * Description: Add a phone to a specific contact.
 * Example Request:
 * {
 *     "phones": [
 *         "1234567890"
 *     ]
 * }
 * Example Response:
 * {
 *     "message": "Phone added successfully!"
 * }
 *
 * PUT /api/contacts/{contact}/phones/{phone}
 * Description: Update a phone of a specific contact.
 * Example Request:
 * {
 *     "phone_number": "0987654321"
 * }
 * Example Response:
 * {
 *     "message": "Phone updated successfully!"
 * }
 *
 * DELETE /api/contacts/{contact}/phones/{phone}
 * Description: Delete a phone from a specific contact.
 * Example Response:
 * {
 *     "message": "Phone deleted successfully!"
 * }
 */
Route::apiResource('contacts.phones', PhoneController::class)->shallow()->only(['store', 'update', 'destroy']);

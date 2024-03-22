<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return Contact::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts',
            'birthdate' => 'required|date',
            'cpf' => 'required|string|unique:contacts',
        ]);

        return Contact::create($request->all());
    }

    public function show($id)
    {
        return Contact::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'birthdate' => 'required|date',
            'cpf' => 'required|string|unique:contacts,cpf,' . $contact->id,
        ]);

        $contact->update($request->all());

        return $contact;
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(null, 204);
    }
}

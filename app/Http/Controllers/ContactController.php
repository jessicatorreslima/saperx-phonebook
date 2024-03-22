<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::with('phones')->get();

        if ($request->wantsJson()) {
            return response()->json($contacts);
        }

        return view('phonebook', compact('contacts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'birthdate' => 'required|date',
            'cpf' => 'required|string|unique:contacts,cpf',
            'phones.*' => 'required|string|max:20'
        ]);

        $contact = Contact::create($data);

        foreach ($request->input('phones') as $phone) {
            $contact->phones()->create(['phone_number' => $phone]);
        }

        return redirect('/phonebook')->with('success', 'Contact added successfully!');
    }

    public function show($id)
    {
        return Contact::findOrFail($id);
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('edit_contact', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'birthdate' => 'required|date',
            'cpf' => 'required|string|unique:contacts,cpf,' . $id,
            'phones.*' => 'required|string|max:20'
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($data);

        // Atualizar telefones
        $contact->phones()->delete();
        foreach ($request->input('phones') as $phone) {
            $contact->phones()->create(['phone_number' => $phone]);
        }

        return redirect('/phonebook')->with('success', 'Contact updated successfully!');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/phonebook')->with('success', 'Contact deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function store(Request $request, $contactId)
    {
        $request->validate([
            'phone_number' => 'required|string',
        ]);

        $phone = new Phone([
            'phone_number' => $request->phone_number,
            'contact_id' => $contactId,
        ]);

        $phone->save();

        return $phone;
    }

    public function update(Request $request, $contactId, $phoneId)
    {
        $phone = Phone::findOrFail($phoneId);

        $request->validate([
            'phone_number' => 'required|string',
        ]);

        $phone->phone_number = $request->phone_number;
        $phone->save();

        return $phone;
    }

    public function destroy($contactId, $phoneId)
    {
        $phone = Phone::findOrFail($phoneId);
        $phone->delete();

        return response()->json(null, 204);
    }
}

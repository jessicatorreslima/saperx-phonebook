<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $contactId)
    {
        $request->validate([
            'phone_number' => 'required|string|max:20',
        ]);

        $phone = new Phone([
            'phone_number' => $request->input('phone_number'),
            'contact_id' => $contactId,
        ]);

        $phone->save();

        return response()->json(['message' => 'Phone created successfully', 'phone' => $phone], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'phone_number' => 'required|string|max:20',
        ]);

        $phone = Phone::findOrFail($id);
        $phone->phone_number = $request->input('phone_number');
        $phone->save();

        return response()->json(['message' => 'Phone updated successfully', 'phone' => $phone], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::findOrFail($id);
        $phone->delete();

        return response()->json(['message' => 'Phone deleted successfully'], 200);
    }
}

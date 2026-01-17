<?php

namespace App\Http\Controllers;

use App\Models\Profile;

use Illuminate\Http\Request;

class PurchaseAddressController extends Controller
{
    public function edit($item_id)
    {
        $user = auth()->user();

        $profile = auth()->user()->profile;

        return view('purchase.create', compact('item_id','profile'));
    }

    public function update(Request $request,$item_id)
    {
        $validated = $request->validate([
            'postal_code' => ['required','regex:/^\d{3}-\d{4}$/'],
            'address' => ['required'],
            'building' => ['nullable'],
        ]);

        $user = auth()->user();

        $profile = $user->profile;

        $profile->update($validated);

        return redirect()->route('purchase.create', ['item_id' => $item_id]);
    }
}

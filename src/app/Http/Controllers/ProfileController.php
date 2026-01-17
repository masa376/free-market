<?php

namespace App\Http\Controllers;

use App\Models\Profile;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = auth()->user()->profile;

        return view('mypage.index',compact('profile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'postal_code' => ['required', 'regex:/^\d{3}-\d{4}$/'],
            'address' => ['required'],
            'building' => ['nullable'],
        ]);

        $user = auth()->user();

        $profile = auth()->user()->profile;

        $profile->update($validated);

        return redirect()->route('mypage.index');
    }
}

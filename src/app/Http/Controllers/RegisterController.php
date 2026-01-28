<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Request\RegisterRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        User::create($request->only(['name', 'email', 'password']));
        return redirect()->route('profile.edit');
    }
}

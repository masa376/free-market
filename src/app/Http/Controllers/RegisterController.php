<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Request\RegisterRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(RegisterRequest $request)
    {
        User::create($request->only(['name', 'email', 'password']));
        return redirect()->route('profile.edit');
    }
}

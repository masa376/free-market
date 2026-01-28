<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('profile');

        $sellingItems = $user->sellingItems()
            ->latest()
            ->get();

        $boughtItems = $user->boughtItems()
        ->latest()
        ->get();

        return view('mypage.index', compact('items'));
    }
}

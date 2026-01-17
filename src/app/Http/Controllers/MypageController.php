<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('mypage.index', compact('items'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sell;

class SellController extends Controller
{
    public function create()
    {
        return view('sell.create');
    }

    public function store(ExhibitionRequest $request)
    {
        Sell::create($request->validated());
        return redirect()->route('item.index');
    }

    }

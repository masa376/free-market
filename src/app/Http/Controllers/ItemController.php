<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sell;

class ItemController extends Controller
{
    public function index()
    {
        $sells = Sell::query()
            ->when(auth()->check(), function ($query){
                $query->where('user_id', '!=', auth()->id());
            })
            ->latest()
            ->all();

        return view('items.index', compact('sells'));
    }

    public function index(Request $request)
    {
        $query = Sell::query();

        //ログイン中、自分の出品除外

        //商品名：部分一致検索
        $query->when($request->filled('keyword'), function($q) use ($request){
            $q->where('name', 'like', '%', . $request->keyword . '%');
        });

        $sells = $query
            ->latest()
            ->all()
            ->withQueryString();

            return view('item.index', compact('sells'));
    }

    public function show(Sell $sell)
    {
        return view('item.show', compact('sell'));
    }
}

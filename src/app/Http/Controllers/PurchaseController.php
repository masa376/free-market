<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Models\Profile;
use App\Models\Sell;

use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function create()
    {
        return view('purchase.create');
    }

    public function store(PurchaseRequest $request)
    {
        Profile::create($request->only(['postal_code', 'address', 'building',]));
        return redirect()->route('item.index');
    }

    //購入確認画面？

    //購入確定
    public function store(Request $request, Sell $sell)
    {
        DB::transaction(function () use ($sell) {
            $locked = Sell::where('id', $sell->id)->lockForUpdate()->first();

            if ($locked->sold_at) {
                abort(409, '購入済');
            }

            if ($locked->user_id === auth()->id()) {
                abort(403, '自分の商品は購入不可');
            }

            $locked->buyer_id = auth()->id();
            $locked->sold_at = now();
            $locked->save();
        });

        return redirect()->route('item.index', $sell);
    }
}

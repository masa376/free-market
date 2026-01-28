<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Models\Profile;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function create(Item $item)
    {
        $user = Auth::user();

        //プロフィール（住所）を取得
        $profile = $user->profile;

        //住所未登録ならプロフィール編集へ誘導（要件に合わせて変更）
        if (!$profile || !$profile->postal_code || !$profile->address) {
            return redirect()->route('mypage.profile.edit');
        }

        //画面表示用に ”住所文字列” を作って渡す（Bladeで組み立てるも良し）
        $shippingAddress = [
            'postal_code' => $profile->postal_code,
            'address'     => $profile->address,
            'building'    => $profile->building,
        ];

        return view('purchase.create', compact('item','shippingAddress'));
    }


    public function store(Request $request, Item $item)
    {
        $user = Auth::user();

        $request->validate([
            'postal_code' => ['required'],
            'address' => ['required'],
            'building' => ['nullable'],
        ]);

        //売り切れ・二重購入防止のため、DB処理をまとめて行う
        DB::transaction(function () use ($request, $item, $user) {

            // 最新状態をロックして読み直す（同時購入対策）
            $lockedItem = Item::where('id', $item->id)->lockForUpdate()->first();

            if ($lockedItem->is_sold) {
            abort(409);
            }

            // 出品者が自分なら購入不可にするなら・・
            if ($lockedItem->user_id === $user->id) {
            abort(403);
            }

            // 購入確定にする
            Purchase::create([
                'buyer_id'    => $user->id,
                'item_id'     => $lockedItem->id,
                'postal_code' => $request->postal_code,
                'address'     => $request->address,
                'building'    => $request->building,
            ]);

            //購入済(売り切れ)にする
            $lockedItem->update(['is_sold' => true]);
        });

        return redirect()->route('items.index');
}

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Item $item)
    {
        //いいね登録 + 2重登録回避
        Auth::user()->favoriteItems()->syncWithoutDetaching([$item->id]);

        return back();
    }

    public function destroy(Item $item)
    {
        //いいね解除
        Auth::user()->favoriteItems()->detach($item->id);

        return back();
    }
}

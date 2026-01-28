<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab');
        $q   = $request->query('q');

        //マイリスト
        if ($tab === 'mylist') {

            //未認証ユーザー「表示なし」
            if (!Auth::check()) {
                $items = collect();
                return view('items.index', compact('items', 'tab', 'q'));
            }

            //認証ユーザー「マイリスト表示」
            $query = Auth::user()
                ->favoriteItems()
                ->orderBy('favorites.created_at', 'desc');

            //商品名 部分一致検索
            if (!empty($q)) {
                $query->where('items.name', 'like', '%' . $q . '%');
            }

            $items = $query->get();

            return view('items.index', compact('items', 'tab', 'q'));
        }

        //通常タブ
        $query = Item::query()->latest();

        //ログインしている場合だけ、自分が出品した商品除外
        if (Auth::check()) {
            $query->where('user_id', '!=', Auth::id());
        }

        //商品名 部分一致検索
        if (!empty($q)) {
            $query->where('name', 'like', '%' . $q . '%');
        }

        $items = $query->get();

        return view('items.index', compact('items', 'tab', 'q'));
    }

    public function show(Item $item)
    {
        //商品情報（カテゴリ・状態・出品者・複数カテゴリ）
        $item->load(['category','categories', 'condition', 'user']);

        // いいね数・コメント数
        $item->loadCount(['favoritedUsers', 'comments']);

        //コメント一覧・コメントしたユーザー情報
        $comments = $item->comments()
            ->with('user')
            ->latest()
            ->get();

        //ログイン中ユーザーが「いいね済か」
        $isFavorited = Auth::check()
            ? $item->favoritedUsers()->where('users.id', Auth::id())->exists()
            : false;

        return view('items.show', compact('item', 'comments', 'isFavorited'));
    }
}

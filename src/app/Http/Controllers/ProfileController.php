<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user()->load('profile');

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'max:20'],
            'postal_code' => ['required', 'regex:/^\d{3}-\d{4}$/'],
            'address' => ['required'],
            'building' => ['nullable'],
            'profile_image' => ['image', 'mimes:jpeg,png'],
        ]);

        // ユーザー名更新（usersテーブル）
        $user = update([
            'name' => $validated['name'],
        ]);

        // 画像保存について

        //プロフィール更新
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'postal_code' => $validated['postal_code'],
                'address'     => $validated['address'],
                'building'    => $validated['building'] ?? null,
                // 画像がアップされたときだけ更新、無いときは既存維持
            ]
        );

        return redirect()->route('mypage.index');
    }
}

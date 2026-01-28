<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Item $item)
    {
        $validated = $request->validate([
            'content' => ['required', 'max:255'],
        ]);

        Comment::create([
            'item_id' => $item->id,
            'user_id' => Auth::id(),
            'content' => $validated['content'],
        ]);

        return redirect()->route('items.show', $item);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $fillable = [
        'user_id',
        'image',
        'category_id',
        'condition_id',
        'name',
        'brands',
        'description',
        'price',
        'is_sold',
    ];

    public function category() //メインカテゴリ（既存）
    {
        return $this->belongsToMany(Category::class);
    }

    public function categories() //追加カテゴリ（複数）
    {
        return $this->belongsToMany(category::class)->withTimestamps();
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoritedUsers()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

}

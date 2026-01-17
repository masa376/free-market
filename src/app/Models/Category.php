<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'content',
    ];

    public function sells(): HasMany
    {
        return $this->hasMany(Sell::class, 'category_id');
    }
}

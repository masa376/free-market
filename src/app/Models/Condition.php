<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Condition extends Model
{
    protected $fillable = [
        'item_condition',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

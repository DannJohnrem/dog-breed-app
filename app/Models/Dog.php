<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'breed',
        'image_url'
    ];

    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_dog');
    }
}

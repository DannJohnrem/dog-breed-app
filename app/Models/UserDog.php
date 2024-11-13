<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dog_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }
}


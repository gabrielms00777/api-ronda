<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active',
        'user_id'
    ];

    public function stops()
    {
        return $this->hasMany(Stop::class);
    }

    // public function rounds()
    // {
    //     return $this->hasManyThrough(RoundRecord::class, Stop::class);
    // }
}

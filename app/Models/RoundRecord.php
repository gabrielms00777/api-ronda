<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoundRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'stop_id',
        // 'date_time',
        // 'photo',
        // 'observation',
        'user_id',
        'photo',
        'latitude',
        'longitude',
        'date_time',
    ];

    // public function stop()
    // {
    //     return $this->belongsTo(Stop::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'name',
        'description',
        'latitude',
        'longitude',
        'qrcode',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function rounds()
    {
        return $this->hasMany(RoundRecord::class);
    }
}

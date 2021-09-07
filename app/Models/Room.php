<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static $room_types = ['SUITE', "STUDIO", "LOFT", "PENTHOUSE"];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}

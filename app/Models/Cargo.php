<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    public function getShip()
    {
        return $this->belongsTo(Ship::class, 'ship_id', 'id');
    }

}

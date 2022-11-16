<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    const TYPE = [
        1 => 'Passenger',
        2 => 'Container',
        3 => 'Cruise',
        4 => 'Fishing'
    ];

    protected $fillable = ['title', 'country'];
}

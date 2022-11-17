<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cargo;

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

    public function getCargos() {
        return $this->hasMany(Cargo::class, 'ship_id','id');
    }
}

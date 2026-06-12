<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Vehicle extends Model
{
    protected $fillable = [
        'owner_id',
        'vehicle_number',
        'vehicle_type',
        'brand',
        'color',
        'model',
        'status'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
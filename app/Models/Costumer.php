<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Costumer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'phone',
        'address',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'costumer_id');
    }
}

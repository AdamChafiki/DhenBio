<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'costumer_id',
        'status',
        'total_price',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Define the relationship with the Costumer model
    public function customer()
    {
        return $this->belongsTo(Costumer::class, 'costumer_id');
    }
}

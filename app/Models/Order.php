<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'phone',
        'email',
        'order_amount',
    ];

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}

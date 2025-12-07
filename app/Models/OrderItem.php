<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    protected $fillable = [
        'order_id',
        'product_stock_id',
        'quantity',
        'price',
    ];

    public function stock()
    {
        return $this->belongsTo(ProductStock::class, 'product_stock_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}

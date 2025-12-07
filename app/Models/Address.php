<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [
        'order_id',
        'street',
        'city',
        'postal_code',
        'country',
        'extra_details',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [
        'user_id',
        'street',
        'city',
        'postal_code',
        'country',
        'extra_details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

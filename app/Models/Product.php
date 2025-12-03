<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}

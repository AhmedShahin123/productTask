<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'img',
        'price',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}

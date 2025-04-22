<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'product_id',
        'type', 
        'value', 
        'start_date',
        'end_date', 
        'is_active', 
    ];
    public function products(){
        return $this->belongsToMany(Product::class,'discount_product');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','price','category_id',
        'stock','discount','is_active','seller_id',
      ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function seller(){
        return $this->belongsTo(User::class,'seller_id');
    }
}

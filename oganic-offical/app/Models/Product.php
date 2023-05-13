<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='product';
    protected $fillable=[
        'name',
        'image',
        'price',
        'sale_price',
        'description',
        'image_list',
        'status',
        'category_id'
    ];
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function votes(){
        return $this->hasMany(Vote::class,'product_id','id');
    }
}

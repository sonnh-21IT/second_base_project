<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function orderdetail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}

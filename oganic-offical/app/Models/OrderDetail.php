<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table='order_detail';
    public function order(){
        return $this->hasOne(Order::class,'id','order_id');
    }
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function store(Order $order,$carts,Request $request)
    {
        $user=User::where('id',auth()->id())->first();
        foreach($carts[$user->id] as $id => $item){
            $orderdetail=new OrderDetail();
            $orderdetail->order_id=$order->id;
            $orderdetail->product_id=$id;
            $orderdetail->quantity=$item['quantity'];
            $orderdetail->price=$item['quantity']*$item['price'];
            $orderdetail->save();
        }
    }
}

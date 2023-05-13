<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    //
    public function addToCart($id){
        // dd('add to cart'.$id);
        // session()->flush('cart');
        // dd('end');
        $user=User::where('id',auth()->id())->first();
        $product=Product::find($id);
        $carts=session()->get('carts');
        if(isset($carts[$user->id][$id])){
            $carts[$user->id][$id]['quantity']+=1;
        }else{
            $carts[$user->id][$id]=[
                                    'name'=>$product->name,
                                    'price'=>$product->price,
                                    'image'=>$product->image,
                                    'quantity'=>1
                                ];
        }
        session()->put('carts',$carts);
        return response()->json([
            'code'=>200,
            'message'=>'success'
        ],200);
    }
    public function showCart(){
        $carts=session()->get('carts');
        return view('site.cart',[
            'carts'=>$carts
        ]);
    }
    public function updateCart(Request $request){
        if($request->id && $request->quantity){
            $user=User::where('id',auth()->id())->first();
            $carts=session()->get('carts');
            $carts[$user->id][$request->id]['quantity']=$request->quantity;
            session()->put('carts',$carts);
            $cartComponent=view('components.cart',[
                'carts'=>session()->get('carts')
            ])->render();
            return response()->json([
                'cartComponent'=>$cartComponent,
                'code'=>200
            ],200);
        }
    }
    public function deleteCart(Request $request){
        if($request->id){
            $user=User::where('id',auth()->id())->first();
            $carts=session()->get('carts');
            unset($carts[$user->id][$request->id]);
            session()->put('carts',$carts);
            $cartCmponent=view('components.cart',[
                'carts'=>session()->get('carts')
            ])->render();
            return response()->json([
                'cartComponent'=>$cartCmponent,
                'code'=>200
            ],200);
        }
    }
}

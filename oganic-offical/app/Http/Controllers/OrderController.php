<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Order::get();
        return view('admin.order.index',[
            'data'=>$data,
        ]);
    }
    public function view()
    {
        //
        $data=Order::get();
        return view('admin.order.neworder',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $carts=session()->get('carts');
        return view('site.checkout',[
            'carts'=>$carts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name=$request->name;
        $phone=$request->phone;
        $address=$request->detail.'-'.$request->district.'-'.$request->town;
        $note=$request->note;
        $user=User::where('id',auth()->id())->first();
        $carts=session()->get('carts');
        if($name==null||$phone==null||$address==null){
            return redirect()->back()->with('error','Trường dữ liệu không đầy đủ! Vui lòng kiểm tra lại!');
        }else if(isset($carts[$user->id])){
            $order=new Order();
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->note=$note.'';
            $order->user_id=$user->id;
            foreach($carts[$user->id] as $id => $item){
                $order->price+=$item['price']*$item['quantity'];
            }
            $order->save();
            $orderdetail=new OrderDetail();
            $orderdetail->store($order,$carts,$request);
            unset($carts[$user->id]);
            session()->put('carts',$carts);
            return redirect()->route('home.order');
        }else{
            return redirect()->back()->with('error','Đã xảy ra lỗi!Vui lòng thử lại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $order=Order::where('id',$id)->first();
        $order->status=$request->status;
        $order->save();
        return redirect()->back()->with('success','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
    }
}

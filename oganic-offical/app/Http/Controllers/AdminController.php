<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        return view('admin.dashboard',[
            'turnover'=>Order::sum('price'),
            'order'=>Order::count(),
            'user'=>User::where('role','customer')->count(),
            'dataprofit'=>$this->dataChartProfit(),
            'dataorder'=>$this->dataChartOrder()
        ]);
    }
    public function dataChartProfit(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = getdate();
        $thisyear=$date['year'];
        $get=array();
        for ($i=1; $i <= 12; $i++) { 
            $get[]=Order::whereYear('created_at',$thisyear)->whereMonth('created_at',$i)->where('status',1)->sum('price');
        }
        return json_encode($get);
    }
    public function dataChartOrder(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = getdate();
        $thisyear=$date['year'];
        $getItem=array();
        for ($i=-1; $i <= 1; $i++) {
            $getItem[]=Order::whereYear('created_at',$thisyear)->where('status',$i)->count();
        }
        return json_encode($getItem);
    }
    public function check(){
        $productSale= DB::statement("SELECT * FROM `product` WHERE sale_price < price");
        print_r($productSale);
    }
}

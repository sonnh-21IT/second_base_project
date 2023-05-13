<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Vote;
use App\Mail\MailDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('site.contact');
    }
    public function introduce()
    {
        return view('site.introduce');
    }
    public function index()
    {   
        $productSale = DB::table('product')->where('sale_price', '>','price')->get();
        $data=Category::all();
        return view('site.home',[
            'data'=>$data,
            'sale'=>$productSale
        ]);
    }
    public function shop(){
        $products=Product::paginate(15);
        $category=Category::all();
        $laster=Product::orderBy('created_at','desc')->limit(6)->get();
        return view('site.shop',[
            'product'=>$products,
            'sort'=>$products,
            'laster'=>$laster,
            'category'=>$category
        ]);
    }
    public function show($id){
        $product=Product::where('id',$id)->first();
        $category_id=$product->category()->first()->id;
        $productSame=Product::where('category_id',$category_id)->limit(4)->get();
        $vote=0;
        $yourVote=0;
        if(auth()->check()){
            $user=User::where('id',auth()->id())->first();
            if(Vote::where('user_id',$user->id)->where('product_id',$product->id)->first()==null){
                $yourVote=0;
            }else{
                $yourVote=Vote::where('user_id',$user->id)->where('product_id',$product->id)->first()->vote;
            }
        }
        if($product->votes()->get()->count()>0){
            $vote=$product->votes()->get()->sum('vote')/$product->votes()->get()->count();
        }
        return view('site.detail',[
            'product'=>$product,
            'productSame'=>$productSame,
            'vote'=>$vote,
            'yourVote'=>$yourVote
        ]);
    }
    public function vote(Request $request){
        $user=User::where('id',auth()->id())->first();
        $vote=Vote::where('user_id',$user->id)->first();
        $product=Product::find($request->product);
        if($vote!=null){
            $vote->vote=$request->vote;
            $vote->product_id=$request->product;
            $vote->save();
        }else{
            $yourVote=new Vote();
            $yourVote->user_id=$user->id;
            $yourVote->vote=$request->vote;
            $yourVote->product_id=$request->product;
            $yourVote->save();
        }
        return response()->json([
            'yourVote'=>Vote::where('user_id',$user->id)->first()->vote,
            'vote'=>$product->votes()->get()->sum('vote')/$product->votes()->get()->count(),
            'code'=>200
        ],200);
    }
    public function order()
    {
        $user=User::where('id',auth()->id())->first();
        $data=Order::where('user_id',$user->id)->get();
        return view('site.order',[
            'data'=>$data
        ]);
    }
    public function destroy($id){
        $order=Order::where('id',$id)->first();
        $order->status=-1;
        $order->save();
        $user=User::where('id',auth()->id())->first();
        $data=Order::where('user_id',$user->id)->get();
        $component=view('components.order',[
            'data'=>$data
        ])->render();
        return response()->json([
            'ordercomponent'=>$component,
            'code'=>200
        ],200);
    }
    public function display(Request $request){
        $paginate=intval($request->display);
        $display=Product::paginate($paginate);
        $productComponent=view('components.product',[
            'sort'=>$display
        ])->render();
        return response()->json([
            'productcomponent'=>$productComponent,
            'code'=>200,
            'count'=>$display->count()
        ],200);
    }
    public function sort(Request $request){
        //default,latest,cheapest
        // $productComponent='';
        $sort=null;
        $count=0;
        if($request->sort=='default'){
            $sort=Product::paginate(15);
            $count=$sort->count();
        }else if($request->sort=='latest'){
            $sort=Product::orderBy('created_at','desc')->paginate(15);
            $count=$sort->count();
        }else if($request->sort=='cheapest'){
            $sort=Product::orderBy('sale_price')->paginate(15);
            $count=$sort->count();
        }
        $productComponent=view('components.product',[
            'sort'=>$sort
        ])->render();
        return response()->json([
            'productcomponent'=>$productComponent,
            'code'=>200,
            'count'=>$count
        ],200);
    }
    public function filter(Request $request){
        $start=$request->from;
        $end=$request->to;
        $filter = Product::whereBetween('sale_price',[$start, $end])
                        ->paginate(16);
        $productComponent=view('components.product',[
            'sort'=>$filter
        ])->render();
        return response()->json([
            'productcomponent'=>$productComponent,
            'code'=>200,
            'count'=>$filter->count()
        ],200);
    }
    public function cateFilter(Request $request){
        $products=Product::where('category_id',$request->id)->paginate(15);
        $productComponent=view('components.product',[
            'sort'=>$products
        ])->render();
        return response()->json([
            'productcomponent'=>$productComponent,
            'code'=>200,
            'count'=>$products->count()
        ],200);
    }
    public function search(Request $request){
        $category=Category::where('name','LIKE','%'.$request->search.'%')->first();
        if($category!=null){
            $search=Product::where('name','LIKE','%'.$request->search.'%')->orWhere('sale_price', 'LIKE', "%{$request->search}%")->orWhere('category_id', 'LIKE', "%{$category->id}%")->paginate(15);
        }else{
            $search=Product::where('name','LIKE','%'.$request->search.'%')->orWhere('sale_price', 'LIKE', "%{$request->search}%")->paginate(15);
        }
        $productComponent=view('components.product',[
            'sort'=>$search
        ])->render();
        return response()->json([
            'productcomponent'=>$productComponent,
            'code'=>200,
            'count'=>$search->count()
        ],200);
    }
    public function searchAjax(Request $request){
        $category=Category::where('name','LIKE','%'.$request->search.'%')->first();
        if($category!=null){
            $search=Product::where('name','LIKE','%'.$request->search.'%')->orWhere('sale_price', 'LIKE', "%{$request->search}%")->orWhere('category_id', 'LIKE', "%{$category->id}%")->limit(6)->get();
        }else{
            $search=Product::where('name','LIKE','%'.$request->search.'%')->orWhere('sale_price', 'LIKE', "%{$request->search}%")->limit(6)->get();
        }
        $result=view('components.result',[
            'data'=>$search
        ])->render();
        return response()->json([
            'result'=>$result,
            'code'=>200,
            'count'=>$search->count()
        ],200);
    }
    public function contactPost(Request $request){
        Mail::send('components.contact',[
            'name'=>$request->name,
            'phone'=>$request->phone,
            'content'=>$request->content
        ],function($mail){
            $mail->to('oganic.example@gmail.com','Administrators Oganic');
            $mail->subject('Yêu cầu liên hệ lại');
            $mail->from(User::where('id',auth()->id())->first()->email);
        });
        return redirect()->back()->with('success','Cảm ơn bạn đã liên hệ với Chúng tôi!<br>Chúng tôi đã nhận được yêu cầu của bạn, chúng tôi sẽ liên hệ lại với bạn sớm nhất có thể!');
    }
}

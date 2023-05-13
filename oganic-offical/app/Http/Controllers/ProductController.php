<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Product::all();
        return view('admin.product.index',[
            'data'=>$data
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
        $category=Category::all();
        return view('admin.product.create',[
            'category'=>$category
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
        $products=Product::all();
        if($request->name==null||$request->file('image')==null||$request->price==0||$request->sale_price==0||$request->description==null||$request->short_description==null){
            return redirect()->route('product.index')->with('error','Trường dữ liệu không đầy đủ,vui lòng nhập lại!');
        }
        if($request->category==null){
            return redirect()->route('product.index')->with('error','Chưa có danh mục nào được thêm vào hệ thống,vui lòng nhập lại!');
        }
        foreach($products as $item){
            if($request->name==$item->name){
                return redirect()->route('product.index')->with('error','Tên sản phẩm đã tồn tại trong hệ thống!');
            }
        }
        $des = 'public/uploads';
        $image = $request->file('image')->getClientOriginalName();
        $product=new Product();
        $product->name=$request->name;
        $product->image=$image;
        $product->price=$request->price;
        $product->sale_price=$request->sale_price;
        $product->description=$request->description;
        $product->short_description=$request->short_description;
        $product->status=$request->status;
        $product->category_id=$request->category;
        $product->save();
        $request->file('image')->move($des,$image);
        return redirect()->route('product.index')->with('success','Thêm sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product=Product::find($id);
        $category=Category::all();
        return view('admin.product.edit',[
            'product'=>$product,
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
            $des = 'public/uploads';
            $product=Product::where('id',$id)->first();
            if(!$request->file('image')==null){
                $image = $request->file('image')->getClientOriginalName();
                $product->image=$image;
                $request->file('image')->move($des,$image);
            }
            if($request->name==null||$request->short_description==null||$request->price==0||$request->sale_price==0||$request->description==null){
                return redirect()->route('product.index')->with('error','Trường dữ liệu không đầy đủ,vui lòng nhập lại!');
            }
            $product->name=$request->name;
            $product->price=$request->price;
            $product->sale_price=$request->sale_price;
            $product->description=$request->description;
            $product->short_description=$request->short_description;
            $product->status=$request->status;
            $product->category_id=$request->category;
            $product->save();
            return redirect()->route('product.index')->with('success','Sửa sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product=Product::where('id',$id)->first();
        $product->delete();
        return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Category::all();
        return view('admin.category.index',[
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
        $categorys=Category::all();
        if($request->name==null){
            return redirect()->route('category.index')->with('error','Trường dữ liệu không đầy đủ,vui lòng nhập lại!');
        }
        foreach($categorys as $item){
            if($request->name==$item->name){
                return redirect()->route('category.index')->with('error','Tên danh mục đã tồn tại trong hệ thống!');
            }
        }
        $category=new Category();
        $category->name=$request->name;
        $category->save();
        return redirect()->route('category.index')->with('success','Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        if($request->name==null){
            return redirect()->route('category.index')->with('error','Trường dữ liệu không đầy đủ,vui lòng nhập lại!');
        }
        $category=Category::find($id);
        $category->name=$request->name;
        $category->save();
        return redirect()->route('category.index')->with('success','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category=Category::find($id);
        if($category->product->count()>0){
            return redirect()->route('category.index')->with('error','Không thể xóa danh mục này!');
        }else{
            $category->delete();
            return redirect()->route('category.index')->with('success','Xóa danh mục thành công!');
        }
    }
}

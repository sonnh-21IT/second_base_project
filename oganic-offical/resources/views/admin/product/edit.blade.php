@extends('layouts.admin')
@section('title')
   <title>Ogani-Admin | Product</title>
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
   <!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="{{url('public')}}/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
@endsection
@section('address')
   <li>
      <a href="{{route('admin.dashboard')}}">
         <i class="fa fa-home"></i>
      </a>
   </li>
   <li>
      <a href="{{route('product.index')}}">
         <i class="fa fa-fax text-primary"></i>
      </a>
   </li>
@endsection
@section('title-panner')
   <h2>Sản Phẩm</h2>
@endsection
@section('content')
<!-- start: page -->

   {{-- panel list --}}
   <section class="panel panel-featured">
      {{-- panel header start--}}
      <header class="panel-heading p-0">
         {{-- <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
         </div> --}}
         <div class="row">
            <div class="col-sm-6">
               <div class="mb-md">
                  <h2 class="panel-title">Thêm Mới Sản Phẩm</h2>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="mb-md text-right">
                  {{-- <a href="{{route('admincategory.create')}}" id="addToTable" class="btn btn-primary add-row">Add <i class="fa fa-plus"></i></a> --}}
                  {{-- <a href="{{route('product.create')}}" id="addToTable" class="btn btn-primary add-row">Thêm Sản Phẩm <i class="fa fa-plus"></i></a> --}}
               </div>
            </div>
         </div>
      </header>
      {{-- panel header end --}}
      {{-- panel body table start --}}
      <div class="panel-body">
         <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="col">
                        <label class="control-label" for="name">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col">
                        <label class="control-label" for="category">Danh mục</label>
                        <select data-plugin-selectTwo class="form-control populate" name="category" id="category">
                           @foreach ($category as $item)
                              @if($item->id==$product->category_id)
                                 <option value="{{$item->id}}" selected>{{$item->name}}</option>
                              @endif
                              <option value="{{$item->id}}">{{$item->name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-6">
                        <label class="control-label" for="price">Giá gốc</label>
                        <div class="input-group mb-md">
                           <span class="input-group-addon">₫</span>
                           <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
                           <span class="input-group-addon">.00</span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <label class="control-label" for="sale_price">Giá bán</label>
                        <div class="input-group mb-md">
                           <span class="input-group-addon">₫</span>
                           <input type="number" class="form-control" id="sale_price" name="sale_price" value="{{$product->sale_price}}">
                           <span class="input-group-addon">.00</span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col">
                        <label class="control-label" for="status">Trạng thái</label>
                        <div class="row">
                           <div class="col ml-lg">
                              <div class="radio">
                                 <label>
                                    <input type="radio" name="status" id="status" value="1" checked>
                                    Sẵn sàng
                                 </label>
                              </div>
                              <div class="radio">
                                 <label>
                                    @if ($product->status==0)
                                       <input type="radio" name="status" id="status" value="0" checked>
                                       Đang chờ
                                    @else
                                       <input type="radio" name="status" id="status" value="0">
                                       Đang chờ
                                    @endif
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                           <label class="control-label ml-sm" for="image">Chọn ảnh Upload</label>
                        </div>
                     </div>
                     <div class="row">
                        {{-- <div class="col-md-3"></div> --}}
                        <div class="col-md-12">
                           <div class="fileupload fileupload-new ml-sm" data-provides="fileupload">
                              <div class="input-append">
                                 <div class="uneditable-input">
                                    <i class="fa fa-file fileupload-exists" style="display: block"></i>
                                    <span class="fileupload-preview">
                                       {{$product->image}}
                                    </span>
                                 </div>
                                 <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists" style="display: block">Change</span>
                                    <span class="fileupload-new" style="display: none">Select file</span>
                                    <input type="file" id="image" name="image">
                                 </span>
                                 <a href="#" class="btn btn-default fileupload-exists"
                                    data-dismiss="fileupload">Remove</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="col">
                        <label for="short-description">Mô Tả Ngắn Gọn</label>
                        <textarea type="text" name="short_description" id="short-description" class="form-control summernote short-description">{{$product->short_description}}</textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col">
                        <label for="description">Mô Tả Chi Tiết</label>
                        <textarea type="text" name="description" id="description" class="form-control summernote description">{{$product->description}}</textarea>
                     </div>
                  </div>
               </div>
            </div>
            <hr>
            <div class="form-group">
               <div class="row text-center">
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                           <input type="submit" class="btn btn-primary btn-block" value="Xác nhận">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                           <a href="{{route('product.index')}}" class="btn btn-default btn-block">Hủy bỏ</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      {{-- panel body table end --}}
   </section>
   <!-- end: page -->
@endsection
@section('crud')
   <script src="{{url('public')}}/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
   <script>
      $(document).ready(function() {
         $('.short-description').summernote({
            height: 100,                 
            minHeight: null,             
            maxHeight: null,             
            focus: false                 
         }); 
         $('.description').summernote({
            height: 100,                 
            minHeight: null,             
            maxHeight: null,             
            focus: false                 
         }); 
      });
   </script>
@endsection
@extends('layouts.admin')
@section('title')
   <title>Ogani-Admin | Product</title>
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
                  <h2 class="panel-title">Danh Sách Sản Phẩm</h2>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="mb-md text-right">
                  {{-- <a href="{{route('admincategory.create')}}" id="addToTable" class="btn btn-primary add-row">Add <i class="fa fa-plus"></i></a> --}}
                  <a href="{{route('product.create')}}" id="addToTable" class="btn btn-primary add-row">Thêm Sản Phẩm <i class="fa fa-plus"></i></a>
               </div>
            </div>
         </div>
         {{-- alert start --}}
         @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               {{Session::get('error')}}
            </div>
         @endif
         @if (Session::has('success'))
            <div class="alert alert-info alert-dismissible">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               {{Session::get('success')}}
            </div>
         @endif
         {{-- end alert --}}
      </header>
      {{-- panel header end --}}
      {{-- panel body table start --}}
      <div class="panel-body" style="display: none">
         <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
               <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Xem trước</th>
                  <th class="text-center">Tên</th>
                  <th class="text-center">Danh mục</th>
                  <th class="text-center">Giá gốc</th>
                  <th class="text-center">Giá bán</th>
                  <th class="text-center">Trạng thái</th>
                  <th class="text-center">Ngày tạo</th>
                  <th class="text-center">Hành động</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $item)
                  <tr class="gradeX text-center">
                     <td class="actions">
                        {{$item->id}}
                     </td>
                     <td class="actions">
                        <img src="{{url('public/uploads')}}/{{$item->image}}" alt="" style="width: 100px">
                     </td>
                     <td class="actions">
                        {{$item->name}}
                     </td>
                     <td class="actions">
                        {{$item->category->name}}
                     </td>
                     <td class="actions">
                        {{ number_format($item->price)}} ₫
                     </td>
                     <td class="actions">
                        {{ number_format($item->sale_price)}} ₫
                     </td>
                     <td class="text-center actions">
                        @if ($item->status==0)
                           <span class="label label-warning">Đang chờ</span>
                        @else
                           <span class="label label-success">Sẵn sàng</span>
                        @endif
                        {{-- <input type="hidden" name="" value="{{$item->name}}" class="form-control category_status"> --}}
                     </td>
                     <td class="actions">
                        <span>
                           {{$item->created_at->format('d-m-Y')}}
                        </span>
                     </td>
                     {{-- <td class="actions-hover actions-fade text-center"> --}}
                     <td class="actions">
                        <a href="{{route('product.edit',$item->id)}}" class="edit-row"><i class="fa fa-pencil"></i> Sửa</a>
                        {{-- <a href="{{route('product.destroy',$item->id)}}" class="delete-row" data-name="{{$item->name}}"><i class="fa fa-trash-o"></i> Xóa</a> --}}
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
      {{-- panel body table end --}}
   </section>
   {{-- form delete --}}
   <form action="" method="post" id="form-delete">
      @csrf
      @method('delete')
   </form>
   {{-- modal --}}
   @include('admin.product.destroy')
   <!-- end: page -->
@endsection
@section('crud')
   <script>
      $(window).on('load', function () {
         $('.panel-body').slideDown(750);
            $('.summernote').summernote();
      })
   </script>
   <script>
      // delete
      // $('.delete-row').click(function(ev){
      //    ev.preventDefault();
      //    var _name=$(this).attr('data-name');
      //    $('span#product').text('\''+_name+'\'');

      //    $('.modal-delete').fadeIn(500);
      //    var _href=$(this).attr('href');
      //    // on delete
      //    $('.btn-delete').click(function(ev){
      //       $('form#form-delete').attr('action',_href);
      //       $('.modal-delete').fadeOut(500);
      //       $('form#form-delete').submit();
      //    })
      // })
      // close modal
      $('a.btn-close').click(function(ev){
         ev.preventDefault();
         $('.modal-delete').fadeOut(500);
      })
   </script>
@endsection
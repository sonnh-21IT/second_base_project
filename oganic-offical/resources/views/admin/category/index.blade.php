@extends('layouts.admin')
@section('title')
   <title>Ogani-Admin | Category</title>
@endsection
@section('title-panner')
   <h2>Danh Mục</h2>
@endsection
@section('address')
   <li>
      <a href="{{route('admin.dashboard')}}">
         <i class="fa fa-home"></i>
      </a>
   </li>
   <li>
      <a href="{{route('category.index')}}">
         <i class="fa fa-list-alt text-primary"></i>
      </a>
   </li>
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
                  <h2 class="panel-title">Danh Sách Danh Mục</h2>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="mb-md text-right">
                  {{-- <a href="{{route('admincategory.create')}}" id="addToTable" class="btn btn-primary add-row">Add <i class="fa fa-plus"></i></a> --}}
                  <a href="" id="addToTable" class="btn btn-primary add-row">Thêm Danh Mục <i class="fa fa-plus"></i></a>
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
                  <th class="text-center">Tên</th>
                  <th class="text-center">Tổng sản phẩm</th>
                  {{-- <th class="text-center">Trạng thái</th> --}}
                  <th class="text-center">Ngày tạo</th>
                  <th class="text-center">Hành động</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $item)
                  <tr class="gradeX text-center">
                     <td>
                        {{$item->id}}
                     </td>
                     <td>
                        {{$item->name}}
                     </td>
                     <td>
                        {{$item->product()->count()}}
                     </td>
                     {{-- <td class="text-center">
                        @if ($item->status==0)
                           <span class="label label-warning">Đang chờ</span>
                        @else
                           <span class="label label-success">Sẵn sàng</span>
                        @endif
                        <input type="hidden" name="" value="{{$item->name}}" class="form-control category_status">
                     </td> --}}
                     <td>{{$item->created_at->format('d-m-Y')}}</td>
                     {{-- <td class="actions-hover actions-fade text-center"> --}}
                     <td class="actions">
                        <a href="{{route('category.update',$item->id)}}" class="edit-row" data-name="{{$item->name}}" data-status="{{$item->status}}"><i class="fa fa-pencil"></i> Sửa</a>
                        <a href="{{route('category.destroy',$item->id)}}" class="delete-row" data-name="{{$item->name}}"><i class="fa fa-trash-o"></i> Xóa</a>
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
   @include('admin.category.create')
   @include('admin.category.edit')
   @include('admin.category.destroy')
   <!-- end: page -->
@endsection
{{-- section action --}}
@section('crud')
   {{-- on load  --}}
   <script>
      $(window).on('load', function () {
         $('.panel-body').slideDown(750);
      })
   </script>
   {{-- action:add,edit,delete --}}
   <script>
      // add
      $('.add-row').click(function(ev){
         ev.preventDefault();
         $('.modal-add').fadeIn(500);
         // on add
         $('a.btn-done-create').click(function(ev){
            $('.modal-add').fadeOut(500);
            $('form#form-add').submit();
         })
      })
      //edit
      $('.edit-row').click(function(ev){
         ev.preventDefault();
         var _name=$(this).attr('data-name');
         $('#name_update').val(_name);
         var _status=$(this).attr('data-status');
         // if(_status==0){
         //    $('#checked').html(
         //             '<div class="radio">'
         //                +'<label>'
         //                   +'<input type="radio" name="status" id="publuc" value="1">'
         //                   +'Sẵn sàng'
         //                +'</label>'
         //             +'</div>'
         //             +'<div class="radio">'
         //                +'<label>'
         //                   +'<input type="radio" name="status" id="private" value="0" checked>'
         //                   +'Đang chờ'
         //                +'</label>'
         //             +'</div>')
         // }else{
         //    $('#checked').html(
         //             '<div class="radio">'
         //                +'<label>'
         //                   +'<input type="radio" name="status" id="publuc" value="1" checked>'
         //                   +'Sẵn sàng'
         //                +'</label>'
         //             +'</div>'
         //             +'<div class="radio">'
         //                +'<label>'
         //                   +'<input type="radio" name="status" id="private" value="0">'
         //                   +'Đang chờ'
         //                +'</label>'
         //             +'</div>')
         // }
         var _href=$(this).attr('href');
         $('.modal-edit').fadeIn(500);
         // on edit
         $('.btn-done-edit').click(function(ev){
            $('form#form-edit').attr('action',_href);
            $('.modal-edit').fadeOut(500);
            $('form#form-edit').submit();
         })
      })
      // delete
      $('.delete-row').click(function(ev){
         ev.preventDefault();
         var _name=$(this).attr('data-name');
         $('span#category').text(' \''+_name+'\'');

         $('.modal-delete').fadeIn(500);
         var _href=$(this).attr('href');
         // on delete
         $('.btn-delete').click(function(ev){
            $('form#form-delete').attr('action',_href);
            $('.modal-delete').fadeOut(500);
            $('form#form-delete').submit();
         })
      })
      // close modal
      $('a.btn-close').click(function(ev){
         ev.preventDefault();
         $('.modal-add').fadeOut(500);
         $('.modal-edit').fadeOut(500);
         $('.modal-delete').fadeOut(500);
      })
   </script>
@endsection
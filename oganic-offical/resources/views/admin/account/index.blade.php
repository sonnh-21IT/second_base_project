@extends('layouts.admin')
@section('title')
   <title>Ogani-Admin | Account</title>
@endsection
@section('address')
   <li>
      <a href="{{route('admin.dashboard')}}">
         <i class="fa fa-home"></i>
      </a>
   </li>
   <li>
      <a href="{{route('user.index')}}">
         <i class="fa fa-users text-primary"></i>
      </a>
   </li>
@endsection
@section('title-panner')
   <h2>Tài khoản người dùng</h2>
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
                  <h2 class="panel-title">Danh Sách Người Dùng</h2>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="mb-md text-right">
                  {{-- <a href="{{route('admincategory.create')}}" id="addToTable" class="btn btn-primary add-row">Add <i class="fa fa-plus"></i></a> --}}
                  {{-- <a href="" id="addToTable" class="btn btn-primary add-row">Thêm Danh Mục <i class="fa fa-plus"></i></a> --}}
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
                  <th class="text-center">Email</th>
                  <th class="text-center">Vai trò</th>
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
                        {{$item->email}}
                     </td>
                     <td>
                        @if ($item->role=='customer')
                           {{'Khách hàng'}}
                        @else
                           {{'Quản trị'}}
                        @endif
                     </td>
                     <td>{{$item->created_at->format('d-m-Y')}}</td>
                     <td class="actions">
                        @if (Auth::user()->role=='admin'&&strtotime($item->updated_at->format('Y-m-d H:i:s'))>strtotime(Auth::user()->updated_at->format('Y-m-d H:i:s')))
                           <a href="{{route('user.update',$item->id)}}" class="edit-row" data-name="{{$item->name}}" data-role="{{$item->role}}"><i class="fa fa-pencil"></i> Quyền</a>
                           <a href="{{route('user.destroy',$item->id)}}" class="delete-row" data-name="{{$item->name}}"><i class="fa fa-trash-o"></i> Xóa</a>
                        @endif
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
   @include('admin.account.edit')
   @include('admin.account.destroy')
   <!-- end: page -->
@endsection
@section('crud')
   {{-- on load  --}}
   <script>
      $(window).on('load', function () {
         $('.panel-body').slideDown(750);
      })
   </script>
   <script>
      //edit
      $('.edit-row').click(function(ev){
         ev.preventDefault();
         var _name=$(this).attr('data-name');
         $('#name_update').val(_name);
         var _role=$(this).attr('data-role');
         if(_role=='admin'){
            $('#checked').html(
                     '<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="role" id="publuc" value="admin" checked>'
                           +'Quản trị'
                        +'</label>'
                     +'</div>'
                     +'<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="role" id="private" value="customer">'
                           +'Khách Hàng'
                        +'</label>'
                     +'</div>')
         }else{
            $('#checked').html(
                     '<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="role" id="publuc" value="admin">'
                           +'Quản trị'
                        +'</label>'
                     +'</div>'
                     +'<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="role" id="private" value="customer" checked>'
                           +'Khách Hàng'
                        +'</label>'
                     +'</div>')
         }
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
         $('span#account').text(' \''+_name+'\'');

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
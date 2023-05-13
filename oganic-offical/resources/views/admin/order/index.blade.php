@extends('layouts.admin')
@section('title')
   <title>Ogani-Admin | Order</title>
@endsection
@section('title-panner')
   <h2>Đơn Hàng</h2>
@endsection
@section('address')
   <li>
      <a href="{{route('admin.dashboard')}}">
         <i class="fa fa-home"></i>
      </a>
   </li>
   <li>
      <a href="{{route('category.index')}}">
         <i class="fa fa-shopping-cart text-primary"></i>
      </a>
   </li>
@endsection
@section('content')
   <!-- start: page -->
   
   {{-- panel list --}}
   <section class="panel panel-featured">
      {{-- panel header start--}}
      <header class="panel-heading p-0">
         <div class="panel-actions">
            {{-- <a href="#" class="fa fa-caret-down"></a> --}}
            {{-- <a href="#" class="fa fa-times"></a> --}}
         </div>
         <div class="row">
            <div class="col-sm-6">
               <div class="mb-md">
                  <h2 class="panel-title">Danh Sách Đơn Hàng</h2>
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
                  <th class="text-center">Người đặt</th>
                  <th class="text-center">Tên sản phẩm</th>
                  <th class="text-center">Trạng thái</th>
                  <th class="text-center">Điện thoại</th>
                  <th class="text-center">Địa chỉ</th>
                  <th class="text-center">Ngày đặt</th>
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
                        {{$item->user()->first()->name}}
                     </td>
                     <td>
                        <ol>
                           @foreach ($item->orderdetail()->get() as $subitem)
                              <li>{{$subitem->product()->first()->name}}</li>
                           @endforeach
                        </ol>
                     </td>
                     <td class="text-center">
                        @if ($item->status==0)
                           <span class="label label-warning">Đang chờ</span>
                        @elseif ($item->status==1)
                           <span class="label label-success">Đang giao</span>
                        @elseif ($item->status==-1)
                           <span class="label label-danger">Đã hủy</span>
                        @endif
                     </td>
                     <td>{{$item->user()->first()->phone}}</td>
                     <td>{{$item->address}}</td>
                     <td>{{$item->created_at->format('d-m-Y')}}</td>
                     {{-- <td class="actions-hover actions-fade text-center"> --}}
                     <td class="actions">
                        <a class="edit-row" data-name="{{$item->user()->first()->name}}" data-status="{{$item->status}}" href="{{route('order.update',$item->id)}}"><i class="fa fa-pencil"></i> Trạng thái</a>
                        {{-- <a href=""><i class="fa fa-trash-o"></i> Hủy đơn</a> --}}
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
   @include('admin.order.edit')
   <!-- end: page -->
@endsection
@section('crud')
<script>
   $(window).on('load', function () {
      $('.panel-body').slideDown(750);
   });
</script>
<script>
   //edit
   $('.edit-row').click(function(ev){
         ev.preventDefault();
         var _name=$(this).attr('data-name');
         $('#name_update').val(_name);
         var _status=$(this).attr('data-status');
         if(_status==0){
            $('#checked').html(
                     '<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="status" id="publuc" value="1">'
                           +'Đang giao'
                        +'</label>'
                     +'</div>'
                     +'<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="status" id="private" value="0" checked>'
                           +'Đang chờ'
                        +'</label>'
                     +'</div>'
                     +'<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="status" id="destroy" value="-1">'
                           +'Đã hủy'
                        +'</label>'
                     +'</div>')
         }else if(_status==1){
            $('#checked').html(
                     '<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="status" id="publuc" value="1" checked>'
                           +'Đang giao'
                        +'</label>'
                     +'</div>'
                     +'<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="status" id="private" value="0">'
                           +'Đang chờ'
                        +'</label>'
                     +'</div>'
                     +'<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="status" id="destroy" value="-1">'
                           +'Đã hủy'
                        +'</label>'
                     +'</div>')
         }else{
            $('#checked').html(
                     '<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="status" id="publuc" value="1">'
                           +'Đang giao'
                        +'</label>'
                     +'</div>'
                     +'<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="status" id="private" value="0">'
                           +'Đang chờ'
                        +'</label>'
                     +'</div>'
                     +'<div class="radio">'
                        +'<label>'
                           +'<input type="radio" name="status" id="destroy" value="-1" checked>'
                           +'Đã hủy'
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
      // close modal
      $('a.btn-close').click(function(ev){
         ev.preventDefault();
         $('.modal-edit').fadeOut(500);
      })
</script>
@endsection
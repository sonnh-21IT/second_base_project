@extends('layouts.site')
@section('title')
   <title>Ogani | Order</title>
@endsection
@section('nav')
   <li><a href="{{route('home.index')}}">Trang Chủ</a></li>
   <li><a href="{{route('home.shop')}}">Cửa Hàng</a></li>
   <li><a href="{{route('home.introduce')}}">Giới Thiệu</a></li>
   <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
@endsection
@section('nav-search')
   <div class="row justify-content-center">
      <div class="col-lg-9">
         <div class="hero__search">
            <div class="hero__search__form">
               <form action="#">
                  <input type="text" placeholder="Bạn cần gì?">
                  {{-- <button type="submit" class="site-btn">Tìm</button> --}}
               </form>
            </div>
            <div class="hero__search__phone">
               <div class="hero__search__phone__icon">
                  <i class="fa fa-phone"></i>
               </div>
               <div class="hero__search__phone__text">
                  <h5>+84 984.399.784</h5>
                  <span>Hỗ trợ 24/7</span>
               </div>
            </div>
         </div>
         <div class="search-result col-lg-9 pr-5">
         </div>
      </div>
   </div>
@endsection
@section('main')
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-section set-bg" data-setbg="{{url('public/site')}}/img/breadcrumb.jpg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center">
                  <div class="breadcrumb__text">
                     <h2>Đơn Hàng Của Bạn</h2>
                     <div class="breadcrumb__option">
                        <a href="{{route('home.index')}}">Trang chủ</a>
                        <span>Đơn hàng</span>
                     </div>
                  </div>
            </div>
         </div>
      </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<style>
   @media screen and (max-width: 750px) {
      .shoping__cart__table table{
         width: 1000px;
      }
      .shoping__cart__table table tbody tr td.shoping__cart__item {
         width: 300px;
      }
      .shoping__cart__table table tbody tr td.shoping__cart__item__close {
         width: 100px;
      }
   }
</style>
<section class="shoping-cart spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="order-wrapper">
               @include('components.order')
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
               <div class="shoping__cart__btns">
                  <a href="{{route('home.shop')}}" class="primary-btn cart-btn">TIẾP TỤC MUA SẮM</a>
               </div>
         </div>
      </div>
   </div>
</section>
@include('library.site.cart')

<!-- Shoping Cart Section End -->
@endsection
@section('js')
   <script>
      $('.order-remove').click(function(event){
         event.preventDefault();
         var _href=$(this).attr('href');
         $('.modal-order-done').show();
         $('.btn-order-back').click(function(event){
            event.preventDefault();
            $('.modal-order-done').hide()
         });
         $('.btn-order-remove').click(function(event){
            event.preventDefault();
            $('.modal-order-done').hide();
            $.ajax({
               type:'get',
               url:_href,
               success:function(data){
                  if(data.code===200){
                     $('.order-wrapper').html(data.ordercomponent);
                  }
               },
               error:function(){

               }
            });
         })
      });
   </script>
@endsection
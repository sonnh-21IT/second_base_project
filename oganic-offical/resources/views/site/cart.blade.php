@extends('layouts.site')
@section('title')
   <title>Ogani | Carts</title>
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
                     <h2>Giỏ hàng</h2>
                     <div class="breadcrumb__option">
                        <a href="{{route('home.index')}}">Trang chủ</a>
                        <span>Giỏ hàng</span>
                     </div>
                  </div>
            </div>
         </div>
      </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Shoping Cart Section Begin -->
<div class="cart_wrapper">
   @include('components.cart')
</div>

<!-- Shoping Cart Section End -->
@endsection
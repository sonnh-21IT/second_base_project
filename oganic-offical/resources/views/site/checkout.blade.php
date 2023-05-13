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
                     <h2>Đặt Hàng</h2>
                     <div class="breadcrumb__option">
                        <a href="{{route('home.index')}}">Trang Chủ</a>
                        <span>Đặt hàng</span>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </section>
<!-- Checkout Section Begin -->
<section class="checkout spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            @if (Session::has('error'))
               <div id="alert-panner" class="alert alert-warning alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close" id="close">&times;</a>
                  <span>{{Session::get('error')}}</span>
               </div>
            @endif
            @if (Session::has('success'))
               <div id="alert-panner" class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close" id="close">&times;</a>
                  <span>{{Session::get('success')}}</span>
               </div>
            @endif
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <h6>
               {{-- <span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code --}}
               Hày hoàn thành đơn hàng của bạn!
            </h6>
         </div>
      </div>
      <div class="checkout__form">
         <h4>Thông tin đặt hàng</h4>
         <form action="{{route('order.store')}}" method="POST">
            @csrf
               <div class="row">
                  <div class="col-lg-8 col-md-6">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="checkout__input">
                              <p>Tên người nhận<span>*</span></p>
                              <input type="text" name="name" value="">
                           </div>
                        </div>
                           <div class="col-lg-6">
                              <div class="checkout__input">
                                 <p>Số điện thoại người nhận<span>*</span></p>
                                 <input type="text" name="phone">
                              </div>
                           </div>
                        </div>
                     <div class="checkout__input">
                        <p>Tỉnh/Thành Phố<span>*</span></p>
                        <input type="text" name="town">
                     </div>
                     <div class="checkout__input">
                        <p>Quận/Huyện<span>*</span></p>
                        <input type="text" name="district">
                     </div>
                     <div class="checkout__input">
                        <p>Địa chỉ nhận hàng<span>*</span></p>
                        <input type="text" placeholder="Địa chỉ chi tiết" name="detail">
                     </div>
                     <div class="checkout__input">
                        <p>Ghi Chú<span>*</span></p>
                        <input type="text"
                           placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt cho giao hàng."
                           name="note">
                     </div>
                     <div class="checkout__input__checkbox">
                        <label for="read">
                           Đã đọc kỹ chính sách bán hàng?
                           <input type="checkbox" id="read" checked>
                           <span class="checkmark"></span>
                        </label>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                     @if (!empty($carts))
                        <div class="checkout__order">
                           <h4>Đơn hàng của bạn</h4>
                           <div class="checkout__order__products">Mặt Hàng <span>Tổng</span></div>
                           <ul>
                              @php
                                 $total=0;
                              @endphp
                              @foreach ($carts[Auth::user()->id] as $id => $item)
                                 @php
                                    $total+=$item['price']*$item['quantity'];
                                 @endphp
                                 <li>{{$item['name']}} x {{$item['quantity']}}<span>{{number_format($item['price']*$item['quantity'])}}</span></li>
                              @endforeach
                           </ul>
                           <div class="checkout__order__subtotal">Tổng <span>{{number_format($total)}}</span></div>
                           <div class="checkout__order__total">Thanh Toán <span>{{number_format($total)}}</span></div>
                           
                           <div class="checkout__input__checkbox">
                              <label for="payment">
                                 Lúc nhận hàng
                                 <input type="checkbox" id="payment" checked>
                                 <span class="checkmark"></span>
                              </label>
                           </div>
                           <button type="submit" class="site-btn">Đặt Hàng</button>
                        </div>
                     @endif
                  </div>
               </div>
         </form>
      </div>
   </div>
</section>
<!-- Checkout Section End -->
@endsection
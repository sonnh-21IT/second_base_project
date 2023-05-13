@extends('layouts.site')
@section('title')
   <title>Ogani | Contact</title>
@endsection
@section('nav')
   <li><a href="{{route('home.index')}}">Trang Chủ</a></li>
   <li><a href="{{route('home.shop')}}">Cửa Hàng</a></li>
   <li><a href="{{route('home.introduce')}}">Giới Thiệu</a></li>
   <li class="active"><a href="{{route('home.contact')}}">Liên Hệ</a></li>
@endsection
@section('nav-search')
<div class="row justify-content-center">
   <div class="col-lg-9">
      <div class="hero__search">
         <div class="hero__search__form">
            <form action="#">
               <input type="text" class="input-search-ajax" placeholder="Bạn cần gì?">
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
                     <h2>Liên hệ chúng tôi</h2>
                     <div class="breadcrumb__option">
                        <a href="{{route('home.index')}}">Trang Chủ</a>
                        <span>Liên hệ chúng tôi</span>
                     </div>
                  </div>
            </div>
         </div>
      </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                  <div class="contact__widget">
                     <span class="icon_phone"></span>
                     <h4>Điện Thoại</h4>
                     <p>+84 984 399 784</p>
                  </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                  <div class="contact__widget">
                     <span class="icon_pin_alt"></span>
                     <h4>Địa Chỉ</h4>
                     <p>470 Trần Đại Nghĩa - TP.Đà Nẵng</p>
                  </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                  <div class="contact__widget">
                     <span class="icon_clock_alt"></span>
                     <h4>Mở Cửa</h4>
                     <p>10:00 - 23:00</p>
                  </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                  <div class="contact__widget">
                     <span class="icon_mail_alt"></span>
                     <h4>Email</h4>
                     <p>oganic.example@gamil.com</p>
                  </div>
            </div>
         </div>
      </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
      <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.74704058834!2d108.25009031436498!3d15.974581146211722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421088e365cc75%3A0x6648fdda14970b2c!2zNDcwIMSQxrDhu51uZyBUcuG6p24gxJDhuqFpIE5naMSpYSwgSG_DoCBI4bqjaSwgTmfFqSBIw6BuaCBTxqFuLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1668358756491!5m2!1sen!2s"
         height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      <div class="map-inside">
         <i class="icon_pin"></i>
         <div class="inside-widget">
            <h4>Đà Nẵng</h4>
            <ul>
                  <li>Di Động: +84 984 399 784</li>
                  <li>Địa chỉ: 470 Trần Đại Nghĩa - TP.Đà Nẵng</li>
            </ul>
         </div>
      </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
      <div class="container">
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
         <div class="row">
            <div class="col-lg-12">
                  <div class="contact__form__title">
                     <h2>Để lại tin nhắn</h2>
                  </div>
            </div>
         </div>
         <form action="{{route('home.contactPost')}}" method="POST">
            @csrf
            <div class="row">
                  <div class="col-lg-6 col-md-6">
                     <input type="text" name="name" placeholder="Tên của bạn">
                  </div>
                  <div class="col-lg-6 col-md-6">
                     <input type="text" name="phone" placeholder="Điện thoại của bạn">
                  </div>
                  <div class="col-lg-12 text-center">
                     <textarea placeholder="Tin nhắn của bạn" name="content"></textarea>
                     <button type="submit" class="site-btn">Yêu cầu Liên Hệ Lại</button>
                  </div>
            </div>
         </form>
      </div>
</div>
<!-- Contact Form End -->
@endsection
@section('js')
@endsection
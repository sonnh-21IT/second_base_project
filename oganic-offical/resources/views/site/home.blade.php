@extends('layouts.site')
@section('title')
   <title>Ogani | Home</title>
@endsection
@section('nav')
   <li class="active"><a href="{{route('home.index')}}">Trang Chủ</a></li>
   <li><a href="{{route('home.shop')}}">Cửa Hàng</a></li>
   <li><a href="{{route('home.introduce')}}">Giới Thiệu</a></li>
   <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
@endsection
@section('nav-search')
<div class="row">
   <div class="col-lg-3">
      <div class="hero__categories">
            <div class="hero__categories__all">
               <i class="fa fa-bars"></i>
               <span>Tất cả danh mục</span>
            </div>
            <ul>
               @foreach ($data as $item)
                  <li><a id="category-croll" data-id="category-{{$item->id}}" href="#">{{$item->name}}</a></li>
               @endforeach
            </ul>
      </div>
   </div>
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
      <div class="hero__item set-bg" style="" data-setbg="{{url('public/site')}}/img/bannerset.jpg">
         <div class="hero__text">
            <span>Thực phẩm hữu cơ</span>
            <h2>Hạt <br />100% Hữu cơ</h2>
            <p>Nhận và giao hàng miễn phí có sẵn</p>
            <a href="{{route('home.shop')}}" class="primary-btn">Cửa hàng</a>
         </div>
      </div>
   </div>
</div>
@endsection
@section('main')
<!-- Categories Section Begin -->
<section class="categories">
   <div class="container">
      <div class="row">
         <div class="categories__slider owl-carousel">
            @foreach ($sale as $item)
               <div class="col-lg-3">
                  <a href="{{route('home.show',$item->id)}}">
                     <div class="categories__item set-bg" data-setbg="{{url('public/uploads')}}/{{$item->image}}">
                        {{-- <h5><a class="bg-success text-white" style="" href="{{route('home.show',$item->id)}}">{{$item->name}}</a></h5> --}}
                     </div>
                  </a>
               </div>
            @endforeach
         </div>
      </div>
   </div>
</section>
<!-- Categories Section End -->
   <!-- Featured Section Begin -->
   <section class="featured spad">
      @foreach ($data as $item)
         @if ($item->product()->get()->count()!=0)
            <div class="container category-{{$item->id}}">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="section-title">
                        <h2 class="h4">{{$item->name}}</h2>
                     </div>
                  </div>
               </div>
               <div class="row featured__fillter justify-content-center">
                  @foreach ($item->product()->limit(4)->get() as $product)
                     <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                           <div class="featured__item__pic set-bg" data-setbg="{{url('public/uploads')}}/{{$product->image}}">
                              <ul class="featured__item__pic__hover">
                                 {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                                 <li><a href="{{route('home.show',$product->id)}}"><i class='fa fa-navicon'></i></a></li>
                                 <li>
                                    <a class="btn-add-cart" href="{{route('addToCart',$product->id)}}"
                                       @guest
                                          data-url="{{route('login')}}"
                                       @else
                                          data-url=''
                                       @endguest
                                    ><i class="fa fa-shopping-cart"></i></a>
                                 </li>
                              </ul>
                           </div>
                           <div class="featured__item__text">
                              <h6><a href="#">{{$product->name}}</a></h6>
                              <h5>{{number_format($product->sale_price)}} đ</h5>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         @endif
      @endforeach
   </section>
   <!-- Featured Section End -->
@endsection
@section('js')
   <script>
      $('a#category-croll').click(function(event){
         event.preventDefault();
         var idCroll=$(this).attr('data-id');
         var obj = $("."+idCroll).position();
         $("html, body").animate({ scrollTop: obj.top },1000);
      })
   </script>
@endsection

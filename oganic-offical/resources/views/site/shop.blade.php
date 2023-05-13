@extends('layouts.site')
@section('title')
   <title>Ogani | Shop</title>
@endsection
@section('nav')
   <li><a href="{{route('home.index')}}">Trang Chủ</a></li>
   <li class="active"><a href="{{route('home.shop')}}">Cửa Hàng</a></li>
   <li><a href="{{route('home.introduce')}}">Giới Thiệu</a></li>
   <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
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
                  <h2>Cửa hàng Ogani</h2>
                  <div class="breadcrumb__option">
                     <a href="{{route('home.index')}}">Trang chủ</a>
                     <span>Cửa hàng</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
<!-- Breadcrumb Section End -->
   <!-- Product Section Begin -->
   <section class="product spad">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-5">
                  <div class="sidebar">
                     <div class="sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                           @foreach ($category as $item)
                              <li><a href="" class="category-item" data-id="{{$item->id}}">{{$item->name}}</a></li>
                           @endforeach
                        </ul>
                     </div>
                     <div class="sidebar__item">
                        <form id="filter" method="POST">
                           @csrf
                           <h4>Giá bán</h4>
                           <div class="price-range-wrap">
                              <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                 data-min="10000" data-max="1000000">
                                 <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                 <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                 <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                              </div>
                              <div class="range-slider">
                                 <div class="price-input">
                                    <input type="text" class="text-center" id="minamount" style="max-width: 40%;">
                                    <input type="text" class="text-center" id="maxamount" style="max-width: 40%;">
                                 </div>
                              </div>
                           </div>
                           <hr>
                           <div class="form-group">
                              <div class="row justify-content-center">
                                 <div class="col-md-6"><button type="submit" class="btn btn-danger btn-block my-1"><i class='fa fa-filter'></i> Lọc</button></div>
                              </div>
                           </div>
                        </form>
                     </div>
                     @if (!empty($laster))
                        <div class="sidebar__item">
                           <div class="latest-product__text">
                              <h4>Sản phẩm mới</h4>
                              <div class="latest-product__slider owl-carousel">
                                 @foreach ($laster as $item)
                                    <div class="latest-prdouct__slider__item">
                                       <a href="{{route('home.show',$item->id)}}" class="latest-product__item">
                                          <div class="latest-product__item__pic">
                                             <img src="{{url('public/uploads')}}/{{$item->image}}" alt="">
                                          </div>
                                          <div class="latest-product__item__text">
                                             <h6>{{$item->name}}</h6>
                                             <span>{{ number_format($item->price)}} ₫</span>
                                          </div>
                                       </a>
                                    </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                     @endif
                  </div>
            </div>
            <div class="col-lg-9 col-md-7">
               <div class="product__discount">
                  <div class="section-title product__discount__title">
                     <h2>Giảm giá</h2>
                  </div>
                  <div class="row">
                     <div class="product__discount__slider owl-carousel">
                        @foreach ($product as $item)
                           @if ($item->price>$item->sale_price)
                              <div class="col-lg-4">
                                 <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                       data-setbg="{{url('public/uploads')}}/{{$item->image}}">
                                       <div class="product__discount__percent"><span>-{{round((($item->price-$item->sale_price)/$item->price)*100,0)}} %</span></div>
                                       <ul class="product__item__pic__hover">
                                             {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                                             <li><a href="{{route('home.show',$item->id)}}"><i class='fa fa-navicon'></i></a></li>
                                             <li>
                                                <a class="btn-add-cart" href="{{route('addToCart',$item->id)}}"
                                                   @guest
                                                      data-url="{{route('login')}}"
                                                   @else
                                                      data-url=''
                                                   @endguest
                                                   ><i class="fa fa-shopping-cart"></i></a>
                                             </li>
                                       </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                       <span>{{$item->category->name}}</span>
                                       <h5><a>{{$item->name}}</a></h5>
                                       <div class="product__item__price">{{ number_format($item->sale_price)}} ₫<span>{{ number_format($item->price)}} ₫</span></div>
                                    </div>
                                 </div>
                              </div>
                           @endif
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="filter__item mt-0">
                  <div class="row">
                     <div class="col">
                        <div class="row">
                           <div class="col-lg-4 col-md-5">
                              <div class="filter__sort mt-4">
                                 <span>Hiển thị tất cả theo :</span>
                                 <select onchange="sortP(this)">
                                    <option value="default">Mặc định</option>
                                    <option value="latest">Mới nhất</option>
                                    <option value="cheapest">Rẻ nhất</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-5">
                              <div class="filter__found mt-4">
                                 <h6><span id="total">{{$sort->count()}}</span> sản phẩm đã tìm thấy</h6>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-5">
                              <div class="filter__sort mt-4">
                                 <span>Hiển thị :</span>
                                 <select onchange="display(this)">
                                    <option value="15">15 sản phẩm</option>
                                    <option value="20">20 sản phẩm</option>
                                    <option value="25">25 sản phẩm</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row justify-content-end">
                           <div class="col-lg-4 col-md-12">
                              <form id="search" method="POST">
                                 @csrf
                                 <div class="input-group">
                                    <input type="text" class="form-control search-val" id="input-search" placeholder="Search" name="search">
                                    <button type="submit" class="input-group-text btn" id="search-btn" style="background-color: #dc3545;color:white"><i class='fa fa-search'></i></button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="product-wrapper">
                  @include('components.product')
               </div>
               </div>
            </div>
</section>
<!-- Product Section End -->
@endsection
@section('js')
<script>
   var csrf='{{ csrf_token() }}';
   $('form#search').submit(function(event){
      event.preventDefault();
      let search=$('#input-search').val();
      if(!search==''){
         $.ajax({
            type:'POST',
            url:"{{route('home.search')}}",
            data:{search:search,_token:csrf},
            success:function(data){
               if(data.code===200){
                  $('.product-wrapper').html(data.productcomponent);
                  $('#total').text(data.count);
               }
            },
            error:function(){

            }
         });
      }
   });
   $('form#filter').submit(function(event){
      event.preventDefault();
      let from=$('#minamount').val();
      let to=$('#maxamount').val();
      if(from!=0||to!=0||from<to){
         $.ajax({
            type:'POST',
            url:"{{route('home.filtered')}}",
            data:{from:from,to:to,_token:csrf},
            success:function(data){
               if(data.code===200){
                  $('.product-wrapper').html(data.productcomponent);
                  $('#total').text(data.count);
               }
               // alert('thành công')
            },
            error:function(){

            }
         });
      }
   });
   function sortP(obj){
      var sortCM=obj.value;
      $.ajax({
         type:'GET',
         url:"{{route('home.sort')}}",
         data:{sort:sortCM},
         success:function(data){
            if(data.code===200){
               $('.product-wrapper').html(data.productcomponent);
               $('#total').text(data.count);
            }
         },
         error:function(){

         }
      });
   };
   function display(obj){
      var displayCM=obj.value;
      $.ajax({
         type:'GET',
         url:"{{route('home.display')}}",
         data:{display:displayCM},
         success:function(data){
            if(data.code===200){
               $('.product-wrapper').html(data.productcomponent);
               $('#total').text(data.count);
            }
         },
         error:function(){

         }
      });
   };
   $('.category-item').click(function(event){
      event.preventDefault();
      let category_id=$(this).attr('data-id');
      $.ajax({
            type:'GET',
            url:"{{route('home.cateFilter')}}",
            data:{id:category_id},
            success:function(data){
               if(data.code===200){
                  $('.product-wrapper').html(data.productcomponent);
                  $('#total').text(data.count);
               }
            },
            error:function(){

            }
         });
   });
</script>
@endsection
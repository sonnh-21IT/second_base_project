@extends('layouts.site')
@section('title')
   <title>Ogani | {{$product->category()->first()->name}}</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
         <div class="search-result p-0 col-8">
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
                     <h2>{{$product->name}}</h2>
                     <div class="breadcrumb__option">
                        <a href="{{route('home.index')}}">Trang Chủ</a>
                        {{-- <a href="#">{{$product->category()->first()->name}}</a> --}}
                        <span>{{$product->category()->first()->name}}</span>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Product Details Section Begin -->
   <section class="product-details spad">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6">
               <div class="product__details__pic">
                  <div class="product__details__pic__item">
                     <img class="product__details__pic__item--large"
                           src="{{url('public/uploads')}}/{{$product->image}}" alt="">
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6">
               <div class="product__details__text">
                  <h3>{{$product->name}}</h3>
                  <div class="product__details__rating">
                     <div id="rateYo"></div>
                  </div>
                  <div class="product__details__price">{{number_format($product->sale_price)}} đ</div>
                  @php
                     echo $product->short_description
                  @endphp
                  <br>
                  <a class="btn-add-cart primary-btn" href="{{route('addToCart',$product->id)}}"
                     @guest
                        data-url="{{route('login')}}"
                     @else
                        data-url=''
                     @endguest
                     >Thêm vào giỏ</a>
                  <ul>
                     <li><b>Tình trạng</b>
                        @if ($product->status==1)
                           Còn hàng
                        @else
                           Hết hàng
                        @endif
                     <span></span></li>
                     <li><b>Vận chuyển</b>
                        @guest
                           <span><a class="text-success" style="text-decoration:underline" href="{{route('login')}}">Đăng nhập để biết chính sách vận chuyển</a></span>
                        @else
                           <span>Vận chuyển trong ngày tới :
                              <samp style="text-decoration:underline;cursor: pointer;">
                                 {{Auth::user()->address}}
                              </samp>
                           </span>
                        @endguest
                     </li>
                     <li><b>Chia sẻ lên</b>
                           <div class="share">
                              <a href="#"><i class="fa fa-facebook"></i></a>
                              <a href="#"><i class="fa fa-twitter"></i></a>
                              <a href="#"><i class="fa fa-instagram"></i></a>
                              <a href="#"><i class="fa fa-pinterest"></i></a>
                           </div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-12">
                  <div class="product__details__tab">
                     <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                 aria-selected="true">Mô tả</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                 aria-selected="false">Đánh giá <span id="vote-count">({{$product->votes()->get()->count()}})</span></a>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                           <div class="product__details__tab__desc">
                              <div class="row justify-content-center">
                                 <div class="col-lg-6 col-xl-6 col-md-8 col-12">
                                    @php
                                       echo $product->description
                                    @endphp
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                           <div class="product__details__tab__desc">
                              <div class="row justify-content-center">
                                 <div class="col-lg-3 col-xl-3 col-md-6 col-6">
                                    <form id="vote" action="{{route('home.vote')}}" method="post" 
                                       @guest
                                          data-url="{{route('login')}}"
                                       @else
                                          data-url=''
                                       @endguest
                                    >
                                       @csrf
                                       <div class="form-group">
                                          <div class="row">
                                             <div id="ratingYo"></div>
                                          </div>
                                       </div>
                                       <input id="input-start" type="hidden" name="start"
                                       @guest
                                          value="0"
                                       @else
                                          value="{{$yourVote}}"
                                       @endguest
                                       >
                                       <input id="input-product" type="hidden" name="product" value="{{$product->id}}">
                                       <div class="form-group">
                                          <div class="row">
                                             <input type="submit" class="btn btn-success form-control" value="Gửi">
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
</section>
<!-- Product Details Section End -->
<!-- Related Product Section Begin -->
@if (isset($productSame))
   <section class="related-product">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section-title related__product__title">
                  <h2>Sản phẩm liên quan</h2>
               </div>
               <div class="row justify-content-center">
                  @foreach ($productSame as $item)
                     <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                           <div class="product__item__pic set-bg" data-setbg="{{url('public/uploads')}}/{{$item->image}}">
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
                           <div class="product__item__text">
                              <h6><a>{{$item->name}}</a></h6>
                              <h5>{{number_format($item->sale_price)}}</h5>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </section>
@endif
<!-- Related Product Section End -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
   $(function () {
      var csrf='{{ csrf_token() }}';
      var rating=$("#ratingYo").rateYo({
         rating:{{$yourVote}},
         starWidth: "25px",
         spacing: "10px",
         fullStar: true
      }).on('rateyo.set',function(e,data){
         $('#input-start').val(data.rating)
      });
      var rate=$("#rateYo").rateYo({
         rating:{{$vote}},
         starWidth: "30px",
         readOnly: true
      });
      $('form#vote').submit(function(event){
         event.preventDefault();
         var url='';
         url=$(this).attr('data-url');
         if(url=="{{route('login')}}"){
            window.location="{{route('login')}}";
         }else{
            let urlVote=$(this).attr('action');
            let dataProduct=$('#input-product').val();
            let dataVote=$('#input-start').val();
            $.ajax({
               type:'post',
               url:urlVote,
               dataType:'json',
               data:{vote:dataVote,product:dataProduct,_token:csrf},
               success:function(data){
                  if(data.code===200){
                     rating.rateYo("rating", data.yourVote);
                     rate.rateYo("rating", data.vote);
                     $('#vote-count').text('('+{{$product->votes()->get()->count()}}+')');
                  }
               },
               error:function(){

               }
            });
         }
      })
   });
</script>
@endsection
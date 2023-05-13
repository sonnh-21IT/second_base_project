<div class="row">
   @if (isset($sort))
      @foreach ($sort as $item)
      <div class="col-lg-4 col-md-6 col-sm-6">
         <div class="product__item">
               <div class="product__item__pic set-bg">
                  <img src="{{asset('public/uploads/'.$item->image)}}" alt="" width="262px">
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
                  <h6><a href="#">{{$item->name}}</a></h6>
                  <h5>{{ number_format($item->sale_price)}} ₫</h5>
               </div>
            </div>
         </div>
      @endforeach
   @endif
</div>
<div class="row text-center">
   <hr>
   @if (isset($sort))
      {{$sort->links()}}
   @endif
</div>
@include('library.site.product')
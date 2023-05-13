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
            <div class="shoping__cart__table">
               <table class="cart-url" data-update="{{route('cart.update')}}" data-delete="{{route('cart.delete')}}">
                  <thead>
                        <tr>
                           <th class="shoping__product">Sản phẩm</th>
                           <th>Giá</th>
                           <th>Số lượng</th>
                           <th>Tổng</th>
                           <th></th>
                        </tr>
                  </thead>
                  <tbody>
                     @if (!empty($carts))
                        @php
                           $total=0;
                        @endphp
                        @foreach ($carts[Auth::user()->id] as $id=> $item)
                           @php
                              $total+=$item['price']*$item['quantity'];
                           @endphp
                           <tr class="align-items-center">
                              <td class="shoping__cart__item">
                                 <img src="{{url('public/uploads')}}/{{$item['image']}}" alt="" width="110px">
                                 <h5>{{$item['name']}}</h5>
                              </td>
                              <td class="shoping__cart__price item">
                                 {{number_format($item['price'])}}
                              </td>
                              <td class="shoping__cart__quantity">
                                 <div class="input-group justify-content-center">
                                    <div class="input-group-prepend">
                                       <a class="decrement" data-set="quantity{{$id}}" href="#"><span class="input-group-text">-</span></a>
                                    </div>
                                    <input type="number" class="form-control col-4 text-center quantity{{$id}}" id="quantity{{$id}}" value="{{$item['quantity']}}">
                                    <div class="input-group-append">
                                       <a class="increment" data-set="quantity{{$id}}" href="#"><span class="input-group-text">+</span></a>
                                    </div>
                                 </div>
                              </td>
                              <td class="shoping__cart__total">
                                 {{number_format($item['price']*$item['quantity'])}}
                              </td>
                              <td class="shoping__cart__item__close text-center">
                                 <div class="row">
                                    <div class="col-6 d-inline">
                                       <a href="" data-id="{{$id}}" class="p-2 cart-update" style="color: black"><i class='fa fa-refresh'></i></a>
                                    </div>
                                    <div class="col-6 d-inline">
                                       <a href="" data-id="{{$id}}" class="p-2 cart-remove" style="color: black"><i class='fa fa-remove'></i></a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        @endforeach
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      @if (empty($carts[Auth::user()->id]))
         <div class="text-center mb-5">
            <p>Bạn chưa chọn sản phẩm của chúng tôi!</p>
         </div>
      @endif
      <div class="row">
         <div class="col-lg-12">
               <div class="shoping__cart__btns">
                  <a href="{{route('home.shop')}}" class="primary-btn cart-btn">TIẾP TỤC MUA SẮM</a>
               </div>
         </div>
         @if(!empty($carts[Auth::user()->id]))
            @if (count($carts[Auth::user()->id])>0)
               <div class="col-lg-12">
                  <div class="shoping__checkout">
                     <h5>Tổng kết</h5>
                     <ul>
                        <li>Tổng <span>{{number_format($total)}} ₫</span></li>
                     </ul>
                     <a href="{{route('order.create')}}" class="primary-btn">Đặt hàng</a>
                  </div>
               </div>
            @endif
         @endif
      </div>
   </div>
</section>
@include('library.site.cart')
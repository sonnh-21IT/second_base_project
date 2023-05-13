<div class="shoping__cart__table">
   <table class="cart-url" data-update="{{route('cart.update')}}" data-delete="{{route('cart.delete')}}">
      <thead>
            <tr>
               <th class="shoping__product">Sản phẩm</th>
               <th>Tổng</th>
               <th>Trạng thái</th>
               <th>Ngày đặt</th>
               <th></th>
            </tr>
      </thead>
      <tbody>
         @if (!empty($data))
         {{-- @php
            $oldid=0;
         @endphp --}}
            @foreach ($data as $item)
               <tr class="align-items-center">
                  <td class="shoping__cart__item">
                     <ol>
                        @foreach ($item->orderdetail()->get() as $subitem)
                           <li>
                              <img src="{{url('public/uploads')}}/{{$subitem->product()->first()->image}}" alt="" width="50">
                              {{$subitem->product()->first()->name.' ('.$subitem->quantity.'x'.number_format($subitem->product()->first()->price).')'}}
                           </li>
                        @endforeach
                     </ol>
                  </td>
                  <td class="shoping__cart__total">
                     {{number_format($item->price)}}
                  </td>
                  <td class="shoping__cart__quantity">
                     @if ($item->status==1)
                        {{'Đang giao'}}
                     @elseif ($item->status==0)
                        {{'Đang chờ'}}
                     @else
                        {{'Đã hủy'}}
                     @endif
                  </td>
                  <td class="shoping__cart__quantity">{{$item->created_at}}</td>
                  <td class="shoping__cart__item__close text-center">
                     <div class="row">
                        {{-- <div class="col-6 d-inline">
                           <a href="" data-id="{{$id}}" class="p-2 cart-update" style="color: black"><i class='fa fa-refresh'></i></a>
                        </div> --}}
                        <div class="col-6 d-inline">
                           @if ($item->status==0)
                              <a href="{{route('home.destroy',$item->id)}}" class="p-2 order-remove" style="color: black"><i class="fa fa-remove"></i></a>
                           @endif
                        </div>
                     </div>
                  </td>
               </tr>
            @endforeach
         @endif
      </tbody>
   </table>
</div>


<!DOCTYPE html>
   <html lang="zxx">
   <head>
      <meta charset="UTF-8">
      <meta name="description" content="Ogani Template">
      <meta name="keywords" content="Ogani, unica, creative, html">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      {{-- <title>Ogani</title> --}}
      @yield('title')

      <!-- Google Font -->
      <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

      @include('library.site.library')
      <style>
         div.search-result{
            position: absolute;
            top:50px;
            display:block;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
            /* border: rgba(0,0,0, 0.3) 1px solid; */
            border-top: none;
            border-radius: 0px 0px 10px 5px;
         }
         div.search-result p{
            font-size: 12px;
            font-style: italic;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
         }
      </style>
   </head>

   <body>
      <!-- Page Preloder -->
      <div id="preloder">
         <div class="loader"></div>
      </div>

      <!-- Humberger Begin -->
      <div class="humberger__menu__overlay"></div>
      <div class="humberger__menu__wrapper">
         <div class="humberger__menu__logo">
               <a href="{{route('home.index')}}"><img src="{{url('public/site')}}/img/logo.png" alt=""></a>
         </div>
         <div class="humberger__menu__cart">
            @guest
               @else
                  @if (session()->has('carts'))
                     <ul>
                        <li>
                           @php
                              $carts=session()->get('carts');
                              $total=0;
                              if (isset($carts[Auth::user()->id])) {
                                 foreach($carts[Auth::user()->id] as $id=> $item){
                                    $total+=$item['price']*$item['quantity'];
                                 }
                              }
                           @endphp
                           <a href="{{route('home.carts')}}">
                              <i class="fa fa-shopping-bag"></i>
                              @if (isset($carts[Auth::user()->id]))
                                 <span>{{count($carts[Auth::user()->id])}}</span>
                              @else
                                 <span>0</span>
                              @endif
                           </a>
                        </li>
                     </ul>
                     <div class="header__cart__price">
                        @if (isset($carts[Auth::user()->id]))
                           <span>{{number_format($total)}} </span>₫
                        @else
                           <span>0 ₫</span>
                        @endif
                     </div>
                     @else
                        <ul>
                           <li>
                              <a href="{{route('home.carts')}}">
                                 <i class="fa fa-shopping-bag"></i><span>0</span>
                              </a>
                           </li>
                        </ul>
                        <div class="header__cart__price">
                           <span>0 ₫</span>
                        </div>
                     @endif
                  @endguest
         </div>
         <nav class="humberger__menu__nav mobile-menu">
            <ul>
               @guest
                  @if (Route::has('login'))
                     <li class="nav-item">
                           <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                     </li>
                  @endif

                  @if (Route::has('register'))
                     <li class="nav-item">
                           <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                     </li>
                  @endif
               @else
                  <li><a href="#">{{ Auth::user()->name }}</a>
                     <ul class="header__menu__dropdown">
                        @if (Auth::user()->role=='admin')
                           <li>
                              <a href="{{ route('admin.dashboard') }}" style="text-align: left"><i class='fa fa-gears'></i> Admin</a>
                           </li>
                        @endif
                        <li>
                           <a href="{{ route('home.order') }}" style="text-align: left"><i class='fa fa-book'></i> Đơn hàng của bạn</a>
                        </li>
                        <li>
                           <a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              <i  class="fa fa-sign-out"></i>
                              {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                           </form>
                        </li>
                     </ul>
                  </li>
               @endguest
               <li><a href="{{route('home.index')}}">Trang Chủ</a></li>
               <li><a href="{{route('home.shop')}}">Cửa Hàng</a></li>
               <li><a href="{{route('home.introduce')}}">Giới Thiệu</a></li>
               <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
            </ul>
         </nav>
         <div id="mobile-menu-wrap"></div>
         <div class="header__top__right__social">
               <a href="#"><i class="fa fa-facebook"></i></a>
               <a href="#"><i class="fa fa-twitter"></i></a>
               <a href="#"><i class="fa fa-linkedin"></i></a>
               <a href="#"><i class="fa fa-pinterest-p"></i></a>
         </div>
         <div class="humberger__menu__contact">
               <ul>
                  <li><i class="fa fa-envelope"></i>oganic.example@gamil.com</li>
               </ul>
         </div>
      </div>
      <!-- Humberger End -->

      <!-- Header Section Begin -->
      <header class="header">
         <div class="header__top">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-6 col-md-6">
                           <div class="header__top__left">
                              <ul>
                                 <li><i class="fa fa-envelope"></i>oganic.example@gamil.com</li>
                              </ul>
                           </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                           <div class="header__top__right">
                              <div class="header__top__right__social">
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                                 <a href="#"><i class="fa fa-linkedin"></i></a>
                                 <a href="#"><i class="fa fa-pinterest-p"></i></a>
                              </div>
                              <div class="header__top__right__auth">
                                 <nav class="header__menu">
                                    <ul>
                                       @guest
                                          @if (Route::has('login'))
                                             <li class="nav-item">
                                                   <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                             </li>
                                          @endif

                                          @if (Route::has('register'))
                                             <li class="nav-item">
                                                   <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                             </li>
                                          @endif
                                       @else
                                          <li><a href="#">{{ Auth::user()->name }}</a>
                                             <ul class="header__menu__dropdown">
                                                @if (Auth::user()->role=='admin')
                                                   <li>
                                                      <a href="{{ route('admin.dashboard') }}" style="text-align: left"><i class='fa fa-gears'></i>Admin</a>
                                                   </li>
                                                @endif
                                                <li>
                                                   <a href="{{ route('home.order') }}" style="text-align: left"><i class='fa fa-book'></i>Đơn hàng</a>
                                                </li>
                                                <li>
                                                   <a href="{{ route('logout') }}" style="text-align: left" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                      <i  class="fa fa-sign-out"></i>
                                                      {{ __('Logout') }}
                                                   </a>
                                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                      @csrf
                                                   </form>
                                                </li>
                                             </ul>
                                          </li>
                                       @endguest
                                    </ul>
                                 </nav>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </div>
         <div class="container">
               <div class="row">
                  <div class="col-lg-3">
                     <div class="header__logo">
                           <a href="{{route('home.index')}}"><img src="{{url('public/site')}}/img/logo.png" alt=""></a>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <nav class="header__menu">
                        <ul>
                           @yield('nav')
                        </ul>
                     </nav>
                  </div>
                  <div class="col-lg-3">
                     <div class="header__cart">
                        @guest
                        @else
                           @if (session()->has('carts'))
                              <ul>
                                 <li>
                                    @php
                                       $carts=session()->get('carts');
                                       $total=0;
                                       if (isset($carts[Auth::user()->id])) {
                                          foreach($carts[Auth::user()->id] as $id=> $item){
                                             $total+=$item['price']*$item['quantity'];
                                          }
                                       }
                                    @endphp
                                    <a href="{{route('home.carts')}}">
                                       <i class="fa fa-shopping-bag"></i>
                                       @if (isset($carts[Auth::user()->id]))
                                          <span>{{count($carts[Auth::user()->id])}}</span>
                                       @else
                                          <span>0</span>
                                       @endif
                                    </a>
                                 </li>
                              </ul>
                           <div class="header__cart__price">
                              @if (isset($carts[Auth::user()->id]))
                                 <span>{{number_format($total)}} </span>₫
                              @else
                                 <span>0 ₫</span>
                              @endif
                           </div>
                           @else
                              <ul>
                                 <li>
                                    <a href="{{route('home.carts')}}">
                                       <i class="fa fa-shopping-bag"></i><span>0</span>
                                    </a>
                                 </li>
                              </ul>
                              <div class="header__cart__price">
                                 <span>0 ₫</span>
                              </div>
                           @endif
                        @endguest
                     </div>
                  </div>
               </div>
               <div class="humberger__open">
                  <i class="fa fa-bars"></i>
               </div>
         </div>
      </header>
      <!-- Header Section End -->

      <!-- Hero Section Begin -->
      <section class="hero">
         <div class="container">
            @yield('nav-search')
         </div>
      </section>
      <!-- Hero Section End -->
      @yield('main')
      <!-- Footer Section Begin -->
      <footer class="footer spad">
         <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="footer__about">
                           <div class="footer__about__logo">
                              <a href="{{route('home.index')}}"><img src="{{url('public/site')}}/img/logo.png" alt=""></a>
                           </div>
                           <ul>
                              <li>Địa Chỉ: 470 Trần Đại Nghĩa - TP.Đà Nẵng</li>
                              <li>Điện Thoại: +84 984399784</li>
                              <li>Email: oganic.example@gamil.com</li>
                           </ul>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                     <div class="footer__widget">
                           <h6>Liên kết hữu ích</h6>
                           <ul>
                              <li><a href="#">Về chúng tôi</a></li>
                              <li><a href="#">Về cửa hàng của chúng tôi</a></li>
                              <li><a href="#">Mua sắm an toàn</a></li>
                              <li><a href="#">Thông tin giao hàng</a></li>
                              <li><a href="#">Chính sách bảo mật</a></li>
                              <li><a href="#">Sơ đồ trang web của chúng tôi</a></li>
                           </ul>
                           <ul>
                              <li><a href="#">Chúng ta là ai</a></li>
                              <li><a href="#">Dịch vụ của chúng tôi</a></li>
                              <li><a href="#">Dự án</a></li>
                              <li><a href="#">Liên hệ</a></li>
                              <li><a href="#">Sự đổi mới</a></li>
                              <li><a href="#">Lời chứng thực</a></li>
                           </ul>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
                     <div class="footer__widget">
                           <h6>Tham gia bản tin của chúng tôi ngay bây giờ</h6>
                           <p>Nhận thông tin cập nhật qua Email về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.</p>
                           <form action="#">
                              <input type="text" placeholder="Nhập email của bạn">
                              <button type="submit" class="site-btn">Đăng ký</button>
                           </form>
                           <div class="footer__widget__social">
                              <a href="#"><i class="fa fa-facebook"></i></a>
                              <a href="#"><i class="fa fa-instagram"></i></a>
                              <a href="#"><i class="fa fa-twitter"></i></a>
                              <a href="#"><i class="fa fa-pinterest"></i></a>
                           </div>
                     </div>
                  </div>
               </div>
               <hr>
         </div>
      </footer>
      <!-- Footer Section End -->
      {{-- modal notifycation --}}
      <div class="modal modal-notifycation"tabindex="-1">
         <div class="modal-dialog">
            <div class="modal-content border border-success">
               <div class="modal-header justify-content-center">
                  <h5 style="font-size: 30px" class="text-success">{{"(>‿♥)"}}</h5>
               </div>
               <div class="modal-body bg-success text-center text-white">
                  <h5>Đã thêm vào giỏ hàng!</h5>
               </div>
            </div>
         </div>
      </div>
      <div class="modal modal-order-done"tabindex="-1">
         <div class="modal-dialog">
            <div class="modal-content border border-danger">
               <div class="modal-header justify-content-center">
                  <h5 style="font-size: 30px" class="text-danger">{{"◕‿◕"}}</h5>
               </div>
               <div class="modal-body bg-danger text-center text-white">
                  <h5>Bạn có chắc muốn hủy đơn hàng này!</h5>
               </div>
               <div class="modal-footer">
                  <a href="" class="btn-order-remove btn btn-defult border border-danger">Vẫn hủy</a>
                  <a href="" class="btn-order-back btn btn-defult border border-success">Quay lại</a>
               </div>
            </div>
         </div>
      </div>
      @include('library.site.script')

   </body>
      @yield('js')
   </html>
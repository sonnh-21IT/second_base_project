@extends('layouts.site')
@section('title')
  <title>Ogani | Introduce</title>
@endsection
@section('nav')
  <li><a href="{{route('home.index')}}">Trang Chủ</a></li>
  <li><a href="{{route('home.shop')}}">Cửa Hàng</a></li>
  <li class="active"><a href="{{route('home.introduce')}}">Giới Thiệu</a></li>
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
                <h2>Về Ogani</h2>
                <div class="breadcrumb__option">
                    <a href="{{route('home.index')}}">Trang chủ</a>
                    <span>Giới thiệu</span>
                </div>
              </div>
          </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-xl-10 col-md-12">
      <div class="summary">
        Ở OGANIC, chúng tôi đặt lợi ích sức khoẻ của khách hàng lên ưu tiên hàng
        đầu. Các sản phẩm ở OGANIC luôn có đầy đủ thông tin nguồn gốc, xuất xứ,
        có giấy chứng nhận an toàn vệ sinh thực phẩm. Không chỉ minh bạch về
        nguồn gốc, chúng tôi siết chặt yêu cầu về cả chất lượng bằng cách áp
        dụng công nghệ vi sinh EM Green tiên tiến của Nhật Bản vào quy trình sản
        xuất tuần hoàn khép kín của mình để tạo ra những nông sản hữu cơ dinh
        dưỡng, đồng thời chọn lọc những nguồn thực phẩm tự nhiên chất lượng cao
        từ toàn thế giới để đem tới bàn ăn của người dân Việt.
      </div>
    </div>
  </div>
  <div class="row justify-content-center my-5">
    <iframe
      class="col-xl-10 col-md-12"
      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen=""
      frameborder="0"
      scrolling="no"
      height="500"
      src="https://www.youtube.com/embed/AS-6iY6AUiM"
      style="display: block"
    ></iframe>
  </div>
  <div class="row justify-content-center mb-5">
    <div class="col-xl-10 col-md-12">
      Chúng tôi, các bạn và người thân, ít nhiều cũng đã từng là NẠN NHÂN của thực phẩm bẩn. Hơn ai hết chúng tôi hiểu tầm quan trọng của các nguyên liệu chế bên thức ăn SẠCH. Nó giúp cho cuộc sống của chúng ta và những người chúng ta thương yêu ngày một tốt hơn và để tránh xa CHIẾC GIƯỜNG ĐẮT NHẤT TRONG CUỘC ĐỜI CỦA MỖI NGƯỜI – ĐÓ CHÍNH LÀ CHIẾC GIƯỜNG BỆNH. Qua một thời gian dài đồng hành và tâm huyết với thực phẩm sạch – thực phẩm hữu cơ, chúng tôi rất vui vì có thể giới thiệu đến mọi nhà các sản phẩm sạch, sản phẩm hữu cơ đến tay các bạn. Chúng tôi tự hào là nơi nhập khẩu dòng thực phẩm Hữu Cơ từ Đức, Pháp, Tây Ban Nha, Ý, Thái Lan… Và tất nhiên đều là dòng sản phẩm đều có chứng nhận hữu cơ Châu Âu, không GMO. Mặt khác, chúng tôi cũng có thể giới thiệu đến các bạn: Kiến thức về các món ăn dặm cho Bé. Các sản phẩm thực phẩm hữu cơ, hóa mỹ phẩm hữu cơ được nhà Organic Shop lựa chọn kĩ càng để giới thiệu đến với mọi người.
    </div>
  </div>
</div>
@endsection
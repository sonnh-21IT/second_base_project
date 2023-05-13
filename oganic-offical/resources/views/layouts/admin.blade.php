@php
	$menu=Config::get('menu')
@endphp
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		@yield('title')
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		
		{{-- style --}}
		@include('library.admin.library')

		<!-- Head Libs -->
		<script src="{{ asset('././public/assets/vendor/modernizr/modernizr.js') }}"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="{{route('home.index')}}" class="logo">
						<img src="{{url('public')}}/assets/images/logo_ogani.png" height="35" alt="Porto Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					{{-- <form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form> --}}
					<span class="separator"></span>
               
					<div id="userbox" class="userbox">
						@guest
							<a href="#" data-toggle="dropdown">
								{{-- <figure class="profile-picture">
									<img src="{{url('public')}}/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="{{url('public')}}/assets/images/!logged-user.jpg" />
								</figure> --}}
								<div class="profile-info">
									<span class="name">Đăng Nhập|Đăng Ký</span>
									{{-- <span class="role">administrator</span> --}}
								</div>
				
								<i class="fa custom-caret"></i>
							</a>
							<div class="dropdown-menu">
								<ul class="list-unstyled">
									<li class="divider"></li>
									@if (Route::has('login'))
										<li>
											<a role="menuitem" tabindex="-1" href="{{ route('login') }}"><i class="fa fa-user"></i>Đăng Nhập</a>
										</li>
									@endif
									@if (Route::has('register'))
										<li>
											<a role="menuitem" tabindex="-1" href="{{ route('register') }}"><i class="fa fa-user"></i>Đăng Ký</a>
										</li>
									@endif
								</ul>
							</div>
						@else
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="{{url('public')}}/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="{{url('public')}}/assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info">
								<span class="name">{{ Auth::user()->name }}</span>
								<span class="role">administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Đăng Xuất</a>
								</li>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</ul>
						</div>
						@endguest
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
                        
								<ul class="nav nav-main">
										{{-- <li class="sidebar-search">
											<div class="input-group custom-search-form">
												<input type="text" class="form-control" placeholder="Chuỗi tìm kiếm ...">
												<span class="input-group-btn">
													<button class="btn btn-primary" type="button">
															<i class="fa fa-search"></i>
													</button>
												</span>
											</div>
											<!-- /input-group -->
										</li> --}}
									@foreach ($menu as $item)
										<li @if (isset($item['item'])) class="nav-parent" @endif>
											<a href="{{route($item['route'])}}" class="acitve">
												<i class="fa {{$item['icon']}}" aria-hidden="true"></i>
												<span>{{$item['name']}}</span>
											</a>
											@if (isset($item['item']))
												<ul class="nav nav-children">
													@foreach ($item['item'] as $subitem)
														<li>
															<a href="{{route($subitem['route'])}}">
																{{$subitem['name']}}
															</a>
														</li>
													@endforeach
												</ul>
											@endif
										</li>
									@endforeach
								</ul>
							</nav>
				
							<hr class="separator" />
				
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						@yield('title-panner')
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								@yield('address')
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					@yield('content')
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		</section>
	</body>
	
	
	@include('library.admin.script')
	
	@yield('crud')
	<script>
		$('.acitve').click(function(event){
			var href=$(this).attr('href');
			if(href=="{{route('order.index')}}"){
				event.preventDefault();
				$(this).attr('href')='#';
			}
			// alert(href);
		});
	</script>
</html>
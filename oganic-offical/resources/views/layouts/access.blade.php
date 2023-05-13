<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
      @yield('title')
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Scripts -->
		@vite(['resources/sass/app.scss', 'resources/js/app.js'])
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{url('public')}}/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="{{url('public')}}/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="{{url('public')}}/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="{{url('public')}}/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{url('public')}}/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{url('public')}}/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{url('public')}}/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="{{url('public')}}/assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="{{route('home.index')}}" class="logo pull-left">
					<img src="{{url('public/site')}}/img/logo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>@yield('title-panner')</h2>
					</div>
					<div class="panel-body">
						@yield('form')
					</div>
				</div>

			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="{{url('public')}}/assets/vendor/jquery/jquery.js"></script>
		<script src="{{url('public')}}/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="{{url('public')}}/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="{{url('public')}}/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="{{url('public')}}/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="{{url('public')}}/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="{{url('public')}}/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{url('public')}}/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="{{url('public')}}/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{url('public')}}/assets/javascripts/theme.init.js"></script>

	</body><img src="http://www.ten28.com/fref.jpg">
</html>
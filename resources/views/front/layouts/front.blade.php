<!DOCTYPE html>
<html>
@php session_start() @endphp
<head>
	<title>Soft a Human Resource Management Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="{{ asset('front_assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('front_assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	

	<link href="{{ asset('front_assets/css/font-awesome.css')}}" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
	    rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{ asset('admin_assets/validation/css/screen.css') }}">
	<script type="text/javascript" src="{{ asset('front_assets/js/jquery-2.1.4.min.js')}}"></script>
	<script src="{{ asset('admin_assets/validation/dist/jquery.validate.js') }}"></script>

		@yield('css')
</head>
<body>
	
    @include('front.layouts.header')
		


    @yield('content')
	
	

    @include('front.layouts.footer')

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	
	<script type="text/javascript" src="{{ asset('front_assets/js/bootstrap.js')}}"></script>
	<script type="text/javascript">
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    </script>
    @yield('javascript')
</body>

</html>


@extends('front.layouts.front')
@section('content')
<!-- banner -->
	<div class="inner_page_agile">
		<h3>Login</h3>
	</div>
	<!--//banner -->
	<!--/w3_short-->
	<div class="services-breadcrumb_w3layouts">
		<div class="inner_breadcrumb">

			<ul class="short_w3ls"_w3ls>
				<li><a href="index.html">Home</a><span>|</span></li>
				<li>Login</li>
			</ul>
		</div>
	</div>
	<!--//w3_short-->
	<!-- /inner_content -->
	<div class="inner_content_info_agileits">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="tittle_head_w3ls">
                <h3 class="tittle three">LogIn to your Account </h3>
			</div>
            <div class="inner_sec_grids_info_w3ls">
                <div class="signin-form">
                    <div class="login-form-rec">
                        <form action="{{ url('front/login') }}" method="post">
                            @csrf
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <div class="tp">
                                <input type="submit" value="Login">
                            </div>
                        </form>
                    </div>
                    <div class="login-social-grids">
                        
                    </div>
                    <p>Don't have an account? <a href="{{route('signup')}}">  Register now.</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('front.layouts.front')
@section('content')
<!-- banner -->
    <div class="inner_page_agile">
		<h3>Register</h3>
	</div>
<!--//banner -->
	<!--/w3_short-->
	<div class="services-breadcrumb_w3layouts">
		<div class="inner_breadcrumb">
			<ul class="short_w3ls"_w3ls>
			    <li><a href="{{route('index')}}">Home</a><span>|</span></li>
			    <li>Register</li>
			</ul>
		</div>
	</div>
	<!--//w3_short-->
	<!-- /inner_content -->
	<div class="inner_content_info_agileits">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle three">Register Now </h3>
			</div>
			<div class="inner_sec_grids_info_w3ls">
				<div class="signin-form">
					<div class="login-form-rec">            @php $required_span ='<span style="color:red">*</span>'; @endphp
						<form action="{{route('register')}}" method="post">
							@csrf
							<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
										<input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" >
										@if($errors->has('name'))
                            				<div class="error">{{ $errors->first('name') }}</div>
                            			@endif
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
										<input type="text" name="username" id="username" placeholder="User Name" value="{{ old('username') }}" >
										@if($errors->has('username'))
                            				<div class="error">{{ $errors->first('username') }}</div>
                            			@endif
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
										<input type="text" name="mobile" id="mobile" placeholder="Mobile Number"  value="{{ old('mobile') }}">
										@if($errors->has('mobile'))
                            				<div class="error">{{ $errors->first('mobile') }}</div>
                           				@endif
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
										<input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" >
										@if($errors->has('email'))
                            				<div class="error">{{ $errors->first('email') }}</div>
                            			@endif
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
										<input type="password" name="password" id="password"  placeholder="Password" >
										@if($errors->has('password'))
                            				<div class="error">{{ $errors->first('password') }}</div>
                            			@endif
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
										<input type="password" name="password_confirmation" id="password_confirmation"  placeholder="Confirm Password" >
										@if($errors->has('password_confirmation'))
                            				<div class="error">{{ $errors->first('password_confirmation') }}</div>
                           				@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-lg-12" >
										<label for="areyou">Are you?</label>
										@if($errors->has('role'))
                            			<div class="error">{{ $errors->first('role') }}</div>
                           			@endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
                                	<div class="col-lg-6">
										<input type="radio" id="job_provider" name="role" value="3">
										<label for="job_provider" >Job Provider</label>
									</div>
									<div class="col-lg-6">
										<input type="radio" id="job_seeker" name="role" value="4">
										<label for="job_seeker" >Job Seeker</label><br>
									</div>
								</div>
							</div>
							<input type="submit" value="Register">
							<!-- <button class="btn btn-info" >Register</button> -->
						</form>
					</div>
					<p class="reg">Already Registered? <a href="{{route('front.login')}}">Login Here </a></p>
				</div>
			</div>
		</div>
	</div>
@endsection
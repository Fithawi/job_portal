<div class="header" id="home">
		<div class="content white agile-info">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="{{route('index')}}">
							<h1><span class="fa fa-signal" aria-hidden="true"></span> Job Portal<label>Job Portal</label></h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav">
								<li  class="{{ Request::segment(1) === null ? 'active' : null }}">
									<a href="{{route('index')}}" class="effect-3">Home</a>
								</li>
								<li class="{{ Request::segment(1) === 'jobs' ? 'active' : null }}">
									<a href="{{route('front.jobs')}}" class="effect-3">Jobs</a>
								</li>
								<!-- <li><a href="#" class="effect-3">Contact</a></li> -->
								@if(!Auth::guard('web')->user())
									<li class="{{ Request::segment(1) === 'sign-up' ? 'active' : null }}">
										<a href="{{route('signup')}}" class="effect-3">Sign Up</a>
									</li>
									<li class="{{ Request::segment(2) === 'login' ? 'active' : null }}">
										<a href="{{route('front.login')}}" class="effect-3">Login</a>
									</li>
								@else
									<li class="dropdown">
										<a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">{{Auth::guard('web')->user()->name}}<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-2">
											<div class="row">
												<div class="col-sm-6">
													<ul class="multi-column-dropdown">
													<li><a href="{{route('UpdateUser',Auth::guard('web')->user()->id)}}" class="btn btn-link">Profile</a></li>
													<li>
														<a href="{{route('logout')}}" class="btn btn-link"
                                	    				onclick="event.preventDefault();
                                	    				 document.getElementById('logout-form').submit();">
                                	    				    Logout</a>
                                	    				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                	    				    @csrf
                                	    				</form>
													</li>
													</ul>
												</div>
											</div>
										</ul>
									</li>
									
								@endif
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
</div>

<!-- <script>
	$(document).ready(function () {
  		$(".nav li").removeClass("active");//this will remove the active class from  
    	                                 //previously active menu item 
 		// $('#home').addClass('active');
  			//for demo
  		// $('#jobs').addClass('active');
  		// //for sale 
  		// $('#login').addClass('active');
		// $('#signup').addClass('active');

	});
	
</script> -->
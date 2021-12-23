@extends('front.layouts.front')
@section('content')
<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  	<div class="carousel-inner">
		@isset($slide)
			<?php $i="active";?>
			@foreach($slide as $data)
				<div class="item <?php echo $i;?>">
					<img src="{{asset('slider_images/'.$data->image_name)}}"  class="img-fluid" width="100%" alt="{{$data -> image_name}}">
    			</div>
				<?php $i = '' ;?>
			@endforeach
		@endif
	  <!-- Left and right controls -->
  		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
  		  <span class="glyphicon glyphicon-chevron-left"></span>
  		  <span class="sr-only">Previous</span>
  		</a>
  		<a class="right carousel-control" href="#myCarousel" data-slide="next">
  		  <span class="glyphicon glyphicon-chevron-right"></span>
  		  <span class="sr-only">Next</span>
  		</a>
	</div>

	<!--/search_form -->
	<div id="search_form" class="search_top ">
		<h2>Start your job search</h2>
		<div class="formcenter">
			<form method="get" action="{{ route('front.jobs') }}">		
				<input type="text" id="keywords" name="keywords" value="{{ Request::get('keywords') }}" placeholder="Enter Keyword(s)" >
				<select id="categories" class="dropdown" name="categories">
					<option value="null"> Select Category</option>
					@isset($search_categories)
						@foreach($search_categories as $cat)
							<option @if(Request::get('categories')==$cat->id) Selected @endif value="{{$cat->id}}" > {{$cat->category_name}}</option>
						@endforeach
					@endif
				</select>
				<input type="hidden" name="Jobtype" id="" value="{{ Request::get('Jobtype') }}">
				<input type="hidden" name="ExpIds" value="{{ Request::get('ExpIds') }}">
				<input value="Find Jobs" type="submit" id="submit" class="btn btn-warning">
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
	<!--//search_form -->
	<div class="banner-bottom">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle">{{$aboutus->name}}</h3>
			</div>
			<div class="inner_sec_grids_info_w3ls">
				<div class="col-md-6 banner_bottom_left">
					{!!$aboutus->desc!!}
					<ul class="some_agile_facts">
						<li><span class="fa fa-briefcase" aria-hidden="true"></span><label>80</label> Corporate Programs</li>
						<li><span class="fa fa-graduation-cap" aria-hidden="true"></span><label>49</label> Training Courses</li>
						<li><span class="fa fa-user" aria-hidden="true"></span><label>88</label> Strategic Partners</li>
						<li><span class="fa fa-line-chart" aria-hidden="true"></span><label>436</label> Companies We Helped</li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 banner_bottom_right">
					<div class="agileits_w3layouts_banner_bottom_grid">
						<img src="{{asset('page_images/'.$aboutus->image_name)}}" alt="{{$aboutus->image_name}} " class="img-responsive" />
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //banner-bottom -->
	<div class="team_work_agile">
		<h4>Whether we play a large or small role, by working together we achieve our objectives.</h4>
	</div>
	<!-- services -->
	<div class="services" id="services">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle">Selection Process</h3>
			</div>
			<div class="inner_sec_grids_info_w3ls">
				<div class="col-md-3 services-left">
					<div class="services-left-top">
						<h5>Identify Need & Develop Position Description</h5>
					</div>
					<div class="services-left-top services-left-top1">
						<h5>Recruitment Planning</h5>
					</div>
				</div>
				<div class="col-md-6 services-middle">
					<div class="services-middle-img">
						<img src="{{asset('front_assets/images/process.jpg')}}" alt="" />
					</div>
					<div class="services-middle-grids">
						<div class="col-md-6 services-middle-left">
							<div class="services-left-top">
								<h5>Sourcing & Advertising</h5>
							</div>
						</div>
						<div class="col-md-6 services-middle-left">
							<div class="services-left-top">
								<h5>Assess & Interview Candidates</h5>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 services-left">
					<div class="services-left-top">
						<h5>Offer for Student Employment</h5>
					</div>
					<div class="services-left-top services-left-top1">
						<h5>Onboarding for Success</h5>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //services -->
	<!-- /mid-services -->
	<div class="mid_services">
		<div class="col-md-6 according_inner_grids">
			<h3 class="agile_heading two">Receiving a Job offer</h3><br>
			<div class="according_info">
				<div class="panel-group about_panel" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title asd">
								<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
								    aria-controls="collapseOne">
							  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>{{$job_offer->title}}
							</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body panel_text">
								{!!$job_offer->description!!}
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title asd">
								<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
								    aria-controls="collapseTwo">
							  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>{{$job_offer->title2}}
							</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body panel_text">
								{!!$job_offer->dec2!!}
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title asd">
								<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false"
								    aria-controls="collapseThree">
							  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>{{$job_offer->title3}}
							</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body panel_text">
							{!!$job_offer->desc3!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 mid_services_img">
			<img src="{{asset('page_images/'.$job_offer->image_name)}}" alt="{{$job_offer->image_name}} " class="img-responsive" />
		</div>
		<div class="clearfix"> </div>
	</div>

@endsection
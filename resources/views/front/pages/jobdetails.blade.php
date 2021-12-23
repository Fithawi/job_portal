@extends('front.layouts.front')
@section('content')
    <!-- banner -->
	<div class="inner_page_agile">
		<h3>Jobs</h3>
		<p>Add Some Short Description</p>

	</div>
	<!--//banner -->
	<!--/w3_short-->
	<div class="services-breadcrumb_w3layouts">
		<div class="inner_breadcrumb">

			<ul class="short_w3ls"_w3ls>
				<li><a href="{{route('index')}}">Home</a><span>|</span></li>
				<li>Jobs</li>
			</ul>
		</div>
	</div>
	<!--//w3_short-->
   <!-- /inner_content -->
	<div class="inner_content_info_agileits">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle">Some More Info </h3>
			</div>
			<div class="inner_sec_grids_info_w3ls">
				<div class="col-md-8 job_info_left">
					<div class="single-left1">
						<h3>{{$details->title}}</h3>
						<div class="location_box1">
							<p><span class="m_2"><b>Location :</b> {{$details->location}}</span></p>
	                        <p><span class="m_2"><b> Experiance : </b>
											@if(($details->from_year) == 0 && ($details->to_year) == 0) Fresher
											@else{{$details->from_year}} - {{$details->to_year}} Years
											@endif </span></p>
	                        <p><span class="m_2"><b>Working Hours :</b> {{$details->no_of_hours}}</span></p>
	                        <p><span class="m_2"><b>Contract :</b> {{$details->contract_title}}</span></p>
	                        <p><span class="m_2"><b>Category :</b> {{$details->category_name}}</span></p>
	                        <p><span class="m_2"><b>Job Type :</b> @if($details->job_type=='0') Part Time @else Full Time @endif</span></p>
						</div>
                        
						<p>{!!$details->description!!}</p>
                        <span class="m_2"><b>Posted on {{date('d-m-Y',strtotime($details->created_at))}}</b></span>
						@if($is_applied == 0)
						<p><button class="btn btn-primary submit" onclick="GetModel('{{Route("front.apply")}}')"> Apply Now</button></p>
						@else
						<p><button class="btn btn-success submit" >Applied</button></p>
						@endif
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="MyModal" data-backdrop="static" role="dialog">
        
    </div>
	<!-- //inner_content -->
	<script>
	
        function GetModel(url){
			
            $.ajax({
                url:url,
                method:'GET',
                success:function(res){
					if(res.isauthenticated == 0)
					{
						location.href = "{{route('front.login')}}";
					}
					$("#MyModal").html(res);
                    $("#MyModal").modal('show');
                    $("#job_id").val({{$details->id}});
                }
            });
        }
    </script>
@endsection

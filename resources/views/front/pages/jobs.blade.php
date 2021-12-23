@extends('front.layouts.front')
@section('content')
    <!-- banner -->
	<div class="inner_page_agile">
		<h3>Jobs</h3>
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

	<div class="inner_content_info_agileits">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle">Available Jobs </h3>
			</div>
			<div class="inner_sec_grids_info_w3ls">
				<div class="col-md-8 job_info_left ">		   
				    @forelse($job_listing as $jobs)
			            <div class="col-sm-9">
			                <div class="location_box1 " style="padding-bottom: 20px; ">
			                    <h6>
									<a href="{{route('front.jobdetails',$jobs->id)}}">{{$jobs->title}} </a>
									<small class="mr-5">Posted on {{date('d-m-Y',strtotime($jobs->created_at))}}</small>
								</h6>
			                    <p>
									<span class="m_2">Location : </span>{{$jobs->location}}
								</p>
			                    <p>
									<span class="m_2">Job Type : </span>
									@if($jobs->job_type=='0') Part Time
									@else Full Time @endif
								</p>
			                    <p>
										<span class="m_2">Job Category : </span>{{$jobs->category_name}}
								</p>
			                    <p>
									<span class="m_2">Experiance : </span>
									@if(($jobs->from_year) == 0 && ($jobs->to_year) == 0)Fresher
									@else{{$jobs->from_year}} - {{$jobs->to_year}} Years @endif 
								</p>
								<p>
									<span class="m_2">Company Name : </span>
									{{$jobs->name}}
								</p>
			                    <ul class="links_bottom">
			                        <li class="last"><a href="{{route('front.jobdetails',$jobs->id)}}"><span class="icon_text">More <i class="fa fa-caret-right icon_1"> </i></span></a></li>
			                    </ul>
			                </div>
			            </div>
			            <div class="clearfix"> </div>
				    @empty
				        <div class="col-sm-9">
				            <div class="location_box1 alert alert-danger">
				               <p><span style="font-size:20px;"> <b>No Jobs Available..!</b></span></p>
				            </div>
				        </div> 
				    @endforelse
				</div>
			</div>
			<div class="col-md-4 job_info_right">
				<div class="col_3 experience">
					<h3>Work Experiance</h3>
					<table class="table">
						<tbody>
							@isset($experience)
								@foreach($experience as $row)
									<tr class="unread checked">
										<td class="hidden-xs">
											@php 
												$checkedexp = Request::get('ExpIds');
												if($checkedexp!=""){
													$exid = explode(',', $checkedexp);
													$checked = array_map('intval',$exid);
												}
												
											@endphp

											<input type="checkbox" class="exp_search_inputs checkbox" value="{{$row->id}}" onclick="get_data();" @if(Request::get('ExpIds')!="") @if(in_array($row->id,$checked)) checked @endif @endif>
										</td>
										<td class="hidden-xs">
											@if(($row->from_year) == 0 && ($row->to_year) == 0)
												Fresher
											@else
											{{$row->from_year}} - {{$row->to_year}}
											@endif
										</td>
									</tr>
								@endforeach
							@endif
							<form method="get" id="search_exp" action="{{ route('front.jobs') }}">
								<input type="hidden" name="ExpIds" id="form_search_ExpIds" value="{{ Request::get('ExpIds') }}">
								<input type="hidden" name="keywords" id="" value="{{ Request::get('keywords') }}">
								<input type="hidden" name="categories" id="" value="{{ Request::get('categories') }}">
								<input type="hidden" name="Jobtype" id="" value="{{ Request::get('Jobtype') }}">
							</form>
						</tbody>
					</table>
				</div>
				<div class="col_3 permit">
					<h3>Job Type</h3>
					<table class="table">
						<tbody>
							@php 
								$checkedtype = Request::get('Jobtype');
								if($checkedtype!=""){
									$typeid = explode(',', $checkedtype);
									$checkedtype = array_map('intval',$typeid);
								}
								
							@endphp
							<form method="get" id="search_type" action="{{ route('front.jobs') }}">
								<tr class="unread checked">
									<td class="hidden-xs">
										<input type="checkbox" @if(Request::get('Jobtype')!="") @if(in_array(1,$checkedtype)) checked @endif @endif  class="type_search_inputs checkbox" value='1' onclick="get_typedata();">
									</td>
									<td class="hidden-xs">
										Full time
									</td>
								</tr>
								<tr class="unread checked">
									<td class="hidden-xs">
										<input type="checkbox" class="type_search_inputs checkbox" value='0' onclick="get_typedata();" @if(Request::get('Jobtype')!="") @if(in_array(0,$checkedtype)) checked @endif @endif >
									</td>
									<td class="hidden-xs">
										Part time
									</td>
								</tr>
								<input type="hidden" name="ExpIds" value="{{ Request::get('ExpIds') }}">
								<input type="hidden" name="keywords" value="{{ Request::get('keywords') }}">
								<input type="hidden" name="categories" value="{{ Request::get('categories') }}">
								<input type="hidden" name="Jobtype" id="form_search_Jobtype" value="{{ Request::get('Jobtype') }}">
								
							</form>
						</tbody>
					</table>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
									
	<!-- //inner_content -->
	
    
@endsection
@section('javascript')
	<script>
		$(document).ready(function() {
	       // get_data();
	    });
		function get_data() {
            var arr = [];
            $('.exp_search_inputs').each(function() {
                if ($(this).is(":checked")) {
                    arr.push($(this).val());
                }
            });
            $("#form_search_ExpIds").val(arr.toString());
	        $('#search_exp').submit();
	        
		}
		$('#cat_search').submit(function( event ) {
		 	var keywords = $('#keywords').val();
			var categories = $('#categories').val();
			if (keywords=="" && categories == "") {
				 $('#cat_search').validate();
				return false;
			}else{
				$('#cat_search').submit();
			}
		});
		
		function get_typedata() {
	            /*var arr = [];
	            $('.exp_search_inputs').each(function() {
	                if ($(this).is(":checked")) {
	                    arr.push($(this).val());
	                }
	            });*/
	            var arr = [];
	            $('.type_search_inputs').each(function() {
	                if ($(this).is(":checked")) {
	                    arr.push($(this).val());
	                }
	            });
	            $("#form_search_Jobtype").val(arr.toString());
	        
	        var valu_data = $("#form_search_ExpIds").val();
	        var keywords = $("#form_search_keywords").val();
	        var ExpIds = $("#form_search_keywords").val();
	        var categories = $("#form_search_categories").val();//alert(valu_data);
	        $('#search_type').submit();
	        
		}
	</script>
@endsection
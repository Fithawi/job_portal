@extends('front.layouts.front')
@section('css')
    <style>
        .container-fluid{
            margin-top:20px;
        }
    </style>
@endsection
@section('content')
	<!--/w3_short-->
	<div class="services-breadcrumb_w3layouts">
		<div class="inner_breadcrumb">
			<ul class="short_w3ls"_w3ls>
			    <li><a href="{{route('index')}}">Home</a><span>|</span></li>
			    <li>Update Profile</li>
			</ul>
		</div>
	</div>
	<!--//w3_short-->
	<!-- /inner_content -->
	<div class="inner_content_info_agileits">
		<div class="container">
            @php $required_span ='<span style="color:red">*</span>'; @endphp
			<div class="inner_sec_grids_info_w3ls">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#profile">Update Profile</a></li>
                    <li><a data-toggle="tab" href="#passwords"> Change Passwords</a></li>
                    <li><a data-toggle="tab" href="#AplliedJobs">Apllied Jobs</a></li>
                </ul>
                <div class="tab-content">
                    <div id="profile" class="tab-pane fade in active container">
                        <div class="container-fluid">
                            <form method="POST" action="{{route('ProfileUpdate', $row->id)}}" class="form-horizontal add_user_personal" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="name">{{trans('label.Name')}}:<?=$required_span;?></label>
                                            <input type="text" class="form-control"  name="name" id="name" value="{{$row->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="username">{{trans('label.Username')}}:<?=$required_span;?></label>
                                            <input type="text" class="form-control"  name="username" id="username" value="{{$row->username}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="mobile">{{trans('label.Mobile')}}:</label>
                                            <input type="text" class="form-control" _placeholder="Enter Mobile" name="mobile" id="mobile" value="{{$row->mobile}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="email">{{trans('label.Email')}}:<?=$required_span;?></label>
                                            <input type="email" class="form-control" _placeholder="Enter Email" name="email" id="email" value="{{$row->email}}">
                                        </div> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="user_image">{{trans('label.Profile Photo')}}:</label>
                                            <?php
                                                if($row->user_image != ''){
                                                    echo '<img src="'.asset('candidate_image/'.$row->user_image.'').'" class="img-fluid" height:25px width:25px>';
                                                }
                                            ?>
                                            <input id="file-upload" type="file" name="user_image" class="form-control"/>
                                            <input type="hidden" value="{{$row->user_image}}" name="hidden_image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <button type="submit" class=" form-control btn btn-success ">{{trans('label.Update')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
				    </div>
                    <div id="passwords" class="tab-pane fade container">
                        <div class="container-fluid">
                            <form method="POST" action="{{route('ChangePassword',$row->id)}}" class="form-horizontal change_pass" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="password">{{trans('label.Password')}}:<?=$required_span;?></label>
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="cpassword">{{trans('label.Confirm Password')}} :<?=$required_span;?></label>
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" id="cpassword" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                        <button type="submit" class=" form-control btn btn-success ">{{trans('label.Update')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>     
                        </div>
                    </div>
                    <div id="AplliedJobs" class="tab-pane fade container">
                        <div class="container-fluid">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">View Details</th>
                                    </tr>
                                </thead>@php $i=1;@endphp
                                @isset($appliedJobs)
                                    @foreach($appliedJobs as $jobs)
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{$i}}</th>
                                                <td>{{$jobs->title}}</td>
                                                <td>{{$jobs->location}}</td>
                                                <td>{{$jobs->compnayName}}</td>
                                                <td><a class="btn btn-primary" href="{{route('front.jobdetails',$jobs->id)}}" >View</a></td>
                                            </tr>
                                        </tbody>@php $i++; @endphp
                                    @endforeach 
                                @endif    
                            </table>       
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection
<div class="col-md-8 job_info_left" id="searched_data">
    @if(count($job_listing)>0)
        @foreach($job_listing as $jobs)
            <div class="col-sm-9">
                <div class="location_box1">
                    <h6><a href="{{route('front.jobdetails',$jobs->id)}}">{{$jobs->title}} </a><span class="m_1">Posted on {{date('d-m-Y',strtotime($jobs->created_at))
                        }}</span></h6>
                    <p><span class="m_2">Location : </span>{{$jobs->location}}</p>
                    <p><span class="m_2">Job Type : </span>@if($jobs->job_type=='0') Part Time @else Full Time @endif</p>
                    <p><span class="m_2">Job Category : </span>{{$jobs->category_name}}</p>
                    <p><span class="m_2">Experiance : </span>{{$jobs->from_year}}-{{$jobs->to_year}} Years</p>
                    <ul class="links_bottom">
                        <li class="last"><a href="{{route('front.jobdetails',$jobs->id)}}"><span class="icon_text">More <i class="fa fa-caret-right icon_1"> </i></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        @endforeach
    @else
        <div class="col-sm-9">
            <div class="location_box1">
               <p><span class="m_2"> No Data Available for this category..!</span></p>
            </div>
        </div> 
    @endif

</div>
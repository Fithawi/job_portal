@extends('layouts.admin')
@section('page_header')
<ul class="navbar-nav flex-row">
    <li>
        <div class="page-header">
            <nav class="breadcrumb-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span><a href="{{route('admin.jobs.index')}}">Jobs</a></span></li>
                </ol>
            </nav>
        </div>
    </li>
</ul>
@endsection
@section('content')
@php $required_span ='<span style="color:red">*</span>'; @endphp
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing ">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4> Add New Jobs</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area p-4">
                    <div class="widget-one">
                       <form class="form-horizontal addJobs">
                            @csrf
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="title">{{trans('label.Title')}}:<?=$required_span;?></label>
                                        <input type="text" class="form-control" name="title" id="title" required>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="location">{{trans('label.Location')}}:<?=$required_span;?></label>
                                        <input type="text" class="form-control" name="location" id="location" required>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="category_id" >Category Name:<?=$required_span;?></label>
                                        <select class="form-control" name="category_id" id="category_id" required>
                                            <option value="">-- {{trans('label.Select')}} {{trans('label.Category Name')}} --</option>
                                                @if(isset($cat))
                                                    @foreach($cat as $id => $val)
                                                        <option  value='{{$id}}'> {{$val}} </option>
                                                    @endforeach
                                                @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="contracts_id" >Contracts Title:<?=$required_span;?></label>
                                        <select class="form-control" name="contracts_id" id="contracts_id" required>
                                            <option value="">-- {{trans('label.Select')}} {{trans('label.Contracts Title')}} --</option>
                                                @if(isset($contract))
                                                    @foreach($contract as $id => $val)
                                                        <option  value='{{$id}}'> {{$val}} </option>
                                                    @endforeach
                                                @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="working_hours_id" >No Of Hours:<?=$required_span;?></label>
                                        <select class="form-control" name="working_hours_id" id="working_hours_id" required>
                                            <option value="">-- {{trans('label.Select')}} {{trans('label.No of Hours')}} --</option>
                                                @if(isset($workhours))
                                                    @foreach($workhours as $id => $val)
                                                        <option  value='{{$id}}'> {{$val}} </option>
                                                    @endforeach
                                                @endif    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="experience_level_id" >Experience:<?=$required_span;?></label>
                                        <select class="form-control" name="experience_level_id" id="experience_level_id" required>
                                            <option value="">-- {{trans('label.Select')}} {{trans('label.Experience')}} --</option>
                                                @if(isset($experience))
                                                    @foreach($experience as $exp)
                                                        <option  value='{{$exp->id}}'> {{$exp->from_year}} - {{$exp->to_year}}</option>
                                                    @endforeach
                                                @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="experience_level_id" >Job Type:<?=$required_span;?></label>
                                        <select class="form-control" name="job_type" id="job_type" required>
                                            <option value="">-- {{trans('label.Select')}} {{trans('label.Job Type')}} --</option>
                                            <option  value='0'> Part Time</option>
                                            <option  value='1'> Full Time</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="description" class="col-sm-12">{{trans('label.Description')}}:<?=$required_span;?></label>
                                        <div class="col-sm-12">
                                            <textarea type="text" class="ckeditor" name="description" id="description" required>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button type="submit" class="btn btn-primary btn-flat submit">{{trans('label.Save')}}</button>
                                            <a href="{{url('/admin/jobs')}}" class="btn btn-flat btn-default">{{trans('label.Back')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(function(){
        $(".addJobs").validate({
        submitHandler(form){
        $(".submit").attr("disabled", true);
        var description = CKEDITOR.instances.description.getData();
        var form_data = $('.addJobs')[0];
        var form1 = new FormData(form_data);
        form1.append('description',description);
        $.ajax({
            type: "POST",
            url: '{{route('admin.jobs.store')}}',
            data: form1,
            contentType: false,
            processData: false,
            success: function( response ) {
                if(response.error == 0){
                    toastr.success(response.msg);

                    setTimeout(function(){
                        location.href = '{{url('admin/jobs')}}';
                    },1900);
                }else{
                    $(".submit").attr("disabled", false);
                    toastr.error(response.msg);
                }
            },
            error: function(data){
                $(".submit").attr("disabled", false);
                var errors = data.responseJSON;
                $.each( errors.errors, function( key, value ) {
                    var ele = "#"+key;
                    $(ele).addClass('error');
                    $('<label class="error">'+ value +'</label>').insertAfter(ele);
                });
            }
        })
        return false;
    }
    });
    })

</script>
@endsection


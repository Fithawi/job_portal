@extends('layouts.admin')
@section('page_header')
<ul class="navbar-nav flex-row">
    <li>
        <div class="page-header">
            <div class="page-title">
                <h3>Contact Us</h3>
            </div>
        </div>
    </li>
</ul>
@endsection
@section('content')
<?php $required_span = '<span class="text-red">*</span>';?>
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing ">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Update Contact Us</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area p-4">
                    <div class="widget-one">
                        <form method="POST" action="{{ route('admin.contactUs.update',$contact['id']) }}" class="form-horizontal edit_contactUs" enctype="multipart/form-data">
                            <input name="_method" type="hidden" value="PATCH">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address	" class="col-sm-2 control-label">{{trans('label.Address')}}: <?=$required_span; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control {!! $errors->first('address', 'error') !!}" name="address" id="address" value="{{$contact['address']}}">
                                            {!! $errors->first('address', '<label class="error">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">{{trans('label.Email')}}: <?=$required_span; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control {!! $errors->first('email', 'error') !!}" name="email" id="email" value="{{$contact['email']}}">
                                            {!! $errors->first('email', '<label class="error">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="phone_number" class="col-sm-3 control-label">{{trans('label.Phone Number')}}:<?=$required_span;?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control {!! $errors->first('phone_number', 'error') !!}" name="phone_number" id="phone_number" value="{{$contact['phone_number']}}">
                                            {!! $errors->first('phone_number', '<label class="error">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary btn-flat submit">{{trans('label.Update')}}</button>
                                            <a href="{{url('/admin')}}" class="btn btn-flat btn-default">{{trans('label.Back')}}</a>
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
$(".edit_contactUs").validate({
    submitHandler(form){
        $(".submit").attr("disabled", true);
        var form_cust = $('.edit_contactUs')[0]; 
        let form1 = new FormData(form_cust);
        $.ajax({
            type: "POST",
            url: '{{route('admin.contactUs.update',$contact['id'])}}',
            data: form1,//$('.edit_contactUs').serialize(),
            contentType: false,
            processData: false,
            success: function( response ) {
                if(response.error == 0){
                    toastr.success(response.msg);
                    setTimeout(function(){
                        // location.href = '{{url('admin/contactUs')}}';
                        location.reload();
                    },2000);
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
</script>
@stop
@extends('layouts.admin')
@section('page_header')
<ul class="navbar-nav flex-row">
    <li>
        <div class="page-header">
            <div class="page-title">
                <h3>Jobs Offer</h3>
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
                            <h4>Jobs Offers & Contact Info</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area p-4">
                    <div class="widget-one">
                        <form method="POST" action="{{ route('admin.job_offer.update',$row['id']) }}" class="form-horizontal edit_jobOffer" enctype="multipart/form-data">
                            <input name="_method" type="hidden" value="PATCH">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">{{trans('label.Title')}}: <?=$required_span; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control {!! $errors->first('title', 'error') !!}" name="title" id="title" value="{{$row['title']}}">
                                            {!! $errors->first('title', '<label class="error">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">{{trans('label.Description')}}: <?=$required_span; ?></label>
                                        <div class="col-sm-10">
                                        <textarea type="text" name="description" id="description" >{{$row['description']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title2" class="col-sm-2 control-label">{{trans('label.Title 2')}}: <?=$required_span; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control {!! $errors->first('title2', 'error') !!}" name="title2" id="title2" value="{{$row['title2']}}">
                                            {!! $errors->first('title2', '<label class="error">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="dec2" class="col-sm-2 control-label">{{trans('label.Description 2')}}: <?=$required_span; ?></label>
                                        <div class="col-sm-10">
                                        <textarea type="text" name="dec2" id="dec2" >{{$row['dec2']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title3" class="col-sm-2 control-label">{{trans('label.Title 3')}}: <?=$required_span; ?></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control {!! $errors->first('title3', 'error') !!}" name="title3" id="title3" value="{{$row['title3']}}">
                                            {!! $errors->first('title3', '<label class="error">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="desc3" class="col-sm-2 control-label">{{trans('label.Description 3')}}: <?=$required_span; ?></label>
                                        <div class="col-sm-10">
                                        <textarea type="text" name="desc3" id="desc3" >{{$row['desc3']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4>Contact Us Info</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="image_name" class="col-sm-2 control-label">{{trans('label.Images')}}:</label>
                                        <div class="col-sm-10">
                                            <?php 
                                                if($row['image_name'] != ""){ 
                                                    echo '<image src="'.asset('page_images').'/'.$row['image_name'].'" class="img-responsive" height="400px" width="500px">';
                                                }
                                            ?>
                                            <input type="file" class="form-control mt-3" name="image_name" id="image_name">
                                            <input type="hidden" value="{{$row['image_name']}}" class="form-control" name="image_name_hidden" id="image_name_hidden">
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- col-lg-12 -->
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
CKEDITOR.replace( 'description' );
CKEDITOR.replace( 'dec2' );
CKEDITOR.replace( 'desc3' );
    
$(".edit_jobOffer").validate({
    submitHandler(form){
        $(".submit").attr("disabled", true);
        var form_cust = $('.edit_jobOffer')[0]; 
        let form1 = new FormData(form_cust);
        var description = CKEDITOR.instances.description.getData();
        var dec2 = CKEDITOR.instances.dec2.getData();
        var desc3 = CKEDITOR.instances.desc3.getData();

        form1.append('description',description);
        $.ajax({
            type: "POST",
            url: '{{route('admin.job_offer.update',$row['id'])}}',
            data: form1,//$('.edit_jobOffer').serialize(),
            contentType: false,
            processData: false,
            success: function( response ) {
                if(response.error == 0){
                    toastr.success(response.msg);
                    setTimeout(function(){
                        // location.href = '{{url('admin/job_offer')}}';
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
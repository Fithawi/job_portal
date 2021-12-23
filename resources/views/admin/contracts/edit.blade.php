<?php $required_span = '<span class="text-red">*</span>'; ?>
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="EditModalLabel">{{trans('label.Edit')}} {{trans('label.Contracts')}}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal editContracts" method="post" action="javascript:void(0)" >
                {{ method_field('PUT') }}
                <div class="mb-3">
                    <label for="title" class="col-form-label"> Title:<?=$required_span; ?></label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $contract_data->title }}" required>
                </div>
                <button type="submit"  class="btn btn-primary  submit">Save</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script>
$(function(){
    $(".editContracts").validate({
        submitHandler(form){
        $(".submit").attr("disabled", true);
        var form_data = $('.editContracts')[0];
        var form1 = new FormData(form_data);
        $.ajax({
            type: "POST",
            url: '{{route('admin.contracts.update',$contract_data->id)}}',
            data: form1,
            contentType: false,
            processData: false,
            success: function( response ) {
                if(response.error == 0){
                    toastr.success(response.msg);

                    setTimeout(function(){
                        location.href = '{{url('admin/contracts')}}';
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



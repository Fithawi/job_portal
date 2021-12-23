<?php $required_span = '<span class="text-red">*</span>'; ?>
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ContractModalLabel">Add Contracts</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal addContracts" method="POST" action="javascript:void(0);" >
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-6 control-label"> Title: <?= $required_span; ?></label>
                        <div class="col-sm-12">
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <button type="submit"  class='btn btn-primary ml-3 submit'>Save</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script>
    $(function(){
        $(".addContracts").validate({
        submitHandler(form){
        $(".submit").attr("disabled", true);
        var form_data = $('.addContracts')[0];
        var form1 = new FormData(form_data);
        $.ajax({
            type: "POST",
            url: '{{route('admin.contracts.store')}}',
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



<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <!-- <h4 style="color:red;"> Apply Now </h4> -->
            <h4 class="modal-title">Apply Now</h4>
        </div>
        <div class="modal-body">
            <form role="form" id="apply_now" method="POST" name="apply_now" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="resume"><span class="glyphicon glyphicon-file"></span> Resume</label>
                    <input type="file" class="form-control required" id="resume" name="resume" accept=".doc,.pdf" placeholder="Upload file">
                    <input type="hidden" class="form-control" id="job_id" name="job_id">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-success" name="submit"> Submit</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<script>
    
    $('#apply_now').validate({
        submitHandler(form){
            let form_data = new FormData(form);
        
            $.ajax({
                type: "POST",
                url:'{{Route('front.store')}}',
                data: form_data,
                processData: false,
                contentType: false,
                success: function( response ) {
                    alert(response.msg);
                    setTimeout(function(){
                        location.href = "{{route('front.jobs')}}";
                    },1000);             
                   },
            })
        return false;
        }
    })
</script>
@extends('layouts.admin')
@section('page_header')
<ul class="navbar-nav flex-row">
    <li>
        <div class="page-header">
            <div class="page-title">
                <h3>Working Hours</h3>
            </div>
        </div>
    </li>
</ul>
@endsection
@section('content')
<?php
  $required_span='<span style="color:red;">*</span>';
?>
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing ">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Working Hours</h4>
                            @if(moduleacess('admin/working_hours','add'))
                                <a href="javascript:void(0);" onclick="AddModal('{{ url('admin/working_hours/create') }}')" class="btn btn-primary btn-flat"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;{{trans('label.New')}} {{trans('label.Working Hours')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="widget-one">
                        <table id="workinghoursList" class="table dt-table-hover dataTable" >
                            <thead>
                                <tr>
                                    <th class="not-mobile">{{trans('label.No of Hours')}}</th>
                                    <th class="not-mobile">{{trans('label.Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="AddHoursModal" data-backdrop="static"></div>
<div class="modal fade" id="EditworkHoursModal" data-backdrop="static"></div>
@endsection


@section('script')
<script>
$(function() {
    var table_html = '';
    var table_html_td = '';
    var i = 1;
    var dt = $('#workinghoursList').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ordering: false,
        ajax: '{!! route('admin.WorkingHoursList') !!}',
        columns: [
            { data: 'no_of_hours', name: 'no_of_hours' },
            { data: 'command', name: 'command', searchable: false }
        ],
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
    });
});


function AddModal(url) {
    $.ajax({
        url: url,
        method: 'GET',
        success: function(res) {
            $("#AddHoursModal").html(res);
            $("#AddHoursModal").modal('show');
        }
    });
}
function EditHourModel(url){
    $.ajax({
        url:url,
        method: 'GET',
        success: function(res){
            $("#EditworkHoursModal").html(res);
            $("#EditworkHoursModal").modal('show');
        }
    });
}

</script>
@endsection  
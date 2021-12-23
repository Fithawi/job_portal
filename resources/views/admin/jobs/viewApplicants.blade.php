@extends('layouts.admin')
@section('page_header')
<ul class="navbar-nav flex-row">
    <li>
        <div class="page-header">
            <div class="page-title">
                <h3>Job Applicants</h3>
            </div>
        </div>
    </li>
</ul>
@endsection
@section('content')
<div class="layout-px-spacing">
  <div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing ">
      <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                     <h4>Job Applicants</h4>
                    
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="widget-one">
                <table id="example" class="table dt-table-hover dataTable" >
                    <thead>
                        <tr>
                            <th>{{trans('label.Applicant Name')}}</th>
                            <th class="not-mobile">{{trans('label.Resume')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($applicants)
                        @foreach($applicants as $user)
                            <tr>
                            <td>{{$user->userName}}</td>
                            <td><a href="{{route('admin.DownloadResume',$user->id)}}">Download </a></td>
                        </tr>
                        @endforeach
                        @endif
                    
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@extends('layouts.admin')

@section('title')
  <title>Sửa loại gỗ</title>
@endsection

@section('css')
    @include('partials.css_of_form')
@endsection

@section('js')
    @include('partials.js_of_form')
@endsection

@section('breadcrumb')
   <div class="page-bar">
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li>
        <a href="{{ url('admin/typewood') }}">Loại gỗ</a><i class="fa fa-circle"></i>
        </li>
        <li><a href="{{ url('admin/user/'.$typewood->id.'/edit') }}">Sửa </a></i></li>  
    </ul>
 </div>   
@endsection

@section('content')
    <h3 class="page-title">
        Sửa danh mục {{$typewood->name}} <b></b> <small>quản lý loại gỗ</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
              
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                     {!! Form::model($typewood,
                     ['method' => 'PATCH', 
                     'url'     => ['admin/typewood', $typewood->id ],
                     'id'      => 'form_sample_3', 
                     'class'   => 'form-horizontal']) !!}
                        @include('admin.typewood.form')
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('title') 
  <title>Sửa tin tức</title>
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
        <a href="{{ url('admin/new') }}">Tin tức</a><i class="fa fa-circle"></i>
        </li>
        <li><a href="{{ url('admin/product/'.$new->id.'/edit') }}">Sửa</a></i></li>  
    </ul>
 </div>   
@endsection

@section('content')
    <h3 class="page-title">
        Sửa tin tức "{{$new->title}}" <small>quản lý tin tức </small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                     {!! Form::model($new , 
                     ['method' => 'PATCH', 
                     'url' => ['admin/new', $new->id], 
                      'files' => true, 
                      'id' => 'form_sample_3',
                      'class' => 'form-horizontal'
                       ])
                        !!}
                        @include('admin.new.form')
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
    </div>
@endsection
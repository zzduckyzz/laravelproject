@extends('layouts.admin')

@section('title') 
  <title>Cập nhật liên hệ</title>
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
        <a href="{{ url('admin/contact') }}">Liên hệ</a><i class="fa fa-circle"></i>
        </li>
        <li><a href="{{ url('admin/contact/'.$contact->id.'/edit') }}">Cập nhật</a></i></li>  
    </ul>
 </div>   
@endsection

@section('content')
    <h3 class="page-title">
        Cập nhật liên hệ người dùng "{{$contact->fullname}}" 
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                     {!! Form::model($contact , 
                     ['method' => 'PATCH', 
                     'url' => ['admin/contact', $contact->id], 
                      'files' => true, 
                      'id' => 'form_sample_3',
                      'class' => 'form-horizontal'
                       ])
                        !!}
                        @include('admin.contact.form')
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
    </div>
@endsection
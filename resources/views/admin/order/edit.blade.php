@extends('layouts.admin')

@section('title') 
  <title>Cập nhật Hóa đơn</title>
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
        <a href="{{ url('admin/order') }}">Hóa đơn</a><i class="fa fa-circle"></i>
        </li>
        <li><a href="{{ url('admin/order/'.$order->id.'/edit') }}">Cập nhật</a></i></li>  
    </ul>
 </div>   
@endsection

@section('content')
    <h3 class="page-title">
        Cập nhật liên hệ Hóa đơn "{{$order->created_at}}" 
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                     {!! Form::model($order , 
                     ['method' => 'PATCH', 
                     'url' => ['admin/order', $order->id], 
                      'files' => true, 
                      'id' => 'form_sample_3',
                      'class' => 'form-horizontal'
                       ])
                        !!}
                        @include('admin.order.form')
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('title') 
  <title>Khách hàng </title>
@endsection


@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li><a href="{{url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
            <li><a href="{{url('admin/customer') }}">Khách hàng</a></li>
        </ul>
    </div>
@endsection
@section('content')

    <h3 class="page-title">
        Khách hàng  <small>quản lý</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            @include('partials.alert')
           
            {!! Form::open(['method' => 'GET', 'url' => 'admin/customer']) !!}
                @include('partials.search_form')
            {!! Form::close() !!}

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách khách hàng </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th> #</th>
                                <th> Họ tên</th>
                                <th> Email</th>
                                <th> Số điện thoại </th>
                                <th> Giới tính</th>
                                <th> Ngày sinh </th>
                                <th> Địa chỉ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $item)
                                <tr>
                                    <td> {{ $key+ $list->firstItem() }} </td>
                                    <td> {{ $item->fullname }}  </td>
                                    <td> {{ $item->email }}  </td>
                                    <td> {{ $item->phone_number }}  </td>
                                    <td>
                                         @if($item->gender==1)
                                          <h4 style="color: blue;">Nam</h4>
                                         @elseif($item->gender==0) 
                                          <h4 style="color: #444;">Nữ</h4>
                                          @else 
                                          {{'khác'}}
                                         @endif
                                    </td>
                                   <td> {{ $item->birthday }}  </td>
                                   <td> {{ $item->address }}  </td>
                                </tr>
                         @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="pani">
        <ul class="pagination pull-right">
            <li>
                {!! $list->links() !!}
            </li>
        </ul>
    </div>
@endsection

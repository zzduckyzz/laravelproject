@extends('layouts.admin')
@section('title') 
  <title>Liên hệ</title>
@endsection

@section('js')

@endsection

@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li><a href="{{url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
            <li><a href="{{url('admin/contact') }}">Liên hệ</a></li>
        </ul>
    </div>
@endsection
@section('content')
    <h3 class="page-title">
        Liên hệ  <small>quản lý</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            @include('partials.alert')
        
            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách liên hệ </div>
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
                                <th> Họ và tên</th>
                                <th> Điện thoại </th>
                                <th> Email </th>
                                <th> Địa chỉ </th>
                                <th> Nội dung</th>
                                <th> Trạng Thái</th>
                                <th> Ngày Liên Hệ</th>
                                <th> Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $item)
                                <tr>
                                    <td> {{ $key+ $list->firstItem() }} </td>
                                    <td> {{ $item->fullname }} </td>
                                    <td> {{ $item->phone_number }}</td>
                                    <td> {{ $item->email }}</td>
                                    <td> {{ $item->address }} </td>
                                    <td> {{$item->content}}</td>
                                     <td>
                                         @if($item->status==0)
                                          <h4 style="color:red ;">Chưa phản hồi</h4>
                                         @else 
                                          <h4 style="color: blue;">Đã phản hồi</h4>
                                         @endif
                                    </td>
                                    <td> {{$item->created_at}}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/contact', $item->id]]) !!}
                                            <a href="{{ url('admin/contact/' . $item->id . '/edit') }}" class="btn btn-sm btn-outline dark pull-right">
                                                <i class="fa fa-edit"></i> Cập nhật trạng thái
                                            </a>  
                                              
                                        {!! Form::close() !!}
                                    </td>
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

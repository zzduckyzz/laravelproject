@extends('layouts.admin')

@section('title')
 <title>Loại gỗ</title>
@endsection
@section('breadcrumb')
 <div class="page-bar">
    <ul class="page-breadcrumb">
        <li><a href="{{url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li><a href="{{url('admin/typewood') }}">Loại gỗ</a></li>
    </ul>
</div>    
@endsection
@section('content')
    <h3 class="page-title">
        Loại gỗ <small>quản lý</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            @include('partials.alert')
            <div class="clearfix">
                <a href="{{ url('admin/typewood/create') }}" class="btn green"> Thêm mới loại gỗ <i class="fa fa-plus"></i></a>
            </div>
            {!! Form::open(['method' => 'GET', 'url' => 'admin/typewood']) !!}
                @include('partials.search_form')
            {!! Form::close() !!}

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách loại gỗ</div>
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
                                <th> Tên loại gỗ</th>
                                <th> Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($list as $key => $item)
                                <tr>
                                    <td> {{ $key + $list->firstItem() }} </td>
                                    <td> {{ $item->name }} </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/typewood', $item->id]]) !!}
                                            
                                            <button type="submit" class="btn btn-sm btn-outline red pull-right" onclick="return confirm('Bạn có chắc muốn xóa loại gỗ này  ?');">
                                                <i class="fa fa-remove"></i> Xóa
                                            </button>
                                           
                                            <a href="{{ url('admin/typewood/' . $item->id . '/edit') }}" class="btn btn-sm btn-outline dark pull-right">
                                                <i class="fa fa-edit"></i> Sửa
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
            <div class="pani">
                <ul class="pagination pull-right">
                    <li>
                      {!! $list->links() !!}
                    </li>
                </ul>
            </div>
    </div>


@endsection

@extends('layouts.admin')

@section('title') 
  <title>Hình ảnh</title>
@endsection
@section('js')
   
@endsection

@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li><a href="{{url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
            <li><a href="{{url('admin/image') }}">Hình ảnh</a></li>
        </ul>
    </div>
@endsection
@section('content')


    <h3 class="page-title">
       Hình ảnh  <small>quản lý</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            @include('partials.alert')
            <div class="clearfix">
                <a href="{{ url('admin/image/create') }}" class="btn green"> Thêm hình ảnh mới cho sản phẩm <i class="fa fa-plus"></i></a>
            </div>

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách hình ảnh </div>
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
                                <th> Hình ảnh</th>
                                <th> Sản phẩm  </th>
                                <th> Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $item)
                                <tr>
                                    <td> {{ $key+ $list->firstItem() }} </td>
                                    <td>
                                         <img src="{{ url('uploads/product/'.$item->images) }}" 
                                         width="40px" height="40px" />
                                    </td>
                                    <td> {{$item->product->name}} </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/image', $item->id]]) !!}
                                            
                                            <button type="submit" class="btn btn-sm btn-outline red pull-right" onclick="return confirm('Bạn có chắc muốn xóa hình ảnh của sản phẩm này ?');">
                                                <i class="fa fa-remove"></i> Xóa
                                            </button>
                                           
                                            <a href="{{ url('admin/image/' . $item->id . '/edit') }}" class="btn btn-sm btn-outline dark pull-right">
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
    </div>

    <div class="pani">
        <ul class="pagination pull-right">
            <li>
                {!! $list->links() !!}
            </li>
        </ul>
    </div>
@endsection

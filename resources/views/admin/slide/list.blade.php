@extends('layouts.admin')

@section('title') 
  <title>Slide </title>
@endsection
@section('js')
   
@endsection

@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li><a href="{{url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
            <li><a href="{{url('admin/slide') }}">Slide</a></li>
        </ul>
    </div>
@endsection
@section('content')

    <h3 class="page-title">
        Slide  <small>quản lý</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            @include('partials.alert')
            <div class="clearfix">
                <a href="{{ url('admin/slide/create') }}" class="btn green"> Thêm slide mới <i class="fa fa-plus"></i></a>
            </div>
            {!! Form::open(['method' => 'GET', 'url' => 'admin/slide']) !!}
                @include('partials.search_form')
            {!! Form::close() !!}

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách slide </div>
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
                                <th> Tiêu đề</th>
                                <th> Hình ảnh  </th>
                                <th> Link </th>
                                <th> Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $item)
                                <tr>
                                    <td> {{ $key+ $list->firstItem() }} </td>
                                    <td> 
                                       {{ $item->title }} 
                                     </td>
                                    <td>
                                         <img src="{{ url('uploads/slidershow/'.$item->image) }}" 
                                         width="60px" height="60px" />
                                    </td>
                                     <td>
                                        {{ $item->link }} 
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/slide', $item->id]]) !!}
                                            
                                            <button type="submit" class="btn btn-sm btn-outline red pull-right" onclick="return confirm('Bạn có chắc muốn xóa slide này ?');">
                                                <i class="fa fa-remove"></i> Xóa
                                            </button>
                                            <a href="{{ url('admin/slide/' . $item->id . '/edit') }}" class="btn btn-sm btn-outline dark pull-right">
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

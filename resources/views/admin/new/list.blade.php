@extends('layouts.admin')

@section('title') 
  <title>Tin tức </title>
@endsection
@section('js')
   
   <script type="text/javascript" src="{{ url('js/new.js') }}"></script>
@endsection

@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li><a href="{{url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
            <li><a href="{{url('admin/new') }}">Tin tức</a></li>
        </ul>
    </div>
@endsection
@section('content')

    <div id="detailModal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Xem chi tiết tin tức</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                </div>
            </div>
        </div>
    </div>

    <h3 class="page-title">
        Sản phẩm  <small>quản lý</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            @include('partials.alert')
            <div class="clearfix">
                <a href="{{ url('admin/new/create') }}" class="btn green"> Thêm tin tức mới <i class="fa fa-plus"></i></a>
            </div>
            {!! Form::open(['method' => 'GET', 'url' => 'admin/new']) !!}
                @include('partials.search_form')
            {!! Form::close() !!}

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách sản phẩm </div>
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
                                <th> Nổi bật </th>
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
                                         <img src="{{ url('uploads/news/'.$item->images) }}" 
                                         width="40px" height="40px" />
                                    </td>
                                     <td>
                                         @if($item->hot_news==1)
                                          <h4 style="color: blue;">Có</h4>
                                         @else 
                                          <h4 style="color: #444;">Không</h4>
                                         @endif
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/new', $item->id]]) !!}
                                            
                                            <button type="submit" class="btn btn-sm btn-outline red pull-right" onclick="return confirm('Bạn có chắc muốn xóa tin tức này ?');">
                                                <i class="fa fa-remove"></i> Xóa
                                            </button>
                                            <a href="{{ url('admin/new/' . $item->id . '/edit') }}" class="btn btn-sm btn-outline dark pull-right">
                                                <i class="fa fa-edit"></i> Sửa
                                            </a>  
                                             <a href="javascript:void(0);" 
                                             onclick="showDetail({{ $item->id }})"  
                                             class="btn btn-sm btn-outline dark pull-right">
                                             <i class="fa fa-eye" 
                                             style="color:blue;"></i> Xem
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

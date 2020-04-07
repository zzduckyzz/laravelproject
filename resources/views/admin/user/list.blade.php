@extends('layouts.admin')

@section('title')
 <title>Người dùng</title>
@endsection
@section('js')
   <!-- <script type="text/javascript">
        $(document).ready(function(){
           $('.block').click(function() {
            
           });
        });

   </script> -->
@endsection
@section('breadcrumb')
 <div class="page-bar">
    <ul class="page-breadcrumb">
        <li><a href="{{url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li><a href="{{url('admin/user') }}">Người dùng</a></li>
    </ul>
</div>    
@endsection
@section('content')
    <h3 class="page-title">
        Người dùng <small>quản lý</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            @include('partials.alert')
            <div class="clearfix">
                <a href="{{ url('admin/user/create') }}" class="btn green"> Thêm mới người dùng <i class="fa fa-plus"></i></a>
            </div>
            {!! Form::open(['method' => 'GET', 'url' => 'admin/user']) !!}
                @include('partials.search_form')
            {!! Form::close() !!}

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách người dùng </div>
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
                                <th> Email </th>
                                <th> Sđt</th>
                                <th> Địa chỉ </th>
                                <th> Giới tính</th>
                                <th> Ngày sinh</th>
                                <th> Level </th>
                                <th> Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($list as $key => $item)
                                <tr>
                                    <td> {{ $key + $list->firstItem() }} </td>
                                    <td> {{ $item->name }} </td>
                                    <td> {{ $item->email }} </td>
                                    <td> {{ $item->phone }} </td>
                                    <td> {{ $item->address }}</td>
                                    <td> 
                                     @if( $item->gender==0)
                                       {{'Nữ'}}
                                     @elseif( $item->gender==1) 
                                       {{'Nam'}}
                                     @else 
                                      {{'Khác'}}   
                                     @endif 
                                    </td>
                                    <td> {{ $item->birthday }}</td>
                                    <td> 
                                     @if($item->level==1)
                                      <span style="color:red;">{{'Admin'}}</span>
                                     @elseif($item->level==2) 
                                       <span style="color:green;">{{'Quản trị viên '}}</span> 
                                    @else   
                                       {{'Thành viên'}}
                                     @endif
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/user', $item->id]]) !!}
                                           
                                            
                                           @if(Auth::user()->id != $item->id)
                                            <button type="submit" class="btn btn-sm btn-outline red pull-right" onclick="return confirm('Bạn có chắc muốn xóa người dùng này ?');">
                                                <i class="fa fa-remove"></i> Xóa
                                            </button>
                                           @else

                                           @endif 
                                            @if($item->is_active == 0) 
                                            <a href="{{ url('admin/block/'.$item->id) }}" class="btn btn-sm btn-outline dark pull-right block">
                                                <i class="fa fa-edit open"> Khóa tài khoản </i> 
                                            </a> 
                                            @else 
                                              <a href="{{ url('admin/block/'.$item->id) }}" class="btn btn-sm btn-outline dark pull-right block">
                                                <i class="fa fa-lock open"> Mở tài khoản </i> 
                                            </a> 
                                            @endif   
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

@extends('layouts.admin')

@section('title') 
  <title>Hóa đơn </title>
@endsection


@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li><a href="{{url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
            <li><a href="{{url('admin/order') }}">Hóa đơn</a></li>
        </ul>
    </div>
@endsection
@section('content')

    <h3 class="page-title">
        Hóa đơn  <small>quản lý</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            @include('partials.alert')
           
            {!! Form::open(['method' => 'GET', 'url' => 'admin/order']) !!}
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
                                <th> Người dùng </th>
                                <th> Email</th> 
                                <th> Số điện thoại </th>
                                <th> Địa chỉ</th>
                                <th> Tổng tiền</th>
                                <th> Trạng thái</th>
                                <th> Ngày đặt</th>
                                <th> Hành động </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $item)
                                <tr>
                                    <td> {{ $key+ $list->firstItem() }} </td>
                                    <td>
                                      @if($item->id_user==0)
                                      {{$item->fullname}}
                                      @else
                                       {{ $item->user->name }}
                                      @endif
                                     </td>
                                     <td>
                                      @if($item->id_user==0)
                                        {{$item->email}}
                                      @else
                                       {{ $item->user->email }}
                                      @endif
                                     </td>
                                    <td> 
                                      @if($item->id_user==0)
                                        {{$item->phone_number}}
                                      @else
                                       {{ $item->user->phone }}
                                      @endif
                                    </td>
                                    <td> 
                                       @if($item->id_user==0)
                                        {{$item->address}}
                                      @else
                                       {{ $item->user->address }}
                                      @endif
                                    </td>
                                    <td style="color: red;">  
                                       <?= number_format($item->total_price)." " ."VNĐ" ;?>
                                    </td>
                                    <td>
                                         @if($item->status==0)
                                          <h4 style="color: #444;">Đang chờ xử lý</h4>
                                         @elseif($item->status==1) 
                                          <h4 style="color: blue;">Đã giao hàng</h4>
                                          @elseif($item->status==2) 
                                          {{'Hết hàng'}}
                                          @else 
                                           <h4 style="color: red;">Hủy đơn hàng</h4>
                                         @endif
                                    </td>
                                     <td> {{ $item->created_at }}  </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/order', $item->id]]) !!}
                                            <a href="{{ url('admin/order/' . $item->id . '/edit') }}" class="btn btn-sm btn-outline dark pull-right">
                                                <i class="fa fa-edit"></i> Cập nhật trạng thái
                                            </a>  
                                            <a href="{{ url('admin/order/' . $item->id) }}" class="btn btn-sm btn-outline dark pull-right">
                                                <i class="fa fa-eye"></i>Chi tiết hóa đơn
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

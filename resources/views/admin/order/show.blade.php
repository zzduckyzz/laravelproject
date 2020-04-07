@extends('layouts.admin')

@section('title') 
  <title>Chi tiết hóa đơn </title>
@endsection


@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li><a href="{{url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
            <li><a href="{{url('admin/order') }}">Chi tiết hóa đơn</a></li>
        </ul>
    </div>
@endsection
@section('content')

    <h3 class="page-title">
       Chi tiết hóa đơn   <small>quản lý</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            @include('partials.alert')
           
            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Chi tiết hóa đơn </div>
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
                                <th> Mã hóa đơn</th>
                                <th> Sản phẩm</th>
                                <th> Số lượng </th>
                                <th> Đơn giá</th>
                                <th> Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $item)
                                <tr>
                                    <td> {{ $key+ $list->firstItem() }} </td>
                                    <td> {{ $item->order_id }}  </td>
                                    <td> {{ $item->product->name }}  </td>
                                    <td> {{ $item->quantity }}  </td>
                                    <td style="color: green;">
                                      <?= number_format($item->price )." " ."VNĐ" ;?>
                                    </td>
                                    <td style="color: red;">  
                                       <?= number_format($item->price * $item->quantity)." " ."VNĐ" ;?>
                                    </td>
                                     <td> {{ $item->created_at }}  </td>
                                </tr>
                         @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
       <div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <a href="{{ url('admin/order') }}" class="btn default">Quay lại</a>
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

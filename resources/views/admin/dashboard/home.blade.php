@extends('layouts.admin')

@section('title')
   <title>Thống kê</title>
@ensection
@section('css')
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link href="assets/pages/css/jquery.barCharts.css" rel="stylesheet" type="text/css">
        <style>
        body { font-family:'Roboto'; background-color:#333; color:#fff;}
        /*.container { margin:150px auto;}*/
        .barChart__barFill { background-color:#229e9b;}
        .barChart__bar { height: 24px;}
        .barChart__label {font-weight: bold; color: #38d3a8;}
        .barChart__value {font-weight: bold;color: red;}
        </style>
@endsection
@section('js')
        <!-- <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script> -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="assets/pages/scripts/jquery.barChart.js"></script>
        <script>
         jQuery('.barChart').barChart({easing: 'easeOutQuart'});
        </script>

        <script type="text/javascript">

          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-36251023-1']);
          _gaq.push(['_setDomainName', 'jqueryscript.net']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>
@endsection
@section('breadcrumb')
	 <div class="page-bar">
	    <ul class="page-breadcrumb">
	        <li>
	            <a href="index.php">Trang chủ</a>
	            <i class="fa fa-circle"></i>
	        </li>
	        <li>
	            <span>Thống kê</span>
	        </li>
	    </ul>
	</div>
@endsection

@section('content')
      <div class="row">
       
        <div class="col-md-12 col-sm-12">
            <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Thống kê
                       <!--  <small>dashboard & statistics</small> -->
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{ $contact }}"></span>
                                    </div>
                                    <div class="desc"> Liên hệ </div>
                                </div>
                                <a class="more" href="javascript:;"> 
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" 
                                          data-value="{{$user}}"> VNĐ
                                        </span>
                                         </div>
                                    <div class="desc"> Thành viên </div>
                                </div>
                                <a class="more" href="javascript:;"> 
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$order1}}"></span>
                                    </div>
                                    <div class="desc"> Hóa đơn </div>
                                </div>
                                <a class="more" href="javascript:;">
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat purple">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                        <span data-counter="counterup" data-value="{{$product}}"></span>  </div>
                                    <div class="desc"> Sản Phẩm </div>
                                </div>
                                <a class="more" href="javascript:;"> 
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Thống kê đơn đặt hàng</span>
                                        <span class="caption-helper">{{$now->year}}</span>
                                    </div>
                                  <!--   <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">New</label>
                                            <label class="btn red btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- <h1>Thống kê đơn đặt hàng</h1> -->
                                <div class="barChart">
                                        <div class="barChart__row" data-value="{{$co}}">
                                            <span class="barChart__label"><?= $now->toDateString();?></span>
                                            <span class="barChart__value">{{$co}}</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                        <div class="barChart__row" data-value="{{ $co1 }}">
                                            <span class="barChart__label">{{ $ytd11 }}</span>
                                            <span class="barChart__value">{{ $co1 }}</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                        <div class="barChart__row" data-value="{{$co2}}">
                                            <span class="barChart__label">{{ $ytd12 }}</span>
                                            <span class="barChart__value">{{ $co2 }}</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                         <div class="barChart__row" data-value="{{$co3}}">
                                            <span class="barChart__label">{{ $ytd13 }}</span>
                                            <span class="barChart__value">{{ $co3 }}</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                         <div class="barChart__row" data-value="{{$co4}}">
                                            <span class="barChart__label">{{ $ytd14 }}</span>
                                            <span class="barChart__value">{{ $co4 }}</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                         <div class="barChart__row" data-value="{{$co5}}">
                                            <span class="barChart__label">{{ $ytd15 }}</span>
                                            <span class="barChart__value">{{ $co5 }}</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                         <div class="barChart__row" data-value="{{$co6}}">
                                            <span class="barChart__label">{{ $ytd16 }}</span>
                                            <span class="barChart__value">{{ $co6 }}</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                        
                                        <!-- <div class="barChart__row" data-value="80">
                                            <span class="barChart__label">Th 8</span>
                                            <span class="barChart__value">80</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                         <div class="barChart__row" data-value="80">
                                            <span class="barChart__label">Th 9</span>
                                            <span class="barChart__value">80</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                         <div class="barChart__row" data-value="80">
                                            <span class="barChart__label">Th 10</span>
                                            <span class="barChart__value">80</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                         <div class="barChart__row" data-value="80">
                                            <span class="barChart__label">Th 11</span>
                                            <span class="barChart__value">80</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div>
                                         <div class="barChart__row" data-value="80">
                                            <span class="barChart__label">Th 12</span>
                                            <span class="barChart__value">80</span>
                                            <span class="barChart__bar"><span class="barChart__barFill"></span></span>
                                        </div> -->
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                         <!-- BEGIN PORTLET-->
                        <!-- <div class="col-md-12 col-sm-12">   
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-red-sunglo bold uppercase">Revenue</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                                <span class="fa fa-angle-down"> </span>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Q1 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q2 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li class="active">
                                                    <a href="javascript:;"> Q3 2014
                                                        <span class="label label-sm label-success"> current </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q4 2014
                                                        <span class="label label-sm label-warning"> upcoming </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_activities_loading">
                                        <img src="assets/global/img/loading.gif" alt="loading" /> </div>
                                    <div id="site_activities_content" class="display-none">
                                        <div id="site_activities" style="height: 228px;"> </div>
                                    </div>
                                    <div style="margin: 20px 0 10px 30px">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-success"> Revenue: </span>
                                                <h3>$13,234</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-info"> Tax: </span>
                                                <h3>$134,900</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-danger"> Shipment: </span>
                                                <h3>$1,134</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-warning"> Orders: </span>
                                                <h3>235090</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div> -->
                    </div>
                    <!-- END DASHBOARD STATS 1-->
            <!-- BEGIN PORTLET-->
           <!--  <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-red-sunglo hide"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Revenue</span>
                        <span class="caption-helper">monthly stats...</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                <span class="fa fa-angle-down"> </span>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;"> Q1 2014
                                        <span class="label label-sm label-default"> past </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;"> Q2 2014
                                        <span class="label label-sm label-default"> past </span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="javascript:;"> Q3 2014
                                        <span class="label label-sm label-success"> current </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="javascript:;"> Q4 2014
                                        <span class="label label-sm label-warning"> upcoming </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="site_activities_loading">
                        <img src="assets/global/img/loading.gif" alt="loading" /> </div>
                    <div id="site_activities_content" class="display-none">
                        <div id="site_activities" style="height: 228px;"> </div>
                    </div>
                    <div style="margin: 20px 0 10px 30px">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-sm label-success"> Revenue: </span>
                                <h3>$13,234</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-sm label-info"> Tax: </span>
                                <h3>$134,900</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-sm label-danger"> Shipment: </span>
                                <h3>$1,134</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-sm label-warning"> Orders: </span>
                                <h3>235090</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

                    <h3 class="page-title">
                        Hóa đơn  <small>đặt hàng</small>
                    </h3>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green margin-top-10">
                                <div class="portlet-title">
                                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách 10 đơn hàng gần đây nhất </div>
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
                                                <th> Số điện thoại </th>
                                                <th> Địa chỉ</th>
                                                <th> Tổng tiền</th>
                                                <th> Trạng thái</th>
                                                <th> Ngày đặt</th>
                                               <!--  <th> Hành động </th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $key => $item)
                                                <tr>
                                                    <td> {{ $key + 1 }} </td>
                                                    <td>
                                                      @if($item->id_user==0)
                                                      {{$item->fullname}}
                                                      @else
                                                       {{ $item->user->name }}
                                                      @endif
                                                     </td>
                                                    <td>  
                                                       @if($item->id_user==0)
                                                       {{$item->phone_number}}
                                                       @else
                                                       {{ $item->user->phone}}
                                                       @endif 
                                                   </td>
                                                    <td> 
                                                        @if($item->id_user==0)
                                                       {{$item->address}}
                                                       @else
                                                       {{ $item->user->address}}
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
                                                   <!-- <td>
                                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/order', $item->id]]) !!}
                                                            <a href="{{ url('admin/order/' . $item->id . '/edit') }}" class="btn btn-sm btn-outline dark pull-right">
                                                                <i class="fa fa-edit"></i> Cập nhật trạng thái
                                                            </a>  
                                                            <a href="{ { url('admin/order/' . $item->id) }}" class="btn btn-sm btn-outline dark pull-right">
                                                                <i class="fa fa-eye"></i>Chi tiết hóa đơn
                                                            </a>      
                                                        {!! Form::close() !!}
                                                    </td> -->
                                                </tr>
                                         @endforeach
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- END PORTLET-->
        </div>
    </div>
@endsection
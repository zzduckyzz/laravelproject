@extends('client/layouts.home')
@section('title')
    <title>Xem hóa đơn</title>
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<div class="features_items">
<section id="cart_items">
            <h2 class="title text-center" style="border-bottom:1px solid #A44823;">Hóa đơn đặt hàng</h2>
			<div class="review-payment">
				<h2>Hóa đơn của bạn</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
						   <td class="image"># </td>
							<td class="image">Họ tên </td>
							<td class="price">Địa chỉ</td>
							<td class="quantity">Số Điện thoại</td>
							<td class="total">Tổng tiền</td>
							<td class="total">Trạng thái</td>
							<td class="total">Ngày đặt</td>	
							<td class="total">Xem chi tiết</td>	
						</tr>
					</thead>
					<tbody>
					 @foreach($order as  $key => $item )
						<tr>
							<td class="cart_product" >
							  {{ $key + 1 }}
							</td>
							<td class="cart_description" style="color:green;">
								{{ $item->user->name}}
							</td>
							<td class="cart_price">
								 {{ $item->address }}
							</td>
							<td class="cart_quantity">
								{{ $item->phone_number}}
							</td>
							<td class="cart_total" style="color: red;">
								{{ number_format($item->total_price) }}
							</td>
							<td class="cart_total">
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
							<td>
								{{ $item->created_at }}
							</td>
							<td class="cart_total">
								<a href="{{ url('chitiethoadon/'.$item->id) }}" title="Xem chi tiết đơn hàng">Xem</a>
							</td>	
						</tr>
					 @endforeach	
                       <!-- 
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr class="shipping-cost">
										<td>Phí vận chuyển</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td  style="color:red;font-weight: bold;font-size: 20px;">Tổng tiền</td>
										<td style="color: red;">$61</td>
									</tr>
									<tr>
										<td>Trạng thái</td>
										<td>$2</td>
									</tr>
								</table>
							</td>
						</tr> -->
					</tbody>
				</table>
			</div>
			
	</section> 
	</div>
@endsection

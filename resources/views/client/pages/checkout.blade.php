@extends('client/layouts.home')
@section('title')
    <title>Chi tiết hóa đơn</title>
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<div class="features_items">
<section id="cart_items">
            <h2 class="title text-center" style="border-bottom:1px solid #A44823;">Chi tiết Hóa đơn</h2>
			<div class="review-payment">
				<h2>Các sản phẩm</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
						    <td>#</td>
						    <td class="image">Hình ảnh</td>
							<td class="image">Sản phẩm /td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>	
						</tr>
					</thead>
					<tbody>
					  @foreach($orderdetail as $key =>$item )
						<tr>
						    <td>{{$key + 1}}</td>
						    <td class="cart_product">
								
								<img src="{{ url('uploads/product/'.$item->product->images ) }}" alt=""
								width="110px" height="110px" />
								
							</td>
							<td class="cart_description">
								<h4> <a href=""></a>{{ $item->product->name}}</a></h4>
							</td>
							<td class="cart_price" style="color: red;">
								{{ number_format($item->price) }}
							</td>
							<td class="cart_quantity">
								
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->quantity }}" autocomplete="off" size="2"/>
								
							</td>
							<td class="cart_total">
								<p class="cart_total_price" style="color: red;">
								  	{{ number_format($item->total_price) }}
								</p>
							</td>	
							
						</tr>
					   @endforeach	
						
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">	
									<tr class="shipping-cost">
										<a href="{{ url('hoadon/'.Auth::user()->id ) }}" title="">Quay lại</a>
																			
									</tr>
									
								</table>
							</td>
						</tr> -
					</tbody>
				</table>
			</div>
			
	</section> 
	</div>
@endsection

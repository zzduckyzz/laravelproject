@extends('client.layouts.home')
@section('title')
  <title>Giỏ hàng | Go Mi</title>
@endsection
@section('js')
     <script type="text/javascript">
     	$(document).ready(function(){
     		$(".destroy").click(function(){
               return confirm('Bạn có muốn chắc hủy giỏ hàng ?');
     		});
     	});
     </script>
  
@endsection
@section('content')
  <section id="cart_items">
		<!-- <div class="container"> -->
		<h2 class="title text-center">Giỏ Hàng</h2>
			<div class="register-req">
				<p>Hãy <a href="dangky">đăng ký</a> là thành viên để có thể mua đặt hàng từ chúng tôi một cách dễ dàng hơn.</p>
			</div><!--/register-req-->
			<div class="review-payment">
				<h2>Giỏ hàng của bạn</h2>
			</div>

			<div class="table-responsive cart_info">
			 @include('../partials/alert')
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản Phẩm</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td class="total">Hành động</td>
							<td></td>
						</tr>
					</thead>
					<tbody>   
					@foreach($content as $item)
					 
						<tr>
							<td class="cart_product">
								
								<img src="{{ url('uploads/product/'.$item->options->img ) }}" alt=""
								width="110px" height="110px" />
								
							</td>
							<td class="cart_description">
								<h4> <a href=""></a>{{ $item->name }}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>
									<?= number_format($item->price)." "."VNĐ";?>
								</p>
							</td>
							<td class="cart_quantity quantity">
						{!!  Form::open(['method'=>'PATCH', 'url'=>['capnhat', $item->id]])!!}	
									<input class="cart_quantity_input update-qty" type="text" name="qty" 
									value="{{ $item->qty }}"    size="2"/>
									
								
							</td>
							<td class="cart_total">
								<p class="cart_total_price" style="color: red;"> 
                                   <?= number_format($item->price)*$item->qty, "," , 0, 0, 0," "."VNĐ";?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ url('xoagiohang/'.$item->rowId ) }}"><i class="fa fa-times"> Xóa</i></a>
							</td>
							<td class="cart_edit">
								<button class="cart_quantity_delete btn btn-info" type="submit"> 
								    <i class="fa fa-edit"> Cập nhật</i></a>
								 </button>
							</td>
						</tr>
					    {!!  Form::close()!!}	 
                    @endforeach
                </form>	   
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">

							  @if((Cart::content()->count() > 0))
								<table class="table table-condensed total-result">
								    <tr>
										<td style="color:red;font-weight: bold;font-size: 20px;">Tổng tiền: </td>
										<td style="color: red;">
											 {{ $subtotal }} VNĐ
										</td>
									</tr>
								
									<tr>
										<td>
										<a class="btn btn-warning destroy" href="huygiohang">Hủy giỏ hàng</a>
										</td>
										
									</tr> 
								    <tr class="shipping-cost">
										<td>
										<a class="btn btn-warning" href="trangchu">Tiếp tục mua hàng</a>
										</td>											
									</tr> 
								</table>
                               @else
                                 <h3>Bạn chưa có sản phẩm nào trong giỏ hàng</h3>
						       @endif		
							</td>
						</tr>
					</tbody>
				</table>
			</div>

	        <div class="col-sm-9 clearfix">
	          @if((Cart::content()->count() > 0))
	             @if(Auth::user())
						<div class="bill-to">
							<!-- <p>Mời bạn nhập thông tin để đặt hàng</p> -->
							<div class="form-one">
								<form method="post" action="{{ url('dathang') }}">
								   <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								   <button type="submit" class="btn btn-warning pull-right">Đặt hàng</button>
								</form>
							</div>
						</div>
			     @else  
                <div class="bill-to">
							<p>Mời bạn nhập thông tin để đặt hàng</p>
							<div class="form-one">
								<form method="post" action="{{ url('dathang') }}">
								   <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
									<input type="text" name="fullname" placeholder="Họ và tên *" required="">
									<input type="email" name="email" placeholder="Email *" required="">
									<input type="text"  name="phone_number" placeholder="Số điện thoại *" required="">
									<input type="text" name="address" placeholder="Địa chỉ *" required="">
									
									<button type="submit" class="btn btn-warning">Đặt hàng</button>
								</form>
							</div>
				  </div>
				@endif   
			 @endif			
			</div>		
		<!-- </div> -->
  </section>
@endsection

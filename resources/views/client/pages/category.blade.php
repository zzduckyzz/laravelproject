@extends('client.layouts.home')
@section('title')
 <title>Danh Mục | GO Mi</title>
@endsection
@section('js')
   <script type="text/javascript">
   	   $(document).ready(function(){
   	   	   $(".addcart").click(function(){
              alert('Thêm vào giỏ hàng thành công .');
   	   	   });
   	   });
   </script>
@endsection
@section('content')
<div class="features_items">
						<h2 class="title text-center">Danh mục {{$cate->name}}</h2>
					 @foreach($category1 as $item)		
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="{{ url('chitietsanpham/'.$item->id ) }}" title="title">
											 <img src="uploads/product/{{$item->images}}" 
											 alt="" width="255px" height="237px" />
											</a>
											<h2 style="color: red;font-weight: normal;">
												<?= number_format($item->price)." "."VNĐ"; ?>
											</h2>
											<p style="color: #9F431E; font-weight: bold;font-size: 18px;">
											 {{ $item->name }}
											</p>
											<a href="{{ url('chitietsanpham/'.$item->id ) }}" class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-zoom-in"></i>Chi tiết</a>
											<a href="{{ url('themgiohang/'.$item->id) }}" class="btn btn-default add-to-cart addcart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
										</div>
								</div>
							</div>
						</div>
					@endforeach 	
						
</div>
<ul class="pagination">
		{!! $category1->links() !!}
</ul>
@endsection

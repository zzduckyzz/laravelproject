@extends('client/layouts.home')
@section('title')
 <title>Chi tiết sản phẩm | Go Mi</title>
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
<div class="product-details">
                       <h2 class="title text-center" style="border-bottom:1px solid #A44823;">Chi Tiết Sản Phẩm</h2>
						<div class="col-sm-5">
		
							<div class="view-product">
								<img src="uploads/product/{{$product1->images}}" alt="" width="329px"
								height="380px" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								  <!-- Wrapper for slides -->
								   <div class="carousel-inner">
								   
										<div class="item active">
										 @foreach($image as $item)
										  <a href=""><img src="uploads/product/{{$item->images}}" alt="" width="84px" height="84px"></a>
										 <!--  <a href=""><img src="client/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="client/images/product-details/similar3.jpg" alt=""></a> -->
										  @endforeach	
										</div>
									
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<!-- <img src="client/images/product-details/new.jpg" class="newarrival" alt="" /> -->
								<h2> Tên sản phẩm :{{ $product1->name }}</h2>
								
								<!-- <img src="images/product-details/rating.png" alt="" /> -->
								<span>
									<span style="color: red;font-weight: normal; font-size: 16px;">
									 Giá : <?= number_format($product1->price)." ". "VND"; ?>
									 	
									 </span>
									<button type="button" class="btn btn-warning cart">
										<i class="fa fa-shopping-cart "></i>
										   <a href="{{ url('themgiohang/'.$product1->id) }}" style="color:#444; " class="addcart">Giỏ Hàng</a>
									</button>
								</span>
								<p><b>Liên hệ :</b> 0986 325 854</p>
								<a href=""><img src="client/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div>
					<!--category-tab-->
					<div class="category-tab shop-details-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Sản phẩm liên quan</a></li>
								<!-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>  -->
								<li class="active"><a href="#reviews" data-toggle="tab">Mô tả</a></li>
							</ul>
						</div>
						<div class="tab-content">
						
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
								  
									<ul>
										<li>
										<i class="fa fa-calendar-o">     {{$product1->created_at}}</i>
										</li>
									</ul> 
									<p> {{ $product1->description }}.</p>

								  
									<div class="response-area">
										<h2 style="color:blue; ">3 Bình luận</h2>
										@foreach($comment as $item)	
										<ul class="media-list">
											<li class="media">
												<a class="pull-left" href="#">
													<img class="media-object" src="client/images/blog/man-one.jpg" alt="" width="121px" height="86px">
												</a>
												<div class="media-body">
													<ul class="sinlge-post-meta">
													    <li><i class="fa fa-user"></i>
                										 	{{ $item->user->name }}
														</li>
														<li><i class="fa fa-calendar"></i>
                										 	{{ $item->created_at }}
														</li>
													</ul>
													<p> {{ $item->content }}</p>
													<!-- <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a> -->
												</div>
											</li>
										</ul>
										@endforeach					
									</div>
									
								   <p><b>Bình Luận của bạn về sản phẩm</b></p>
									<form action="{{ url('binhluan/'.$product1->id) }}" method="post">
									    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
										<textarea name="content"  placeholder="Bình luận của bạn...."></textarea>
										<button type="submit" class="btn btn-success pull-right">
											Bình luận
										</button>
									</form>
									<br/><br/><br/><br/>
							 <div class="tab-pane fade" id="details" >
							 @foreach($product2 as $item)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
										  <div class="productinfo text-center">
										   <a href="{{ url('chitietsanpham/'.$item->id ) }}">
											<img src="uploads/product/{{$item->images}}" alt="" width="163px"
											height="143px" />
											</a>
											<h2 style="color: red;font-weight: normal;">
											<?= number_format($item->price)." "."VNĐ"; ?>
											</h2>
											<p style="color: #9F431E; font-weight: bold;font-size: 16px;">
											 {{ $item->name }}
											</p>
											<a href="{{ url('chitietsanpham/'.$item->id ) }}" class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-zoom-in"></i>Chi tiết</a>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
										  </div>
										</div>
									</div>
								</div>
							@endforeach	
							</div> 
					    </div>          
					</div>
			</div>				 
	 </div>
	 @include('client.partials.rmitem')
</div>

@endsection

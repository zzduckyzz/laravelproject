<div class="recommended_items">
						<h2 class="title text-center" style="border-bottom:1px solid #A44823;">Sản phẩm khuyên dùng</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" >
							<?php $i = 0; ?>
							  @foreach($rmitem as $item)
								<div  
								 @if($i==0)
								  class="item active" 
								 @else
								   class="item" 
								 @endif 
								>	
                                <?php $i++; ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
												   <a href="{{ url('chitietsanpham/'.$item->id) }}">
													<img src="uploads/product/{{$item->images}}" alt="" width="255px"  height="127px" />
												   </a>	
													<h2 style="color: red;font-weight: normal;">
											     	<?= number_format($item->price)." "."VNĐ"; ?>
													</h2>
													<p style="color: #9F431E; font-weight: bold;font-size: 16px;">
													 {{ $item->name }}
													</p>
													<a href="{{ url( 'chitietsanpham/'.$item->id ) }}" class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-zoom-in"></i>Chi tiết</a>
													<a href="{{ url('themgiohang/'.$item->id ) }}" class="btn btn-default add-to-cart addcart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
														</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
												   <a href="{{ url( 'chitietsanpham/'.$item->id ) }}">
													<img src="uploads/product/{{$item->images}}" alt="" width="255px"  height="127px" />
											       </a>		
													<h2 style="color: red;font-weight: normal;">
											     	<?= number_format($item->price)." "."VNĐ"; ?>
													</h2>
													<p style="color: #9F431E; font-weight: bold;font-size: 16px;">
													 {{ $item->name }}
													</p>
													<a href="{{ url( 'chitietsanpham/'.$item->id ) }}" class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-zoom-in"></i>Chi tiết</a>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
														</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
												
													<img src="uploads/product/{{$item->images}}" alt="" width="255px"  height="127px" />
													<h2 style="color: red;font-weight: normal;">
											     	<?= number_format($item->price)." "."VNĐ"; ?>
													</h2>
													<p style="color: #9F431E; font-weight: bold;font-size: 16px;">
													 {{ $item->name }}
													</p>
													<a href="{{ url( 'chitietsanpham/'.$item->id ) }}" class="btn btn-default add-to-cart"><i class="glyphicon glyphicon-zoom-in"></i>Chi tiết</a>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
														</div>
												
											</div>
										</div>
									</div>
								</div>
							  @endforeach		    
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
</div>
<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						<?php $i = 0; ?>
						@foreach($slide as $item)    
							<li data-target="#slider-carousel" data-slide-to="{{ $i }}" 
							  @if($i == 0)
							    class="active"
							>
							@endif	
							</li>
							<?php $i++ ;?>
					     @endforeach		
						</ol>
						
						<div class="carousel-inner">
						    <?php $i=0; ?>
						  @foreach($slide as $item)   
							<div 
							  @if($i==0)
							    class="item active" 
							  @else 
							     class="item" 
							  @endif  
							>
							 <?php $i++ ; ?>
						       <img src="uploads/slidershow/{{$item->image}}" alt="Chania" width="1140px" height="441px" class="girl img-responsive"/>
						        <div class="carousel-caption">
						             <h1><span>GO</span>MI</h1>
									<h2>Đề cao chất lượng sản phẩm</h2>
						          <p>Chúng tôi luôn lắng nghe để nắm bắt nhu cầu, sửa chữa yếu điểm nâng cao chất lượng, mẫu mã để luôn làm hài lòng Quý khách hàng .</p>
						        </div>
						     </div>
                           @endforeach				
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
			</div>
</div>
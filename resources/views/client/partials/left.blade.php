<div class="col-sm-3">
					<div class="left-sidebar">
						<!-- <h2 style="border-bottom:1px solid #A44823;">Menu</h2> -->
						<!--category-productsr-->
						<!-- <div class="panel-group category-products" id="accordian">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Danh mục
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
								@foreach($category as $item)
									<div class="panel-body">
										<ul>
											<li style="margin-left: 10px;">
											<a href="{{ url('danhmuc/'.$item->id ) }}">
											{{ $item->name }} 
											</a></li>
										</ul>
									</div>
							    @endforeach		
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Loại gỗ
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									@foreach($typewood as $type)
									<div class="panel-body">
										<ul>
											<li style="margin-left: 10px;">
											<a href="{{ url('loaigo/'.$type->id ) }}">
											{{ $type->name }}
											 </a>
											</li>
										</ul>
									</div>
							        @endforeach		
								</div>
							</div>	
						</div> -->
						<!--/category-products-->
					    <!--brands_products-->
						<div class="brands_products">
							<h2 style="border-bottom:1px solid #A44823; ">Tin Tức</h2>
							 @foreach($news as $item)
								<article class="home-article">
									<a href="{{ url('chitiettintuc/'.$item->id) }}"
									 class="opacity-hover home-article-thumb-50">
										<img src="uploads/news/{{$item->images}}"  width="50px" height="50px" />
									</a>
									<h2>
										<a href="{{ url('chitiettintuc/'.$item->id) }}" 
										>
										  {{ $item->title }}
										</a>
									</h2>
									<small>
										<span class="date">
											{{ $item->created_at }}
										</span>
									</small>
								</article>
						    @endforeach		
						</div>
						<!--/brands_products-->
						<!--price-range-->
						<div class="price-range">
							<h2 style="border-bottom:1px solid #A44823;" >Facebook</h2>
							<div class="well text-center">
								 <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="255px" height="217px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							</div>
						</div>
						<!--/price-range-->
						<!--shipping-->
						<?php  $currentPath = Route::getCurrentRoute()->getName(); ?>

                        @if(starts_with($currentPath, 'trangchu')) 
                            @include('client.partials.adv')
                        @else
                            
                        @endif	
					<!--/shipping-->
					
		  </div>
</div>

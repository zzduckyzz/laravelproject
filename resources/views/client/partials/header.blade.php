<!--header_top-->
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 966 419 464</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> duc.phamminh94@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->
		<!--header-middle-->
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ url('trangchu' ) }}"><img src="client/images/home/logo1.png" alt="" width="139" height="39" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">	
								<li>
									<a href="{{ url('giohang') }}">
									<i class="fa fa-shopping-cart"></i>
									  Giỏ hàng 
									   <span class="badge">
									      <?php  echo Cart::content()->count(); ?>
									   </span>
									</a>
								</li>
                               @if(Auth::user() )
                                <li><a href="{{ url('hoadon/'.Auth::user()->id) }}"><i class="fa fa-crosshairs"></i>Xem hóa đơn</a>
                                <li><a href="{{ url('nguoidung') }}"><i class="fa fa-user"></i> 
                                  {{Auth::user()->name}}
                                </a></li>
								<li><a href="{{ url('dangxuat') }}"><i class="glyphicon glyphicon-plus-sign"></i>Đăng xuất</a></li>
                               @else
                                <li><a href="{{ url('dangnhap') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								<li><a href="{{ url('dangky') }}"><i class="glyphicon glyphicon-plus-sign"></i> Đăng ký</a></li>
                               @endif
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-middle-->
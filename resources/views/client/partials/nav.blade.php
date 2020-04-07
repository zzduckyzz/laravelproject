<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ url('trangchu') }}" >Trang chủ</a></li>
								<li><a href="javascript:;">Giới thiệu</a></li>
								<li class="dropdown"><a href="javascript:;">Danh mục<i class=""></i></a>
								
                                    <ul role="menu" class="sub-menu">
                                    @foreach($category as $item)
                                        <li><a href="{{ url('danhmuc/'.$item->id ) }}"> {{ $item->name }}</a></li>	
                                    @endforeach      
                                    </ul>
                                  
                                </li> 
								<li class="dropdown"><a href="javascript:;">Loại gỗ<i class=""></i></a>
                                    <ul role="menu" class="sub-menu">
                                     @foreach($typewood as $item)
                                     <li><a href="{{ url('loaigo/'.$item->id ) }}"> {{ $item->name }}</a></li>	
                                     @endforeach   
                                    </ul>
                                </li> 
								<li><a href="{{ url('tintuc') }}">Tin tức</a></li>
								<li><a href="{{ url('lienhe') }}">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class=" pull-right">
						<form action="trangchu" method="get">
							<input type="text"  name="keyword" value="{{$keyword}}" placeholder="Tìm kiếm..."/>
							<button type="submit"><i class="glyphicon glyphicon-search"></i> </button>
					   </form>		
						</div>	
					</div>
				</div>
			</div>
		</div>
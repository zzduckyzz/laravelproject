@extends('client.layouts.home')
@section('title')
 <title>Đăng Nhập | GO Mi</title>
@endsection
@section('content')
<h2 class="title text-center" style="border-bottom:1px solid #A44823;">Đăng nhập</h2>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-7 col-sm-offset-1">
				<!--login form-->
				 @include('../partials/alert')
					<div class="login-form">
						<h2>Đăng nhập tài khoản của bạn</h2>
						<form action="dangnhap" method="post">
							 <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label></label>
                                            <input type="text" class="form-control" placeholder="Email " name="email">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label></label>
                                            <input type="password" class="form-control" placeholder="  Mật khẩu" name="password">
                                        </div>
                             <button type="submit" class="btn btn-primary">Đăng Nhập</button>
						</form>


					</div>
					<!--/login form-->
				</div>
			  </div>
			</div>
		</div>
	</section>
@endsection	

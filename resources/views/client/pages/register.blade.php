@extends('client.layouts.home')
@section('title')
 <title>Đăng Ký | GO Mi</title>
@endsection
@section('content')
<h2 class="title text-center">Đăng ký</h2>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-7 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Hãy đăng ký là thành viên để có thể nhận ưu đãi và thông tin về những sản phẩm mới nhất từ chúng tôi.</h2>
						<form action="dangky" method="post">
							<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                       <div class="form-group">
                                            <label>Họ và Tên * </label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập Họ và Tên...." >
                                        </div>
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="text" class="form-control" name="email" placeholder="Nhập Email...">
                                        </div>
                                        <div class="form-group">
                                            <label>Mật Khẩu *</label>
                                            <input type="password" class="form-control" name="password" placeholder="Nhập Mật Khẩu">
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập Lại Mật Khẩu *</label>
                                      
				                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Nhập lại Mật Khẩu .. .">				   
				                        </div>
				                        <div class="form-group">
                                            <label>Số điện thoại * </label>
                                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại...." >
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ * </label>
                                            <input type="text" class="form-control" name="address" placeholder="Đia chỉ...." >
                                        </div> 
								       <div class="form-group">
                                            <label>Ngày sinh * </label>
                                            <input type="date" class="form-control" name="birthday" placeholder="Nhập Ngày sinh...." >
                                        </div>  
                                         <div class="form-group">
								        <label class="control-label col-md-3">Giới tính &nbsp;&nbsp;&nbsp;&nbsp;</label>
								        <div class="col-md-4">
								            <div class="checkbox-list margin-top-10">
								                <label>
								                    {!!
								                      Form::select('gender',
								                       [
								                         '0' => 'Nữ',
								                         '1' => 'Nam', 
								                         '2' =>  'Khác',
								                       ]);
								                     !!}
                                                
								                </label>
								            </div>
								        </div>            
                                         <div class="form-group">
                                                <label for="level" class="col-md-4 control-label"></label>
                                              <label class="radio-inline">
                                               <input  hidden="" type="radio" name="level" value="1" 
                                                 > 
                                           </label>
                                            <label class="radio-inline">
                                            <input type="radio" name="level" value="0" 
                                           
                                                  checked="" readonly="" hidden=""> 
                                           </label> 
                                           </div>
                                        
                                <button type="submit" class="btn btn-info">Đăng Ký</button>
						</form>
					</div><!--/login form-->
				</div>
				</div>
			</div>
		</div>
	</section>
@endsection	

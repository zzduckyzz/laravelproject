@extends('client.layouts.home')
@section('title')
 <title>Thông tin tài khoản  | GO Mi</title>
@endsection
@section('content')
<h2 class="title text-center">Thông tin người dùng </h2>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-7 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Thông tin người dùng.</h2>
                        @include('../partials/alert')
						<form action="" method="post">
							<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                       <div class="form-group">
                                            <label>Họ và Tên  </label>
                                            <input type="text" class="form-control" name="name"  value="{{ Auth::user()->name }}" >
                                        </div>
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input type="text" class="form-control" name="email" 
                                            value="{{ Auth::user()->email }}" readonly="true">
                                        </div>
                                        <div class="form-group">  
                                            <label> 
                                            <input type="checkbox" class="checkbox" name="checkpassword" id="changePassword" /> 
                                            Đổi Mật Khẩu 
                                            </label>
                                            <input type="password" class="form-control password" name="password"  id="pass" placeholder="" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập Lại Mật Khẩu </label>
                                      
				                                <input id="password-confirm" type="password" class="form-control password" name="password_confirmation"  placeholder="" disabled>				   
				                        </div>
				                        <div class="form-group">
                                            <label>Số điện thoại  </label>
                                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ </label>
                                            <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}" >
                                        </div> 
								       <div class="form-group">
                                            <label>Ngày sinh  </label>
                                            <input type="date" class="form-control" name="birthday" value="{{Auth::user()->birthday}}" >
                                        </div>  
                                         <div class="form-group">
								        <label class="control-label col-md-3">Giới tính &nbsp;&nbsp;&nbsp;&nbsp;</label>
								        <div class="col-md-4">
								            <div class="checkbox-list margin-top-10">
								                <label >
                                                 <!--  @if(Auth::user()->gender==0)
								                    {{'Nữ' }}
                                                  @elseif(Auth::user()->gender==1)
                                                     {{'Nam'}}
                                                  @else 
                                                     {{'Khác'}}   
                                                  @endif -->
                                                  <select name="gender">
                                                          <option value="0"
                                                           @if(Auth::user()->gender==0)
                                                                 {{'selected'}}  
                                                              @endif>
                                                              Nữ
                                                           </option>
                                                           <option value="1"
                                                              @if(Auth::user()->gender==1)
                                                                     {{'selected'}}   
                                                                  @endif >
                                                                  Nam
                                                           </option>
                                                           <option value="2" @if(Auth::user()->gender!=0 && Auth::user()->gender!=1)
                                                                 {{'selected'}}   
                                                              @endif>
                                                              Khác
                                                           </option>
                                                  </select>
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
                               <button type="submit" class="btn btn-info">
                                  Sửa thông tin
                               </button>
						</form>
                          
					</div><!--/login form-->
				</div>
				</div>
			</div>
		</div>
	</section>
@endsection	

@section('js')
  <script type="text/javascript">
      $(document).ready(function(){
          $("#changePassword").change(function(){
              if($(this).is(":checked")){
                   $(".password").removeAttr('disabled');
                   $("#pass").focus();
              }
              else {
                   $(".password").attr('disabled', '');
              }
          });
      });
  </script>
@endsection

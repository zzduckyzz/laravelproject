@extends('client.layouts.home')
@section('title')
  <title>Liên hệ | Go Mi</title>
@endsection
@section('content')
 
 <div class="bg">
	    	<div class="row">    		
	    		<!-- <div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>	 -->		 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center" style="border-bottom:1px solid #A44823;">Liên hệ</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
	    				@include('../partials/alert')
				    	<form id="main-contact-form" action="{{ url('lienhe') }}" class="contact-form row" name="contact-form" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Họ tên">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="phone_number" class="form-control" required="required" placeholder="Số điện thoại">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="address" class="form-control" required="required" placeholder="Địa chỉ">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="content" id="message" required="required" class="form-control" rows="8" placeholder="Nội dung liên hệ"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gửi">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center" style="border-bottom:1px solid #A44823;">Địa chỉ liên hệ</h2>
	    				<address>
	    					<p></p>
							<p>Xóm 2 - Ân Phú - phú Lâm - Tiên Du - Bắc Ninh</p>
							<p>Mobile: +2 95 01 25 8821</p>
							<p>Email: info@domain.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center" style="border-bottom:1px solid #A44823;">Mạng Xã Hội</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>
   		
@endsection
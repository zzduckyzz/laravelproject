<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.partials.metadata')
</head><!--/head-->
<body>
<!--header-->
	<header id="header">
	    <!--header_top-->
		@include('client.partials.header')
		<!--/header-middle-->
	    <!--header-bottom-->
		@include('client.partials.nav')
		<!--/header-bottom-->
	</header>
	<!--/header-->
	<!--slider-->
	<?php  $currentPath = Route::getCurrentRoute()->getName(); ?>

    @if(starts_with($currentPath, 'trangchu')) 
        <section id="slider">
		@include('client.partials.slider')
	    </section>
    @else
        
    @endif
	
	<!--/slider-->
	<section>
		<div class="container">
			<div class="row">
				@include('client.partials.left')
				
				<div class="col-sm-9 padding-right">
				<!--features_items-->
					@yield('content')
					<!--features_items-->
					<!--recommended_items-->
					
					<!--/recommended_items-->		
				</div>
			</div>
		</div>
	</section>
	<!--Footer-->
	@include('client.partials.footer')
	<!--/Footer-->
   @include('client.partials.js_lib')
</body>
</html>
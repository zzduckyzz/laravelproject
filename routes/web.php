<?php
     Auth::routes();
     Route::auth();
     Route::get('admin/login',  'Admin\UserController@getLogin');
     Route::post('admin/login', 'Admin\UserController@postLogin');
     Route::get('admin/logout', 'Admin\UserController@getLogout');

     Route::group(['prefix'=>'admin', 'middleware'=>'adminlogin'], function(){
	Route::get('/', 'Admin\OrderController@Dashboard');
     Route::get('block/{id}', 'Admin\UserController@block');
     Route::get('open/{id}', 'Admin\UserController@open');
     Route::resource('user', 'Admin\UserController');
     Route::resource('category', 'Admin\CategoryController');
     Route::resource('typewood', 'Admin\TypewoodController');
     Route::resource('product', 'Admin\ProductController');
     Route::resource('image', 'Admin\ImageController');
     Route::resource('contact', 'Admin\ContactController');
     Route::resource('new', 'Admin\NewController');
     Route::resource('slide', 'Admin\SlideController');
     Route::resource('customer', 'Admin\CustomerController');
     Route::resource('order', 'Admin\OrderController');
    });
  // Client 
     Route::get('trangchu', 'Client\ClientController@home')->name('trangchu');;
     Route::get('danhmuc/{id}', 'Client\ClientController@category');
     Route::get('loaigo/{id}', 'Client\ClientController@typewood');
     Route::get('chitietsanpham/{id}', 'Client\ClientController@productdetail');
     Route::get('tintuc', 'Client\ClientController@news');
     Route::get('chitiettintuc/{id}', 'Client\ClientController@detailnew');
     Route::get('lienhe', 'Client\ClientController@getcontact');
     Route::post('lienhe', 'Client\ClientController@postcontact');
     Route::get('dangnhap', 'Client\ClientController@getlogin');
     Route::post('dangnhap', 'Client\ClientController@postlogin');
     Route::get('dangxuat', 'Client\ClientController@getlogout');
     Route::get('dangky', 'Client\ClientController@getregister');
     Route::post('dangky', 'Client\ClientController@postregister');
     Route::get('nguoidung', 'Client\ClientController@getuser');
     Route::post('nguoidung', 'Client\ClientController@postuser');
     Route::post('binhluan/{id}', 'Admin\CommentController@postcomment');

     Route::get('themgiohang/{id}', 'Client\CartController@addcart');
     Route::get('giohang', 'Client\CartController@cart');
     Route::get('xoagiohang/{id}', 'Client\CartController@deletecart');
     Route::get('huygiohang', 'Client\CartController@destroycart');
     Route::patch('capnhat/{id}', 'Client\CartController@updatecart');

     Route::get('dathang', 'Client\ClientController@getorder');
     Route::post('dathang', 'Client\ClientController@postorder');
     Route::get('hoadon/{id}', 'Client\ClientController@check');
     Route::get('chitiethoadon/{id}', 'Client\ClientController@checkout');

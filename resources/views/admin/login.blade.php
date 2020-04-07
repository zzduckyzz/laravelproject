@extends('layouts.login')
@section('title')
   <title>Đăng nhập admin</title>
@endsection
@section('css')
    @include('partials.css_of_form')
@endsection

@section('content')
    @include('partials.alert')
   <form class="login-form" action="{{ url('admin/login') }}" method="post" role="form">
     <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="form-group">
         <h3 class="form-title font-green">Đăng nhập</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> nhập tên tài khoản và mật khẩu. </span>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật khẩu" name="password" /> </div>
            <div class="form-actions">
                <button type="submit" class="btn green uppercase">Đăng nhập</button>
                <label class="rememberme check">
                    <input type="checkbox" name="remember" value="1" />Nhớ mật khẩu </label>
                <a href="javascript:;" id="forget-password" class="forget-password">Quên mật khẩu?</a>
            </div>
  </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
   <form class="forget-form" action="index.html" method="post">
                <h3 class="font-green">Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn btn-default">Back</button>
                    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
            </form>
@endsection
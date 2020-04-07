<div class="form-body">
    @include('partials.alert')
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;
         Bạn có một số lỗi. Làm ơn kiểm tra trước khi thực hiện.
    </div>
    <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;
        Kiểm tra dữ liệu hợp lệ !
    </div>
    <div class="form-group {{ $errors->has('fullname') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Họ tên<span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('fullname', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('fullname', '<span id="fullname-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
     <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label class="col-md-3 control-label">Email<span class="required"> * </span></label>
        <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'data-required' => '1']) !!}
                {!! $errors->first('email', '<span id="email-error" class="help-block help-block-error">:message</span>') !!}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Số điện thoại <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('phone_number', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('phone_number', '<span id="phone_number-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
     <div class="form-group">
        <label class="control-label col-md-3">Giới tính &nbsp;&nbsp;&nbsp;&nbsp;
        <span class="required"> * </span>
        </label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                  {!! Form::select('gender',
                   ['0' => 'Nữ ', 
                    '1' => 'Nam' ,
                    '2' => 'Khác'
                   ]) 
                   !!}
                </label>
            </div>
        </div>
    </div>
     <div class="form-group {{ $errors->has('birthday') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Ngày sinh <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('birthday', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('birthday', '<span id="birthday-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
     <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Địa chỉ <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('address', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('address', '<span id="address-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
            <a href="{{ url('admin/new') }}" class="btn default">Thoát</a>
        </div>
    </div>
</div>

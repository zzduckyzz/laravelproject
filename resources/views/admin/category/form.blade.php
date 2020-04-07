<div class="form-body">
    @include('partials.alert')
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;
       Bạn có một số lỗi. Làm ơn kiểm tra trước khi thực hiện
    </div>
    <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;
        Kiểm tra dữ liệu hợp lệ !
    </div>
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Tên danh mục <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('name', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('name', '<span id="name-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
            <a href="{{ url('admin/category') }}" class="btn default">Thoát</a>
        </div>
    </div>
</div>
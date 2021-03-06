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
    
    <div class="form-group">
        <label class="control-label col-md-3">Status &nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!!
                      Form::select('status',
                       [
                         '1' => 'Đã phản hồi',
                         '0' => 'Chưa phản hồi'   
                       ]);
                     !!}
                </label>
            </div>
        </div>
    </div> 
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
            <a href="{{ url('admin/contact') }}" class="btn default">Thoát</a>
        </div>
    </div>
</div>

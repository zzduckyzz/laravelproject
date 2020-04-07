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
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Tiêu đề <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('title', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('title', '<span id="title-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Mô tả<span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::textarea('description', null, ['class' => 'form-control ckeditor ']) !!}
            {!! $errors->first('description', '<span id="description-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Nội dung<span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::textarea('content', null, ['class' => 'form-control ckeditor ']) !!}
            {!! $errors->first('content', '<span id="content-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Hình ảnh<span class="required"> * </span></label>
        <div class="col-md-4">
           @if( isset($new) )
            <p>
               <img src="{{ url('uploads/news/'.$new->images) }}" width="50"/> 
            </p>
           @endif
             
            {!! Form::file('images', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('images', '<span id="images-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
   
    <div class="form-group">
        <label class="control-label col-md-3">Nổi bật &nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!!
                      Form::select('hot_news',
                       [
                         '0' => 'Không',
                         '1' => 'Có ',
                         
                       ]);
                     !!}
                </label>
            </div>
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="control-label col-md-3">Nổi bật &nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!! Form::checkbox('hot', '1',
                     false, 
                    ['class' => 'margin-top-10']) !!}
                </label>
            </div>
        </div>
    </div> -->
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
            <a href="{{ url('admin/new') }}" class="btn default">Thoát</a>
        </div>
    </div>
</div>

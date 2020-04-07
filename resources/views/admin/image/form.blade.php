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
    <div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Hình ảnh<span class="required"> * </span></label>
        <div class="col-md-4">
           @if( isset($image) )
            <p>
               <img src="{{ url('uploads/product/'.$image->images) }}" width="50"/> 
            </p>
           @endif
             
            {!! Form::file('images', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('images', '<span id="images-error" class="help-block help-block-error">:message</span>') !!}
        </div>
   </div>
      <div class="form-group {{ $errors->has('product') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Sản phẩm <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::select('product', $product) !!}
            {!! $errors->first('product', '<span id="product-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div> 
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
            <a href="{{ url('admin/image') }}" class="btn default">Thoát</a>
        </div>
    </div>
</div>

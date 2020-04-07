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
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Sản phẩm <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('name', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('name', '<span id="name-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Category <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::select('category', $category) !!}
            {!! $errors->first('category', '<span id="category-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
     <div class="form-group {{ $errors->has('typewood') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">loại gỗ <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::select('typewood' , $typewood ) !!}
            {!! $errors->first('category', '<span id="typewood-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Giá <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('price', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('title', '<span id="price-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Hình ảnh<span class="required"> * </span></label>
        <div class="col-md-4">
           @if( isset($product) )
            <p>
               <img src="{{ url('uploads/product/'.$product->images) }}" width="50"/> 
            </p>
           @endif
             
            {!! Form::file('images', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('images', '<span id="images-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Mô tả<span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::textarea('description', null, ['class' => 'form-control ckeditor ']) !!}
            {!! $errors->first('description', '<span id="description-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
     
    <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Số lượng<span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('quantity', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('quantity', '<span id="quantity-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
     <div class="form-group">
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
    </div>
    <!-- <div class="form-group">
        <label class="control-label col-md-3">Status &nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!!
                      Form::select('status',
                       [
                         '1' => 'Waiting',
                         '0' => 'Openning', 
                         '2' =>  'bloked',
                         '3' =>  'ended'
                       ]);
                     !!}
                </label>
            </div>
        </div>
    </div> -->
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
            <a href="{{ url('admin/product') }}" class="btn default">Thoát</a>
        </div>
    </div>
</div>

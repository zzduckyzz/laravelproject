<div> 
    <span style="color: red;">Mã :</span>  
   <label style="color: green">{{ $product->id }}</label>
</div>
<div> 
    <span style="color: red;">Danh mục :</span>  
   <label style="color: green">{{ $product->category->name }}</label>
</div>
<div> 
    <span style="color: red;">Loại gỗ :</span>  
   <label style="color: green">{{ $product->typewood->name }}</label>
</div>
<div> 
    <span style="color: red;">Giá :</span>  
   <label style="color: green">
    <?= number_format( $product->price)?>
   
   </label>
</div>

<div> <span style="color: red;">Hình ảnh :</span>  
  <img src="{{ url('uploads/product/'.$product->images ) }}" width="50px"> 
</div>
<div> 
    <span style="color: red;">Mô tả :</span>  
    <label style="color: green">{{ $product->description }}</label>
</div>
<div> 
    <span style="color: red;">Số lượng :</span>  
    <label style="color: green">{{ $product->quantity }}</label>
</div>
<div> 
    <span style="color: red;">Nổi bật :</span>  
    @if($product->hot_product==1)
       <label style="color: green"> {{ 'Có' }}</label>
    @else 
       <label style="color: #000"> {{ 'Không' }}</label>
    @endif
</div>

@if( isset($comment->content) )
    <div> 
      <span style="color: red;">Bình luận :</span> <br/>  
      <label style="color: blue;">Tên người dùng  : 
            {{$comment->user->name }}
      </label>
      <br/>
      <label style="color: green">{{$comment->content }}</label>
    </div>
  @else 
    <div> 
    <span style="color: red;">Không có bình luận cho sản phẩm này !!</span> <br/>  
    </div>
  @endif


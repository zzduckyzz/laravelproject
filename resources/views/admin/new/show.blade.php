<div> 
    <span style="color: red;">Mã :</span>  
   <label style="color: green">{{ $new->id }}</label>
</div>
<div> 
    <span style="color: red;">Tiêu đề :</span>  
   <label style="color: green">{{ $new->title }}</label>
</div>
<div> 
    <span style="color: red;">Mô tả :</span>  
   <label style="color: green">{{ $new->description }}</label>
</div>
<div> 
    <span style="color: red;">Nội dung:</span>  
    <label style="color: green">{{ $new->content }}</label>
</div>
<div> <span style="color: red;">Hình ảnh :</span>  
  <img src="{{ url('uploads/news/'.$new->images ) }}" width="50px"> 
</div>
<div> 
    <span style="color: red;">Nổi bật :</span>  
    @if($new->hot_news==1)
       <label style="color: green"> {{ 'Có' }}</label>
    @else 
       <label style="color: #000"> {{ 'Không' }}</label>
    @endif
</div>




@extends('client.layouts.home')
@section('title')
  <title>Tin tức | Go mi</title>
@endsection
@section('content')
<div class="blog-post-area">
						<h2 class="title text-center">Danh sách tin tức</h2>
						
				    @foreach($new as $item)			
						<div class="single-blog-post">
							<h3>{{ $item->title }}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-calendar"></i> {{ $item->created_at }}</li>
								</ul>
								
							</div>
							<a href="{{ url('chitiettintuc/'.$item->id) }}">
								<img src="uploads/news/{{$item->images}}" alt="" width="847px" height="388px">
							</a>
							<p>{!! $item->description !!}.</p>
							<a  class="btn btn-primary" href="{{ url('chitiettintuc/'.$item->id) }}">
						     	Xem thêm
							</a>
						</div>
				    @endforeach		
						<div class="pagination-area">
							<ul class="pagination">
								{!! $new->links() !!}
							</ul>
						</div>
</div>
@endsection

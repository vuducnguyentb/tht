@section('after_css')
    <link rel="stylesheet" href="{{asset_theme ('css/homeindex.css')}}" type="text/css"/>
@endsection
<section id="blog" class="gray-bg fadeIn ptb ptb-sm-80">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-4">
					<a href="{{route('post')}}"><h2 id="post">Tin tức & sự kiện</h2></a>
			</div>
			<div class="col-sm-6 col-sm-8 mb-30">
				<p class="lead">
					{!!strip_tags(\App\Helpers\Base::getSetting('intro-post-home'))!!}
				</p>
			</div>
		</div>
		<div class="row text-center">
			@foreach ($posts as $item)
				<div class="col-sm-4 mb-xs-30">
					<div class="blog-post">
						<div class="post-media">
								<a href="{{route('posts.detail', ['slug' => $item->slug])}}">
										@if( !empty($item->image))
										<img class="item-container" src="{{ $item->image ??''  }}" alt="" />
										@else
										<img class="item-container" src="{{App\Helpers\Theme::assetsPath('img/full/21.jpg')}}" alt="" />
										@endif
								</a>
						</div>
						<div class="post-meta">
							<span><span class="text-black">{{$item['author']->name ?? ''}}</span>,</span><span> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span>
						</div>
						<div class="post-header">
							<h4 id="tit" ><a style="color:black" href="{{route('posts.detail', ['slug' => $item->slug])}}">
									{!! Str::words($item->title, 19,' ...')  !!}
							</a></h4>
							
						</div>
					</div>
				</div>
			@endforeach

		</div>
		<div class="row text-center">
			<div class="col-xs-12">
			<a class="btn btn-md btn-black mt-30" href="{{route('post')}}">Xem thêm</a>
			</div>
		</div>
	</div>
</section>
<!-- End Blog Section -->
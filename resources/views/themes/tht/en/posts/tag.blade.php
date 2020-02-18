	@extends('themes.tht.layouts.main')
	@section('seo_support')
    <title>{{get_site_setting('posts-tag-title') }}</title>
    <meta name="description" content="{{get_site_setting('posts-tag-description-en') }}">
    <meta name="keywords" content="{{get_site_setting('posts-tag-keywords-en') }}">
@endsection
	@section('after_css')
	<link href="{{asset_theme ('css/post/list.css')}}" rel="stylesheet" type="text/css" />
	@endsection
	@section('content')
	<section class="inner-intro bg-img17 overlay-dark light-color parallax parallax-background2">
			<div class="container">
				<div class="row title">
					<h2 class="h2">Tin Tức</h2>
					<div class="page-breadcrumb">
					<a href="{{route('homeEn')}}">Trang chủ</a>/<a>Tin tức</a><span>
					</div>
				</div>
			</div>
		</section>
					<div class="clearfix"></div>
					<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:0px; top:100px;">
						<a href="https://www.facebook.com/" class="a2a_button_facebook"></a>
						<a class="a2a_button_twitter"></a>
						<a class="a2a_button_pinterest"></a>
						<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
					</div>
					<section class="ptb ptb-sm-80">
						<div class="container">
						   <!-- Post Item -->
							<div class="row container-masonry">
								@if($count>0)
								<p>Tìm thấy {{$count}} kết quả phù hợp với <i><b>{{$name["en"]}}</b></i> </p>
								@else
								<p>Không tìm thấy kết quả nào với  <i><b>{{$name["en"]}}</b></i></p>
								@endif

								@foreach ($tag_post as $item)
									<div class="col-md-4 col-sm-6 col-xs-12 nf-item spacing-grid">
										<div class="blog-post">
											<div class="post-media">
											   <a href="{{route('posts.detailEn', ['slug' => $item->slug])}}">
												@if(!empty( $item->image ))
														<img class="item-container" src="{{$item->image}}" alt="1" />

												@else
												<img class="item-container" src="" alt="1" />
												@endif
												<a href="{{route('posts.detailEn', ['slug' => $item->slug])}}">
											</div>
											<div class="post-meta"><span>by <a>{{$item['author']->name ?? ''}}</a>,</span> <span> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span></div>
											<div class="post-header">
												<h5><a href="{{route('posts.detailEn', ['slug' => $item->slug])}}">{{ $item->title}}</a></h5>
											</div>
											<div class="post-entry">
											<p>{{ $item->excerpt}}</p>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</section>
					<div class="pagination-nav mt-60 mt-xs-30">
							<div>{{$tag_post->links()}}</div>
					</div>
					@include('themes.tht.sections.partner')
	@endsection
	@section('after_js')
	<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
	@endsection

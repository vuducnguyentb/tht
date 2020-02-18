
@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{$product->name}}</title>
    @if($product->meta_description != null)
    <meta name="description" content="{{$product->meta_description}}">
    @endif
    @if($product->excerpt !=null)
    <meta name="description" content="{{$product->excerpt}}">
    @endif
    <meta name="description" content="{{Str::words($product->body,25,'...')}}">
    <meta name="keywords" content="{{$product->meta_keywords}}">
    @if($productImageFist == null )
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @else
        <meta property="og:image" content="{{route('posts.detailEn',$productImageFist->image)}}">
    @endif
    <meta property="og:url" content="{{route('products.detailEn',$product->slug)}}">

    <meta property="og:title" content="{{$product->name}}">
    @if($product->meta_description != null)
        <meta property="og:description" content="{{$product->meta_description}}">
    @endif
    <meta name="twitter:title" content="{{$product->name}}">
    @if($product->meta_description != null)
        <meta name="twitter:description" content="{{$product->meta_description}}">
    @endif
    @if($productImageFist == null )
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @else
        <meta property="twitter:image" content="{{route('posts.detailEn',$productImageFist->image)}}">
    @endif

    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('after_css')
<link href="{{asset_theme ('css/product/detail.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset_theme ('css/plugin/smoothproducts.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
			<!-- Intro Section -->
			<section class="inner-intro bg-img19 overlay-dark light-color parallax parallax-background2">
				<div class="container">
					<div class="row title">
                        <h2 class="h2">{{__('Product')}}</h2>
                        <div class="page-breadcrumb">
                            <a href="{{route('homeEn')}}">{{__('Home')}}</a>/ {{__('Product')}}
                        </div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- End Intro Section -->
			<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:0px; top:100px;">
				<a href="https://www.facebook.com/" class="a2a_button_facebook"></a>
				<a class="a2a_button_twitter"></a>
				<a class="a2a_button_pinterest"></a>
				<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
			</div>
			<!-- Shop Item Detail Section -->
			<section id="shop-item" class="ptb ptb-sm-80">
				<div class="container product">
					<div class=" prn row sli">
						<div class="col-sm-3 slid col-md-3 col-xs-12" >
							<h3 id="cate">{{__("Product's category")}}</h3>
						</div>
						<div class="col-sm-9 bread">
							<nav aria-label="breadcrumb" style="font-size: 16px;">
								<ol class="breadcrumb">
									<li class="breadcrumb-item">{{$cate_with_type->name}}</li>
									<li class="breadcrumb-item"><a href="/type-product/{{$type->slug}}">{{$type->name}}</a></li>
									<li class="breadcrumb-item " >{{$product->name}}</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="row mrt">
						<!-- Left Sidebar -->
						<div class="col-xs-12 col-sm-3 col-md-3">
								<div class="prn accordion">
									@foreach ($cate as $item)
                                    @if($item->slug === $cate_with_type->slug)
                                            <div class="accordion-section">
											<h5 href="#{{$item->id}}" class="accordion-title active">{{ $item->name}}</h5>
											<div class="accordion-content defualt-hidden">
                                            @foreach ($item->producttypes as $type2)
                                                @if($type2->name === $typename)
												<p ><a href="/type-product/{{$type2->slug}}" class="active" >{{$type2->name}}</a></p>
                                                    @else
                                                        <p ><a href="/type-product/{{$type2->slug}}">{{$type2->name}}</a></p>
                                                    @endif
                                            @endforeach
											</div>
										</div>
                                            @else
                                            <div class="accordion-section">
                                                <h5 href="#{{$item->id}}" class="accordion-title">{{ $item->name}}</h5>
                                                <div class="accordion-content">
                                                    @foreach ($item->producttypes as $type)
                                                        <p id="{{$item->id}}"><a href="/type-product/{{$type->slug}}">{{$type->name}}</a></p>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
									@endforeach
								</div>
								<div id="new-pr" class="prn sidebar-widget">
										<h3 id="cate2">{{__('New product')}}</h3>

										<ul class="col-xs-12 widget-post">
                                            @if(count($product_news) > 0)
                                            @foreach ($product_news as $item)
												<li>
													<a href="/product/{{$item->slug}}" class="widget-post-media">
														@if(empty($item['images']->first()['image']))
														<img src="{{asset_theme ('img/noproduct.png')}}" alt="">
														@else
														 <img src="{{$item['images']->first()['image'] ??''}}" alt="" />
														 @endif
													</a>

													<div class="widget-post-info">
													<a href="/product/{{$item->slug}}"> <h6>{{$item->name}} </h6></a>
													</div>
												</li>
											@endforeach
                                                @endif
										</ul>
									</div>
							</div>

                            <div class="col-sm-5 mb-sm-60">
                                <div class="product-img-first text-center">
                                    @if(count($productImages) > 0)
                                    <img src="{{$productImageFist->image}}"
                                         onerror="this.src='{{App\Helpers\Theme::assetsPath('img/noproduct.png')}}'" alt=""/>
                                       @else
                                        <img src="{{App\Helpers\Theme::assetsPath('img/noproduct.png')}}" alt=""/>
                                        @endif
                                </div>
                                <div class="owl-carousel client-carousel nf-carousel-theme ">
                                    @if(count($productImages) > 0)
                                    @foreach($productImages as $item)
                                        <div class="item">
                                            <div class="client-logo">
                                                    <img src="{{$item->image}}" data-toggle="modal" data-target="#product{{$item->id}}"
                                                         onerror="this.src='{{App\Helpers\Theme::assetsPath('img/noproduct.png')}}' " alt=""/>
                                            </div>
                                        </div>
                                    @endforeach
                                        @endif
                                </div>
                            </div>
                        <!-- Modal -->
                        @if(count($productImages) > 0)
                        @foreach($productImages as $item)
                        <div id="product{{$item->id}}" class="modal fade img-modal-product" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <section class="">
                                                <div class="owl-carousel item1-carousel nf-carousel-theme o-flow-hidden">
                                                    <div class="item text-center">
                                                        <img  src="{{$item->image}}" alt="" />
                                                    </div>
                                                    @foreach($productImages as $item)
                                                    <div class="item text-center">
                                                        <img  src="{{$item->image}}" alt="" />
                                                    </div>
                                                        @endforeach
                                                </div>

                                        </section>

                                    </div>
{{--                                    <div class="modal-footer">--}}
{{--                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                                    </div>--}}
                                </div>

                            </div>
                        </div>
                        @endforeach
                        @endif
						<div class="col-sm-4">
							<div class="shop-detail-info">
							<h3 style="color:#1370a9">{{$product->name}}</h3>
								<p class="ptb-15">
									{{$product->excerpt}}
								</p>
									<h4 style="color:darkred;font-weight:bold">Hotline : {!!strip_tags(\App\Helpers\Base::getSetting('phone'))!!}</h4>

							</div>
						</div>
						<div class="col-sm-9">
							<div class="row">
										<div class="tabs b-lrb-none">
											<ul>
												<li><a href="#tabs-01"><i class="ion ion-help-circled left"></i>{{__('Product description')}}</a></li>
												<li><a href="#tabs-02"><i class="ion ion-help-buoy left"></i>{{__('Product info')}}</a></li>
												<li><a href="#tabs-03"><i class="ion ion-ios-list left"></i>{{__('Product catalog')}}</a></li>
											</ul>
											<div class="ui-tab-content">
												<div id="tabs-01" class="plr-0">
													<p>{!! $product->body !!}</p>
												</div>
												<div id="tabs-02" class="plr-0">
												<p>{!! $product->description !!}</p>
												</div>
												<div id="tabs-03" class="plr-0">
													<div style="padding: 15px 12px;
													font-size: 15px;
													line-height: 1.5;">
														<table border="0" style="line-height:1.5;width:100%">
															@if(count($catalogs) >0)
																<tbody>
																	<tr style="padding-bottom:5px;font-size:18px">
																		<td style="line-height:1.5;">{{__("Product's name")}}</td>
																		<td style="line-height:1.5;">{{__('Dowload product')}}</td>
																	</tr>
																	@foreach ($catalogs as $item)
																	<tr>
																		<td style="line-height:1.5;">{{__('Product tutorial')}}</td>
																		<td style="line-height:1.5;">
																		<a href="{{$item->catalog}}" target="_blank">
																			<img src="{{App\Helpers\Theme::assetsPath('img/icon-download.png')}}" alt="">
																		</a>
																		</td>
																		</tr>
																	@endforeach

																</tbody>
																@else
																		<div class="alert alert-info">
																				<strong>{{__('Notification !')}} </strong> {{__('Documents for this product are currently being updated.')}}
																		</div>
																@endif
															</table>
												</div>
												</div>
											</div>
										</div>
								</div>
								<br/>
								<div class=" spm row sli">
										<div class="col-sm-3 slid col-md-3 col-xs-12" >
											<h3 id="cate">{{__('Category !')}}</h3>
										</div>
									</div>
									<div class=" spm row ">
										<div class="accordion">
											@foreach ($cate as $item)
												<div class="accordion-section">
													<h5 href="#{{$item->id}}" class="accordion-title">{{ $item->name}}</h5>
													<div class="accordion-content">
													@foreach ($item->producttypes as $type)
														<p id="{{$item->id}}"><a href="/the-loai-san-pham/{{$type->slug}}">{{$type->name}}</a></p>
													@endforeach
													</div>
												</div>
											@endforeach
										</div>
									</div>
									<div id="new-pr" class="spm sidebar-widget">
											<h3 id="cate2">{{__('Product new')}}</h3>
											<ul class="col-xs-12 widget-post">
                                                @if(count($product_news) > 0)
												@foreach ($product_news as $item)
													<li>
														<a href="/product/{{$item->slug}}" class="widget-post-media">
															@if(empty($item['images']->first()['image']))
															<img src="{{asset_theme ('img/noproduct.png')}}" alt="">
															@else
															 <img src="{{$item['images']->first()['image'] ??''}}" alt="" />
															 @endif
														</a>

														<div class="widget-post-info">
														<a href="/product/{{$item->slug}}"> <h6>{{$item->name}} </h6></a>
														</div>
													</li>
												@endforeach
                                                    @endif
											</ul>
										</div>
						</div>
					</div>

				</div>
			</section>
			<hr />
			@if(count($product_other)>0)
			<section class="pd-top ptb ptb-sm-80">
					<div class="container">
						<h3>{{__("Product's type")}}</h3>
						<div class="row">
							<div class="owl-carousel item4-carousel nf-carousel-theme o-flow-hidden">
								@foreach ($product_other as $item)
									<div class="item">
										<div class="nf-col-padding">
											<div class="item-box">
												<div class="shop-item">
													<div class="item-img">
														<a href="/product/{{$item->slug}}">
															@if(!empty($item['images']->first()['image']))
																<img src="{{$item['images']->first()['image'] ??''}}" alt="" />
															@else
																<img src="{{asset_theme ('img/noproduct.png')}}" alt="">
															@endif
														</a>
													</div>
												</div>
												<div class="shop-item-info pr-text">
												<a href="/product/{{$item->slug}}"> <h5 class="shop-item-name">{{ $item->name ??''}}</h5> </a>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
                    </div>
				</section>
				@else
				@endif
				@include('themes.tht.en.sections.partner')
@endsection
@section('after_js')
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>--}}
{{--<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>--}}
<script src="{{asset_theme ('js/plugin/smoothproducts.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('.sp-wrap').smoothproducts();
    });
</script>
 <script>
		$(function () {
			setNavigation();
		});
		function setNavigation() {
			var path = window.location.pathname;
			path = path.replace(/\/$/, "");
			path = decodeURIComponent(path);
			$(".accordion .accordion-section .accordion-content p a").each(function () {
				var href = $(this).attr('href');
				if (path.substring(0, href.length) === href) {
					$(this).closest('a').addClass('active');
				}
			});
		}
		$(document).ready(function() {
		$('.accordion-content p a.active').closest('div.accordion-section').find('h5.accordion-title').addClass('active');
		});
</script>
@endsection

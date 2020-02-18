<style>
#sec-img{
    height: 278px;
    object-fit: cover
}
.pr-text{height: 60px}
</style>
<section id="work" class="gray-bg fadeIn ptb pt-sm-80">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-md-4">
				<a href="{{ route('products')}}"><h2>Sản Phẩm</h2></a>
				

			</div>
			<div class="col-sm-7 col-md-8 mb-30">
				<p class="lead">
						{!!strip_tags(\App\Helpers\Base::getSetting('intro-product-home'))!!}
				</p>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row text-center pd-15">
				@foreach ($product as $item)
				<div class="col-md-3 col-sm-6 mb-sm-30">
					<div class="item-box">
						<!-- Shop item images -->
						<div class="shop-item">
							<div class="item-img">
								@if(empty($item['images']->first()['image']))
									<img src="{{App\Helpers\Theme::assetsPath('img/noimage.png')}}" alt=""> </a>
								@else
									<img src="{{$item['images']->first()['image'] ??''}}" alt="1" />
								@endif
							</div>
							<div class="item-mask">
								<div class="item-mask-detail">
									<div class="item-mask-detail-ele">
										<a  href="/san-pham/{{$item->slug}}" class="btn btn-line-xs btn-white-line"><i class="fa fa-search"></i>Xem chi tiết</a>
									</div>
								</div>
							</div>
						</div>
						<div class="shop-item-info pr-text">
							<a  href="/san-pham/{{$item->slug}}"> <h5 class="shop-item-name">{{$item->name}}</h5> </a>
							<div class="shop-item-price">
							</div>
						</div>
					</div>
				</div>
				@endforeach
			<div class="row text-center">
					<div style="padding-bottom:15px" class="col-xs-12">
					<a class="btn btn-md btn-black mt-30" href="{{route('products')}}">Xem thêm</a>
					</div>
				</div>
		</div>
	</div>
</section>
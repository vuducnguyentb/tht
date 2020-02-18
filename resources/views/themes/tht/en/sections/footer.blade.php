
<footer class="footer pt-80">
	<div class="container">

		<!--Footer Info -->
		<div id="mg-foot" class="row footer-info mb-60">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="newsletter">
					<!-- <h5>Thông tin</h5> -->
					<div class="text foot-text">
						<img style="text-align: center" src="{{asset_theme ('img/logo.png')}}" alt=""/>
						<p>{{__('THT Trading, Service and High Technology Joint Stock Company')}}</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 mb-sm-30">
				<h5>{{__('About THT VietNam')}}</h5>
				<p class="mb-xs-0">{!!strip_tags(\App\Helpers\Base::getSetting('whishes'))!!}</p>
				<div class="icons-hover-black">
					<a href="https://facebook.com/sharer/sharer.php?u={{route('homeEn')}}"> <i class="fa fa-facebook"></i> </a>
					<a href="https://twitter.com/intent/tweet/?text=C%C3%94NG%20TY%20CP%20TH%C6%AF%C6%A0NG%20M%E1%BA%A0I%20D%E1%BB%8ACH%20V%E1%BB%A4%20V%C3%80%20K%E1%BB%B8%20THU%E1%BA%ACT%20CAO%20THT&amp;url={{route('homeEn')}}"> <i class="fa fa-twitter"></i> </a>
					<a href="https://plus.google.com/share?url={{route('homeEn')}}"> <i class="fa fa-google-plus"></i> </a>
					<a href="mailto:?subject=C%C3%94NG%20TY%20CP%20TH%C6%AF%C6%A0NG%20M%E1%BA%A0I%20D%E1%BB%8ACH%20V%E1%BB%A4%20V%C3%80%20K%E1%BB%B8%20THU%E1%BA%ACT%20CAO%20THT&amp;body={{route('homeEn')}}"> <i class="fa fa-envelope"></i> </a>
					<a href="https://pinterest.com/pin/create/button/?url={{route('homeEn')}}&amp;media={{route('homeEn')}}&amp;description=C%C3%94NG%20TY%20CP%20TH%C6%AF%C6%A0NG%20M%E1%BA%A0I%20D%E1%BB%8ACH%20V%E1%BB%A4%20V%C3%80%20K%E1%BB%B8%20THU%E1%BA%ACT%20CAO%20THT"> <i class="fa fa-pinterest"></i> </a>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 mb-sm-30">
				<h5>{{__('Address')}}</h5>
				<p>
					{!!strip_tags(\App\Helpers\Base::getSetting('address'))!!}
				</p>
				<ul class="link-small">
					<li>
						<a href="mailto:{!!strip_tags(\App\Helpers\Base::getSetting('email'))!!}"><i class="fa fa-envelope-o left"></i>{!!strip_tags(\App\Helpers\Base::getSetting('email'))!!}</a>
					</li>
					<li>
						<a href="tel:{!!strip_tags(\App\Helpers\Base::getSetting('phone'))!!}"><i class="fa fa-phone left"></i>{!!strip_tags(\App\Helpers\Base::getSetting('phone'))!!}</a>
					</li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 mb-sm-30">
			<h5>{{__('Map')}}</h5>
                <div class="map-foot">
                    {!!strip_tags(\App\Helpers\Base::getSetting('map-footer'),'<p><br><img><ul><li><table><quote><em><strong><iframe>')!!}
                </div>
			</div>

		</div>
		<!-- End Footer Info -->
	</div>

	<!-- Copyright Bar -->
	<section class="copyright">
		<div class="container">
			<p class="">
			© 2019 <a href="{{route('homeEn')}}" class="text-info"><b>THT - Viet Nam</b></a>. All Rights Reserved.
			</p>
		</div>
	</section>
	<!-- End Copyright Bar -->

</footer>
<!-- END FOOTER -->

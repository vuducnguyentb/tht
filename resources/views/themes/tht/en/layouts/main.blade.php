
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    @yield('seo_support')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf_token" content="{{ csrf_token() }}" />
	<meta name="author" content="THT">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<!-- Favicone Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset_theme ('img/favicon.ico')}}">
	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Main CSS -->

	<link rel="stylesheet" href="{{ mix('/themes/tht/css/all.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">	<link href="https://cdn.jsdelivr.net/npm/font-awesome@4.2.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.2.2/flexslider.css" rel="stylesheet" type="text/css" />{{--	<link href="{{asset_theme ('css/navigation.css')}}" rel="stylesheet" type="text/css" />--}}

	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet" type="text/css" />

	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js" ></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	@yield('after_css')
</head>

<body class="full-intro background--dark">

<!-- Search menu Top -->
<section class=" top-search-bar cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top">
	<div class="container">
		<div class="search-wraper">
			<form action="{{route('products.searchEn')}}" method="get" name="s" class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="input-sm form-full" placeholder="{{__('Search Product')}}..." name="s" />
				</div>

			</form>
			<a class="search-bar-icon"><i class="fa fa-search"></i></a>
			<a class="bar-close toggle-menu menu-top push-body"><i class="fa fa-times" aria-hidden="true"></i></a>

		</div>
	</div>
</section>
<!--End Search menu Top -->
<!--Top bar -->
<div id="top-bar" class="top-bar-section top-bar-bg-color">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<!-- Top Contact -->
				<div class="top-contact link-hover-black">
					<a href="tel:{!!strip_tags(\App\Helpers\Base::getSetting('phone'))!!}"> <i class="fa fa-phone"></i>{!!strip_tags(\App\Helpers\Base::getSetting('phone'))!!}</a>
					<a href="mailto:{!!strip_tags(\App\Helpers\Base::getSetting('email'))!!}"> <i class="fa fa-envelope"></i>{!!strip_tags(\App\Helpers\Base::getSetting('email'))!!}</a>
				</div>
                <select class="selectpicker" data-width="fit" id="choose-lang">
                    <option data-content='<span class="flag-icon flag-icon-vn"></span> Tiếng Việt' value="vi">Tiếng Việt</option>
                    <option data-content='<span class="flag-icon flag-icon-gb"></span> English' value="en">English</option>
                </select>

                <a href="{!!strip_tags(\App\Helpers\Base::getSetting('group-facebook'))!!}"><img src="{{asset_theme('img/facebook.png')}}" style="padding-top: 6px; width: 27px; margin-right: 7px;"/></a>
                <a href="{!!strip_tags(\App\Helpers\Base::getSetting('link-zalo'))!!}"><img src="{{asset_theme('img/zalo-2.png')}}" width="4%"/></a>
			</div>
		</div>
	</div>
</div>
<!--End Top bar -->
<!-- Site Wraper -->
<div class="wrapper">
@include('themes.tht.en.sections.header')

@yield('content')

@include('themes.tht.en.sections.footer')
<!-- Scroll Top -->
	<a class="scroll-top"> <i class="fa fa-angle-double-up"></i> </a>
	<!-- End Scroll Top -->
	<!-- Site Wraper End -->
</div>
<!-- JS -->

<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.1.0/jquery.fitvids.js" type="text/javascript"></script>
<script src="https://unpkg.com/jquery-plugin-viewport-checker@1.8.3/src/jquery.viewportchecker.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.0.3/wow.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.5.14/jquery.colorbox-min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.1.0/isotope.pkgd.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.1.8/imagesloaded.pkgd.min.js" type="text/javascript"></script>

<script src="{{asset_theme ('js/plugin/jquery.stellar.min.js')}} " type="text/javascript"></script>
<script src="{{asset_theme ('js/plugin/jPushMenu.js')}} " type="text/javascript"></script>
<script src="{{asset_theme ('js/plugin/jquery.fs.tipper.min.js')}} " type="text/javascript"></script>
<script src="{{asset_theme ('js/plugin/mediaelement-and-player.min.js')}} " type="text/javascript"></script>
<script src="{{asset_theme ('js/theme.js')}} " type="text/javascript"></script>
<script src="{{asset_theme ('js/navigation.js')}} " type="text/javascript"></script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js" ></script>
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>--}}

<script>
	$(function(){
		$('.selectpicker').selectpicker();
	});
	// handler language choice
	// neu location en.tht.com thi value la en
	// nguoc lai la vi
	if(window.location.host.includes('en.')){
		$("#choose-lang").val("en");
	}
	$("#choose-lang").change(function() {
		var value = $(this).val();
		console.log(window.location.host+window.location.pathname);
		if(value == 'en') {

			// redirect to en.tht.com
			console.log(window.location);
			//window.location.replace("https://en.tht-vietnam.com"+window.location.pathname);
            window.location.replace("https://en.tht-vietnam.com");
		}
		if(value == 'vi') {
			// remove en. from window location

			console.log(window.location);
			//window.location.replace("https://tht-vietnam.com"+window.location.pathname);
            window.location.replace("https://tht-vietnam.com");
		}
	});
</script>
@yield('after_js')
</body>
</html>

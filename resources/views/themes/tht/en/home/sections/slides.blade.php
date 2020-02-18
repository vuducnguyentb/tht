@section('seo_support')
    <title>
        {!!strip_tags(\App\Helpers\Base::getSetting('title-home-en'))!!}
    </title>
    <meta name="description" content="{!!strip_tags(\App\Helpers\Base::getSetting('home-description-en'))!!}" />
    <meta name="keywords" content="{!!strip_tags(\App\Helpers\Base::getSetting('home-keywords-en'))!!}" />
    <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    <meta property="og:title" content="{!!strip_tags(\App\Helpers\Base::getSetting('title-home-en'))!!}">
    <meta property="og:description" content="{!!strip_tags(\App\Helpers\Base::getSetting('home-description-en'))!!}">
    <meta property="og:url" content="{{route('home')}}">
    <meta name="twitter:title" content=" {!!strip_tags(\App\Helpers\Base::getSetting('title-home-en'))!!}">
    <meta name="twitter:description" content="{!!strip_tags(\App\Helpers\Base::getSetting('home-description-en'))!!}">
    <meta name="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('after_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css"/>
    <link rel="stylesheet" href="{{asset_theme ('css/homeindex.css')}}" type="text/css"/>
@endsection
{{--<section id="preloader">--}}
{{--    <div class="loader" id="loader">--}}
{{--        <div class="loader-img"></div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- End Preloader -->
<!-- Intro Section -->


<!--Image Slider-->
{{--<section class="home-slider">--}}
{{--                <div class="owl-carousel image-slider o-flow-hidden">--}}
{{--                    <div class="item">--}}
{{--                        <img class="img-slider" src="{{asset_theme('img/full/03.jpg')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <img class="img-slider" src="{{asset_theme('img/full/02.jpg')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <img class="img-slider" src="{{asset_theme('img/full/01.jpg')}}" alt="">--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--</section>--}}
<!-- End Image Slider-->


<section class="slider-header">
{{--    <div class="container">--}}
{{--        <div class="slider-header">--}}
    @foreach ($slides as $key => $slide)
            <div class="item-slider">
               <a href="{{$slide->links}}">
                   <img class="img-slider" src="{{$slide->image}}" alt="" style="transform: scale(1.0);">
               </a>
                <div class="info-slider">
                    <h3 class="title-slider">{!!$slide->title!!}</h3>
                    <h5 class="description-slider">{!!$slide->description!!}</h5>
                </div>
            </div>
    @endforeach
{{--        </div>--}}
{{--    </div>--}}
</section>




<!--Fullwidth Slider-->
{{--<section class="home-slider dark-bg">--}}
{{--    <div class="owl-carousel fullwidth-slider white o-flow-hidden">--}}
{{--        @foreach ($slides as $key => $slide)--}}
{{--        <div class="item bg-img" style="background-image: url('{{$slide->image}}');">--}}
{{--            <!-- Content -->--}}
{{--            <div class="full-cap-wraper overlay-dark80 light-color">--}}
{{--                <div class="content-caption light-color">--}}
{{--                    <div class="container">--}}
{{--                        <h1>{!!$slide->title!!}</h1>--}}
{{--                        <br />--}}
{{--                        <h3 class="slide-decription">{!!$slide->description!!}</h3>--}}
{{--                        <br>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End Content -->--}}
{{--        </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</section>--}}
<!-- End Fullwidth Slider-->






{{--<section class="home-slider dark-bg">--}}

{{--    <!-- Hero Slider Section -->--}}
{{--    <div class="owl-carousel fullwidth-slider white o-flow-hidden">--}}
{{--        @foreach ($slides as $key => $slide)--}}

{{--        <div class="item bg-img parallax parallax-section1" style="background-image: url('{{$slide->image}}');">--}}
{{--            <!-- Content -->--}}
{{--            <div class="full-cap-wraper overlay-dark80 light-color">--}}
{{--                <div class="content-caption light-color">--}}
{{--                    <div class="container">--}}
{{--                        <h5>{!!$slide->title!!}</h5>--}}
{{--                        <br />--}}
{{--                        <h1 class="slide-description">{!!$slide->description!!}</h1>--}}
{{--                        <br>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End Content -->--}}
{{--        </div>--}}
{{--        @endforeach--}}


{{--    </div>--}}
{{--    <!-- End Hero Slider Section -->--}}
{{--</section>--}}

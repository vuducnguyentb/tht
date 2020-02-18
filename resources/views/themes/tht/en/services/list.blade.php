@extends('themes.tht.en.layouts.main')
@section('seo_support')
<title>{{get_site_setting('services-list-title-en') }}</title>
<meta name="description" content="{{get_site_setting('services-list-description-en') }}">
<meta name="keywords" content="{{get_site_setting('services-list-keywords-en') }}">
<meta property="og:title" content="{{get_site_setting('services-list-title-en') }}">
<meta property="og:description" content="{{get_site_setting('services-list-description-en') }}">
@if($services[0] == null || $services[0]['image'] == null || $services[0]['image'])
<meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
@else
{{--    <meta property="og:image" content="{{route('posts.detailEn',$services[0]['image'])}}">--}}
@endif
<meta property="og:url" content="{{route('servicesEn')}}">

<meta name="twitter:title" content="{{get_site_setting('services-list-title-en') }}">
<meta name="twitter:description" content="{{get_site_setting('services-list-description-en') }}">
<meta name="twitter:card" content="summary_large_image">
@if($services[0] != null && $services[0]->first()['image'] != null)
<meta name="twitter:image" content="{{route('posts.detailEn',$services[0]->first()['image'])}}">
@else
    <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
@endif

@endsection
@section('after_css')
<link rel="stylesheet" href="{{asset_theme ('css/services.css')}}" />
@endsection
@section('content')
<!-- Team Grid Box Section -->
<!-- Intro Section -->
<section class="inner-intro bg-img18 overlay-dark light-color parallax parallax-background2">
    <div class="container">
        <div class="row title">
            <h2 class="h2">{{__('Solution')}}</h2>
            <div class="page-breadcrumb">
                <a href="{{route('homeEn')}}">{{__('Home')}}</a>/<a href="{{ route('servicesEn')}}">{{__('Solution')}}</a>
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

<section class="ptb ptb-sm-80">
    <div class="container-fluid">
        <div class="row mt-0">
            @if($services[0] != null)
            @foreach ($services as $item)
            <div class="col-md-4 col-sm-4">
                <div class="service-item">
                    <a href="{{route('detail_servicesEn', ['slug' => $item->slug])}}" class="btn-text mt-15">
                    <div class="service-img">
                        <img class="img-item-service" src="{{$item->image}}" alt="" onerror="this.src='{{asset_theme ('img/noservice.png')}}'"/>
                    </div>
                    </a>
                    <div class="info-service">
                        <div class="title-service">
                            <h3><a href="{{route('detail_servicesEn', ['slug' => $item->slug])}}">{{$item->title}}</a></h3>
                        </div>
                        <div class="date-service">
                            <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span>
                            <span class="body-service">{{strip_tags($item->body)}}</span>
                            <a href="{{route('detail_servicesEn', ['slug' => $item->slug])}}" class="more-service btn-text mt-15">
                            <span>{{__('See more')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <h2 class="text-center">{{__('The solution is updating')}}</h2>
            @endif
        </div>

        <!-- Pagination Nav -->
        <div class="pagination-nav  mt-xs-30">
            <div>{{ $services->links() }}</div>
        </div>
        <!-- End Pagination Nav -->


    </div>

</section>


@include('themes.tht.en.sections.partner')
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
@endsection

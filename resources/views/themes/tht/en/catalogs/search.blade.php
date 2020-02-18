@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{get_site_setting('catalog-search-title-en') }}</title>
    <meta name="description" content="{{get_site_setting('catalog-search-description-en') }}">
    <meta name="keywords" content="{{get_site_setting('catalog-search-keywords-en') }}">
    <meta property="og:title" content="{{get_site_setting('catalog-search-title-en') }}">
    <meta property="og:description" content="{{get_site_setting('catalog-search-description-en') }}">
    @if(($catalogs[0]) !== null)
    <meta property="og:image" content="{{route('posts.detailEn',$catalogs[0]->slug)}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
        <meta property="og:url" content="{{route('catalogs.searchEn')}}">
    <meta name="twitter:title" content="{{get_site_setting('catalog-search-title-en') }}">
    <meta name="twitter:description" content="{{get_site_setting('catalog-search-description-en') }}">
    <meta name="twitter:card" content="summary_large_image">
    @if(($catalogs[0]) !== null)
        <meta name="twitter:image" content="{{route('posts.detailEn',$catalogs[0]->slug)}}">
    @else
        <meta name="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
@endsection
@section('after_css')
    <link rel="stylesheet" href="{{asset_theme ('css/catalog/list.css') }}">
@endsection
@section('content')
    <!-- Intro Section -->
    <section class="inner-intro bg-img10 light-color overlay-dark parallax parallax-background2" style="">
        <div class="container">
            <div class="row title">
                <h2 class="h2">{{__('Catalog title')}}</h2>
                <div class="page-breadcrumb">
                    <a href="{{route('homeEn')}}">{{__('Home')}}</a>/<span>{{__('Catalog title')}}</span>
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
        <a class="a2a_dd" href="{{route('homeEn')}}/share"></a>
    </div>
    <!-- Work Detail Section -->
    <section class="ptb ptb-sm-80">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sidebar-widget">
                        @if($count!=0)
                        <h4 style="font-family:auto"  class="text-left">{{__('Find')}}<span class="text-success"><b>{{$keyword}}</b></span> : {{$count}} {{__('result')}}̉</h4>
                        @else
                        <h3 style="font-family:auto" class="text-danger">{{__('Catalog not found')}} <span class="text-success">{{$keyword}}</span></h3>
                            @endif
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($catalogs as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6 spacing-grid-15">
                        <div class="item-box">
                            <a  href="{{route('catalogs.detailEn', ['slug' => $item->slug])}}">
                                @if(($item->link) !== null)
                                <img href="#" src="{{$item->link}}" onerror="this.src='{{asset_theme ('img/nocatalog.png')}}'" class="item-container img-cata">
                                @else
                                    <img href="#" src="{{asset_theme ('img/nocatalog.png')}}"  class="item-container img-cata">
                                @endif
                                    <div class="item-mask">
                                    <div class="item-caption">
                                        <h5 class="white">{{$item->name}}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="col-sm-12">
                    <div class="text-right" style="" > {{ $catalogs->appends('s',$keyword)->links() }}</div>
                </div>
            </div>
        </div>
    </section>
    @include('themes.tht.en.sections.partner')
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
@endsection

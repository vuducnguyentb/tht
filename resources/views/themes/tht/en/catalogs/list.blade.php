@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{get_site_setting('catalog-list-title-en') }}</title>
    <meta name="description" content="{{get_site_setting('catalog-list-description-en') }}">
    <meta name="keywords" content="{{get_site_setting('catalog-list-keywords-en') }}">
    <meta property="og:title" content="{{get_site_setting('catalog-list-title-en') }}">
    <meta property="og:description" content="{{get_site_setting('catalog-list-description-en') }}">
    @if($list[0] != null && $list[0]->link != null)
        <meta property="og:image" content="{{route('posts.detailEn',$list[0]->slug)}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('catalogsEn')}}">
    <meta name="twitter:title" content="{{get_site_setting('catalog-list-title-en') }}">
    <meta name="twitter:description" content="{{get_site_setting('catalog-list-description-en') }}">
    <meta name="twitter:card" content="summary_large_image">
    @if($list[0] != null && $list[0]->link != null)
    <meta name="twitter:image" content="{{$list[0]->slug}}">
    @else
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
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
                <h2 class="h2">{{__('Catalog list')}}</h2>
                <div class="page-breadcrumb">
                    <a href="{{route('homeEn')}}">{{__('Home')}}</a>/<span>{{__('Catalog list')}}</span>
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
                <div class="col-lg-4">
                    <div class="sidebar-widget">
                        <h5 class="text-left">{{__('Search catalog')}}</h5>
                        <div class="widget-search">
                            <form action="{{route('catalogs.searchEn')}}" method="get">
                                <input class="form-full input-lg" type="text" value="" placeholder="{{__('Catalog')}}" name="keyword" id="wid-search">
                                <input type="submit" value="" name="email" id="wid-s-sub" class="btn-timkiem">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($list[0] != null)
                @foreach($list as $item)
                <div class="col-lg-4 col-md-6 col-sm-6 spacing-grid-15">
                    <div class="item-box">
                        <a href="{{route('catalogs.detailEn', ['slug' => $item->slug])}}">
                            <img href="#" src="{{$item->link}}" onerror="this.src='{{asset_theme ('img/nocatalog.png')}}'" class="item-container img-cata">
                            <div class="item-mask">
                                <div class="item-caption">
                                </div>
                            </div>
                            <div class="item-title">
                                <h5 class="white">{{$item->name}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                @else
                    <h2 class="text-center">{{__('The catalog is updating!')}}</h2>
                    @endif
                    <div class="col-sm-12">
                        <div class="text-right" style="" >{{ $list->links() }}</div>
                    </div>
            </div>
        </div>
    </section>
    @include('themes.tht.en.sections.partner')
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
@endsection

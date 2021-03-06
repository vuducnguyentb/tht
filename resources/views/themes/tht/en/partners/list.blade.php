@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{get_site_setting('partners-list-title-en') }}</title>
    <meta name="description" content="{{get_site_setting('partners-list-description-en') }}">
    <meta name="keywords" content="{{get_site_setting('partners-list-keywords-en') }}">
    <meta property="og:title" content="{{get_site_setting('partners-list-title-en') }}">
    <meta property="og:description" content="{{get_site_setting('partners-list-description-en') }}">
    @if($list->first() != null)
    <meta property="og:image" content="{{route('posts.detailEn',$list[0]->image)}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('partnersEn')}}">
    <meta name="twitter:title" content="{{get_site_setting('partners-list-title-en') }}">
    <meta name="twitter:description" content="{{get_site_setting('partners-list-description-en ') }}">
    <meta name="twitter:card" content="summary_large_image">
    @if($list->first() != null)
    <meta name="twitter:image" content="{{route('posts.detailEn',$list[0]->image)}}">
    @else
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
@endsection
@section('after_css')
    <link rel="stylesheet" href="{{asset_theme ('css/partner/list.css') }}">
@endsection
@section('content')
    <section class="inner-intro overlay-dark bg-img2 light-color " >
        <div class="container">
            <div class="row title">
                <h2 class="h2">{{__('Partner')}}</h2>
                <div class="page-breadcrumb">
                    <a href="{{route('homeEn')}}">{{__('Home')}}</a>/<span>{{__('Partner')}}</span>

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
    <section class="partners ptb">
        <div class="container">
            <div class="row">
                @if($list->first() != null)

                @foreach($list as $item)
                <div class="col-lg-3 col-sm-4 col-xs-6">
                    <a title="{{$item->name}}" href="{{route('partners.detailEn', ['slug' => $item->slug])}}">
                        <img class="thumbnail img-responsive img-logo" src="{{$item->image}}" onerror="this.src='{{asset_theme ('img/nopartner.png')}}'">
                    </a>
                </div>
                @endforeach
                <hr>

                <hr>
                    @else
                    <h2 class="text-center">{{__('The partner is updating!')}}</h2>
                @endif
            </div>

        </div>
    </section>
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
@endsection

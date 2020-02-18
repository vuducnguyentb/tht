@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{$catalog->name}}</title>
    <meta name="description" content="{{get_site_setting('catalog-detail-description-en') }}">
    <meta name="description" content="{{Str::words($catalog->body,25,'...')}}">
    <meta name="keywords" content="{{get_site_setting('catalog-detail-keywords-en') }}">
    <meta property="og:title" content="{{$catalog->name}}">
    <meta property="og:description" content="{{Str::words($catalog->body,25,'...')}}">
    @if($list[0]->link != null)
        <meta property="og:image" content="{{route('posts.detailEn',$list[0]->link)}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('catalogs.detailEn',$catalog->slug)}}">
    <meta name="twitter:title" content="{{$catalog->name}}">
    <meta name="twitter:description" content="{{Str::words($catalog->body,25,'...')}}">
    @if($list[0]->link != null)
    <meta name="twitter:image" content="{{route('posts.detailEn',$list[0]->link)}}">
    @else
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('after_css')
    <link rel="stylesheet" href="{{asset_theme ('css/catalog/detail.css') }}">
@endsection
@section('content')
    <!-- Intro Section -->
    <section class="inner-intro bg-img10 light-color overlay-dark parallax parallax-background2" style="">
        <div class="container">
            <div class="row title">
                <h2 class="h2">{{__('Catalog ')}}</h2>
                <div class="page-breadcrumb">
                    <a href="{{route('homeEn')}}">{{__('Home')}}</a>/<span>{{__('Catalog ')}} / {{$catalog->name}}</span>
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
    <section class=" pd-25">
        <div class="container">
            <div class="row">
{{--                <div class="col-lg-4">--}}
{{--                    <div class="img-catalog">--}}
{{--                        <img src="{{$catalog->image}}" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-lg-12">
                    <div class="catalog-info">
                        <h2 >{{$catalog->name}}</h2>
                        <div class="shop-item-price mtb-15 ptb-15">
                            {!!strip_tags(($catalog->body),'<section><h2><h3><div><p><a><br><img><ul><li><table><quote><em><strong>')!!}
                        </div>
                        <div class="download text-right">
                            <strong><span class="download-catalog">{{__('Dowload document')}}</span> </strong>
                            <a href="{{$catalog->link}}" target="_blank">
                                <i class="fa fa-download text-danger"></i>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="pb-60 gray-bg ">
       <div class="container">
           <h2>{{__('New document')}}</h2>
           <div class="row">
               @foreach($list as $item)
                       <div class="col-lg-4 col-md-6 col-sm-6 spacing-grid-15">
                           <div class="item-box">
                               <a href="{{route('catalogs.detailEn', ['slug' => $item->slug])}}">
                                   <img href="#" src="{{$item->link}}" onerror="this.src='{{App\Helpers\Theme::assetsPath('img/nocatalog.png')}}'" class="item-container img-cata">
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
           </div>
       </div>

    </section>
    @include('themes.tht.en.sections.partner')
@endsection

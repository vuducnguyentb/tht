
@extends('themes.tht.en.layouts.main')
@section('seo_support')
    <title>{{get_site_setting('products-search-title-en') }}</title>
    <meta name="description" content="{{get_site_setting('products-search-description-en') }}">
    <meta name="keywords" content="{{get_site_setting('products-search-keywords-en') }}">
    <meta property="og:title" content="{{get_site_setting('products-search-title-en') }}">
    <meta property="og:description" content="{{get_site_setting('products-search-description-en') }}">
    @if(($product[0]) !== null)
        <meta property="og:image" content="{{route('posts.detailEn',$product[0]['images']->first()['image'])}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('products.searchEn')}}">

    <meta name="twitter:title" content="{{get_site_setting('products-search-title-en') }}">
    <meta name="twitter:description" content="{{get_site_setting('products-search-description-en') }}">
    <meta name="twitter:card" content="summary_large_image">
    @if(($product[0]) !== null)
        <meta name="twitter:image" content="{{route('posts.detailEn',$product[0]['images']->first()['image'])}}">
    @else
        <meta name="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif

@endsection
@section('after_css')
<link href="{{asset_theme ('css/product/list.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

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
<!-- Shop Item Section -->
<section id="shop-item" class="ptb ptb-sm-80">
    <div class="container">
        <!-- Sort List -->
        <div class="row ">
            <div class="col-md-12">
                <div class="shop-filter mb-15">
                    <div class="float-left float-none-xs">
                        <p>
                            {{$count}} {{__('result found')}}
                         </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sort List -->

        <!-- Shop Item -->
        <div class="row container-grid">

            @foreach ($product as $item)
                <div class="nf-item col-md-3 col-sm-6 col-xs-12 mb-30">
                    <div class="item-box">
                        <!-- Shop item images -->
                        <div class="shop-item">
                            <div class="item-img prod">
                                    @if(empty($item['images']->first()['image']))
                                    <img src="{{asset_theme ('img/noproduct.png')}}" alt=""> </a>
                                    @else

                                <img id="s-img" src="{{$item['images']->first()['image'] ??''}}"  onerror="this.src='{{App\Helpers\Theme::assetsPath('img/noproduct.png')}}'" alt="" />
                                @endif
                            </div>
                            <div class="item-mask">
                                <div class="item-mask-detail">

                                </div>
                            </div>
                        </div>
                        <!-- End Shop item images -->

                        <!-- Shop item info -->
                        <div class="shop-item-info">
                        <a href="{{route('products.detailEn',$item->slug)}}"> <h6 class="shop-item-name">{{$item->name ??''}}</h6> </a>

                        </div>
                        <!-- Shop item info -->
                    </div>
                </div>

            @endforeach

        </div>
        <!-- End Shop Item -->

        <!-- Pagination Nav -->
        <div class="pagination-nav mt-60 mt-xs-30">
            <div>{{ $product->appends('s',$key)->links() }}</div>
    </div>
    </div>
</section>
@include('themes.tht.en.sections.partner')
@endsection
@section('after_js')
{{--<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>--}}
@endsection

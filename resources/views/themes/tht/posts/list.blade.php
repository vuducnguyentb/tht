@extends('themes.tht.layouts.main')
@section('seo_support')
    <title>{{get_site_setting('posts-list-title') }}</title>
    <meta name="description" content="{{get_site_setting('posts-list-description') }}">
    <meta name="keywords" content="{{get_site_setting('posts-list-keywords') }}">
    <meta property="og:title" content="{{get_site_setting('posts-list-title') }}">
    <meta property="og:description" content="{{get_site_setting('posts-list-description') }}">
    @if($list[0]!= null && $list[0]->image != null)
    <meta property="og:image" content="{{route('posts.detail',$list[0]->image)}}">
    @else
        <meta property="og:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
    <meta property="og:url" content="{{route('post')}}">
    <meta name="twitter:title" content="{{get_site_setting('posts-list-title') }}">
    <meta name="twitter:description" content="{{get_site_setting('posts-list-description') }}">
    <meta name="twitter:card" content="summary_large_image">
    @if($list[0]!= null && $list[0]->image != null)
        <meta name="twitter:image" content="{{route('posts.detail',$list[0]->image)}}">
    @else
        <meta property="twitter:image" content="{{asset_theme ('img/logo.png')}}">
    @endif
@endsection
@section('after_css')
    <link href="{{asset_theme ('css/post/list.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section class="inner-intro bg-img17 overlay-dark light-color parallax parallax-background2">
    <div class="container">
        <div class="row title">
            <h2 class="h2">Tin tức</h2>
            <div class="page-breadcrumb">
                <a href="{{route('home')}}">Trang chủ</a>/<span>Tin tức</span>
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
<!-- Blog Post Section -->

<div class="clearfix"></div>
<section id="cate">
    <div class="container">
        <div class="row padding-top">
            <div class="col-md-12">
                <div class="buttons">

                        <a id="tit2" href="{{route('post')}}" class="btn btn-color-line  btn-lg">Tất cả</a>
                        @foreach ($cate as $item)
                            <a id="tit" href="{{asset('chuyen-muc/'.$item->slug)}}" class="btn btn-color-line btn-lg">{{$item->name}}</a>
                        @endforeach

                </div>
            </div>

        </div>


        <div style="height: 10px"></div>
    </div>
</section>

<section class="ptb-sm-80">
    <div class="container">
       <!-- Post Item -->
        <div class="row container-masonry">
            @if($list[0]!= null)
            @foreach ($list as $item)
                <div class="col-md-6 col-sm-6 col-xs-12 nf-item">
                    <div class="blog-post">
                        <div class="post-media">
                           <a href="{{route('posts.detail', ['slug' => $item->slug])}}">
                            @if(!empty( $item->image ))
                                    <img class="item-container" src="{{$item->image}}" alt="1" />
                            @else
                            <img class="item-container"  src="{{asset_theme ('img/nopost.png')}}" alt="">
                            @endif
                           </a>
                        </div>
                        <div class="post-meta"><span> {{$item['author']->name ?? ''}},</span> <span> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span></div>
                        <div class="post-header">
                            <h4 id="tit"><a style="color:black" href="{{route('posts.detail', ['slug' => $item->slug])}}">{!! Str::words($item->title, 15,'....')  !!}</a></h4>
                        </div>
                    </div>
                </div>
            @endforeach
                @else
            <h2 class="text-center">Tin tức đang được cập nhập</h2>
                @endif
        </div>
        <!-- End Post Item -->

        <!-- Pagination Nav -->
        <div class="pagination-nav mt-60 mt-xs-30">
                <div>{{ $list->links() }}</div>
        </div>
    </div>
</section>
@include('themes.tht.sections.partner')
@endsection
@section('after_js')
<script src="{{asset_theme ('js/page.js')}}" type="text/javascript"></script>
@endsection
